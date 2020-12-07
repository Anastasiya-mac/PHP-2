<?php

namespace controllers;

use controllers\Controller;
use models\Cart;
use base\Session;
use base\Request;


class CartController extends Controller
{

    public function actionIndex() {
        $session = \base\Application::getInstance()->session;
        $cart = [];
        if (!$session->empty('cart')) {
            $items = $session->get('cart');
        }
        $cart = (new Cart)->getItems($items);
        echo $this->render('add_to_cart', ['cart' => $cart]);
    }


    public function actionAdd() {
        $request = \base\Application::getInstance()->request;
        if ($request->getMethod() == "POST") {
            $productId = $request->post('product_id');
            $productQty = $request->post('qty');
        }
        (new Cart) -> add($productId, $productQty);
        echo 'Товар успешно добавлен в корзину';
    
    }   

}