<?php

include '../DAO/DAOLibros.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tituloLibro = $_POST["Titulo"];
    $autorLibro = $_POST["Nombre"];
    $categorias = $_POST["Categoria"];
    $yearPublicacion = $_POST["Year"];
    $sinopsisLibro = $_POST["Sinopsis"];
    $editorialLibro = $_POST["Editorial"];
    $portadaBlob = file_get_contents($_FILES['Imagen']['tmp_name']);

    $librosDAO = new LibrosDAO();

    $resultado = $librosDAO->insertarLibro($tituloLibro, $autorLibro, $yearPublicacion, $sinopsisLibro, $editorialLibro, $categorias, $portadaBlob);

    echo $resultado;
} else {
    http_response_code(405);
    echo "Error: Método no permitido. Esta API solo acepta solicitudes POST.";
}

?>
