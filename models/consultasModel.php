<?php 
class consultasModel extends Model{
  public function __construct() {
        parent::__construct();
    }
    public function getformatos(){
    	 $formatos = $this->_db->query("select * from formato");
        return $formatos->fetchall();
    }
    public function getDatosFormatos($query){
    	$datosFormato=$this->_db->query($query);
    	return $datosFormato->fetchall();
    }
}
 ?>
