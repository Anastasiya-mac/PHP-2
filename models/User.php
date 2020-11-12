<?php

namespace models;

class User extends Model
{
    public $name;
    public $email;


    public function getTableName(): string {
        return 'users';
    }

    public function getByCategory($id) {

    }
}