<?php
namespace Tqdev\PhpCrudApi\Cache;

class MemcacheCache implements Cache
{
    protected $prefix;
    protected $memcache;

    public function __construct(string $prefix, string $config)
    {
        $this->prefix = $prefix;
        if ($config == '') {
            $address = 'localhost';
            $port = 11211;
        } elseif (strpos($config, ':') === false) {
            $address = $config;
            $port = 11211;
        } else {
            list($address, $port) = explode(':', $config);
        }
        $this->memcache = $this->create();
        $this->memcache->addServer($address, $port);
    }

    protected function create() /*: \Memcache*/
    {
        return new \Memcache();
    }

    public function set(string $key, string $value, int $ttl = 0): bool
    {
        return $this->memcache->set($this->prefix . $key, $value, 0, $ttl);
    }

    public function get(string $key): string
    {
        return $this->memcache->get($this->prefix . $key) ?: '';
    }

    public function clear(): bool
    {
        return $this->memcache->flush();
    }
}
