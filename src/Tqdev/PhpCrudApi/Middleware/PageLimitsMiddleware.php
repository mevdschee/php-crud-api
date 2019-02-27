<?php
namespace Tqdev\PhpCrudApi\Middleware;

use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\Record\RequestUtils;
use Tqdev\PhpCrudApi\Request;
use Tqdev\PhpCrudApi\Response;

class PageLimitsMiddleware extends Middleware
{
    private $reflection;

    public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection)
    {
        parent::__construct($router, $responder, $properties);
        $this->reflection = $reflection;
        $this->utils = new RequestUtils($reflection);
    }

    public function handle(Request $request): Response
    {
        $operation = $this->utils->getOperation($request);
        if ($operation == 'list') {
            $params = $request->getParams();
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
            $request->setParams($params);
        }
        return $this->next->handle($request);
    }
}
