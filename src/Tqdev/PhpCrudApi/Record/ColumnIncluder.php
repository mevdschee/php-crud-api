<?php
namespace Tqdev\PhpCrudApi\Record;

use Tqdev\PhpCrudApi\Column\Reflection\ReflectedTable;

class ColumnIncluder
{

    private function isMandatory(string $tableName, string $columnName, array $params): bool
    {
        return isset($params['mandatory']) && in_array($tableName . "." . $columnName, $params['mandatory']);
    }

    private function select(string $tableName, bool $primaryTable, array $params, string $paramName,
        array $columnNames, bool $include): array{
        if (!isset($params[$paramName])) {
            return $columnNames;
        }
        $columns = array();
        foreach (explode(',', $params[$paramName][0]) as $columnName) {
            $columns[$columnName] = true;
        }
        $result = array();
        foreach ($columnNames as $columnName) {
            $match = isset($columns['*.*']);
            if (!$match) {
                $match = isset($columns[$tableName . '.*']) || isset($columns[$tableName . '.' . $columnName]);
            }
            if ($primaryTable && !$match) {
                $match = isset($columns['*']) || isset($columns[$columnName]);
            }
            if ($match) {
                if ($include || $this->isMandatory($tableName, $columnName, $params)) {
                    $result[] = $columnName;
                }
            } else {
                if (!$include || $this->isMandatory($tableName, $columnName, $params)) {
                    $result[] = $columnName;
                }
            }
        }
        return $result;
    }

    public function getNames(ReflectedTable $table, bool $primaryTable, array $params): array
    {
        $tableName = $table->getName();
        $results = $table->getColumnNames();
        $results = $this->select($tableName, $primaryTable, $params, 'include', $results, true);
        $results = $this->select($tableName, $primaryTable, $params, 'exclude', $results, false);
        return $results;
    }

    public function getValues(ReflectedTable $table, bool $primaryTable, /* object */ $record, array $params): array
    {
        $results = array();
        $columnNames = $this->getNames($table, $primaryTable, $params);
        foreach ($columnNames as $columnName) {
            if (property_exists($record, $columnName)) {
                $results[$columnName] = $record->$columnName;
            }
        }
        return $results;
    }

}
