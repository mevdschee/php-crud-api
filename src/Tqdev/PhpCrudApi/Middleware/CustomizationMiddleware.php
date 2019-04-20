<?php
namespace Tqdev\PhpCrudApi\Middleware;

use Psr\Http\Message\ServerRequestInterface;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\RequestUtils;
use Tqdev\PhpCrudApi\Response;

class CustomizationMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
    }

    public function handle(ServerRequestInterface $request): Response
    {
        $operation = RequestUtils::getOperation($request);
        $tableName = RequestUtils::getPathSegment($request, 2);
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
