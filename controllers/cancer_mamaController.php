<?php

class cancer_mamaController extends Controller
{
    private $_formato;

    public function __construct() {
        parent::__construct();
        $this->_formato = $this->loadModel('cancer_mama');
        $this->_view->setJs(array('cancer_mama'));
        $this->_view->setCss(array('cancer_mama'));
    }
    
    public function index()
    {
        $this->_view->titulo = 'Cancer de mama';
        $this->_view->renderizar('index', 'cancer_mama');
    }

    public function nuevo()
    {   
        //$this->_view->preguntas = $this->_formato->getPreguntas();
        $this->_view->titulo = 'Nuevo Cancer de mama';

        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;
                        
            $lastInsertId = $this->_formato->setGeneral(
                    $this->getPostParam('cancerMama2'),  $this->getPostParam('cancerMama3'),  
                    $this->getPostParam('cancerMama4'),  $this->getPostParam('cancerMama5'),   
                    '1', '2'
                    );

            if ($this->getPostParam('cancerMama6-1') != 0) {
                $result = $this->_formato->setDetalle( $lastInsertId, '12', $this->getPostParam('cancerMama6-1'));

                if ($result == false) {
                $this->_view->_error = 'Ha ocurrido un error al guardar';
                $this->_view->renderizar('nuevo', 'cancer_mama');
                exit;
                }
            }

            if ($this->getPostParam('cancerMama6-2') != 0) {
                $result = $this->_formato->setDetalle( $lastInsertId, '12', $this->getPostParam('cancerMama6-2'));

                if ($result == false) {
                $this->_view->_error = 'Ha ocurrido un error al guardar';
                $this->_view->renderizar('nuevo', 'cancer_mama');
                exit;
                }
            }

            if ($this->getPostParam('cancerMama6-3') != 0) {
                $result = $this->_formato->setDetalle( $lastInsertId, '12', $this->getPostParam('cancerMama6-3'));

                if ($result == false) {
                $this->_view->_error = 'Ha ocurrido un error al guardar';
                $this->_view->renderizar('nuevo', 'cancer_mama');
                exit;
                }
            }

            if ($this->getPostParam('cancerMama6-4') != 0) {
                $result = $this->_formato->setDetalle( $lastInsertId, '12', $this->getPostParam('cancerMama6-4'));

                if ($result == false) {
                $this->_view->_error = 'Ha ocurrido un error al guardar';
                $this->_view->renderizar('nuevo', 'cancer_mama');
                exit;
                }
            }

            if ($this->getPostParam('cancerMama6-5') != 0) {
                $result = $this->_formato->setDetalle( $lastInsertId, '12', $this->getPostParam('cancerMama6-5'));

                if ($result == false) {
                $this->_view->_error = 'Ha ocurrido un error al guardar';
                $this->_view->renderizar('nuevo', 'cancer_mama');
                exit;
                }
            }

            if ($this->getPostParam('cancerMama6-6') != 0) {
                $result = $this->_formato->setDetalle( $lastInsertId, '12', $this->getPostParam('cancerMama6-6'));

                if ($result == false) {
                $this->_view->_error = 'Ha ocurrido un error al guardar';
                $this->_view->renderizar('nuevo', 'cancer_mama');
                exit;
                }
            }

            if ($result == false) {
                $this->_view->_error = 'Ha ocurrido un error al guardar'.$result;
                $this->_view->renderizar('nuevo', 'cancer_mama');
                exit;
            }
            $this->_view->_error = 'Registro guardado exitosamente';
            //$this->redireccionar('index');
        }       
        
        $this->_view->renderizar('nuevo', 'cancer_mama');
    }
}

?>