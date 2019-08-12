<?php

namespace Tqdev\PhpCrudApi\Middleware\Communication;

class VariableStore
{
    public static $values = array();

    public static function get(string $key)
    {
        if (isset(self::$values[$key])) {
            return self::$values[$key];
        }
        return null;
    }

    public static function set(string $key, /* object */ $value)
    {
        self::$values[$key] = $value;
    }
}
