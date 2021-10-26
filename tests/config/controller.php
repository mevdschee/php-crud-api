<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Tqdev\PhpCrudApi\Cache\Cache;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Database\GenericDB;
use Tqdev\PhpCrudApi\Middleware\Router\Router;

class MyHelloController {

    private $responder;

    public function __construct(Router $router, Responder $responder, GenericDB $db, ReflectionService $reflection, Cache $cache)
    {
        $router->register('GET', '/hello', array($this, 'getHello'));
        $this->responder = $responder;
    }

    public function getHello(ServerRequestInterface $request): ResponseInterface
    {
        return $this->responder->success(['message' => "Hello World!"]);
    }
}