<?php

namespace Tqdev\PhpCrudApi\Config\Base;

interface ConfigInterface
{
    public function getMiddlewares();
    public function getProperty(string $key, $default = '');
}
