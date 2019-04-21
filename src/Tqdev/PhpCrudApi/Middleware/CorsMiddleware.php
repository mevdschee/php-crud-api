<?php
namespace Tqdev\PhpCrudApi\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\ResponseFactory;

class CorsMiddleware extends Middleware
{
    private function isOriginAllowed(string $origin, string $allowedOrigins): bool
    {
        $found = false;
        foreach (explode(',', $allowedOrigins) as $allowedOrigin) {
            $hostname = preg_quote(strtolower(trim($allowedOrigin)));
            $regex = '/^' . str_replace('\*', '.*', $hostname) . '$/';
            if (preg_match($regex, $origin)) {
                $found = true;
                break;
            }
        }
        return $found;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $next): ResponseInterface
    {
        $method = $request->getMethod();
        $origin = count($request->getHeader('Origin')) ? $request->getHeader('Origin')[0] : '';
        $allowedOrigins = $this->getProperty('allowedOrigins', '*');
        if ($origin && !$this->isOriginAllowed($origin, $allowedOrigins)) {
            $response = $this->responder->error(ErrorCode::ORIGIN_FORBIDDEN, $origin);
        } elseif ($method == 'OPTIONS') {
            $response = ResponseFactory::fromStatus(ResponseFactory::OK);
            $allowHeaders = $this->getProperty('allowHeaders', 'Content-Type, X-XSRF-TOKEN, X-Authorization');
            if ($allowHeaders) {
                $response = $response->withHeader('Access-Control-Allow-Headers', $allowHeaders);
            }
            $allowMethods = $this->getProperty('allowMethods', 'OPTIONS, GET, PUT, POST, DELETE, PATCH');
            if ($allowMethods) {
                $response = $response->withHeader('Access-Control-Allow-Methods', $allowMethods);
            }
            $allowCredentials = $this->getProperty('allowCredentials', 'true');
            if ($allowCredentials) {
                $response = $response->withHeader('Access-Control-Allow-Credentials', $allowCredentials);
            }
            $maxAge = $this->getProperty('maxAge', '1728000');
            if ($maxAge) {
                $response = $response->withHeader('Access-Control-Max-Age', $maxAge);
            }
            $exposeHeaders = $this->getProperty('exposeHeaders', '');
            if ($exposeHeaders) {
                $response = $response->withHeader('Access-Control-Expose-Headers', $exposeHeaders);
            }
        } else {
            $response = $next->handle($request);
        }
        if ($origin) {
            $allowCredentials = $this->getProperty('allowCredentials', 'true');
            if ($allowCredentials) {
                $response = $response->withHeader('Access-Control-Allow-Credentials', $allowCredentials);
            }
            $response = $response->withHeader('Access-Control-Allow-Origin', $origin);
        }
        return $response;
    }
}
