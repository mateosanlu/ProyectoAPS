<?php

class aiepiController extends Controller
{
    private $_formato;
    private $_general;
    public function __construct() {
        parent::__construct();
        $this->_formato = $this->loadModel('aiepi');
        $this->_general = $this->loadModel('general');
       
    }
    
    public function index()
    {
        $this->_view->titulo = 'Formato AIEPI';
         $this->_view->setJs(array('aiepi'));
        $this->_view->renderizar('nuevo', 'aiepi');
       
    }

    public function nuevo()
    {   
        
        $this->_view->municipios = $this->_general->getMunicipios();
        $this->_view->eps = $this->_general->getEps();
        $this->_view->titulo = 'Nuevo registro AIEPI';

        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;
            
            $result = $this->_formato->setAiepi(
$this->getPostParam('fechaEncuestaAiepi'),
$this->getPostParam('nombreInstitucion'),
$this->getPostParam('nombreMunicipio'),
$this->getPostParam('aseguradorAiepi'),
$this->getPostParam('tipoDeUsuarioAiepi'),
$this->getPostParam('nombreNiño'),
$this->getPostParam('fechNacimientoNiño'),
$this->getPostParam('rcNiño'),
$this->getPostParam('generoEncuestaAiepi'),
$this->getPostParam('procedenciaAiepi'),
$this->getPostParam('tipoPoblacionAiepi'),
$this->getPostParam('nombreAcompañanteAiepi'),
$this->getPostParam('parentescoAiepi'),
$this->getPostParam('direccionAiepi'),
$this->getPostParam('TelefonoAiepi'),
$this->getPostParam('evaluacionRealizadaAiepi'),
$this->getPostParam('opProblemaSaludBocal'),
$this->getPostParam('opDolorAlComer'),
$this->getPostParam('opGolpeBoca'),
$this->getPostParam('opDuermeSinCepillarse'),
$this->getPostParam('opSupervisaCepillado'),
$this->getPostParam('opSangraCuandoCepilla'),
$this->getPostParam('numValOdontologicasAño'),
$this->getPostParam('numHigieneOralDia'),
$this->getPostParam('dascHigOral'),
$this->getPostParam('opNiñoConTos'),
$this->getPostParam('numDiasConTos'),
$this->getPostParam('opDificultadParaRespirar'),
$this->getPostParam('numDiasConDificultadParaRespirar'),
$this->getPostParam('opTirajeSucostal'),
$this->getPostParam('numRespiracionesPorMin'),
$this->getPostParam('opTieneEstridor'),
$this->getPostParam('opRespiracionRapida'),
$this->getPostParam('opTieneSibilancias'),
$this->getPostParam('opContactoConPerTb'),
$this->getPostParam('opTosPersistenteMasDe21Dias'),
$this->getPostParam('opContactoConPerSintomaticasResp'),
$this->getPostParam('opPerdidaOGananciaPesoUlt3Meses'),
$this->getPostParam('opTieneDiarrea'),
$this->getPostParam('opFontanelaOMollejaHundida'),
$this->getPostParam('opSangreEnHeces'),
$this->getPostParam('opOjosUndidos'),
$this->getPostParam('opPliegueCutaneoLento'),
$this->getPostParam('numDiasConDiarrea'),
$this->getPostParam('opIntranquiloOIrritable'),
$this->getPostParam('opBocaSecaOMuchaSed'),
$this->getPostParam('opPliegueCutaneoMuyLento'),
$this->getPostParam('opNiñoConFiebre'),
$this->getPostParam('opFiebreMasDe5DiasTodosLosDias'),
$this->getPostParam('zonaVive'),
$this->getPostParam('opViveVistZonaDenge'),
$this->getPostParam('opRigidezDeNuca'),
$this->getPostParam('opPielHumedaYFria'),
$this->getPostParam('opFiebreMayorDe39C'),
$this->getPostParam('opCoriza'),
$this->getPostParam('opAspectoToxico'),
$this->getPostParam('opPulsoRapidoYDebil'),
$this->getPostParam('numDiasConFiebre'),
$this->getPostParam('opViveOVisitoZonaMalaria'),
$this->getPostParam('opManifiestaSangrado'),
$this->getPostParam('opInquitoOIrritable'),
$this->getPostParam('opTieneTos'),
$this->getPostParam('opOjosRojos'),
$this->getPostParam('opDolorAbdominalContOInt'),
$this->getPostParam('opErupcionCutaneaYGeneral'),
$this->getPostParam('opFiebreMasDe14Dias'),
$this->getPostParam('opDolorDeCabezaDespiertaAlNiño'),
$this->getPostParam('opDolorDeCabezaAcompañadoConVomito'),
$this->getPostParam('opDolorHuesosInterrumpeActNiño'),
$this->getPostParam('opUlt3MesesCambiosFatiga'),
$this->getPostParam('numDiasConDolorDeCabeza'),
$this->getPostParam('opDolorDeCabezaRecAumenta'),
$this->getPostParam('opDolorDeHuesosEnElUltimoMes'),
$this->getPostParam('opDolorDeHuesosEnAumento'),
$this->getPostParam('opProblemasDeOido'),
$this->getPostParam('opSupuracionDeOido'),
$this->getPostParam('opDolorAtrasDeLaOreja'),
$this->getPostParam('numDeEpisodiosPrevios'),
$this->getPostParam('numDiasConSupuracion'),
$this->getPostParam('opNiñoDesnutricionOAnemia'),
$this->getPostParam('opRetrasoDeCrecimiento'),
$this->getPostParam('opValoracionDeCara'),
$this->getPostParam('opPerdidaTejidoMusc'),
$this->getPostParam('opSistemaOseo'),
$this->getPostParam('opTejidoAdiposo'),
$this->getPostParam('opComportamiento'),
$this->getPostParam('opApetito'),
$this->getPostParam('opCabello'),
$this->getPostParam('opEdema'),
$this->getPostParam('opMarcaDelColorBrazo'),
$this->getPostParam('mediaMarcaColorBrazo'),
$this->getPostParam('opTomaSenoMen6Meses'),
$this->getPostParam('numVecesTomaSenoDiaMen6Meses'),
$this->getPostParam('numVecesTomaSenoNocheMen6Meses'),
$this->getPostParam('opTomaSenoMas6Meses'),
$this->getPostParam('numVecesTomaSenoDiaMas6Meses'),
$this->getPostParam('numVecesTomaSenoNocheMas6Meses'),
$this->getPostParam('opUsaBiberon'),
$this->getPostParam('alimentosConMayorFrecuencia'),
$this->getPostParam('opProgramaRecuperacionNutri'),
$this->getPostParam('programaRecuperacionNutri'),
$this->getPostParam('opComeSolo'),
$this->getPostParam('op3MesesLevantaCabeza'),
$this->getPostParam('op6MesesSeSientaConApoyo'),
$this->getPostParam('op9MesesSeSientaPorSiSolo'),
$this->getPostParam('op12MesesCaminaSolo'),
$this->getPostParam('op16MesesCaminaSolo'),
$this->getPostParam('op20MesesCorreRapido'),
$this->getPostParam('op24MesesPateaPelota'),
$this->getPostParam('op30MesesSeEmpinaPies'),
$this->getPostParam('op36MesesSubeEscaleras'),
$this->getPostParam('op48MesesLanzaPelota'),
$this->getPostParam('op60MesesSeParaYSalta1Pie'),
$this->getPostParam('numConsultasCrecimiento'),
$this->getPostParam('opRecibioDesparacitacion'),
$this->getPostParam('fechaDeDesparacitacion'),
$this->getPostParam('opRecibeMicronutrientes'),
$this->getPostParam('descripcionMicronutrientes'),
$this->getPostParam('fechaEntregaMicronutrientes'),
$this->getPostParam('opLeSonrien'),
$this->getPostParam('opArrullan'),
$this->getPostParam('opPreocupanPorLaHigiene'),
$this->getPostParam('opSePreocupanPorSalud'),
$this->getPostParam('opLeAcompañan'),
$this->getPostParam('opJuegan'),
$this->getPostParam('opCastigan'),
$this->getPostParam('opAccidentesFrecuentes'),
$this->getPostParam('opSoloTomandoseTetero'),
$this->getPostParam('opObjPequeñosAlAlcance'),
$this->getPostParam('opNiñosEnCocina'),
$this->getPostParam('opCuchillosAlAlcance'),
$this->getPostParam('opMedicamentosAlAlcance'),
$this->getPostParam('opEscalerasSinBarandas'),
$this->getPostParam('opVelasAlAlcance'),
$this->getPostParam('opAguaAlmacenadaSinTapa'),
$this->getPostParam('opCablesDescubieros'),
$this->getPostParam('opRiesgosEnElHogar'),
$this->getPostParam('nomGeCaVi')
                );
$idLastAiepi=$result;
            if ($result == false) {
                $this->_view->_error = 'Ha ocurrido un error al guardar GENERALES';
                $this->_view->renderizar('nuevo', 'aiepi');
                exit;
            }
//////--------INSERTANDO CHECKBOX DE IDENTIFICACION DE SIGNOS GENERALES DE PELIGRO----------//
$tipSelecSignoRiesgoOp1=$this->getPostParam('tipSelecSignoRiesgoOp1');
$result=$this->_formato->setAiepiCheck($tipSelecSignoRiesgoOp1,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha ocurrido un error al guardar RIESGOOP1".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$tipSelecSignoRiesgoOp2=$this->getPostParam('tipSelecSignoRiesgoOp2');
$result=$this->_formato->setAiepiCheck($tipSelecSignoRiesgoOp2,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha ocurrido un error al guardar RiesgoOp2".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$tipSelecSignoRiesgoOp3=$this->getPostParam('tipSelecSignoRiesgoOp3');
$result=$this->_formato->setAiepiCheck($tipSelecSignoRiesgoOp3,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha ocurrido un error al guardar RiesgoOp3".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$tipSelecSignoRiesgoOp4=$this->getPostParam('tipSelecSignoRiesgoOp4');
$result=$this->_formato->setAiepiCheck($tipSelecSignoRiesgoOp4,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha ocurrido un error al guardar RiesgoOp4".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$tipSelecSignoRiesgoOp5=$this->getPostParam('tipSelecSignoRiesgoOp5');
$result=$this->_formato->setAiepiCheck($tipSelecSignoRiesgoOp5,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha ocurrido un error al guardar RiesgoOp5".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$tipSelecSignoRiesgoOp6=$this->getPostParam('tipSelecSignoRiesgoOp6');
$result=$this->_formato->setAiepiCheck($tipSelecSignoRiesgoOp6,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha ocurrido un error al guardar RiesgoOp6".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
////--------------INSERTANDO CHECKBOX DE POSICION TOMA SENO-------/////////
$posicionTomaSenoNum1=$this->getPostParam('posicionTomaSenoNum1');
$result=$this->_formato->setAiepiCheck($posicionTomaSenoNum1,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha ocurrido un error al guardar posicionTomaSeno1".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$posicionTomaSenoNum2=$this->getPostParam('posicionTomaSenoNum2');
$result=$this->_formato->setAiepiCheck($posicionTomaSenoNum2,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha ocurrido un error al guardar posicionTomaSeno2".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$posicionTomaSenoNum3=$this->getPostParam('posicionTomaSenoNum3');
$result=$this->_formato->setAiepiCheck($posicionTomaSenoNum3,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha ocurrido un error al guardar posicionTomaSeno3".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
////////////////-----------INSERTANDO CHECKBOX DE AGARRE TOMA SENO-----------/////////
$agarreTomaSenoNum1=$this->getPostParam('agarreTomaSenoNum1');
$result=$this->_formato->setAiepiCheck($agarreTomaSenoNum1,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido un error al guardar agarretomaSenoNum1".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$agarreTomaSenoNum2=$this->getPostParam('agarreTomaSenoNum2');
$result=$this->_formato->setAiepiCheck($agarreTomaSenoNum2,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido un error al guardar agarretomaSenoNum2".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$agarreTomaSenoNum3=$this->getPostParam('agarreTomaSenoNum3');
$result=$this->_formato->setAiepiCheck($agarreTomaSenoNum3,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido un error al guardar agarretomaSenoNum3".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
///////////////-------INSERTANDO CHECKBOX DIFICULTAD PARA AMAMANTAR-----////////
$dificultadParaAmamantarNum1=$this->getPostParam('dificultadParaAmamantarNum1');
$result=$this->_formato->setAiepiCheck($dificultadParaAmamantarNum1,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido un error al guardar dificultadAmaNum1".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$dificultadParaAmamantarNum2=$this->getPostParam('dificultadParaAmamantarNum2');
$result=$this->_formato->setAiepiCheck($dificultadParaAmamantarNum2,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido un error al guardar dificultadAmaNum2".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$dificultadParaAmamantarNum3=$this->getPostParam('dificultadParaAmamantarNum3');
$result=$this->_formato->setAiepiCheck($dificultadParaAmamantarNum3,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido un error al guardar dificultadAmaNum3".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$dificultadParaAmamantarNum4=$this->getPostParam('dificultadParaAmamantarNum4');
$result=$this->_formato->setAiepiCheck($dificultadParaAmamantarNum4,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido un error al guardar dificultadAmaNum4".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$dificultadParaAmamantarNum5=$this->getPostParam('dificultadParaAmamantarNum5');
$result=$this->_formato->setAiepiCheck($dificultadParaAmamantarNum5,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido un error al guardar dificultadAmaNum5".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$dificultadParaAmamantarNum6=$this->getPostParam('dificultadParaAmamantarNum6');
$result=$this->_formato->setAiepiCheck($dificultadParaAmamantarNum6,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido un error al guardar dificultadAmaNum6".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$dificultadParaAmamantarNum7=$this->getPostParam('dificultadParaAmamantarNum7');
$result=$this->_formato->setAiepiCheck($dificultadParaAmamantarNum7,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido un error al guardar dificultadAmaNum7".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$dificultadParaAmamantarNum8=$this->getPostParam('dificultadParaAmamantarNum8');
$result=$this->_formato->setAiepiCheck($dificultadParaAmamantarNum8,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido un error al guardar dificultadAmaNum8".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
/////////---------INSERTAR OTROS ALIMENTOS RECIBE EL LACTANTE-------///////////
$lactRecibeOtrosAlimentosNum1=$this->getPostParam('lactRecibeOtrosAlimentosNum1');
$result=$this->_formato->setAiepiCheck($lactRecibeOtrosAlimentosNum1,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar recibeOtrosAliNum1".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$lactRecibeOtrosAlimentosNum2=$this->getPostParam('lactRecibeOtrosAlimentosNum2');
$result=$this->_formato->setAiepiCheck($lactRecibeOtrosAlimentosNum2,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar recibeOtrosAliNum2".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$lactRecibeOtrosAlimentosNum3=$this->getPostParam('lactRecibeOtrosAlimentosNum3');
$result=$this->_formato->setAiepiCheck($lactRecibeOtrosAlimentosNum3,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar recibeOtrosAliNum3".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$lactRecibeOtrosAlimentosNum4=$this->getPostParam('lactRecibeOtrosAlimentosNum4');
$result=$this->_formato->setAiepiCheck($lactRecibeOtrosAlimentosNum4,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar recibeOtrosAliNum4".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$lactRecibeOtrosAlimentosNum5=$this->getPostParam('lactRecibeOtrosAlimentosNum5');
$result=$this->_formato->setAiepiCheck($lactRecibeOtrosAlimentosNum5,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar recibeOtrosAliNum5".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$lactRecibeOtrosAlimentosNum6=$this->getPostParam('lactRecibeOtrosAlimentosNum6');
$result=$this->_formato->setAiepiCheck($lactRecibeOtrosAlimentosNum6,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar recibeOtrosAliNum6".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
////////////////-----INSERTANDO ALIMENTOS CONTIENEN SAL O AZUCAR ------//////
$alimentosContienenSal=$this->getPostParam('alimentosContienenSal');
$result=$this->_formato->setAiepiCheck($alimentosContienenSal,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar alimentosContienenSal".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$alimentosContienenAzucar=$this->getPostParam('alimentosContienenAzucar');
$result=$this->_formato->setAiepiCheck($alimentosContienenAzucar,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar alimentosContienenAzucar".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
/////////-----INSERTANDO QUE UTILIZA PARA ALIMENTAR ----///////
$utilizaParaAlimentarNum1=$this->getPostParam('utilizaParaAlimentarNum1');
$result=$this->_formato->setAiepiCheck($utilizaParaAlimentarNum1,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar utilAlimentarNum1".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$utilizaParaAlimentarNum2=$this->getPostParam('utilizaParaAlimentarNum2');
$result=$this->_formato->setAiepiCheck($utilizaParaAlimentarNum2,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar utilAlimentarNum2".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$utilizaParaAlimentarNum3=$this->getPostParam('utilizaParaAlimentarNum3');
$result=$this->_formato->setAiepiCheck($utilizaParaAlimentarNum3,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar utilAlimentarNum3".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$utilizaParaAlimentarNum4=$this->getPostParam('utilizaParaAlimentarNum4');
$result=$this->_formato->setAiepiCheck($utilizaParaAlimentarNum4,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar utilAlimentarNum4".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
///////--------INSERTANDO QUE TOMA EL NIÑO---------///////
$queTomaElNiñoNum1=$this->getPostParam('queTomaElNiñoNum1');
$result=$this->_formato->setAiepiCheck($queTomaElNiñoNum1,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar queTomaNiñoNum1".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$queTomaElNiñoNum2=$this->getPostParam('queTomaElNiñoNum2');
$result=$this->_formato->setAiepiCheck($queTomaElNiñoNum2,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar queTomaNiñoNum2".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$queTomaElNiñoNum3=$this->getPostParam('queTomaElNiñoNum3');
$result=$this->_formato->setAiepiCheck($queTomaElNiñoNum3,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar queTomaNiñoNum3".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$queTomaElNiñoNum4=$this->getPostParam('queTomaElNiñoNum4');
$result=$this->_formato->setAiepiCheck($queTomaElNiñoNum4,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar queTomaNiñoNum4".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$queTomaElNiñoNum5=$this->getPostParam('queTomaElNiñoNum5');
$result=$this->_formato->setAiepiCheck($queTomaElNiñoNum5,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar queTomaNiñoNum5".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$queTomaElNiñoNum6=$this->getPostParam('queTomaElNiñoNum6');
$result=$this->_formato->setAiepiCheck($queTomaElNiñoNum6,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar queTomaNiñoNum6".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
//////////////INSERTANDO CONSISTENCIA DE LOS ALIMENTOS////////////
$consistenciaDeAlimentosNum1=$this->getPostParam('consistenciaDeAlimentosNum1');
$result=$this->_formato->setAiepiCheck($consistenciaDeAlimentosNum1,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar consistenciaNum1".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$consistenciaDeAlimentosNum2=$this->getPostParam('consistenciaDeAlimentosNum2');
$result=$this->_formato->setAiepiCheck($consistenciaDeAlimentosNum2,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar consistenciaNum2".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$consistenciaDeAlimentosNum3=$this->getPostParam('consistenciaDeAlimentosNum3');
$result=$this->_formato->setAiepiCheck($consistenciaDeAlimentosNum3,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar consistenciaNum3".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$consistenciaDeAlimentosNum4=$this->getPostParam('consistenciaDeAlimentosNum4');
$result=$this->_formato->setAiepiCheck($consistenciaDeAlimentosNum4,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar consistenciaNum4".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
///////////------ INSERTANDO PROBLEMAS AMBIENTALES Y DE HIGIENE--------//////////
$problemaAbientalYHigieneNum1=$this->getPostParam('problemaAbientalYHigieneNum1');
$result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum1,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar problemAmbientalesNum1".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$problemaAbientalYHigieneNum2=$this->getPostParam('problemaAbientalYHigieneNum2');
$result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum2,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar problemAmbientalesNum2".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$problemaAbientalYHigieneNum3=$this->getPostParam('problemaAbientalYHigieneNum3');
$result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum3,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar problemAmbientalesNum3".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$problemaAbientalYHigieneNum4=$this->getPostParam('problemaAbientalYHigieneNum4');
$result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum4,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar problemAmbientalesNum4".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$problemaAbientalYHigieneNum5=$this->getPostParam('problemaAbientalYHigieneNum5');
$result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum5,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar problemAmbientalesNum5".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$problemaAbientalYHigieneNum6=$this->getPostParam('problemaAbientalYHigieneNum6');
$result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum6,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar problemAmbientalesNum6".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$problemaAbientalYHigieneNum7=$this->getPostParam('problemaAbientalYHigieneNum7');
$result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum7,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar problemAmbientalNum7".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$problemaAbientalYHigieneNum8=$this->getPostParam('problemaAbientalYHigieneNum8');
$result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum8,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar problemAmbientalNum8".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$problemaAbientalYHigieneNum9=$this->getPostParam('problemaAbientalYHigieneNum9');
$result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum9,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar problemAmbientalNum9".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$problemaAbientalYHigieneNum10=$this->getPostParam('problemaAbientalYHigieneNum10');
$result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum10,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar problemAmbientalNum10".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$problemaAbientalYHigieneNum11=$this->getPostParam('problemaAbientalYHigieneNum11');
$result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum11,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar problemAmbientalNum11".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$problemaAbientalYHigieneNum12=$this->getPostParam('problemaAbientalYHigieneNum12');
$result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum12,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar problemAmbientalNum12".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$problemaAbientalYHigieneNum13=$this->getPostParam('problemaAbientalYHigieneNum13');
$result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum13,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guarda problemAmbientalNum13".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$problemaAbientalYHigieneNum14=$this->getPostParam('problemaAbientalYHigieneNum14');
$result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum14,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar problemAmbientalNum14".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
$problemaAbientalYHigieneNum15=$this->getPostParam('problemaAbientalYHigieneNum15');
$result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum15,$idLastAiepi);
if ($result==false) {
    $this->_view->_error="Ha Ocurrido Un Error Al Guardar problemAmbientalNum15".$result;
    $this->_view->renderizar('nuevo','aiepi');
}
            $this->_view->_error = 'Registro guardado exitosamente'; 
        }       
        
        $this->_view->renderizar('nuevo', 'aiepi');
    }
}

?>