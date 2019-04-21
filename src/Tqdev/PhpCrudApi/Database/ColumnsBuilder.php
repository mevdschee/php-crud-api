<?php
namespace Tqdev\PhpCrudApi\Database;

use Tqdev\PhpCrudApi\Column\Reflection\ReflectedColumn;
use Tqdev\PhpCrudApi\Column\Reflection\ReflectedTable;

class ColumnsBuilder
{
    private $driver;
    private $converter;

    public function __construct(string $driver)
    {
        $this->driver = $driver;
        $this->converter = new ColumnConverter($driver);
    }

    public function getOffsetLimit(int $offset, int $limit): string
    {
        if ($limit < 0 || $offset < 0) {
            return '';
        }
        switch ($this->driver) {
            case 'mysql':return " LIMIT $offset, $limit";
            case 'pgsql':return " LIMIT $limit OFFSET $offset";
            case 'sqlsrv':return " OFFSET $offset ROWS FETCH NEXT $limit ROWS ONLY";
        }
    }

    private function quoteColumnName(ReflectedColumn $column): string
    {
        return '"' . $column->getName() . '"';
    }

    public function getOrderBy(ReflectedTable $table, array $columnOrdering): string
    {
        if (count($columnOrdering) == 0) {
            return '';
        }
        $results = array();
        foreach ($columnOrdering as $i => list($columnName, $ordering)) {
            $column = $table->getColumn($columnName);
            $quotedColumnName = $this->quoteColumnName($column);
            $results[] = $quotedColumnName . ' ' . $ordering;
        }
        return ' ORDER BY ' . implode(',', $results);
    }

    public function getSelect(ReflectedTable $table, array $columnNames): string
    {
        $results = array();
        foreach ($columnNames as $columnName) {
            $column = $table->getColumn($columnName);
            $quotedColumnName = $this->quoteColumnName($column);
            $quotedColumnName = $this->converter->convertColumnName($column, $quotedColumnName);
            $results[] = $quotedColumnName;
        }
        return implode(',', $results);
    }

    public function getInsert(ReflectedTable $table, array $columnValues): string
    {
        $columns = array();
        $values = array();
        foreach ($columnValues as $columnName => $columnValue) {
            $column = $table->getColumn($columnName);
            $quotedColumnName = $this->quoteColumnName($column);
            $columns[] = $quotedColumnName;
            $columnValue = $this->converter->convertColumnValue($column);
            $values[] = $columnValue;
        }
        $columnsSql = '(' . implode(',', $columns) . ')';
        $valuesSql = '(' . implode(',', $values) . ')';
        $outputColumn = $this->quoteColumnName($table->getPk());
        switch ($this->driver) {
            case 'mysql':return "$columnsSql VALUES $valuesSql";
            case 'pgsql':return "$columnsSql VALUES $valuesSql RETURNING $outputColumn";
            case 'sqlsrv':return "$columnsSql OUTPUT INSERTED.$outputColumn VALUES $valuesSql";
        }
    }

    public function getUpdate(ReflectedTable $table, array $columnValues): string
    {
        $results = array();
        foreach ($columnValues as $columnName => $columnValue) {
            $column = $table->getColumn($columnName);
            $quotedColumnName = $this->quoteColumnName($column);
            $columnValue = $this->converter->convertColumnValue($column);
            $results[] = $quotedColumnName . '=' . $columnValue;
        }
        return implode(',', $results);
    }

    public function getIncrement(ReflectedTable $table, array $columnValues): string
    {
        $results = array();
        foreach ($columnValues as $columnName => $columnValue) {
            if (!is_numeric($columnValue)) {
                continue;
            }
            $column = $table->getColumn($columnName);
            $quotedColumnName = $this->quoteColumnName($column);
            $columnValue = $this->converter->convertColumnValue($column);
            $results[] = $quotedColumnName . '=' . $quotedColumnName . '+' . $columnValue;
        }
        return implode(',', $results);
    }

}
