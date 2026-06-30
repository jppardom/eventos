<?php
require_once "conexion.php";
class ModeloIngreso
{
    #funcion para guardar un ingreso
    public static function guardarIngreso($data)
    {
        $stm = Conexion::conectar()->prepare("INSERT INTO ingresos (id_invitado, cantidad_personas, fecha)
                                                VALUES (:crearInvitado, :crearCantidad, :crearFecha)");
        $stm->bindParam(":crearInvitado", $data["crearInvitado"], PDO::PARAM_STR);
        $stm->bindParam(":crearCantidad", $data["crearCantidad"], PDO::PARAM_STR);
        $stm->bindParam(":crearFecha", $data["crearFecha"], PDO::PARAM_STR);

        if ($stm->execute()) {
            return "OK";
        } else {
            return "Error";
        }
    }

    //funcion para cargar y traer los datos de los ingresos
    public static function traerDatosIngresos($parametros, $id)
    {
        if ($parametros) {
            $stm = conexion::conectar()->prepare("SELECT ingresos.*, invitados.id_invitado AS invitado 
                                              FROM ingresos 
                                              INNER JOIN invitados ON ingresos.id_invitado= invitados.id_invitado");
            $stm->execute();
            return $stm->fetchAll();
        } else {
            $stm = conexion::conectar()->prepare("SELECT * FROM ingresos WHERE id_ingreso = :id_ingreso");
            $stm->bindParam(":id_ingreso", $id, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch();
        }
    }

    #funcion para editar un ingreso
    public static function editarDatos($data)
    {
        $stm = Conexion::conectar()->prepare(" UPDATE ingresos SET id_invitado = :id_invitado, cantidad_personas = :cantidad_personas,
                fecha = :fecha
            WHERE id_ingreso = :id_ingreso");

        $stm->bindParam(":id_ingreso", $data["id_ingreso"], PDO::PARAM_INT);
        $stm->bindParam(":id_invitado", $data["id_invitado"], PDO::PARAM_STR);
        $stm->bindParam(":cantidad_personas", $data["cantidad_personas"], PDO::PARAM_STR);
        $stm->bindParam(":fecha", $data["fecha"], PDO::PARAM_STR);

        if ($stm->execute()) {
            return "OK";
        } else {
            print_r($stm->errorInfo()); // temporal para depurar
            return "Error";
        }
    }
    #funcion para eliminar un ingreso
    public static function eliminarIngreso($id)
    {
        $stm = conexion::conectar()->prepare("DELETE FROM ingresos WHERE id_ingreso = :id_ingreso");
        $stm->bindParam(":id_ingreso", $id, PDO::PARAM_INT);
        if ($stm->execute()) {
            return "1";
        } else {
            return "0";
        }
    }

    #funcion para contar los ingresos
    public static function mdlContarIngresos()
    {
        $stm = conexion::conectar()->prepare("SELECT COUNT(*) as numeroIngresos FROM ingresos");
        $stm->execute();
        return $stm->fetch();
    }
}
