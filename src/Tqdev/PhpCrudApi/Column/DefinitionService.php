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

    public function updateTable(ReflectedTable $table, /* object */ $changes): bool
    {
        $newTable = ReflectedTable::fromJson((object) array_merge((array) $table->jsonSerialize(), (array) $changes));
        if ($table->getRealName() != $newTable->getRealName()) {
            if (!$this->db->definition()->renameTable($table->getRealName(), $newTable->getRealName())) {
                return false;
            }
        }
        return true;
    }

    public function updateColumn(ReflectedTable $table, ReflectedColumn $column, /* object */ $changes): bool
    {
        // remove constraints on other column
        $newColumn = ReflectedColumn::fromJson((object) array_merge((array) $column->jsonSerialize(), (array) $changes));
        if ($newColumn->getPk() != $column->getPk() && $table->hasPk()) {
            $oldColumn = $table->getPk();
            if ($oldColumn->getRealName() != $column->getRealName()) {
                $oldColumn->setPk(false);
                if (!$this->db->definition()->removeColumnPrimaryKey($table->getRealName(), $oldColumn->getRealName(), $oldColumn)) {
                    return false;
                }
            }
        }

        // remove constraints
        $newColumn = ReflectedColumn::fromJson((object) array_merge((array) $column->jsonSerialize(), ['pk' => false, 'fk' => false]));
        if ($newColumn->getPk() != $column->getPk() && !$newColumn->getPk()) {
            if (!$this->db->definition()->removeColumnPrimaryKey($table->getRealName(), $column->getRealName(), $newColumn)) {
                return false;
            }
        }
        if ($newColumn->getFk() != $column->getFk() && !$newColumn->getFk()) {
            if (!$this->db->definition()->removeColumnForeignKey($table->getRealName(), $column->getRealName(), $newColumn)) {
                return false;
            }
        }

        // name and type
        $newColumn = ReflectedColumn::fromJson((object) array_merge((array) $column->jsonSerialize(), (array) $changes));
        $newColumn->setPk(false);
        $newColumn->setFk('');
        if ($newColumn->getRealName() != $column->getRealName()) {
            if (!$this->db->definition()->renameColumn($table->getRealName(), $column->getRealName(), $newColumn)) {
                return false;
            }
        }
        if (
            $newColumn->getType() != $column->getType() ||
            $newColumn->getLength() != $column->getLength() ||
            $newColumn->getPrecision() != $column->getPrecision() ||
            $newColumn->getScale() != $column->getScale()
        ) {
            if (!$this->db->definition()->retypeColumn($table->getRealName(), $newColumn->getRealName(), $newColumn)) {
                return false;
            }
        }
        if ($newColumn->getNullable() != $column->getNullable()) {
            if (!$this->db->definition()->setColumnNullable($table->getRealName(), $newColumn->getRealName(), $newColumn)) {
                return false;
            }
        }

        // add constraints
        $newColumn = ReflectedColumn::fromJson((object) array_merge((array) $column->jsonSerialize(), (array) $changes));
        if ($newColumn->getFk()) {
            if (!$this->db->definition()->addColumnForeignKey($table->getRealName(), $newColumn->getRealName(), $newColumn)) {
                return false;
            }
        }
        if ($newColumn->getPk()) {
            if (!$this->db->definition()->addColumnPrimaryKey($table->getRealName(), $newColumn->getRealName(), $newColumn)) {
                return false;
            }
        }
        return true;
    }

    public function addTable(/* object */$definition)
    {
        $newTable = ReflectedTable::fromJson($definition);
        if (!$this->db->definition()->addTable($newTable)) {
            return false;
        }
        return true;
    }

    public function addColumn(ReflectedTable $table, /* object */ $definition)
    {
        $newColumn = ReflectedColumn::fromJson($definition);
        if (!$this->db->definition()->addColumn($table->getRealName(), $newColumn)) {
            return false;
        }
        if ($newColumn->getFk()) {
            if (!$this->db->definition()->addColumnForeignKey($table->getRealName(), $newColumn->getRealName(), $newColumn)) {
                return false;
            }
        }
        if ($newColumn->getPk()) {
            if (!$this->db->definition()->addColumnPrimaryKey($table->getRealName(), $newColumn->getRealName(), $newColumn)) {
                return false;
            }
        }
        return true;
    }

    public function removeTable(ReflectedTable $table)
    {
        if (!$this->db->definition()->removeTable($table->getRealName())) {
            return false;
        }
        return true;
    }

    public function removeColumn(ReflectedTable $table, ReflectedColumn $column)
    {
        if ($column->getPk()) {
            $column->setPk(false);
            if (!$this->db->definition()->removeColumnPrimaryKey($table->getRealName(), $column->getRealName(), $column)) {
                return false;
            }
        }
        if ($column->getFk()) {
            $column->setFk("");
            if (!$this->db->definition()->removeColumnForeignKey($table->getRealName(), $column->getRealName(), $column)) {
                return false;
            }
        }
        if (!$this->db->definition()->removeColumn($table->getRealName(), $column->getRealName())) {
            return false;
        }
        return true;
    }
}
