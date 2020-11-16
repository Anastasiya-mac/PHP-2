<?php

namespace models;

class OrderProduct extends Model
{
    public $orderId;
    public $productId;
    
    public function getTableName(): string {
        return 'order_product';
    }

    public function insert(int $orderId, int $productId) {
        
        $sql = "INSERT INTO {$this->tablename} (id, product_id) VALUES (:id, :product_id)";
        return $this->db->queryAll($sql, [':id'=>$orderId, ':product_id'=>$productId]);
    }

    public function update(int $orderId, int $productId) {
        $sql = "UPDATE {$this->tablename} SET  product_id=:product_id WHERE id = :id";
        return $this->db->queryAll($sql, [':id'=>$orderId, ':product_id'=>$productId]);
    }
}