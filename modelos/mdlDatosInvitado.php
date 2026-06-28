<?php
require_once "conexion.php";
class ModeloDatosInvitado
{
    #funcion para traer los datos de los invitados
    public static function traerDatosInvitados()
    {
        $stm = conexion::conectar()->prepare("SELECT * FROM invitados");
        $stm->execute();
        return $stm->fetchAll();
    }
}
