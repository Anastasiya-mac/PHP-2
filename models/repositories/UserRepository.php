<?php

namespace models\repositories;

use models\User;

class UserRepository extends Repository
{

    public function getTableName(): string {
        return 'users';
    }

    public function getRecordClassname(): string {
        return User::class;
    }

    public function getUserByLogin($login) {
        $tablename = $this->getTableName();
        $sql = "SELECT * FROM {$tablename} WHERE login = :login";
        return $this->getQuery($sql, [':login' => $login])[0];
    }


    public function getHash($string) {
        return md5($string . "d5f8");
    }

}