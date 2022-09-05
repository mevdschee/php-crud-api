<?php

namespace Tqdev\PhpCrudApi\OpenApi;

use Psr\Http\Message\ServerRequestInterface;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\OpenApi\OpenApiBuilder;
use Tqdev\PhpCrudApi\RequestFactory;

class OpenApiService
{
    private $builder;

    public function __construct(ReflectionService $reflection, array $base, array $controllers, array $customBuilders)
    {
        $this->builder = new OpenApiBuilder($reflection, $base, $controllers, $customBuilders);
    }

    public function get(ServerRequestInterface $request): OpenApiDefinition
    {
        return $this->builder->build(RequestFactory::fromGlobals());
    }
}
