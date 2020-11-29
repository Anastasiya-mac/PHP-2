<?php

namespace controllers;
use models\Product;
use controllers\Controller;
use services\TwigRenderer;

class ProductController extends Controller
{

    
    public function actionCard()
    {
        //$this->useLayout = false;
        $id = $_GET['id'];
        $model = Product::getById($id);
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
