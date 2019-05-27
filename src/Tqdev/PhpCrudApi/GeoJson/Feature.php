<?php
namespace Tqdev\PhpCrudApi\GeoJson;

class Feature implements \JsonSerializable
{
    private $properties;
    private $geometry;

    public function __construct(array $properties, Geometry $geometry)
    {
        $this->properties = $properties;
        $this->geometry = $geometry;
    }

    public function serialize()
    {
        return [
            'type' => 'Feature',
            'properties' => $this->properties,
            'geometry' => $this->geometry,
        ];
    }

    public function jsonSerialize()
    {
        return $this->serialize();
    }
}
