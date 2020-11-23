<?php

namespace models;

class Order extends Record
{
    public $id;
    public $user_id;
    public $date_order;
    
    static public function getTableName(): string {
        return 'orders';
    }

}