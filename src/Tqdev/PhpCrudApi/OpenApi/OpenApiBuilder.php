<?php

namespace Tqdev\PhpCrudApi\OpenApi;

use Psr\Http\Message\ServerRequestInterface;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Config\Config;
use Tqdev\PhpCrudApi\OpenApi\OpenApiDefinition;

class OpenApiBuilder
{
    private $openapi;
    private $middlewares;
    private $recordParameters;
    private $records;
    private $columns;
    private $geoJson;
    private $cache;
    private $openApi;
    private $status;
    private $dbAuth;
    private $builders;
    private $basePath;

    private $errors = [
        401 => "authentication required",
        403 => "operation forbidden",
        404 => "table, column or record not found",
        405 => "operation not supported",
        409 => "duplicate key or data integrity violation",
        422 => "input could not be processed",
        424 => "one or more operations of the batch failed",
        500 => "internal server error",
    ];

    public function __construct(ReflectionService $reflection, Config $config, string $basePath)
    {
        $this->openapi = new OpenApiDefinition($config->getOpenApiBase());
        $this->middlewares = new OpenApiMiddlewares($config);
        $this->basePath = rtrim($basePath, '/');
        $controllers = $config->getControllers();
        $tableNames = new OpenApiTableNames();
        $this->records = in_array('records', $controllers) ? new OpenApiRecordsBuilder($this->openapi, $reflection, $this->middlewares, $tableNames) : null;
        $this->columns = in_array('columns', $controllers) ? new OpenApiColumnsBuilder($this->openapi, $this->middlewares) : null;
        $this->geoJson = in_array('geojson', $controllers) ? new OpenApiGeoJsonBuilder($this->openapi, $reflection, $this->middlewares, $tableNames) : null;
        $this->cache = in_array('cache', $controllers) ? new OpenApiCacheBuilder($this->openapi, $this->middlewares) : null;
        $this->openApi = in_array('openapi', $controllers) ? new OpenApiOpenApiBuilder($this->openapi, $this->middlewares) : null;
        $this->status = in_array('status', $controllers) ? new OpenApiStatusBuilder($this->openapi, $this->middlewares) : null;
        $this->dbAuth = $this->middlewares->has('dbAuth') ? new OpenApiDbAuthBuilder($this->openapi, $reflection, $this->middlewares) : null;
        // the geojson controller hands the record parameters to the record
        // service, so they are needed as soon as either one is enabled
        $this->recordParameters = ($this->records || $this->geoJson) ? new OpenApiRecordParameters($this->openapi, $this->middlewares) : null;
        $this->builders = array();
        foreach ($config->getCustomOpenApiBuilders() as $className) {
            $this->builders[] = new $className($this->openapi, $reflection);
        }
    }

    /**
     * The router strips the base path from the request before it reaches the
     * controller, so the path of the request is just "/openapi". To report the
     * URL that the API is actually served on, the base path is prepended again.
     */
    private function getServerUrl(ServerRequestInterface $request): string
    {
        $uri = $request->getUri();
        $path = $uri->getPath();
        $position = strpos($path, '/openapi');
        $prefix = $position === false ? '' : substr($path, 0, $position);
        $uri = $uri->withPath(rtrim($this->basePath . $prefix, '/'))->withQuery('')->withFragment('');
        $url = $uri->__toString();
        return $url === '' ? '/' : $url;
    }

    private function setSecurity() /*: void*/
    {
        $schemes = $this->middlewares->getSecuritySchemes();
        if (!$schemes) {
            return;
        }
        foreach ($schemes as $name => $scheme) {
            $this->openapi->set("components|securitySchemes|$name", $scheme);
        }
        foreach (array_keys($schemes) as $name) {
            $this->openapi->set("security||$name", []);
        }
        if ($this->middlewares->isAuthenticationOptional()) {
            // an empty requirement next to the named ones means that an
            // unauthenticated request is accepted as well
            $this->openapi->set("security|", new \stdClass());
        }
    }

    private function setComponentParameters() /*: void*/
    {
        if ($this->recordParameters) {
            $this->recordParameters->set();
        }
        if ($this->middlewares->hasFormatParameter()) {
            $this->openapi->set("components|parameters|format|name", "format");
            $this->openapi->set("components|parameters|format|in", "query");
            $this->openapi->set("components|parameters|format|schema|type", "string");
            $this->openapi->set("components|parameters|format|schema|enum", ["xml"]);
            $this->openapi->set("components|parameters|format|description", "Set to 'xml' to send and receive XML instead of JSON. Example: xml");
            $this->openapi->set("components|parameters|format|required", false);
        }
        $xsrfHeader = $this->middlewares->getXsrfHeader();
        if ($xsrfHeader) {
            $this->openapi->set("components|parameters|xsrf|name", $xsrfHeader);
            $this->openapi->set("components|parameters|xsrf|in", "header");
            $this->openapi->set("components|parameters|xsrf|schema|type", "string");
            $this->openapi->set("components|parameters|xsrf|description", "Value of the XSRF-TOKEN cookie, echoed back to prove the request is not cross site.");
            $this->openapi->set("components|parameters|xsrf|required", true);
        }
    }

    private function setComponentErrors() /*: void*/
    {
        $this->openapi->set("components|schemas|error|type", "object");
        $this->openapi->set("components|schemas|error|required", ["code", "message"]);
        $this->openapi->set("components|schemas|error|properties|code|type", "integer");
        $this->openapi->set("components|schemas|error|properties|code|format", "int32");
        $this->openapi->set("components|schemas|error|properties|message|type", "string");
        $this->openapi->set("components|schemas|error|properties|details|description", "what was wrong with the input, per column");
        $this->openapi->set("components|responses|error|description", "unexpected error");
        $this->openapi->set("components|responses|error|content|application/json|schema|\$ref", "#/components/schemas/error");
        foreach ($this->errors as $status => $description) {
            $this->openapi->set("components|responses|error-$status|description", $description);
            if ($status == 424) {
                // the batch response carries one error document per operation
                $this->openapi->set("components|responses|error-$status|content|application/json|schema|type", "array");
                $this->openapi->set("components|responses|error-$status|content|application/json|schema|items|\$ref", "#/components/schemas/error");
            } else {
                $this->openapi->set("components|responses|error-$status|content|application/json|schema|\$ref", "#/components/schemas/error");
            }
        }
    }

    public function build(ServerRequestInterface $request): OpenApiDefinition
    {
        if (!$this->openapi->has("openapi")) {
            $this->openapi->set("openapi", "3.0.0");
        }
        if (!$this->openapi->has("servers")) {
            $this->openapi->set("servers||url", $this->getServerUrl($request));
        }
        $this->setSecurity();
        if ($this->records) {
            $this->records->build();
        }
        if ($this->columns) {
            $this->columns->build();
        }
        if ($this->geoJson) {
            $this->geoJson->build();
        }
        if ($this->cache) {
            $this->cache->build();
        }
        if ($this->openApi) {
            $this->openApi->build();
        }
        if ($this->dbAuth) {
            $this->dbAuth->build();
        }
        if ($this->status) {
            $this->status->build();
        }
        foreach ($this->builders as $builder) {
            $builder->build();
        }
        $this->setComponentParameters();
        $this->setComponentErrors();
        if ($this->middlewares->hasFormatParameter()) {
            $this->openapi->copyContentType('application/json', 'application/xml');
        }
        return $this->openapi;
    }
}
