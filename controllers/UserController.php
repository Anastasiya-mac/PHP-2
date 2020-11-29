<?php

namespace controllers;
use models\User;
use controllers\Controller;


class UserController extends Controller
{

    public function actionIndex() {
        echo 'Необходимо авторизоваться';  

    }

    public function actionAuth() {
        echo $this->render('authorization', []);
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model = new User();
            $login = $model->post('login');
            $password = $model->post('password');
            $model = User::getUserByLogin($login);
            
            foreach($model as $key=>$value) {
                $params[":{$key}"] = $value;
            }
            if ($params[':password'] == $model->getHash($password))
            {
                session_start();
                $_SESSION['user_id'] = $params[':id'];
                echo $this->render('inter', []);
            } else {
                echo 'Не верный логин или пароль';
            }
        }
    }
}