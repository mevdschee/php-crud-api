<?php
namespace Tqdev\PhpCrudApi\Middleware\Router;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;

interface Router extends RequestHandlerInterface
{
    public function register(string $method, string $path, array $handler);

    public function load(Middleware $middleware);

    public function route(ServerRequestInterface $request): ResponseInterface;
}
