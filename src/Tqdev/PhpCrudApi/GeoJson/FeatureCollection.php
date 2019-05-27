<?php
namespace Tqdev\PhpCrudApi\GeoJson;

use Tqdev\PhpCrudApi\Record\Document\ListDocument;

class FeatureCollection implements \JsonSerializable
{
    private $features;

    public function __construct(array $features)
    {
        $this->features = $features;
    }

    public static function fromListDocument(ListDocument $records, string $geometryColumnName): FeatureCollection
    {
        $features = array();
        foreach ($records->getRecords() as $record) {
            if (isset($record[$geometryColumnName])) {
                $geometry = Geometry::fromWkt($record[$geometryColumnName]);
                unset($record[$geometryColumnName]);
                $features[] = new Feature($record, $geometry);
            }
        }
        return new FeatureCollection($features);
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
