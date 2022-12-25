<?php

namespace Tqdev\PhpCrudApi\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Config\Config;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\RequestUtils;

class TextSearchMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, Config $config, string $middleware, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $config, $middleware);
        $this->reflection = $reflection;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $next): ResponseInterface
    {
        $operation = RequestUtils::getOperation($request);
        if ($operation == 'list') {
            $tableName = RequestUtils::getPathSegment($request, 2);
            $params = RequestUtils::getParams($request);
            $parameterName = $this->getProperty('parameter', 'search');
            if (isset($params[$parameterName])) {
                $search = $params[$parameterName][0];
                unset($params[$parameterName]);
                $table = $this->reflection->getTable($tableName);
                $i = 0;
                foreach ($table->getColumnNames() as $columnName) {
                    $column = $table->getColumn($columnName);
                    while (isset($params["filter$i"])) {
                        $i++;
                    }
                    if ($i >= 10) {
                        break;
                    }
                    if ($column->isText()) {
                        $params["filter$i"] = "$columnName,cs,$search";
                        $i++;
                    }
                }
            }
            $request = RequestUtils::setParams($request, $params);
        }
        return $next->handle($request);
    }
}
