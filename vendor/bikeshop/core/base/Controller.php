<?php

namespace bikeshop\base;


abstract class Controller{

    public $route;
    public $controller;
    public $view;
    public $model;
    public $prefix;
    public $data = [];
    public $meta = ['title' => '', 'description' => '', 'keywords' => ''];
    public $layout;


    public function __construct($route){
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $route['action'];
        $this->prefix = $route['prefix'];
    }

    public function getView(){
        $objectView = new View($this->route, $this->layout, $this->view, $this->meta);
        $objectView->render($this->data);
    }

    public function set($data){
        $this->data = $data;
    }

    public function setMeta($title = '', $description = '', $keywords = ''){
        $this->meta['title'] = $title;
        $this->meta['description'] = $description;
        $this->meta['keywords'] = $keywords;
    }


}