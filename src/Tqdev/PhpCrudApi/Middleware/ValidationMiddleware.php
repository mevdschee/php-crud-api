<?php
namespace Tqdev\PhpCrudApi\Middleware;

use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Column\Reflection\ReflectedTable;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\Record\RequestUtils;
use Tqdev\PhpCrudApi\Request;
use Tqdev\PhpCrudApi\Response;

class ValidationMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
        $this->utils = new RequestUtils($reflection);
    }

    private function callHandler($handler, $record, String $operation, ReflectedTable $table) /*: Response?*/
    {
        $context = (array) $record;
        $details = array();
        $tableName = $table->getName();
        foreach ($context as $columnName => $value) {
            if ($table->exists($columnName)) {
                $column = $table->get($columnName);
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

    public function handle(Request $request): Response
    {
        $operation = $this->utils->getOperation($request);
        if (in_array($operation, ['create', 'update', 'increment'])) {
            $tableName = $request->getPathSegment(2);
            if ($this->reflection->hasTable($tableName)) {
                $record = $request->getBody();
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
        return $this->next->handle($request);
    }
}
