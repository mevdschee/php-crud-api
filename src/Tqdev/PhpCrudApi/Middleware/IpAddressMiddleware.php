<?php
namespace Tqdev\PhpCrudApi\Middleware;

use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Column\Reflection\ReflectedTable;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\Record\RequestUtils;
use Tqdev\PhpCrudApi\Request;
use Tqdev\PhpCrudApi\Response;

class IpAddressMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
        $this->utils = new RequestUtils($reflection);
    }

    private function callHandler($handler, $record, String $operation, ReflectedTable $table) /*: object */
    {
        $context = (array) $record;
        $columnName = $this->getProperty('column', '');
        if ($table->hasColumn($columnName)) {
            if ($operation == 'create') {
                $context[$columnName] = $_SERVER['REMOTE_ADDR'];
            } else {
                unset($context[$columnName]);
            }
        }
        return (object) $context;
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
                            foreach ($record as &$r) {
                                $r = $this->callHandler($handler, $r, $operation, $table);
                            }
                        } else {
                            $record = $this->callHandler($handler, $record, $operation, $table);
                        }
                        $request->setBody($record);
                    }
                }
            }
        }
        return $this->next->handle($request);
    }
}
