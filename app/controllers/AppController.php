<?php


namespace app\controllers;

use app\models\AppModel;
use app\widgets\currency\Currency;
use bikeshop\App;
use bikeshop\base\Controller;
use bikeshop\Cache;

class AppController extends Controller{

    public function __construct($route){
        parent::__construct($route);
        new AppModel();
        App::$app->setProperty('currencies', Currency::getCurrencies());
        App::$app->setProperty('currency', Currency::getCurrency(App::$app->getProperty('currencies')));
        App::$app->setProperty('cats', self::cacheCategory());
        $this->changeAlias();
    }

    public static function cacheCategory(){
        $cache = Cache::instance();
        $cats = $cache->get('cats');
        if(!$cats){
            $cats = \R::getAssoc("SELECT * FROM category");
            $cache->set('cats', $cats);
        }
        return $cats;
    }

    protected function changeAlias(){
        $prod = \R::getAll("SELECT id FROM product");
        foreach($prod as $item) {
            foreach ($item as $id) {
                $product = \R::load('product', $id);
                if(empty($product->alias) || preg_match("/[А-Яа-я]/", $product->alias)){
                    $product->alias = AppController::engAlias($product->title);
                    \R::store($product);
                }
            }
        }
    }


    public static function engAlias($str){
        $rus = ['а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я'];
        $eng = ['a', 'b', 'v', 'g', 'd', 'e', 'yo', 'j', 'z', 'i', 'i', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', '', 'i', '', 'e', 'yu', 'ya'];
        if(strpos($str, "\"") !== false) {
            return str_replace(" ", '-', str_replace("\"", '', str_replace($rus, $eng, mb_strtolower($str))));
        }
    }
}