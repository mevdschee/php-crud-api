<?php

namespace Tqdev\PhpCrudApi\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tqdev\PhpCrudApi\Column\Reflection\ReflectedTable;
use Tqdev\PhpCrudApi\Column\Reflection\ReflectedColumn;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Config\Config;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\RequestUtils;

class SanitationMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, Config $config, string $middleware, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $config, $middleware);
        $this->reflection = $reflection;
    }

    private function callHandler($handler, $record, string $operation, ReflectedTable $table) /*: object */
    {
        $context = (array) $record;
        $tableName = $table->getName();
        foreach ($context as $columnName => &$value) {
            if ($table->hasColumn($columnName)) {
                $column = $table->getColumn($columnName);
                $value = call_user_func($handler, $operation, $tableName, $column->serialize(), $value);
                $value = $this->sanitizeType($table, $column, $value);
            }
        }
        return (object) $context;
    }

    private function sanitizeType(ReflectedTable $table, ReflectedColumn $column, $value)
    {
        $tables = $this->getArrayProperty('tables', 'all');
        $types = $this->getArrayProperty('types', 'all');
        if (
            (in_array('all', $tables) || in_array($table->getName(), $tables)) &&
            (in_array('all', $types) || in_array($column->getType(), $types))
        ) {
            if (is_null($value)) {
                return $value;
            }
            if (is_string($value)) {
                $newValue = null;
                switch ($column->getType()) {
                    case 'integer':
                    case 'bigint':
                        $newValue = filter_var(trim($value), FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
                        break;
                    case 'decimal':
                        $newValue = filter_var(trim($value), FILTER_VALIDATE_FLOAT, FILTER_NULL_ON_FAILURE);
                        if (is_float($newValue)) {
                            $newValue = number_format($newValue, $column->getScale(), '.', '');
                        }
                        break;
                    case 'float':
                    case 'double':
                        $newValue = filter_var(trim($value), FILTER_VALIDATE_FLOAT, FILTER_NULL_ON_FAILURE);
                        break;
                    case 'boolean':
                        $newValue = filter_var(trim($value), FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
                        break;
                    case 'date':
                        $time = strtotime(trim($value));
                        if ($time !== false) {
                            $newValue = date('Y-m-d', $time);
                        }
                        break;
                    case 'time':
                        $time = strtotime(trim($value));
                        if ($time !== false) {
                            $newValue = date('H:i:s', $time);
                        }
                        break;
                    case 'timestamp':
                        $time = strtotime(trim($value));
                        if ($time !== false) {
                            $newValue = date('Y-m-d H:i:s', $time);
                        }
                        break;
                    case 'blob':
                    case 'varbinary':
                        // allow base64url format
                        $newValue = strtr(trim($value), '-_', '+/');
                        break;
                    case 'clob':
                    case 'varchar':
                        $newValue = $value;
                        break;
                    case 'geometry':
                        $newValue = trim($value);
                        break;
                }
                if (!is_null($newValue)) {
                    $value = $newValue;
                }
            } else {
                switch ($column->getType()) {
                    case 'integer':
                    case 'bigint':
                        if (is_float($value)) {
                            $value = (int) round($value);
                        }
                        break;
                    case 'decimal':
                        if (is_float($value) || is_int($value)) {
                            $value = number_format((float) $value, $column->getScale(), '.', '');
                        }
                        break;
                }
            }
            // post process
        }
        return $value;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $next): ResponseInterface
    {
        $operation = RequestUtils::getOperation($request);
        if (in_array($operation, ['create', 'update', 'increment'])) {
            $tableName = RequestUtils::getPathSegment($request, 2);
            if ($this->reflection->hasTable($tableName)) {
                $record = $request->getParsedBody();
                if ($record !== null) {
                    $handler = $this->getProperty('handler', '');
                    if ($handler !== '') {
                        $table = $this->reflection->getTable($tableName);
                        if (is_array($record)) {
                            foreach ($record as &$r) {
                                $r = $this->callHandler($handler, $r, $operation, $table);
                            }
                        } else {
                            $record = $this->callHandler($handler, $record, $operation, $table);
                        }
                        $request = $request->withParsedBody($record);
                    }
                }
            }
        }
        return $next->handle($request);
    }
}
