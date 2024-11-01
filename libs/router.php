<?php
require_once './app/controller/criadero.controller.php';
require_once './app/controller/perro.controller.php';
require_once './app/controller/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] 
    . dirname($_SERVER['PHP_SELF']).'/');


if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = '';
}

// Parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

// Instancio los controller que existen por ahora



// Tabla de ruteo, determina que camino seguir segun la accion

switch ($params[0]) {
    //Modo publico
    case '':
        $CriaderoController = new CriaderoController();
        $CriaderoController->showHome();
        break;
    case 'detalle':
        $PerroController = new PerroController();
        $PerroController->GetPerro($params[1]);
        break;
    case 'listadoCategorias':
        $CriaderoController = new CriaderoController();
        // Verificar si $params[1] existe
        if (isset($params[1]) && !empty($params[1])) {
            // Si hay un ID en $params[1], listar la categoría por ID
            $CriaderoController->listarCategoriasById($params[1]);
        } else {
            // Si no hay ID, listar todas las categorías
            $CriaderoController->listarCategorias();
        }
        break;
    case 'listadoItemsPorCategoria':
        $CriaderoController = new CriaderoController();
        $CriaderoController->listarItemsPorCategoria($params[1]);
        break;

    //Modo privado
    case 'showLogin':
        $Authcontroller = new AuthController();
        $Authcontroller->showLogin();
        break;
    case 'login':
        $AuthController = new AuthController();
        $AuthController->login();
        break;

    //Admin Items
    
        case 'agregarForm':
                        $PerroController = new PerroController();
                        $PerroController->agregarForm();
                        
                        break;
        case 'agregarPerro':
            $PerroController = new PerroController();
            $PerroController->agregarPerro();
            break;
        case 'EliminarPerro':
            $PerroController = new PerroController();
            $PerroController->eliminarPerro($params[1]);
                        break;

        case 'editarForm':
            $PerroController = new PerroController();
            $PerroController->editarForm($params[1]);
                        break;
        case 'editarPerro':
            $PerroController = new PerroController();
                        
                        $PerroController->editarPerro($params[1]);
                        break;
            
    
    //Admin Categorias
    
    case 'AgregarCategoria':
        $CriaderoController = new CriaderoController();
        $CriaderoController->mostrarFormularioAgregar();
        break;
 
    case 'AgregarCriadero':
        $CriaderoController = new CriaderoController();
        $CriaderoController->agregarCriadero();
        
        
        break;
    case 'EditarCategoria':
        $CriaderoController = new CriaderoController();
        $CriaderoController->listarCategoriasEditar();
        break;
    case 'FormularioEditarCategoria':
        $CriaderoController = new CriaderoController();
        $CriaderoController->formEditarCriadero($params[1]);
        break;
    case 'EditarCriadero':
        $CriaderoController = new CriaderoController();
        $CriaderoController->editarCriadero($params[1]);
        break;
    case 'EliminarCategoria':
        $CriaderoController = new CriaderoController();
        $CriaderoController->listarCategoriasEliminar();
        break;
    case 'EliminarCriadero':
        $CriaderoController = new CriaderoController();
        $CriaderoController->eliminarCriadero($params[1]);
        break;
    case 'logout':
        $AuthController = new AuthController();
        $AuthController->logout();
        break;

    default:
        header('HTTP/1.0 404 Not Found');
        echo ('404 Page not found');
        break;
}
