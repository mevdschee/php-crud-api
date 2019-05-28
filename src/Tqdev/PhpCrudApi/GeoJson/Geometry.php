<?php
namespace Tqdev\PhpCrudApi\GeoJson;

class Geometry implements \JsonSerializable
{
    private $type;
    private $geometry;

    public static $types = [
        "Point",
        "MultiPoint",
        "LineString",
        "MultiLineString",
        "Polygon",
        "MultiPolygon",
        //"GeometryCollection",
    ];

    public function __construct(string $type, array $coordinates)
    {
        $this->type = $type;
        $this->coordinates = $coordinates;
    }

    public static function fromWkt(string $wkt): Geometry
    {
        $bracket = strpos($wkt, '(');
        $type = strtoupper(trim(substr($wkt, 0, $bracket)));
        $supported = false;
        foreach (Geometry::$types as $typeName) {
            if (strtoupper($typeName) == $type) {
                $type = $typeName;
                $supported = true;
            }
        }
        if (!$supported) {
            throw new \Exception('Geometry type not supported: ' . $type);
        }
        $coordinates = substr($wkt, $bracket);
        if (substr($type, -5) != 'Point' || ($type == 'MultiPoint' && $coordinates[1] != '(')) {
            $coordinates = preg_replace('|([0-9\-\.]+ )+([0-9\-\.]+)|', '[\1\2]', $coordinates);
        }
        $coordinates = str_replace(['(', ')', ', ', ' '], ['[', ']', ',', ','], $coordinates);
        $json = $coordinates;
        $coordinates = json_decode($coordinates);
        if (!$coordinates) {
            throw new \Exception('Could not decode WKT: ' . $wkt);
        }
        return new Geometry($type, $coordinates);
    }

    public function serialize()
    {
        return [
            'type' => $this->type,
            'coordinates' => $this->coordinates,
        ];
    }

    public function jsonSerialize()
    {
        return $this->serialize();
    }
}
