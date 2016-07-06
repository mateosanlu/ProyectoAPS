<?php

class registroModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    
    public function verificarUsuario($usuario)
    {
        $id = $this->_db->query(
                "select id_usuario, codigo from usuarios where usuario = '$usuario'"
                );
        
        return $id->fetch();
    }

    public function verificarDocumento($documento)
    {
        $id = $this->_db->query(
                "SELECT ID_USUARIO FROM usuarios WHERE IDENTIFICACION='$documento'"
                );
        
        return $id->fetch();
    }
    
    public function verificarEmail($email)
    {
        $id = $this->_db->query(
                "select id from usuarios where email = '$email'"
                );
        
        if($id->fetch()){
            return true;
        }
        
        return false;
    }
    
    public function registrarUsuario($nombre, $rol, $firma, $foto, $identificacion, $password)
    {
        $sql = "insert into usuarios values " . "('', '".$nombre."', '".$rol."', '".$firma."', '".$foto."', '".$identificacion."', '".Hash::getHash('sha1', $password, HASH_KEY)."', '0');";
       
        $this->_db->query($sql);


    }
    
    public function getUsuario($id, $codigo)
	{
		$usuario = $this->_db->query(
					"select * from usuarios where id = $id and codigo = '$codigo'"
					);
					
		return $usuario->fetch();
	}
	
	public function activarUsuario($id, $codigo)
	{
		$this->_db->query(
					"update usuarios set estado = 1 " .
					"where id = $id and codigo = '$codigo'"
					);
	}
}

?>
