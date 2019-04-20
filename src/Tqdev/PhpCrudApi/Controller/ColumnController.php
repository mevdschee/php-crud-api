<?php
namespace Tqdev\PhpCrudApi\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Tqdev\PhpCrudApi\Column\DefinitionService;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\RequestUtils;

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

    public function getDatabase(ServerRequestInterface $request): ResponseInterface
    {
        $tables = [];
        foreach ($this->reflection->getTableNames() as $table) {
            $tables[] = $this->reflection->getTable($table);
        }
        $database = ['tables' => $tables];
        return $this->responder->success($database);
    }

    public function getTable(ServerRequestInterface $request): ResponseInterface
    {
        $tableName = RequestUtils::getPathSegment($request, 2);
        if (!$this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $tableName);
        }
        $table = $this->reflection->getTable($tableName);
        return $this->responder->success($table);
    }

    public function getColumn(ServerRequestInterface $request): ResponseInterface
    {
        $tableName = RequestUtils::getPathSegment($request, 2);
        $columnName = RequestUtils::getPathSegment($request, 3);
        if (!$this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $tableName);
        }
        $table = $this->reflection->getTable($tableName);
        if (!$table->hasColumn($columnName)) {
            return $this->responder->error(ErrorCode::COLUMN_NOT_FOUND, $columnName);
        }
        $column = $table->getColumn($columnName);
        return $this->responder->success($column);
    }

    public function updateTable(ServerRequestInterface $request): ResponseInterface
    {
        $tableName = RequestUtils::getPathSegment($request, 2);
        if (!$this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $tableName);
        }
        $success = $this->definition->updateTable($tableName, $request->getParsedBody());
        if ($success) {
            $this->reflection->refreshTables();
        }
        return $this->responder->success($success);
    }

    public function updateColumn(ServerRequestInterface $request): ResponseInterface
    {
        $tableName = RequestUtils::getPathSegment($request, 2);
        $columnName = RequestUtils::getPathSegment($request, 3);
        if (!$this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $tableName);
        }
        $table = $this->reflection->getTable($tableName);
        if (!$table->hasColumn($columnName)) {
            return $this->responder->error(ErrorCode::COLUMN_NOT_FOUND, $columnName);
        }
        $success = $this->definition->updateColumn($tableName, $columnName, $request->getParsedBody());
        if ($success) {
            $this->reflection->refreshTable($tableName);
        }
        return $this->responder->success($success);
    }

    public function addTable(ServerRequestInterface $request): ResponseInterface
    {
        $tableName = $request->getParsedBody()->name;
        if ($this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_ALREADY_EXISTS, $tableName);
        }
        $success = $this->definition->addTable($request->getParsedBody());
        if ($success) {
            $this->reflection->refreshTables();
        }
        return $this->responder->success($success);
    }

    public function addColumn(ServerRequestInterface $request): ResponseInterface
    {
        $tableName = RequestUtils::getPathSegment($request, 2);
        if (!$this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $tableName);
        }
        $columnName = $request->getParsedBody()->name;
        $table = $this->reflection->getTable($tableName);
        if ($table->hasColumn($columnName)) {
            return $this->responder->error(ErrorCode::COLUMN_ALREADY_EXISTS, $columnName);
        }
        $success = $this->definition->addColumn($tableName, $request->getParsedBody());
        if ($success) {
            $this->reflection->refreshTable($tableName);
        }
        return $this->responder->success($success);
    }

    public function removeTable(ServerRequestInterface $request): ResponseInterface
    {
        $tableName = RequestUtils::getPathSegment($request, 2);
        if (!$this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $tableName);
        }
        $success = $this->definition->removeTable($tableName);
        if ($success) {
            $this->reflection->refreshTables();
        }
        return $this->responder->success($success);
    }

    public function removeColumn(ServerRequestInterface $request): ResponseInterface
    {
        $tableName = RequestUtils::getPathSegment($request, 2);
        $columnName = RequestUtils::getPathSegment($request, 3);
        if (!$this->reflection->hasTable($tableName)) {
            return $this->responder->error(ErrorCode::TABLE_NOT_FOUND, $tableName);
        }
        $table = $this->reflection->getTable($tableName);
        if (!$table->hasColumn($columnName)) {
            return $this->responder->error(ErrorCode::COLUMN_NOT_FOUND, $columnName);
        }
        $success = $this->definition->removeColumn($tableName, $columnName);
        if ($success) {
            $this->reflection->refreshTable($tableName);
        }
        return $this->responder->success($success);
    }
}
