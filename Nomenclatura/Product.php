<?php

abstract class Product
{
    public $id;
    public $categoryID;
    public $name;
    public $price;

    public function totalDue() {
        $this->categoryID = $this->getCategoryID();
        switch ($this->categoryID) {
            case 1: $total = $price / 2; 
        break;
            case 2: $total = $price;
        break;
            case 3: $total = $price * (new Weight())->getWeight();
        break;
        }
        return $total;
    }

    abstract public function getCategoryID(): int;

}