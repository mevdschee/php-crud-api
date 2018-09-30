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
        $this->openapi->set("components|responses|pk_integer|description", "inserted primary key value (integer)");
        $this->openapi->set("components|responses|pk_integer|content|application/json|schema|type", "integer");
        $this->openapi->set("components|responses|pk_integer|content|application/json|schema|format", "int64");
        $this->openapi->set("components|responses|pk_string|description", "inserted primary key value (string)");
        $this->openapi->set("components|responses|pk_string|content|application/json|schema|type", "string");
        $this->openapi->set("components|responses|pk_string|content|application/json|schema|format", "uuid");
        $this->openapi->set("components|responses|rows_affected|description", "number of rows affected (integer)");
        $this->openapi->set("components|responses|rows_affected|content|application/json|schema|type", "integer");
        $this->openapi->set("components|responses|rows_affected|content|application/json|schema|format", "int64");
        foreach ($tableNames as $tableName) {
            $this->setComponentSchema($tableName);
            $this->setComponentResponse($tableName);
            $this->setComponentRequestBody($tableName);
        }
        $this->setComponentParameters();
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
            if (!$pkName && $operation != 'list') {
                continue;
            }
            if (in_array($operation, ['list', 'create'])) {
                $path = sprintf('/records/%s', $tableName);
            } else {
                $path = sprintf('/records/%s/{%s}', $tableName, $pkName);
                $this->openapi->set("paths|$path|$method|parameters|0|\$ref", "#/components/parameters/pk");
            }
            if (in_array($operation, ['create', 'update'])) {
                $this->openapi->set("paths|$path|$method|requestBody|\$ref", "#/components/requestBodies/single_" . urlencode($tableName));
            }
            $this->openapi->set("paths|$path|$method|tags|0", "$tableName");
            $this->openapi->set("paths|$path|$method|description", "$operation $tableName");
            switch ($operation) {
                case 'list':
                    $this->openapi->set("paths|$path|$method|responses|200|\$ref", "#/components/responses/list_of_" . urlencode($tableName));
                    break;
                case 'create':
                    if ($pk->getType() == 'integer') {
                        $this->openapi->set("paths|$path|$method|responses|200|\$ref", "#/components/responses/pk_integer");
                    } else {
                        $this->openapi->set("paths|$path|$method|responses|200|\$ref", "#/components/responses/pk_string");
                    }
                    break;
                case 'read':
                    $this->openapi->set("paths|$path|$method|responses|200|\$ref", "#/components/responses/single_" . urlencode($tableName));
                    break;
                case 'update':
                case 'delete':
                case 'increment':
                    $this->openapi->set("paths|$path|$method|responses|200|\$ref", "#/components/responses/rows_affected");
                    break;
            }

        }
    }

    private function setComponentSchema(String $tableName) /*: void*/
    {
        $this->openapi->set("components|schemas|single_$tableName|type", "object");
        $table = $this->reflection->getTable($tableName);
        foreach ($table->columnNames() as $columnName) {
            $column = $table->get($columnName);
            $properties = $this->types[$column->getType()];
            foreach ($properties as $key => $value) {
                $this->openapi->set("components|schemas|single_$tableName|properties|$columnName|$key", $value);
            }
        }
        $this->openapi->set("components|schemas|list_of_$tableName|type", "object");
        $this->openapi->set("components|schemas|list_of_$tableName|properties|count|type", "integer");
        $this->openapi->set("components|schemas|list_of_$tableName|properties|count|format", "int64");
        $this->openapi->set("components|schemas|list_of_$tableName|properties|records|type", "array");
        $this->openapi->set("components|schemas|list_of_$tableName|properties|records|items|\$ref", "#/components/schemas/single_" . urlencode($tableName));
    }

    private function setComponentResponse(String $tableName) /*: void*/
    {
        $this->openapi->set("components|responses|single_$tableName|description", "single $tableName record");
        $this->openapi->set("components|responses|single_$tableName|content|application/json|schema|\$ref", "#/components/schemas/single_" . urlencode($tableName));
        $this->openapi->set("components|responses|list_of_$tableName|description", "list of $tableName records");
        $this->openapi->set("components|responses|list_of_$tableName|content|application/json|schema|\$ref", "#/components/schemas/list_of_" . urlencode($tableName));
    }

    private function setComponentRequestBody(String $tableName) /*: void*/
    {
        $this->openapi->set("components|requestBodies|single_$tableName|description", "single $tableName record");
        $this->openapi->set("components|requestBodies|single_$tableName|content|application/json|schema|\$ref", "#/components/schemas/single_" . urlencode($tableName));
    }

    private function setComponentParameters() /*: void*/
    {
        $this->openapi->set("components|parameters|pk|name", "id");
        $this->openapi->set("components|parameters|pk|in", "path");
        $this->openapi->set("components|parameters|pk|schema|type", "string");
        $this->openapi->set("components|parameters|pk|description", "primary key value");
        $this->openapi->set("components|parameters|pk|required", true);
    }

    private function setTag(int $index, String $tableName) /*: void*/
    {
        $this->openapi->set("tags|$index|name", "$tableName");
        $this->openapi->set("tags|$index|description", "$tableName operations");
    }
}
