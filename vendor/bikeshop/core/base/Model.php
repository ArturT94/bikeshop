<?php


namespace bikeshop\base;


use bikeshop\Db;

abstract class Model {

    public $attributs = [];
    public $errors = [];
    public $rules = [];

    public function __construct(){
        Db::instance();
    }

}