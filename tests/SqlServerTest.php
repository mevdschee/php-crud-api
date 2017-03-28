<?php

require_once(__DIR__ . '/tests.php');

class SqlServerTest extends PHP_CRUD_API_Test
{
    public static function setUpBeforeClass()
    {
        self::setConfig('SQLServer');
        parent::setUpBeforeClass();
    }
}
