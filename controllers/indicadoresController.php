<?php

class indicadoresController extends Controller
{
	private $_formato;

    public function __construct() {
        parent::__construct();
        $this->_formato = $this->loadModel('indicadores');
    }
    
    public function index()
    {
        $this->redireccionar('tablero');
        $this->_view->titulo = 'Indicadores de seguimiento';
        $this->_view->renderizar('index');

        $this->_view->ficha_hogar = $this->_formato->getFichaHogar();
        $this->_view->kardex = $this->_formato->getIdFormatoLleno('2');
        $this->_view->cancer_mama = $this->_formato->getIdFormatoLleno('3');
        $this->_view->aiepi = $this->_formato->getIdFormatoLleno('4');
        $this->_view->demanda_inducida = $this->_formato->getIdFormatoLleno('5');
        $this->_view->findrisk = $this->_formato->getIdFormatoLleno('6');
    }
    

}

?>