<?php


namespace app\models;


use bikeshop\App;

class Cart extends AppModel{

    public function addToCart($product, $qty = 1, $mod = null){
        if(!isset($_SESSION['cart.currency'])) {
            $_SESSION['cart.currency'] = App::$app->getProperty('currency');
        }
        if($mod) {
            $ID = "{$product->id}-{$mod->id}";
            $title = "{$product->title} ({$mod->title})";
            $price = $mod->price;
        }else {
            $ID = $product->id;
            $title = $product->title;
            $price = $product->price;
        }
        if(isset($_SESSION['cart.product'][$ID])){
            $_SESSION['cart.product'][$ID]['qty'] += $qty;
        }else{
            $_SESSION['cart.product'][$ID] = [
                'title' => $title,
                'alias' => $product->alias,
                'price' => $price,
                'qty' => $qty,
                'img' => $product->img
            ];
        }
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * ($price * $_SESSION['cart.currency']['value']) : $qty * ($price * $_SESSION['cart.currency']['value']);
    }

    public function deleteItem($id){
        $qtyMinus = $_SESSION['cart.product'][$id]['qty'];
        $sumMinus = $_SESSION['cart.product'][$id]['price'] * $_SESSION['cart.product'][$id]['qty'];
        $_SESSION['cart.qty'] -= $qtyMinus;
        $_SESSION['cart.sum'] -= $sumMinus;
        unset($_SESSION['cart.product'][$id]);
    }

}