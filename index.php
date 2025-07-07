<?php 

namespace App;

use App\Controller\Ajax;

require_once 'autoload.php';
require_once 'config.php';
require_once 'routes.php';

//valida se a request veio do ajax
$requestIsAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
if($requestIsAjax == true){
    new Ajax($_GET["url"]);
}

$requestedRoute = isset($_GET["url"]) == true ? $_GET["url"] : "home";
if(str_contains($requestedRoute, "/")){
    $explodedRoute = explode("/", $requestedRoute);
    $requestedRoute = str_contains($requestedRoute, "admin") ? $explodedRoute[0] . "/" . $explodedRoute[1] : $explodedRoute[0];
}

if(array_key_exists($requestedRoute, $routes)){
    require_once "App/View/" . $routes[$requestedRoute] . ".php";
}
else{
    require_once "App/View/404.php";
}