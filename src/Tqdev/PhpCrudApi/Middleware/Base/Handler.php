<?php
namespace Tqdev\PhpCrudApi\Middleware\Base;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

interface Handler
{
    public function handle(ServerRequestInterface $request): ResponseInterface;
}
