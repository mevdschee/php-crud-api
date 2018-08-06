<?php
namespace Tqdev\PhpCrudApi\Middleware;

use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\Request;
use Tqdev\PhpCrudApi\Response;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;

class FirewallMiddleware extends Middleware
{
    private function isIpAllowed(String $ipAddress, String $allowedIpAddresses): bool
    {
        foreach (explode(',', $allowedIpAddresses) as $allowedIp) {
            if ($ipAddress == trim($allowedIp)) {
                return true;
            }
        }
        return false;
    }

    public function handle(Request $request): Response
    {
        $reverseProxy = $this->getProperty('reverseProxy', '');
        if ($reverseProxy) {
            $ipAddress = array_pop(explode(',', $request->getHeader('X-Forwarded-For')));
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ipAddress = $_SERVER['REMOTE_ADDR'];
        } else {
            $ipAddress = '127.0.0.1';
        }
        $allowedIpAddresses = $this->getProperty('allowedIpAddresses', '');
        if (!$this->isIpAllowed($ipAddress, $allowedIpAddresses)) {
            $response = $this->responder->error(ErrorCode::ACCESS_DENIED, $ipAddress);
        } else {
            $response = $this->next->handle($request);
        }
        return $response;
    }
}
