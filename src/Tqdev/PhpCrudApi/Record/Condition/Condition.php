<?php
namespace Tqdev\PhpCrudApi\Record\Condition;

use Tqdev\PhpCrudApi\Column\Reflection\ReflectedTable;

abstract class Condition
{
    public function _and(Condition $condition): Condition
    {
        if ($condition instanceof NoCondition) {
            return $this;
        }
        return new AndCondition($this, $condition);
    }

    public function _or(Condition $condition): Condition
    {
        if ($condition instanceof NoCondition) {
            return $this;
        }
        return new OrCondition($this, $condition);
    }

    public function _not(): Condition
    {
        return new NotCondition($this);
    }

    public static function fromString(ReflectedTable $table, string $value): Condition
    {
        $condition = new NoCondition();
        $parts = explode(',', $value, 3);
        if (count($parts) < 2) {
            return $condition;
        }
        if (count($parts) < 3) {
            $parts[2] = '';
        }
        $field = $table->getColumn($parts[0]);
        $command = $parts[1];
        $negate = false;
        $spatial = false;
        if (strlen($command) > 2) {
            if (substr($command, 0, 1) == 'n') {
                $negate = true;
                $command = substr($command, 1);
            }
            if (substr($command, 0, 1) == 's') {
                $spatial = true;
                $command = substr($command, 1);
            }
        }
        if ($spatial) {
            if (in_array($command, ['co', 'cr', 'di', 'eq', 'in', 'ov', 'to', 'wi', 'ic', 'is', 'iv'])) {
                $condition = new SpatialCondition($field, $command, $parts[2]);
            }
        } else {
            if (in_array($command, ['cs', 'sw', 'ew', 'eq', 'lt', 'le', 'ge', 'gt', 'bt', 'in', 'is'])) {
                $condition = new ColumnCondition($field, $command, $parts[2]);
            }
        }
        if ($negate) {
            $condition = $condition->_not();
        }
        return $condition;
    }

}
