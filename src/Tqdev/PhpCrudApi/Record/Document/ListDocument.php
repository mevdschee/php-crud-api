<?php

namespace Tqdev\PhpCrudApi\Record\Document;

class ListDocument implements \JsonSerializable
{
    private $records;

    private $results;

    public function __construct(array $records, int $results)
    {
        $this->records = $records;
        $this->results = $results;
    }

    public function getRecords(): array
    {
        return $this->records;
    }

    public function getResults(): int
    {
        return $this->results;
    }

    public function serialize()
    {
        return [
            'records' => $this->records,
            'results' => $this->results,
        ];
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return array_filter($this->serialize(), function ($v) {
            return $v !== -1;
        });
    }
}
