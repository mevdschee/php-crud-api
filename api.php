<?php
/**
 * PHP-CRUD-API v2              License: MIT
 * Maurits van der Schee: maurits@vdschee.nl
 * https://github.com/mevdschee/php-crud-api
 **/

namespace Tqdev\PhpCrudApi;

// file: src/Tqdev/PhpCrudApi/Cache/Cache.php

interface Cache
{
    public function set(String $key, String $value, int $ttl = 0): bool;
    public function get(String $key): String;
    public function clear(): bool;
}

// file: src/Tqdev/PhpCrudApi/Cache/CacheFactory.php

class CacheFactory
{
    const PREFIX = 'phpcrudapi-%s-';

    private static function getPrefix(): String
    {
        return sprintf(self::PREFIX, substr(md5(__FILE__), 0, 8));
    }

    public static function create(Config $config): Cache
    {
        switch ($config->getCacheType()) {
            case 'TempFile':
                $cache = new TempFileCache(self::getPrefix(), $config->getCachePath());
                break;
            case 'Redis':
                $cache = new RedisCache(self::getPrefix(), $config->getCachePath());
                break;
            case 'Memcache':
                $cache = new MemcacheCache(self::getPrefix(), $config->getCachePath());
                break;
            case 'Memcached':
                $cache = new MemcachedCache(self::getPrefix(), $config->getCachePath());
                break;
            default:
                $cache = new NoCache();
        }
        return $cache;
    }
}

// file: src/Tqdev/PhpCrudApi/Cache/MemcacheCache.php

class MemcacheCache implements Cache
{
    protected $prefix;
    protected $memcache;

    public function __construct(String $prefix, String $config)
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

    protected function create(): stdClass
    {
        return new \Memcache();
    }

    public function set(String $key, String $value, int $ttl = 0): bool
    {
        return $this->memcache->set($this->prefix . $key, $value, 0, $ttl);
    }

    public function get(String $key): String
    {
        return $this->memcache->get($this->prefix . $key) ?: '';
    }

    public function clear(): bool
    {
        return $this->memcache->flush();
    }
}

// file: src/Tqdev/PhpCrudApi/Cache/MemcachedCache.php

class MemcachedCache extends MemcacheCache
{
    protected function create(): stdClass
    {
        return new \Memcached();
    }

    public function set(String $key, String $value, int $ttl = 0): bool
    {
        return $this->memcache->set($this->prefix . $key, $value, $ttl);
    }
}

// file: src/Tqdev/PhpCrudApi/Cache/NoCache.php

class NoCache implements Cache
{
    public function __construct()
    {
    }

    public function set(String $key, String $value, int $ttl = 0): bool
    {
        return true;
    }

    public function get(String $key): String
    {
        return '';
    }

    public function clear(): bool
    {
        return true;
    }
}

// file: src/Tqdev/PhpCrudApi/Cache/RedisCache.php

class RedisCache implements Cache
{
    protected $prefix;
    protected $redis;

    public function __construct(String $prefix, String $config)
    {
        $this->prefix = $prefix;
        if ($config == '') {
            $config = '127.0.0.1';
        }
        $params = explode(':', $config, 6);
        if (isset($params[3])) {
            $params[3] = null;
        }
        $this->redis = new \Redis();
        call_user_func_array(array($this->redis, 'pconnect'), $params);
    }

    public function set(String $key, String $value, int $ttl = 0): bool
    {
        return $this->redis->set($this->prefix . $key, $value, $ttl);
    }

    public function get(String $key): String
    {
        return $this->redis->get($this->prefix . $key) ?: '';
    }

    public function clear(): bool
    {
        return $this->redis->flushDb();
    }
}

// file: src/Tqdev/PhpCrudApi/Cache/TempFileCache.php

class TempFileCache implements Cache
{
    const SUFFIX = 'cache';

    private $path;
    private $segments;

    public function __construct(String $prefix, String $config)
    {
        $this->segments = [];
        $s = DIRECTORY_SEPARATOR;
        $ps = PATH_SEPARATOR;
        if ($config == '') {
            $this->path = sys_get_temp_dir() . $s . $prefix . self::SUFFIX;
        } elseif (strpos($config, $ps) === false) {
            $this->path = $config;
        } else {
            list($path, $segments) = explode($ps, $config);
            $this->path = $path;
            $this->segments = explode(',', $segments);
        }
        if (file_exists($this->path) && is_dir($this->path)) {
            $this->clean($this->path, array_filter($this->segments), strlen(md5('')), false);
        }
    }

    private function getFileName(String $key): String
    {
        $s = DIRECTORY_SEPARATOR;
        $md5 = md5($key);
        $filename = rtrim($this->path, $s) . $s;
        $i = 0;
        foreach ($this->segments as $segment) {
            $filename .= substr($md5, $i, $segment) . $s;
            $i += $segment;
        }
        $filename .= substr($md5, $i);
        return $filename;
    }

    public function set(String $key, String $value, int $ttl = 0): bool
    {
        $filename = $this->getFileName($key);
        $dirname = dirname($filename);
        if (!file_exists($dirname)) {
            if (!mkdir($dirname, 0755, true)) {
                return false;
            }
        }
        $string = $ttl . '|' . $value;
        return $this->filePutContents($filename, $string) !== false;
    }

    private function filePutContents($filename, $string)
    {
        return file_put_contents($filename, $string, LOCK_EX);
    }

    private function fileGetContents($filename)
    {
        $file = fopen($filename, 'rb');
        if ($file === false) {
            return false;
        }
        $lock = flock($file, LOCK_SH);
        if (!$lock) {
            fclose($file);
            return false;
        }
        $string = '';
        while (!feof($file)) {
            $string .= fread($file, 8192);
        }
        flock($file, LOCK_UN);
        fclose($file);
        return $string;
    }

    private function getString($filename): String
    {
        $data = $this->fileGetContents($filename);
        if ($data === false) {
            return '';
        }
        list($ttl, $string) = explode('|', $data, 2);
        if ($ttl > 0 && time() - filemtime($filename) > $ttl) {
            return '';
        }
        return $string;
    }

    public function get(String $key): String
    {
        $filename = $this->getFileName($key);
        if (!file_exists($filename)) {
            return '';
        }
        $string = $this->getString($filename);
        if ($string == null) {
            return '';
        }
        return $string;
    }

    private function clean(String $path, array $segments, int $len, bool $all) /*: void*/
    {
        $entries = scandir($path);
        foreach ($entries as $entry) {
            if ($entry === '.' || $entry === '..') {
                continue;
            }
            $filename = $path . DIRECTORY_SEPARATOR . $entry;
            if (count($segments) == 0) {
                if (strlen($entry) != $len) {
                    continue;
                }
                if (is_file($filename)) {
                    if ($all || $this->getString($filename) == null) {
                        unlink($filename);
                    }
                }
            } else {
                if (strlen($entry) != $segments[0]) {
                    continue;
                }
                if (is_dir($filename)) {
                    $this->clean($filename, array_slice($segments, 1), $len - $segments[0], $all);
                    rmdir($filename);
                }
            }
        }
    }

    public function clear(): bool
    {
        if (!file_exists($this->path) || !is_dir($this->path)) {
            return false;
        }
        $this->clean($this->path, array_filter($this->segments), strlen(md5('')), true);
        return true;
    }
}

// file: src/Tqdev/PhpCrudApi/Column/Reflection/ReflectedColumn.php

class ReflectedColumn implements \JsonSerializable
{
    const DEFAULT_LENGTH = 255;
    const DEFAULT_PRECISION = 19;
    const DEFAULT_SCALE = 4;

    private $name;
    private $type;
    private $length;
    private $precision;
    private $scale;
    private $nullable;
    private $pk;
    private $fk;

    public function __construct(String $name, String $type, int $length, int $precision, int $scale, bool $nullable, bool $pk, String $fk)
    {
        $this->name = $name;
        $this->type = $type;
        $this->length = $length;
        $this->precision = $precision;
        $this->scale = $scale;
        $this->nullable = $nullable;
        $this->pk = $pk;
        $this->fk = $fk;
        $this->sanitize();
    }

    public static function fromReflection(GenericReflection $reflection, array $columnResult): ReflectedColumn
    {
        $name = $columnResult['COLUMN_NAME'];
        $length = (int) $columnResult['CHARACTER_MAXIMUM_LENGTH'];
        $type = $reflection->toJdbcType($columnResult['DATA_TYPE'], $length);
        $precision = (int) $columnResult['NUMERIC_PRECISION'];
        $scale = (int) $columnResult['NUMERIC_SCALE'];
        $nullable = in_array(strtoupper($columnResult['IS_NULLABLE']), ['TRUE', 'YES', 'T', 'Y', '1']);
        $pk = false;
        $fk = '';
        return new ReflectedColumn($name, $type, $length, $precision, $scale, $nullable, $pk, $fk);
    }

    public static function fromJson( /* object */$json): ReflectedColumn
    {
        $name = $json->name;
        $type = $json->type;
        $length = isset($json->length) ? $json->length : 0;
        $precision = isset($json->precision) ? $json->precision : 0;
        $scale = isset($json->scale) ? $json->scale : 0;
        $nullable = isset($json->nullable) ? $json->nullable : false;
        $pk = isset($json->pk) ? $json->pk : false;
        $fk = isset($json->fk) ? $json->fk : '';
        return new ReflectedColumn($name, $type, $length, $precision, $scale, $nullable, $pk, $fk);
    }

    private function sanitize()
    {
        $this->length = $this->hasLength() ? $this->getLength() : 0;
        $this->precision = $this->hasPrecision() ? $this->getPrecision() : 0;
        $this->scale = $this->hasScale() ? $this->getScale() : 0;
    }

    public function getName(): String
    {
        return $this->name;
    }

    public function getNullable(): bool
    {
        return $this->nullable;
    }

    public function getType(): String
    {
        return $this->type;
    }

    public function getLength(): int
    {
        return $this->length ?: self::DEFAULT_LENGTH;
    }

    public function getPrecision(): int
    {
        return $this->precision ?: self::DEFAULT_PRECISION;
    }

    public function getScale(): int
    {
        return $this->scale ?: self::DEFAULT_SCALE;
    }

    public function hasLength(): bool
    {
        return in_array($this->type, ['varchar', 'varbinary']);
    }

    public function hasPrecision(): bool
    {
        return $this->type == 'decimal';
    }

    public function hasScale(): bool
    {
        return $this->type == 'decimal';
    }

    public function isBinary(): bool
    {
        return in_array($this->type, ['blob', 'varbinary']);
    }

    public function isBoolean(): bool
    {
        return $this->type == 'boolean';
    }

    public function isGeometry(): bool
    {
        return $this->type == 'geometry';
    }

    public function setPk($value) /*: void*/
    {
        $this->pk = $value;
    }

    public function getPk(): bool
    {
        return $this->pk;
    }

    public function setFk($value) /*: void*/
    {
        $this->fk = $value;
    }

    public function getFk(): String
    {
        return $this->fk;
    }

    public function serialize()
    {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'length' => $this->length,
            'precision' => $this->precision,
            'scale' => $this->scale,
            'nullable' => $this->nullable,
            'pk' => $this->pk,
            'fk' => $this->fk,
        ];
    }

    public function jsonSerialize()
    {
        return array_filter($this->serialize());
    }
}

// file: src/Tqdev/PhpCrudApi/Column/Reflection/ReflectedDatabase.php

class ReflectedDatabase implements \JsonSerializable
{
    private $name;
    private $tableNames;

    public function __construct(String $name, array $tableNames)
    {
        $this->name = $name;
        $this->tableNames = [];
        foreach ($tableNames as $tableName) {
            $this->tableNames[$tableName] = true;
        }
    }

    public static function fromReflection(GenericReflection $reflection): ReflectedDatabase
    {
        $name = $reflection->getDatabaseName();
        $tableNames = [];
        foreach ($reflection->getTables() as $table) {
            $tableName = $table['TABLE_NAME'];
            if (in_array($tableName, $reflection->getIgnoredTables())) {
                continue;
            }
            $tableNames[$tableName] = true;
        }
        return new ReflectedDatabase($name, array_keys($tableNames));
    }

    public static function fromJson( /* object */$json): ReflectedDatabase
    {
        $name = $json->name;
        $tableNames = $json->tables;
        return new ReflectedDatabase($name, $tableNames);
    }

    public function getName(): String
    {
        return $this->name;
    }

    public function exists(String $tableName): bool
    {
        return isset($this->tableNames[$tableName]);
    }

    public function getTableNames(): array
    {
        return array_keys($this->tableNames);
    }

    public function removeTable(String $tableName): bool
    {
        if (!isset($this->tableNames[$tableName])) {
            return false;
        }
        unset($this->tableNames[$tableName]);
        return true;
    }

    public function serialize()
    {
        return [
            'name' => $this->name,
            'tables' => array_keys($this->tableNames),
        ];
    }

    public function jsonSerialize()
    {
        return $this->serialize();
    }
}

// file: src/Tqdev/PhpCrudApi/Column/Reflection/ReflectedTable.php

class ReflectedTable implements \JsonSerializable
{
    private $name;
    private $columns;
    private $pk;
    private $fks;

    public function __construct(String $name, array $columns)
    {
        $this->name = $name;
        $this->columns = [];
        foreach ($columns as $column) {
            $columnName = $column->getName();
            $this->columns[$columnName] = $column;
        }
        $this->pk = null;
        foreach ($columns as $column) {
            if ($column->getPk() == true) {
                $this->pk = $column;
            }
        }
        $this->fks = [];
        foreach ($columns as $column) {
            $columnName = $column->getName();
            $referencedTableName = $column->getFk();
            if ($referencedTableName != '') {
                $this->fks[$columnName] = $referencedTableName;
            }
        }
    }

    public static function fromReflection(GenericReflection $reflection, String $name): ReflectedTable
    {
        $columns = [];
        foreach ($reflection->getTableColumns($name) as $tableColumn) {
            $column = ReflectedColumn::fromReflection($reflection, $tableColumn);
            $columns[$column->getName()] = $column;
        }
        $columnNames = $reflection->getTablePrimaryKeys($name);
        if (count($columnNames) == 1) {
            $columnName = $columnNames[0];
            if (isset($columns[$columnName])) {
                $pk = $columns[$columnName];
                $pk->setPk(true);
            }
        }
        $fks = $reflection->getTableForeignKeys($name);
        foreach ($fks as $columnName => $table) {
            $columns[$columnName]->setFk($table);
        }
        return new ReflectedTable($name, array_values($columns));
    }

    public static function fromJson( /* object */$json): ReflectedTable
    {
        $name = $json->name;
        $columns = [];
        if (isset($json->columns) && is_array($json->columns)) {
            foreach ($json->columns as $column) {
                $columns[] = ReflectedColumn::fromJson($column);
            }
        }
        return new ReflectedTable($name, $columns);
    }

    public function exists(String $columnName): bool
    {
        return isset($this->columns[$columnName]);
    }

    public function hasPk(): bool
    {
        return $this->pk != null;
    }

    public function getPk() /*: ?ReflectedColumn */
    {
        return $this->pk;
    }

    public function getName(): String
    {
        return $this->name;
    }

    public function columnNames(): array
    {
        return array_keys($this->columns);
    }

    public function get($columnName): ReflectedColumn
    {
        return $this->columns[$columnName];
    }

    public function getFksTo(String $tableName): array
    {
        $columns = array();
        foreach ($this->fks as $columnName => $referencedTableName) {
            if ($tableName == $referencedTableName) {
                $columns[] = $this->columns[$columnName];
            }
        }
        return $columns;
    }

    public function removeColumn(String $columnName): bool
    {
        if (!isset($this->columns[$columnName])) {
            return false;
        }
        unset($this->columns[$columnName]);
        return true;
    }

    public function serialize()
    {
        return [
            'name' => $this->name,
            'columns' => array_values($this->columns),
        ];
    }

    public function jsonSerialize()
    {
        return $this->serialize();
    }
}

// file: src/Tqdev/PhpCrudApi/Column/DefinitionService.php

class DefinitionService
{
    private $db;
    private $reflection;

    public function __construct(GenericDB $db, ReflectionService $reflection)
    {
        $this->db = $db;
        $this->reflection = $reflection;
    }

    public function updateTable(String $tableName, /* object */ $changes): bool
    {
        $table = $this->reflection->getTable($tableName);
        $newTable = ReflectedTable::fromJson((object) array_merge((array) $table->jsonSerialize(), (array) $changes));
        if ($table->getName() != $newTable->getName()) {
            if (!$this->db->definition()->renameTable($table->getName(), $newTable->getName())) {
                return false;
            }
        }
        return true;
    }

    public function updateColumn(String $tableName, String $columnName, /* object */ $changes): bool
    {
        $table = $this->reflection->getTable($tableName);
        $column = $table->get($columnName);

        $newColumn = ReflectedColumn::fromJson((object) array_merge((array) $column->jsonSerialize(), (array) $changes));
        if ($newColumn->getPk() != $column->getPk() && $table->hasPk()) {
            $oldColumn = $table->getPk();
            if ($oldColumn->getName() != $columnName) {
                $oldColumn->setPk(false);
                if (!$this->db->definition()->removeColumnPrimaryKey($table->getName(), $oldColumn->getName(), $oldColumn)) {
                    return false;
                }
            }
        }

        $newColumn = ReflectedColumn::fromJson((object) array_merge((array) $column->jsonSerialize(), ['pk' => false, 'fk' => false]));
        if ($newColumn->getPk() != $column->getPk() && !$newColumn->getPk()) {
            if (!$this->db->definition()->removeColumnPrimaryKey($table->getName(), $column->getName(), $newColumn)) {
                return false;
            }
        }
        if ($newColumn->getFk() != $column->getFk() && !$newColumn->getFk()) {
            if (!$this->db->definition()->removeColumnForeignKey($table->getName(), $column->getName(), $newColumn)) {
                return false;
            }
        }

        $newColumn = ReflectedColumn::fromJson((object) array_merge((array) $column->jsonSerialize(), (array) $changes));
        $newColumn->setPk(false);
        $newColumn->setFk('');
        if ($newColumn->getName() != $column->getName()) {
            if (!$this->db->definition()->renameColumn($table->getName(), $column->getName(), $newColumn)) {
                return false;
            }
        }
        if ($newColumn->getType() != $column->getType() ||
            $newColumn->getLength() != $column->getLength() ||
            $newColumn->getPrecision() != $column->getPrecision() ||
            $newColumn->getScale() != $column->getScale()
        ) {
            if (!$this->db->definition()->retypeColumn($table->getName(), $newColumn->getName(), $newColumn)) {
                return false;
            }
        }
        if ($newColumn->getNullable() != $column->getNullable()) {
            if (!$this->db->definition()->setColumnNullable($table->getName(), $newColumn->getName(), $newColumn)) {
                return false;
            }
        }

        $newColumn = ReflectedColumn::fromJson((object) array_merge((array) $column->jsonSerialize(), (array) $changes));
        if ($newColumn->getFk()) {
            if (!$this->db->definition()->addColumnForeignKey($table->getName(), $newColumn->getName(), $newColumn)) {
                return false;
            }
        }
        if ($newColumn->getPk()) {
            if (!$this->db->definition()->addColumnPrimaryKey($table->getName(), $newColumn->getName(), $newColumn)) {
                return false;
            }
        }
        return true;
    }

    public function addTable( /* object */$definition)
    {
        $newTable = ReflectedTable::fromJson($definition);
        if (!$this->db->definition()->addTable($newTable)) {
            return false;
        }
        return true;
    }

    public function addColumn(String $tableName, /* object */ $definition)
    {
        $newColumn = ReflectedColumn::fromJson($definition);
        if (!$this->db->definition()->addColumn($tableName, $newColumn)) {
            return false;
        }
        if ($newColumn->getFk()) {
            if (!$this->db->definition()->addColumnForeignKey($tableName, $newColumn->getName(), $newColumn)) {
                return false;
            }
        }
        if ($newColumn->getPk()) {
            if (!$this->db->definition()->addColumnPrimaryKey($tableName, $newColumn->getName(), $newColumn)) {
                return false;
            }
        }
        return true;
    }

    public function removeTable(String $tableName)
    {
        if (!$this->db->definition()->removeTable($tableName)) {
            return false;
        }
        return true;
    }

    public function removeColumn(String $tableName, String $columnName)
    {
        $table = $this->reflection->getTable($tableName);
        $newColumn = $table->get($columnName);
        if ($newColumn->getPk()) {
            $newColumn->setPk(false);
            if (!$this->db->definition()->removeColumnPrimaryKey($table->getName(), $newColumn->getName(), $newColumn)) {
                return false;
            }
        }
        if ($newColumn->getFk()) {
            $newColumn->setFk("");
            if (!$this->db->definition()->removeColumnForeignKey($tableName, $columnName, $newColumn)) {
                return false;
            }
        }
        if (!$this->db->definition()->removeColumn($tableName, $columnName)) {
            return false;
        }
        return true;
    }

}

// file: src/Tqdev/PhpCrudApi/Column/ReflectionService.php

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
        $this->database = $this->loadDatabase(true);
        $this->tables = [];
    }

    private function loadDatabase(bool $useCache): ReflectedDatabase
    {
        $data = $useCache ? $this->cache->get('ReflectedDatabase') : '';
        if ($data != '') {
            $database = ReflectedDatabase::fromJson(json_decode(gzuncompress($data)));
        } else {
            $database = ReflectedDatabase::fromReflection($this->db->reflection());
            $data = gzcompress(json_encode($database, JSON_UNESCAPED_UNICODE));
            $this->cache->set('ReflectedDatabase', $data, $this->ttl);
        }
        return $database;
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
        $this->database = $this->loadDatabase(false);
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
        return $this->database->getTableNames();
    }

    public function getDatabaseName(): String
    {
        return $this->database->getName();
    }

    public function removeTable(String $tableName): bool
    {
        unset($this->tables[$tableName]);
        return $this->database->removeTable($tableName);
    }

    public function removeColumn(String $tableName, String $columnName): bool
    {
        return $this->getTable($tableName)->removeColumn($columnName);
    }
}

// file: src/Tqdev/PhpCrudApi/Controller/CacheController.php

class CacheController
{
    private $cache;
    private $responder;

    public function __construct(Router $router, Responder $responder, Cache $cache)
    {
        $router->register('GET', '/cache/clear', array($this, 'clear'));
        $this->cache = $cache;
        $this->responder = $responder;
    }

    public function clear(Request $request): Response
    {
        return $this->responder->success($this->cache->clear());
    }

}

// file: src/Tqdev/PhpCrudApi/Controller/ColumnController.php

class ColumnController
{
    private $responder;
    private $reflection;
    private $definition;

    public function __construct(Router $router, Responder $responder, ReflectionService $reflection, DefinitionService $definition)
    {
        $router->register('GET', '/columns', array($this, 'getDatabase'));
        $router->register('GET', '/columns/*', array($this, 'getTable'));
        $router->register('GET', '/columns/*/*', array($this, 'getColumn'));
        $router->register('PUT', '/columns/*', array($this, 'updateTable'));
        $router->register('PUT', '/columns/*/*', array($this, 'updateColumn'));
        $router->register('POST', '/columns', array($this, 'addTable'));
        $router->register('POST', '/columns/*', array($this, 'addColumn'));
        $router->register('DELETE', '/columns/*', array($this, 'removeTable'));
        $router->register('DELETE', '/columns/*/*', array($this, 'removeColumn'));
        $this->responder = $responder;
        $this->reflection = $reflection;
        $this->definition = $definition;
    }

    public function getDatabase(Request $request): Response
    {
        $name = $this->reflection->getDatabaseName();
        $tables = [];
        foreach ($this->reflection->getTableNames() as $table) {
            $tables[] = $this->reflection->getTable($table);
        }
        $database = ['name' => $name, 'tables' => $tables];
        return $this->responder->success($database);
    }

    public function getTable(Request $request): Response
    {
        $tableName = $request->getPathSegment(2);
        if (!$this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $tableName);
        }
        $table = $this->reflection->getTable($tableName);
        return $this->responder->success($table);
    }

    public function getColumn(Request $request): Response
    {
        $tableName = $request->getPathSegment(2);
        $columnName = $request->getPathSegment(3);
        if (!$this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $tableName);
        }
        $table = $this->reflection->getTable($tableName);
        if (!$table->exists($columnName)) {
            return $this->responder->error(ErrorCode::COLUMN_NOT_FOUND, $columnName);
        }
        $column = $table->get($columnName);
        return $this->responder->success($column);
    }

    public function updateTable(Request $request): Response
    {
        $tableName = $request->getPathSegment(2);
        if (!$this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $tableName);
        }
        $success = $this->definition->updateTable($tableName, $request->getBody());
        if ($success) {
            $this->reflection->refreshTables();
        }
        return $this->responder->success($success);
    }

    public function updateColumn(Request $request): Response
    {
        $tableName = $request->getPathSegment(2);
        $columnName = $request->getPathSegment(3);
        if (!$this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $tableName);
        }
        $table = $this->reflection->getTable($tableName);
        if (!$table->exists($columnName)) {
            return $this->responder->error(ErrorCode::COLUMN_NOT_FOUND, $columnName);
        }
        $success = $this->definition->updateColumn($tableName, $columnName, $request->getBody());
        if ($success) {
            $this->reflection->refreshTable($tableName);
        }
        return $this->responder->success($success);
    }

    public function addTable(Request $request): Response
    {
        $tableName = $request->getBody()->name;
        if ($this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_ALREADY_EXISTS, $tableName);
        }
        $success = $this->definition->addTable($request->getBody());
        if ($success) {
            $this->reflection->refreshTables();
        }
        return $this->responder->success($success);
    }

    public function addColumn(Request $request): Response
    {
        $tableName = $request->getPathSegment(2);
        if (!$this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $tableName);
        }
        $columnName = $request->getBody()->name;
        $table = $this->reflection->getTable($tableName);
        if ($table->exists($columnName)) {
            return $this->responder->error(ErrorCode::COLUMN_ALREADY_EXISTS, $columnName);
        }
        $success = $this->definition->addColumn($tableName, $request->getBody());
        if ($success) {
            $this->reflection->refreshTable($tableName);
        }
        return $this->responder->success($success);
    }

    public function removeTable(Request $request): Response
    {
        $tableName = $request->getPathSegment(2);
        if (!$this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $tableName);
        }
        $success = $this->definition->removeTable($tableName);
        if ($success) {
            $this->reflection->refreshTables();
        }
        return $this->responder->success($success);
    }

    public function removeColumn(Request $request): Response
    {
        $tableName = $request->getPathSegment(2);
        $columnName = $request->getPathSegment(3);
        if (!$this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $tableName);
        }
        $table = $this->reflection->getTable($tableName);
        if (!$table->exists($columnName)) {
            return $this->responder->error(ErrorCode::COLUMN_NOT_FOUND, $columnName);
        }
        $success = $this->definition->removeColumn($tableName, $columnName);
        if ($success) {
            $this->reflection->refreshTable($tableName);
        }
        return $this->responder->success($success);
    }
}

// file: src/Tqdev/PhpCrudApi/Controller/OpenApiController.php

class OpenApiController
{
    private $openApi;
    private $responder;

    public function __construct(Router $router, Responder $responder, OpenApiService $openApi)
    {
        $router->register('GET', '/openapi', array($this, 'openapi'));
        $this->openApi = $openApi;
        $this->responder = $responder;
    }

    public function openapi(Request $request): Response
    {
        return $this->responder->success($this->openApi->get());
    }

}

// file: src/Tqdev/PhpCrudApi/Controller/RecordController.php

class RecordController
{
    private $service;
    private $responder;

    public function __construct(Router $router, Responder $responder, RecordService $service)
    {
        $router->register('GET', '/records/*', array($this, '_list'));
        $router->register('POST', '/records/*', array($this, 'create'));
        $router->register('GET', '/records/*/*', array($this, 'read'));
        $router->register('PUT', '/records/*/*', array($this, 'update'));
        $router->register('DELETE', '/records/*/*', array($this, 'delete'));
        $router->register('PATCH', '/records/*/*', array($this, 'increment'));
        $this->service = $service;
        $this->responder = $responder;
    }

    public function _list(Request $request): Response
    {
        $table = $request->getPathSegment(2);
        $params = $request->getParams();
        if (!$this->service->exists($table)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $table);
        }
        return $this->responder->success($this->service->_list($table, $params));
    }

    public function read(Request $request): Response
    {
        $table = $request->getPathSegment(2);
        $id = $request->getPathSegment(3);
        $params = $request->getParams();
        if (!$this->service->exists($table)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $table);
        }
        if (strpos($id, ',') !== false) {
            $ids = explode(',', $id);
            $result = [];
            for ($i = 0; $i < count($ids); $i++) {
                array_push($result, $this->service->read($table, $ids[$i], $params));
            }
            return $this->responder->success($result);
        } else {
            $response = $this->service->read($table, $id, $params);
            if ($response === null) {
                return $this->responder->error(ErrorCode::RECORD_NOT_FOUND, $id);
            }
            return $this->responder->success($response);
        }
    }

    public function create(Request $request): Response
    {
        $table = $request->getPathSegment(2);
        $record = $request->getBody();
        if ($record === null) {
            return $this->responder->error(ErrorCode::HTTP_MESSAGE_NOT_READABLE, '');
        }
        $params = $request->getParams();
        if (!$this->service->exists($table)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $table);
        }
        if (is_array($record)) {
            $result = array();
            foreach ($record as $r) {
                $result[] = $this->service->create($table, $r, $params);
            }
            return $this->responder->success($result);
        } else {
            return $this->responder->success($this->service->create($table, $record, $params));
        }
    }

    public function update(Request $request): Response
    {
        $table = $request->getPathSegment(2);
        $id = $request->getPathSegment(3);
        $record = $request->getBody();
        if ($record === null) {
            return $this->responder->error(ErrorCode::HTTP_MESSAGE_NOT_READABLE, '');
        }
        $params = $request->getParams();
        if (!$this->service->exists($table)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $table);
        }
        $ids = explode(',', $id);
        if (is_array($record)) {
            if (count($ids) != count($record)) {
                return $this->responder->error(ErrorCode::ARGUMENT_COUNT_MISMATCH, $id);
            }
            $result = array();
            for ($i = 0; $i < count($ids); $i++) {
                $result[] = $this->service->update($table, $ids[$i], $record[$i], $params);
            }
            return $this->responder->success($result);
        } else {
            if (count($ids) != 1) {
                return $this->responder->error(ErrorCode::ARGUMENT_COUNT_MISMATCH, $id);
            }
            return $this->responder->success($this->service->update($table, $id, $record, $params));
        }
    }

    public function delete(Request $request): Response
    {
        $table = $request->getPathSegment(2);
        $id = $request->getPathSegment(3);
        $params = $request->getParams();
        if (!$this->service->exists($table)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $table);
        }
        $ids = explode(',', $id);
        if (count($ids) > 1) {
            $result = array();
            for ($i = 0; $i < count($ids); $i++) {
                $result[] = $this->service->delete($table, $ids[$i], $params);
            }
            return $this->responder->success($result);
        } else {
            return $this->responder->success($this->service->delete($table, $id, $params));
        }
    }

    public function increment(Request $request): Response
    {
        $table = $request->getPathSegment(2);
        $id = $request->getPathSegment(3);
        $record = $request->getBody();
        if ($record === null) {
            return $this->responder->error(ErrorCode::HTTP_MESSAGE_NOT_READABLE, '');
        }
        $params = $request->getParams();
        if (!$this->service->exists($table)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $table);
        }
        $ids = explode(',', $id);
        if (is_array($record)) {
            if (count($ids) != count($record)) {
                return $this->responder->error(ErrorCode::ARGUMENT_COUNT_MISMATCH, $id);
            }
            $result = array();
            for ($i = 0; $i < count($ids); $i++) {
                $result[] = $this->service->increment($table, $ids[$i], $record[$i], $params);
            }
            return $this->responder->success($result);
        } else {
            if (count($ids) != 1) {
                return $this->responder->error(ErrorCode::ARGUMENT_COUNT_MISMATCH, $id);
            }
            return $this->responder->success($this->service->increment($table, $id, $record, $params));
        }
    }

}

// file: src/Tqdev/PhpCrudApi/Controller/Responder.php

class Responder
{
    public function error(int $error, String $argument, $details = null): Response
    {
        $errorCode = new ErrorCode($error);
        $status = $errorCode->getStatus();
        $document = new ErrorDocument($errorCode, $argument, $details);
        return new Response($status, $document);
    }

    public function success($result): Response
    {
        return new Response(Response::OK, $result);
    }

}

// file: src/Tqdev/PhpCrudApi/Database/ColumnConverter.php

class ColumnConverter
{
    private $driver;

    public function __construct(String $driver)
    {
        $this->driver = $driver;
    }

    public function convertColumnValue(ReflectedColumn $column): String
    {
        if ($column->isBinary()) {
            switch ($this->driver) {
                case 'mysql':
                    return "FROM_BASE64(?)";
                case 'pgsql':
                    return "decode(?, 'base64')";
                case 'sqlsrv':
                    return "CONVERT(XML, ?).value('.','varbinary(max)')";
            }
        }
        if ($column->isGeometry()) {
            switch ($this->driver) {
                case 'mysql':
                case 'pgsql':
                    return "ST_GeomFromText(?)";
                case 'sqlsrv':
                    return "geometry::STGeomFromText(?,0)";
            }
        }
        return '?';
    }

    public function convertColumnName(ReflectedColumn $column, $value): String
    {
        if ($column->isBinary()) {
            switch ($this->driver) {
                case 'mysql':
                    return "TO_BASE64($value) as $value";
                case 'pgsql':
                    return "encode($value::bytea, 'base64') as $value";
                case 'sqlsrv':
                    return "CAST(N'' AS XML).value('xs:base64Binary(xs:hexBinary(sql:column($value)))', 'VARCHAR(MAX)') as $value";

            }
        }
        if ($column->isGeometry()) {
            switch ($this->driver) {
                case 'mysql':
                case 'pgsql':
                    return "ST_AsText($value) as $value";
                case 'sqlsrv':
                    return "REPLACE($value.STAsText(),' (','(') as $value";
            }
        }
        return $value;
    }

}

// file: src/Tqdev/PhpCrudApi/Database/ColumnsBuilder.php

class ColumnsBuilder
{
    private $driver;
    private $converter;

    public function __construct(String $driver)
    {
        $this->driver = $driver;
        $this->converter = new ColumnConverter($driver);
    }

    public function getOffsetLimit(int $offset, int $limit): String
    {
        if ($limit < 0 || $offset < 0) {
            return '';
        }
        switch ($this->driver) {
            case 'mysql':return "LIMIT $offset, $limit";
            case 'pgsql':return "LIMIT $limit OFFSET $offset";
            case 'sqlsrv':return "OFFSET $offset ROWS FETCH NEXT $limit ROWS ONLY";
        }
    }

    private function quoteColumnName(ReflectedColumn $column): String
    {
        return '"' . $column->getName() . '"';
    }

    public function getOrderBy(ReflectedTable $table, array $columnOrdering): String
    {
        $results = array();
        foreach ($columnOrdering as $i => list($columnName, $ordering)) {
            $column = $table->get($columnName);
            $quotedColumnName = $this->quoteColumnName($column);
            $results[] = $quotedColumnName . ' ' . $ordering;
        }
        return implode(',', $results);
    }

    public function getSelect(ReflectedTable $table, array $columnNames): String
    {
        $results = array();
        foreach ($columnNames as $columnName) {
            $column = $table->get($columnName);
            $quotedColumnName = $this->quoteColumnName($column);
            $quotedColumnName = $this->converter->convertColumnName($column, $quotedColumnName);
            $results[] = $quotedColumnName;
        }
        return implode(',', $results);
    }

    public function getInsert(ReflectedTable $table, array $columnValues): String
    {
        $columns = array();
        $values = array();
        foreach ($columnValues as $columnName => $columnValue) {
            $column = $table->get($columnName);
            $quotedColumnName = $this->quoteColumnName($column);
            $columns[] = $quotedColumnName;
            $columnValue = $this->converter->convertColumnValue($column);
            $values[] = $columnValue;
        }
        $columnsSql = '(' . implode(',', $columns) . ')';
        $valuesSql = '(' . implode(',', $values) . ')';
        $outputColumn = $this->quoteColumnName($table->getPk());
        switch ($this->driver) {
            case 'mysql':return "$columnsSql VALUES $valuesSql";
            case 'pgsql':return "$columnsSql VALUES $valuesSql RETURNING $outputColumn";
            case 'sqlsrv':return "$columnsSql OUTPUT INSERTED.$outputColumn VALUES $valuesSql";
        }
    }

    public function getUpdate(ReflectedTable $table, array $columnValues): String
    {
        $results = array();
        foreach ($columnValues as $columnName => $columnValue) {
            $column = $table->get($columnName);
            $quotedColumnName = $this->quoteColumnName($column);
            $columnValue = $this->converter->convertColumnValue($column);
            $results[] = $quotedColumnName . '=' . $columnValue;
        }
        return implode(',', $results);
    }

    public function getIncrement(ReflectedTable $table, array $columnValues): String
    {
        $results = array();
        foreach ($columnValues as $columnName => $columnValue) {
            if (!is_numeric($columnValue)) {
                continue;
            }
            $column = $table->get($columnName);
            $quotedColumnName = $this->quoteColumnName($column);
            $columnValue = $this->converter->convertColumnValue($column);
            $results[] = $quotedColumnName . '=' . $quotedColumnName . '+' . $columnValue;
        }
        return implode(',', $results);
    }

}

// file: src/Tqdev/PhpCrudApi/Database/ConditionsBuilder.php

class ConditionsBuilder
{
    private $driver;

    public function __construct(String $driver)
    {
        $this->driver = $driver;
    }

    private function getConditionSql(Condition $condition, array &$arguments): String
    {
        if ($condition instanceof AndCondition) {
            return $this->getAndConditionSql($condition, $arguments);
        }
        if ($condition instanceof OrCondition) {
            return $this->getOrConditionSql($condition, $arguments);
        }
        if ($condition instanceof NotCondition) {
            return $this->getNotConditionSql($condition, $arguments);
        }
        if ($condition instanceof ColumnCondition) {
            return $this->getColumnConditionSql($condition, $arguments);
        }
        if ($condition instanceof SpatialCondition) {
            return $this->getSpatialConditionSql($condition, $arguments);
        }
        throw new \Exception('Unknown Condition: ' . get_class($condition));
    }

    private function getAndConditionSql(AndCondition $and, array &$arguments): String
    {
        $parts = [];
        foreach ($and->getConditions() as $condition) {
            $parts[] = $this->getConditionSql($condition, $arguments);
        }
        return '(' . implode(' AND ', $parts) . ')';
    }

    private function getOrConditionSql(OrCondition $or, array &$arguments): String
    {
        $parts = [];
        foreach ($or->getConditions() as $condition) {
            $parts[] = $this->getConditionSql($condition, $arguments);
        }
        return '(' . implode(' OR ', $parts) . ')';
    }

    private function getNotConditionSql(NotCondition $not, array &$arguments): String
    {
        $condition = $not->getCondition();
        return '(NOT ' . $this->getConditionSql($condition, $arguments) . ')';
    }

    private function quoteColumnName(ReflectedColumn $column): String
    {
        return '"' . $column->getName() . '"';
    }

    private function escapeLikeValue(String $value): String
    {
        return addcslashes($value, '%_');
    }

    private function getColumnConditionSql(ColumnCondition $condition, array &$arguments): String
    {
        $column = $this->quoteColumnName($condition->getColumn());
        $operator = $condition->getOperator();
        $value = $condition->getValue();
        switch ($operator) {
            case 'cs':
                $sql = "$column LIKE ?";
                $arguments[] = '%' . $this->escapeLikeValue($value) . '%';
                break;
            case 'sw':
                $sql = "$column LIKE ?";
                $arguments[] = $this->escapeLikeValue($value) . '%';
                break;
            case 'ew':
                $sql = "$column LIKE ?";
                $arguments[] = '%' . $this->escapeLikeValue($value);
                break;
            case 'eq':
                $sql = "$column = ?";
                $arguments[] = $value;
                break;
            case 'lt':
                $sql = "$column < ?";
                $arguments[] = $value;
                break;
            case 'le':
                $sql = "$column <= ?";
                $arguments[] = $value;
                break;
            case 'ge':
                $sql = "$column >= ?";
                $arguments[] = $value;
                break;
            case 'gt':
                $sql = "$column > ?";
                $arguments[] = $value;
                break;
            case 'bt':
                $parts = explode(',', $value, 2);
                $count = count($parts);
                if ($count == 2) {
                    $sql = "($column >= ? AND $column <= ?)";
                    $arguments[] = $parts[0];
                    $arguments[] = $parts[1];
                } else {
                    $sql = "FALSE";
                }
                break;
            case 'in':
                $parts = explode(',', $value);
                $count = count($parts);
                if ($count > 0) {
                    $qmarks = implode(',', str_split(str_repeat('?', $count)));
                    $sql = "$column IN ($qmarks)";
                    for ($i = 0; $i < $count; $i++) {
                        $arguments[] = $parts[$i];
                    }
                } else {
                    $sql = "FALSE";
                }
                break;
            case 'is':
                $sql = "$column IS NULL";
                break;
        }
        return $sql;
    }

    private function getSpatialFunctionName(String $operator): String
    {
        switch ($operator) {
            case 'co':return 'ST_Contains';
            case 'cr':return 'ST_Crosses';
            case 'di':return 'ST_Disjoint';
            case 'eq':return 'ST_Equals';
            case 'in':return 'ST_Intersects';
            case 'ov':return 'ST_Overlaps';
            case 'to':return 'ST_Touches';
            case 'wi':return 'ST_Within';
            case 'ic':return 'ST_IsClosed';
            case 'is':return 'ST_IsSimple';
            case 'iv':return 'ST_IsValid';
        }
    }

    private function hasSpatialArgument(String $operator): bool
    {
        return in_array($operator, ['ic', 'is', 'iv']) ? false : true;
    }

    private function getSpatialFunctionCall(String $functionName, String $column, bool $hasArgument): String
    {
        switch ($this->driver) {
            case 'mysql':
            case 'pgsql':
                $argument = $hasArgument ? 'ST_GeomFromText(?)' : '';
                return "$functionName($column, $argument)=TRUE";
            case 'sql_srv':
                $functionName = str_replace('ST_', 'ST', $functionName);
                $argument = $hasArgument ? 'geometry::STGeomFromText(?,0)' : '';
                return "$column.$functionName($argument)=1";
        }
    }

    private function getSpatialConditionSql(ColumnCondition $condition, array &$arguments): String
    {
        $column = $this->quoteColumnName($condition->getColumn());
        $operator = $condition->getOperator();
        $value = $condition->getValue();
        $functionName = $this->getSpatialFunctionName($operator);
        $hasArgument = $this->hasSpatialArgument($operator);
        $sql = $this->getSpatialFunctionCall($functionName, $column, $hasArgument);
        if ($hasArgument) {
            $arguments[] = $value;
        }
        return $sql;
    }

    public function getWhereClause(Condition $condition, array &$arguments): String
    {
        if ($condition instanceof NoCondition) {
            return '';
        }
        return ' WHERE ' . $this->getConditionSql($condition, $arguments);
    }
}

// file: src/Tqdev/PhpCrudApi/Database/DataConverter.php

class DataConverter
{
    private $driver;

    public function __construct(String $driver)
    {
        $this->driver = $driver;
    }

    private function convertRecordValue($conversion, $value)
    {
        switch ($conversion) {
            case 'boolean':
                return $value ? true : false;
        }
        return $value;
    }

    private function getRecordValueConversion(ReflectedColumn $column): String
    {
        if (in_array($this->driver, ['mysql', 'sqlsrv']) && $column->isBoolean()) {
            return 'boolean';
        }
        return 'none';
    }

    public function convertRecords(ReflectedTable $table, array $columnNames, array &$records) /*: void*/
    {
        foreach ($columnNames as $columnName) {
            $column = $table->get($columnName);
            $conversion = $this->getRecordValueConversion($column);
            if ($conversion != 'none') {
                foreach ($records as $i => $record) {
                    $value = $records[$i][$columnName];
                    if ($value === null) {
                        continue;
                    }
                    $records[$i][$columnName] = $this->convertRecordValue($conversion, $value);
                }
            }
        }
    }

    private function convertInputValue($conversion, $value)
    {
        switch ($conversion) {
            case 'base64url_to_base64':
                return str_pad(strtr($value, '-_', '+/'), ceil(strlen($value) / 4) * 4, '=', STR_PAD_RIGHT);
        }
        return $value;
    }

    private function getInputValueConversion(ReflectedColumn $column): String
    {
        if ($column->isBinary()) {
            return 'base64url_to_base64';
        }
        return 'none';
    }

    public function convertColumnValues(ReflectedTable $table, array &$columnValues) /*: void*/
    {
        $columnNames = array_keys($columnValues);
        foreach ($columnNames as $columnName) {
            $column = $table->get($columnName);
            $conversion = $this->getInputValueConversion($column);
            if ($conversion != 'none') {
                $value = $columnValues[$columnName];
                if ($value !== null) {
                    $columnValues[$columnName] = $this->convertInputValue($conversion, $value);
                }
            }
        }
    }
}

// file: src/Tqdev/PhpCrudApi/Database/GenericDB.php

class GenericDB
{
    private $driver;
    private $database;
    private $pdo;
    private $reflection;
    private $definition;
    private $conditions;
    private $columns;
    private $converter;

    private function getDsn(String $address, String $port = null, String $database = null): String
    {
        switch ($this->driver) {
            case 'mysql':return "$this->driver:host=$address;port=$port;dbname=$database;charset=utf8mb4";
            case 'pgsql':return "$this->driver:host=$address port=$port dbname=$database options='--client_encoding=UTF8'";
            case 'sqlsrv':return "$this->driver:Server=$address,$port;Database=$database";
        }
    }

    private function getCommands(): array
    {
        switch ($this->driver) {
            case 'mysql':return [
                    'SET SESSION sql_warnings=1;',
                    'SET NAMES utf8mb4;',
                    'SET SESSION sql_mode = "ANSI,TRADITIONAL";',
                ];
            case 'pgsql':return [
                    "SET NAMES 'UTF8';",
                ];
            case 'sqlsrv':return [
                ];
        }
    }

    private function getOptions(): array
    {
        $options = array(
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        );
        switch ($this->driver) {
            case 'mysql':return $options + [
                    \PDO::ATTR_EMULATE_PREPARES => false,
                    \PDO::MYSQL_ATTR_FOUND_ROWS => true,
                    \PDO::ATTR_PERSISTENT => true,
                ];
            case 'pgsql':return $options + [
                    \PDO::ATTR_EMULATE_PREPARES => false,
                    \PDO::ATTR_PERSISTENT => true,
                ];
            case 'sqlsrv':return $options + [
                    \PDO::SQLSRV_ATTR_FETCHES_NUMERIC_TYPE => true,
                ];
        }
    }

    public function __construct(String $driver, String $address, String $port = null, String $database = null, String $username = null, String $password = null)
    {
        $this->driver = $driver;
        $this->database = $database;
        $dsn = $this->getDsn($address, $port, $database);
        $options = $this->getOptions();
        $this->pdo = new \PDO($dsn, $username, $password, $options);
        $commands = $this->getCommands();
        foreach ($commands as $command) {
            $this->pdo->query($command);
        }
        $this->reflection = new GenericReflection($this->pdo, $driver, $database);
        $this->definition = new GenericDefinition($this->pdo, $driver, $database);
        $this->conditions = new ConditionsBuilder($driver);
        $this->columns = new ColumnsBuilder($driver);
        $this->converter = new DataConverter($driver);
    }

    public function pdo(): \PDO
    {
        return $this->pdo;
    }

    public function reflection(): GenericReflection
    {
        return $this->reflection;
    }

    public function definition(): GenericDefinition
    {
        return $this->definition;
    }

    private function addAuthorizationCondition(Condition $condition2): Condition
    {
        $condition1 = VariableStore::get('authorization.condition');
        return $condition1 ? AndCondition::fromArray([$condition1, $condition2]) : $condition2;
    }

    public function createSingle(ReflectedTable $table, array $columnValues) /*: ?String*/
    {
        $this->converter->convertColumnValues($table, $columnValues);
        $insertColumns = $this->columns->getInsert($table, $columnValues);
        $tableName = $table->getName();
        $pkName = $table->getPk()->getName();
        $parameters = array_values($columnValues);
        $sql = 'INSERT INTO "' . $tableName . '" ' . $insertColumns;
        $stmt = $this->query($sql, $parameters);
        if (isset($columnValues[$pkName])) {
            return $columnValues[$pkName];
        }
        switch ($this->driver) {
            case 'mysql':
                $stmt = $this->query('SELECT LAST_INSERT_ID()', []);
                break;
        }
        return $stmt->fetchColumn(0);
    }

    public function selectSingle(ReflectedTable $table, array $columnNames, String $id) /*: ?array*/
    {
        $selectColumns = $this->columns->getSelect($table, $columnNames);
        $tableName = $table->getName();
        $condition = new ColumnCondition($table->getPk(), 'eq', $id);
        $condition = $this->addAuthorizationCondition($condition);
        $parameters = array();
        $whereClause = $this->conditions->getWhereClause($condition, $parameters);
        $sql = 'SELECT ' . $selectColumns . ' FROM "' . $tableName . '" ' . $whereClause;
        $stmt = $this->query($sql, $parameters);
        $record = $stmt->fetch() ?: null;
        if ($record === null) {
            return null;
        }
        $records = array($record);
        $this->converter->convertRecords($table, $columnNames, $records);
        return $records[0];
    }

    public function selectMultiple(ReflectedTable $table, array $columnNames, array $ids): array
    {
        if (count($ids) == 0) {
            return [];
        }
        $selectColumns = $this->columns->getSelect($table, $columnNames);
        $tableName = $table->getName();
        $condition = new ColumnCondition($table->getPk(), 'in', implode(',', $ids));
        $condition = $this->addAuthorizationCondition($condition);
        $parameters = array();
        $whereClause = $this->conditions->getWhereClause($condition, $parameters);
        $sql = 'SELECT ' . $selectColumns . ' FROM "' . $tableName . '" ' . $whereClause;
        $stmt = $this->query($sql, $parameters);
        $records = $stmt->fetchAll();
        $this->converter->convertRecords($table, $columnNames, $records);
        return $records;
    }

    public function selectCount(ReflectedTable $table, Condition $condition): int
    {
        $tableName = $table->getName();
        $condition = $this->addAuthorizationCondition($condition);
        $parameters = array();
        $whereClause = $this->conditions->getWhereClause($condition, $parameters);
        $sql = 'SELECT COUNT(*) FROM "' . $tableName . '"' . $whereClause;
        $stmt = $this->query($sql, $parameters);
        return $stmt->fetchColumn(0);
    }

    public function selectAllUnordered(ReflectedTable $table, array $columnNames, Condition $condition): array
    {
        $selectColumns = $this->columns->getSelect($table, $columnNames);
        $tableName = $table->getName();
        $condition = $this->addAuthorizationCondition($condition);
        $parameters = array();
        $whereClause = $this->conditions->getWhereClause($condition, $parameters);
        $sql = 'SELECT ' . $selectColumns . ' FROM "' . $tableName . '"' . $whereClause;
        $stmt = $this->query($sql, $parameters);
        $records = $stmt->fetchAll();
        $this->converter->convertRecords($table, $columnNames, $records);
        return $records;
    }

    public function selectAll(ReflectedTable $table, array $columnNames, Condition $condition, array $columnOrdering, int $offset, int $limit): array
    {
        if ($limit == 0) {
            return array();
        }
        $selectColumns = $this->columns->getSelect($table, $columnNames);
        $tableName = $table->getName();
        $condition = $this->addAuthorizationCondition($condition);
        $parameters = array();
        $whereClause = $this->conditions->getWhereClause($condition, $parameters);
        $orderBy = $this->columns->getOrderBy($table, $columnOrdering);
        $offsetLimit = $this->columns->getOffsetLimit($offset, $limit);
        $sql = 'SELECT ' . $selectColumns . ' FROM "' . $tableName . '"' . $whereClause . ' ORDER BY ' . $orderBy . ' ' . $offsetLimit;
        $stmt = $this->query($sql, $parameters);
        $records = $stmt->fetchAll();
        $this->converter->convertRecords($table, $columnNames, $records);
        return $records;
    }

    public function updateSingle(ReflectedTable $table, array $columnValues, String $id)
    {
        if (count($columnValues) == 0) {
            return 0;
        }
        $this->converter->convertColumnValues($table, $columnValues);
        $updateColumns = $this->columns->getUpdate($table, $columnValues);
        $tableName = $table->getName();
        $condition = new ColumnCondition($table->getPk(), 'eq', $id);
        $condition = $this->addAuthorizationCondition($condition);
        $parameters = array_values($columnValues);
        $whereClause = $this->conditions->getWhereClause($condition, $parameters);
        $sql = 'UPDATE "' . $tableName . '" SET ' . $updateColumns . $whereClause;
        $stmt = $this->query($sql, $parameters);
        return $stmt->rowCount();
    }

    public function deleteSingle(ReflectedTable $table, String $id)
    {
        $tableName = $table->getName();
        $condition = new ColumnCondition($table->getPk(), 'eq', $id);
        $condition = $this->addAuthorizationCondition($condition);
        $parameters = array();
        $whereClause = $this->conditions->getWhereClause($condition, $parameters);
        $sql = 'DELETE FROM "' . $tableName . '" ' . $whereClause;
        $stmt = $this->query($sql, $parameters);
        return $stmt->rowCount();
    }

    public function incrementSingle(ReflectedTable $table, array $columnValues, String $id)
    {
        if (count($columnValues) == 0) {
            return 0;
        }
        $this->converter->convertColumnValues($table, $columnValues);
        $updateColumns = $this->columns->getIncrement($table, $columnValues);
        $tableName = $table->getName();
        $condition = new ColumnCondition($table->getPk(), 'eq', $id);
        $condition = $this->addAuthorizationCondition($condition);
        $parameters = array_values($columnValues);
        $whereClause = $this->conditions->getWhereClause($condition, $parameters);
        $sql = 'UPDATE "' . $tableName . '" SET ' . $updateColumns . $whereClause;
        $stmt = $this->query($sql, $parameters);
        return $stmt->rowCount();
    }

    private function query(String $sql, array $parameters): \PDOStatement
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($parameters);
        return $stmt;
    }
}

// file: src/Tqdev/PhpCrudApi/Database/GenericDefinition.php

class GenericDefinition
{
    private $pdo;
    private $driver;
    private $database;
    private $typeConverter;
    private $reflection;

    public function __construct(\PDO $pdo, String $driver, String $database)
    {
        $this->pdo = $pdo;
        $this->driver = $driver;
        $this->database = $database;
        $this->typeConverter = new TypeConverter($driver);
        $this->reflection = new GenericReflection($pdo, $driver, $database);
    }

    private function quote(String $identifier): String
    {
        return '"' . str_replace('"', '', $identifier) . '"';
    }

    public function getColumnType(ReflectedColumn $column, bool $update): String
    {
        if ($this->driver == 'pgsql' && !$update && $column->getPk() && $this->canAutoIncrement($column)) {
            return 'serial';
        }
        $type = $this->typeConverter->fromJdbc($column->getType());
        if ($column->hasPrecision() && $column->hasScale()) {
            $size = '(' . $column->getPrecision() . ',' . $column->getScale() . ')';
        } else if ($column->hasPrecision()) {
            $size = '(' . $column->getPrecision() . ')';
        } else if ($column->hasLength()) {
            $size = '(' . $column->getLength() . ')';
        } else {
            $size = '';
        }
        $null = $this->getColumnNullType($column, $update);
        $auto = $this->getColumnAutoIncrement($column, $update);
        return $type . $size . $null . $auto;
    }

    private function getPrimaryKey(String $tableName): String
    {
        $pks = $this->reflection->getTablePrimaryKeys($tableName);
        if (count($pks) == 1) {
            return $pks[0];
        }
        return "";
    }

    private function canAutoIncrement(ReflectedColumn $column): bool
    {
        return in_array($column->getType(), ['integer', 'bigint']);
    }

    private function getColumnAutoIncrement(ReflectedColumn $column, bool $update): String
    {
        if (!$this->canAutoIncrement($column)) {
            return '';
        }
        switch ($this->driver) {
            case 'mysql':
                return $column->getPk() ? ' AUTO_INCREMENT' : '';
            case 'pgsql':
                return '';
            case 'sqlsrv':
                return ($column->getPk() && !$update) ? ' IDENTITY(1,1)' : '';
        }
    }

    private function getColumnNullType(ReflectedColumn $column, bool $update): String
    {
        if ($this->driver == 'pgsql' && $update) {
            return '';
        }
        return $column->getNullable() ? ' NULL' : ' NOT NULL';
    }

    private function getTableRenameSQL(String $tableName, String $newTableName): String
    {
        $p1 = $this->quote($tableName);
        $p2 = $this->quote($newTableName);

        switch ($this->driver) {
            case 'mysql':
                return "RENAME TABLE $p1 TO $p2";
            case 'pgsql':
                return "ALTER TABLE $p1 RENAME TO $p2";
            case 'sqlsrv':
                return "EXEC sp_rename $p1, $p2";
        }
    }

    private function getColumnRenameSQL(String $tableName, String $columnName, ReflectedColumn $newColumn): String
    {
        $p1 = $this->quote($tableName);
        $p2 = $this->quote($columnName);
        $p3 = $this->quote($newColumn->getName());

        switch ($this->driver) {
            case 'mysql':
                $p4 = $this->getColumnType($newColumn, true);
                return "ALTER TABLE $p1 CHANGE $p2 $p3 $p4";
            case 'pgsql':
                return "ALTER TABLE $p1 RENAME COLUMN $p2 TO $p3";
            case 'sqlsrv':
                $p4 = $this->quote($tableName . '.' . $columnName);
                return "EXEC sp_rename $p4, $p3, 'COLUMN'";
        }
    }

    private function getColumnRetypeSQL(String $tableName, String $columnName, ReflectedColumn $newColumn): String
    {
        $p1 = $this->quote($tableName);
        $p2 = $this->quote($columnName);
        $p3 = $this->quote($newColumn->getName());
        $p4 = $this->getColumnType($newColumn, true);

        switch ($this->driver) {
            case 'mysql':
                return "ALTER TABLE $p1 CHANGE $p2 $p3 $p4";
            case 'pgsql':
                return "ALTER TABLE $p1 ALTER COLUMN $p3 TYPE $p4";
            case 'sqlsrv':
                return "ALTER TABLE $p1 ALTER COLUMN $p3 $p4";
        }
    }

    private function getSetColumnNullableSQL(String $tableName, String $columnName, ReflectedColumn $newColumn): String
    {
        $p1 = $this->quote($tableName);
        $p2 = $this->quote($columnName);
        $p3 = $this->quote($newColumn->getName());
        $p4 = $this->getColumnType($newColumn, true);

        switch ($this->driver) {
            case 'mysql':
                return "ALTER TABLE $p1 CHANGE $p2 $p3 $p4";
            case 'pgsql':
                $p5 = $newColumn->getNullable() ? 'DROP NOT NULL' : 'SET NOT NULL';
                return "ALTER TABLE $p1 ALTER COLUMN $p2 $p5";
            case 'sqlsrv':
                return "ALTER TABLE $p1 ALTER COLUMN $p2 $p4";
        }
    }

    private function getSetColumnPkConstraintSQL(String $tableName, String $columnName, ReflectedColumn $newColumn): String
    {
        $p1 = $this->quote($tableName);
        $p2 = $this->quote($columnName);
        $p3 = $this->quote($tableName . '_pkey');

        switch ($this->driver) {
            case 'mysql':
                $p4 = $newColumn->getPk() ? "ADD PRIMARY KEY ($p2)" : 'DROP PRIMARY KEY';
                return "ALTER TABLE $p1 $p4";
            case 'pgsql':
            case 'sqlsrv':
                $p4 = $newColumn->getPk() ? "ADD PRIMARY KEY ($p2)" : "DROP CONSTRAINT $p3";
                return "ALTER TABLE $p1 $p4";
        }
    }

    private function getSetColumnPkSequenceSQL(String $tableName, String $columnName, ReflectedColumn $newColumn): String
    {
        $p1 = $this->quote($tableName);
        $p2 = $this->quote($columnName);
        $p3 = $this->quote($tableName . '_' . $columnName . '_seq');

        switch ($this->driver) {
            case 'mysql':
                return "select 1";
            case 'pgsql':
                return $newColumn->getPk() ? "CREATE SEQUENCE $p3 OWNED BY $p1.$p2" : "DROP SEQUENCE $p3";
            case 'sqlsrv':
                return $newColumn->getPk() ? "CREATE SEQUENCE $p3" : "DROP SEQUENCE $p3";
        }
    }

    private function getSetColumnPkSequenceStartSQL(String $tableName, String $columnName, ReflectedColumn $newColumn): String
    {
        $p1 = $this->quote($tableName);
        $p2 = $this->quote($columnName);
        $p3 = $this->pdo->quote($tableName . '_' . $columnName . '_seq');

        switch ($this->driver) {
            case 'mysql':
                return "select 1";
            case 'pgsql':
                return "SELECT setval($p3, (SELECT max($p2)+1 FROM $p1));";
            case 'sqlsrv':
                return "ALTER SEQUENCE $p3 RESTART WITH (SELECT max($p2)+1 FROM $p1)";
        }
    }

    private function getSetColumnPkDefaultSQL(String $tableName, String $columnName, ReflectedColumn $newColumn): String
    {
        $p1 = $this->quote($tableName);
        $p2 = $this->quote($columnName);

        switch ($this->driver) {
            case 'mysql':
                $p3 = $this->quote($newColumn->getName());
                $p4 = $this->getColumnType($newColumn, true);
                return "ALTER TABLE $p1 CHANGE $p2 $p3 $p4";
            case 'pgsql':
                if ($newColumn->getPk()) {
                    $p3 = $this->pdo->quote($tableName . '_' . $columnName . '_seq');
                    $p4 = "SET DEFAULT nextval($p3)";
                } else {
                    $p4 = 'DROP DEFAULT';
                }
                return "ALTER TABLE $p1 ALTER COLUMN $p2 $p4";
            case 'sqlsrv':
                $p3 = $this->pdo->quote($tableName . '_' . $columnName . '_seq');
                $p4 = $this->quote('DF_' . $tableName . '_' . $columnName);
                if ($newColumn->getPk()) {
                    return "ALTER TABLE $p1 ADD CONSTRAINT $p4 DEFAULT NEXT VALUE FOR $p3 FOR $p2";
                } else {
                    return "ALTER TABLE $p1 DROP CONSTRAINT $p4";
                }
        }
    }

    private function getAddColumnFkConstraintSQL(String $tableName, String $columnName, ReflectedColumn $newColumn): String
    {
        $p1 = $this->quote($tableName);
        $p2 = $this->quote($columnName);
        $p3 = $this->quote($tableName . '_' . $columnName . '_fkey');
        $p4 = $this->quote($newColumn->getFk());
        $p5 = $this->quote($this->getPrimaryKey($newColumn->getFk()));

        return "ALTER TABLE $p1 ADD CONSTRAINT $p3 FOREIGN KEY ($p2) REFERENCES $p4 ($p5)";
    }

    private function getRemoveColumnFkConstraintSQL(String $tableName, String $columnName, ReflectedColumn $newColumn): String
    {
        $p1 = $this->quote($tableName);
        $p2 = $this->quote($tableName . '_' . $columnName . '_fkey');

        switch ($this->driver) {
            case 'mysql':
                return "ALTER TABLE $p1 DROP FOREIGN KEY $p2";
            case 'pgsql':
            case 'sqlsrv':
                return "ALTER TABLE $p1 DROP CONSTRAINT $p2";
        }
    }

    private function getAddTableSQL(ReflectedTable $newTable): String
    {
        $tableName = $newTable->getName();
        $p1 = $this->quote($tableName);
        $fields = [];
        $constraints = [];
        foreach ($newTable->columnNames() as $columnName) {
            $newColumn = $newTable->get($columnName);
            $f1 = $this->quote($columnName);
            $f2 = $this->getColumnType($newColumn, false);
            $f3 = $this->quote($tableName . '_' . $columnName . '_fkey');
            $f4 = $this->quote($newColumn->getFk());
            $f5 = $this->quote($this->getPrimaryKey($newColumn->getFk()));
            $fields[] = "$f1 $f2";
            if ($newColumn->getPk()) {
                $constraints[] = "PRIMARY KEY ($f1)";
            }
            if ($newColumn->getFk()) {
                $constraints[] = "CONSTRAINT $f3 FOREIGN KEY ($f1) REFERENCES $f4 ($f5)";
            }
        }
        $p2 = implode(',', array_merge($fields, $constraints));

        return "CREATE TABLE $p1 ($p2);";
    }

    private function getAddColumnSQL(String $tableName, ReflectedColumn $newColumn): String
    {
        $p1 = $this->quote($tableName);
        $p2 = $this->quote($newColumn->getName());
        $p3 = $this->getColumnType($newColumn, false);

        return "ALTER TABLE $p1 ADD COLUMN $p2 $p3";
    }

    private function getRemoveTableSQL(String $tableName): String
    {
        $p1 = $this->quote($tableName);

        return "DROP TABLE $p1 CASCADE;";
    }

    private function getRemoveColumnSQL(String $tableName, String $columnName): String
    {
        $p1 = $this->quote($tableName);
        $p2 = $this->quote($columnName);

        return "ALTER TABLE $p1 DROP COLUMN $p2 CASCADE;";
    }

    public function renameTable(String $tableName, String $newTableName)
    {
        $sql = $this->getTableRenameSQL($tableName, $newTableName);
        return $this->query($sql);
    }

    public function renameColumn(String $tableName, String $columnName, ReflectedColumn $newColumn)
    {
        $sql = $this->getColumnRenameSQL($tableName, $columnName, $newColumn);
        return $this->query($sql);
    }

    public function retypeColumn(String $tableName, String $columnName, ReflectedColumn $newColumn)
    {
        $sql = $this->getColumnRetypeSQL($tableName, $columnName, $newColumn);
        return $this->query($sql);
    }

    public function setColumnNullable(String $tableName, String $columnName, ReflectedColumn $newColumn)
    {
        $sql = $this->getSetColumnNullableSQL($tableName, $columnName, $newColumn);
        return $this->query($sql);
    }

    public function addColumnPrimaryKey(String $tableName, String $columnName, ReflectedColumn $newColumn)
    {
        $sql = $this->getSetColumnPkConstraintSQL($tableName, $columnName, $newColumn);
        $this->query($sql);
        if ($this->canAutoIncrement($newColumn)) {
            $sql = $this->getSetColumnPkSequenceSQL($tableName, $columnName, $newColumn);
            $this->query($sql);
            $sql = $this->getSetColumnPkSequenceStartSQL($tableName, $columnName, $newColumn);
            $this->query($sql);
            $sql = $this->getSetColumnPkDefaultSQL($tableName, $columnName, $newColumn);
            $this->query($sql);
        }
        return true;
    }

    public function removeColumnPrimaryKey(String $tableName, String $columnName, ReflectedColumn $newColumn)
    {
        if ($this->canAutoIncrement($newColumn)) {
            $sql = $this->getSetColumnPkDefaultSQL($tableName, $columnName, $newColumn);
            $this->query($sql);
            $sql = $this->getSetColumnPkSequenceSQL($tableName, $columnName, $newColumn);
            $this->query($sql);
        }
        $sql = $this->getSetColumnPkConstraintSQL($tableName, $columnName, $newColumn);
        $this->query($sql);
        return true;
    }

    public function addColumnForeignKey(String $tableName, String $columnName, ReflectedColumn $newColumn)
    {
        $sql = $this->getAddColumnFkConstraintSQL($tableName, $columnName, $newColumn);
        return $this->query($sql);
    }

    public function removeColumnForeignKey(String $tableName, String $columnName, ReflectedColumn $newColumn)
    {
        $sql = $this->getRemoveColumnFkConstraintSQL($tableName, $columnName, $newColumn);
        return $this->query($sql);
    }

    public function addTable(ReflectedTable $newTable)
    {
        $sql = $this->getAddTableSQL($newTable);
        return $this->query($sql);
    }

    public function addColumn(String $tableName, ReflectedColumn $newColumn)
    {
        $sql = $this->getAddColumnSQL($tableName, $newColumn);
        return $this->query($sql);
    }

    public function removeTable(String $tableName)
    {
        $sql = $this->getRemoveTableSQL($tableName);
        return $this->query($sql);
    }

    public function removeColumn(String $tableName, String $columnName)
    {
        $sql = $this->getRemoveColumnSQL($tableName, $columnName);
        return $this->query($sql);
    }

    private function query(String $sql): bool
    {
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute();
    }
}

// file: src/Tqdev/PhpCrudApi/Database/GenericReflection.php

class GenericReflection
{
    private $pdo;
    private $driver;
    private $database;
    private $typeConverter;

    public function __construct(\PDO $pdo, String $driver, String $database)
    {
        $this->pdo = $pdo;
        $this->driver = $driver;
        $this->database = $database;
        $this->typeConverter = new TypeConverter($driver);
    }

    public function getIgnoredTables(): array
    {
        switch ($this->driver) {
            case 'mysql':return [];
            case 'pgsql':return ['spatial_ref_sys'];
            case 'sqlsrv':return [];
        }
    }

    private function getTablesSQL(): String
    {
        switch ($this->driver) {
            case 'mysql':return 'SELECT "TABLE_NAME" FROM "INFORMATION_SCHEMA"."TABLES" WHERE "TABLE_TYPE" IN (\'BASE TABLE\') AND "TABLE_SCHEMA" = ? ORDER BY BINARY "TABLE_NAME"';
            case 'pgsql':return 'SELECT c.relname as "TABLE_NAME" FROM pg_catalog.pg_class c LEFT JOIN pg_catalog.pg_namespace n ON n.oid = c.relnamespace WHERE c.relkind IN (\'r\') AND n.nspname <> \'pg_catalog\' AND n.nspname <> \'information_schema\' AND n.nspname !~ \'^pg_toast\' AND pg_catalog.pg_table_is_visible(c.oid) AND \'\' <> ? ORDER BY "TABLE_NAME";';
            case 'sqlsrv':return 'SELECT o.name as "TABLE_NAME" FROM sysobjects o WHERE o.xtype = \'U\' ORDER BY "TABLE_NAME"';
        }
    }

    private function getTableColumnsSQL(): String
    {
        switch ($this->driver) {
            case 'mysql':return 'SELECT "COLUMN_NAME", "IS_NULLABLE", "DATA_TYPE", "CHARACTER_MAXIMUM_LENGTH", "NUMERIC_PRECISION", "NUMERIC_SCALE" FROM "INFORMATION_SCHEMA"."COLUMNS" WHERE "TABLE_NAME" = ? AND "TABLE_SCHEMA" = ?';
            case 'pgsql':return 'SELECT a.attname AS "COLUMN_NAME", case when a.attnotnull then \'NO\' else \'YES\' end as "IS_NULLABLE", pg_catalog.format_type(a.atttypid, -1) as "DATA_TYPE", case when a.atttypmod < 0 then NULL else a.atttypmod-4 end as "CHARACTER_MAXIMUM_LENGTH", case when a.atttypid != 1700 then NULL else ((a.atttypmod - 4) >> 16) & 65535 end as "NUMERIC_PRECISION", case when a.atttypid != 1700 then NULL else (a.atttypmod - 4) & 65535 end as "NUMERIC_SCALE" FROM pg_attribute a JOIN pg_class pgc ON pgc.oid = a.attrelid WHERE pgc.relname = ? AND \'\' <> ? AND a.attnum > 0 AND NOT a.attisdropped;';
            case 'sqlsrv':return 'SELECT c.name AS "COLUMN_NAME", c.is_nullable AS "IS_NULLABLE", t.Name AS "DATA_TYPE", (c.max_length/2) AS "CHARACTER_MAXIMUM_LENGTH", c.precision AS "NUMERIC_PRECISION", c.scale AS "NUMERIC_SCALE" FROM sys.columns c INNER JOIN sys.types t ON c.user_type_id = t.user_type_id WHERE c.object_id = OBJECT_ID(?) AND \'\' <> ?';
        }
    }

    private function getTablePrimaryKeysSQL(): String
    {
        switch ($this->driver) {
            case 'mysql':return 'SELECT "COLUMN_NAME" FROM "INFORMATION_SCHEMA"."KEY_COLUMN_USAGE" WHERE "CONSTRAINT_NAME" = \'PRIMARY\' AND "TABLE_NAME" = ? AND "TABLE_SCHEMA" = ?';
            case 'pgsql':return 'SELECT a.attname AS "COLUMN_NAME" FROM pg_attribute a JOIN pg_constraint c ON (c.conrelid, c.conkey[1]) = (a.attrelid, a.attnum) JOIN pg_class pgc ON pgc.oid = a.attrelid WHERE pgc.relname = ? AND \'\' <> ? AND c.contype = \'p\'';
            case 'sqlsrv':return 'SELECT c.NAME as "COLUMN_NAME" FROM sys.key_constraints kc inner join sys.objects t on t.object_id = kc.parent_object_id INNER JOIN sys.index_columns ic ON kc.parent_object_id = ic.object_id and kc.unique_index_id = ic.index_id INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id WHERE kc.type = \'PK\' and t.object_id = OBJECT_ID(?) and \'\' <> ?';
        }
    }

    private function getTableForeignKeysSQL(): String
    {
        switch ($this->driver) {
            case 'mysql':return 'SELECT "COLUMN_NAME", "REFERENCED_TABLE_NAME" FROM "INFORMATION_SCHEMA"."KEY_COLUMN_USAGE" WHERE "REFERENCED_TABLE_NAME" IS NOT NULL AND "TABLE_NAME" = ? AND "TABLE_SCHEMA" = ?';
            case 'pgsql':return 'SELECT a.attname AS "COLUMN_NAME", c.confrelid::regclass::text AS "REFERENCED_TABLE_NAME" FROM pg_attribute a JOIN pg_constraint c ON (c.conrelid, c.conkey[1]) = (a.attrelid, a.attnum) JOIN pg_class pgc ON pgc.oid = a.attrelid WHERE pgc.relname = ? AND \'\' <> ? AND c.contype  = \'f\'';
            case 'sqlsrv':return 'SELECT COL_NAME(fc.parent_object_id, fc.parent_column_id) AS "COLUMN_NAME", OBJECT_NAME (f.referenced_object_id) AS "REFERENCED_TABLE_NAME" FROM sys.foreign_keys AS f INNER JOIN sys.foreign_key_columns AS fc ON f.OBJECT_ID = fc.constraint_object_id WHERE f.parent_object_id = OBJECT_ID(?) and \'\' <> ?';
        }
    }

    public function getDatabaseName(): String
    {
        return $this->database;
    }

    public function getTables(): array
    {
        $sql = $this->getTablesSQL();
        return $this->query($sql, [$this->database]);
    }

    public function getTableColumns(String $tableName): array
    {
        $sql = $this->getTableColumnsSQL();
        return $this->query($sql, [$tableName, $this->database]);
    }

    public function getTablePrimaryKeys(String $tableName): array
    {
        $sql = $this->getTablePrimaryKeysSQL();
        $results = $this->query($sql, [$tableName, $this->database]);
        $primaryKeys = [];
        foreach ($results as $result) {
            $primaryKeys[] = $result['COLUMN_NAME'];
        }
        return $primaryKeys;
    }

    public function getTableForeignKeys(String $tableName): array
    {
        $sql = $this->getTableForeignKeysSQL();
        $results = $this->query($sql, [$tableName, $this->database]);
        $foreignKeys = [];
        foreach ($results as $result) {
            $foreignKeys[$result['COLUMN_NAME']] = $result['REFERENCED_TABLE_NAME'];
        }
        return $foreignKeys;
    }

    public function toJdbcType(String $type, int $size): String
    {
        return $this->typeConverter->toJdbc($type, $size);
    }

    private function query(String $sql, array $parameters): array
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($parameters);
        return $stmt->fetchAll();
    }
}

// file: src/Tqdev/PhpCrudApi/Database/TypeConverter.php

class TypeConverter
{
    private $driver;

    public function __construct(String $driver)
    {
        $this->driver = $driver;
    }

    private $fromJdbc = [
        'mysql' => [
            'clob' => 'longtext',
            'boolean' => 'bit',
            'blob' => 'longblob',
            'timestamp' => 'datetime',
        ],
        'pgsql' => [
            'clob' => 'text',
            'blob' => 'bytea',
        ],
        'sqlsrv' => [
            'boolean' => 'bit',
        ],
    ];

    private $toJdbc = [
        'simplified' => [
            'char' => 'varchar',
            'longvarchar' => 'clob',
            'nchar' => 'varchar',
            'nvarchar' => 'varchar',
            'longnvarchar' => 'clob',
            'binary' => 'varbinary',
            'longvarbinary' => 'blob',
            'tinyint' => 'integer',
            'smallint' => 'integer',
            'real' => 'float',
            'numeric' => 'decimal',
            'time_with_timezone' => 'time',
            'timestamp_with_timezone' => 'timestamp',
        ],
        'mysql' => [
            'tinyint(1)' => 'boolean',
            'bit(0)' => 'boolean',
            'bit(1)' => 'boolean',
            'tinyblob' => 'blob',
            'mediumblob' => 'blob',
            'longblob' => 'blob',
            'tinytext' => 'clob',
            'mediumtext' => 'clob',
            'longtext' => 'clob',
            'text' => 'clob',
            'int' => 'integer',
            'polygon' => 'geometry',
            'point' => 'geometry',
            'datetime' => 'timestamp',
        ],
        'pgsql' => [
            'bigserial' => 'bigint',
            'bit varying' => 'bit',
            'box' => 'geometry',
            'bytea' => 'blob',
            'character varying' => 'varchar',
            'character' => 'char',
            'cidr' => 'varchar',
            'circle' => 'geometry',
            'double precision' => 'double',
            'inet' => 'integer',
            'jsonb' => 'clob',
            'line' => 'geometry',
            'lseg' => 'geometry',
            'macaddr' => 'varchar',
            'money' => 'decimal',
            'path' => 'geometry',
            'point' => 'geometry',
            'polygon' => 'geometry',
            'real' => 'float',
            'serial' => 'integer',
            'text' => 'clob',
            'time without time zone' => 'time',
            'time with time zone' => 'time_with_timezone',
            'timestamp without time zone' => 'timestamp',
            'timestamp with time zone' => 'timestamp_with_timezone',
            'uuid' => 'char',
            'xml' => 'clob',
        ],
        'sqlsrv' => [
            'varbinary(0)' => 'blob',
            'bit' => 'boolean',
            'datetime' => 'timestamp',
            'datetime2' => 'timestamp',
            'float' => 'double',
            'image' => 'longvarbinary',
            'int' => 'integer',
            'money' => 'decimal',
            'ntext' => 'longnvarchar',
            'smalldatetime' => 'timestamp',
            'smallmoney' => 'decimal',
            'text' => 'longvarchar',
            'timestamp' => 'binary',
            'tinyint' => 'tinyint',
            'udt' => 'varbinary',
            'uniqueidentifier' => 'char',
            'xml' => 'longnvarchar',
        ],
    ];

    private $valid = [
        'bigint' => true,
        'binary' => true,
        'bit' => true,
        'blob' => true,
        'boolean' => true,
        'char' => true,
        'clob' => true,
        'date' => true,
        'decimal' => true,
        'distinct' => true,
        'double' => true,
        'float' => true,
        'integer' => true,
        'longnvarchar' => true,
        'longvarbinary' => true,
        'longvarchar' => true,
        'nchar' => true,
        'nclob' => true,
        'numeric' => true,
        'nvarchar' => true,
        'real' => true,
        'smallint' => true,
        'time' => true,
        'time_with_timezone' => true,
        'timestamp' => true,
        'timestamp_with_timezone' => true,
        'tinyint' => true,
        'varbinary' => true,
        'varchar' => true,
        'geometry' => true,
    ];

    public function toJdbc(String $type, int $size): String
    {
        $jdbcType = strtolower($type);
        if (isset($this->toJdbc[$this->driver]["$jdbcType($size)"])) {
            $jdbcType = $this->toJdbc[$this->driver]["$jdbcType($size)"];
        }
        if (isset($this->toJdbc[$this->driver][$jdbcType])) {
            $jdbcType = $this->toJdbc[$this->driver][$jdbcType];
        }
        if (isset($this->toJdbc['simplified'][$jdbcType])) {
            $jdbcType = $this->toJdbc['simplified'][$jdbcType];
        }
        if (!isset($this->valid[$jdbcType])) {
            throw new \Exception("Unsupported type '$jdbcType' for driver '$this->driver'");
        }
        return $jdbcType;
    }

    public function fromJdbc(String $type): String
    {
        $jdbcType = strtolower($type);
        if (isset($this->fromJdbc[$this->driver][$jdbcType])) {
            $jdbcType = $this->fromJdbc[$this->driver][$jdbcType];
        }
        return $jdbcType;
    }
}

// file: src/Tqdev/PhpCrudApi/Middleware/Base/Handler.php

interface Handler
{
    public function handle(Request $request): Response;
}

// file: src/Tqdev/PhpCrudApi/Middleware/Base/Middleware.php

abstract class Middleware implements Handler
{
    protected $next;
    protected $responder;
    private $properties;

    public function __construct(Router $router, Responder $responder, array $properties)
    {
        $router->load($this);
        $this->responder = $responder;
        $this->properties = $properties;
    }

    public function setNext(Handler $handler) /*: void*/
    {
        $this->next = $handler;
    }

    protected function getProperty(String $key, $default)
    {
        return isset($this->properties[$key]) ? $this->properties[$key] : $default;
    }
}

// file: src/Tqdev/PhpCrudApi/Middleware/Communication/VariableStore.php

class VariableStore
{
    static $values = array();

    public static function get(String $key)
    {
        if (isset(self::$values[$key])) {
            return self::$values[$key];
        }
        return null;
    }

    public static function set(String $key, /* object */ $value)
    {
        self::$values[$key] = $value;
    }
}

// file: src/Tqdev/PhpCrudApi/Middleware/Router/Router.php

interface Router extends Handler
{
    public function register(String $method, String $path, array $handler);

    public function load(Middleware $middleware);

    public function route(Request $request): Response;
}

// file: src/Tqdev/PhpCrudApi/Middleware/Router/SimpleRouter.php

class SimpleRouter implements Router
{
    private $responder;
    private $cache;
    private $ttl;
    private $registration;
    private $routes;
    private $routeHandlers;
    private $middlewares;

    public function __construct(Responder $responder, Cache $cache, int $ttl)
    {
        $this->responder = $responder;
        $this->cache = $cache;
        $this->ttl = $ttl;
        $this->registration = true;
        $this->routes = $this->loadPathTree();
        $this->routeHandlers = [];
        $this->middlewares = array();
    }

    private function loadPathTree(): PathTree
    {
        $data = $this->cache->get('PathTree');
        if ($data != '') {
            $tree = PathTree::fromJson(json_decode(gzuncompress($data)));
            $this->registration = false;
        } else {
            $tree = new PathTree();
        }
        return $tree;
    }

    public function register(String $method, String $path, array $handler)
    {
        $routeNumber = count($this->routeHandlers);
        $this->routeHandlers[$routeNumber] = $handler;
        if ($this->registration) {
            $parts = explode('/', trim($path, '/'));
            array_unshift($parts, $method);
            $this->routes->put($parts, $routeNumber);
        }
    }

    public function load(Middleware $middleware) /*: void*/
    {
        if (count($this->middlewares) > 0) {
            $next = $this->middlewares[0];
        } else {
            $next = $this;
        }
        $middleware->setNext($next);
        array_unshift($this->middlewares, $middleware);
    }

    public function route(Request $request): Response
    {
        if ($this->registration) {
            $data = gzcompress(json_encode($this->routes, JSON_UNESCAPED_UNICODE));
            $this->cache->set('PathTree', $data, $this->ttl);
        }
        $obj = $this;
        if (count($this->middlewares) > 0) {
            $obj = $this->middlewares[0];
        }
        return $obj->handle($request);
    }

    private function getRouteNumbers(Request $request): array
    {
        $method = strtoupper($request->getMethod());
        $path = explode('/', trim($request->getPath(0), '/'));
        array_unshift($path, $method);
        return $this->routes->match($path);
    }

    public function handle(Request $request): Response
    {
        $routeNumbers = $this->getRouteNumbers($request);
        if (count($routeNumbers) == 0) {
            return $this->responder->error(ErrorCode::ROUTE_NOT_FOUND, $request->getPath());
        }
        return call_user_func($this->routeHandlers[$routeNumbers[0]], $request);
    }

}

// file: src/Tqdev/PhpCrudApi/Middleware/AuthorizationMiddleware.php

class AuthorizationMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
    }

    private function handleColumns(String $method, String $path, String $databaseName, String $tableName) /*: void*/
    {
        $columnHandler = $this->getProperty('columnHandler', '');
        if ($columnHandler) {
            $table = $this->reflection->getTable($tableName);
            foreach ($table->columnNames() as $columnName) {
                $allowed = call_user_func($columnHandler, $method, $path, $databaseName, $tableName, $columnName);
                if (!$allowed) {
                    $this->reflection->removeColumn($tableName, $columnName);
                }
            }
        }
    }

    private function handleTable(String $method, String $path, String $databaseName, String $tableName) /*: void*/
    {
        if (!$this->reflection->hasTable($tableName)) {
            return;
        }
        $tableHandler = $this->getProperty('tableHandler', '');
        if ($tableHandler) {
            $allowed = call_user_func($tableHandler, $method, $path, $databaseName, $tableName);
            if (!$allowed) {
                $this->reflection->removeTable($tableName);
            } else {
                $this->handleColumns($method, $path, $databaseName, $tableName);
            }
        }
    }

    private function handleJoinTables(String $method, String $path, String $databaseName, array $joinParameters) /*: void*/
    {
        $uniqueTableNames = array();
        foreach ($joinParameters as $joinParameter) {
            $tableNames = explode(',', trim($joinParameter));
            foreach ($tableNames as $tableName) {
                $uniqueTableNames[$tableName] = true;
            }
        }
        foreach (array_keys($uniqueTableNames) as $tableName) {
            $this->handleTable($method, $path, $databaseName, trim($tableName));
        }
    }

    private function handleAllTables(String $method, String $path, String $databaseName) /*: void*/
    {
        $tableNames = $this->reflection->getTableNames();
        foreach ($tableNames as $tableName) {
            $this->handleTable($method, $path, $databaseName, $tableName);
        }
    }

    private function handleRecords(String $method, String $path, String $databaseName, String $tableName) /*: void*/
    {
        if (!$this->reflection->hasTable($tableName)) {
            return;
        }
        $recordHandler = $this->getProperty('recordHandler', '');
        if ($recordHandler) {
            $query = call_user_func($recordHandler, $method, $path, $databaseName, $tableName);
            $filters = new FilterInfo();
            $table = $this->reflection->getTable($tableName);
            $query = str_replace('][]=', ']=', str_replace('=', '[]=', $query));
            parse_str($query, $params);
            $condition = $filters->getCombinedConditions($table, $params);
            VariableStore::set('authorization.condition', $condition);
        }
    }

    public function handle(Request $request): Response
    {
        $method = $request->getMethod();
        $path = $request->getPathSegment(1);
        $databaseName = $this->reflection->getDatabaseName();
        if ($path == 'records') {
            $tableName = $request->getPathSegment(2);
            $this->handleTable($method, $path, $databaseName, $tableName);
            $params = $request->getParams();
            if (isset($params['join'])) {
                $this->handleJoinTables($method, $path, $databaseName, $params['join']);
            }
            $this->handleRecords($method, $path, $databaseName, $tableName);
        } elseif ($path == 'columns') {
            $tableName = $request->getPathSegment(2);
            if ($tableName) {
                $this->handleTable($method, $path, $databaseName, $tableName);
            } else {
                $this->handleAllTables($method, $path, $databaseName);
            }
        } elseif ($path == 'openapi') {
            $this->handleAllTables($method, $path, $databaseName);
        }
        return $this->next->handle($request);
    }
}

// file: src/Tqdev/PhpCrudApi/Middleware/BasicAuthMiddleware.php

class BasicAuthMiddleware extends Middleware
{
    private function hasCorrectPassword(String $username, String $password, array &$passwords): bool
    {
        $hash = isset($passwords[$username]) ? $passwords[$username] : false;
        if ($hash && password_verify($password, $hash)) {
            if (password_needs_rehash($hash, PASSWORD_DEFAULT)) {
                $passwords[$username] = password_hash($password, PASSWORD_DEFAULT);
            }
            return true;
        }
        return false;
    }

    private function getValidUsername(String $username, String $password, String $passwordFile): String
    {
        $passwords = $this->readPasswords($passwordFile);
        $valid = $this->hasCorrectPassword($username, $password, $passwords);
        $this->writePasswords($passwordFile, $passwords);
        return $valid ? $username : '';
    }

    private function readPasswords(String $passwordFile): array
    {
        $passwords = [];
        $passwordLines = file($passwordFile);
        foreach ($passwordLines as $passwordLine) {
            if (strpos($passwordLine, ':') !== false) {
                list($username, $hash) = explode(':', trim($passwordLine), 2);
                if (strlen($hash) > 0 && $hash[0] != '$') {
                    $hash = password_hash($hash, PASSWORD_DEFAULT);
                }
                $passwords[$username] = $hash;
            }
        }
        return $passwords;
    }

    private function writePasswords(String $passwordFile, array $passwords): bool
    {
        $success = false;
        $passwordFileContents = '';
        foreach ($passwords as $username => $hash) {
            $passwordFileContents .= "$username:$hash\n";
        }
        if (file_get_contents($passwordFile) != $passwordFileContents) {
            $success = file_put_contents($passwordFile, $passwordFileContents) !== false;
        }
        return $success;
    }

    private function getAuthorizationCredentials(Request $request): String
    {
        $parts = explode(' ', trim($request->getHeader('Authorization')), 2);
        if (count($parts) != 2) {
            return '';
        }
        if ($parts[0] != 'Basic') {
            return '';
        }
        return base64_decode(strtr($parts[1], '-_', '+/'));
    }

    public function handle(Request $request): Response
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $credentials = $this->getAuthorizationCredentials($request);
        if ($credentials) {
            list($username, $password) = array('', '');
            if (strpos($credentials, ':') !== false) {
                list($username, $password) = explode(':', $credentials, 2);
            }
            $passwordFile = $this->getProperty('passwordFile', '.htpasswd');
            $validUser = $this->getValidUsername($username, $password, $passwordFile);
            $_SESSION['username'] = $validUser;
            if (!$validUser) {
                return $this->responder->error(ErrorCode::ACCESS_DENIED, $username);
            }
        }
        return $this->next->handle($request);
    }
}

// file: src/Tqdev/PhpCrudApi/Middleware/CorsMiddleware.php

class CorsMiddleware extends Middleware
{
    private function isOriginAllowed(String $origin, String $allowedOrigins): bool
    {
        $found = false;
        foreach (explode(',', $allowedOrigins) as $allowedOrigin) {
            $hostname = preg_quote(strtolower(trim($allowedOrigin)));
            $regex = '/^' . str_replace('\*', '.*', $hostname) . '$/';
            if (preg_match($regex, $origin)) {
                $found = true;
                break;
            }
        }
        return $found;
    }

    public function handle(Request $request): Response
    {
        $method = $request->getMethod();
        $origin = $request->getHeader('Origin');
        $allowedOrigins = $this->getProperty('allowedOrigins', '*');
        if ($origin && !$this->isOriginAllowed($origin, $allowedOrigins)) {
            $response = $this->responder->error(ErrorCode::ORIGIN_FORBIDDEN, $origin);
        } elseif ($method == 'OPTIONS') {
            $response = new Response(Response::OK, '');
            $allowHeaders = $this->getProperty('allowHeaders', 'Content-Type, X-XSRF-TOKEN');
            $response->addHeader('Access-Control-Allow-Headers', $allowHeaders);
            $allowMethods = $this->getProperty('allowMethods', 'OPTIONS, GET, PUT, POST, DELETE, PATCH');
            $response->addHeader('Access-Control-Allow-Methods', $allowMethods);
            $allowCredentials = $this->getProperty('allowCredentials', 'true');
            $response->addHeader('Access-Control-Allow-Credentials', $allowCredentials);
            $maxAge = $this->getProperty('maxAge', '1728000');
            $response->addHeader('Access-Control-Max-Age', $maxAge);
        } else {
            $response = $this->next->handle($request);
        }
        if ($origin) {
            $allowCredentials = $this->getProperty('allowCredentials', 'true');
            $response->addHeader('Access-Control-Allow-Credentials', $allowCredentials);
            $response->addHeader('Access-Control-Allow-Origin', $origin);
        }
        return $response;
    }
}

// file: src/Tqdev/PhpCrudApi/Middleware/FirewallMiddleware.php

class FirewallMiddleware extends Middleware
{
    private function ipMatch(String $ip, String $cidr): bool
    {
        if (strpos($cidr, '/') !== false) {
            list($subnet, $mask) = explode('/', trim($cidr));
            if ((ip2long($ip) & ~((1 << (32 - $mask)) - 1)) == ip2long($subnet)) {
                return true;
            }
        } else {
            if (ip2long($ip) == ip2long($cidr)) {
                return true;
            }
        }
        return false;
    }

    private function isIpAllowed(String $ipAddress, String $allowedIpAddresses): bool
    {
        foreach (explode(',', $allowedIpAddresses) as $allowedIp) {
            if ($this->ipMatch($ipAddress, $allowedIp)) {
                return true;
            }
        }
        return false;
    }

    public function handle(Request $request): Response
    {
        $reverseProxy = $this->getProperty('reverseProxy', '');
        if ($reverseProxy) {
            $ipAddress = array_pop(explode(',', $request->getHeader('X-Forwarded-For')));
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ipAddress = $_SERVER['REMOTE_ADDR'];
        } else {
            $ipAddress = '127.0.0.1';
        }
        $allowedIpAddresses = $this->getProperty('allowedIpAddresses', '');
        if (!$this->isIpAllowed($ipAddress, $allowedIpAddresses)) {
            $response = $this->responder->error(ErrorCode::ACCESS_DENIED, $ipAddress);
        } else {
            $response = $this->next->handle($request);
        }
        return $response;
    }
}

// file: src/Tqdev/PhpCrudApi/Middleware/JwtAuthMiddleware.php

class JwtAuthMiddleware extends Middleware
{
    private function getVerifiedClaims(String $token, int $time, int $leeway, int $ttl, String $secret): array
    {
        $algorithms = array('HS256' => 'sha256', 'HS384' => 'sha384', 'HS512' => 'sha512');
        $token = explode('.', $token);
        if (count($token) < 3) {
            return array();
        }
        $header = json_decode(base64_decode(strtr($token[0], '-_', '+/')), true);
        if (!$secret) {
            return array();
        }
        if ($header['typ'] != 'JWT') {
            return array();
        }
        $algorithm = $header['alg'];
        if (!isset($algorithms[$algorithm])) {
            return array();
        }
        $hmac = $algorithms[$algorithm];
        $signature = bin2hex(base64_decode(strtr($token[2], '-_', '+/')));
        if ($signature != hash_hmac($hmac, "$token[0].$token[1]", $secret)) {
            return array();
        }
        $claims = json_decode(base64_decode(strtr($token[1], '-_', '+/')), true);
        if (!$claims) {
            return array();
        }
        if (isset($claims['nbf']) && $time + $leeway < $claims['nbf']) {
            return array();
        }
        if (isset($claims['iat']) && $time + $leeway < $claims['iat']) {
            return array();
        }
        if (isset($claims['exp']) && $time - $leeway > $claims['exp']) {
            return array();
        }
        if (isset($claims['iat']) && !isset($claims['exp'])) {
            if ($time - $leeway > $claims['iat'] + $ttl) {
                return array();
            }
        }
        return $claims;
    }

    private function getClaims(String $token): array
    {
        $time = (int) $this->getProperty('time', time());
        $leeway = (int) $this->getProperty('leeway', '5');
        $ttl = (int) $this->getProperty('ttl', '30');
        $secret = $this->getProperty('secret', '');
        if (!$secret) {
            return array();
        }
        return $this->getVerifiedClaims($token, $time, $leeway, $ttl, $secret);
    }

    private function getAuthorizationToken(Request $request): String
    {
        $parts = explode(' ', trim($request->getHeader('Authorization')), 2);
        if (count($parts) != 2) {
            return '';
        }
        if ($parts[0] != 'Bearer') {
            return '';
        }
        return $parts[1];
    }

    public function handle(Request $request): Response
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $token = $this->getAuthorizationToken($request);
        if ($token) {
            $claims = $this->getClaims($token);
            $_SESSION['claims'] = $claims;
            if (empty($claims)) {
                return $this->responder->error(ErrorCode::ACCESS_DENIED, 'JWT');
            }
        }
        return $this->next->handle($request);
    }
}

// file: src/Tqdev/PhpCrudApi/Middleware/SanitationMiddleware.php

class SanitationMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
    }

    private function callHandler($handler, $record, String $method, ReflectedTable $table) /*: object */
    {
        $context = (array) $record;
        $tableName = $table->getName();
        foreach ($context as $columnName => &$value) {
            if ($table->exists($columnName)) {
                $column = $table->get($columnName);
                $value = call_user_func($handler, $method, $tableName, $column->serialize(), $value);
            }
        }
        return (object) $context;
    }

    public function handle(Request $request): Response
    {
        $path = $request->getPathSegment(1);
        $tableName = $request->getPathSegment(2);
        $record = $request->getBody();
        if ($path == 'records' && $this->reflection->hasTable($tableName) && $record !== null) {
            $table = $this->reflection->getTable($tableName);
            $method = $request->getMethod();
            $handler = $this->getProperty('handler', '');
            if ($handler !== '') {
                if (is_array($record)) {
                    foreach ($record as &$r) {
                        $r = $this->callHandler($handler, $r, $method, $table);
                    }
                } else {
                    $record = $this->callHandler($handler, $record, $method, $table);
                }
                $path = $request->getPath();
                $query = urldecode(http_build_query($request->getParams()));
                $headers = $request->getHeaders();
                $body = json_encode($record);
                $request = new Request($method, $path, $query, $headers, $body);
            }
        }
        return $this->next->handle($request);
    }
}

// file: src/Tqdev/PhpCrudApi/Middleware/ValidationMiddleware.php

class ValidationMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
    }

    private function callHandler($handler, $record, String $method, ReflectedTable $table) /*: Response?*/
    {
        $context = (array) $record;
        $details = array();
        $tableName = $table->getName();
        foreach ($context as $columnName => $value) {
            if ($table->exists($columnName)) {
                $column = $table->get($columnName);
                $valid = call_user_func($handler, $method, $tableName, $column->serialize(), $value, $context);
                if ($valid !== true && $valid !== '') {
                    $details[$columnName] = $valid;
                }
            }
        }
        if (count($details) > 0) {
            return $this->responder->error(ErrorCode::INPUT_VALIDATION_FAILED, $tableName, $details);
        }
        return null;
    }

    public function handle(Request $request): Response
    {
        $path = $request->getPathSegment(1);
        $tableName = $request->getPathSegment(2);
        $record = $request->getBody();
        if ($path == 'records' && $this->reflection->hasTable($tableName) && $record !== null) {
            $table = $this->reflection->getTable($tableName);
            $method = $request->getMethod();
            $handler = $this->getProperty('handler', '');
            if ($handler !== '') {
                if (is_array($record)) {
                    foreach ($record as $r) {
                        $response = $this->callHandler($handler, $r, $method, $table);
                        if ($response !== null) {
                            return $response;
                        }
                    }
                } else {
                    $response = $this->callHandler($handler, $record, $method, $table);
                    if ($response !== null) {
                        return $response;
                    }
                }
            }
        }
        return $this->next->handle($request);
    }
}

// file: src/Tqdev/PhpCrudApi/OpenApi/OpenApiBuilder.php

class OpenApiBuilder
{
    private $openapi;
    private $reflection;
    private $operations = [
        'list' => 'get',
        'create' => 'post',
        'read' => 'get',
        'update' => 'put',
        'delete' => 'delete',
        'increment' => 'patch',
    ];
    private $types = [
        'integer' => 'integer',
        'varchar' => 'string',
        'blob' => 'string',
        'clob' => 'string',
        'decimal' => 'string',
        'timestamp' => 'string',
        'geometry' => 'string',
        'boolean' => 'boolean',
    ];

    public function __construct(ReflectionService $reflection, $base)
    {
        $this->reflection = $reflection;
        $this->openapi = new OpenApiDefinition($base);
    }

    public function build(): OpenApiDefinition
    {
        $this->openapi->set("openapi", "3.0.0");
        $tableNames = $this->reflection->getTableNames();
        foreach ($tableNames as $tableName) {
            $this->setPath("paths", $tableName);
        }
        foreach ($tableNames as $tableName) {
            $this->setComponentSchema("components|schemas", $tableName);
        }
        foreach ($tableNames as $index => $tableName) {
            $this->setTag("tags", $index, $tableName);
        }
        return $this->openapi;
    }

    private function setPath(String $prefix, String $tableName) /*: void*/
    {
        $table = $this->reflection->getTable($tableName);
        $pk = $table->getPk();
        $pkName = $pk ? $pk->getName() : '';
        foreach ($this->operations as $operation => $method) {
            if (in_array($operation, ['list', 'create'])) {
                $path = sprintf('/records/%s', $tableName);
            } else {
                if (!$pkName) {
                    continue;
                }
                $path = sprintf('/records/%s/{%s}', $tableName, $pkName);
            }
            $this->openapi->set("$prefix|$path|$method|description", "$operation $tableName");
            $this->openapi->set("$prefix|$path|$method|responses|200|description", "$operation $tableName succeeded");
        }
    }

    private function setComponentSchema(String $prefix, String $tableName) /*: void*/
    {
        $this->openapi->set("$prefix|$tableName|type", "object");
        $table = $this->reflection->getTable($tableName);
        foreach ($table->columnNames() as $columnName) {
            $column = $table->get($columnName);
            $type = $this->types[$column->getType()];
            $this->openapi->set("$prefix|$tableName|properties|$columnName|type", $type);
        }
    }

    private function setTag(String $prefix, int $index, String $tableName) /*: void*/
    {
        $this->openapi->set("$prefix|$index|name", "$tableName");
        $this->openapi->set("$prefix|$index|description", "$tableName operations");
    }
}

// file: src/Tqdev/PhpCrudApi/OpenApi/OpenApiDefinition.php

class OpenApiDefinition implements \JsonSerializable
{
    private $root;

    public function __construct($base)
    {
        $this->root = $base;
    }

    public function set(String $path, String $value) /*: void*/
    {
        $parts = explode('|', trim($path, '|'));
        $current = &$this->root;
        while (count($parts) > 0) {
            $part = array_shift($parts);
            if (!isset($current[$part])) {
                $current[$part] = [];
            }
            $current = &$current[$part];
        }
        $current = $value;
    }

    public function jsonSerialize()
    {
        return $this->root;
    }
}

// file: src/Tqdev/PhpCrudApi/OpenApi/OpenApiService.php

class OpenApiService
{
    private $builder;

    public function __construct(ReflectionService $reflection, array $base)
    {
        $this->builder = new OpenApiBuilder($reflection, $base);
    }

    public function get(): OpenApiDefinition
    {
        return $this->builder->build();
    }

}

// file: src/Tqdev/PhpCrudApi/Record/Condition/AndCondition.php

class AndCondition extends Condition
{
    private $conditions;

    public function __construct(Condition $condition1, Condition $condition2)
    {
        $this->conditions = [$condition1, $condition2];
    }

    public function _and(Condition $condition): Condition
    {
        if ($condition instanceof NoCondition) {
            return $this;
        }
        $this->conditions[] = $condition;
        return $this;
    }

    public function getConditions(): array
    {
        return $this->conditions;
    }

    public static function fromArray(array $conditions): Condition
    {
        $condition = new NoCondition();
        foreach ($conditions as $c) {
            $condition = $condition->_and($c);
        }
        return $condition;
    }
}

// file: src/Tqdev/PhpCrudApi/Record/Condition/ColumnCondition.php

class ColumnCondition extends Condition
{
    private $column;
    private $operator;
    private $value;

    public function __construct(ReflectedColumn $column, String $operator, String $value)
    {
        $this->column = $column;
        $this->operator = $operator;
        $this->value = $value;
    }

    public function getColumn(): ReflectedColumn
    {
        return $this->column;
    }

    public function getOperator(): String
    {
        return $this->operator;
    }

    public function getValue(): String
    {
        return $this->value;
    }
}

// file: src/Tqdev/PhpCrudApi/Record/Condition/Condition.php

abstract class Condition
{
    public function _and(Condition $condition): Condition
    {
        if ($condition instanceof NoCondition) {
            return $this;
        }
        return new AndCondition($this, $condition);
    }

    public function _or(Condition $condition): Condition
    {
        if ($condition instanceof NoCondition) {
            return $this;
        }
        return new OrCondition($this, $condition);
    }

    public function _not(): Condition
    {
        return new NotCondition($this);
    }

    public static function fromString(ReflectedTable $table, String $value): Condition
    {
        $condition = new NoCondition();
        $parts = explode(',', $value, 3);
        if (count($parts) < 2) {
            return null;
        }
        $field = $table->get($parts[0]);
        $command = $parts[1];
        $negate = false;
        $spatial = false;
        if (strlen($command) > 2) {
            if (substr($command, 0, 1) == 'n') {
                $negate = true;
                $command = substr($command, 1);
            }
            if (substr($command, 0, 1) == 's') {
                $spatial = true;
                $command = substr($command, 1);
            }
        }
        if (count($parts) == 3 || (count($parts) == 2 && in_array($command, ['ic', 'is', 'iv']))) {
            if ($spatial) {
                if (in_array($command, ['co', 'cr', 'di', 'eq', 'in', 'ov', 'to', 'wi', 'ic', 'is', 'iv'])) {
                    $condition = new SpatialCondition($field, $command, $parts[2]);
                }
            } else {
                if (in_array($command, ['cs', 'sw', 'ew', 'eq', 'lt', 'le', 'ge', 'gt', 'bt', 'in', 'is'])) {
                    $condition = new ColumnCondition($field, $command, $parts[2]);
                }
            }
        }
        if ($negate) {
            $condition = $condition->_not();
        }
        return $condition;
    }

}

// file: src/Tqdev/PhpCrudApi/Record/Condition/NoCondition.php

class NoCondition extends Condition
{
    public function _and(Condition $condition): Condition
    {
        return $condition;
    }

    public function _or(Condition $condition): Condition
    {
        return $condition;
    }

    public function _not(): Condition
    {
        return $this;
    }

}

// file: src/Tqdev/PhpCrudApi/Record/Condition/NotCondition.php

class NotCondition extends Condition
{
    private $condition;

    public function __construct(Condition $condition)
    {
        $this->condition = $condition;
    }

    public function getCondition(): Condition
    {
        return $this->condition;
    }
}

// file: src/Tqdev/PhpCrudApi/Record/Condition/OrCondition.php

class OrCondition extends Condition
{
    private $conditions;

    public function __construct(Condition $condition1, Condition $condition2)
    {
        $this->conditions = [$condition1, $condition2];
    }

    public function _or(Condition $condition): Condition
    {
        if ($condition instanceof NoCondition) {
            return $this;
        }
        $this->conditions[] = $condition;
        return $this;
    }

    public function getConditions(): array
    {
        return $this->conditions;
    }

    public static function fromArray(array $conditions): Condition
    {
        $condition = new NoCondition();
        foreach ($conditions as $c) {
            $condition = $condition->_or($c);
        }
        return $condition;
    }
}

// file: src/Tqdev/PhpCrudApi/Record/Condition/SpatialCondition.php

class SpatialCondition extends ColumnCondition
{
}

// file: src/Tqdev/PhpCrudApi/Record/Document/ErrorDocument.php

class ErrorDocument implements \JsonSerializable
{
    public $code;
    public $message;
    public $details;

    public function __construct(ErrorCode $errorCode, String $argument, $details)
    {
        $this->code = $errorCode->getCode();
        $this->message = $errorCode->getMessage($argument);
        $this->details = $details;
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function getMessage(): String
    {
        return $this->message;
    }

    public function serialize()
    {
        return [
            'code' => $this->code,
            'message' => $this->message,
            'details' => $this->details,
        ];
    }

    public function jsonSerialize()
    {
        return array_filter($this->serialize());
    }
}

// file: src/Tqdev/PhpCrudApi/Record/Document/ListDocument.php

class ListDocument implements \JsonSerializable
{

    private $records;

    private $results;

    public function __construct(array $records, int $results)
    {
        $this->records = $records;
        $this->results = $results;
    }

    public function getRecords(): array
    {
        return $this->records;
    }

    public function getResults(): int
    {
        return $this->results;
    }

    public function serialize()
    {
        return [
            'records' => $this->records,
            'results' => $this->results,
        ];
    }

    public function jsonSerialize()
    {
        return array_filter($this->serialize(), function ($v) {
            return $v !== 0;
        });
    }
}

// file: src/Tqdev/PhpCrudApi/Record/ColumnIncluder.php

class ColumnIncluder
{

    private function isMandatory(String $tableName, String $columnName, array $params): bool
    {
        return isset($params['mandatory']) && in_array($tableName . "." . $columnName, $params['mandatory']);
    }

    private function select(String $tableName, bool $primaryTable, array $params, String $paramName,
        array $columnNames, bool $include): array{
        if (!isset($params[$paramName])) {
            return $columnNames;
        }
        $columns = array();
        foreach (explode(',', $params[$paramName][0]) as $columnName) {
            $columns[$columnName] = true;
        }
        $result = array();
        foreach ($columnNames as $columnName) {
            $match = isset($columns['*.*']);
            if (!$match) {
                $match = isset($columns[$tableName . '.*']) || isset($columns[$tableName . '.' . $columnName]);
            }
            if ($primaryTable && !$match) {
                $match = isset($columns['*']) || isset($columns[$columnName]);
            }
            if ($match) {
                if ($include || $this->isMandatory($tableName, $columnName, $params)) {
                    $result[] = $columnName;
                }
            } else {
                if (!$include || $this->isMandatory($tableName, $columnName, $params)) {
                    $result[] = $columnName;
                }
            }
        }
        return $result;
    }

    public function getNames(ReflectedTable $table, bool $primaryTable, array $params): array
    {
        $tableName = $table->getName();
        $results = $table->columnNames();
        $results = $this->select($tableName, $primaryTable, $params, 'include', $results, true);
        $results = $this->select($tableName, $primaryTable, $params, 'exclude', $results, false);
        return $results;
    }

    public function getValues(ReflectedTable $table, bool $primaryTable, /* object */ $record, array $params): array
    {
        $results = array();
        $columnNames = $this->getNames($table, $primaryTable, $params);
        foreach ($columnNames as $columnName) {
            if (property_exists($record, $columnName)) {
                $results[$columnName] = $record->$columnName;
            }
        }
        return $results;
    }

}

// file: src/Tqdev/PhpCrudApi/Record/ErrorCode.php

class ErrorCode
{

    private $code;
    private $message;
    private $status;

    const ERROR_NOT_FOUND = 9999;
    const ROUTE_NOT_FOUND = 1000;
    const TABLE_NOT_FOUND = 1001;
    const ARGUMENT_COUNT_MISMATCH = 1002;
    const RECORD_NOT_FOUND = 1003;
    const ORIGIN_FORBIDDEN = 1004;
    const COLUMN_NOT_FOUND = 1005;
    const TABLE_ALREADY_EXISTS = 1006;
    const COLUMN_ALREADY_EXISTS = 1007;
    const HTTP_MESSAGE_NOT_READABLE = 1008;
    const DUPLICATE_KEY_EXCEPTION = 1009;
    const DATA_INTEGRITY_VIOLATION = 1010;
    const AUTHORIZATION_REQUIRED = 1011;
    const ACCESS_DENIED = 1012;
    const INPUT_VALIDATION_FAILED = 1013;
    const OPERATION_FORBIDDEN = 1014;

    private $values = [
        9999 => ["%s", Response::INTERNAL_SERVER_ERROR],
        1000 => ["Route '%s' not found", Response::NOT_FOUND],
        1001 => ["Table '%s' not found", Response::NOT_FOUND],
        1002 => ["Argument count mismatch in '%s'", Response::UNPROCESSABLE_ENTITY],
        1003 => ["Record '%s' not found", Response::NOT_FOUND],
        1004 => ["Origin '%s' is forbidden", Response::FORBIDDEN],
        1005 => ["Column '%s' not found", Response::NOT_FOUND],
        1006 => ["Table '%s' already exists", Response::CONFLICT],
        1007 => ["Column '%s' already exists", Response::CONFLICT],
        1008 => ["Cannot read HTTP message", Response::UNPROCESSABLE_ENTITY],
        1009 => ["Duplicate key exception", Response::CONFLICT],
        1010 => ["Data integrity violation", Response::CONFLICT],
        1011 => ["Authorization required", Response::UNAUTHORIZED],
        1012 => ["Access denied for '%s'", Response::FORBIDDEN],
        1013 => ["Input validation failed for '%s'", Response::UNPROCESSABLE_ENTITY],
        1014 => ["Operation forbidden", Response::FORBIDDEN],
    ];

    public function __construct(int $code)
    {
        if (!isset($this->values[$code])) {
            $code = 9999;
        }
        $this->code = $code;
        $this->message = $this->values[$code][0];
        $this->status = $this->values[$code][1];
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function getMessage(String $argument): String
    {
        return sprintf($this->message, $argument);
    }

    public function getStatus(): int
    {
        return $this->status;
    }

}

// file: src/Tqdev/PhpCrudApi/Record/FilterInfo.php

class FilterInfo
{

    private function addConditionFromFilterPath(PathTree $conditions, array $path, ReflectedTable $table, array $params)
    {
        $key = 'filter' . implode('', $path);
        if (isset($params[$key])) {
            foreach ($params[$key] as $filter) {
                $condition = Condition::fromString($table, $filter);
                if ($condition != null) {
                    $conditions->put($path, $condition);
                }
            }
        }
    }

    private function getConditionsAsPathTree(ReflectedTable $table, array $params): PathTree
    {
        $conditions = new PathTree();
        $this->addConditionFromFilterPath($conditions, [], $table, $params);
        for ($n = ord('0'); $n <= ord('9'); $n++) {
            $this->addConditionFromFilterPath($conditions, [chr($n)], $table, $params);
            for ($l = ord('a'); $l <= ord('f'); $l++) {
                $this->addConditionFromFilterPath($conditions, [chr($n), chr($l)], $table, $params);
            }
        }
        return $conditions;
    }

    private function combinePathTreeOfConditions(PathTree $tree): Condition
    {
        $andConditions = $tree->getValues();
        $and = AndCondition::fromArray($andConditions);
        $orConditions = [];
        foreach ($tree->getKeys() as $p) {
            $orConditions[] = $this->combinePathTreeOfConditions($tree->get($p));
        }
        $or = OrCondition::fromArray($orConditions);
        return $and->_and($or);
    }

    public function getCombinedConditions(ReflectedTable $table, array $params): Condition
    {
        return $this->combinePathTreeOfConditions($this->getConditionsAsPathTree($table, $params));
    }

}

// file: src/Tqdev/PhpCrudApi/Record/HabtmValues.php

class HabtmValues
{
    public $pkValues;
    public $fkValues;

    public function __construct(array $pkValues, array $fkValues)
    {
        $this->pkValues = $pkValues;
        $this->fkValues = $fkValues;
    }
}

// file: src/Tqdev/PhpCrudApi/Record/OrderingInfo.php

class OrderingInfo
{

    public function getColumnOrdering(ReflectedTable $table, array $params): array
    {
        $fields = array();
        if (isset($params['order'])) {
            foreach ($params['order'] as $order) {
                $parts = explode(',', $order, 3);
                $columnName = $parts[0];
                if (!$table->exists($columnName)) {
                    continue;
                }
                $ascending = 'ASC';
                if (count($parts) > 1) {
                    if (substr(strtoupper($parts[1]), 0, 4) == "DESC") {
                        $ascending = 'DESC';
                    }
                }
                $fields[] = [$columnName, $ascending];
            }
        }
        if (count($fields) == 0) {
            $pk = $table->getPk();
            if ($pk) {
                $fields[] = [$pk->getName(), 'ASC'];
            } else {
                foreach ($table->columnNames() as $columnName) {
                    $fields[] = [$columnName, 'ASC'];
                }

            }
        }
        return $fields;
    }
}

// file: src/Tqdev/PhpCrudApi/Record/PaginationInfo.php

class PaginationInfo
{

    public $DEFAULT_PAGE_SIZE = 20;

    public function hasPage(array $params): bool
    {
        return isset($params['page']);
    }

    public function getPageOffset(array $params): int
    {
        $offset = 0;
        $pageSize = $this->getPageSize($params);
        if (isset($params['page'])) {
            foreach ($params['page'] as $page) {
                $parts = explode(',', $page, 2);
                $page = intval($parts[0]) - 1;
                $offset = $page * $pageSize;
            }
        }
        return $offset;
    }

    public function getPageSize(array $params): int
    {
        $pageSize = $this->DEFAULT_PAGE_SIZE;
        if (isset($params['page'])) {
            foreach ($params['page'] as $page) {
                $parts = explode(',', $page, 2);
                if (count($parts) > 1) {
                    $pageSize = intval($parts[1]);
                }
            }
        }
        return $pageSize;
    }

    public function getResultSize(array $params): int
    {
        $numberOfRows = -1;
        if (isset($params['size'])) {
            foreach ($params['size'] as $size) {
                $numberOfRows = intval($size);
            }
        }
        return $numberOfRows;
    }

}

// file: src/Tqdev/PhpCrudApi/Record/PathTree.php

class PathTree implements \JsonSerializable
{
    const WILDCARD = '*';

    private $tree;

    public function __construct( /* object */&$tree = null)
    {
        if (!$tree) {
            $tree = $this->newTree();
        }
        $this->tree = &$tree;
    }

    public function newTree()
    {
        return (object) ['values' => [], 'branches' => (object) []];
    }

    public function getKeys(): array
    {
        $branches = (array) $this->tree->branches;
        return array_keys($branches);
    }

    public function getValues(): array
    {
        return $this->tree->values;
    }

    public function get(String $key): PathTree
    {
        if (!isset($this->tree->branches->$key)) {
            return null;
        }
        return new PathTree($this->tree->branches->$key);
    }

    public function put(array $path, $value)
    {
        $tree = &$this->tree;
        foreach ($path as $key) {
            if (!isset($tree->branches->$key)) {
                $tree->branches->$key = $this->newTree();
            }
            $tree = &$tree->branches->$key;
        }
        $tree->values[] = $value;
    }

    public function match(array $path): array
    {
        $star = self::WILDCARD;
        $tree = &$this->tree;
        foreach ($path as $key) {
            if (isset($tree->branches->$key)) {
                $tree = &$tree->branches->$key;
            } else if (isset($tree->branches->$star)) {
                $tree = &$tree->branches->$star;
            } else {
                return [];
            }
        }
        return $tree->values;
    }

    public static function fromJson( /* object */$tree): PathTree
    {
        return new PathTree($tree);
    }

    public function jsonSerialize()
    {
        return $this->tree;
    }
}

// file: src/Tqdev/PhpCrudApi/Record/RecordService.php

class RecordService
{
    private $db;
    private $reflection;
    private $columns;
    private $joiner;
    private $filters;
    private $ordering;
    private $pagination;

    public function __construct(GenericDB $db, ReflectionService $reflection)
    {
        $this->db = $db;
        $this->reflection = $reflection;
        $this->columns = new ColumnIncluder();
        $this->joiner = new RelationJoiner($reflection, $this->columns);
        $this->filters = new FilterInfo();
        $this->ordering = new OrderingInfo();
        $this->pagination = new PaginationInfo();
    }

    private function sanitizeRecord(String $tableName, /* object */ $record, String $id)
    {
        $keyset = array_keys((array) $record);
        foreach ($keyset as $key) {
            if (!$this->reflection->getTable($tableName)->exists($key)) {
                unset($record->$key);
            }
        }
        if ($id != '') {
            $pk = $this->reflection->getTable($tableName)->getPk();
            foreach ($this->reflection->getTable($tableName)->columnNames() as $key) {
                $field = $this->reflection->getTable($tableName)->get($key);
                if ($field->getName() == $pk->getName()) {
                    unset($record->$key);
                }
            }
        }
    }

    public function exists(String $table): bool
    {
        return $this->reflection->hasTable($table);
    }

    public function create(String $tableName, /* object */ $record, array $params)
    {
        $this->sanitizeRecord($tableName, $record, '');
        $table = $this->reflection->getTable($tableName);
        $columnValues = $this->columns->getValues($table, true, $record, $params);
        return $this->db->createSingle($table, $columnValues);
    }

    public function read(String $tableName, String $id, array $params) /*: ?object*/
    {
        $table = $this->reflection->getTable($tableName);
        $this->joiner->addMandatoryColumns($table, $params);
        $columnNames = $this->columns->getNames($table, true, $params);
        $record = $this->db->selectSingle($table, $columnNames, $id);
        if ($record == null) {
            return null;
        }
        $records = array($record);
        $this->joiner->addJoins($table, $records, $params, $this->db);
        return $records[0];
    }

    public function update(String $tableName, String $id, /* object */ $record, array $params)
    {
        $this->sanitizeRecord($tableName, $record, $id);
        $table = $this->reflection->getTable($tableName);
        $columnValues = $this->columns->getValues($table, true, $record, $params);
        return $this->db->updateSingle($table, $columnValues, $id);
    }

    public function delete(String $tableName, String $id, array $params)
    {
        $table = $this->reflection->getTable($tableName);
        return $this->db->deleteSingle($table, $id);
    }

    public function increment(String $tableName, String $id, /* object */ $record, array $params)
    {
        $this->sanitizeRecord($tableName, $record, $id);
        $table = $this->reflection->getTable($tableName);
        $columnValues = $this->columns->getValues($table, true, $record, $params);
        return $this->db->incrementSingle($table, $columnValues, $id);
    }

    public function _list(String $tableName, array $params): ListDocument
    {
        $table = $this->reflection->getTable($tableName);
        $this->joiner->addMandatoryColumns($table, $params);
        $columnNames = $this->columns->getNames($table, true, $params);
        $condition = $this->filters->getCombinedConditions($table, $params);
        $columnOrdering = $this->ordering->getColumnOrdering($table, $params);
        if (!$this->pagination->hasPage($params)) {
            $offset = 0;
            $limit = $this->pagination->getResultSize($params);
            $count = 0;
        } else {
            $offset = $this->pagination->getPageOffset($params);
            $limit = $this->pagination->getPageSize($params);
            $count = $this->db->selectCount($table, $condition);
        }
        $records = $this->db->selectAll($table, $columnNames, $condition, $columnOrdering, $offset, $limit);
        $this->joiner->addJoins($table, $records, $params, $this->db);
        return new ListDocument($records, $count);
    }
}

// file: src/Tqdev/PhpCrudApi/Record/RelationJoiner.php

class RelationJoiner
{

    private $reflection;
    private $columns;

    public function __construct(ReflectionService $reflection, ColumnIncluder $columns)
    {
        $this->reflection = $reflection;
        $this->columns = $columns;
    }

    public function addMandatoryColumns(ReflectedTable $table, array &$params) /*: void*/
    {
        if (!isset($params['join']) || !isset($params['include'])) {
            return;
        }
        $params['mandatory'] = array();
        foreach ($params['join'] as $tableNames) {
            $t1 = $table;
            foreach (explode(',', $tableNames) as $tableName) {
                if (!$this->reflection->hasTable($tableName)) {
                    continue;
                }
                $t2 = $this->reflection->getTable($tableName);
                $fks1 = $t1->getFksTo($t2->getName());
                $t3 = $this->hasAndBelongsToMany($t1, $t2);
                if ($t3 != null || count($fks1) > 0) {
                    $params['mandatory'][] = $t2->getName() . '.' . $t2->getPk()->getName();
                }
                foreach ($fks1 as $fk) {
                    $params['mandatory'][] = $t1->getName() . '.' . $fk->getName();
                }
                $fks2 = $t2->getFksTo($t1->getName());
                if ($t3 != null || count($fks2) > 0) {
                    $params['mandatory'][] = $t1->getName() . '.' . $t1->getPk()->getName();
                }
                foreach ($fks2 as $fk) {
                    $params['mandatory'][] = $t2->getName() . '.' . $fk->getName();
                }
                $t1 = $t2;
            }
        }
    }

    private function getJoinsAsPathTree(array $params): PathTree
    {
        $joins = new PathTree();
        if (isset($params['join'])) {
            foreach ($params['join'] as $tableNames) {
                $path = array();
                foreach (explode(',', $tableNames) as $tableName) {
                    $t = $this->reflection->getTable($tableName);
                    if ($t != null) {
                        $path[] = $t->getName();
                    }
                }
                $joins->put($path, true);
            }
        }
        return $joins;
    }

    public function addJoins(ReflectedTable $table, array &$records, array $params, GenericDB $db) /*: void*/
    {
        $joins = $this->getJoinsAsPathTree($params);
        $this->addJoinsForTables($table, $joins, $records, $params, $db);
    }

    private function hasAndBelongsToMany(ReflectedTable $t1, ReflectedTable $t2) /*: ?ReflectedTable*/
    {
        foreach ($this->reflection->getTableNames() as $tableName) {
            $t3 = $this->reflection->getTable($tableName);
            if (count($t3->getFksTo($t1->getName())) > 0 && count($t3->getFksTo($t2->getName())) > 0) {
                return $t3;
            }
        }
        return null;
    }

    private function addJoinsForTables(ReflectedTable $t1, PathTree $joins, array &$records, array $params, GenericDB $db)
    {

        foreach ($joins->getKeys() as $t2Name) {

            $t2 = $this->reflection->getTable($t2Name);

            $belongsTo = count($t1->getFksTo($t2->getName())) > 0;
            $hasMany = count($t2->getFksTo($t1->getName())) > 0;
            $t3 = $this->hasAndBelongsToMany($t1, $t2);
            $hasAndBelongsToMany = ($t3 != null);

            $newRecords = array();
            $fkValues = null;
            $pkValues = null;
            $habtmValues = null;

            if ($belongsTo) {
                $fkValues = $this->getFkEmptyValues($t1, $t2, $records);
                $this->addFkRecords($t2, $fkValues, $params, $db, $newRecords);
            }
            if ($hasMany) {
                $pkValues = $this->getPkEmptyValues($t1, $records);
                $this->addPkRecords($t1, $t2, $pkValues, $params, $db, $newRecords);
            }
            if ($hasAndBelongsToMany) {
                $habtmValues = $this->getHabtmEmptyValues($t1, $t2, $t3, $db, $records);
                $this->addFkRecords($t2, $habtmValues->fkValues, $params, $db, $newRecords);
            }

            $this->addJoinsForTables($t2, $joins->get($t2Name), $newRecords, $params, $db);

            if ($fkValues != null) {
                $this->fillFkValues($t2, $newRecords, $fkValues);
                $this->setFkValues($t1, $t2, $records, $fkValues);
            }
            if ($pkValues != null) {
                $this->fillPkValues($t1, $t2, $newRecords, $pkValues);
                $this->setPkValues($t1, $t2, $records, $pkValues);
            }
            if ($habtmValues != null) {
                $this->fillFkValues($t2, $newRecords, $habtmValues->fkValues);
                $this->setHabtmValues($t1, $t3, $records, $habtmValues);
            }
        }
    }

    private function getFkEmptyValues(ReflectedTable $t1, ReflectedTable $t2, array $records): array
    {
        $fkValues = array();
        $fks = $t1->getFksTo($t2->getName());
        foreach ($fks as $fk) {
            $fkName = $fk->getName();
            foreach ($records as $record) {
                if (isset($record[$fkName])) {
                    $fkValue = $record[$fkName];
                    $fkValues[$fkValue] = null;
                }
            }
        }
        return $fkValues;
    }

    private function addFkRecords(ReflectedTable $t2, array $fkValues, array $params, GenericDB $db, array &$records) /*: void*/
    {
        $columnNames = $this->columns->getNames($t2, false, $params);
        $fkIds = array_keys($fkValues);

        foreach ($db->selectMultiple($t2, $columnNames, $fkIds) as $record) {
            $records[] = $record;
        }
    }

    private function fillFkValues(ReflectedTable $t2, array $fkRecords, array &$fkValues) /*: void*/
    {
        $pkName = $t2->getPk()->getName();
        foreach ($fkRecords as $fkRecord) {
            $pkValue = $fkRecord[$pkName];
            $fkValues[$pkValue] = $fkRecord;
        }
    }

    private function setFkValues(ReflectedTable $t1, ReflectedTable $t2, array &$records, array $fkValues) /*: void*/
    {
        $fks = $t1->getFksTo($t2->getName());
        foreach ($fks as $fk) {
            $fkName = $fk->getName();
            foreach ($records as $i => $record) {
                if (isset($record[$fkName])) {
                    $key = $record[$fkName];
                    $records[$i][$fkName] = $fkValues[$key];
                }
            }
        }
    }

    private function getPkEmptyValues(ReflectedTable $t1, array $records): array
    {
        $pkValues = array();
        $pkName = $t1->getPk()->getName();
        foreach ($records as $record) {
            $key = $record[$pkName];
            $pkValues[$key] = array();
        }
        return $pkValues;
    }

    private function addPkRecords(ReflectedTable $t1, ReflectedTable $t2, array $pkValues, array $params, GenericDB $db, array &$records) /*: void*/
    {
        $fks = $t2->getFksTo($t1->getName());
        $columnNames = $this->columns->getNames($t2, false, $params);
        $pkValueKeys = implode(',', array_keys($pkValues));
        $conditions = array();
        foreach ($fks as $fk) {
            $conditions[] = new ColumnCondition($fk, 'in', $pkValueKeys);
        }
        $condition = OrCondition::fromArray($conditions);
        foreach ($db->selectAllUnordered($t2, $columnNames, $condition) as $record) {
            $records[] = $record;
        }
    }

    private function fillPkValues(ReflectedTable $t1, ReflectedTable $t2, array $pkRecords, array &$pkValues) /*: void*/
    {
        $fks = $t2->getFksTo($t1->getName());
        foreach ($fks as $fk) {
            $fkName = $fk->getName();
            foreach ($pkRecords as $pkRecord) {
                $key = $pkRecord[$fkName];
                if (isset($pkValues[$key])) {
                    $pkValues[$key][] = $pkRecord;
                }
            }
        }
    }

    private function setPkValues(ReflectedTable $t1, ReflectedTable $t2, array &$records, array $pkValues) /*: void*/
    {
        $pkName = $t1->getPk()->getName();
        $t2Name = $t2->getName();

        foreach ($records as $i => $record) {
            $key = $record[$pkName];
            $records[$i][$t2Name] = $pkValues[$key];
        }
    }

    private function getHabtmEmptyValues(ReflectedTable $t1, ReflectedTable $t2, ReflectedTable $t3, GenericDB $db, array $records): HabtmValues
    {
        $pkValues = $this->getPkEmptyValues($t1, $records);
        $fkValues = array();

        $fk1 = $t3->getFksTo($t1->getName())[0];
        $fk2 = $t3->getFksTo($t2->getName())[0];

        $fk1Name = $fk1->getName();
        $fk2Name = $fk2->getName();

        $columnNames = array($fk1Name, $fk2Name);

        $pkIds = implode(',', array_keys($pkValues));
        $condition = new ColumnCondition($t3->get($fk1Name), 'in', $pkIds);

        $records = $db->selectAllUnordered($t3, $columnNames, $condition);
        foreach ($records as $record) {
            $val1 = $record[$fk1Name];
            $val2 = $record[$fk2Name];
            $pkValues[$val1][] = $val2;
            $fkValues[$val2] = null;
        }

        return new HabtmValues($pkValues, $fkValues);
    }

    private function setHabtmValues(ReflectedTable $t1, ReflectedTable $t3, array &$records, HabtmValues $habtmValues) /*: void*/
    {
        $pkName = $t1->getPk()->getName();
        $t3Name = $t3->getName();
        foreach ($records as $i => $record) {
            $key = $record[$pkName];
            $val = array();
            $fks = $habtmValues->pkValues[$key];
            foreach ($fks as $fk) {
                $val[] = $habtmValues->fkValues[$fk];
            }
            $records[$i][$t3Name] = $val;
        }
    }
}

// file: src/Tqdev/PhpCrudApi/Api.php

class Api
{
    private $router;
    private $responder;
    private $debug;

    public function __construct(Config $config)
    {
        $db = new GenericDB(
            $config->getDriver(),
            $config->getAddress(),
            $config->getPort(),
            $config->getDatabase(),
            $config->getUsername(),
            $config->getPassword()
        );
        $cache = CacheFactory::create($config);
        $reflection = new ReflectionService($db, $cache, $config->getCacheTime());
        $responder = new Responder();
        $router = new SimpleRouter($responder, $cache, $config->getCacheTime());
        foreach ($config->getMiddlewares() as $middleware => $properties) {
            switch ($middleware) {
                case 'cors':
                    new CorsMiddleware($router, $responder, $properties);
                    break;
                case 'firewall':
                    new FirewallMiddleware($router, $responder, $properties);
                    break;
                case 'basicAuth':
                    new BasicAuthMiddleware($router, $responder, $properties);
                    break;
                case 'jwtAuth':
                    new JwtAuthMiddleware($router, $responder, $properties);
                    break;
                case 'validation':
                    new ValidationMiddleware($router, $responder, $properties, $reflection);
                    break;
                case 'sanitation':
                    new SanitationMiddleware($router, $responder, $properties, $reflection);
                    break;
                case 'authorization':
                    new AuthorizationMiddleware($router, $responder, $properties, $reflection);
                    break;
            }
        }
        foreach ($config->getControllers() as $controller) {
            switch ($controller) {
                case 'records':
                    $records = new RecordService($db, $reflection);
                    new RecordController($router, $responder, $records);
                    break;
                case 'columns':
                    $definition = new DefinitionService($db, $reflection);
                    new ColumnController($router, $responder, $reflection, $definition);
                    break;
                case 'cache':
                    new CacheController($router, $responder, $cache);
                    break;
                case 'openapi':
                    $openApi = new OpenApiService($reflection, $config->getOpenApiBase());
                    new OpenApiController($router, $responder, $openApi);
                    break;
            }
        }
        $this->router = $router;
        $this->responder = $responder;
        $this->debug = $config->getDebug();
    }

    public function handle(Request $request): Response
    {
        $response = null;
        try {
            $response = $this->router->route($request);
        } catch (\Throwable $e) {
            if ($e instanceof \PDOException) {
                if (strpos(strtolower($e->getMessage()), 'duplicate') !== false) {
                    return $this->responder->error(ErrorCode::DUPLICATE_KEY_EXCEPTION, '');
                }
                if (strpos(strtolower($e->getMessage()), 'default value') !== false) {
                    return $this->responder->error(ErrorCode::DATA_INTEGRITY_VIOLATION, '');
                }
                if (strpos(strtolower($e->getMessage()), 'allow nulls') !== false) {
                    return $this->responder->error(ErrorCode::DATA_INTEGRITY_VIOLATION, '');
                }
                if (strpos(strtolower($e->getMessage()), 'constraint') !== false) {
                    return $this->responder->error(ErrorCode::DATA_INTEGRITY_VIOLATION, '');
                }
            }
            $response = $this->responder->error(ErrorCode::ERROR_NOT_FOUND, $e->getMessage());
            if ($this->debug) {
                $response->addHeader('X-Debug-Info', 'Exception in ' . $e->getFile() . ' on line ' . $e->getLine());
            }
        }
        return $response;
    }
}

// file: src/Tqdev/PhpCrudApi/Config.php

class Config
{
    private $values = [
        'driver' => null,
        'address' => 'localhost',
        'port' => null,
        'username' => null,
        'password' => null,
        'database' => null,
        'middlewares' => 'cors',
        'controllers' => 'records,columns,cache,openapi',
        'cacheType' => 'TempFile',
        'cachePath' => '',
        'cacheTime' => 10,
        'debug' => false,
        'openApiBase' => '{"info":{"title":"JAVA-CRUD-API","version":"1.0.0"}}',
    ];

    private function getDefaultDriver(array $values): String
    {
        if (isset($values['driver'])) {
            return $values['driver'];
        }
        return 'mysql';
    }

    private function getDefaultPort(String $driver): int
    {
        switch ($driver) {
            case 'mysql':return 3306;
            case 'pgsql':return 5432;
            case 'sqlsrv':return 1433;
        }
    }

    private function getDefaultAddress(String $driver): String
    {
        switch ($driver) {
            case 'mysql':return 'localhost';
            case 'pgsql':return 'localhost';
            case 'sqlsrv':return 'localhost';
        }
    }

    private function getDriverDefaults(String $driver): array
    {
        return [
            'driver' => $driver,
            'address' => $this->getDefaultAddress($driver),
            'port' => $this->getDefaultPort($driver),
        ];
    }

    public function __construct(array $values)
    {
        $driver = $this->getDefaultDriver($values);
        $defaults = $this->getDriverDefaults($driver);
        $newValues = array_merge($this->values, $defaults, $values);
        $newValues = $this->parseMiddlewares($newValues);
        $diff = array_diff_key($newValues, $this->values);
        if (!empty($diff)) {
            $key = array_keys($diff)[0];
            throw new \Exception("Config has invalid value '$key'");
        }
        $this->values = $newValues;
    }

    private function parseMiddlewares(array $values): array
    {
        $newValues = array();
        $properties = array();
        $middlewares = array_map('trim', explode(',', $values['middlewares']));
        foreach ($middlewares as $middleware) {
            $properties[$middleware] = [];
        }
        foreach ($values as $key => $value) {
            if (strpos($key, '.') === false) {
                $newValues[$key] = $value;
            } else {
                list($middleware, $key2) = explode('.', $key, 2);
                if (isset($properties[$middleware])) {
                    $properties[$middleware][$key2] = $value;
                } else {
                    throw new \Exception("Config has invalid value '$key'");
                }
            }
        }
        $newValues['middlewares'] = array_reverse($properties, true);
        return $newValues;
    }

    public function getDriver(): String
    {
        return $this->values['driver'];
    }

    public function getAddress(): String
    {
        return $this->values['address'];
    }

    public function getPort(): int
    {
        return $this->values['port'];
    }

    public function getUsername(): String
    {
        return $this->values['username'];
    }

    public function getPassword(): String
    {
        return $this->values['password'];
    }

    public function getDatabase(): String
    {
        return $this->values['database'];
    }

    public function getMiddlewares(): array
    {
        return $this->values['middlewares'];
    }

    public function getControllers(): array
    {
        return array_map('trim', explode(',', $this->values['controllers']));
    }

    public function getCacheType(): String
    {
        return $this->values['cacheType'];
    }

    public function getCachePath(): String
    {
        return $this->values['cachePath'];
    }

    public function getCacheTime(): int
    {
        return $this->values['cacheTime'];
    }

    public function getDebug(): String
    {
        return $this->values['debug'];
    }

    public function getOpenApiBase(): array
    {
        return json_decode($this->values['openApiBase'], true);
    }
}

// file: src/Tqdev/PhpCrudApi/Request.php

class Request
{
    private $method;
    private $path;
    private $pathSegments;
    private $params;
    private $body;
    private $headers;
    private $highPerformance;

    public function __construct(String $method = null, String $path = null, String $query = null, array $headers = null, String $body = null, bool $highPerformance = true)
    {
        $this->parseMethod($method);
        $this->parsePath($path);
        $this->parseParams($query);
        $this->parseHeaders($headers);
        $this->parseBody($body);
        $this->highPerformance = $highPerformance;
    }

    private function parseMethod(String $method = null)
    {
        if (!$method) {
            if (isset($_SERVER['REQUEST_METHOD'])) {
                $method = $_SERVER['REQUEST_METHOD'];
            } else {
                $method = 'GET';
            }
        }
        $this->method = $method;
    }

    private function parsePath(String $path = null)
    {
        if (!$path) {
            if (isset($_SERVER['PATH_INFO'])) {
                $path = $_SERVER['PATH_INFO'];
            } else {
                $path = '/';
            }
        }
        $this->path = $path;
        $this->pathSegments = explode('/', $path);
    }

    private function parseParams(String $query = null)
    {
        if (!$query) {
            if (isset($_SERVER['QUERY_STRING'])) {
                $query = $_SERVER['QUERY_STRING'];
            } else {
                $query = '';
            }
        }
        $query = str_replace('][]=', ']=', str_replace('=', '[]=', $query));
        parse_str($query, $this->params);
    }

    private function parseHeaders(array $headers = null)
    {
        if (!$headers) {
            $headers = array();
            if (!$this->highPerformance) {
                foreach ($_SERVER as $name => $value) {
                    if (substr($name, 0, 5) == 'HTTP_') {
                        $key = str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))));
                        $headers[$key] = $value;
                    }
                }
            }
        }
        $this->headers = $headers;
    }

    private function parseBody(String $body = null)
    {
        if (!$body) {
            $body = file_get_contents('php://input');
        }
        $this->body = $body;
    }

    public function getMethod(): String
    {
        return $this->method;
    }

    public function getPath(): String
    {
        return $this->path;
    }

    public function getPathSegment(int $part): String
    {
        if ($part < 0 || $part >= count($this->pathSegments)) {
            return '';
        }
        return $this->pathSegments[$part];
    }

    public function getParams(): array
    {
        return $this->params;
    }

    public function getBody() /*: ?array*/
    {
        $body = $this->body;
        $first = substr($body, 0, 1);
        if ($first == '[' || $first == '{') {
            $body = json_decode($body);
            $causeCode = json_last_error();
            if ($causeCode !== JSON_ERROR_NONE) {
                return null;
            }
        } else {
            parse_str($body, $input);
            foreach ($input as $key => $value) {
                if (substr($key, -9) == '__is_null') {
                    $input[substr($key, 0, -9)] = null;
                    unset($input[$key]);
                }
            }
            $body = (object) $input;
        }
        return $body;
    }

    public function addHeader(String $key, String $value)
    {
        $this->headers[$key] = $value;
    }

    public function getHeader(String $key): String
    {
        if (isset($this->headers[$key])) {
            return $this->headers[$key];
        }
        if ($this->highPerformance) {
            $serverKey = 'HTTP_' . strtoupper(str_replace('_', '-', $key));
            if (isset($_SERVER[$serverKey])) {
                return $_SERVER[$serverKey];
            }
        }
        return '';
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public static function fromString(String $request): Request
    {
        $parts = explode("\n\n", trim($request), 2);
        $head = $parts[0];
        $body = isset($parts[1]) ? $parts[1] : null;
        $lines = explode("\n", $head);
        $line = explode(' ', trim(array_shift($lines)), 2);
        $method = $line[0];
        $url = isset($line[1]) ? $line[1] : '';
        $path = parse_url($url, PHP_URL_PATH);
        $query = parse_url($url, PHP_URL_QUERY);
        $headers = array();
        foreach ($lines as $line) {
            list($key, $value) = explode(':', $line, 2);
            $headers[$key] = trim($value);
        }
        return new Request($method, $path, $query, $headers, $body);
    }
}

// file: src/Tqdev/PhpCrudApi/Response.php

class Response
{
    const OK = 200;
    const UNAUTHORIZED = 401;
    const FORBIDDEN = 403;
    const NOT_FOUND = 404;
    const CONFLICT = 409;
    const UNPROCESSABLE_ENTITY = 422;
    const INTERNAL_SERVER_ERROR = 500;

    private $status;
    private $headers;
    private $body;

    public function __construct(int $status, $body)
    {
        $this->status = $status;
        $this->headers = array();
        $this->parseBody($body);
    }

    private function parseBody($body)
    {
        if ($body === '') {
            $this->body = '';
        } else {
            $data = json_encode($body, JSON_UNESCAPED_UNICODE);
            $this->addHeader('Content-Type', 'application/json');
            $this->addHeader('Content-Length', strlen($data));
            $this->body = $data;
        }
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getBody(): String
    {
        return $this->body;
    }

    public function addHeader(String $key, String $value)
    {
        $this->headers[$key] = $value;
    }

    public function getHeader(String $key): String
    {
        if (isset($this->headers[$key])) {
            return $this->headers[$key];
        }
        return null;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function output()
    {
        http_response_code($this->getStatus());
        foreach ($this->headers as $key => $value) {
            header("$key: $value");
        }
        echo $this->getBody();
    }

    public function __toString(): String
    {
        $str = "$this->status\n";
        foreach ($this->headers as $key => $value) {
            $str .= "$key: $value\n";
        }
        if ($this->body !== '') {
            $str .= "\n";
            $str .= "$this->body\n";
        }
        return $str;
    }
}

// file: src/index.php

$config = new Config([
    'username' => 'php-crud-api',
    'password' => 'php-crud-api',
    'database' => 'php-crud-api',
]);
$request = new Request();
$api = new Api($config);
$response = $api->handle($request);
$response->output();
