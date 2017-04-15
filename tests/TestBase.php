<?php

require_once(__DIR__ . '/Config.php');

abstract class TestBase extends PHPUnit_Framework_TestCase
{
    protected function getConfig()
    {
        $dbengine = strtolower(substr(get_called_class(),0,-4));
        foreach (Config::$config as $database) {
            if (strtolower($database['dbengine']) == $dbengine) {
                if ($database['database']!='{{test_database}}') {
                    return $database;
                }
            }
        }
        self::markTestSkipped("Configuration for '{$dbengine}' in 'Config.php' not found.");
        return false;
    }

    public static function setUpBeforeClass()
    {
        $config = self::getConfig();
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

    public abstract function checkVersion($db);

    public abstract function getCapabilities($db);

    public abstract function seedDatabase($db,$capabilities);

}