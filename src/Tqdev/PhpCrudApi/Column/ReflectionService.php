<?php
namespace Tqdev\PhpCrudApi\Column;

use Tqdev\PhpCrudApi\Cache\Cache;
use Tqdev\PhpCrudApi\Column\Reflection\ReflectedDatabase;
use Tqdev\PhpCrudApi\Column\Reflection\ReflectedTable;
use Tqdev\PhpCrudApi\Database\GenericDB;

class ReflectionService
{
    private $db;
    private $cache;
    private $ttl;
    private $tables;

    public function __construct(GenericDB $db, Cache $cache, int $ttl)
    {
        $this->db = $db;
        $this->cache = $cache;
        $this->ttl = $ttl;
        $this->tables = $this->loadTables(true);
    }

    private function loadTables(bool $useCache): ReflectedDatabase
    {
        $data = $useCache ? $this->cache->get('ReflectedDatabase') : '';
        if ($data != '') {
            $tables = ReflectedDatabase::fromJson(json_decode(gzuncompress($data)));
        } else {
            $tables = ReflectedDatabase::fromReflection($this->db->reflection());
            $data = gzcompress(json_encode($tables, JSON_UNESCAPED_UNICODE));
            $this->cache->set('ReflectedDatabase', $data, $this->ttl);
        }
        return $tables;
    }

    public function refresh()
    {
        $this->tables = $this->loadTables(false);
    }

    public function hasTable(String $table): bool
    {
        return $this->tables->exists($table);
    }

    public function getTable(String $table): ReflectedTable
    {
        return $this->tables->get($table);
    }

    public function getDatabase(): ReflectedDatabase
    {
        return $this->tables;
    }
}
