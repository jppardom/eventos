<?php
//llamar a todos los controladores
require_once "controladores/ctrlPrincipal.php";
require_once "controladores/ctrlUsurios.php";
require_once "controladores/ctrlPersona.php";
require_once "controladores/ctrlGeneroPeliculas.php";
require_once "controladores/ctrlinvitados.php";

//controladores de ingresos
require_once "controladores/ctrlIngresos.php";
require_once "controladores/ctrlDatosInvitado.php";

//controladores de estudiantes
require_once "controladores/ctrlEstudiantes.php";

//llamar a todos los modelos
require_once "modelos/mdlUsuario.php";
require_once "modelos/mdlPersona.php";
require_once "modelos/mdlGeneroPeliculas.php";
require_once "modelos/mdlinvitado.php";

//modelos de ingresos
require_once "modelos/mdlIngreso.php";
require_once "modelos/mdlDatosInvitado.php";

//modelos de estudiantes
require_once "modelos/mdlEstudiantes.php";

$objPrincipal = new Principal();
$objPrincipal->ctrlPrincipal();
