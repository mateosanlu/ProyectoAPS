<?php

class ficha_hogarController extends Controller
{
    public function __construct() {
        parent::__construct();

         $this->_ficha = $this->loadModel('ficha_hogar');
    }
    
    public function index()
    {
        //$post = $this->loadModel('post'); //cargar modelo
        //$this->_view->posts = $post->getPosts(); //  ejecutar metodos del modelo

        $this->_view->titulo = 'Ficha hogar';
        $this->_view->setJs(array('ficha_hogar'));
        $this->_view->setJs(array('validate'));  
        $this->_view->setJs(array('methods'));  
       // cargar js
        $this->_view->municipios = $this->_ficha->getAll('municipios');
        $this->_view->barrios = $this->_ficha->getAll('barrios');
        $this->_view->eps = $this->_ficha->getAll('eps');
        $this->_view->preguntas = $this->_ficha->getPreguntas();
        $this->_view->renderizar('index', 'ficha_hogar');

    }

    function consultar(){
        
          $json=json_encode($this->_ficha->getAll('eps'));
          echo $json;
    }

    public function ingresar(){

    $this->_view->titulo = 'Ficha hogar';
    $this->_view->setJs(array('ficha_hogar'));  // cargar js
    $this->_view->municipios = $this->_ficha->getAll('municipios');
    $this->_view->barrios = $this->_ficha->getAll('barrios');
    $this->_view->preguntas = $this->_ficha->getPreguntas();
    $this->_view->renderizar('index', 'ficha_hogar');


    $result=$this->_ficha->setFichaHogar(
                                 $this->getPostParam('municipio'),
                                 $this->getPostParam('codigo_hogar'),
                                 $this->getPostParam('tipoHogar'),
                                 $this->getPostParam('jefeHogar'),
                                 $this->getPostParam('ubicacion'),
                                 $this->getPostParam('nombreBarrio'),
                                 $this->getPostParam('nomenclaturaBarrio'),
                                 $this->getPostParam('noAplicaBarrio'),
                                 $this->getPostParam('numVereda'),
                                 $this->getPostParam('nomVereda'),
                                 $this->getPostParam('nomenclaturaVereda'),
                                 $this->getPostParam('noAplicavereda'),
                                 $this->getPostParam('telefono_jefe_hogar')
                                 );


    $resulta=$this->_ficha->setPreguntasgrupales(
                                    $this->getPostParam('tenenciaVivienda'),
                                    $this->getPostParam('otratenenciaVivienda'),
                                    $this->getPostParam('zonaVivienda'),
                                    $this->getPostParam('otrazonaVivienda'),
                                    $this->getPostParam('tipoVivienda'),
                                    $this->getPostParam('otratipoVivienda'),
                                    $this->getPostParam('otrasCondicionesdeVulnerabilidadVivienda'),
                                    $this->getPostParam('materialTecho'),
                                    $this->getPostParam('otramaterialTecho'),
                                    $this->getPostParam('materialParedes'),
                                    $this->getPostParam('otramaterialParedes'),
                                    $this->getPostParam('materialPiso'),
                                    $this->getPostParam('otramaterialPiso'),
                                    $this->getPostParam('abastecimientoFuente'),
                                    $this->getPostParam('otraabastecimientoFuente'),
                                    $this->getPostParam('abastecimientoTratamiento'),
                                    $this->getPostParam('otraabastecimientoTratamiento'),
                                    $this->getPostParam('abastecimientoAlmacenamiento'),
                                    $this->getPostParam('otraabastecimientoAlmacenamiento'),
                                    $this->getPostParam('disposicionMecanismo'),
                                    $this->getPostParam('otradisposicionMecanismo'),
                                    $this->getPostParam('disposicionDispocicion'),
                                    $this->getPostParam('otradisposicionDispocicion'),
                                    $this->getPostParam('disposicionRecolecion'),
                                    $this->getPostParam('otradisposicionRecolecion'),
                                    $this->getPostParam('disposicionDisposicionbasuras'),
                                    $this->getPostParam('otradisposicionDisposicionbasuras'),
                                    $this->getPostParam('Energia'),
                                    $this->getPostParam('otraEnergia'),
                                    $this->getPostParam('Combustible'),
                                    $this->getPostParam('otraCombustible'),
                                    $this->getPostParam('cocinaSeparada'),
                                    $this->getPostParam('otracocinaSeparada'),
                                    $this->getPostParam('numDormitorios'),
                                    $this->getPostParam('numPersonaDormitorio'),
                                    $this->getPostParam('riegosFisicos'),
                                    $this->getPostParam('otrariegosFisicos'),
                                    $this->getPostParam('riesgosQuimicos'),
                                    $this->getPostParam('otrariesgosQuimicos'),
                                    $this->getPostParam('riesgosBiologicos'),
                                    $this->getPostParam('otrariesgosBiologicos'),
                                    $this->getPostParam('riesgosSociales'),
                                    $this->getPostParam('otrariesgosSociales'),
                                    $this->getPostParam('viasAcceso'),
                                    $this->getPostParam('otraviasAcceso'),
                                    $this->getPostParam('transportePublico'),
                                    $this->getPostParam('otratransportePublico'),
                                    $this->getPostParam('telefono_publico'),
                                    $this->getPostParam('hogares_infantiles'),
                                    $this->getPostParam('ecuelas'),
                                    $this->getPostParam('centroSalud'),
                                    $this->getPostParam('bomberos'),
                                    $this->getPostParam('comisariaFamilia'),
                                    $this->getPostParam('centroReligioso'),
                                    $this->getPostParam('centroDeportivo'),
                                    $this->getPostParam('centroCultural'),
                                    $this->getPostParam('mercadoBasico'),
                                    $this->getPostParam('presenciaVectores'),
                                    $this->getPostParam('otrapresenciaVectores'),
                                    $this->getPostParam('presenciaCentros'),
                                    $this->getPostParam('otrapresenciaCentros'),
                                    $this->getPostParam('otrasCondicionesdeVulnerabilidadViviendaHogar'),                                 
                                        $this->getPostParam('convivencia'),
                                        $this->getPostParam('hijieneVivienda'),
                                        $this->getPostParam('otrahijieneVivienda'),
                                        $this->getPostParam('riesgosLaborales'),
                                        $this->getPostParam('animalesCasa'),
                                        $this->getPostParam('animalesCasaTipo1'),
                                        $this->getPostParam('otraanimalesCasaTipo1'),
                                        $this->getPostParam('animalesCasaTipo2'),
                                        $this->getPostParam('otraanimalesCasaTipo2'),
                                        $this->getPostParam('animalesCasaTipo3'),
                                        $this->getPostParam('otraanimalesCasaTipo3'),
                                        $this->getPostParam('animalesCasaTipo4'),
                                        $this->getPostParam('otraanimalesCasaTipo4'),
                                        $this->getPostParam('animalesCasaTipo5'),
                                        $this->getPostParam('otraanimalesCasaTipo5'),
                                        $this->getPostParam('animalesCasaTipo6'),
                                        $this->getPostParam('otraanimalesCasaTipo6'),
                                        $this->getPostParam('menoresEsquemaincompleto'),
                                        $this->getPostParam('adultosEnfermedadcronica'),
                                        $this->getPostParam('miembrosSincontrolsexual'),
                                        $this->getPostParam('alteracionesNutricionales'),
                                        $this->getPostParam('consultaPorEnfermedad'),
                                        $this->getPostParam('lesionesPiel'),
                                        $this->getPostParam('violenciaMiembros'),
                                        $this->getPostParam('sinControlbucal'),
                                        $this->getPostParam('sinAsistenciamedico'),
                                        $this->getPostParam('otrasCondicionesdeVulnerabilidadMiembros'),
                                        $this->getPostParam('codigo_hogar'),
                                        $result


         );


 $resultado=$this->_ficha->setDatosmiebros(
                                         $this->getPostParam('codigo'),
                                         $this->getPostParam('nomApe'),
                                         $this->getPostParam('dateNacimiento'),
                                         $this->getPostParam('edad'),
                                         $this->getPostParam('sexo'),
                                         $this->getPostParam('vinculacionJefe'),
                                       $this->getPostParam('docIdentidad'),
                                       $this->getPostParam('escolaridad'),
                                       $this->getPostParam('tipoOcupacion'),
                                       $this->getPostParam('otratipoOcupacions'),
                                       $this->getPostParam('recivepago'),
                                       $this->getPostParam('aportaHogar'),
                                       $this->getPostParam('regimen'),
                                       $this->getPostParam('tipoVincuacion'),
                                       $this->getPostParam('nomEps'),
                                       $this->getPostParam('estapaCiclovital'),
                                       $this->getPostParam('condicionDiscapacidad'),
                                       $this->getPostParam('otracondicionDiscapacidad'),
                                       $this->getPostParam('grupoEtnico'),
                                       $this->getPostParam('otragrupoEtnico'),
                                       $this->getPostParam('victimaConflicto'),
                                       $this->getPostParam('poblacionLGBT'),
                                       $this->getPostParam('adolecentesEmbarazadas'),
                                       $this->getPostParam('menorTrabajador'),
                                       $this->getPostParam('menoresDesercioescolar'),
                                       $this->getPostParam('otrasCondicionesdeVulnerabilidad'),
                                        $this->getPostParam('consumeAlcohol'),
                                        $this->getPostParam('consumeCigarrillo'),
                                        $this->getPostParam('consumePsicoactivos'),
                                        $this->getPostParam('higieneCorporal'),
                                        $this->getPostParam('higieneBucal'),
                                        $this->getPostParam('mujerGestacion'),
                                        $this->getPostParam('actividadFisica'),
                                        $this->getPostParam('codigo_hogar'),
                                        $result
                                         );



    }



 
}

?>