<?php

namespace Tqdev\PhpCrudApi\Record\Condition;

class NotCondition extends Condition
{
    private $condition;

    public function __construct(Condition $condition)
    {
        $this->condition = $condition;
    }

    public function getCondition(): Condition
    {
        return $this->condition;
    }
}
