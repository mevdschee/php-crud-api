<?php
namespace Tqdev\PhpCrudApi\Column\Reflection;

use Tqdev\PhpCrudApi\Database\GenericReflection;

class ReflectedDatabase implements \JsonSerializable
{
    private $tableTypes;

    public function __construct(array $tableTypes)
    {
        $this->tableTypes = $tableTypes;
    }

    public static function fromReflection(GenericReflection $reflection): ReflectedDatabase
    {
        $tableTypes = [];
        foreach ($reflection->getTables() as $table) {
            $tableName = $table['TABLE_NAME'];
            $tableType = $table['TABLE_TYPE'];
            if (in_array($tableName, $reflection->getIgnoredTables())) {
                continue;
            }
            $tableTypes[$tableName] = $tableType;
        }
        return new ReflectedDatabase($tableTypes);
    }

    public static function fromJson( /* object */$json): ReflectedDatabase
    {
        $tableTypes = (array) $json->tables;
        return new ReflectedDatabase($tableTypes);
    }

    public function hasTable(string $tableName): bool
    {
        return isset($this->tableTypes[$tableName]);
    }

    public function getType(string $tableName): string
    {
        return isset($this->tableTypes[$tableName]) ? $this->tableTypes[$tableName] : '';
    }

    public function getTableNames(): array
    {
        return array_keys($this->tableTypes);
    }

    public function removeTable(string $tableName): bool
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
            'tables' => $this->tableTypes,
        ];
    }

    public function jsonSerialize()
    {
        return $this->serialize();
    }
}
