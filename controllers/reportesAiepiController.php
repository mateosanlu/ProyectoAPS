<?php

class reportesAiepiController extends Controller
{
    private $_pdf;

    public function __construct() {
        parent::__construct();
        $this->getLibrary('fpdf');
        $this->_modeloAiepi = $this->loadModel('aiepi');
        
    }
    
    public function index(){

    }
    
    public function pdf1($idAiepiBuscar)

    {

    
    $this->_pdf = new FPDF('l','mm','Legal');
// Pie de página

    // Posición: a 1,5 cm del final
 
// Creación del objeto de la clase heredada
$this->_pdf->AliasNbPages();
$this->_pdf->AddPage();
$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Line(10, 60, 345,60);
$this->_pdf->SetTitle ( 'AIEPI', false);
$this->_pdf->SetAutoPageBreak(false,1);  
$this->_pdf->Rect(10, 28, 335,176 );

   $this->_pdf->SetX(-15);
    // Arial italic 8
    $this->_pdf->SetFont('Arial','I',8);
    // Número de página
    $this->_pdf->Cell(0,10,'Page '.$this->_pdf->PageNo().'/{nb}',0,0,'C');

//$this->_pdf->SetMargins(5, 5,5);
 $this->_pdf->Image('C:\xampp\htdocs\ProyectoAPS\views\layout\default\img\logo_gobernacion.jpg',10,5,30);
    // Arial bold 15
    $this->_pdf->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->_pdf->Cell(54);
    // Título
    $this->_pdf->Cell(1,5,utf8_decode('DEPARTAMENTO DE CUNDINAMARCA - SECRETARIA DE SALUD - DIRECCIÓN SALUD PUBLICA'),'C');
    // Salto de línea
    $this->_pdf->Ln(5);
    $this->_pdf->Cell(80);
    $this->_pdf->Cell(3,5,utf8_decode('ATENCION INFANTIL - NIÑOS Y NIÑAS MENORES DE 5 AÑOS - AIEPI'),'C');
    $this->_pdf->SetFont('Times','',7.5);
$INSTITUCION=utf8_decode('SAN RAFAEL');//INSTITUCION
$MUNICIPIO=utf8_decode('FUSAGASUGA');//MUNICIPIO
$datos = $this->_modeloAiepi->getAiepi($idAiepiBuscar);

for ($i=0; $i < count($datos); $i++) { 
    ;
    $FECHA=utf8_decode($datos[$i]['FECHA_REGISTRO_GENERAL_AIEPI']);//FECHA
    /////////////////////////////-----------------------FALTAN LOS TIPOS DE USUARIO EN LA VASE DE DATOS------------////////////////////////////////////

    $C='';//TIPO DE USUARIO
    $S='';//TIPO DE USUARIO
    $V='';//TIPO DE USUARIO
    $P='';//TIPO DE USUARIO
    $E='';//TIPO DE USUARIO
    switch ($datos[$i]['TIPO_USUARIO_AIEPI']) {
        case '2':
            $C='X';//TIPO DE USUARIO
            break;
            case '3':
            $S='X';//TIPO DE USUARIO
            break;
            case '4':
            $V='X';//TIPO DE USUARIO
            break;
            case '5':
            $P='X';//TIPO DE USUARIO
            break;
            case '6':
            $E='X';//TIPO DE USUARIO
            break;
        
        default:
            # code...
            break;
    }
//ASEGURADORA
    $ASEGURADOR=utf8_decode($datos[$i]['DES_EPS']);
    $NOMBRES_Y_APELLIDOS=utf8_decode($datos[$i]['NOMBRE_MIEMBRO']);//APELLIDOS Y NOMBRE
    $RC=$datos[$i]['IDENTIFICACION_MIEMBRO_HOGAR'];//REGISTRO CIVIL
$FECHA_DE_NACIMIENTO=$datos[$i]['FECHA_NACIMIENTO'];//FECHA DE NACIMIENTO
if ($datos[$i]['SEXO']=='M') {
    $F='';//SEXO FEMENINO
$M='X';//SEXO MASCULINO
}else{
        $F='X';//SEXO FEMENINO
        $M='';//SEXO MASCULINO
}
//////////////////////////////------------------------FALTA LA PROSEDENCIA EN LA BASE DE DATOS-------------////////////////////
$RURAL='';//PROCEDENCIA
$URBANA='';//PROCEDENCIA
if ($datos[$i]['ID_ZONA']==1) {
    $URBANA='X';//PROCEDENCIA
}elseif ($datos[$i]['ID_ZONA']==2) {
   $RURAL='X';//PROCEDENCIA
}
    $DESPLAZADO='';//TIPO DE POBLACION
    $ROM_GITANO='';//TIPO DE POBLACION
    $DESMOVILIZADO='';//TIPO DE POBLACION
    $PALENQUERO='';//TIPO DE POBLACION
    $RAIZAL='';//TIPO DE POBLACION
    $INDIGENA='';//TIPO DE POBLACION
    $MENOR_ABANDONADO='';//TIPO DE POBLACION
    $HABITANTE_DE_LA_CALLE='';//TIPO DE POBLACION
    $PERSONA_EN_CONDICION_DE_DISCAPACIDAD='';//TIPO DE POBLACION
    $VICTIMA_CONFLICTO_ARMADO='';//TIPO DE POBLACION
    $AFRO='';//TIPO DE POBLACION
    $N_A='';//TIPO DE POBLACION                                                        
switch ($datos[$i]['TIPO_POBLACION_AIEPI']) {
    case '1':
         $DESPLAZADO='X';//TIPO DE POBLACION
        break;
        case '2':
        $DESMOVILIZADO='X';//TIPO DE POBLACION
        break;
        case '3':
        $RAIZAL='X';//TIPO DE POBLACION
        break;
        case '4':
        $MENOR_ABANDONADO='X';//TIPO DE POBLACION
        break;
        case '5':
         $PERSONA_EN_CONDICION_DE_DISCAPACIDAD='X';//TIPO DE POBLACION
        break;
        case '6':
        $AFRO='X';//TIPO DE POBLACION
        break;
        case '7':
        $ROM_GITANO='X';//TIPO DE POBLACION
        break;
        case '8':
        $PALENQUERO='X';//TIPO DE POBLACION
        break;
        case '9':
         $INDIGENA='X';//TIPO DE POBLACION
        break;
        case '10':
        $HABITANTE_DE_LA_CALLE='X';//TIPO DE POBLACION
        break;
        case '11':
         $VICTIMA_CONFLICTO_ARMADO='X';//TIPO DE POBLACION
        break;
        case '12':
        $N_A='X';//TIPO DE POBLACION  
        break;
    
    default:
        $DESPLAZADO='';//TIPO DE POBLACION
    $ROM_GITANO='';//TIPO DE POBLACION
    $DESMOVILIZADO='';//TIPO DE POBLACION
    $PALENQUERO='';//TIPO DE POBLACION
    $RAIZAL='';//TIPO DE POBLACION
    $INDIGENA='';//TIPO DE POBLACION
    $MENOR_ABANDONADO='';//TIPO DE POBLACION
    $HABITANTE_DE_LA_CALLE='';//TIPO DE POBLACION
    $PERSONA_EN_CONDICION_DE_DISCAPACIDAD='';//TIPO DE POBLACION
    $VICTIMA_CONFLICTO_ARMADO='';//TIPO DE POBLACION
    $AFRO='';//TIPO DE POBLACION
    $N_A='';//TIPO DE POBLACION   
        break;
}
                                                            
$NOMBRE_DEL_ACOMPAÑANTE=$datos[$i]['ACOMPAÑANTE_AIEPI'];//NOMBRE DEL ACOMPAÑANTE
switch ($datos[$i]['PARENTESCO_ACOMPAÑANTE_AIEPI']) {
         case '1':
         $PARENTEZCO='Jefe De Hogar';//PARENTEZCO
        # code...
        break;
         case '2':
         $PARENTEZCO='Conyuge';//PARENTEZCO
        # code...
        break;
         case '3':
         $PARENTEZCO='Madre';//PARENTEZCO
        # code...
        break;
         case '4':
         $PARENTEZCO='Padre';//PARENTEZCO
        # code...
        break;
         case '5':
         $PARENTEZCO='Hijo';//PARENTEZCO
        # code...
        break;
         case '6':
         $PARENTEZCO='Hermano(a)';//PARENTEZCO
        # code...
        break;
         case '7':
         $PARENTEZCO='Abuelos(as';//PARENTEZCO
        # code...
        break;
         case '8':
         $PARENTEZCO='Sobrinos';//PARENTEZCO
        # code...
        break;
         case '9':
         $PARENTEZCO='Madrasta';//PARENTEZCO
        # code...
        break;
         case '10':
         $PARENTEZCO='Padrastro';//PARENTEZCO
        # code...
        break;
         case '11':
         $PARENTEZCO='Otros Parientes';//PARENTEZCO
        # code...
        break;
         case '12':
         $PARENTEZCO='Otros Miembros No Parientes';//PARENTEZCO
        # code...
        break;
    
    default:
        $PARENTEZCO='No selecciono Parentesco';
        break;
}

$DIRECCIÓN=$datos[$i]['DIRECCION_ACOMPAÑANTE'];//DIRECCION
$TELEFONO=$datos[$i]['TELEFONO_ACOMPAÑANTE_AIEPI'];//TELEFONO
$PRIMERA_VEZ='';//EVALUACION REALIZADA
$SEGUIMIENTO='';//EVALUACION REALIZADA
$POR_ALTO_RIESGO_DE_LA_FAMILIA='';//EVALUACION REALIZADA
$ENFERMEDAD_DE_ALTO_RIESGO='';//EVALUACION REALIZADA
switch ($datos[$i]['EVALUACION_REALIZADA_AIEPI']) {
    case '1':
       $PRIMERA_VEZ='X';
        break;
         case '2':
       $SEGUIMIENTO='X';
        break;
         case '3':
        $POR_ALTO_RIESGO_DE_LA_FAMILIA='X';
        break;
         case '4':
        $ENFERMEDAD_DE_ALTO_RIESGO='X';
        break;
    
    default:
        
        break;
}
$datosPreguntaRespuesta=$this->_modeloAiepi->getPreguntasRespuesta("SELECT * FROM `aiepi`
 INNER JOIN general_aiepi on general_aiepi.ID_GENERAL_AIEPI=aiepi.GENERAL_AIEPI_idGENERAL_AIEPI 
 WHERE PREGUNTAS_ID_PREGUNTA=1 AND MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR='".$idAiepiBuscar."'");
//EVALUAR Y COMPLETAR LA INFORMACIÓN MARCANDO CON UNA X TODOS LOS SIGNOS QUE PRESENTE EL NIÑO
$NO_PUEDE_BEBER_PECHO='';//NO_PUEDE_BEBER_PECHO
$NINGUNA_DE_LAS_ANTERIORES='';//NINGUNA_DE_LAS_ANTERIORES
$LETARGICO='';//LETARGICO
$INCONCIENTE='';//INCONCIENTE
$VOMITA_TODO='';//VOMITA_TODO
$CONVULCIONES='';//CONVULCIONES
for ($j=0; $j < count($datosPreguntaRespuesta); $j++) { 
    switch ($datosPreguntaRespuesta[$j]['PREGUNTA_RESPUESTA_SC_ID_PREGUNTA_RESPUESTA_SC']) {
        case '1':
           $NO_PUEDE_BEBER_PECHO='X';//NO_PUEDE_BEBER_PECHO
            break;
            case '2':
           $LETARGICO='X';//LETARGICO
            break;
            case '3':
           $INCONCIENTE='X';//INCONCIENTE
            break;
            case '4':
          $VOMITA_TODO='X';//VOMITA_TODO
            break;
            case '5':
           $CONVULCIONES='X';//CONVULCIONES
            break;
            case '6':
           $NINGUNA_DE_LAS_ANTERIORES='X';//NINGUNA_DE_LAS_ANTERIORES
            break;
        
        default:
            # code...
            break;
    }
}
$SI_PROBLEMAS_DE_SALUD_ORAL='';//SI_PROBLEMAS_DE_SALUD_ORAL
$NO_PROBLEMAS_DE_SALUD_ORAL='';//NO_PROBLEMAS_DE_SALUD_ORAL
if ($datos[$i]['PROBLEMA_SALUD_BUCAL']=='1') {
   $SI_PROBLEMAS_DE_SALUD_ORAL='X';//NO_PROBLEMAS_DE_SALUD_ORAL
}
if ($datos[$i]['PROBLEMA_SALUD_BUCAL']=='0') {
     $NO_PROBLEMAS_DE_SALUD_ORAL='X';//NO_PROBLEMAS_DE_SALUD_ORAL
}


$N_DE_VALORACIONES_ODONTOLOGICAS_EN_EL_AÑO=$datos[$i]['NUMERO_VALORACIONES_ODONTO_365'];//N_DE_VALORACIONES_ODONTOLOGICAS_EN_EL

$SI_HA_TENIDO_ALGÚN_GOLPE_EN_LA_BOCA='';//HA_TENIDO_ALGÚN_GOLPE_EN_LA_BOCA
$NO_HA_TENIDO_ALGÚN_GOLPE_EN_LA_BOCA='';
if ($datos[$i]['ALGUN_GOLPE_BOCA']=='1') {
    $SI_HA_TENIDO_ALGÚN_GOLPE_EN_LA_BOCA='X';//HA_TENIDO_ALGÚN_GOLPE_EN_LA_BOCA
}elseif ($datos[$i]['ALGUN_GOLPE_BOCA']=='0') {
    $NO_HA_TENIDO_ALGÚN_GOLPE_EN_LA_BOCA='X';//HA_TENIDO_ALGÚN_GOLPE_EN_LA_BOCA
}
$SI_DURANTE_LA_NOCHE_DUERME_SIN_CEPILLARSE_LOS_DIENTES='';//DURANTE_LA_NOCHE_DUERME_SIN_CEPILLARSE_LOS_DIENTES
$NO_DURANTE_LA_NOCHE_DUERME_SIN_CEPILLARSE_LOS_DIENTES='';
//DURANTE_LA_NOCHE_DUERME_SIN_CEPILLARSE_LOS_DIENTE
if ($datos[$i]['NOCHE_DUERME_SINCEPILLA_BOCA']=='1') {
    $SI_DURANTE_LA_NOCHE_DUERME_SIN_CEPILLARSE_LOS_DIENTES='X';//DURANTE_LA_NOCHE_DUERME_SIN_CEPILLARSE_LOS_DIENTES
}elseif ($datos[$i]['NOCHE_DUERME_SINCEPILLA_BOCA']=='0') {
    $NO_DURANTE_LA_NOCHE_DUERME_SIN_CEPILLARSE_LOS_DIENTES='X';
}

$SI_LE_SANGRA_LA_ENCIA_CUANDO_SE_CEPILLA='';//LE_SANGRA_LA_ENCIA_CUANDO_SE_CEPILLA
$NO_LE_SANGRA_LA_ENCIA_CUANDO_SE_CEPILLA='';//LE_SANGRA_LA_ENCIA_CUANDO_SE_CEPILLA
if ($datos[$i]['SANGRA_ENCIA_CEPILLA']=='1') {
    $SI_LE_SANGRA_LA_ENCIA_CUANDO_SE_CEPILLA='X';//LE_SANGRA_LA_ENCIA_CUANDO_SE_CEPILLA
}elseif ($datos[$i]['SANGRA_ENCIA_CEPILLA']=='0') {
    $NO_LE_SANGRA_LA_ENCIA_CUANDO_SE_CEPILLA='X';//LE_SANGRA_LA_ENCIA_CUANDO_SE_CEPILLA
}
$CUANTAS_VECES_HACE_HIGIANE_ORAL_AL_DIA=$datos[$i]['NUMERO_VECESHIGIENE_ORAL'];//CUANTAS_VECES_HACE_HIGIANE_ORAL_AL_DIA
//LE_SUPERVISA_EL_CEPILLADO_DE_DIENTES
$SI_LE_SUPERVISA_EL_CEPILLADO_DE_DIENTES='';//LE_SUPERVISA_EL_CEPILLADO_DE_DIENTES
$NO_LE_SUPERVISA_EL_CEPILLADO_DE_DIENTES='';
if ($datos[$i]['SUPERVISAN_CEPILLADO_DIENTES']=='1') {
$SI_LE_SUPERVISA_EL_CEPILLADO_DE_DIENTES='X';//LE_SUPERVISA_EL_CEPILLADO_DE_DIENTES
}elseif ($datos[$i]['SUPERVISAN_CEPILLADO_DIENTES']=='0') {
    $NO_LE_SUPERVISA_EL_CEPILLADO_DE_DIENTES='X';
}

$CON_QUE_HACE_HIGIENE_ORAL=$datos[$i]['HIGIENIZACION_HORAL'];//CON_QUE_HACE_HIGIENE_ORAL
$SI_TIENE_EL_NIÑO_O_NIÑA_TOS='';
$NO_TIENE_EL_NIÑO_O_NIÑA_TOS='';
if ($datos[$i]['TIENE_TOS']=='1') {
    $SI_TIENE_EL_NIÑO_O_NIÑA_TOS='X';
}elseif ($datos[$i]['TIENE_TOS']=='0') {
    $NO_TIENE_EL_NIÑO_O_NIÑA_TOS='X';
}
$N_DE_DIAS_QUE_LLEVA_CON_TOS=$datos[$i]['NUMERO_DIAS_CONTOS'];
$SI_TIENE_TIRAJE_SUCOTAL='';
$NO_TIENE_TIRAJE_SUCOTAL='';
if ($datos[$i]['TIRAJE_COSTAL']=='1') {
$SI_TIENE_TIRAJE_SUCOTAL='X';
}elseif ($datos[$i]['TIRAJE_COSTAL']=='0') {
$NO_TIENE_TIRAJE_SUCOTAL='X';
}
$SI_TIENE_EL_NIÑO_O_NIÑA_DIFICULTAD_PARA_RESPIRAR='';
$NO_TIENE_EL_NIÑO_O_NIÑA_DIFICULTAD_PARA_RESPIRAR='';
if ($datos[$i]['DIFICUALTAD_RESPIRAR']=='1') {
    $SI_TIENE_EL_NIÑO_O_NIÑA_DIFICULTAD_PARA_RESPIRAR='X';
}elseif ($datos[$i]['DIFICUALTAD_RESPIRAR']=='0') {
  $NO_TIENE_EL_NIÑO_O_NIÑA_DIFICULTAD_PARA_RESPIRAR='X';
}
$N_DE_DIAS_CON_DIFICULTAD_PARA_RESPIRAR=$datos[$i]['NUMERO_DIAS_DIFICULTAD_RESPIRATORIA'];
$SI_TIENE_ESTRIDOR='';
$NO_TIENE_ESTRIDOR='';
if ($datos[$i]['ESTRIDOR']=='1') {
$SI_TIENE_ESTRIDOR='X';
}elseif ($datos[$i]['ESTRIDOR']=='0') {
$NO_TIENE_ESTRIDOR='X';
}
$N_DE_RESPIRACIONES_POR_MINUTO=$datos[$i]['NUMERO_RESPIRACIONES_MINUTO'];
$SI_TIENE_RESPIRACION_RAPIDA='';
$NO_TIENE_RESPIRACION_RAPIDA='';
if ($datos[$i]['RESPIRACION_RAPIDA']=='1') {
   $SI_TIENE_RESPIRACION_RAPIDA='X';
}elseif ($datos[$i]['RESPIRACION_RAPIDA']=='0') {
    $NO_TIENE_RESPIRACION_RAPIDA='X';
}
$SI_TIENE_SIBILANCIAS='';
$NO_TIENE_SIBILANCIAS='';
if ($datos[$i]['SIBILANCIAS']=='1') {
  $SI_TIENE_SIBILANCIAS='X';
}elseif ($datos[$i]['SIBILANCIAS']=='0') {
   $NO_TIENE_SIBILANCIAS='X';
}
$SI_EL_NIÑO_NIÑA_HA_ESTADO_EN_CONTACTO_CON_PERSONAS_CON_TB='';
$NO_EL_NIÑO_NIÑA_HA_ESTADO_EN_CONTACTO_CON_PERSONAS_CON_TB='';
if ($datos[$i]['CONTACTO_PERSONAS_TB']=='1') {
   $SI_EL_NIÑO_NIÑA_HA_ESTADO_EN_CONTACTO_CON_PERSONAS_CON_TB='X';
}elseif ($datos[$i]['CONTACTO_PERSONAS_TB']=='0') {
   $NO_EL_NIÑO_NIÑA_HA_ESTADO_EN_CONTACTO_CON_PERSONAS_CON_TB='X';
}
$SI_EL_NIÑO_NIÑA_HA_ESTADO_EN_CONTACTO_CON_PERSONAS_SINTOMATICAS_RESPIRATORIAS='';
$NO_EL_NIÑO_NIÑA_HA_ESTADO_EN_CONTACTO_CON_PERSONAS_SINTOMATICAS_RESPIRATORIAS='';
if ($datos[$i]['ENCONTACTO_PERSONAS_SINTOMATICAS']=='1') {
   $SI_EL_NIÑO_NIÑA_HA_ESTADO_EN_CONTACTO_CON_PERSONAS_SINTOMATICAS_RESPIRATORIAS='X';
}elseif ($datos[$i]['ENCONTACTO_PERSONAS_SINTOMATICAS']=='0') {
    $NO_EL_NIÑO_NIÑA_HA_ESTADO_EN_CONTACTO_CON_PERSONAS_SINTOMATICAS_RESPIRATORIAS='X';
}
$SI_TOS_PERSISTENTE_POR_MAS_DE_21_DIAS='';
$NO_TOS_PERSISTENTE_POR_MAS_DE_21_DIAS='';
if ($datos[$i]['PERSOSTENTE_TOS_21_DIAS']=='1') {
    $SI_TOS_PERSISTENTE_POR_MAS_DE_21_DIAS='X';
}elseif ($datos[$i]['PERSOSTENTE_TOS_21_DIAS']=='0') {
   $NO_TOS_PERSISTENTE_POR_MAS_DE_21_DIAS='X';
}
$SI_PERDIDA_O_GANANCIA_DE_PESO_EN_LOS_ULTIMOS_TRES_MESES='';
$NO_PERDIDA_O_GANANCIA_DE_PESO_EN_LOS_ULTIMOS_TRES_MESES='';
if ($datos[$i]['PERDIDA_GNANCIA_PESO_3MESES']=='1') {
    $SI_PERDIDA_O_GANANCIA_DE_PESO_EN_LOS_ULTIMOS_TRES_MESES='X';
}elseif ($datos[$i]['PERDIDA_GNANCIA_PESO_3MESES']=='0') {
    $NO_PERDIDA_O_GANANCIA_DE_PESO_EN_LOS_ULTIMOS_TRES_MESES='X';
}
$SI_TIENE_EL_NIÑO_DIARREA='';
$NO_TIENE_EL_NIÑO_DIARREA='';
if ($datos[$i]['DIARREA']==1) {
    $SI_TIENE_EL_NIÑO_DIARREA='X';
}elseif ($datos[$i]['DIARREA']=='0') {
   $NO_TIENE_EL_NIÑO_DIARREA='X';
}
$N_DE_DIAS_QUE_EL_NIÑ_TIENE_DIARREA=$datos[$i]['NUMERO_DIAS_DIARREA'];
$SI_FONTANELA_O_MOLLEJA_HUNDIDA='';
$NO_FONTANELA_O_MOLLEJA_HUNDIDA='';
if ($datos[$i]['FONTANELA_MOLLEJA_HUNDIDA']=='1') {
   $SI_FONTANELA_O_MOLLEJA_HUNDIDA='X';
}elseif ($datos[$i]['FONTANELA_MOLLEJA_HUNDIDA']=='0') {
    $NO_FONTANELA_O_MOLLEJA_HUNDIDA='X';
}
$SI_INTRANQUILO_O_IRRITABLE='';
$NO_INTRANQUILO_O_IRRITABLE='';
if ($datos[$i]['INTRANQUILO_IRRITABLE']=='1') {
   $SI_INTRANQUILO_O_IRRITABLE='X';
}elseif ($datos[$i]['INTRANQUILO_IRRITABLE']=='0') {
    $NO_INTRANQUILO_O_IRRITABLE='X';
}
$SI_HAY_SANGRE_EN_LAS_HECES='';
$NO_HAY_SANGRE_EN_LAS_HECES='';
if ($datos[$i]['SANGRE_HECES']=='1') {
 $SI_HAY_SANGRE_EN_LAS_HECES='X';
}elseif ($datos[$i]['SANGRE_HECES']=='0') {
    $NO_HAY_SANGRE_EN_LAS_HECES='X';
}

$SI_BOCA_SECA_O_MUCHA_SED='';
$NO_BOCA_SECA_O_MUCHA_SED='';
if ($datos[$i]['BOCA_SECA_SED']=='1') {
$SI_BOCA_SECA_O_MUCHA_SED='X';
}elseif ($datos[$i]['BOCA_SECA_SED']=='0') {
$NO_BOCA_SECA_O_MUCHA_SED='X';
}
$SI_OJOS_HUNDIDOS='';
$NO_OJOS_HUNDIDOS='';
if ($datos[$i]['OJOS_HUNDIDOS']=='1') {
   $SI_OJOS_HUNDIDOS='X';
}elseif ($datos[$i]['OJOS_HUNDIDOS']=='0') {
   $NO_OJOS_HUNDIDOS='X';
}
$SI_PLIEGUE_CUTÁNEO_MUY_LENTO_MAYOR_2_SEG='';
$NO_PLIEGUE_CUTÁNEO_MUY_LENTO_MAYOR_2_SEG='';
if ($datos[$i]['PLIEGUE_CUTANEO_2S_MAYOR']=='1') {
  $SI_PLIEGUE_CUTÁNEO_MUY_LENTO_MAYOR_2_SEG='X';
}elseif ($datos[$i]['PLIEGUE_CUTANEO_2S_MAYOR']=='0') {
   $NO_PLIEGUE_CUTÁNEO_MUY_LENTO_MAYOR_2_SEG='X';
}
$SI_PLIEGUE_CUTÁNEO_LENTO_2_SEG_O_MENOR='';
$NO_PLIEGUE_CUTÁNEO_LENTO_2_SEG_O_MENOR='';
if ($datos[$i]['PLIEGUE_CUTANEO_2S_MENOR']=='1') {
   $SI_PLIEGUE_CUTÁNEO_LENTO_2_SEG_O_MENOR='X';
}elseif ($datos[$i]['PLIEGUE_CUTANEO_2S_MENOR']=='0') {
    $NO_PLIEGUE_CUTÁNEO_LENTO_2_SEG_O_MENOR='X';
}
$SI_TIENE_EL_NIÑO_O_NIÑA_FIEBRE='';
$NO_TIENE_EL_NIÑO_O_NIÑA_FIEBRE='';
if ($datos[$i]['FIEBRE']=='1') {
   $SI_TIENE_EL_NIÑO_O_NIÑA_FIEBRE='X';
}elseif ($datos[$i]['FIEBRE']=='0') {
   $NO_TIENE_EL_NIÑO_O_NIÑA_FIEBRE='X';
}
$N_DE_DIAS_QUE_EL_NIÑO_TIENE_FIEBRE=$datos[$i]['NUMERO_DIAS_FIEBRE'];
$SI_FIEBRE_DE_MAS_DE_5_DÍAS_TODOS_LOS_DÍAS='';
$NO_FIEBRE_DE_MAS_DE_5_DÍAS_TODOS_LOS_DÍAS='';
if ($datos[$i]['FIEBRE_MAS_5DIAS']=='1') {
    $SI_FIEBRE_DE_MAS_DE_5_DÍAS_TODOS_LOS_DÍAS='X';
}elseif ($datos[$i]['FIEBRE_MAS_5DIAS']=='0') {
   $NO_FIEBRE_DE_MAS_DE_5_DÍAS_TODOS_LOS_DÍAS='X';
}
$SI_RIGIDEZ_DE_NUCA='';
$NO_RIGIDEZ_DE_NUCA='';
if ($datos[$i]['RIGIDEZ_NUCA']=='1') {
    $SI_RIGIDEZ_DE_NUCA='X';
}elseif ($datos[$i]['RIGIDEZ_NUCA']=='0') {
    $NO_RIGIDEZ_DE_NUCA='X';
}
$SI_FIEBRE_MAYOR_DE_39='';
$NO_FIEBRE_MAYOR_DE_39='';
if ($datos[$i]['FIEBRE_MAYOR_39']=='1') {
    $SI_FIEBRE_MAYOR_DE_39='X';
}elseif ($datos[$i]['FIEBRE_MAYOR_39']=='0') {
   $NO_FIEBRE_MAYOR_DE_39='X';
}
$SI_ASPECTO_TOXICO='';
$NO_ASPECTO_TOXICO='';
if ($datos[$i]['ASPECTO_TOXICO']=='1') {
    $SI_ASPECTO_TOXICO='X';
}elseif ($datos[$i]['ASPECTO_TOXICO']=='0') {
    $NO_ASPECTO_TOXICO='X';
}
$SI_VIVE_O_VISITO_ZONA_DE_RIESGO_DE_MALARIA='';
$NO_VIVE_O_VISITO_ZONA_DE_RIESGO_DE_MALARIA='';
if ($datos[$i]['VIVE_ZONDA_RIESGO_MALARIA']=='1') {
    $SI_VIVE_O_VISITO_ZONA_DE_RIESGO_DE_MALARIA='X';
}elseif ($datos[$i]['VIVE_ZONDA_RIESGO_MALARIA']=='0') {
    $NO_VIVE_O_VISITO_ZONA_DE_RIESGO_DE_MALARIA='X';
}
$SI_MANIFESTACIÓN_DE_SANGRADO='';
$NO_MANIFESTACIÓN_DE_SANGRADO='';
if ($datos[$i]['MANIFESTACION_SANGRADO']=='1') {
   $SI_MANIFESTACIÓN_DE_SANGRADO='X';
}elseif ($datos[$i]['MANIFESTACION_SANGRADO']=='0') {
  $NO_MANIFESTACIÓN_DE_SANGRADO='X';
}
$SI_TOS='';
$NO_TOS='';
if ($datos[$i]['FIEBRE_TOS']=='1') {
    $SI_TOS='X';
}elseif ($datos[$i]['FIEBRE_TOS']=='0') {
    $NO_TOS='X';
}
$SI_DOLOR_ABDOMINAL_CONTINUO_INTENSO='';
$NO_DOLOR_ABDOMINAL_CONTINUO_INTENSO='';
if ($datos[$i]['DOLOR_ABDOMINAL_CONTINUO']=='1') {
    $SI_DOLOR_ABDOMINAL_CONTINUO_INTENSO='X';
}elseif ($datos[$i]['DOLOR_ABDOMINAL_CONTINUO']=='0') {
    $NO_DOLOR_ABDOMINAL_CONTINUO_INTENSO='X';
}
$SI_VIVE_O_VISITO_ZONA_DE_RIESGO_DE_DENGUE='';
$NO_VIVE_O_VISITO_ZONA_DE_RIESGO_DE_DENGUE='';
if ($datos[$i]['VIVE_ZONDA_RIESGO_DENGUE']=='1') {
 $SI_VIVE_O_VISITO_ZONA_DE_RIESGO_DE_DENGUE='X';
}elseif ($datos[$i]['VIVE_ZONDA_RIESGO_DENGUE']=='0') {
  $NO_VIVE_O_VISITO_ZONA_DE_RIESGO_DE_DENGUE='X';
}
$SI_PIEL_HÚMEDA_Y_FRIA='';
$NO_PIEL_HÚMEDA_Y_FRIA='';
if ($datos[$i]['PIEL_HUMEDA_FRIA']=='1') {
   $SI_PIEL_HÚMEDA_Y_FRIA='X';
}elseif ($datos[$i]['PIEL_HUMEDA_FRIA']=='0') {
   $NO_PIEL_HÚMEDA_Y_FRIA='X';
}
$SI_CORIZA='';
$NO_CORIZA='';
if ($datos[$i]['CORIZA']=='1') {
    $SI_CORIZA='X';
}elseif ($datos[$i]['CORIZA']=='0') {
    $NO_CORIZA='X';
}

$SI_PULSO_RÁPIDO_Y_DÉBIL='';
$NO_PULSO_RÁPIDO_Y_DÉBIL='';
if ($datos[$i]['PULSO_RAPIDO_DEBIL']=='1') {
    $SI_PULSO_RÁPIDO_Y_DÉBIL='X';
}elseif ($datos[$i]['PULSO_RAPIDO_DEBIL']=='0') {
   $NO_PULSO_RÁPIDO_Y_DÉBIL='X';
}
$ZONA_R='';
$ZONA_U='';
if ($datos[$i]['ZONA_RU']=='1') {
  $ZONA_U='X';
}elseif ($datos[$i]['ZONA_RU']==2) {
    $ZONA_R='X';
}
$SI_INQUIETO_O_IRRITABLE='';
$NO_INQUIETO_O_IRRITABLE='';
if ($datos[$i]['INQUIETO_IRRITABLE']=='1') {
    $SI_INQUIETO_O_IRRITABLE='X';
}elseif ($datos[$i]['INQUIETO_IRRITABLE']=='0') {
   $NO_INQUIETO_O_IRRITABLE='X';
}
$SI_OJOS_ROJOS='';
$NO_OJOS_ROJOS='';
if ($datos[$i]['OJOS_ROJOS']=='1') {
    $SI_OJOS_ROJOS='X';
}elseif ($datos[$i]['OJOS_ROJOS']=='0') {
    $NO_OJOS_ROJOS='X';
}
$SI_ERUPCIÓN_CUTÁNEA_Y_GENERALIZADA='';
$NO_ERUPCIÓN_CUTÁNEA_Y_GENERALIZADA='';
if ($datos[$i]['ERUPCION_CUTANIA']=='1') {
    $SI_ERUPCIÓN_CUTÁNEA_Y_GENERALIZADA='X';
}elseif ($datos[$i]['ERUPCION_CUTANIA']=='0') {
  $NO_ERUPCIÓN_CUTÁNEA_Y_GENERALIZADA='X';
}
$SI_FIEBRE_POR_MAS_DE_14_DÍAS_Y_O_SUDORACIÓN='';
$NO_FIEBRE_POR_MAS_DE_14_DÍAS_Y_O_SUDORACIÓN='';
if ($datos[$i]['FIEBRE_SUDORACION_14DIAS']=='1') {
   $SI_FIEBRE_POR_MAS_DE_14_DÍAS_Y_O_SUDORACIÓN='X';
}elseif ($datos[$i]['FIEBRE_SUDORACION_14DIAS']=='0') {
    $NO_FIEBRE_POR_MAS_DE_14_DÍAS_Y_O_SUDORACIÓN='X';
}
$SI_DOLOR_DE_CABEZA_RECIENTE_QUE_AUMENTA='';
$NO_DOLOR_DE_CABEZA_RECIENTE_QUE_AUMENTA='';
if ($datos[$i]['DOLOR_CABEZA_RECIENTE_AUMENTA']=='1') {
   $SI_DOLOR_DE_CABEZA_RECIENTE_QUE_AUMENTA='X';
}elseif ($datos[$i]['DOLOR_CABEZA_RECIENTE_AUMENTA']=='0') {
   $NO_DOLOR_DE_CABEZA_RECIENTE_QUE_AUMENTA='X';
}
$SI_EL_DOLOR_DE_CABEZA_SE_ACOMPAÑA_DE_OTROS_SINTOMA_COMO_VOMITO='';
$NO_EL_DOLOR_DE_CABEZA_SE_ACOMPAÑA_DE_OTROS_SINTOMA_COMO_VOMITO='';
if ($datos[$i]['DOLOR_CABEZA_OTRO_VOMITO']=='1') {
   $SI_EL_DOLOR_DE_CABEZA_SE_ACOMPAÑA_DE_OTROS_SINTOMA_COMO_VOMITO='X';
}elseif ($datos[$i]['DOLOR_CABEZA_OTRO_VOMITO']=='0') {
   $NO_EL_DOLOR_DE_CABEZA_SE_ACOMPAÑA_DE_OTROS_SINTOMA_COMO_VOMITO='X';
}
$SI_EL_DOLOR_DE_HUESOS_HA_IDO_EN_AUMENTO='';
$NO_EL_DOLOR_DE_HUESOS_HA_IDO_EN_AUMENTO='';
if ($datos[$i]['DOLOR_HUESOS_AUMENTA']=='1') {
   $SI_EL_DOLOR_DE_HUESOS_HA_IDO_EN_AUMENTO='X';
}elseif ($datos[$i]['DOLOR_HUESOS_AUMENTA']=='0') {
    $NO_EL_DOLOR_DE_HUESOS_HA_IDO_EN_AUMENTO='X';
}
$SI_EL_DOLOR_DE_CABEZA_DESPIERTA_AL_NIÑ='';
$NO_EL_DOLOR_DE_CABEZA_DESPIERTA_AL_NIÑ='';
if ($datos[$i]['DOLOR_CABEZA_DESPIERTA']=='1') {
$SI_EL_DOLOR_DE_CABEZA_DESPIERTA_AL_NIÑ='X';
}elseif ($datos[$i]['DOLOR_CABEZA_DESPIERTA']=='0') {
$NO_EL_DOLOR_DE_CABEZA_DESPIERTA_AL_NIÑ='X';
}
$SI_HA_TENIDO_DOLOR_DE_HUESOS_EN_EL_ULTIMO_MES='';
$NO_HA_TENIDO_DOLOR_DE_HUESOS_EN_EL_ULTIMO_MES='';
if ($datos[$i]['DOLOR_HUESOS']=='1') {
    $SI_HA_TENIDO_DOLOR_DE_HUESOS_EN_EL_ULTIMO_MES='X';
}elseif ($datos[$i]['DOLOR_HUESOS']=='0') {
    $NO_HA_TENIDO_DOLOR_DE_HUESOS_EN_EL_ULTIMO_MES='X';
}
$SI_EN_LOS_ULTIMOS_3_MESES_A_TENIDO_CAMBIOS_COMO_FATIGA_PERDIDA_DE_PETITO_O_PESO='';
$NO_EN_LOS_ULTIMOS_3_MESES_A_TENIDO_CAMBIOS_COMO_FATIGA_PERDIDA_DE_PETITO_O_PESO='';
if ($datos[$i]['CAMBIOS_FATIGA_APETITO_PESO']=='1') {
   $SI_EN_LOS_ULTIMOS_3_MESES_A_TENIDO_CAMBIOS_COMO_FATIGA_PERDIDA_DE_PETITO_O_PESO='X';
}elseif ($datos[$i]['CAMBIOS_FATIGA_APETITO_PESO']=='0') {
   $NO_EN_LOS_ULTIMOS_3_MESES_A_TENIDO_CAMBIOS_COMO_FATIGA_PERDIDA_DE_PETITO_O_PESO='X';
}
$N_DE_DIAS_QUE_EL_NIÑ_TIENE_DOLOR_DE_CABEZA=$datos[$i]['NUMERO_DIAS_DOLOR_CABEZA'];
$SI_DOLOR_DE_HUESOS_INTERRUMPE_LAS_ACTIVIDADES_DEL_NIÑ='';
$NO_DOLOR_DE_HUESOS_INTERRUMPE_LAS_ACTIVIDADES_DEL_NIÑ='';
if ($datos[$i]['DOLOR_HUESOS_INTERRUMPE_ACTIVIDAD']=='1') {
   $SI_DOLOR_DE_HUESOS_INTERRUMPE_LAS_ACTIVIDADES_DEL_NIÑ='X';
}elseif ($datos[$i]['DOLOR_HUESOS_INTERRUMPE_ACTIVIDAD']=='0') {
   $NO_DOLOR_DE_HUESOS_INTERRUMPE_LAS_ACTIVIDADES_DEL_NIÑ='X';
}
$SI_EL_NIÑO_O_NIÑA_TIENE_PROBLEMAS_DE_OIDO='';
$NO_EL_NIÑO_O_NIÑA_TIENE_PROBLEMAS_DE_OIDO='';
if ($datos[$i]['OIDO_PROBLEMAS']=='1') {
$SI_EL_NIÑO_O_NIÑA_TIENE_PROBLEMAS_DE_OIDO='X';
}elseif ($datos[$i]['OIDO_PROBLEMAS']=='0') {
$NO_EL_NIÑO_O_NIÑA_TIENE_PROBLEMAS_DE_OIDO='X';
}
$N_DE_EPISODIOS_PREVIOS=$datos[$i]['NUMERO_EPISODIOS_PREVIOS'];
$SI_TIENE_SUPURACIÓN_DE_OÍDO='';
$NO_TIENE_SUPURACIÓN_DE_OÍDO='';
if ($datos[$i]['SUPURACION_OIDO']=='1') {
$SI_TIENE_SUPURACIÓN_DE_OÍDO='X';
}elseif ($datos[$i]['SUPURACION_OIDO']=='0') {
$NO_TIENE_SUPURACIÓN_DE_OÍDO='X';
}
$HACE_CUANTOS_DIAS=$datos[$i]['NUMERO_DIAS_SUPURACION_OIDO'];
$SI_TUMEFACCIÓN_DOLOR_ATRÁS_DE_LA_OREJA='';
$NO_TUMEFACCIÓN_DOLOR_ATRÁS_DE_LA_OREJA='';
if ($datos[$i]['TUMEFACCION_OREJA']=='1') {
$SI_TUMEFACCIÓN_DOLOR_ATRÁS_DE_LA_OREJA='X';
}elseif ($datos[$i]['TUMEFACCION_OREJA']=='0') {
    $NO_TUMEFACCIÓN_DOLOR_ATRÁS_DE_LA_OREJA='X';
}
$SI_EL_NIÑO_O_NIÑA_TIENE_DESNUTRICIÓN_Y_O_ANEMIA='';
$NO_EL_NIÑO_O_NIÑA_TIENE_DESNUTRICIÓN_Y_O_ANEMIA='';
if ($datos[$i]['DESNUTRICION_ANEMIA']=='1') {
   $SI_EL_NIÑO_O_NIÑA_TIENE_DESNUTRICIÓN_Y_O_ANEMIA='X';
}elseif ($datos[$i]['DESNUTRICION_ANEMIA']=='0') {
   $NO_EL_NIÑO_O_NIÑA_TIENE_DESNUTRICIÓN_Y_O_ANEMIA='X';
}
$RETRASO_EN_EL_CRECIMIENTO_MUY_INTENSO='';
$RETRASO_EN_EL_CRECIMIENTO_MENOS_MARCADO='';
if ($datos[$i]['RETRA_CRECIMIENTO']=='1') {
   $RETRASO_EN_EL_CRECIMIENTO_MUY_INTENSO='X';
}elseif ($datos[$i]['RETRA_CRECIMIENTO']=='0') {
    $RETRASO_EN_EL_CRECIMIENTO_MENOS_MARCADO='X';
}
   $PERDIDA_DE_TEJIDO_MUSCULAR_MUY_MARCADA='';
      $PERDIDA_DE_TEJIDO_MUSCULAR_MARCADA='';
if ($datos[$i]['PERDIDA_TEJIDO_MUSCULAR']=='1') {
    $PERDIDA_DE_TEJIDO_MUSCULAR_MUY_MARCADA='X';
}elseif ($datos[$i]['PERDIDA_TEJIDO_MUSCULAR']=='0') {
   $PERDIDA_DE_TEJIDO_MUSCULAR_MARCADA='X';
}

$TEJIDO_ADIPOSO_AUSENTE='';
$TEJIDO_ADIPOSO_POCO_DISMINUIDO='';
if ($datos[$i]['TEJIDO_ADIPOSO']=='1') {
   $TEJIDO_ADIPOSO_AUSENTE='X';
}elseif ($datos[$i]['TEJIDO_ADIPOSO']=='0') {
    $TEJIDO_ADIPOSO_POCO_DISMINUIDO='X';
}
$SI_EDEMA='';
$NO_EDEMA='';
if ($datos[$i]['EDEMA']=='1') {
    $SI_EDEMA='X';
}elseif ($datos[$i]['EDEMA']=='0') {
    $NO_EDEMA='X';
}
$VALORACION_DE_LA_CARA_CARA_DE_VIEJITO='';
$VALORACION_DE_LA_CARA_CARA_DE_LUNA_LLENA='';

if ($datos[$i]['VALORACION_CARA']=='1') {
   $VALORACION_DE_LA_CARA_CARA_DE_VIEJITO='X';
}elseif ($datos[$i]['VALORACION_CARA']=='0') {
    $VALORACION_DE_LA_CARA_CARA_DE_LUNA_LLENA='X';
    
}
$EL_SISTEMA_ÓSEO_ROSARIO_COSTAL_VISIBLE='';
            $EL_SISTEMA_ÓSEO_PIERNAS_DE_SABLE='';
$datosPreguntaRespuestaSistemaOseo=$this->_modeloAiepi->getPreguntasRespuesta("SELECT * FROM `aiepi` 
 INNER JOIN general_aiepi on general_aiepi.ID_GENERAL_AIEPI=aiepi.GENERAL_AIEPI_idGENERAL_AIEPI
    WHERE PREGUNTAS_ID_PREGUNTA=152 AND MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR='".$idAiepiBuscar."'");
for ($y=0; $y < count($datosPreguntaRespuestaSistemaOseo); $y++) { 
    switch ($datosPreguntaRespuestaSistemaOseo[$y]['PREGUNTA_RESPUESTA_SC_ID_PREGUNTA_RESPUESTA_SC']) {
        case '557':
            $EL_SISTEMA_ÓSEO_ROSARIO_COSTAL_VISIBLE='X';
            break;
        case '558':
           $EL_SISTEMA_ÓSEO_PIERNAS_DE_SABLE='X';
            break;
        default:
            $EL_SISTEMA_ÓSEO_ROSARIO_COSTAL_VISIBLE='';
            $EL_SISTEMA_ÓSEO_PIERNAS_DE_SABLE='';
            break;
    }
}
$COMPORTAMIENTO_MIRADA_DE_ANGUSTIA='';
            $COMPORTAMIENTO_LLANTO_APATIA='';
$datosPreguntaRespuestaComportamiento=$this->_modeloAiepi->getPreguntasRespuesta("SELECT * FROM `aiepi` 
 INNER JOIN general_aiepi on general_aiepi.ID_GENERAL_AIEPI=aiepi.GENERAL_AIEPI_idGENERAL_AIEPI
    WHERE PREGUNTAS_ID_PREGUNTA=153 AND MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR='".$idAiepiBuscar."'");
for ($y=0; $y < count($datosPreguntaRespuestaComportamiento); $y++) { 
    switch ($datosPreguntaRespuestaComportamiento[$y]['PREGUNTA_RESPUESTA_SC_ID_PREGUNTA_RESPUESTA_SC']) {
        case '559':
            $COMPORTAMIENTO_MIRADA_DE_ANGUSTIA='X';
            break;
        case '560':
            $COMPORTAMIENTO_LLANTO_APATIA='X';
            break;
        default:
            $COMPORTAMIENTO_MIRADA_DE_ANGUSTIA='';
            $COMPORTAMIENTO_LLANTO_APATIA='';
            break;
    }
}
$APETITO_DISMINUIDO='';
$APETITO_AUMENTADO='';
if ($datos[$i]['APETITO']=='1') {
    $APETITO_DISMINUIDO='X';
}elseif ($datos[$i]['APETITO']=='0') {
   $APETITO_AUMENTADO='X';
}
$CABELLO_ESCASO='';
$CABELLO_DEBIL='';
if ($datos[$i]['CABELLO']=='1') {
    $CABELLO_ESCASO='X';
}elseif ($datos[$i]['CABELLO']=='0') {
    $CABELLO_DEBIL='X';
}
            $COLOR_ROJO='';
            $COLOR_NARANJA='';
            $COLOR_AMARILLO='';
            $COLOR_VERDE='';
$datosPreguntaRespuestaComportamiento=$this->_modeloAiepi->getPreguntasRespuesta("SELECT * FROM `aiepi` 
 INNER JOIN general_aiepi on general_aiepi.ID_GENERAL_AIEPI=aiepi.GENERAL_AIEPI_idGENERAL_AIEPI
    WHERE PREGUNTAS_ID_PREGUNTA=3 AND MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR='".$idAiepiBuscar."'");
for ($y=0; $y < count($datosPreguntaRespuestaComportamiento); $y++) { 
    switch ($datosPreguntaRespuestaComportamiento[$y]['PREGUNTA_RESPUESTA_SC_ID_PREGUNTA_RESPUESTA_SC']) {
        case '8':
           $COLOR_ROJO='X';
            break;
        case '9':
            $COLOR_NARANJA='X';
            break;
        case '10':
             $COLOR_AMARILLO='X';
            break;
        case '11':
            $COLOR_VERDE='X';
            break;
        default:
            $COLOR_ROJO='';
            $COLOR_NARANJA='';
            $COLOR_AMARILLO='';
            $COLOR_VERDE='';
            break;
    }
}

$MEDIDA=$datos[$i]['PERIMETRO_BRAQUIAL_MEDIDA'];
$LACTANTE_TOMA_SENO_SI='';
$LACTANTE_TOMA_SENO_NO='';
if ($datos[$i]['LACTA_TOMA_SENO_MESES']=='1') {
    $LACTANTE_TOMA_SENO_SI='X';
}elseif ($datos[$i]['LACTA_TOMA_SENO_MESES']=='0') {
   $LACTANTE_TOMA_SENO_NO='X';
}
$NUM_VECES_TOMA_SENO_AL_DIA=$datos[$i]['NUMERO_VECES_TOMA_SENO_DIA_MESES'];
$NUM_VECES_TOMA_SENO_AL_NOCHE=$datos[$i]['NUMERO_VECES_TOMA_SENO_NOCHE_MESES'];
$NARIZ_FRENTE_AL_PEZON='';
$CUERPO_FRENTE_A_LA_MADRE='';
$MADRE_SOSTIENE_NIÑO='';
$datosPyRPosicion=$this->_modeloAiepi->getPreguntasRespuesta("SELECT * FROM `aiepi` 
 INNER JOIN general_aiepi on general_aiepi.ID_GENERAL_AIEPI=aiepi.GENERAL_AIEPI_idGENERAL_AIEPI
    WHERE PREGUNTAS_ID_PREGUNTA=4 AND MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR='".$idAiepiBuscar."'");
for ($y=0; $y < count($datosPyRPosicion); $y++) { 
    switch ($datosPyRPosicion[$y]['PREGUNTA_RESPUESTA_SC_ID_PREGUNTA_RESPUESTA_SC']) {
        case '12':
          $NARIZ_FRENTE_AL_PEZON='X';
            break;
        case '13':
            $CUERPO_FRENTE_A_LA_MADRE='X';
            break;
        case '14':
        $MADRE_SOSTIENE_NIÑO='X';
            break;
        default:
        $NARIZ_FRENTE_AL_PEZON='';
$CUERPO_FRENTE_A_LA_MADRE='';
$MADRE_SOSTIENE_NIÑO='';
            break;
    }
}
$MENOR_TOCA_SENO='';
$LABIO_INFERIOR_AFUERA='';
$AUREOLA_MAS_ARRIBA='';
$datosPyRAgarre=$this->_modeloAiepi->getPreguntasRespuesta("SELECT * FROM `aiepi` 
 INNER JOIN general_aiepi on general_aiepi.ID_GENERAL_AIEPI=aiepi.GENERAL_AIEPI_idGENERAL_AIEPI
    WHERE PREGUNTAS_ID_PREGUNTA=5 AND MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR='".$idAiepiBuscar."'");
for ($y=0; $y < count($datosPyRAgarre); $y++) { 
    switch ($datosPyRAgarre[$y]['PREGUNTA_RESPUESTA_SC_ID_PREGUNTA_RESPUESTA_SC']) {
        case '15':
          $MENOR_TOCA_SENO='X';
            break;
        case '16':
            $LABIO_INFERIOR_AFUERA='X';
            break;
        case '17':
            $AUREOLA_MAS_ARRIBA='X';
            break;
        default:
       $MENOR_TOCA_SENO='';
$LABIO_INFERIOR_AFUERA='';
$AUREOLA_MAS_ARRIBA='';
            break;
    }
}
$NO_LACTA='';
$NO_TIENE_DIFICULTAD='';
$LE_DUELE='';
$NO_LE_BAJA_LECHE='';
/////////////////////////////////----------------------------FALTA_PRODUCE_MUCHA_LECHE----------------///////////////
$PRODUCE_MUCHA_LECHE='';
$LACERACION_PEZON='';
$HOSPITALIZACION='';
$OTROS_DIFICULTAD_AMAMANTAR='';

$datosPyRDificultad=$this->_modeloAiepi->getPreguntasRespuesta("SELECT * FROM `aiepi` 
 INNER JOIN general_aiepi on general_aiepi.ID_GENERAL_AIEPI=aiepi.GENERAL_AIEPI_idGENERAL_AIEPI
    WHERE PREGUNTAS_ID_PREGUNTA=6 AND MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR='".$idAiepiBuscar."'");
for ($y=0; $y < count($datosPyRDificultad); $y++) { 
    switch ($datosPyRDificultad[$y]['PREGUNTA_RESPUESTA_SC_ID_PREGUNTA_RESPUESTA_SC']) {
        case '18':
          $NO_LACTA='X';
            break;
        case '19':
          $NO_TIENE_DIFICULTAD='X';
            break;
            case '20':
          $LE_DUELE='X';
            break;
            case '21':
          $NO_LE_BAJA_LECHE='X';
            break;
            case '22':
          $PRODUCE_MUCHA_LECHE='X';
            break;
            case '23':
         $LACERACION_PEZON='X';
            break;
            case '24':
          $HOSPITALIZACION='X';
            break;
            case '25':
          $OTROS_DIFICULTAD_AMAMANTAR='X';
            break;
        default:
$NO_LACTA='';
$NO_TIENE_DIFICULTAD='';
$LE_DUELE='';
$NO_LE_BAJA_LECHE='';
$PRODUCE_MUCHA_LECHE='';
$LACERACION_PEZON='';
$HOSPITALIZACION='';
$OTROS_DIFICULTAD_AMAMANTAR='';
            break;
    }
}
$OTRA_LECHE='';
$JUGO='';
$AGUA='';
$COLADA='';
$PAPILLA='';
$NO_RECIBE='';
$datosPyROtrosAlimentos=$this->_modeloAiepi->getPreguntasRespuesta("SELECT * FROM `aiepi`
 INNER JOIN general_aiepi on general_aiepi.ID_GENERAL_AIEPI=aiepi.GENERAL_AIEPI_idGENERAL_AIEPI
 WHERE PREGUNTAS_ID_PREGUNTA=7 AND MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR='".$idAiepiBuscar."'");
for ($y=0; $y < count($datosPyROtrosAlimentos); $y++) { 
    switch ($datosPyROtrosAlimentos[$y]['PREGUNTA_RESPUESTA_SC_ID_PREGUNTA_RESPUESTA_SC']) {
        case '26':
          $OTRA_LECHE='X';
            break;
        case '27':
          $JUGO='X';
            break;
            case '28':
         $AGUA='X';
            break;
            case '29':
          $COLADA='X';
            break;
            case '30':
          $PAPILLA='X';
            break;
            case '31':
         $NO_RECIBE='X';
            break;
           
        default:
$OTRA_LECHE='';
$JUGO='';
$AGUA='';
$COLADA='';
$PAPILLA='';
$NO_RECIBE='';
            break;
    }
}

$CONTIENEN_SAL='';
$CONTIENEN_AZUCAR='';
$datosPyRSalAzucar=$this->_modeloAiepi->getPreguntasRespuesta("SELECT * FROM `aiepi` 
 INNER JOIN general_aiepi on general_aiepi.ID_GENERAL_AIEPI=aiepi.GENERAL_AIEPI_idGENERAL_AIEPI
    WHERE PREGUNTAS_ID_PREGUNTA=8 AND MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR='".$idAiepiBuscar."'");
for ($y=0; $y < count($datosPyRSalAzucar); $y++) { 
    switch ($datosPyRSalAzucar[$y]['PREGUNTA_RESPUESTA_SC_ID_PREGUNTA_RESPUESTA_SC']) {
        case '32':
          $CONTIENEN_SAL='X';
            break;
        case '33':
         $CONTIENEN_AZUCAR='X';
            break;
        default:
        $CONTIENEN_SAL='';
        $CONTIENEN_AZUCAR='';
            break;
    }
}
$TETERO='';
$TASA='';
$CUCHARA='';
$OTRO_UTIL_ALIMENTAR='';
$datosPyRSalAzucar=$this->_modeloAiepi->getPreguntasRespuesta("SELECT * FROM `aiepi` 
 INNER JOIN general_aiepi on general_aiepi.ID_GENERAL_AIEPI=aiepi.GENERAL_AIEPI_idGENERAL_AIEPI
    WHERE PREGUNTAS_ID_PREGUNTA=9 AND MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR='".$idAiepiBuscar."'");
for ($y=0; $y < count($datosPyRSalAzucar); $y++) { 
    switch ($datosPyRSalAzucar[$y]['PREGUNTA_RESPUESTA_SC_ID_PREGUNTA_RESPUESTA_SC']) {
        case '34':
          $TETERO='X';
            break;
        case '35':
         $TASA='X';
            break;
            case '36':
         $CUCHARA='X';
            break;
            case '37':
         $OTRO_UTIL_ALIMENTAR='X';
            break;
        default:
        $TETERO='';
$TASA='';
$CUCHARA='';
$OTRO_UTIL_ALIMENTAR='';
            break;
    }
}
$NIÑO_MAS_6MESES_TOMA_SENO_SI='';
$NIÑO_MAS_6MESES_TOMA_SENO_NO='';
if ($datos[$i]['TOMA_SENO_ANOS']=='1') {
   $NIÑO_MAS_6MESES_TOMA_SENO_SI='X';
}elseif ($datos[$i]['TOMA_SENO_ANOS']=='0') {
    $NIÑO_MAS_6MESES_TOMA_SENO_NO='X';
}

$NUM_VECES_TOMA_SENO_AL_DIA_6MESES=$datos[$i]['NUMERO_VECES_TOMA_SENO_DIA_ANOS'];
$NUM_VECES_TOMA_SENO_AL_NOCHE_6MESES=$datos[$i]['NUMERO_VECES_TOMA_SENO_NOCHE_ANOS'];

$ALIMENTOS_CON_MAYOR_FRECUENCIA=$datos[$i]['ALIMENTO_MAYOR_FRECUENCIA'];
$ESTA_PROGRAMA_NUTRICIONAL_SI='';
$ESTA_PROGRAMA_NUTRICIONAL_NO='';
if ($datos[$i]['PROGRAMA_RECUPERACION_NUTRICONAL']=='1') {
   $ESTA_PROGRAMA_NUTRICIONAL_SI='X';
}elseif ($datos[$i]['PROGRAMA_RECUPERACION_NUTRICONAL']=='0') {
   $ESTA_PROGRAMA_NUTRICIONAL_NO='X';
}
$CUAL_PROGRAMA_NUTRICIONAL=$datos[$i]['CUAL_PROGRAMA_NUTRICIONAL'];
$NIÑO_USA_BIBERON_SI='';
$NIÑO_USA_BIBERON_NO='';
if ($datos[$i]['USA_BIBERON']=='1') {
$NIÑO_USA_BIBERON_SI='X';
}elseif ($datos[$i]['USA_BIBERON']=='0') {
  $NIÑO_USA_BIBERON_NO='X';
}

$TOMA_AGUADEPANELA='';
$TOMA_LECHE='';
$TOMA_COLADA='';
$TOMA_SOPA='';
$TOMA_GASEOSA='';
$TOMA_OTRO='';

$datosPyRTomaElNiño=$this->_modeloAiepi->getPreguntasRespuesta("SELECT * FROM `aiepi` 
 INNER JOIN general_aiepi on general_aiepi.ID_GENERAL_AIEPI=aiepi.GENERAL_AIEPI_idGENERAL_AIEPI
    WHERE PREGUNTAS_ID_PREGUNTA=10 AND MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR='".$idAiepiBuscar."'");
for ($y=0; $y < count($datosPyRTomaElNiño); $y++) { 
    switch ($datosPyRTomaElNiño[$y]['PREGUNTA_RESPUESTA_SC_ID_PREGUNTA_RESPUESTA_SC']) {
       case '38':
           $TOMA_AGUADEPANELA='X';
           break;
           case '39':
           $TOMA_LECHE='X';
           break;
           case '40':
          $TOMA_COLADA='X';
           break;
           case '41':
           $TOMA_SOPA='X';
           break;
           case '42':
           $TOMA_GASEOSA='X';
           break;
           case '43':
          $TOMA_OTRO='X';
           break;
        default:
$TOMA_AGUADEPANELA='';
$TOMA_LECHE='';
$TOMA_COLADA='';
$TOMA_SOPA='';
$TOMA_GASEOSA='';
$TOMA_OTRO='';
            break;
    }
}
$CONS_LIQUIDA='';
$CONS_CREMA='';
$CONS_PAPILLA='';
$CONS_OTRO='';
$datosPyRConsistencia=$this->_modeloAiepi->getPreguntasRespuesta("SELECT * FROM `aiepi`
 INNER JOIN general_aiepi on general_aiepi.ID_GENERAL_AIEPI=aiepi.GENERAL_AIEPI_idGENERAL_AIEPI
 WHERE PREGUNTAS_ID_PREGUNTA=11 AND MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR='".$idAiepiBuscar."'");
for ($y=0; $y < count($datosPyRConsistencia); $y++) { 
    switch ($datosPyRConsistencia[$y]['PREGUNTA_RESPUESTA_SC_ID_PREGUNTA_RESPUESTA_SC']) {
       case '44':
           $CONS_LIQUIDA='X';
           break;
           case '45':
           $CONS_CREMA='X';
           break;
           case '46':
          $CONS_PAPILLA='X';
           break;
           case '47':
           $CONS_OTRO='X';
           break;
        default:
$CONS_LIQUIDA='';
$CONS_CREMA='';
$CONS_PAPILLA='';
$CONS_OTRO='';
            break;
    }
}

$NIÑO_COME_SOLO_SI='';
$NIÑO_COME_SOLO_NO='';
if ($datos[$i]['COME_SOLO']=='1') {
   $NIÑO_COME_SOLO_SI='X';
}elseif ($datos[$i]['COME_SOLO']=='0') {
    $NIÑO_COME_SOLO_NO='X';
}
$OP_3MESES_DESARROLLO_SI='';
$OP_3MESES_DESARROLLO_NO='';
$OP_3MESES_DESARROLLO_NA='';
if ($datos[$i]['MESES_3_LEVANTA_CABEZA']=='1') {
    $OP_3MESES_DESARROLLO_SI='X';
}elseif ($datos[$i]['MESES_3_LEVANTA_CABEZA']=='0') {
    $OP_3MESES_DESARROLLO_NO='X';
}elseif ($datos[$i]['MESES_3_LEVANTA_CABEZA']==2) {
   $OP_3MESES_DESARROLLO_NA='X';
}
$OP_6MESES_DESARROLLO_SI='';
$OP_6MESES_DESARROLLO_NO='';
$OP_6MESES_DESARROLLO_NA='';
if ($datos[$i]['MESES_6_SIENTA_APOYO']=='1') {
    $OP_6MESES_DESARROLLO_SI='X';
}elseif ($datos[$i]['MESES_6_SIENTA_APOYO']=='0') {
    $OP_6MESES_DESARROLLO_NO='X';
}elseif ($datos[$i]['MESES_6_SIENTA_APOYO']==2) {
   $OP_6MESES_DESARROLLO_NA='X';
}
$OP_9MESES_DESARROLLO_SI='';
$OP_9MESES_DESARROLLO_NO='';
$OP_9MESES_DESARROLLO_NA='';
if ($datos[$i]['MESES_9_SIETA_SOLO']=='1') {
   $OP_9MESES_DESARROLLO_SI='X';
}elseif ($datos[$i]['MESES_9_SIETA_SOLO']=='0') {
   $OP_9MESES_DESARROLLO_NO='X';
}elseif ($datos[$i]['MESES_9_SIETA_SOLO']==2) {
    $OP_9MESES_DESARROLLO_NA='X';
}
$OP_12MESES_DESARROLLO_SI='';
$OP_12MESES_DESARROLLO_NO='';
$OP_12MESES_DESARROLLO_NA='';
if ($datos[$i]['MESES_12_CAMINA_APOYO']=='1') {
    $OP_12MESES_DESARROLLO_SI='X';
}elseif ($datos[$i]['MESES_12_CAMINA_APOYO']=='0') {
   $OP_12MESES_DESARROLLO_NO='X';
}elseif ($datos[$i]['MESES_12_CAMINA_APOYO']==2) {
    $OP_12MESES_DESARROLLO_NA='X';
}
$OP_16MESES_DESARROLLO_SI='';
$OP_16MESES_DESARROLLO_NO='';
$OP_16MESES_DESARROLLO_NA='';
if ($datos[$i]['MESES_16_CAMINA_SOLO']=='1') {
    $OP_16MESES_DESARROLLO_SI='X';
}elseif ($datos[$i]['MESES_16_CAMINA_SOLO']=='0') {
    $OP_16MESES_DESARROLLO_NO='X';
}elseif ($datos[$i]['MESES_16_CAMINA_SOLO']==2) {
    $OP_16MESES_DESARROLLO_NA='X';
}
$OP_20MESES_DESARROLLO_SI='';
$OP_20MESES_DESARROLLO_NO='';
$OP_20MESES_DESARROLLO_NA='';
if ($datos[$i]['MESES_20_CORRE_RAPIDO']=='1') {
    $OP_20MESES_DESARROLLO_SI='X';
}elseif ($datos[$i]['MESES_20_CORRE_RAPIDO']=='0') {
    $OP_20MESES_DESARROLLO_NO='X';
}elseif ($datos[$i]['MESES_20_CORRE_RAPIDO']==2) {
    $OP_20MESES_DESARROLLO_NA='X';
}
$OP_24MESES_DESARROLLO_SI='';
$OP_24MESES_DESARROLLO_NO='';
$OP_24MESES_DESARROLLO_NA='';

if ($datos[$i]['MESES_24_PATEA_PELOTA']=='1') {
   $OP_24MESES_DESARROLLO_SI='X';
}elseif ($datos[$i]['MESES_24_PATEA_PELOTA']=='0') {
   $OP_24MESES_DESARROLLO_NO='X';
}elseif ($datos[$i]['MESES_24_PATEA_PELOTA']==2) {
   $OP_24MESES_DESARROLLO_NA='X';
}
$OP_30MESES_DESARROLLO_SI='';
$OP_30MESES_DESARROLLO_NO='';
$OP_30MESES_DESARROLLO_NA='';
if ($datos[$i]['MESES_30_EMPINA_AMBOSPIES']=='1') {
   $OP_30MESES_DESARROLLO_SI='X';
}elseif ($datos[$i]['MESES_30_EMPINA_AMBOSPIES']=='0') {
    $OP_30MESES_DESARROLLO_NO='X';
}elseif ($datos[$i]['MESES_30_EMPINA_AMBOSPIES']==2) {
    $OP_30MESES_DESARROLLO_NA='X';
}
$OP_36MESES_DESARROLLO_SI='';
$OP_36MESES_DESARROLLO_NO='';
$OP_36MESES_DESARROLLO_NA='';
if ($datos[$i]['MESES_36_SUBE_BAJA_ESCALERAS_SOLO']=='1') {
    $OP_36MESES_DESARROLLO_SI='X';
}elseif ($datos[$i]['MESES_36_SUBE_BAJA_ESCALERAS_SOLO']=='0') {
   $OP_36MESES_DESARROLLO_NO='X';
}elseif ($datos[$i]['MESES_36_SUBE_BAJA_ESCALERAS_SOLO']==2) {
    $OP_36MESES_DESARROLLO_NA='X';
}
$OP_48MESES_DESARROLLO_SI='';
$OP_48MESES_DESARROLLO_NO='';
$OP_48MESES_DESARROLLO_NA='';
if ($datos[$i]['MESES_48_LANZA_ATRAPA_PELOTA']=='1') {
   $OP_48MESES_DESARROLLO_SI='X';
}elseif ($datos[$i]['MESES_48_LANZA_ATRAPA_PELOTA']=='0') {
   $OP_48MESES_DESARROLLO_NO='X';
}elseif ($datos[$i]['MESES_48_LANZA_ATRAPA_PELOTA']==2) {
    $OP_48MESES_DESARROLLO_NA='X';
}
$OP_60MESES_DESARROLLO_SI='';
$OP_60MESES_DESARROLLO_NO='';
$OP_60MESES_DESARROLLO_NA='';
if ($datos[$i]['MESES_60_PARA_SALTA']=='1') {
    $OP_60MESES_DESARROLLO_SI='X';
}elseif ($datos[$i]['MESES_60_PARA_SALTA']=='0') {
    $OP_60MESES_DESARROLLO_NO='X';
}elseif ($datos[$i]['MESES_60_PARA_SALTA']==2) {
    $OP_60MESES_DESARROLLO_NA='X';
}

$NUM_CONSULTAS_CRECIMIENTO=$datos[$i]['NUMERO_CONSULTAR_CRECIMEINTO'];
$RECIBE_MICRONUTRIENTES_SI='';
$RECIBE_MICRONUTRIENTES_NO='';
if ($datos[$i]['RECIBE_MICRONUTRIENTES']=='1') {
   $RECIBE_MICRONUTRIENTES_SI='X';
}elseif ($datos[$i]['RECIBE_MICRONUTRIENTES']=='0') {
    $RECIBE_MICRONUTRIENTES_NO='X';
}
$RECIBE_DESPARACITACION_SI='';
$RECIBE_DESPARACITACION_NO='';
if ($datos[$i]['RECIBIO_DESPARACITACION']=='1') {
   $RECIBE_DESPARACITACION_SI='X';
}elseif ($datos[$i]['RECIBIO_DESPARACITACION']=='0') {
    $RECIBE_DESPARACITACION_NO='X';
}
$DESCRIPCION_MICRONUTRIENTES=$datos[$i]['DES_MICRONUTRIENTES'];
$FECHA_DESPARACITACION=$datos[$i]['FECHA_DESPARACITACION'];
$FECHA_ENTREGA_MICRONUTRIENTES=$datos[$i]['FECHA_ULTIMA_ENTREGA'];
$LE_SONRIEN_SI='';
$LE_SONRIEN_NO='';
if ($datos[$i]['LE_SONRIE']=='1') {
    $LE_SONRIEN_SI='X';
}elseif ($datos[$i]['LE_SONRIE']=='0') {
    $LE_SONRIEN_NO='X';
}

$LE_ACOMPAÑAN_SI='';
$LE_ACOMPAÑAN_NO='';
if ($datos[$i]['LO_ACOMPANA']=='1') {
$LE_ACOMPAÑAN_SI='X';
}elseif ($datos[$i]['LO_ACOMPANA']=='0') {
    $LE_ACOMPAÑAN_NO='X';
}
$ALZAN_SI='';
$ALZAN_NO='';
if ($datos[$i]['ALZA_ARRULLAN']=='1') {
    $ALZAN_SI='X';
}elseif ($datos[$i]['ALZA_ARRULLAN']=='0') {
    $ALZAN_NO='X';
}
$LE_JUEGAN_SI='';
$LE_JUEGAN_NO='';
if ($datos[$i]['JUEGA']=='1') {
    $LE_JUEGAN_SI='X';
}elseif ($datos[$i]['JUEGA']=='0') {
   $LE_JUEGAN_NO='X';
}
$PREOCUPAN_POR_HIGIENE_SI='';
$PREOCUPAN_POR_HIGIENE_NO='';
if ($datos[$i]['SE_PREOCUPA_HIGIENE']=='1') {
$PREOCUPAN_POR_HIGIENE_SI='X';
}elseif ($datos[$i]['SE_PREOCUPA_HIGIENE']=='0') {
$PREOCUPAN_POR_HIGIENE_NO='X';
}
$CASTIGAN_CORREA_SI='';
$CASTIGAN_CORREA_NO='';
if ($datos[$i]['CASTIGAN_CONRREA_PALMADAS']=='1') {
   $CASTIGAN_CORREA_SI='X';
}elseif ($datos[$i]['CASTIGAN_CONRREA_PALMADAS']=='0') {
    $CASTIGAN_CORREA_NO='X';
}
$PREOCUPAN_POR_SALUD_SI='';
$PREOCUPAN_POR_SALUD_NO='';
if ($datos[$i]['SE_PREOCUPA_SALUD']=='1') {
   $PREOCUPAN_POR_SALUD_SI='X';
}elseif ($datos[$i]['SE_PREOCUPA_SALUD']=='0') {
    $PREOCUPAN_POR_SALUD_NO='X';
}
$ACCIDENTES_FRECUENTES_SI='';
$ACCIDENTES_FRECUENTES_NO='';
if ($datos[$i]['TIENE_ACCIDENTES_FRECUENTES']=='1') {
   $ACCIDENTES_FRECUENTES_SI='X';
}elseif ($datos[$i]['TIENE_ACCIDENTES_FRECUENTES']=='0') {
    $ACCIDENTES_FRECUENTES_NO='X';
}
$SOLO_TOMANDO_TETERO_SI='';
$SOLO_TOMANDO_TETERO_NO='';
if ($datos[$i]['ESTA_SOLO_TOAMDO_TETERO']=='1') {
   $SOLO_TOMANDO_TETERO_SI='X';
}elseif ($datos[$i]['ESTA_SOLO_TOAMDO_TETERO']=='0') {
    $SOLO_TOMANDO_TETERO_NO='X';
}
$OBJETOS_PEQUEÑOS_SI='';
$OBJETOS_PEQUEÑOS_NO='';
if ($datos[$i]['OBJETOS_PEQUENOS_ALCANCE']=='1') {
    $OBJETOS_PEQUEÑOS_SI='X';
}elseif ($datos[$i]['OBJETOS_PEQUENOS_ALCANCE']=='0') {
    $OBJETOS_PEQUEÑOS_NO='X';
}
$NIÑOS_COCINA_SI='';
$NIÑOS_COCINA_NO='';
if ($datos[$i]['EN_COCINA']=='1') {
    $NIÑOS_COCINA_SI='X';
}elseif ($datos[$i]['EN_COCINA']=='0') {
    $NIÑOS_COCINA_NO='X';
}
$CUCHILLOS_AL_ALCANCE_SI='';
$CUCHILLOS_AL_ALCANCE_NO='';
if ($datos[$i]['ALCANCE_CUCHILLOS_SERRUCHOS']=='1') {
   $CUCHILLOS_AL_ALCANCE_SI='X';
}elseif ($datos[$i]['ALCANCE_CUCHILLOS_SERRUCHOS']=='0') {
    $CUCHILLOS_AL_ALCANCE_NO='X';
}
$MEDICAMENTOS_AL_ALCANCE_SI='';
$MEDICAMENTOS_AL_ALCANCE_NO='';
if ($datos[$i]['ALCANCE_MEDICAMENTOS']=='1') {
   $MEDICAMENTOS_AL_ALCANCE_SI='X';
}elseif ($datos[$i]['ALCANCE_MEDICAMENTOS']=='0') {
    $MEDICAMENTOS_AL_ALCANCE_NO='X';
}

$ESCALERAS_SIN_PROTECCION_SI='';
$ESCALERAS_SIN_PROTECCION_NO='';
if ($datos[$i]['ESCALERAS_TERRAZAS_SIN_PROTECCION']=='1') {
   
$ESCALERAS_SIN_PROTECCION_SI='X';
}elseif ($datos[$i]['ESCALERAS_TERRAZAS_SIN_PROTECCION']=='0') {
  $ESCALERAS_SIN_PROTECCION_NO='X';
}
$EXISTEN_OTROS_RIESGOS_SI='';
$EXISTEN_OTROS_RIESGOS_NO='';
if ($datos[$i]['EXISTEN_OTROS_RIESGOS_HOGAR']=='1') {
   $EXISTEN_OTROS_RIESGOS_SI='X';
}elseif ($datos[$i]['EXISTEN_OTROS_RIESGOS_HOGAR']=='0') {
    $EXISTEN_OTROS_RIESGOS_NO='X';
}
$AGUA_SIN_TAPA_SI='';
$AGUA_SIN_TAPA_NO='';
if ($datos[$i]['AGUA_ALMACENADA_SINTAPA']=='1') {
    $AGUA_SIN_TAPA_SI='X';
}elseif ($datos[$i]['AGUA_ALMACENADA_SINTAPA']=='0') {
    $AGUA_SIN_TAPA_NO='X';
 }

$CABLES_DESCUBIERTOS_SI='';
$CABLES_DESCUBIERTOS_NO='';
 if ($datos[$i]['ENCHUFES_CABLES_DECUBIERTOS']=='1') {
    $CABLES_DESCUBIERTOS_SI='X';
}elseif ($datos[$i]['ENCHUFES_CABLES_DECUBIERTOS']=='0') {
   $CABLES_DESCUBIERTOS_NO='X';
 }
 $VELAS_AL_ALCANCE_SI='';
$VELAS_AL_ALCANCE_NO='';
 if ($datos[$i]['VELAS_FOSFOROS']=='1') {
     $VELAS_AL_ALCANCE_SI='X';
}elseif ($datos[$i]['VELAS_FOSFOROS']=='0') {
    $VELAS_AL_ALCANCE_NO='X';
 }
$ROPA_SUCIA='';
$MANOS_SUCIAS='';
$DESCALZOS='';
$BASURA_VIVIENDA='';
$ALIMENTOS_SIN_ALMACENAR='';
$PERSONAS_FUMAN='';
$NO_USAN_TOLDILLO='';
$INSECTOS_VIVIENDA='';
$MANEJO_ADECUADO='';
$AGUA_NO_POTABLE='';
$BRASERO_UBICADO_HABITACION='';
$VIVIENDA_ILUMINACION='';
$EVITAN_TEMPERATURA='';
$ACUMULA_AGUA='';
$ADULTO_TOS_CUIDA='';
$datosPyRAmbientalesHigiene=$this->_modeloAiepi->getPreguntasRespuesta("SELECT * FROM `aiepi`
 INNER JOIN general_aiepi on general_aiepi.ID_GENERAL_AIEPI=aiepi.GENERAL_AIEPI_idGENERAL_AIEPI
 WHERE PREGUNTAS_ID_PREGUNTA=151 AND MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR='".$idAiepiBuscar."'");
for ($y=0; $y < count($datosPyRAmbientalesHigiene); $y++) { 
    switch ($datosPyRAmbientalesHigiene[$y]['PREGUNTA_RESPUESTA_SC_ID_PREGUNTA_RESPUESTA_SC']) {
        case '542':
            $ROPA_SUCIA='X';
            break;
            case '543':
           $MANOS_SUCIAS='X';
            break;
            case '544':
           $DESCALZOS='X';
            break;
            case '545':
            $BASURA_VIVIENDA='X';
            break;
            case '546':
            $ALIMENTOS_SIN_ALMACENAR='X';
            break;
            case '547':
            $PERSONAS_FUMAN='X';
            break;
            case '548':
            $NO_USAN_TOLDILLO='X';
            break;
            case '549':
            $INSECTOS_VIVIENDA='X';
            break;
            case '550':
           $MANEJO_ADECUADO='X';
            break;
            case '551':
            $AGUA_NO_POTABLE='X';
            break;
            case '552':
            $BRASERO_UBICADO_HABITACION='X';
            break;
            case '553':
            $VIVIENDA_ILUMINACION='X';
            break;
            case '554':
            $EVITAN_TEMPERATURA='X';
            break;
            case '555':
            $ACUMULA_AGUA='X';
            break;
            case '556':
            $ADULTO_TOS_CUIDA='X';
            break;
        default:
$ROPA_SUCIA='';
$MANOS_SUCIAS='';
$DESCALZOS='';
$BASURA_VIVIENDA='';
$ALIMENTOS_SIN_ALMACENAR='';
$PERSONAS_FUMAN='';
$NO_USAN_TOLDILLO='';
$INSECTOS_VIVIENDA='';
$MANEJO_ADECUADO='';
$AGUA_NO_POTABLE='';
$BRASERO_UBICADO_HABITACION='';
$VIVIENDA_ILUMINACION='';
$EVITAN_TEMPERATURA='';
$ACUMULA_AGUA='';
$ADULTO_TOS_CUIDA='';
            break;
    }
}
$codImag = $datos[$i]['FIRMA'];
$codImagJefe=$datos[$i]['FIRMA_JEFE'];

}

    

// FIN VARIABLES------------------------------------------------------------------------------------------------------------------------------
$this->_pdf->Image('C:\xampp\htdocs\ProyectoAPS\views\layout\default\img\logo_gobernacion.jpg',150,260,200);
$this->_pdf->Cell(-83);
$this->_pdf->Cell ( 0,30,utf8_decode('INSTITUCION: ').$INSTITUCION,0);
$this->_pdf->Line(29, 32, 115,32);


$this->_pdf->Cell(-142);
$this->_pdf->Cell ( 0,30,'FECHA: '.$FECHA,0);
$this->_pdf->Line(215, 32, 228,32);



$this->_pdf->Cell(-336);
$this->_pdf->Cell ( 0,41,utf8_decode('MUNICIPIO: ').$MUNICIPIO,0);
$this->_pdf->Line(26, 37, 115,37);



$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-215);
$this->_pdf->Cell ( 0,41,utf8_decode('TIPO DE USUARIO '),0);



$this->_pdf->Cell(-179);
$this->_pdf->Cell ( 0,41,'C    '.$C,0);
$this->_pdf->Line(170, 37, 176,37);



$this->_pdf->Cell(-170);
$this->_pdf->Cell ( 0,41,'S     '.$S,0);
$this->_pdf->Line(180, 37, 186,37);


$this->_pdf->Cell(-160);
$this->_pdf->Cell ( 0,41,'V     '.$V,0);
$this->_pdf->Line(190, 37, 196,37);

$this->_pdf->Cell(-150); 
$this->_pdf->Cell ( 0,41,'P    '.$P,0);
$this->_pdf->Line(199, 37, 205,37);


$this->_pdf->Cell(-140);
$this->_pdf->Cell ( 0,41,'E   '.$E,0);
$this->_pdf->Line(209, 37, 215,37);


$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-125);
$this->_pdf->Cell ( 0,43,utf8_decode('ASEGURADOR: ').$ASEGURADOR,0);
$this->_pdf->Line(241, 38, 300,38);


$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-336);
$this->_pdf->Cell ( 0,50,utf8_decode('NOMBRES Y APELLIDOS: ').$NOMBRES_Y_APELLIDOS,0);
$this->_pdf->Line(45, 41, 147,41);


$this->_pdf->Cell(-196);
$this->_pdf->Cell ( 0,50,'RC:  '.$RC,0);
$this->_pdf->Line(156, 41, 194,41);


$this->_pdf->Cell(-125);
$this->_pdf->Cell ( 0,50,'FECHA DE NACIMIENTO (AA/MM/DD)  '.$FECHA_DE_NACIMIENTO,0);
$this->_pdf->Line(271, 41, 283,41);


$this->_pdf->Cell(-330);
$this->_pdf->Cell ( 0,58,'GENERO: ',0);
$this->_pdf->Cell(-315);
$this->_pdf->Cell ( 0,58,'F    '.$F,0);
$this->_pdf->Rect(35, 42, 3,3 );
$this->_pdf->Cell(-307);
$this->_pdf->Cell ( 0,58,'M  '.$M,0);
$this->_pdf->Rect(43, 42, 3,3 );


$this->_pdf->Cell(-248);
$this->_pdf->Cell ( 0,58,'PROCEDENCIA:',0);
$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-210);
$this->_pdf->Cell ( 0,58,'URBANA  '.$URBANA,0);
$this->_pdf->Rect(172, 42, 3,3 );
$this->_pdf->Cell(-184);
$this->_pdf->Cell ( 0,58,'RURAL  '.$RURAL,0);
$this->_pdf->Rect(149, 42, 3,3 );


$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-320);
$this->_pdf->Cell ( 0,67,'TIPO DE POBLACION:',0);
$this->_pdf->Cell(-270);
$this->_pdf->Cell ( 0,67,'DESPLAZADO   '.$DESPLAZADO,0);
$this->_pdf->Rect(96, 47, 3,3 );
$this->_pdf->Cell(-270);
$this->_pdf->Cell ( 0,73,'ROM/GITANO    '.$ROM_GITANO,0);
$this->_pdf->Rect(96, 50, 3,3 );


$this->_pdf->Cell(-225);
$this->_pdf->Cell ( 0,67,'DESMOVILIZADO   '.$DESMOVILIZADO,0);
$this->_pdf->Rect(145, 47, 3,3 );
$this->_pdf->Cell(-225);
$this->_pdf->Cell ( 0,73,'PALENQUERO         '.$PALENQUERO,0);
$this->_pdf->Rect(145, 50, 3,3 );


$this->_pdf->Cell(-184);
$this->_pdf->Cell ( 0,67,'RAIZAL       '.$RAIZAL,0);
$this->_pdf->Rect(177, 47, 3,3 );
$this->_pdf->Cell(-184);
$this->_pdf->Cell ( 0,73,'INDIGENA  '.$INDIGENA,0);
$this->_pdf->Rect(177, 50, 3,3 );


$this->_pdf->Cell(-157);
$this->_pdf->Cell ( 0,67,'MENOR ABANDONADO        '.$MENOR_ABANDONADO,0);
$this->_pdf->Rect(224, 47, 3,3 );
$this->_pdf->Cell(-157);
$this->_pdf->Cell ( 0,73,'HABITANTE DE LA CALLE   '.$HABITANTE_DE_LA_CALLE,0);
$this->_pdf->Rect(224, 50, 3,3 );


$this->_pdf->Cell(-105);
$this->_pdf->Cell ( 0,67,'PERSONA EN CONDICION DE DISCAPACIDAD    '.$PERSONA_EN_CONDICION_DE_DISCAPACIDAD,0);
$this->_pdf->Rect(300, 47, 3,3 );
$this->_pdf->Cell(-105);
$this->_pdf->Cell ( 0,73,'VICTIMA CONFLICTO ARMADO                              '.$VICTIMA_CONFLICTO_ARMADO,0);
$this->_pdf->Rect(300, 50, 3,3 );


$this->_pdf->Cell(-22);
$this->_pdf->Cell ( 0,67,'AFRO    '.$AFRO,0);
$this->_pdf->Rect(334, 47, 3,3 );
$this->_pdf->Cell(-22);
$this->_pdf->Cell ( 0,73,'N/A        '.$N_A,0);
$this->_pdf->Rect(334, 50, 3,3 );


$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-336);
$this->_pdf->Cell ( 0,82,utf8_decode('NOMBRE DEL ACOMPAÑANTE: '.$NOMBRE_DEL_ACOMPAÑANTE),0);
$this->_pdf->Line(53, 58, 130,58);


$this->_pdf->Cell(-204);
$this->_pdf->Cell ( 0,82,utf8_decode('PARENTEZCO: ').$PARENTEZCO,0);
$this->_pdf->Line(163, 58, 190,58);


$this->_pdf->Cell(-148);
$this->_pdf->Cell ( 0,82,utf8_decode('DIRECCIÓN: '.$DIRECCIÓN),0);
$this->_pdf->Line(216, 58, 265,58);


$this->_pdf->Cell(-73);
$this->_pdf->Cell ( 0,82,utf8_decode('TELEFONO: ').$TELEFONO,0);
$this->_pdf->Line(290, 58, 315,58);


$this->_pdf->Cell(-336);
$this->_pdf->Cell ( 0,95,utf8_decode('EVALUACIÓN REALIZADA: '),0);

$this->_pdf->Cell(-280);
$this->_pdf->Cell ( 0,95,utf8_decode('PRIMERA VEZ   ').$PRIMERA_VEZ,0);
$this->_pdf->Rect(87, 61, 3,3 );

$this->_pdf->Cell(-240);
$this->_pdf->Cell ( 0,95,utf8_decode('SEGUIMIENTO  ').$SEGUIMIENTO,0);
$this->_pdf->Rect(127, 61, 3,3 );

$this->_pdf->Cell(-200);
$this->_pdf->Cell ( 0,95,utf8_decode('POR ALTO RIESGO DE LA FAMILIA  '.$POR_ALTO_RIESGO_DE_LA_FAMILIA),0);
$this->_pdf->Rect(193, 61, 3,3 );

$this->_pdf->Cell(-140);
$this->_pdf->Cell ( 0,95,utf8_decode('ENFERMEDAD DE ALTO RIESGO   ').$ENFERMEDAD_DE_ALTO_RIESGO,0);
$this->_pdf->Rect(250, 61, 3,3 );
$this->_pdf->Line(10, 65, 345,65);


$this->_pdf->Cell(-27);
$this->_pdf->Rect(314, 65, 31,139 );
$this->_pdf->Cell ( 0,105,utf8_decode('ACTIVIDADES'),0);
$this->_pdf->Cell(-28);
$this->_pdf->Cell ( 0,112,utf8_decode('EDUCATIVAS EN'),0);
$this->_pdf->Cell(-24);
$this->_pdf->Cell ( 0,119,utf8_decode('MEDIDAS'),0);
$this->_pdf->Cell(-27);
$this->_pdf->Cell ( 0,126,utf8_decode('PREVENTIVAS,'),0);
$this->_pdf->Cell(-31);
$this->_pdf->Cell ( 0,133,utf8_decode('ADMINISTRACIÓN DE'),0);
$this->_pdf->Cell(-28);
$this->_pdf->Cell ( 0,140,utf8_decode('TRATAMIENTO Y'),0);
$this->_pdf->Cell(-28);
$this->_pdf->Cell ( 0,147,utf8_decode('CUIDADOS DE LA'),0);
$this->_pdf->Cell(-26);
$this->_pdf->Cell ( 0,154,utf8_decode('ENFERMEDAD'),0);



$this->_pdf->Cell(-270);
$this->_pdf->Line(10, 69, 314,69);
$this->_pdf->Cell ( 0,105,utf8_decode('EVALUAR Y COMPLETAR LA INFORMACIÓN MARCANDO CON UNA X TODOS LOS SIGNOS QUE PRESENTE EL NIÑO   '),0);


$this->_pdf->Cell(-336);
$this->_pdf->Line(10, 69, 314,69);
$this->_pdf->Cell ( 0,112,utf8_decode('IDENTIFICACIÓN DE SIGNOS GENERALES DE PELIGRO'),0);


$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-336);
$this->_pdf->Line(10, 69, 314,69);
$this->_pdf->Cell ( 0,118,utf8_decode('NO PUEDE BEBER O TOMAR EL PECHO   ').$NO_PUEDE_BEBER_PECHO,0);
$this->_pdf->Rect(60, 72, 3,3 );
$this->_pdf->Cell(-336);
$this->_pdf->Line(10, 69, 314,69);
$this->_pdf->Cell ( 0,124,utf8_decode('NINGUNA DE LAS ANTERIORES                ').$NINGUNA_DE_LAS_ANTERIORES,0);
$this->_pdf->Rect(60, 75, 3,3 );

$this->_pdf->Cell(-260);
$this->_pdf->Cell ( 0,118,utf8_decode('LETARGICO ').$LETARGICO,0);
$this->_pdf->Rect(102, 72, 3,3 );

$this->_pdf->Cell(-220);
$this->_pdf->Cell ( 0,118,utf8_decode('INCONCIENTE   ').$INCONCIENTE,0);
$this->_pdf->Rect(146, 72, 3,3 );


$this->_pdf->Cell(-180);
$this->_pdf->Cell ( 0,118,utf8_decode('VOMITA TODO  ').$VOMITA_TODO,0);
$this->_pdf->Rect(186, 72, 3,3 );


$this->_pdf->Cell(-140);
$this->_pdf->Cell ( 0,118,utf8_decode('CONVULCIONES  ').$CONVULCIONES,0);
$this->_pdf->Rect(228, 72, 3,3 );
$this->_pdf->Line(10, 79, 314,79);


$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-270);
$this->_pdf->Line(10, 83, 314,83);
$this->_pdf->Cell ( 0,132,utf8_decode('EVALUAR Y COMPLETAR LA INFORMACIÓN MARCANDO CON UNA X O ESCRIBIENDO, SEGÚN CORRESPONDA   '),0);


$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-336);
$this->_pdf->Line(10, 83, 314,83);
$this->_pdf->Cell ( 0,140,utf8_decode('¿TIENE EL NIÑO O NIÑA PROBLEMAS DE SALUD BUCAL?'),0);

$this->_pdf->Cell(-253);
$this->_pdf->Cell ( 0,140,utf8_decode('SI  ').$SI_PROBLEMAS_DE_SALUD_ORAL,0);
$this->_pdf->Rect(97, 83, 3,3 );

$this->_pdf->Cell(-245);
$this->_pdf->Cell ( 0,140,utf8_decode('NO   ').$NO_PROBLEMAS_DE_SALUD_ORAL,0);
$this->_pdf->Rect(107, 83, 3,3 );

$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-336);
$this->_pdf->Line(10, 83, 314,83);
$this->_pdf->Cell ( 0,145,utf8_decode('¿N° DE VALORACIONES ODONTOLOGICAS EN EL AÑO?                        '.$N_DE_VALORACIONES_ODONTOLOGICAS_EN_EL_AÑO),0);
$this->_pdf->Rect(96, 86, 14,3 );

$this->_pdf->Cell(-204);
$this->_pdf->Cell ( 0,140,utf8_decode('¿HA TENIDO ALGÚN GOLPE EN LA BOCA? '),0);
$this->_pdf->Cell(-145);
$this->_pdf->Cell ( 0,140,utf8_decode('SI  '.$SI_HA_TENIDO_ALGÚN_GOLPE_EN_LA_BOCA),0);
$this->_pdf->Rect(205, 83, 3,3 );
$this->_pdf->Cell(-138);
$this->_pdf->Cell ( 0,140,utf8_decode('NO '.$NO_HA_TENIDO_ALGÚN_GOLPE_EN_LA_BOCA),0);
$this->_pdf->Rect(213, 83, 3,3 );


$this->_pdf->Cell(-234);
$this->_pdf->Cell ( 0,146,utf8_decode('¿DURANTE LA NOCHE DUERME SIN CEPILLARSE LOS DIENTES?  '),0);
$this->_pdf->Cell(-145);
$this->_pdf->Cell ( 0,146,utf8_decode('SI  '.$SI_DURANTE_LA_NOCHE_DUERME_SIN_CEPILLARSE_LOS_DIENTES),0);
$this->_pdf->Rect(205, 86, 3,3 );
$this->_pdf->Cell(-138);
$this->_pdf->Cell ( 0,146,utf8_decode('NO '.$NO_DURANTE_LA_NOCHE_DUERME_SIN_CEPILLARSE_LOS_DIENTES),0);
$this->_pdf->Rect(213, 86, 3,3 );

$this->_pdf->Cell(-210);
$this->_pdf->Cell ( 0,152,utf8_decode('¿LE SANGRA LA ENCIA CUANDO SE CEPILLA?  '),0);
$this->_pdf->Cell(-145);
$this->_pdf->Cell ( 0,152,utf8_decode('SI  '.$SI_LE_SANGRA_LA_ENCIA_CUANDO_SE_CEPILLA),0);
$this->_pdf->Rect(205, 89, 3,3 );
$this->_pdf->Cell(-138);
$this->_pdf->Cell ( 0,152,utf8_decode('NO '.$NO_LE_SANGRA_LA_ENCIA_CUANDO_SE_CEPILLA),0);
$this->_pdf->Rect(213, 89, 3,3 );

$this->_pdf->Cell(-120);
$this->_pdf->Cell ( 0,140,utf8_decode('¿CUANTAS VECES HACE IGIENE ORAL AL DIA?    '.$CUANTAS_VECES_HACE_HIGIANE_ORAL_AL_DIA),0);
$this->_pdf->Rect(290, 83, 6,3 );

$this->_pdf->Cell(-120);
$this->_pdf->Cell ( 0,146,utf8_decode('¿LE SUPERVISA EL CEPILLADO DE DIENTES?   '),0);


$this->_pdf->Cell(-56);
$this->_pdf->Cell ( 0,146,utf8_decode('SI  '.$SI_LE_SUPERVISA_EL_CEPILLADO_DE_DIENTES),0);
$this->_pdf->Rect(294, 86, 3,3 );
$this->_pdf->Cell(-46);
$this->_pdf->Cell ( 0,146,utf8_decode('NO '.$NO_LE_SUPERVISA_EL_CEPILLADO_DE_DIENTES),0);
$this->_pdf->Rect(305, 86, 3,3 );


$this->_pdf->Cell(-120);
$this->_pdf->Cell ( 0,152,utf8_decode('¿CON QUE HACE LA HIGIENIZACIÓN ORAL?:   '.$CON_QUE_HACE_HIGIENE_ORAL),0);
$this->_pdf->Line(278, 93, 312,93);
$this->_pdf->Line(10, 93, 314,93);

$this->_pdf->Cell(-302);
$this->_pdf->Cell ( 0,161,utf8_decode('¿TIENE EL NIÑO O NIÑA TOS?   '),0);


$this->_pdf->Cell(-258);
$this->_pdf->Cell ( 0,161,utf8_decode('SI   '.$SI_TIENE_EL_NIÑO_O_NIÑA_TOS),0);
$this->_pdf->Rect(92, 94, 3,3 );


$this->_pdf->Cell(-250);
$this->_pdf->Cell ( 0,161,utf8_decode('NO   '.$NO_TIENE_EL_NIÑO_O_NIÑA_TOS),0);
$this->_pdf->Rect(102, 94, 3,3 );


$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-213);
$this->_pdf->Cell ( 0,161,utf8_decode('¿N° DE DIAS QUE LLEVA CON TOS?                  '.$N_DE_DIAS_QUE_LLEVA_CON_TOS),0);
$this->_pdf->Rect(188, 94, 13,3 );


$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-120);
$this->_pdf->Cell ( 0,161,utf8_decode('¿TIENE TIRAJE SUCOTAL?  '),0);


$this->_pdf->Cell(-78);
$this->_pdf->Cell ( 0,161,utf8_decode('SI  '.$SI_TIENE_TIRAJE_SUCOTAL),0);
$this->_pdf->Rect(282, 94, 3,3 );


$this->_pdf->Cell(-70);
$this->_pdf->Cell ( 0,161,utf8_decode('NO  '.$NO_TIENE_TIRAJE_SUCOTAL),0);
$this->_pdf->Rect(272, 94, 3,3 );


$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-336);
$this->_pdf->Cell ( 0,168,utf8_decode('¿TIENE EL NIÑO O NIÑA DIFICULTAD PARA RESPIRAR?   '),0);


$this->_pdf->Cell(-258);
$this->_pdf->Cell ( 0,168,utf8_decode('SI   '.$SI_TIENE_EL_NIÑO_O_NIÑA_DIFICULTAD_PARA_RESPIRAR),0);
$this->_pdf->Rect(92, 97, 3,3 );


$this->_pdf->Cell(-250);
$this->_pdf->Cell ( 0,168,utf8_decode('NO   '.$NO_TIENE_EL_NIÑO_O_NIÑA_DIFICULTAD_PARA_RESPIRAR),0);
$this->_pdf->Rect(102, 97, 3,3 );


$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-230);
$this->_pdf->Cell ( 0,168,utf8_decode('¿N° DE DIAS CON DIFICULTAD PARA RESPIRAR ?                  '.$N_DE_DIAS_CON_DIFICULTAD_PARA_RESPIRAR),0);
$this->_pdf->Rect(188, 97, 13,3 );


$this->_pdf->Cell(-112);
$this->_pdf->Cell ( 0,168,utf8_decode('¿TIENE ESTRIDOR ?   '),0);

$this->_pdf->Cell(-78);
$this->_pdf->Cell ( 0,168,utf8_decode('SI  '.$SI_TIENE_ESTRIDOR),0);
$this->_pdf->Rect(282, 97, 3,3 );


$this->_pdf->Cell(-70);
$this->_pdf->Cell ( 0,168,utf8_decode('NO   '.$NO_TIENE_ESTRIDOR),0);
$this->_pdf->Rect(272, 97, 3,3 );


$this->_pdf->Cell(-312);
$this->_pdf->Cell ( 0,174,utf8_decode('¿N° DE RESPIRACIONES POR MINUTO?                '.$N_DE_RESPIRACIONES_POR_MINUTO),0);
$this->_pdf->Rect(92, 100, 13,3 );


$this->_pdf->Cell(-208);
$this->_pdf->Cell ( 0,174,utf8_decode('¿TIENE RESPIRACION RAPIDA ?   '),0);


$this->_pdf->Cell(-165);
$this->_pdf->Cell ( 0,173,utf8_decode('SI       '.$SI_TIENE_RESPIRACION_RAPIDA),0);
$this->_pdf->Rect(188, 100, 3,3 );


$this->_pdf->Cell(-154);
$this->_pdf->Cell ( 0,173,utf8_decode('NO   '.$NO_TIENE_RESPIRACION_RAPIDA),0);
$this->_pdf->Rect(198, 100, 3,3 );


$this->_pdf->Cell(-115);
$this->_pdf->Cell ( 0,174,utf8_decode('¿TIENE SIBILANCIAS ?   '),0);


$this->_pdf->Cell(-78);
$this->_pdf->Cell ( 0,173,utf8_decode('SI   '.$SI_TIENE_SIBILANCIAS),0);
$this->_pdf->Rect(282, 100, 3,3 );


$this->_pdf->Cell(-70);
$this->_pdf->Cell ( 0,173,utf8_decode('NO   '.$NO_TIENE_SIBILANCIAS),0);
$this->_pdf->Rect(272, 100, 3,3 );


$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-220);
$this->_pdf->Cell ( 0,182,utf8_decode('¿FRECUENCIA RESPIRATORIA RAPIDA?   '),0);


$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-336);
$this->_pdf->Cell ( 0,189,utf8_decode('MENOR DE 2 MESES MAYOR DE 60 RESPIRACIONES POR MINUTO'),0);
$this->_pdf->Rect(10, 108, 82,3 );
$this->_pdf->Cell(-240);
$this->_pdf->Cell ( 0,189,utf8_decode('DE 2 MESES A 5 AÑOS MAYOR DE 50 RESPIRACIONES POR MINUTO'),0);
$this->_pdf->Rect(105, 108, 86,3 );
$this->_pdf->Cell(-140);
$this->_pdf->Cell ( 0,189,utf8_decode('DE 12 MESES A 5 AÑOS MAYOR DE 40 RESPIRACIONES POR MINUTO'),0);
$this->_pdf->Rect(205, 108, 88,3 );
$this->_pdf->Line(10, 112, 314,112);


$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-336);
$this->_pdf->Cell ( 0,198,utf8_decode('¿EL NIÑO/NIÑA HA ESTADO EN CONTACTO CON PERSONAS CON TB?'),0);

$this->_pdf->Cell(-230);
$this->_pdf->Cell ( 0,198,utf8_decode('SI   '.$SI_EL_NIÑO_NIÑA_HA_ESTADO_EN_CONTACTO_CON_PERSONAS_CON_TB),0);
$this->_pdf->Rect(120, 112, 3,3 );


$this->_pdf->Cell(-220);
$this->_pdf->Cell ( 0,198,utf8_decode('NO   '.$NO_EL_NIÑO_NIÑA_HA_ESTADO_EN_CONTACTO_CON_PERSONAS_CON_TB),0);
$this->_pdf->Rect(132, 112, 3,3 );


$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-205);
$this->_pdf->Cell ( 0,198,utf8_decode('¿EL NIÑO/NIÑA HA ESTADO EN CONTACTO CON PERSONAS SINTOMATICAS RESPIRATORIAS ?'),0);


$this->_pdf->Cell(-80);
$this->_pdf->Cell ( 0,198,utf8_decode('SI   '.$SI_EL_NIÑO_NIÑA_HA_ESTADO_EN_CONTACTO_CON_PERSONAS_SINTOMATICAS_RESPIRATORIAS),0);
$this->_pdf->Rect(270, 113, 3,3 );


$this->_pdf->Cell(-70);
$this->_pdf->Cell ( 0,198,utf8_decode('NO   '.$NO_EL_NIÑO_NIÑA_HA_ESTADO_EN_CONTACTO_CON_PERSONAS_SINTOMATICAS_RESPIRATORIAS),0);
$this->_pdf->Rect(282, 113, 3,3 );


$this->_pdf->Cell(-298);
$this->_pdf->Cell ( 0,204,utf8_decode('¿TOS PERSISTENTE POR MAS DE 21 DIAS?'),0);


$this->_pdf->Cell(-230);
$this->_pdf->Cell ( 0,204,utf8_decode('SI   '.$SI_TOS_PERSISTENTE_POR_MAS_DE_21_DIAS),0);
$this->_pdf->Rect(120, 115, 3,3 );


$this->_pdf->Cell(-220);
$this->_pdf->Cell ( 0,204,utf8_decode('NO   '.$NO_TOS_PERSISTENTE_POR_MAS_DE_21_DIAS),0);
$this->_pdf->Rect(132, 115, 3,3 );


$this->_pdf->Cell(-170);
$this->_pdf->Cell ( 0,204,utf8_decode('¿PERDIDA O GANANCIA DE PESO EN LOS ULTIMOS TRES MESES?'),0);

$this->_pdf->Cell(-80);
$this->_pdf->Cell ( 0,205,utf8_decode('SI   '.$SI_PERDIDA_O_GANANCIA_DE_PESO_EN_LOS_ULTIMOS_TRES_MESES),0);
$this->_pdf->Rect(270, 116, 3,3 );


$this->_pdf->Cell(-70);
$this->_pdf->Cell ( 0,205,utf8_decode('NO   '.$NO_PERDIDA_O_GANANCIA_DE_PESO_EN_LOS_ULTIMOS_TRES_MESES),0);
$this->_pdf->Rect(282, 116, 3,3 );
$this->_pdf->Line(10, 120, 314,120);


$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-316);
$this->_pdf->Cell ( 0,214,utf8_decode('¿TIENE EL NIÑO DIARREA?'),0);


$this->_pdf->Cell(-270);
$this->_pdf->Cell ( 0,214,utf8_decode('SI  '.$SI_TIENE_EL_NIÑO_DIARREA),0);
$this->_pdf->Rect(80, 121, 3,3 );


$this->_pdf->Cell(-260);
$this->_pdf->Cell ( 0,214,utf8_decode('NO     '.$NO_TIENE_EL_NIÑO_DIARREA),0);
$this->_pdf->Rect(93, 121, 3,3 );


$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-225);
$this->_pdf->Cell ( 0,214,utf8_decode('¿FONTANELA O MOLLEJA HUNDIDA?'),0);


$this->_pdf->Cell(-172);
$this->_pdf->Cell ( 0,214,utf8_decode('SI     '.$SI_FONTANELA_O_MOLLEJA_HUNDIDA),0);
$this->_pdf->Rect(190, 121, 3,3 );


$this->_pdf->Cell(-162);
$this->_pdf->Cell ( 0,214,utf8_decode('NO   '.$NO_FONTANELA_O_MOLLEJA_HUNDIDA),0);
$this->_pdf->Rect(180, 121, 3,3 );


$this->_pdf->Cell(-130);
$this->_pdf->Cell ( 0,214,utf8_decode('¿INTRANQUILO O IRRITABLE?'),0);

$this->_pdf->Cell(-80);
$this->_pdf->Cell ( 0,214,utf8_decode('SI   '.$SI_INTRANQUILO_O_IRRITABLE),0);
$this->_pdf->Rect(270, 121, 3,3 );


$this->_pdf->Cell(-70);
$this->_pdf->Cell ( 0,214,utf8_decode('NO   '.$NO_INTRANQUILO_O_IRRITABLE),0);
$this->_pdf->Rect(282, 121, 3,3 );


$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-336);
$this->_pdf->Cell ( 0,222,utf8_decode('¿N° DE DIAS QUE EL NIÑ@ TIENE DIARREA?                           '.$N_DE_DIAS_QUE_EL_NIÑ_TIENE_DIARREA),0);
$this->_pdf->Rect(80, 124, 16,3 );

$this->_pdf->Cell(-215);
$this->_pdf->Cell ( 0,222,utf8_decode('¿BOCA SECA O MUCHA SED?'),0);


$this->_pdf->Cell(-172);
$this->_pdf->Cell ( 0,222,utf8_decode('SI     '.$SI_BOCA_SECA_O_MUCHA_SED),0);
$this->_pdf->Rect(190, 124, 3,3 );


$this->_pdf->Cell(-162);
$this->_pdf->Cell ( 0,222,utf8_decode('NO   '.$NO_BOCA_SECA_O_MUCHA_SED),0);
$this->_pdf->Rect(180, 124, 3,3 );


$this->_pdf->Cell(-115);
$this->_pdf->Cell ( 0,222,utf8_decode('¿OJOS HUNDIDOS?'),0);

$this->_pdf->Cell(-80);
$this->_pdf->Cell ( 0,222,utf8_decode('SI   '.$SI_OJOS_HUNDIDOS),0);
$this->_pdf->Rect(270, 124, 3,3 );


$this->_pdf->Cell(-70);
$this->_pdf->Cell ( 0,222,utf8_decode('NO   '.$NO_OJOS_HUNDIDOS),0);
$this->_pdf->Rect(282, 124, 3,3 );


$this->_pdf->Cell(-319);
$this->_pdf->Cell ( 0,229,utf8_decode('¿HAY SANGRE EN LAS HECES?'),0);

$this->_pdf->Cell(-270);
$this->_pdf->Cell ( 0,228,utf8_decode('SI   '.$SI_HAY_SANGRE_EN_LAS_HECES),0);
$this->_pdf->Rect(80, 127, 3,3 );


$this->_pdf->Cell(-260);
$this->_pdf->Cell ( 0,228,utf8_decode('NO     '.$NO_HAY_SANGRE_EN_LAS_HECES),0);
$this->_pdf->Rect(93, 127, 3,3 );


$this->_pdf->Cell(-240);
$this->_pdf->Cell ( 0,229,utf8_decode('¿PLIEGUE CUTÁNEO-MUY LENTO MAYOR 2 SEG?'),0);



$this->_pdf->Cell(-172);
$this->_pdf->Cell ( 0,230,utf8_decode('SI     '.$SI_PLIEGUE_CUTÁNEO_MUY_LENTO_MAYOR_2_SEG),0);
$this->_pdf->Rect(190, 128, 3,3 );


$this->_pdf->Cell(-162);
$this->_pdf->Cell ( 0,230,utf8_decode('NO   '.$NO_PLIEGUE_CUTÁNEO_MUY_LENTO_MAYOR_2_SEG),0);
$this->_pdf->Rect(180, 128, 3,3 );
$this->_pdf->Cell(-148);
$this->_pdf->Cell ( 0,229,utf8_decode('¿PLIEGUE CUTÁNEO-LENTO 2 SEG O MENOR?'),0);


$this->_pdf->Cell(-80);
$this->_pdf->Cell ( 0,229,utf8_decode('SI   '.$SI_PLIEGUE_CUTÁNEO_LENTO_2_SEG_O_MENOR),0);
$this->_pdf->Rect(270, 128, 3,3 );


$this->_pdf->Cell(-70);
$this->_pdf->Cell ( 0,229,utf8_decode('NO   '.$NO_PLIEGUE_CUTÁNEO_LENTO_2_SEG_O_MENOR),0);
$this->_pdf->Rect(282, 128, 3,3 );
$this->_pdf->Line(10, 132, 314,132);


$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-318);
$this->_pdf->Cell ( 0,239,utf8_decode('¿TIENE EL NIÑO O NIÑA FIEBRE?'),0);

$this->_pdf->Cell(-270);
$this->_pdf->Cell ( 0,239,utf8_decode('SI   '.$SI_TIENE_EL_NIÑO_O_NIÑA_FIEBRE),0);
$this->_pdf->Rect(80, 133, 3,3 );


$this->_pdf->Cell(-260);
$this->_pdf->Cell ( 0,239,utf8_decode('NO    '.$NO_TIENE_EL_NIÑO_O_NIÑA_FIEBRE),0);
$this->_pdf->Rect(93, 133, 3,3 );


$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-240);
$this->_pdf->Cell ( 0,239,utf8_decode('¿FIEBRE DE MAS DE 5 DÍAS,TODOS LOS DÍAS?'),0);


$this->_pdf->Cell(-172);
$this->_pdf->Cell ( 0,239,utf8_decode('SI     '.$SI_FIEBRE_DE_MAS_DE_5_DÍAS_TODOS_LOS_DÍAS),0);
$this->_pdf->Rect(190, 133, 3,3 );


$this->_pdf->Cell(-162);
$this->_pdf->Cell ( 0,239,utf8_decode('NO   '.$NO_FIEBRE_DE_MAS_DE_5_DÍAS_TODOS_LOS_DÍAS),0);
$this->_pdf->Rect(180, 133, 3,3 );


$this->_pdf->Cell(-326);
$this->_pdf->Cell ( 0,246,utf8_decode('¿N° DE DIAS QUE EL NIÑO TIENE FIEBRE?               '.$N_DE_DIAS_QUE_EL_NIÑO_TIENE_FIEBRE),0);


$this->_pdf->Cell(-222);
$this->_pdf->Cell ( 0,246,utf8_decode('¿RIGIDEZ DE NUCA?'),0);
$this->_pdf->Rect(80, 136, 16,3 );


$this->_pdf->Cell(-190);
$this->_pdf->Cell ( 0,246,utf8_decode('SI   '.$SI_RIGIDEZ_DE_NUCA),0);
$this->_pdf->Rect(160, 136, 3,3 );


$this->_pdf->Cell(-180);
$this->_pdf->Cell ( 0,246,utf8_decode('NO   '.$NO_RIGIDEZ_DE_NUCA),0);
$this->_pdf->Rect(172, 136, 3,3 );



$this->_pdf->Cell(-165);
$this->_pdf->Cell ( 0,246,utf8_decode('¿FIEBRE MAYOR DE 39°C?'),0);

$this->_pdf->Cell(-128);
$this->_pdf->Cell ( 0,246,utf8_decode('SI   '.$SI_FIEBRE_MAYOR_DE_39),0);
$this->_pdf->Rect(231, 136, 3,3 );


$this->_pdf->Cell(-120);
$this->_pdf->Cell ( 0,246,utf8_decode('NO  '.$NO_FIEBRE_MAYOR_DE_39),0);
$this->_pdf->Rect(222, 136, 3,3 );

$this->_pdf->Cell(-80);
$this->_pdf->Cell ( 0,246,utf8_decode('¿ASPECTO TOXICO?'),0);

$this->_pdf->Cell(-52);
$this->_pdf->Cell ( 0,246,utf8_decode('SI   '.$SI_ASPECTO_TOXICO),0);
$this->_pdf->Rect(298, 136, 3,3 );


$this->_pdf->Cell(-44);
$this->_pdf->Cell ( 0,246,utf8_decode('NO   '.$NO_ASPECTO_TOXICO),0);
$this->_pdf->Rect(308, 136, 3,3 );


$this->_pdf->Cell(-335);
$this->_pdf->Cell ( 0,253,utf8_decode('¿VIVE O VISITO ZONA DE RIESGO DE MALARIA?'),0);


$this->_pdf->Cell(-270);
$this->_pdf->Cell ( 0,253,utf8_decode('SI   '.$SI_VIVE_O_VISITO_ZONA_DE_RIESGO_DE_MALARIA),0);
$this->_pdf->Rect(80, 140, 3,3 );


$this->_pdf->Cell(-260);
$this->_pdf->Cell ( 0,253,utf8_decode('NO    '.$NO_VIVE_O_VISITO_ZONA_DE_RIESGO_DE_MALARIA),0);
$this->_pdf->Rect(93, 140, 3,3 );


$this->_pdf->Cell(-240);
$this->_pdf->Cell ( 0,253,utf8_decode('¿MANIFESTACIÓN DE SANGRADO?'),0);
$this->_pdf->Rect(80, 136, 16,3 );

$this->_pdf->Cell(-190);
$this->_pdf->Cell ( 0,253,utf8_decode('SI   '.$SI_MANIFESTACIÓN_DE_SANGRADO),0);
$this->_pdf->Rect(160, 139, 3,3 );


$this->_pdf->Cell(-180);
$this->_pdf->Cell ( 0,253,utf8_decode('NO   '.$NO_MANIFESTACIÓN_DE_SANGRADO),0);
$this->_pdf->Rect(172, 139, 3,3 );


$this->_pdf->Cell(-140);
$this->_pdf->Cell ( 0,253,utf8_decode('¿TOS?'),0);

$this->_pdf->Cell(-128);
$this->_pdf->Cell ( 0,253,utf8_decode('SI   '.$SI_TOS),0);
$this->_pdf->Rect(231, 139, 3,3 );


$this->_pdf->Cell(-120);
$this->_pdf->Cell ( 0,253,utf8_decode('NO  '.$NO_TOS),0);
$this->_pdf->Rect(222, 139, 3,3 );


$this->_pdf->Cell(-110);
$this->_pdf->Cell ( 0,253,utf8_decode('¿DOLOR ABDOMINAL CONTINUO INTENSO?'),0);

$this->_pdf->Cell(-52);
$this->_pdf->Cell ( 0,253,utf8_decode('SI   '.$SI_DOLOR_ABDOMINAL_CONTINUO_INTENSO),0);
$this->_pdf->Rect(298, 139, 3,3 );


$this->_pdf->Cell(-44);
$this->_pdf->Cell ( 0,253,utf8_decode('NO   '.$NO_DOLOR_ABDOMINAL_CONTINUO_INTENSO),0);
$this->_pdf->Rect(308, 139, 3,3 );


$this->_pdf->Cell(-334);
$this->_pdf->Cell ( 0,259,utf8_decode('¿VIVE O VISITO ZONA DE RIESGO DE DENGUE?'),0);


$this->_pdf->Cell(-270);
$this->_pdf->Cell ( 0,259,utf8_decode('SI   '.$SI_VIVE_O_VISITO_ZONA_DE_RIESGO_DE_DENGUE),0);
$this->_pdf->Rect(80, 143, 3,3 );


$this->_pdf->Cell(-260);
$this->_pdf->Cell ( 0,259,utf8_decode('NO     '.$NO_VIVE_O_VISITO_ZONA_DE_RIESGO_DE_DENGUE),0);
$this->_pdf->Rect(93, 143, 3,3 );


$this->_pdf->Cell(-226);
$this->_pdf->Cell ( 0,259,utf8_decode('¿PIEL HÚMEDA Y FRIA?'),0);
$this->_pdf->Rect(80, 136, 16,3 );


$this->_pdf->Cell(-190);
$this->_pdf->Cell ( 0,259,utf8_decode('SI   '.$SI_PIEL_HÚMEDA_Y_FRIA),0);
$this->_pdf->Rect(160, 142, 3,3 );


$this->_pdf->Cell(-180);
$this->_pdf->Cell ( 0,259,utf8_decode('NO   '.$NO_PIEL_HÚMEDA_Y_FRIA),0);
$this->_pdf->Rect(172, 142, 3,3 );


$this->_pdf->Cell(-144);
$this->_pdf->Cell ( 0,259,utf8_decode('¿CORIZA?'),0);
$this->_pdf->Rect(80, 136, 16,3 );


$this->_pdf->Cell(-128);
$this->_pdf->Cell ( 0,259,utf8_decode('SI   '.$SI_CORIZA),0);
$this->_pdf->Rect(231, 143, 3,3 );


$this->_pdf->Cell(-120);
$this->_pdf->Cell ( 0,259,utf8_decode('NO  '.$NO_CORIZA),0);
$this->_pdf->Rect(222, 143, 3,3 );


$this->_pdf->Cell(-88);
$this->_pdf->Cell ( 0,259,utf8_decode('¿PULSO RÁPIDO Y DÉBIL?'),0);


$this->_pdf->Cell(-52);
$this->_pdf->Cell ( 0,259,utf8_decode('SI   '.$SI_PULSO_RÁPIDO_Y_DÉBIL),0);
$this->_pdf->Rect(298, 143, 3,3 );


$this->_pdf->Cell(-44);
$this->_pdf->Cell ( 0,259,utf8_decode('NO   '.$NO_PULSO_RÁPIDO_Y_DÉBIL),0);
$this->_pdf->Rect(308, 143, 3,3 );


$this->_pdf->Cell(-286);
$this->_pdf->Cell ( 0,265,utf8_decode('¿ZONA?'),0);


$this->_pdf->Cell(-270);
$this->_pdf->Cell ( 0,265,utf8_decode('R   '.$ZONA_R),0);
$this->_pdf->Rect(80, 146, 3,3 );


$this->_pdf->Cell(-260);
$this->_pdf->Cell ( 0,265,utf8_decode('U       '.$ZONA_U),0);
$this->_pdf->Rect(93, 146, 3,3 );


$this->_pdf->Cell(-229);
$this->_pdf->Cell ( 0,265,utf8_decode('¿INQUIETO O IRRITABLE?'),0);


$this->_pdf->Cell(-190);
$this->_pdf->Cell ( 0,265,utf8_decode('SI   '.$SI_INQUIETO_O_IRRITABLE),0);
$this->_pdf->Rect(160, 145, 3,3 );


$this->_pdf->Cell(-180);
$this->_pdf->Cell ( 0,265,utf8_decode('NO   '.$NO_INQUIETO_O_IRRITABLE),0);
$this->_pdf->Rect(172, 145, 3,3 );


$this->_pdf->Cell(-149);
$this->_pdf->Cell ( 0,265,utf8_decode('¿OJOS ROJOS?'),0);
$this->_pdf->Rect(80, 136, 16,3 );


$this->_pdf->Cell(-128);
$this->_pdf->Cell ( 0,265,utf8_decode('SI   '.$SI_OJOS_ROJOS),0);
$this->_pdf->Rect(231, 146, 3,3 );


$this->_pdf->Cell(-120);
$this->_pdf->Cell ( 0,265,utf8_decode('NO  '.$NO_OJOS_ROJOS),0);
$this->_pdf->Rect(222, 146, 3,3 );

$this->_pdf->Cell(-108);
$this->_pdf->Cell ( 0,265,utf8_decode('¿ERUPCIÓN CUTÁNEA Y GENERALIZADA?'),0);


$this->_pdf->Cell(-52);
$this->_pdf->Cell ( 0,265,utf8_decode('SI   '.$SI_ERUPCIÓN_CUTÁNEA_Y_GENERALIZADA),0);
$this->_pdf->Rect(298, 146, 3,3 );


$this->_pdf->Cell(-44);
$this->_pdf->Cell ( 0,265,utf8_decode('NO   '.$NO_ERUPCIÓN_CUTÁNEA_Y_GENERALIZADA),0);
$this->_pdf->Rect(308, 146, 3,3 );
$this->_pdf->Line(10, 150, 314,150);


$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-336);
$this->_pdf->Cell ( 0,274,utf8_decode('RIESGO PARA CANCER INFANTIL / LEUCEMIAS'),0);


$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-204);
$this->_pdf->Cell ( 0,274,utf8_decode('¿FIEBRE POR MAS DE 14 DÍAS Y/O SUDORACIÓN?'),0);


$this->_pdf->Cell(-138);
$this->_pdf->Cell ( 0,274,utf8_decode('SI   '.$SI_FIEBRE_POR_MAS_DE_14_DÍAS_Y_O_SUDORACIÓN),0);
$this->_pdf->Rect(212, 150, 3,3 );


$this->_pdf->Cell(-129);
$this->_pdf->Cell ( 0,274,utf8_decode('NO  '.$NO_FIEBRE_POR_MAS_DE_14_DÍAS_Y_O_SUDORACIÓN),0);
$this->_pdf->Rect(222, 150, 3,3 );


$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-329);
$this->_pdf->Cell ( 0,282,utf8_decode('¿DOLOR DE CABEZA RECIENTE QUE AUMENTA?'),0);



$this->_pdf->Cell(-265);
$this->_pdf->Cell ( 0,282,utf8_decode('SI   '.$SI_DOLOR_DE_CABEZA_RECIENTE_QUE_AUMENTA),0);
$this->_pdf->Rect(85, 154, 3,3 );


$this->_pdf->Cell(-255);
$this->_pdf->Cell ( 0,282,utf8_decode('NO  '.$NO_DOLOR_DE_CABEZA_RECIENTE_QUE_AUMENTA),0);
$this->_pdf->Rect(96, 154, 3,3 );


$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-239);
$this->_pdf->Cell ( 0,282,utf8_decode('¿EL DOLOR DE CABEZA SE ACOMPAÑA DE OTROS SINTOMA COMO VOMITO?'),0);


$this->_pdf->Cell(-138);
$this->_pdf->Cell ( 0,282,utf8_decode('SI   '.$SI_EL_DOLOR_DE_CABEZA_SE_ACOMPAÑA_DE_OTROS_SINTOMA_COMO_VOMITO),0);
$this->_pdf->Rect(212, 154, 3,3 );


$this->_pdf->Cell(-129);
$this->_pdf->Cell ( 0,282,utf8_decode('NO  '.$NO_EL_DOLOR_DE_CABEZA_SE_ACOMPAÑA_DE_OTROS_SINTOMA_COMO_VOMITO),0);
$this->_pdf->Rect(222, 154, 3,3 );


$this->_pdf->Cell(-113);
$this->_pdf->Cell ( 0,282,utf8_decode('¿EL DOLOR DE HUESOS HA IDO EN AUMENTO?'),0);


$this->_pdf->Cell(-52);
$this->_pdf->Cell ( 0,282,utf8_decode('SI   '.$SI_EL_DOLOR_DE_HUESOS_HA_IDO_EN_AUMENTO),0);
$this->_pdf->Rect(298, 154, 3,3 );


$this->_pdf->Cell(-44);
$this->_pdf->Cell ( 0,282,utf8_decode('NO   '.$NO_EL_DOLOR_DE_HUESOS_HA_IDO_EN_AUMENTO),0);
$this->_pdf->Rect(308, 154, 3,3 );


$this->_pdf->Cell(-327);
$this->_pdf->Cell ( 0,289,utf8_decode('¿EL DOLOR DE CABEZA DESPIERTA AL NIÑ@?'),0);


$this->_pdf->Cell(-265);
$this->_pdf->Cell ( 0,289,utf8_decode('SI   '.$SI_EL_DOLOR_DE_CABEZA_DESPIERTA_AL_NIÑ),0);
$this->_pdf->Rect(85, 158, 3,3 );


$this->_pdf->Cell(-255);
$this->_pdf->Cell ( 0,289,utf8_decode('NO  '.$NO_EL_DOLOR_DE_CABEZA_DESPIERTA_AL_NIÑ),0);
$this->_pdf->Rect(96, 158, 3,3 );


$this->_pdf->Cell(-210);
$this->_pdf->Cell ( 0,289,utf8_decode('¿HA TENIDO DOLOR DE HUESOS EN EL ULTIMO MES?'),0);


$this->_pdf->Cell(-138);
$this->_pdf->Cell ( 0,289,utf8_decode('SI   '.$SI_HA_TENIDO_DOLOR_DE_HUESOS_EN_EL_ULTIMO_MES),0);
$this->_pdf->Rect(212, 158, 3,3 );


$this->_pdf->Cell(-129);
$this->_pdf->Cell ( 0,289,utf8_decode('NO  '.$NO_HA_TENIDO_DOLOR_DE_HUESOS_EN_EL_ULTIMO_MES),0);
$this->_pdf->Rect(222, 158, 3,3 );


$this->_pdf->Cell(-115);
$this->_pdf->Cell ( 0,289,utf8_decode('¿EN LOS ULTIMOS 3 MESES A TENIDO CAMBIOS'),0);
$this->_pdf->Cell(-115);
$this->_pdf->Cell ( 0,295,utf8_decode('COMO FATIGA, PERDIDA DE APETITO O PESO?'),0);


$this->_pdf->Cell(-52);
$this->_pdf->Cell ( 0,295,utf8_decode('SI   '.$SI_EN_LOS_ULTIMOS_3_MESES_A_TENIDO_CAMBIOS_COMO_FATIGA_PERDIDA_DE_PETITO_O_PESO),0);
$this->_pdf->Rect(298, 161, 3,3 );


$this->_pdf->Cell(-44);
$this->_pdf->Cell ( 0,295,utf8_decode('NO   '.$NO_EN_LOS_ULTIMOS_3_MESES_A_TENIDO_CAMBIOS_COMO_FATIGA_PERDIDA_DE_PETITO_O_PESO),0);
$this->_pdf->Rect(308, 161, 3,3 );


$this->_pdf->Cell(-336);
$this->_pdf->Cell ( 0,295,utf8_decode('¿N° DE DIAS QUE EL NIÑ@ TIENE DOLOR DE CABEZA?           '.$N_DE_DIAS_QUE_EL_NIÑ_TIENE_DOLOR_DE_CABEZA),0);
$this->_pdf->Rect(85, 161, 14,3 );

$this->_pdf->Cell(-225);
$this->_pdf->Cell ( 0,295,utf8_decode('¿DOLOR DE HUESOS INTERRUMPE LAS ACTIVIDADES DEL NIÑ@?'),0);


$this->_pdf->Cell(-138);
$this->_pdf->Cell ( 0,295,utf8_decode('SI   '.$SI_DOLOR_DE_HUESOS_INTERRUMPE_LAS_ACTIVIDADES_DEL_NIÑ),0);
$this->_pdf->Rect(212, 161, 3,3 );


$this->_pdf->Cell(-129);
$this->_pdf->Cell ( 0,295,utf8_decode('NO  '.$NO_DOLOR_DE_HUESOS_INTERRUMPE_LAS_ACTIVIDADES_DEL_NIÑ),0);
$this->_pdf->Rect(222, 161, 3,3 );
$this->_pdf->Line(10, 165, 314,165);


$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-336);
$this->_pdf->Cell ( 0,305,utf8_decode('¿EL NIÑO O NIÑA TIENE PROBLEMAS DE OIDO?'),0);


$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-265);
$this->_pdf->Cell ( 0,305,utf8_decode('SI   '.$SI_EL_NIÑO_O_NIÑA_TIENE_PROBLEMAS_DE_OIDO),0);
$this->_pdf->Rect(85, 166, 3,3 );


$this->_pdf->Cell(-255);
$this->_pdf->Cell ( 0,305,utf8_decode('NO   '.$NO_EL_NIÑO_O_NIÑA_TIENE_PROBLEMAS_DE_OIDO),0);
$this->_pdf->Rect(96, 166, 3,3 );


$this->_pdf->Cell(-235);
$this->_pdf->Cell ( 0,305,utf8_decode('¿TIENE SUPURACIÓN DE OÍDO?'),0);


$this->_pdf->Cell(-188);
$this->_pdf->Cell ( 0,305,utf8_decode('SI   '.$SI_TIENE_SUPURACIÓN_DE_OÍDO),0);
$this->_pdf->Rect(162, 166, 3,3 );


$this->_pdf->Cell(-179);
$this->_pdf->Cell ( 0,305,utf8_decode('NO  '.$NO_TIENE_SUPURACIÓN_DE_OÍDO),0);
$this->_pdf->Rect(172, 166, 3,3 );


$this->_pdf->Cell(-160);
$this->_pdf->Cell ( 0,305,utf8_decode('¿HACE CUANTOS DIAS?    '.$HACE_CUANTOS_DIAS),0);
$this->_pdf->Rect(218, 166, 10,3 );


$this->_pdf->Cell(-115);
$this->_pdf->Cell ( 0,305,utf8_decode('¿TUMEFACCIÓN/DOLOR ATRÁS DE LA OREJA?'),0);


$this->_pdf->Cell(-52);
$this->_pdf->Cell ( 0,305,utf8_decode('SI   '.$SI_TUMEFACCIÓN_DOLOR_ATRÁS_DE_LA_OREJA),0);
$this->_pdf->Rect(298, 166, 3,3 );


$this->_pdf->Cell(-44);
$this->_pdf->Cell ( 0,305,utf8_decode('NO   '.$NO_TUMEFACCIÓN_DOLOR_ATRÁS_DE_LA_OREJA),0);
$this->_pdf->Rect(308, 166, 3,3 );


$this->_pdf->Cell(-310);
$this->_pdf->Cell ( 0,312,utf8_decode('¿N° DE EPISODIOS PREVIOS?                       '.$N_DE_EPISODIOS_PREVIOS),0);
$this->_pdf->Rect(85, 169, 14,3 );
$this->_pdf->Line(10, 173, 314,173);


$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-265);
$this->_pdf->Cell ( 0,320,utf8_decode('¿EL NIÑO O NIÑA TIENE DESNUTRICIÓN Y/O ANEMIA?'),0);


$this->_pdf->Cell(-190);
$this->_pdf->Cell ( 0,320,utf8_decode('SI   '.$SI_EL_NIÑO_O_NIÑA_TIENE_DESNUTRICIÓN_Y_O_ANEMIA),0);
$this->_pdf->Rect(160, 173, 3,3 );


$this->_pdf->Cell(-180);
$this->_pdf->Cell ( 0,320,utf8_decode('NO   '.$NO_EL_NIÑO_O_NIÑA_TIENE_DESNUTRICIÓN_Y_O_ANEMIA),0);
$this->_pdf->Rect(172, 173, 3,3 );


$this->_pdf->Cell(-336);
$this->_pdf->Cell ( 0,327,utf8_decode('RETRASO EN EL CRECIMIENTO'),0);


$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-280);
$this->_pdf->Cell ( 0,327,utf8_decode('¿MUY INTENSO?    '.$RETRASO_EN_EL_CRECIMIENTO_MUY_INTENSO),0);
$this->_pdf->Rect(89, 177, 3,3 );



$this->_pdf->Rect(89, 180, 3,3 );$this->_pdf->Cell(-285);
$this->_pdf->Cell ( 0,334,utf8_decode('¿MENOS MARCADO?   '.$RETRASO_EN_EL_CRECIMIENTO_MENOS_MARCADO),0);



$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-249);
$this->_pdf->Cell ( 0,328,utf8_decode('PERDIDA DE TEJIDO MUSCULAR'),0);



$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-190);
$this->_pdf->Cell ( 0,328,utf8_decode('MUY MARCADA  '.$PERDIDA_DE_TEJIDO_MUSCULAR_MUY_MARCADA),0);
$this->_pdf->Rect(178, 177, 3,3 );


$this->_pdf->Cell(-183);
$this->_pdf->Cell ( 0,334,utf8_decode('MARCADA  '.$PERDIDA_DE_TEJIDO_MUSCULAR_MARCADA),0);
$this->_pdf->Rect(178, 180, 3,3 );



$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-162);
$this->_pdf->Cell ( 0,328,utf8_decode('TEJIDO ADIPOSO'),0);
$this->_pdf->Rect(178, 180, 3,3 );


$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-123);
$this->_pdf->Cell ( 0,328,utf8_decode('¿AUSENTE?  '.$TEJIDO_ADIPOSO_AUSENTE),0);
$this->_pdf->Rect(239, 180, 3,3 );


$this->_pdf->Cell(-135);
$this->_pdf->Cell ( 0,334,utf8_decode('¿POCO DISMINUIDO?   '.$TEJIDO_ADIPOSO_POCO_DISMINUIDO),0);
$this->_pdf->Rect(239, 177, 3,3 );


$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-100);
$this->_pdf->Cell ( 0,328,utf8_decode('¿EDEMA?   '),0);



$this->_pdf->Cell(-80);
$this->_pdf->Cell ( 0,328,utf8_decode('SI   '.$SI_EDEMA),0);
$this->_pdf->Rect(270, 177, 3,3 );


$this->_pdf->Cell(-70);
$this->_pdf->Cell ( 0,328,utf8_decode('NO   '.$NO_EDEMA),0);
$this->_pdf->Rect(282, 177, 3,3 );


$this->_pdf->Cell(-336);
$this->_pdf->Cell ( 0,342,utf8_decode('VALORACION DE LA CARA'),0);


$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-285);
$this->_pdf->Cell ( 0,342,utf8_decode('¿CARA DE VIEJITO?     '.$VALORACION_DE_LA_CARA_CARA_DE_VIEJITO),0);
$this->_pdf->Rect(89, 184, 3,3 );


$this->_pdf->Cell(-292);
$this->_pdf->Cell ( 0,348,utf8_decode('¿CARA DE LUNA LLENA?     '.$VALORACION_DE_LA_CARA_CARA_DE_LUNA_LLENA),0);
$this->_pdf->Rect(89, 187, 3,3 );


$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-249);
$this->_pdf->Cell ( 0,340,utf8_decode('EL SISTEMA ÓSEO'),0);


$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-222);
$this->_pdf->Cell ( 0,340,utf8_decode('¿ROSARIO COSTAL VISIBLE?    '.$EL_SISTEMA_ÓSEO_ROSARIO_COSTAL_VISIBLE),0);
$this->_pdf->Rect(163, 184, 3,3 );


$this->_pdf->Cell(-212);
$this->_pdf->Cell ( 0,346,utf8_decode('PIERNAS DE SABLE?     '.$EL_SISTEMA_ÓSEO_PIERNAS_DE_SABLE),0);
$this->_pdf->Rect(163, 187, 3,3 );



$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-176);
$this->_pdf->Cell ( 0,340,utf8_decode('COMPORTAMIENTO'),0);



$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-146);
$this->_pdf->Cell ( 0,340,utf8_decode('¿MIRADA DE ANGUSTIA?   '.$COMPORTAMIENTO_MIRADA_DE_ANGUSTIA),0);
$this->_pdf->Rect(234, 184, 3,3 );


$this->_pdf->Cell(-140);
$this->_pdf->Cell ( 0,346,utf8_decode('¿LLANTO / APATIA?     '.$COMPORTAMIENTO_LLANTO_APATIA),0);
$this->_pdf->Rect(234, 187, 3,3 );



$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-107);
$this->_pdf->Cell ( 0,340,utf8_decode('APETITO'),0);



$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-94);
$this->_pdf->Cell ( 0,340,utf8_decode('¿DISMINUIDO?  '.$APETITO_DISMINUIDO),0);
$this->_pdf->Rect(272, 184, 3,3 );


$this->_pdf->Cell(-95);
$this->_pdf->Cell ( 0,346,utf8_decode('¿AUMENTADO?  '.$APETITO_AUMENTADO),0);
$this->_pdf->Rect(272, 187, 3,3 );


$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-70);
$this->_pdf->Cell ( 0,340,utf8_decode('CABELLO'),0);


$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-56);
$this->_pdf->Cell ( 0,340,utf8_decode('¿ESCASO?   '.$CABELLO_ESCASO),0);
$this->_pdf->Rect(305, 184, 3,3 );


$this->_pdf->Cell(-53);
$this->_pdf->Cell ( 0,346,utf8_decode('¿DEBIL?   '.$CABELLO_DEBIL),0);
$this->_pdf->Rect(305, 187, 3,3 );
$this->_pdf->Line(10, 192, 314,192);



$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-336);
$this->_pdf->Cell ( 0,359,utf8_decode('PERÍMETRO BRANQUIAL:'),0);


$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-290);
$this->_pdf->Cell ( 0,359,utf8_decode('COLOR: MARCA EL COLOR OBTENIDO AL MEDIR LA CIRCUNFERENCIA EN EL PUNTO MEDIO DEL BRAZO'),0);


$this->_pdf->Cell(-290);
$this->_pdf->Cell ( 0,369,utf8_decode('ROJO    '.$COLOR_ROJO),0);
$this->_pdf->Rect(65, 198, 3,3 );


$this->_pdf->Cell(-270);
$this->_pdf->Cell ( 0,369,utf8_decode('NARANJA  '.$COLOR_NARANJA),0);
$this->_pdf->Rect(90, 198, 3,3 );


$this->_pdf->Cell(-245);
$this->_pdf->Cell ( 0,369,utf8_decode('AMARILLO   '.$COLOR_AMARILLO),0);
$this->_pdf->Rect(117, 198, 3,3 );


$this->_pdf->Cell(-215);
$this->_pdf->Cell ( 0,369,utf8_decode('VERDE     '.$COLOR_VERDE),0);
$this->_pdf->Rect(143, 198, 3,3 );


$this->_pdf->Cell(-185);
$this->_pdf->Cell ( 0,369,utf8_decode('MEDIDA  '.$MEDIDA),0);
$this->_pdf->Rect(173, 198, 13,3 );
//FIN PRIMERA HOJA-----------------------------------------------------------------------------------------------------------------------------
$this->_pdf->AddPage();
$this->_pdf->Rect(10, 28, 335,150 );
$this->_pdf->Line(10, 32, 314,32);
$this->_pdf->Image('c:\xampp\htdocs\ProyectoAPS\views\layout\default\img\logo_gobernacion.jpg',10,5,30);
    // Arial bold 15
    $this->_pdf->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->_pdf->Cell(54);
    // Título
    $this->_pdf->Cell(1,5,utf8_decode('DEPARTAMENTO DE CUNDINAMARCA - SECRETARIA DE SALUD - DIRECCIÓN SALUD PUBLICA'),'C');
    // Salto de línea
    $this->_pdf->Ln(5);
    $this->_pdf->Cell(80);
    $this->_pdf->Cell(3,5,utf8_decode('ATENCION INFANTIL - NIÑOS Y NIÑAS MENORES DE 5 AÑOS - AIEPI'),'C');
//---------------------------------------------------------------------------------------------------------------------------------------------
$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Rect(314, 28, 31,150 );
$this->_pdf->Cell(226);
$this->_pdf->Cell ( 0,37,utf8_decode('ACTIVIDADES'),0);
$this->_pdf->Cell(-28);
$this->_pdf->Cell ( 0,43,utf8_decode('EDUCATIVAS EN'),0);
$this->_pdf->Cell(-24);
$this->_pdf->Cell ( 0,49,utf8_decode('MEDIDAS'),0);
$this->_pdf->Cell(-27);
$this->_pdf->Cell ( 0,55,utf8_decode('PREVENTIVAS,'),0);
$this->_pdf->Cell(-31);
$this->_pdf->Cell ( 0,61,utf8_decode('ADMINISTRACIÓN DE'),0);
$this->_pdf->Cell(-28);
$this->_pdf->Cell ( 0,67,utf8_decode('TRATAMIENTO Y'),0);
$this->_pdf->Cell(-28);
$this->_pdf->Cell ( 0,73,utf8_decode('CUIDADOS DE LA'),0);
$this->_pdf->Cell(-26);
$this->_pdf->Cell ( 0,79,utf8_decode('ENFERMEDAD'),0);


$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-220);
$this->_pdf->Cell ( 0,30,utf8_decode('APLICACIÓN DE MEDIDAS DE PROTECCIÓN DE LA SALUD'),0);


$this->_pdf->Cell(-336);
$this->_pdf->Cell ( 0,39,utf8_decode('NIÑO O NIÑA MENORES DE 6 MESES'),0);


$this->_pdf->Cell(-260);
$this->_pdf->Cell ( 0,39,utf8_decode('¿EL LACTANTE TOMA SENO?'),0);


$this->_pdf->Cell(-214);
$this->_pdf->Cell ( 0,39,utf8_decode('SI  '.$LACTANTE_TOMA_SENO_SI),0);
$this->_pdf->Rect(136, 33, 3,3 );


$this->_pdf->Cell(-204);
$this->_pdf->Cell ( 0,39,utf8_decode('NO   '.$LACTANTE_TOMA_SENO_NO),0);
$this->_pdf->Rect(148, 33, 3,3 );


$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-326);
$this->_pdf->Cell ( 0,46,utf8_decode('¿CUANTAS VECEZ TOMA SENO AL DÍA?      '.$NUM_VECES_TOMA_SENO_AL_DIA),0);
$this->_pdf->Rect(73, 36, 10,3 );


$this->_pdf->Cell(-335);
$this->_pdf->Cell ( 0,52,utf8_decode('¿CUANTAS VECEZ TOMA SENO EN LA NOCHE?      '.$NUM_VECES_TOMA_SENO_AL_NOCHE),0);
$this->_pdf->Rect(73, 39, 10,3 );


$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-250);
$this->_pdf->Cell ( 0,46,utf8_decode('¿LA POSICIÓN?'),0);
$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-217);
$this->_pdf->Cell ( 0,46,utf8_decode('¿EL LACTANTE ESTA EN DIRECCIÓN AL PECHO DE LA MADRE,'),0);
$this->_pdf->Rect(210, 39, 3,3 );
$this->_pdf->Cell(-183);
$this->_pdf->Cell ( 0,52,utf8_decode('CON LA NARIZ FRENTE AL PEZÓN?     '.$NARIZ_FRENTE_AL_PEZON),0);


$this->_pdf->Cell(-211);
$this->_pdf->Cell ( 0,58,utf8_decode('¿EL CUERPO DEL LACTANTE ESTE FRENTE A LA MADRE?     '.$CUERPO_FRENTE_A_LA_MADRE),0);
$this->_pdf->Rect(210, 42, 3,3 );


$this->_pdf->Cell(-205);
$this->_pdf->Cell ( 0,64,utf8_decode('¿LA MADRE SOSTIENE TODO EL CUERPO DEL NIÑO?      '.$MADRE_SOSTIENE_NIÑO),0);
$this->_pdf->Rect(210, 45, 3,3 );


$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-130);
$this->_pdf->Cell ( 0,46,utf8_decode('¿AGARRE?'),0);


$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-100);
$this->_pdf->Cell ( 0,46,utf8_decode('¿EL MENTON TOCA EL SENO?   '.$MENOR_TOCA_SENO),0);
$this->_pdf->Rect(285, 36, 3,3 );


$this->_pdf->Cell(-118);
$this->_pdf->Cell ( 0,52,utf8_decode('¿EL LABIO INFERIOR ESTA HACIA AFUERA?   '.$LABIO_INFERIOR_AFUERA),0);
$this->_pdf->Rect(285, 39, 3,3 );


$this->_pdf->Cell(-118);
$this->_pdf->Cell ( 0,58,utf8_decode('¿AUREOLA SE VE MAS ARRIBA QUE ABAJO?  '.$AUREOLA_MAS_ARRIBA),0);
$this->_pdf->Rect(285, 42, 3,3 );


$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-326);
$this->_pdf->Cell ( 0,64,utf8_decode('¿TIENE ALGUNA'),0);
$this->_pdf->Cell(-321);
$this->_pdf->Cell ( 0,70,utf8_decode('DIFICULTAD'),0);
$this->_pdf->Cell(-335);
$this->_pdf->Cell ( 0,76,utf8_decode('PARA AMAMANTARLO?'),0);



$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-277);
$this->_pdf->Cell ( 0,58,utf8_decode('¿NO LACTA?   '.$NO_LACTA),0);
$this->_pdf->Rect(87, 42, 3,3 );


$this->_pdf->Cell(-292);
$this->_pdf->Cell ( 0,64,utf8_decode('¿NO TIENE DIFICULTAD?   '.$NO_TIENE_DIFICULTAD),0);
$this->_pdf->Rect(87, 45, 3,3 );


$this->_pdf->Cell(-276);
$this->_pdf->Cell ( 0,70,utf8_decode('¿LE DUELE?   '.$LE_DUELE),0);
$this->_pdf->Rect(87, 48, 3,3 );


$this->_pdf->Cell(-288);
$this->_pdf->Cell ( 0,76,utf8_decode('¿NO LE BAJA LECHE?   '.$NO_LE_BAJA_LECHE),0);
$this->_pdf->Rect(87, 51, 3,3 );


$this->_pdf->Cell(-295);
$this->_pdf->Cell ( 0,82,utf8_decode('¿PRODUCE MUCHA LECHE?   '.$PRODUCE_MUCHA_LECHE),0);
$this->_pdf->Rect(87, 54, 3,3 );


$this->_pdf->Cell(-294);
$this->_pdf->Cell ( 0,88,utf8_decode('¿LACERACIÓN DE PEZÓN?   '.$LACERACION_PEZON),0);
$this->_pdf->Rect(87, 57, 3,3 );


$this->_pdf->Cell(-288);
$this->_pdf->Cell ( 0,94,utf8_decode('¿HOSPITALIZACIÓN?    '.$HOSPITALIZACION),0);
$this->_pdf->Rect(87, 60, 3,3 );


$this->_pdf->Cell(-273);
$this->_pdf->Cell ( 0,100,utf8_decode('¿OTROS?    '.$OTROS_DIFICULTAD_AMAMANTAR),0);
$this->_pdf->Rect(87, 63, 3,3 );


$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-250);
$this->_pdf->Cell ( 0,71,utf8_decode('¿EL LACTANTE RESIVE'),0);
$this->_pdf->Cell(-243);
$this->_pdf->Cell ( 0,77,utf8_decode('HABITUALMENTE'),0);
$this->_pdf->Cell(-247);
$this->_pdf->Cell ( 0,83,utf8_decode('OTROS ALIMENTOS?'),0);


$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-210);
$this->_pdf->Cell ( 0,75,utf8_decode('¿OTRA LECHE?   '.$OTRA_LECHE),0);
$this->_pdf->Rect(157, 51, 3,3 );


$this->_pdf->Cell(-201);
$this->_pdf->Cell ( 0,81,utf8_decode('¿JUGO?    '.$JUGO),0);
$this->_pdf->Rect(157, 54, 3,3 );


$this->_pdf->Cell(-202);
$this->_pdf->Cell ( 0,86,utf8_decode('¿AGUA?    '.$AGUA),0);
$this->_pdf->Rect(157, 57, 3,3 );


$this->_pdf->Cell(-205);
$this->_pdf->Cell ( 0,92,utf8_decode('¿COLADA?    '.$COLADA),0);
$this->_pdf->Rect(157, 60, 3,3 );


$this->_pdf->Cell(-206);
$this->_pdf->Cell ( 0,98,utf8_decode('¿PAPILLAS?   '.$PAPILLA),0);
$this->_pdf->Rect(157, 63, 3,3 );


$this->_pdf->Cell(-208);
$this->_pdf->Cell ( 0,104,utf8_decode('¿NO RECIbE?     '.$NO_RECIBE),0);
$this->_pdf->Rect(157, 66, 3,3 );


$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-180);
$this->_pdf->Cell ( 0,74,utf8_decode('¿ESTOS ALIMENTOS '),0);
$this->_pdf->Cell(-171);
$this->_pdf->Cell ( 0,80,utf8_decode('CONTIENEN?'),0);


$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-144);
$this->_pdf->Cell ( 0,75,utf8_decode('¿SAL?     '.$CONTIENEN_SAL),0);
$this->_pdf->Rect(213, 54, 3,3 );


$this->_pdf->Cell(-149);
$this->_pdf->Cell ( 0,81,utf8_decode('¿AZUCAR?    '.$CONTIENEN_AZUCAR),0);
$this->_pdf->Rect(213, 51, 3,3 );


$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-115);
$this->_pdf->Cell ( 0,74,utf8_decode('¿QUE UTILIZA PARA '),0);
$this->_pdf->Cell(-125);
$this->_pdf->Cell ( 0,80,utf8_decode('ALIMENTAR AL LACTANTE?'),0);


$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-79);
$this->_pdf->Cell ( 0,74,utf8_decode('¿TETERO?  '.$TETERO),0);
$this->_pdf->Rect(281, 50, 3,3 );


$this->_pdf->Cell(-76);
$this->_pdf->Cell ( 0,80,utf8_decode('¿TASA?  '.$TASA),0);
$this->_pdf->Rect(281, 53, 3,3 );


$this->_pdf->Cell(-82);
$this->_pdf->Cell ( 0,86,utf8_decode('¿CUCHARA?  '.$CUCHARA),0);
$this->_pdf->Rect(281, 56, 3,3 );


$this->_pdf->Cell(-77);
$this->_pdf->Cell ( 0,92,utf8_decode('¿OTRO?   '.$OTRO_UTIL_ALIMENTAR),0);
$this->_pdf->Rect(281, 59, 3,3 );
$this->_pdf->Line(10, 69, 314,69);


$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-335);
$this->_pdf->Cell ( 0,112,utf8_decode('NIÑO O NIÑA DE 6 MESES A 5 AÑOS'),0);


$this->_pdf->Cell(-280);
$this->_pdf->Cell ( 0,112,utf8_decode('¿EL NIÑO TOMA SENO?'),0);

$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-245);
$this->_pdf->Cell ( 0,112,utf8_decode('SI  '.$NIÑO_MAS_6MESES_TOMA_SENO_SI),0);
$this->_pdf->Rect(105, 69, 3,3 );


$this->_pdf->Cell(-235);
$this->_pdf->Cell ( 0,112,utf8_decode('NO  '.$NIÑO_MAS_6MESES_TOMA_SENO_NO),0);
$this->_pdf->Rect(116, 69, 3,3 );


$this->_pdf->Cell(-315); 
$this->_pdf->Cell ( 0,119,utf8_decode('¿CUANTAS VECES TOMA SENO EN EL DÍA?            '.$NUM_VECES_TOMA_SENO_AL_DIA_6MESES),0);
$this->_pdf->Rect(90, 73, 10,3 );


$this->_pdf->Cell(-320);
$this->_pdf->Cell ( 0,125,utf8_decode('¿CUANTAS VECES TOMA SENO EN LA NOCHE?             '.$NUM_VECES_TOMA_SENO_AL_NOCHE_6MESES),0);
$this->_pdf->Rect(90, 76, 10,3 );


$this->_pdf->Cell(-336);
$this->_pdf->Cell ( 0,131,utf8_decode('¿QUE ALIMENTOS LE DA CON MAYOR FRECUENCIA AL NIÑ@?  '.$ALIMENTOS_CON_MAYOR_FRECUENCIA),0);


$this->_pdf->Cell(-336);
$this->_pdf->Cell ( 0,139,utf8_decode('¿ESTA EN UN PROGRAMA DE RECUPERACIÓN NUTRICIONAL?'),0);
$this->_pdf->Line(88, 82, 155,82);


$this->_pdf->Cell(-245);
$this->_pdf->Cell ( 0,139,utf8_decode('SI  '.$ESTA_PROGRAMA_NUTRICIONAL_SI ),0);
$this->_pdf->Rect(105, 83, 3,3 );


$this->_pdf->Cell(-235);
$this->_pdf->Cell ( 0,139,utf8_decode('NO '.$ESTA_PROGRAMA_NUTRICIONAL_NO),0);
$this->_pdf->Rect(116, 83, 3,3 );


$this->_pdf->Cell(-336);
$this->_pdf->Cell ( 0,146,utf8_decode('¿CUAL?  '.$CUAL_PROGRAMA_NUTRICIONAL),0);
$this->_pdf->Line(20, 89, 155,89);


$this->_pdf->Cell(-220);
$this->_pdf->Cell ( 0,118,utf8_decode('¿EL NIÑO USA BIBERON?'),0);


$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-180);
$this->_pdf->Cell ( 0,118,utf8_decode('SI   '.$NIÑO_USA_BIBERON_SI),0);
$this->_pdf->Rect(170, 72, 3,3 );


$this->_pdf->Cell(-170);
$this->_pdf->Cell ( 0,118,utf8_decode('NO   '.$NIÑO_USA_BIBERON_NO),0);
$this->_pdf->Rect(182, 72, 3,3 );


$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-177);
$this->_pdf->Cell ( 0,128,utf8_decode('¿QUÉ TOMA EL NIÑ@?'),0);


$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-146);
$this->_pdf->Cell ( 0,118,utf8_decode('AGUADEPANELA    '.$TOMA_AGUADEPANELA),0);
$this->_pdf->Rect(224, 72, 3,3 );


$this->_pdf->Cell(-133);
$this->_pdf->Cell ( 0,124,utf8_decode('LECHE    '.$TOMA_LECHE),0);
$this->_pdf->Rect(224, 75, 3,3 );


$this->_pdf->Cell(-135);
$this->_pdf->Cell ( 0,130,utf8_decode('COLADA   '.$TOMA_COLADA),0);
$this->_pdf->Rect(224, 78, 3,3 );


$this->_pdf->Cell(-131);
$this->_pdf->Cell ( 0,136,utf8_decode('SOPA    '.$TOMA_SOPA),0);
$this->_pdf->Rect(224, 81, 3,3 );


$this->_pdf->Cell(-136);
$this->_pdf->Cell ( 0,142,utf8_decode('GASEOSA   '.$TOMA_GASEOSA),0);
$this->_pdf->Rect(224, 84, 3,3 );


$this->_pdf->Cell(-131);
$this->_pdf->Cell ( 0,148,utf8_decode('OTRO   '.$TOMA_OTRO),0);
$this->_pdf->Rect(224, 87, 3,3 );



$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-116);
$this->_pdf->Cell ( 0,118,utf8_decode('¿CUÁL ES LA CONCISTENCIA'),0);


$this->_pdf->Cell(-106);
$this->_pdf->Cell ( 0,124,utf8_decode('DE LOS ALIMENTOS?'),0);


$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-70);
$this->_pdf->Cell ( 0,118,utf8_decode('LIQUIDA    '.$CONS_LIQUIDA),0);
$this->_pdf->Rect(290, 72, 3,3 );


$this->_pdf->Cell(-68);
$this->_pdf->Cell ( 0,124,utf8_decode('CREMA    '.$CONS_CREMA),0);
$this->_pdf->Rect(290, 75, 3,3 );


$this->_pdf->Cell(-70);
$this->_pdf->Cell ( 0,130,utf8_decode('PAPILLA     '.$CONS_PAPILLA),0);
$this->_pdf->Rect(290, 78, 3,3 );


$this->_pdf->Cell(-66);
$this->_pdf->Cell ( 0,136,utf8_decode('OTRO    '.$CONS_OTRO),0);
$this->_pdf->Rect(290, 81, 3,3 );


$this->_pdf->Cell(-110);
$this->_pdf->Cell ( 0,145,utf8_decode('¿EL NIÑO COME SOLO?'),0);


$this->_pdf->Cell(-78);
$this->_pdf->Cell ( 0,145,utf8_decode('SI    '.$NIÑO_COME_SOLO_SI),0);
$this->_pdf->Rect(273, 86, 3,3 );


$this->_pdf->Cell(-68);
$this->_pdf->Cell ( 0,145,utf8_decode('NO   '.$NIÑO_COME_SOLO_NO),0);
$this->_pdf->Rect(284, 86, 3,3 );
$this->_pdf->Line(10, 90, 314,90);


$this->_pdf->Cell(-210);
$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell ( 0,154,utf8_decode('EVALUE EL DESARROLLO'),0);
$this->_pdf->Line(10, 94, 314,94);


$this->_pdf->Cell(-334);
$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell ( 0,163,utf8_decode('¿A LOS 3 MESES LEVANTA LA CABEZA?'),0);


$this->_pdf->Cell(-283);
$this->_pdf->Cell ( 0,163,utf8_decode('SI  '.$OP_3MESES_DESARROLLO_SI),0);
$this->_pdf->Rect(67, 95, 3,3 );


$this->_pdf->Cell(-273);
$this->_pdf->Cell ( 0,163,utf8_decode('NO   '.$OP_3MESES_DESARROLLO_NO),0);
$this->_pdf->Rect(79, 95, 3,3 );


$this->_pdf->Cell(-263);
$this->_pdf->Cell ( 0,163,utf8_decode('N/A  '.$OP_3MESES_DESARROLLO_NA),0);
$this->_pdf->Rect(89, 95, 3,3 );


$this->_pdf->Cell(-235);
$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell ( 0,163,utf8_decode('¿A LOS 16 MESES CAMINA SOLO?'),0);


$this->_pdf->Cell(-190);
$this->_pdf->Cell ( 0,163,utf8_decode('SI  '.$OP_16MESES_DESARROLLO_SI),0);
$this->_pdf->Rect(160, 95, 3,3 );


$this->_pdf->Cell(-180);
$this->_pdf->Cell ( 0,163,utf8_decode('NO   '.$OP_16MESES_DESARROLLO_NO),0);
$this->_pdf->Rect(172, 95, 3,3 );


$this->_pdf->Cell(-170);
$this->_pdf->Cell ( 0,163,utf8_decode('N/A  '.$OP_16MESES_DESARROLLO_NA),0);
$this->_pdf->Rect(182, 95, 3,3 );


$this->_pdf->Cell(-145);
$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell ( 0,163,utf8_decode('¿A LOS 36 MESES SUBE/BAJA ESCALERAS SOLO?'),0);


$this->_pdf->Cell(-79);
$this->_pdf->Cell ( 0,163,utf8_decode('SI  '.$OP_36MESES_DESARROLLO_SI),0);
$this->_pdf->Rect(271, 95, 3,3 );


$this->_pdf->Cell(-69);
$this->_pdf->Cell ( 0,163,utf8_decode('NO  '.$OP_36MESES_DESARROLLO_NO),0);
$this->_pdf->Rect(282, 95, 3,3 );


$this->_pdf->Cell(-59);
$this->_pdf->Cell ( 0,163,utf8_decode('N/A  '.$OP_36MESES_DESARROLLO_NA),0);
$this->_pdf->Rect(293, 95, 3,3 );


$this->_pdf->Cell(-336);
$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell ( 0,169,utf8_decode('¿A LOS 6 MESES SE SIENTA CON APOYO?'),0);


$this->_pdf->Cell(-283);
$this->_pdf->Cell ( 0,169,utf8_decode('SI  '.$OP_6MESES_DESARROLLO_SI),0);
$this->_pdf->Rect(67, 98, 3,3 );


$this->_pdf->Cell(-273);
$this->_pdf->Cell ( 0,169,utf8_decode('NO   '.$OP_6MESES_DESARROLLO_NO),0);
$this->_pdf->Rect(79, 98, 3,3 );


$this->_pdf->Cell(-263);
$this->_pdf->Cell ( 0,169,utf8_decode('N/A  '.$OP_6MESES_DESARROLLO_NA),0);
$this->_pdf->Rect(89, 98, 3,3 );

$this->_pdf->Cell(-336);
$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell ( 0,176,utf8_decode('¿A LOS 9 MESES SE SIENTA POR SI SOLO?'),0);


$this->_pdf->Cell(-283);
$this->_pdf->Cell ( 0,176,utf8_decode('SI  '.$OP_9MESES_DESARROLLO_SI),0);
$this->_pdf->Rect(67, 101, 3,3 );


$this->_pdf->Cell(-273);
$this->_pdf->Cell ( 0,176,utf8_decode('NO   '.$OP_9MESES_DESARROLLO_NO),0);
$this->_pdf->Rect(79, 101, 3,3 );


$this->_pdf->Cell(-263);
$this->_pdf->Cell ( 0,176,utf8_decode('N/A  '.$OP_9MESES_DESARROLLO_NA),0);
$this->_pdf->Rect(89, 101, 3,3 );


$this->_pdf->Cell(-336);
$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell ( 0,183,utf8_decode('¿A LOS 12 MESES CAMINA CON APOYO?'),0);


$this->_pdf->Cell(-283);
$this->_pdf->Cell ( 0,183,utf8_decode('SI  '.$OP_12MESES_DESARROLLO_SI),0);
$this->_pdf->Rect(67, 105, 3,3 );


$this->_pdf->Cell(-273);
$this->_pdf->Cell ( 0,183,utf8_decode('NO   '.$OP_12MESES_DESARROLLO_NO),0);
$this->_pdf->Rect(79, 105, 3,3 );


$this->_pdf->Cell(-263);
$this->_pdf->Cell ( 0,183,utf8_decode('N/A  '.$OP_12MESES_DESARROLLO_NA),0);
$this->_pdf->Rect(89, 105, 3,3 );


$this->_pdf->Cell(-236);
$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell ( 0,170,utf8_decode('¿A LOS 20 MESES CORRE RÁPIDO?'),0);


$this->_pdf->Cell(-190);
$this->_pdf->Cell ( 0,170,utf8_decode('SI  '.$OP_20MESES_DESARROLLO_SI),0);
$this->_pdf->Rect(160, 98, 3,3 );


$this->_pdf->Cell(-180);
$this->_pdf->Cell ( 0,170,utf8_decode('NO   '.$OP_20MESES_DESARROLLO_NO),0);
$this->_pdf->Rect(172, 98, 3,3 );


$this->_pdf->Cell(-170);
$this->_pdf->Cell ( 0,170,utf8_decode('N/A  '.$OP_20MESES_DESARROLLO_NA),0);
$this->_pdf->Rect(182, 98, 3,3 );


$this->_pdf->Cell(-240);
$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell ( 0,177,utf8_decode('¿A LOS 24 MESES PATEA LA PELOTA?'),0);


$this->_pdf->Cell(-190);
$this->_pdf->Cell ( 0,177,utf8_decode('SI  '.$OP_24MESES_DESARROLLO_SI),0);
$this->_pdf->Rect(160, 101, 3,3 );


$this->_pdf->Cell(-180);
$this->_pdf->Cell ( 0,177,utf8_decode('NO   '.$OP_24MESES_DESARROLLO_NO),0);
$this->_pdf->Rect(172, 101, 3,3 );


$this->_pdf->Cell(-170);
$this->_pdf->Cell ( 0,177,utf8_decode('N/A  '.$OP_24MESES_DESARROLLO_NA),0);
$this->_pdf->Rect(182, 101, 3,3 );


$this->_pdf->Cell(-250);
$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell ( 0,184,utf8_decode('¿A LOS 30 MESES SE EMPINA EN AMBOS PIES?'),0);


$this->_pdf->Cell(-190);
$this->_pdf->Cell ( 0,184,utf8_decode('SI  '.$OP_30MESES_DESARROLLO_SI),0);
$this->_pdf->Rect(160, 105, 3,3 );


$this->_pdf->Cell(-180);
$this->_pdf->Cell ( 0,184,utf8_decode('NO   '.$OP_30MESES_DESARROLLO_NO),0);
$this->_pdf->Rect(172, 105, 3,3 );


$this->_pdf->Cell(-170);
$this->_pdf->Cell ( 0,184,utf8_decode('N/A  '.$OP_30MESES_DESARROLLO_NA),0);
$this->_pdf->Rect(182, 105, 3,3 );


$this->_pdf->Cell(-145);
$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell ( 0,170,utf8_decode('¿A LOS 48 MESES LANZA Y ATRAPA LA PELOTA?'),0);


$this->_pdf->Cell(-79);
$this->_pdf->Cell ( 0,170,utf8_decode('SI  '.$OP_48MESES_DESARROLLO_SI),0);
$this->_pdf->Rect(271, 98, 3,3 );


$this->_pdf->Cell(-69);
$this->_pdf->Cell ( 0,170,utf8_decode('NO  '.$OP_48MESES_DESARROLLO_NO),0);
$this->_pdf->Rect(282, 98, 3,3 );


$this->_pdf->Cell(-59);
$this->_pdf->Cell ( 0,170,utf8_decode('N/A  '.$OP_48MESES_DESARROLLO_NA),0);
$this->_pdf->Rect(293, 98, 3,3 );


$this->_pdf->Cell(-143);
$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell ( 0,177,utf8_decode('¿A LOS 60 MESES SE PARA Y SALTA EN UN PIE?'),0);


$this->_pdf->Cell(-79);
$this->_pdf->Cell ( 0,177,utf8_decode('SI  '.$OP_60MESES_DESARROLLO_SI),0);
$this->_pdf->Rect(271, 101, 3,3 );


$this->_pdf->Cell(-69);
$this->_pdf->Cell ( 0,177,utf8_decode('NO  '.$OP_60MESES_DESARROLLO_NO),0);
$this->_pdf->Rect(282, 101, 3,3 );


$this->_pdf->Cell(-59);
$this->_pdf->Cell ( 0,177,utf8_decode('N/A  '.$OP_60MESES_DESARROLLO_NA),0);
$this->_pdf->Rect(293, 101, 3,3 );
$this->_pdf->Line(10, 109, 314,109);


$this->_pdf->Cell(-240);
$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell ( 0,192,utf8_decode('EVALUE LA ADERENCIA AL PROGRAMA DE CRECIMIENTO Y DESARROLLO'),0);
$this->_pdf->Line(10, 112, 314,112);

$this->_pdf->Cell(-336);
$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell ( 0,198,utf8_decode('¿N° DE CONSULTAS DE CRECIMIENTO Y DESARROLLO?                 '.$NUM_CONSULTAS_CRECIMIENTO),0);
$this->_pdf->Rect(87, 113, 14,3 );


$this->_pdf->Cell(-316);
$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell ( 0,205,utf8_decode('¿EL NIÑO RECIBE MICRONUTRIENTES?'),0);


$this->_pdf->Cell(-263);
$this->_pdf->Cell ( 0,205,utf8_decode('SI  '.$RECIBE_MICRONUTRIENTES_SI),0);
$this->_pdf->Rect(87, 116, 3,3 );


$this->_pdf->Cell(-253);
$this->_pdf->Cell ( 0,205,utf8_decode('NO  '.$RECIBE_MICRONUTRIENTES_NO),0);
$this->_pdf->Rect(98, 116, 3,3 );


$this->_pdf->Cell(-220);
$this->_pdf->Cell ( 0,198,utf8_decode('¿RECIBIÓ DESPARACITACIÓN?'),0);


$this->_pdf->Cell(-175);
$this->_pdf->Cell ( 0,198,utf8_decode('SI  '.$RECIBE_DESPARACITACION_SI),0);
$this->_pdf->Rect(175, 113, 3,3 );


$this->_pdf->Cell(-165);
$this->_pdf->Cell ( 0,198,utf8_decode('NO  '.$RECIBE_DESPARACITACION_NO),0);
$this->_pdf->Rect(186, 113, 3,3 );



$this->_pdf->Cell(-220);
$this->_pdf->Cell ( 0,205,utf8_decode('¿CUALES SON? '.$DESCRIPCION_MICRONUTRIENTES),0);
$this->_pdf->Line(145, 119, 200,119);


$this->_pdf->Cell(-140);
$this->_pdf->Cell ( 0,198,utf8_decode('FECHA DESPARACITACIÓN  '.$FECHA_DESPARACITACION),0);
$this->_pdf->Line(242, 115, 254,115);


$this->_pdf->Cell(-139);
$this->_pdf->Cell ( 0,205,utf8_decode('FECHA ÚLTIMA ENTREGA  '.$FECHA_ENTREGA_MICRONUTRIENTES),0);
$this->_pdf->Line(242, 119, 254,119);
$this->_pdf->Line(10, 120, 314,120);


$this->_pdf->Cell(-220);
$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell ( 0,214,utf8_decode('EVALUACÓN DEL BUEN TRATO'),0);
$this->_pdf->Line(145, 119, 200,119);
$this->_pdf->Line(10, 124, 314,124);


$this->_pdf->Cell(-330);
$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell ( 0,222,utf8_decode('¿LE SONRIEN?'),0);


$this->_pdf->Cell(-305);
$this->_pdf->Cell ( 0,222,utf8_decode('SI  '.$LE_SONRIEN_SI),0);
$this->_pdf->Rect(45, 124, 3,3 );


$this->_pdf->Cell(-295);
$this->_pdf->Cell ( 0,222,utf8_decode('NO  '.$LE_SONRIEN_NO),0);
$this->_pdf->Rect(56, 124, 3,3 );


$this->_pdf->Cell(-336);
$this->_pdf->Cell ( 0,229,utf8_decode('¿LO ACOMPAÑAN?'),0);


$this->_pdf->Cell(-305);
$this->_pdf->Cell ( 0,229,utf8_decode('SI  '.$LE_ACOMPAÑAN_SI),0);
$this->_pdf->Rect(45, 128, 3,3 );


$this->_pdf->Cell(-295);
$this->_pdf->Cell ( 0,229,utf8_decode('NO  '.$LE_ACOMPAÑAN_NO),0);
$this->_pdf->Rect(56, 128, 3,3 );


$this->_pdf->Cell(-270);
$this->_pdf->Cell ( 0,222,utf8_decode('¿ALZAN O ARRULLAN AL NIÑO/A?'),0);


$this->_pdf->Cell(-220);
$this->_pdf->Cell ( 0,222,utf8_decode('SI  '.$ALZAN_SI),0);
$this->_pdf->Rect(130, 124, 3,3 );


$this->_pdf->Cell(-210);
$this->_pdf->Cell ( 0,222,utf8_decode('NO   '.$ALZAN_NO),0);
$this->_pdf->Rect(142, 124, 3,3 );


$this->_pdf->Cell(-277);
$this->_pdf->Cell ( 0,229,utf8_decode('¿LE JUEGAN O PERMITEN QUE JUEGUE?'),0);


$this->_pdf->Cell(-220);
$this->_pdf->Cell ( 0,229,utf8_decode('SI  '.$LE_JUEGAN_SI),0);
$this->_pdf->Rect(130, 128, 3,3 );


$this->_pdf->Cell(-210);
$this->_pdf->Cell ( 0,229,utf8_decode('NO   '.$LE_JUEGAN_NO),0);
$this->_pdf->Rect(142, 128, 3,3 );


$this->_pdf->Cell(-160);
$this->_pdf->Cell ( 0,222,utf8_decode('¿SE PREOCUPAN POR LA HIGIENE?'),0);


$this->_pdf->Cell(-112);
$this->_pdf->Cell ( 0,222,utf8_decode('SI  '.$PREOCUPAN_POR_HIGIENE_SI),0);
$this->_pdf->Rect(238, 124, 3,3 );


$this->_pdf->Cell(-105);
$this->_pdf->Cell ( 0,222,utf8_decode('NO   '.$PREOCUPAN_POR_HIGIENE_NO),0);
$this->_pdf->Rect(247, 124, 3,3 );


$this->_pdf->Cell(-195);
$this->_pdf->Cell ( 0,229,utf8_decode('¿LO CASTIGAN CON CORREA,PALMADAS,PATADAS O PUÑOS?'),0);


$this->_pdf->Cell(-112);
$this->_pdf->Cell ( 0,229,utf8_decode('SI  '.$CASTIGAN_CORREA_SI),0);
$this->_pdf->Rect(238, 128, 3,3 );


$this->_pdf->Cell(-105);
$this->_pdf->Cell ( 0,229,utf8_decode('NO   '.$CASTIGAN_CORREA_NO),0);
$this->_pdf->Rect(247, 128, 3,3 );


$this->_pdf->Cell(-90);
$this->_pdf->Cell ( 0,222,utf8_decode('¿SE PREOCUPA POR SU SALUD?'),0);


$this->_pdf->Cell(-48);
$this->_pdf->Cell ( 0,222,utf8_decode('SI  '.$PREOCUPAN_POR_SALUD_SI),0);
$this->_pdf->Rect(302, 124, 3,3 );


$this->_pdf->Cell(-41);
$this->_pdf->Cell ( 0,222,utf8_decode('NO  '.$PREOCUPAN_POR_SALUD_NO),0);
$this->_pdf->Rect(310, 124, 3,3 );


$this->_pdf->Cell(-95);
$this->_pdf->Cell ( 0,229,utf8_decode('¿TIENE ACCIDENTES FRECUENTES?'),0);


$this->_pdf->Cell(-48);
$this->_pdf->Cell ( 0,229,utf8_decode('SI  '.$ACCIDENTES_FRECUENTES_SI),0);
$this->_pdf->Rect(302, 128, 3,3 );


$this->_pdf->Cell(-41);
$this->_pdf->Cell ( 0,229,utf8_decode('NO  '.$ACCIDENTES_FRECUENTES_NO),0);
$this->_pdf->Rect(310, 128, 3,3 );
$this->_pdf->Line(10, 132, 314,132);


$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell(-215);
$this->_pdf->Cell ( 0,238,utf8_decode('RIESGOS DE ACCIDENTES EN EL HOGAR'),0);
$this->_pdf->Line(10, 136, 314,136);


$this->_pdf->Cell(-320);
$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell ( 0,246,utf8_decode('¿ESTA SOLO TOMANDOSE EL TETERO?'),0);


$this->_pdf->Cell(-260);
$this->_pdf->Cell ( 0,246,utf8_decode('SI  '.$SOLO_TOMANDO_TETERO_SI),0);
$this->_pdf->Rect(90, 136, 3,3 );


$this->_pdf->Cell(-250);
$this->_pdf->Cell ( 0,246,utf8_decode('NO   '.$SOLO_TOMANDO_TETERO_NO),0);
$this->_pdf->Rect(102, 136, 3,3 );


$this->_pdf->Cell(-336);
$this->_pdf->Cell ( 0,253,utf8_decode('¿OBJECTOS PEQUEÑOS AL ALCANCE DE LOS NIÑOS?'),0);


$this->_pdf->Cell(-260);
$this->_pdf->Cell ( 0,253,utf8_decode('SI  '.$OBJETOS_PEQUEÑOS_SI),0);
$this->_pdf->Rect(90, 140, 3,3 );


$this->_pdf->Cell(-250);
$this->_pdf->Cell ( 0,253,utf8_decode('NO   '.$OBJETOS_PEQUEÑOS_NO),0);
$this->_pdf->Rect(102, 140, 3,3 );


$this->_pdf->Cell(-300);
$this->_pdf->Cell ( 0,259,utf8_decode('¿NIÑOS EN LA COCINA?'),0);


$this->_pdf->Cell(-260);
$this->_pdf->Cell ( 0,259,utf8_decode('SI  '.$NIÑOS_COCINA_SI),0);
$this->_pdf->Rect(90, 143, 3,3 );


$this->_pdf->Cell(-250);
$this->_pdf->Cell ( 0,259,utf8_decode('NO   '.$NIÑOS_COCINA_NO),0);
$this->_pdf->Rect(102, 143, 3,3 );



$this->_pdf->Cell(-227);
$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell ( 0,246,utf8_decode('¿CUCHILLOS, SERRUCHOS,TIJERAS AL ALCANCE DE LOS NIÑOS?'),0);


$this->_pdf->Cell(-140);
$this->_pdf->Cell ( 0,246,utf8_decode('SI  '.$CUCHILLOS_AL_ALCANCE_SI),0);
$this->_pdf->Rect(210, 136, 3,3 );


$this->_pdf->Cell(-130);
$this->_pdf->Cell ( 0,246,utf8_decode('NO   '.$CUCHILLOS_AL_ALCANCE_NO),0);
$this->_pdf->Rect(222, 136, 3,3 );



$this->_pdf->Cell(-225);
$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell ( 0,252,utf8_decode('¿MEDICAMENTOS-INSECTICIDAS AL ALCANCE DE LOS NIÑOS?'),0);


$this->_pdf->Cell(-140);
$this->_pdf->Cell ( 0,252,utf8_decode('SI  '.$MEDICAMENTOS_AL_ALCANCE_SI),0);
$this->_pdf->Rect(210, 139, 3,3 );


$this->_pdf->Cell(-130); 
$this->_pdf->Cell ( 0,252,utf8_decode('NO   '.$MEDICAMENTOS_AL_ALCANCE_NO),0);
$this->_pdf->Rect(222, 139, 3,3 );


$this->_pdf->Cell(-235);
$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell ( 0,258,utf8_decode('¿ESCALERAS-TERRAZAS SIN BARANDAS-VENTANAS SIN PROTECCIÓN?'),0);


$this->_pdf->Cell(-140);
$this->_pdf->Cell ( 0,258,utf8_decode('SI  '.$ESCALERAS_SIN_PROTECCION_SI),0);
$this->_pdf->Rect(210, 142, 3,3 );


$this->_pdf->Cell(-130);
$this->_pdf->Cell ( 0,258,utf8_decode('NO   '.$ESCALERAS_SIN_PROTECCION_NO),0);
$this->_pdf->Rect(222, 142, 3,3 );


$this->_pdf->Cell(-217);
$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell ( 0,264,utf8_decode('¿EXISTEN OTROS RIESGOS PARA EL NIÑO EN EL HOGAR?'),0);


$this->_pdf->Cell(-140);
$this->_pdf->Cell ( 0,264,utf8_decode('SI  '.$EXISTEN_OTROS_RIESGOS_SI),0);
$this->_pdf->Rect(210, 145, 3,3 );


$this->_pdf->Cell(-130);
$this->_pdf->Cell ( 0,264,utf8_decode('NO   '.$EXISTEN_OTROS_RIESGOS_NO),0);
$this->_pdf->Rect(222, 145, 3,3 );



$this->_pdf->Cell(-99);
$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell ( 0,246,utf8_decode('¿AGUA ALMACENADA SIN TAPA?'),0);


$this->_pdf->Cell(-53);
$this->_pdf->Cell ( 0,246,utf8_decode('SI  '.$AGUA_SIN_TAPA_SI),0);
$this->_pdf->Rect(297, 136, 3,3 );


$this->_pdf->Cell(-43);
$this->_pdf->Cell ( 0,246,utf8_decode('NO  '.$AGUA_SIN_TAPA_NO),0);
$this->_pdf->Rect(308, 136, 3,3 );



$this->_pdf->Cell(-106);
$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell ( 0,252,utf8_decode('¿ENCHUFES Y CABLES DESCUBIERTOS?'),0);


$this->_pdf->Cell(-53);
$this->_pdf->Cell ( 0,252,utf8_decode('SI  '.$CABLES_DESCUBIERTOS_SI),0);
$this->_pdf->Rect(297, 139, 3,3 );


$this->_pdf->Cell(-43);
$this->_pdf->Cell ( 0,252,utf8_decode('NO  '.$CABLES_DESCUBIERTOS_NO),0);
$this->_pdf->Rect(308, 139, 3,3 );


$this->_pdf->Cell(-119);
$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell ( 0,258,utf8_decode('¿VELAS Y FÓSFOROS AL ALCANCE DE LOS NIÑOS?'),0);


$this->_pdf->Cell(-53);
$this->_pdf->Cell ( 0,258,utf8_decode('SI  '.$VELAS_AL_ALCANCE_SI),0);
$this->_pdf->Rect(297, 142, 3,3 );


$this->_pdf->Cell(-43);
$this->_pdf->Cell ( 0,258,utf8_decode('NO  '.$VELAS_AL_ALCANCE_NO),0);
$this->_pdf->Rect(308, 142, 3,3 );
$this->_pdf->Line(10, 149, 314,149);


$this->_pdf->Cell(-217);
$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Cell ( 0,271,utf8_decode('¿PROBLEMAS AMBIENTALES Y DE HIGIENE?'),0);
$this->_pdf->Line(10, 152, 314,152);



$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->Cell(-319);
$this->_pdf->Cell ( 0,278,utf8_decode('¿NIÑOS O ADULTOS CON ROPA SUCIA?  '.$ROPA_SUCIA),0);
$this->_pdf->Rect(77, 153, 3,3 );


$this->_pdf->Cell(-335);
$this->_pdf->Cell ( 0,284,utf8_decode('¿NIÑOS O ADULTOS CON MANOS Y UÑAS SUCIAS?    '.$MANOS_SUCIAS),0);
$this->_pdf->Rect(77, 156, 3,3 );


$this->_pdf->Cell(-298);
$this->_pdf->Cell ( 0,290,utf8_decode('¿NIÑOS DESCALZOS?    '.$DESCALZOS),0);
$this->_pdf->Rect(77, 159, 3,3 );


$this->_pdf->Cell(-324);
$this->_pdf->Cell ( 0,296,utf8_decode('¿BASURA Y DESORDEN DE LA VIVIENDA?    '.$BASURA_VIVIENDA),0);
$this->_pdf->Rect(77, 162, 3,3 );


$this->_pdf->Cell(-333);
$this->_pdf->Cell ( 0,302,utf8_decode('¿ALIMENTOS SIN ALMACENAR Y NO CUBIERTOS?  '.$ALIMENTOS_SIN_ALMACENAR),0);
$this->_pdf->Rect(77, 165, 3,3 );


$this->_pdf->Cell(-336);
$this->_pdf->Cell ( 0,308,utf8_decode('¿PERSONAS QUE FUMAN DENTRO DE LA VIVIENDA?  '.$PERSONAS_FUMAN),0);
$this->_pdf->Rect(77, 168, 3,3 );


$this->_pdf->Cell(-298);
$this->_pdf->Cell ( 0,314,utf8_decode('¿NO USAN TOLDILLO?  '.$NO_USAN_TOLDILLO),0);
$this->_pdf->Rect(77, 171, 3,3 );


$this->_pdf->Cell(-160);
$this->_pdf->Cell ( 0,278,utf8_decode('¿INSECTOS Y RATONES EN LA VIVIENDA O ALREDEDORES?   '.$INSECTOS_VIVIENDA),0);
$this->_pdf->Rect(263, 152, 3,3 );


$this->_pdf->Cell(-157); 
$this->_pdf->Cell ( 0,284,utf8_decode('¿MANEJO ADECUADO DE LAS BASURAS / RECOLECCION?   '.$MANEJO_ADECUADO),0);
$this->_pdf->Rect(263, 155, 3,3 );


$this->_pdf->Cell(-130);
$this->_pdf->Cell ( 0,290,utf8_decode('¿SE CONSUME AGUA NO POTABLE?   '.$AGUA_NO_POTABLE),0);
$this->_pdf->Rect(263, 158, 3,3 );


$this->_pdf->Cell(-151);
$this->_pdf->Cell ( 0,296,utf8_decode('¿ESTUFA O BRASERO UBICADO EN LA HABITACIÓN?   '.$BRASERO_UBICADO_HABITACION),0);
$this->_pdf->Rect(263, 161, 3,3 );


$this->_pdf->Cell(-145);
$this->_pdf->Cell ( 0,302,utf8_decode('¿VIVIENDA SIN ILUMINACIÓN Y VENTILACIÓN?   '.$VIVIENDA_ILUMINACION),0);
$this->_pdf->Rect(263, 164, 3,3 );


$this->_pdf->Cell(-147);
$this->_pdf->Cell ( 0,308,utf8_decode('¿EVITAN CAMBIOS BRUSCOS DE TEMPERATURA?   '.$EVITAN_TEMPERATURA),0);
$this->_pdf->Rect(263, 167, 3,3 );


$this->_pdf->Cell(-160);
$this->_pdf->Cell ( 0,314,utf8_decode('¿CHARCOS,ZANJAS Y OBJETOS DONDE SE ACUMULA AGUA?  '.$ACUMULA_AGUA),0);
$this->_pdf->Rect(263, 170, 3,3 );


$this->_pdf->Cell(-187);
$this->_pdf->Cell ( 0,320,utf8_decode('¿ADULTO CON TOS O GRIPA, QUE CUIDAN/ ALIMENTAN AL NIÑO SIN TAPABOCA?  '.$ADULTO_TOS_CUIDA),0);
$this->_pdf->Rect(263, 173, 3,3 );


$this->_pdf->Cell(-336);
$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Image($codImag.'.png',70,175,50);
$this->_pdf->Cell ( 0,360,utf8_decode('NOMBRE DEL GESTOR DE CALIDAD DE VIDA:'),0);
$this->_pdf->Line(70, 196, 150,196);


$this->_pdf->Cell(-195);
$this->_pdf->SetFont('Times','B',7.5);
$this->_pdf->Image($codImagJefe.'.png',230,175,50);
$this->_pdf->Cell ( 0,360,utf8_decode('FIRMA DE LA PERSONA QUE RECIBEE LA VISITA:'),0);
$this->_pdf->Line(214, 196, 336,196);


$this->_pdf->Output(); 
}
}


?>