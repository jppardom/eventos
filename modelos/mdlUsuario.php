<?php

require_once "conexion.php";

class modeloUsuario{
    public static function buscarUsuario ($usuario, $contrasenia){
        try{
            $stm = conexion::conectar()->prepare("SELECT * FROM usuarios WHERE usuario = :usuario AND contrasenia = :contrasenia");
            $stm->bindParam(":usuario", $usuario, PDO::PARAM_STR);
            $stm->bindParam(":contrasenia", $contrasenia, PDO::PARAM_STR);
            $stm->execute();
            return $stm->fetch();
        }catch (Exception $e){
            echo 'Error: ' . $e->getMessage();
        }
        
    }
}