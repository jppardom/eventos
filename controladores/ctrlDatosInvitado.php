<?php
class ControladorDatosInvitado
{
    #funcion para cargar los datos de los invitados
    public function ctrlCargarDatosInvitados()
    {
        $res = ModeloDatosInvitado::traerDatosInvitados();
        return $res;
    }
}
