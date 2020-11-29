<?php

namespace models;

class User extends Record
{
    public $id;
    public $login;
    public $password;
    public $email;


    static public function getTableName(): string {
        return 'users';
    }

    public function getUserByLogin($login) {
        $tablename = static::getTableName();
        $sql = "SELECT * FROM {$tablename} WHERE login = :login";
        return  static::getQuery($sql, [':login' => $login])[0];
    }

    public function getHash($string) {
        return md5($string . "d5f8");
    }
}