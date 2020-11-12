<?php

namespace models;

class Product extends Models
{
    public $id;
    public $name;
    public $price;
    public $description;
    public $categoryID;


    public function getProductByID(int $categoryID) {

    }

    public function getTableName(): string {
        return 'products';
    }
}