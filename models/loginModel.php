<?php

class loginModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    
    public function getUsuario($usuario, $password)
    {
        $datos = $this->_db->query(
                "select * from usuarios " .
                "where identificacion = '$usuario' " .
                //"and pass = '" . $password . "'"
                "and pass = '" . Hash::getHash('sha1', $password, HASH_KEY) ."'"
                );
        
        return $datos->fetch();
    }
}

?>
