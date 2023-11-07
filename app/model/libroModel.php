<?php
require_once 'app/model/model.php';
class LibroModel extends Model {
    public function __construct() {
        parent::__construct();
    }
    public function getLibros($sort,$order){
        $query = $this->db->prepare("SELECT * FROM Libros ORDER BY " . $sort . " " . $order);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public function getLibro($id){
        $query = $this->db->prepare("SELECT * FROM Libros WHERE ID = ?");
        $query->execute([$id]);
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public function insert($foto, $nombre, $genero, $autor, $editorial){
        $query = $this->db->prepare('INSERT INTO Libros (Foto, Nombre, Genero, Autor, Editorial) VALUES(?,?,?,?,?)');
        $query->execute([$foto, $nombre, $genero, $autor, $editorial]);
        return $this->db->lastInsertId();

    }
    public function updateLibroData($id, $foto, $nombre, $genero, $autor, $editorial){
        $query = $this->db->prepare('UPDATE Libros SET  Foto = ?, Nombre = ?, Genero = ?,Autor = ?,Editorial = ? WHERE ID = ? ');
        $query->execute([$foto, $nombre, $genero, $autor, $editorial,$id]);
    }
    function deleteLibro($id) {
        $query = $this->db->prepare('DELETE FROM Libros WHERE id = ?');
        $query->execute([$id]);
    }
}