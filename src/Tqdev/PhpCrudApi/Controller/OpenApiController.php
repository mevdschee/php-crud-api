<?php
namespace Tqdev\PhpCrudApi\Controller;

use Tqdev\PhpCrudApi\OpenApi\OpenApiService;
use Tqdev\PhpCrudApi\Request;
use Tqdev\PhpCrudApi\Response;
use Tqdev\PhpCrudApi\Middleware\Router\Router;

class OpenApiController
{
    private $openApi;
    private $responder;

    public function __construct(Router $router, Responder $responder, OpenApiService $openApi)
    {
        $router->register('GET', '/openapi', array($this, 'openapi'));
        $this->openApi = $openApi;
        $this->responder = $responder;
    }

    public function openapi(Request $request): Response
    {
        return $this->responder->success(false);
    }

}
