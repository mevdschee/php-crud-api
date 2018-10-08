<?php
namespace Tqdev\PhpCrudApi\Middleware;

use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\Request;
use Tqdev\PhpCrudApi\Response;

class JwtAuthMiddleware extends Middleware
{
    private function getVerifiedClaims(String $token, int $time, int $leeway, int $ttl, String $secret): array
    {
        $algorithms = array('HS256' => 'sha256', 'HS384' => 'sha384', 'HS512' => 'sha512');
        $token = explode('.', $token);
        if (count($token) < 3) {
            return array();
        }
        $header = json_decode(base64_decode(strtr($token[0], '-_', '+/')), true);
        if (!$secret) {
            return array();
        }
        if ($header['typ'] != 'JWT') {
            return array();
        }
        $algorithm = $header['alg'];
        if (!isset($algorithms[$algorithm])) {
            return array();
        }
        $hmac = $algorithms[$algorithm];
        $signature = bin2hex(base64_decode(strtr($token[2], '-_', '+/')));
        if ($signature != hash_hmac($hmac, "$token[0].$token[1]", $secret)) {
            return array();
        }
        $claims = json_decode(base64_decode(strtr($token[1], '-_', '+/')), true);
        if (!$claims) {
            return array();
        }
        if (isset($claims['nbf']) && $time + $leeway < $claims['nbf']) {
            return array();
        }
        if (isset($claims['iat']) && $time + $leeway < $claims['iat']) {
            return array();
        }
        if (isset($claims['exp']) && $time - $leeway > $claims['exp']) {
            return array();
        }
        if (isset($claims['iat']) && !isset($claims['exp'])) {
            if ($time - $leeway > $claims['iat'] + $ttl) {
                return array();
            }
        }
        return $claims;
    }

    private function getClaims(String $token): array
    {
        $time = (int) $this->getProperty('time', time());
        $leeway = (int) $this->getProperty('leeway', '5');
        $ttl = (int) $this->getProperty('ttl', '30');
        $secret = $this->getProperty('secret', '');
        if (!$secret) {
            return array();
        }
        return $this->getVerifiedClaims($token, $time, $leeway, $ttl, $secret);
    }

    private function getAuthorizationToken(Request $request): String
    {
        $parts = explode(' ', trim($request->getHeader('Authorization')), 2);
        if (count($parts) != 2) {
            return '';
        }
        if ($parts[0] != 'Bearer') {
            return '';
        }
        return $parts[1];
    }

    public function handle(Request $request): Response
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $token = $this->getAuthorizationToken($request);
        if ($token) {
            $claims = $this->getClaims($token);
            $_SESSION['claims'] = $claims;
            if (empty($claims)) {
                return $this->responder->error(ErrorCode::AUTHENTICATION_FAILED, 'JWT');
            }
        }
        if (empty($_SESSION['claims'])) {
            $authenticationMode = $this->getProperty('mode', 'required');
            if ($authenticationMode == 'required') {
                return $this->responder->error(ErrorCode::AUTHENTICATION_REQUIRED, '');
            }
        }
        return $this->next->handle($request);
    }
}
