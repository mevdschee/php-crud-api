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
use Tqdev\PhpCrudApi\Record\FilterInfo;
use Tqdev\PhpCrudApi\RequestUtils;

class AuthorizationMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
    }

    private function handleColumns(string $operation, string $tableName) /*: void*/
    {
        $columnHandler = $this->getProperty('columnHandler', '');
        if ($columnHandler) {
            $table = $this->reflection->getTable($tableName);
            foreach ($table->getColumnNames() as $columnName) {
                $allowed = call_user_func($columnHandler, $operation, $tableName, $columnName);
                if (!$allowed) {
                    $table->removeColumn($columnName);
                }
            }
        }
    }

    private function handleTable(string $operation, string $tableName) /*: void*/
    {
        if (!$this->reflection->hasTable($tableName)) {
            return;
        }
        $allowed = true;
        $tableHandler = $this->getProperty('tableHandler', '');
        if ($tableHandler) {
            $allowed = call_user_func($tableHandler, $operation, $tableName);
        }
        if (!$allowed) {
            $this->reflection->removeTable($tableName);
        } else {
            $this->handleColumns($operation, $tableName);
        }
    }

    private function handleRecords(string $operation, string $tableName) /*: void*/
    {
        if (!$this->reflection->hasTable($tableName)) {
            return;
        }
        $recordHandler = $this->getProperty('recordHandler', '');
        if ($recordHandler) {
            $query = call_user_func($recordHandler, $operation, $tableName);
            $filters = new FilterInfo();
            $table = $this->reflection->getTable($tableName);
            $query = str_replace('][]=', ']=', str_replace('=', '[]=', $query));
            parse_str($query, $params);
            $condition = $filters->getCombinedConditions($table, $params);
            VariableStore::set("authorization.conditions.$tableName", $condition);
        }
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $next): ResponseInterface
    {
        $path = RequestUtils::getPathSegment($request, 1);
        $operation = RequestUtils::getOperation($request);
        $tableNames = RequestUtils::getTableNames($request, $this->reflection);
        foreach ($tableNames as $tableName) {
            $this->handleTable($operation, $tableName);
            if ($path == 'records') {
                $this->handleRecords($operation, $tableName);
            }
        }
        if ($path == 'openapi') {
            VariableStore::set('authorization.tableHandler', $this->getProperty('tableHandler', ''));
            VariableStore::set('authorization.columnHandler', $this->getProperty('columnHandler', ''));
        }
        return $next->handle($request);
    }
}
