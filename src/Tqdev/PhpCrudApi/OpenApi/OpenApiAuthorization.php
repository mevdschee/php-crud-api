<?php

namespace Tqdev\PhpCrudApi\OpenApi;

use Tqdev\PhpCrudApi\Middleware\Communication\VariableStore;

/**
 * The authorization middleware removes the tables and columns that the request
 * may not touch from the reflection, but the document describes every operation
 * at once, so it cannot do that here. It leaves its handlers behind in the
 * variable store instead and the builders ask them per operation.
 */
class OpenApiAuthorization
{
    public function isOperationOnTableAllowed(string $operation, string $tableName): bool
    {
        $tableHandler = VariableStore::get('authorization.tableHandler');
        if (!$tableHandler) {
            return true;
        }
        return (bool) call_user_func($tableHandler, $operation, $tableName);
    }

    public function isOperationOnColumnAllowed(string $operation, string $tableName, string $columnName): bool
    {
        $columnHandler = VariableStore::get('authorization.columnHandler');
        if (!$columnHandler) {
            return true;
        }
        return (bool) call_user_func($columnHandler, $operation, $tableName, $columnName);
    }
}
