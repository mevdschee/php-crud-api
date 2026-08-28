<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Tqdev\PhpCrudApi\Cache\Cache;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Config\CustomSettings;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Database\GenericDB;
use Tqdev\PhpCrudApi\Middleware\Router\Router;

class MyHelloController {

    private $responder;
    private $greeting;

    public function __construct(Router $router, Responder $responder, GenericDB $db, ReflectionService $reflection, Cache $cache, CustomSettings $settings)
    {
        $router->register('GET', '/hello', array($this, 'getHello'));
        $this->responder = $responder;
        $this->greeting = $settings->get('greeting', 'Hello World!');
    }

    public function getHello(ServerRequestInterface $request): ResponseInterface
    {
        return $this->responder->success(['message' => $this->greeting]);
    }
}

/**
 * Constructed with the five argument signature that predates the settings
 * parameter, which has to keep working.
 */
class MyLegacyController {

    private $responder;

    public function __construct(Router $router, Responder $responder, GenericDB $db, ReflectionService $reflection, Cache $cache)
    {
        $router->register('GET', '/legacy', array($this, 'getLegacy'));
        $this->responder = $responder;
    }

    public function getLegacy(ServerRequestInterface $request): ResponseInterface
    {
        return $this->responder->success(['message' => "Hello Legacy!"]);
    }
}
