<?php

namespace Tqdev\PhpCrudApi\Middleware;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
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

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

class DbAuthMiddleware extends Middleware
{
    private $reflection;
    private $db;
    private $ordering;
    
    private function sendConfirmationEmail($to, $token, $smtpSettings) 
    {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = $smtpSettings['host'];
            $mail->SMTPAuth = true;
            $mail->Username = $smtpSettings['username'];
            $mail->Password = $smtpSettings['password'];
            $mail->SMTPSecure = $smtpSettings['secure'];
            $mail->Port = $smtpSettings['port'];
            //Recipients
            $mail->setFrom($smtpSettings['from'], 'Mailer');
            $mail->addAddress($to);
            //Content
            $mail->isHTML(true);
            $mail->Subject = $smtpSettings['confirmSubject'];
            $base_url="https://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/';
            $mail->Body = $smtpSettings['confirmTemplate'] . '<br><a href="' . $base_url . 'confirm/' . $token. '">Confirm</a>';
            $mail->send();
            return true;
        } catch (Exception $e) {
            //echo 'Message could not be sent.';
            //echo 'Mailer Error: ' . $mail->ErrorInfo;
            return false;
        }
    }

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
        $confirmEmail = $this->getProperty('confirmEmail', '');
        if ($method == 'POST' && in_array($path, ['login', 'register', 'password'])) {
            $body = $request->getParsedBody();
            $usernameFormFieldName = $this->getProperty('usernameFormField', 'username');
            $passwordFormFieldName = $this->getProperty('passwordFormField', 'password');
            $newPasswordFormFieldName = $this->getProperty('newPasswordFormField', 'newPassword');
            $emailFormFieldName = $this->getProperty('emailFormField', 'email');
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
            $emailColumnName = $this->getProperty('emailColumn', 'email');
            $tokenColumnName = $this->getProperty('tokenColumn', 'token');
            $confirmedColumnName = $this->getProperty('confirmedColumn', 'confirmed');
            $emailSettings = $this->getProperty('emailSettings', '');
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
                $email = isset($body->$emailFormFieldName) ? $body->$emailFormFieldName : '';
                $data = json_decode($registerUser, true);
                $data = is_array($data) ? $data : [];
                $data[$usernameColumnName] = $username;
                $data[$passwordColumnName] = password_hash($password, PASSWORD_DEFAULT);
                $data[$emailColumnName] = $email;
                if ($confirmEmail) {
                    $data[$confirmedColumnName] = 0;
                    $data[$emailColumnName] = $email;
                    $data[$tokenColumnName] = bin2hex(random_bytes(40));
                    $emailSent = $this->sendConfirmationEmail($data[$emailColumnName], $data[$tokenColumnName], $emailSettings);
                }
                $this->db->createSingle($table, $data);
                $users = $this->db->selectAll($table, $columnNames, $condition, $columnOrdering, 0, 1);
                foreach ($users as $user) {
                    if ($confirmEmail) {
                        unset($user[$tokenColumnName]);
                        unset($user[$passwordColumnName]);
                        return $this->responder->success($user);
                    }
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
                        if ($confirmEmail && !$user[$confirmedColumnName]) {
                             return $this->responder->error(ErrorCode::EMAIL_NOT_CONFIRMED, $username);
                        }
                        if (!headers_sent()) {
                            session_regenerate_id(true);
                        }
                        unset($user[$passwordColumnName]);
                        if ($confirmEmail) {
                                unset($user[$tokenColumnName]);
                        }
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
                        if ($confirmEmail && !$user[$confirmedColumnName]) {
                            return $this->responder->error(ErrorCode::EMAIL_NOT_CONFIRMED, $username);
                        }
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
        if ($method == 'GET' && $path == 'confirm' && $confirmEmail) {
            $tableName = $this->getProperty('usersTable', 'users');
            $table = $this->reflection->getTable($tableName);
            $pkName = $table->getPk()->getName();
            $tokenColumnName = $this->getProperty('tokenColumn', 'token');
            $confirmedColumnName = $this->getProperty('confirmedColumn', 'confirmed');
            $passwordColumnName = $this->getProperty('passwordColumn', 'password');
            $userColumns = $table->getColumnNames();
            if (!in_array($pkName, $userColumns)) {
                array_push($userColumns, $pkName);
            }                
            $tokenColumn = $table->getColumn($tokenColumnName);
            $confirmationToken = RequestUtils::getPathSegment($request, 2);
            $tokenCondition = new ColumnCondition($tokenColumn, 'eq', $confirmationToken);
            $columnOrdering = $this->ordering->getDefaultColumnOrdering($table);
            $users = $this->db->selectAll($table, $userColumns, $tokenCondition, $columnOrdering, 0, 1);
            foreach ($users as $user) {
                $data = [$confirmedColumnName => 1];
                $this->db->updateSingle($table, $data, $user[$pkName]);
                unset($user[$tokenColumnName]);
                unset($user[$passwordColumnName]);
                $user[$confirmedColumnName] = 1;
                return $this->responder->success($user);
            }
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
