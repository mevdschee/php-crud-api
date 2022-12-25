<?php

namespace Tqdev\PhpCrudApi\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Config\Config;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Database\GenericDB;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\Record\Condition\ColumnCondition;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\Record\OrderingInfo;
use Tqdev\PhpCrudApi\RequestUtils;

class ApiKeyDbAuthMiddleware extends Middleware
{
    private $reflection;
    private $db;
    private $ordering;

    public function __construct(Router $router, Responder $responder, Config $config, string $middleware, ReflectionService $reflection, GenericDB $db)
    {
        parent::__construct($router, $responder, $config, $middleware);
        $this->reflection = $reflection;
        $this->db = $db;
        $this->ordering = new OrderingInfo();
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $next): ResponseInterface
    {
        $user = false;
        $headerName = $this->getProperty('header', 'X-API-Key');
        $apiKey = RequestUtils::getHeader($request, $headerName);
        if ($apiKey) {
            $tableName = $this->getProperty('usersTable', 'users');
            $table = $this->reflection->getTable($tableName);
            $apiKeyColumnName = $this->getProperty('apiKeyColumn', 'api_key');
            $apiKeyColumn = $table->getColumn($apiKeyColumnName);
            $condition = new ColumnCondition($apiKeyColumn, 'eq', $apiKey);
            $columnNames = $table->getColumnNames();
            $columnOrdering = $this->ordering->getDefaultColumnOrdering($table);
            $users = $this->db->selectAll($table, $columnNames, $condition, $columnOrdering, 0, 1);
            if (count($users) < 1) {
                return $this->responder->error(ErrorCode::AUTHENTICATION_FAILED, $apiKey);
            }
            $user = $users[0];
        } else {
            $authenticationMode = $this->getProperty('mode', 'required');
            if ($authenticationMode == 'required') {
                return $this->responder->error(ErrorCode::AUTHENTICATION_REQUIRED, '');
            }
        }
        $_SESSION['apiUser'] = $user;
        return $next->handle($request);
    }
}
