<?php
require_once 'tpe3/database/config.php';

class UserModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    }
 
    public function getUserByEmail($user) {    
        $query = $this->db->prepare("SELECT * FROM user WHERE Usuario = ?");
        $query->execute([$user]);
    
        $user = $query->fetch(PDO::FETCH_OBJ);
    
        return $user;
    }
}