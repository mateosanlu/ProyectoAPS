<?php 

class cancer_mamaModel extends Model
{
    public function __construct() {
        parent::__construct();
    }

	public function setGeneral($valorTest1, 
                        $valorTest2, 
                        $valorTest3, 
                        $valorTest4, 
                        $idUsuario,
                        $idMiembro)
	{
       $sql = "insert into cancer_mama_general values " . "('', '".$valorTest1."', '".$valorTest2."', '".$valorTest3."', '".$valorTest4."', '".$idUsuario."', '".$idMiembro."', CURRENT_TIMESTAMP);";
       
       $this->_db->query($sql);

        return $this->_db->lastInsertId();
        
    }

    public function setDetalle($lastInsertId, $idPregunta, $valorCancerMama6)
    {
       $sql = "insert into cancer_mama_detalle values " . "('', '".$lastInsertId."', '".$idPregunta."', '".$valorCancerMama6."', CURRENT_TIMESTAMP);";

        return $this->_db->query($sql);
        
    }

    public function getPreguntas()
	{
		$preguntas = $this->_db->query("select * from preguntas where FORMATO_ID_FORMATO = '6' order by `NUM_PREGUNTA` asc");
        return $preguntas->fetchall();
	}

    public function getFirma($id)
    {
        $id = (int) $id;
        $firma = $this->_db->query("select * from firmas where id = $id");
        return $firma->fetch();
    }
}
 ?>