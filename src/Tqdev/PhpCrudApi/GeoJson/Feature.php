<?php
namespace Tqdev\PhpCrudApi\GeoJson;

class Feature implements \JsonSerializable
{
    private $id;
    private $properties;
    private $geometry;

    public function __construct($id, array $properties, /*?Geometry*/ $geometry)
    {
        $this->id = $id;
        $this->properties = $properties;
        $this->geometry = $geometry;
    }

    public function serialize()
    {
        return [
            'type' => 'Feature',
            'id' => $this->id,
            'properties' => $this->properties,
            'geometry' => $this->geometry,
        ];
    }

    public function jsonSerialize()
    {
        return $this->serialize();
    }
}
