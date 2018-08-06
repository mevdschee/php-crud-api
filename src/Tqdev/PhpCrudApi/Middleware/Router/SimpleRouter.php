<?php
namespace Tqdev\PhpCrudApi\Middleware\Router;

use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\Record\PathTree;
use Tqdev\PhpCrudApi\Request;
use Tqdev\PhpCrudApi\Response;

class SimpleRouter implements Router
{
    private $responder;
    private $routes;
    private $midlewares;

    public function __construct(Responder $responder)
    {
        $this->responder = $responder;
        $this->routes = new PathTree();
        $this->middlewares = array();
    }

    public function register(String $method, String $path, array $handler)
    {
        $parts = explode('/', trim($path, '/'));
        array_unshift($parts, $method);
        $this->routes->put($parts, $handler);
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

    public function route(Request $request): Response
    {
        $obj = $this;
        if (count($this->middlewares) > 0) {
            $obj = $this->middlewares[0];
        }
        return $obj->handle($request);
    }

    private function getHandlers(Request $request): array
    {
        $method = strtoupper($request->getMethod());
        $path = explode('/', trim($request->getPath(0), '/'));
        array_unshift($path, $method);

        return $this->matchPath($path, $this->routes);
    }

    public function handle(Request $request): Response
    {
        $handlers = $this->getHandlers($request);
        if (count($handlers) == 0) {
            return $this->responder->error(ErrorCode::ROUTE_NOT_FOUND, $request->getPath());
        }
        return call_user_func($handlers[0], $request);
    }

    private function matchPath(array $path, PathTree $tree): array
    {
        $values = array();
        while (count($path) > 0) {
            $key = array_shift($path);
            if ($tree->has($key)) {
                $tree = $tree->get($key);
            } else if ($tree->has('*')) {
                $tree = $tree->get('*');
            } else {
                $tree = null;
                break;
            }
        }
        if ($tree !== null) {
            $values = $tree->getValues();
        }
        return $values;
    }
}
