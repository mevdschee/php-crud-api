<?php

namespace Tqdev\PhpCrudApi\OpenApi;

use Tqdev\PhpCrudApi\Config\Config;
use Tqdev\PhpCrudApi\OpenApi\OpenApiDefinition;

/**
 * The parameters that select and shape the records of a table. The record
 * controller reads them and the geojson controller hands them to it unchanged,
 * so they are declared here instead of in one of the two builders, which would
 * leave a dangling reference as soon as the other controller is enabled on its
 * own.
 */
class OpenApiRecordParameters
{
    private $openapi;
    private $middlewares;
    private $filterCount;
    private $subFilterCount;

    private $operators = [
        'cs' => 'contain string',
        'sw' => 'start with',
        'ew' => 'end with',
        'eq' => 'equal',
        'lt' => 'lower than',
        'le' => 'lower or equal',
        'ge' => 'greater or equal',
        'gt' => 'greater than',
        'bt' => 'between two comma separated values',
        'in' => 'in a comma separated list of values',
        'is' => 'is null, takes no value',
    ];

    private $spatialOperators = [
        'sco' => 'contains another geometry',
        'scr' => 'crosses another geometry',
        'sdi' => 'is disjoint from another geometry',
        'seq' => 'is equal to another geometry',
        'sin' => 'intersects another geometry',
        'sov' => 'overlaps another geometry',
        'sto' => 'touches another geometry',
        'swi' => 'is within another geometry',
        'sic' => 'is closed and simple, takes no value',
        'sis' => 'is simple, takes no value',
        'siv' => 'is valid, takes no value',
    ];

    public function __construct(OpenApiDefinition $openapi, OpenApiMiddlewares $middlewares, Config $config)
    {
        $this->openapi = $openapi;
        $this->middlewares = $middlewares;
        $this->filterCount = $config->getOpenApiFilterCount();
        $this->subFilterCount = $config->getOpenApiSubFilterCount();
    }

    /**
     * The names of the numbered (and lettered) filter parameters, in the order
     * in which they are referenced from an operation. The filter tree that
     * "FilterInfo" reads has no depth limit, but every level has to be spelled
     * out as a parameter of its own, so how much of it is described is a
     * setting.
     */
    private function getFilterNames(): array
    {
        $names = array();
        for ($number = 1; $number <= $this->filterCount; $number++) {
            $names[] = "filter$number";
            for ($i = 0; $i < $this->subFilterCount; $i++) {
                $names[] = "filter$number" . chr(ord('a') + $i);
            }
        }
        return $names;
    }

    /**
     * The parameters of a list operation, in the order in which they are
     * referenced. The ones that were added later are appended rather than
     * inserted in the place where they belong, as a client generated from the
     * document may pass them by position.
     */
    public function getListParameters(): array
    {
        $parameters = ['filter', 'include', 'exclude', 'order', 'size', 'page', 'join'];
        if ($this->middlewares->getTextSearchParameter()) {
            $parameters[] = 'search';
        }
        return array_merge($parameters, $this->getFilterNames());
    }

    private function getFilterDescription(): string
    {
        $operators = array();
        foreach ($this->operators as $operator => $description) {
            $operators[] = "\"$operator\" ($description)";
        }
        $spatialOperators = array();
        foreach ($this->spatialOperators as $operator => $description) {
            $spatialOperators[] = "\"$operator\" ($description)";
        }
        return implode(' ', [
            'Filters to be applied. Each filter consists of a column, an operator and a value (comma separated).',
            'The operators are: ' . implode(', ', $operators) . '.',
            'Prepend an "n" to an operator to negate it, so that "eq" becomes "neq".',
            'On a geometry column there are spatial operators as well, which take their value in WKT: ' . implode(', ', $spatialOperators) . '.',
            'Prefix the column with the path of table names to a related table (dot separated) to filter on a column of that table,',
            'which keeps the records that have at least one matching related record.',
            'Repeating the parameter combines the filters with "and".',
            'Example: id,eq,1',
        ]);
    }

    private function setFilters() /*: void*/
    {
        $this->openapi->set("components|parameters|filter|name", "filter");
        $this->openapi->set("components|parameters|filter|in", "query");
        $this->openapi->set("components|parameters|filter|schema|type", "array");
        $this->openapi->set("components|parameters|filter|schema|items|type", "string");
        $this->openapi->set("components|parameters|filter|description", $this->getFilterDescription());
        $this->openapi->set("components|parameters|filter|required", false);

        foreach ($this->getFilterNames() as $name) {
            $group = substr($name, 6);
            if (strlen($group) == 1) {
                $description = "Filters of group \"$group\". Same syntax as \"filter\". The filters of a group are combined with \"and\", the groups are combined with \"or\" and the result is combined with \"and\" with the filters of \"filter\". Example: id,eq,1";
            } else {
                $number = substr($group, 0, -1);
                $letter = substr($group, -1);
                $description = "Filters of subgroup \"$letter\" of group \"$number\". Same syntax as \"filter\". The filters of a subgroup are combined with \"and\", the subgroups are combined with \"or\" and the result is combined with \"and\" with the filters of \"filter$number\". Example: id,eq,1";
            }
            $this->openapi->set("components|parameters|$name|name", $name);
            $this->openapi->set("components|parameters|$name|in", "query");
            $this->openapi->set("components|parameters|$name|schema|type", "array");
            $this->openapi->set("components|parameters|$name|schema|items|type", "string");
            $this->openapi->set("components|parameters|$name|description", $description);
            $this->openapi->set("components|parameters|$name|required", false);
        }
    }

    public function set() /*: void*/
    {
        $this->openapi->set("components|parameters|pk|name", "id");
        $this->openapi->set("components|parameters|pk|in", "path");
        $this->openapi->set("components|parameters|pk|schema|type", "string");
        $this->openapi->set("components|parameters|pk|description", "Primary key value, or several of them (comma separated) to run the operation as a batch. Example: 1,2");
        $this->openapi->set("components|parameters|pk|required", true);

        $this->setFilters();

        $this->openapi->set("components|parameters|include|name", "include");
        $this->openapi->set("components|parameters|include|in", "query");
        $this->openapi->set("components|parameters|include|schema|type", "string");
        $this->openapi->set("components|parameters|include|description", "Columns you want to include in the output (comma separated). Example: posts.*,categories.name");
        $this->openapi->set("components|parameters|include|required", false);

        $this->openapi->set("components|parameters|exclude|name", "exclude");
        $this->openapi->set("components|parameters|exclude|in", "query");
        $this->openapi->set("components|parameters|exclude|schema|type", "string");
        $this->openapi->set("components|parameters|exclude|description", "Columns you want to exclude from the output (comma separated). Example: posts.content");
        $this->openapi->set("components|parameters|exclude|required", false);

        $this->openapi->set("components|parameters|order|name", "order");
        $this->openapi->set("components|parameters|order|in", "query");
        $this->openapi->set("components|parameters|order|schema|type", "array");
        $this->openapi->set("components|parameters|order|schema|items|type", "string");
        $this->openapi->set("components|parameters|order|description", "Column you want to sort on and the sort direction (comma separated). Example: id,desc");
        $this->openapi->set("components|parameters|order|required", false);

        $this->openapi->set("components|parameters|size|name", "size");
        $this->openapi->set("components|parameters|size|in", "query");
        $this->openapi->set("components|parameters|size|schema|type", "integer");
        $this->openapi->set("components|parameters|size|description", "Maximum number of results (for top lists). Example: 10");
        $this->openapi->set("components|parameters|size|required", false);

        $this->openapi->set("components|parameters|page|name", "page");
        $this->openapi->set("components|parameters|page|in", "query");
        $this->openapi->set("components|parameters|page|schema|type", "string");
        $this->openapi->set("components|parameters|page|schema|pattern", '^\d+(,\d+)?$');
        $this->openapi->set("components|parameters|page|description", "Page number and page size (comma separated). Example: 1,10");
        $this->openapi->set("components|parameters|page|required", false);

        $this->openapi->set("components|parameters|join|name", "join");
        $this->openapi->set("components|parameters|join|in", "query");
        $this->openapi->set("components|parameters|join|schema|type", "array");
        $this->openapi->set("components|parameters|join|schema|items|type", "string");
        $this->openapi->set("components|parameters|join|description", "Paths (comma separated) to related entities that you want to include. Example: comments,users");
        $this->openapi->set("components|parameters|join|required", false);

        $textSearch = $this->middlewares->getTextSearchParameter();
        if ($textSearch) {
            $this->openapi->set("components|parameters|search|name", $textSearch);
            $this->openapi->set("components|parameters|search|in", "query");
            $this->openapi->set("components|parameters|search|schema|type", "string");
            $this->openapi->set("components|parameters|search|description", "Text to search for in all text columns of the table. Example: hello");
            $this->openapi->set("components|parameters|search|required", false);
        }
    }
}
