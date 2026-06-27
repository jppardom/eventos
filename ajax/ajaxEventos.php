<?php

require_once "../controladores/ctrlEventos.php";
require_once "../modelos/mdlEventos.php";

class AjaxEventos {

    public $idEvento;

    public function ajaxEditarEvento() {
        $item = "id_evento"; 
        $valor = $this->idEvento;

        $respuesta = ControladorEventos::ctrMostrarEventos($item, $valor);

        // Si por alguna razón tu controlador devuelve todos los registros, 
        // este filtro asegura extraer únicamente el evento que necesitas
        if (isset($respuesta) && is_array($respuesta) && isset($respuesta[0])) {
            foreach ($respuesta as $evento) {
                if (isset($evento["id_evento"]) && $evento["id_evento"] == $valor) {
                    $respuesta = $evento;
                    break;
                }
            }
        }

        echo json_encode($respuesta);
    }
}

if (isset($_POST["operacion"]) && $_POST["operacion"] == "editar") {
    $editar = new AjaxEventos();
    $editar->idEvento = $_POST["id_evento"];
    $editar->ajaxEditarEvento();
}
