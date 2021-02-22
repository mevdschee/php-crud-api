<?php

namespace Tqdev\PhpCrudApi\Cache\Base;

use Tqdev\PhpCrudApi\Cache\Cache;

class BaseCache implements Cache
{
    public function __construct()
    {
    }

    public function set(string $key, string $value, int $ttl = 0): bool
    {
        return true;
    }

    public function get(string $key): string
    {
        return '';
    }

    public function clear(): bool
    {
        return true;
    }
    
    public function ping(): int
    {
        $start = microtime(true);
        $this->get('__ping__');
        return intval((microtime(true)-$start)*1000000);
    }
}