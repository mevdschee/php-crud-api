<?php

namespace Tqdev\PhpCrudApi\Database;

class TypeConverter
{
    private $driver;

    public function __construct(string $driver)
    {
        $this->driver = $driver;
    }

    private $fromJdbc = [
        'mysql' => [
            'clob' => 'longtext',
            'boolean' => 'tinyint(1)',
            'blob' => 'longblob',
            'timestamp' => 'datetime',
        ],
        'pgsql' => [
            'clob' => 'text',
            'blob' => 'bytea',
            'float' => 'real',
            'double' => 'double precision',
            'varbinary' => 'bytea',
        ],
        'sqlsrv' => [
            'boolean' => 'bit',
            'varchar' => 'nvarchar',
            'clob' => 'ntext',
            'blob' => 'image',
            'time' => 'time(0)',
            'timestamp' => 'datetime2(0)',
            'double' => 'float',
            'float' => 'real',
        ],
    ];

    private $toJdbc = [
        'simplified' => [
            'char' => 'varchar',
            'longvarchar' => 'clob',
            'nchar' => 'varchar',
            'nvarchar' => 'varchar',
            'longnvarchar' => 'clob',
            'binary' => 'varbinary',
            'longvarbinary' => 'blob',
            'tinyint' => 'integer',
            'smallint' => 'integer',
            'real' => 'float',
            'numeric' => 'decimal',
            'nclob' => 'clob',
            'time_with_timezone' => 'time',
            'timestamp_with_timezone' => 'timestamp',
        ],
        'mysql' => [
            'tinyint(1)' => 'boolean',
            'bit(1)' => 'boolean',
            'tinyblob' => 'blob',
            'mediumblob' => 'blob',
            'longblob' => 'blob',
            'tinytext' => 'clob',
            'mediumtext' => 'clob',
            'longtext' => 'clob',
            'text' => 'clob',
            'mediumint' => 'integer',
            'int' => 'integer',
            'polygon' => 'geometry',
            'point' => 'geometry',
            'linestring' => 'geometry',
            'multipoint' => 'geometry',
            'multilinestring' => 'geometry',
            'multipolygon' => 'geometry',
            'datetime' => 'timestamp',
            'year' => 'integer',
            'enum' => 'varchar',
            'set' => 'varchar',
            'json' => 'clob',
        ],
        'pgsql' => [
            'bigserial' => 'bigint',
            'bit varying' => 'bit',
            'box' => 'geometry',
            'bytea' => 'blob',
            'bpchar' => 'char',
            'character varying' => 'varchar',
            'character' => 'char',
            'cidr' => 'varchar',
            'circle' => 'geometry',
            'double precision' => 'double',
            'inet' => 'integer',
            //'interval [ fields ]'
            'json' => 'clob',
            'jsonb' => 'clob',
            'line' => 'geometry',
            'lseg' => 'geometry',
            'macaddr' => 'varchar',
            'money' => 'decimal',
            'path' => 'geometry',
            'point' => 'geometry',
            'polygon' => 'geometry',
            'real' => 'float',
            'serial' => 'integer',
            'text' => 'clob',
            'time without time zone' => 'time',
            'time with time zone' => 'time_with_timezone',
            'timestamp without time zone' => 'timestamp',
            'timestamp with time zone' => 'timestamp_with_timezone',
            //'tsquery'=
            //'tsvector'
            //'txid_snapshot'
            'uuid' => 'char',
            'xml' => 'clob',
        ],
        // source: https://docs.microsoft.com/en-us/sql/connect/jdbc/using-basic-data-types?view=sql-server-2017
        'sqlsrv' => [
            'varbinary()' => 'blob',
            'bit' => 'boolean',
            'datetime' => 'timestamp',
            'datetime2' => 'timestamp',
            'float' => 'double',
            'image' => 'blob',
            'int' => 'integer',
            'money' => 'decimal',
            'ntext' => 'clob',
            'smalldatetime' => 'timestamp',
            'smallmoney' => 'decimal',
            'text' => 'clob',
            'timestamp' => 'binary',
            'udt' => 'varbinary',
            'uniqueidentifier' => 'char',
            'xml' => 'clob',
        ],
        'sqlite' => [
            'tinytext' => 'clob',
            'text' => 'clob',
            'mediumtext' => 'clob',
            'longtext' => 'clob',
            'mediumint' => 'integer',
            'int' => 'integer',
            'bigint' => 'bigint',
            'int2' => 'smallint',
            'int4' => 'integer',
            'int8' => 'bigint',
            'double precision' => 'double',
            'datetime' => 'timestamp'
        ],
    ];

    // source: https://docs.oracle.com/javase/9/docs/api/java/sql/Types.html
    private $valid = [
        //'array' => true,
        'bigint' => true,
        'binary' => true,
        'bit' => true,
        'blob' => true,
        'boolean' => true,
        'char' => true,
        'clob' => true,
        //'datalink' => true,
        'date' => true,
        'decimal' => true,
        //'distinct' => true,
        'double' => true,
        'float' => true,
        'integer' => true,
        //'java_object' => true,
        'longnvarchar' => true,
        'longvarbinary' => true,
        'longvarchar' => true,
        'nchar' => true,
        'nclob' => true,
        //'null' => true,
        'numeric' => true,
        'nvarchar' => true,
        //'other' => true,
        'real' => true,
        //'ref' => true,
        //'ref_cursor' => true,
        //'rowid' => true,
        'smallint' => true,
        //'sqlxml' => true,
        //'struct' => true,
        'time' => true,
        'time_with_timezone' => true,
        'timestamp' => true,
        'timestamp_with_timezone' => true,
        'tinyint' => true,
        'varbinary' => true,
        'varchar' => true,
        // extra:
        'geometry' => true,
    ];

    public function toJdbc(string $type, string $size): string
    {
        $jdbcType = strtolower($type);
        if (isset($this->toJdbc[$this->driver]["$jdbcType($size)"])) {
            $jdbcType = $this->toJdbc[$this->driver]["$jdbcType($size)"];
        }
        if (isset($this->toJdbc[$this->driver][$jdbcType])) {
            $jdbcType = $this->toJdbc[$this->driver][$jdbcType];
        }
        if (isset($this->toJdbc['simplified'][$jdbcType])) {
            $jdbcType = $this->toJdbc['simplified'][$jdbcType];
        }
        if (!isset($this->valid[$jdbcType])) {
            //throw new \Exception("Unsupported type '$jdbcType' for driver '$this->driver'");
            $jdbcType = 'clob';
        }
        return $jdbcType;
    }

    public function fromJdbc(string $type): string
    {
        $jdbcType = strtolower($type);
        if (isset($this->fromJdbc[$this->driver][$jdbcType])) {
            $jdbcType = $this->fromJdbc[$this->driver][$jdbcType];
        }
        return $jdbcType;
    }
}
