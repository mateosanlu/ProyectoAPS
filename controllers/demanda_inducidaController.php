<?php

class demanda_inducidaController extends Controller
{
    private $_respuestas;

    public function __construct() {
        parent::__construct();
        $this->_respuestas = $this->loadModel('demanda_inducida'); //cargar modelo
    }
    
    public function index()
    {
        //$this->_view->posts = $post->getPosts(); //  ejecutar metodos del modelo
        
        $this->_view->titulo = 'Registro de Demanda Inducida';
        $this->_view->setJs(array('demanda_inducida'));
        $this->_view->renderizar('index', 'demanda_inducida');
    }

    public function nuevo()
    {   
        $this->_view->titulo = 'Nuevo registro demanda inducida';

        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;
            
            if(!$this->getTexto('selectDemanda1')){
                $this->_view->_error = $this->getPostParam('selectDemanda3').'Debe introducir la firma'.$this->getPostParam('selectDemanda2');
                $this->_view->renderizar('nuevo', 'demanda_inducida');
                exit;
            }
            
            $result = $this->_respuestas->set(
                    $this->getPostParam('selectDemanda1'),  $this->getPostParam('selectDemanda2'),   
                    $this->getPostParam('selectDemanda3'),  $this->getPostParam('selectDemanda4'),   
                    $this->getPostParam('selectDemanda5'),   $this->getPostParam('selectDemanda6'),
                    $this->getPostParam('selectDemanda7'),   $this->getPostParam('selectDemanda8'),   
                    $this->getPostParam('selectDemanda9'),   $this->getPostParam('selectDemanda10'),   
                    $this->getPostParam('selectDemanda11'),   $this->getPostParam('selectDemanda12')
                    );

            if ($result == false) {
                $this->_view->_error = 'Ha ocurrido un error al guardar'.$result;
                $this->_view->renderizar('nuevo', 'demanda_inducida');
                exit;
            }
            $this->_view->_error = 'Registro guardado exitosamente';
            //$this->redireccionar('index');
        }       
        
        $this->_view->renderizar('nuevo', 'demanda_inducida');
    }
}

?>