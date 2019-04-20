<?php
namespace Tqdev\PhpCrudApi\Column;

use Tqdev\PhpCrudApi\Column\Reflection\ReflectedColumn;
use Tqdev\PhpCrudApi\Column\Reflection\ReflectedTable;
use Tqdev\PhpCrudApi\Database\GenericDB;

class DefinitionService
{
    private $db;
    private $reflection;

    public function __construct(GenericDB $db, ReflectionService $reflection)
    {
        $this->db = $db;
        $this->reflection = $reflection;
    }

    public function updateTable(string $tableName, /* object */ $changes): bool
    {
        $table = $this->reflection->getTable($tableName);
        $newTable = ReflectedTable::fromJson((object) array_merge((array) $table->jsonSerialize(), (array) $changes));
        if ($table->getName() != $newTable->getName()) {
            if (!$this->db->definition()->renameTable($table->getName(), $newTable->getName())) {
                return false;
            }
        }
        return true;
    }

    public function updateColumn(string $tableName, string $columnName, /* object */ $changes): bool
    {
        $table = $this->reflection->getTable($tableName);
        $column = $table->getColumn($columnName);

        // remove constraints on other column
        $newColumn = ReflectedColumn::fromJson((object) array_merge((array) $column->jsonSerialize(), (array) $changes));
        if ($newColumn->getPk() != $column->getPk() && $table->hasPk()) {
            $oldColumn = $table->getPk();
            if ($oldColumn->getName() != $columnName) {
                $oldColumn->setPk(false);
                if (!$this->db->definition()->removeColumnPrimaryKey($table->getName(), $oldColumn->getName(), $oldColumn)) {
                    return false;
                }
            }
        }

        // remove constraints
        $newColumn = ReflectedColumn::fromJson((object) array_merge((array) $column->jsonSerialize(), ['pk' => false, 'fk' => false]));
        if ($newColumn->getPk() != $column->getPk() && !$newColumn->getPk()) {
            if (!$this->db->definition()->removeColumnPrimaryKey($table->getName(), $column->getName(), $newColumn)) {
                return false;
            }
        }
        if ($newColumn->getFk() != $column->getFk() && !$newColumn->getFk()) {
            if (!$this->db->definition()->removeColumnForeignKey($table->getName(), $column->getName(), $newColumn)) {
                return false;
            }
        }

        // name and type
        $newColumn = ReflectedColumn::fromJson((object) array_merge((array) $column->jsonSerialize(), (array) $changes));
        $newColumn->setPk(false);
        $newColumn->setFk('');
        if ($newColumn->getName() != $column->getName()) {
            if (!$this->db->definition()->renameColumn($table->getName(), $column->getName(), $newColumn)) {
                return false;
            }
        }
        if ($newColumn->getType() != $column->getType() ||
            $newColumn->getLength() != $column->getLength() ||
            $newColumn->getPrecision() != $column->getPrecision() ||
            $newColumn->getScale() != $column->getScale()
        ) {
            if (!$this->db->definition()->retypeColumn($table->getName(), $newColumn->getName(), $newColumn)) {
                return false;
            }
        }
        if ($newColumn->getNullable() != $column->getNullable()) {
            if (!$this->db->definition()->setColumnNullable($table->getName(), $newColumn->getName(), $newColumn)) {
                return false;
            }
        }

        // add constraints
        $newColumn = ReflectedColumn::fromJson((object) array_merge((array) $column->jsonSerialize(), (array) $changes));
        if ($newColumn->getFk()) {
            if (!$this->db->definition()->addColumnForeignKey($table->getName(), $newColumn->getName(), $newColumn)) {
                return false;
            }
        }
        if ($newColumn->getPk()) {
            if (!$this->db->definition()->addColumnPrimaryKey($table->getName(), $newColumn->getName(), $newColumn)) {
                return false;
            }
        }
        return true;
    }

    public function addTable( /* object */$definition)
    {
        $newTable = ReflectedTable::fromJson($definition);
        if (!$this->db->definition()->addTable($newTable)) {
            return false;
        }
        return true;
    }

    public function addColumn(string $tableName, /* object */ $definition)
    {
        $newColumn = ReflectedColumn::fromJson($definition);
        if (!$this->db->definition()->addColumn($tableName, $newColumn)) {
            return false;
        }
        if ($newColumn->getFk()) {
            if (!$this->db->definition()->addColumnForeignKey($tableName, $newColumn->getName(), $newColumn)) {
                return false;
            }
        }
        if ($newColumn->getPk()) {
            if (!$this->db->definition()->addColumnPrimaryKey($tableName, $newColumn->getName(), $newColumn)) {
                return false;
            }
        }
        return true;
    }

    public function removeTable(string $tableName)
    {
        if (!$this->db->definition()->removeTable($tableName)) {
            return false;
        }
        return true;
    }

    public function removeColumn(string $tableName, string $columnName)
    {
        $table = $this->reflection->getTable($tableName);
        $newColumn = $table->getColumn($columnName);
        if ($newColumn->getPk()) {
            $newColumn->setPk(false);
            if (!$this->db->definition()->removeColumnPrimaryKey($table->getName(), $newColumn->getName(), $newColumn)) {
                return false;
            }
        }
        if ($newColumn->getFk()) {
            $newColumn->setFk("");
            if (!$this->db->definition()->removeColumnForeignKey($tableName, $columnName, $newColumn)) {
                return false;
            }
        }
        if (!$this->db->definition()->removeColumn($tableName, $columnName)) {
            return false;
        }
        return true;
    }

}
