<?php
namespace PhpCrudApi\Tests;

abstract class TestBase extends \PHPUnit_Framework_TestCase
{
    public static function setUpBeforeClass()
    {
        $name = static::getEngineName();
        if (!Config::$config || !isset(Config::$config[$name])) {
            self::markTestSkipped("Configuration in 'Config.php' not found.");
        }
        $config = Config::$config[$name];
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

    public abstract function getEngineName();

    public abstract function connect($db);

    public abstract function disconnect($db);

    public abstract function checkVersion($db);

    public abstract function getCapabilities($db);

    public abstract function seedDatabase($db,$capabilities);

}