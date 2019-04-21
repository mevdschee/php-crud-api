<?php
namespace Tqdev\PhpCrudApi\Record\Condition;

use Tqdev\PhpCrudApi\Column\Reflection\ReflectedColumn;

class ColumnCondition extends Condition
{
    private $column;
    private $operator;
    private $value;

    public function __construct(ReflectedColumn $column, string $operator, string $value)
    {
        $this->column = $column;
        $this->operator = $operator;
        $this->value = $value;
    }

    public function getColumn(): ReflectedColumn
    {
        return $this->column;
    }

    public function getOperator(): string
    {
        return $this->operator;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
