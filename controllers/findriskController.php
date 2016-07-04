<?php

class findriskController extends Controller
{
    private $_formato;

    public function __construct() {
        parent::__construct();
         $this->_formato = $this->loadModel('findrisk');
         $this->_view->setJs(array('findrisk'));
    }
    
    public function index()
    {
        //$post = $this->loadModel('post'); //cargar modelo
        //$this->_view->posts = $post->getPosts(); //  ejecutar metodos del modelo

        $this->_view->titulo = 'Find Risk';
        $this->_view->renderizar('index', 'findrisk');
    }

    public function nuevo()
    {   
        $this->_view->preguntas = $this->_formato->getPreguntas();
        $this->_view->titulo = 'Nuevo registro demanda inducida';

        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;
                        
            $result = $this->_formato->setTest(
                    $this->getPostParam('findrisk1'),  $this->getPostParam('findrisk2'),   
                    $this->getPostParam('findrisk3'),  $this->getPostParam('findrisk4'),   
                    $this->getPostParam('findrisk5'),   $this->getPostParam('findrisk6'),
                    $this->getPostParam('findrisk7'),   $this->getPostParam('findrisk8'),   
                    $this->getPostParam('findriskResultado'),   '1', '2'
                    );

            if ($result == false) {
                $this->_view->_error = 'Ha ocurrido un error al guardar'.$result;
                $this->_view->renderizar('nuevo', 'findrisk');
                exit;
            }
            $this->_view->_error = 'Registro guardado exitosamente';
            //$this->redireccionar('index');
        }       
        
        $this->_view->renderizar('nuevo', 'findrisk');
    }
}

?>