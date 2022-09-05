<?php

namespace Tqdev\PhpCrudApi\OpenApi;

use Tqdev\PhpCrudApi\OpenApi\OpenApiDefinition;

class OpenApiStatusBuilder
{
    private $openapi;
    private $operations = [
        'status' => [
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
        $this->setComponentSchema();
        $this->setComponentResponse();
        foreach (array_keys($this->operations) as $type) {
            $this->setTag($type);
        }
    }

    private function setPaths() /*: void*/
    {
        foreach ($this->operations as $type => $operationPair) {
            foreach ($operationPair as $operation => $method) {
                $path = "/$type/$operation";
                $this->openapi->set("paths|$path|$method|tags|", "$type");
                $this->openapi->set("paths|$path|$method|operationId", "$operation" . "_" . "$type");
                $this->openapi->set("paths|$path|$method|description", "Request API '$operation' status");
                $this->openapi->set("paths|$path|$method|responses|200|\$ref", "#/components/responses/$operation-$type");

            }
        }
    }

    private function setComponentSchema() /*: void*/
    {
        foreach ($this->operations as $type => $operationPair) {
            foreach ($operationPair as $operation => $method) {
                $prefix = "components|schemas|$operation-$type";
                $this->openapi->set("$prefix|type", "object");
                switch ($operation) {
                    case 'ping':
                        $this->openapi->set("$prefix|required", ['db', 'cache']);
                        $this->openapi->set("$prefix|properties|db|type", 'integer');
                        $this->openapi->set("$prefix|properties|db|format", "int64");
                        $this->openapi->set("$prefix|properties|cache|type", 'integer');
                        $this->openapi->set("$prefix|properties|cache|format", "int64");
                        break;
                }
            }
        }
    }

    private function setComponentResponse() /*: void*/
    {
        foreach ($this->operations as $type => $operationPair) {
            foreach ($operationPair as $operation => $method) {
                $this->openapi->set("components|responses|$operation-$type|description", "$operation status record");
                $this->openapi->set("components|responses|$operation-$type|content|application/json|schema|\$ref", "#/components/schemas/$operation-$type");
            }
        }
    }

    private function setTag(string $type) /*: void*/
    {
        $this->openapi->set("tags|", [ 'name' => $type, 'description' => "$type operations"]);
    }
}
