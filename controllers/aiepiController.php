<?php

class aiepiController extends Controller
{
    private $_formato;
    private $_general;

    public function __construct() {
        parent::__construct();
        $this->_formato = $this->loadModel('aiepi');
        $this->_general = $this->loadModel('general');
        $this->_view->setJs(array('aiepi'));
    }
    
    public function index()
    {
        Session::acceso('USUARIO');

        $this->_view->titulo = 'Formato AIEPI'; 
        //$this->_view->renderizar('nuevo', 'aiepi');
        $this->redireccionar('aiepi/nuevo');
       
    }

    public function nuevo($idTarea)
    {   
        Session::acceso('USUARIO');

        if(!$idTarea){
            $this->redireccionar('hoja_trabajo');
        }

        $this->_view->municipios = $this->_general->getMunicipios();
        $this->_view->eps = $this->_general->getEps();
        $this->_view->titulo = 'Nuevo registro AIEPI';

         $datos = $this->_general->getDatosFichaAiepi($idTarea);
        $this->_view->datos = $datos;

        if($datos['_CHECK']!='0'){
            $this->redireccionar('hoja_trabajo');
        }

        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;
            
            $result = $this->_formato->setAiepi(
                $this->generarId('GA'),
                $this->getPostParam('fechaEncuestaAiepi'),
                $this->getPostParam('nombreInstitucion'),
                $this->getPostParam('nombreMunicipio'),
                $this->getPostParam('aseguradorAiepi'),
                $this->getPostParam('tipoDeUsuarioAiepi'),
                $datos['ID_MIEMBRO'],
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
                Session::get('id_usuario')
                );
            if ($result == false) {
                $this->_view->_error = 'Ha ocurrido un error al guardar GENERALES';
                $this->_view->renderizar('nuevo', 'aiepi');
                exit;
            }
                    $idLastAiepi = $this->_formato->getLastIdAiepi();   
                    $idNewID = $this->generarId('A');   
                    //////--------INSERTANDO CHECKBOX DE IDENTIFICACION DE SIGNOS GENERALES DE PELIGRO----------//
                    $tipSelecSignoRiesgoOp1=$this->getPostParam('tipSelecSignoRiesgoOp1');
                    $result=$this->_formato->setAiepiCheck($tipSelecSignoRiesgoOp1,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha ocurrido un error al guardar RIESGOOP1".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $tipSelecSignoRiesgoOp2=$this->getPostParam('tipSelecSignoRiesgoOp2');
                    $result=$this->_formato->setAiepiCheck($tipSelecSignoRiesgoOp2,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha ocurrido un error al guardar RiesgoOp2".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $tipSelecSignoRiesgoOp3=$this->getPostParam('tipSelecSignoRiesgoOp3');
                    $result=$this->_formato->setAiepiCheck($tipSelecSignoRiesgoOp3,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha ocurrido un error al guardar RiesgoOp3".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $tipSelecSignoRiesgoOp4=$this->getPostParam('tipSelecSignoRiesgoOp4');
                    $result=$this->_formato->setAiepiCheck($tipSelecSignoRiesgoOp4,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha ocurrido un error al guardar RiesgoOp4".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $tipSelecSignoRiesgoOp5=$this->getPostParam('tipSelecSignoRiesgoOp5');
                    $result=$this->_formato->setAiepiCheck($tipSelecSignoRiesgoOp5,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha ocurrido un error al guardar RiesgoOp5".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $tipSelecSignoRiesgoOp6=$this->getPostParam('tipSelecSignoRiesgoOp6');
                    $result=$this->_formato->setAiepiCheck($tipSelecSignoRiesgoOp6,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha ocurrido un error al guardar RiesgoOp6".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $opComportamientoMirada=$this->getPostParam('opComportamientoMirada');
                    $result=$this->_formato->setAiepiCheck($opComportamientoMirada,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha ocurrido un error al guardar comportamientoMirada".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $opComportamientoLlanto=$this->getPostParam('opComportamientoLlanto');
                    $result=$this->_formato->setAiepiCheck($opComportamientoLlanto,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha ocurrido un error al guardar comportamientoLlanto".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $opSistemaOseoCostalVisible=$this->getPostParam('opSistemaOseoCostalVisible');
                    $result=$this->_formato->setAiepiCheck($opSistemaOseoCostalVisible,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha ocurrido un error al guardar opSistemaOseoCostalVisible".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $opSistemaOseoPiernasDeSable=$this->getPostParam('opSistemaOseoPiernasDeSable');
                    $result=$this->_formato->setAiepiCheck($opSistemaOseoPiernasDeSable,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha ocurrido un error al guardar opSistemaOseoPiernasDeSable".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }

                    $idNewID = $this->generarId('A'); 
                    ////--------------INSERTANDO CHECKBOX DE POSICION TOMA SENO-------/////////
                    $opMarcaDelColorBrazo=$this->getPostParam('opMarcaDelColorBrazo');
                    $result=$this->_formato->setAiepiCheck($opMarcaDelColorBrazo,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha ocurrido un error al guardar posicionTomaSeno1".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }

                    $idNewID = $this->generarId('A'); 
                    ////--------------INSERTANDO CHECKBOX DE POSICION TOMA SENO-------/////////
                    $posicionTomaSenoNum1=$this->getPostParam('posicionTomaSenoNum1');
                    $result=$this->_formato->setAiepiCheck($posicionTomaSenoNum1,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha ocurrido un error al guardar posicionTomaSeno1".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $posicionTomaSenoNum2=$this->getPostParam('posicionTomaSenoNum2');
                    $result=$this->_formato->setAiepiCheck($posicionTomaSenoNum2,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha ocurrido un error al guardar posicionTomaSeno2".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $posicionTomaSenoNum3=$this->getPostParam('posicionTomaSenoNum3');
                    $result=$this->_formato->setAiepiCheck($posicionTomaSenoNum3,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha ocurrido un error al guardar posicionTomaSeno3".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    ////////////////-----------INSERTANDO CHECKBOX DE AGARRE TOMA SENO-----------/////////
                    $agarreTomaSenoNum1=$this->getPostParam('agarreTomaSenoNum1');
                    $result=$this->_formato->setAiepiCheck($agarreTomaSenoNum1,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido un error al guardar agarretomaSenoNum1".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $agarreTomaSenoNum2=$this->getPostParam('agarreTomaSenoNum2');
                    $result=$this->_formato->setAiepiCheck($agarreTomaSenoNum2,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido un error al guardar agarretomaSenoNum2".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $agarreTomaSenoNum3=$this->getPostParam('agarreTomaSenoNum3');
                    $result=$this->_formato->setAiepiCheck($agarreTomaSenoNum3,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido un error al guardar agarretomaSenoNum3".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    ///////////////-------INSERTANDO CHECKBOX DIFICULTAD PARA AMAMANTAR-----////////
                    $dificultadParaAmamantarNum1=$this->getPostParam('dificultadParaAmamantarNum1');
                    $result=$this->_formato->setAiepiCheck($dificultadParaAmamantarNum1,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido un error al guardar dificultadAmaNum1".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $dificultadParaAmamantarNum2=$this->getPostParam('dificultadParaAmamantarNum2');
                    $result=$this->_formato->setAiepiCheck($dificultadParaAmamantarNum2,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido un error al guardar dificultadAmaNum2".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $dificultadParaAmamantarNum3=$this->getPostParam('dificultadParaAmamantarNum3');
                    $result=$this->_formato->setAiepiCheck($dificultadParaAmamantarNum3,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido un error al guardar dificultadAmaNum3".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $dificultadParaAmamantarNum4=$this->getPostParam('dificultadParaAmamantarNum4');
                    $result=$this->_formato->setAiepiCheck($dificultadParaAmamantarNum4,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido un error al guardar dificultadAmaNum4".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $dificultadParaAmamantarNum5=$this->getPostParam('dificultadParaAmamantarNum5');
                    $result=$this->_formato->setAiepiCheck($dificultadParaAmamantarNum5,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido un error al guardar dificultadAmaNum5".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $dificultadParaAmamantarNum6=$this->getPostParam('dificultadParaAmamantarNum6');
                    $result=$this->_formato->setAiepiCheck($dificultadParaAmamantarNum6,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido un error al guardar dificultadAmaNum6".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $dificultadParaAmamantarNum7=$this->getPostParam('dificultadParaAmamantarNum7');
                    $result=$this->_formato->setAiepiCheck($dificultadParaAmamantarNum7,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido un error al guardar dificultadAmaNum7".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $dificultadParaAmamantarNum8=$this->getPostParam('dificultadParaAmamantarNum8');
                    $result=$this->_formato->setAiepiCheck($dificultadParaAmamantarNum8,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido un error al guardar dificultadAmaNum8".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    /////////---------INSERTAR OTROS ALIMENTOS RECIBE EL LACTANTE-------///////////
                    $lactRecibeOtrosAlimentosNum1=$this->getPostParam('lactRecibeOtrosAlimentosNum1');
                    $result=$this->_formato->setAiepiCheck($lactRecibeOtrosAlimentosNum1,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar recibeOtrosAliNum1".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $lactRecibeOtrosAlimentosNum2=$this->getPostParam('lactRecibeOtrosAlimentosNum2');
                    $result=$this->_formato->setAiepiCheck($lactRecibeOtrosAlimentosNum2,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar recibeOtrosAliNum2".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $lactRecibeOtrosAlimentosNum3=$this->getPostParam('lactRecibeOtrosAlimentosNum3');
                    $result=$this->_formato->setAiepiCheck($lactRecibeOtrosAlimentosNum3,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar recibeOtrosAliNum3".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $lactRecibeOtrosAlimentosNum4=$this->getPostParam('lactRecibeOtrosAlimentosNum4');
                    $result=$this->_formato->setAiepiCheck($lactRecibeOtrosAlimentosNum4,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar recibeOtrosAliNum4".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $lactRecibeOtrosAlimentosNum5=$this->getPostParam('lactRecibeOtrosAlimentosNum5');
                    $result=$this->_formato->setAiepiCheck($lactRecibeOtrosAlimentosNum5,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar recibeOtrosAliNum5".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $lactRecibeOtrosAlimentosNum6=$this->getPostParam('lactRecibeOtrosAlimentosNum6');
                    $result=$this->_formato->setAiepiCheck($lactRecibeOtrosAlimentosNum6,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar recibeOtrosAliNum6".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    ////////////////-----INSERTANDO ALIMENTOS CONTIENEN SAL O AZUCAR ------//////
                    $alimentosContienenSal=$this->getPostParam('alimentosContienenSal');
                    $result=$this->_formato->setAiepiCheck($alimentosContienenSal,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar alimentosContienenSal".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $alimentosContienenAzucar=$this->getPostParam('alimentosContienenAzucar');
                    $result=$this->_formato->setAiepiCheck($alimentosContienenAzucar,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar alimentosContienenAzucar".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    /////////-----INSERTANDO QUE UTILIZA PARA ALIMENTAR ----///////
                    $utilizaParaAlimentarNum1=$this->getPostParam('utilizaParaAlimentarNum1');
                    $result=$this->_formato->setAiepiCheck($utilizaParaAlimentarNum1,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar utilAlimentarNum1".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $utilizaParaAlimentarNum2=$this->getPostParam('utilizaParaAlimentarNum2');
                    $result=$this->_formato->setAiepiCheck($utilizaParaAlimentarNum2,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar utilAlimentarNum2".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $utilizaParaAlimentarNum3=$this->getPostParam('utilizaParaAlimentarNum3');
                    $result=$this->_formato->setAiepiCheck($utilizaParaAlimentarNum3,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar utilAlimentarNum3".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $utilizaParaAlimentarNum4=$this->getPostParam('utilizaParaAlimentarNum4');
                    $result=$this->_formato->setAiepiCheck($utilizaParaAlimentarNum4,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar utilAlimentarNum4".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    ///////--------INSERTANDO QUE TOMA EL NIÑO---------///////
                    $queTomaElNiñoNum1=$this->getPostParam('queTomaElNiñoNum1');
                    $result=$this->_formato->setAiepiCheck($queTomaElNiñoNum1,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar queTomaNiñoNum1".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $queTomaElNiñoNum2=$this->getPostParam('queTomaElNiñoNum2');
                    $result=$this->_formato->setAiepiCheck($queTomaElNiñoNum2,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar queTomaNiñoNum2".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $queTomaElNiñoNum3=$this->getPostParam('queTomaElNiñoNum3');
                    $result=$this->_formato->setAiepiCheck($queTomaElNiñoNum3,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar queTomaNiñoNum3".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $queTomaElNiñoNum4=$this->getPostParam('queTomaElNiñoNum4');
                    $result=$this->_formato->setAiepiCheck($queTomaElNiñoNum4,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar queTomaNiñoNum4".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $queTomaElNiñoNum5=$this->getPostParam('queTomaElNiñoNum5');
                    $result=$this->_formato->setAiepiCheck($queTomaElNiñoNum5,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar queTomaNiñoNum5".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $queTomaElNiñoNum6=$this->getPostParam('queTomaElNiñoNum6');
                    $result=$this->_formato->setAiepiCheck($queTomaElNiñoNum6,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar queTomaNiñoNum6".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    //////////////INSERTANDO CONSISTENCIA DE LOS ALIMENTOS////////////
                    $consistenciaDeAlimentosNum1=$this->getPostParam('consistenciaDeAlimentosNum1');
                    $result=$this->_formato->setAiepiCheck($consistenciaDeAlimentosNum1,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar consistenciaNum1".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $consistenciaDeAlimentosNum2=$this->getPostParam('consistenciaDeAlimentosNum2');
                    $result=$this->_formato->setAiepiCheck($consistenciaDeAlimentosNum2,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar consistenciaNum2".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $consistenciaDeAlimentosNum3=$this->getPostParam('consistenciaDeAlimentosNum3');
                    $result=$this->_formato->setAiepiCheck($consistenciaDeAlimentosNum3,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar consistenciaNum3".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $consistenciaDeAlimentosNum4=$this->getPostParam('consistenciaDeAlimentosNum4');
                    $result=$this->_formato->setAiepiCheck($consistenciaDeAlimentosNum4,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar consistenciaNum4".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    ///////////------ INSERTANDO PROBLEMAS AMBIENTALES Y DE HIGIENE--------//////////
                    $problemaAbientalYHigieneNum1=$this->getPostParam('problemaAbientalYHigieneNum1');
                    $result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum1,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar problemAmbientalesNum1".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $problemaAbientalYHigieneNum2=$this->getPostParam('problemaAbientalYHigieneNum2');
                    $result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum2,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar problemAmbientalesNum2".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $problemaAbientalYHigieneNum3=$this->getPostParam('problemaAbientalYHigieneNum3');
                    $result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum3,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar problemAmbientalesNum3".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $problemaAbientalYHigieneNum4=$this->getPostParam('problemaAbientalYHigieneNum4');
                    $result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum4,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar problemAmbientalesNum4".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $problemaAbientalYHigieneNum5=$this->getPostParam('problemaAbientalYHigieneNum5');
                    $result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum5,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar problemAmbientalesNum5".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $problemaAbientalYHigieneNum6=$this->getPostParam('problemaAbientalYHigieneNum6');
                    $result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum6,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar problemAmbientalesNum6".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $problemaAbientalYHigieneNum7=$this->getPostParam('problemaAbientalYHigieneNum7');
                    $result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum7,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar problemAmbientalNum7".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $problemaAbientalYHigieneNum8=$this->getPostParam('problemaAbientalYHigieneNum8');
                    $result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum8,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar problemAmbientalNum8".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $problemaAbientalYHigieneNum9=$this->getPostParam('problemaAbientalYHigieneNum9');
                    $result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum9,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar problemAmbientalNum9".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $problemaAbientalYHigieneNum10=$this->getPostParam('problemaAbientalYHigieneNum10');
                    $result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum10,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar problemAmbientalNum10".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $problemaAbientalYHigieneNum11=$this->getPostParam('problemaAbientalYHigieneNum11');
                    $result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum11,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar problemAmbientalNum11".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $problemaAbientalYHigieneNum12=$this->getPostParam('problemaAbientalYHigieneNum12');
                    $result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum12,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar problemAmbientalNum12".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $problemaAbientalYHigieneNum13=$this->getPostParam('problemaAbientalYHigieneNum13');
                    $result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum13,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guarda problemAmbientalNum13".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $problemaAbientalYHigieneNum14=$this->getPostParam('problemaAbientalYHigieneNum14');
                    $result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum14,$idLastAiepi,$idNewID);
                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar problemAmbientalNum14".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }
                    $idNewID = $this->generarId('A'); 
                    $problemaAbientalYHigieneNum15=$this->getPostParam('problemaAbientalYHigieneNum15');
                    $result=$this->_formato->setAiepiCheck($problemaAbientalYHigieneNum15,$idLastAiepi,$idNewID);

                    if ($result==false) {
                        $this->_view->_error="Ha Ocurrido Un Error Al Guardar problemAmbientalNum15".$result;
                        $this->_view->renderizar('nuevo','aiepi');
                    }

                    $update = $this->_general->formatoMiembroCheck($idTarea);

                    $this->_view->_mensaje = 'Registro guardado exitosamente';
                    $this->redireccionar('hoja_trabajo/editar/'.$datos['ID_FICHA']); 
                }       
                
                $this->_view->renderizar('nuevo', 'aiepi');
            }
        }

?>