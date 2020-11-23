<?php

namespace Tqdev\PhpCrudApi\Procedure;

use Tqdev\PhpCrudApi\Database\GenericDB;

class ProcedureService {
    private $db;
    private $baseDir;

    public function __construct(GenericDB $db, string $proceduresDir)
    {
        $this->db = $db;
        $this->baseDir = $proceduresDir;
    }

    public function hasProcedure(string $procedureName) {
        return file_exists($this->baseDir . $procedureName . '.sql');
    }

    public function execute(string $procedureName) {
        $sql = file_get_contents($this->baseDir . $procedureName . '.sql');
        return $this->db->rawSql($sql, []);
    }
}
