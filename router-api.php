<?php
require_once 'libs/router.php';
<<<<<<< HEAD
require_once './tpe3/controller/perro.controller.php';
require_once './tpe3/controller/user.api.controller.php';

// crea el router
$router = new Router();

=======
require_once './api/controller/perro.controller.php';
require_once './api/controller/criadero.controller.php';
require_once './api/controller/user.api.controller.php';
require_once './api/middlewares/jwt.auth.middleware.php';
// crea el router
$router = new Router();
$router->addMiddleware(new JWTAuthMiddleware());
>>>>>>> b2a69ab3471045fe5c0857750c5be6326489fc02

// define la tabla de ruteo
    #              endpoint ,  verbo ,     controller  ,       metodo

<<<<<<< HEAD

/*$router->addRoute('usuarios/token', 'GET', 'UserApiController',   'getToken');*/
=======
$router->addRoute('criadero', 'GET', 'TaskApiController', 'obtenerTareas');
$router->addRoute('criadero', 'POST', 'TaskApiController', 'crearTarea');
$router->addRoute('criadero/:ID', 'GET', 'criaderoController', 'obtenerTarea');

$router->addRoute('usuarios/token', 'GET', 'UserApiController',   'getToken');
>>>>>>> b2a69ab3471045fe5c0857750c5be6326489fc02

$router->addRoute('perro', 'GET', 'PerroController', 'getAll');
$router->addRoute('perro', 'POST', 'PerroController', 'add');
$router->addRoute('perro/:ID', 'GET', 'PerroController', 'getById');
$router->addRoute('perro/:ID', 'PUT', 'PerroController', 'update');
$router->addRoute('perro/ID', 'DELETE', 'PerroController', 'delete');
// rutea
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
?>

<<<<<<< HEAD

=======
//Las rutas se definen usando el método: 
$router->addRoute($resource: string, $httpMethod: string, 
$controller: string, $methodController: string);

Los controllers obtienen los parámetros del recurso a través de un objeto $req que es enviado a los métodos:.

public function getTarea($req) {
        $id = $req->params->id;
 …
}
>>>>>>> b2a69ab3471045fe5c0857750c5be6326489fc02
