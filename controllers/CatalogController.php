<?php

namespace controllers;
use models\Product;
use controllers\ParentController;

class CatalogController extends ParentController
{

    public function actionView() {
        $model = (new Product())::getAll();
        echo $this->render('catalog', ['model' => $model]);
    }
}