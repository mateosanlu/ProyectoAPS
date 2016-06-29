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