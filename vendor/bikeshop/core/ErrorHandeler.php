<?php


namespace bikeshop;


class ErrorHandeler{

    public function __construct(){

        if(DEBUG){
            error_reporting(-1);
        }else{
            error_reporting(0);
        }
        set_exception_handler([$this, 'exeptionHandler']);
    }

    public function exeptionHandler($e){
        $this->errorLog($e->getMessage(), $e->getFile(), $e-> getLine());
        $this->errorDisplay('Исключение', $e->getMessage(), $e->getFile(), $e-> getLine(), $e->getCode());
    }

    protected function errorLog($message = '', $file = '', $line = ''){
        error_log("[" . date("Y-m-d H:i:s") . "] Текст Ошибки: {$message}\nФайл: {$file}\nЛиния: {$line}\n===========\n\n",
            3, ROOT . "/tmp/errors.log");
    }

    protected function errorDisplay($errno = '', $errstr = '', $errfile = '', $errline = '', $responce = 404){

        http_response_code($responce);

        if(!DEBUG && $responce == 404){
            require WWW . '/errors/404.php';
            die();
        }
        if(DEBUG){
            require WWW . '/errors/dev.php';
        }else{
            require WWW . '/errors/prod.php';
            die();
        }

    }

}