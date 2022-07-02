<?php


namespace bikeshop;

class Registry{

use Tsingletone;

    public static $propertis = [];

    public function setProperty($name, $value){
        self::$propertis[$name] = $value;
    }

    public function getProperty($name){
        if(self::$propertis[$name]) {
            return self::$propertis[$name];
        }
        return null;
    }

    public function getProperties(){
        return self::$propertis;
}

}