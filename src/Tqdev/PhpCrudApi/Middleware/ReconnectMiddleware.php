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

class ReconnectMiddleware extends Middleware
{
    private $reflection;
    private $db;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection, GenericDB $db)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
        $this->db = $db;
    }

    private function getDriver(): string
    {
        $driverHandler = $this->getProperty('driverHandler', '');
        if ($driverHandler) {
            return call_user_func($driverHandler);
        }
        return '';
    }

    private function getAddress(): string
    {
        $addressHandler = $this->getProperty('addressHandler', '');
        if ($addressHandler) {
            return call_user_func($addressHandler);
        }
        return '';
    }

    private function getPort(): int
    {
        $portHandler = $this->getProperty('portHandler', '');
        if ($portHandler) {
            return call_user_func($portHandler);
        }
        return 0;
    }

    private function getDatabase(): string
    {
        $databaseHandler = $this->getProperty('databaseHandler', '');
        if ($databaseHandler) {
            return call_user_func($databaseHandler);
        }
        return '';
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
        $driver = $this->getDriver();
        $address = $this->getAddress();
        $port = $this->getPort();
        $database = $this->getDatabase();
        $username = $this->getUsername();
        $password = $this->getPassword();
        if ($driver || $address || $port || $database || $username || $password) {
            $this->db->reconstruct($driver, $address, $port, $database, $username, $password);
        }
        return $next->handle($request);
    }
}
