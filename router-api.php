<?php
require_once 'libs/router.php';
require_once './tpe3/controller/perro.controller.php';
require_once './tpe3/controller/criadero.controller.php';
require_once './tpe3/controller/user.api.controller.php';

// crea el router
$router = new Router();


// define la tabla de ruteo
    #              endpoint ,  verbo ,     controller  ,       metodo

$router->addRoute('criadero', 'GET', 'CriaderoController', 'listarCategorias');
$router->addRoute('criadero', 'POST', 'CriaderoController', 'agregarCriadero');
$router->addRoute('criadero/:id', 'PUT', 'CriaderoController', 'editarCriadero');
$router->addRoute('criadero/:id', 'GET', 'CriaderoController', 'listarCategoriasById');
$router->addRoute('criadero/:id', 'DELETE', 'CriaderoController', 'eliminarCriadero');

/*$router->addRoute('usuarios/token', 'GET', 'UserApiController',   'getToken');*/

$router->addRoute('perro', 'GET', 'PerroController', 'getAll');
$router->addRoute('perro', 'POST', 'PerroController', 'add');
$router->addRoute('perro/:id', 'GET', 'PerroController', 'getById');
$router->addRoute('perro/:id', 'PUT', 'PerroController', 'update');
$router->addRoute('perro/:id', 'DELETE', 'PerroController', 'delete');
// rutea
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
?>


