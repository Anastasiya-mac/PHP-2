<?php

namespace controllers;
use models\Product;
use controllers\Controller;


class CartController extends Controller
{

    public function actionIndex() {
        echo $this->render('cart', []);
    }


    public function actionAdd() {
        echo 'Добавление в корзину';
    }
}