<?php

class indexController extends Controller
{
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {   
    	if(Session::get('autenticado')){
            $this->redireccionar('tablero');
        }    
        $this->_view->titulo = 'Portada';
        $this->_view->renderizar('index', 'landing');
    }
}

?>