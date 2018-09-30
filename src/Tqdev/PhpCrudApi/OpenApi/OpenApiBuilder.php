<?php
namespace Tqdev\PhpCrudApi\OpenApi;

use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\OpenApi\OpenApiDefinition;

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
        'integer' => ['type' => 'integer', 'format' => 'int32'],
        'bigint' => ['type' => 'integer', 'format' => 'int64'],
        'varchar' => ['type' => 'string'],
        'clob' => ['type' => 'string'],
        'varbinary' => ['type' => 'string', 'format' => 'byte'],
        'blob' => ['type' => 'string', 'format' => 'byte'],
        'decimal' => ['type' => 'string'],
        'float' => ['type' => 'number', 'format' => 'float'],
        'double' => ['type' => 'number', 'format' => 'double'],
        'time' => ['type' => 'string', 'format' => 'date-time'],
        'timestamp' => ['type' => 'string', 'format' => 'date-time'],
        'geometry' => ['type' => 'string'],
        'boolean' => ['type' => 'boolean'],
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
            $this->setPath($tableName);
        }
        foreach ($tableNames as $tableName) {
            $this->setComponentSchema($tableName);
        }
        foreach ($tableNames as $index => $tableName) {
            $this->setTag($index, $tableName);
        }
        return $this->openapi;
    }

    private function setPath(String $tableName) /*: void*/
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
                $this->openapi->set("paths|$path|$method|parameters|0|name", "id");
                $this->openapi->set("paths|$path|$method|parameters|0|in", "path");
                $this->openapi->set("paths|$path|$method|parameters|0|schema|type", "string");
                $this->openapi->set("paths|$path|$method|parameters|0|required", true);
            }
            $this->openapi->set("paths|$path|$method|tags|0", "$tableName");
            $this->openapi->set("paths|$path|$method|description", "$operation $tableName");
            $this->openapi->set("paths|$path|$method|responses|200|description", "$operation $tableName succeeded");
        }
    }

    private function setComponentSchema(String $tableName) /*: void*/
    {
        $this->openapi->set("components|schemas|$tableName|type", "object");
        $table = $this->reflection->getTable($tableName);
        foreach ($table->columnNames() as $columnName) {
            $column = $table->get($columnName);
            $properties = $this->types[$column->getType()];
            foreach ($properties as $key => $value) {
                $this->openapi->set("components|schemas|$tableName|properties|$columnName|$key", $value);
            }

        }
    }

    private function setTag(int $index, String $tableName) /*: void*/
    {
        $this->openapi->set("tags|$index|name", "$tableName");
        $this->openapi->set("tags|$index|description", "$tableName operations");
    }
}
