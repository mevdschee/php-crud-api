<?php
namespace Mevdschee\PhpCrudApi\Tests;

use PHPUnit\Framework\TestCase;

abstract class TestBase extends TestCase
{
    public static function setUpBeforeClass()
    {
        $name = static::getEngineName();
        if (!class_exists('Mevdschee\PhpCrudApi\Tests\Config')) {
            die("Configuration in 'Config.php' not found.\n");
        }
        if (!Config::$config || !isset(Config::$config[$name])) {
            self::markTestSkipped("Configuration in 'Config.php' not found.");
        }
        $config = Config::$config[$name];
        $db = static::connect($config);
        static::checkVersion($db);
        $capabilities = static::getCapabilities($db);
        static::seedDatabase($db, $capabilities);
        static::disconnect($db);
        // set params for test
        static::$config = $config;
        static::$capabilities = $capabilities;
    }

    public static $config;
    public static $capabilities;

    const GIS = 1;
    const JSON = 2;

    abstract public function getEngineName();

    abstract public function connect($db);

    abstract public function disconnect($db);

    abstract public function checkVersion($db);

    abstract public function getCapabilities($db);

    abstract public function seedDatabase($db, $capabilities);
}
