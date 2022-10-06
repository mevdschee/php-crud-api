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

class ReconnectMiddleware extends Middleware
{
    private $config;
    private $db;

    public function __construct(Router $router, Responder $responder, Config $config, string $middleware, ReflectionService $reflection, GenericDB $db)
    {
        parent::__construct($router, $responder, $config, $middleware);
        $this->config = $config;
        $this->db = $db;
    }

    private function getDriver(): string
    {
        $driverHandler = $this->getProperty('driverHandler', '');
        if ($driverHandler) {
            return call_user_func($driverHandler);
        }
        return $this->config->getDriver();
    }

    private function getAddress(): string
    {
        $addressHandler = $this->getProperty('addressHandler', '');
        if ($addressHandler) {
            return call_user_func($addressHandler);
        }
        return $this->config->getAddress();
    }

    private function getPort(): int
    {
        $portHandler = $this->getProperty('portHandler', '');
        if ($portHandler) {
            return call_user_func($portHandler);
        }
        return $this->config->getPort();
    }

    private function getDatabase(): string
    {
        $databaseHandler = $this->getProperty('databaseHandler', '');
        if ($databaseHandler) {
            return call_user_func($databaseHandler);
        }
        return $this->config->getDatabase();
    }

    private function getCommand(): string
    {
        $commandHandler = $this->getProperty('commandHandler', '');
        if ($commandHandler) {
            return call_user_func($commandHandler);
        }
        return $this->config->getCommand();
    }

    private function getTables(): array
    {
        $tablesHandler = $this->getProperty('tablesHandler', '');
        if ($tablesHandler) {
            return call_user_func($tablesHandler);
        }
        return $this->config->getTables();
    }

    private function getMapping(): array
    {
        $mappingHandler = $this->getProperty('mappingHandler', '');
        if ($mappingHandler) {
            return call_user_func($mappingHandler);
        }
        return $this->config->getMapping();
    }

    private function getUsername(): string
    {
        $usernameHandler = $this->getProperty('usernameHandler', '');
        if ($usernameHandler) {
            return call_user_func($usernameHandler);
        }
        return $this->config->getUsername();
    }

    private function getPassword(): string
    {
        $passwordHandler = $this->getProperty('passwordHandler', '');
        if ($passwordHandler) {
            return call_user_func($passwordHandler);
        }
        return $this->config->getPassword();
    }

    private function getGeometrySrid(): int
    {
        $geometrySridHandler = $this->getProperty('geometrySridHandler', '');
        if ($geometrySridHandler) {
            return call_user_func($geometrySridHandler);
        }
        return $this->config->getGeometrySrid();
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $next): ResponseInterface
    {
        $driver = $this->getDriver();
        $address = $this->getAddress();
        $port = $this->getPort();
        $database = $this->getDatabase();
        $command = $this->getCommand();
        $tables = $this->getTables();
        $mapping = $this->getMapping();
        $username = $this->getUsername();
        $password = $this->getPassword();
        $geometrySrid = $this->getGeometrySrid();
        $this->db->reconstruct($driver, $address, $port, $database, $command, $tables, $mapping, $username, $password, $geometrySrid);
        return $next->handle($request);
    }
}
