<?php
namespace Tqdev\PhpCrudApi\Database;

class LazyPdo extends \PDO
{
    private $dsn;
    private $user;
    private $password;
    private $options = array();

    private $pdo = null;

    public function __construct(string $dsn, /*?string*/ $user = null, /*?string*/ $password = null, array $options = array())
    {
        $this->dsn = $dsn;
        $this->user = $user;
        $this->password = $password;
        $this->options = $options;
        // explicitly NOT calling super::__construct
    }

    private function pdo()
    {
        if (!$this->pdo) {
            $this->pdo = new \PDO($this->dsn, $this->user, $this->password, $this->options);
        }
        return $this->pdo;
    }

    public function setUser(/*?string*/ $user): bool
    {
        if ($this->pdo) {
            return false;
        }
        $this->user = $user;
        return true;
    }

    public function setPassword(/*?string*/ $password): bool
    {
        if ($this->pdo) {
            return false;
        }
        $this->password = $password;
        return true;
    }
    
    public function inTransaction(): bool
    {
        // Do not call parent method if there is no pdo object
        return $this->pdo && parent::inTransaction();
    }

    public function setAttribute($attribute, $value): bool
    {
        if ($this->pdo) { 
            return $this->pdo()->setAttribute($attribute, $value);
        }
        $this->options[$attribute] = $value;
        return true;
    }

    public function getAttribute($attribute): mixed
    {
        return $this->pdo()->getAttribute($attribute);
    }

    public function beginTransaction(): bool
    {
        return $this->pdo()->beginTransaction();
    }

    public function commit(): bool
    {
        return $this->pdo()->commit();
    }

    public function rollBack(): bool
    {
        return $this->pdo()->rollBack();
    }

    public function errorCode(): mixed
    {
        return $this->pdo()->errorCode();
    }

    public function errorInfo(): array
    {
        return $this->pdo()->errorInfo();
    }

    public function exec($query): int
    {
        return $this->pdo()->exec($query);
    }

    public function prepare($statement, $options = array())
    {
        return $this->pdo()->prepare($statement, $options);
    }

    public function quote($string, $parameter_type = null): string
    {
        return $this->pdo()->quote($string, $parameter_type);
    }

    public function lastInsertId(/* ?string */$name = null): string
    {
        return $this->pdo()->lastInsertId($name);
    }

    public function query(string $statement): \PDOStatement
    {
        return call_user_func_array(array($this->pdo(), 'query'), func_get_args());
    }
}