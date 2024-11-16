<?php

//Archivos requeridos
require_once 'tpe3/apimodel/criadero.model.php';
require_once 'tpe3/apiview/apiView.php';
require_once 'tpe3/apimodel/perro.model.php';

//Clase
class CriaderoController {

    //Atributos de la clase
    private $view;
    private $model;
    private $perroModel;
    private $data;

    //Constructor de la clase
    function __construct() {
    //Inicializamos los atributos de la clase
    $this->model = new CriaderoModel();
    $this->view = new ApiView();
    $this->perroModel = new PerroModel();
    $this->data = file_get_contents("php://input");
    }

    function getData(){
        return json_decode($this->data);
    }

}

?>