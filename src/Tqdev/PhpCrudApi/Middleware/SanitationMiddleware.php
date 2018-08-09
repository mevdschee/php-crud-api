<?php
namespace Tqdev\PhpCrudApi\Middleware;

use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Column\Reflection\ReflectedTable;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\Request;
use Tqdev\PhpCrudApi\Response;

class SanitationMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
    }

    private function callHandler($handler, $record, String $method, ReflectedTable $table) /*: object */
    {
        $context = (array) $record;
        $tableName = $table->getName();
        foreach ($context as $columnName => &$value) {
            if ($table->exists($columnName)) {
                $column = $table->get($columnName);
                $value = call_user_func($handler, $method, $tableName, $column->serialize(), $value);
            }
        }
        return (object) $context;
    }

    public function handle(Request $request): Response
    {
        $path = $request->getPathSegment(1);
        $tableName = $request->getPathSegment(2);
        $record = $request->getBody();
        $database = $this->reflection->getDatabase();
        if ($path == 'records' && $database->exists($tableName) && $record !== null) {
            $table = $database->get($tableName);
            $method = $request->getMethod();
            $handler = $this->getProperty('handler', '');
            if ($handler !== '') {
                if (is_array($record)) {
                    foreach ($record as &$r) {
                        $r = $this->callHandler($handler, $r, $method, $table);
                    }
                } else {
                    $record = $this->callHandler($handler, $record, $method, $table);
                }
                $path = $request->getPath();
                $query = urldecode(http_build_query($request->getParams()));
                $headers = $request->getHeaders();
                $body = json_encode($record);
                $request = new Request($method, $path, $query, $headers, $body);
            }
        }
        return $this->next->handle($request);
    }
}
