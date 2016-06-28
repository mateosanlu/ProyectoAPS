<?php

class findriskController extends Controller
{
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        //$post = $this->loadModel('post'); //cargar modelo
        //$this->_view->posts = $post->getPosts(); //  ejecutar metodos del modelo

        $this->_view->titulo = 'Find Risk';
        $this->_view->setJs(array('findrisk'));  // cargar js
        $this->_view->renderizar('index', 'findrisk');
    }
}

?>