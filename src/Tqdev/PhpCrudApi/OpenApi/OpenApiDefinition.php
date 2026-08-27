<?php

namespace Tqdev\PhpCrudApi\OpenApi;

class OpenApiDefinition implements \JsonSerializable
{
    private $root;

    public function __construct(array $base)
    {
        $this->root = $base;
    }

    public function set(string $path, $value) /*: void*/
    {
        $parts = explode('|', $path);
        $current = &$this->root;
        while (count($parts) > 0) {
            $part = array_shift($parts);
            if ($part === '') {
                $part = count($current);
            } 
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

    /**
     * The xml middleware accepts and returns the same documents as xml when the
     * "format" parameter asks for it, which the document reports by listing the
     * xml content type next to the json one on every request and response.
     */
    public function copyContentType(string $from, string $to) /*: void*/
    {
        $this->copyContentTypeIn($this->root, $from, $to);
    }

    private function copyContentTypeIn(array &$node, string $from, string $to) /*: void*/
    {
        foreach ($node as $key => &$value) {
            if (!is_array($value)) {
                continue;
            }
            if ($key === 'content' && isset($value[$from])) {
                if (!isset($value[$to])) {
                    $value[$to] = $value[$from];
                }
            } else {
                $this->copyContentTypeIn($value, $from, $to);
            }
        }
        unset($value);
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return $this->root;
    }
}
