<?php

namespace Tqdev\PhpCrudApi\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\RequestUtils;

class JwtAuthMiddleware extends Middleware
{
    private function getVerifiedClaims(string $token, int $time, int $leeway, int $ttl, array $secrets, array $requirements): array
    {
        $algorithms = array(
            'HS256' => 'sha256',
            'HS384' => 'sha384',
            'HS512' => 'sha512',
            'RS256' => 'sha256',
            'RS384' => 'sha384',
            'RS512' => 'sha512',
        );
        $token = explode('.', $token);
        if (count($token) < 3) {
            return array();
        }
        $header = json_decode(base64_decode(strtr($token[0], '-_', '+/')), true);
        $kid = 0;
        if (isset($header['kid'])) {
            $kid = $header['kid'];
        }
        if (!isset($secrets[$kid])) {
            return array();
        }
        $secret = $secrets[$kid];
        if ($header['typ'] != 'JWT') {
            return array();
        }
        $algorithm = $header['alg'];
        if (!isset($algorithms[$algorithm])) {
            return array();
        }
        if (!empty($requirements['alg']) && !in_array($algorithm, $requirements['alg'])) {
            return array();
        }
        $hmac = $algorithms[$algorithm];
        $signature = base64_decode(strtr($token[2], '-_', '+/'));
        $data = "$token[0].$token[1]";
        switch ($algorithm[0]) {
            case 'H':
                $hash = hash_hmac($hmac, $data, $secret, true);
                $equals = hash_equals($hash, $signature);
                if (!$equals) {
                    return array();
                }
                break;
            case 'R':
                $equals = openssl_verify($data, $signature, $secret, $hmac) == 1;
                if (!$equals) {
                    return array();
                }
                break;
        }
        $claims = json_decode(base64_decode(strtr($token[1], '-_', '+/')), true);
        if (!$claims) {
            return array();
        }
        foreach ($requirements as $field => $values) {
            if (!empty($values)) {
                if ($field != 'alg') {
                    if (!isset($claims[$field])) {
                        return array();
                    }
                    if (is_array($claims[$field])) {
                        if (!array_intersect($claims[$field], $values)) {
                            return array();
                        }
                    } else {
                        if (!in_array($claims[$field], $values)) {
                            return array();
                        }
                    }
                }
            }
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

    private function getClaims(string $token): array
    {
        $time = (int) $this->getProperty('time', time());
        $leeway = (int) $this->getProperty('leeway', '5');
        $ttl = (int) $this->getProperty('ttl', '30');
        $secrets = $this->getMapProperty('secrets', '');
        if (!$secrets) {
            $secrets = [$this->getProperty('secret', '')];
        }
        $requirements = array(
            'alg' => $this->getArrayProperty('algorithms', ''),
            'aud' => $this->getArrayProperty('audiences', ''),
            'iss' => $this->getArrayProperty('issuers', ''),
        );
        return $this->getVerifiedClaims($token, $time, $leeway, $ttl, $secrets, $requirements);
    }

    private function getAuthorizationToken(ServerRequestInterface $request): string
    {
        $headerName = $this->getProperty('header', 'X-Authorization');
        $headerValue = RequestUtils::getHeader($request, $headerName);
        $parts = explode(' ', trim($headerValue), 2);
        if (count($parts) != 2) {
            return '';
        }
        if ($parts[0] != 'Bearer') {
            return '';
        }
        return $parts[1];
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $next): ResponseInterface
    {
        if (session_status() == PHP_SESSION_NONE) {
            if (!headers_sent()) {
                $sessionName = $this->getProperty('sessionName', '');
                if ($sessionName) {
                    session_name($sessionName);
                }
                if (!ini_get('session.cookie_samesite')) {
                    ini_set('session.cookie_samesite', 'Lax');
                }
                if (!ini_get('session.cookie_httponly')) {
                    ini_set('session.cookie_httponly', 1);
                }
                if (!ini_get('session.cookie_secure') && isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
                    ini_set('session.cookie_secure', 1);
                }
                session_start();
            }
        }
        $token = $this->getAuthorizationToken($request);
        if ($token) {
            $claims = $this->getClaims($token);
            $_SESSION['claims'] = $claims;
            if (empty($claims)) {
                return $this->responder->error(ErrorCode::AUTHENTICATION_FAILED, 'JWT');
            }
            if (!headers_sent()) {
                session_regenerate_id();
            }
        }
        if (empty($_SESSION['claims'])) {
            $authenticationMode = $this->getProperty('mode', 'required');
            if ($authenticationMode == 'required') {
                return $this->responder->error(ErrorCode::AUTHENTICATION_REQUIRED, '');
            }
        }
        return $next->handle($request);
    }
}
