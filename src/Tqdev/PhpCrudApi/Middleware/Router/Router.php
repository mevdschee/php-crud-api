<?php
namespace Tqdev\PhpCrudApi\Middleware\Router;

use Psr\Http\Message\ServerRequestInterface;
use Tqdev\PhpCrudApi\Middleware\Base\Handler;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Response;

interface Router extends Handler
{
    public function register(string $method, string $path, array $handler);

    public function load(Middleware $middleware);

    public function route(ServerRequestInterface $request): Response;
}
