<?php
namespace Tqdev\PhpCrudApi\Cache;

class MemcachedCache extends MemcacheCache
{
    protected function create() /*: \Memcached*/
    {
        return new \Memcached();
    }

    public function set(string $key, string $value, int $ttl = 0): bool
    {
        return $this->memcache->set($this->prefix . $key, $value, $ttl);
    }
}
