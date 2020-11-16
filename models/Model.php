<?php

namespace models;
use interfaces\ModelInterface;
use services\Db;

abstract class Model implements ModelInterface
{
    protected $db;
    protected $tablename;

    public function __construct() 
    {
        $this->db = Db::getInstance();
        $this->tablename = $this->getTableName();
    }

    public function getById(int $id)
    {
        $sql = "SELECT * FROM {$this->tablename} WHERE id = :id";
        return $this->db->queryOne($sql, [':id'=>$id]);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->tablename}";
        return $this->db->queryAll($sql);
    }

    public function delete(int $id) {
        $sql = "DELETE FROM {$this->tablename} WHERE id = :id";
        return $this->db->queryOne($sql, [':id'=>$id]);
    }
}