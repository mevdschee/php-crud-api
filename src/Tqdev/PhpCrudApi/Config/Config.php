<?php

namespace Tqdev\PhpCrudApi\Config;

use Tqdev\PhpCrudApi\Config\Base\ConfigInterface;

class Config implements ConfigInterface
{
    private $values = [
        'driver' => null,
        'address' => null,
        'port' => null,
        'username' => '',
        'password' => '',
        'database' => '',
        'command' => '',
        'tables' => 'all',
        'mapping' => '',
        'middlewares' => 'cors',
        'controllers' => 'records,geojson,openapi,status',
        'customControllers' => '',
        'customOpenApiBuilders' => '',
        'cacheType' => 'TempFile',
        'cachePath' => '',
        'cacheTime' => 10,
        'jsonOptions' => JSON_UNESCAPED_UNICODE,
        'debug' => false,
        'basePath' => '',
        'openApiBase' => '{"info":{"title":"PHP-CRUD-API","version":"1.0.0"}}',
        'openApiFilterCount' => 3,
        'openApiSubFilterCount' => 0,
        'geometrySrid' => 4326,
    ];
    
    public function getUID(): string
    {
        return md5(json_encode($this->values));
    }
    
    private function getDefaultDriver(array $values): string
    {
        if (isset($values['driver'])) {
            return $values['driver'];
        }
        return 'mysql';
    }

    private function getDefaultPort(string $driver): int
    {
        switch ($driver) {
            case 'mysql':
                return 3306;
            case 'pgsql':
                return 5432;
            case 'sqlsrv':
                return 1433;
            case 'sqlite':
                return 0;
        }
        return 0;
    }

    private function getDefaultAddress(string $driver): string
    {
        switch ($driver) {
            case 'mysql':
                return 'localhost';
            case 'pgsql':
                return 'localhost';
            case 'sqlsrv':
                return 'localhost';
            case 'sqlite':
                return 'data.db';
        }
        return 'localhost';
    }

    private function getDriverDefaults(string $driver): array
    {
        return [
            'driver' => $driver,
            'address' => $this->getDefaultAddress($driver),
            'port' => $this->getDefaultPort($driver),
        ];
    }

    private function getEnvironmentVariableName(string $key): string
    {
        $prefix = "PHP_CRUD_API_";
        $suffix = strtoupper(preg_replace('/(?<!^)[A-Z]/', '_$0', str_replace('.', '_', $key)));
        return $prefix . $suffix;
    }

    public function getProperty(string $key, $default = '')
    {
        if (strpos($key, 'Handler')) {
            return $this->values[$key] ?? $default;
        }
        $variableName = $this->getEnvironmentVariableName($key);
        return getenv($variableName, true) ?: ($this->values[$key] ?? $default);
    }

    /**
     * The name a custom class is known by in the config, which is its class
     * name without the namespace.
     */
    public static function getShortClassName(string $className): string
    {
        $position = strrpos($className, '\\');
        return $position === false ? $className : substr($className, $position + 1);
    }

    /**
     * The short names of the custom controllers and the custom openapi
     * builders, which may carry settings of their own the way a middleware
     * does. The short name is used rather than the class name, as a namespaced
     * class name has no legal environment variable to go with it. Two listed
     * classes that share a short name are refused, so that a setting is never
     * read by the class it was not meant for.
     */
    private function getCustomClassNames(): array
    {
        $names = array();
        $classNames = array_merge($this->getCustomControllers(), $this->getCustomOpenApiBuilders());
        foreach ($classNames as $className) {
            $name = self::getShortClassName($className);
            if (in_array($name, $names)) {
                throw new \Exception("Config has two custom classes named '$name'");
            }
            $names[] = $name;
        }
        return $names;
    }

    public function __construct(array $values)
    {
        $defaults = array_merge($this->values, $this->getDriverDefaults($this->getDefaultDriver($values)));
        foreach ($defaults as $key => $default) {
            $this->values[$key] = $values[$key] ?? $default;
            $this->values[$key] = $this->getProperty($key);
        }
        $this->values['middlewares'] = array_map('trim', explode(',', $this->values['middlewares']));
        $prefixes = array_merge($this->values['middlewares'], $this->getCustomClassNames());
        foreach ($values as $key => $value) {
            if (strpos($key, '.') === false) {
                if (!isset($defaults[$key])) {
                    throw new \Exception("Config has invalid key '$key'");
                }
            } else {
                $prefix = substr($key, 0, strpos($key, '.'));
                if (!in_array($prefix, $prefixes)) {
                    throw new \Exception("Config has invalid middleware or custom class key '$key'");
                } else {
                    $this->values[$key] = $value;
                }
            }
        }
    }

    public function getDriver(): string
    {
        return $this->values['driver'];
    }

    public function getAddress(): string
    {
        return $this->values['address'];
    }

    public function getPort(): int
    {
        return $this->values['port'];
    }

    public function getUsername(): string
    {
        return $this->values['username'];
    }

    public function getPassword(): string
    {
        return $this->values['password'];
    }

    public function getDatabase(): string
    {
        return $this->values['database'];
    }

    public function getCommand(): string
    {
        return $this->values['command'];
    }


    public function getTables(): array
    {
        return array_filter(array_map('trim', explode(',', $this->values['tables'])));
    }

    public function getMapping(): array
    {
        $mapping = array_map(function ($v) {
            return explode('=', $v);
        }, array_filter(array_map('trim', explode(',', $this->values['mapping']))));
        return array_combine(array_column($mapping, 0), array_column($mapping, 1));
    }

    public function getMiddlewares(): array
    {
        return $this->values['middlewares'];
    }

    public function getControllers(): array
    {
        return array_filter(array_map('trim', explode(',', $this->values['controllers'])));
    }

    public function getCustomControllers(): array
    {
        return array_filter(array_map('trim', explode(',', $this->values['customControllers'])));
    }

    public function getCustomOpenApiBuilders(): array
    {
        return array_filter(array_map('trim', explode(',', $this->values['customOpenApiBuilders'])));
    }

    public function getCacheType(): string
    {
        return $this->values['cacheType'];
    }

    public function getCachePath(): string
    {
        return $this->values['cachePath'];
    }

    public function getCacheTime(): int
    {
        return $this->values['cacheTime'];
    }

    public function getJsonOptions(): int
    {
        return $this->values['jsonOptions'];
    }

    public function getDebug(): bool
    {
        return $this->values['debug'];
    }

    public function getBasePath(): string
    {
        return $this->values['basePath'];
    }

    public function getOpenApiBase(): array
    {
        return json_decode($this->values['openApiBase'], true);
    }

    public function getOpenApiFilterCount(): int
    {
        return max(0, (int) $this->values['openApiFilterCount']);
    }

    public function getOpenApiSubFilterCount(): int
    {
        return min(26, max(0, (int) $this->values['openApiSubFilterCount']));
    }

    public function getGeometrySrid(): int
    {
        return $this->values['geometrySrid'];
    }
}
