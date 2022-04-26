<?php

namespace Tqdev\PhpCrudApi\Column\Reflection;

use Tqdev\PhpCrudApi\Database\GenericReflection;

class ReflectedTable implements \JsonSerializable
{
    private $name;
    private $realName;
    private $type;
    private $columns;
    private $pk;
    private $fks;

    public function __construct(string $name, string $realName, string $type, array $columns)
    {
        $this->name = $name;
        $this->realName = $realName;
        $this->type = $type;
        // set columns
        $this->columns = [];
        foreach ($columns as $column) {
            $columnName = $column->getName();
            $this->columns[$columnName] = $column;
        }
        // set primary key
        $this->pk = null;
        foreach ($columns as $column) {
            if ($column->getPk() == true) {
                $this->pk = $column;
            }
        }
        // set foreign keys
        $this->fks = [];
        foreach ($columns as $column) {
            $columnName = $column->getName();
            $referencedTableName = $column->getFk();
            if ($referencedTableName != '') {
                $this->fks[$columnName] = $referencedTableName;
            }
        }
    }

    public static function fromReflection(GenericReflection $reflection, string $name, string $realName, string $type): ReflectedTable
    {
        // set columns
        $columns = [];
        foreach ($reflection->getTableColumns($name, $type) as $tableColumn) {
            $column = ReflectedColumn::fromReflection($reflection, $tableColumn);
            $columns[$column->getName()] = $column;
        }
        // set primary key
        $columnName = false;
        if ($type == 'view') {
            $columnName = 'id';
        } else {
            $columnNames = $reflection->getTablePrimaryKeys($name);
            if (count($columnNames) == 1) {
                $columnName = $columnNames[0];
            }
        }
        if ($columnName && isset($columns[$columnName])) {
            $pk = $columns[$columnName];
            $pk->setPk(true);
        }
        // set foreign keys
        if ($type == 'view') {
            $tables = $reflection->getTables();
            foreach ($columns as $columnName => $column) {
                if (substr($columnName, -3) == '_id') {
                    foreach ($tables as $table) {
                        $tableName = $table['TABLE_NAME'];
                        $suffix = $tableName . '_id';
                        if (substr($columnName, -1 * strlen($suffix)) == $suffix) {
                            $column->setFk($tableName);
                        }
                    }
                }
            }
        } else {
            $fks = $reflection->getTableForeignKeys($name);
            foreach ($fks as $columnName => $table) {
                $columns[$columnName]->setFk($table);
            }
        }
        return new ReflectedTable($name, $realName, $type, array_values($columns));
    }

    public static function fromJson( /* object */$json): ReflectedTable
    {
        $name = $json->alias??$json->name;
        $realName = $json->name;
        $type = isset($json->type) ? $json->type : 'table';
        $columns = [];
        if (isset($json->columns) && is_array($json->columns)) {
            foreach ($json->columns as $column) {
                $columns[] = ReflectedColumn::fromJson($column);
            }
        }
        return new ReflectedTable($name, $realName, $type, $columns);
    }

    public function hasColumn(string $columnName): bool
    {
        return isset($this->columns[$columnName]);
    }

    public function hasPk(): bool
    {
        return $this->pk != null;
    }

    public function getPk() /*: ?ReflectedColumn */
    {
        return $this->pk;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRealName(): string
    {
        return $this->realName;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getColumnNames(): array
    {
        return array_keys($this->columns);
    }

    public function getColumn($columnName): ReflectedColumn
    {
        return $this->columns[$columnName];
    }

    public function getFksTo(string $tableName): array
    {
        $columns = array();
        foreach ($this->fks as $columnName => $referencedTableName) {
            if ($tableName == $referencedTableName && !is_null($this->columns[$columnName])) {
                $columns[] = $this->columns[$columnName];
            }
        }
        return $columns;
    }

    public function removeColumn(string $columnName): bool
    {
        if (!isset($this->columns[$columnName])) {
            return false;
        }
        unset($this->columns[$columnName]);
        return true;
    }

    public function serialize()
    {
        $json = [
            'name' => $this->realName,
            'alias' => $this->name!=$this->realName?$this->name:null,
            'type' => $this->type,
            'columns' => array_values($this->columns),
        ];
        return array_filter($json);
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return $this->serialize();
    }
}
