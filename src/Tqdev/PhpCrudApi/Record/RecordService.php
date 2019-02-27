<?php
namespace Tqdev\PhpCrudApi\Record;

use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Database\GenericDB;
use Tqdev\PhpCrudApi\Record\Document\ListDocument;

class RecordService
{
    private $db;
    private $reflection;
    private $columns;
    private $joiner;
    private $filters;
    private $ordering;
    private $pagination;

    public function __construct(GenericDB $db, ReflectionService $reflection)
    {
        $this->db = $db;
        $this->reflection = $reflection;
        $this->columns = new ColumnIncluder();
        $this->joiner = new RelationJoiner($reflection, $this->columns);
        $this->filters = new FilterInfo();
        $this->ordering = new OrderingInfo();
        $this->pagination = new PaginationInfo();
    }

    private function sanitizeRecord(String $tableName, /* object */ $record, String $id)
    {
        $keyset = array_keys((array) $record);
        foreach ($keyset as $key) {
            if (!$this->reflection->getTable($tableName)->hasColumn($key)) {
                unset($record->$key);
            }
        }
        if ($id != '') {
            $pk = $this->reflection->getTable($tableName)->getPk();
            foreach ($this->reflection->getTable($tableName)->getColumnNames() as $key) {
                $field = $this->reflection->getTable($tableName)->getColumn($key);
                if ($field->getName() == $pk->getName()) {
                    unset($record->$key);
                }
            }
        }
    }

    public function hasTable(String $table): bool
    {
        return $this->reflection->hasTable($table);
    }

    public function getType(String $table): String
    {
        return $this->reflection->getType($table);
    }

    public function create(String $tableName, /* object */ $record, array $params)
    {
        $this->sanitizeRecord($tableName, $record, '');
        $table = $this->reflection->getTable($tableName);
        $columnValues = $this->columns->getValues($table, true, $record, $params);
        return $this->db->createSingle($table, $columnValues);
    }

    public function read(String $tableName, String $id, array $params) /*: ?object*/
    {
        $table = $this->reflection->getTable($tableName);
        $this->joiner->addMandatoryColumns($table, $params);
        $columnNames = $this->columns->getNames($table, true, $params);
        $record = $this->db->selectSingle($table, $columnNames, $id);
        if ($record == null) {
            return null;
        }
        $records = array($record);
        $this->joiner->addJoins($table, $records, $params, $this->db);
        return $records[0];
    }

    public function update(String $tableName, String $id, /* object */ $record, array $params)
    {
        $this->sanitizeRecord($tableName, $record, $id);
        $table = $this->reflection->getTable($tableName);
        $columnValues = $this->columns->getValues($table, true, $record, $params);
        return $this->db->updateSingle($table, $columnValues, $id);
    }

    public function delete(String $tableName, String $id, array $params)
    {
        $table = $this->reflection->getTable($tableName);
        return $this->db->deleteSingle($table, $id);
    }

    public function increment(String $tableName, String $id, /* object */ $record, array $params)
    {
        $this->sanitizeRecord($tableName, $record, $id);
        $table = $this->reflection->getTable($tableName);
        $columnValues = $this->columns->getValues($table, true, $record, $params);
        return $this->db->incrementSingle($table, $columnValues, $id);
    }

    public function _list(String $tableName, array $params): ListDocument
    {
        $table = $this->reflection->getTable($tableName);
        $this->joiner->addMandatoryColumns($table, $params);
        $columnNames = $this->columns->getNames($table, true, $params);
        $condition = $this->filters->getCombinedConditions($table, $params);
        $columnOrdering = $this->ordering->getColumnOrdering($table, $params);
        if (!$this->pagination->hasPage($params)) {
            $offset = 0;
            $limit = $this->pagination->getPageLimit($params);
            $count = 0;
        } else {
            $offset = $this->pagination->getPageOffset($params);
            $limit = $this->pagination->getPageLimit($params);
            $count = $this->db->selectCount($table, $condition);
        }
        $records = $this->db->selectAll($table, $columnNames, $condition, $columnOrdering, $offset, $limit);
        $this->joiner->addJoins($table, $records, $params, $this->db);
        return new ListDocument($records, $count);
    }
}
