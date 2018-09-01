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
    private $database;
    private $tables;

    public function __construct(GenericDB $db, Cache $cache, int $ttl)
    {
        $this->db = $db;
        $this->cache = $cache;
        $this->ttl = $ttl;
        $this->database = $this->loadTables(true);
        $this->tables = [];
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

    private function loadTable(String $tableName, bool $useCache): ReflectedTable
    {
        $data = $useCache ? $this->cache->get("ReflectedTable($tableName)") : '';
        if ($data != '') {
            $table = ReflectedTable::fromJson(json_decode(gzuncompress($data)));
        } else {
            $table = ReflectedTable::fromReflection($this->db->reflection(), $tableName);
            $data = gzcompress(json_encode($table, JSON_UNESCAPED_UNICODE));
            $this->cache->set("ReflectedTable($tableName)", $data, $this->ttl);
        }
        return $table;
    }

    public function refreshTables()
    {
        $this->database = $this->loadTables(false);
    }

    public function refreshTable(String $tableName)
    {
        $this->tables[$tableName] = $this->loadTable($tableName, false);
    }

    public function hasTable(String $tableName): bool
    {
        return $this->database->exists($tableName);
    }

    public function getTable(String $tableName): ReflectedTable
    {
        if (!isset($this->tables[$tableName])) {
            $this->tables[$tableName] = $this->loadTable($tableName, true);
        }
        return $this->tables[$tableName];
    }

    public function getTableNames(): array
    {
        return $this->database->getTables();
    }

    public function getDatabaseName(): String
    {
        return $this->database->getName();
    }
}
