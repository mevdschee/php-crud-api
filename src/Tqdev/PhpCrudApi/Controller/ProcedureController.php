<?php

namespace Tqdev\PhpCrudApi\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\Procedure\ProcedureService;
use Tqdev\PhpCrudApi\RequestUtils;

class ProcedureController
{
    private $service;
    private $responder;

    public function __construct(Router $router, Responder $responder, ProcedureService $service)
    {
        $router->register('GET', '/procedures/*', array($this, 'file'));
        $this->service = $service;
        $this->responder = $responder;
    }

    public function file(ServerRequestInterface $request): ResponseInterface
    {
        $file = RequestUtils::getPathSegment($request, 2);
        $params = RequestUtils::getParams($request);
        if (!$this->service->hasProcedure($file)) {
            return $this->responder->error(ErrorCode::PROCEDURE_NOT_FOUND, $file);
        }
        return $this->responder->success($this->service->execute($file));
    }
}
 