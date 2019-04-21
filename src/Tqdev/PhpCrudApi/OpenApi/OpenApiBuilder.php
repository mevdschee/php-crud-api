<?php
namespace Tqdev\PhpCrudApi\OpenApi;

use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Middleware\Communication\VariableStore;
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
        'date' => ['type' => 'string', 'format' => 'date'],
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

    private function getServerUrl(): string
    {
        $protocol = @$_SERVER['HTTP_X_FORWARDED_PROTO'] ?: @$_SERVER['REQUEST_SCHEME'] ?: ((isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") ? "https" : "http");
        $port = @intval($_SERVER['HTTP_X_FORWARDED_PORT']) ?: @intval($_SERVER["SERVER_PORT"]) ?: (($protocol === 'https') ? 443 : 80);
        $host = @explode(":", $_SERVER['HTTP_HOST'])[0] ?: @$_SERVER['SERVER_NAME'] ?: @$_SERVER['SERVER_ADDR'];
        $port = ($protocol === 'https' && $port === 443) || ($protocol === 'http' && $port === 80) ? '' : ':' . $port;
        $path = @trim(substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], '/openapi')), '/');
        return sprintf('%s://%s%s/%s', $protocol, $host, $port, $path);
    }

    private function getAllTableReferences(): array
    {
        $tableReferences = array();
        foreach ($this->reflection->getTableNames() as $tableName) {
            $table = $this->reflection->getTable($tableName);
            foreach ($table->getColumnNames() as $columnName) {
                $column = $table->getColumn($columnName);
                $referencedTableName = $column->getFk();
                if ($referencedTableName) {
                    if (!isset($tableReferences[$referencedTableName])) {
                        $tableReferences[$referencedTableName] = array();
                    }
                    $tableReferences[$referencedTableName][] = "$tableName.$columnName";
                }
            }
        }
        return $tableReferences;
    }

    public function build(): OpenApiDefinition
    {
        $this->openapi->set("openapi", "3.0.0");
        if (!$this->openapi->has("servers") && isset($_SERVER['REQUEST_URI'])) {
            $this->openapi->set("servers|0|url", $this->getServerUrl());
        }
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
        $tableReferences = $this->getAllTableReferences();
        foreach ($tableNames as $tableName) {
            $references = isset($tableReferences[$tableName]) ? $tableReferences[$tableName] : array();
            $this->setComponentSchema($tableName, $references);
            $this->setComponentResponse($tableName);
            $this->setComponentRequestBody($tableName);
        }
        $this->setComponentParameters();
        foreach ($tableNames as $index => $tableName) {
            $this->setTag($index, $tableName);
        }
        return $this->openapi;
    }

    private function isOperationOnTableAllowed(string $operation, string $tableName): bool
    {
        $tableHandler = VariableStore::get('authorization.tableHandler');
        if (!$tableHandler) {
            return true;
        }
        return (bool) call_user_func($tableHandler, $operation, $tableName);
    }

    private function isOperationOnColumnAllowed(string $operation, string $tableName, string $columnName): bool
    {
        $columnHandler = VariableStore::get('authorization.columnHandler');
        if (!$columnHandler) {
            return true;
        }
        return (bool) call_user_func($columnHandler, $operation, $tableName, $columnName);
    }

    private function setPath(string $tableName) /*: void*/
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
            $parameters = [];
            if (in_array($operation, ['list', 'create'])) {
                $path = sprintf('/records/%s', $tableName);
                if ($operation == 'list') {
                    $parameters = ['filter', 'include', 'exclude', 'order', 'size', 'page', 'join'];
                }
            } else {
                $path = sprintf('/records/%s/{%s}', $tableName, $pkName);
                if ($operation == 'read') {
                    $parameters = ['pk', 'include', 'exclude', 'join'];
                } else {
                    $parameters = ['pk'];
                }
            }
            foreach ($parameters as $p => $parameter) {
                $this->openapi->set("paths|$path|$method|parameters|$p|\$ref", "#/components/parameters/$parameter");
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

    private function setComponentSchema(string $tableName, array $references) /*: void*/
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
                if ($column->getPk()) {
                    $this->openapi->set("$prefix|properties|$columnName|x-primary-key", true);
                    $this->openapi->set("$prefix|properties|$columnName|x-referenced", $references);
                }
                $fk = $column->getFk();
                if ($fk) {
                    $this->openapi->set("$prefix|properties|$columnName|x-references", $fk);
                }
            }
        }
    }

    private function setComponentResponse(string $tableName) /*: void*/
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

    private function setComponentRequestBody(string $tableName) /*: void*/
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

        $this->openapi->set("components|parameters|filter|name", "filter");
        $this->openapi->set("components|parameters|filter|in", "query");
        $this->openapi->set("components|parameters|filter|schema|type", "array");
        $this->openapi->set("components|parameters|filter|schema|items|type", "string");
        $this->openapi->set("components|parameters|filter|description", "Filters to be applied. Each filter consists of a column, an operator and a value (comma separated). Example: id,eq,1");
        $this->openapi->set("components|parameters|filter|required", false);

        $this->openapi->set("components|parameters|include|name", "include");
        $this->openapi->set("components|parameters|include|in", "query");
        $this->openapi->set("components|parameters|include|schema|type", "string");
        $this->openapi->set("components|parameters|include|description", "Columns you want to include in the output (comma separated). Example: posts.*,categories.name");
        $this->openapi->set("components|parameters|include|required", false);

        $this->openapi->set("components|parameters|exclude|name", "exclude");
        $this->openapi->set("components|parameters|exclude|in", "query");
        $this->openapi->set("components|parameters|exclude|schema|type", "string");
        $this->openapi->set("components|parameters|exclude|description", "Columns you want to exclude from the output (comma separated). Example: posts.content");
        $this->openapi->set("components|parameters|exclude|required", false);

        $this->openapi->set("components|parameters|order|name", "order");
        $this->openapi->set("components|parameters|order|in", "query");
        $this->openapi->set("components|parameters|order|schema|type", "array");
        $this->openapi->set("components|parameters|order|schema|items|type", "string");
        $this->openapi->set("components|parameters|order|description", "Column you want to sort on and the sort direction (comma separated). Example: id,desc");
        $this->openapi->set("components|parameters|order|required", false);

        $this->openapi->set("components|parameters|size|name", "size");
        $this->openapi->set("components|parameters|size|in", "query");
        $this->openapi->set("components|parameters|size|schema|type", "string");
        $this->openapi->set("components|parameters|size|description", "Maximum number of results (for top lists). Example: 10");
        $this->openapi->set("components|parameters|size|required", false);

        $this->openapi->set("components|parameters|page|name", "page");
        $this->openapi->set("components|parameters|page|in", "query");
        $this->openapi->set("components|parameters|page|schema|type", "string");
        $this->openapi->set("components|parameters|page|description", "Page number and page size (comma separated). Example: 1,10");
        $this->openapi->set("components|parameters|page|required", false);

        $this->openapi->set("components|parameters|join|name", "join");
        $this->openapi->set("components|parameters|join|in", "query");
        $this->openapi->set("components|parameters|join|schema|type", "array");
        $this->openapi->set("components|parameters|join|schema|items|type", "string");
        $this->openapi->set("components|parameters|join|description", "Paths (comma separated) to related entities that you want to include. Example: comments,users");
        $this->openapi->set("components|parameters|join|required", false);
    }

    private function setTag(int $index, string $tableName) /*: void*/
    {
        $this->openapi->set("tags|$index|name", "$tableName");
        $this->openapi->set("tags|$index|description", "$tableName operations");
    }
}
