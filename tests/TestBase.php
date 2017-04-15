<?php

require_once(__DIR__ . '/Config.php');

abstract class TestBase extends PHPUnit_Framework_TestCase
{
    public static function setUpBeforeClass()
    {
        if (!Config::$config || !isset(Config::$config[static::NAME])) {
            self::markTestSkipped("Configuration in 'Config.php' not found.");
        }
        $config = Config::$config[static::NAME];
        $db = static::connect($config);
        static::checkVersion($db);
        $capabilities = static::getCapabilities($db);
        static::seedDatabase($db,$capabilities);
        static::disconnect($db);
        // set params for test
        static::$config = $config;
        static::$capabilities = $capabilities;
    }

    public static $config;
    public static $capabilities;

    const GIS = 1;
    const JSON = 2;

    public abstract function connect($db);

    public abstract function disconnect($db);

    public abstract function checkVersion($db);

    public abstract function getCapabilities($db);

    public abstract function seedDatabase($db,$capabilities);

}