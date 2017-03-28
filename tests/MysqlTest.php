<?php

require_once(__DIR__ . '/tests.php');

class MysqlTest extends PHP_CRUD_API_Test
{
    public static function setUpBeforeClass()
    {
        self::setConfig('MySQL');
        parent::setUpBeforeClass();
    }
}
