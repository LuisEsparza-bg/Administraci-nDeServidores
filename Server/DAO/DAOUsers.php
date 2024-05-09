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

    function login($username, $password){

        try {
            $con = $this->connect();
    
            // Preparar la consulta SQL con marcadores de posición
            $query = "SELECT * FROM usuario WHERE Correo_Electronico = :correo AND Contrasena = :contrasena";
            $exec = $con->prepare($query);
            
            // Asociar los valores a los marcadores de posición
            $exec->bindParam(':correo', $username);
            $exec->bindParam(':contrasena', $password);
            
            // Ejecutar la consulta
            $exec->execute();
    
            // Verificar si la consulta fue exitosa
            if ($exec->rowCount() > 0) {
                // Recuperar los datos del usuario
                $username = $exec->fetch(PDO::FETCH_ASSOC);
                $exec = null;
                return $username; // Devuelve los datos del usuario
            } else {
                $exec = null;
                return false; // Error en la consulta
            }
        } catch (PDOException $e) {
            // Manejar errores de la base de datos
            echo "Error al hacer login: " . $e->getMessage();
            $exec = null;
            return false;
        }
    }
    


}

?>