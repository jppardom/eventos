<?php
require_once "../modelos/mdlEstudiantes.php";
require_once "../controladores/ctrlEstudiantes.php";
class estudiantesAjax
{
    public $id_estudiante;

    public function traerDatosEstudiante()
    {
        $parametros = False;
        $id = $this->id_estudiante;
        $respuesta = ControladorEstudiante::ctrlCargarDatosEstudiante($parametros, $id);
        echo json_encode($respuesta);
    }

    public function eliminarEstudiante()
    {
        $id = $this->id_estudiante;
        $respuesta = ControladorEstudiante::ctrlEliminarEstudiante($id);
        echo json_encode($respuesta);
    }
}
if (isset($_POST["id_estudiante"])) {
    $objEstudiantesAjax = new estudiantesAjax();
    $objEstudiantesAjax->id_estudiante = $_POST["id_estudiante"];
    switch ($_POST['operacion']) {
        case 'editar':
            $objEstudiantesAjax->traerDatosEstudiante();
            break;
        case 'eliminar':
            $objEstudiantesAjax->eliminarEstudiante();
            break;
    }
}
