<?php
namespace Tqdev\PhpCrudApi\OpenApi;

use Tqdev\PhpCrudApi\Column\ReflectionService;

class OpenApiService
{
    private $reflection;

    public function __construct(ReflectionService $reflection)
    {
        $this->reflection = $reflection;
    }

}
