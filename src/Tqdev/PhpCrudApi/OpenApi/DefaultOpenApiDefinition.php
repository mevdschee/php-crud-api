<?php
namespace Tqdev\PhpCrudApi\OpenApi;

class DefaultOpenApiDefinition
{
    private $root = [
        "openapi" => "3.0.0",
        "info" => [
            "title" => "JAVA-CRUD-API",
            "version" => "1.0.0",
        ],
        "paths" => [],
        "components" => [
            "schemas" => [
                "Category" => [
                    "type" => "object",
                    "properties" => [
                        "id" => [
                            "type" => "integer",
                            "format" => "int64",
                        ],
                        "name" => [
                            "type" => "string",
                        ],
                    ],
                ],
                "Tag" => [
                    "type" => "object",
                    "properties" => [
                        "id" => [
                            "type" => "integer",
                            "format" => "int64",
                        ],
                        "name" => [
                            "type" => "string",
                        ],
                    ],
                ],
            ],
        ],
    ];
}
