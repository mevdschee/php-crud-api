<?php
namespace Tqdev\PhpCrudApi\Controller;

use Tqdev\PhpCrudApi\Cache\Cache;
use Tqdev\PhpCrudApi\Request;
use Tqdev\PhpCrudApi\Response;
use Tqdev\PhpCrudApi\Middleware\Router\Router;

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

    public function clear(Request $request): Response
    {
        return $this->responder->success($this->cache->clear());
    }

}
