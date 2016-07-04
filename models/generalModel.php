<?php 

class generalModel extends Model
{
    public function __construct() {
        parent::__construct();
    }

    public function getPreguntas($idFormato)
	{
		$preguntas = $this->_db->query("select * from preguntas where FORMATO_ID_FORMATO = '$idFormato' order by `NUM_PREGUNTA` asc");
        return $preguntas->fetchall();
	}

    public function getMunicipios()
    {
        $municipios = $this->_db->query("select * from municipios");
        return $municipios->fetchall();
    }

    public function getEps()
    {
        $eps = $this->_db->query("select * from eps");
        return $eps->fetchall();
    }

    public function getFirma($id)
    {
        $id = (int) $id;
        $firma = $this->_db->query("select * from firmas where id = $id");
        return $firma->fetch();
    }
}
 ?>