<?php
class ControladorIngreso
{
    #accion para guardar un ingreso desde el formulario
    public function ctrlGuardarIngreso()
    {
        if (
            isset($_POST['crearInvitado']) && isset($_POST['crearCantidad']) && isset($_POST['crearFecha'])
        ) {

            $data = array(
                "crearInvitado" => $_POST['crearInvitado'],
                "crearCantidad" => $_POST['crearCantidad'],
                "crearFecha" => $_POST['crearFecha']
            );

            $res = ModeloIngreso::guardarIngreso($data);
            echo $res;


            if ($res == "OK") {

                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"¡Ingreso Guardado Correctamente!",
                        showConfirmButton:true,
                        confirmButtonText:"Cerrar"
                    }).then(function(result){

                        if(result.value){

                            window.location="ingresos";

                        }
                    });
                    </script>';
            } else {

                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"¡Error, no se pudo guardar el ingreso!",
                        showConfirmButton:true,
                        confirmButtonText:"Cerrar"
                    }).then(function(result){

                        if(result.value){

                            window.location="ingresos";
                        }
                    });
                </script>';
            }
        }
    }

    #accion para preparar datos para una consulta de ingresos
    public static function ctrlCargarDatosIngresos($parametros, $id)
    {
        //llamar a la funcion para traer los datos de los ingresos
        $res = ModeloIngreso::traerDatosIngresos($parametros, $id);
        return $res;
    }

    #funcion para actualizar un ingreso
    public function ctrlActualizarIngreso()
    {
        if (isset($_POST['editarIdIngreso']) && isset($_POST['editarInvitado']) && isset($_POST['editarCantidad']) && isset($_POST['editarFecha'])) {
            $data = array(
                "id_ingreso" => $_POST['editarIdIngreso'],
                "id_invitado" => $_POST['editarInvitado'],
                "cantidad_personas" => $_POST['editarCantidad'],
                "fecha" => $_POST['editarFecha']
            );
            $res = ModeloIngreso::editarDatos($data);

            if ($res == "OK") {

                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"¡Ingreso Actualizado Correctamente!",
                        showConfirmButton:true,
                        confirmButtonText:"Cerrar"
                    }).then(function(result){

                        if(result.value){

                            window.location="ingresos";

                        }
                    });
                    </script>';
            } else {

                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"¡Error, no se pudo actualizar el ingreso!",
                        showConfirmButton:true,
                        confirmButtonText:"Cerrar"
                    }).then(function(result){

                        if(result.value){

                            window.location="ingresos";
                        }
                    });
                </script>';
            }
        }
    }

    #funcion para eliminar un ingreso
    public static function ctrlEliminarIngreso($id)
    {
        $res = ModeloIngreso::eliminarIngreso($id);
        return $res;
    }

    #funcion para contar los ingresos
    public function ctrlContarIngresos()
    {
        $res = ModeloIngreso::mdlcontarIngresos();
        return $res;
    }
}
