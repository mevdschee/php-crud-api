<?php
namespace Tqdev\PhpCrudApi;

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ResponseInterface;

class ResponseFactory
{
    const OK = 200;
    const UNAUTHORIZED = 401;
    const FORBIDDEN = 403;
    const NOT_FOUND = 404;
    const METHOD_NOT_ALLOWED = 405;
    const CONFLICT = 409;
    const UNPROCESSABLE_ENTITY = 422;
    const INTERNAL_SERVER_ERROR = 500;

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
