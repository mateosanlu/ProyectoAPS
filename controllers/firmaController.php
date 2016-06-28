<?php

class firmaController extends Controller
{   
    private $_firmas;
    
    public function __construct() {
        parent::__construct();
        $this->_firmas = $this->loadModel('firma');
    }
    
    public function index()
    {   
        //$this->_view->firmas = $this->_firmas->getFirmas();   
        $this->_view->titulo = 'Firma';
        $this->_view->renderizar('index', 'firma');

        //$this->base64_to_jpeg('primer_nombre');

        //Insertar
        $this->_view->datos = $_POST;
        $this->_firmas->insertarFirma(
                    $this->getPostParam('Base64')
                    );
            
            $this->redireccionar('firma');
        //fin insertar
    }
}

?>