<?php

namespace Tqdev\PhpCrudApi\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Database\GenericDB;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\Record\Condition\ColumnCondition;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\Record\OrderingInfo;
use Tqdev\PhpCrudApi\RequestUtils;

class DbAuthMiddleware extends Middleware
{
    private $reflection;
    private $db;
    private $ordering;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection, GenericDB $db)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
        $this->db = $db;
        $this->ordering = new OrderingInfo();
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $next): ResponseInterface
    {
        if (session_status() == PHP_SESSION_NONE) {
            if (!headers_sent()) {
                $sessionName = $this->getProperty('sessionName', '');
                if ($sessionName) {
                    session_name($sessionName);
                }
                session_start();
            }
        }
        $path = RequestUtils::getPathSegment($request, 1);
        $method = $request->getMethod();
        if ($method == 'POST' && in_array($path, ['login', 'register', 'password'])) {
            $body = $request->getParsedBody();
            $username = isset($body->username) ? $body->username : '';
            $password = isset($body->password) ? $body->password : '';
            $newPassword = isset($body->newPassword) ? $body->newPassword : '';
            $tableName = $this->getProperty('usersTable', 'users');
            $table = $this->reflection->getTable($tableName);
            $usernameColumnName = $this->getProperty('usernameColumn', 'username');
            $usernameColumn = $table->getColumn($usernameColumnName);
            $passwordColumnName = $this->getProperty('passwordColumn', 'password');
            $passwordLength = $this->getProperty('passwordLength', '12');
            $pkName = $table->getPk()->getName();
            $registerUser = $this->getProperty('registerUser', '');
            $condition = new ColumnCondition($usernameColumn, 'eq', $username);
            $returnedColumns = $this->getProperty('returnedColumns', '');
            if (!$returnedColumns) {
                $columnNames = $table->getColumnNames();
            } else {
                $columnNames = array_map('trim', explode(',', $returnedColumns));
                $columnNames[] = $passwordColumnName;
                $columnNames = array_values(array_unique($columnNames));
            }
            $columnOrdering = $this->ordering->getDefaultColumnOrdering($table);
            if ($path == 'register') {
                if (!$registerUser) {
                    return $this->responder->error(ErrorCode::AUTHENTICATION_FAILED, $username);
                }
                if (strlen($password) < $passwordLength) {
                    return $this->responder->error(ErrorCode::PASSWORD_TOO_SHORT, $passwordLength);
                }
                $users = $this->db->selectAll($table, $columnNames, $condition, $columnOrdering, 0, 1);
                if (!empty($users)) {
                    return $this->responder->error(ErrorCode::USER_ALREADY_EXIST, $username);
                }
                $data = json_decode($registerUser, true);
                $data = is_array($data) ? $data : [];
                $data[$usernameColumnName] = $username;
                $data[$passwordColumnName] = password_hash($password, PASSWORD_DEFAULT);
                $this->db->createSingle($table, $data);
                $users = $this->db->selectAll($table, $columnNames, $condition, $columnOrdering, 0, 1);
                foreach ($users as $user) {
                    unset($user[$passwordColumnName]);
                    return $this->responder->success($user);
                }
                return $this->responder->error(ErrorCode::AUTHENTICATION_FAILED, $username);
            }
            if ($path == 'login') {
                $users = $this->db->selectAll($table, $columnNames, $condition, $columnOrdering, 0, 1);
                foreach ($users as $user) {
                    if (password_verify($password, $user[$passwordColumnName]) == 1) {
                        if (!headers_sent()) {
                            session_regenerate_id(true);
                        }
                        unset($user[$passwordColumnName]);
                        $_SESSION['user'] = $user;
                        return $this->responder->success($user);
                    }
                }
                return $this->responder->error(ErrorCode::AUTHENTICATION_FAILED, $username);
            }
            if ($path == 'password') {
                if ($username != ($_SESSION['user'][$usernameColumnName] ?? '')) {
                    return $this->responder->error(ErrorCode::AUTHENTICATION_FAILED, $username);
                }
                if (strlen($newPassword) < $passwordLength) {
                    return $this->responder->error(ErrorCode::PASSWORD_TOO_SHORT, $passwordLength);
                }
                $users = $this->db->selectAll($table, $columnNames, $condition, $columnOrdering, 0, 1);
                foreach ($users as $user) {
                    if (password_verify($password, $user[$passwordColumnName]) == 1) {
                        if (!headers_sent()) {
                            session_regenerate_id(true);
                        }
                        $data = [$passwordColumnName => password_hash($newPassword, PASSWORD_DEFAULT)];
                        $this->db->updateSingle($table, $data, $user[$pkName]);
                        unset($user[$passwordColumnName]);
                        return $this->responder->success($user);
                    }
                }
                return $this->responder->error(ErrorCode::AUTHENTICATION_FAILED, $username);
            }
        }
        if ($method == 'POST' && $path == 'logout') {
            if (isset($_SESSION['user'])) {
                $user = $_SESSION['user'];
                unset($_SESSION['user']);
                if (session_status() != PHP_SESSION_NONE) {
                    session_destroy();
                }
                return $this->responder->success($user);
            }
            return $this->responder->error(ErrorCode::AUTHENTICATION_REQUIRED, '');
        }
        if ($method == 'GET' && $path == 'me') {
            if (isset($_SESSION['user'])) {
                return $this->responder->success($_SESSION['user']);
            }
            return $this->responder->error(ErrorCode::AUTHENTICATION_REQUIRED, '');
        }
        if (!isset($_SESSION['user']) || !$_SESSION['user']) {
            $authenticationMode = $this->getProperty('mode', 'required');
            if ($authenticationMode == 'required') {
                return $this->responder->error(ErrorCode::AUTHENTICATION_REQUIRED, '');
            }
        }
        return $next->handle($request);
    }
}
