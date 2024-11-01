<?php

//Archivos requeridos
require_once './app/model/criadero.model.php';
require_once './app/view/criadero.view.php';
require_once './app/model/perro.model.php';
require_once './app/helper/auth_helper.php';

//Clase
class CriaderoController {

    //Atributos de la clase
    private $view;
    private $model;
    private $perroModel;
    private $authHelper;

    //Constructor de la clase
    function __construct() {
    //Inicializamos los atributos de la clase
    $this->model = new CriaderoModel();
    $this->view = new CriaderoView();
    $this->authHelper = new AuthHelper();
    $this->perroModel = new ModeloPerro();
    }

    public function getModel() {
        return $this->model;
    }

    function showHome(){
        $perros = $this->perroModel->getPerros();
        $criaderos = $this->model->listarCategorias();
        $this->view->mostrarHome($perros, $criaderos);
    }
    //Metodos en modo Publico
 
    function listarCategorias(){
        $criaderos= $this->model->listarCategorias();
        $this->view->listarCategorias($criaderos);
    }

    function listarCategoriasEditar(){
        $criaderos= $this->model->listarCategorias();
        $this->view->editarCategoria($criaderos);
    }

    function listarCategoriasById($id){
        $idComoString = $id;
        $idEntero = (int) $idComoString;
        $criaderos= $this->model->listarCategoriasById($idEntero);
        $this->view->listarCategoriasById($criaderos);
    }

    function listarItemsPorCategoria($id){
        $idComoString = $id;
        $idEntero = (int) $idComoString;
        $items= $this->model->listarItemsPorCategoria($idEntero);
        $this->view->listarItemsPorCategoria($items, $idEntero);

    }

    //Metodos en modo Privado


    function mostrarFormularioAgregar(){
        $this->view->formularioAgregarCategoria();
    } 

    function agregarCriadero(){
        
        //validacion de datos
        if(!empty($_POST['nombre']) && !empty($_POST['direccion']) && !empty($_POST['localidad']) && !empty($_POST['raza']) && !empty($_POST['imagen'])){
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $localidad = $_POST['localidad'];
            $raza = $_POST['raza'];
            $imagen = $_POST['imagen'];
        
            $perros = $this->perroModel->getPerros();
            $criaderos = $this->model->listarCategorias();
            $this->model->agregarCriadero($nombre , $direccion, $localidad, $raza, $imagen);
            
            $_SESSION['mensaje_exito'] = "Criadero agregado exitosamente.";
            header("Location: ". BASE_URL);
            die();
        }
    }
    function formEditarCriadero($id){
        $idComoString = $id;
        $idEntero = (int) $idComoString;
        $criaderos= $this->model->listarCategoriasById($idEntero);
        $this->view->formEditarCriadero($criaderos);
    }

    function editarCriadero($id){
        $id = (int) $id;

        //validacion de datos
        if(!empty($_POST['nombre']) && !empty($_POST['direccion']) && !empty($_POST['localidad']) && !empty($_POST['raza']) && !empty($_POST['imagen'])){
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $localidad = $_POST['localidad'];
            $raza = $_POST['raza'];
            $imagen = $_POST['imagen'];

        $this->model->editarCriadero($nombre, $direccion, $localidad, $raza, $imagen, $id);
        
        // Establecer mensaje de éxito en la sesión
        $_SESSION['mensaje_exito'] = "Criadero editado exitosamente.";
        
        // Redirigir a la lista de criaderos después de editar
        header("Location: " . BASE_URL);
        die();
    }
    }
    public function eliminarCriadero($id){
        $this->eliminarPerrosCriadero($id);
        
        $this->model->eliminarCriadero($id);
        $_SESSION['mensaje_exito'] = "Criadero eliminado exitosamente.";
        header("Location: ". BASE_URL);
        die();
    }

    function eliminarPerrosCriadero($id){
        $this->model->eliminarPerrosCriadero($id);
    }
}
?>