<?php


require_once './vendor/autoload.php';

error_reporting(E_ALL);

date_default_timezone_set("America/Sao_Paulo");

$router = new \Framework\Router\Routing();
\App\Config\Router::configRouters($router);

$router->run();