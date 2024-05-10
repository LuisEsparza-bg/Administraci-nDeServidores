<?php

include '../DBConnection/ConnectDB.php';

class LibrosDAO {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function insertarLibro($tituloLibro, $autorLibro, $yearPublicacion, $sinopsisLibro, $editorialLibro, $categoriaLibro, $portadaBlob) {
        try {
            $pdo = $this->db->connect();

            $stmt = $pdo->prepare("INSERT INTO Libros (Titulo, Nombre_Autor, Year_Publicacion, Sinopsis, ID_Categoria, Editorial, Portada) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bindParam(1, $tituloLibro, PDO::PARAM_STR);
            $stmt->bindParam(2, $autorLibro, PDO::PARAM_STR);
            $stmt->bindParam(3, $yearPublicacion, PDO::PARAM_STR);
            $stmt->bindParam(4, $sinopsisLibro, PDO::PARAM_STR);
            $stmt->bindParam(5, $categoriaLibro, PDO::PARAM_INT);
            $stmt->bindParam(6, $editorialLibro, PDO::PARAM_STR);
            $stmt->bindParam(7, $portadaBlob, pdo::PARAM_LOB);
            $stmt->execute();

            return "Libro insertado correctamente.";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
}



?>
