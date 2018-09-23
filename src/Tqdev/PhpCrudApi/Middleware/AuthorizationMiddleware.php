<?php
namespace Tqdev\PhpCrudApi\Middleware;

use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\Request;
use Tqdev\PhpCrudApi\Response;

class AuthorizationMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
    }

    private function handleColumns(String $method, String $path, String $databaseName, String $tableName): void
    {
        $columnHandler = $this->getProperty('columnHandler', '');
        if ($columnHandler) {
            $table = $this->reflection->getTable($tableName);
            foreach ($table->columnNames() as $columnName) {
                $allowed = call_user_func($columnHandler, $method, $path, $databaseName, $tableName, $columnName);
                if (!$allowed) {
                    $this->reflection->removeColumn($tableName, $columnName);
                }
            }
        }
    }

    private function handleTable(String $method, String $path, String $databaseName, String $tableName): void
    {
        if (!$this->reflection->hasTable($tableName)) {
            return;
        }
        $tableHandler = $this->getProperty('tableHandler', '');
        if ($tableHandler) {
            $allowed = call_user_func($tableHandler, $method, $path, $databaseName, $tableName);
            if (!$allowed) {
                $this->reflection->removeTable($tableName);
            } else {
                $this->handleColumns($method, $path, $databaseName, $tableName);
            }
        }
    }

    private function handleJoinTables(String $method, String $path, String $databaseName, array $joinParameters): void
    {
        $uniqueTableNames = array();
        foreach ($joinParameters as $joinParameter) {
            $tableNames = explode(',', trim($joinParameter));
            foreach ($tableNames as $tableName) {
                $uniqueTableNames[$tableName] = true;
            }
        }
        foreach (array_keys($uniqueTableNames) as $tableName) {
            $this->handleTable($method, $path, $databaseName, trim($tableName));
        }
    }

    private function handleAllTables(String $method, String $path, String $databaseName): void
    {
        $tableNames = $this->reflection->getTableNames();
        foreach ($tableNames as $tableName) {
            $this->handleTable($method, $path, $databaseName, $tableName);
        }
    }

    public function handle(Request $request): Response
    {
        $method = $request->getMethod();
        $path = $request->getPathSegment(1);
        $databaseName = $this->reflection->getDatabaseName();
        if ($path == 'records') {
            $tableName = $request->getPathSegment(2);
            $this->handleTable($method, $path, $databaseName, $tableName);
            $params = $request->getParams();
            if (isset($params['join'])) {
                $this->handleJoinTables($method, $path, $databaseName, $params['join']);
            }
        } elseif ($path == 'columns') {
            $tableName = $request->getPathSegment(2);
            if ($tableName) {
                $this->handleTable($method, $path, $databaseName, $tableName);
            } else {
                $this->handleAllTables($method, $path, $databaseName);
            }
        } elseif ($path == 'openapi') {
            $this->handleAllTables($method, $path, $databaseName);
        }
        return $this->next->handle($request);
    }
}
