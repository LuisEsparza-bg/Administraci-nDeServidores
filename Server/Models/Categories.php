<?php

class Categories
{
	private $id;
	private $nombre;



	/**
	 * @return mixed
	 */
	public function getNombre()
	{
		return $this->nombre;
	}

	/**
	 * @param mixed $nombre 
	 * @return self
	 */
	public function setNombre($nombre): self
	{
		$this->nombre = $nombre;
		return $this;
	}


	public function __construct($idCategoria = null, $nombre = null)
{
    if ($idCategoria !== null) {
        $this->idCategoria = $idCategoria;
    } else {
        $this->nombre = $nombre;
    }
}


	public function VerCategorias($pdo)
	{
		try {
			$sql = "SELECT ID_Categoria, Nombre_Categoria FROM CATEGORIAS_LIBROS";
			$stmt = $pdo->prepare($sql);
			$stmt->execute();
				$categorias = array();

				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$categorias[] = $row;
				}


			return $categorias;
		} catch (PDOException $e) {
			return "Error: " . $e->getMessage();
		}
	}

	

}
