<?php 

class aiepiModel extends Model
{
    public function __construct() {
        parent::__construct();
    }

	public function setTest($valorTest1, 
                        $valorTest2, 
                        $valorTest3, 
                        $valorTest4, 
                        $valorTest5, 
                        $valorTest6, 
                        $valorTest7, 
                        $valorTest8, 
                        $resultadoTest, 
                        $idUsuario,
                        $idMiembro)
	{
       $sql = "insert into test_findrisk values " . "('', '".$valorTest1."', '".$valorTest2."', '".$valorTest3."', '".$valorTest4."', '".$valorTest5."', '".$valorTest6."', '".$valorTest7."', '".$valorTest8."', '".$resultadoTest."', '".$idUsuario."', '".$idMiembro."');";
        
        return $this->_db->query($sql);
    }

    public function getPreguntas()
	{
		$preguntas = $this->_db->query("select * from preguntas where FORMATO_ID_FORMATO = '6' order by `NUM_PREGUNTA` asc");
        return $preguntas->fetchall();
	}

}
 ?>