<?php

namespace Tqdev\PhpCrudApi\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tqdev\PhpCrudApi\Config\Config;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\RequestUtils;

/**
 * add stubs for WordPress functions to prevent fatal errors when not running in a WordPress environment
 * these stubs will be overridden by the actual WordPress functions when running in a WordPress environment
 */
if (!function_exists('wp_signon')) {
    function wp_signon($credentials)
    {
        return (object) ['ID' => 0];
    }
}
if (!function_exists('is_user_logged_in')) {
    function is_user_logged_in()
    {
        return false;
    }
}
if (!function_exists('wp_logout')) {
    function wp_logout() {}
}
if (!function_exists('wp_get_current_user')) {
    function wp_get_current_user()
    {
        return (object) ['data' => (object) ['user_pass' => '']];
    }
}

class WpAuthMiddleware extends Middleware
{
    public function __construct(Router $router, Responder $responder, Config $config, string $middleware)
    {
        parent::__construct($router, $responder, $config, $middleware);
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $next): ResponseInterface
    {
        define('WP_USE_THEMES', false); // Don't load theme support functionality
        $wpDirectory = $this->getProperty('wpDirectory', '.');
        require_once("$wpDirectory/wp-load.php");
        $path = RequestUtils::getPathSegment($request, 1);
        $method = $request->getMethod();
        if ($method == 'POST' && $path == 'login') {
            $body = $request->getParsedBody();
            $usernameFormFieldName = $this->getProperty('usernameFormField', 'username');
            $passwordFormFieldName = $this->getProperty('passwordFormField', 'password');
            $username = isset($body->$usernameFormFieldName) ? $body->$usernameFormFieldName : '';
            $password = isset($body->$passwordFormFieldName) ? $body->$passwordFormFieldName : '';
            $user = wp_signon([
                'user_login'    => $username,
                'user_password' => $password,
                'remember'      => false,
            ]);
            if ($user->ID) {
                unset($user->data->user_pass);
                return $this->responder->success($user);
            }
            return $this->responder->error(ErrorCode::AUTHENTICATION_FAILED, $username);
        }
        if ($method == 'POST' && $path == 'logout') {
            if (is_user_logged_in()) {
                wp_logout();
                $user = wp_get_current_user();
                unset($user->data->user_pass);
                return $this->responder->success($user);
            }
            return $this->responder->error(ErrorCode::AUTHENTICATION_REQUIRED, '');
        }
        if ($method == 'GET' && $path == 'me') {
            if (is_user_logged_in()) {
                $user = wp_get_current_user();
                unset($user->data->user_pass);
                return $this->responder->success($user);
            }
            return $this->responder->error(ErrorCode::AUTHENTICATION_REQUIRED, '');
        }
        if (!is_user_logged_in()) {
            $authenticationMode = $this->getProperty('mode', 'required');
            if ($authenticationMode == 'required') {
                return $this->responder->error(ErrorCode::AUTHENTICATION_REQUIRED, '');
            }
        }
        return $next->handle($request);
    }
}
