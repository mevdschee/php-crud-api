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

class DbAuthMiddleware extends Middleware
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
        if (session_status() == PHP_SESSION_NONE) {
            if (!headers_sent()) {
                $sessionName = $this->getProperty('sessionName', '');
                if ($sessionName) {
                    session_name($sessionName);
                }
                if (!ini_get('session.cookie_samesite')) {
                    ini_set('session.cookie_samesite', 'Lax');
                }
                if (!ini_get('session.cookie_httponly')) {
                    ini_set('session.cookie_httponly', 1);
                }
                if (!ini_get('session.cookie_secure') && isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
                    ini_set('session.cookie_secure', 1);
                }
                session_start();
            }
        }
        $path = RequestUtils::getPathSegment($request, 1);
        $method = $request->getMethod();
        if ($method == 'POST' && in_array($path, ['login', 'register', 'password'])) {
            $body = $request->getParsedBody();
            $usernameFormFieldName = $this->getProperty('usernameFormField', 'username');
            $passwordFormFieldName = $this->getProperty('passwordFormField', 'password');
            $newPasswordFormFieldName = $this->getProperty('newPasswordFormField', 'newPassword');
            $username = isset($body->$usernameFormFieldName) ? $body->$usernameFormFieldName : '';
            $password = isset($body->$passwordFormFieldName) ? $body->$passwordFormFieldName : '';
            $newPassword = isset($body->$newPasswordFormFieldName) ? $body->$newPasswordFormFieldName : '';
            //add separate property for login as this could be a view joining users table to other table 
            //such as roles, details etc. At a minimum, the view output should include the $usernameColumn and $passwordColumn
            if ($path === 'login') {
                $tableName = $this->getProperty('loginTable', $this->getProperty('usersTable', 'users'));
            } else {
                $tableName = $this->getProperty('usersTable', 'users');
            }
            $table = $this->reflection->getTable($tableName);
            $usernameColumnName = $this->getProperty('usernameColumn', 'username');
            $usernameColumn = $table->getColumn($usernameColumnName);
            $passwordColumnName = $this->getProperty('passwordColumn', 'password');
            $passwordLength = $this->getProperty('passwordLength', '12');
            $pkName = $table->getPk()->getName();
            $registerUser = $this->getProperty('registerUser', '');
            $loginAfterRegistration = $this->getProperty('loginAfterRegistration', '');
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
                if (strlen(trim($username)) == 0) {
                    return $this->responder->error(ErrorCode::USERNAME_EMPTY, $username);
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
                    if ($loginAfterRegistration) {
                        if (!headers_sent()) {
                            session_regenerate_id(true);
                        }
                        unset($user[$passwordColumnName]);
                        $_SESSION['user'] = $user;
                        return $this->responder->success($user);
                    } else {
                        unset($user[$passwordColumnName]);
                        return $this->responder->success($user);
                    }
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
                $userColumns = $columnNames;
                if (!in_array($pkName, $columnNames)) {
                    array_push($userColumns, $pkName);
                }
                $users = $this->db->selectAll($table, $userColumns, $condition, $columnOrdering, 0, 1);
                foreach ($users as $user) {
                    if (password_verify($password, $user[$passwordColumnName]) == 1) {
                        if (!headers_sent()) {
                            session_regenerate_id(true);
                        }
                        $data = [$passwordColumnName => password_hash($newPassword, PASSWORD_DEFAULT)];
                        $this->db->updateSingle($table, $data, $user[$pkName]);
                        unset($user[$passwordColumnName]);
                        if (!in_array($pkName, $columnNames)) {
                            unset($user[$pkName]);
                        }
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
