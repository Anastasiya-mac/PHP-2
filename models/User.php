<?php

namespace models;

class User extends Model
{
    public $id;
    public $name;
    public $email;


    public function getTableName(): string {
        return 'users';
    }

    public function insert(int $id, string $name, string $email) {
        $sql = "INSERT INTO {$this->tablename} (id, name, email) VALUES (:id, :name, :email)";
        return $this->db->queryAll($sql, [':id'=>$id, ':name'=>$name, ':email'=>$email]);
    }


    public function update(int $id, string $name, string $email) {
        $sql = "UPDATE {$this->tablename} SET name=:name, email=:email WHERE id = :id";
        return $this->db->queryOne($sql, [':id'=>$id, ':name'=>$name, ':email'=>$email]);
    }
}