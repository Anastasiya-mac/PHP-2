<?php

namespace models;

class OrderProduct extends Record
{
    public $id;
    public $product_id;
    public $qty;
    
    static public function getTableName(): string {
        return 'order_product';
    }

}