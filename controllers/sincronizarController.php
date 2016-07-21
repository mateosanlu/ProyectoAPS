<?php

class sincronizarController extends Controller
{
    public function __construct() {
        parent::__construct();

         $this->_sincronizar = $this->loadModel('sincronizar');
    }

   

     public function index(){

     	$this->_view->titulo = 'Ficha hogar';
     	$this->_view->renderizar('index', 'sincronizar');
     }

     public function sincronizarm(){
        $this->_view->titulo = 'Sincronizar';
     	echo  var_dump($this->_sincronizar->sincronizarm());
     }

     public function sincronizarBajarm(){
        $this->_view->titulo = 'Sincronizar';
     	echo  var_dump($this->_sincronizar->sincronizarBajar());
     }

}