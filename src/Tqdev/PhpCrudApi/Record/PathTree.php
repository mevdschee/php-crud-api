<?php
namespace Tqdev\PhpCrudApi\Record;

class PathTree
{

    private $values = array();

    private $branches = array();

    public function getValues(): array
    {
        return $this->values;
    }

    public function put(array $path, $value)
    {
        if (count($path) == 0) {
            $this->values[] = $value;
            return;
        }
        $key = array_shift($path);
        if (!isset($this->branches[$key])) {
            $this->branches[$key] = new PathTree();
        }
        $tree = $this->branches[$key];
        $tree->put($path, $value);
    }

    public function getKeys(): array
    {
        return array_keys($this->branches);
    }

    public function has($key): bool
    {
        return isset($this->branches[$key]);
    }

    public function get($key): PathTree
    {
        return $this->branches[$key];
    }
}
