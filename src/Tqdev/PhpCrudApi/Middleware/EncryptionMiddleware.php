<?php

namespace Tqdev\PhpCrudApi\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\RequestUtils;
use Tqdev\PhpCrudApi\ResponseFactory;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Config\Config;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Router\Router;

class EncryptionMiddleware extends Middleware
{
    private $reflection;
    private $keyVersions;
    private $activeVersion;

    public function __construct(Router $router, Responder $responder, Config $config, string $middleware, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $config, $middleware);
        $this->reflection = $reflection;

        $keyJson = $this->getProperty('keyVersions', '{}');
        $this->keyVersions = json_decode($keyJson, true);
        $this->activeVersion = $this->getProperty('activeVersion', '');

        if (!isset($this->keyVersions[$this->activeVersion])) {
            throw new \RuntimeException("Active key version '{$this->activeVersion}' is not configured.");
        }

        foreach ($this->keyVersions as $v => $k) {
            if (strlen($k) < 32) {
                throw new \RuntimeException("Key for version '{$v}' must be at least 32 characters.");
            }
        }
    }

    private function getColumns(): array
    {
        $columns = $this->getProperty('columns', '');
        return array_filter(array_map('trim', explode(',', $columns)));
    }

    private function encrypt(string $value): string
    {
        $key = $this->keyVersions[$this->activeVersion];
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = openssl_encrypt($value, 'aes-256-cbc', $key, 0, $iv);
        return $this->activeVersion . '|' . base64_encode($iv . $encrypted);
    }

    private function decrypt(string $value): string
    {
        if (strpos($value, '|') === false) {
            throw new \RuntimeException('Invalid encrypted format, missing key version prefix');
        }

        list($version, $encoded) = explode('|', $value, 2);
        if (!isset($this->keyVersions[$version])) {
           // throw new \RuntimeException("Unknown encryption key version: $version");
         //  error_log("WARNING: Key is missing for record ID: $id");
           return $value;//return encrypted value if no key found
        }
        $key = $this->keyVersions[$version];

        $data = base64_decode($encoded);
        $ivLength = openssl_cipher_iv_length('aes-256-cbc');
        $iv = substr($data, 0, $ivLength);
        $encrypted = substr($data, $ivLength);

        return openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, $iv);
    }

    private function encryptRecord($record, array $columns)
    {
        foreach ($columns as $column) {
            if (!is_string($column)) continue;
            $col = strpos($column, '.') !== false ? explode('.', $column)[1] : $column;

            if (is_array($record) && array_key_exists($col, $record) && is_string($record[$col])) {
                $record[$col] = $this->encrypt($record[$col]);
            } elseif (is_object($record) && property_exists($record, $col) && is_string($record->$col)) {
                $record->$col = $this->encrypt($record->$col);
            }
        }
        return $record;
    }

    private function decryptRecord($record, array $columns)
    {
        foreach ($columns as $column) {
            if (!is_string($column)) continue;
            $col = strpos($column, '.') !== false ? explode('.', $column)[1] : $column;

            if (is_array($record) && array_key_exists($col, $record) && is_string($record[$col])) {
                $record[$col] = $this->decrypt($record[$col]);
            } elseif (is_object($record) && property_exists($record, $col) && is_string($record->$col)) {
                $record->$col = $this->decrypt($record->$col);
            }
        }
        return $record;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $next): ResponseInterface
    {
        $operation = RequestUtils::getOperation($request);
        $tableName = RequestUtils::getPathSegment($request, 2);
        $columns = $this->getColumns();

        $tableColumns = array_filter($columns, fn($col) => strpos($col, $tableName . '.') === 0);
        if (empty($tableColumns)) {
            return $next->handle($request);
        }

        $tableColumns = array_values(array_filter($tableColumns, 'is_string'));

        switch ($operation) {
            case 'create':
            case 'update':
                $body = $request->getParsedBody();
                if (
                    (is_array($body) && isset($body['records']) && is_array($body['records'])) ||
                    (is_object($body) && isset($body->records) && is_array($body->records))
                ) {
                    $records = is_array($body) ? $body['records'] : $body->records;
                    foreach ($records as &$record) {
                        $record = $this->encryptRecord($record, $tableColumns);
                    }
                    if (is_array($body)) {
                        $body['records'] = $records;
                    } else {
                        $body->records = $records;
                    }
                } else {
                    $body = $this->encryptRecord($body, $tableColumns);
                }
                $request = $request->withParsedBody($body);
                break;

            case 'read':
            case 'list':
                $response = $next->handle($request);
                $bodyStr = (string)$response->getBody();
                $body = json_decode($bodyStr);

                if (isset($body->records) && is_array($body->records)) {
                    foreach ($body->records as &$record) {
                        $record = $this->decryptRecord($record, $tableColumns);
                    }
                } else {
                    $body = $this->decryptRecord($body, $tableColumns);
                }
                return ResponseFactory::fromObject($response->getStatusCode(), $body, JSON_UNESCAPED_UNICODE);
        }

        return $next->handle($request);
    }
}
