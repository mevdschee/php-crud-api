<?php
namespace Tqdev\PhpCrudApi\Record;

use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Database\GenericDB;
use Tqdev\PhpCrudApi\Record\Document\ListDocument;

class RecordService
{
    private $db;
    private $tables;
    private $columns;
    private $joiner;
    private $filters;
    private $ordering;
    private $pagination;

    public function __construct(GenericDB $db, ReflectionService $reflection)
    {
        $this->db = $db;
        $this->tables = $reflection->getDatabase();
        $this->columns = new ColumnSelector();
        $this->joiner = new RelationJoiner($this->columns);
        $this->filters = new FilterInfo();
        $this->ordering = new OrderingInfo();
        $this->pagination = new PaginationInfo();
    }

    private function sanitizeRecord(String $tableName, /* object */ $record, String $id)
    {
        $keyset = array_keys((array) $record);
        foreach ($keyset as $key) {
            if (!$this->tables->get($tableName)->exists($key)) {
                unset($record->$key);
            }
        }
        if ($id != '') {
            $pk = $this->tables->get($tableName)->getPk();
            foreach ($this->tables->get($tableName)->columnNames() as $key) {
                $field = $this->tables->get($tableName)->get($key);
                if ($field->getName() == $pk->getName()) {
                    unset($record->$key);
                }
            }
        }
    }

    public function exists(String $table): bool
    {
        return $this->tables->exists($table);
    }

    public function create(String $tableName, /* object */ $record, array $params)
    {
        $this->sanitizeRecord($tableName, $record, '');
        $table = $this->tables->get($tableName);
        $columnValues = $this->columns->getValues($table, true, $record, $params);
        return $this->db->createSingle($table, $columnValues);
    }

    public function read(String $tableName, String $id, array $params) /*: ?object*/
    {
        $table = $this->tables->get($tableName);
        $this->joiner->addMandatoryColumns($table, $this->tables, $params);
        $columnNames = $this->columns->getNames($table, true, $params);
        $record = $this->db->selectSingle($table, $columnNames, $id);
        if ($record == null) {
            return null;
        }
        $records = array($record);
        $this->joiner->addJoins($table, $records, $this->tables, $params, $this->db);
        return $records[0];
    }

    public function update(String $tableName, String $id, /* object */ $record, array $params)
    {
        $this->sanitizeRecord($tableName, $record, $id);
        $table = $this->tables->get($tableName);
        $columnValues = $this->columns->getValues($table, true, $record, $params);
        return $this->db->updateSingle($table, $columnValues, $id);
    }

    public function delete(String $tableName, String $id, array $params)
    {
        $table = $this->tables->get($tableName);
        return $this->db->deleteSingle($table, $id);
    }

    public function increment(String $tableName, String $id, /* object */ $record, array $params)
    {
        $this->sanitizeRecord($tableName, $record, $id);
        $table = $this->tables->get($tableName);
        $columnValues = $this->columns->getValues($table, true, $record, $params);
        return $this->db->incrementSingle($table, $columnValues, $id);
    }

    public function _list(String $tableName, array $params): ListDocument
    {
        $table = $this->tables->get($tableName);
        $this->joiner->addMandatoryColumns($table, $this->tables, $params);
        $columnNames = $this->columns->getNames($table, true, $params);
        $condition = $this->filters->getCombinedConditions($table, $params);
        $columnOrdering = $this->ordering->getColumnOrdering($table, $params);
        if (!$this->pagination->hasPage($params)) {
            $offset = 0;
            $limit = $this->pagination->getResultSize($params);
            $count = 0;
        } else {
            $offset = $this->pagination->getPageOffset($params);
            $limit = $this->pagination->getPageSize($params);
            $count = $this->db->selectCount($table, $condition);
        }
        $records = $this->db->selectAll($table, $columnNames, $condition, $columnOrdering, $offset, $limit);
        $this->joiner->addJoins($table, $records, $this->tables, $params, $this->db);
        return new ListDocument($records, $count);
    }
}
