<?php
require_once "conexion.php";
class ModeloEstudiantes
{
    public static function guardarEstudiante($data)
    {
        $stm = Conexion::conectar()->prepare("INSERT INTO estudiantes(cedula, nombres, apellido, correo, especialidad, periodo)
        VALUES (:crearCedula, :crearNombres, :crearApellido, :crearCorreo, :crearEspecialidad, :crearPeriodo)
        ");

        $stm->bindParam(":crearCedula", $data["crearCedula"], PDO::PARAM_STR);
        $stm->bindParam(":crearNombres", $data["crearNombres"], PDO::PARAM_STR);
        $stm->bindParam(":crearApellido", $data["crearApellido"], PDO::PARAM_STR);
        $stm->bindParam(":crearCorreo", $data["crearCorreo"], PDO::PARAM_STR);
        $stm->bindParam(":crearEspecialidad", $data["crearEspecialidad"], PDO::PARAM_STR);
        $stm->bindParam(":crearPeriodo", $data["crearPeriodo"], PDO::PARAM_STR);


        if ($stm->execute()) {
            return "OK";
        } else {
            return "Error";
        }
    }

    public static function traerDatosEstudiante($parametros, $id)
    {
        if ($parametros) {
            $stm = conexion::conectar()->prepare("SELECT estudiantes.*, estudiantes.id_estudiante AS id_estudiante FROM estudiantes");
            $stm->execute();
            return $stm->fetchAll();
        } else {
            $stm = conexion::conectar()->prepare("SELECT * FROM estudiantes WHERE id_estudiante = :id_estudiante");
            $stm->bindParam(":id_estudiante", $id, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch();
        }
    }

    #funcion para guardar un ingreso
    public static function editarDatos($data)
    {
        $stm = Conexion::conectar()->prepare(" UPDATE estudiantes SET cedula = :cedula, nombres = :nombres,
                apellido = :apellido, correo = :correo, especialidad = :especialidad, periodo = :periodo
            WHERE id_estudiante = :id_estudiante");

        $stm->bindParam(":id_estudiante", $data["id_estudiante"], PDO::PARAM_INT);
        $stm->bindParam(":cedula", $data["cedula"], PDO::PARAM_STR);
        $stm->bindParam(":nombres", $data["nombres"], PDO::PARAM_STR);
        $stm->bindParam(":apellido", $data["apellido"], PDO::PARAM_STR);
        $stm->bindParam(":correo", $data["correo"], PDO::PARAM_STR);
        $stm->bindParam(":especialidad", $data["especialidad"], PDO::PARAM_STR);
        $stm->bindParam(":periodo", $data["periodo"], PDO::PARAM_STR);

        if ($stm->execute()) {
            return "OK";
        } else {
            print_r($stm->errorInfo()); // temporal para depurar
            return "Error";
        }
    }

    #funcion para eliminar un estudiante
    public static function eliminarEstudiante($id)
    {
        $stm = conexion::conectar()->prepare("DELETE FROM estudiantes WHERE id_estudiante = :id_estudiante");
        $stm->bindParam(":id_estudiante", $id, PDO::PARAM_INT);
        if ($stm->execute()) {
            return "1";
        } else {
            return "0";
        }
    }

    #funcion para contar los estudiantes
    public static function mdlContarEstudiantes()
    {
        $stm = conexion::conectar()->prepare("SELECT count(*) as numeroEstudiantes FROM estudiantes");
        $stm->execute();
        return $stm->fetch();
    }
}
