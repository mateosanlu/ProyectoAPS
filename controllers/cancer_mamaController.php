<?php

class cancer_mamaController extends Controller
{
    private $_formato;
    private $_general;

    public function __construct() {
        parent::__construct();
        $this->_formato = $this->loadModel('cancer_mama');
        $this->_general = $this->loadModel('general');
        $this->_view->setJs(array('cancer_mama'));
        $this->_view->setCss(array('cancer_mama'));
    }
    
    public function index()
    {
        $this->_view->titulo = 'Cancer de mama';
        //$this->_view->renderizar('index', 'cancer_mama');
        $this->redireccionar('cancer_mama/nuevo');
    }

    public function nuevo($idTarea)
    {   
        if(!$this->filtrarInt($idTarea)){
            $this->redireccionar('hoja_trabajo');
        }
        //$this->_view->preguntas = $this->_formato->getPreguntas();
        $this->_view->titulo = 'Nuevo Cancer de mama';

        $datos = $this->_general->getDatosFicha($idTarea);
        $this->_view->datos = $datos;

        $datosMiembro = $this->_general->getDatosMiembro($datos['ID_MIEMBRO']);
        $this->_view->datosMiembro = $datosMiembro;


        if($datos['_CHECK']!='0'){
            $this->redireccionar('hoja_trabajo');
        }

        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;
                        
            $lastInsertId = $this->_formato->setGeneral(
                    $this->generarId('CM'),
                    $this->getPostParam('cancerMama2'),  $this->getPostParam('cancerMama3'),  
                    $this->getPostParam('cancerMama4'),  $this->getPostParam('cancerMama5'),   
                    Session::get('id_usuario'), $datos['ID_MIEMBRO']
                    );

            if ($this->getPostParam('cancerMama6-1') == 0) {
                $result = $this->_formato->setDetalle( $this->generarId('CD'), $lastInsertId, '12', $this->getPostParam('cancerMama6-1'));

                if ($result != false) {
                $this->_view->_error = 'Ha ocurrido un error al guardar1';
                $this->_view->renderizar('nuevo', 'cancer_mama/nuevo/'.$idTarea);
                exit;
                }
            }

            if ($this->getPostParam('cancerMama6-2') != 0) {
                $result = $this->_formato->setDetalle($this->generarId('CD'), $lastInsertId, '12', $this->getPostParam('cancerMama6-2'));

                if ($result == false) {
                $this->_view->_error = 'Ha ocurrido un error al guardar2';
                $this->_view->renderizar('nuevo', 'cancer_mama/nuevo/'.$idTarea);
                exit;
                }
            }

            if ($this->getPostParam('cancerMama6-3') != 0) {
                $result = $this->_formato->setDetalle($this->generarId('CD'), $lastInsertId, '12', $this->getPostParam('cancerMama6-3'));

                if ($result == false) {
                $this->_view->_error = 'Ha ocurrido un error al guardar3';
                $this->_view->renderizar('nuevo', 'cancer_mama/nuevo/'.$idTarea);
                exit;
                }
            }

            if ($this->getPostParam('cancerMama6-4') != 0) {
                $result = $this->_formato->setDetalle($this->generarId('CD'), $lastInsertId, '12', $this->getPostParam('cancerMama6-4'));

                if ($result == false) {
                $this->_view->_error = 'Ha ocurrido un error al guardar4';
                $this->_view->renderizar('nuevo', 'cancer_mama/nuevo/'.$idTarea);
                exit;
                }
            }

            if ($this->getPostParam('cancerMama6-5') != 0) {
                $result = $this->_formato->setDetalle($this->generarId('CD'), $lastInsertId, '12', $this->getPostParam('cancerMama6-5'));

                if ($result == false) {
                $this->_view->_error = 'Ha ocurrido un error al guardar5';
                $this->_view->renderizar('nuevo', 'cancer_mama/nuevo/'.$idTarea);
                exit;
                }
            }

            if ($this->getPostParam('cancerMama6-6') != 0) {
                $result = $this->_formato->setDetalle($this->generarId('CD'), $lastInsertId, '12', $this->getPostParam('cancerMama6-6'));

                if ($result == false) {
                $this->_view->_error = 'Ha ocurrido un error al guardar6';
                $this->_view->renderizar('nuevo', 'cancer_mama/nuevo/'.$idTarea);
                exit;
                }
            }

            if ($result == false) {
                $this->_view->_error = 'Ha ocurrido un error al guardarfin'.$result;
                $this->_view->renderizar('nuevo', 'cancer_mama/nuevo/'.$idTarea);
                exit;
            }

            $update = $this->_general->formatoMiembroCheck($idTarea);

            $this->_view->_error = 'Registro guardado exitosamente';
            $this->redireccionar('hoja_trabajo/editar/'.$datos['ID_FICHA']);
        }       
        
        $this->_view->renderizar('nuevo', 'cancer_mama');
    }
}

?>