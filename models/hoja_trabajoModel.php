<?php

class hoja_trabajoModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    
    public function getAdicionales($idUsuario, $idFicha, $idFormato)
    {
        $datos = $this->_db->query(
                "SELECT
                  hoja_trabajo.*, miembros_hogar.NOMBRE_MIEMBRO
                FROM
                  hoja_trabajo
                INNER JOIN
                  miembros_hogar ON hoja_trabajo.ID_MIEMBRO = miembros_hogar.ID_MIEMBROS_HOGAR
                WHERE
                  hoja_trabajo.ID_USUARIO = '$idUsuario' AND miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR = '$idFicha' AND hoja_trabajo.ID_FORMATO = '$idFormato' AND hoja_trabajo._CHECK = '0'"
                );
        
        return $datos->fetchall();
    }

    public function getPendientes()
    {
        $datos = $this->_db->query(
                "SELECT
                    hoja_trabajo.*,
                    miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR,
                    formato.DES_FORMATO
                  FROM
                    hoja_trabajo
                  INNER JOIN
                    miembros_hogar ON hoja_trabajo.ID_MIEMBRO = miembros_hogar.ID_MIEMBROS_HOGAR
                  INNER JOIN 
                    formato ON hoja_trabajo.ID_FORMATO = formato.ID_FORMATO
                  WHERE
                    hoja_trabajo._CHECK = '0'"
                );
        
        return $datos->fetchall();
    }
}

?>