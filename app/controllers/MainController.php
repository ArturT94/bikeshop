<?php


namespace app\controllers;


use bikeshop\App;
use bikeshop\Cache;

class MainController extends AppController
{

    public function indexAction(){
        $this->setMeta(App::$app->getProperty('sitename'), App::$app->getProperty('description'), App::$app->getProperty('keywords'));
        $brands = \R::findAll('brand', 'LIMIT ?', [3]);
        $hits = \R::find('product', "hit = '1' AND status = '1' LIMIT 8");
        $this->set(compact(['brands', 'hits']));

}

}