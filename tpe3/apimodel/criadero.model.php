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

    function listarCategorias(){
        
        //Enviamos la consulta y obtenemos el resultado
        $query = $this->db->prepare( 'SELECT * FROM criadero '); 
        $query->execute();

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
}
?>
