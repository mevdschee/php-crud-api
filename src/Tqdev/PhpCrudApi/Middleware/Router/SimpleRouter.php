<?php

namespace Tqdev\PhpCrudApi\Middleware\Router;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Tqdev\PhpCrudApi\Cache\Cache;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\Record\PathTree;
use Tqdev\PhpCrudApi\RequestUtils;

class SimpleRouter implements Router
{
    private $basePath;
    private $responder;
    private $cache;
    private $ttl;
    private $registration;
    private $routes;
    private $routeHandlers;
    private $middlewares;

    public function __construct(string $basePath, Responder $responder, Cache $cache, int $ttl)
    {
        $this->basePath = rtrim($basePath, '/') ?: rtrim($this->detectBasePath(), '/');;
        $this->responder = $responder;
        $this->cache = $cache;
        $this->ttl = $ttl;
        $this->registration = true;
        $this->routes = $this->loadPathTree();
        $this->routeHandlers = [];
        $this->middlewares = array();
    }

    private function detectBasePath(): string
    {
        if (isset($_SERVER['REQUEST_URI'])) {
            $fullPath = urldecode(explode('?', $_SERVER['REQUEST_URI'])[0]);
            if (isset($_SERVER['PATH_INFO'])) {
                $path = $_SERVER['PATH_INFO'];
                if (substr($fullPath, -1 * strlen($path)) == $path) {
                    return substr($fullPath, 0, -1 * strlen($path));
                }
            }
            $path = '/' . basename(__FILE__);
            if (substr($fullPath, -1 * strlen($path)) == $path) {
                return $fullPath;
            }
        }
        return '/';
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
            $path = trim($path, '/');
            $parts = array();
            if ($path) {
                $parts = explode('/', $path);
            }
            array_unshift($parts, $method);
            $this->routes->put($parts, $routeNumber);
        }
    }

    public function load(Middleware $middleware) /*: void*/
    {
        array_push($this->middlewares, $middleware);
    }

    public function route(ServerRequestInterface $request): ResponseInterface
    {
        if ($this->registration) {
            $data = gzcompress(json_encode($this->routes, JSON_UNESCAPED_UNICODE));
            $this->cache->set('PathTree', $data, $this->ttl);
        }

        return $this->handle($request);
    }

    private function getRouteNumbers(ServerRequestInterface $request): array
    {
        $method = strtoupper($request->getMethod());
        $path = array();
        $segment = $method;
        for ($i = 1; strlen($segment) > 0; $i++) {
            array_push($path, $segment);
            $segment = RequestUtils::getPathSegment($request, $i);
        }
        return $this->routes->match($path);
    }

    private function removeBasePath(ServerRequestInterface $request): ServerRequestInterface
    {
        $path = $request->getUri()->getPath();
        if (substr($path, 0, strlen($this->basePath)) == $this->basePath) {
            $path = substr($path, strlen($this->basePath));
            $request = $request->withUri($request->getUri()->withPath($path));
        }
        return $request;
    }

    public function getBasePath(): string
    {
        return $this->basePath;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $request = $this->removeBasePath($request);

        if (count($this->middlewares)) {
            $handler = array_shift($this->middlewares);
            return $handler->process($request, $this);
        }

        $routeNumbers = $this->getRouteNumbers($request);
        if (count($routeNumbers) == 0) {
            return $this->responder->error(ErrorCode::ROUTE_NOT_FOUND, $request->getUri()->getPath());
        }
        try {
            $response = call_user_func($this->routeHandlers[$routeNumbers[0]], $request);
        } catch (\Throwable $exception) {
            $response = $this->responder->exception($exception);
        }
        return $response;
    }
}
