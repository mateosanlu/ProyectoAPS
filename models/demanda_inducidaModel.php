<?php 

class demanda_inducidaModel extends Model
{
    public function __construct() {
        parent::__construct();
    }

	public function set($selectDemanda1, 
                        $selectDemanda2, 
                        $selectDemanda3, 
                        $selectDemanda4, 
                        $selectDemanda5, 
                        $selectDemanda6, 
                        $selectDemanda7, 
                        $selectDemanda8, 
                        $selectDemanda9, 
                        $selectDemanda10,
                        $selectDemanda11,
                        $selectDemanda12,
                        $idUsuario,
                        $idMiembro)
	{
       $sql = "insert into demanda_inducida values " . "('', CURRENT_TIMESTAMP, '".$selectDemanda1."', '".$selectDemanda2."', '".$selectDemanda3."', '".$selectDemanda4."', '".$selectDemanda5."', '".$selectDemanda6."', '".$selectDemanda7."', '".$selectDemanda8."', '".$selectDemanda9."', '".$selectDemanda10."', '".$selectDemanda11."', '".$selectDemanda12."', NULL, '".$idUsuario."', '".$idMiembro."');";
       
        return $this->_db->query($sql);
    }

    public function getPreguntas()
	{
		$preguntas = $this->_db->query("select * from preguntas where FORMATO_ID_FORMATO = '5' order by `NUM_PREGUNTA` asc");
        return $preguntas->fetchall();
	}

}
 ?>