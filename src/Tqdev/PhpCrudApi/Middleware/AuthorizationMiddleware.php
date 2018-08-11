<?php
namespace Tqdev\PhpCrudApi\Middleware;

use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\Request;
use Tqdev\PhpCrudApi\Response;

class AuthorizationMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
    }

    private function getJoins($all, $list)
    {
        $result = array_fill_keys($all, false);
        foreach ($lists as $items) {
            foreach (explode(',', $items) as $item) {
                if (isset($result[$item])) {
                    $result[$item] = true;
                }
            }
        }
        return $result;
    }

    public function handle(Request $request): Response
    {
        $path = $request->getPathSegment(1);
        $tableName = $request->getPathSegment(2);
        $database = $this->reflection->getDatabase();
        $handler = $this->getProperty('handler', '');
        if ($handler !== '' && $path == 'records' && $database->exists($tableName)) {
            $method = $request->getMethod();
            $tableNames = $database->getTableNames();
            $params = $request->getParams();
            $joins = $this->getJoins($tableNames, $params['join']);
            $allowed = call_user_func($handler, $method, $tableName, $joins);
            if (!$allowed) {
                return $this->responder->error(ErrorCode::OPERATION_FORBIDDEN, '');
            }
        }
        return $this->next->handle($request);
    }
}
