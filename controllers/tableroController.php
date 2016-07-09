<?php

class tableroController extends Controller
{
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {       
        $this->_view->titulo = 'Tablero';
        $this->_view->renderizar('index', 'tablero');
    }
}

?>