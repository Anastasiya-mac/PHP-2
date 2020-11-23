<?php

namespace controllers;
use models\Product;
use controllers\ParentController;

class ProductController extends ParentController
{

    
    public function actionCard()
    {
        $id = $_GET['id'];
        $model = Product::getById($id);
        echo $this->render('product_card', ['model' => $model]);
    }

}