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

    private function isOperationOnTableAllowed(String $operation, String $tableName): bool
    {
        $tableHandler = VariableStore::get('authorization.tableHandler');
        if (!$tableHandler) {
            return true;
        }
        return (bool) call_user_func($tableHandler, $operation, $tableName);
    }

    private function isOperationOnColumnAllowed(String $operation, String $tableName, String $columnName): bool
    {
        $columnHandler = VariableStore::get('authorization.columnHandler');
        if (!$columnHandler) {
            return true;
        }
        return (bool) call_user_func($columnHandler, $operation, $tableName, $columnName);
    }

    private function setPath(String $tableName) /*: void*/
    {
        $table = $this->reflection->getTable($tableName);
        $type = $table->getType();
        $pk = $table->getPk();
        $pkName = $pk ? $pk->getName() : '';
        foreach ($this->operations as $operation => $method) {
            if (!$pkName && $operation != 'list') {
                continue;
            }
            if ($type != 'table' && $operation != 'list') {
                continue;
            }
            if (!$this->isOperationOnTableAllowed($operation, $tableName)) {
                continue;
            }
            if (in_array($operation, ['list', 'create'])) {
                $path = sprintf('/records/%s', $tableName);
            } else {
                $path = sprintf('/records/%s/{%s}', $tableName, $pkName);
                $this->openapi->set("paths|$path|$method|parameters|0|\$ref", "#/components/parameters/pk");
            }
            if (in_array($operation, ['create', 'update', 'increment'])) {
                $this->openapi->set("paths|$path|$method|requestBody|\$ref", "#/components/requestBodies/$operation-" . urlencode($tableName));
            }
            $this->openapi->set("paths|$path|$method|tags|0", "$tableName");
            $this->openapi->set("paths|$path|$method|description", "$operation $tableName");
            switch ($operation) {
                case 'list':
                    $this->openapi->set("paths|$path|$method|responses|200|\$ref", "#/components/responses/$operation-" . urlencode($tableName));
                    break;
                case 'create':
                    if ($pk->getType() == 'integer') {
                        $this->openapi->set("paths|$path|$method|responses|200|\$ref", "#/components/responses/pk_integer");
                    } else {
                        $this->openapi->set("paths|$path|$method|responses|200|\$ref", "#/components/responses/pk_string");
                    }
                    break;
                case 'read':
                    $this->openapi->set("paths|$path|$method|responses|200|\$ref", "#/components/responses/$operation-" . urlencode($tableName));
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
        $table = $this->reflection->getTable($tableName);
        $type = $table->getType();
        $pk = $table->getPk();
        $pkName = $pk ? $pk->getName() : '';
        foreach ($this->operations as $operation => $method) {
            if (!$pkName && $operation != 'list') {
                continue;
            }
            if ($type != 'table' && $operation != 'list') {
                continue;
            }
            if ($operation == 'delete') {
                continue;
            }
            if (!$this->isOperationOnTableAllowed($operation, $tableName)) {
                continue;
            }
            if ($operation == 'list') {
                $this->openapi->set("components|schemas|$operation-$tableName|type", "object");
                $this->openapi->set("components|schemas|$operation-$tableName|properties|results|type", "integer");
                $this->openapi->set("components|schemas|$operation-$tableName|properties|results|format", "int64");
                $this->openapi->set("components|schemas|$operation-$tableName|properties|records|type", "array");
                $prefix = "components|schemas|$operation-$tableName|properties|records|items";
            } else {
                $prefix = "components|schemas|$operation-$tableName";
            }
            $this->openapi->set("$prefix|type", "object");
            foreach ($table->getColumnNames() as $columnName) {
                if (!$this->isOperationOnColumnAllowed($operation, $tableName, $columnName)) {
                    continue;
                }
                $column = $table->getColumn($columnName);
                $properties = $this->types[$column->getType()];
                foreach ($properties as $key => $value) {
                    $this->openapi->set("$prefix|properties|$columnName|$key", $value);
                }
            }
        }
    }

    private function setComponentResponse(String $tableName) /*: void*/
    {
        $table = $this->reflection->getTable($tableName);
        $type = $table->getType();
        $pk = $table->getPk();
        $pkName = $pk ? $pk->getName() : '';
        foreach (['list', 'read'] as $operation) {
            if (!$pkName && $operation != 'list') {
                continue;
            }
            if ($type != 'table' && $operation != 'list') {
                continue;
            }
            if (!$this->isOperationOnTableAllowed($operation, $tableName)) {
                continue;
            }
            if ($operation == 'list') {
                $this->openapi->set("components|responses|$operation-$tableName|description", "list of $tableName records");
            } else {
                $this->openapi->set("components|responses|$operation-$tableName|description", "single $tableName record");
            }
            $this->openapi->set("components|responses|$operation-$tableName|content|application/json|schema|\$ref", "#/components/schemas/$operation-" . urlencode($tableName));
        }
    }

    private function setComponentRequestBody(String $tableName) /*: void*/
    {
        $table = $this->reflection->getTable($tableName);
        $type = $table->getType();
        $pk = $table->getPk();
        $pkName = $pk ? $pk->getName() : '';
        if ($pkName && $type == 'table') {
            foreach (['create', 'update', 'increment'] as $operation) {
                if (!$this->isOperationOnTableAllowed($operation, $tableName)) {
                    continue;
                }
                $this->openapi->set("components|requestBodies|$operation-$tableName|description", "single $tableName record");
                $this->openapi->set("components|requestBodies|$operation-$tableName|content|application/json|schema|\$ref", "#/components/schemas/$operation-" . urlencode($tableName));
            }
        }
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
