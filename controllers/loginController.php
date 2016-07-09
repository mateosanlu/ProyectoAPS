<?php

class loginController extends Controller
{
    private $_login;
    
    public function __construct(){
        parent::__construct();
        $this->_login = $this->loadModel('login');
    }
    
    public function index()
    {
        if(Session::get('autenticado')){
            $this->redireccionar();
        }
        
        $this->_view->titulo = 'Iniciar Sesion';
        
        if($this->getInt('enviar') == 1){
            $this->_view->datos = $_POST;
            
            if(!$this->getAlphaNum('usuario')){
                $this->_view->_error = 'Debe introducir su nombre de usuario';
                $this->_view->renderizar('index','login');
                exit;
            }
            
            if(!$this->getSql('pass')){
                $this->_view->_error = 'Debe introducir su contraseña';
                $this->_view->renderizar('index','login');
                exit;
            }
            
            $row = $this->_login->getUsuario(
                    $this->getAlphaNum('usuario'),
                    $this->getSql('pass')
                    );
            
            if(!$row){
                $this->_view->_error = 'Usuario y/o contraseña incorrectos';
                $this->_view->renderizar('index','login');
                exit;
            }
            
            if($row['ESTADO'] != 1){
                $this->_view->_error = 'Este usuario no esta habilitado';
                $this->_view->renderizar('index','login');
                exit;
            }
                        
            Session::set('autenticado', true);
            Session::set('level', $row['ROL']);
            Session::set('nombre_usuario', $row['NOMBRE_USUARIO']);
            Session::set('apellido_usuario', $row['APELLIDO_USUARIO']);
            Session::set('identificacion_usuario', $row['IDENTIFICACION']);
            Session::set('id_usuario', $row['ID_USUARIO']);
            Session::set('tiempo', time());
            
            $this->redireccionar('tablero');
        }
        
        $this->_view->renderizar('index','tablero');
        
    }
    
    public function cerrar()
    {
        Session::destroy();
        $this->redireccionar();
    }
}

?>