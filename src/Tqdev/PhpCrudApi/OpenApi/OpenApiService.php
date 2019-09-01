<?php

namespace Tqdev\PhpCrudApi\OpenApi;

use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\OpenApi\OpenApiBuilder;

class OpenApiService
{
    private $builder;

    public function __construct(ReflectionService $reflection, array $base, array $controllers)
    {
        $this->builder = new OpenApiBuilder($reflection, $base, $controllers);
    }

    public function get(): OpenApiDefinition
    {
        return $this->builder->build();
    }
}
