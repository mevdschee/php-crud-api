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
        $this->database = null;
        $this->tables = [];
    }

    private function database(): ReflectedDatabase
    {
        if (!$this->database) {
            $this->database = $this->loadDatabase(true);
        }
        return $this->database;
    }

    private function loadDatabase(bool $useCache): ReflectedDatabase
    {
        $key = sprintf('%s-ReflectedDatabase', $this->db->getCacheKey());
        $data = $useCache ? $this->cache->get($key) : '';
        if ($data != '') {
            $database = ReflectedDatabase::fromJson(json_decode(gzuncompress($data)));
        } else {
            $database = ReflectedDatabase::fromReflection($this->db->reflection());
            $data = gzcompress(json_encode($database, JSON_UNESCAPED_UNICODE));
            $this->cache->set($key, $data, $this->ttl);
        }
        return $database;
    }

    private function loadTable(string $tableName, bool $useCache): ReflectedTable
    {
        $key = sprintf('%s-ReflectedTable(%s)', $this->db->getCacheKey(), $tableName);
        $data = $useCache ? $this->cache->get($key) : '';
        if ($data != '') {
            $table = ReflectedTable::fromJson(json_decode(gzuncompress($data)));
        } else {
            $tableType = $this->database()->getType($tableName);
            $table = ReflectedTable::fromReflection($this->db->reflection(), $tableName, $tableType);
            $data = gzcompress(json_encode($table, JSON_UNESCAPED_UNICODE));
            $this->cache->set($key, $data, $this->ttl);
        }
        return $table;
    }

    public function refreshTables()
    {
        $this->database = $this->loadDatabase(false);
    }

    public function refreshTable(string $tableName)
    {
        $this->tables[$tableName] = $this->loadTable($tableName, false);
    }

    public function hasTable(string $tableName): bool
    {
        return $this->database()->hasTable($tableName);
    }

    public function getType(string $tableName): string
    {
        return $this->database()->getType($tableName);
    }

    public function getTable(string $tableName): ReflectedTable
    {
        if (!isset($this->tables[$tableName])) {
            $this->tables[$tableName] = $this->loadTable($tableName, true);
        }
        return $this->tables[$tableName];
    }

    public function getTableNames(): array
    {
        return $this->database()->getTableNames();
    }

    public function getDatabaseName(): string
    {
        return $this->database()->getName();
    }

    public function removeTable(string $tableName): bool
    {
        unset($this->tables[$tableName]);
        return $this->database()->removeTable($tableName);
    }
}
