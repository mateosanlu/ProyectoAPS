<?php 

class kardesModel extends Model{

	public function __construct() {
        parent::__construct();
    }

    public function setKardes(
    	$nomGestante
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
	'NULL'
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
 $this->_db->query($sql);
 return $this->_db->lastInsertId();
    }

    function setKardesCheck($var,$idKardes){
	if (empty($var)) {
		return true;
	}else{
		$queryIdPregunta=$this->_db->query("SELECT PREGUNTAS_ID_PREGUNTA FROM pregunta_respuesta_sc WHERE ID_PREGUNTA_RESPUESTA_SC=$var");
		if ($queryIdPregunta!=false) {
					foreach ($queryIdPregunta as $row) {
		        $idPregunta=$row['PREGUNTAS_ID_PREGUNTA'];
		       
				$insert="INSERT INTO respuesta_kardes VALUES (NULL, '$var', '$idPregunta', '$idKardes', null)";
				return $this->_db->query($insert);
				}	
			}
	}
}
}

 ?>