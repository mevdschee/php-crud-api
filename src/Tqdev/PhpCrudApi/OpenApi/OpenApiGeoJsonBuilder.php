<?php

namespace Tqdev\PhpCrudApi\OpenApi;

use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\GeoJson\Geometry;
use Tqdev\PhpCrudApi\OpenApi\OpenApiDefinition;

/**
 * The geojson controller serves the records of a table as GeoJSON, which only
 * says something for a table that has a geometry column, so the tables that
 * have none are left out. The first geometry column is the one that is read,
 * unless the "geometry" parameter names another one, and it is the one column
 * that does not end up in the properties of the feature.
 */
class OpenApiGeoJsonBuilder
{
    private $openapi;
    private $reflection;
    private $middlewares;
    private $tableNames;
    private $authorization;
    private $columnTypes;
    private $tag = 'geojson';

    /**
     * Status codes that the geojson controller itself can return per operation.
     * Reading several records at once answers with a feature collection instead
     * of a list of error documents, so there is no 424 here, and the read is
     * only emitted for tables, which rules out the 405 that a view would get.
     */
    private $errors = [
        'list' => [404],
        'read' => [404],
    ];
    private $operations = [
        'list' => 'get',
        'read' => 'get',
    ];

    public function __construct(OpenApiDefinition $openapi, ReflectionService $reflection, OpenApiMiddlewares $middlewares, OpenApiTableNames $tableNames)
    {
        $this->openapi = $openapi;
        $this->reflection = $reflection;
        $this->middlewares = $middlewares;
        $this->tableNames = $tableNames;
        $this->authorization = new OpenApiAuthorization();
        $this->columnTypes = new OpenApiColumnTypes();
    }

    private function getGeometryColumnName(string $tableName): string
    {
        $table = $this->reflection->getTable($tableName);
        foreach ($table->getColumnNames() as $columnName) {
            if ($table->getColumn($columnName)->isGeometry()) {
                return $columnName;
            }
        }
        return '';
    }

    private function getTableNames(): array
    {
        $tableNames = array();
        foreach ($this->reflection->getTableNames() as $tableName) {
            if ($this->getGeometryColumnName($tableName)) {
                $tableNames[] = $tableName;
            }
        }
        return $tableNames;
    }

    public function build() /*: void*/
    {
        $tableNames = $this->getTableNames();
        if (!$tableNames) {
            return;
        }
        foreach ($tableNames as $tableName) {
            $this->setPath($tableName);
        }
        $this->setComponentGeometrySchema();
        foreach ($tableNames as $tableName) {
            $this->setComponentSchema($tableName);
            $this->setComponentResponse($tableName);
        }
        $this->setComponentParameters();
        $this->setTag();
    }

    private function setPath(string $tableName) /*: void*/
    {
        $normalizedTableName = $this->tableNames->normalize($tableName);
        $table = $this->reflection->getTable($tableName);
        $pk = $table->getPk();
        foreach ($this->operations as $operation => $method) {
            if ($operation != 'list' && (!$pk || $table->getType() != 'table')) {
                continue;
            }
            if (!$this->authorization->isOperationOnTableAllowed($operation, $tableName)) {
                continue;
            }
            if ($operation == 'list') {
                $path = sprintf('/geojson/%s', $tableName);
                $parameters = ['filter', 'include', 'exclude', 'order', 'size', 'page', 'join'];
                if ($this->middlewares->getTextSearchParameter()) {
                    $parameters[] = 'search';
                }
                $parameters = array_merge($parameters, ['geometry', 'bbox', 'tile']);
            } else {
                $path = sprintf('/geojson/%s/{id}', $tableName);
                $parameters = ['pk', 'include', 'exclude', 'join', 'geometry'];
            }
            $parameters = array_merge($parameters, $this->middlewares->getCommonParameters($method));
            foreach ($parameters as $parameter) {
                $this->openapi->set("paths|$path|$method|parameters||\$ref", "#/components/parameters/$parameter");
            }
            $this->openapi->set("paths|$path|$method|tags|", $this->tag);
            $this->openapi->set("paths|$path|$method|operationId", "$operation" . "_geojson_" . "$normalizedTableName");
            $this->openapi->set("paths|$path|$method|description", "$operation $tableName as geojson");
            $this->openapi->set("paths|$path|$method|responses|200|\$ref", "#/components/responses/$operation-geojson-$normalizedTableName");
            $statusCodes = array_merge($this->errors[$operation], $this->middlewares->getStatusCodes(), [500]);
            sort($statusCodes);
            foreach ($statusCodes as $statusCode) {
                $this->openapi->set("paths|$path|$method|responses|$statusCode|\$ref", "#/components/responses/error-$statusCode");
            }
            $this->openapi->set("paths|$path|$method|responses|default|\$ref", "#/components/responses/error");
        }
    }

    /**
     * A position is a pair of numbers and every dimension that a geometry has
     * nests them one level deeper, which is why the coordinates refer to
     * themselves. The geometry itself is nullable, as a record that has no
     * geometry still becomes a feature.
     */
    private function setComponentGeometrySchema() /*: void*/
    {
        $this->openapi->set("components|schemas|coordinates|type", "array");
        $this->openapi->set("components|schemas|coordinates|items|oneOf|0|type", "number");
        $this->openapi->set("components|schemas|coordinates|items|oneOf|1|\$ref", "#/components/schemas/coordinates");

        $this->openapi->set("components|schemas|geometry|type", "object");
        $this->openapi->set("components|schemas|geometry|nullable", true);
        $this->openapi->set("components|schemas|geometry|required", ["type", "coordinates"]);
        $this->openapi->set("components|schemas|geometry|properties|type|type", "string");
        $this->openapi->set("components|schemas|geometry|properties|type|enum", Geometry::$types);
        $this->openapi->set("components|schemas|geometry|properties|coordinates|\$ref", "#/components/schemas/coordinates");
    }

    private function setFeatureSchema(string $prefix, string $tableName, string $operation) /*: void*/
    {
        $table = $this->reflection->getTable($tableName);
        $pk = $table->getPk();
        $pkName = $pk ? $pk->getName() : '';
        $geometryColumnName = $this->getGeometryColumnName($tableName);
        $this->openapi->set("$prefix|type", "object");
        $this->openapi->set("$prefix|required", ["type", "id", "properties", "geometry"]);
        $this->openapi->set("$prefix|properties|type|type", "string");
        $this->openapi->set("$prefix|properties|type|enum", ["Feature"]);
        // the id of a feature is the primary key value, or null without one
        $properties = $pk ? $this->columnTypes->getProperties($pk) : ['nullable' => true];
        foreach ($properties as $key => $value) {
            $this->openapi->set("$prefix|properties|id|$key", $value);
        }
        $this->openapi->set("$prefix|properties|properties|type", "object");
        foreach ($table->getColumnNames() as $columnName) {
            if ($columnName == $pkName || $columnName == $geometryColumnName) {
                continue;
            }
            if (!$this->authorization->isOperationOnColumnAllowed($operation, $tableName, $columnName)) {
                continue;
            }
            foreach ($this->columnTypes->getProperties($table->getColumn($columnName)) as $key => $value) {
                $this->openapi->set("$prefix|properties|properties|properties|$columnName|$key", $value);
            }
        }
        $this->openapi->set("$prefix|properties|geometry|\$ref", "#/components/schemas/geometry");
    }

    /**
     * A feature collection is the answer to a list and to a batch read. The
     * list counts the records that the page was taken from, which the batch
     * read has nothing to count, so it reports no "results" at all.
     */
    private function setFeatureCollectionSchema(string $prefix, string $features, bool $results) /*: void*/
    {
        $this->openapi->set("$prefix|type", "object");
        $this->openapi->set("$prefix|required", ["type", "features"]);
        $this->openapi->set("$prefix|properties|type|type", "string");
        $this->openapi->set("$prefix|properties|type|enum", ["FeatureCollection"]);
        $this->openapi->set("$prefix|properties|features|type", "array");
        if ($features) {
            $this->openapi->set("$prefix|properties|features|items|\$ref", $features);
        }
        if ($results) {
            // only counted when the request asked for a page
            $this->openapi->set("$prefix|properties|results|type", "integer");
            $this->openapi->set("$prefix|properties|results|format", "int64");
        }
    }

    private function setComponentSchema(string $tableName) /*: void*/
    {
        $normalizedTableName = $this->tableNames->normalize($tableName);
        $table = $this->reflection->getTable($tableName);
        $pk = $table->getPk();
        foreach (array_keys($this->operations) as $operation) {
            if ($operation != 'list' && (!$pk || $table->getType() != 'table')) {
                continue;
            }
            if (!$this->authorization->isOperationOnTableAllowed($operation, $tableName)) {
                continue;
            }
            $prefix = "components|schemas|$operation-geojson-$normalizedTableName";
            if ($operation == 'list') {
                $this->setFeatureCollectionSchema($prefix, '', true);
                $this->setFeatureSchema("$prefix|properties|features|items", $tableName, $operation);
            } else {
                $this->setFeatureSchema($prefix, $tableName, $operation);
            }
        }
    }

    private function setComponentResponse(string $tableName) /*: void*/
    {
        $normalizedTableName = $this->tableNames->normalize($tableName);
        $table = $this->reflection->getTable($tableName);
        $pk = $table->getPk();
        foreach (array_keys($this->operations) as $operation) {
            if ($operation != 'list' && (!$pk || $table->getType() != 'table')) {
                continue;
            }
            if (!$this->authorization->isOperationOnTableAllowed($operation, $tableName)) {
                continue;
            }
            $schema = "#/components/schemas/$operation-geojson-$normalizedTableName";
            $prefix = "components|responses|$operation-geojson-$normalizedTableName";
            if ($operation == 'list') {
                $this->openapi->set("$prefix|description", "list of $tableName records as a feature collection");
                $this->openapi->set("$prefix|content|application/json|schema|\$ref", $schema);
            } else {
                $this->openapi->set("$prefix|description", "single $tableName record as a feature, or a feature collection for a batch");
                $this->openapi->set("$prefix|content|application/json|schema|oneOf|0|\$ref", $schema);
                $this->setFeatureCollectionSchema("$prefix|content|application/json|schema|oneOf|1", $schema, false);
            }
        }
    }

    private function setComponentParameters() /*: void*/
    {
        $this->openapi->set("components|parameters|geometry|name", "geometry");
        $this->openapi->set("components|parameters|geometry|in", "query");
        $this->openapi->set("components|parameters|geometry|schema|type", "string");
        $this->openapi->set("components|parameters|geometry|description", "Name of the geometry column to read, the first geometry column of the table is used when it is not given. Example: location");
        $this->openapi->set("components|parameters|geometry|required", false);

        $this->openapi->set("components|parameters|bbox|name", "bbox");
        $this->openapi->set("components|parameters|bbox|in", "query");
        $this->openapi->set("components|parameters|bbox|schema|type", "string");
        $this->openapi->set("components|parameters|bbox|schema|pattern", '^-?\d+(\.\d+)?(,-?\d+(\.\d+)?){3}$');
        $this->openapi->set("components|parameters|bbox|description", "Bounding box to filter on: minimum longitude, minimum latitude, maximum longitude and maximum latitude (comma separated). Example: 3.3,50.7,7.2,53.6");
        $this->openapi->set("components|parameters|bbox|required", false);

        $this->openapi->set("components|parameters|tile|name", "tile");
        $this->openapi->set("components|parameters|tile|in", "query");
        $this->openapi->set("components|parameters|tile|schema|type", "string");
        $this->openapi->set("components|parameters|tile|schema|pattern", '^\d+,\d+,\d+$');
        $this->openapi->set("components|parameters|tile|description", "Map tile to filter on: zoom, x and y (comma separated). Example: 9,265,170");
        $this->openapi->set("components|parameters|tile|required", false);
    }

    private function setTag() /*: void*/
    {
        $this->openapi->set("tags|", ['name' => $this->tag, 'description' => "geojson operations"]);
    }
}
