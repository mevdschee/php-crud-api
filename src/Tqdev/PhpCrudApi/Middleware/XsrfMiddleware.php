<?php
namespace Tqdev\PhpCrudApi\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Record\ErrorCode;

class XsrfMiddleware extends Middleware
{
    private function getToken(): string
    {
        $cookieName = $this->getProperty('cookieName', 'XSRF-TOKEN');
        if (isset($_COOKIE[$cookieName])) {
            $token = $_COOKIE[$cookieName];
        } else {
            $secure = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on';
            $token = bin2hex(random_bytes(8));
            if (!headers_sent()) {
                setcookie($cookieName, $token, 0, '', '', $secure);
            }
        }
        return $token;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $next): ResponseInterface
    {
        $token = $this->getToken();
        $method = $request->getMethod();
        $excludeMethods = $this->getArrayProperty('excludeMethods', 'OPTIONS,GET');
        if (!in_array($method, $excludeMethods)) {
            $headerName = $this->getProperty('headerName', 'X-XSRF-TOKEN');
            if ($token != $request->getHeader($headerName)) {
                return $this->responder->error(ErrorCode::BAD_OR_MISSING_XSRF_TOKEN, '');
            }
        }
        return $next->handle($request);
    }
}
