<?php 

class cancer_mamaModel extends Model
{
    public function __construct() {
        parent::__construct();
    }

	public function setGeneral($id,
                        $valorTest1, 
                        $valorTest2, 
                        $valorTest3, 
                        $valorTest4, 
                        $idUsuario,
                        $idMiembro,
                        $email,
                        $telefono)
	{
       $sql = "insert into cancer_mama_general values " . "('".$id."', '".$valorTest1."', '".$valorTest2."', '".$valorTest3."', '".$valorTest4."', '".$idUsuario."', '".$idMiembro."', CURRENT_TIMESTAMP , '".$email."', '".$telefono."');";
       
       $this->_db->query($sql);

        return $id;
        
    }

    public function setDetalle($id, $lastInsertId, $idPregunta, $valorCancerMama6)
    {
       $sql = "insert into cancer_mama_detalle values " . "('".$id."', '".$lastInsertId."', '".$idPregunta."', '".$valorCancerMama6."', CURRENT_TIMESTAMP);";

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