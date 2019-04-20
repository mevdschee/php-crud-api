<?php
namespace Tqdev\PhpCrudApi\Record;

class PathTree implements \JsonSerializable
{
    const WILDCARD = '*';

    private $tree;

    public function __construct( /* object */&$tree = null)
    {
        if (!$tree) {
            $tree = $this->newTree();
        }
        $this->tree = &$tree;
    }

    public function newTree()
    {
        return (object) ['values' => [], 'branches' => (object) []];
    }

    public function getKeys(): array
    {
        $branches = (array) $this->tree->branches;
        return array_keys($branches);
    }

    public function getValues(): array
    {
        return $this->tree->values;
    }

    public function get(string $key): PathTree
    {
        if (!isset($this->tree->branches->$key)) {
            return null;
        }
        return new PathTree($this->tree->branches->$key);
    }

    public function put(array $path, $value)
    {
        $tree = &$this->tree;
        foreach ($path as $key) {
            if (!isset($tree->branches->$key)) {
                $tree->branches->$key = $this->newTree();
            }
            $tree = &$tree->branches->$key;
        }
        $tree->values[] = $value;
    }

    public function match(array $path): array
    {
        $star = self::WILDCARD;
        $tree = &$this->tree;
        foreach ($path as $key) {
            if (isset($tree->branches->$key)) {
                $tree = &$tree->branches->$key;
            } else if (isset($tree->branches->$star)) {
                $tree = &$tree->branches->$star;
            } else {
                return [];
            }
        }
        return $tree->values;
    }

    public static function fromJson( /* object */$tree): PathTree
    {
        return new PathTree($tree);
    }

    public function jsonSerialize()
    {
        return $this->tree;
    }
}
