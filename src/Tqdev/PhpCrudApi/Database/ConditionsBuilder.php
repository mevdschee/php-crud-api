<?php

namespace Tqdev\PhpCrudApi\Database;

use Tqdev\PhpCrudApi\Column\Reflection\ReflectedColumn;
use Tqdev\PhpCrudApi\Record\Condition\AndCondition;
use Tqdev\PhpCrudApi\Record\Condition\ColumnCondition;
use Tqdev\PhpCrudApi\Record\Condition\Condition;
use Tqdev\PhpCrudApi\Record\Condition\NoCondition;
use Tqdev\PhpCrudApi\Record\Condition\NotCondition;
use Tqdev\PhpCrudApi\Record\Condition\OrCondition;
use Tqdev\PhpCrudApi\Record\Condition\RelatedCondition;
use Tqdev\PhpCrudApi\Record\Condition\SpatialCondition;

class ConditionsBuilder
{
    private $driver;
    private $geometrySrid;
    private $aliasSeq;

    public function __construct(string $driver, int $geometrySrid)
    {
        $this->driver = $driver;
        $this->geometrySrid = $geometrySrid;
        $this->aliasSeq = 0;
    }

    private function nextAlias(): string
    {
        return '_cf' . $this->aliasSeq++;
    }

    private function getConditionSql(Condition $condition, array &$arguments, string $columnAlias = '', string $correlationRef = ''): string
    {
        if ($condition instanceof AndCondition) {
            return $this->getAndConditionSql($condition, $arguments, $columnAlias, $correlationRef);
        }
        if ($condition instanceof OrCondition) {
            return $this->getOrConditionSql($condition, $arguments, $columnAlias, $correlationRef);
        }
        if ($condition instanceof NotCondition) {
            return $this->getNotConditionSql($condition, $arguments, $columnAlias, $correlationRef);
        }
        if ($condition instanceof SpatialCondition) {
            return $this->getSpatialConditionSql($condition, $arguments, $columnAlias);
        }
        if ($condition instanceof RelatedCondition) {
            return $this->getRelatedConditionSql($condition, $arguments, $correlationRef);
        }
        if ($condition instanceof ColumnCondition) {
            return $this->getColumnConditionSql($condition, $arguments, $columnAlias);
        }
        throw new \Exception('Unknown Condition: ' . get_class($condition));
    }

    private function getAndConditionSql(AndCondition $and, array &$arguments, string $columnAlias = '', string $correlationRef = ''): string
    {
        $parts = [];
        foreach ($and->getConditions() as $condition) {
            $parts[] = $this->getConditionSql($condition, $arguments, $columnAlias, $correlationRef);
        }
        return '(' . implode(' AND ', $parts) . ')';
    }

    private function getOrConditionSql(OrCondition $or, array &$arguments, string $columnAlias = '', string $correlationRef = ''): string
    {
        $parts = [];
        foreach ($or->getConditions() as $condition) {
            $parts[] = $this->getConditionSql($condition, $arguments, $columnAlias, $correlationRef);
        }
        return '(' . implode(' OR ', $parts) . ')';
    }

    private function getNotConditionSql(NotCondition $not, array &$arguments, string $columnAlias = '', string $correlationRef = ''): string
    {
        $condition = $not->getCondition();
        return '(NOT ' . $this->getConditionSql($condition, $arguments, $columnAlias, $correlationRef) . ')';
    }

    private function quoteColumnName(ReflectedColumn $column, string $alias = ''): string
    {
        if ($alias !== '') {
            return '"' . $alias . '"."' . $column->getRealName() . '"';
        }
        return '"' . $column->getRealName() . '"';
    }

    private function getRelatedConditionSql(RelatedCondition $condition, array &$arguments, string $correlationRef): string
    {
        $relatedTable = '"' . $condition->getRelatedTable()->getRealName() . '"';
        $outerRef = $correlationRef . '.' . $this->quoteColumnName($condition->getOuterColumn());
        if ($condition->getKind() === 'habtm') {
            $junctionAlias = $this->nextAlias();
            $relatedAlias = $this->nextAlias();
            $junctionTable = '"' . $condition->getJunctionTable()->getRealName() . '"';
            $joinOn = $this->quoteColumnName($condition->getRelatedColumn(), $relatedAlias) . ' = ' . $this->quoteColumnName($condition->getJunctionToRelatedColumn(), $junctionAlias);
            $correlate = $this->quoteColumnName($condition->getJunctionToOuterColumn(), $junctionAlias) . ' = ' . $outerRef;
            $inner = $this->getConditionSql($condition->getCondition(), $arguments, $relatedAlias, '"' . $relatedAlias . '"');
            return 'EXISTS (SELECT 1 FROM ' . $junctionTable . ' "' . $junctionAlias . '" JOIN ' . $relatedTable . ' "' . $relatedAlias . '" ON ' . $joinOn . ' WHERE ' . $correlate . ' AND ' . $inner . ')';
        }
        $relatedAlias = $this->nextAlias();
        $correlate = $this->quoteColumnName($condition->getRelatedColumn(), $relatedAlias) . ' = ' . $outerRef;
        $inner = $this->getConditionSql($condition->getCondition(), $arguments, $relatedAlias, '"' . $relatedAlias . '"');
        return 'EXISTS (SELECT 1 FROM ' . $relatedTable . ' "' . $relatedAlias . '" WHERE ' . $correlate . ' AND ' . $inner . ')';
    }

    private function escapeLikeValue(string $value): string
    {
        // backslash is the declared LIKE escape character (see getLikeConditionSql),
        // so escape it along with the wildcards; SQL Server also treats '[' as the
        // start of a character class in LIKE patterns
        $special = $this->driver == 'sqlsrv' ? '\\%_[' : '\\%_';
        return addcslashes($value, $special);
    }

    private function getLikeConditionSql(string $column): string
    {
        // SQLite and SQL Server have no default LIKE escape character, so the
        // backslash added by escapeLikeValue must be declared explicitly; MySQL
        // and PostgreSQL already use the backslash as their default escape
        switch ($this->driver) {
            case 'sqlite':
            case 'sqlsrv':
                return "$column LIKE ? ESCAPE '\\'";
            default:
                return "$column LIKE ?";
        }
    }

    private function getColumnConditionSql(ColumnCondition $condition, array &$arguments, string $columnAlias = ''): string
    {
        $column = $this->quoteColumnName($condition->getColumn(), $columnAlias);
        $operator = $condition->getOperator();
        $value = $condition->getValue();
        $sql = 'FALSE';
        switch ($operator) {
            case 'cs':
                $sql = $this->getLikeConditionSql($column);
                $arguments[] = '%' . $this->escapeLikeValue($value) . '%';
                break;
            case 'sw':
                $sql = $this->getLikeConditionSql($column);
                $arguments[] = $this->escapeLikeValue($value) . '%';
                break;
            case 'ew':
                $sql = $this->getLikeConditionSql($column);
                $arguments[] = '%' . $this->escapeLikeValue($value);
                break;
            case 'eq':
                $sql = "$column = ?";
                $arguments[] = $value;
                break;
            case 'lt':
                $sql = "$column < ?";
                $arguments[] = $value;
                break;
            case 'le':
                $sql = "$column <= ?";
                $arguments[] = $value;
                break;
            case 'ge':
                $sql = "$column >= ?";
                $arguments[] = $value;
                break;
            case 'gt':
                $sql = "$column > ?";
                $arguments[] = $value;
                break;
            case 'bt':
                $parts = explode(',', $value, 2);
                $count = count($parts);
                if ($count == 2) {
                    $sql = "($column >= ? AND $column <= ?)";
                    $arguments[] = $parts[0];
                    $arguments[] = $parts[1];
                } else {
                    $sql = "FALSE";
                }
                break;
            case 'in':
                $parts = explode(',', $value);
                $count = count($parts);
                $qmarks = implode(',', str_split(str_repeat('?', $count)));
                $sql = "$column IN ($qmarks)";
                for ($i = 0; $i < $count; $i++) {
                    $arguments[] = $parts[$i];
                }
                break;
            case 'is':
                $sql = "$column IS NULL";
                break;
        }
        return $sql;
    }

    private function getSpatialFunctionName(string $operator): string
    {
        switch ($operator) {
            case 'co':
                return 'ST_Contains';
            case 'cr':
                return 'ST_Crosses';
            case 'di':
                return 'ST_Disjoint';
            case 'eq':
                return 'ST_Equals';
            case 'in':
                return 'ST_Intersects';
            case 'ov':
                return 'ST_Overlaps';
            case 'to':
                return 'ST_Touches';
            case 'wi':
                return 'ST_Within';
            case 'ic':
                return 'ST_IsClosed';
            case 'is':
                return 'ST_IsSimple';
            case 'iv':
                return 'ST_IsValid';
        }
        return '';
    }

    private function hasSpatialArgument(string $operator): bool
    {
        return in_array($operator, ['ic', 'is', 'iv']) ? false : true;
    }

    private function getSpatialFunctionCall(string $functionName, string $column, bool $hasArgument): string
    {
        $srid = $this->geometrySrid;
        switch ($this->driver) {
            case 'mysql':
            case 'pgsql':
                $argument = $hasArgument ? "ST_GeomFromText(?,$srid)" : '';
                return "$functionName($column, $argument)=TRUE";
            case 'sqlsrv':
                $functionName = str_replace('ST_', 'ST', $functionName);
                $argument = $hasArgument ? "geometry::STGeomFromText(?,$srid)" : '';
                return "$column.$functionName($argument)=1";
            case 'sqlite':
                $argument = $hasArgument ? '?' : '0';
                return "$functionName($column, $argument)=1";
        }
        return '';
    }

    private function getSpatialConditionSql(ColumnCondition $condition, array &$arguments, string $columnAlias = ''): string
    {
        $column = $this->quoteColumnName($condition->getColumn(), $columnAlias);
        $operator = $condition->getOperator();
        $value = $condition->getValue();
        $functionName = $this->getSpatialFunctionName($operator);
        $hasArgument = $this->hasSpatialArgument($operator);
        $sql = $this->getSpatialFunctionCall($functionName, $column, $hasArgument);
        if ($hasArgument) {
            $arguments[] = $value;
        }
        return $sql;
    }

    public function getWhereClause(Condition $condition, array &$arguments, string $tableRef = ''): string
    {
        if ($condition instanceof NoCondition) {
            return '';
        }
        $this->aliasSeq = 0;
        return ' WHERE ' . $this->getConditionSql($condition, $arguments, '', $tableRef);
    }
}
