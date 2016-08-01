<?php

class sincronizarController extends Controller
{
    public function __construct() {
        parent::__construct();
        $this->_sincronizar = $this->loadModel('sincronizar');
        if ($this->_sincronizar) {
            $this->_view->_error = 'No hay conexión con el servidor';
        }
    }

   

     public function index(){

     	$this->_view->titulo = 'Sincronización';
     	$this->_view->renderizar('index', 'tablero');
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