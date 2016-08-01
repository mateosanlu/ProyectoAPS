<?php 

class kardesModel extends Model{

	public function __construct() {
        parent::__construct();
    }

    public function setKardes(
    	 $idNewKardes
    	,$nomGestante
    	,$telefonoGestante
		,$condicionMadres
		,$fichaKardes
		,$ipsPrimariaAten
		,$condicionEspecial
		,$otroCondicionEspecial
		,$numGestaciones
		,$numPartos
		,$numCesareas
		,$numAbortos
		,$numHijos
		,$numHijosMuertos
		,$fechaUltParto
		,$fechaUltMenstr
		,$fechaProParto
		,$fechaParto
		,$atenParto
		,$atendidoEn
		,$nombreIpsAtendido
		,$recienNacido
		,$descMuerteRecienNacido
		,$cordonUmbilical
		,$numVisita
		,$fechaVisita
		,$numSemanas
		,$numControlesPrenatales
		,$fechaEnQueAsiste
		,$semGestacional
		,$carnetMaterno
		,$semGestInicioCtrlPrenatal
		,$fechaIngrCtrlPrenatal
		,$ubicacionGeografica
		,$otraPatologiasGestAct
		,$asistCursoMaternidad
		,$morbilidad
		,$otraEducBrindada
		,$canalizacionServicios1Fecha
		,$canalizacionServicios2Fecha
		,$canalizacionServicios3Fecha
		,$canalizacionServicios4Fecha
		,$canalizacionServicios5Fecha
		,$canalizacionServicios6Fecha
		,$canalizacionServicios7Fecha
		,$canalizacionServicios8Fecha
		,$otraCanalizacionServicios
		,$apoyoTransporte
		,$fechControlRecNacido
		,$vacunacionPuerpera
		,$pesoRN
		,$tallaRN
		,$lactanciaRecienNacido
		,$ctrlPostParto
		,$ctrlPlanificacionFam
		,$obserbaciones
		,$nomUsuario){

    	$sql="INSERT INTO kardes  VALUES (
	'".$idNewKardes."'
,'".$condicionMadres."'
,'".$telefonoGestante."'
,'".$fichaKardes."'
,'".$ipsPrimariaAten."'
,'".$condicionEspecial."'
,'".$otroCondicionEspecial."'
,'".$numGestaciones."'
,'".$numPartos."'
,'".$numCesareas."'
,'".$numAbortos."'
,'".$numHijos."'
,'".$numHijosMuertos."'
,'".$fechaUltParto."'
,'".$fechaUltMenstr."'
,'".$fechaProParto."'
,'".$fechaParto."'
,'".$atenParto."'
,'".$atendidoEn."'
,'".$nombreIpsAtendido."'
,'".$recienNacido."'
,'".$descMuerteRecienNacido."'
,'".$cordonUmbilical."'
,'".$numVisita."'
,'".$fechaVisita."'
,'".$numSemanas."'
,'".$numControlesPrenatales."'
,'".$fechaEnQueAsiste."'
,'".$semGestacional."'
,'".$carnetMaterno."'
,'".$semGestInicioCtrlPrenatal."'
,'".$fechaIngrCtrlPrenatal."'
,'".$otraPatologiasGestAct."'
,'".$asistCursoMaternidad."'
,'".$morbilidad."'
,'".$apoyoTransporte."'
,'".$vacunacionPuerpera."'
,'".$fechControlRecNacido."'
,'".$pesoRN."'
,'".$tallaRN."'
,'".$lactanciaRecienNacido."'
,'".$ctrlPostParto."'
,'".$ctrlPlanificacionFam."'
,'".$obserbaciones."'
,'".$otraEducBrindada."'
,'".$canalizacionServicios1Fecha."'
,'".$canalizacionServicios2Fecha."'
,'".$canalizacionServicios3Fecha."'
,'".$canalizacionServicios4Fecha."'
,'".$canalizacionServicios5Fecha."'
,'".$canalizacionServicios6Fecha."'
,'".$canalizacionServicios7Fecha."'
,'".$canalizacionServicios8Fecha."'
,'".$otraCanalizacionServicios."'
,'".$nomGestante."'
,'".$nomUsuario."'
,NULL)";
return $this->_db->query($sql);
    }
public function getLastIdKardes(){
		 $consulta = $this->_db->query('SELECT ID_KARDES FROM kardes ORDER BY ID_KARDES  DESC LIMIT 1');
		 if ($consulta!=false) {
		 	foreach ($consulta as $row) {
		 		$idLastAiepi=$row['ID_KARDES'];
		 	}
		 	return $idLastAiepi;
		 }
}
    function setKardesCheck($var,$idKardes,$idKardesResp){
	if (empty($var)) {
		return true;
	}else{
		$queryIdPregunta=$this->_db->query("SELECT PREGUNTAS_ID_PREGUNTA FROM pregunta_respuesta_sc WHERE ID_PREGUNTA_RESPUESTA_SC=$var");
		if ($queryIdPregunta!=false) {
					foreach ($queryIdPregunta as $row) {
		        $idPregunta=$row['PREGUNTAS_ID_PREGUNTA'];
		       
				$insert="INSERT INTO respuesta_kardes VALUES ('$idKardesResp', '$var', '$idPregunta', '$idKardes', null)";
				return $this->_db->query($insert);
				}	
			}
	}
}
function kardex ($id_miembro){

$VAR= $this->_db->query("SELECT *,DES_MUNICIPIO FROM `kardes` INNER JOIN miembros_hogar ON miembros_hogar.ID_MIEMBROS_HOGAR=kardes.miembros_hogar_ID_MIEMBROS_HOGAR INNER JOIN ficha_hogar ON ficha_hogar.ID_FIC_HOGAR=miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR INNER JOIN municipios ON municipios.ID_MUNICIPIO=ficha_hogar.MUNICIPIOS_ID_MUNICIPIO INNER JOIN barrios ON barrios.ID_BARRIO=ficha_hogar.BARRIOS_ID_BARRIO INNER JOIN eps ON eps.ID_EPS=miembros_hogar.EPS_ID_EPS  WHERE miembros_hogar_ID_MIEMBROS_HOGAR ='".$id_miembro."'");
 return $VAR->fetchall();
}

 function getRespuesta($id_miembro,$id_pregunta){
    $consulta=$this->_db->query("SELECT pr.DES_RESPUESTA , ri.OTRO  FROM respuesta_individual as ri , pregunta_respuesta_sc as pr WHERE  ri.PREGUNTA_RESPUESTA_SC_ID_PREGUNTA_RESPUESTA_SC = pr.ID_PREGUNTA_RESPUESTA_SC
            and ri.MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR = '$id_miembro' and ri.PREGUNTAS_ID_PREGUNTA = ".$id_pregunta);
        $result=$consulta ->fetch();
        if ($result['OTRO'] == '') {
          return $result['DES_RESPUESTA'];
        }else{
          return $result['OTRO'];
        } 
  }

 function getRespuestakARDEX($id_miembro,$id_pregunta){
    $consulta=$this->_db->query("SELECT DES_RESPUESTA FROM `respuesta_kardes`
INNER JOIN pregunta_respuesta_sc ON pregunta_respuesta_sc.ID_PREGUNTA_RESPUESTA_SC=respuesta_kardes.ID_PREGUNTA_RESPUESTA_SC_RESPUESTA_KARDES
INNER JOIN kardes ON kardes.ID_KARDES=respuesta_kardes.ID_KARDES_RESPUESTA_KARDES
WHERE miembros_hogar_ID_MIEMBROS_HOGAR= '$id_miembro' and PREGUNTAS_ID_PREGUNTA=".$id_pregunta);
        $result=$consulta ->fetch();
        return $result['DES_RESPUESTA'];
        
        } 
 
}

 ?>