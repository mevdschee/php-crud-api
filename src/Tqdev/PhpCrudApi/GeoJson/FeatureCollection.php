<?php
namespace Tqdev\PhpCrudApi\GeoJson;

class FeatureCollection implements \JsonSerializable
{
    private $features;

    public function __construct(array $features)
    {
        $this->features = $features;
    }

    public function serialize()
    {
        return [
            'type' => 'FeatureCollection',
            'features' => $this->features,
        ];
    }

    public function jsonSerialize()
    {
        return $this->serialize();
    }
}
