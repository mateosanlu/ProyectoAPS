<?php

class firmaController extends Controller
{   
    private $_firma;
    
    public function __construct() {
        parent::__construct();
        $this->_firma = $this->loadModel('firma');
    }
    
    public function index()
    {   
        $this->_view->firmas = $this->_firma->getFirmas();
        $this->_view->firma = $this->_firma->getFirma(0);    
        $this->_view->titulo = 'Firma';
        $this->_view->renderizar('index', 'firma');
    }

    public function nuevo()
    {   
        $this->_view->titulo = 'Nueva Firma';

        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;
            
            if(!$this->getTexto('Base64')){
                $this->_view->_error = 'Debe introducir la firma';
                $this->_view->renderizar('nuevo', 'firma');
                exit;
            }
            
            $this->_firma->insertarFirma(
                    $this->getPostParam('Base64')
                    );
            
            $this->redireccionar('firma');
        }       
        
        $this->_view->renderizar('nuevo', 'firma');
    }

    public function ver($id)
    {   
        $this->_view->firma = $this->_firma->getFirma($id);    
        $this->_view->titulo = 'Firma';
        $this->_view->renderizar('ver', 'firma');
    }
}

?>