<?php
require_once 'libs/router/Router.php';
require_once 'api/public-api.controller.php';

//Creo el ruteador
$router = new Router();

// creo la tabla de ruteo

$router->addRoute('lote', 'GET', 'PublicApiController', 'getAllLotes');  //Prueba

//rutea
$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);