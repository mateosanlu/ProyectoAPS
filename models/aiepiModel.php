<?php 

class aiepiModel extends Model
{
    public function __construct() {
        parent::__construct();
    }

	public function setAiepi(
		 $idGeneralAiepi
		,$fechaDeAiepi
		,$institucion
		,$municipio
		,$eps
		,$tipoUsuario
		,$nombreNiño
		,$fechaNacimiento
		,$registroCivil
		,$genero
		,$procencia
		,$tipPoblacion
		,$nombreAcompañante
		,$parentesco
		,$direccionAcomp
		,$telefono
		,$evalRealizada
		,$opProblemaSaludBocal
		,$opDolorAlComer
		,$opGolpeBoca
		,$opDuermeSinCepillarse
		,$opSupervisaCepillado
		,$opSangraCuandoCepilla
		,$numValOdontologicasAño
		,$numHigieneOralDia
		,$dascHigOral
		,$opNiñoConTos
		,$numDiasConTos
		,$opDificultadParaRespirar
		,$numDiasConDificultadParaRespirar
		,$opTirajeSucostal
		,$numRespiracionesPorMin
		,$opTieneEstridor
		,$opRespiracionRapida
		,$opTieneSibilancias
		,$opContactoConPerTb
		,$opTosPersistenteMasDe21Dias
		,$opContactoConPerSintomaticasResp
		,$opPerdidaOGananciaPesoUlt3Meses
		,$opTieneDiarrea
		,$opFontanelaOMollejaHundida
		,$opSangreEnHeces
		,$opOjosUndidos
		,$opPliegueCutaneoLento
		,$numDiasConDiarrea
		,$opIntranquiloOIrritable
		,$opBocaSecaOMuchaSed
		,$opPliegueCutaneoMuyLento
		,$opNiñoConFiebre
		,$opFiebreMasDe5DiasTodosLosDias
		,$zonaViveVist
		,$opViveVistZonaDenge
		,$opRigidezDeNuca
		,$opPielHumedaYFria
		,$opFiebreMayorDe39C
		,$opCoriza
		,$opAspectoToxico
		,$opPulsoRapidoYDebil
		,$numDiasConFiebre
		,$opViveOVisitoZonaMalaria
		,$opManifiestaSangrado
		,$opInquitoOIrritable
		,$opTieneTos
		,$opOjosRojos
		,$opDolorAbdominalContOInt
		,$opErupcionCutaneaYGeneral
		,$opFiebreMasDe14Dias
		,$opDolorDeCabezaDespiertaAlNiño
		,$opDolorDeCabezaAcompañadoConVomito
		,$opDolorHuesosInterrumpeActNiño
		,$opUlt3MesesCambiosFatiga
		,$numDiasConDolorDeCabeza
		,$opDolorDeCabezaRecAumenta
		,$opDolorDeHuesosEnElUltimoMes
		,$opDolorDeHuesosEnAumento
		,$opProblemasDeOido
		,$opSupuracionDeOido
		,$opDolorAtrasDeLaOreja
		,$numDeEpisodiosPrevios
		,$numDiasConSupuracion
		,$opNiñoDesnutricionOAnemia
		,$opRetrasoDeCrecimiento
		,$opValoracionDeCara
		,$opPerdidaTejidoMusc
		,$opSistemaOseo
		,$opTejidoAdiposo
		,$opComportamiento
		,$opApetito
		,$opCabello
		,$opEdema
		,$opMarcaDelColorBrazo
		,$mediaMarcaColorBrazo
		,$opTomaSenoMen6Meses
		,$numVecesTomaSenoDiaMen6Meses
		,$numVecesTomaSenoNocheMen6Meses
		,$opTomaSenoMas6Meses
		,$numVecesTomaSenoDiaMas6Meses
		,$numVecesTomaSenoNocheMas6Meses
		,$opUsaBiberon
		,$alimentosConMayorFrecuencia
		,$opProgramaRecuperacionNutri
		,$programaRecuperacionNutri
		,$opComeSolo
		,$op3MesesLevantaCabeza
		,$op6MesesSeSientaConApoyo
		,$op9MesesSeSientaPorSiSolo
		,$op12MesesCaminaSolo
		,$op16MesesCaminaSolo
		,$op20MesesCorreRapido
		,$op24MesesPateaPelota
		,$op30MesesSeEmpinaPies
		,$op36MesesSubeEscaleras
		,$op48MesesLanzaPelota
		,$op60MesesSeParaYSalta1Pie
		,$numConsultasCrecimiento
		,$opRecibioDesparacitacion
		,$fechaDeDesparacitacion
		,$opRecibeMicronutrientes
		,$descripcionMicronutrientes
		,$fechaEntregaMicronutrientes
		,$opLeSonrien
		,$opArrullan
		,$opPreocupanPorLaHigiene
		,$opSePreocupanPorSalud
		,$opLeAcompañan
		,$opJuegan
		,$opCastigan
		,$opAccidentesFrecuentes
		,$opSoloTomandoseTetero
		,$opObjPequeñosAlAlcance
		,$opNiñosEnCocina
		,$opCuchillosAlAlcance
		,$opMedicamentosAlAlcance
		,$opEscalerasSinBarandas
		,$opVelasAlAlcance
		,$opAguaAlmacenadaSinTapa
		,$opCablesDescubieros
		,$opRiesgosEnElHogar
		,$nomGeCaVi
		){
		$sql="INSERT INTO general_aiepi values (
	'".$idGeneralAiepi."',
	'".$nomGeCaVi."',
	'".$nombreAcompañante."',
	'".$parentesco."',
	'".$direccionAcomp."',
	'".$telefono."',
	'".$evalRealizada."',
	'".$opProblemaSaludBocal."',
	'".$opDolorAlComer."',
	'".$opGolpeBoca."',
	'".$opDuermeSinCepillarse."',
	'".$opSangraCuandoCepilla."',
	'".$dascHigOral."',
	'".$opSupervisaCepillado."',
	'".$numValOdontologicasAño."',
	'".$numHigieneOralDia."',
	'".$opNiñoConTos."',
	'".$opDificultadParaRespirar."',
	'".$numRespiracionesPorMin."',
	'".$numDiasConTos."',
	'".$numDiasConDificultadParaRespirar."',
	'".$opRespiracionRapida."',
	'".$opTirajeSucostal."',
	'".$opTieneEstridor."',
	'".$opTieneSibilancias."',
	'".$opContactoConPerTb."',
	'".$opTosPersistenteMasDe21Dias."',
	'".$opContactoConPerSintomaticasResp."',
	'".$opPerdidaOGananciaPesoUlt3Meses."',
	'".$opTieneDiarrea."',
	'".$numDiasConDiarrea."',
	'".$opSangreEnHeces."',
	'".$opFontanelaOMollejaHundida."',
	'".$opBocaSecaOMuchaSed."',
	'".$opPliegueCutaneoMuyLento."',
	'".$opPliegueCutaneoLento."',
	'".$opIntranquiloOIrritable."',
	'".$opOjosUndidos."'
, 	'".$opNiñoConFiebre."',
	'".$numDiasConFiebre."',
	'".$opViveOVisitoZonaMalaria."',
	'".$opViveVistZonaDenge."'
, 	'".$zonaViveVist."',
	'".$opRigidezDeNuca."',
	'".$opManifiestaSangrado."',
	'".$opPielHumedaYFria."'
, 	'".$opInquitoOIrritable."',
	'".$opFiebreMasDe5DiasTodosLosDias."',
	'".$opFiebreMayorDe39C."',
	'".$opTieneTos."'
, 	'".$opCoriza."',
	'".$opOjosRojos."',
	'".$opAspectoToxico."',
	'".$opDolorAbdominalContOInt."',
	'".$opPulsoRapidoYDebil."'
, 	'".$opErupcionCutaneaYGeneral."',
	'".$opDolorDeCabezaRecAumenta."',
	'".$opDolorDeCabezaDespiertaAlNiño."',
	'".$numDiasConDolorDeCabeza."',
	'".$opFiebreMasDe14Dias."',
	'".$opDolorDeCabezaAcompañadoConVomito."',
	'".$opDolorDeHuesosEnElUltimoMes."',
	'".$opDolorHuesosInterrumpeActNiño."'
, 	'".$opDolorDeHuesosEnAumento."',
	'".$opUlt3MesesCambiosFatiga."',
	'".$opProblemasDeOido."',
	'".$numDeEpisodiosPrevios."',
	'".$opSupuracionDeOido."',
	'".$numDiasConSupuracion."',
	'".$opDolorAtrasDeLaOreja."',
	'".$opNiñoDesnutricionOAnemia."'
, 	'".$opRetrasoDeCrecimiento."',
	'".$opValoracionDeCara."',
	'".$opPerdidaTejidoMusc."',
	'".$opSistemaOseo."'
, 	'".$opComportamiento."',
	'".$opTejidoAdiposo."',
	'".$opApetito."',
	'".$opEdema."',
	'".$opCabello."',
	'".$mediaMarcaColorBrazo."'
, 	'".$opTomaSenoMen6Meses."',
	'".$numVecesTomaSenoDiaMen6Meses."',
	'".$numVecesTomaSenoNocheMen6Meses."',
	'".$opTomaSenoMas6Meses."'
,	'".$numVecesTomaSenoDiaMas6Meses."',
	'".$numVecesTomaSenoNocheMas6Meses."',
	'".$alimentosConMayorFrecuencia."',
	'".$opProgramaRecuperacionNutri."'
, 	'".$programaRecuperacionNutri."',
	'".$opUsaBiberon."',
 	'".$opComeSolo."',
	'".$op3MesesLevantaCabeza."',
	'".$op6MesesSeSientaConApoyo."'
, 	'".$op9MesesSeSientaPorSiSolo."'
, 	'".$op12MesesCaminaSolo."'
, 	'".$op16MesesCaminaSolo."'
, 	'".$op20MesesCorreRapido."'
, 	'".$op24MesesPateaPelota."'
, 	'".$op30MesesSeEmpinaPies."'
, 	'".$op36MesesSubeEscaleras."'
, 	'".$op48MesesLanzaPelota."'
, 	'".$op60MesesSeParaYSalta1Pie."'
, 	'".$numConsultasCrecimiento."'
, 	'".$opRecibeMicronutrientes."'
, 	'".$descripcionMicronutrientes."'
, 	'".$opRecibioDesparacitacion."'
, 	'".$fechaDeDesparacitacion."'
, 	'".$fechaEntregaMicronutrientes."'
, 	'".$opLeSonrien."'
, 	'".$opLeAcompañan."'
, 	'".$opArrullan."'
, 	'".$opJuegan."'
, 	'".$opPreocupanPorLaHigiene."'
, 	'".$opCastigan."'
, 	'".$opSePreocupanPorSalud."'
, 	'".$opAccidentesFrecuentes."'
, 	'".$opSoloTomandoseTetero."'
, 	'".$opObjPequeñosAlAlcance."'
, 	'".$opNiñosEnCocina."'
, 	'".$opCuchillosAlAlcance."'
, 	'".$opMedicamentosAlAlcance."'
, 	'".$opEscalerasSinBarandas."'
, 	'".$opRiesgosEnElHogar."'
, 	'".$opAguaAlmacenadaSinTapa."'
, 	'".$opCablesDescubieros."'
, 	'".$opVelasAlAlcance."'
, 	'".$nombreNiño."'
,NULL);";
 return $this->_db->query($sql);
	}
	public function getLastIdAiepi(){
		 $consulta = $this->_db->query('SELECT ID_GENERAL_AIEPI FROM general_aiepi ORDER BY ID_GENERAL_AIEPI  DESC LIMIT 1');
		 if ($consulta!=false) {
		 	foreach ($consulta as $row) {
		 		$idLastAiepi=$row['ID_GENERAL_AIEPI'];
		 	}
		 	return $idLastAiepi;
		 }
}
		
public function setAiepiCheck($var,$idAiepi,$oterId){
			if (empty($var)) {
				return true;
			}else{
				$queryIdPregunta=$this->_db->query("SELECT PREGUNTAS_ID_PREGUNTA FROM `pregunta_respuesta_sc` WHERE ID_PREGUNTA_RESPUESTA_SC=$var");
				if ($queryIdPregunta!=false) {
					foreach ($queryIdPregunta as $row) {
		        		$idPregunta=$row['PREGUNTAS_ID_PREGUNTA'];
				}
				$insert="INSERT INTO aiepi VALUES ('".$oterId."', '".$var."', '".$idAiepi."', '".$idPregunta."',NULL);";
				return $this->_db->query($insert);	
			}
			return true;
		}
	}
}
 ?>