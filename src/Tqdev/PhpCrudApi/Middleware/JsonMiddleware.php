<?php

namespace Tqdev\PhpCrudApi\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\RequestUtils;
use Tqdev\PhpCrudApi\ResponseFactory;

class JsonMiddleware extends Middleware
{
    private function convertJsonRequestValue($value) /*: object */
    {
        if (is_array($value) || is_object($value)) {
            $value = json_encode($value,JSON_UNESCAPED_UNICODE);
        }
        return $value;
    }
    
    private function convertJsonRequest($object, array $columnNames) /*: object */
    {
        if (is_array($object)) {
            foreach ($object as $i => $obj) {
                foreach ($obj as $k => $v) {
                    if (in_array('all', $columnNames) || in_array($k, $columnNames)) {
                        $object[$i]->$k = $this->convertJsonRequestValue($v);
                    }
                }
            }
        } else if (is_object($object)) {
            foreach ($object as $k => $v) {
                if (in_array('all', $columnNames) || in_array($k, $columnNames)) {
                    $object->$k = $this->convertJsonRequestValue($v);
                }
            }
        }
        return $object;
    }

    private function convertJsonResponseValue(string $value) /*: object */
    {
        if (strlen($value) > 0 && in_array($value[0],['[','{'])) {
            $parsed = json_decode($value);
            if (json_last_error() == JSON_ERROR_NONE) {
                $value = $parsed;
            }
        }
        return $value;
    }
    

    private function convertJsonResponse($object, array $columnNames) /*: object */
    {
        if (is_array($object)) {
            foreach ($object as $k => $v) {
                $object[$k] = $this->convertJsonResponse($v, $columnNames);
            }
        } else if (is_object($object)) {
            foreach ($object as $k => $v) {
                if (in_array('all', $columnNames) || in_array($k, $columnNames)) {
                    $object->$k = $this->convertJsonResponse($v, $columnNames);
                }
            }
        } else if (is_string($object)) {
            $object = $this->convertJsonResponseValue($object);
        }
        return $object;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $next): ResponseInterface
    {
        $operation = RequestUtils::getOperation($request);
        $controllerPath = RequestUtils::getPathSegment($request, 1);
        $tableName = RequestUtils::getPathSegment($request, 2);

        $controllerPaths = $this->getArrayProperty('controllers', 'records,geojson');
		$tableNames = $this->getArrayProperty('tables', 'all');
		$columnNames = $this->getArrayProperty('columns', 'all');
		if (
			(in_array('all', $controllerPaths) || in_array($controllerPath, $controllerPaths)) &&
			(in_array('all', $tableNames) || in_array($tableName, $tableNames))
		) {
            if (in_array($operation, ['create', 'update'])) {
                $records = $request->getParsedBody();
                $records = $this->convertJsonRequest($records,$columnNames);
                $request = $request->withParsedBody($records);
            }
            $response = $next->handle($request);
            if (in_array($operation, ['read', 'list'])) {
                if ($response->getStatusCode() == ResponseFactory::OK) {
                    $records = json_decode($response->getBody()->getContents());
                    $records = $this->convertJsonResponse($records, $columnNames);
                    $response = $this->responder->success($records);
                }
            }
        } else {
            $response = $next->handle($request);
        }
        return $response;
    }
}
