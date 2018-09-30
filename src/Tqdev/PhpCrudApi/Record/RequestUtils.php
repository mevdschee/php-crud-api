<?php
namespace Tqdev\PhpCrudApi\Record;

use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Request;

class RequestUtils
{
    private $reflection;

    public function __construct(ReflectionService $reflection)
    {
        $this->reflection = $reflection;
    }

    public function getOperation(Request $request): String
    {
        $method = $request->getMethod();
        $path = $request->getPathSegment(1);
        $hasPk = $request->getPathSegment(3) != '';
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

    private function getJoinTables(String $tableName, array $parameters): array
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

    public function getTableNames(Request $request): array
    {
        $path = $request->getPathSegment(1);
        $tableName = $request->getPathSegment(2);
        $allTableNames = $this->reflection->getTableNames();
        switch ($path) {
            case 'openapi':
                return $allTableNames;
            case 'columns':
                return $tableName ? [$tableName] : $allTableNames;
            case 'records':
                return $this->getJoinTables($tableName, $request->getParams());
        }
        return $allTableNames;
    }

}
