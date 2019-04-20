<?php
namespace Tqdev\PhpCrudApi\Cache;

class NoCache implements Cache
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
}
