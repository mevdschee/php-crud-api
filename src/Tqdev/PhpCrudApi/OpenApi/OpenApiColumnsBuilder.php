<?php

namespace Tqdev\PhpCrudApi\OpenApi;

use Tqdev\PhpCrudApi\OpenApi\OpenApiDefinition;

class OpenApiColumnsBuilder
{
    private $openapi;
    private $operations = [
        'database' => [
            'read' => 'get',
        ],
        'table' => [
            'create' => 'post',
            'read' => 'get',
            'update' => 'put', //rename
            'delete' => 'delete',
        ],
        'column' => [
            'create' => 'post',
            'read' => 'get',
            'update' => 'put',
            'delete' => 'delete',
        ],
    ];

    public function __construct(OpenApiDefinition $openapi)
    {
        $this->openapi = $openapi;
    }

    public function build() /*: void*/
    {
        $this->setPaths();
        $this->openapi->set("components|responses|bool-success|description", "boolean indicating success or failure");
        $this->openapi->set("components|responses|bool-success|content|application/json|schema|type", "boolean");
        $this->setComponentSchema();
        $this->setComponentResponse();
        $this->setComponentRequestBody();
        $this->setComponentParameters();
        foreach (array_keys($this->operations) as $type) {
            $this->setTag($type);
        }
    }

    private function setPaths() /*: void*/
    {
        foreach (array_keys($this->operations) as $type) {
            foreach ($this->operations[$type] as $operation => $method) {
                $parameters = [];
                switch ($type) {
                    case 'database':
                        $path = '/columns';
                        break;
                    case 'table':
                        $path = $operation == 'create' ? '/columns' : '/columns/{table}';
                        break;
                    case 'column':
                        $path = $operation == 'create' ? '/columns/{table}' : '/columns/{table}/{column}';
                        break;
                }
                if (strpos($path, '{table}')) {
                    $parameters[] = 'table';
                }
                if (strpos($path, '{column}')) {
                    $parameters[] = 'column';
                }
                foreach ($parameters as $parameter) {
                    $this->openapi->set("paths|$path|$method|parameters||\$ref", "#/components/parameters/$parameter");
                }
                if (in_array($operation, ['create', 'update'])) {
                    $this->openapi->set("paths|$path|$method|requestBody|\$ref", "#/components/requestBodies/$operation-$type");
                }
                $this->openapi->set("paths|$path|$method|tags|", "$type");
                $this->openapi->set("paths|$path|$method|operationId", "$operation" . "_" . "$type");
                if ("$operation-$type" == 'update-table') {
                    $this->openapi->set("paths|$path|$method|description", "rename table");
                } else {
                    $this->openapi->set("paths|$path|$method|description", "$operation $type");
                }
                switch ($operation) {
                    case 'read':
                        $this->openapi->set("paths|$path|$method|responses|200|\$ref", "#/components/responses/$operation-$type");
                        break;
                    case 'create':
                    case 'update':
                    case 'delete':
                        $this->openapi->set("paths|$path|$method|responses|200|\$ref", "#/components/responses/bool-success");
                        break;
                }
            }
        }
    }

    private function setComponentSchema() /*: void*/
    {
        foreach (array_keys($this->operations) as $type) {
            foreach (array_keys($this->operations[$type]) as $operation) {
                if ($operation == 'delete') {
                    continue;
                }
                $prefix = "components|schemas|$operation-$type";
                $this->openapi->set("$prefix|type", "object");
                switch ($type) {
                    case 'database':
                        $this->openapi->set("$prefix|properties|tables|type", 'array');
                        $this->openapi->set("$prefix|properties|tables|items|\$ref", "#/components/schemas/read-table");
                        break;
                    case 'table':
                        if ($operation == 'update') {
                            $this->openapi->set("$prefix|required", ['name']);
                            $this->openapi->set("$prefix|properties|name|type", 'string');
                        } else {
                            $this->openapi->set("$prefix|properties|name|type", 'string');
                            if ($operation == 'read') {
                                $this->openapi->set("$prefix|properties|type|type", 'string');
                            }
                            $this->openapi->set("$prefix|properties|columns|type", 'array');
                            $this->openapi->set("$prefix|properties|columns|items|\$ref", "#/components/schemas/read-column");
                        }
                        break;
                    case 'column':
                        $this->openapi->set("$prefix|required", ['name', 'type']);
                        $this->openapi->set("$prefix|properties|name|type", 'string');
                        $this->openapi->set("$prefix|properties|type|type", 'string');
                        $this->openapi->set("$prefix|properties|length|type", 'integer');
                        $this->openapi->set("$prefix|properties|length|format", "int64");
                        $this->openapi->set("$prefix|properties|precision|type", 'integer');
                        $this->openapi->set("$prefix|properties|precision|format", "int64");
                        $this->openapi->set("$prefix|properties|scale|type", 'integer');
                        $this->openapi->set("$prefix|properties|scale|format", "int64");
                        $this->openapi->set("$prefix|properties|nullable|type", 'boolean');
                        $this->openapi->set("$prefix|properties|pk|type", 'boolean');
                        $this->openapi->set("$prefix|properties|fk|type", 'string');
                        break;
                }
            }
        }
    }

    private function setComponentResponse() /*: void*/
    {
        foreach (array_keys($this->operations) as $type) {
            foreach (array_keys($this->operations[$type]) as $operation) {
                if ($operation != 'read') {
                    continue;
                }
                $this->openapi->set("components|responses|$operation-$type|description", "single $type record");
                $this->openapi->set("components|responses|$operation-$type|content|application/json|schema|\$ref", "#/components/schemas/$operation-$type");
            }
        }
    }

    private function setComponentRequestBody() /*: void*/
    {
        foreach (array_keys($this->operations) as $type) {
            foreach (array_keys($this->operations[$type]) as $operation) {
                if (!in_array($operation, ['create', 'update'])) {
                    continue;
                }
                $this->openapi->set("components|requestBodies|$operation-$type|description", "single $type record");
                $this->openapi->set("components|requestBodies|$operation-$type|content|application/json|schema|\$ref", "#/components/schemas/$operation-$type");
            }
        }
    }

    private function setComponentParameters() /*: void*/
    {
        $this->openapi->set("components|parameters|table|name", "table");
        $this->openapi->set("components|parameters|table|in", "path");
        $this->openapi->set("components|parameters|table|schema|type", "string");
        $this->openapi->set("components|parameters|table|description", "table name");
        $this->openapi->set("components|parameters|table|required", true);

        $this->openapi->set("components|parameters|column|name", "column");
        $this->openapi->set("components|parameters|column|in", "path");
        $this->openapi->set("components|parameters|column|schema|type", "string");
        $this->openapi->set("components|parameters|column|description", "column name");
        $this->openapi->set("components|parameters|column|required", true);
    }

    private function setTag(string $type) /*: void*/
    {
        $this->openapi->set("tags|", ['name' => $type, 'description' => "$type operations"]);
    }
}
