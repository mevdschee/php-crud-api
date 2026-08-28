<?php

namespace Tqdev\PhpCrudApi\Config;

/**
 * The settings of a custom controller or a custom openapi builder, which are
 * the config keys that start with the short name of its class, the way a
 * middleware reads the keys that start with its own name. It is handed over
 * instead of the config itself, as a class that documents or serves an
 * end-point has no use for the database credentials.
 */
class CustomSettings
{
    private $config;
    private $prefix;

    public function __construct(Config $config, string $prefix)
    {
        $this->config = $config;
        $this->prefix = $prefix;
    }

    public function get(string $key, string $default = ''): string
    {
        return (string) $this->config->getProperty($this->prefix . '.' . $key, $default);
    }
}
