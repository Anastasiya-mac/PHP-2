<?php

namespace models;
use interfaces\ModelInterface;

abstract class Model implements ModelInterface
{
    protected $db;
    protected $tablename;

    public function __construct() 
    {
        $this->db = new Db();
        $this->tablename = $this->getTableName();
    }

    public function GetByID(int $id)
    {
        $sql = "SELECT * FROM {$this->tablename} WHERE id = {$id}";
        return $this->db->queryOne($sql);
    }

    public function GetAll()
    {
        $sql = "SELECT * FROM {$this->tablename}";
        return $this->db->queryAll($sql);
    }
}