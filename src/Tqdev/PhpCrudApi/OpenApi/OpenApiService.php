<?php

namespace Tqdev\PhpCrudApi\OpenApi;

use Psr\Http\Message\ServerRequestInterface;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Config\Config;
use Tqdev\PhpCrudApi\OpenApi\OpenApiBuilder;

class OpenApiService
{
    private $builder;

    public function __construct(ReflectionService $reflection, Config $config, string $basePath)
    {
        $this->builder = new OpenApiBuilder($reflection, $config, $basePath);
    }

    public function get(ServerRequestInterface $request): OpenApiDefinition
    {
        return $this->builder->build($request);
    }
}
