<?php 

class kardesModel extends Model{

	public function __construct() {
        parent::__construct();
    }

    public function setKardes(
    	 $idNewKardes
    	,$nomGestante
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
		,$obserbaciones){

    	$sql="INSERT INTO kardes  VALUES (
	'".$idNewKardes."'
,'".$condicionMadres."'
,'".$fichaKardes."'
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
}

 ?>