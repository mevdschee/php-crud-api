<?php

namespace Tqdev\PhpCrudApi\OpenApi;

use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Middleware\Communication\VariableStore;
use Tqdev\PhpCrudApi\OpenApi\OpenApiDefinition;

class OpenApiRecordsBuilder
{
    private $openapi;
    private $reflection;
    private $middlewares;
    private $columnTypes;
    /**
     * Status codes that the record controller itself can return per operation.
     * A 405 is not in here, the operations that could return it are only
     * emitted for tables and never for views.
     */
    private $errors = [
        'list' => [404],
        'create' => [404, 409, 422, 424],
        'read' => [404, 424],
        'update' => [404, 409, 422, 424],
        'delete' => [404, 409, 424],
        'increment' => [404, 409, 422, 424],
    ];
    private $operations = [
        'list' => 'get',
        'create' => 'post',
        'read' => 'get',
        'update' => 'put',
        'delete' => 'delete',
        'increment' => 'patch',
    ];
    private $normalized = [];

    /**
     * Component keys and operation ids have to match "^[a-zA-Z0-9._-]+$", so the
     * table name is transliterated to ASCII and whatever is still not allowed is
     * replaced. That can make two table names collide, which is reported instead
     * of resolved, as any name this generates would be a guess at what the table
     * should have been called.
     */
    private function normalize(string $tableName): string
    {
        if (!isset($this->normalized[$tableName])) {
            $key = iconv('UTF-8', 'ASCII//TRANSLIT', $tableName);
            $key = (string) preg_replace('/[^a-zA-Z0-9._-]+/', '_', $key === false ? $tableName : $key);
            if ($key === '') {
                throw new \Exception("Table '$tableName' has no characters that are allowed in an OpenAPI component key, alias it using the 'mapping' setting");
            }
            $other = array_search($key, $this->normalized, true);
            if ($other !== false) {
                throw new \Exception("Tables '$other' and '$tableName' both become '$key' in the OpenAPI document, alias one of them using the 'mapping' setting");
            }
            $this->normalized[$tableName] = $key;
        }
        return $this->normalized[$tableName];
    }

    public function __construct(OpenApiDefinition $openapi, ReflectionService $reflection, OpenApiMiddlewares $middlewares)
    {
        $this->openapi = $openapi;
        $this->reflection = $reflection;
        $this->middlewares = $middlewares;
        $this->columnTypes = new OpenApiColumnTypes();
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

    public function build() /*: void*/
    {
        $tableNames = $this->reflection->getTableNames();
        foreach ($tableNames as $tableName) {
            $this->setPath($tableName);
        }
        $this->setBatchableResponse("pk_integer", "inserted primary key value (integer)", ["type" => "integer", "format" => "int64"]);
        $this->setBatchableResponse("pk_string", "inserted primary key value (string)", ["type" => "string", "format" => "uuid"]);
        $this->setBatchableResponse("rows_affected", "number of rows affected (integer)", ["type" => "integer", "format" => "int64"]);
        $tableReferences = $this->getAllTableReferences();
        foreach ($tableNames as $tableName) {
            $references = isset($tableReferences[$tableName]) ? $tableReferences[$tableName] : array();
            $this->setComponentSchema($tableName, $references);
            $this->setComponentResponse($tableName);
            $this->setComponentRequestBody($tableName);
        }
        $this->setComponentParameters();
        foreach ($tableNames as $tableName) {
            $this->setTag($tableName);
        }
    }

    /**
     * A single record and a list of them are both accepted and returned, which
     * is what makes an operation addressable as a batch.
     */
    private function setSingleOrBatchSchema(string $prefix, string $schema) /*: void*/
    {
        $this->openapi->set("$prefix|content|application/json|schema|oneOf|0|\$ref", $schema);
        $this->openapi->set("$prefix|content|application/json|schema|oneOf|1|type", "array");
        $this->openapi->set("$prefix|content|application/json|schema|oneOf|1|items|\$ref", $schema);
    }

    /**
     * A batch request repeats the operation for every primary key value in the
     * path or every record in the body, and then answers with a list instead of
     * a single value.
     */
    private function setBatchableResponse(string $name, string $description, array $schema) /*: void*/
    {
        $this->openapi->set("components|responses|$name|description", "$description, one per record for a batch");
        $prefix = "components|responses|$name|content|application/json|schema|oneOf";
        $this->openapi->set("$prefix|1|type", "array");
        foreach ($schema as $key => $value) {
            $this->openapi->set("$prefix|0|$key", $value);
            $this->openapi->set("$prefix|1|items|$key", $value);
        }
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
        $normalizedTableName = $this->normalize($tableName);
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
                    if ($this->middlewares->getTextSearchParameter()) {
                        $parameters[] = 'search';
                    }
                }
            } else {
                $path = sprintf('/records/%s/{id}', $tableName);
                if ($operation == 'read') {
                    $parameters = ['pk', 'include', 'exclude', 'join'];
                } else {
                    $parameters = ['pk'];
                }
            }
            $parameters = array_merge($parameters, $this->middlewares->getCommonParameters($method));
            foreach ($parameters as $parameter) {
                $this->openapi->set("paths|$path|$method|parameters||\$ref", "#/components/parameters/$parameter");
            }
            if (in_array($operation, ['create', 'update', 'increment'])) {
                $this->openapi->set("paths|$path|$method|requestBody|\$ref", "#/components/requestBodies/$operation-$normalizedTableName");
            }
            $this->openapi->set("paths|$path|$method|tags|", "$tableName");
            $this->openapi->set("paths|$path|$method|operationId", "$operation" . "_" . "$normalizedTableName");
            $this->openapi->set("paths|$path|$method|description", "$operation $tableName");
            switch ($operation) {
                case 'list':
                    $this->openapi->set("paths|$path|$method|responses|200|\$ref", "#/components/responses/$operation-$normalizedTableName");
                    break;
                case 'create':
                    if ($pk->getType() == 'integer') {
                        $this->openapi->set("paths|$path|$method|responses|200|\$ref", "#/components/responses/pk_integer");
                    } else {
                        $this->openapi->set("paths|$path|$method|responses|200|\$ref", "#/components/responses/pk_string");
                    }
                    break;
                case 'read':
                    $this->openapi->set("paths|$path|$method|responses|200|\$ref", "#/components/responses/$operation-$normalizedTableName");
                    break;
                case 'update':
                case 'delete':
                case 'increment':
                    $this->openapi->set("paths|$path|$method|responses|200|\$ref", "#/components/responses/rows_affected");
                    break;
            }
            $statusCodes = array_merge($this->errors[$operation], $this->middlewares->getStatusCodes(), [500]);
            sort($statusCodes);
            foreach ($statusCodes as $statusCode) {
                $this->openapi->set("paths|$path|$method|responses|$statusCode|\$ref", "#/components/responses/error-$statusCode");
            }
            $this->openapi->set("paths|$path|$method|responses|default|\$ref", "#/components/responses/error");
        }
    }

    private function setComponentSchema(string $tableName, array $references) /*: void*/
    {
        $normalizedTableName = $this->normalize($tableName);
        $table = $this->reflection->getTable($tableName);
        $type = $table->getType();
        $pk = $table->getPk();
        $pkName = $pk ? $pk->getName() : '';
        foreach ($this->operations as $operation => $method) {
            if (!$pkName && $operation != 'list') {
                continue;
            }
            if ($type == 'view' && !in_array($operation, array('read', 'list'))) {
                continue;
            }
            if ($type == 'view' && !$pkName && $operation == 'read') {
                continue;
            }
            if ($operation == 'delete') {
                continue;
            }
            if (!$this->isOperationOnTableAllowed($operation, $tableName)) {
                continue;
            }
            if ($operation == 'list') {
                $this->openapi->set("components|schemas|$operation-$normalizedTableName|type", "object");
                $this->openapi->set("components|schemas|$operation-$normalizedTableName|required", ["records"]);
                $this->openapi->set("components|schemas|$operation-$normalizedTableName|properties|results|type", "integer");
                $this->openapi->set("components|schemas|$operation-$normalizedTableName|properties|results|format", "int64");
                $this->openapi->set("components|schemas|$operation-$normalizedTableName|properties|records|type", "array");
                $prefix = "components|schemas|$operation-$normalizedTableName|properties|records|items";
            } else {
                $prefix = "components|schemas|$operation-$normalizedTableName";
            }
            $this->openapi->set("$prefix|type", "object");
            foreach ($table->getColumnNames() as $columnName) {
                if (!$this->isOperationOnColumnAllowed($operation, $tableName, $columnName)) {
                    continue;
                }
                $column = $table->getColumn($columnName);
                if ($operation == 'increment' && !$this->columnTypes->isNumeric($column)) {
                    continue;
                }
                $properties = $this->columnTypes->getProperties($column);
                if ($operation == 'create' && $column->getPk() && $column->getType() == 'integer') {
                    $properties['readOnly'] = true;
                }
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
        $normalizedTableName = $this->normalize($tableName);
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
            $schema = "#/components/schemas/$operation-$normalizedTableName";
            $prefix = "components|responses|$operation-$normalizedTableName";
            if ($operation == 'list') {
                $this->openapi->set("$prefix|description", "list of $tableName records");
                $this->openapi->set("$prefix|content|application/json|schema|\$ref", $schema);
            } else {
                $this->openapi->set("$prefix|description", "single $tableName record, or a list of them for a batch");
                $this->setSingleOrBatchSchema($prefix, $schema);
            }
        }
    }

    private function setComponentRequestBody(string $tableName) /*: void*/
    {
        $normalizedTableName = $this->normalize($tableName);
        $table = $this->reflection->getTable($tableName);
        $type = $table->getType();
        $pk = $table->getPk();
        $pkName = $pk ? $pk->getName() : '';
        if ($pkName && $type == 'table') {
            foreach (['create', 'update', 'increment'] as $operation) {
                if (!$this->isOperationOnTableAllowed($operation, $tableName)) {
                    continue;
                }
                $schema = "#/components/schemas/$operation-$normalizedTableName";
                $prefix = "components|requestBodies|$operation-$normalizedTableName";
                $this->openapi->set("$prefix|description", "single $tableName record, or a list of them for a batch");
                $this->setSingleOrBatchSchema($prefix, $schema);
            }
        }
    }

    private function setComponentParameters() /*: void*/
    {
        $this->openapi->set("components|parameters|pk|name", "id");
        $this->openapi->set("components|parameters|pk|in", "path");
        $this->openapi->set("components|parameters|pk|schema|type", "string");
        $this->openapi->set("components|parameters|pk|description", "Primary key value, or several of them (comma separated) to run the operation as a batch. Example: 1,2");
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
        $this->openapi->set("components|parameters|size|schema|type", "integer");
        $this->openapi->set("components|parameters|size|description", "Maximum number of results (for top lists). Example: 10");
        $this->openapi->set("components|parameters|size|required", false);

        $this->openapi->set("components|parameters|page|name", "page");
        $this->openapi->set("components|parameters|page|in", "query");
        $this->openapi->set("components|parameters|page|schema|type", "string");
        $this->openapi->set("components|parameters|page|schema|pattern", '^\d+(,\d+)?$');
        $this->openapi->set("components|parameters|page|description", "Page number and page size (comma separated). Example: 1,10");
        $this->openapi->set("components|parameters|page|required", false);

        $this->openapi->set("components|parameters|join|name", "join");
        $this->openapi->set("components|parameters|join|in", "query");
        $this->openapi->set("components|parameters|join|schema|type", "array");
        $this->openapi->set("components|parameters|join|schema|items|type", "string");
        $this->openapi->set("components|parameters|join|description", "Paths (comma separated) to related entities that you want to include. Example: comments,users");
        $this->openapi->set("components|parameters|join|required", false);

        $textSearch = $this->middlewares->getTextSearchParameter();
        if ($textSearch) {
            $this->openapi->set("components|parameters|search|name", $textSearch);
            $this->openapi->set("components|parameters|search|in", "query");
            $this->openapi->set("components|parameters|search|schema|type", "string");
            $this->openapi->set("components|parameters|search|description", "Text to search for in all text columns of the table. Example: hello");
            $this->openapi->set("components|parameters|search|required", false);
        }
    }

    private function setTag(string $tableName) /*: void*/
    {
        $this->openapi->set("tags|", ['name' => $tableName, 'description' => "$tableName operations"]);
    }
}
