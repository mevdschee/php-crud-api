<?php
namespace Tqdev\PhpCrudApi\Controller;

use Psr\Http\Message\ResponseInterface;

interface Responder
{
    public function error(int $error, string $argument, $details = null): ResponseInterface;

    public function success($result): ResponseInterface;

}
