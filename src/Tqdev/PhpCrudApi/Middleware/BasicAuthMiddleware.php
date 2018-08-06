<?php
namespace Tqdev\PhpCrudApi\Middleware;

use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\Request;
use Tqdev\PhpCrudApi\Response;

class BasicAuthMiddleware extends Middleware
{
    private function isAllowed(String $username, String $password, array &$passwords): bool
    {
        $hash = isset($passwords[$username]) ? $passwords[$username] : false;
        if ($hash && password_verify($password, $hash)) {
            if (password_needs_rehash($hash, PASSWORD_DEFAULT)) {
                $passwords[$username] = password_hash($password, PASSWORD_DEFAULT);
            }
            return true;
        }
        return false;
    }

    private function authenticate(String $username, String $password, String $passwordFile): bool
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['user']) && $_SESSION['user'] == $username) {
            return true;
        }
        $passwords = $this->readPasswords($passwordFile);
        $allowed = $this->isAllowed($username, $password, $passwords);
        if ($allowed) {
            $_SESSION['user'] = $username;
        }
        $this->writePasswords($passwordFile, $passwords);
        return $allowed;
    }

    private function readPasswords(String $passwordFile): array
    {
        $passwords = [];
        $passwordLines = file($passwordFile);
        foreach ($passwordLines as $passwordLine) {
            if (strpos($passwordLine, ':') !== false) {
                list($username, $hash) = explode(':', trim($passwordLine), 2);
                if (strlen($hash) > 0 && $hash[0] != '$') {
                    $hash = password_hash($hash, PASSWORD_DEFAULT);
                }
                $passwords[$username] = $hash;
            }
        }
        return $passwords;
    }

    private function writePasswords(String $passwordFile, array $passwords): bool
    {
        $success = false;
        $passwordFileContents = '';
        foreach ($passwords as $username => $hash) {
            $passwordFileContents .= "$username:$hash\n";
        }
        if (file_get_contents($passwordFile) != $passwordFileContents) {
            $success = file_put_contents($passwordFile, $passwordFileContents) !== false;
        }
        return $success;
    }

    public function handle(Request $request): Response
    {
        $username = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : '';
        $password = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : '';
        $passwordFile = $this->getProperty('passwordFile', '.htpasswd');
        if (!$username) {
            $response = $this->responder->error(ErrorCode::AUTHORIZATION_REQUIRED, $username);
            $realm = $this->getProperty('realm', 'Username and password required');
            $response->addHeader('WWW-Authenticate', "Basic realm=\"$realm\"");
        } elseif (!$this->authenticate($username, $password, $passwordFile)) {
            $response = $this->responder->error(ErrorCode::ACCESS_DENIED, $username);
        } else {
            $response = $this->next->handle($request);
        }
        return $response;
    }
}
