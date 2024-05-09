<?php 

include '../DAO/DAOUsers.php';
session_start();

$login = new users();
$username = $_POST['correo'];
$password = $_POST['contrasena'];
$res = $login->login($username,$password);
if($res !== false){
    
    $_SESSION['correo'] = $res['Correo_Electronico'];
    $_SESSION['nombre'] = $res['Nombre_Completo'];
    $_SESSION['contrasena'] = $res['Contrasena']; 
    $_SESSION['idUser'] = $res['ID_Usuario'];
    $_SESSION['rol'] = $res['Rol'];

    header('location: http://localhost:8080/dashboard/AdserBiblioteca/AdministracionDeServidores/Client/HTML/PaginaInicio.php');
    exit;
}else{
    echo
    header('location: http://localhost:8080/dashboard/AdserBiblioteca/AdministracionDeServidores/Client/HTML/Login.php');
}


?>










