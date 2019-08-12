<?php

namespace Tqdev\PhpCrudApi\OpenApi;

use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\OpenApi\OpenApiBuilder;

class OpenApiService
{
    private $builder;

    public function __construct(ReflectionService $reflection, array $base)
    {
        $this->builder = new OpenApiBuilder($reflection, $base);
    }

    public function get(): OpenApiDefinition
    {
        return $this->builder->build();
    }
}
