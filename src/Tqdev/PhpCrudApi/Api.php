<?php

namespace Tqdev\PhpCrudApi;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tqdev\PhpCrudApi\Cache\CacheFactory;
use Tqdev\PhpCrudApi\Column\DefinitionService;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Config\Config;
use Tqdev\PhpCrudApi\Controller\CacheController;
use Tqdev\PhpCrudApi\Controller\ColumnController;
use Tqdev\PhpCrudApi\Controller\GeoJsonController;
use Tqdev\PhpCrudApi\Controller\JsonResponder;
use Tqdev\PhpCrudApi\Controller\OpenApiController;
use Tqdev\PhpCrudApi\Controller\RecordController;
use Tqdev\PhpCrudApi\Controller\StatusController;
use Tqdev\PhpCrudApi\Database\GenericDB;
use Tqdev\PhpCrudApi\GeoJson\GeoJsonService;
use Tqdev\PhpCrudApi\Middleware\ApiKeyAuthMiddleware;
use Tqdev\PhpCrudApi\Middleware\ApiKeyDbAuthMiddleware;
use Tqdev\PhpCrudApi\Middleware\AuthorizationMiddleware;
use Tqdev\PhpCrudApi\Middleware\BasicAuthMiddleware;
use Tqdev\PhpCrudApi\Middleware\CorsMiddleware;
use Tqdev\PhpCrudApi\Middleware\CustomizationMiddleware;
use Tqdev\PhpCrudApi\Middleware\DbAuthMiddleware;
use Tqdev\PhpCrudApi\Middleware\FirewallMiddleware;
use Tqdev\PhpCrudApi\Middleware\IpAddressMiddleware;
use Tqdev\PhpCrudApi\Middleware\JoinLimitsMiddleware;
use Tqdev\PhpCrudApi\Middleware\JsonMiddleware;
use Tqdev\PhpCrudApi\Middleware\JwtAuthMiddleware;
use Tqdev\PhpCrudApi\Middleware\MultiTenancyMiddleware;
use Tqdev\PhpCrudApi\Middleware\PageLimitsMiddleware;
use Tqdev\PhpCrudApi\Middleware\ReconnectMiddleware;
use Tqdev\PhpCrudApi\Middleware\Router\SimpleRouter;
use Tqdev\PhpCrudApi\Middleware\SanitationMiddleware;
use Tqdev\PhpCrudApi\Middleware\SslRedirectMiddleware;
use Tqdev\PhpCrudApi\Middleware\TextSearchMiddleware;
use Tqdev\PhpCrudApi\Middleware\ValidationMiddleware;
use Tqdev\PhpCrudApi\Middleware\WpAuthMiddleware;
use Tqdev\PhpCrudApi\Middleware\XmlMiddleware;
use Tqdev\PhpCrudApi\Middleware\XsrfMiddleware;
use Tqdev\PhpCrudApi\OpenApi\OpenApiService;
use Tqdev\PhpCrudApi\Record\RecordService;

class Api implements RequestHandlerInterface
{
    private $router;

    public function __construct(Config $config)
    {
        $db = new GenericDB(
            $config->getDriver(),
            $config->getAddress(),
            $config->getPort(),
            $config->getDatabase(),
            $config->getCommand(),
            $config->getTables(),
            $config->getMapping(),
            $config->getUsername(),
            $config->getPassword(),
            $config->getGeometrySrid()
        );
        $prefix = sprintf('phpcrudapi-%s-', substr($config->getUID(), 0, 8));
        $cache = CacheFactory::create($config->getCacheType(), $prefix, $config->getCachePath());
        $reflection = new ReflectionService($db, $cache, $config->getCacheTime());
        $responder = new JsonResponder($config->getJsonOptions(), $config->getDebug());
        $router = new SimpleRouter($config->getBasePath(), $responder, $cache, $config->getCacheTime());
        foreach ($config->getMiddlewares() as $middleware) {
            switch ($middleware) {
                case 'sslRedirect':
                    new SslRedirectMiddleware($router, $responder, $config, $middleware);
                    break;
                case 'cors':
                    new CorsMiddleware($router, $responder, $config, $middleware);
                    break;
                case 'firewall':
                    new FirewallMiddleware($router, $responder, $config, $middleware);
                    break;
                case 'apiKeyAuth':
                    new ApiKeyAuthMiddleware($router, $responder, $config, $middleware);
                    break;
                case 'apiKeyDbAuth':
                    new ApiKeyDbAuthMiddleware($router, $responder, $config, $middleware, $reflection, $db);
                    break;
                case 'basicAuth':
                    new BasicAuthMiddleware($router, $responder, $config, $middleware);
                    break;
                case 'jwtAuth':
                    new JwtAuthMiddleware($router, $responder, $config, $middleware);
                    break;
                case 'dbAuth':
                    new DbAuthMiddleware($router, $responder, $config, $middleware, $reflection, $db);
                    break;
                case 'wpAuth':
                    new WpAuthMiddleware($router, $responder, $config, $middleware);
                    break;
                case 'reconnect':
                    new ReconnectMiddleware($router, $responder, $config, $middleware, $reflection, $db);
                    break;
                case 'validation':
                    new ValidationMiddleware($router, $responder, $config, $middleware, $reflection);
                    break;
                case 'ipAddress':
                    new IpAddressMiddleware($router, $responder, $config, $middleware, $reflection);
                    break;
                case 'sanitation':
                    new SanitationMiddleware($router, $responder, $config, $middleware, $reflection);
                    break;
                case 'multiTenancy':
                    new MultiTenancyMiddleware($router, $responder, $config, $middleware, $reflection);
                    break;
                case 'authorization':
                    new AuthorizationMiddleware($router, $responder, $config, $middleware, $reflection);
                    break;
                case 'xsrf':
                    new XsrfMiddleware($router, $responder, $config, $middleware);
                    break;
                case 'pageLimits':
                    new PageLimitsMiddleware($router, $responder, $config, $middleware, $reflection);
                    break;
                case 'joinLimits':
                    new JoinLimitsMiddleware($router, $responder, $config, $middleware, $reflection);
                    break;
                case 'customization':
                    new CustomizationMiddleware($router, $responder, $config, $middleware, $reflection);
                    break;
                case 'textSearch':
                    new TextSearchMiddleware($router, $responder, $config, $middleware, $reflection);
                    break;
                case 'xml':
                    new XmlMiddleware($router, $responder, $config, $middleware);
                    break;
                case 'json':
                    new JsonMiddleware($router, $responder, $config, $middleware);
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
                    $openApi = new OpenApiService($reflection, $config->getOpenApiBase(), $config->getControllers(), $config->getCustomOpenApiBuilders());
                    new OpenApiController($router, $responder, $openApi);
                    break;
                case 'geojson':
                    $records = new RecordService($db, $reflection);
                    $geoJson = new GeoJsonService($reflection, $records);
                    new GeoJsonController($router, $responder, $geoJson);
                    break;
                case 'status':
                    new StatusController($router, $responder, $cache, $db);
                    break;
            }
        }
        foreach ($config->getCustomControllers() as $className) {
            if (class_exists($className)) {
                new $className($router, $responder, $db, $reflection, $cache);
            }
        }
        $this->router = $router;
    }

    private function parseBody(string $body) /*: ?object*/
    {
        $first = substr(ltrim($body), 0, 1);
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
        $parsedBody = $request->getParsedBody();
        if ($parsedBody) {
            $request = $this->applyParsedBodyHack($request);
        } else {
            $body = $request->getBody();
            if ($body->isReadable()) {
                if ($body->isSeekable()) {
                    $body->rewind();
                }
                $contents = $body->getContents();
                if ($body->isSeekable()) {
                    $body->rewind();
                }
                if ($contents) {
                    $parsedBody = $this->parseBody($contents);
                    $request = $request->withParsedBody($parsedBody);
                }
            }
        }
        return $request;
    }

    private function applyParsedBodyHack(ServerRequestInterface $request): ServerRequestInterface
    {
        $parsedBody = $request->getParsedBody();
        if (is_array($parsedBody)) { // is it really?
            $contents = json_encode($parsedBody);
            $parsedBody = $this->parseBody($contents);
            $request = $request->withParsedBody($parsedBody);
        }
        return $request;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return $this->router->route($this->addParsedBody($request));
    }
}
