<?php

class Weight extends Product 
{
    public $weight;

    public function getCategoryID(): int {
        return 3;
    }

    public function getWeight(): int {
        return 100;
    }

}