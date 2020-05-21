<?php

namespace Tqdev\PhpCrudApi\Record;

use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Database\GenericDB;
use Tqdev\PhpCrudApi\Record\Document\ListDocument;

class ProcedureService
{
    private $db;
    private $reflection;

    public function __construct(GenericDB $db, ReflectionService $reflection)
    {
        $this->db = $db;
        $this->reflection = $reflection;
    }
}
