<?php
namespace Tqdev\PhpCrudApi\Middleware;

use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Middleware\Communication\VariableStore;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\Record\RequestUtils;
use Tqdev\PhpCrudApi\Request;
use Tqdev\PhpCrudApi\Response;

class JoinLimitsMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
        $this->utils = new RequestUtils($reflection);
    }

    public function handle(Request $request): Response
    {
        $operation = $this->utils->getOperation($request);
        $params = $request->getParams();
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
            $request->setParams($params);
            VariableStore::set("joinLimits.maxRecords", $maxRecords);
        }
        return $this->next->handle($request);
    }
}
