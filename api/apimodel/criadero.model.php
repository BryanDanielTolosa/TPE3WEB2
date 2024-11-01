<?php
require_once './app/database/config.php';
// hacer crud
class CriaderoModel{
    protected $db;

    public function __construct()
    {
        $this->db = new PDO(
            "mysql:host=" . MYSQL_HOST .
                ";dbname=" . MYSQL_DB . ";charset=utf8",
            MYSQL_USER,
            MYSQL_PASS
        );
        $this->_deploy();
    }

    private function _deploy()
    {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if (count($tables) == 0) {
            $sql = <<<END

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

    function listarCategoriasById($id){
        //Abrimos una conexcion con la base de datos
        

        //Enviamos la consulta y obtenemos el resultado
        $query = $this->db->prepare( 'SELECT * FROM criadero WHERE id_criadero=?'); 
        $query->execute([$id]);

        //Obtengo todos los datos de la consulta
        $criaderos = $query->fetchAll(PDO::FETCH_OBJ);

        return $criaderos;

    }

    function listarItemsPorCategoria($id){
        //Abrimos una conexcion con la base de datos
        

        //Enviamos la consulta y obtenemos el resultado
        $query = $this->db->prepare( 'SELECT * FROM perro WHERE id_criadero_fk=?'); 
        $query->execute([$id]);

        //Obtengo todos los datos de la consulta

        $items = $query->fetchAll(PDO::FETCH_OBJ);

        return $items;
    }

    function agregarCriadero($nombre , $direccion, $localidad, $raza, $imagen){
        
        $query = $this->db->prepare('INSERT INTO criadero (Nombre, Direccion, Localidad, Raza, Imagen) VALUES (?,?,?,?,?)');
            
        $query->execute([$nombre , $direccion, $localidad, $raza, $imagen]);
    
        
    }

    function editarCriadero($nombre, $direccion, $localidad, $raza, $imagen, $idEntero){

        

            $query = $this->db->prepare('UPDATE criadero 
            SET Nombre = ?, Direccion = ?, Localidad = ?, Raza = ?, Imagen = ? WHERE id_criadero = ?');
            
        $query->execute([$nombre , $direccion, $localidad, $raza, $imagen, $idEntero]);

        echo"Criadero editado";

    }

    function eliminarCriadero($id){

        $query=$this->db->prepare('DELETE FROM criadero WHERE id_criadero = ? ');
            try{
                $query->execute([$id]);
            }
            catch(PDOException $ex){
                die('no se puede borrar este Criadero');
            }
    }

    function eliminarPerrosCriadero($id){
            $query=$this->db->prepare('DELETE FROM perro WHERE id_criadero_fk = ? ');
            try{
                $query->execute([$id]);
            }
            catch(PDOException $ex){
                die('No se puede borrar este criadero');
            }
    }
}
?>
