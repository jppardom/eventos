<?php

class ControladorEstudiante
{
    public function ctrlGuardarEstudiante()
    {

        if (
            isset($_POST['crearCedula']) &&
            isset($_POST['crearNombres']) &&
            isset($_POST['crearApellido']) &&
            isset($_POST['crearCorreo']) &&
            isset($_POST['crearEspecialidad']) &&
            isset($_POST['crearPeriodo'])
        ) {
            $data = array(

                "crearCedula" => $_POST['crearCedula'],
                "crearNombres" => $_POST['crearNombres'],
                "crearApellido" => $_POST['crearApellido'],
                "crearCorreo" => $_POST['crearCorreo'],
                "crearEspecialidad" => $_POST['crearEspecialidad'],
                "crearPeriodo" => $_POST['crearPeriodo']

            );

            $res = ModeloEstudiantes::guardarEstudiante($data);
            if ($res == "OK") {
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Estidiante Guardado Correctamente!",
                        showConfirmButton:true,
                        confirmButtonText:"Cerrar"
                    }).then(function(result){

                        if(result.value){

                            window.location="estudiantes";

                        }
                    });
                </script>';
            } else {
                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"¡Error, no se pudo guardar el estudiante!",
                        showConfirmButton:true,
                        confirmButtonText:"Cerrar"
                    }).then(function(result){

                        if(result.value){

                            window.location="estudiantes";
                        }
                    });
                </script>';
            }
        }
    }

    public static function ctrlCargarDatosEstudiante($parametros, $id)
    {
        //llamar a la funcion para traer los datos de los estudiantes
        $res = ModeloEstudiantes::traerDatosEstudiante($parametros, $id);
        return $res;
    }

    public function ctrlActualizarEstudiante()
    {
        if (isset($_POST['editarIdEstudiante']) && isset($_POST['editarCedula']) && isset($_POST['editarNombres']) && isset($_POST['editarApellido']) && isset($_POST['editarCorreo']) && isset($_POST['editarEspecialidad']) && isset($_POST['editarPeriodo'])) {

            $data = array(
                "id_estudiante" => $_POST['editarIdEstudiante'],
                "cedula" => $_POST['editarCedula'],
                "nombres" => $_POST['editarNombres'],
                "apellido" => $_POST['editarApellido'],
                "correo" => $_POST['editarCorreo'],
                "especialidad" => $_POST['editarEspecialidad'],
                "periodo" => $_POST['editarPeriodo']
            );

            $res = ModeloEstudiantes::editarDatos($data);

            if ($res == "OK") {
                echo '<script>
                Swal.fire({
                    icon:"success",
                    title:"¡Estudiante Actualizado Correctamente!",
                    showConfirmButton:true,
                    confirmButtonText:"Cerrar"
                }).then(function(result){
                    if(result.value){
                        window.location="estudiantes";
                    }
                });
                </script>';
            } else {
                echo '<script>
                Swal.fire({
                    icon:"error",
                    title:"¡Error, no se pudo actualizar el estudiante!",
                    showConfirmButton:true,
                    confirmButtonText:"Cerrar"
                }).then(function(result){
                    if(result.value){
                        window.location="estudiantes";
                    }
                });
            </script>';
            }
        }
    }

    #funcion para eliminar un estudiante
    public static function ctrlEliminarEstudiante($id)
    {
        $res = ModeloEstudiantes::eliminarEstudiante($id);
        return $res;
    }

    #funcion para contar los ingresos
    public static function ctrContarEstudiantes()
    {
        $res = ModeloEstudiantes::mdlContarEstudiantes();
        return $res;
    }
}
