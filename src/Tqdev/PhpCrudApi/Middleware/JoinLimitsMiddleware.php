<?php
namespace Tqdev\PhpCrudApi\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Middleware\Communication\VariableStore;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\RequestUtils;

class JoinLimitsMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $next): ResponseInterface
    {
        $operation = RequestUtils::getOperation($request);
        $params = RequestUtils::getParams($request);
        if (in_array($operation, ['read', 'list']) && isset($params['join'])) {
            $maxDepth = (int) $this->getProperty('depth', '3');
            $maxTables = (int) $this->getProperty('tables', '10');
            $maxRecords = (int) $this->getProperty('records', '1000');
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
            $request = RequestUtils::setParams($request, $params);
            VariableStore::set("joinLimits.maxRecords", $maxRecords);
        }
        return $next->handle($request);
    }
}
