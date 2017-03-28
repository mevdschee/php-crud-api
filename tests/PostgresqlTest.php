<?php

require_once(__DIR__ . '/tests.php');

class PostgresqlTest extends PHP_CRUD_API_Test
{
    public static function setUpBeforeClass()
    {
        static::setConfig('PostgreSQL');
        parent::setUpBeforeClass();
    }
}
