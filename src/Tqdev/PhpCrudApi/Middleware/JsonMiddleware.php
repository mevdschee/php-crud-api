<?php

namespace Tqdev\PhpCrudApi\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Column\Reflection\ReflectedTable;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\RequestUtils;

class JsonMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
    }

    private function processRecord($record, ReflectedTable $table) /*: object */
    {
        foreach ($record as $key => $value) {

        }
    }

    private function processRecords($records, ReflectedTable $table) /*: object */
    {
        if (is_array($records)) {
            foreach ($records as $i => $record) {
                $records[$i] = $this->processRecord($record, $operation, $table);
            }
        } else {
            $records = $this->processRecord($records, $operation, $table);
        }
        return $records;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $next): ResponseInterface
    {
        $operation = RequestUtils::getOperation($request);
        $tableName = RequestUtils::getPathSegment($request, 2);
        $table = $this->reflection->hasTable($tableName) ? $this->reflection->getTable($tableName) : null;
        if ($table && in_array($operation, ['create', 'update'])) {
            $records = $request->getParsedBody();
            $records = $this->processRecords($records, $table);
            $request = $request->withParsedBody($records);
        }
        $response = $next->handle($request);
        if ($table && in_array($operation, ['read', 'list'])) {
            $record = $response->getBody()->getContents();
            $records = $this->processRecords($records, $table);
            $response = ResponseFactory::fromObject(ResponseFactory::OK, $records);
        }
        return $response;
    }
}
