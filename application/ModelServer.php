<?php

class ModelServer
{
    protected $_db;
    protected $_dbserver;
    
    public function __construct() {
        try {
            $this->_db = new Database(); //deshabilitar instancia DB
        	$this->_dbserver = new DatabaseServer();

        } catch (Exception $e) {
            
        }
        return true;
    }
}

?>