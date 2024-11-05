<?php

require_once '/apiview/apiView.php';
require_once '/apimodel/perro.model.php';

class PerroController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new PerroModel();
        $this->view = new ApiView();
    }

    /**
     * GET /perros - Lista todos los perros con opción de ordenar por un campo.
     * @param string $orderBy Campo para ordenar (por defecto 'nombre').
     * @param string $order Orden 'asc' o 'desc' (por defecto 'asc').
     */
    public function getAll($orderBy = 'nombre', $order = 'asc') {
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
    public function getById($id) {
        $perro = $this->model->getPerroById($id);
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
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['nombre']) && isset($data['raza'])) {
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
    public function update($id) {
        $data = json_decode(file_get_contents("php://input"), true);
        if ($this->model->updatePerro($id, $data)) {
            $this->view->response(["message" => "Perro actualizado con éxito"], 200);
        } else {
            $this->view->response(["message" => "Datos inválidos o perro no encontrado"], 400);
        }
    }
}