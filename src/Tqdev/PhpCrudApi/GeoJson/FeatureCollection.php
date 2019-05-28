<?php
namespace Tqdev\PhpCrudApi\GeoJson;

class FeatureCollection implements \JsonSerializable
{
    private $features;

    private $results;

    public function __construct(array $features, int $results)
    {
        $this->features = $features;
        $this->results = $results;
    }

    public function serialize()
    {
        return [
            'type' => 'FeatureCollection',
            'features' => $this->features,
            'results' => $this->results,
        ];
    }

    public function jsonSerialize()
    {
        return array_filter($this->serialize(), function ($v) {
            return $v !== 0;
        });
    }
}
