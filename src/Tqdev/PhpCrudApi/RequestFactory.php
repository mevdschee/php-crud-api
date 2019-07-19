<?php
namespace Tqdev\PhpCrudApi;

use Nyholm\Psr7Server\ServerRequestCreator;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ServerRequestInterface;

class RequestFactory
{
    public static function fromGlobals(): ServerRequestInterface
    {
        $psr17Factory = new Psr17Factory();
        $creator = new ServerRequestCreator($psr17Factory, $psr17Factory, $psr17Factory, $psr17Factory);
        $serverRequest = $creator->fromGlobals();
        $stream = $psr17Factory->createStreamFromFile('php://input');
        $serverRequest = $serverRequest->withBody($stream);
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
        }
        return $serverRequest;
    }
}
