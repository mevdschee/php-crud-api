<?php
namespace Tqdev\PhpCrudApi\Controller;

use Psr\Http\Message\ServerRequestInterface;
use Tqdev\PhpCrudApi\Cache\Cache;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\Response;

class CacheController
{
    private $cache;
    private $responder;

    public function __construct(Router $router, Responder $responder, Cache $cache)
    {
        $router->register('GET', '/cache/clear', array($this, 'clear'));
        $this->cache = $cache;
        $this->responder = $responder;
    }

    public function clear(ServerRequestInterface $request): Response
    {
        return $this->responder->success($this->cache->clear());
    }

}
