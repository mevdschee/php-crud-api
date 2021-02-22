<?php

namespace Tqdev\PhpCrudApi\OpenApi;

use Tqdev\PhpCrudApi\OpenApi\OpenApiDefinition;

class OpenApiStatusBuilder
{
    private $openapi;
    private $operations = [
        'status' => [
            'up' => 'get',
            'ping' => 'get',
        ],        
    ];


    public function __construct(OpenApiDefinition $openapi)
    {
        $this->openapi = $openapi;
    }

    public function build() /*: void*/
    {
        $this->setPaths();
        $this->openapi->set("components|responses|boolSuccess|description", "boolean indicating success or failure");
        $this->openapi->set("components|responses|boolSuccess|content|application/json|schema|type", "boolean");
        $this->setComponentSchema();
        $this->setComponentResponse();
        foreach (array_keys($this->operations) as $index => $type) {
            $this->setTag($index, $type);
        }
    }

    private function setPaths() /*: void*/
    {
        foreach ($this->operations as $type => $operationPair) {
            foreach ($operationPair as $operation => $method) {
                $path = "/$type/$operation";
                $operationType = $operation . ucfirst($type);
                $this->openapi->set("paths|$path|$method|tags|0", "$type");
                $this->openapi->set("paths|$path|$method|operationId", "$operation" . "_" . "$type");
                $this->openapi->set("paths|$path|$method|description", "Request API '$operation' status");
                $this->openapi->set("paths|$path|$method|responses|200|\$ref", "#/components/responses/$operationType");
        
            }
        }
    }

    private function setComponentSchema() /*: void*/
    {
        foreach ($this->operations as $type => $operationPair) {
            foreach ($operationPair as $operation => $method) {
                $operationType = $operation . ucfirst($type);
                $prefix = "components|schemas|$operationType";
                $this->openapi->set("$prefix|type", "object");
                switch ($operation) {
                    case 'ping':
                        $this->openapi->set("$prefix|required", ['db', 'cache']);
                        $this->openapi->set("$prefix|properties|db|type", 'integer');
                        $this->openapi->set("$prefix|properties|db|format", "int64");
                        $this->openapi->set("$prefix|properties|cache|type", 'integer');
                        $this->openapi->set("$prefix|properties|cache|format", "int64");
                        break;
                    case 'up':
                        $this->openapi->set("$prefix|required", ['db', 'cache']);
                        $this->openapi->set("$prefix|properties|db|type", 'boolean');
                        $this->openapi->set("$prefix|properties|cache|type", 'boolean');
                        break;
                }
            }
        }
    }

    private function setComponentResponse() /*: void*/
    {
        foreach ($this->operations as $type => $operationPair) {
            foreach ($operationPair as $operation => $method) {
                $operationType = $operation . ucfirst($type);
                $this->openapi->set("components|responses|$operationType|description", "$operation status record");
                $this->openapi->set("components|responses|$operationType|content|application/json|schema|\$ref", "#/components/schemas/$operationType");
            }
        }
    }

    private function setTag(int $index, string $type) /*: void*/
    {
        $this->openapi->set("tags|$index|name", "$type");
        $this->openapi->set("tags|$index|description", "$type operations");
    }
}
