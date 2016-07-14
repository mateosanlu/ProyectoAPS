<?php

class hoja_trabajoController extends Controller
{
	private $_hoja_trabajo;

    public function __construct() {
        parent::__construct();
        $this->_hoja_trabajo = $this->loadModel('hoja_trabajo');
    }
    
    public function index()
    {
        $this->_view->pendientes = $this->_hoja_trabajo->getPendientes();
        $this->_view->titulo = 'Hoja de trabajo';
        $this->_view->renderizar('index', 'inicio');
    }

    public function editar($idFicha)
    {
        if(!$idFicha){
            $this->redireccionar('hoja_trabajo');
        }

        $this->_view->kardex = $this->_hoja_trabajo->getAdicionales(Session::get('id_usuario'),$idFicha,'2');
        $this->_view->cancer_mama = $this->_hoja_trabajo->getAdicionales(Session::get('id_usuario'),$idFicha,'3');
        $this->_view->aiepi = $this->_hoja_trabajo->getAdicionales(Session::get('id_usuario'),$idFicha,'4');
        $this->_view->demanda_inducida = $this->_hoja_trabajo->getAdicionales(Session::get('id_usuario'),$idFicha,'5');
        $this->_view->findrisk = $this->_hoja_trabajo->getAdicionales(Session::get('id_usuario'),$idFicha,'6');
        
        $this->_view->datos = $idFicha;
        $this->_view->titulo = 'Hoja de trabajo';
        $this->_view->renderizar('editar', 'inicio');
        

    }
}

?>