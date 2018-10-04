<?php
namespace Tqdev\PhpCrudApi\Middleware;

use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\Record\RequestUtils;
use Tqdev\PhpCrudApi\Request;
use Tqdev\PhpCrudApi\Response;

class CustomMiddleware extends Middleware
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
        $tableName = $request->getPathSegment(2);
        $beforeHandler = $this->getProperty('beforeHandler', '');
        $environment = (object) array();
        if ($beforeHandler !== '') {
            call_user_func($beforeHandler, $operation, $tableName, $request, $environment);
        }
        $response = $this->next->handle($request);
        $afterHandler = $this->getProperty('afterHandler', '');
        if ($afterHandler !== '') {
            call_user_func($afterHandler, $operation, $tableName, $response, $environment);
        }
        return $response;
    }
}
