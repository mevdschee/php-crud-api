<?php
namespace Tqdev\PhpCrudApi\Column\Reflection;

use Tqdev\PhpCrudApi\Database\GenericReflection;

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
