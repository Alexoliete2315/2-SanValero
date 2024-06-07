<?php
    require_once 'controladores/Controlador.php';
    require_once 'vistas/Vista.php';
    require_once 'modelos/M_Usuarios.php';

    class C_Usuarios extends Controlador{
        private $modelo;
        public function __construct(){
            parent::__construct();
            $this->modelo = new M_Usuarios();
        }

        public function validarUsuario($filtros){
            $valido='N';
            $usuario=$this->modelo->buscarUsuarios($filtros);
            if (!empty($usuario)) {
                $valido='S';
                $_SESSION['usuario'] = $usuario[0]['login'];
                $_SESSION['id_usuario'] = $usuario[0]['id_usuario'];

            }
            return $valido;
        }

        public function getVistaUsuarios($filtros=array()){
            $usuarios=$this->modelo->buscarUsuarios($filtros);
            //echo json_encode($usuarios);
            Vista::render('vistas/Usuarios/V_Usuarios.php');
            // Vista::render('vistas/V_paginador.php');
            // Vista::render('vistas/Usuarios/V_Usuarios_Listado.php', 
            //                 array('usuarios'=>$usuarios));
        }
        public function buscarUsuarios($filtros=array()){
            $usuarios=$this->modelo->buscarUsuarios($filtros);
            //echo json_encode($usuarios);
            Vista::render('vistas/Usuarios/V_Usuarios_Listado.php', 
                            array('usuarios'=>$usuarios));
        }
    
        // public function listarUsuariosConPaginacion($filtros = array()){
        //     // Llamada a la nueva función en el modelo que reutiliza la lógica existente
        //     $datosPaginacion = $this->modelo->construirConsultaUsuariosConPaginacion($filtros);
        
        //     // Renderizar la vista de usuarios
        //     Vista::render('vistas/Usuarios/V_Usuarios.php', array('usuarios' => $datosPaginacion['usuarios']));
        
        //     // Renderizar la vista del paginador
        //     Vista::render('vistas/V_Paginador.php', $datosPaginacion);
        // }
        public function insertarUsuario($parameters=array()){
            $usuarios=$this->modelo->insertarUsuario($parameters);
            //echo json_encode($usuarios);
            
        }

        public function updatearUsuario($parameters=array()){
            $usuarios=$this->modelo->updatearUsuario($parameters);
            // echo json_encode($usuarios);
        }
        
    }
?>