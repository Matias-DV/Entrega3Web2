<?php
class LibroModel extends Model {
    public function __construct() {
        parent::__construct();
    }
    public function getLibros($sort,$order){
        $query = $this->db->prepare("SELECT * FROM Libros ORDER BY ? ?");
        $query->execute([$sort,$order]);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public function getLibro($id){
        $query = $this->db->prepare("SELECT * FROM Libros WHERE ID = ?");
        $query->execute([$id]);
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }
}