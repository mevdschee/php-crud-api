<?php
namespace Tqdev\PhpCrudApi\Middleware;

use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\Request;
use Tqdev\PhpCrudApi\Response;

class AjaxOnlyMiddleware extends Middleware
{
    public function handle(Request $request): Response
    {
        $method = $request->getMethod();
        $excludeMethods = $this->getArrayProperty('excludeMethods', 'OPTIONS,GET');
        if (!in_array($method, $excludeMethods)) {
            $headerName = $this->getProperty('headerName', 'X-Requested-With');
            $headerValue = $this->getProperty('headerValue', 'XMLHttpRequest');
            if ($headerValue != $request->getHeader($headerName)) {
                return $this->responder->error(ErrorCode::ONLY_AJAX_REQUESTS_ALLOWED, '');
            }
        }
        return $this->next->handle($request);
    }
}
