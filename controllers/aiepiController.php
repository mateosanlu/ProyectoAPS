<?php

class aiepiController extends Controller
{
    private $_formato;

    public function __construct() {
        parent::__construct();
        
        $this->_formato = $this->loadModel('aiepi');
        $this->_general = $this->loadModel('general');
        $this->_view->setJs(array('aiepi'));
    }
    
    public function index()
    {
        $this->_view->titulo = 'Formato AIEPI';
        $this->_view->renderizar('index', 'aiepi');
    }

    public function nuevo()
    {   
        $this->_view->preguntas = $this->_formato->getPreguntas();
        $this->_view->municipios = $this->_general->getMunicipios();
        $this->_view->eps = $this->_general->getEps();
        $this->_view->titulo = 'Nuevo registro AIEPI';

        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;
            
            $result = false; //quitar            
            /*$result = $this->_formato->set(
                    $this->getPostParam('selectDemanda1'),  $this->getPostParam('selectDemanda2'),   
                    $this->getPostParam('selectDemanda3'),  $this->getPostParam('selectDemanda4'),   
                    $this->getPostParam('selectDemanda5'),   $this->getPostParam('selectDemanda6'),
                    $this->getPostParam('selectDemanda7'),   $this->getPostParam('selectDemanda8'),   
                    $this->getPostParam('selectDemanda9'),   $this->getPostParam('selectDemanda10'),   
                    $this->getPostParam('selectDemanda11'),   $this->getPostParam('selectDemanda12'),
                    '2','1'
                    );*/

            if ($result == false) {
                $this->_view->_error = 'Ha ocurrido un error al guardar';
                $this->_view->renderizar('nuevo', 'aiepi');
                exit;
            }
            $this->_view->_error = 'Registro guardado exitosamente';
            //$this->redireccionar('index');
        }       
        
        $this->_view->renderizar('nuevo', 'aiepi');
    }
}

?>