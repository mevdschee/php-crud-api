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

    public function __construct(array $values)
    {
        $defaults = array_merge($this->values, $this->getDriverDefaults($this->getDefaultDriver($values)));
        foreach ($defaults as $key => $default) {
            $this->values[$key] = $values[$key] ?? $default;
            $this->values[$key] = $this->getProperty($key);
        }
        $this->values['middlewares'] = array_map('trim', explode(',', $this->values['middlewares']));
        foreach ($values as $key => $value) {
            if (strpos($key, '.') === false) {
                if (!isset($defaults[$key])) {
                    throw new \Exception("Config has invalid key '$key'");
                }
            } else {
                $middleware = substr($key, 0, strpos($key, '.'));
                if (!in_array($middleware, $this->values['middlewares'])) {
                    throw new \Exception("Config has invalid middleware key '$key'");
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

    public function getGeometrySrid(): int
    {
        return $this->values['geometrySrid'];
    }
}
