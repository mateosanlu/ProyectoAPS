<?php 

class ficha_hogarModel extends Model
{
    public function __construct() {
        parent::__construct();
    }


function getAll($tabla){
        $municipios = $this->_db->query("select * from ".$tabla);
        return $municipios->fetchall();
}

function getConsultar($preguntas){
	    $consulta = $this->_db->query("select * from ".$tabla);
        return $consulta ->fetchall();

}
function getAllBarrios($idTipoBarrio){
  if (isset($idTipoBarrio)) {
    $consulta = $this->_db->query('SELECT * FROM barrios WHERE BARRIO_VEREDA = '.$idTipoBarrio);
        return $consulta ->fetchall(); 
  }
         

}

function getEps(){
  $consulta = $this->_db->query('SELECT DISTINCT ID_EPS,DES_EPS FROM eps ORDER BY DES_EPS DESC');
   return $consulta ->fetchall(); 
}
function getPreguntas(){
	    $consulta = $this->_db->query('SELECT * FROM preguntas WHERE FORMATO_ID_FORMATO = "1" order by ID_PREGUNTA Asc');
        return $consulta ->fetchall();  
}

function getRespuestas($respuesta){
	    $consulta = $this->_db->query('SELECT * FROM `pregunta_respuesta_sc` WHERE PREGUNTAS_ID_PREGUNTA = '.$respuesta);
        return $consulta ->fetchall();  
}
function getMunicipio($cod_municipio){
        if ($cod_municipio != null) {
            $consulta = $this->_db->query('SELECT * FROM municipios WHERE COD_DANE = '.$cod_municipio);
            return $consulta ->fetch();  
        }
}

 public function buscarBarrios($id)
  { 
    $id=strtoupper($id);
    $preguntas = $this->_db->query("SELECT * FROM barrios WHERE  BARRIO_VEREDA = 1 AND DES_BARRIO like '%".$id."%' LIMIT 0,10   ");
        return $preguntas->fetchall();
  }

function getPregunta($respuesta){
    if (isset($respuesta)) {
     $consulta = $this->_db->query('SELECT PREGUNTAS_ID_PREGUNTA FROM pregunta_respuesta_sc WHERE ID_PREGUNTA_RESPUESTA_SC = '.$respuesta);
     return $consulta->fetch(); 

    }

                           }

function getUltimoregistro(){
        $consulta = $this->_db->query('SELECT ID_FIC_HOGAR FROM ficha_hogar ORDER BY ID_FIC_HOGAR  DESC LIMIT 1');
        return $consulta->fetch();  
}

function getUltimoregistromiembro(){
        $consulta = $this->_db->query('SELECT ID_MIEMBROS_HOGAR FROM miembros_hogar ORDER BY ID_MIEMBROS_HOGAR  DESC LIMIT 1');
        return $consulta->fetch();  
}

function check($check){
      if ($check != 'on') {
            return $check=0;
        }else{
            return $check=1;
        }
}

function generarId($tabla)
    {
        $nombre =Session::get('nombre_usuario');
        $documento = Session::get('identificacion_usuario');
        list($usec, $sec) = explode(" ", microtime());
        $nombre = substr(strtoupper($nombre), 0, 2);
        $documento = substr($documento, -4);
        return $tabla.''.$nombre.''.$documento.''.$sec.''.($usec*100000000);
    }

function setFichaHogar(    
                   $cod_municipio
                  ,$codigo_hogar
                  ,$tipoHogar
                  ,$jefeHogar
                  ,$ubicacion
                  ,$nombreBarrio
                  ,$nomenclaturaBarrio
                  ,$noAplicaBarrio
                  ,$numVereda
                  ,$nomVereda
                  ,$nomenclaturaVereda
                  ,$noAplicavereda
                  ,$telefono_jefe_hogar
                  ,$firma
                  ,$docFirma
                  )

	{


$usuario=Session::get('id_usuario');
$id_user=Session::get('identificacion_usuario');

$BarrioVereda=0;
$NomenclaturaBarrioVereda=0;
$ultimo=0;

		if ($ubicacion == '1') {
       $BarrioVereda=$nombreBarrio;
       $NomenclaturaBarrioVereda=$nomenclaturaBarrio;
     }
      else{
       $BarrioVereda=$numVereda;
       $NomenclaturaBarrioVereda=$nomenclaturaVereda;
      }


		$sql = "insert ficha_hogar values " . "('".$this->generarId('FH')."', '".$ubicacion."','".$NomenclaturaBarrioVereda."', '".$usuario."', '".$this->getMunicipio($cod_municipio)[0]."', '".$BarrioVereda."', '".($id_user."-".$codigo_hogar)."', '".$firma."',CURRENT_TIMESTAMP , '".$docFirma."');";
    $this->_db->query($sql);
    $ultimo = $this->getUltimoregistro()[0];

     if (isset($ultimo)) {
        $this->setDatosGrupales($codigo_hogar,$ultimo,$this->getPregunta($tipoHogar)[0], '',$tipoHogar,'');
        $this->setDatosGrupales($codigo_hogar,$ultimo,$this->getPregunta($jefeHogar)[0], '',$jefeHogar,'');
        $this->setDatosGrupales2($codigo_hogar,$ultimo,'129',$telefono_jefe_hogar,'');
        return $ultimo;
     }

       

}


//Regitro preguntas grupales
function setDatosGrupales($id_hogar,$ultimo,$id_pregunta,$otra_respuesta,$id_respuesta,$id_otro_dato){

      if ($id_pregunta != null) {
           $consulta2="INSERT INTO respuesta_hogar VALUES  
                      ( '".$this->generarId('RH')."', '".$id_hogar."', '".$ultimo."', '".$id_pregunta."', '".$otra_respuesta."', '".$id_respuesta."', '".$id_otro_dato."', CURRENT_TIMESTAMP)";

           $this->_db->query($consulta2);
       }
} 

//Regitro preguntas grupales con respuesta escrita
function setDatosGrupales2($id_hogar,$ultimo,$id_pregunta,$otra_respuesta,$id_otro_dato){
      if ($id_pregunta != null && $otra_respuesta != null) {
           $consulta2="INSERT INTO respuesta_hogar VALUES  
    ( '".$this->generarId('RH')."', '".$id_hogar."', '".$ultimo."', '".$id_pregunta."', '".$otra_respuesta."', NULL, '".$id_otro_dato."', CURRENT_TIMESTAMP)";

           $this->_db->query($consulta2);
       }
} 
	


//Registro datos individuales
function validarAgregar($id_hogar,$id_pregunta,$id_respuesta,$id_miembro,$id_otro_dato){

     if ($id_pregunta != null) {
           $consulta2="INSERT INTO respuesta_individual VALUES  
                 ( '".$this->generarId('RI')."', '".$id_hogar."', '".$id_pregunta."', '', '".$id_respuesta."', '".$id_otro_dato."', '".$id_miembro."', CURRENT_TIMESTAMP)";
           $this->_db->query($consulta2);
       }
}


function hojaTrabajo($usuario,$id_miembro,$formulario){
          $consulta_hoja_kardes="INSERT INTO hoja_trabajo VALUES 
                           ( '".$this->generarId('HT')."', '".$usuario."', '".$id_miembro."','".$formulario."', '0', CURRENT_TIMESTAMP)";
         $this->_db->query($consulta_hoja_kardes);
}


    function setPreguntasgrupales(
                                 $tenenciaVivienda,$otratenenciaVivienda
                                 ,$zonaVivienda,$otrazonaVivienda
                                 ,$tipoVivienda,$otratipoVivienda
                                 ,$otrasCondicionesdeVulnerabilidadVivienda

                                 ,$materialTecho,$otramaterialTecho
                                 ,$materialParedes,$otramaterialParedes
                                 ,$materialPiso,$otramaterialPiso
                                 ,$abastecimientoFuente,$otraabastecimientoFuente
                                 ,$abastecimientoTratamiento,$otraabastecimientoTratamiento
                                 ,$abastecimientoAlmacenamiento,$otraabastecimientoAlmacenamiento
                                 ,$disposicionMecanismo,$otradisposicionMecanismo
                                 ,$disposicionDispocicion,$otradisposicionDispocicion
                                 ,$disposicionRecolecion,$otradisposicionRecolecion
                                 ,$disposicionDisposicionbasuras,$otradisposicionDisposicionbasuras
                                 ,$Energia,$otraEnergia
                                 ,$Combustible,$otraCombustible
                                 ,$cocinaSeparada,$otracocinaSeparada
                                 ,$numDormitorios,$numPersonaDormitorio
                                 ,$riegosFisicos,$otrariegosFisicos
                                 ,$riesgosQuimicos,$otrariesgosQuimicos
                                 ,$riesgosBiologicos,$otrariesgosBiologicos
                                 ,$riesgosSociales,$otrariesgosSociales

                                 ,$viasAcceso,$otraviasAcceso
                                 ,$transportePublico,$otratransportePublico
                                 ,$telefono_publico
                                 ,$hogares_infantiles
                                 ,$ecuelas
                                 ,$centroSalud
                                 ,$bomberos
                                 ,$comisariaFamilia
                                 ,$centroReligioso
                                 ,$centroDeportivo
                                 ,$centroCultural
                                 ,$mercadoBasico
                                 ,$presenciaVectores,$otrapresenciaVectores
                                 ,$presenciaCentros,$otrapresenciaCentros

                                 ,$otrasCondicionesdeVulnerabilidadViviendaHogar 

                                 ,$convivencia
                                 ,$hijieneVivienda,$otrahijieneVivienda
                                 ,$riesgosLaborales
                                 ,$animalesCasa
                                 ,$animalesCasaTipo1
                                 ,$otraanimalesCasaTipo1
                                 ,$animalesCasaTipo2
                                 ,$otraanimalesCasaTipo2
                                 ,$animalesCasaTipo3
                                 ,$otraanimalesCasaTipo3
                                 ,$animalesCasaTipo4
                                 ,$otraanimalesCasaTipo4
                                 ,$animalesCasaTipo5
                                 ,$otraanimalesCasaTipo5
                                 ,$animalesCasaTipo6
                                 ,$otraanimalesCasaTipo6

                                 ,$menoresEsquemaincompleto
                                 ,$adultosEnfermedadcronica
                                 ,$miembrosSincontrolsexual
                                 ,$alteracionesNutricionales

                                 ,$consultaPorEnfermedad
                                 ,$lesionesPiel
                                 ,$violenciaMiembros
                                 ,$sinControlbucal
                                 ,$sinAsistenciamedico

                                 ,$otrasCondicionesdeVulnerabilidadMiembros
                                 
                                 ,$codigo_hogar
                                 ,$ultimo
                                 ,$consumoAlimentos
                                 ,$otrasCondicionesdeVulnerabilidadMiembrosHabitos
                                 ,$observaciones
                                 ,$animalesCasaTipo7
                                 ,$otraanimalesCasaTipo7
                                 )
            {

$id_hogar=$codigo_hogar;  


$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($tenenciaVivienda)[0],'',$tenenciaVivienda,$otratenenciaVivienda);
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($tipoVivienda)[0],'',$tipoVivienda,$otratipoVivienda);
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($zonaVivienda)[0],'',$zonaVivienda,$otrazonaVivienda);                  
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($materialTecho)[0],'',$materialTecho,$otramaterialTecho);
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($materialParedes)[0],'',$materialParedes,$otramaterialParedes);
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($materialPiso)[0],'',$materialPiso,$otramaterialPiso);
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($abastecimientoFuente)[0], '',$abastecimientoFuente,$otraabastecimientoFuente);
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($abastecimientoTratamiento)[0], '',$abastecimientoTratamiento,$otraabastecimientoTratamiento);
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($abastecimientoAlmacenamiento)[0], '',$abastecimientoAlmacenamiento,$otraabastecimientoAlmacenamiento);
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($disposicionMecanismo)[0], '',$disposicionMecanismo,$otradisposicionMecanismo);
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($disposicionDispocicion)[0], '',$disposicionDispocicion,$otradisposicionDispocicion);
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($disposicionRecolecion)[0], '',$disposicionRecolecion,$otradisposicionRecolecion);
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($disposicionDisposicionbasuras)[0], '',$disposicionDisposicionbasuras,$otradisposicionDisposicionbasuras);    
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($Energia)[0], '',$Energia, $otraEnergia);
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($Combustible)[0], '',$Combustible,$otraCombustible);

$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($cocinaSeparada)[0], '',$cocinaSeparada,$otracocinaSeparada);

$this->setDatosGrupales2($id_hogar,$ultimo,'103',$numDormitorios,'');
$this->setDatosGrupales2($id_hogar,$ultimo,'104',$numPersonaDormitorio,'');

$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($riegosFisicos)[0], '',$riegosFisicos, $otrariegosFisicos);
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($riesgosQuimicos)[0], '',$riesgosQuimicos, $otrariesgosQuimicos);
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($riesgosBiologicos)[0], '',$riesgosBiologicos, $otrariesgosBiologicos);
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($riesgosSociales)[0], '',$riesgosSociales,$otrariesgosSociales);
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($viasAcceso)[0], '',$viasAcceso, $otraviasAcceso);
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($transportePublico)[0], '',$transportePublico, $otratransportePublico);



$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($telefono_publico)[0], '',$telefono_publico,'');
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($hogares_infantiles)[0], '',$hogares_infantiles, '');
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($ecuelas)[0], '',$ecuelas, '');
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($centroSalud)[0], '',$centroSalud, '');
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($bomberos)[0], '',$bomberos, '');
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($comisariaFamilia)[0], '',$comisariaFamilia, '');
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($centroReligioso)[0], '',$centroReligioso, '');
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($centroDeportivo)[0], '',$centroDeportivo, '');
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($centroCultural)[0], '',$centroCultural, '');
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($mercadoBasico)[0], '',$mercadoBasico, '');
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($presenciaVectores)[0], '',$presenciaVectores,$otrapresenciaVectores);
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($presenciaCentros)[0], '',$presenciaCentros,$otrapresenciaCentros);


$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($convivencia)[0], '',$convivencia, '');
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($hijieneVivienda)[0], '',$hijieneVivienda, $otrahijieneVivienda);
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($riesgosLaborales)[0], '',$riesgosLaborales, '');
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($consumoAlimentos)[0], '',$consumoAlimentos, '');
$this->setDatosGrupales2($id_hogar,$ultimo, '96',$animalesCasa, '');
$this->setDatosGrupales2($id_hogar,$ultimo, '97', $this->check($animalesCasaTipo1),  $otraanimalesCasaTipo1);
$this->setDatosGrupales2($id_hogar,$ultimo, '98', $this->check($animalesCasaTipo2),  $otraanimalesCasaTipo2);
$this->setDatosGrupales2($id_hogar,$ultimo, '99', $this->check($animalesCasaTipo3),  $otraanimalesCasaTipo3);
$this->setDatosGrupales2($id_hogar,$ultimo, '100',$this->check($animalesCasaTipo4),  $otraanimalesCasaTipo4);
$this->setDatosGrupales2($id_hogar,$ultimo, '101', $this->check($animalesCasaTipo5), $otraanimalesCasaTipo5);
$this->setDatosGrupales2($id_hogar,$ultimo, '102', $this->check($animalesCasaTipo6), $otraanimalesCasaTipo6);
$this->setDatosGrupales2($id_hogar,$ultimo, '155', $this->check($animalesCasaTipo7), $otraanimalesCasaTipo7);


$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($menoresEsquemaincompleto)[0], '',$menoresEsquemaincompleto, '');
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($adultosEnfermedadcronica)[0], '',$adultosEnfermedadcronica, '');
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($miembrosSincontrolsexual)[0], '',$miembrosSincontrolsexual, '');
$this->setDatosGrupales($id_hogar,$ultimo,$this->getPregunta($alteracionesNutricionales)[0], '',$alteracionesNutricionales, '');



$this->setDatosGrupales2($id_hogar,$ultimo, '88',$consultaPorEnfermedad, '');
$this->setDatosGrupales2($id_hogar,$ultimo, '89',$lesionesPiel, '');
$this->setDatosGrupales2($id_hogar,$ultimo, '90',$violenciaMiembros, '');
$this->setDatosGrupales2($id_hogar,$ultimo, '91',$sinControlbucal, '');
$this->setDatosGrupales2($id_hogar,$ultimo, '92',$sinAsistenciamedico, '');
$this->setDatosGrupales2($id_hogar,$ultimo, '154',$observaciones, '');

$this->setDatosGrupales2($id_hogar,$ultimo, '93',$otrasCondicionesdeVulnerabilidadVivienda, '');
$this->setDatosGrupales2($id_hogar,$ultimo, '94',$otrasCondicionesdeVulnerabilidadViviendaHogar, '');
$this->setDatosGrupales2($id_hogar,$ultimo, '95',$otrasCondicionesdeVulnerabilidadMiembros, '');
$this->setDatosGrupales2($id_hogar,$ultimo, '120',$otrasCondicionesdeVulnerabilidadMiembrosHabitos, '');

            }




public function setDatosmiebros(
                                 $codigo
                                ,$nomApe 
                                ,$dateNacimiento
                                ,$edad
                                ,$sexo
                                ,$vinculacionJefe

                                ,$docIdentidad
                                ,$escolaridad
                                ,$tipoOcupacion,$otratipoOcupacions
                                ,$recivepago
                                ,$aportaHogar
                                ,$regimen
                                ,$tipoVincuacion
                                ,$nomEps

                                ,$condicionDiscapacidad,$otracondicionDiscapacidad
                                ,$grupoEtnico,$otragrupoEtnico
                                ,$victimaConflicto
                                ,$poblacionLGBT
                                ,$adolecentesEmbarazadas
                                ,$menorTrabajador
                                ,$menoresDesercioescolar
                                ,$otrasCondicionesdeVulnerabilidad

                                ,$consumeAlcohol
                                ,$consumeCigarrillo
                                ,$consumePsicoactivos
                                ,$higieneCorporal
                                ,$higieneBucal
                                ,$mujerGestacion
                                ,$actividadFisica
                                ,$codigo_hogar
                                ,$ultimo
                                ,$efermedadCardioVacular
                                ,$Apellido
                                ,$tipoDoc
                            ){


$usuario=Session::get('id_usuario');
$id_user=Session::get('identificacion_usuario');

$this->setDatosGrupales2(($id_user."-".$codigo_hogar),$ultimo, '80',$otrasCondicionesdeVulnerabilidad, '');
for ($i=0; $i < count($nomApe); $i++) { 



$fecha=explode('/', $dateNacimiento[$i]);
$fecha=$fecha[2].'-'.$fecha[1].'-'.$fecha[0];
//$edad=$this->edad($fecha);

$id_miembro=$this->generarId('MH');
$id_personal=($id_user)."-".($codigo_hogar).($i+1);


   if ($nomEps[$i] == NULL) {
    $consulta="INSERT INTO miembros_hogar VALUES 
    ( '".$id_miembro."', '".$id_personal."', '".$ultimo."', '".$nomApe[$i]."', '".$Apellido[$i]."', '".$fecha."', '".$docIdentidad[$i]."', NULL, CURRENT_TIMESTAMP, '".$edad[$i]."', '".$sexo[$i]."', '".$tipoDoc[$i]."')";
     $this->_db->query($consulta);
   }else{
     $consulta="INSERT INTO miembros_hogar VALUES 
    ( '".$id_miembro."', '".$id_personal."', '".$ultimo."', '".$nomApe[$i]."', '".$Apellido[$i]."', '".$fecha."', '".$docIdentidad[$i]."', '".$nomEps[$i]."', CURRENT_TIMESTAMP, '".$edad[$i]."', '".$sexo[$i]."', '".$tipoDoc[$i]."')";
     $this->_db->query($consulta);
   }
//Demanda Inducida
     $this->hojaTrabajo($usuario,$id_miembro,'5');
   

//Kardes
    if ( ( 
             $mujerGestacion[$i] == '412' 
          || $mujerGestacion[$i] == '413'  
          || (int)$adolecentesEmbarazadas[$i] == 363 
          || (int)$adolecentesEmbarazadas[$i]  == 364
          || (int)$adolecentesEmbarazadas[$i]  == 365
          || (int)$adolecentesEmbarazadas[$i]  == 366
          || (int)$adolecentesEmbarazadas[$i]  == 367  ) && $sexo[$i] == 'F' 

          

         ) {
          $this->hojaTrabajo($usuario,$id_miembro,'2');
    }
 
//Cancer
 $soloNumAnos=explode(' ',$edad[$i]);
    if ($soloNumAnos[1] == 'Años') 
       {
             if (isset($sexo[$i]) && ( $sexo[$i] == 'F' && ((int)$soloNumAnos[0]) >= 14 ) ) 
                {
                $this->hojaTrabajo($usuario,$id_miembro,'3');
                 }
       }
   
//Findrisk
  if ($soloNumAnos[1] == 'Años') 
     {
       if ((int)$soloNumAnos[0] >= 18  &&
          ($efermedadCardioVacular[$i] != '538'
        && $efermedadCardioVacular[$i] != '539'
        && $efermedadCardioVacular[$i] != '540')  
        && ($mujerGestacion[$i] != '412' 
        &&  $mujerGestacion[$i] != '413')
        && ((int)$adolecentesEmbarazadas[$i] != 363 
        && (int)$adolecentesEmbarazadas[$i]  != 364
        && (int)$adolecentesEmbarazadas[$i]  != 365
        && (int)$adolecentesEmbarazadas[$i]  != 366
        && (int)$adolecentesEmbarazadas[$i]  != 367 )  

        )
        {
          $this->hojaTrabajo($usuario,$id_miembro,'6');

       }
     }
//Aiepi
     if ( ($soloNumAnos[1] == 'Meses' && ((int)$soloNumAnos[0]) <= 12 )  ||   
          ($soloNumAnos[1] == 'Dias' && ((int)$soloNumAnos[0]) <= 31)  ||
          ($soloNumAnos[1] == 'Años' && ((int)$soloNumAnos[0]) <= 5) ) {

             $this->hojaTrabajo($usuario,$id_miembro,'4'); 
     }

$this->validarAgregar($ultimo,$this->getPregunta($vinculacionJefe[$i])[0],$vinculacionJefe[$i],$id_miembro,'');    

if (isset($mujerGestacion[$i])) {
   $this->validarAgregar($ultimo,$this->getPregunta($mujerGestacion[$i])[0],$mujerGestacion[$i],$id_miembro, '');
}

   $this->validarAgregar($ultimo,$this->getPregunta($escolaridad[$i])[0],$escolaridad[$i],$id_miembro,''); 
   $this->validarAgregar($ultimo,$this->getPregunta($recivepago[$i])[0],$recivepago[$i],$id_miembro,'');
   $this->validarAgregar($ultimo,$this->getPregunta($aportaHogar[$i])[0],$aportaHogar[$i],$id_miembro,'');
   $this->validarAgregar($ultimo,$this->getPregunta($regimen[$i])[0],$regimen[$i],$id_miembro,'');
   $this->validarAgregar($ultimo,$this->getPregunta($tipoVincuacion[$i])[0],$tipoVincuacion[$i],$id_miembro,'');

   

 if ($soloNumAnos[1] == 'Años') {
    if ( ( (int)$soloNumAnos[0] >= 6 ) && ( (int)$soloNumAnos[0] <= 11 )) {
         $this->validarAgregar($ultimo,$this->getPregunta('334')[0],'334',$id_miembro,'');
    }else if ( ((int)$soloNumAnos[0] >= 12 ) && ((int)$soloNumAnos[0] <= 17 ) ) {
         $this->validarAgregar($ultimo,$this->getPregunta('335')[0],'335',$id_miembro,'');
    }else if ( ((int)$soloNumAnos[0] >= 18 ) && ((int)$soloNumAnos[0] <= 28 ) ) {
         $this->validarAgregar($ultimo,$this->getPregunta('336')[0],'336',$id_miembro,'');
    }else if ( ((int)$soloNumAnos[0] >= 29 ) && ((int)$soloNumAnos[0] <= 59 ) ) {
         $this->validarAgregar($ultimo,$this->getPregunta('337')[0],'337',$id_miembro,'');
    }else if ( ((int)$soloNumAnos[0] >= 60 )) {
         $this->validarAgregar($ultimo,$this->getPregunta('338')[0],'338',$id_miembro,'');
    }else if((int)$soloNumAnos[0] <= 5 ){
          $this->validarAgregar($ultimo,$this->getPregunta('333')[0],'333',$id_miembro,'');
    }
 }else{
    $this->validarAgregar($ultimo,$this->getPregunta('333')[0],'333',$id_miembro,'');
 }

   $this->validarAgregar($ultimo,$this->getPregunta($victimaConflicto[$i])[0],$victimaConflicto[$i],$id_miembro,'');
   $this->validarAgregar($ultimo,$this->getPregunta($poblacionLGBT[$i])[0],$poblacionLGBT[$i],$id_miembro,'');
   $this->validarAgregar($ultimo,$this->getPregunta($adolecentesEmbarazadas[$i])[0],$adolecentesEmbarazadas[$i],$id_miembro,'');
   $this->validarAgregar($ultimo,$this->getPregunta($menorTrabajador[$i])[0],$menorTrabajador[$i],$id_miembro,'');
   $this->validarAgregar($ultimo,$this->getPregunta($menoresDesercioescolar[$i])[0],$menoresDesercioescolar[$i],$id_miembro,''); 
   $this->validarAgregar($ultimo,$this->getPregunta($tipoOcupacion[$i])[0],$tipoOcupacion[$i],$id_miembro,$otratipoOcupacions[$i]);

   $this->validarAgregar($ultimo,$this->getPregunta($condicionDiscapacidad[$i])[0],$condicionDiscapacidad[$i],$id_miembro,$otracondicionDiscapacidad[$i]);
   $this->validarAgregar($ultimo,$this->getPregunta($grupoEtnico[$i])[0],$grupoEtnico[$i],$id_miembro,$otragrupoEtnico[$i]);
   $this->validarAgregar($ultimo,$this->getPregunta($consumeAlcohol[$i])[0],$consumeAlcohol[$i],$id_miembro,'');
   $this->validarAgregar($ultimo,$this->getPregunta($consumeCigarrillo[$i])[0],$consumeCigarrillo[$i],$id_miembro,'');
   $this->validarAgregar($ultimo,$this->getPregunta($consumePsicoactivos[$i])[0],$consumePsicoactivos[$i],$id_miembro,'');
   $this->validarAgregar($ultimo,$this->getPregunta($higieneCorporal[$i])[0],$higieneCorporal[$i],$id_miembro,'');
   $this->validarAgregar($ultimo,$this->getPregunta($higieneBucal[$i])[0],$higieneBucal[$i],$id_miembro, '');
   $this->validarAgregar($ultimo,$this->getPregunta($actividadFisica[$i])[0],$actividadFisica[$i],$id_miembro,'');

   $this->validarAgregar($ultimo,$this->getPregunta($efermedadCardioVacular[$i])[0],$efermedadCardioVacular[$i],$id_miembro,'');

  
}
}

/*

function edad($edad){

$fecha_de_nacimiento = $edad; 
$fecha_actual = date ("Y-m-d"); 

$array_nacimiento = explode ( "-", $fecha_de_nacimiento ); 
$array_actual = explode ( "-", $fecha_actual ); 

$anos =  $array_actual[0] - $array_nacimiento[0];  
$meses = $array_actual[1] - $array_nacimiento[1]; 
$dias =  $array_actual[2] - $array_nacimiento[2]; 


if ($dias < 0) 
{ 
    --$meses; 

    switch ($array_actual[1]) { 
           case 1:     $dias_mes_anterior=31; break; 
           case 2:     $dias_mes_anterior=31; break; 
           case 3:  
                if ($this->bisiesto($array_actual[0])) 
                { 
                    $dias_mes_anterior=29; break; 
                } else { 
                    $dias_mes_anterior=28; break; 
                } 
           case 4:     $dias_mes_anterior=31; break; 
           case 5:     $dias_mes_anterior=30; break; 
           case 6:     $dias_mes_anterior=31; break; 
           case 7:     $dias_mes_anterior=30; break; 
           case 8:     $dias_mes_anterior=31; break; 
           case 9:     $dias_mes_anterior=31; break; 
           case 10:     $dias_mes_anterior=30; break; 
           case 11:     $dias_mes_anterior=31; break; 
           case 12:     $dias_mes_anterior=30; break; 
    } 

    $dias=$dias + $dias_mes_anterior; 
} 


if ($meses < 0) 
{ 
    --$anos; 
    $meses=$meses + 12; 
} 

if ($anos != 0) {
   return  $anos." Años";
}elseif ($meses !=0) {
   return  $meses." Meses";
}else{
    return  $dias." Dias";
}

}

function bisiesto($anio_actual){ 
    $bisiesto=false; 
      if (checkdate(2,29,$anio_actual)) 
      { 
        $bisiesto=true; 
    } 
    return $bisiesto; 
} 
*/

}


 ?>