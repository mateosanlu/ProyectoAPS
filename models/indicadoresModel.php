<?php 

class indicadoresModel extends Model
{
    public function __construct() {
        parent::__construct();
    }

    public function getIdFormatoLleno($idFicha)
	{
		$ids = $this->_db->query("SELECT ID_FORMATO FROM `hoja_trabajo` WHERE _CHECK=1 AND ID_FORMATO='$idFicha';");
        return $ids->fetchall();
	}

    public function getFichaHogar()
    {
        $ids = $this->_db->query("SELECT * FROM `ficha_hogar`;");
        return $ids->fetchall();
    }

}
 ?>