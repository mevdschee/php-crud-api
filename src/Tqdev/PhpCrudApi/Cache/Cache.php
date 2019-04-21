<?php
namespace Tqdev\PhpCrudApi\Cache;

interface Cache
{
    public function set(string $key, string $value, int $ttl = 0): bool;
    public function get(string $key): string;
    public function clear(): bool;
}
