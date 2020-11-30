<?php

namespace models;

class OrderProduct extends Record
{
    public $id;
    public $product_id;
    public $qty;
    public $date;
}