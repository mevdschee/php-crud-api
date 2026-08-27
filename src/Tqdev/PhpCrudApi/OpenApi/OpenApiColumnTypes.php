<?php

namespace Tqdev\PhpCrudApi\OpenApi;

use Tqdev\PhpCrudApi\Column\Reflection\ReflectedColumn;

/**
 * Turns a reflected column into the properties of a JSON Schema. Shared by the
 * builders that describe a record, the records of a table and the user that the
 * dbAuth end-points return.
 */
class OpenApiColumnTypes
{
    private $types = [
        'integer' => ['type' => 'integer', 'format' => 'int32'],
        'bigint' => ['type' => 'integer', 'format' => 'int64'],
        'varchar' => ['type' => 'string'],
        'clob' => ['type' => 'string', 'format' => 'large-string'], //custom format
        'varbinary' => ['type' => 'string', 'format' => 'byte'],
        'blob' => ['type' => 'string', 'format' => 'large-byte'], //custom format
        'decimal' => ['type' => 'string', 'format' => 'decimal'], //custom format
        'float' => ['type' => 'number', 'format' => 'float'],
        'double' => ['type' => 'number', 'format' => 'double'],
        'date' => ['type' => 'string', 'format' => 'date'],
        'time' => ['type' => 'string', 'format' => 'time'], //custom format
        'timestamp' => ['type' => 'string', 'format' => 'date-time'],
        'geometry' => ['type' => 'string', 'format' => 'geometry'], //custom format
        'boolean' => ['type' => 'boolean'],
    ];
    private $ranges = [
        'integer' => ['minimum' => -2147483648, 'maximum' => 2147483647],
        'bigint' => ['minimum' => -9223372036854775807 - 1, 'maximum' => 9223372036854775807],
    ];
    private $numericTypes = ['integer', 'bigint', 'decimal', 'float', 'double'];
    private function getPattern(ReflectedColumn $column): string
    {
        switch ($column->getType()) {
            case 'varchar':
                $l = $column->getLength();
                return '^.{0,' . $l . '}$';
            case 'clob':
                return '^.*$';
            case 'varbinary':
                $l = $column->getLength();
                $b = (int) 4 * ceil($l / 3);
                return '^[A-Za-z0-9+/]{0,' . $b . '}=*$';
            case 'blob':
                return '^[A-Za-z0-9+/]*=*$';
            case 'decimal':
                $p = $column->getPrecision();
                $s = $column->getScale();
                return '^-?[0-9]{1,' . ($p - $s) . '}(\.[0-9]{1,' . $s . '})?$';
            case 'date':
                return '^[0-9]{4}-[0-9]{2}-[0-9]{2}$';
            case 'time':
                return '^[0-9]{2}:[0-9]{2}:[0-9]{2}$';
            case 'timestamp':
                return '^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}$';
            case 'geometry':
                return '^(POINT|LINESTRING|POLYGON|MULTIPOINT|MULTILINESTRING|MULTIPOLYGON)\s*\(.*$';
        }
        return '';
    }

    public function getProperties(ReflectedColumn $column): array
    {
        $properties = $this->types[$column->getType()];
        switch ($properties['type']) {
            case 'string':
                if ($column->hasLength()) {
                    $properties['maxLength'] = $column->getLength();
                }
                $pattern = $this->getPattern($column);
                if ($pattern) {
                    $properties['pattern'] = $pattern;
                }
                break;
            case 'integer':
                $properties = array_merge($properties, $this->ranges[$column->getType()]);
                break;
        }
        if ($column->getNullable()) {
            $properties['nullable'] = true;
        }
        return $properties;
    }

    public function isNumeric(ReflectedColumn $column): bool
    {
        return in_array($column->getType(), $this->numericTypes);
    }
}
