<?php
namespace Tqdev\PhpCrudApi\Record;

use Tqdev\PhpCrudApi\Column\Reflection\ReflectedTable;

class OrderingInfo
{

    public function getColumnOrdering(ReflectedTable $table, array $params): array
    {
        $fields = array();
        if (isset($params['order'])) {
            foreach ($params['order'] as $order) {
                $parts = explode(',', $order, 3);
                $columnName = $parts[0];
                if (!$table->hasColumn($columnName)) {
                    continue;
                }
                $ascending = 'ASC';
                if (count($parts) > 1) {
                    if (substr(strtoupper($parts[1]), 0, 4) == "DESC") {
                        $ascending = 'DESC';
                    }
                }
                $fields[] = [$columnName, $ascending];
            }
        }
        if (count($fields) == 0) {
            return $this->getDefaultColumnOrdering($table);
        }
        return $fields;
    }

    public function getDefaultColumnOrdering(ReflectedTable $table): array
    {
        $fields = array();
        $pk = $table->getPk();
        if ($pk) {
            $fields[] = [$pk->getName(), 'ASC'];
        } else {
            foreach ($table->getColumnNames() as $columnName) {
                $fields[] = [$columnName, 'ASC'];
            }
        }
        return $fields;
    }
}
