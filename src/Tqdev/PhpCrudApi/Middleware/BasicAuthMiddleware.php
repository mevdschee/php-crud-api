<?php
namespace Tqdev\PhpCrudApi\Middleware;

use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\Request;
use Tqdev\PhpCrudApi\Response;

class BasicAuthMiddleware extends Middleware
{
    private function hasCorrectPassword(String $username, String $password, array &$passwords): bool
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

    private function getValidUsername(String $username, String $password, String $passwordFile): String
    {
        $passwords = $this->readPasswords($passwordFile);
        $valid = $this->hasCorrectPassword($username, $password, $passwords);
        $this->writePasswords($passwordFile, $passwords);
        return $valid ? $username : '';
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

    private function getAuthorizationCredentials(Request $request): String
    {
        if (isset($_SERVER['PHP_AUTH_USER'])) {
            return $_SERVER['PHP_AUTH_USER'] . ':' . $_SERVER['PHP_AUTH_PW'];
        }
        $parts = explode(' ', trim($request->getHeader('Authorization')), 2);
        if (count($parts) != 2) {
            return '';
        }
        if ($parts[0] != 'Basic') {
            return '';
        }
        return base64_decode(strtr($parts[1], '-_', '+/'));
    }

    public function handle(Request $request): Response
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $credentials = $this->getAuthorizationCredentials($request);
        if ($credentials) {
            list($username, $password) = array('', '');
            if (strpos($credentials, ':') !== false) {
                list($username, $password) = explode(':', $credentials, 2);
            }
            $passwordFile = $this->getProperty('passwordFile', '.htpasswd');
            $validUser = $this->getValidUsername($username, $password, $passwordFile);
            $_SESSION['username'] = $validUser;
            if (!$validUser) {
                return $this->responder->error(ErrorCode::AUTHENTICATION_FAILED, $username);
            }
            session_regenerate_id();
        }
        if (!isset($_SESSION['username']) || !$_SESSION['username']) {
            $authenticationMode = $this->getProperty('mode', 'required');
            if ($authenticationMode == 'required') {
                $response = $this->responder->error(ErrorCode::AUTHENTICATION_REQUIRED, '');
                $realm = $this->getProperty('realm', 'Username and password required');
                $response->addHeader('WWW-Authenticate', "Basic realm=\"$realm\"");
                return $response;
            }
        }
        return $this->next->handle($request);
    }
}
