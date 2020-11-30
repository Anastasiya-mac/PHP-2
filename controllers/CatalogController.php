<?php

namespace controllers;

use controllers\Controller;
use models\repositories\ProductRepository;

class CatalogController extends Controller
{
    public function actionIndex() {
        echo 'CATALOG';
    }

    public function actionView() {
        $model = (new ProductRepository())->getAll();
        echo $this->render('catalog', ['model' => $model]);
    }
}