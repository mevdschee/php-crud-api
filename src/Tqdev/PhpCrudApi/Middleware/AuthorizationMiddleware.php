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

    public function handle(Request $request): Response
    {
        $path = $request->getPathSegment(1);
        $tableName = $request->getPathSegment(2);
        $database = $this->reflection->getDatabase();
        if ($path == 'records' && $database->exists($tableName)) {
            $table = $database->get($tableName);
            $method = $request->getMethod();
            $tableHandler = $this->getProperty('tableHandler', '');
            if ($tableHandler !== '') {
                $valid = call_user_func($handler, $method, $tableName);
                if ($valid !== true && $valid !== '') {
                    $details[$columnName] = $valid;
                }
                if (count($details) > 0) {
                    return $this->responder->error(ErrorCode::INPUT_VALIDATION_FAILED, $tableName, $details);
                }

            }
        }
        return $this->next->handle($request);
    }
}
