<?php


namespace bikeshop\base;


class View{

    public $route;
    public $controller;
    public $view;
    public $model;
    public $prefix;
    public $data = [];
    public $meta = [];
    public $layout;


    public function __construct($route, $layout = '', $view = '', $meta){
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $view;
        $this->prefix = $route['prefix'];
        $this->meta = $meta;

        if($this->layout === false){
            $this->layout = false;
        }else{
            $this->layout = $layout ?: LAYOUT;
        }
    }

    public function render($data){
        if(is_array($data)) extract($data); //ключи превращает в переменные и можно вызвать значение переменной
        $viewFile = APP . "/views{$this->prefix}/{$this->controller}/{$this->view}.php";
        if(is_file($viewFile)){
        ob_start();
            require_once $viewFile;
        $content = ob_get_clean();
        }else{
            throw new \Exception("Такой вид не найден {$viewFile}", 500);
        }
        if(false !== $this->layout){
            $lauoutFile = APP . "/views/layouts/{$this->layout}.php";
            if(is_file($lauoutFile)){
                require_once $lauoutFile;
            }else{
                throw new \Exception("Такой шаблон не найден $lauoutFile", 500);
            }
        }
    }
        public function getMeta(){
        $output = '<title>' . $this->meta['title'] . '</title>' . PHP_EOL;
        $output .= '<meta name="description" content="' . $this->meta['description'] . '">' . PHP_EOL;
        $output .= '<meta name="keywords" content="' . $this->meta['keywords'] . '">' . PHP_EOL;
        return $output;
        }
}