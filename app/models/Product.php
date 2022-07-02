<?php


namespace app\models;


class Product extends AppModel {

    public function setResentlyViewed($id){
        $resentlyViewed = $this->AllResentlyViewed();
        if(!$resentlyViewed){
            setcookie('resentlyViewed', $id, time() + 3600*24, '/');
        }else{
            $resentlyViewed = explode('.', $resentlyViewed);
            if(!in_array($id, $resentlyViewed)){
                $resentlyViewed[] = $id;
                $resentlyViewed = implode('.', $resentlyViewed);
                setcookie('resentlyViewed', $resentlyViewed, time() + 3600*24, '/');
            }
        }
    }

    public function getResentlyViewed(){
        if(!empty($_COOKIE['resentlyViewed'])){
            $resentlyViewed = $_COOKIE['resentlyViewed'];
            $resentlyViewed = explode('.', $resentlyViewed);
            return array_slice($resentlyViewed, -3);
        }
        return false;
    }

    public function AllResentlyViewed(){
        if(!empty($_COOKIE['resentlyViewed'])){
            return $_COOKIE['resentlyViewed'];
        }else{
            return false;
        }
    }

}