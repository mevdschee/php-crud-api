<?php

namespace Tqdev\PhpCrudApi\Record;

use Tqdev\PhpCrudApi\Column\Reflection\ReflectedTable;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Record\Condition\Condition;
use Tqdev\PhpCrudApi\Record\Condition\RelatedCondition;

/**
 * Resolves a single relation hop from one table to a related table by name,
 * using the same belongsTo/hasMany/hasAndBelongsToMany detection as the
 * RelationJoiner. Used to compile filters that target related tables into
 * RelatedCondition (correlated EXISTS) trees.
 */
class RelationResolver
{
    private $reflection;

    public function __construct(ReflectionService $reflection)
    {
        $this->reflection = $reflection;
    }

    private function hasAndBelongsToMany(ReflectedTable $t1, ReflectedTable $t2) /*: ?ReflectedTable*/
    {
        foreach ($this->reflection->getTableNames() as $tableName) {
            $t3 = $this->reflection->getTable($tableName);
            if (count($t3->getFksTo($t1->getName())) > 0 && count($t3->getFksTo($t2->getName())) > 0) {
                return $t3;
            }
        }
        return null;
    }

    /**
     * Returns the related table reachable from $t1 under the name $t2Name, or
     * null when there is no such table or no relation between them.
     */
    public function getRelatedTable(ReflectedTable $t1, string $t2Name) /*: ?ReflectedTable*/
    {
        if (!$this->reflection->hasTable($t2Name)) {
            return null;
        }
        $t2 = $this->reflection->getTable($t2Name);
        $belongsTo = count($t1->getFksTo($t2->getName())) > 0;
        $hasMany = count($t2->getFksTo($t1->getName())) > 0;
        $habtm = (!$belongsTo && !$hasMany) ? ($this->hasAndBelongsToMany($t1, $t2) != null) : false;
        if (!$belongsTo && !$hasMany && !$habtm) {
            return null;
        }
        return $t2;
    }

    /**
     * Wraps $inner (a condition on the related table) in a RelatedCondition that
     * correlates the related table $t2Name back to $t1. Returns null when the
     * relation cannot be resolved or required keys are missing.
     */
    public function relate(ReflectedTable $t1, string $t2Name, Condition $inner) /*: ?RelatedCondition*/
    {
        if (!$this->reflection->hasTable($t2Name)) {
            return null;
        }
        $t2 = $this->reflection->getTable($t2Name);

        $fks1 = $t1->getFksTo($t2->getName());
        if (count($fks1) > 0) {
            // belongsTo: t1 has a foreign key referencing t2's primary key
            if (!$t2->hasPk()) {
                return null;
            }
            return RelatedCondition::belongsTo($fks1[0], $t2, $t2->getPk(), $inner);
        }

        $fks2 = $t2->getFksTo($t1->getName());
        if (count($fks2) > 0) {
            // hasMany: t2 has a foreign key referencing t1's primary key
            if (!$t1->hasPk()) {
                return null;
            }
            return RelatedCondition::hasMany($t1->getPk(), $t2, $fks2[0], $inner);
        }

        $t3 = $this->hasAndBelongsToMany($t1, $t2);
        if ($t3 != null) {
            // habtm: junction table t3 references both t1 and t2 primary keys
            if (!$t1->hasPk() || !$t2->hasPk()) {
                return null;
            }
            $junctionToOuter = $t3->getFksTo($t1->getName())[0];
            $junctionToRelated = $t3->getFksTo($t2->getName())[0];
            return RelatedCondition::habtm($t1->getPk(), $t2, $t2->getPk(), $t3, $junctionToOuter, $junctionToRelated, $inner);
        }

        return null;
    }
}
