<?php

namespace controllers;

use controllers\Controller;
//use services\TwigRenderer;
use models\repositories\ProductRepository;
use base\Request;
use base\Application;


class ProductController extends Controller
{

    public function actionIndex() {
        echo 'CARDD';
    }
    
    public function actionCard()
    {
        //$this->useLayout = false;   
        $request = new Request();
        if ($request->getMethod() == "GET") {     
            $id = \base\Application::getInstance()->request->get('id');
            $model = (new ProductRepository())->getById($id);
            echo $this->render('product_card', ['model' => $model]);
            //var_dump($_SESSION['cart'][$productId]);
        }

    }
}
