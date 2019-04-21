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

class IpAddressMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
    }

    private function callHandler($record, string $operation, ReflectedTable $table) /*: object */
    {
        $context = (array) $record;
        $columnNames = $this->getProperty('columns', '');
        if ($columnNames) {
            foreach (explode(',', $columnNames) as $columnName) {
                if ($table->hasColumn($columnName)) {
                    if ($operation == 'create') {
                        $context[$columnName] = $_SERVER['REMOTE_ADDR'];
                    } else {
                        unset($context[$columnName]);
                    }
                }
            }
        }
        return (object) $context;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $next): ResponseInterface
    {
        $operation = RequestUtils::getOperation($request);
        if (in_array($operation, ['create', 'update', 'increment'])) {
            $tableNames = $this->getProperty('tables', '');
            $tableName = RequestUtils::getPathSegment($request, 2);
            if (!$tableNames || in_array($tableName, explode(',', $tableNames))) {
                if ($this->reflection->hasTable($tableName)) {
                    $record = $request->getParsedBody();
                    if ($record !== null) {
                        $table = $this->reflection->getTable($tableName);
                        if (is_array($record)) {
                            foreach ($record as &$r) {
                                $r = $this->callHandler($r, $operation, $table);
                            }
                        } else {
                            $record = $this->callHandler($record, $operation, $table);
                        }
                        $request = $request->withParsedBody($record);
                    }
                }
            }
        }
        return $next->handle($request);
    }
}
