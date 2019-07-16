<?php
namespace Tqdev\PhpCrudApi\Cache;

class CacheFactory
{
    public static function create(string $type, string $prefix, string $config): Cache
    {
        switch ($type) {
            case 'TempFile':
                $cache = new TempFileCache($prefix, $config);
                break;
            case 'Redis':
                $cache = new RedisCache($prefix, $config);
                break;
            case 'Memcache':
                $cache = new MemcacheCache($prefix, $config);
                break;
            case 'Memcached':
                $cache = new MemcachedCache($prefix, $config);
                break;
            default:
                $cache = new NoCache();
        }
        return $cache;
    }
}
