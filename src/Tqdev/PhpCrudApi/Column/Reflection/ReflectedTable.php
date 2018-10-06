<?php
namespace Tqdev\PhpCrudApi\Column\Reflection;

use Tqdev\PhpCrudApi\Database\GenericReflection;

class ReflectedTable implements \JsonSerializable
{
    private $name;
    private $columns;
    private $pk;
    private $fks;

    public function __construct(String $name, array $columns)
    {
        $this->name = $name;
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

    public static function fromReflection(GenericReflection $reflection, String $name): ReflectedTable
    {
        // set columns
        $columns = [];
        foreach ($reflection->getTableColumns($name) as $tableColumn) {
            $column = ReflectedColumn::fromReflection($reflection, $tableColumn);
            $columns[$column->getName()] = $column;
        }
        // set primary key
        $columnNames = $reflection->getTablePrimaryKeys($name);
        if (count($columnNames) == 1) {
            $columnName = $columnNames[0];
            if (isset($columns[$columnName])) {
                $pk = $columns[$columnName];
                $pk->setPk(true);
            }
        }
        // set foreign keys
        $fks = $reflection->getTableForeignKeys($name);
        foreach ($fks as $columnName => $table) {
            $columns[$columnName]->setFk($table);
        }
        return new ReflectedTable($name, array_values($columns));
    }

    public static function fromJson( /* object */$json): ReflectedTable
    {
        $name = $json->name;
        $columns = [];
        if (isset($json->columns) && is_array($json->columns)) {
            foreach ($json->columns as $column) {
                $columns[] = ReflectedColumn::fromJson($column);
            }
        }
        return new ReflectedTable($name, $columns);
    }

    public function hasColumn(String $columnName): bool
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

    public function getName(): String
    {
        return $this->name;
    }

    public function columnNames(): array
    {
        return array_keys($this->columns);
    }

    public function getColumn($columnName): ReflectedColumn
    {
        return $this->columns[$columnName];
    }

    public function getFksTo(String $tableName): array
    {
        $columns = array();
        foreach ($this->fks as $columnName => $referencedTableName) {
            if ($tableName == $referencedTableName) {
                $columns[] = $this->columns[$columnName];
            }
        }
        return $columns;
    }

    public function removeColumn(String $columnName): bool
    {
        if (!isset($this->columns[$columnName])) {
            return false;
        }
        unset($this->columns[$columnName]);
        return true;
    }

    public function serialize()
    {
        return [
            'name' => $this->name,
            'columns' => array_values($this->columns),
        ];
    }

    public function jsonSerialize()
    {
        return $this->serialize();
    }
}
