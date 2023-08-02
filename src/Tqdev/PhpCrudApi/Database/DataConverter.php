<?php

namespace Tqdev\PhpCrudApi\Database;

use Tqdev\PhpCrudApi\Column\Reflection\ReflectedColumn;
use Tqdev\PhpCrudApi\Column\Reflection\ReflectedTable;

class DataConverter
{
    private $driver;

    public function __construct(string $driver)
    {
        $this->driver = $driver;
    }

    private function convertRecordValue($conversion, $value)
    {
        $args = explode('|', $conversion);
        $type = array_shift($args);
        switch ($type) {
            case 'boolean':
                return $value ? true : false;
            case 'integer':
                return (int) $value;
            case 'float':
                return (float) $value;
            case 'decimal':
                return number_format($value, $args[0], '.', '');
        }
        return $value;
    }

    private function getRecordValueConversion(ReflectedColumn $column): string
    {
        if ($column->isBoolean()) {
            return 'boolean';
        }
        if (in_array($column->getType(), ['integer', 'bigint'])) {
            return 'integer';
        }
        if (in_array($column->getType(), ['float', 'double'])) {
            return 'float';
        }
        if (in_array($this->driver, ['sqlite']) && in_array($column->getType(), ['decimal'])) {
            return 'decimal|' . $column->getScale();
        }
        return 'none';
    }

    public function convertRecords(ReflectedTable $table, array $columnNames, array &$records) /*: void*/
    {
        foreach ($columnNames as $columnName) {
            $column = $table->getColumn($columnName);
            $conversion = $this->getRecordValueConversion($column);
            if ($conversion != 'none') {
                foreach ($records as $i => $record) {
                    $value = $records[$i][$columnName];
                    if ($value === null) {
                        continue;
                    }
                    $records[$i][$columnName] = $this->convertRecordValue($conversion, $value);
                }
            }
        }
    }

    private function convertInputValue($conversion, $value)
    {
        switch ($conversion) {
            case 'boolean':
                return filter_var($value, FILTER_VALIDATE_BOOLEAN) ? 1 : 0;
            case 'base64url_to_base64':
                return str_pad(strtr($value, '-_', '+/'), ceil(strlen($value) / 4) * 4, '=', STR_PAD_RIGHT);
        }
        return $value;
    }

    private function getInputValueConversion(ReflectedColumn $column): string
    {
        if ($column->isBoolean()) {
            return 'boolean';
        }
        if ($column->isBinary()) {
            return 'base64url_to_base64';
        }
        return 'none';
    }

    public function convertColumnValues(ReflectedTable $table, array &$columnValues) /*: void*/
    {
        $columnNames = array_keys($columnValues);
        foreach ($columnNames as $columnName) {
            $column = $table->getColumn($columnName);
            $conversion = $this->getInputValueConversion($column);
            if ($conversion != 'none') {
                $value = $columnValues[$columnName];
                if ($value !== null) {
                    $columnValues[$columnName] = $this->convertInputValue($conversion, $value);
                }
            }
        }
    }
}
