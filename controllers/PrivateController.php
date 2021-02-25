<?php
require_once 'models/ViajesModel.php';
require_once 'models/PasajesModel.php';
require_once 'views/view.php';
require_once 'helpers/auth.helpers.php';

class PublicController{

    private $modelViajes;
    private $modelPasajes;
    //private $viewPrivate;

    public function __construct() {
        $this->modelViajes = new ViajesModel();
        $this->modelPasajes = new PasajesModel();
        //$this->viewPrivate = new PrivateView();
        AuthHelper::checkLogged();
    }

   
    //1-B
    public function borrarViaje($id){
                $viajeABorrar = $this->modelViajes->getViajeById($id);

                $todosLosViajes = $this->modelViajes->getAllViajes();
                foreach($todosLosViajes as $viaje){
                    if(!empty($viajeABorrar)){
                        $pasajesDelViaje = $this->modelPasajes->getPasajesDelViaje($viaje->id);
                        foreach($pasajesDelViaje as $pasaje){
                            $this->modelPasajes->cancelarVuelo($pasaje->id);
                        }
                        $this->modelViajes->borrarViaje($viaje->id);
                    } else{
                        //$this->viewPrivate->VerTodosLosVuelos('No existe viaje con ese id');
                    }
                }
                //$this->viewPrivate->VerTodosLosVuelos('Se borro exitosamente');
    }

    //2-A
    public function pasajesPorViajes(){
        $todosLosViajes = $this->modelViajes->getAllViajes();
        echo('<table>');
        echo('<tbody>');
        foreach($todosLosViajes as $viaje){
            $nro_viaje = $this->modelViajes->getNroViaje($viaje->id);
            $dniDePasaje = $this->modelPasajes->getDNIDePasaje($viaje->id);
            $CantidadDePasajes = $this->modelPasajes->getCantDePasajes($viaje->id);
            //$this->viewPrivate->verPasajesPorViaje($nro_viaje->nro_viaje, $dniDePasaje->dni, $CantidadDePasajes->cantidad);
    }
        echo('</tbody>');
        echo('</table>');
    }

}