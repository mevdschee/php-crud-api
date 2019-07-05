<?php
namespace Tqdev\PhpCrudApi\GeoJson;

use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\GeoJson\FeatureCollection;
use Tqdev\PhpCrudApi\Record\RecordService;

class GeoJsonService
{
    private $reflection;
    private $records;

    public function __construct(ReflectionService $reflection, RecordService $records)
    {
        $this->reflection = $reflection;
        $this->records = $records;
    }

    public function hasTable(string $table): bool
    {
        return $this->reflection->hasTable($table);
    }

    public function getType(string $table): string
    {
        return $this->reflection->getType($table);
    }

    private function getGeometryColumnName(string $tableName, array &$params): string
    {
        $geometryParam = isset($params['geometry']) ? $params['geometry'][0] : '';
        $table = $this->reflection->getTable($tableName);
        $geometryColumnName = '';
        foreach ($table->getColumnNames() as $columnName) {
            if ($geometryParam && $geometryParam != $columnName) {
                continue;
            }
            $column = $table->getColumn($columnName);
            if ($column->isGeometry()) {
                $geometryColumnName = $columnName;
                break;
            }
        }
        if ($geometryColumnName) {
            $params['mandatory'][] = $tableName . "." . $geometryColumnName;
        }
        return $geometryColumnName;
    }

    private function setBoudingBoxFilter(string $geometryColumnName, array &$params)
    {
        $boundingBox = isset($params['bbox']) ? $params['bbox'][0] : '';
        if ($boundingBox) {
            $c = explode(',', $boundingBox);
            if (!isset($params['filter'])) {
                $params['filter'] = array();
            }
            $params['filter'][] = "$geometryColumnName,sin,POLYGON(($c[0] $c[1],$c[2] $c[1],$c[2] $c[3],$c[0] $c[3],$c[0] $c[1]))";
        }
        $tile = isset($params['tile']) ? $params['tile'][0] : '';
        if ($tile) {
            $zxy = explode(',', $tile);
            if (count($zxy) == 3) {
                list($z, $x, $y) = $zxy;
                $c = array();
                $c = array_merge($c, $this->convertTileToLatLonOfUpperLeftCorner($z, $x, $y));
                $c = array_merge($c, $this->convertTileToLatLonOfUpperLeftCorner($z, $x + 1, $y + 1));
                $params['filter'][] = "$geometryColumnName,sin,POLYGON(($c[0] $c[1],$c[2] $c[1],$c[2] $c[3],$c[0] $c[3],$c[0] $c[1]))";
            }
        }
    }

    private function convertTileToLatLonOfUpperLeftCorner($z, $x, $y): array
    {
        $n = pow(2, $z);
        $lon = $x / $n * 360.0 - 180.0;
        $lat = rad2deg(atan(sinh(pi() * (1 - 2 * $y / $n))));
        return [$lon, $lat];
    }

    private function convertRecordToFeature( /*object*/$record, string $primaryKeyColumnName, string $geometryColumnName)
    {
        $id = null;
        if ($primaryKeyColumnName) {
            $id = $record[$primaryKeyColumnName];
        }
        $geometry = null;
        if (isset($record[$geometryColumnName])) {
            $geometry = Geometry::fromWkt($record[$geometryColumnName]);
        }
        $properties = array_diff_key($record, [$primaryKeyColumnName => true, $geometryColumnName => true]);
        return new Feature($id, $properties, $geometry);
    }

    private function getPrimaryKeyColumnName(string $tableName, array &$params): string
    {
        $primaryKeyColumn = $this->reflection->getTable($tableName)->getPk();
        if (!$primaryKeyColumn) {
            return '';
        }
        $primaryKeyColumnName = $primaryKeyColumn->getName();
        $params['mandatory'][] = $tableName . "." . $primaryKeyColumnName;
        return $primaryKeyColumnName;
    }

    public function _list(string $tableName, array $params): FeatureCollection
    {
        $geometryColumnName = $this->getGeometryColumnName($tableName, $params);
        $this->setBoudingBoxFilter($geometryColumnName, $params);
        $primaryKeyColumnName = $this->getPrimaryKeyColumnName($tableName, $params);
        $records = $this->records->_list($tableName, $params);
        $features = array();
        foreach ($records->getRecords() as $record) {
            $features[] = $this->convertRecordToFeature($record, $primaryKeyColumnName, $geometryColumnName);
        }
        return new FeatureCollection($features, $records->getResults());
    }

    public function read(string $tableName, string $id, array $params): Feature
    {
        $geometryColumnName = $this->getGeometryColumnName($tableName, $params);
        $primaryKeyColumnName = $this->getPrimaryKeyColumnName($tableName, $params);
        $record = $this->records->read($tableName, $id, $params);
        return $this->convertRecordToFeature($record, $primaryKeyColumnName, $geometryColumnName);
    }
}
