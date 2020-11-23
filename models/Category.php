<?php

namespace models;

class Category extends Record
{
    public $id;
    public $name;
    
    static public function getTableName(): string {
        return 'category';
    }
}