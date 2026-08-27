<?php

namespace Tqdev\PhpCrudApi\OpenApi;

use Psr\Http\Message\ServerRequestInterface;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\OpenApi\OpenApiDefinition;

class OpenApiBuilder
{
    private $openapi;
    private $records;
    private $columns;
    private $status;
    private $builders;
    private $basePath;

    public function __construct(ReflectionService $reflection, array $base, array $controllers, array $builders, string $basePath)
    {
        $this->openapi = new OpenApiDefinition($base);
        $this->basePath = rtrim($basePath, '/');
        $this->records = in_array('records', $controllers) ? new OpenApiRecordsBuilder($this->openapi, $reflection) : null;
        $this->columns = in_array('columns', $controllers) ? new OpenApiColumnsBuilder($this->openapi) : null;
        $this->status = in_array('status', $controllers) ? new OpenApiStatusBuilder($this->openapi) : null;
        $this->builders = array();
        foreach ($builders as $className) {
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

    public function build(ServerRequestInterface $request): OpenApiDefinition
    {
        $this->openapi->set("openapi", "3.0.0");
        if (!$this->openapi->has("servers")) {
            $this->openapi->set("servers||url", $this->getServerUrl($request));
        }
        if ($this->records) {
            $this->records->build();
        }
        if ($this->columns) {
            $this->columns->build();
        }
        if ($this->status) {
            $this->status->build();
        }
        foreach ($this->builders as $builder) {
            $builder->build();
        }
        return $this->openapi;
    }
}
