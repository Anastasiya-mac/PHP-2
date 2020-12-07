<?php

namespace controllers;
use base\Request;
use controllers\Controller;
use models\repositories\UserRepository;

class UserController extends Controller
{

    public function actionIndex() {
        echo 'Необходимо авторизоваться';  

    }

    public function actionAuth() {
        echo $this->render('authorization', []);
        $model = \base\Application::getInstance()->request;
        if($model->getMethod() == 'POST') {
            $login = $model->post('login');
            $password = $model->post('password');
            $model = (new UserRepository);
            $getUser = $model->getUserByLogin($login);
           
            foreach($getUser as $key=>$value) {
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