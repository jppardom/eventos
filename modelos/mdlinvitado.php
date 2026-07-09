<?php
require_once "conexion.php";

class ModeloInvitado
{


    public static function guardarInvitado($data)
    {


        $stm = conexion::conectar()->prepare(
            "INSERT INTO invitados(id_Invitado, id_estudiante, id_evento, cupo, codigo_qr)
            VALUES(:id_invitado, :id_estudiante, :id_evento, :cupo, :codigo_qr)"
        );
        $stm->bindParam(":id_invitado", $data["id_invitado"], PDO::PARAM_STR);

        $stm->bindParam(":id_estudiante", $data["crearEstudiante"], PDO::PARAM_INT);

        $stm->bindParam(":id_evento", $data["crearEvento"], PDO::PARAM_INT);

        $stm->bindParam(":cupo", $data["crearCupo"], PDO::PARAM_INT);

        $stm->bindParam(":codigo_qr", $data["crearqr"], PDO::PARAM_STR);
        if ($stm->execute()) {

            return "OK";
        } else {

            return "ERROR";
        }
    }




    public static function traerDatos($parametro, $id)
    {

        if ($parametro) {
            $stm = conexion::conectar()->prepare(

                "SELECT invitados.*,
                        CONCAT(estudiantes.nombres, ' ',estudiantes.apellido)  AS estudiantes,
                        eventos.nombre AS eventos

                        FROM invitados

                        INNER JOIN estudiantes 
                        ON invitados.id_estudiante = estudiantes.id_estudiante

                        INNER JOIN eventos
                        ON invitados.id_evento = eventos.id_evento"
            );

            $stm->execute();

            return $stm->fetchAll();
        } else {
            $stm = conexion::conectar()->prepare("SELECT * FROM invitados WHERE id_invitado = :id_invitado");
            $stm->bindParam(":id_invitado", $id, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch();
        }
    }

    #Función para actualizar datos
    public static function editarDatosI($data)
    {

        $stm = conexion::conectar()->prepare("UPDATE invitados SET id_estudiante=:id_estudiante, id_evento=:id_evento, cupo=:cupo, codigo_qr=:codigo_qr
                                            WHERE id_invitado=:id_invitado");
        $stm->bindParam(":id_estudiante", $data["id_estudiante"], PDO::PARAM_INT);
        $stm->bindParam(":id_evento", $data["id_evento"], PDO::PARAM_INT);
        $stm->bindParam(":cupo", $data["cupo"], PDO::PARAM_INT);
        $stm->bindParam(":codigo_qr", $data["codigo_qr"], PDO::PARAM_STR);
        $stm->bindParam(":id_invitado", $data["id_invitado"], PDO::PARAM_INT);
        if ($stm->execute()) {
            return "OK";
        } else {
            return "Error";
        }
    }
    #Función para eliminar datos
    public static function EliminarDatosI($id)
    {
        $stm = conexion::conectar()->prepare("DELETE FROM invitados WHERE id_invitado=:id");
        $stm->bindParam(":id", $id, PDO::PARAM_INT);
        if ($stm->execute()) {
            return 1;
        } else {
            return 0;
        }
    }
    #Función para contar los registro de la tabla
    public static function contarInvitados()
    {
        $stm = conexion::conectar()->prepare("SELECT COUNT(*) AS numeroInvitados FROM invitados");
        $stm->execute();
        return $stm->fetch();
    }

    #Función para verificar el id de invitado
    public static function existeCodigo($codigo) {
        $stm = conexion::conectar()->prepare("SELECT COUNT(*) FROM invitados WHERE id_invitado = :codigo");
        $stm->bindParam(':codigo', $codigo, PDO::PARAM_STR);
        $stm->execute();

        // Si el conteo es mayor a 0, el código ya existe
        return $stm->fetchColumn() > 0;
    }
}
