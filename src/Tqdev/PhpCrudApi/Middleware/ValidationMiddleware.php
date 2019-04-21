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
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\RequestUtils;

class ValidationMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
    }

    private function callHandler($handler, $record, string $operation, ReflectedTable $table) /*: ResponseInterface?*/
    {
        $context = (array) $record;
        $details = array();
        $tableName = $table->getName();
        foreach ($context as $columnName => $value) {
            if ($table->hasColumn($columnName)) {
                $column = $table->getColumn($columnName);
                $valid = call_user_func($handler, $operation, $tableName, $column->serialize(), $value, $context);
                if ($valid !== true && $valid !== '') {
                    $details[$columnName] = $valid;
                }
            }
        }
        if (count($details) > 0) {
            return $this->responder->error(ErrorCode::INPUT_VALIDATION_FAILED, $tableName, $details);
        }
        return null;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $next): ResponseInterface
    {
        $operation = RequestUtils::getOperation($request);
        if (in_array($operation, ['create', 'update', 'increment'])) {
            $tableName = RequestUtils::getPathSegment($request, 2);
            if ($this->reflection->hasTable($tableName)) {
                $record = $request->getParsedBody();
                if ($record !== null) {
                    $handler = $this->getProperty('handler', '');
                    if ($handler !== '') {
                        $table = $this->reflection->getTable($tableName);
                        if (is_array($record)) {
                            foreach ($record as $r) {
                                $response = $this->callHandler($handler, $r, $operation, $table);
                                if ($response !== null) {
                                    return $response;
                                }
                            }
                        } else {
                            $response = $this->callHandler($handler, $record, $operation, $table);
                            if ($response !== null) {
                                return $response;
                            }
                        }
                    }
                }
            }
        }
        return $next->handle($request);
    }
}
