<?php

namespace Tqdev\PhpCrudApi\Middleware\Base;

use Psr\Http\Server\MiddlewareInterface;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\Config\Base\ConfigInterface;

abstract class Middleware implements MiddlewareInterface
{
    protected $next;
    protected $responder;
    private $middleware;
    private $config;

    public function __construct(Router $router, Responder $responder, ConfigInterface $config, string $middleware)
    {
        $router->load($this);
        $this->responder = $responder;
        $this->middleware = $middleware;
        $this->config = $config;
    }

    protected function getArrayProperty(string $key, string $default): array
    {
        return array_filter(array_map('trim', explode(',', $this->getProperty($key, $default))));
    }

    protected function getMapProperty(string $key, string $default): array
    {
        $pairs = $this->getArrayProperty($key, $default);
        $result = array();
        foreach ($pairs as $pair) {
            if (strpos($pair, ':')) {
                list($k, $v) = explode(':', $pair, 2);
                $result[trim($k)] = trim($v);
            } else {
                $result[] = trim($pair);
            }
        }
        return $result;
    }

    protected function getProperty(string $key, $default)
    {
        return $this->config->getProperty($this->middleware . '.' . $key, $default);
    }
}
