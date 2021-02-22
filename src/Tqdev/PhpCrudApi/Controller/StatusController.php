<?php

namespace Tqdev\PhpCrudApi\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Tqdev\PhpCrudApi\Cache\Cache;
use Tqdev\PhpCrudApi\Database\GenericDB;
use Tqdev\PhpCrudApi\Middleware\Router\Router;

class StatusController
{
    private $db;
    private $cache;
    private $responder;

    public function __construct(Router $router, Responder $responder, Cache $cache, GenericDB $db)
    {
        $router->register('GET', '/status/ping', array($this, 'ping'));
        $this->db = $db;
        $this->cache = $cache;
        $this->responder = $responder;
    }

    public function ping(ServerRequestInterface $request): ResponseInterface
    {
        $result = [
            'db' => $this->db->ping(),
            'cache' => $this->cache->ping(),
        ];
        return $this->responder->success($result);
    }

}
