<?php

namespace controllers;

use controllers\Controller;
//use services\TwigRenderer;
use models\repositories\ProductRepository;
use base\Request;


class ProductController extends Controller
{

    
    public function actionCard()
    {
        $this->useLayout = false;        
        //$id = (new Request())->get('id');
        $id = (new Request())->getMethod('id');      
        $model = (new ProductRepository())->getById($id);
        echo $this->render('product_card', ['model' => $model]);

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            session_start();
            $productId = $model->post('product_id');
            $productQty = $model->post('qty');

            if (isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId] += $productQty;
            } else {
                $_SESSION['cart'][$productId] = $productQty;
            }
        }
        //var_dump($_SESSION['cart'][$productId]);

    }
}
