<?php
//llamar a todos los controladores
require_once "controladores/ctrlPrincipal.php";
require_once "controladores/ctrlUsurios.php";

//llamar a todos los modelos
require_once "modelos/mdlUsuario.php";
 
$objPrincipal = new Principal();
$objPrincipal->ctrlPrincipal();