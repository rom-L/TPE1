<?php

//se incluye clase de router
require_once 'api/api-comment-controller.php';
require_once 'library/Router.php';


//se crea el router
$router = new Router();


//tabla de ruteo
$router->addRoute('comments/songs/:ID', 'GET', 'ApiCommentController', 'getAll');
$router->addRoute('comments/songs/:ID/order', 'GET', 'ApiCommentController', 'order');
$router->addRoute('comments/:ID', 'DELETE', 'ApiCommentController', 'delete');
$router->addRoute('comments', 'POST', 'ApiCommentController', 'insert');

//obtiene el recurso en la url
$resource = $_GET['resource'];
//obtiene el metodo elegido (EJEMPLO: GET, PUT, etc);
$method = $_SERVER['REQUEST_METHOD'];

//rutea
$router->route($resource, $method);

