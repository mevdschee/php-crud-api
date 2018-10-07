<?php
namespace Tqdev\PhpCrudApi\Cache;

use Tqdev\PhpCrudApi\Config;

class CacheFactory
{
    const PREFIX = 'phpcrudapi-%s-%s-%s-';

    private static function getPrefix(Config $config): String
    {
        $driver = $config->getDriver();
        $database = $config->getDatabase();
        $filehash = substr(md5(__FILE__), 0, 8);
        return sprintf(self::PREFIX, $driver, $database, $filehash);
    }

    public static function create(Config $config): Cache
    {
        switch ($config->getCacheType()) {
            case 'TempFile':
                $cache = new TempFileCache(self::getPrefix($config), $config->getCachePath());
                break;
            case 'Redis':
                $cache = new RedisCache(self::getPrefix($config), $config->getCachePath());
                break;
            case 'Memcache':
                $cache = new MemcacheCache(self::getPrefix($config), $config->getCachePath());
                break;
            case 'Memcached':
                $cache = new MemcachedCache(self::getPrefix($config), $config->getCachePath());
                break;
            default:
                $cache = new NoCache();
        }
        return $cache;
    }
}
