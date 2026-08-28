<?php

use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\OpenApi\OpenApiDefinition;
use Tqdev\PhpCrudApi\OpenApi\OpenApiMiddlewares;

class MyHelloOpenApiBuilder {

    private $openapi;
    private $middlewares;

    public function __construct(OpenApiDefinition $openapi, ReflectionService $reflection, OpenApiMiddlewares $middlewares)
    {
        $this->openapi = $openapi;
        $this->middlewares = $middlewares;
    }

    public function build() /*: void*/
    {
        $path = 'paths|/hello|get';
        foreach ($this->middlewares->getCommonParameters('get') as $parameter) {
            $this->openapi->set("$path|parameters||\$ref", "#/components/parameters/$parameter");
        }
        $this->openapi->set("$path|tags|", 'hello');
        $this->openapi->set("$path|operationId", 'get_hello');
        $this->openapi->set("$path|description", 'Say hello');
        $this->openapi->set("$path|responses|200|description", 'the greeting');
        $this->openapi->set("$path|responses|200|content|application/json|schema|type", 'object');
        $this->openapi->set("$path|responses|200|content|application/json|schema|properties|message|type", 'string');
        $statusCodes = array_merge($this->middlewares->getStatusCodes(), [500]);
        sort($statusCodes);
        foreach ($statusCodes as $statusCode) {
            $this->openapi->set("$path|responses|$statusCode|\$ref", "#/components/responses/error-$statusCode");
        }
        $this->openapi->set('tags|', ['name' => 'hello', 'description' => 'hello operations']);
    }
}

/**
 * Constructed with the two argument signature that predates the middlewares and
 * the config parameters, which has to keep working.
 */
class MyLegacyOpenApiBuilder {

    private $openapi;

    public function __construct(OpenApiDefinition $openapi, ReflectionService $reflection)
    {
        $this->openapi = $openapi;
    }

    public function build() /*: void*/
    {
        // the custom builders run last, so this reaches the document instead of
        // being overwritten by the built in components
        $this->openapi->set('components|responses|error-500|description', 'internal server error, reworded by a custom builder');
    }
}
