<?php
namespace Tqdev\PhpCrudApi\Cache;

interface Cache
{
    public function set(String $key, String $value, int $ttl = 0): bool;
    public function get(String $key): String;
    public function clear(): bool;
}
