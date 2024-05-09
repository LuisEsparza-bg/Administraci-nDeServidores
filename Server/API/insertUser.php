<?php 

include '../DAO/DAOUsers.php';
session_start();

$user = new users();
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$res = $user->registerUser($nombre, $correo, $contrasena );

if($res !== true){
    $_SESSION['correo'] = $res['Correo_Electronico'];
    $_SESSION['nombre'] = $res['Nombre_Completo'];
    $_SESSION['contrasena'] = $res['Contrasena']; 
    $_SESSION['idUser'] = $res['ID_Usuario'];

    header('Location: http://localhost:8080/dashboard/AdserBiblioteca/AdministracionDeServidores/Client/HTML/Login.php');
    exit;
} else {
    header('Location: http://localhost:8080/dashboard/AdserBiblioteca/AdministracionDeServidores/Client/HTML/Registro.php');
    exit;
}

?>
