<?php

namespace Tqdev\PhpCrudApi;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tqdev\PhpCrudApi\Cache\CacheFactory;
use Tqdev\PhpCrudApi\Column\DefinitionService;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Controller\CacheController;
use Tqdev\PhpCrudApi\Controller\ColumnController;
use Tqdev\PhpCrudApi\Controller\GeoJsonController;
use Tqdev\PhpCrudApi\Controller\JsonResponder;
use Tqdev\PhpCrudApi\Controller\OpenApiController;
use Tqdev\PhpCrudApi\Controller\RecordController;
use Tqdev\PhpCrudApi\Database\GenericDB;
use Tqdev\PhpCrudApi\GeoJson\GeoJsonService;
use Tqdev\PhpCrudApi\Middleware\AuthorizationMiddleware;
use Tqdev\PhpCrudApi\Middleware\BasicAuthMiddleware;
use Tqdev\PhpCrudApi\Middleware\CorsMiddleware;
use Tqdev\PhpCrudApi\Middleware\CustomizationMiddleware;
use Tqdev\PhpCrudApi\Middleware\DbAuthMiddleware;
use Tqdev\PhpCrudApi\Middleware\FirewallMiddleware;
use Tqdev\PhpCrudApi\Middleware\IpAddressMiddleware;
use Tqdev\PhpCrudApi\Middleware\JoinLimitsMiddleware;
use Tqdev\PhpCrudApi\Middleware\JwtAuthMiddleware;
use Tqdev\PhpCrudApi\Middleware\ReconnectMiddleware;
use Tqdev\PhpCrudApi\Middleware\MultiTenancyMiddleware;
use Tqdev\PhpCrudApi\Middleware\PageLimitsMiddleware;
use Tqdev\PhpCrudApi\Middleware\Router\SimpleRouter;
use Tqdev\PhpCrudApi\Middleware\SanitationMiddleware;
use Tqdev\PhpCrudApi\Middleware\ValidationMiddleware;
use Tqdev\PhpCrudApi\Middleware\XsrfMiddleware;
use Tqdev\PhpCrudApi\OpenApi\OpenApiService;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\Record\RecordService;
use Tqdev\PhpCrudApi\ResponseUtils;

class Api implements RequestHandlerInterface
{
    private $router;
    private $responder;
    private $debug;

    public function __construct(Config $config)
    {
        $db = new GenericDB(
            $config->getDriver(),
            $config->getAddress(),
            $config->getPort(),
            $config->getDatabase(),
            $config->getUsername(),
            $config->getPassword()
        );
        $prefix = sprintf('phpcrudapi-%s-', substr(md5(__FILE__), 0, 8));
        $cache = CacheFactory::create($config->getCacheType(), $prefix, $config->getCachePath());
        $reflection = new ReflectionService($db, $cache, $config->getCacheTime());
        $responder = new JsonResponder();
        $router = new SimpleRouter($config->getBasePath(), $responder, $cache, $config->getCacheTime(), $config->getDebug());
        foreach ($config->getMiddlewares() as $middleware => $properties) {
            switch ($middleware) {
                case 'cors':
                    new CorsMiddleware($router, $responder, $properties);
                    break;
                case 'firewall':
                    new FirewallMiddleware($router, $responder, $properties);
                    break;
                case 'basicAuth':
                    new BasicAuthMiddleware($router, $responder, $properties);
                    break;
                case 'jwtAuth':
                    new JwtAuthMiddleware($router, $responder, $properties);
                    break;
                case 'dbAuth':
                    new DbAuthMiddleware($router, $responder, $properties, $reflection, $db);
                    break;
                case 'reconnect':
                    new ReconnectMiddleware($router, $responder, $properties, $reflection, $db);
                    break;
                case 'validation':
                    new ValidationMiddleware($router, $responder, $properties, $reflection);
                    break;
                case 'ipAddress':
                    new IpAddressMiddleware($router, $responder, $properties, $reflection);
                    break;
                case 'sanitation':
                    new SanitationMiddleware($router, $responder, $properties, $reflection);
                    break;
                case 'multiTenancy':
                    new MultiTenancyMiddleware($router, $responder, $properties, $reflection);
                    break;
                case 'authorization':
                    new AuthorizationMiddleware($router, $responder, $properties, $reflection);
                    break;
                case 'xsrf':
                    new XsrfMiddleware($router, $responder, $properties);
                    break;
                case 'pageLimits':
                    new PageLimitsMiddleware($router, $responder, $properties, $reflection);
                    break;
                case 'joinLimits':
                    new JoinLimitsMiddleware($router, $responder, $properties, $reflection);
                    break;
                case 'customization':
                    new CustomizationMiddleware($router, $responder, $properties, $reflection);
                    break;
            }
        }
        foreach ($config->getControllers() as $controller) {
            switch ($controller) {
                case 'records':
                    $records = new RecordService($db, $reflection);
                    new RecordController($router, $responder, $records);
                    break;
                case 'columns':
                    $definition = new DefinitionService($db, $reflection);
                    new ColumnController($router, $responder, $reflection, $definition);
                    break;
                case 'cache':
                    new CacheController($router, $responder, $cache);
                    break;
                case 'openapi':
                    $openApi = new OpenApiService($reflection, $config->getOpenApiBase());
                    new OpenApiController($router, $responder, $openApi);
                    break;
                case 'geojson':
                    $records = new RecordService($db, $reflection);
                    $geoJson = new GeoJsonService($reflection, $records);
                    new GeoJsonController($router, $responder, $geoJson);
                    break;
            }
        }
        $this->router = $router;
        $this->responder = $responder;
        $this->debug = $config->getDebug();
    }

    private function parseBody(string $body) /*: ?object*/
    {
        $first = substr($body, 0, 1);
        if ($first == '[' || $first == '{') {
            $object = json_decode($body);
            $causeCode = json_last_error();
            if ($causeCode !== JSON_ERROR_NONE) {
                $object = null;
            }
        } else {
            parse_str($body, $input);
            foreach ($input as $key => $value) {
                if (substr($key, -9) == '__is_null') {
                    $input[substr($key, 0, -9)] = null;
                    unset($input[$key]);
                }
            }
            $object = (object) $input;
        }
        return $object;
    }

    private function addParsedBody(ServerRequestInterface $request): ServerRequestInterface
    {
        $body = $request->getBody();
        if ($body->isReadable() && $body->isSeekable()) {
            $contents = $body->getContents();
            $body->rewind();
            if ($contents) {
                $parsedBody = $this->parseBody($contents);
                $request = $request->withParsedBody($parsedBody);
            }
        }
        return $request;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $response = null;
        try {
            $response = $this->router->route($this->addParsedBody($request));
        } catch (\Throwable $e) {
            $response = $this->responder->error(ErrorCode::ERROR_NOT_FOUND, $e->getMessage());
            if ($this->debug) {
                $response = ResponseUtils::addExceptionHeaders($response, $e);
            }
        }
        return $response;
    }
}
