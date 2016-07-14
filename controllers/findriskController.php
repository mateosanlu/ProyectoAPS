<?php

class findriskController extends Controller
{
    private $_formato;
    private $_general;

    public function __construct() {
        parent::__construct();
        $this->_general = $this->loadModel('general');
        $this->_formato = $this->loadModel('findrisk');
        $this->_view->setJs(array('findrisk'));
    }
    
    public function index()
    {
        $this->_view->titulo = 'Find Risk';
        //$this->_view->renderizar('index', 'findrisk');
        $this->redireccionar('findrisk/nuevo');
    }

    public function nuevo($idTarea)
    {   
        if(!$this->filtrarInt($idTarea)){
            $this->redireccionar('hoja_trabajo');
        }

        $this->_view->preguntas = $this->_formato->getPreguntas();
        $this->_view->titulo = 'Nuevo registro demanda inducida';

        $datos = $this->_general->getDatosFicha($idTarea);
        $this->_view->datos = $datos;

        if($datos['_CHECK']!='0'){
            $this->redireccionar('hoja_trabajo');
        }

        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;
                        
            $result = $this->_formato->setTest($this->generarId('FR'),
                    $this->getPostParam('findrisk1'),  $this->getPostParam('findrisk2'),   
                    $this->getPostParam('findrisk3'),  $this->getPostParam('findrisk4'),   
                    $this->getPostParam('findrisk5'),   $this->getPostParam('findrisk6'),
                    $this->getPostParam('findrisk7'),   $this->getPostParam('findrisk8'),   
                    $this->getPostParam('findriskResultado'),   Session::get('id_usuario'), $datos['ID_MIEMBRO']
                    );

            if ($result == false) {
                $this->_view->_error = 'Ha ocurrido un error al guardar'.$result;
                $this->_view->renderizar('nuevo', 'findrisk/nuevo/'.$idTarea);
                exit;
            }

            $update = $this->_general->formatoMiembroCheck($idTarea);
            
            $this->_view->_error = 'Registro guardado exitosamente';
            $this->redireccionar('hoja_trabajo/editar/'.$datos['ID_FICHA']);
        }       
        
        $this->_view->renderizar('nuevo', 'findrisk');
    }
}

?>