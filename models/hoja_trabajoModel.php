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
                  hoja_trabajo.*, miembros_hogar.NOMBRE_MIEMBRO, miembros_hogar.APELLIDO_MIEMBRO
                FROM
                  hoja_trabajo
                INNER JOIN
                  miembros_hogar ON hoja_trabajo.ID_MIEMBRO = miembros_hogar.ID_MIEMBROS_HOGAR
                WHERE
                  hoja_trabajo.ID_USUARIO = '$idUsuario' AND miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR = '$idFicha' AND hoja_trabajo.ID_FORMATO = '$idFormato' AND hoja_trabajo._CHECK = '0'"
                );
        
        return $datos->fetchall();
    }

    public function getIdFichasConPendientes(){
      $datos = $this->_db->query("SELECT DISTINCT
                                    (ficha_hogar.ID_FIC_HOGAR)
                                  FROM
                                    ficha_hogar
                                  INNER JOIN miembros_hogar ON miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR = ficha_hogar.ID_FIC_HOGAR
                                  INNER JOIN hoja_trabajo ON hoja_trabajo.ID_MIEMBRO = miembros_hogar.ID_MIEMBROS_HOGAR
                                  WHERE
                                    hoja_trabajo._CHECK = 0");
        
        return $datos->fetchall();
    }

    public function getPendientes($idFicha)
    {
        $datos = $this->_db->query(
                "SELECT DISTINCT
                  ficha_hogar.ID_HOGAR,
                  (
                    tb1.FICHA_HOGAR_ID_FIC_HOGAR
                  ),
                  IFNULL(
                    (
                      SELECT
                        COUNT(formato.DES_FORMATO)
                      FROM
                        hoja_trabajo
                      INNER JOIN miembros_hogar ON hoja_trabajo.ID_MIEMBRO = miembros_hogar.ID_MIEMBROS_HOGAR
                      INNER JOIN formato ON formato.ID_FORMATO = hoja_trabajo.ID_FORMATO
                      WHERE
                        miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR = '$idFicha'
                      AND hoja_trabajo._CHECK = 0
                      AND formato.ID_FORMATO = 5
                      GROUP BY
                        hoja_trabajo.ID_USUARIO,
                        hoja_trabajo.ID_FORMATO,
                        miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR
                    ),
                    0
                  ) AS DEMANDA_INDUCIDA,
                  IFNULL(
                    (
                      SELECT
                        COUNT(formato.DES_FORMATO)
                      FROM
                        hoja_trabajo
                      INNER JOIN miembros_hogar ON hoja_trabajo.ID_MIEMBRO = miembros_hogar.ID_MIEMBROS_HOGAR
                      INNER JOIN formato ON formato.ID_FORMATO = hoja_trabajo.ID_FORMATO
                      WHERE
                        miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR = '$idFicha'
                      AND hoja_trabajo._CHECK = 0
                      AND formato.ID_FORMATO = 2
                      GROUP BY
                        hoja_trabajo.ID_USUARIO,
                        hoja_trabajo.ID_FORMATO,
                        miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR
                    ),
                    0
                  ) AS KARDES,
                  IFNULL(
                    (
                      SELECT
                        COUNT(formato.DES_FORMATO)
                      FROM
                        hoja_trabajo
                      INNER JOIN miembros_hogar ON hoja_trabajo.ID_MIEMBRO = miembros_hogar.ID_MIEMBROS_HOGAR
                      INNER JOIN formato ON formato.ID_FORMATO = hoja_trabajo.ID_FORMATO
                      WHERE
                        miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR = '$idFicha'
                      AND hoja_trabajo._CHECK = 0
                      AND formato.ID_FORMATO = 3
                      GROUP BY
                        hoja_trabajo.ID_USUARIO,
                        hoja_trabajo.ID_FORMATO,
                        miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR
                    ),
                    0
                  ) AS CANCER_MAMA,
                  IFNULL(
                    (
                      SELECT
                        COUNT(formato.DES_FORMATO)
                      FROM
                        hoja_trabajo
                      INNER JOIN miembros_hogar ON hoja_trabajo.ID_MIEMBRO = miembros_hogar.ID_MIEMBROS_HOGAR
                      INNER JOIN formato ON formato.ID_FORMATO = hoja_trabajo.ID_FORMATO
                      WHERE
                        miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR = '$idFicha'
                      AND hoja_trabajo._CHECK = 0
                      AND formato.ID_FORMATO = 4
                      GROUP BY
                        hoja_trabajo.ID_USUARIO,
                        hoja_trabajo.ID_FORMATO,
                        miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR
                    ),
                    0
                  ) AS AIEPI,
                  IFNULL(
                    (
                      SELECT
                        COUNT(formato.DES_FORMATO)
                      FROM
                        hoja_trabajo
                      INNER JOIN miembros_hogar ON hoja_trabajo.ID_MIEMBRO = miembros_hogar.ID_MIEMBROS_HOGAR
                      INNER JOIN formato ON formato.ID_FORMATO = hoja_trabajo.ID_FORMATO
                      WHERE
                        miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR = '$idFicha'
                      AND hoja_trabajo._CHECK = 0
                      AND formato.ID_FORMATO = 6
                      GROUP BY
                        hoja_trabajo.ID_USUARIO,
                        hoja_trabajo.ID_FORMATO,
                        miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR
                    ),
                    0
                  ) AS FINDRISK
                FROM hoja_trabajo INNER JOIN
                  (
                    SELECT
                      hoja_trabajo.ID_FORMATO,
                      miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR,
                      formato.DES_FORMATO AS DES_FORMATO1
                    FROM
                      hoja_trabajo
                    INNER JOIN miembros_hogar ON hoja_trabajo.ID_MIEMBRO = miembros_hogar.ID_MIEMBROS_HOGAR
                    INNER JOIN formato ON formato.ID_FORMATO = hoja_trabajo.ID_FORMATO
                    WHERE
                      miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR = '$idFicha'
                    AND hoja_trabajo._CHECK = 0
                  ) AS tb1
                  INNER JOIN ficha_hogar ON tb1.FICHA_HOGAR_ID_FIC_HOGAR = ficha_hogar.ID_FIC_HOGAR"

                );
        
        return $datos->fetchall();
    }
}

?>