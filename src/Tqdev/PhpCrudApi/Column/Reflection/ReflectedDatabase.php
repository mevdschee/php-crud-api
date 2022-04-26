<?php

namespace Tqdev\PhpCrudApi\Column\Reflection;

use Tqdev\PhpCrudApi\Database\GenericReflection;

class ReflectedDatabase implements \JsonSerializable
{
    private $tableTypes;
    private $tableRealNames;

    public function __construct(array $tableTypes, array $tableRealNames)
    {
        $this->tableTypes = $tableTypes;
        $this->tableRealNames = $tableRealNames;
    }

    public static function fromReflection(GenericReflection $reflection): ReflectedDatabase
    {
        $tableTypes = [];
        $tableRealNames = [];
        foreach ($reflection->getTables() as $table) {
            $tableName = $table['TABLE_NAME'];
            if (in_array($tableName, $reflection->getIgnoredTables())) {
                continue;
            }
            $tableTypes[$tableName] = $table['TABLE_TYPE'];
            $tableRealNames[$tableName] = $table['TABLE_REAL_NAME'];
        }
        return new ReflectedDatabase($tableTypes, $tableRealNames);
    }

    public static function fromJson( /* object */$json): ReflectedDatabase
    {
        $tableTypes = (array) $json->types;
        $tableRealNames = (array) $json->realNames;
        return new ReflectedDatabase($tableTypes, $tableRealNames);
    }

    public function hasTable(string $tableName): bool
    {
        return isset($this->tableTypes[$tableName]);
    }

    public function getType(string $tableName): string
    {
        return isset($this->tableTypes[$tableName]) ? $this->tableTypes[$tableName] : '';
    }

    public function getRealName(string $tableName): string
    {
        return isset($this->tableRealNames[$tableName]) ? $this->tableRealNames[$tableName] : '';
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
        unset($this->tableRealNames[$tableName]);
        return true;
    }

    public function serialize()
    {
        return [
            'types' => $this->tableTypes,
            'realNames' => $this->tableRealNames,
        ];
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return $this->serialize();
    }
}
