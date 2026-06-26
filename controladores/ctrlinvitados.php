<?php
class ControladorInvitado{
    #Función para preparar los datos para guardar
    public function ctrlGuardarInvitado (){
        
        
        
        
        if(isset($_POST["crearEstudiante"]) &&
isset($_POST["crearEvento"]) &&
isset($_POST["crearCupo"]) &&
isset($_POST["crearqr"])){

            
            $data = array(

"crearEstudiante" => $_POST["crearEstudiante"],

"crearEvento" => $_POST["crearEvento"],

"crearCupo" => $_POST["crearCupo"],

"crearqr" => $_POST["crearqr"]

);
            
            $inv = ModeloInvitado::guardarInvitado($data);
            echo $inv;

            if ($inv == "OK"){
                echo '<script>
                        Swal.fire({
                            icon:"success",
                            title: "¡Datos de Invitados Guardados Correctamente...!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "Invitados";
                            }
                        })
                      </script>
                    ';
            }else{
                echo '<script>
                        Swal.fire({
                            icon:"error",
                            title: "¡Datos de Invitados no se pueden guardar!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "Invitados";
                            }
                        })
                      </script>
                ';
            }
         }
    }

    #Función para preparar datos la una consulta
    public static function ctrlCargarDatosI ($parametro, $id){
        $res = ModeloInvitado::traerDatos($parametro, $id);
        return $res ;

    }


#Función para actualizar dartos 
    public function ctrlActualizarDatosI (){
        if (isset($_POST['editarEstudiante']) && isset($_POST['editarEvento']) && isset($_POST['editarCupo']) && isset($_POST['editarqr'])){
                $data = array (
                    'id_invitado' => (int) $_POST['id_invitado'],
                    'id_estudiante' => (int) $_POST['editarEstudiante'],
                    'id_evento' => (int) $_POST['editarEvento'],
                    'cupo' => (int) $_POST['editarCupo'],
                    'codigo_qr' => $_POST['editarqr']
                );
                var_dump($data);
                $res = ModeloInvitado::editarDatosI ($data);
                echo $res;

            if ($res == "OK"){
                echo '<script>
                        Swal.fire({
                            icon:"success",
                            title: "¡Datos de Invitados Actualizados Correctamente...!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "Invitados";
                            }
                        })
                      </script>
                    ';
            }else{
                echo '<script>
                        Swal.fire({
                            icon:"error",
                            title: "¡Datos de Invitados no se pueden ser actualizados!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "Invitados";
                            }
                        })
                      </script>
                ';
            }
            }
    }
    #Función para eliminar datos
    public static function ctrlEliminarI($id){
        $res = ModeloInvitado::EliminarDatosI((int)$id);
        return $res;

    }
    #Función para contar los resgistros
    public static function ctrlContarInvitados(){
        $res = ModeloInvitado::contarInvitados();
        return $res;
    }
}