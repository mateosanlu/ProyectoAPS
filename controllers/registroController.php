<?php

class registroController extends Controller
{
    private $_registro;
    
    public function __construct() {
        parent::__construct();
        
        $this->_registro = $this->loadModel('registro');
        $this->_view->setJs(array('firma'));
    }
    
    public function index()
    {
        Session::acceso('ESPECIAL');
        
        $this->_view->titulo = 'Registro';
        
        if($this->getInt('enviar') == 1){
            $this->_view->datos = $_POST;
            
            if(!$this->getSql('nombre')){
                $this->_view->_error = 'Debe introducir su nombre';
                $this->_view->renderizar('index', 'registro');
                exit;
            }

            if(!$this->getSql('apellido')){
                $this->_view->_error = 'Debe introducir su apellido';
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            
            if(!$this->getNum('documento')){
                $this->_view->_error = 'Debe introducir su documento de identificaci&oacute;n';
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            
            if($this->_registro->verificarDocumento($this->getNum('documento'))){
                $this->_view->_error = 'El documento ' . $this->getNum('documento') . ' ya est&aacute; registrado';
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            /*
            if(!$this->validarEmail($this->getPostParam('email'))){
                $this->_view->_error = 'La direccion de email es inv&aacute;lida';
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            
            if($this->_registro->verificarEmail($this->getPostParam('email'))){
                $this->_view->_error = 'Esta direccion de correo ya esta registrada';
                $this->_view->renderizar('index', 'registro');
                exit;
            }*/
            
            if(!$this->getSql('pass')){
                $this->_view->_error = 'Debe introducir su password';
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            
            if($this->getPostParam('pass') != $this->getPostParam('confirmar')){
                $this->_view->_error = 'Los passwords no coinciden';
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            
			/*$this->getLibrary('class.phpmailer');
			$mail = new PHPMailer();*/
			
            $result=$this->_registro->registrarUsuario(
                    $this->setIdUsuario($this->getSql('nombre'),$this->getSql('documento')),
                    $this->getSql('nombre'),
                    $this->getSql('apellido'),
                    $this->getAlphaNum('rol'),
                    $this->getSql('firma'),
                    $this->getSql('foto'),
                    $this->getNum('documento'),
                    $this->getSql('pass')
                    );
            
			$usuario = $this->_registro->verificarDocumento($this->getNum('documento'));
			
            if(!$usuario){
                $this->_view->_error = 'Error al registrar el usuario';
                $this->_view->renderizar('index', 'registro');
                exit;
            }
			/*
			$mail->From = 'www.i.com';
			$mail->FromName = 'APS';
			$mail->Subject = 'Activacion de cuenta de usuario';
			$mail->Body = 'Hola <strong>' . $this->getSql('nombre') . '</strong>,' .
							'<p>Se ha registrado en... para activar ' .
							'su cuenta haga clic sobre el siguiente enlace:<br>' .
							'<a href="' . BASE_URL .'registro/activar/' . 
							$usuario['id'] . '/' . $usuario['codigo'] . '">' .
							BASE_URL .'registro/activar/' . 
							$usuario['id'] . '/' . $usuario['codigo'] .'</a>' ;
			
			$mail->AltBody = 'Su servidor de correo no soporta html';
			$mail->AddAddress($this->getPostParam('email'));
			$mail->Send();*/
             
            $this->_view->datos = false;
            $this->_view->_mensaje = 'Registro Completado, revise su email para activar su cuenta';
        }        
        
        $this->_view->renderizar('index', 'registro');
    }

	public function activar($id, $codigo)
	{
		if(!$this->filtrarInt($id) || !$this->filtrarInt($codigo)){
			$this->_view->_error = 'Esta cuenta no existe';
            $this->_view->renderizar('activar', 'registro');
            exit;
		}
		
		$row = $this->_registro->getUsuario(
						$this->filtrarInt($id),
						$this->filtrarInt($codigo)
						);
						
		if(!$row){
			$this->_view->_error = 'Esta cuenta no existe';
            $this->_view->renderizar('activar', 'registro');
            exit;
		}
		
		if($row['estado'] == 1){
			$this->_view->_error = 'Esta cuenta ya ha sido activada';
            $this->_view->renderizar('activar', 'registro');
            exit;
		}

		$this->_registro->activarUsuario(
						$this->filtrarInt($id),
						$this->filtrarInt($codigo)
						);
						
		$row = $this->_registro->getUsuario(
						$this->filtrarInt($id),
						$this->filtrarInt($codigo)
						);
						
		if($row['estado'] == 0){
			$this->_view->_error = 'Error al activar la cuenta, por favor intente mas tarde';
            $this->_view->renderizar('activar', 'registro');
            exit;
		}
		
		$this->_view->_mensaje = 'Su cuenta ha sido activada';
		$this->_view->renderizar('activar', 'registro');
	}
}

?>
