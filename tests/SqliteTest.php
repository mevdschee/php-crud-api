<?php

require_once(__DIR__ . '/tests.php');

class SqliteTest extends PHP_CRUD_API_Test
{
    public static function setUpBeforeClass()
    {
        self::setConfig('SQLite');
        parent::setUpBeforeClass();
    }
}
