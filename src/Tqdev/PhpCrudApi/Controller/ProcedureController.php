<?php

namespace Tqdev\PhpCrudApi\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\Procedure\ProcedureService;
use Tqdev\PhpCrudApi\RequestUtils;

class ProcedureController
{
    private $service;
    private $responder;

    public function __construct(Router $router, Responder $responder, ProcedureService $service)
    {
        $router->register('GET', '/procedures/*', array($this, '_list'));
        $router->register('POST', '/procedures/*', array($this, 'create'));
        $router->register('GET', '/procedures/*/*', array($this, 'read'));
        $router->register('PUT', '/procedures/*/*', array($this, 'update'));
        $router->register('DELETE', '/procedures/*/*', array($this, 'delete'));
        $router->register('PATCH', '/procedures/*/*', array($this, 'increment'));
        $this->service = $service;
        $this->responder = $responder;
    }
}
