<?php

namespace Tqdev\PhpCrudApi\OpenApi;

use Tqdev\PhpCrudApi\Config\Config;

/**
 * The document depends on the enabled middlewares for the security schemes, the
 * parameters they read and the status codes they can return. Middlewares are
 * constructed before the controllers, so the config is complete by the time the
 * builders run.
 */
class OpenApiMiddlewares
{
    private $config;
    private $middlewares;

    private $authMiddlewares = ['apiKeyAuth', 'apiKeyDbAuth', 'basicAuth', 'jwtAuth', 'dbAuth', 'wpAuth'];
    private $forbiddingMiddlewares = ['authorization', 'xsrf', 'pageLimits', 'joinLimits', 'firewall', 'cors'];

    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->middlewares = $config->getMiddlewares();
    }

    public function has(string $middleware): bool
    {
        return in_array($middleware, $this->middlewares);
    }

    public function getProperty(string $middleware, string $key, string $default): string
    {
        return (string) $this->config->getProperty("$middleware.$key", $default);
    }

    public function hasFormatParameter(): bool
    {
        return $this->has('xml');
    }

    public function getTextSearchParameter(): string
    {
        return $this->has('textSearch') ? $this->getProperty('textSearch', 'parameter', 'search') : '';
    }

    public function getXsrfHeader(): string
    {
        return $this->has('xsrf') ? $this->getProperty('xsrf', 'headerName', 'X-XSRF-TOKEN') : '';
    }

    public function getXsrfExcludedMethods(): array
    {
        return array_map('trim', explode(',', $this->getProperty('xsrf', 'excludeMethods', 'OPTIONS,GET')));
    }

    /**
     * Parameters that any operation has because a middleware reads them, as
     * component names to be referenced from the operation.
     */
    public function getCommonParameters(string $method): array
    {
        $parameters = array();
        if ($this->hasFormatParameter()) {
            $parameters[] = 'format';
        }
        if ($this->getXsrfHeader() && !in_array(strtoupper($method), $this->getXsrfExcludedMethods())) {
            $parameters[] = 'xsrf';
        }
        return $parameters;
    }

    /**
     * Status codes that any operation can return because a middleware is in
     * front of it, as opposed to the ones the controller itself produces.
     */
    public function getStatusCodes(): array
    {
        $statusCodes = array();
        if (array_filter($this->authMiddlewares, array($this, 'has'))) {
            $statusCodes[] = 401;
        }
        if (array_filter(array_merge($this->authMiddlewares, $this->forbiddingMiddlewares), array($this, 'has'))) {
            $statusCodes[] = 403;
        }
        return $statusCodes;
    }

    public function getSecuritySchemes(): array
    {
        $schemes = array();
        if ($this->has('basicAuth')) {
            $schemes['basicAuth'] = ['type' => 'http', 'scheme' => 'basic'];
        }
        if ($this->has('jwtAuth')) {
            $header = $this->getProperty('jwtAuth', 'header', 'X-Authorization');
            if (strtolower($header) == 'authorization') {
                $schemes['jwtAuth'] = ['type' => 'http', 'scheme' => 'bearer', 'bearerFormat' => 'JWT'];
            } else {
                // a bearer token on a header other than "Authorization" is not
                // an http security scheme, describe the header instead
                $schemes['jwtAuth'] = ['type' => 'apiKey', 'in' => 'header', 'name' => $header, 'description' => 'JWT, prefixed with "Bearer "'];
            }
        }
        if ($this->has('apiKeyAuth')) {
            $schemes['apiKeyAuth'] = ['type' => 'apiKey', 'in' => 'header', 'name' => $this->getProperty('apiKeyAuth', 'header', 'X-API-Key')];
        }
        if ($this->has('apiKeyDbAuth')) {
            $schemes['apiKeyDbAuth'] = ['type' => 'apiKey', 'in' => 'header', 'name' => $this->getProperty('apiKeyDbAuth', 'header', 'X-API-Key')];
        }
        if ($this->has('dbAuth')) {
            $schemes['dbAuth'] = ['type' => 'apiKey', 'in' => 'cookie', 'name' => $this->getProperty('dbAuth', 'sessionName', 'PHPSESSID')];
        }
        return $schemes;
    }

    /**
     * Authentication is optional when every enabled auth middleware lets an
     * unauthenticated request through, which OpenAPI expresses as an empty
     * requirement next to the named ones.
     */
    public function isAuthenticationOptional(): bool
    {
        foreach ($this->authMiddlewares as $middleware) {
            if ($this->has($middleware) && $this->getProperty($middleware, 'mode', 'required') == 'required') {
                return false;
            }
        }
        return true;
    }
}
