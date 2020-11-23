<?php

namespace models;

class OrderProduct extends Record
{
    public $id;
    public $product_id;
    
    static public function getTableName(): string {
        return 'order_product';
    }

}