<?php

    header("Content-Type: application/json");
    include '../DAO/DAOLibros.php';
    session_start();

    $usu2 = new LibrosDAO();
    $categoria = $_POST['categoria'];
    $tituloAutor = $_POST['autorTitulo'];
    $res2 = $usu2->getProductsBySearch($tituloAutor, $categoria);
    if ($res2 !== false) {
        foreach ($res2 as &$producto) {
            $producto['Portada'] = base64_encode($producto['Portada']);
        }
        echo json_encode($res2); 
    } else {
        // Manejar caso en que no se encontraron datos
        echo json_encode([]); // Devolver un JSON vacío o un mensaje de error
    }

?>