<?php

namespace models;

class Order extends Model
{
    public $orderId;
    public $userId;
    public $dateOrder;
    
    public function getTableName(): string {
        return 'orders';
    }

    public function insert(int $orderId, int $userId, string $dateOrder) {
        
        $sql = "INSERT INTO {$this->tablename} (id, user_id, dateOrder) VALUES (:id, :user_id, :dateOrder)";
        return $this->db->queryAll($sql, [':id'=>$orderId, ':user_id'=>$userId, ':dateOrder'=>$dateOrder]);
    }

    public function update(int $orderId, int $userId, string $dateOrder) {
        $sql = "UPDATE {$this->tablename} SET  user_id=:user_id, dateOrder=:dateOrder WHERE id = :id";
        return $this->db->queryAll($sql, [':id'=>$orderId, ':user_id'=>$userId, ':dateOrder'=>$dateOrder]);
    }
}