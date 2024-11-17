<?php
require_once 'tpe3/database/config.php';
// hacer crud
class CriaderoModel{
    protected $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $this->_deploy();
    }

    private function _deploy()
    {
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
            $this->db->query($sql);
        }
    }

    function listarCategorias($req){
        
        $order_by = isset($req->query->order_by) ? $req->query->order_by : NULL;
        $order =  isset($req->query->order) ? $req->query->order : NULL;
        $localidad =  isset($req->query->localidad) ? $req->query->localidad : NULL;
        $raza =  isset($req->query->raza) ? $req->query->raza : NULL;

        // Concatenamos la Query SQL y el Execute según corresponda
        $querySQL = 'SELECT * FROM `criadero`';
        $execute = array();

        // Filtros opcionales de Localidad y/o Raza
        if (isset($localidad) && isset($raza)) {
            $querySQL.=' WHERE  `Localidad` = ?';
            array_push($execute, $localidad);
            $querySQL.=' AND  `Raza` = ?';
            array_push($execute, $raza);
        } else {
            if (isset($localidad)) {
                $querySQL.=' WHERE  `Localidad` = ?';
                array_push($execute, $localidad);
            }
            if (isset($raza)) {
                $querySQL.=' WHERE  `Raza` = ?';
                array_push($execute, $raza);
            }
        }

        // Orden opcionar por Nombre o Direccion, Ascendente o Descendente
        if (isset($order_by)) {
            if ($order_by === 'Nombre') {
                $querySQL.=' ORDER BY `Nombre`';
            } else if ($order_by === 'Direccion') {
                $querySQL.=' ORDER BY `Direccion`';
            }

            if (isset($order) && $order === 'DESC') {
                $querySQL.=' DESC';
            } else {
                $querySQL.=' ASC';
            }
        }
        
        $querySQL.=';';
        
        // Ejecutamos la Query SQL y el execute resultante
        $query = $this->db->prepare( $querySQL );
        $query->execute($execute);

        //Obtengo todos los datos de la consulta
        $criaderos = $query->fetchAll(PDO::FETCH_OBJ);

        return $criaderos;

    }

    function listarCategoriasById($req) {
        $id = $req->params->id;        

        //Enviamos la consulta y obtenemos el resultado
        $query = $this->db->prepare( 'SELECT * FROM criadero WHERE id_criadero=?'); 
        $query->execute([$id]);

        //Obtengo todos los datos de la consulta
        $criaderos = $query->fetch(PDO::FETCH_OBJ);

        return $criaderos;

    }
    function agregarCriadero($data){
        
        $query = $this->db->prepare('INSERT INTO criadero (Nombre, Direccion, Localidad, Raza, Imagen) VALUES (?,?,?,?,?)');
        
        $query->execute([
            $data->Nombre,
            $data->Direccion,
            $data->Localidad,
            $data->Raza,
            $data->Imagen
        ]);    

        return $this->db->lastInsertId();
    }
    function editarCriadero($req){        

        $query = $this->db->prepare('UPDATE criadero 
            SET Nombre = ?, Direccion = ?, Localidad = ?, Raza = ?, Imagen = ? WHERE id_criadero = ?');
        
        $result = $query->execute([
            $req->body->Nombre,
            $req->body->Direccion,
            $req->body->Localidad,
            $req->body->Raza,
            $req->body->Imagen,
            $req->params->id
        ]);
        return $result;

    }

    function eliminarCriadero($req) {
        $id = $req->params->id;

        $query=$this->db->prepare('DELETE FROM criadero WHERE id_criadero = ? ');
        $query->execute([$id]);
            
    }

    function eliminarPerrosCriadero($req) {
        $id = $req->params->id;
        
        $query=$this->db->prepare('DELETE FROM perro WHERE id_criadero_fk = ? ');
        $query->execute([$id]);

    }
}
?>
