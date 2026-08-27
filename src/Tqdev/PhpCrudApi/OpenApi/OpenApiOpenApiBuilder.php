<?php

namespace Tqdev\PhpCrudApi\OpenApi;

use Tqdev\PhpCrudApi\OpenApi\OpenApiDefinition;

/**
 * The openapi controller serves the document that this class writes a part of.
 * It is wired on the "openapi" controller like the other builders are wired on
 * theirs, which means that the end-point describes itself whenever it answers
 * at all.
 */
class OpenApiOpenApiBuilder
{
    private $openapi;
    private $middlewares;
    private $tag = 'openapi';

    public function __construct(OpenApiDefinition $openapi, OpenApiMiddlewares $middlewares)
    {
        $this->openapi = $openapi;
        $this->middlewares = $middlewares;
    }

    public function build() /*: void*/
    {
        $this->setPath();
        $this->setComponentResponse();
        $this->setTag();
    }

    private function setPath() /*: void*/
    {
        $path = '/openapi';
        $method = 'get';
        foreach ($this->middlewares->getCommonParameters($method) as $parameter) {
            $this->openapi->set("paths|$path|$method|parameters||\$ref", "#/components/parameters/$parameter");
        }
        $this->openapi->set("paths|$path|$method|tags|", $this->tag);
        $this->openapi->set("paths|$path|$method|operationId", "read_openapi");
        $this->openapi->set("paths|$path|$method|description", "read openapi document");
        $this->openapi->set("paths|$path|$method|responses|200|\$ref", "#/components/responses/read-openapi");
        $statusCodes = array_merge($this->middlewares->getStatusCodes(), [500]);
        sort($statusCodes);
        foreach ($statusCodes as $statusCode) {
            $this->openapi->set("paths|$path|$method|responses|$statusCode|\$ref", "#/components/responses/error-$statusCode");
        }
        $this->openapi->set("paths|$path|$method|responses|default|\$ref", "#/components/responses/error");
    }

    private function setComponentResponse() /*: void*/
    {
        $this->openapi->set("components|responses|read-openapi|description", "the openapi document that describes this API");
        $this->openapi->set("components|responses|read-openapi|content|application/json|schema|type", "object");
    }

    private function setTag() /*: void*/
    {
        $this->openapi->set("tags|", ['name' => $this->tag, 'description' => "openapi operations"]);
    }
}
