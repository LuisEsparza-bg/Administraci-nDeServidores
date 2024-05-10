<?php 

include '../DAO/DAOUsers.php';
session_start();

$user = new users();
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$res = $user->registerUser($correo, $nombre, $contrasena );

if($res !== true){


    header('Location: http://localhost:8080/dashboard/AdserBiblioteca/AdministracionDeServidores/Client/HTML/Login.php');
    exit;
} else {
    header('Location: http://localhost:8080/dashboard/AdserBiblioteca/AdministracionDeServidores/Client/HTML/Registro.php');
    exit;
}

?>
