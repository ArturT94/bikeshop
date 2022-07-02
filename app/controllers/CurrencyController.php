<?php


namespace app\controllers;


use bikeshop\App;

class CurrencyController extends AppController
{

    public function changeAction(){
        $currency = !empty($_GET['curr']) ? $_GET['curr'] : null;
        if ($currency) {
            if (!empty(App::$app->getProperty('currencies')) &&
                array_key_exists($currency, App::$app->getProperty('currencies'))) {
                setcookie('currency', $currency, time() + 3600 * 24 * 7, '/');
            }
        }
        redirect();
    }

}