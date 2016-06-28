<?php 

class firmaModel extends Model
{
    public function __construct() {
        parent::__construct();
    }

	public function insertarFirma($firma)
	{
        $this->_db->prepare(
                "insert into firmas values" .
                "(null, :firma)"
                )
                ->execute(array(
                    ':firma' => $firma
                ));
    }

    public function getFirmas()
	{
		$firmas = $this->_db->query("select * from firmas");
        return $firmas->fetchall();
	}
}
 ?>