<?php

namespace models;

use models\repositories\Repository;

class User extends Record
{
    public $id;
    public $login;
    public $password;
    public $email;

}