<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
spl_autoload_register(function ($class) {
   require_once __DIR__ . "/" . str_replace("\\", "/", $class) . ".php";
});

use MVC\Controllers\Controller;

//$route = $_SERVER['REQUEST_URI'];
//$uri = ltrim($route, '/');

$obj = new Controller('users.html');

echo $obj->render();