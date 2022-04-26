<?php

namespace Tqdev\PhpCrudApi\Database;

class RealNameMapper
{
    private $tableMapping;
    private $reverseTableMapping;
    private $columnMapping;
    private $reverseColumnMapping;

    public function __construct(array $mapping)
    {
        $this->tableMapping = [];
        $this->reverseTableMapping = [];
        $this->columnMapping = [];
        $this->reverseColumnMapping = [];
        foreach ($mapping as $name=>$realName) {
            if (strpos($name,'.') && strpos($realName,'.')) {
                list($tableName, $columnName) = explode('.', $name, 2);
                list($tableRealName, $columnRealName) = explode('.', $realName, 2);
                $this->tableMapping[$tableName] = $tableRealName;
                $this->reverseTableMapping[$tableRealName] = $tableName;
                if (!isset($this->columnMapping[$tableName])) {
                    $this->columnMapping[$tableName] = [];
                }
                $this->columnMapping[$tableName][$columnName] = $columnRealName;
                if (!isset($this->reverseColumnMapping[$tableRealName])) {
                    $this->reverseColumnMapping[$tableRealName] = [];
                }
                $this->reverseColumnMapping[$tableRealName][$columnRealName] = $columnName;
            } else {
                $this->tableMapping[$name] = $realName;
                $this->reverseTableMapping[$realName] = $name;
            }
        }
    }

    public function getColumnRealName(string $tableName,string $columnName): string
    {
        return $this->reverseColumnMapping[$tableName][$columnName] ?? $columnName;
    }

    public function getTableRealName(string $tableName): string
    {
        return $this->reverseTableMapping[$tableName] ?? $tableName;
    }

    public function getColumnName(string $tableRealName,string $columnRealName): string
    {
        return $this->columnMapping[$tableRealName][$columnRealName] ?? $columnRealName;
    }

    public function getTableName(string $tableRealName): string
    {
        return $this->tableMapping[$tableRealName] ?? $tableRealName;
    }
}
