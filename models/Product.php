<?php

namespace models;

class Product extends Record
{
    public $id;
    public $name;
    public $price;
    public $description;
    public $category_id;

   /* public function __construct($id=null, $name=null, $price=null, $description=null, $category_id=null) {
        parent::__construct();
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->category_id = $category_id;
    }*/

    static public function getTableName(): string {
        return 'products';
    }

}