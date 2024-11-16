<?php
require_once 'libs/router.php';
require_once './tpe3/controller/perro.controller.php';
require_once './tpe3/controller/user.api.controller.php';

// crea el router
$router = new Router();


// define la tabla de ruteo
    #              endpoint ,  verbo ,     controller  ,       metodo


/*$router->addRoute('usuarios/token', 'GET', 'UserApiController',   'getToken');*/

$router->addRoute('perro', 'GET', 'PerroController', 'getAll');
$router->addRoute('perro', 'POST', 'PerroController', 'add');
$router->addRoute('perro/:ID', 'GET', 'PerroController', 'getById');
$router->addRoute('perro/:ID', 'PUT', 'PerroController', 'update');
$router->addRoute('perro/ID', 'DELETE', 'PerroController', 'delete');
// rutea
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
?>


