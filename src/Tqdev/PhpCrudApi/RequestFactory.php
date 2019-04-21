<?php
namespace Tqdev\PhpCrudApi;

use Nyholm\Psr7Server\ServerRequestCreator;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ServerRequestInterface;

class RequestFactory
{
    private static function parseBody(string $body) /*: ?object*/
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

    public static function fromGlobals(): ServerRequestInterface
    {
        $psr17Factory = new Psr17Factory();
        $creator = new ServerRequestCreator($psr17Factory, $psr17Factory, $psr17Factory, $psr17Factory);
        $serverRequest = $creator->fromGlobals();
        $uri = '';
        if (isset($_SERVER['PATH_INFO'])) {
            $uri .= $_SERVER['PATH_INFO'];
        }
        if (isset($_SERVER['QUERY_STRING'])) {
            $uri .= '?' . $_SERVER['QUERY_STRING'];
        }
        if ($uri) {
            $serverRequest = $serverRequest->withUri($psr17Factory->createUri($uri));
        }
        $body = file_get_contents('php://input');
        if ($body) {
            $serverRequest = $serverRequest->withParsedBody(self::parseBody($body));
        }
        return $serverRequest;
    }

    public static function fromString(string $request): ServerRequestInterface
    {
        $parts = explode("\n\n", trim($request), 2);
        $lines = explode("\n", $parts[0]);
        $first = explode(' ', trim(array_shift($lines)), 2);
        $method = $first[0];
        $body = isset($parts[1]) ? $parts[1] : '';
        $url = isset($first[1]) ? $first[1] : '';

        $psr17Factory = new Psr17Factory();
        $serverRequest = $psr17Factory->createServerRequest($method, $url);
        foreach ($lines as $line) {
            list($key, $value) = explode(':', $line, 2);
            $serverRequest = $serverRequest->withAddedHeader($key, $value);
        }
        if ($body) {
            $stream = $psr17Factory->createStream($body);
            $stream->rewind();
            $serverRequest = $serverRequest->withBody($stream);
            $serverRequest = $serverRequest->withParsedBody(self::parseBody($body));
        }
        return $serverRequest;
    }
}
