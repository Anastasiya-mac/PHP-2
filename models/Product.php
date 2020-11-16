<?php

namespace models;

class Product extends Model
{
    public $id;
    public $name;
    public $price;
    public $description;
    public $categoryID;

    public function getTableName(): string {
        return 'products';
    }

    public function insert(int $id, string $name, float $price, string $description, int $categoryID) {
        $sql = "INSERT INTO {$this->tablename} (id, name, price, description, categoryID) VALUES (:id, :name, :price, :description, :categoryID)";
        return $this->db->queryAll($sql, [':id'=>$id, ':name'=>$name, ':price'=>$price, ':description'=>$description, ':categoryID'=>$categoryID]);
    }


    public function update(int $id, string $name, float $price, string $description, int $categoryID) {
        $sql = "UPDATE {$this->tablename} SET name=:name, price=:price, description=:description, categoryID=:categoryID WHERE id = :id";
        return $this->db->queryOne($sql, [':id'=>$id, ':name'=>$name, ':price'=>$price, ':description'=>$description, ':categoryID'=>$categoryID]);
    }


}