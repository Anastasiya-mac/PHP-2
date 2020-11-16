<?php

namespace models;

class Category extends Model
{
    public $id;
    public $name;
    
    public function getTableName(): string {
        return 'category';
    }

    public function insert(int $id, string $name) {
        
        $sql = "INSERT INTO {$this->tablename} (id, name) VALUES (:id, :name)";
        return $this->db->queryAll($sql, [':id'=>$id, ':name'=>$name]);
    }

    public function update(int $id, string $name) {
        $sql = "UPDATE {$this->tablename} SET name=:name WHERE id = :id";
        return $this->db->queryAll($sql, [':id'=>$id, ':name'=>$name]);
    }
}