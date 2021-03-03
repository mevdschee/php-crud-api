<?php

namespace Tqdev\PhpCrudApi\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\ResponseFactory;

class SslRedirectMiddleware extends Middleware
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $next): ResponseInterface
    {
        $uri = $request->getUri();
        $scheme = $uri->getScheme();
        if ($scheme == 'http') {
            $uri = $request->getUri();
            $uri = $uri->withScheme('https');
            $response = ResponseFactory::fromStatus(301);
            $response = $response->withHeader('Location', $uri->__toString());
        } else {
            $response = $next->handle($request);
        }
        return $response;
    }
}
