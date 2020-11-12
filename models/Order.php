<?php

namespace models;

class Order extends Model
{
    public $orderId;
    public $productId;
    public $userId;
    public $unitPrice;
    public $qty;
    //метод получения средней стоимости продуктов, которые покупает пользователь, например, для анализа покупательской способности
    public function getAvgPriceForProduct($userID) {
        $sql = " SELECT UserID, AVG(TotalDue) FROM {$this->tablename} WHERE UserId = $userID GROUP BY UserId";
        return $this->db->queryOne($sql);
    }
    
    public function getUserByID($userId) {
   
    }
    public function getTableName(): string {
        return 'order';
    }
}