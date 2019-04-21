<?php
namespace Tqdev\PhpCrudApi\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Record\ErrorCode;

class FirewallMiddleware extends Middleware
{
    private function ipMatch(string $ip, string $cidr): bool
    {
        if (strpos($cidr, '/') !== false) {
            list($subnet, $mask) = explode('/', trim($cidr));
            if ((ip2long($ip) & ~((1 << (32 - $mask)) - 1)) == ip2long($subnet)) {
                return true;
            }
        } else {
            if (ip2long($ip) == ip2long($cidr)) {
                return true;
            }
        }
        return false;
    }

    private function isIpAllowed(string $ipAddress, string $allowedIpAddresses): bool
    {
        foreach (explode(',', $allowedIpAddresses) as $allowedIp) {
            if ($this->ipMatch($ipAddress, $allowedIp)) {
                return true;
            }
        }
        return false;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $next): ResponseInterface
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
            $response = $this->responder->error(ErrorCode::TEMPORARY_OR_PERMANENTLY_BLOCKED, '');
        } else {
            $response = $next->handle($request);
        }
        return $response;
    }
}
