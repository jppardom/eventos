<?php
class contraladorUsuario{
    public function crtlLoginUsuario(){
        
        if (isset($_POST["usuario"]) && isset($_POST["contrasenia"]) && !empty($_POST["usuario"]) && !empty($_POST["contrasenia"])){
           
            $usuario = $_POST["usuario"];
            $contrasenia = $_POST["contrasenia"];
            $datos = modeloUsuario::buscarUsuario($usuario, $contrasenia);

            

            if (isset($datos['usuario']) && $datos['usuario'] == $usuario && $datos['contrasenia'] == $contrasenia){
                $_SESSION["login"] = "activo";
                $_SESSION["nombre"] = $datos["nombres"]." ". $datos["apellidos"];
                echo '<script>
							window.location.href="inicio";
						  </script>';
            }
            else{
                 echo ('
                    <script>
                     Swal.fire({
                         icon: "error",
                         title: "Datos de autenticación",
                         text: "Inserte correctamente sus credenciales",
                        });
                    </script>
                    ');
            }
            
        }else{
          
        }
    }
}