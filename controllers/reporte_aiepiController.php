<?php
require('librerias/fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('C:\xampp\htdocs\xampp\REPORTES\Logo\logo_gobernacion.jpg',10,5,30);
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(54);
    // Título
    $this->Cell(1,5,utf8_decode('DEPARTAMENTO DE CUNDINAMARCA - SECRETARIA DE SALUD - DIRECCIÓN SALUD PUBLICA'),'C');
    // Salto de línea
    $this->Ln(5);
    $this->Cell(80);
    $this->Cell(3,5,utf8_decode('ATENCION INFANTIL - NIÑOS Y NIÑAS MENORES DE 5 AÑOS - AIEPI'),'C');
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetX(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');

}
}

// Creación del objeto de la clase heredada
$pdf = new PDF('l','mm','Legal');
$pdf->Image('C:\xampp\htdocs\xampp\REPORTES\Logo\logo_gobernacion.jpg',10,5,30);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',7.5);
$pdf->Line(10, 60, 345,60);
$pdf->SetTitle ( 'AIEPI', false);
$pdf->SetAutoPageBreak(false,1);  
$pdf->Rect(10, 28, 335,176 );

//$pdf->SetMargins(5, 5,5);

$INSTITUCION=utf8_decode('SAN RAFAEL');//INSTITUCION
$FECHA=utf8_decode('2016-07-15');//FECHA
$MUNICIPIO=utf8_decode('FUSAGASUGA');//MUNICIPIO
$C='X';//TIPO DE USUARIO
$S='X';//TIPO DE USUARIO
$V='X';//TIPO DE USUARIO
$P='X';//TIPO DE USUARIO
$E='X';//TIPO DE USUARIO
$ASEGURADOR=utf8_decode('ASES');//ASEGURADORA
$NOMBRES_Y_APELLIDOS=utf8_decode('JUAN DAVID RAMÍREZ RONCANCIO');//APELLIDOS Y NOMBRE
$RC='X';//REGISTRO CIVIL
$FECHA_DE_NACIMIENTO='1993-03-18';//FECHA DE NACIMIENTO
$F='X';//SEXO FEMENINO
$M='X';//SEXO MASCULINO
$RURAL='X';//PROCEDENCIA
$URBANA='X';//PROCEDENCIA
$DESPLAZADO='X';//TIPO DE POBLACION
$ROM_GITANO='X';//TIPO DE POBLACION
$DESMOVILIZADO='X';//TIPO DE POBLACION
$PALENQUERO='X';//TIPO DE POBLACION
$RAIZAL='X';//TIPO DE POBLACION
$INDIGENA='X';//TIPO DE POBLACION
$MENOR_ABANDONADO='X';//TIPO DE POBLACION
$HABITANTE_DE_LA_CALLE='X';//TIPO DE POBLACION
$PERSONA_EN_CONDICION_DE_DISCAPACIDAD='X';//TIPO DE POBLACION
$VICTIMA_CONFLICTO_ARMADO='X';//TIPO DE POBLACION
$AFRO='X';//TIPO DE POBLACION
$N_A='X';//TIPO DE POBLACION
$NOMBRE_DEL_ACOMPAÑANTE='';//NOMBRE DEL ACOMPAÑANTE
$PARENTEZCO='X';//PARENTEZCO
$DIRECCIÓN='X';//DIRECCION
$TELEFONO='X';//TELEFONO
$PRIMERA_VEZ='X';//EVALUACION REALIZADA
$SEGUIMIENTO='X';//EVALUACION REALIZADA
$POR_ALTO_RIESGO_DE_LA_FAMILIA='X';//EVALUACION REALIZADA
$ENFERMEDAD_DE_ALTO_RIESGO='X';//EVALUACION REALIZADA
//EVALUAR Y COMPLETAR LA INFORMACIÓN MARCANDO CON UNA X TODOS LOS SIGNOS QUE PRESENTE EL NIÑO
$NO_PUEDE_BEBER_PECHO='X';//NO_PUEDE_BEBER_PECHO
$NINGUNA_DE_LAS_ANTERIORES='X';//NINGUNA_DE_LAS_ANTERIORES
$LETARGICO='X';//LETARGICO
$INCONCIENTE='X';//INCONCIENTE
$VOMITA_TODO='X';//VOMITA_TODO
$CONVULCIONES='X';//CONVULCIONES
//EVALUAR Y COMPLETAR LA INFORMACIÓN MARCANDO CON UNA X O ESCRIBIENDO, SEGÚN CORRESPONDA
$SI_PROBLEMAS_DE_SALUD_ORAL='X';//SI_PROBLEMAS_DE_SALUD_ORAL
$NO_PROBLEMAS_DE_SALUD_ORAL='X';//NO_PROBLEMAS_DE_SALUD_ORAL
$N_DE_VALORACIONES_ODONTOLOGICAS_EN_EL_AÑO='X';//N_DE_VALORACIONES_ODONTOLOGICAS_EN_EL_AÑO
$HA_TENIDO_ALGÚN_GOLPE_EN_LA_BOCA='X';//HA_TENIDO_ALGÚN_GOLPE_EN_LA_BOCA
$DURANTE_LA_NOCHE_DUERME_SIN_CEPILLARSE_LOS_DIENTES='X';//DURANTE_LA_NOCHE_DUERME_SIN_CEPILLARSE_LOS_DIENTES
$LE_SANGRA_LA_ENCIA_CUANDO_SE_CEPILLA='X';//LE_SANGRA_LA_ENCIA_CUANDO_SE_CEPILLA
$CUANTAS_VECES_HACE_HIGIANE_ORAL_AL_DIA='X';//CUANTAS_VECES_HACE_HIGIANE_ORAL_AL_DIA
$LE_SUPERVISA_EL_CEPILLADO_DE_DIENTES='X';//LE_SUPERVISA_EL_CEPILLADO_DE_DIENTES
$CON_QUE_HACE_HIGIENE_ORAL='X';//CON_QUE_HACE_HIGIENE_ORAL
$SI_TIENE_EL_NIÑO_O_NIÑA_TOS='X';
$NO_TIENE_EL_NIÑO_O_NIÑA_TOS='X';
$N_DE_DIAS_QUE_LLEVA_CON_TOS='5';
$SI_TIENE_TIRAJE_SUCOTAL='X';
$NO_TIENE_TIRAJE_SUCOTAL='X';
$SI_TIENE_EL_NIÑO_O_NIÑA_DIFICULTAD_PARA_RESPIRAR='X';
$NO_TIENE_EL_NIÑO_O_NIÑA_DIFICULTAD_PARA_RESPIRAR='X';
$N_DE_DIAS_CON_DIFICULTAD_PARA_RESPIRAR='X';
$SI_TIENE_ESTRIDOR='X';
$NO_TIENE_ESTRIDOR='X';
$N_DE_RESPIRACIONES_POR_MINUTO='10';
$SI_TIENE_RESPIRACION_RAPIDA='X';
$NO_TIENE_RESPIRACION_RAPIDA='X';
$SI_TIENE_SIBILANCIAS='X';
$NO_TIENE_SIBILANCIAS='X';
$SI_EL_NIÑO_NIÑA_HA_ESTADO_EN_CONTACTO_CON_PERSONAS_CON_TB='X';
$NO_EL_NIÑO_NIÑA_HA_ESTADO_EN_CONTACTO_CON_PERSONAS_CON_TB='X';
$SI_EL_NIÑO_NIÑA_HA_ESTADO_EN_CONTACTO_CON_PERSONAS_SINTOMATICAS_RESPIRATORIAS='X';
$NO_EL_NIÑO_NIÑA_HA_ESTADO_EN_CONTACTO_CON_PERSONAS_SINTOMATICAS_RESPIRATORIAS='X';
$SI_TOS_PERSISTENTE_POR_MAS_DE_21_DIAS='X';
$NO_TOS_PERSISTENTE_POR_MAS_DE_21_DIAS='X';
$SI_PERDIDA_O_GANANCIA_DE_PESO_EN_LOS_ULTIMOS_TRES_MESES='X';
$NO_PERDIDA_O_GANANCIA_DE_PESO_EN_LOS_ULTIMOS_TRES_MESES='X';
$SI_TIENE_EL_NIÑO_DIARREA='X';
$NO_TIENE_EL_NIÑO_DIARREA='X';
$N_DE_DIAS_QUE_EL_NIÑ_TIENE_DIARREA='10';
$SI_FONTANELA_O_MOLLEJA_HUNDIDA='X';
$NO_FONTANELA_O_MOLLEJA_HUNDIDA='X';
$SI_INTRANQUILO_O_IRRITABLE='X';
$NO_INTRANQUILO_O_IRRITABLE='X';
$SI_HAY_SANGRE_EN_LAS_HECES='X';
$NO_HAY_SANGRE_EN_LAS_HECES='X';
$SI_BOCA_SECA_O_MUCHA_SED='X';
$NO_BOCA_SECA_O_MUCHA_SED='X';
$SI_OJOS_HUNDIDOS='X';
$NO_OJOS_HUNDIDOS='X';
$SI_PLIEGUE_CUTÁNEO_MUY_LENTO_MAYOR_2_SEG='X';
$NO_PLIEGUE_CUTÁNEO_MUY_LENTO_MAYOR_2_SEG='X';
$SI_PLIEGUE_CUTÁNEO_LENTO_2_SEG_O_MENOR='X';
$NO_PLIEGUE_CUTÁNEO_LENTO_2_SEG_O_MENOR='X';
$SI_TIENE_EL_NIÑO_O_NIÑA_FIEBRE='X';
$NO_TIENE_EL_NIÑO_O_NIÑA_FIEBRE='X';
$N_DE_DIAS_QUE_EL_NIÑO_TIENE_FIEBRE='X';
$SI_FIEBRE_DE_MAS_DE_5_DÍAS_TODOS_LOS_DÍAS='X';
$NO_FIEBRE_DE_MAS_DE_5_DÍAS_TODOS_LOS_DÍAS='X';
$N_DE_DIAS_QUE_EL_NIÑO_TIENE_FIEBRE='5';
$SI_RIGIDEZ_DE_NUCA='X';
$NO_RIGIDEZ_DE_NUCA='X';
$SI_FIEBRE_MAYOR_DE_39='X';
$NO_FIEBRE_MAYOR_DE_39='X';
$SI_ASPECTO_TOXICO='X';
$NO_ASPECTO_TOXICO='X';
$SI_VIVE_O_VISITO_ZONA_DE_RIESGO_DE_MALARIA='X';
$NO_VIVE_O_VISITO_ZONA_DE_RIESGO_DE_MALARIA='X';
$SI_MANIFESTACIÓN_DE_SANGRADO='X';
$NO_MANIFESTACIÓN_DE_SANGRADO='X';
$SI_TOS='X';
$NO_TOS='X';
$SI_DOLOR_ABDOMINAL_CONTINUO_INTENSO='X';
$NO_DOLOR_ABDOMINAL_CONTINUO_INTENSO='X';
$SI_VIVE_O_VISITO_ZONA_DE_RIESGO_DE_DENGUE='X';
$NO_VIVE_O_VISITO_ZONA_DE_RIESGO_DE_DENGUE='X';
$SI_PIEL_HÚMEDA_Y_FRIA='X';
$NO_PIEL_HÚMEDA_Y_FRIA='X';
$SI_CORIZA='X';
$NO_CORIZA='X';
$SI_PULSO_RÁPIDO_Y_DÉBIL='X';
$NO_PULSO_RÁPIDO_Y_DÉBIL='X';
$ZONA_R='X';
$ZONA_U='X';
$SI_INQUIETO_O_IRRITABLE='X';
$NO_INQUIETO_O_IRRITABLE='X';
$SI_OJOS_ROJOS='X';
$NO_OJOS_ROJOS='X';
$NO_OJOS_HUNDIDOS='X';
$SI_ERUPCIÓN_CUTÁNEA_Y_GENERALIZADA='X';
$NO_ERUPCIÓN_CUTÁNEA_Y_GENERALIZADA='X';
$SI_FIEBRE_POR_MAS_DE_14_DÍAS_Y_O_SUDORACIÓN='X';
$NO_FIEBRE_POR_MAS_DE_14_DÍAS_Y_O_SUDORACIÓN='X';
$SI_DOLOR_DE_CABEZA_RECIENTE_QUE_AUMENTA='X';
$NO_DOLOR_DE_CABEZA_RECIENTE_QUE_AUMENTA='X';
$SI_EL_DOLOR_DE_CABEZA_SE_ACOMPAÑA_DE_OTROS_SINTOMA_COMO_VOMITO='X';
$NO_EL_DOLOR_DE_CABEZA_SE_ACOMPAÑA_DE_OTROS_SINTOMA_COMO_VOMITO='X';
$SI_EL_DOLOR_DE_HUESOS_HA_IDO_EN_AUMENTO='X';
$NO_EL_DOLOR_DE_HUESOS_HA_IDO_EN_AUMENTO='X';
$SI_EL_DOLOR_DE_CABEZA_DESPIERTA_AL_NIÑ='X';
$NO_EL_DOLOR_DE_CABEZA_DESPIERTA_AL_NIÑ='X';
$SI_HA_TENIDO_DOLOR_DE_HUESOS_EN_EL_ULTIMO_MES='X';
$NO_HA_TENIDO_DOLOR_DE_HUESOS_EN_EL_ULTIMO_MES='X';
$SI_EN_LOS_ULTIMOS_3_MESES_A_TENIDO_CAMBIOS_COMO_FATIGA_PERDIDA_DE_PETITO_O_PESO='X';
$NO_EN_LOS_ULTIMOS_3_MESES_A_TENIDO_CAMBIOS_COMO_FATIGA_PERDIDA_DE_PETITO_O_PESO='X';
$N_DE_DIAS_QUE_EL_NIÑ_TIENE_DOLOR_DE_CABEZA='5';
$SI_DOLOR_DE_HUESOS_INTERRUMPE_LAS_ACTIVIDADES_DEL_NIÑ='X';
$NO_DOLOR_DE_HUESOS_INTERRUMPE_LAS_ACTIVIDADES_DEL_NIÑ='X';
$SI_EL_NIÑO_O_NIÑA_TIENE_PROBLEMAS_DE_OIDO='X';
$NO_EL_NIÑO_O_NIÑA_TIENE_PROBLEMAS_DE_OIDO='X';
$N_DE_EPISODIOS_PREVIOS='9';
$SI_TIENE_SUPURACIÓN_DE_OÍDO='X';
$NO_TIENE_SUPURACIÓN_DE_OÍDO='X';
$HACE_CUANTOS_DIAS='20';
$SI_TUMEFACCIÓN_DOLOR_ATRÁS_DE_LA_OREJA='X';
$NO_TUMEFACCIÓN_DOLOR_ATRÁS_DE_LA_OREJA='X';
$SI_EL_NIÑO_O_NIÑA_TIENE_DESNUTRICIÓN_Y_O_ANEMIA='X';
$NO_EL_NIÑO_O_NIÑA_TIENE_DESNUTRICIÓN_Y_O_ANEMIA='X';
$RETRASO_EN_EL_CRECIMIENTO_MUY_INTENSO='X';
$RETRASO_EN_EL_CRECIMIENTO_MENOS_MARCADO='X';
$PERDIDA_DE_TEJIDO_MUSCULAR_MUY_MARCADA='X';
$PERDIDA_DE_TEJIDO_MUSCULAR_MARCADA='X';
$TEJIDO_ADIPOSO_AUSENTE='X';
$TEJIDO_ADIPOSO_POCO_DISMINUIDO='X';
$SI_EDEMA='X';
$NO_EDEMA='X';
$VALORACION_DE_LA_CARA_CARA_DE_VIEJITO='X';
$VALORACION_DE_LA_CARA_CARA_DE_LUNA_LLENA='X';
$EL_SISTEMA_ÓSEO_ROSARIO_COSTAL_VISIBLE='X';
$EL_SISTEMA_ÓSEO_PIERNAS_DE_SABLE='X';
$COMPORTAMIENTO_MIRADA_DE_ANGUSTIA='X';
$COMPORTAMIENTO_LLANTO_APATIA='X';
$APETITO_DISMINUIDO='X';
$APETITO_AUMENTADO='X';
$CABELLO_ESCASO='X';
$CABELLO_DEBIL='X';
$COLOR_ROJO='X';
$COLOR_NARANJA='X';
$COLOR_AMARILLO='X';
$COLOR_VERDE='X';
$MEDIDA='110';





// FIN VARIABLES------------------------------------------------------------------------------------------------------------------------------
$pdf->Cell(-83);
$pdf->Cell ( 0,30,utf8_decode('INSTITUCION: ').$INSTITUCION,0);
$pdf->Line(29, 32, 115,32);


$pdf->Cell(-142);
$pdf->Cell ( 0,30,'FECHA: '.$FECHA,0);
$pdf->Line(215, 32, 228,32);



$pdf->Cell(-336);
$pdf->Cell ( 0,41,utf8_decode('MUNICIPIO: ').$MUNICIPIO,0);
$pdf->Line(26, 37, 115,37);



$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-215);
$pdf->Cell ( 0,41,utf8_decode('TIPO DE USUARIO '),0);



$pdf->Cell(-179);
$pdf->Cell ( 0,41,'C    '.$C,0);
$pdf->Line(170, 37, 176,37);



$pdf->Cell(-170);
$pdf->Cell ( 0,41,'S     '.$S,0);
$pdf->Line(180, 37, 186,37);


$pdf->Cell(-160);
$pdf->Cell ( 0,41,'V     '.$V,0);
$pdf->Line(190, 37, 196,37);

$pdf->Cell(-150); 
$pdf->Cell ( 0,41,'P    '.$P,0);
$pdf->Line(199, 37, 205,37);


$pdf->Cell(-140);
$pdf->Cell ( 0,41,'E   '.$E,0);
$pdf->Line(209, 37, 215,37);


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-125);
$pdf->Cell ( 0,43,utf8_decode('ASEGURADOR: ').$ASEGURADOR,0);
$pdf->Line(241, 38, 300,38);


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-336);
$pdf->Cell ( 0,50,utf8_decode('NOMBRES Y APELLIDOS: ').$NOMBRES_Y_APELLIDOS,0);
$pdf->Line(45, 41, 147,41);


$pdf->Cell(-196);
$pdf->Cell ( 0,50,'RC:  '.$RC,0);
$pdf->Line(156, 41, 194,41);


$pdf->Cell(-125);
$pdf->Cell ( 0,50,'FECHA DE NACIMIENTO (DD/MM/AA)  '.$FECHA_DE_NACIMIENTO,0);
$pdf->Line(271, 41, 283,41);


$pdf->Cell(-330);
$pdf->Cell ( 0,58,'GENERO: ',0);
$pdf->Cell(-315);
$pdf->Cell ( 0,58,'F    '.$F,0);
$pdf->Rect(35, 42, 3,3 );
$pdf->Cell(-307);
$pdf->Cell ( 0,58,'M  '.$M,0);
$pdf->Rect(43, 42, 3,3 );


$pdf->Cell(-248);
$pdf->Cell ( 0,58,'PROCEDENCIA:',0);
$pdf->SetFont('Times','',7.5);
$pdf->Cell(-210);
$pdf->Cell ( 0,58,'URBANA  '.$URBANA,0);
$pdf->Rect(172, 42, 3,3 );
$pdf->Cell(-184);
$pdf->Cell ( 0,58,'RURAL  '.$RURAL,0);
$pdf->Rect(149, 42, 3,3 );


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-320);
$pdf->Cell ( 0,67,'TIPO DE POBLACION:',0);
$pdf->Cell(-270);
$pdf->Cell ( 0,67,'DESPLAZADO   '.$DESPLAZADO,0);
$pdf->Rect(96, 47, 3,3 );
$pdf->Cell(-270);
$pdf->Cell ( 0,73,'ROM/GITANO    '.$ROM_GITANO,0);
$pdf->Rect(96, 50, 3,3 );


$pdf->Cell(-225);
$pdf->Cell ( 0,67,'DESMOVILIZADO   '.$DESMOVILIZADO,0);
$pdf->Rect(145, 47, 3,3 );
$pdf->Cell(-225);
$pdf->Cell ( 0,73,'PALENQUERO         '.$PALENQUERO,0);
$pdf->Rect(145, 50, 3,3 );


$pdf->Cell(-184);
$pdf->Cell ( 0,67,'RAIZAL       '.$RAIZAL,0);
$pdf->Rect(177, 47, 3,3 );
$pdf->Cell(-184);
$pdf->Cell ( 0,73,'INDIGENA  '.$INDIGENA,0);
$pdf->Rect(177, 50, 3,3 );


$pdf->Cell(-157);
$pdf->Cell ( 0,67,'MENOR ABANDONADO        '.$MENOR_ABANDONADO,0);
$pdf->Rect(224, 47, 3,3 );
$pdf->Cell(-157);
$pdf->Cell ( 0,73,'HABITANTE DE LA CALLE   '.$HABITANTE_DE_LA_CALLE,0);
$pdf->Rect(224, 50, 3,3 );


$pdf->Cell(-105);
$pdf->Cell ( 0,67,'PERSONA EN CONDICION DE DISCAPACIDAD    '.$PERSONA_EN_CONDICION_DE_DISCAPACIDAD,0);
$pdf->Rect(300, 47, 3,3 );
$pdf->Cell(-105);
$pdf->Cell ( 0,73,'VICTIMA CONFLICTO ARMADO                              '.$VICTIMA_CONFLICTO_ARMADO,0);
$pdf->Rect(300, 50, 3,3 );


$pdf->Cell(-22);
$pdf->Cell ( 0,67,'AFRO    '.$AFRO,0);
$pdf->Rect(334, 47, 3,3 );
$pdf->Cell(-22);
$pdf->Cell ( 0,73,'N/A        '.$N_A,0);
$pdf->Rect(334, 50, 3,3 );


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-336);
$pdf->Cell ( 0,82,utf8_decode('NOMBRE DEL ACOMPAÑANTE: '.$NOMBRE_DEL_ACOMPAÑANTE),0);
$pdf->Line(53, 58, 130,58);


$pdf->Cell(-204);
$pdf->Cell ( 0,82,utf8_decode('PARENTEZCO: ').$PARENTEZCO,0);
$pdf->Line(163, 58, 190,58);


$pdf->Cell(-148);
$pdf->Cell ( 0,82,utf8_decode('DIRECCIÓN: '.$DIRECCIÓN),0);
$pdf->Line(216, 58, 265,58);


$pdf->Cell(-73);
$pdf->Cell ( 0,82,utf8_decode('TELEFONO: ').$TELEFONO,0);
$pdf->Line(290, 58, 315,58);


$pdf->Cell(-336);
$pdf->Cell ( 0,95,utf8_decode('EVALUACIÓN REALIZADA: '),0);

$pdf->Cell(-280);
$pdf->Cell ( 0,95,utf8_decode('PRIMERA VEZ   ').$PRIMERA_VEZ,0);
$pdf->Rect(87, 61, 3,3 );

$pdf->Cell(-240);
$pdf->Cell ( 0,95,utf8_decode('SEGUIMIENTO  ').$SEGUIMIENTO,0);
$pdf->Rect(127, 61, 3,3 );

$pdf->Cell(-200);
$pdf->Cell ( 0,95,utf8_decode('POR ALTO RIESGO DE LA FAMILIA  '.$POR_ALTO_RIESGO_DE_LA_FAMILIA),0);
$pdf->Rect(193, 61, 3,3 );

$pdf->Cell(-140);
$pdf->Cell ( 0,95,utf8_decode('ENFERMEDAD DE ALTO RIESGO   ').$ENFERMEDAD_DE_ALTO_RIESGO,0);
$pdf->Rect(250, 61, 3,3 );
$pdf->Line(10, 65, 345,65);


$pdf->Cell(-27);
$pdf->Rect(314, 65, 31,139 );
$pdf->Cell ( 0,105,utf8_decode('ACTIVIDADES'),0);
$pdf->Cell(-28);
$pdf->Cell ( 0,112,utf8_decode('EDUCATIVAS EN'),0);
$pdf->Cell(-24);
$pdf->Cell ( 0,119,utf8_decode('MEDIDAS'),0);
$pdf->Cell(-27);
$pdf->Cell ( 0,126,utf8_decode('PREVENTIVAS,'),0);
$pdf->Cell(-31);
$pdf->Cell ( 0,133,utf8_decode('ADMINISTRACIÓN DE'),0);
$pdf->Cell(-28);
$pdf->Cell ( 0,140,utf8_decode('TRATAMIENTO Y'),0);
$pdf->Cell(-28);
$pdf->Cell ( 0,147,utf8_decode('CUIDADOS DE LA'),0);
$pdf->Cell(-26);
$pdf->Cell ( 0,154,utf8_decode('ENFERMEDAD'),0);



$pdf->Cell(-270);
$pdf->Line(10, 69, 314,69);
$pdf->Cell ( 0,105,utf8_decode('EVALUAR Y COMPLETAR LA INFORMACIÓN MARCANDO CON UNA X TODOS LOS SIGNOS QUE PRESENTE EL NIÑO   '),0);


$pdf->Cell(-336);
$pdf->Line(10, 69, 314,69);
$pdf->Cell ( 0,112,utf8_decode('IDENTIFICACIÓN DE SIGNOS GENERALES DE PELIGRO'),0);


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-336);
$pdf->Line(10, 69, 314,69);
$pdf->Cell ( 0,118,utf8_decode('NO PUEDE BEBER O TOMAR EL PECHO   ').$NO_PUEDE_BEBER_PECHO,0);
$pdf->Rect(60, 72, 3,3 );
$pdf->Cell(-336);
$pdf->Line(10, 69, 314,69);
$pdf->Cell ( 0,124,utf8_decode('NINGUNA DE LAS ANTERIORES                ').$NINGUNA_DE_LAS_ANTERIORES,0);
$pdf->Rect(60, 75, 3,3 );

$pdf->Cell(-260);
$pdf->Cell ( 0,118,utf8_decode('LETARGICO ').$LETARGICO,0);
$pdf->Rect(102, 72, 3,3 );

$pdf->Cell(-220);
$pdf->Cell ( 0,118,utf8_decode('INCONCIENTE   ').$INCONCIENTE,0);
$pdf->Rect(146, 72, 3,3 );


$pdf->Cell(-180);
$pdf->Cell ( 0,118,utf8_decode('VOMITA TODO  ').$VOMITA_TODO,0);
$pdf->Rect(186, 72, 3,3 );


$pdf->Cell(-140);
$pdf->Cell ( 0,118,utf8_decode('CONVULCIONES  ').$CONVULCIONES,0);
$pdf->Rect(228, 72, 3,3 );
$pdf->Line(10, 79, 314,79);


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-270);
$pdf->Line(10, 83, 314,83);
$pdf->Cell ( 0,132,utf8_decode('EVALUAR Y COMPLETAR LA INFORMACIÓN MARCANDO CON UNA X O ESCRIBIENDO, SEGÚN CORRESPONDA   '),0);


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-336);
$pdf->Line(10, 83, 314,83);
$pdf->Cell ( 0,140,utf8_decode('¿TIENE EL NIÑO O NIÑA PROBLEMAS DE SALUD BUCAL?'),0);

$pdf->Cell(-253);
$pdf->Cell ( 0,140,utf8_decode('SI  ').$SI_PROBLEMAS_DE_SALUD_ORAL,0);
$pdf->Rect(97, 83, 3,3 );

$pdf->Cell(-245);
$pdf->Cell ( 0,140,utf8_decode('NO   ').$NO_PROBLEMAS_DE_SALUD_ORAL,0);
$pdf->Rect(107, 83, 3,3 );

$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-336);
$pdf->Line(10, 83, 314,83);
$pdf->Cell ( 0,145,utf8_decode('¿N° DE VALORACIONES ODONTOLOGICAS EN EL AÑO?                        '.$N_DE_VALORACIONES_ODONTOLOGICAS_EN_EL_AÑO),0);
$pdf->Rect(96, 86, 14,3 );

$pdf->Cell(-202);
$pdf->Cell ( 0,140,utf8_decode('¿HA TENIDO ALGÚN GOLPE EN LA BOCA?   '.$HA_TENIDO_ALGÚN_GOLPE_EN_LA_BOCA),0);
$pdf->Rect(201, 83, 3,3 );

$pdf->Cell(-230);
$pdf->Cell ( 0,146,utf8_decode('¿DURANTE LA NOCHE DUERME SIN CEPILLARSE LOS DIENTES?  '.$DURANTE_LA_NOCHE_DUERME_SIN_CEPILLARSE_LOS_DIENTES),0);
$pdf->Rect(201, 86, 3,3 );

$pdf->Cell(-206);
$pdf->Cell ( 0,152,utf8_decode('¿LE SANGRA LA ENCIA CUANDO SE CEPILLA?  '.$LE_SANGRA_LA_ENCIA_CUANDO_SE_CEPILLA),0);
$pdf->Rect(201, 89, 3,3 );
$pdf->Cell(-130);
$pdf->Cell ( 0,140,utf8_decode('¿CUANTAS VECES HACE IGIENE ORAL AL DIA?  '.$CUANTAS_VECES_HACE_HIGIANE_ORAL_AL_DIA),0);
$pdf->Rect(279, 83, 3,3 );

$pdf->Cell(-128);
$pdf->Cell ( 0,146,utf8_decode('¿LE SUPERVISA EL CEPILLADO DE DIENTES?   '.$LE_SUPERVISA_EL_CEPILLADO_DE_DIENTES),0);
$pdf->Rect(279, 86, 3,3 );

$pdf->Cell(-128);
$pdf->Cell ( 0,152,utf8_decode('¿CON QUE HACE LA HIGIENIZACIÓN ORAL?:   '.$CON_QUE_HACE_HIGIENE_ORAL),0);
$pdf->Line(278, 93, 312,93);
$pdf->Line(10, 93, 314,93);

$pdf->Cell(-302);
$pdf->Cell ( 0,161,utf8_decode('¿TIENE EL NIÑO O NIÑA TOS?   '),0);


$pdf->Cell(-258);
$pdf->Cell ( 0,161,utf8_decode('SI   '.$SI_TIENE_EL_NIÑO_O_NIÑA_TOS),0);
$pdf->Rect(92, 94, 3,3 );


$pdf->Cell(-250);
$pdf->Cell ( 0,161,utf8_decode('NO   '.$NO_TIENE_EL_NIÑO_O_NIÑA_TOS),0);
$pdf->Rect(102, 94, 3,3 );


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-213);
$pdf->Cell ( 0,161,utf8_decode('¿N° DE DIAS QUE LLEVA CON TOS?                  '.$N_DE_DIAS_QUE_LLEVA_CON_TOS),0);
$pdf->Rect(188, 94, 13,3 );


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-120);
$pdf->Cell ( 0,161,utf8_decode('¿TIENE TIRAJE SUCOTAL?  '),0);


$pdf->Cell(-78);
$pdf->Cell ( 0,161,utf8_decode('SI  '.$SI_TIENE_TIRAJE_SUCOTAL),0);
$pdf->Rect(282, 94, 3,3 );


$pdf->Cell(-70);
$pdf->Cell ( 0,161,utf8_decode('NO  '.$NO_TIENE_TIRAJE_SUCOTAL),0);
$pdf->Rect(272, 94, 3,3 );


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-336);
$pdf->Cell ( 0,168,utf8_decode('¿TIENE EL NIÑO O NIÑA DIFICULTAD PARA RESPIRAR?   '),0);


$pdf->Cell(-258);
$pdf->Cell ( 0,168,utf8_decode('SI   '.$SI_TIENE_EL_NIÑO_O_NIÑA_DIFICULTAD_PARA_RESPIRAR),0);
$pdf->Rect(92, 97, 3,3 );


$pdf->Cell(-250);
$pdf->Cell ( 0,168,utf8_decode('NO   '.$NO_TIENE_EL_NIÑO_O_NIÑA_DIFICULTAD_PARA_RESPIRAR),0);
$pdf->Rect(102, 97, 3,3 );


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-230);
$pdf->Cell ( 0,168,utf8_decode('¿N° DE DIAS CON DIFICULTAD PARA RESPIRAR ?                  '.$N_DE_DIAS_CON_DIFICULTAD_PARA_RESPIRAR),0);
$pdf->Rect(188, 97, 13,3 );


$pdf->Cell(-112);
$pdf->Cell ( 0,168,utf8_decode('¿TIENE ESTRIDOR ?   '),0);

$pdf->Cell(-78);
$pdf->Cell ( 0,168,utf8_decode('SI  '.$SI_TIENE_ESTRIDOR),0);
$pdf->Rect(282, 97, 3,3 );


$pdf->Cell(-70);
$pdf->Cell ( 0,168,utf8_decode('NO   '.$NO_TIENE_ESTRIDOR),0);
$pdf->Rect(272, 97, 3,3 );


$pdf->Cell(-312);
$pdf->Cell ( 0,174,utf8_decode('¿N° DE RESPIRACIONES POR MINUTO?                '.$N_DE_RESPIRACIONES_POR_MINUTO),0);
$pdf->Rect(92, 100, 13,3 );


$pdf->Cell(-208);
$pdf->Cell ( 0,174,utf8_decode('¿TIENE RESPIRACION RAPIDA ?   '),0);


$pdf->Cell(-165);
$pdf->Cell ( 0,173,utf8_decode('SI       '.$SI_TIENE_RESPIRACION_RAPIDA),0);
$pdf->Rect(188, 100, 3,3 );


$pdf->Cell(-154);
$pdf->Cell ( 0,173,utf8_decode('NO   '.$NO_TIENE_RESPIRACION_RAPIDA),0);
$pdf->Rect(198, 100, 3,3 );


$pdf->Cell(-115);
$pdf->Cell ( 0,174,utf8_decode('¿TIENE SIBILANCIAS ?   '),0);


$pdf->Cell(-78);
$pdf->Cell ( 0,173,utf8_decode('SI   '.$SI_TIENE_SIBILANCIAS),0);
$pdf->Rect(282, 100, 3,3 );


$pdf->Cell(-70);
$pdf->Cell ( 0,173,utf8_decode('NO   '.$NO_TIENE_SIBILANCIAS),0);
$pdf->Rect(272, 100, 3,3 );


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-220);
$pdf->Cell ( 0,182,utf8_decode('¿FRECUENCIA RESPIRATORIA RAPIDA?   '),0);


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-336);
$pdf->Cell ( 0,189,utf8_decode('MENOR DE 2 MESES MAYOR DE 60 RESPIRACIONES POR MINUTO'),0);
$pdf->Rect(10, 108, 82,3 );
$pdf->Cell(-240);
$pdf->Cell ( 0,189,utf8_decode('DE 2 MESES A 5 AÑOS MAYOR DE 50 RESPIRACIONES POR MINUTO'),0);
$pdf->Rect(105, 108, 86,3 );
$pdf->Cell(-140);
$pdf->Cell ( 0,189,utf8_decode('DE 12 MESES A 5 AÑOS MAYOR DE 40 RESPIRACIONES POR MINUTO'),0);
$pdf->Rect(205, 108, 88,3 );
$pdf->Line(10, 112, 314,112);


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-336);
$pdf->Cell ( 0,198,utf8_decode('¿EL NIÑO/NIÑA HA ESTADO EN CONTACTO CON PERSONAS CON TB?'),0);

$pdf->Cell(-230);
$pdf->Cell ( 0,198,utf8_decode('SI   '.$SI_EL_NIÑO_NIÑA_HA_ESTADO_EN_CONTACTO_CON_PERSONAS_CON_TB),0);
$pdf->Rect(120, 112, 3,3 );


$pdf->Cell(-220);
$pdf->Cell ( 0,198,utf8_decode('NO   '.$NO_EL_NIÑO_NIÑA_HA_ESTADO_EN_CONTACTO_CON_PERSONAS_CON_TB),0);
$pdf->Rect(132, 112, 3,3 );


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-205);
$pdf->Cell ( 0,198,utf8_decode('¿EL NIÑO/NIÑA HA ESTADO EN CONTACTO CON PERSONAS SINTOMATICAS RESPIRATORIAS ?'),0);


$pdf->Cell(-80);
$pdf->Cell ( 0,198,utf8_decode('SI   '.$SI_EL_NIÑO_NIÑA_HA_ESTADO_EN_CONTACTO_CON_PERSONAS_SINTOMATICAS_RESPIRATORIAS),0);
$pdf->Rect(270, 113, 3,3 );


$pdf->Cell(-70);
$pdf->Cell ( 0,198,utf8_decode('NO   '.$NO_EL_NIÑO_NIÑA_HA_ESTADO_EN_CONTACTO_CON_PERSONAS_SINTOMATICAS_RESPIRATORIAS),0);
$pdf->Rect(282, 113, 3,3 );


$pdf->Cell(-298);
$pdf->Cell ( 0,204,utf8_decode('¿TOS PERSISTENTE POR MAS DE 21 DIAS?'),0);


$pdf->Cell(-230);
$pdf->Cell ( 0,204,utf8_decode('SI   '.$SI_TOS_PERSISTENTE_POR_MAS_DE_21_DIAS),0);
$pdf->Rect(120, 115, 3,3 );


$pdf->Cell(-220);
$pdf->Cell ( 0,204,utf8_decode('NO   '.$NO_TOS_PERSISTENTE_POR_MAS_DE_21_DIAS),0);
$pdf->Rect(132, 115, 3,3 );


$pdf->Cell(-170);
$pdf->Cell ( 0,204,utf8_decode('¿PERDIDA O GANANCIA DE PESO EN LOS ULTIMOS TRES MESES?'),0);

$pdf->Cell(-80);
$pdf->Cell ( 0,205,utf8_decode('SI   '.$SI_PERDIDA_O_GANANCIA_DE_PESO_EN_LOS_ULTIMOS_TRES_MESES),0);
$pdf->Rect(270, 116, 3,3 );


$pdf->Cell(-70);
$pdf->Cell ( 0,205,utf8_decode('NO   '.$NO_PERDIDA_O_GANANCIA_DE_PESO_EN_LOS_ULTIMOS_TRES_MESES),0);
$pdf->Rect(282, 116, 3,3 );
$pdf->Line(10, 120, 314,120);


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-316);
$pdf->Cell ( 0,214,utf8_decode('¿TIENE EL NIÑO DIARREA?'),0);


$pdf->Cell(-270);
$pdf->Cell ( 0,214,utf8_decode('SI  '.$SI_TIENE_EL_NIÑO_DIARREA),0);
$pdf->Rect(80, 121, 3,3 );


$pdf->Cell(-260);
$pdf->Cell ( 0,214,utf8_decode('NO     '.$NO_TIENE_EL_NIÑO_DIARREA),0);
$pdf->Rect(93, 121, 3,3 );


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-225);
$pdf->Cell ( 0,214,utf8_decode('¿FONTANELA O MOLLEJA HUNDIDA?'),0);


$pdf->Cell(-172);
$pdf->Cell ( 0,214,utf8_decode('SI     '.$SI_FONTANELA_O_MOLLEJA_HUNDIDA),0);
$pdf->Rect(190, 121, 3,3 );


$pdf->Cell(-162);
$pdf->Cell ( 0,214,utf8_decode('NO   '.$NO_FONTANELA_O_MOLLEJA_HUNDIDA),0);
$pdf->Rect(180, 121, 3,3 );


$pdf->Cell(-130);
$pdf->Cell ( 0,214,utf8_decode('¿INTRANQUILO O IRRITABLE?'),0);

$pdf->Cell(-80);
$pdf->Cell ( 0,214,utf8_decode('SI   '.$SI_INTRANQUILO_O_IRRITABLE),0);
$pdf->Rect(270, 121, 3,3 );


$pdf->Cell(-70);
$pdf->Cell ( 0,214,utf8_decode('NO   '.$NO_INTRANQUILO_O_IRRITABLE),0);
$pdf->Rect(282, 121, 3,3 );


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-336);
$pdf->Cell ( 0,222,utf8_decode('¿N° DE DIAS QUE EL NIÑ@ TIENE DIARREA?                           '.$N_DE_DIAS_QUE_EL_NIÑ_TIENE_DIARREA),0);
$pdf->Rect(80, 124, 16,3 );

$pdf->Cell(-215);
$pdf->Cell ( 0,222,utf8_decode('¿BOCA SECA O MUCHA SED?'),0);


$pdf->Cell(-172);
$pdf->Cell ( 0,222,utf8_decode('SI     '.$SI_BOCA_SECA_O_MUCHA_SED),0);
$pdf->Rect(190, 124, 3,3 );


$pdf->Cell(-162);
$pdf->Cell ( 0,222,utf8_decode('NO   '.$NO_BOCA_SECA_O_MUCHA_SED),0);
$pdf->Rect(180, 124, 3,3 );


$pdf->Cell(-115);
$pdf->Cell ( 0,222,utf8_decode('¿OJOS HUNDIDOS?'),0);

$pdf->Cell(-80);
$pdf->Cell ( 0,222,utf8_decode('SI   '.$SI_OJOS_HUNDIDOS),0);
$pdf->Rect(270, 124, 3,3 );


$pdf->Cell(-70);
$pdf->Cell ( 0,222,utf8_decode('NO   '.$NO_OJOS_HUNDIDOS),0);
$pdf->Rect(282, 124, 3,3 );


$pdf->Cell(-319);
$pdf->Cell ( 0,229,utf8_decode('¿HAY SANGRE EN LAS HECES?'),0);

$pdf->Cell(-270);
$pdf->Cell ( 0,228,utf8_decode('SI   '.$SI_HAY_SANGRE_EN_LAS_HECES),0);
$pdf->Rect(80, 127, 3,3 );


$pdf->Cell(-260);
$pdf->Cell ( 0,228,utf8_decode('NO     '.$NO_HAY_SANGRE_EN_LAS_HECES),0);
$pdf->Rect(93, 127, 3,3 );


$pdf->Cell(-240);
$pdf->Cell ( 0,229,utf8_decode('¿PLIEGUE CUTÁNEO-MUY LENTO MAYOR 2 SEG?'),0);



$pdf->Cell(-172);
$pdf->Cell ( 0,230,utf8_decode('SI     '.$SI_PLIEGUE_CUTÁNEO_MUY_LENTO_MAYOR_2_SEG),0);
$pdf->Rect(190, 128, 3,3 );


$pdf->Cell(-162);
$pdf->Cell ( 0,230,utf8_decode('NO   '.$NO_PLIEGUE_CUTÁNEO_MUY_LENTO_MAYOR_2_SEG),0);
$pdf->Rect(180, 128, 3,3 );
$pdf->Cell(-148);
$pdf->Cell ( 0,229,utf8_decode('¿PLIEGUE CUTÁNEO-LENTO 2 SEG O MENOR?'),0);


$pdf->Cell(-80);
$pdf->Cell ( 0,229,utf8_decode('SI   '.$SI_PLIEGUE_CUTÁNEO_LENTO_2_SEG_O_MENOR),0);
$pdf->Rect(270, 128, 3,3 );


$pdf->Cell(-70);
$pdf->Cell ( 0,229,utf8_decode('NO   '.$NO_PLIEGUE_CUTÁNEO_LENTO_2_SEG_O_MENOR),0);
$pdf->Rect(282, 128, 3,3 );
$pdf->Line(10, 132, 314,132);


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-318);
$pdf->Cell ( 0,239,utf8_decode('¿TIENE EL NIÑO O NIÑA FIEBRE?'),0);

$pdf->Cell(-270);
$pdf->Cell ( 0,239,utf8_decode('SI   '.$SI_TIENE_EL_NIÑO_O_NIÑA_FIEBRE),0);
$pdf->Rect(80, 133, 3,3 );


$pdf->Cell(-260);
$pdf->Cell ( 0,239,utf8_decode('NO    '.$NO_TIENE_EL_NIÑO_O_NIÑA_FIEBRE),0);
$pdf->Rect(93, 133, 3,3 );


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-240);
$pdf->Cell ( 0,239,utf8_decode('¿FIEBRE DE MAS DE 5 DÍAS,TODOS LOS DÍAS?'),0);


$pdf->Cell(-172);
$pdf->Cell ( 0,239,utf8_decode('SI     '.$SI_FIEBRE_DE_MAS_DE_5_DÍAS_TODOS_LOS_DÍAS),0);
$pdf->Rect(190, 133, 3,3 );


$pdf->Cell(-162);
$pdf->Cell ( 0,239,utf8_decode('NO   '.$NO_FIEBRE_DE_MAS_DE_5_DÍAS_TODOS_LOS_DÍAS),0);
$pdf->Rect(180, 133, 3,3 );


$pdf->Cell(-326);
$pdf->Cell ( 0,246,utf8_decode('¿N° DE DIAS QUE EL NIÑO TIENE FIEBRE?               '.$N_DE_DIAS_QUE_EL_NIÑO_TIENE_FIEBRE),0);


$pdf->Cell(-222);
$pdf->Cell ( 0,246,utf8_decode('¿RIGIDEZ DE NUCA?'),0);
$pdf->Rect(80, 136, 16,3 );


$pdf->Cell(-190);
$pdf->Cell ( 0,246,utf8_decode('SI   '.$SI_RIGIDEZ_DE_NUCA),0);
$pdf->Rect(160, 136, 3,3 );


$pdf->Cell(-180);
$pdf->Cell ( 0,246,utf8_decode('NO   '.$NO_RIGIDEZ_DE_NUCA),0);
$pdf->Rect(172, 136, 3,3 );



$pdf->Cell(-165);
$pdf->Cell ( 0,246,utf8_decode('¿FIEBRE MAYOR DE 39°C?'),0);

$pdf->Cell(-128);
$pdf->Cell ( 0,246,utf8_decode('SI   '.$SI_FIEBRE_MAYOR_DE_39),0);
$pdf->Rect(231, 136, 3,3 );


$pdf->Cell(-120);
$pdf->Cell ( 0,246,utf8_decode('NO  '.$NO_FIEBRE_MAYOR_DE_39),0);
$pdf->Rect(222, 136, 3,3 );

$pdf->Cell(-80);
$pdf->Cell ( 0,246,utf8_decode('¿ASPECTO TOXICO?'),0);

$pdf->Cell(-52);
$pdf->Cell ( 0,246,utf8_decode('SI   '.$SI_ASPECTO_TOXICO),0);
$pdf->Rect(298, 136, 3,3 );


$pdf->Cell(-44);
$pdf->Cell ( 0,246,utf8_decode('NO   '.$NO_ASPECTO_TOXICO),0);
$pdf->Rect(308, 136, 3,3 );


$pdf->Cell(-335);
$pdf->Cell ( 0,253,utf8_decode('¿VIVE O VISITO ZONA DE RIESGO DE MALARIA?'),0);


$pdf->Cell(-270);
$pdf->Cell ( 0,253,utf8_decode('SI   '.$SI_VIVE_O_VISITO_ZONA_DE_RIESGO_DE_MALARIA),0);
$pdf->Rect(80, 140, 3,3 );


$pdf->Cell(-260);
$pdf->Cell ( 0,253,utf8_decode('NO    '.$NO_VIVE_O_VISITO_ZONA_DE_RIESGO_DE_MALARIA),0);
$pdf->Rect(93, 140, 3,3 );


$pdf->Cell(-240);
$pdf->Cell ( 0,253,utf8_decode('¿MANIFESTACIÓN DE SANGRADO?'),0);
$pdf->Rect(80, 136, 16,3 );

$pdf->Cell(-190);
$pdf->Cell ( 0,253,utf8_decode('SI   '.$SI_MANIFESTACIÓN_DE_SANGRADO),0);
$pdf->Rect(160, 139, 3,3 );


$pdf->Cell(-180);
$pdf->Cell ( 0,253,utf8_decode('NO   '.$NO_MANIFESTACIÓN_DE_SANGRADO),0);
$pdf->Rect(172, 139, 3,3 );


$pdf->Cell(-140);
$pdf->Cell ( 0,253,utf8_decode('¿TOS?'),0);

$pdf->Cell(-128);
$pdf->Cell ( 0,253,utf8_decode('SI   '.$SI_TOS),0);
$pdf->Rect(231, 139, 3,3 );


$pdf->Cell(-120);
$pdf->Cell ( 0,253,utf8_decode('NO  '.$NO_TOS),0);
$pdf->Rect(222, 139, 3,3 );


$pdf->Cell(-110);
$pdf->Cell ( 0,253,utf8_decode('¿DOLOR ABDOMINAL CONTINUO INTENSO?'),0);

$pdf->Cell(-52);
$pdf->Cell ( 0,253,utf8_decode('SI   '.$SI_DOLOR_ABDOMINAL_CONTINUO_INTENSO),0);
$pdf->Rect(298, 139, 3,3 );


$pdf->Cell(-44);
$pdf->Cell ( 0,253,utf8_decode('NO   '.$NO_DOLOR_ABDOMINAL_CONTINUO_INTENSO),0);
$pdf->Rect(308, 139, 3,3 );


$pdf->Cell(-334);
$pdf->Cell ( 0,259,utf8_decode('¿VIVE O VISITO ZONA DE RIESGO DE DENGUE?'),0);


$pdf->Cell(-270);
$pdf->Cell ( 0,259,utf8_decode('SI   '.$SI_VIVE_O_VISITO_ZONA_DE_RIESGO_DE_DENGUE),0);
$pdf->Rect(80, 143, 3,3 );


$pdf->Cell(-260);
$pdf->Cell ( 0,259,utf8_decode('NO     '.$NO_VIVE_O_VISITO_ZONA_DE_RIESGO_DE_DENGUE),0);
$pdf->Rect(93, 143, 3,3 );


$pdf->Cell(-226);
$pdf->Cell ( 0,259,utf8_decode('¿PIEL HÚMEDA Y FRIA?'),0);
$pdf->Rect(80, 136, 16,3 );


$pdf->Cell(-190);
$pdf->Cell ( 0,259,utf8_decode('SI   '.$SI_PIEL_HÚMEDA_Y_FRIA),0);
$pdf->Rect(160, 142, 3,3 );


$pdf->Cell(-180);
$pdf->Cell ( 0,259,utf8_decode('NO   '.$NO_PIEL_HÚMEDA_Y_FRIA),0);
$pdf->Rect(172, 142, 3,3 );


$pdf->Cell(-144);
$pdf->Cell ( 0,259,utf8_decode('¿CORIZA?'),0);
$pdf->Rect(80, 136, 16,3 );


$pdf->Cell(-128);
$pdf->Cell ( 0,259,utf8_decode('SI   '.$SI_CORIZA),0);
$pdf->Rect(231, 143, 3,3 );


$pdf->Cell(-120);
$pdf->Cell ( 0,259,utf8_decode('NO  '.$NO_CORIZA),0);
$pdf->Rect(222, 143, 3,3 );


$pdf->Cell(-88);
$pdf->Cell ( 0,259,utf8_decode('¿PULSO RÁPIDO Y DÉBIL?'),0);


$pdf->Cell(-52);
$pdf->Cell ( 0,259,utf8_decode('SI   '.$SI_PULSO_RÁPIDO_Y_DÉBIL),0);
$pdf->Rect(298, 143, 3,3 );


$pdf->Cell(-44);
$pdf->Cell ( 0,259,utf8_decode('NO   '.$NO_PULSO_RÁPIDO_Y_DÉBIL),0);
$pdf->Rect(308, 143, 3,3 );


$pdf->Cell(-286);
$pdf->Cell ( 0,265,utf8_decode('¿ZONA?'),0);


$pdf->Cell(-270);
$pdf->Cell ( 0,265,utf8_decode('R   '.$ZONA_R),0);
$pdf->Rect(80, 146, 3,3 );


$pdf->Cell(-260);
$pdf->Cell ( 0,265,utf8_decode('U       '.$ZONA_U),0);
$pdf->Rect(93, 146, 3,3 );


$pdf->Cell(-229);
$pdf->Cell ( 0,265,utf8_decode('¿INQUIETO O IRRITABLE?'),0);


$pdf->Cell(-190);
$pdf->Cell ( 0,265,utf8_decode('SI   '.$SI_INQUIETO_O_IRRITABLE),0);
$pdf->Rect(160, 145, 3,3 );


$pdf->Cell(-180);
$pdf->Cell ( 0,265,utf8_decode('NO   '.$NO_INQUIETO_O_IRRITABLE),0);
$pdf->Rect(172, 145, 3,3 );


$pdf->Cell(-149);
$pdf->Cell ( 0,265,utf8_decode('¿OJOS ROJOS?'),0);
$pdf->Rect(80, 136, 16,3 );


$pdf->Cell(-128);
$pdf->Cell ( 0,265,utf8_decode('SI   '.$SI_OJOS_ROJOS),0);
$pdf->Rect(231, 146, 3,3 );


$pdf->Cell(-120);
$pdf->Cell ( 0,265,utf8_decode('NO  '.$NO_OJOS_ROJOS),0);
$pdf->Rect(222, 146, 3,3 );

$pdf->Cell(-108);
$pdf->Cell ( 0,265,utf8_decode('¿ERUPCIÓN CUTÁNEA Y GENERALIZADA?'),0);


$pdf->Cell(-52);
$pdf->Cell ( 0,265,utf8_decode('SI   '.$SI_ERUPCIÓN_CUTÁNEA_Y_GENERALIZADA),0);
$pdf->Rect(298, 146, 3,3 );


$pdf->Cell(-44);
$pdf->Cell ( 0,265,utf8_decode('NO   '.$NO_ERUPCIÓN_CUTÁNEA_Y_GENERALIZADA),0);
$pdf->Rect(308, 146, 3,3 );
$pdf->Line(10, 150, 314,150);


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-336);
$pdf->Cell ( 0,274,utf8_decode('RIESGO PARA CANCER INFANTIL / LEUCEMIAS'),0);


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-204);
$pdf->Cell ( 0,274,utf8_decode('¿FIEBRE POR MAS DE 14 DÍAS Y/O SUDORACIÓN?'),0);


$pdf->Cell(-138);
$pdf->Cell ( 0,274,utf8_decode('SI   '.$SI_FIEBRE_POR_MAS_DE_14_DÍAS_Y_O_SUDORACIÓN),0);
$pdf->Rect(212, 150, 3,3 );


$pdf->Cell(-129);
$pdf->Cell ( 0,274,utf8_decode('NO  '.$NO_FIEBRE_POR_MAS_DE_14_DÍAS_Y_O_SUDORACIÓN),0);
$pdf->Rect(222, 150, 3,3 );


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-329);
$pdf->Cell ( 0,282,utf8_decode('¿DOLOR DE CABEZA RECIENTE QUE AUMENTA?'),0);



$pdf->Cell(-265);
$pdf->Cell ( 0,282,utf8_decode('SI   '.$SI_DOLOR_DE_CABEZA_RECIENTE_QUE_AUMENTA),0);
$pdf->Rect(85, 154, 3,3 );


$pdf->Cell(-255);
$pdf->Cell ( 0,282,utf8_decode('NO  '.$NO_DOLOR_DE_CABEZA_RECIENTE_QUE_AUMENTA),0);
$pdf->Rect(96, 154, 3,3 );


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-239);
$pdf->Cell ( 0,282,utf8_decode('¿EL DOLOR DE CABEZA SE ACOMPAÑA DE OTROS SINTOMA COMO VOMITO?'),0);


$pdf->Cell(-138);
$pdf->Cell ( 0,282,utf8_decode('SI   '.$SI_EL_DOLOR_DE_CABEZA_SE_ACOMPAÑA_DE_OTROS_SINTOMA_COMO_VOMITO),0);
$pdf->Rect(212, 154, 3,3 );


$pdf->Cell(-129);
$pdf->Cell ( 0,282,utf8_decode('NO  '.$NO_EL_DOLOR_DE_CABEZA_SE_ACOMPAÑA_DE_OTROS_SINTOMA_COMO_VOMITO),0);
$pdf->Rect(222, 154, 3,3 );


$pdf->Cell(-113);
$pdf->Cell ( 0,282,utf8_decode('¿EL DOLOR DE HUESOS HA IDO EN AUMENTO?'),0);


$pdf->Cell(-52);
$pdf->Cell ( 0,282,utf8_decode('SI   '.$SI_EL_DOLOR_DE_HUESOS_HA_IDO_EN_AUMENTO),0);
$pdf->Rect(298, 154, 3,3 );


$pdf->Cell(-44);
$pdf->Cell ( 0,282,utf8_decode('NO   '.$NO_EL_DOLOR_DE_HUESOS_HA_IDO_EN_AUMENTO),0);
$pdf->Rect(308, 154, 3,3 );


$pdf->Cell(-327);
$pdf->Cell ( 0,289,utf8_decode('¿EL DOLOR DE CABEZA DESPIERTA AL NIÑ@?'),0);


$pdf->Cell(-265);
$pdf->Cell ( 0,289,utf8_decode('SI   '.$SI_EL_DOLOR_DE_CABEZA_DESPIERTA_AL_NIÑ),0);
$pdf->Rect(85, 158, 3,3 );


$pdf->Cell(-255);
$pdf->Cell ( 0,289,utf8_decode('NO  '.$NO_EL_DOLOR_DE_CABEZA_DESPIERTA_AL_NIÑ),0);
$pdf->Rect(96, 158, 3,3 );


$pdf->Cell(-210);
$pdf->Cell ( 0,289,utf8_decode('¿HA TENIDO DOLOR DE HUESOS EN EL ULTIMO MES?'),0);


$pdf->Cell(-138);
$pdf->Cell ( 0,289,utf8_decode('SI   '.$SI_HA_TENIDO_DOLOR_DE_HUESOS_EN_EL_ULTIMO_MES),0);
$pdf->Rect(212, 158, 3,3 );


$pdf->Cell(-129);
$pdf->Cell ( 0,289,utf8_decode('NO  '.$NO_HA_TENIDO_DOLOR_DE_HUESOS_EN_EL_ULTIMO_MES),0);
$pdf->Rect(222, 158, 3,3 );


$pdf->Cell(-115);
$pdf->Cell ( 0,289,utf8_decode('¿EN LOS ULTIMOS 3 MESES A TENIDO CAMBIOS'),0);
$pdf->Cell(-115);
$pdf->Cell ( 0,295,utf8_decode('COMO FATIGA, PERDIDA DE APETITO O PESO?'),0);


$pdf->Cell(-52);
$pdf->Cell ( 0,295,utf8_decode('SI   '.$SI_EN_LOS_ULTIMOS_3_MESES_A_TENIDO_CAMBIOS_COMO_FATIGA_PERDIDA_DE_PETITO_O_PESO),0);
$pdf->Rect(298, 161, 3,3 );


$pdf->Cell(-44);
$pdf->Cell ( 0,295,utf8_decode('NO   '.$NO_EN_LOS_ULTIMOS_3_MESES_A_TENIDO_CAMBIOS_COMO_FATIGA_PERDIDA_DE_PETITO_O_PESO),0);
$pdf->Rect(308, 161, 3,3 );


$pdf->Cell(-336);
$pdf->Cell ( 0,295,utf8_decode('¿N° DE DIAS QUE EL NIÑ@ TIENE DOLOR DE CABEZA?           '.$N_DE_DIAS_QUE_EL_NIÑ_TIENE_DOLOR_DE_CABEZA),0);
$pdf->Rect(85, 161, 14,3 );

$pdf->Cell(-225);
$pdf->Cell ( 0,295,utf8_decode('¿DOLOR DE HUESOS INTERRUMPE LAS ACTIVIDADES DEL NIÑ@?'),0);


$pdf->Cell(-138);
$pdf->Cell ( 0,295,utf8_decode('SI   '.$SI_DOLOR_DE_HUESOS_INTERRUMPE_LAS_ACTIVIDADES_DEL_NIÑ),0);
$pdf->Rect(212, 161, 3,3 );


$pdf->Cell(-129);
$pdf->Cell ( 0,295,utf8_decode('NO  '.$NO_DOLOR_DE_HUESOS_INTERRUMPE_LAS_ACTIVIDADES_DEL_NIÑ),0);
$pdf->Rect(222, 161, 3,3 );
$pdf->Line(10, 165, 314,165);


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-336);
$pdf->Cell ( 0,305,utf8_decode('¿EL NIÑO O NIÑA TIENE PROBLEMAS DE OIDO?'),0);


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-265);
$pdf->Cell ( 0,305,utf8_decode('SI   '.$SI_EL_NIÑO_O_NIÑA_TIENE_PROBLEMAS_DE_OIDO),0);
$pdf->Rect(85, 166, 3,3 );


$pdf->Cell(-255);
$pdf->Cell ( 0,305,utf8_decode('NO   '.$NO_EL_NIÑO_O_NIÑA_TIENE_PROBLEMAS_DE_OIDO),0);
$pdf->Rect(96, 166, 3,3 );


$pdf->Cell(-235);
$pdf->Cell ( 0,305,utf8_decode('¿TIENE SUPURACIÓN DE OÍDO?'),0);


$pdf->Cell(-188);
$pdf->Cell ( 0,305,utf8_decode('SI   '.$SI_TIENE_SUPURACIÓN_DE_OÍDO),0);
$pdf->Rect(162, 166, 3,3 );


$pdf->Cell(-179);
$pdf->Cell ( 0,305,utf8_decode('NO  '.$NO_TIENE_SUPURACIÓN_DE_OÍDO),0);
$pdf->Rect(172, 166, 3,3 );


$pdf->Cell(-160);
$pdf->Cell ( 0,305,utf8_decode('¿HACE CUANTOS DIAS?    '.$HACE_CUANTOS_DIAS),0);
$pdf->Rect(218, 166, 10,3 );


$pdf->Cell(-115);
$pdf->Cell ( 0,305,utf8_decode('¿TUMEFACCIÓN/DOLOR ATRÁS DE LA OREJA?'),0);


$pdf->Cell(-52);
$pdf->Cell ( 0,305,utf8_decode('SI   '.$SI_TUMEFACCIÓN_DOLOR_ATRÁS_DE_LA_OREJA),0);
$pdf->Rect(298, 166, 3,3 );


$pdf->Cell(-44);
$pdf->Cell ( 0,305,utf8_decode('NO   '.$NO_TUMEFACCIÓN_DOLOR_ATRÁS_DE_LA_OREJA),0);
$pdf->Rect(308, 166, 3,3 );


$pdf->Cell(-310);
$pdf->Cell ( 0,312,utf8_decode('¿N° DE EPISODIOS PREVIOS?                       '.$N_DE_EPISODIOS_PREVIOS),0);
$pdf->Rect(85, 169, 14,3 );
$pdf->Line(10, 173, 314,173);


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-265);
$pdf->Cell ( 0,320,utf8_decode('¿EL NIÑO O NIÑA TIENE DESNUTRICIÓN Y/O ANEMIA?'),0);


$pdf->Cell(-190);
$pdf->Cell ( 0,320,utf8_decode('SI   '.$SI_EL_NIÑO_O_NIÑA_TIENE_DESNUTRICIÓN_Y_O_ANEMIA),0);
$pdf->Rect(160, 173, 3,3 );


$pdf->Cell(-180);
$pdf->Cell ( 0,320,utf8_decode('NO   '.$NO_EL_NIÑO_O_NIÑA_TIENE_DESNUTRICIÓN_Y_O_ANEMIA),0);
$pdf->Rect(172, 173, 3,3 );


$pdf->Cell(-336);
$pdf->Cell ( 0,327,utf8_decode('RETRASO EN EL CRECIMIENTO'),0);


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-280);
$pdf->Cell ( 0,327,utf8_decode('¿MUY INTENSO?    '.$RETRASO_EN_EL_CRECIMIENTO_MUY_INTENSO),0);
$pdf->Rect(89, 177, 3,3 );



$pdf->Rect(89, 180, 3,3 );$pdf->Cell(-285);
$pdf->Cell ( 0,334,utf8_decode('¿MENOS MARCADO?   '.$RETRASO_EN_EL_CRECIMIENTO_MENOS_MARCADO),0);



$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-249);
$pdf->Cell ( 0,328,utf8_decode('PERDIDA DE TEJIDO MUSCULAR'),0);



$pdf->SetFont('Times','',7.5);
$pdf->Cell(-190);
$pdf->Cell ( 0,328,utf8_decode('MUY MARCADA  '.$PERDIDA_DE_TEJIDO_MUSCULAR_MUY_MARCADA),0);
$pdf->Rect(178, 177, 3,3 );


$pdf->Cell(-183);
$pdf->Cell ( 0,334,utf8_decode('MARCADA  '.$PERDIDA_DE_TEJIDO_MUSCULAR_MARCADA),0);
$pdf->Rect(178, 180, 3,3 );



$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-162);
$pdf->Cell ( 0,328,utf8_decode('TEJIDO ADIPOSO'),0);
$pdf->Rect(178, 180, 3,3 );


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-123);
$pdf->Cell ( 0,328,utf8_decode('¿AUSENTE?  '.$TEJIDO_ADIPOSO_AUSENTE),0);
$pdf->Rect(239, 180, 3,3 );


$pdf->Cell(-135);
$pdf->Cell ( 0,334,utf8_decode('¿POCO DISMINUIDO?   '.$TEJIDO_ADIPOSO_POCO_DISMINUIDO),0);
$pdf->Rect(239, 177, 3,3 );


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-100);
$pdf->Cell ( 0,328,utf8_decode('¿EDEMA?   '),0);



$pdf->Cell(-80);
$pdf->Cell ( 0,328,utf8_decode('SI   '.$SI_EDEMA),0);
$pdf->Rect(270, 177, 3,3 );


$pdf->Cell(-70);
$pdf->Cell ( 0,328,utf8_decode('NO   '.$NO_EDEMA),0);
$pdf->Rect(282, 177, 3,3 );


$pdf->Cell(-336);
$pdf->Cell ( 0,342,utf8_decode('VALORACION DE LA CARA'),0);


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-285);
$pdf->Cell ( 0,342,utf8_decode('¿CARA DE VIEJITO?     '.$VALORACION_DE_LA_CARA_CARA_DE_VIEJITO),0);
$pdf->Rect(89, 184, 3,3 );


$pdf->Cell(-292);
$pdf->Cell ( 0,348,utf8_decode('¿CARA DE LUNA LLENA?     '.$VALORACION_DE_LA_CARA_CARA_DE_LUNA_LLENA),0);
$pdf->Rect(89, 187, 3,3 );


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-249);
$pdf->Cell ( 0,340,utf8_decode('EL SISTEMA ÓSEO'),0);


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-222);
$pdf->Cell ( 0,340,utf8_decode('¿ROSARIO COSTAL VISIBLE?    '.$EL_SISTEMA_ÓSEO_ROSARIO_COSTAL_VISIBLE),0);
$pdf->Rect(163, 184, 3,3 );


$pdf->Cell(-212);
$pdf->Cell ( 0,346,utf8_decode('PIERNAS DE SABLE?     '.$EL_SISTEMA_ÓSEO_PIERNAS_DE_SABLE),0);
$pdf->Rect(163, 187, 3,3 );



$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-176);
$pdf->Cell ( 0,340,utf8_decode('COMPORTAMIENTO'),0);



$pdf->SetFont('Times','',7.5);
$pdf->Cell(-146);
$pdf->Cell ( 0,340,utf8_decode('¿MIRADA DE ANGUSTIA?   '.$COMPORTAMIENTO_MIRADA_DE_ANGUSTIA),0);
$pdf->Rect(234, 184, 3,3 );


$pdf->Cell(-140);
$pdf->Cell ( 0,346,utf8_decode('¿LLANTO / APATIA?     '.$COMPORTAMIENTO_LLANTO_APATIA),0);
$pdf->Rect(234, 187, 3,3 );



$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-107);
$pdf->Cell ( 0,340,utf8_decode('APETITO'),0);



$pdf->SetFont('Times','',7.5);
$pdf->Cell(-94);
$pdf->Cell ( 0,340,utf8_decode('¿DISMINUIDO?  '.$APETITO_DISMINUIDO),0);
$pdf->Rect(272, 184, 3,3 );


$pdf->Cell(-95);
$pdf->Cell ( 0,346,utf8_decode('¿AUMENTADO?  '.$APETITO_AUMENTADO),0);
$pdf->Rect(272, 187, 3,3 );


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-70);
$pdf->Cell ( 0,340,utf8_decode('CABELLO'),0);


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-56);
$pdf->Cell ( 0,340,utf8_decode('¿ESCASO?   '.$CABELLO_ESCASO),0);
$pdf->Rect(305, 184, 3,3 );


$pdf->Cell(-53);
$pdf->Cell ( 0,346,utf8_decode('¿DEBIL?   '.$CABELLO_DEBIL),0);
$pdf->Rect(305, 187, 3,3 );
$pdf->Line(10, 192, 314,192);



$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-336);
$pdf->Cell ( 0,359,utf8_decode('PERÍMETRO BRANQUIAL:'),0);


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-290);
$pdf->Cell ( 0,359,utf8_decode('COLOR: MARCA EL COLOR OBTENIDO AL MEDIR LA CIRCUNFERENCIA EN EL PUNTO MEDIO DEL BRAZO'),0);


$pdf->Cell(-290);
$pdf->Cell ( 0,369,utf8_decode('ROJO    '.$COLOR_ROJO),0);
$pdf->Rect(65, 198, 3,3 );


$pdf->Cell(-270);
$pdf->Cell ( 0,369,utf8_decode('NARANJA  '.$COLOR_NARANJA),0);
$pdf->Rect(90, 198, 3,3 );


$pdf->Cell(-245);
$pdf->Cell ( 0,369,utf8_decode('AMARILLO   '.$COLOR_AMARILLO),0);
$pdf->Rect(117, 198, 3,3 );


$pdf->Cell(-215);
$pdf->Cell ( 0,369,utf8_decode('VERDE     '.$COLOR_VERDE),0);
$pdf->Rect(143, 198, 3,3 );


$pdf->Cell(-185);
$pdf->Cell ( 0,369,utf8_decode('MEDIDA  '.$MEDIDA),0);
$pdf->Rect(173, 198, 13,3 );
//FIN PRIMERA HOJA-----------------------------------------------------------------------------------------------------------------------------
$pdf->AddPage();
$pdf->Rect(10, 28, 335,150 );
$pdf->Line(10, 32, 314,32);
//---------------------------------------------------------------------------------------------------------------------------------------------
$pdf->SetFont('Times','B',7.5);
$pdf->Rect(314, 28, 31,150 );
$pdf->Cell(226);
$pdf->Cell ( 0,37,utf8_decode('ACTIVIDADES'),0);
$pdf->Cell(-28);
$pdf->Cell ( 0,43,utf8_decode('EDUCATIVAS EN'),0);
$pdf->Cell(-24);
$pdf->Cell ( 0,49,utf8_decode('MEDIDAS'),0);
$pdf->Cell(-27);
$pdf->Cell ( 0,55,utf8_decode('PREVENTIVAS,'),0);
$pdf->Cell(-31);
$pdf->Cell ( 0,61,utf8_decode('ADMINISTRACIÓN DE'),0);
$pdf->Cell(-28);
$pdf->Cell ( 0,67,utf8_decode('TRATAMIENTO Y'),0);
$pdf->Cell(-28);
$pdf->Cell ( 0,73,utf8_decode('CUIDADOS DE LA'),0);
$pdf->Cell(-26);
$pdf->Cell ( 0,79,utf8_decode('ENFERMEDAD'),0);


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-220);
$pdf->Cell ( 0,30,utf8_decode('APLICACIÓN DE MEDIDAS DE PROTECCIÓN DE LA SALUD'),0);


$pdf->Cell(-336);
$pdf->Cell ( 0,39,utf8_decode('NIÑO O NIÑA MENORES DE 6 MESES'),0);


$pdf->Cell(-260);
$pdf->Cell ( 0,39,utf8_decode('¿EL LACTANTE TOMA SENO?'),0);


$pdf->Cell(-214);
$pdf->Cell ( 0,39,utf8_decode('SI'),0);
$pdf->Rect(136, 33, 3,3 );


$pdf->Cell(-204);
$pdf->Cell ( 0,39,utf8_decode('NO'),0);
$pdf->Rect(148, 33, 3,3 );


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-326);
$pdf->Cell ( 0,46,utf8_decode('¿CUANTAS VECEZ TOMA SENO AL DÍA?'),0);
$pdf->Rect(73, 36, 10,3 );


$pdf->Cell(-335);
$pdf->Cell ( 0,52,utf8_decode('¿CUANTAS VECEZ TOMA SENO EN LA NOCHE?'),0);
$pdf->Rect(73, 39, 10,3 );


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-250);
$pdf->Cell ( 0,46,utf8_decode('¿LA POSICIÓN?'),0);
$pdf->SetFont('Times','',7.5);
$pdf->Cell(-217);
$pdf->Cell ( 0,46,utf8_decode('¿EL LACTANTE ESTA EN DIRECCIÓN AL PECHO DE LA MADRE,'),0);
$pdf->Rect(210, 39, 3,3 );
$pdf->Cell(-183);
$pdf->Cell ( 0,52,utf8_decode('CON LA NARIZ FRENTE AL PEZÓN?'),0);


$pdf->Cell(-211);
$pdf->Cell ( 0,58,utf8_decode('¿EL CUERPO DEL LACTANTE ESTE FRENTE A LA MADRE?'),0);
$pdf->Rect(210, 42, 3,3 );


$pdf->Cell(-205);
$pdf->Cell ( 0,64,utf8_decode('¿LA MADRE SOSTIENE TODO EL CUERPO DEL NIÑO?'),0);
$pdf->Rect(210, 45, 3,3 );


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-130);
$pdf->Cell ( 0,46,utf8_decode('¿AGARRE?'),0);


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-100);
$pdf->Cell ( 0,46,utf8_decode('¿EL MENTON TOCA EL SENO?'),0);
$pdf->Rect(285, 36, 3,3 );


$pdf->Cell(-118);
$pdf->Cell ( 0,52,utf8_decode('¿EL LABIO INFERIOR ESTA HACIA AFUERA?'),0);
$pdf->Rect(285, 39, 3,3 );


$pdf->Cell(-118);
$pdf->Cell ( 0,58,utf8_decode('¿AUREOLA SE VE MAS ARRIBA QUE ABAJO?'),0);
$pdf->Rect(285, 42, 3,3 );


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-326);
$pdf->Cell ( 0,64,utf8_decode('¿TIENE ALGUNA'),0);
$pdf->Cell(-321);
$pdf->Cell ( 0,70,utf8_decode('DIFICULTAD'),0);
$pdf->Cell(-335);
$pdf->Cell ( 0,76,utf8_decode('PARA AMAMANTARLO?'),0);


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-277);
$pdf->Cell ( 0,64,utf8_decode('¿NO LACTA?'),0);
$pdf->Rect(87, 45, 3,3 );


$pdf->Cell(-292);
$pdf->Cell ( 0,70,utf8_decode('¿NO TIENE DIFICULTAD?'),0);
$pdf->Rect(87, 48, 3,3 );


$pdf->Cell(-276);
$pdf->Cell ( 0,76,utf8_decode('¿LE DUELE?'),0);
$pdf->Rect(87, 51, 3,3 );


$pdf->Cell(-288);
$pdf->Cell ( 0,82,utf8_decode('¿NO LE BAJA LECHE?'),0);
$pdf->Rect(87, 54, 3,3 );


$pdf->Cell(-294);
$pdf->Cell ( 0,88,utf8_decode('¿LACERACIÓN DE PEZÓN?'),0);
$pdf->Rect(87, 57, 3,3 );


$pdf->Cell(-288);
$pdf->Cell ( 0,94,utf8_decode('¿HOSPITALIZACIÓN?'),0);
$pdf->Rect(87, 60, 3,3 );


$pdf->Cell(-273);
$pdf->Cell ( 0,100,utf8_decode('¿OTROS?'),0);
$pdf->Rect(87, 63, 3,3 );


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-250);
$pdf->Cell ( 0,71,utf8_decode('¿EL LACTANTE RESIVE'),0);
$pdf->Cell(-243);
$pdf->Cell ( 0,77,utf8_decode('HABITUALMENTE'),0);
$pdf->Cell(-247);
$pdf->Cell ( 0,83,utf8_decode('OTROS ALIMENTOS?'),0);


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-210);
$pdf->Cell ( 0,75,utf8_decode('¿OTRA LECHE?'),0);
$pdf->Rect(157, 51, 3,3 );


$pdf->Cell(-201);
$pdf->Cell ( 0,81,utf8_decode('¿JUGO?'),0);
$pdf->Rect(157, 54, 3,3 );


$pdf->Cell(-202);
$pdf->Cell ( 0,86,utf8_decode('¿AGUA?'),0);
$pdf->Rect(157, 57, 3,3 );


$pdf->Cell(-205);
$pdf->Cell ( 0,92,utf8_decode('¿COLADA?'),0);
$pdf->Rect(157, 60, 3,3 );


$pdf->Cell(-206);
$pdf->Cell ( 0,98,utf8_decode('¿PAPILLAS?'),0);
$pdf->Rect(157, 63, 3,3 );


$pdf->Cell(-208);
$pdf->Cell ( 0,104,utf8_decode('¿NO RESIVE?'),0);
$pdf->Rect(157, 66, 3,3 );


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-180);
$pdf->Cell ( 0,74,utf8_decode('¿ESTOS ALIMENTOS '),0);
$pdf->Cell(-171);
$pdf->Cell ( 0,80,utf8_decode('CONTIENEN?'),0);


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-144);
$pdf->Cell ( 0,75,utf8_decode('¿SAL?'),0);
$pdf->Rect(213, 54, 3,3 );


$pdf->Cell(-149);
$pdf->Cell ( 0,81,utf8_decode('¿AZUCAR?'),0);
$pdf->Rect(213, 51, 3,3 );


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-115);
$pdf->Cell ( 0,74,utf8_decode('¿QUE UTILIZA PARA '),0);
$pdf->Cell(-125);
$pdf->Cell ( 0,80,utf8_decode('ALIMENTAR AL LACTANTE?'),0);


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-79);
$pdf->Cell ( 0,74,utf8_decode('¿TETERO?'),0);
$pdf->Rect(281, 50, 3,3 );


$pdf->Cell(-76);
$pdf->Cell ( 0,80,utf8_decode('¿TASA?'),0);
$pdf->Rect(281, 53, 3,3 );


$pdf->Cell(-82);
$pdf->Cell ( 0,86,utf8_decode('¿CUCHARA?'),0);
$pdf->Rect(281, 56, 3,3 );


$pdf->Cell(-77);
$pdf->Cell ( 0,92,utf8_decode('¿OTRO?'),0);
$pdf->Rect(281, 59, 3,3 );
$pdf->Line(10, 69, 314,69);


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-335);
$pdf->Cell ( 0,112,utf8_decode('NIÑO O NIÑA DE 6 MESES A 5 AÑOS'),0);


$pdf->Cell(-280);
$pdf->Cell ( 0,112,utf8_decode('¿EL NIÑO TOMA SENO?'),0);


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-245);
$pdf->Cell ( 0,112,utf8_decode('SI'),0);
$pdf->Rect(105, 69, 3,3 );


$pdf->Cell(-235);
$pdf->Cell ( 0,112,utf8_decode('NO'),0);
$pdf->Rect(116, 69, 3,3 );


$pdf->Cell(-315);
$pdf->Cell ( 0,119,utf8_decode('¿CUANTAS VECES TOMA SENO EN EL DÍA?'),0);
$pdf->Rect(90, 73, 10,3 );


$pdf->Cell(-320);
$pdf->Cell ( 0,125,utf8_decode('¿CUANTAS VECES TOMA SENO EN LA NOCHE?'),0);
$pdf->Rect(90, 76, 10,3 );


$pdf->Cell(-336);
$pdf->Cell ( 0,131,utf8_decode('¿QUE ALIMENTOS LE DA CON MAYOR FRECUENCIA AL NIÑ@?'),0);


$pdf->Cell(-336);
$pdf->Cell ( 0,139,utf8_decode('¿ESTA EN UN PROGRAMA DE RECUPERACIÓN NUTRICIONAL?'),0);
$pdf->Line(88, 82, 155,82);


$pdf->Cell(-245);
$pdf->Cell ( 0,139,utf8_decode('SI'),0);
$pdf->Rect(105, 83, 3,3 );


$pdf->Cell(-235);
$pdf->Cell ( 0,139,utf8_decode('NO'),0);
$pdf->Rect(116, 83, 3,3 );


$pdf->Cell(-336);
$pdf->Cell ( 0,146,utf8_decode('¿CUAL?'),0);
$pdf->Line(20, 89, 155,89);


$pdf->Cell(-220);
$pdf->Cell ( 0,118,utf8_decode('¿EL NIÑO USA BIBERON?'),0);


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-180);
$pdf->Cell ( 0,118,utf8_decode('SI'),0);
$pdf->Rect(170, 72, 3,3 );


$pdf->Cell(-170);
$pdf->Cell ( 0,118,utf8_decode('NO'),0);
$pdf->Rect(182, 72, 3,3 );


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-177);
$pdf->Cell ( 0,128,utf8_decode('¿QUÉ TOMA EL NIÑ@?'),0);


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-146);
$pdf->Cell ( 0,118,utf8_decode('AGUADEPANELA'),0);
$pdf->Rect(224, 72, 3,3 );


$pdf->Cell(-133);
$pdf->Cell ( 0,124,utf8_decode('LECHE'),0);
$pdf->Rect(224, 75, 3,3 );


$pdf->Cell(-135);
$pdf->Cell ( 0,130,utf8_decode('COLADA'),0);
$pdf->Rect(224, 78, 3,3 );


$pdf->Cell(-131);
$pdf->Cell ( 0,136,utf8_decode('SOPA'),0);
$pdf->Rect(224, 81, 3,3 );


$pdf->Cell(-136);
$pdf->Cell ( 0,142,utf8_decode('GASEOSA'),0);
$pdf->Rect(224, 84, 3,3 );


$pdf->Cell(-131);
$pdf->Cell ( 0,148,utf8_decode('OTRO'),0);
$pdf->Rect(224, 87, 3,3 );



$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-116);
$pdf->Cell ( 0,118,utf8_decode('¿CUÁL ES LA CONCISTENCIA'),0);


$pdf->Cell(-106);
$pdf->Cell ( 0,124,utf8_decode('DE LOS ALIMENTOS?'),0);


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-70);
$pdf->Cell ( 0,118,utf8_decode('LIQUIDA'),0);
$pdf->Rect(290, 72, 3,3 );


$pdf->Cell(-68);
$pdf->Cell ( 0,124,utf8_decode('CREMA'),0);
$pdf->Rect(290, 75, 3,3 );


$pdf->Cell(-70);
$pdf->Cell ( 0,130,utf8_decode('PAPILLA'),0);
$pdf->Rect(290, 78, 3,3 );


$pdf->Cell(-66);
$pdf->Cell ( 0,136,utf8_decode('OTRO'),0);
$pdf->Rect(290, 81, 3,3 );


$pdf->Cell(-110);
$pdf->Cell ( 0,145,utf8_decode('¿EL NIÑO COME SOLO?'),0);


$pdf->Cell(-78);
$pdf->Cell ( 0,145,utf8_decode('SI'),0);
$pdf->Rect(273, 86, 3,3 );


$pdf->Cell(-68);
$pdf->Cell ( 0,145,utf8_decode('NO'),0);
$pdf->Rect(284, 86, 3,3 );
$pdf->Line(10, 90, 314,90);




$pdf->Cell(-210);
$pdf->SetFont('Times','B',7.5);
$pdf->Cell ( 0,154,utf8_decode('EVALUE EL DESARROLLO'),0);
$pdf->Line(10, 94, 314,94);


$pdf->Cell(-334);
$pdf->SetFont('Times','',7.5);
$pdf->Cell ( 0,163,utf8_decode('¿A LOS 3 MESES LEVANTA LA CABEZA?'),0);


$pdf->Cell(-283);
$pdf->Cell ( 0,163,utf8_decode('SI'),0);
$pdf->Rect(67, 95, 3,3 );


$pdf->Cell(-273);
$pdf->Cell ( 0,163,utf8_decode('NO'),0);
$pdf->Rect(79, 95, 3,3 );


$pdf->Cell(-263);
$pdf->Cell ( 0,163,utf8_decode('N/A'),0);
$pdf->Rect(89, 95, 3,3 );


$pdf->Cell(-235);
$pdf->SetFont('Times','',7.5);
$pdf->Cell ( 0,163,utf8_decode('¿A LOS 16 MESES CAMINA SOLO?'),0);


$pdf->Cell(-190);
$pdf->Cell ( 0,163,utf8_decode('SI'),0);
$pdf->Rect(160, 95, 3,3 );


$pdf->Cell(-180);
$pdf->Cell ( 0,163,utf8_decode('NO'),0);
$pdf->Rect(172, 95, 3,3 );


$pdf->Cell(-170);
$pdf->Cell ( 0,163,utf8_decode('N/A'),0);
$pdf->Rect(182, 95, 3,3 );


$pdf->Cell(-145);
$pdf->SetFont('Times','',7.5);
$pdf->Cell ( 0,163,utf8_decode('¿A LOS 36 MESES SUBE/BAJA ESCALERAS SOLO?'),0);


$pdf->Cell(-79);
$pdf->Cell ( 0,163,utf8_decode('SI'),0);
$pdf->Rect(271, 95, 3,3 );


$pdf->Cell(-69);
$pdf->Cell ( 0,163,utf8_decode('NO'),0);
$pdf->Rect(282, 95, 3,3 );


$pdf->Cell(-59);
$pdf->Cell ( 0,163,utf8_decode('N/A'),0);
$pdf->Rect(293, 95, 3,3 );


$pdf->Cell(-336);
$pdf->SetFont('Times','',7.5);
$pdf->Cell ( 0,169,utf8_decode('¿A LOS 6 MESES SE SIENTA CON APOYO?'),0);


$pdf->Cell(-283);
$pdf->Cell ( 0,169,utf8_decode('SI'),0);
$pdf->Rect(67, 98, 3,3 );


$pdf->Cell(-273);
$pdf->Cell ( 0,169,utf8_decode('NO'),0);
$pdf->Rect(79, 98, 3,3 );


$pdf->Cell(-263);
$pdf->Cell ( 0,169,utf8_decode('N/A'),0);
$pdf->Rect(89, 98, 3,3 );

$pdf->Cell(-336);
$pdf->SetFont('Times','',7.5);
$pdf->Cell ( 0,176,utf8_decode('¿A LOS 9 MESES SE SIENTA POR SI SOLO?'),0);


$pdf->Cell(-283);
$pdf->Cell ( 0,176,utf8_decode('SI'),0);
$pdf->Rect(67, 101, 3,3 );


$pdf->Cell(-273);
$pdf->Cell ( 0,176,utf8_decode('NO'),0);
$pdf->Rect(79, 101, 3,3 );


$pdf->Cell(-263);
$pdf->Cell ( 0,176,utf8_decode('N/A'),0);
$pdf->Rect(89, 101, 3,3 );


$pdf->Cell(-336);
$pdf->SetFont('Times','',7.5);
$pdf->Cell ( 0,183,utf8_decode('¿A LOS 12 MESES CAMINA CON APOYO?'),0);


$pdf->Cell(-283);
$pdf->Cell ( 0,183,utf8_decode('SI'),0);
$pdf->Rect(67, 105, 3,3 );


$pdf->Cell(-273);
$pdf->Cell ( 0,183,utf8_decode('NO'),0);
$pdf->Rect(79, 105, 3,3 );


$pdf->Cell(-263);
$pdf->Cell ( 0,183,utf8_decode('N/A'),0);
$pdf->Rect(89, 105, 3,3 );


$pdf->Cell(-236);
$pdf->SetFont('Times','',7.5);
$pdf->Cell ( 0,170,utf8_decode('¿A LOS 20 MESES CORRE RÁPIDO?'),0);


$pdf->Cell(-190);
$pdf->Cell ( 0,170,utf8_decode('SI'),0);
$pdf->Rect(160, 98, 3,3 );


$pdf->Cell(-180);
$pdf->Cell ( 0,170,utf8_decode('NO'),0);
$pdf->Rect(172, 98, 3,3 );


$pdf->Cell(-170);
$pdf->Cell ( 0,170,utf8_decode('N/A'),0);
$pdf->Rect(182, 98, 3,3 );


$pdf->Cell(-240);
$pdf->SetFont('Times','',7.5);
$pdf->Cell ( 0,177,utf8_decode('¿A LOS 24 MESES PATEA LA PELOTA?'),0);


$pdf->Cell(-190);
$pdf->Cell ( 0,177,utf8_decode('SI'),0);
$pdf->Rect(160, 101, 3,3 );


$pdf->Cell(-180);
$pdf->Cell ( 0,177,utf8_decode('NO'),0);
$pdf->Rect(172, 101, 3,3 );


$pdf->Cell(-170);
$pdf->Cell ( 0,177,utf8_decode('N/A'),0);
$pdf->Rect(182, 101, 3,3 );


$pdf->Cell(-250);
$pdf->SetFont('Times','',7.5);
$pdf->Cell ( 0,184,utf8_decode('¿A LOS 30 MESES SE EMPINA EN AMBOS PIES?'),0);


$pdf->Cell(-190);
$pdf->Cell ( 0,184,utf8_decode('SI'),0);
$pdf->Rect(160, 105, 3,3 );


$pdf->Cell(-180);
$pdf->Cell ( 0,184,utf8_decode('NO'),0);
$pdf->Rect(172, 105, 3,3 );


$pdf->Cell(-170);
$pdf->Cell ( 0,184,utf8_decode('N/A'),0);
$pdf->Rect(182, 105, 3,3 );


$pdf->Cell(-145);
$pdf->SetFont('Times','',7.5);
$pdf->Cell ( 0,170,utf8_decode('¿A LOS 48 MESES LANZA Y ATRAPA LA PELOTA?'),0);


$pdf->Cell(-79);
$pdf->Cell ( 0,170,utf8_decode('SI'),0);
$pdf->Rect(271, 98, 3,3 );


$pdf->Cell(-69);
$pdf->Cell ( 0,170,utf8_decode('NO'),0);
$pdf->Rect(282, 98, 3,3 );


$pdf->Cell(-59);
$pdf->Cell ( 0,170,utf8_decode('N/A'),0);
$pdf->Rect(293, 98, 3,3 );


$pdf->Cell(-143);
$pdf->SetFont('Times','',7.5);
$pdf->Cell ( 0,177,utf8_decode('¿A LOS 60 MESES SE PARA Y SALTA EN UN PIE?'),0);


$pdf->Cell(-79);
$pdf->Cell ( 0,177,utf8_decode('SI'),0);
$pdf->Rect(271, 101, 3,3 );


$pdf->Cell(-69);
$pdf->Cell ( 0,177,utf8_decode('NO'),0);
$pdf->Rect(282, 101, 3,3 );


$pdf->Cell(-59);
$pdf->Cell ( 0,177,utf8_decode('N/A'),0);
$pdf->Rect(293, 101, 3,3 );
$pdf->Line(10, 109, 314,109);


$pdf->Cell(-240);
$pdf->SetFont('Times','B',7.5);
$pdf->Cell ( 0,192,utf8_decode('EVALUE LA ADERENCIA AL PROGRAMA DE CRECIMIENTO Y DESARROLLO'),0);
$pdf->Line(10, 112, 314,112);


$pdf->Cell(-336);
$pdf->SetFont('Times','',7.5);
$pdf->Cell ( 0,198,utf8_decode('¿N° DE CONSULTAS DE CRECIMIENTO Y DESARROLLO?'),0);
$pdf->Rect(87, 113, 14,3 );


$pdf->Cell(-316);
$pdf->SetFont('Times','',7.5);
$pdf->Cell ( 0,205,utf8_decode('¿EL NIÑO RESIVE MICRONUTRIENTES?'),0);


$pdf->Cell(-263);
$pdf->Cell ( 0,205,utf8_decode('SI'),0);
$pdf->Rect(87, 116, 3,3 );


$pdf->Cell(-253);
$pdf->Cell ( 0,205,utf8_decode('NO'),0);
$pdf->Rect(98, 116, 3,3 );


$pdf->Cell(-220);
$pdf->Cell ( 0,198,utf8_decode('¿RESIBIÓ DESPARACITACIÓN?'),0);


$pdf->Cell(-175);
$pdf->Cell ( 0,198,utf8_decode('SI'),0);
$pdf->Rect(175, 113, 3,3 );


$pdf->Cell(-165);
$pdf->Cell ( 0,198,utf8_decode('NO'),0);
$pdf->Rect(186, 113, 3,3 );



$pdf->Cell(-220);
$pdf->Cell ( 0,205,utf8_decode('¿CUALES SON?'),0);
$pdf->Line(145, 119, 200,119);


$pdf->Cell(-140);
$pdf->Cell ( 0,198,utf8_decode('FECHA DESPARACITACIÓN'),0);
$pdf->Line(242, 115, 254,115);


$pdf->Cell(-139);
$pdf->Cell ( 0,205,utf8_decode('FECHA ÚLTIMA ENTREGA'),0);
$pdf->Line(242, 119, 254,119);
$pdf->Line(10, 120, 314,120);


$pdf->Cell(-220);
$pdf->SetFont('Times','B',7.5);
$pdf->Cell ( 0,214,utf8_decode('EVALUACÓN DEL BUEN TRATO'),0);
$pdf->Line(145, 119, 200,119);
$pdf->Line(10, 124, 314,124);


$pdf->Cell(-330);
$pdf->SetFont('Times','',7.5);
$pdf->Cell ( 0,222,utf8_decode('¿LE SONRIEN?'),0);


$pdf->Cell(-305);
$pdf->Cell ( 0,222,utf8_decode('SI'),0);
$pdf->Rect(45, 124, 3,3 );


$pdf->Cell(-295);
$pdf->Cell ( 0,222,utf8_decode('NO'),0);
$pdf->Rect(56, 124, 3,3 );


$pdf->Cell(-336);
$pdf->Cell ( 0,229,utf8_decode('¿LO ACOMPAÑAN?'),0);


$pdf->Cell(-305);
$pdf->Cell ( 0,229,utf8_decode('SI'),0);
$pdf->Rect(45, 128, 3,3 );


$pdf->Cell(-295);
$pdf->Cell ( 0,229,utf8_decode('NO'),0);
$pdf->Rect(56, 128, 3,3 );


$pdf->Cell(-270);
$pdf->Cell ( 0,222,utf8_decode('¿ALZAN O ARRULLAN AL NIÑO/A?'),0);


$pdf->Cell(-220);
$pdf->Cell ( 0,222,utf8_decode('SI'),0);
$pdf->Rect(130, 124, 3,3 );


$pdf->Cell(-210);
$pdf->Cell ( 0,222,utf8_decode('NO'),0);
$pdf->Rect(142, 124, 3,3 );


$pdf->Cell(-277);
$pdf->Cell ( 0,229,utf8_decode('¿LE JUEGAN O PERMITEN QUE JUEGUE?'),0);


$pdf->Cell(-220);
$pdf->Cell ( 0,229,utf8_decode('SI'),0);
$pdf->Rect(130, 128, 3,3 );


$pdf->Cell(-210);
$pdf->Cell ( 0,229,utf8_decode('NO'),0);
$pdf->Rect(142, 128, 3,3 );


$pdf->Cell(-160);
$pdf->Cell ( 0,222,utf8_decode('¿SE PREOCUPAN POR LA HIGIENE?'),0);


$pdf->Cell(-112);
$pdf->Cell ( 0,222,utf8_decode('SI'),0);
$pdf->Rect(238, 124, 3,3 );


$pdf->Cell(-105);
$pdf->Cell ( 0,222,utf8_decode('NO'),0);
$pdf->Rect(247, 124, 3,3 );


$pdf->Cell(-195);
$pdf->Cell ( 0,229,utf8_decode('¿LO CASTIGAN CON CORREA,PALMADAS,PATADAS O PUÑOS?'),0);


$pdf->Cell(-112);
$pdf->Cell ( 0,229,utf8_decode('SI'),0);
$pdf->Rect(238, 128, 3,3 );


$pdf->Cell(-105);
$pdf->Cell ( 0,229,utf8_decode('NO'),0);
$pdf->Rect(247, 128, 3,3 );


$pdf->Cell(-90);
$pdf->Cell ( 0,222,utf8_decode('¿SE PREOCUPA POR SU SALUD?'),0);


$pdf->Cell(-48);
$pdf->Cell ( 0,222,utf8_decode('SI'),0);
$pdf->Rect(302, 124, 3,3 );


$pdf->Cell(-41);
$pdf->Cell ( 0,222,utf8_decode('NO'),0);
$pdf->Rect(310, 124, 3,3 );


$pdf->Cell(-95);
$pdf->Cell ( 0,229,utf8_decode('¿TIENE ACCIDENTES FRECUENTES?'),0);


$pdf->Cell(-48);
$pdf->Cell ( 0,229,utf8_decode('SI'),0);
$pdf->Rect(302, 128, 3,3 );


$pdf->Cell(-41);
$pdf->Cell ( 0,229,utf8_decode('NO'),0);
$pdf->Rect(310, 128, 3,3 );
$pdf->Line(10, 132, 314,132);


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(-215);
$pdf->Cell ( 0,238,utf8_decode('RIESGOS DE ACCIDENTES EN EL HOGAR'),0);
$pdf->Line(10, 136, 314,136);


$pdf->Cell(-320);
$pdf->SetFont('Times','',7.5);
$pdf->Cell ( 0,246,utf8_decode('¿ESTA SOLO TOMANDOSE EL TETETRO?'),0);


$pdf->Cell(-260);
$pdf->Cell ( 0,246,utf8_decode('SI'),0);
$pdf->Rect(90, 136, 3,3 );


$pdf->Cell(-250);
$pdf->Cell ( 0,246,utf8_decode('NO'),0);
$pdf->Rect(102, 136, 3,3 );


$pdf->Cell(-336);
$pdf->Cell ( 0,253,utf8_decode('¿OBJECTOS PEQUEÑOS AL ALCANCE DE LOS NIÑOS?'),0);


$pdf->Cell(-260);
$pdf->Cell ( 0,253,utf8_decode('SI'),0);
$pdf->Rect(90, 140, 3,3 );


$pdf->Cell(-250);
$pdf->Cell ( 0,253,utf8_decode('NO'),0);
$pdf->Rect(102, 140, 3,3 );


$pdf->Cell(-300);
$pdf->Cell ( 0,259,utf8_decode('¿NIÑOS EN LA COCINA?'),0);


$pdf->Cell(-260);
$pdf->Cell ( 0,259,utf8_decode('SI'),0);
$pdf->Rect(90, 143, 3,3 );


$pdf->Cell(-250);
$pdf->Cell ( 0,259,utf8_decode('NO'),0);
$pdf->Rect(102, 143, 3,3 );



$pdf->Cell(-227);
$pdf->SetFont('Times','',7.5);
$pdf->Cell ( 0,246,utf8_decode('¿CUCHILLOS, SERRUCHOS,TIJERAS AL ALCANCE DE LOS NIÑOS?'),0);


$pdf->Cell(-140);
$pdf->Cell ( 0,246,utf8_decode('SI'),0);
$pdf->Rect(210, 136, 3,3 );


$pdf->Cell(-130);
$pdf->Cell ( 0,246,utf8_decode('NO'),0);
$pdf->Rect(222, 136, 3,3 );



$pdf->Cell(-225);
$pdf->SetFont('Times','',7.5);
$pdf->Cell ( 0,252,utf8_decode('¿MEDICAMENTOS-INSECTICIDAS AL ALCANCE DE LOS NIÑOS?'),0);


$pdf->Cell(-140);
$pdf->Cell ( 0,252,utf8_decode('SI'),0);
$pdf->Rect(210, 139, 3,3 );


$pdf->Cell(-130);
$pdf->Cell ( 0,252,utf8_decode('NO'),0);
$pdf->Rect(222, 139, 3,3 );


$pdf->Cell(-235);
$pdf->SetFont('Times','',7.5);
$pdf->Cell ( 0,258,utf8_decode('¿ESCALERAS-TERRAZAS SIN BARANDAS-VENTANAS SIN PROTECCIÓN?'),0);


$pdf->Cell(-140);
$pdf->Cell ( 0,258,utf8_decode('SI'),0);
$pdf->Rect(210, 142, 3,3 );


$pdf->Cell(-130);
$pdf->Cell ( 0,258,utf8_decode('NO'),0);
$pdf->Rect(222, 142, 3,3 );


$pdf->Cell(-217);
$pdf->SetFont('Times','',7.5);
$pdf->Cell ( 0,264,utf8_decode('¿EXISTEN OTROS RIESGOS PARA EL NIÑO EN EL HOGAR?'),0);


$pdf->Cell(-140);
$pdf->Cell ( 0,264,utf8_decode('SI'),0);
$pdf->Rect(210, 145, 3,3 );


$pdf->Cell(-130);
$pdf->Cell ( 0,264,utf8_decode('NO'),0);
$pdf->Rect(222, 145, 3,3 );



$pdf->Cell(-99);
$pdf->SetFont('Times','',7.5);
$pdf->Cell ( 0,246,utf8_decode('¿AGUA ALMACENADA SIN TAPA?'),0);


$pdf->Cell(-53);
$pdf->Cell ( 0,246,utf8_decode('SI'),0);
$pdf->Rect(297, 136, 3,3 );


$pdf->Cell(-43);
$pdf->Cell ( 0,246,utf8_decode('NO'),0);
$pdf->Rect(308, 136, 3,3 );



$pdf->Cell(-106);
$pdf->SetFont('Times','',7.5);
$pdf->Cell ( 0,252,utf8_decode('¿ENCHUFES Y CABLES DESCUBIERTOS?'),0);


$pdf->Cell(-53);
$pdf->Cell ( 0,252,utf8_decode('SI'),0);
$pdf->Rect(297, 139, 3,3 );


$pdf->Cell(-43);
$pdf->Cell ( 0,252,utf8_decode('NO'),0);
$pdf->Rect(308, 139, 3,3 );


$pdf->Cell(-119);
$pdf->SetFont('Times','',7.5);
$pdf->Cell ( 0,258,utf8_decode('¿VELAS Y FÓSFOROS AL ALCANCE DE LOS NIÑOS?'),0);


$pdf->Cell(-53);
$pdf->Cell ( 0,258,utf8_decode('SI'),0);
$pdf->Rect(297, 142, 3,3 );


$pdf->Cell(-43);
$pdf->Cell ( 0,258,utf8_decode('NO'),0);
$pdf->Rect(308, 142, 3,3 );
$pdf->Line(10, 149, 314,149);



$pdf->Cell(-217);
$pdf->SetFont('Times','B',7.5);
$pdf->Cell ( 0,271,utf8_decode('¿PROBLEMAS AMBIENTALES Y DE HIGIENE?'),0);
$pdf->Line(10, 152, 314,152);


$pdf->SetFont('Times','',7.5);
$pdf->Cell(-319);
$pdf->Cell ( 0,278,utf8_decode('¿NIÑOS O ADULTOS CON ROPA SUCIA?'),0);
$pdf->Rect(77, 153, 3,3 );


$pdf->Cell(-335);
$pdf->Cell ( 0,284,utf8_decode('¿NIÑOS O ADULTOS CON MANOS Y UÑAS SUCIAS?'),0);
$pdf->Rect(77, 156, 3,3 );


$pdf->Cell(-298);
$pdf->Cell ( 0,290,utf8_decode('¿NIÑOS DESCALZOS?'),0);
$pdf->Rect(77, 159, 3,3 );


$pdf->Cell(-324);
$pdf->Cell ( 0,296,utf8_decode('¿BASURA Y DESORDEN DE LA VIVIENDA?'),0);
$pdf->Rect(77, 162, 3,3 );


$pdf->Cell(-333);
$pdf->Cell ( 0,302,utf8_decode('¿ALIMENTOS SIN ALMACENAR Y NO CUBIERTOS?'),0);
$pdf->Rect(77, 165, 3,3 );


$pdf->Cell(-336);
$pdf->Cell ( 0,308,utf8_decode('¿PERSONAS QUE FUMAN DENTRO DE LA VIVIENDA?'),0);
$pdf->Rect(77, 168, 3,3 );


$pdf->Cell(-298);
$pdf->Cell ( 0,314,utf8_decode('¿NO USAN TOLDILLO?'),0);
$pdf->Rect(77, 171, 3,3 );


$pdf->Cell(-160);
$pdf->Cell ( 0,278,utf8_decode('¿INSECTOS Y RATONES EN LA VIVIENDA O ALREDEDORES?'),0);
$pdf->Rect(263, 152, 3,3 );


$pdf->Cell(-157);
$pdf->Cell ( 0,284,utf8_decode('¿MANEJO ADECUADO DE LAS BASURAS / RECOLECCION?'),0);
$pdf->Rect(263, 155, 3,3 );


$pdf->Cell(-130);
$pdf->Cell ( 0,290,utf8_decode('¿SE CONSUME AGUA NO POTABLE?'),0);
$pdf->Rect(263, 158, 3,3 );


$pdf->Cell(-151);
$pdf->Cell ( 0,296,utf8_decode('¿ESTUFA O BRASERO UBICADO EN LA HABITACIÓN?'),0);
$pdf->Rect(263, 161, 3,3 );


$pdf->Cell(-145);
$pdf->Cell ( 0,302,utf8_decode('¿VIVIENDA SIN ILUMINACIÓN Y VENTILACIÓN?'),0);
$pdf->Rect(263, 164, 3,3 );


$pdf->Cell(-147);
$pdf->Cell ( 0,308,utf8_decode('¿EVITAN CAMBIOS BRUSCOS DE TEMPERATURA?'),0);
$pdf->Rect(263, 167, 3,3 );


$pdf->Cell(-160);
$pdf->Cell ( 0,314,utf8_decode('¿CHARCOS,ZANJAS Y OBJETOS DONDE SE ACUMULA AGUA?'),0);
$pdf->Rect(263, 170, 3,3 );


$pdf->Cell(-187);
$pdf->Cell ( 0,320,utf8_decode('¿ADULTO CON TOS O GRIPA, QUE CUIDAN/ ALIMENTAN AL NIÑO SIN TAPABOCA?'),0);
$pdf->Rect(263, 173, 3,3 );


$pdf->Cell(-336);
$pdf->SetFont('Times','B',7.5);
$pdf->Cell ( 0,360,utf8_decode('NOMBRE DEL GESTOR DE CALIDAD DE VIDA'),0);
$pdf->Line(70, 196, 150,196);


$pdf->Cell(-195);
$pdf->SetFont('Times','B',7.5);
$pdf->Cell ( 0,360,utf8_decode('FIRMA DE LA PERSONA QUE RESIVE LA VISITA'),0);
$pdf->Line(214, 196, 336,196);


$pdf->Output(); 

?>