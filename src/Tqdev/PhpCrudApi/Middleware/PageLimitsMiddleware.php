<?php
namespace Tqdev\PhpCrudApi\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\RequestUtils;

class PageLimitsMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $next): ResponseInterface
    {
        $operation = RequestUtils::getOperation($request);
        if ($operation == 'list') {
            $params = RequestUtils::getParams($request);
            $maxPage = (int) $this->getProperty('pages', '100');
            if (isset($params['page']) && $params['page'] && $maxPage > 0) {
                if (strpos($params['page'][0], ',') === false) {
                    $page = $params['page'][0];
                } else {
                    list($page, $size) = explode(',', $params['page'][0], 2);
                }
                if ($page > $maxPage) {
                    return $this->responder->error(ErrorCode::PAGINATION_FORBIDDEN, '');
                }
            }
            $maxSize = (int) $this->getProperty('records', '1000');
            if (!isset($params['size']) || !$params['size'] && $maxSize > 0) {
                $params['size'] = array($maxSize);
            } else {
                $params['size'] = array(min($params['size'][0], $maxSize));
            }
            $request = RequestUtils::setParams($request, $params);
        }
        return $next->handle($request);
    }
}
