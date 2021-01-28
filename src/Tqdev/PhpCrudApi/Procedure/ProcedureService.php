<?php

namespace Tqdev\PhpCrudApi\Procedure;

use Tqdev\PhpCrudApi\Database\GenericDB;

class ProcedureService
{
    private $db;
    private $procedurePath;

    public function __construct(GenericDB $db, string $procedurePath)
    {
        $this->db = $db;
        $this->procedurePath = $procedurePath;
    }

    public function hasProcedure(string $procedureName, string $operation)
    {
        return file_exists('./' . $this->procedurePath . '/' . $procedureName . '.' . $operation . '.sql');
    }

    public function execute(string $procedureName, string $operation, array $params = [])
    {
        $sql = $this->parseSqlTemplate($this->procedurePath . '/' . $procedureName . '.' . $operation . '.sql', $params);
        return $this->db->rawSql($sql, $params);
    }

    private function parseSqlTemplate(string $path, array $context)
    {
        ob_start();
        extract($context);
        include $path;
        return ob_get_clean();
    }
}
