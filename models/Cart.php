<?php

namespace models;

use base\Session;
use models\repositories\ProductRepository;

class Cart extends Record
{

    public function getItems($items) {
        $productIds = array_filter(array_keys($items), 
            function ($element) {
                return is_int($element);
            }
        );

        $products = (new ProductRepository)->getByIds($productIds);
        foreach ($products as $product) {
            $cart[] = [ 
                'product' => $product,
                'qty' => $items[$product['id']]
            ];
        }
        return $cart;
    } 

    public function add ($productId, $productQty) {
        $session = new Session();
        $cart = $session->get('cart');
        if (isset($cart[$productId])) {
            $cart[$productId] += $productQty;
        } else {
            $cart[$productId] = $productQty;
        }
        $session->set('cart', $cart); 
    }
}