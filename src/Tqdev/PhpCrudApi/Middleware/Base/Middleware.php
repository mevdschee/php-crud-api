<?php
namespace Tqdev\PhpCrudApi\Middleware\Base;

use Psr\Http\Server\MiddlewareInterface;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Router\Router;

abstract class Middleware implements MiddlewareInterface
{
    protected $next;
    protected $responder;
    private $properties;

    public function __construct(Router $router, Responder $responder, array $properties)
    {
        $router->load($this);
        $this->responder = $responder;
        $this->properties = $properties;
    }

    protected function getArrayProperty(string $key, string $default): array
    {
        return array_filter(array_map('trim', explode(',', $this->getProperty($key, $default))));
    }

    protected function getProperty(string $key, $default)
    {
        return isset($this->properties[$key]) ? $this->properties[$key] : $default;
    }
}
