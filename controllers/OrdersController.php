<?php

namespace controllers;

use models\repositories\OrdersRepository;
use controllers\Controller;

class OrdersController extends Controller
{

    
    public function actionView()
    {
        echo 'Заказы';
        $model = (new OrdersRepository())->getProductsName();
        echo $this->render('orders', ['model' => $model]);
    }
}
