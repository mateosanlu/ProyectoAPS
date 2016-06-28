<?php

class ficha_hogarController extends Controller
{
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        //$post = $this->loadModel('post'); //cargar modelo
        //$this->_view->posts = $post->getPosts(); //  ejecutar metodos del modelo

        $this->_view->titulo = 'Ficha hogar';
        $this->_view->setJs(array('ficha_hogar'));  // cargar js
        $this->_view->renderizar('index', 'ficha_hogar');
    }
}

?>