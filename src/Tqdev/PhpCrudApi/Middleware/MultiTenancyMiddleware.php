<?php
namespace Tqdev\PhpCrudApi\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Middleware\Communication\VariableStore;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\Record\Condition\ColumnCondition;
use Tqdev\PhpCrudApi\Record\Condition\Condition;
use Tqdev\PhpCrudApi\Record\Condition\NoCondition;
use Tqdev\PhpCrudApi\RequestUtils;

class MultiTenancyMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
    }

    private function getCondition(string $tableName, array $pairs): Condition
    {
        $condition = new NoCondition();
        $table = $this->reflection->getTable($tableName);
        foreach ($pairs as $k => $v) {
            $condition = $condition->_and(new ColumnCondition($table->getColumn($k), 'eq', $v));
        }
        return $condition;
    }

    private function getPairs($handler, string $operation, string $tableName): array
    {
        $result = array();
        $pairs = call_user_func($handler, $operation, $tableName);
        $table = $this->reflection->getTable($tableName);
        foreach ($pairs as $k => $v) {
            if ($table->hasColumn($k)) {
                $result[$k] = $v;
            }
        }
        return $result;
    }

    private function handleRecord(ServerRequestInterface $request, string $operation, array $pairs): ServerRequestInterface
    {
        $record = $request->getParsedBody();
        if ($record === null) {
            return $request;
        }
        $multi = is_array($record);
        $records = $multi ? $record : [$record];
        foreach ($records as &$record) {
            foreach ($pairs as $column => $value) {
                if ($operation == 'create') {
                    $record->$column = $value;
                } else {
                    if (isset($record->$column)) {
                        unset($record->$column);
                    }
                }
            }
        }
        return $request->withParsedBody($multi ? $records : $records[0]);
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $next): ResponseInterface
    {
        $handler = $this->getProperty('handler', '');
        if ($handler !== '') {
            $path = RequestUtils::getPathSegment($request, 1);
            if ($path == 'records') {
                $operation = RequestUtils::getOperation($request);
                $tableNames = RequestUtils::getTableNames($request, $this->reflection);
                foreach ($tableNames as $i => $tableName) {
                    if (!$this->reflection->hasTable($tableName)) {
                        continue;
                    }
                    $pairs = $this->getPairs($handler, $operation, $tableName);
                    if ($i == 0) {
                        if (in_array($operation, ['create', 'update', 'increment'])) {
                            $request = $this->handleRecord($request, $operation, $pairs);
                        }
                    }
                    $condition = $this->getCondition($tableName, $pairs);
                    VariableStore::set("multiTenancy.conditions.$tableName", $condition);
                }
            }
        }
        return $next->handle($request);
    }
}
