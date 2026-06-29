<?php

namespace Tqdev\PhpCrudApi\Record\Condition;

use Tqdev\PhpCrudApi\Column\Reflection\ReflectedColumn;
use Tqdev\PhpCrudApi\Column\Reflection\ReflectedTable;

/**
 * Condition that filters the queried (outer) table by a condition on a related
 * table. It is rendered as a correlated "EXISTS" sub-query so that the outer
 * record is kept only when at least one matching related record exists. This is
 * how v3 supports filters on joined/child tables while keeping pagination and
 * count correct on the outer table.
 *
 * Three relation kinds are supported, mirroring the RelationJoiner:
 * - 'belongsTo': outer table has a foreign key to the related table.
 * - 'hasMany':   related table has a foreign key to the outer table.
 * - 'habtm':     outer and related table are linked by a junction table.
 */
class RelatedCondition extends Condition
{
    private $kind;
    private $outerColumn;
    private $relatedTable;
    private $relatedColumn;
    private $junctionTable;
    private $junctionToOuterColumn;
    private $junctionToRelatedColumn;
    private $condition;

    private function __construct(
        string $kind,
        ReflectedColumn $outerColumn,
        ReflectedTable $relatedTable,
        ReflectedColumn $relatedColumn,
        ?ReflectedTable $junctionTable,
        ?ReflectedColumn $junctionToOuterColumn,
        ?ReflectedColumn $junctionToRelatedColumn,
        Condition $condition
    ) {
        $this->kind = $kind;
        $this->outerColumn = $outerColumn;
        $this->relatedTable = $relatedTable;
        $this->relatedColumn = $relatedColumn;
        $this->junctionTable = $junctionTable;
        $this->junctionToOuterColumn = $junctionToOuterColumn;
        $this->junctionToRelatedColumn = $junctionToRelatedColumn;
        $this->condition = $condition;
    }

    public static function belongsTo(ReflectedColumn $outerFk, ReflectedTable $relatedTable, ReflectedColumn $relatedPk, Condition $condition): RelatedCondition
    {
        return new RelatedCondition('belongsTo', $outerFk, $relatedTable, $relatedPk, null, null, null, $condition);
    }

    public static function hasMany(ReflectedColumn $outerPk, ReflectedTable $relatedTable, ReflectedColumn $relatedFk, Condition $condition): RelatedCondition
    {
        return new RelatedCondition('hasMany', $outerPk, $relatedTable, $relatedFk, null, null, null, $condition);
    }

    public static function habtm(ReflectedColumn $outerPk, ReflectedTable $relatedTable, ReflectedColumn $relatedPk, ReflectedTable $junctionTable, ReflectedColumn $junctionToOuter, ReflectedColumn $junctionToRelated, Condition $condition): RelatedCondition
    {
        return new RelatedCondition('habtm', $outerPk, $relatedTable, $relatedPk, $junctionTable, $junctionToOuter, $junctionToRelated, $condition);
    }

    public function getKind(): string
    {
        return $this->kind;
    }

    public function getOuterColumn(): ReflectedColumn
    {
        return $this->outerColumn;
    }

    public function getRelatedTable(): ReflectedTable
    {
        return $this->relatedTable;
    }

    public function getRelatedColumn(): ReflectedColumn
    {
        return $this->relatedColumn;
    }

    public function getJunctionTable() /*: ?ReflectedTable*/
    {
        return $this->junctionTable;
    }

    public function getJunctionToOuterColumn() /*: ?ReflectedColumn*/
    {
        return $this->junctionToOuterColumn;
    }

    public function getJunctionToRelatedColumn() /*: ?ReflectedColumn*/
    {
        return $this->junctionToRelatedColumn;
    }

    public function getCondition(): Condition
    {
        return $this->condition;
    }
}
