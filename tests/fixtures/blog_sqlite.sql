-- Adminer 4.2.4 SQLite 3 dump

PRAGMA foreign_keys = off;

DROP TABLE IF EXISTS "categories";
CREATE TABLE "categories" (
  "id" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "name" varchar(255) NOT NULL,
  "icon" blob NULL
);

INSERT INTO "categories" ("id", "name", "icon") VALUES (1, 'announcement', NULL);
INSERT INTO "categories" ("id", "name", "icon") VALUES (2, 'article', NULL);
INSERT INTO "categories" ("id", "name", "icon") VALUES (3, 'comment', NULL);

DROP TABLE IF EXISTS "comments";
CREATE TABLE "comments" (
  "id" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "post_id" integer NOT NULL,
  "message" VARCHAR(255) NOT NULL,
  "category_id" integer NOT NULL,
  FOREIGN KEY ("post_id") REFERENCES "posts" ("id") ON DELETE RESTRICT ON UPDATE RESTRICT,
  FOREIGN KEY ("category_id") REFERENCES "categories" ("id") ON DELETE RESTRICT ON UPDATE RESTRICT
);

CREATE INDEX "comments_post_id" ON "comments" ("post_id");
CREATE INDEX "comments_category_id" ON "comments" ("category_id");

INSERT INTO "comments" ("id", "post_id", "message", "category_id") VALUES (1, 1, 'great', 3);
INSERT INTO "comments" ("id", "post_id", "message", "category_id") VALUES (2, 1, 'fantastic', 3);
INSERT INTO "comments" ("id", "post_id", "message", "category_id") VALUES (3, 2, 'thank you', 3);
INSERT INTO "comments" ("id", "post_id", "message", "category_id") VALUES (4, 2, 'awesome', 3);

DROP TABLE IF EXISTS "posts";
CREATE TABLE "posts" (
  "id" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "user_id" integer NOT NULL,
  "category_id" integer NOT NULL,
  "content" varchar(255) NOT NULL,
  FOREIGN KEY ("user_id") REFERENCES "users" ("id") ON DELETE RESTRICT ON UPDATE RESTRICT,
  FOREIGN KEY ("category_id") REFERENCES "categories" ("id") ON DELETE RESTRICT ON UPDATE RESTRICT
);

CREATE INDEX "posts_user_id" ON "posts" ("user_id");

CREATE INDEX "posts_category_id" ON "posts" ("category_id");

INSERT INTO "posts" ("id", "user_id", "category_id", "content") VALUES (1, 1, 1, 'blog started');
INSERT INTO "posts" ("id", "user_id", "category_id", "content") VALUES (2, 1, 2, 'It works!');

DROP TABLE IF EXISTS "post_tags";
CREATE TABLE "post_tags" (
  "id" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "post_id" integer NOT NULL,
  "tag_id" integer NOT NULL,
  FOREIGN KEY ("tag_id") REFERENCES "tags" ("id") ON DELETE RESTRICT ON UPDATE RESTRICT,
  FOREIGN KEY ("post_id") REFERENCES "posts" ("id") ON DELETE RESTRICT ON UPDATE RESTRICT
);

CREATE UNIQUE INDEX "post_tags_post_id_tag_id" ON "post_tags" ("post_id", "tag_id");

INSERT INTO "post_tags" ("id", "post_id", "tag_id") VALUES (1, 1, 1);
INSERT INTO "post_tags" ("id", "post_id", "tag_id") VALUES (2, 1, 2);
INSERT INTO "post_tags" ("id", "post_id", "tag_id") VALUES (3, 2, 1);
INSERT INTO "post_tags" ("id", "post_id", "tag_id") VALUES (4, 2, 2);

DROP TABLE IF EXISTS "tags";
CREATE TABLE "tags" (
  "id" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "name" varchar(255) NOT NULL,
  "is_important" boolean NOT NULL
);

INSERT INTO "tags" ("id", "name", "is_important") VALUES (1, 'funny', 0);
INSERT INTO "tags" ("id", "name", "is_important") VALUES (2, 'important', 1);

DROP TABLE IF EXISTS "users";
CREATE TABLE "users" (
  "id" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "username" varchar(255) NOT NULL,
  "password" varchar(255) NOT NULL,
  "api_key" varchar(255) NULL,
  "location" text NULL
);

INSERT INTO "users" ("id", "username", "password", "api_key", "location") VALUES (1, 'user1', 'pass1', '123456789abc', NULL);
INSERT INTO "users" ("id", "username", "password", "api_key", "location") VALUES (2, 'user2', '$2y$10$cg7/nswxVZ0cmVIsMB/pVOh1OfcHScBJGq7Xu4KF9dFEQgRZ8HWe.', NULL, NULL);

DROP TABLE IF EXISTS "countries";
CREATE TABLE "countries" (
  "id" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "name" varchar(255) NOT NULL,
  "shape" text NOT NULL
);

INSERT INTO "countries" ("id", "name", "shape") VALUES (1, 'Left', 'POLYGON ((30 10, 40 40, 20 40, 10 20, 30 10))');
INSERT INTO "countries" ("id", "name", "shape") VALUES (2, 'Right', 'POLYGON ((70 10, 80 40, 60 40, 50 20, 70 10))');
INSERT INTO "countries" ("id", "name", "shape") VALUES (3, 'Point', 'POINT (30 10)');
INSERT INTO "countries" ("id", "name", "shape") VALUES (4, 'Line', 'LINESTRING (30 10, 10 30, 40 40)');
INSERT INTO "countries" ("id", "name", "shape") VALUES (5, 'Poly1', 'POLYGON ((30 10, 40 40, 20 40, 10 20, 30 10))');
INSERT INTO "countries" ("id", "name", "shape") VALUES (6, 'Poly2', 'POLYGON ((35 10, 45 45, 15 40, 10 20, 35 10),(20 30, 35 35, 30 20, 20 30))');
INSERT INTO "countries" ("id", "name", "shape") VALUES (7, 'Mpoint', 'MULTIPOINT (10 40, 40 30, 20 20, 30 10)');
INSERT INTO "countries" ("id", "name", "shape") VALUES (8, 'Mline', 'MULTILINESTRING ((10 10, 20 20, 10 40),(40 40, 30 30, 40 20, 30 10))');
INSERT INTO "countries" ("id", "name", "shape") VALUES (9, 'Mpoly1', 'MULTIPOLYGON (((30 20, 45 40, 10 40, 30 20)),((15 5, 40 10, 10 20, 5 10, 15 5)))');
INSERT INTO "countries" ("id", "name", "shape") VALUES (10, 'Mpoly2', 'MULTIPOLYGON (((40 40, 20 45, 45 30, 40 40)),((20 35, 10 30, 10 10, 30 5, 45 20, 20 35),(30 20, 20 15, 20 25, 30 20)))');
INSERT INTO "countries" ("id", "name", "shape") VALUES (11, 'Gcoll', 'GEOMETRYCOLLECTION(POINT(4 6),LINESTRING(4 6,7 10))');

DROP TABLE IF EXISTS "events";
CREATE TABLE "events" (
  "id" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "name" varchar(255) NOT NULL,
  "datetime" datetime,
  "visitors" bigint
);

INSERT INTO "events" ("id", "name", "datetime", "visitors") VALUES (1, 'Launch', '2016-01-01 13:01:01', 0);

DROP VIEW IF EXISTS "tag_usage";
CREATE VIEW "tag_usage" AS select "tags"."id" as "id", "name", count("name") AS "count" from "tags", "post_tags" where "tags"."id" = "post_tags"."tag_id" group by "tags"."id", "name" order by "count" desc, "name";

DROP TABLE IF EXISTS "products";
CREATE TABLE "products" (
  "id" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "name" varchar(255) NOT NULL,
  "price" decimal(10,2) NOT NULL,
  "properties" clob NOT NULL,
  "created_at" datetime NOT NULL,
  "deleted_at" datetime NULL
);

INSERT INTO "products" ("id", "name", "price", "properties", "created_at") VALUES (1, 'Calculator', '23.01', '{"depth":false,"model":"TRX-120","width":100,"height":null}', '1970-01-01 01:01:01');

DROP TABLE IF EXISTS "barcodes2";
DROP TABLE IF EXISTS "barcodes";
CREATE TABLE "barcodes" (
  "id" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "product_id" integer NOT NULL,
  "hex" varchar(255) NOT NULL,
  "bin" blob NOT NULL,
  "ip_address" varchar(15),
  FOREIGN KEY ("product_id") REFERENCES "products" ("id") ON DELETE RESTRICT ON UPDATE RESTRICT
);

INSERT INTO "barcodes" ("id", "product_id", "hex", "bin", "ip_address") VALUES (1, 1, '00ff01', 'AP8B', '127.0.0.1');

DROP TABLE IF EXISTS "kunsthåndværk";
CREATE TABLE "kunsthåndværk" (
  "id" varchar(36) NOT NULL PRIMARY KEY,
  "Umlauts ä_ö_ü-COUNT" integer NOT NULL UNIQUE,
  "user_id" integer NOT NULL,
  "invisible" varchar(36),
  "invisible_id" varchar(36),
  FOREIGN KEY ("user_id") REFERENCES "users" ("id") ON DELETE RESTRICT ON UPDATE RESTRICT,
  FOREIGN KEY ("invisible_id") REFERENCES "invisibles" ("id") ON DELETE RESTRICT ON UPDATE RESTRICT
);

INSERT INTO "kunsthåndværk" ("id", "Umlauts ä_ö_ü-COUNT", "user_id", "invisible", "invisible_id") VALUES ('e42c77c6-06a4-4502-816c-d112c7142e6d', 1, 1, NULL, 'e42c77c6-06a4-4502-816c-d112c7142e6d');
INSERT INTO "kunsthåndværk" ("id", "Umlauts ä_ö_ü-COUNT", "user_id", "invisible", "invisible_id") VALUES ('e31ecfe6-591f-4660-9fbd-1a232083037f', 2, 2, NULL, 'e42c77c6-06a4-4502-816c-d112c7142e6d');

DROP TABLE IF EXISTS "invisibles";
CREATE TABLE "invisibles" (
  "id" varchar(36) NOT NULL PRIMARY KEY
);

INSERT INTO "invisibles" ("id") VALUES ('e42c77c6-06a4-4502-816c-d112c7142e6d');

DROP TABLE IF EXISTS "nopk";
CREATE TABLE "nopk" (
  "id" varchar(36) NOT NULL
);

INSERT INTO "nopk" ("id") VALUES ('e42c77c6-06a4-4502-816c-d112c7142e6d');

PRAGMA foreign_keys = on;

--