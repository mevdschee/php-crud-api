<?php

namespace Tqdev\PhpCrudApi\OpenApi;

use Tqdev\PhpCrudApi\OpenApi\OpenApiDefinition;

/**
 * The cache controller has one end-point that empties the cache and answers
 * with a boolean.
 */
class OpenApiCacheBuilder
{
    private $openapi;
    private $middlewares;
    private $tag = 'cache';

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
        $path = '/cache/clear';
        $method = 'get';
        foreach ($this->middlewares->getCommonParameters($method) as $parameter) {
            $this->openapi->set("paths|$path|$method|parameters||\$ref", "#/components/parameters/$parameter");
        }
        $this->openapi->set("paths|$path|$method|tags|", $this->tag);
        $this->openapi->set("paths|$path|$method|operationId", "clear_cache");
        $this->openapi->set("paths|$path|$method|description", "clear cache");
        $this->openapi->set("paths|$path|$method|responses|200|\$ref", "#/components/responses/clear-cache");
        $statusCodes = array_merge($this->middlewares->getStatusCodes(), [500]);
        sort($statusCodes);
        foreach ($statusCodes as $statusCode) {
            $this->openapi->set("paths|$path|$method|responses|$statusCode|\$ref", "#/components/responses/error-$statusCode");
        }
        $this->openapi->set("paths|$path|$method|responses|default|\$ref", "#/components/responses/error");
    }

    private function setComponentResponse() /*: void*/
    {
        $this->openapi->set("components|responses|clear-cache|description", "boolean indicating whether the cache was cleared");
        $this->openapi->set("components|responses|clear-cache|content|application/json|schema|type", "boolean");
    }

    private function setTag() /*: void*/
    {
        $this->openapi->set("tags|", ['name' => $this->tag, 'description' => "cache operations"]);
    }
}
