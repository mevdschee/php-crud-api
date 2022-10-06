<?php

namespace Tqdev\PhpCrudApi\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Column\Reflection\ReflectedTable;
use Tqdev\PhpCrudApi\Config\Config;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\RequestUtils;

class IpAddressMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, Config $config, string $middleware, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $config, $middleware);
        $this->reflection = $reflection;
    }

    private function callHandler(ServerRequestInterface $request, $record, string $operation, ReflectedTable $table) /*: object */
    {
        $context = (array) $record;
        $columnNames = $this->getProperty('columns', '');
        if ($columnNames) {
            foreach (explode(',', $columnNames) as $columnName) {
                if ($table->hasColumn($columnName)) {
                    if ($operation == 'create') {
                        $context[$columnName] = $this->getIpAddress($request);
                    } else {
                        unset($context[$columnName]);
                    }
                }
            }
        }
        return (object) $context;
    }

    private function getIpAddress(ServerRequestInterface $request): string
    {
        $reverseProxy = $this->getProperty('reverseProxy', '');
        if ($reverseProxy) {
            $ipAddress = array_pop($request->getHeader('X-Forwarded-For'));
        } else {
            $serverParams = $request->getServerParams();
            $ipAddress = $serverParams['REMOTE_ADDR'] ?? '127.0.0.1';
        }
        return $ipAddress;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $next): ResponseInterface
    {
        $operation = RequestUtils::getOperation($request);
        if (in_array($operation, ['create', 'update', 'increment'])) {
            $tableNames = $this->getProperty('tables', '');
            $tableName = RequestUtils::getPathSegment($request, 2);
            if (!$tableNames || in_array($tableName, explode(',', $tableNames))) {
                if ($this->reflection->hasTable($tableName)) {
                    $record = $request->getParsedBody();
                    if ($record !== null) {
                        $table = $this->reflection->getTable($tableName);
                        if (is_array($record)) {
                            foreach ($record as &$r) {
                                $r = $this->callHandler($request, $r, $operation, $table);
                            }
                        } else {
                            $record = $this->callHandler($request, $record, $operation, $table);
                        }
                        $request = $request->withParsedBody($record);
                    }
                }
            }
        }
        return $next->handle($request);
    }
}
