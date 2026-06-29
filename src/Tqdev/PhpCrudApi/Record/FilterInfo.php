<?php

namespace Tqdev\PhpCrudApi\Record;

use Tqdev\PhpCrudApi\Column\Reflection\ReflectedTable;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Middleware\Communication\VariableStore;
use Tqdev\PhpCrudApi\Record\Condition\AndCondition;
use Tqdev\PhpCrudApi\Record\Condition\Condition;
use Tqdev\PhpCrudApi\Record\Condition\NoCondition;
use Tqdev\PhpCrudApi\Record\Condition\OrCondition;

class FilterInfo
{
    private $resolver;

    public function __construct(?ReflectionService $reflection = null)
    {
        $this->resolver = $reflection ? new RelationResolver($reflection) : null;
    }

    /**
     * Builds a condition from a single "filter" value. When the column part
     * contains a relation path (e.g. "comments.message"), it is compiled into a
     * RelatedCondition (correlated EXISTS) on the related table. Otherwise it is
     * a plain condition on the queried table, identical to v2.
     */
    private function conditionFromString(ReflectedTable $table, string $filter): Condition
    {
        $parts = explode(',', $filter, 3);
        if (count($parts) < 2) {
            return new NoCondition();
        }
        $fieldPath = $parts[0];
        if ($this->resolver === null || strpos($fieldPath, '.') === false) {
            return Condition::fromString($table, $filter);
        }
        $segments = explode('.', $fieldPath);
        $columnName = array_pop($segments);
        // walk the relation path to find the related (leaf) table
        $tables = array($table);
        foreach ($segments as $tableName) {
            $relatedTable = $this->resolver->getRelatedTable($tables[count($tables) - 1], $tableName);
            if ($relatedTable === null) {
                return new NoCondition();
            }
            $tables[] = $relatedTable;
        }
        $leafTable = $tables[count($tables) - 1];
        if (!$leafTable->hasColumn($columnName)) {
            return new NoCondition();
        }
        $command = $parts[1];
        $value = isset($parts[2]) ? $parts[2] : '';
        $condition = Condition::fromString($leafTable, $columnName . ',' . $command . ',' . $value);
        if ($condition instanceof NoCondition) {
            return $condition;
        }
        // wrap the leaf condition in a RelatedCondition per hop, from leaf to
        // root. at each hop the related table's authorization and multi-tenancy
        // conditions are applied inside the sub-query, just like they are on a
        // direct query of that table (see GenericDB::addMiddlewareConditions)
        for ($i = count($segments) - 1; $i >= 0; $i--) {
            $condition = $this->addMiddlewareConditions($tables[$i + 1], $condition);
            $condition = $this->resolver->relate($tables[$i], $segments[$i], $condition);
            if ($condition === null) {
                return new NoCondition();
            }
        }
        return $condition;
    }

    private function addMiddlewareConditions(ReflectedTable $table, Condition $condition): Condition
    {
        $tableName = $table->getName();
        $authorization = VariableStore::get("authorization.conditions.$tableName");
        if ($authorization) {
            $condition = $condition->_and($authorization);
        }
        $multiTenancy = VariableStore::get("multiTenancy.conditions.$tableName");
        if ($multiTenancy) {
            $condition = $condition->_and($multiTenancy);
        }
        return $condition;
    }

    private function getConditionsAsPathTree(ReflectedTable $table, array $params): PathTree
    {
        $conditions = new PathTree();
        foreach ($params as $key => $filters) {
            if (substr($key, 0, 6) == 'filter') {
                preg_match_all('/\d+|\D+/', substr($key, 6), $matches);
                $path = $matches[0];
                foreach ($filters as $filter) {
                    $condition = $this->conditionFromString($table, $filter);
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
