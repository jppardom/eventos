<?php

class ControladorEventos {

    /*=============================================
    CREAR EVENTO
    =============================================*/
    public function ctrCrearEvento() {
        // Validación: Solo registra si viene el nombre y NO viene un ID (es un evento nuevo)
        if(isset($_POST["nombre_evento"]) && (!isset($_POST["id_evento"]) || empty($_POST["id_evento"]))) {
            
            $tabla = "eventos";
            $datos = array(
                "nombre" => $_POST["nombre_evento"],
                "ubicacion" => $_POST["lugar_evento"],
                "fecha" => $_POST["fecha_evento"]
            );

            $respuesta = ModeloEventos::mdlIngresarEvento($tabla, $datos);

            if($respuesta == "ok") {
                echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "¡Guardado!",
                        text: "El evento se registró correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then((result) => { 
                        if (result.value) { 
                            window.location = "index.php?enlace=eventos"; 
                        } 
                    });
                </script>';
            }
        }
    }

    /*=============================================
    MOSTRAR EVENTOS
    =============================================*/
    static public function ctrMostrarEventos() {
        $tabla = "eventos";
        $respuesta = ModeloEventos::mdlMostrarEventos($tabla);
        return $respuesta;
    }

    /*=============================================
    EDITAR / ACTUALIZAR EVENTO (El método solicitado)
    =============================================*/
    public function ctrEditarEvento(){

        // Validación: Si el ID del evento SI existe y NO está vacío, es una ACTUALIZACIÓN
        if(isset($_POST["id_evento"]) && !empty($_POST["id_evento"]) && isset($_POST["nombre_evento"])){

            $tabla = "eventos";
            
            // Estructuramos el array con los datos modificados del formulario
            $datos = array(
                "id_evento" => $_POST["id_evento"],
                "nombre" => $_POST["nombre_evento"],
                "ubicacion" => $_POST["lugar_evento"],
                "fecha" => $_POST["fecha_evento"]
            );

            // Se invoca el método correspondiente del Modelo pasándole los nuevos datos
            $respuesta = ModeloEventos::mdlEditarEvento($tabla, $datos);

            // Si el modelo responde de manera exitosa ("ok"), disparamos la alerta visual
            if($respuesta == "ok"){
                echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "¡Actualizado!",
                        text: "¡El evento ha sido actualizado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then((result) => {
                        if (result.value) {
                            // Redirecciona de vuelta a la lista de eventos para ver los cambios
                            window.location = "index.php?enlace=eventos";
                        }
                    });
                </script>';
            }
        }
    }

    /*=============================================
    ELIMINAR EVENTO
    =============================================*/
    public function ctrEliminarEvento() {
        if(isset($_GET["idEliminar"])) {
            $tabla = "eventos";
            $datos = $_GET["idEliminar"];

            $respuesta = ModeloEventos::mdlEliminarEvento($tabla, $datos);

            if($respuesta == "ok") {
                echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "¡Eliminado!",
                        text: "El evento ha sido borrado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then((result) => {
                        if (result.value) {
                            window.location = "index.php?enlace=eventos";
                        }
                    });
                </script>';
            }
        }
    }
}
