<?php

namespace Tqdev\PhpCrudApi\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\RequestUtils;

class ApiKeyAuthMiddleware extends Middleware
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $next): ResponseInterface
    {
        $headerName = $this->getProperty('header', 'X-API-Key');
        $apiKey = RequestUtils::getHeader($request, $headerName);
        if ($apiKey) {
            $apiKeys = $this->getArrayProperty('keys', '');
            if (!in_array($apiKey, $apiKeys)) {
                return $this->responder->error(ErrorCode::AUTHENTICATION_FAILED, $apiKey);
            }
        } else {
            $authenticationMode = $this->getProperty('mode', 'required');
            if ($authenticationMode == 'required') {
                return $this->responder->error(ErrorCode::AUTHENTICATION_REQUIRED, '');
            }
        }
        $_SESSION['apiKey'] = $apiKey;
        return $next->handle($request);
    }
}
