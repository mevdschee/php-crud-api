<?php

namespace Tqdev\PhpCrudApi\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tqdev\PhpCrudApi\Config\Config;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Middleware\Communication\VariableStore;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\RequestUtils;

class JoinLimitsMiddleware extends Middleware
{
    public function __construct(Router $router, Responder $responder, Config $config, string $middleware)
    {
        parent::__construct($router, $responder, $config, $middleware);
    }

    private function hasRelationFilter(array $params): bool
    {
        foreach ($params as $key => $values) {
            if (substr($key, 0, 6) != 'filter' || !is_array($values)) {
                continue;
            }
            foreach ($values as $value) {
                if (strpos(explode(',', $value, 2)[0], '.') !== false) {
                    return true;
                }
            }
        }
        return false;
    }

    private function limitFilterDepth(array $params, int $maxDepth): array
    {
        foreach ($params as $key => $values) {
            if (substr($key, 0, 6) != 'filter' || !is_array($values)) {
                continue;
            }
            $kept = array();
            foreach ($values as $value) {
                // the number of dots in the column path equals the number of
                // related tables traversed, mirroring the join depth limit
                if (substr_count(explode(',', $value, 2)[0], '.') <= $maxDepth) {
                    $kept[] = $value;
                }
            }
            if (count($kept) > 0) {
                $params[$key] = $kept;
            } else {
                unset($params[$key]);
            }
        }
        return $params;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $next): ResponseInterface
    {
        $operation = RequestUtils::getOperation($request);
        $params = RequestUtils::getParams($request);
        $hasJoin = isset($params['join']);
        $hasRelationFilter = $this->hasRelationFilter($params);
        if (in_array($operation, ['read', 'list']) && ($hasJoin || $hasRelationFilter)) {
            $maxDepth = (int) $this->getProperty('depth', '3');
            $maxTables = (int) $this->getProperty('tables', '10');
            $maxRecords = (int) $this->getProperty('records', '1000');
            if ($hasJoin) {
                $tableCount = 0;
                $joinPaths = array();
                for ($i = 0; $i < count($params['join']); $i++) {
                    $joinPath = array();
                    $tables = explode(',', $params['join'][$i]);
                    for ($depth = 0; $depth < min($maxDepth, count($tables)); $depth++) {
                        array_push($joinPath, $tables[$depth]);
                        $tableCount += 1;
                        if ($tableCount == $maxTables) {
                            break;
                        }
                    }
                    array_push($joinPaths, implode(',', $joinPath));
                    if ($tableCount == $maxTables) {
                        break;
                    }
                }
                $params['join'] = $joinPaths;
            }
            if ($hasRelationFilter) {
                $params = $this->limitFilterDepth($params, $maxDepth);
            }
            $request = RequestUtils::setParams($request, $params);
            VariableStore::set("joinLimits.maxRecords", $maxRecords);
        }
        return $next->handle($request);
    }
}
