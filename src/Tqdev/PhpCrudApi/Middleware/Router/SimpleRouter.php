<?php
namespace Tqdev\PhpCrudApi\Middleware\Router;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Tqdev\PhpCrudApi\Cache\Cache;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\Record\PathTree;
use Tqdev\PhpCrudApi\ResponseUtils;

class SimpleRouter implements Router
{
    private $responder;
    private $cache;
    private $ttl;
    private $debug;
    private $registration;
    private $routes;
    private $routeHandlers;
    private $middlewares;

    public function __construct(Responder $responder, Cache $cache, int $ttl, bool $debug)
    {
        $this->responder = $responder;
        $this->cache = $cache;
        $this->ttl = $ttl;
        $this->debug = $debug;
        $this->registration = true;
        $this->routes = $this->loadPathTree();
        $this->routeHandlers = [];
        $this->middlewares = array();
    }

    private function loadPathTree(): PathTree
    {
        $data = $this->cache->get('PathTree');
        if ($data != '') {
            $tree = PathTree::fromJson(json_decode(gzuncompress($data)));
            $this->registration = false;
        } else {
            $tree = new PathTree();
        }
        return $tree;
    }

    public function register(string $method, string $path, array $handler)
    {
        $routeNumber = count($this->routeHandlers);
        $this->routeHandlers[$routeNumber] = $handler;
        if ($this->registration) {
            $parts = explode('/', trim($path, '/'));
            array_unshift($parts, $method);
            $this->routes->put($parts, $routeNumber);
        }
    }

    public function load(Middleware $middleware) /*: void*/
    {
        if (count($this->middlewares) > 0) {
            $next = $this->middlewares[0];
        } else {
            $next = $this;
        }
        $middleware->setNext($next);
        array_unshift($this->middlewares, $middleware);
    }

    public function route(ServerRequestInterface $request): ResponseInterface
    {
        if ($this->registration) {
            $data = gzcompress(json_encode($this->routes, JSON_UNESCAPED_UNICODE));
            $this->cache->set('PathTree', $data, $this->ttl);
        }
        $obj = $this;
        if (count($this->middlewares) > 0) {
            $obj = $this->middlewares[0];
        }
        return $obj->handle($request);
    }

    private function getRouteNumbers(ServerRequestInterface $request): array
    {
        $method = strtoupper($request->getMethod());
        $path = explode('/', trim($request->getRequestTarget(), '/'));
        array_unshift($path, $method);
        return $this->routes->match($path);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $routeNumbers = $this->getRouteNumbers($request);
        if (count($routeNumbers) == 0) {
            return $this->responder->error(ErrorCode::ROUTE_NOT_FOUND, $request->getRequestTarget());
        }
        try {
            $response = call_user_func($this->routeHandlers[$routeNumbers[0]], $request);
        } catch (\PDOException $e) {
            if (strpos(strtolower($e->getMessage()), 'duplicate') !== false) {
                $response = $this->responder->error(ErrorCode::DUPLICATE_KEY_EXCEPTION, '');
            } elseif (strpos(strtolower($e->getMessage()), 'default value') !== false) {
                $response = $this->responder->error(ErrorCode::DATA_INTEGRITY_VIOLATION, '');
            } elseif (strpos(strtolower($e->getMessage()), 'allow nulls') !== false) {
                $response = $this->responder->error(ErrorCode::DATA_INTEGRITY_VIOLATION, '');
            } elseif (strpos(strtolower($e->getMessage()), 'constraint') !== false) {
                $response = $this->responder->error(ErrorCode::DATA_INTEGRITY_VIOLATION, '');
            }
            if ($this->debug) {
                $response = ResponseUtils::addExceptionHeaders($response, $e);
            }
        }
        return $response;
    }

}
