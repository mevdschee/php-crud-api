<?php
namespace Tqdev\PhpCrudApi\Column\Reflection;

use Tqdev\PhpCrudApi\Database\GenericReflection;

class ReflectedDatabase implements \JsonSerializable
{
    private $name;
    private $tables;

    public function __construct(String $name, array $tables)
    {
        $this->name = $name;
        $this->tables = [];
        foreach ($tables as $table) {
            $this->tables[$table] = true;
        }
    }

    public static function fromReflection(GenericReflection $reflection): ReflectedDatabase
    {
        $name = $reflection->getDatabaseName();
        $tables = [];
        foreach ($reflection->getTables() as $table) {
            $tableName = $table['TABLE_NAME'];
            if (in_array($tableName, $reflection->getIgnoredTables())) {
                continue;
            }
            $tables[$tableName] = true;
        }
        return new ReflectedDatabase($name, array_keys($tables));
    }

    public static function fromJson( /* object */$json): ReflectedDatabase
    {
        $name = $json->name;
        $tables = $json->tables;
        return new ReflectedDatabase($name, $tables);
    }

    public function getName(): String
    {
        return $this->name;
    }

    public function exists(String $tableName): bool
    {
        return isset($this->tables[$tableName]);
    }

    public function getTables(): array
    {
        return array_keys($this->tables);
    }

    public function serialize()
    {
        return [
            'name' => $this->name,
            'tables' => array_keys($this->tables),
        ];
    }

    public function jsonSerialize()
    {
        return $this->serialize();
    }
}
