<?php
namespace Tqdev\PhpCrudApi;

use Psr\Http\Message\ServerRequestInterface;
use Tqdev\PhpCrudApi\Column\ReflectionService;

class RequestUtils
{
    public static function setParams(ServerRequestInterface $request, array $params): ServerRequestInterface
    {
        $query = preg_replace('|%5B[0-9]+%5D=|', '=', http_build_query($params));
        return $request->withUri($request->getUri()->withQuery($query));
    }

    public static function getHeader(ServerRequestInterface $request, string $header): string
    {
        $headers = $request->getHeader($header);
        return isset($headers[0]) ? $headers[0] : '';
    }

    public static function getParams(ServerRequestInterface $request): array
    {
        $params = array();
        $query = $request->getUri()->getQuery();
        $query = str_replace('][]=', ']=', str_replace('=', '[]=', $query));
        parse_str($query, $params);
        return $params;
    }

    public static function getPathSegment(ServerRequestInterface $request, int $part): string
    {
        $path = $request->getUri()->getPath();
        $pathSegments = explode('/', rtrim($path, '/'));
        if ($part < 0 || $part >= count($pathSegments)) {
            return '';
        }
        return urldecode($pathSegments[$part]);
    }

    public static function getOperation(ServerRequestInterface $request): string
    {
        $method = $request->getMethod();
        $path = RequestUtils::getPathSegment($request, 1);
        $hasPk = RequestUtils::getPathSegment($request, 3) != '';
        switch ($path) {
            case 'openapi':
                return 'document';
            case 'columns':
                return $method == 'get' ? 'reflect' : 'remodel';
            case 'records':
                switch ($method) {
                    case 'POST':
                        return 'create';
                    case 'GET':
                        return $hasPk ? 'read' : 'list';
                    case 'PUT':
                        return 'update';
                    case 'DELETE':
                        return 'delete';
                    case 'PATCH':
                        return 'increment';
                }
        }
        return 'unknown';
    }

    private static function getJoinTables(string $tableName, array $parameters): array
    {
        $uniqueTableNames = array();
        $uniqueTableNames[$tableName] = true;
        if (isset($parameters['join'])) {
            foreach ($parameters['join'] as $parameter) {
                $tableNames = explode(',', trim($parameter));
                foreach ($tableNames as $tableName) {
                    $uniqueTableNames[$tableName] = true;
                }
            }
        }
        return array_keys($uniqueTableNames);
    }

    public static function getTableNames(ServerRequestInterface $request, ReflectionService $reflection): array
    {
        $path = RequestUtils::getPathSegment($request, 1);
        $tableName = RequestUtils::getPathSegment($request, 2);
        $allTableNames = $reflection->getTableNames();
        switch ($path) {
            case 'openapi':
                return $allTableNames;
            case 'columns':
                return $tableName ? [$tableName] : $allTableNames;
            case 'records':
                return self::getJoinTables($tableName, RequestUtils::getParams($request));
        }
        return $allTableNames;
    }

}
