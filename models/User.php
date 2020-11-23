<?php

namespace models;

class User extends Record
{
    public $id;
    public $name;
    public $email;


    static public function getTableName(): string {
        return 'users';
    }
}