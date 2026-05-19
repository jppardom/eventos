<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.min.css">
  <!-- Sweetalert2-->
  <link rel="stylesheet" href="vistas/plugins/sweetalert2/sweetalert2.min.css">
  <script src="vistas/plugins/sweetalert2/sweetalert2.min.js"></script>
  
</head>


<?php

if (isset($_SESSION["login"]) && ($_SESSION["login"]=="activo")){
  
  echo '<body class="hold-transition sidebar-mini">';
    

  echo '<div class="wrapper">';

  include "vistas/componentes/menu.php";
  include "vistas/componentes/sidebar.php";

  //Rutas de nuestra aplicación

  if (isset($_GET["enlace"])){
    if ($_GET["enlace"]== "inicio" ||
        $_GET["enlace"]== "salir" ||
        $_GET["enlace"]== "peliculas")
      {
        include "vistas/componentes/".$_GET["enlace"].".php";
      }
      else{
        include "vistas/componentes/404.php";
      }
  }else{
    include  "vistas/componentes/inicio.php";
  }

  include "vistas/componentes/footer.php";
  echo '</div>';
}
else{
  echo '<body class="hold-transition login-page">';
  include  "vistas/componentes/login.php";
}


?>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->


<!-- jQuery -->
<script src="vistas/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="vistas/dist/js/adminlte.min.js"></script>
 <!-- Sweetalert2-->


</body>
</html>
