<?php

namespace Tqdev\PhpCrudApi\OpenApi;

use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\OpenApi\OpenApiDefinition;

/**
 * The dbAuth middleware answers five end-points of its own, before the request
 * reaches a controller, so they are described here rather than in one of the
 * controller builders. The record they return is the users table, limited to
 * "dbAuth.returnedColumns" and without the password column, which the
 * middleware removes before it responds.
 */
class OpenApiDbAuthBuilder
{
    private $openapi;
    private $reflection;
    private $middlewares;
    private $columnTypes;
    private $tag = 'dbAuth';

    private $operations = [
        'login' => ['post', 'log a user in with a username and a password', [403]],
        'logout' => ['post', 'log the current user out', [401]],
        'register' => ['post', 'register a new user', [403, 409, 422]],
        'password' => ['post', 'change the password of the current user', [403, 422]],
        'me' => ['get', 'read the user that is currently logged in', [401]],
    ];

    public function __construct(OpenApiDefinition $openapi, ReflectionService $reflection, OpenApiMiddlewares $middlewares)
    {
        $this->openapi = $openapi;
        $this->reflection = $reflection;
        $this->middlewares = $middlewares;
        $this->columnTypes = new OpenApiColumnTypes();
    }

    private function getProperty(string $key, string $default): string
    {
        return $this->middlewares->getProperty('dbAuth', $key, $default);
    }

    private function getFormFields(): array
    {
        $username = $this->getProperty('usernameFormField', 'username');
        $password = $this->getProperty('passwordFormField', 'password');
        $newPassword = $this->getProperty('newPasswordFormField', 'newPassword');
        return [
            'login' => [$username => false, $password => true],
            'register' => [$username => false, $password => true],
            'password' => [$username => false, $password => true, $newPassword => true],
        ];
    }

    private function isEnabled(string $operation): bool
    {
        if ($operation == 'register') {
            return (bool) $this->getProperty('registerUser', '');
        }
        return true;
    }

    public function build() /*: void*/
    {
        $tableName = $this->getProperty('usersTable', 'users');
        if (!$this->reflection->hasTable($tableName)) {
            return;
        }
        $this->setComponentSchema($tableName);
        $this->setComponentResponse();
        $this->setComponentRequestBodies();
        $this->setPaths();
        $this->setTag();
    }

    private function setComponentSchema(string $tableName) /*: void*/
    {
        $table = $this->reflection->getTable($tableName);
        $passwordColumnName = $this->getProperty('passwordColumn', 'password');
        $returnedColumns = $this->getProperty('returnedColumns', '');
        $columnNames = $returnedColumns ? array_map('trim', explode(',', $returnedColumns)) : $table->getColumnNames();
        $this->openapi->set("components|schemas|user|type", "object");
        foreach ($columnNames as $columnName) {
            if ($columnName == $passwordColumnName || !$table->hasColumn($columnName)) {
                continue;
            }
            $properties = $this->columnTypes->getProperties($table->getColumn($columnName));
            foreach ($properties as $key => $value) {
                $this->openapi->set("components|schemas|user|properties|$columnName|$key", $value);
            }
        }
    }

    private function setComponentResponse() /*: void*/
    {
        $this->openapi->set("components|responses|user|description", "the user record, without the password");
        $this->openapi->set("components|responses|user|content|application/json|schema|\$ref", "#/components/schemas/user");
    }

    private function setComponentRequestBodies() /*: void*/
    {
        foreach ($this->getFormFields() as $operation => $fields) {
            if (!$this->isEnabled($operation)) {
                continue;
            }
            $prefix = "components|requestBodies|$operation";
            $this->openapi->set("$prefix|description", "credentials");
            $this->openapi->set("$prefix|content|application/json|schema|type", "object");
            $this->openapi->set("$prefix|content|application/json|schema|required", array_keys($fields));
            foreach ($fields as $field => $isPassword) {
                $this->openapi->set("$prefix|content|application/json|schema|properties|$field|type", "string");
                if ($isPassword) {
                    $this->openapi->set("$prefix|content|application/json|schema|properties|$field|format", "password");
                }
            }
        }
    }

    private function setPaths() /*: void*/
    {
        $formFields = $this->getFormFields();
        foreach ($this->operations as $operation => $definition) {
            if (!$this->isEnabled($operation)) {
                continue;
            }
            list($method, $description, $statusCodes) = $definition;
            $path = "/$operation";
            foreach ($this->middlewares->getCommonParameters($method) as $parameter) {
                $this->openapi->set("paths|$path|$method|parameters||\$ref", "#/components/parameters/$parameter");
            }
            if (isset($formFields[$operation])) {
                $this->openapi->set("paths|$path|$method|requestBody|\$ref", "#/components/requestBodies/$operation");
            }
            $this->openapi->set("paths|$path|$method|tags|", $this->tag);
            $this->openapi->set("paths|$path|$method|operationId", $operation . "_user");
            $this->openapi->set("paths|$path|$method|description", $description);
            $this->openapi->set("paths|$path|$method|responses|200|\$ref", "#/components/responses/user");
            $statusCodes = array_unique(array_merge($statusCodes, $this->middlewares->getStatusCodes(), [500]));
            sort($statusCodes);
            foreach ($statusCodes as $statusCode) {
                $this->openapi->set("paths|$path|$method|responses|$statusCode|\$ref", "#/components/responses/error-$statusCode");
            }
            $this->openapi->set("paths|$path|$method|responses|default|\$ref", "#/components/responses/error");
        }
    }

    private function setTag() /*: void*/
    {
        $this->openapi->set("tags|", ['name' => $this->tag, 'description' => "authentication operations"]);
    }
}
