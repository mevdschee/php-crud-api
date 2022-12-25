<?php

namespace Tqdev\PhpCrudApi\Database;

use Tqdev\PhpCrudApi\Column\Reflection\ReflectedColumn;

class ColumnConverter
{
    private $driver;
    private $geometrySrid;

    public function __construct(string $driver, int $geometrySrid)
    {
        $this->driver = $driver;
        $this->geometrySrid = $geometrySrid;
    }

    public function convertColumnValue(ReflectedColumn $column): string
    {
        if ($column->isBoolean()) {
            switch ($this->driver) {
                case 'mysql':
                    return "IFNULL(IF(?,TRUE,FALSE),NULL)";
                case 'pgsql':
                    return "?";
                case 'sqlsrv':
                    return "?";
            }
        }
        if ($column->isBinary()) {
            switch ($this->driver) {
                case 'mysql':
                    return "FROM_BASE64(?)";
                case 'pgsql':
                    return "decode(?, 'base64')";
                case 'sqlsrv':
                    return "CONVERT(XML, ?).value('.','varbinary(max)')";
            }
        }
        if ($column->isGeometry()) {
            $srid = $this->geometrySrid;
            switch ($this->driver) {
                case 'mysql':
                case 'pgsql':
                    return "ST_GeomFromText(?,$srid)";
                case 'sqlsrv':
                    return "geometry::STGeomFromText(?,$srid)";
            }
        }
        return '?';
    }

    public function convertColumnName(ReflectedColumn $column, $value): string
    {
        if ($column->isBinary()) {
            switch ($this->driver) {
                case 'mysql':
                    return "TO_BASE64($value) as $value";
                case 'pgsql':
                    return "encode($value::bytea, 'base64') as $value";
                case 'sqlsrv':
                    return "CASE WHEN $value IS NULL THEN NULL ELSE (SELECT CAST($value as varbinary(max)) FOR XML PATH(''), BINARY BASE64) END as $value";
            }
        }
        if ($column->isGeometry()) {
            switch ($this->driver) {
                case 'mysql':
                case 'pgsql':
                    return "ST_AsText($value) as $value";
                case 'sqlsrv':
                    return "REPLACE($value.STAsText(),' (','(') as $value";
            }
        }
        return $value;
    }
}
