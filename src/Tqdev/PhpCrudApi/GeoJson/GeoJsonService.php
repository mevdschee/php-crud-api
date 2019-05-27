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

    private function getGeometryColumnName(string $tableName, string $geometryParam): string
    {
        $table = $this->reflection->getTable($tableName);
        foreach ($table->getColumnNames() as $columnName) {
            if ($geometryParam && $geometryParam != $columnName) {
                continue;
            }
            $column = $table->getColumn($columnName);
            if ($column->isGeometry()) {
                return $columnName;
            }
        }
        return "";
    }

    public function _list(string $tableName, array $params): FeatureCollection
    {
        $geometryParam = isset($params['geometry']) ? $params['geometry'] : '';
        $geometryColumnName = $this->getGeometryColumnName($tableName, $geometryParam);
        $records = $this->records->_list($tableName, $params);
        return FeatureCollection::fromListDocument($records, $geometryColumnName);
    }

    public function read(string $tableName, string $id, array $params) /*: ?object*/
    {
        return $this->records->read($tableName, $id, $params);
    }
}
