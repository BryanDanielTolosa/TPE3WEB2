<?php
require_once './tpe3/database/config.php';

class PerroModel {
    protected $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $this->_deploy();
    }

    private function _deploy() {
        // Verifica si existen tablas, y si no, las crea
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if (count($tables) == 0) {
            $sql = <<<END
            CREATE TABLE IF NOT EXISTS criadero (
                id_criadero INT AUTO_INCREMENT PRIMARY KEY,
                Nombre VARCHAR(255) NOT NULL,
                Direccion VARCHAR(255) NOT NULL,
                Localidad VARCHAR(255) NOT NULL,
                Raza VARCHAR(255) NOT NULL,
                Imagen TEXT
            );
    
            CREATE TABLE IF NOT EXISTS perro (
                id_perro INT AUTO_INCREMENT PRIMARY KEY,
                nombre VARCHAR(255) NOT NULL,
                nacimiento DATE,
                padre VARCHAR(255),
                sexo ENUM('Macho', 'Hembra', 'femenino') NOT NULL,
                madre VARCHAR(255),
                id_criadero_fk INT,
                Imagen TEXT,
                FOREIGN KEY (id_criadero_fk) REFERENCES criadero(id_criadero) ON DELETE SET NULL
            );
            END;
    
            $this->db->exec($sql);
        }
    }

    // Obtiene todos los perros, con opción de ordenar por cualquier campo
    public function getAllPerros() {
        //perros?orderby=asc contateno selec from

        $query = $this->db->prepare("SELECT * FROM perro ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // Obtiene un perro específico por ID
    public function getPerroById($id) {
        $query = $this->db->prepare('SELECT * FROM perro WHERE id_perro = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    // Agrega un nuevo perro
    public function addPerro($data) {
        $query = $this->db->prepare('INSERT INTO perro (nombre, nacimiento, padre, sexo, madre, id_criadero_fk, Imagen) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $query->execute([
            $data->nombre,
            $data->nacimiento,
            $data->padre,
            $data->sexo,
            $data->madre,
            $data->Imagen,
            $data->id_criadero_fk,
        ]);
        return $this->db->lastInsertId();
    }

    // Actualiza un perro específico por ID
    public function updatePerro($id, $data) {
        
        $query = $this->db->prepare("UPDATE perro SET nombre = ?, nacimiento = ?, padre = ?, sexo = ?, madre = ?, Imagen = ?, id_criadero_fk = ? WHERE id_perro = ?");
        $result = $query->execute([
            $data->nombre,
            $data->nacimiento,
            $data->padre,
            $data->sexo,
            $data->madre,
            $data->Imagen,
            $data->id_criadero_fk,
            $data->id_perro
        ]);
        return $result;
    }

    // Elimina un perro por ID
    public function deletePerro($id) {
        $query = $this->db->prepare('DELETE FROM perro WHERE id_perro = ?');
        return $query->execute([$id]);
    }
}
?>