<?php
namespace Tqdev\PhpCrudApi\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\RequestUtils;

class AjaxOnlyMiddleware extends Middleware
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $next): ResponseInterface
    {
        $method = $request->getMethod();
        $excludeMethods = $this->getArrayProperty('excludeMethods', 'OPTIONS,GET');
        if (!in_array($method, $excludeMethods)) {
            $headerName = $this->getProperty('headerName', 'X-Requested-With');
            $headerValue = $this->getProperty('headerValue', 'XMLHttpRequest');
            if ($headerValue != RequestUtils::getHeader($request, $headerName)) {
                return $this->responder->error(ErrorCode::ONLY_AJAX_REQUESTS_ALLOWED, $method);
            }
        }
        return $next->handle($request);
    }
}
