<?php
namespace Tqdev\PhpCrudApi\Middleware;

use Psr\Http\Message\ServerRequestInterface;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\Response;

class CorsMiddleware extends Middleware
{
    private function isOriginAllowed(String $origin, String $allowedOrigins): bool
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

    public function handle(ServerRequestInterface $request): Response
    {
        $method = $request->getMethod();
        $origin = count($request->getHeader('Origin')) ? $request->getHeader('Origin')[0] : '';
        $allowedOrigins = $this->getProperty('allowedOrigins', '*');
        if ($origin && !$this->isOriginAllowed($origin, $allowedOrigins)) {
            $response = $this->responder->error(ErrorCode::ORIGIN_FORBIDDEN, $origin);
        } elseif ($method == 'OPTIONS') {
            $response = new Response(Response::OK, '');
            $allowHeaders = $this->getProperty('allowHeaders', 'Content-Type, X-XSRF-TOKEN, X-Authorization');
            if ($allowHeaders) {
                $response->addHeader('Access-Control-Allow-Headers', $allowHeaders);
            }
            $allowMethods = $this->getProperty('allowMethods', 'OPTIONS, GET, PUT, POST, DELETE, PATCH');
            if ($allowMethods) {
                $response->addHeader('Access-Control-Allow-Methods', $allowMethods);
            }
            $allowCredentials = $this->getProperty('allowCredentials', 'true');
            if ($allowCredentials) {
                $response->addHeader('Access-Control-Allow-Credentials', $allowCredentials);
            }
            $maxAge = $this->getProperty('maxAge', '1728000');
            if ($maxAge) {
                $response->addHeader('Access-Control-Max-Age', $maxAge);
            }
            $exposeHeaders = $this->getProperty('exposeHeaders', '');
            if ($exposeHeaders) {
                $response->addHeader('Access-Control-Expose-Headers', $exposeHeaders);
            }
        } else {
            $response = $this->next->handle($request);
        }
        if ($origin) {
            $allowCredentials = $this->getProperty('allowCredentials', 'true');
            if ($allowCredentials) {
                $response->addHeader('Access-Control-Allow-Credentials', $allowCredentials);
            }
            $response->addHeader('Access-Control-Allow-Origin', $origin);
        }
        return $response;
    }
}
