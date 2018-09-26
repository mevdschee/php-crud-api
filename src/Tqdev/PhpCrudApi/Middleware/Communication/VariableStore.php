<?php
namespace Tqdev\PhpCrudApi\Middleware\Communication;

class VariableStore
{
    static $values = array();

    public static function get(String $key)
    {
        if (isset(self::$values[$key])) {
            return self::$values[$key];
        }
        return null;
    }

    public static function set(String $key, /* object */ $value)
    {
        self::$values[$key] = $value;
    }
}
