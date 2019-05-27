<?php
namespace Tqdev\PhpCrudApi\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\RequestUtils;

class JwtAuthMiddleware extends Middleware
{
    private function getVerifiedClaims(array $token, int $time, int $leeway, int $ttl, string $secret, array $requirements, string $algorithm): array
    {
        $algorithms = array(
            'HS256' => 'sha256',
            'HS384' => 'sha384',
            'HS512' => 'sha512',
            'RS256' => 'sha256',
            'RS384' => 'sha384',
            'RS512' => 'sha512',
        );
        if (!isset($algorithms[$algorithm])) {
            return array();
        }
        if (!empty($requirements['alg']) && !in_array($algorithm, $requirements['alg'])) {
            return array();
        }
        $hmac = $algorithms[$algorithm];
        $signature = $this->decodeTokenChunk($token[2], false);
        $data = "$token[0].$token[1]";
        switch ($algorithm[0]) {
            case 'H':
                $hash = hash_hmac($hmac, $data, $secret, true);
                if (function_exists('hash_equals')) {
                    $equals = hash_equals($signature, $hash);
                } else {
                    $equals = $signature == $hash;
                }
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
        $claims = $this->decodeTokenChunk($token[1]);
        if (!$claims) {
            return array();
        }
        foreach ($requirements as $field => $values) {
            if (!empty($values)) {
                if ($field != 'alg') {
                    if (!isset($claims[$field]) || !in_array($claims[$field], $values)) {
                        return array();
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
        $secret = $this->getProperty('secret', '');
        $requirements = array(
            'alg' => $this->getArrayProperty('algorithms', ''),
            'aud' => $this->getArrayProperty('audiences', ''),
            'iss' => $this->getArrayProperty('issuers', ''),
        );
        $token = explode('.', $token);
        if (count($token) < 3) {
            return array();
        }
        $header = $this->decodeTokenChunk($token[0]);
        if ($header['typ'] != 'JWT') {
            return array();
        }
        if (!$secret) {
            return array();
        } else if (is_array($secret)) {
            if (!isset($header['kid']) || !isset($secret[$header['kid']])) {
                return array();
            }
            $secret = $secret[$header['kid']];
        }
        $algorithm = $header['alg'];
        return $this->getVerifiedClaims($token, $time, $leeway, $ttl, $secret, $requirements, $algorithm);
    }

    private function decodeTokenChunk($tokenChunk, $isJson = true)
    {
        $decoded = base64_decode(strtr($tokenChunk, '-_', '+/'));
        if ($isJson) {
            $decoded = json_decode($decoded, true);
        }
        return $decoded;
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
            session_start();
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
