<?php

namespace controllers;
use models\Record;
use models\Product;
use controllers\Controller;

class CatalogController extends Controller
{
    public function actionIndex() {
        echo 'CATALOG';
    }

    public function actionView() {
        $model = (new Product())::getAll();
        echo $this->render('catalog', ['model' => $model]);
    }
}