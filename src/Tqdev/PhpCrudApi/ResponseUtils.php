<?php
namespace Tqdev\PhpCrudApi;

use Psr\Http\Message\ResponseInterface;

class ResponseUtils
{
    public static function output(ResponseInterface $response)
    {
        $status = $response->getStatusCode();
        $headers = $response->getHeaders();
        $body = $response->getBody()->getContents();

        http_response_code($status);
        foreach ($headers as $key => $values) {
            foreach ($values as $value) {
                header("$key: $value");
            }
        }
        echo $body;
    }

    public static function addExceptionHeaders(ResponseInterface $response, \Throwable $e): ResponseInterface
    {
        $response = $response->withHeader('X-Exception-Name', get_class($e));
        $response = $response->withHeader('X-Exception-Message', preg_replace('|\n|', ' ', trim($e->getMessage())));
        $response = $response->withHeader('X-Exception-File', $e->getFile() . ':' . $e->getLine());
        return $response;
    }

    public static function toString(ResponseInterface $response): string
    {
        $status = $response->getStatusCode();
        $headers = $response->getHeaders();
        $body = $response->getBody()->getContents();

        $str = "$status\n";
        foreach ($headers as $key => $values) {
            foreach ($values as $value) {
                $str .= "$key: $value\n";
            }
        }
        if ($body !== '') {
            $str .= "\n";
            $str .= "$body\n";
        }
        return $str;
    }
}
