<?php


namespace app\controllers;


use app\models\Breadcrumbs;
use app\models\Product;
use bikeshop\App;
use bikeshop\Cache;

class  ProductController extends AppController {

   public function viewAction(){
       $alias = $this->route['alias'];
       $product = \R::findOne('product', "alias = ? AND status = '1'", [$alias]);
       if(!$product){
           throw new \Exception('Страница не найдена', 404);
       }
       //хлебные крошки
        $breadcrumbs = Breadcrumbs::getBreadcrumbs($product->category_id, $product->title);

       //Получить связанные товары
        $related = \R::getAll("SELECT * FROM related_product JOIN product ON product.id = related_product.related_id WHERE related_product.product_id = ?", [$product->id]);

       //запись в куки запрошеного товара
       $p_model = new Product();
       $p_model->setResentlyViewed($product->id);

       //получить все полученные товары из кук
        $idProduct = $p_model->getResentlyViewed();
        $products = null;
        if(!empty($idProduct)) {
                $products = \R::find('product', 'id IN('. \R::genSlots($idProduct) . ') LIMIT 3', $idProduct);
        }

       //галерея
       $gallery = \R::findAll('gallery', 'product_id = ?', [$product->id]);

       //Модификации товара если таковые есть
       $modifications = \R::findAll('modification', 'product_id = ?', [$product->id]);

        $this->setMeta($product->title, $product->description, $product->keywords);
       $this->set(compact('product', 'breadcrumbs', 'related', 'products', 'gallery', 'modifications'));
    }

}