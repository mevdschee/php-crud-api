<?php
namespace Tqdev\PhpCrudApi\Middleware\Base;

use Tqdev\PhpCrudApi\Request;
use Tqdev\PhpCrudApi\Response;

interface Handler
{
    public function handle(Request $request): Response;
}
