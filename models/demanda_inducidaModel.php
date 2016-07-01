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
                        $selectDemanda12)
	{
       $sql = "insert into demanda_inducida values " . "('', 'now()', '".$selectDemanda1."', '".$selectDemanda2."', '".$selectDemanda3."', '".$selectDemanda4."', '".$selectDemanda5."', '".$selectDemanda6."', '".$selectDemanda7."', '".$selectDemanda8."', '".$selectDemanda9."', '".$selectDemanda10."', '".$selectDemanda11."', '".$selectDemanda12."', NULL, '2', '1');";

        //$sql = "select * from demanda_inducida";
        $this->_db->query($sql);
        return $sql;
    }

    public function getFirmas()
	{
		$firma = $this->_db->query("select * from firmas");
        return $firma->fetchall();
	}

    public function getFirma($id)
    {
        $id = (int) $id;
        $firma = $this->_db->query("select * from firmas where id = $id");
        return $firma->fetch();
    }
}
 ?>