<?php
namespace Tqdev\PhpCrudApi\Controller;

use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\Record\RecordService;

abstract class CustomController
{
    protected $service;
    protected $responder;

    public function __construct(Router $router, Responder $responder, RecordService $service)
    {
        $this->registerRoutes($router);

        $this->service = $service;
        $this->responder = $responder;
    }

    protected function registerRoutes(Router $router)
    {
    }
}
