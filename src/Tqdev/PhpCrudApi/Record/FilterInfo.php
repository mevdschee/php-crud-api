<?php

namespace Tqdev\PhpCrudApi\Record;

use Tqdev\PhpCrudApi\Column\Reflection\ReflectedTable;
use Tqdev\PhpCrudApi\Record\Condition\AndCondition;
use Tqdev\PhpCrudApi\Record\Condition\Condition;
use Tqdev\PhpCrudApi\Record\Condition\NoCondition;
use Tqdev\PhpCrudApi\Record\Condition\OrCondition;

class FilterInfo
{
    private function getConditionsAsPathTree(ReflectedTable $table, array $params): PathTree
    {
        $conditions = new PathTree();
        foreach ($params as $key => $filters) {
            if (substr($key, 0, 6) == 'filter') {
                preg_match_all('/\d+|\D+/', substr($key, 6), $matches);
                $path = $matches[0];
                foreach ($filters as $filter) {
                    $condition = Condition::fromString($table, $filter);
                    if (($condition instanceof NoCondition) == false) {
                        $conditions->put($path, $condition);
                    }
                }
            }
        }
        return $conditions;
    }

    private function combinePathTreeOfConditions(PathTree $tree): Condition
    {
        $andConditions = $tree->getValues();
        $and = AndCondition::fromArray($andConditions);
        $orConditions = [];
        foreach ($tree->getKeys() as $p) {
            $orConditions[] = $this->combinePathTreeOfConditions($tree->get($p));
        }
        $or = OrCondition::fromArray($orConditions);
        return $and->_and($or);
    }

    public function getCombinedConditions(ReflectedTable $table, array $params): Condition
    {
        return $this->combinePathTreeOfConditions($this->getConditionsAsPathTree($table, $params));
    }
}
