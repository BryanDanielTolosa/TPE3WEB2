<?php
require_once 'tpe3/apiview/apiview.php';
require_once 'tpe3/apimodel/perro.model.php';
require_once './libs/request.php';
class PerroController {
    private $model;
    private $view;
    private $data;
    
    public function __construct() {
        $this->model = new PerroModel();
        $this->view = new ApiView();
        $this->data = file_get_contents("php://input");
    }

    function getData(){
        return json_decode($this->data);
    }

    public function getAll($orderBy = 'nombre', $order = 'asc') {
    // Validar el campo de ordenación
    $allowedFields = ['nombre', 'nacimiento', 'padre', 'madre', 'sexo', 'id_criadero_fk', 'imagen'];
    if (!in_array($orderBy, $allowedFields)) {
        $orderBy = 'nombre'; // Campo por defecto
    }

    // Validar la dirección de orden
    if (!is_string($order)) {
        $order = 'asc';
    } else {
        $order = strtolower($order);
        if ($order !== 'asc' && $order !== 'desc') {
            $order = 'asc';
        }
    }

    // Obtener los perros ordenados
    $perros = $this->model->getAllPerros($orderBy, $order);
    if ($perros) {
        $this->view->response($perros, 200);
    } else {
        $this->view->response(["message" => "No se encontraron perros"], 404);
    }
}

    
    /**
     * GET /perros/{id} - Obtiene un perro específico por ID.
     * @param int $id ID del perro.
     */
    public function getById($req) {
        $perro = $this->model->getPerroById($req);
        if ($perro) {
            $this->view->response($perro, 200);
        } else {
            $this->view->response(["message" => "Perro no encontrado"], 404);
        }
    }

    /**
     * POST /perros - Agrega un nuevo perro.
     */
    public function add() {
        $data = $this->getData();
       if (isset($data->nombre) && isset($data->sexo)) {
            $newId = $this->model->addPerro($data);
            $this->view->response(["message" => "Perro creado con éxito", "id" => $newId], 201);
        } else {
            $this->view->response(["message" => "Datos incompletos"], 400);
        }
    }

    /**
     * PUT /perros/{id} - Actualiza un perro específico por ID.
     * @param int $id ID del perro.
     */
    public function update($req) {
        $id = $req->params->id;
        // verifico que exista el perro
        $perro = $this->model->getPerroById($req);
        if (!$perro) {
            return $this->view->response("El perro con el id=$id no existe", 404);
        }

        if ($this->model->updatePerro($req)) {
            $this->view->response(["message" => "Perro actualizado con éxito"], 200);
        } else {
            $this->view->response(["message" => "Datos inválidos o perro no encontrado"], 400);
        }
    }

    function delete($req){
        
        if ($this->model->delete($req)) {
            $this->view->response(["message" => "Perro eliminado con éxito"], 200);
        } else {
            $this->view->response(["message" => "Datos inválidos o perro no encontrado"], 400);
        }
    }
}
