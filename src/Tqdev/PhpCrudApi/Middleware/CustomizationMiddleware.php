<?php
namespace Tqdev\PhpCrudApi\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\RequestUtils;

class CustomizationMiddleware extends Middleware
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
        $tableName = RequestUtils::getPathSegment($request, 2);
        $beforeHandler = $this->getProperty('beforeHandler', '');
        $environment = (object) array();
        if ($beforeHandler !== '') {
            $result = call_user_func($beforeHandler, $operation, $tableName, $request, $environment);
            $request = $result ?: $request;
        }
        $response = $next->handle($request);
        $afterHandler = $this->getProperty('afterHandler', '');
        if ($afterHandler !== '') {
            $result = call_user_func($afterHandler, $operation, $tableName, $response, $environment);
            $response = $result ?: $response;
        }
        return $response;
    }
}
