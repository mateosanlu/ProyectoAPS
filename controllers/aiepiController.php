<?php

class aiepiController extends Controller
{
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        //$post = $this->loadModel('post'); //cargar modelo
        //$this->_view->posts = $post->getPosts(); //  ejecutar metodos del modelo
        
        $this->_view->titulo = 'Ficha AIEPI';
        $this->_view->setJs(array('aiepi'));
        $this->_view->renderizar('index', 'aiepi');
    }
}

?>