<?php

class Model
{
    protected $_db;
    protected $_dbserver;
    
    public function __construct() {
        try {
            $this->_db = new Database(); //deshabilitar instancia DB
        	//$this->_dbserver = new DatabaseServer();
        } catch (Exception $e) {
        	echo "No hay conexion al servidor";

        }
         
    }
}

?>
