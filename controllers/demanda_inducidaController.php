<?php

class demanda_inducidaController extends Controller
{
    private $_formato;
    private $_general;

    public function __construct() {
        parent::__construct();
        $this->_formato = $this->loadModel('demanda_inducida'); //cargar modelo
        $this->_general = $this->loadModel('general');
        $this->_view->setJs(array('demanda_inducida'));
    }
    
    public function index()
    {   
        Session::acceso('USUARIO');

        $this->_view->titulo = 'Registro de Demanda Inducida';
        //$this->_view->renderizar('index', 'demanda_inducida');
        $this->redireccionar('demanda_inducida/nuevo');
    }

    public function nuevo($idTarea)
    {   
        Session::acceso('USUARIO');
        
        if(!$idTarea){
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
                        
            $result = $this->_formato->set( $this->generarId('DI'),
                    $this->getPostParam('selectDemanda1'),  $this->getPostParam('selectDemanda2'),   
                    $this->getPostParam('selectDemanda3'),  $this->getPostParam('selectDemanda4'),   
                    $this->getPostParam('selectDemanda5'),   $this->getPostParam('selectDemanda6'),
                    $this->getPostParam('selectDemanda7'),   $this->getPostParam('selectDemanda8'),   
                    $this->getPostParam('selectDemanda9'),   $this->getPostParam('selectDemanda10'),   
                    $this->getPostParam('selectDemanda11'),   $this->getPostParam('selectDemanda12'),
                    Session::get('id_usuario'), $datos['ID_MIEMBRO']
                    );

            if ($result == false) {
                $this->_view->_error = 'Ha ocurrido un error al guardar';
                $this->_view->renderizar('nuevo', 'demanda_inducida/nuevo/'.$idTarea);
                exit;
            }

            $update = $this->_general->formatoMiembroCheck($idTarea);

            $this->_view->_mensaje = 'Registro guardado exitosamente';
            $this->redireccionar('hoja_trabajo/editar/'.$datos['ID_FICHA']);
        }

        
        $this->_view->renderizar('nuevo', 'demanda_inducida');
    }
}

?>