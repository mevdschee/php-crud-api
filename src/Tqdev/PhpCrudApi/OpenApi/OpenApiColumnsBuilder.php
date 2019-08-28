<?php

namespace Tqdev\PhpCrudApi\OpenApi;

use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Middleware\Communication\VariableStore;
use Tqdev\PhpCrudApi\OpenApi\OpenApiDefinition;

class OpenApiColumnsBuilder
{
    private $openapi;
    private $reflection;

    public function __construct(OpenApiDefinition $openapi, ReflectionService $reflection)
    {
        $this->openapi = $openapi;
        $this->reflection = $reflection;
    }

    public function build() /*: void*/
    {
    }
}
