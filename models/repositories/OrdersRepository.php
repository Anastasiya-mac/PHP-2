<?php

namespace models\repositories;

use models\repositories\Repository;

class OrdersRepository extends Repository
{
    public function getTableName(): string {
        return 'order_product';
    }

    public function getRecordClassname(): string {
        return OrderProduct::class;
    }


    public function getProductsName() {
        $sql = "SELECT P.name, P.id, OP.id, OP.date FROM products AS P JOIN order_product AS OP ON P.id = OP.product_id ORDER BY OP.date DESC";
        return $this->getQuery($sql,[]);
    }
}