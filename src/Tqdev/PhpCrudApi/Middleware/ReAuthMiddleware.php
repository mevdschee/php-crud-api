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

class ReAuthMiddleware extends Middleware
{
    private $reflection;
    private $db;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection, GenericDB $db)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
        $this->db = $db;
    }

    private function getUsername(): string
    {
        $usernameHandler = $this->getProperty('usernameHandler', '');
        if ($usernameHandler) {
            return call_user_func($usernameHandler);
        }
        return '';
    }

    private function getPassword(): string
    {
        $passwordHandler = $this->getProperty('passwordHandler', '');
        if ($passwordHandler) {
            return call_user_func($passwordHandler);
        }
        return '';
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $next): ResponseInterface
    {
        $username = $this->getUsername();
        $password = $this->getPassword();
        if ($username && $password) {
            $this->db->pdo()->reauthenticate($username, $password);
        }
        return $next->handle($request);
    }
}
