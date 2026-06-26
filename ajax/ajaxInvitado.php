<?php
require_once "../modelos/mdlInvitado.php";
require_once "../controladores/ctrlInvitados.php";
class InvitadosAjax {
    public $id_invitados;
    
    public function traerDatos(){
        $parametros = False;
        $id = $this->id_invitados;
        $respuesta = ControladorInvitado::ctrlCargarDatosI($parametros, $id);
        echo json_encode($respuesta);
    }

    public function eliminarDatos(){
        $id = $this->id_invitados;
        $respuesta = ControladorInvitado::ctrlEliminarI($id);
        echo json_encode($respuesta);
    }


}
if (isset($_POST["id_invitados"])){
    $objInvitadosAjax = new InvitadosAjax();
    $objInvitadosAjax->id_invitados = $_POST["id_invitados"];
    switch($_POST['operacion']){
        case 'editar': 
            $objInvitadosAjax->traerDatos();
            break;
        case 'eliminar':
            $objInvitadosAjax->eliminarDatos();
            break;
    }
}