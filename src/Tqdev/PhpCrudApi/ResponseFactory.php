<?php

namespace Tqdev\PhpCrudApi;

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ResponseInterface;

class ResponseFactory
{
    public const OK = 200;
    public const UNAUTHORIZED = 401;
    public const FORBIDDEN = 403;
    public const NOT_FOUND = 404;
    public const METHOD_NOT_ALLOWED = 405;
    public const CONFLICT = 409;
    public const UNPROCESSABLE_ENTITY = 422;
    public const INTERNAL_SERVER_ERROR = 500;

    public static function fromHtml(int $status, string $html): ResponseInterface
    {
        return self::from($status, 'text/html', $html);
    }

    public static function fromObject(int $status, $body): ResponseInterface
    {
        $content = json_encode($body, JSON_UNESCAPED_UNICODE);
        return self::from($status, 'application/json', $content);
    }

    private static function from(int $status, string $contentType, string $content): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();
        $response = $psr17Factory->createResponse($status);
        $stream = $psr17Factory->createStream($content);
        $stream->rewind();
        $response = $response->withBody($stream);
        $response = $response->withHeader('Content-Type', $contentType);
        $response = $response->withHeader('Content-Length', strlen($content));
        return $response;
    }

    public static function fromStatus(int $status): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();
        return $psr17Factory->createResponse($status);
    }
}
