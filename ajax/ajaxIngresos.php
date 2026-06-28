<?php
require_once "../modelos/mdlIngreso.php";
require_once "../controladores/ctrlIngresos.php";
class ingresosAjax
{
    public $id_ingreso;

    public function traerDatosIngresos()
    {
        $parametros = False;
        $id = $this->id_ingreso;
        $respuesta = ControladorIngreso::ctrlCargarDatosIngresos($parametros, $id);
        echo json_encode($respuesta);
    }
    public function eliminarIngreso()
    {
        $id = $this->id_ingreso;
        $respuesta = ControladorIngreso::ctrlEliminarIngreso($id);
        echo json_encode($respuesta);
    }
}
if (isset($_POST["id_ingreso"])) {
    $objIngresosAjax = new ingresosAjax();
    $objIngresosAjax->id_ingreso = $_POST["id_ingreso"];
    switch ($_POST['operacion']) {
        case 'editar':
            $objIngresosAjax->traerDatosIngresos();
            break;
        case 'eliminar':
            $objIngresosAjax->eliminarIngreso();
            break;
    }
}
