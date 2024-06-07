<?php
 require_once 'controladores/Controlador.php';
 require_once 'vistas/Vista.php';
 require_once 'modelos/M_Permisos.php';
class C_Permisos extends Controlador {
    private $modelo;

    public function __construct() {
        parent::__construct();
        $this->modelo = new M_Permisos;
    }

    public function buscarPermisos($filtros = array()) {
        $permisos= $this->modelo->getPermisos($filtros);
        return $permisos;
        // handle result as needed, for example, load a view and pass the result
    }

    public function getVistaPermisos ($filtros = array()) {
        
        Vista::render('vistas\Permisos\V_MttoPermisos.php');
}
public function getResultadoPermisos($filtros = array()){
    $permisos = $this->modelo->getListaPermisos($filtros);
    Vista::render('vistas\Permisos\V_ResultadosPermisos.php',array('permisos' => $permisos));
}
}
?>
