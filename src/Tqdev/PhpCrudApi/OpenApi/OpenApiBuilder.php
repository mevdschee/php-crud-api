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
}
