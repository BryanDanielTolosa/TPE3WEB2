<?php
require_once 'libs/router.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('criadero', 'GET', 'TaskApiController', 'obtenerTareas');
$router->addRoute('criadero', 'POST', 'TaskApiController', 'crearTarea');
$router->addRoute('criadero/:ID', 'GET', 'criaderoController', 'obtenerTarea');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
?>

//Las rutas se definen usando el método: 
$router->addRoute($resource: string, $httpMethod: string, 
$controller: string, $methodController: string);

Los controllers obtienen los parámetros del recurso a través de un objeto $req que es enviado a los métodos:.

public function getTarea($req) {
        $id = $req->params->id;
 …
}
