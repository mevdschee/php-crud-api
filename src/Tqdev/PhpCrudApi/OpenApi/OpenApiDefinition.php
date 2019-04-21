<?php
namespace Tqdev\PhpCrudApi\OpenApi;

class OpenApiDefinition implements \JsonSerializable
{
    private $root;

    public function __construct($base)
    {
        $this->root = $base;
    }

    public function set(string $path, $value) /*: void*/
    {
        $parts = explode('|', trim($path, '|'));
        $current = &$this->root;
        while (count($parts) > 0) {
            $part = array_shift($parts);
            if (!isset($current[$part])) {
                $current[$part] = [];
            }
            $current = &$current[$part];
        }
        $current = $value;
    }

    public function has(string $path): bool
    {
        $parts = explode('|', trim($path, '|'));
        $current = &$this->root;
        while (count($parts) > 0) {
            $part = array_shift($parts);
            if (!isset($current[$part])) {
                return false;
            }
            $current = &$current[$part];
        }
        return true;
    }

    public function jsonSerialize()
    {
        return $this->root;
    }
}
