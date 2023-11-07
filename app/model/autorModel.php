<?php
require_once 'app/model/model.php';
class AutorModel extends Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function get($id){
        $query = $this->db->prepare("SELECT * FROM Autores WHERE ID = ?");
        $query->execute([$id]);
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }
}