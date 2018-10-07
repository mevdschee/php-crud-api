<?php
namespace Tqdev\PhpCrudApi\Column\Reflection;

use Tqdev\PhpCrudApi\Database\GenericReflection;

class ReflectedDatabase implements \JsonSerializable
{
    private $name;
    private $tableTypes;

    public function __construct(String $name, array $tableTypes)
    {
        $this->name = $name;
        $this->tableTypes = $tableTypes;
    }

    public static function fromReflection(GenericReflection $reflection): ReflectedDatabase
    {
        $name = $reflection->getDatabaseName();
        $tableTypes = [];
        foreach ($reflection->getTables() as $table) {
            $tableName = $table['TABLE_NAME'];
            $tableType = $table['TABLE_TYPE'];
            if (in_array($tableName, $reflection->getIgnoredTables())) {
                continue;
            }
            $tableTypes[$tableName] = $tableType;
        }
        return new ReflectedDatabase($name, $tableTypes);
    }

    public static function fromJson( /* object */$json): ReflectedDatabase
    {
        $name = $json->name;
        $tableTypes = (array) $json->tables;
        return new ReflectedDatabase($name, $tableTypes);
    }

    public function getName(): String
    {
        return $this->name;
    }

    public function hasTable(String $tableName): bool
    {
        return isset($this->tableTypes[$tableName]);
    }

    public function getType(String $tableName): String
    {
        return isset($this->tableTypes[$tableName]) ? $this->tableTypes[$tableName] : '';
    }

    public function getTableNames(): array
    {
        return array_keys($this->tableTypes);
    }

    public function removeTable(String $tableName): bool
    {
        if (!isset($this->tableTypes[$tableName])) {
            return false;
        }
        unset($this->tableTypes[$tableName]);
        return true;
    }

    public function serialize()
    {
        return [
            'name' => $this->name,
            'tables' => $this->tableTypes,
        ];
    }

    public function jsonSerialize()
    {
        return $this->serialize();
    }
}
