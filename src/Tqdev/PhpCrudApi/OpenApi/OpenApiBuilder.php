<?php

namespace Tqdev\PhpCrudApi\OpenApi;

use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\OpenApi\OpenApiDefinition;

class OpenApiBuilder
{
    private $openapi;
    private $records;
    private $columns;

    public function __construct(ReflectionService $reflection, $base)
    {
        $this->openapi = new OpenApiDefinition($base);
        $this->records = new OpenApiRecordsBuilder($this->openapi, $reflection);
        $this->columns = new OpenApiColumnsBuilder($this->openapi, $reflection);
    }

    private function getServerUrl(): string
    {
        $protocol = @$_SERVER['HTTP_X_FORWARDED_PROTO'] ?: @$_SERVER['REQUEST_SCHEME'] ?: ((isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") ? "https" : "http");
        $port = @intval($_SERVER['HTTP_X_FORWARDED_PORT']) ?: @intval($_SERVER["SERVER_PORT"]) ?: (($protocol === 'https') ? 443 : 80);
        $host = @explode(":", $_SERVER['HTTP_HOST'])[0] ?: @$_SERVER['SERVER_NAME'] ?: @$_SERVER['SERVER_ADDR'];
        $port = ($protocol === 'https' && $port === 443) || ($protocol === 'http' && $port === 80) ? '' : ':' . $port;
        $path = @trim(substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], '/openapi')), '/');
        return sprintf('%s://%s%s/%s', $protocol, $host, $port, $path);
    }

    public function build(): OpenApiDefinition
    {
        $this->openapi->set("openapi", "3.0.0");
        if (!$this->openapi->has("servers") && isset($_SERVER['REQUEST_URI'])) {
            $this->openapi->set("servers|0|url", $this->getServerUrl());
        }
        $this->records->build();
        return $this->openapi;
    }
}
