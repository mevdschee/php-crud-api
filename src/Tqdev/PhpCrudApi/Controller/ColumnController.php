<?php
namespace Tqdev\PhpCrudApi\Controller;

use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\Column\DefinitionService;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Request;
use Tqdev\PhpCrudApi\Response;
use Tqdev\PhpCrudApi\Middleware\Router\Router;

class ColumnController
{
    private $responder;
    private $reflection;
    private $definition;

    public function __construct(Router $router, Responder $responder, ReflectionService $reflection, DefinitionService $definition)
    {
        $router->register('GET', '/columns', array($this, 'getDatabase'));
        $router->register('GET', '/columns/*', array($this, 'getTable'));
        $router->register('GET', '/columns/*/*', array($this, 'getColumn'));
        $router->register('PUT', '/columns/*', array($this, 'updateTable'));
        $router->register('PUT', '/columns/*/*', array($this, 'updateColumn'));
        $router->register('POST', '/columns', array($this, 'addTable'));
        $router->register('POST', '/columns/*', array($this, 'addColumn'));
        $router->register('DELETE', '/columns/*', array($this, 'removeTable'));
        $router->register('DELETE', '/columns/*/*', array($this, 'removeColumn'));
        $this->responder = $responder;
        $this->reflection = $reflection;
        $this->definition = $definition;
    }

    public function getDatabase(Request $request): Response
    {
        $database = $this->reflection->getDatabase();
        return $this->responder->success($database);
    }

    public function getTable(Request $request): Response
    {
        $tableName = $request->getPathSegment(2);
        if (!$this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $tableName);
        }
        $table = $this->reflection->getTable($tableName);
        return $this->responder->success($table);
    }

    public function getColumn(Request $request): Response
    {
        $tableName = $request->getPathSegment(2);
        $columnName = $request->getPathSegment(3);
        if (!$this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $tableName);
        }
        $table = $this->reflection->getTable($tableName);
        if (!$table->exists($columnName)) {
            return $this->responder->error(ErrorCode::COLUMN_NOT_FOUND, $columnName);
        }
        $column = $table->get($columnName);
        return $this->responder->success($column);
    }

    public function updateTable(Request $request): Response
    {
        $tableName = $request->getPathSegment(2);
        if (!$this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $tableName);
        }
        $success = $this->definition->updateTable($tableName, $request->getBody());
        if ($success) {
            $this->reflection->refresh();
        }
        return $this->responder->success($success);
    }

    public function updateColumn(Request $request): Response
    {
        $tableName = $request->getPathSegment(2);
        $columnName = $request->getPathSegment(3);
        if (!$this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $tableName);
        }
        $table = $this->reflection->getTable($tableName);
        if (!$table->exists($columnName)) {
            return $this->responder->error(ErrorCode::COLUMN_NOT_FOUND, $columnName);
        }
        $success = $this->definition->updateColumn($tableName, $columnName, $request->getBody());
        if ($success) {
            $this->reflection->refresh();
        }
        return $this->responder->success($success);
    }

    public function addTable(Request $request): Response
    {
        $tableName = $request->getBody()->name;
        if ($this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_ALREADY_EXISTS, $tableName);
        }
        $success = $this->definition->addTable($request->getBody());
        if ($success) {
            $this->reflection->refresh();
        }
        return $this->responder->success($success);
    }

    public function addColumn(Request $request): Response
    {
        $tableName = $request->getPathSegment(2);
        if (!$this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $tableName);
        }
        $columnName = $request->getBody()->name;
        $table = $this->reflection->getTable($tableName);
        if ($table->exists($columnName)) {
            return $this->responder->error(ErrorCode::COLUMN_ALREADY_EXISTS, $columnName);
        }
        $success = $this->definition->addColumn($tableName, $request->getBody());
        if ($success) {
            $this->reflection->refresh();
        }
        return $this->responder->success($success);
    }

    public function removeTable(Request $request): Response
    {
        $tableName = $request->getPathSegment(2);
        if (!$this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $tableName);
        }
        $success = $this->definition->removeTable($tableName);
        if ($success) {
            $this->reflection->refresh();
        }
        return $this->responder->success($success);
    }

    public function removeColumn(Request $request): Response
    {
        $tableName = $request->getPathSegment(2);
        $columnName = $request->getPathSegment(3);
        if (!$this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $tableName);
        }
        $table = $this->reflection->getTable($tableName);
        if (!$table->exists($columnName)) {
            return $this->responder->error(ErrorCode::COLUMN_NOT_FOUND, $columnName);
        }
        $success = $this->definition->removeColumn($tableName, $columnName);
        if ($success) {
            $this->reflection->refresh();
        }
        return $this->responder->success($success);
    }
}
