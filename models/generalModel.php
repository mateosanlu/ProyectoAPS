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

    public function formatoMiembroCheck($idTarea)
    {
       $sql = "UPDATE hoja_trabajo SET _CHECK = '1' WHERE ID_TAREA = '$idTarea';";
       
        return $this->_db->query($sql);
    }

    public function getDatosFicha($idTarea)
    {
        $ficha = $this->_db->query("SELECT
                                      hoja_trabajo.ID_TAREA AS ID_TAREA,
                                      hoja_trabajo.ID_MIEMBRO AS ID_MIEMBRO,
                                      hoja_trabajo._CHECK AS _CHECK,
                                      miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR AS ID_FICHA,
                                      miembros_hogar.NOMBRE_MIEMBRO AS NOMBRE_MIEMBRO
                                    FROM
                                      hoja_trabajo
                                    INNER JOIN
                                      miembros_hogar ON hoja_trabajo.ID_MIEMBRO = miembros_hogar.ID_MIEMBROS_HOGAR
                                    WHERE 
                                      hoja_trabajo.ID_TAREA = '$idTarea' AND 
                                      hoja_trabajo._CHECK = '0'");
        return $ficha->fetch();
    }

    public function getDatosFicha1($idUsuario, $idMiembro, $idFormato)
    {
        $ficha = $this->_db->query("SELECT
                                      hoja_trabajo.ID_TAREA AS ID_TAREA,
                                      hoja_trabajo.ID_MIEMBRO AS ID_MIEMBRO,
                                      miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR AS ID_FICHA,
                                      miembros_hogar.NOMBRE_MIEMBRO AS NOMBRE_MIEMBRO
                                    FROM
                                      hoja_trabajo
                                    INNER JOIN
                                      miembros_hogar ON hoja_trabajo.ID_MIEMBRO = miembros_hogar.ID_MIEMBROS_HOGAR
                                    WHERE
                                      hoja_trabajo.ID_USUARIO = '$idUsuario' AND 
                                      miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR = '$idFicha' AND 
                                      hoja_trabajo.ID_FORMATO = '$idFormato' AND 
                                      hoja_trabajo.ID_MIEMBRO = '$idMiembro' AND 
                                      hoja_trabajo._CHECK = '0'");
        return $ficha->fetch();
    }

    public function getDatosMiembro($idMiembro)
    {
        $ficha = $this->_db->query("SELECT
                                      miembros_hogar.*,
                                      municipios.DES_MUNICIPIO,
                                      barrios.DES_BARRIO
                                    FROM
                                      miembros_hogar
                                    INNER JOIN
                                      ficha_hogar ON miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR = ficha_hogar.ID_FIC_HOGAR
                                    INNER JOIN
                                      municipios ON ficha_hogar.MUNICIPIOS_ID_MUNICIPIO = municipios.ID_MUNICIPIO
                                    INNER JOIN
                                      barrios ON ficha_hogar.BARRIOS_ID_BARRIO = barrios.ID_BARRIO 
                                    WHERE
                                      miembros_hogar.ID_MIEMBROS_HOGAR = '$idMiembro'");
        return $ficha->fetch();
    }
}
 ?>

 