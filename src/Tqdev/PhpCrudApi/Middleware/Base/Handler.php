<?php
namespace Tqdev\PhpCrudApi\Middleware\Base;

use Psr\Http\Message\ServerRequestInterface;
use Tqdev\PhpCrudApi\Response;

interface Handler
{
    public function handle(ServerRequestInterface $request): Response;
}
