# PHP-CRUD-API v3 plan: internal joins + filters on child tables

## Goal

A v3 that is a strict superset of v2:

1. Same endpoints, same request surface, byte-identical responses for every
   existing v2 request (no regressions in the test suite).
2. Adds one new capability: **filters that target joined/child tables**, pushed
   into SQL via joins instead of being done in PHP.

"Fully compatible with v2 (but allows filters on child tables)" is read as
**purely additive**: existing requests behave exactly as before, new requests
that reference a related table in a `filter` get the new behavior. No version
flag, no separate endpoint, no opt-in config required.

## Current architecture (what we keep working)

- `RecordController::_list` -> `RecordService::_list`.
- Root table queried once via `GenericDB::selectAll(table, columns, condition, ordering, offset, limit)`.
- `RelationJoiner::addJoins` then runs **separate batched queries** per relation
  (`selectMultiple` / `selectAll` with `IN (...)`) and stitches nested results
  in PHP. This is why output is clean, pagination is correct, and there is no
  cartesian explosion. We do NOT throw this away.
- `FilterInfo::getCombinedConditions` builds a `Condition` tree for the **root
  table only**. `ConditionsBuilder` renders it to a `WHERE` clause.
- Relations are detected in `RelationJoiner`: `belongsTo` (root has FK to target),
  `hasMany` (target has FK to root), `hasAndBelongsToMany` (junction table with
  FKs to both).

## Design decision 1: join strategy (DECIDED: hybrid)

The phrase "internally does joins" has two readings. We choose where joins are used:

- **Hybrid (recommended).** Keep the proven batched per-relation assembly for
  building the response tree (guarantees identical v2 output, correct
  pagination, no cartesian blow-up). Use real SQL joins only where they add a
  new capability: compiling child-table filters into correlated `EXISTS`
  semi-joins on the parent query. Lowest risk, fully v2-compatible.
- **Full single-query join (alternative).** Emit one big `LEFT JOIN` per
  root-to-leaf path, fetch flattened rows, regroup into the nested tree in PHP.
  Pure "joins", but: cartesian explosion with sibling `hasMany` branches
  (comments x tags), pagination requires paginating the root via a derived
  table / window function, and it is a much larger rewrite of `GenericDB`.
  Higher risk, often slower for multi-branch joins.

This plan is written for the **hybrid** approach.

## Design decision 2: child-filter semantics (DECIDED: restrict parents)

When a filter targets a child table, e.g. `filter=comments.message,cs,great`:

- **A. Restrict parents (recommended default).** Return only root records that
  have at least one matching child (SQL `EXISTS`). The nested child arrays still
  contain all children, exactly as v2. Pagination and count reflect the filtered
  parent set.
- **B. Restrict children.** Return all parents, but the nested child array only
  contains matching children.
- **C. Both.** Restrict parents AND show only matching children.

The plumbing built here supports all three by toggling where the compiled filter
is applied (parent `WHERE` vs the batched child query). We implement **A** as the
default; B/C become a follow-up toggle if wanted. `belongsTo` filters always act
as parent restriction (filtering a single nested object is meaningless).

## Syntax

Reuse the existing `filter` parameter; allow a relation path in the column slot,
consistent with `include=categories.name` and `join=categories`:

```
GET /records/posts?join=comments&filter=comments.message,cs,great   # hasMany
GET /records/posts?filter=categories.name,eq,announcement           # belongsTo
GET /records/posts?join=tags&filter=tags.name,eq,funny              # HABTM
GET /records/posts?filter=comments.users.username,eq,bob           # nested
```

Rules:
- The path uses **table names** (matching `join`/`include`), not FK column names.
- `filter=id,eq,1` (no relation prefix) stays root-table, identical to v2.
- A child filter does **not** require the table to also appear in `join`;
  parent restriction via `EXISTS` needs no returned data. To also get the
  children in the output, the client adds `join` as usual.
- The existing OR/AND grouping (`filter1`, `filter2`) is unchanged; the relation
  path lives in the value's column slot, the grouping in the key suffix.
- Parsing: split the column token on the first dot; if the leading segment is a
  table reachable from the current table by a relation, treat it as a relation
  path, else treat the whole token as a (root) column name.

## Generated SQL (parent restriction via correlated EXISTS)

hasMany (`filter=comments.message,cs,great`):
```sql
SELECT ... FROM "posts" WHERE EXISTS (
  SELECT 1 FROM "comments"
  WHERE "comments"."post_id" = "posts"."id" AND "comments"."message" LIKE ?
)
```
belongsTo (`filter=categories.name,eq,announcement`):
```sql
SELECT ... FROM "posts" WHERE EXISTS (
  SELECT 1 FROM "categories"
  WHERE "categories"."id" = "posts"."category_id" AND "categories"."name" = ?
)
```
HABTM (`filter=tags.name,eq,funny`):
```sql
SELECT ... FROM "posts" WHERE EXISTS (
  SELECT 1 FROM "post_tags"
  JOIN "tags" ON "tags"."id" = "post_tags"."tag_id"
  WHERE "post_tags"."post_id" = "posts"."id" AND "tags"."name" = ?
)
```
Nested EXISTS compose. Subquery tables get unique aliases per depth so
self-referencing relations and repeated table names stay unambiguous.

This keeps `GenericDB::selectAll` and `selectCount` unchanged: they already take
a `Condition` and render a `WHERE`. The `Condition` tree just gets richer, so
**count and pagination stay correct for free**.

## Implementation steps (hybrid)

1. **Relation resolver.** Factor relation classification (belongsTo / hasMany /
   HABTM + resolved keys/junction) out of `RelationJoiner` into a small reusable
   helper so the filter compiler and the joiner agree on how a table-name path
   maps to keys. (`src/Tqdev/PhpCrudApi/Record/`.)
2. **New condition type** `Record/Condition/RelatedCondition.php`: carries the
   resolved relation step(s) (ReflectedTable + key columns + optional junction)
   and the inner `Condition`. Resolution stays in PHP/reflection; the builder
   stays SQL-only.
3. **`Database/ConditionsBuilder.php`**: render `RelatedCondition` as a
   correlated `EXISTS (...)` with per-depth aliasing, reusing existing column
   SQL for the leaf condition. Handle the four drivers (mysql/pgsql/sqlsrv/sqlite).
4. **`Record/FilterInfo.php`**: give it `ReflectionService`. Split incoming
   filters into root-table conditions (as today) and relation-path conditions;
   compile the latter into `RelatedCondition`s AND-ed (or OR-ed per grouping)
   into the combined condition. Keep the existing `filter1`/`filter2` grouping.
5. **`Record/RecordService.php`**: pass `ReflectionService` into `FilterInfo`.
   (Hooks for semantic B/C: also hand the per-relation child filters to the
   joiner; default A leaves the joiner unchanged.)
6. **Limits / safety.** Make `JoinLimitsMiddleware` (depth/tables/records) also
   account for filter relation paths so child filters cannot bypass anti-scraping
   limits. Reject/ignore unresolvable paths the same way unknown joins are ignored.
7. **OpenAPI.** Confirm `OpenApi*Builder` still generates valid specs; document
   the new filter-path capability if the generator enumerates filterable columns.
8. **Build + tests** (below).

## Files touched (hybrid)

- `src/Tqdev/PhpCrudApi/Record/FilterInfo.php` (split root vs relation filters)
- `src/Tqdev/PhpCrudApi/Record/Condition/RelatedCondition.php` (new)
- `src/Tqdev/PhpCrudApi/Database/ConditionsBuilder.php` (render EXISTS)
- `src/Tqdev/PhpCrudApi/Record/RecordService.php` (wire reflection into FilterInfo)
- `src/Tqdev/PhpCrudApi/Record/RelationJoiner.php` (only if B/C: child restriction)
- `src/Tqdev/PhpCrudApi/Middleware/JoinLimitsMiddleware.php` (cover filter paths)
- relation resolver helper (new, factored from `RelationJoiner`)

## Status: implemented

Done on branch `v3` (hybrid + restrict-parents, as decided):

- `Record/Condition/RelatedCondition.php` (new): belongsTo/hasMany/habtm EXISTS node.
- `Record/RelationResolver.php` (new): resolves a table-name hop to keys/junction.
- `Record/FilterInfo.php`: compiles dotted filter paths into RelatedConditions,
  falls back to v2 behavior for non-dotted columns; given ReflectionService.
- `Database/ConditionsBuilder.php`: renders RelatedCondition as correlated
  EXISTS with per-depth aliases (`_cf0`, `_cf1`, ...); inner conditions are
  qualified with the related-table alias. Top-level column SQL is unchanged.
- `Database/GenericDB.php`: `selectAll`/`selectCount` pass the root table ref so
  EXISTS sub-queries correlate; count and pagination use the same condition.
- `RequestUtils.php`: `getTableNames` also returns filter-path tables so table
  and column authorization cover filtered tables.
- `Middleware/JoinLimitsMiddleware.php`: caps relation-filter path depth to the
  configured join depth.
- `Record/FilterInfo.php`: each related table's authorization.recordHandler and
  multiTenancy conditions are pushed into its EXISTS sub-query (same conditions a
  direct query of that table would get), so related filters cannot leak rows that
  record-level authorization or multi-tenancy would hide.
- 11 functional tests `tests/functional/001_records/096..106` (hasMany,
  belongsTo, habtm, nested, parent-restrict-keeps-children, pagination+count,
  OR-grouping, negation, graceful-ignore, record-auth respected, multi-tenancy
  respected).

Verified: full suite 130 tests, 0 failed on both mysql and pgsql; phpstan level 5
clean for the changed files (the only reported error is a pre-existing one in
WpAuthMiddleware caused by the missing wordpress stub in this checkout).
sqlsrv/sqlite not run here (no PDO drivers/containers available); the generated
EXISTS SQL uses only standard, already-used quoting and should port, but should
be run before release.

## Security: authorization and multi-tenancy on related filters

All three middleware-condition layers are now enforced on a related filter, so
it is not a hole around v2's access controls:

- Table-level authorization: a denied related table is removed from reflection,
  so the resolver cannot see it and the filter is ignored (via getTableNames).
- Column-level authorization: a denied column is removed, so a filter on it is
  ignored (via getTableNames).
- Record-level authorization (authorization.recordHandler) and multi-tenancy
  conditions are AND-ed into each related table's EXISTS sub-query (FilterInfo),
  so a related filter only matches rows the caller is allowed to see. Covered by
  tests 105 (record auth) and 106 (multi-tenancy).

## Known limitations (follow-ups)

- When the outer table has more than one foreign key to the same related table,
  the first foreign key is used for the correlation. v2's join has the same
  ambiguity. A future syntax could disambiguate by FK column.

## Out of scope for v3 v1 (note as future)

- Ordering on joined/child columns (`order=comments.created`) - v2 forbids it; keep parity.
- Aggregates on children (counts, sums).
- Full single-query join mode (decision 1 alternative).

## Testing

- Workflow: edit `src/` -> `php build.php` (regenerates `api.php` and
  `api.include.php`) -> `php test.php`. The test harness `require`s
  `api.include.php`, so a build is required before running tests.
- Regression: run the full existing suite (esp. `tests/functional/001_records`)
  to prove byte-identical v2 behavior. Target sqlite first, then mysql/pgsql/
  sqlsrv via docker.
- New `.log` fixtures under `tests/functional/001_records/` covering:
  - child filter on hasMany, belongsTo, HABTM
  - nested relation path
  - OR/AND grouping with a relation path (`filter1`/`filter2`)
  - pagination + count correctness with a child filter
  - root filter unchanged (no relation prefix)
- `phpstan` (see `phpstan.neon`) must pass.

## Compatibility guarantees

- No new required config; no endpoint/version changes.
- Existing requests produce identical SQL shape and identical JSON.
- New behavior only triggers when a `filter` value's column token names a
  related table reachable from the queried table.
