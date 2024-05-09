<?php

include '../DBConnection/ConnectDB.php';

Class users extends DB{

    function registerUser($correo, $nombre, $contrasena){
        try{
            $con = $this->connect();

            $query = "INSERT INTO usuario (Correo_Electronico, Nombre_Completo, Contrasena, Rol) VALUES (:correo, :nombre, :contrasena, :rol)";
            $exec = $con->prepare($query);
    
            $exec->bindParam(':correo', $correo);
            $exec->bindParam(':nombre', $nombre);
            $exec->bindParam(':contrasena', $contrasena);
            $exec->bindValue(':rol', 1);
            $exec->execute();
    
            if($exec->rowCount() > 0){
                $user = $exec->fetch(PDO::FETCH_ASSOC);
                $exec = null;
                return $user;
            }else{
                $exec = null;
                return false;
            }
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
            $exec = null;
            return false;
        }
    }
    
}

?>