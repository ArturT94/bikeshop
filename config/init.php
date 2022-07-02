<?php

define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("APP", ROOT . '/app');
define("WWW", ROOT . '/public');
define("CORE", ROOT . '/vendor/bikeshop/core');
define("LIBS", ROOT . '/vendor/bikeshop/core/libs');
define("CACHE", ROOT . '/tmp/cache');
define("CONF", ROOT . '/config');
define("LAYOUT", 'bikelayout');


//http://public/index.php
$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
//http://public/
$app_path = preg_replace("#[^/]+$#", "", $app_path);
//http://bike-shop/
$app_path = str_replace("public/", "", $app_path);

define("PATH", $app_path);
define("ADMIN", PATH . "/admin");

require_once ROOT . '/vendor/autoload.php';
