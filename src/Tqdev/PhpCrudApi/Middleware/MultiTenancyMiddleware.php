<?php
namespace Tqdev\PhpCrudApi\Middleware;

use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Middleware\Communication\VariableStore;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\Record\Condition\ColumnCondition;
use Tqdev\PhpCrudApi\Record\Condition\Condition;
use Tqdev\PhpCrudApi\Record\Condition\NoCondition;
use Tqdev\PhpCrudApi\Record\RequestUtils;
use Tqdev\PhpCrudApi\Request;
use Tqdev\PhpCrudApi\Response;

class MultiTenancyMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
        $this->utils = new RequestUtils($reflection);
    }

    private function getCondition(String $tableName, array $pairs): Condition
    {
        $condition = new NoCondition();
        $table = $this->reflection->getTable($tableName);
        foreach ($pairs as $k => $v) {
            $condition = $condition->_and(new ColumnCondition($table->getColumn($k), 'eq', $v));
        }
        return $condition;
    }

    private function getPairs($handler, String $operation, String $tableName): array
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

    private function handleRecord(Request $request, String $operation, array $pairs) /*: void*/
    {
        $record = $request->getBody();
        if ($record === null) {
            return;
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
        $request->setBody($multi ? $records : $records[0]);
    }

    public function handle(Request $request): Response
    {
        $handler = $this->getProperty('handler', '');
        if ($handler !== '') {
            $path = $request->getPathSegment(1);
            if ($path == 'records') {
                $operation = $this->utils->getOperation($request);
                $tableNames = $this->utils->getTableNames($request);
                foreach ($tableNames as $i => $tableName) {
                    if (!$this->reflection->hasTable($tableName)) {
                        continue;
                    }
                    $pairs = $this->getPairs($handler, $operation, $tableName);
                    if ($i == 0) {
                        if (in_array($operation, ['create', 'update', 'increment'])) {
                            $this->handleRecord($request, $operation, $pairs);
                        }
                    }
                    $condition = $this->getCondition($tableName, $pairs);
                    VariableStore::set("multiTenancy.conditions.$tableName", $condition);
                }
            }
        }
        return $this->next->handle($request);
    }
}
