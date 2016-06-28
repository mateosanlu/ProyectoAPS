<?php

class cancer_mamaController extends Controller
{
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        //$post = $this->loadModel('post'); //cargar modelo
        //$this->_view->posts = $post->getPosts(); //  ejecutar metodos del modelo
        
        $this->_view->titulo = 'Cancer de mama';
        $this->_view->setJs(array('index'));
        $this->_view->renderizar('index', 'cancer_mama');
    }
}

?>