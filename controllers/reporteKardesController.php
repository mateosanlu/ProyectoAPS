<?php 
//require('librerias/fpdf/fpdf.php');
class reporteKardesController extends Controller
{
    private $_pdf;
    
    public function __construct() {
        parent::__construct();
        $this->getLibrary('rotation');
        $this->_pdf = new PDF_Rotate('l','mm','Legal');
        $this->_modeloKardex = $this->loadModel('kardes');
    }
    
    public function index(){}
    
    public function reporteKardesPdf($id_miembro)
    {

$this->_pdf->AliasNbPages();
$this->_pdf->AddPage();
$this->_pdf->SetFont('Times','',7.5);
$this->_pdf->SetTitle ( 'KARDEX', false);
$this->_pdf->SetAutoPageBreak(false,1); 
$this->_pdf->Rect(133, 7, 70,5 );
//------------------------------------------------------------------------------------------------------------------------------------------------
//Header
// Logo
    $this->_pdf->Image('C:\xampp\htdocs\ProyectoAPS\views\layout\default\img\LogoHospital.png',10,0,30);
    // Arial bold 15
    $this->_pdf->SetFont('Arial','B',6);
    // Movernos a la derecha
    $this->_pdf->Cell(130);
    // Título
    $this->_pdf->Cell(1,0,utf8_decode('KARDEX INDIVIDUAL DE GESTANTES Y PUERPERAS'),'C');
    // Salto de línea
//----------------------------------------------------------------------------------------------------------------------------------------------
//Footer
// Posición: a 1,5 cm del final
    $this->_pdf->SetX(-15);
    // Arial italic 8
    $this->_pdf->SetFont('Arial','I',8);
    // Número de página
    $this->_pdf->Cell(0,10,'Page '.$this->_pdf->PageNo().'/{nb}',0,0,'C');

$data=$this->_modeloKardex->kardex($id_miembro);
$PrI=$this->_modeloKardex->getRespuesta($id_miembro,114);
$Escolaridad=$this->_modeloKardex->getRespuesta($id_miembro,106);
$Regimen=$this->_modeloKardex->getRespuesta($id_miembro,110);
$TER_GEST=$this->_modeloKardex->getRespuesta($id_miembro,130);
$TERMINACIONGESTACIONKARDEX=$this->_modeloKardex->getRespuestakARDEX($id_miembro,130);




 $data[0]['DES_MUNICIPIO'];
 $data[0]['NOMBRE_MIEMBRO'];
 $data[0]['APELLIDO_MIEMBRO'];
 $data[0]['DOC_MIEMBRO_FIRMA'];
 $data[0]['TIPO_DOCUMENTO'];
 $data[0]['NUM_FICHA'];
    $MUNICIPIO=$data[0]['DES_MUNICIPIO'];
    $NOMBRES=$data[0]['NOMBRE_MIEMBRO'].' '.$data[0]['APELLIDO_MIEMBRO'];
    $DOCUMENTO=$data[0]['DOC_MIEMBRO_FIRMA'];
    $FICHA= $data[0]['NUM_FICHA'];

$CC='';
$TI='';
$RC='';
$CE='';


if (strcmp('Cedula de ciudadanía',$data[0]['TIPO_DOCUMENTO'])== 0) {
  
  $CC='X';
}
if (strcmp('Tarjeta de identidad',$data[0]['TIPO_DOCUMENTO'])== 0) {
  
  $TI='X';
}
if (strcmp('Registro civil',$data[0]['TIPO_DOCUMENTO'])== 0) {
  
  $RC='X';
}
if (strcmp('Cedula de extranjería',$data[0]['TIPO_DOCUMENTO'])== 0) {
  
  $CE='X';
}

if (strcmp('Cedula de extranjería',$data[0]['TIPO_DOCUMENTO'])== 0) {
  
  $CE='X';
}


$GESTANTE='';
$PUERPERA='';

if (strcmp('Gestante',$data[0]['CONDICION'])== 0) {
  
  $GESTANTE='X';
}

if (strcmp('Puerpera',$data[0]['CONDICION'])== 0) {
  
  $PUERPERA='X';
}
//----------------------------------------------------------------------------------------------------------------------------------------------

$FECHA=explode ( "-" , $data[0]['FECHA_NACIMIENTO']); 
$FNA=$FECHA[0];
$FNM=$FECHA[1];
$FND=$FECHA[2];
$AÑOS=$data[0]['EDAD'];
$TELEFONO=$data[0]['TELEFONO'];
$BARRIO=$data[0]['DES_BARRIO'];
$DIRECCION=$data[0]['NOMECLATURA'];



$URBANO='';
if ($data[0]['ID_ZONA']==1) {
  $URBANO='X';
}


$RURAL='';
if ($data[0]['ID_ZONA']==2) {
  $RURAL='X';
}

$GRADO_ESCOLARIDAD=$Escolaridad;


$REGIMEN=$Regimen;
$EPS=$data[0]['DES_EPS'];
$IPS=$data[0]['NOM_IPS_ATENDIDO'];
$TERMINACIONGESTACION=$TERMINACIONGESTACIONKARDEX;
$RECIENNACIDO='';

if ($data[0]['RECIEN_NACIDO']==0) {
 $RECIENNACIDO='SI';
}

if ($data[0]['RECIEN_NACIDO']==1) {
 $RECIENNACIDO='NO';
}

$CORDON='';

if ($data[0]['CORDON_UMBILICAL']==0) {
 $CORDON='SI';
}


if ($data[0]['CORDON_UMBILICAL']==1) {
 $CORDON='N0';
}



$this->_pdf->SetFont('Times','',6);
$this->_pdf->Cell(-340);
$this->_pdf->Cell ( 0,32,utf8_decode('MUNICIPIO      '.$MUNICIPIO),0);
$this->_pdf->Rect(5, 24, 15,4 );
$this->_pdf->Rect(20, 24, 60,4 );


$this->_pdf->Cell(-225);
$this->_pdf->Cell ( 0,29,utf8_decode('APELLIDOS Y NOMBRES DE LA GESTANTE'),0);
$this->_pdf->Rect(98, 18, 90,4 );
$this->_pdf->Rect(98, 22, 90,4 );
$this->_pdf->Cell(-247);
$this->_pdf->Cell ( 0,20,utf8_decode($NOMBRES),0);

$this->_pdf->Rect(190, 18, 23,8 );
$this->_pdf->Rect(213, 18, 24,4 );
$this->_pdf->Cell(-155);
$this->_pdf->Cell ( 0,21,utf8_decode('N° DOCUMENTO DE'),0);
$this->_pdf->Cell(-151);
$this->_pdf->Cell ( 0,27,utf8_decode('IDENTIDAD'),0);
$this->_pdf->Rect(213, 22, 6,4 );
$this->_pdf->Rect(219, 22, 6,4 );
$this->_pdf->Rect(225, 22, 6,4 );
$this->_pdf->Rect(231, 22, 6,4 );
$this->_pdf->Cell(-132);
$this->_pdf->Cell ( 0,21,utf8_decode($DOCUMENTO),0);
$this->_pdf->Cell(-132);
$this->_pdf->Cell ( 0,28,utf8_decode($RC),0);
$this->_pdf->Cell(-126);
$this->_pdf->Cell ( 0,28,utf8_decode($TI),0);
$this->_pdf->Cell(-120);
$this->_pdf->Cell ( 0,28,utf8_decode($CC),0);
$this->_pdf->Cell(-114);
$this->_pdf->Cell ( 0,28,utf8_decode($CE),0);

$this->_pdf->Cell(-132);
$this->_pdf->Cell ( 0,29,utf8_decode('RC'),0);

$this->_pdf->Cell(-126);
$this->_pdf->Cell ( 0,29,utf8_decode('TI'),0);


$this->_pdf->Cell(-120);
$this->_pdf->Cell ( 0,29,utf8_decode('CC'),0);


$this->_pdf->Cell(-114);
$this->_pdf->Cell ( 0,29,utf8_decode('CE'),0);


$this->_pdf->Rect(280, 8, 23,4 );
$this->_pdf->Rect(280, 12, 23,4 );


$this->_pdf->Cell(-59);
$this->_pdf->Cell ( 0,8,utf8_decode('N° FICHA'),0);
$this->_pdf->Cell(-65);
$this->_pdf->Cell ( 0,1,utf8_decode($FICHA),0);



$this->_pdf->Rect(240, 12, 15,4 );
$this->_pdf->Rect(255, 12, 15,4 );


$this->_pdf->Cell(-105);
$this->_pdf->Cell ( 0,8,utf8_decode('GESTANTE'),0);
$this->_pdf->Cell(-100);
$this->_pdf->Cell ( 0,8,utf8_decode($GESTANTE),0);


$this->_pdf->Cell(-90);
$this->_pdf->Cell ( 0,8,utf8_decode('PUERPERA'),0);
$this->_pdf->Cell(-85);
$this->_pdf->Cell ( 0,8,utf8_decode($PUERPERA),0);


$this->_pdf->Cell(-339);
$this->_pdf->Cell ( 0,52,utf8_decode('FECHA DE NACIMIENTO'),0);
$this->_pdf->Rect(5, 30, 18,4 );
$this->_pdf->Rect(23, 30, 18,4 );
$this->_pdf->Rect(41, 30, 18,4 );
$this->_pdf->Rect(62, 30, 18,4 );
$this->_pdf->Rect(62, 34, 18,4 );
$this->_pdf->Rect(5, 34, 54,4 );
$this->_pdf->Cell(-310);
$this->_pdf->Cell ( 0,52,utf8_decode('(AA / MM / DD)'),0);

$this->_pdf->Cell(-339);
$this->_pdf->Cell ( 0,44,utf8_decode($FNA),0);
$this->_pdf->Cell(-315);
$this->_pdf->Cell ( 0,44,utf8_decode($FNM),0);
$this->_pdf->Cell(-300);
$this->_pdf->Cell ( 0,44,utf8_decode($FND),0);

$this->_pdf->Cell(-278);
$this->_pdf->Cell ( 0,52,utf8_decode('EDAD'),0);
$this->_pdf->Cell(-279);
$this->_pdf->Cell ( 0,44,utf8_decode($AÑOS),0);

$this->_pdf->Rect(85, 30, 25,4 );
$this->_pdf->Rect(85, 34, 25,4 );
$this->_pdf->Cell(-255);
$this->_pdf->Cell ( 0,52,utf8_decode('TELEFONO'),0);
$this->_pdf->Cell(-255);
$this->_pdf->Cell ( 0,44,utf8_decode($TELEFONO),0);


$this->_pdf->Rect(115, 30, 25,4 );
$this->_pdf->Rect(115, 34, 25,8 );
$this->_pdf->Cell(-229);
$this->_pdf->Cell ( 0,52,utf8_decode('BARRIO/VEREDA            '),0);
$this->_pdf->Cell(-225);
$this->_pdf->Cell ( 0,44,utf8_decode('DIRECCION                '.$DIRECCION),0);
$this->_pdf->Rect(140, 30, 60,4 );
$this->_pdf->Rect(140, 34, 60,8 );
$this->_pdf->Rect(115, 42, 13.5,4 );
$this->_pdf->Rect(128.5, 42, 13.5,4 );
$this->_pdf->Rect(142.1, 42, 13.5,4 );
$this->_pdf->Rect(155.5, 42, 13.5,4 );
$this->_pdf->Cell(-229);
$this->_pdf->Cell ( 0,69,utf8_decode('URBANO         '.$URBANO),0);
$this->_pdf->Cell(-202);
$this->_pdf->Cell ( 0,69,utf8_decode('RURAL               '.$RURAL),0);

$ETNIA=$PrI;
$this->_pdf->SetFont('Times','',6);
$this->_pdf->Rect(205, 30, 15,14 );
$this->_pdf->Cell(-137);
$this->_pdf->Cell ( 0,54,utf8_decode('ETNIA'),0);
$this->_pdf->Rect(220, 30, 26,14 );


$this->_pdf->Rect(250, 30, 15,14 );
$this->_pdf->Rect(265, 30, 26,14 );

  $CONDICION_ESPECIAL='';

if ($data[0]['CONDICION_ESPECIAL']== 1) {
  
  $CONDICION_ESPECIAL='DISCAPACITADO';
}
if ($data[0]['CONDICION_ESPECIAL']== 2) {
  
  $CONDICION_ESPECIAL='DEZPLAZADA';
}
if ($data[0]['CONDICION_ESPECIAL']== 3) {
  
  $CONDICION_ESPECIAL='VICTIMA DEL CONFLICTO ARMADO';
}
if ($data[0]['CONDICION_ESPECIAL']== 4) {
  
  $CONDICION_ESPECIAL='VICTIMA DE ABUSO SEXUAL';
}
if ($data[0]['CONDICION_ESPECIAL']== 5) {
  
  $CONDICION_ESPECIAL=$data[0]['OTRO_CONDICION_ESPECIAL'];
}

  


$this->_pdf->Cell(-95);
$this->_pdf->Cell ( 0,52,utf8_decode('CONDICION'),0);
$this->_pdf->Cell(-95);
$this->_pdf->Cell ( 0,58,utf8_decode('ESPECIAL'),0);




$this->_pdf->Rect(295, 30, 25,14 );
$this->_pdf->Rect(320, 30, 26,14 );


$this->_pdf->Cell(-50);
$this->_pdf->Cell ( 0,55,utf8_decode('GRADO ESCOLARIDAD'),0);


$this->_pdf->Cell(-335);
$this->_pdf->Cell ( 0,85,utf8_decode('REGIMEN DE AFILIACIÓN'),0);
$this->_pdf->Rect(5, 46, 40,4 );
$this->_pdf->Rect(5, 50, 40,4 );
$this->_pdf->Cell(-340);
$this->_pdf->Cell ( 0,77,utf8_decode($REGIMEN),0);


$this->_pdf->Cell(-290);
$this->_pdf->Cell ( 0,85,utf8_decode('NOMBRE DE LA EPS'),0);
$this->_pdf->Rect(49, 42, 43,8 );
$this->_pdf->Rect(49, 50, 43,4 );



$IPS_PRIMARIA_ATENCION=$data[0]['IPS_PRIMARIA_ATENCION'];
$this->_pdf->Cell(-240);
$this->_pdf->Cell ( 0,85,utf8_decode('NOMBRE IPS PRIMARIA DE ATENCIÓN'),0);
$this->_pdf->Rect(96, 46, 60,4 );
$this->_pdf->Rect(96, 50, 60,4 );
$this->_pdf->Cell(-249);
$this->_pdf->Cell ( 0,77,utf8_decode($IPS_PRIMARIA_ATENCION),0);


$this->_pdf->Cell(-174);
$this->_pdf->Cell ( 0,85,utf8_decode('TERMINACION DE LA GESTACION'),0);
$this->_pdf->Rect(160, 46, 60,4 );
$this->_pdf->Rect(160, 50, 60,4 );
$this->_pdf->Cell(-185);
$this->_pdf->Cell ( 0,77,utf8_decode($TERMINACIONGESTACION),0);

$this->_pdf->Cell(-105);
$this->_pdf->Cell ( 0,85,utf8_decode('RECIEN NACIDO'),0);
$this->_pdf->Rect(225, 46, 60,4 );
$this->_pdf->Rect(225, 50, 60,4 );
$this->_pdf->Cell(-120);
$this->_pdf->Cell ( 0,77,utf8_decode($RECIENNACIDO),0);

$this->_pdf->Cell(-35);
$this->_pdf->Cell ( 0,85,utf8_decode('CORDON UMBILICAL'),0);
$this->_pdf->Rect(290, 46, 60,4 );
$this->_pdf->Rect(290, 50, 60,4 );
$this->_pdf->Cell(-55);
$this->_pdf->Cell ( 0,77,utf8_decode($CORDON),0);



$this->_pdf->Cell(-335);
$this->_pdf->Cell ( 0,96,utf8_decode('ANTECEDENTES OBSTETRICOS'),0);
$this->_pdf->Rect(5, 56, 48.8,4 );
$this->_pdf->Rect(5, 60, 8.3,4 );
$this->_pdf->Rect(13.5, 60, 8.3,4 );
$this->_pdf->Rect(21.5, 60, 8.3,4 );
$this->_pdf->Rect(29.5, 60, 8.3,4 );
$this->_pdf->Rect(37.5, 60, 8.3,4 );
$this->_pdf->Rect(45.5, 60, 8.3,4 );

$this->_pdf->Rect(5, 64, 8.3,4 );
$this->_pdf->Rect(13.5, 64, 8.3,4 );
$this->_pdf->Rect(21.5, 64, 8.3,4 );
$this->_pdf->Rect(29.5, 64, 8.3,4 );
$this->_pdf->Rect(37.5, 64, 8.3,4 );
$this->_pdf->Rect(45.5, 64, 8.3,4 );


$G= $data[0]['NUM_GESTACIONES'];
$P= $data[0]['NUM_PARTOS'];
$C= $data[0]['NUM_CESAREAS'];
$A= $data[0]['NUM_ABORTOS'];
$V= $data[0]['NUM_HIJOS_VIVOS'];
$M= $data[0]['NUM_HIJOS_MUERTOS'];


$this->_pdf->SetFont('Times','B',6);
$this->_pdf->Cell(-337);
$this->_pdf->Cell ( 0,112,utf8_decode('G'),0);
$this->_pdf->Cell(-337);
$this->_pdf->Cell ( 0,105,utf8_decode($G),0);


$this->_pdf->SetFont('Times','B',6);
$this->_pdf->Cell(-330);
$this->_pdf->Cell ( 0,112,utf8_decode('P'),0);
$this->_pdf->Cell(-330);
$this->_pdf->Cell ( 0,105,utf8_decode($P),0);


$this->_pdf->SetFont('Times','B',6);
$this->_pdf->Cell(-322);
$this->_pdf->Cell ( 0,112,utf8_decode('C'),0);
$this->_pdf->Cell(-322);
$this->_pdf->Cell ( 0,105,utf8_decode($C),0);

$this->_pdf->SetFont('Times','B',6);
$this->_pdf->Cell(-314);
$this->_pdf->Cell ( 0,112,utf8_decode('A'),0);
$this->_pdf->Cell(-314);
$this->_pdf->Cell ( 0,105,utf8_decode($A),0);


$this->_pdf->SetFont('Times','B',6);
$this->_pdf->Cell(-306);
$this->_pdf->Cell ( 0,112,utf8_decode('V'),0);
$this->_pdf->Cell(-306);
$this->_pdf->Cell ( 0,105,utf8_decode($V),0);

$this->_pdf->SetFont('Times','B',6);
$this->_pdf->Cell(-298);
$this->_pdf->Cell ( 0,112,utf8_decode('M'),0);
$this->_pdf->Cell(-298);
$this->_pdf->Cell ( 0,105,utf8_decode($M),0);



$FUP=explode ( "-" , $data[0]['FECHA_ULTIMO_PARTO']); 
$FUPA=$FUP[0];
$FUPM=$FUP[1];
$FUPD=$FUP[2];
$this->_pdf->Rect(58, 60, 27,4 );
$this->_pdf->Cell(-286);
$this->_pdf->Cell ( 0,105,utf8_decode('FUP   (AA /  MM /  DD)'),0);
$this->_pdf->Rect(58, 56, 9,4 );
$this->_pdf->Rect(67, 56, 9,4 );
$this->_pdf->Rect(76, 56, 9,4 );
$this->_pdf->Cell(-286);
$this->_pdf->Cell ( 0,97,$FUPA,0);
$this->_pdf->Cell(-277);
$this->_pdf->Cell ( 0,97,$FUPM,0);
$this->_pdf->Cell(-266);
$this->_pdf->Cell ( 0,97,$FUPD,0);

$FUM=explode ( "-" , $data[0]['FECHA_ULTIMA_MENS']); 
$FUMA=$FUM[0];
$FUMM=$FUM[1];
$FUMD=$FUM[2];

$this->_pdf->Rect(90, 60, 27,4 );
$this->_pdf->Cell(-254);
$this->_pdf->Cell ( 0,105,utf8_decode('FUM   (AA /  MM /  DD)'),0);
$this->_pdf->Rect(90, 56, 9,4 );
$this->_pdf->Rect(99, 56, 9,4 );
$this->_pdf->Rect(108, 56, 9,4 );
$this->_pdf->Cell(-254);
$this->_pdf->Cell ( 0,96,utf8_decode($FUMA),0);
$this->_pdf->Cell(-245);
$this->_pdf->Cell ( 0,96,utf8_decode($FUMM),0);
$this->_pdf->Cell(-234);
$this->_pdf->Cell ( 0,96,utf8_decode($FUMD),0);

$FPP=explode ( "-" , $data[0]['FECHA_PROB_PARTO']); 
$FPPA=$FPP[0];
$FPPM=$FPP[1];
$FPPD=$FPP[2];
$this->_pdf->Rect(122, 60, 27,4 );
$this->_pdf->Cell(-222);
$this->_pdf->Cell ( 0,105,utf8_decode('FPP   (AA /  MM /  DD)'),0);
$this->_pdf->Rect(122, 56, 9,4 );
$this->_pdf->Rect(131, 56, 9,4 );
$this->_pdf->Rect(140, 56, 9,4 );
$this->_pdf->Cell(-222);
$this->_pdf->Cell ( 0,96,utf8_decode($FPPA),0);
$this->_pdf->Cell(-212);
$this->_pdf->Cell ( 0,96,utf8_decode($FPPM),0);
$this->_pdf->Cell(-202);
$this->_pdf->Cell ( 0,96,utf8_decode($FPPD),0);

$FDP=explode ( "-" , $data[0]['FECHA_PARTO']);
$FDPA=$FDP[0];
$FDPM=$FDP[1];
$FDPD=$FDP[2];
$this->_pdf->Rect(154, 60, 39,4 );
$this->_pdf->Cell(-192);
$this->_pdf->Cell ( 0,105,utf8_decode('FECHA DEL PARTO (AA /  MM /  DD)'),0);
$this->_pdf->Rect(154, 56, 13,4 );
$this->_pdf->Rect(167, 56, 13,4 );
$this->_pdf->Rect(180, 56, 13,4 );
$this->_pdf->Cell(-190);
$this->_pdf->Cell ( 0,96,utf8_decode($FDPA),0);
$this->_pdf->Cell(-174);
$this->_pdf->Cell ( 0,96,utf8_decode($FDPM),0);
$this->_pdf->Cell(-162);
$this->_pdf->Cell ( 0,96,utf8_decode($FDPD),0);

$ATENCION_PARTO='';
if ($data[0]['ATENCION_PARTO']==1) {
$ATENCION_PARTO='INSTITUCIONAL';
}

if ($data[0]['ATENCION_PARTO']==2) {
$ATENCION_PARTO='PARTERA';
}

$this->_pdf->Rect(200, 56, 25,4 );
$this->_pdf->Rect(200, 60, 25,4 );
$this->_pdf->Cell(-144);
$this->_pdf->Cell ( 0,105,utf8_decode('ATENCIÓN PARTO'),0);
$this->_pdf->Cell(-144);
$this->_pdf->Cell ( 0,96,utf8_decode($ATENCION_PARTO),0);


$this->_pdf->Cell(-95);
$this->_pdf->Cell ( 0,105,utf8_decode('NOMBRE DE LA IPS DE ATENCIÓN DEL PARTO'),0);
$this->_pdf->Rect(235, 56, 85,4 );
$this->_pdf->Rect(235, 60, 85,4 );
$this->_pdf->Cell(-110);
$this->_pdf->Cell ( 0,96,utf8_decode($IPS),0);
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

$this->_pdf->SetFont('Times','B',4);
$this->_pdf->Cell(-336);
$this->_pdf->Cell ( 0,130,utf8_decode('FECHA VISITA'),0);
$this->_pdf->Rect(9, 70, 13,15 );


$this->_pdf->SetFont('Times','B',4);
$this->_pdf->Cell(-336);
$this->_pdf->Cell ( 0,200,utf8_decode('AA'),0);
$this->_pdf->Cell(-332);
$this->_pdf->Cell ( 0,200,utf8_decode('MM'),0);
$this->_pdf->Cell(-328);
$this->_pdf->Cell ( 0,200,utf8_decode('DD'),0);
$this->_pdf->Rect(9, 85, 5,35 );
$this->_pdf->Rect(14, 85, 4,35 );
$this->_pdf->Rect(18, 85, 4,35 );



$this->_pdf->Cell(-318);
$this->_pdf->Cell ( 0,130,utf8_decode('ASISTENCIA A'),0);
$this->_pdf->Cell(-318);
$this->_pdf->Cell ( 0,134,utf8_decode('CONTROLES'),0);
$this->_pdf->Cell(-318);
$this->_pdf->Cell ( 0,138,utf8_decode('PRENATALES'),0);
$this->_pdf->Rect(26, 70, 14,50 );
$this->_pdf->Rect(26, 85, 5,35 );
$this->_pdf->Rect(31, 85, 5,35 );
$this->_pdf->Rect(36, 85, 4,35 );


$this->_pdf->SetFont('Times','',4);
$this->_pdf->Cell(-292);
$this->_pdf->Cell ( 0,125,utf8_decode('CLASIFICACIÓN DEL'),0);
$this->_pdf->Cell(-292);
$this->_pdf->Cell ( 0,129,utf8_decode('RIESGO GESTANTE'),0);
$this->_pdf->Rect(54, 70, 16,15 );
$this->_pdf->SetFont('Times','B',4);
$this->_pdf->Cell(-292);
$this->_pdf->Cell ( 0,133,utf8_decode('*VER OPCIONES'),0);
$this->_pdf->Cell(-292);
$this->_pdf->Cell ( 0,137,utf8_decode('PARTE INFERIOR'),0);


$this->_pdf->Cell(-292);
$this->_pdf->Cell ( 0,195,utf8_decode('1.ALTO'),0);
$this->_pdf->Cell(-292);
$this->_pdf->Cell ( 0,199,utf8_decode('2.BAJO'),0);


$this->_pdf->SetFont('Times','',4);
$this->_pdf->Cell(-292);
$this->_pdf->Cell ( 0,153,utf8_decode('1.ANTECEDENTES'),0);
$this->_pdf->Cell(-292);
$this->_pdf->Cell ( 0,157,utf8_decode('OBSTÉTRICOS'),0);
$this->_pdf->Rect(54, 106, 6,14 );
$this->_pdf->Rect(60, 106, 10,14 );




$this->_pdf->Cell(-292);
$this->_pdf->Cell ( 0,161,utf8_decode('2.CONDICIONES'),0);
$this->_pdf->Cell(-292);
$this->_pdf->Cell ( 0,165,utf8_decode('ASOCIADAS'),0);


$this->_pdf->Cell(-292);
$this->_pdf->Cell ( 0,169,utf8_decode('3.EMBARAZO'),0);
$this->_pdf->Cell(-292);
$this->_pdf->Cell ( 0,173,utf8_decode('ACTUAL'),0);


$this->_pdf->Cell(-292);
$this->_pdf->Cell ( 0,177,utf8_decode('4.RIEZGO'),0);
$this->_pdf->Cell(-292);
$this->_pdf->Cell ( 0,181,utf8_decode('PSICOSOCIAL'),0);


$this->_pdf->Cell(-292);
$this->_pdf->Cell ( 0,185,utf8_decode('5.UBICACIÓN'),0);
$this->_pdf->Cell(-292);
$this->_pdf->Cell ( 0,189,utf8_decode('GEOGRÁFICA'),0);






$this->_pdf->Rect(81, 70, 16,15 );
$this->_pdf->Rect(81, 85, 16,35 );
$this->_pdf->Cell(-262);
$this->_pdf->Cell ( 0,128,utf8_decode('PATOLOGIAS'),0);
$this->_pdf->Cell(-261);
$this->_pdf->Cell ( 0,132,utf8_decode('EN LA'),0);
$this->_pdf->Cell(-262);
$this->_pdf->Cell ( 0,136,utf8_decode('GESTACIÓN'),0);
$this->_pdf->Cell(-261);
$this->_pdf->Cell ( 0,140,utf8_decode('ACTUAL'),0);


$this->_pdf->Cell(-265);
$this->_pdf->Cell ( 0,155,utf8_decode('1.SIFILIS'),0);
$this->_pdf->Cell(-265);
$this->_pdf->Cell ( 0,159,utf8_decode('GESTACIONAL'),0);
$this->_pdf->Cell(-265);
$this->_pdf->Cell ( 0,163,utf8_decode('2.VIH HESTACIONAL'),0);
$this->_pdf->Cell(-265);
$this->_pdf->Cell ( 0,167,utf8_decode('3.ANEMIA'),0);
$this->_pdf->Cell(-265);
$this->_pdf->Cell ( 0,171,utf8_decode('4.HEPATITIS B'),0);
$this->_pdf->Cell(-265);
$this->_pdf->Cell ( 0,175,utf8_decode('5.TOXOPLASMOSIS'),0);
$this->_pdf->Cell(-265);
$this->_pdf->Cell ( 0,179,utf8_decode('6.OTRO,CUAL'),0);



$this->_pdf->Cell(-244);
$this->_pdf->Cell ( 0,153,utf8_decode('1.CALCIO'),0);
$this->_pdf->Cell(-244);
$this->_pdf->Cell ( 0,157,utf8_decode('2.HIERRO'),0);
$this->_pdf->Cell(-244);
$this->_pdf->Cell ( 0,161,utf8_decode('3.ACIDO'),0);
$this->_pdf->Cell(-244);
$this->_pdf->Cell ( 0,165,utf8_decode('FÓLICO'),0);
$this->_pdf->Cell(-244);
$this->_pdf->Cell ( 0,169,utf8_decode('4.CALCIO,'),0);
$this->_pdf->Cell(-244);
$this->_pdf->Cell ( 0,173,utf8_decode('HIERRO Y'),0);
$this->_pdf->Cell(-244);
$this->_pdf->Cell ( 0,177,utf8_decode('ACIDO'),0);
$this->_pdf->Cell(-244);
$this->_pdf->Cell ( 0,181,utf8_decode('FÓLICO'),0);
$this->_pdf->Cell(-244);
$this->_pdf->Cell ( 0,185,utf8_decode('NINGUNO'),0);



$this->_pdf->SetFont('Times','',4);
$this->_pdf->Rect(110, 70, 22,15 );
$this->_pdf->Cell(-230);
$this->_pdf->Cell ( 0,125,utf8_decode('REQUIRIO'),0);
$this->_pdf->Cell(-234);
$this->_pdf->Cell ( 0,129,utf8_decode('HOSPITALIZACION POR'),0);
$this->_pdf->Cell(-234);
$this->_pdf->Cell ( 0,133,utf8_decode('CAUSAS DE MORBILIDAD'),0);
$this->_pdf->Cell(-229);
$this->_pdf->Cell ( 0,137,utf8_decode('COMO:'),0);



$this->_pdf->SetFont('Times','',4);
$this->_pdf->Cell(-236);
$this->_pdf->Cell ( 0,180,utf8_decode('2. NO'),0);
$this->_pdf->Cell(-236);
$this->_pdf->Cell ( 0,175,utf8_decode('1. SI'),0);
$this->_pdf->Rect(110, 85, 5,35 );
$this->_pdf->Rect(115, 85, 17,35 );



$this->_pdf->SetFont('Times','',4);
$this->_pdf->Cell(-230);
$this->_pdf->Cell ( 0,155,utf8_decode('1.TRASTORNO'),0);
$this->_pdf->Cell(-230);
$this->_pdf->Cell ( 0,159,utf8_decode('HIPERTENSIVOS'),0);
$this->_pdf->Cell(-230);
$this->_pdf->Cell ( 0,163,utf8_decode('2.HEMORRAGIAS'),0);
$this->_pdf->Cell(-230);
$this->_pdf->Cell ( 0,167,utf8_decode('3.COMPLICACIONES'),0);
$this->_pdf->Cell(-230);
$this->_pdf->Cell ( 0,171,utf8_decode('DE ABORTO'),0);
$this->_pdf->Cell(-230);
$this->_pdf->Cell ( 0,175,utf8_decode('4.SEPSIS DE ORIGEN'),0);
$this->_pdf->Cell(-230);
$this->_pdf->Cell ( 0,179,utf8_decode('OBSTÉTRICO Y NO'),0);
$this->_pdf->Cell(-230);
$this->_pdf->Cell ( 0,183,utf8_decode('OBSTÉTRICO'),0);
$this->_pdf->Cell(-230);
$this->_pdf->Cell ( 0,187,utf8_decode('5.E.PREEXISTENTE'),0);
$this->_pdf->Cell(-230);
$this->_pdf->Cell ( 0,191,utf8_decode('6.OTRA,CUAL'),0);



$this->_pdf->SetFont('Times','',4);
$this->_pdf->Cell(-214);
$this->_pdf->Cell ( 0,155,utf8_decode('1.FAMILIAR'),0);
$this->_pdf->SetFont('Times','',4);
$this->_pdf->Cell(-214);
$this->_pdf->Cell ( 0,159,utf8_decode('2.PAREJA'),0);
$this->_pdf->SetFont('Times','',4);
$this->_pdf->Cell(-214);
$this->_pdf->Cell ( 0,163,utf8_decode('3.OTRO'),0);
$this->_pdf->SetFont('Times','',4);
$this->_pdf->Cell(-214);
$this->_pdf->Cell ( 0,167,utf8_decode('4.NINGUNO'),0);


$this->_pdf->Rect(142, 70, 18,15 );
$this->_pdf->Rect(142, 85, 18,35 );
$this->_pdf->Cell(-200);
$this->_pdf->Cell ( 0,125,utf8_decode('EDUCACIÓN'),0);
$this->_pdf->Cell(-200);
$this->_pdf->Cell ( 0,129,utf8_decode('BRINDADA'),0);
$this->_pdf->Cell(-200);
$this->_pdf->Cell ( 0,133,utf8_decode('(TEMAS)'),0);



$this->_pdf->Cell(-203);
$this->_pdf->Cell ( 0,155,utf8_decode('1.SIGNOS DE ALARMA'),0);
$this->_pdf->Cell(-203);
$this->_pdf->Cell ( 0,159,utf8_decode('2.AUTOCUIDADO'),0);
$this->_pdf->Cell(-203);
$this->_pdf->Cell ( 0,163,utf8_decode('3.NUTRICION'),0);
$this->_pdf->Cell(-203);
$this->_pdf->Cell ( 0,167,utf8_decode('ALIMENTARIA'),0);
$this->_pdf->Cell(-203);
$this->_pdf->Cell ( 0,171,utf8_decode('4.LACTANCIA'),0);
$this->_pdf->Cell(-203);
$this->_pdf->Cell ( 0,175,utf8_decode('MATERNA'),0);
$this->_pdf->Cell(-203);
$this->_pdf->Cell ( 0,179,utf8_decode('5.VACUNACION'),0);
$this->_pdf->Cell(-203);
$this->_pdf->Cell ( 0,183,utf8_decode('6.DERECHOS'),0);
$this->_pdf->Cell(-203);
$this->_pdf->Cell ( 0,187,utf8_decode('SEXUALES Y'),0);
$this->_pdf->Cell(-203);
$this->_pdf->Cell ( 0,191,utf8_decode('REPRODUCTIVOS'),0);
$this->_pdf->Cell(-203);
$this->_pdf->Cell ( 0,195,utf8_decode('7.CUIDADOS RN'),0);
$this->_pdf->Cell(-203);
$this->_pdf->Cell ( 0,199,utf8_decode('8.OTRO'),0);
$this->_pdf->Cell(-203);
$this->_pdf->Cell ( 0,203,utf8_decode('9.NINGUNO'),0);



$this->_pdf->Rect(160, 70, 22,15 );
$this->_pdf->Cell(-184);
$this->_pdf->Cell ( 0,125,utf8_decode('CANALIZACIÓN A '),0);
$this->_pdf->Cell(-184);
$this->_pdf->Cell ( 0,129,utf8_decode('SERVICIOS'),0);


$this->_pdf->Cell(-186);
$this->_pdf->Cell ( 0,155,utf8_decode('1.CPN'),0);
$this->_pdf->Cell(-186);
$this->_pdf->Cell ( 0,159,utf8_decode('2.VACUNACIÓN'),0);
$this->_pdf->Cell(-186);
$this->_pdf->Cell ( 0,163,utf8_decode('3.ODONTOLOGIA'),0);
$this->_pdf->Cell(-186);
$this->_pdf->Cell ( 0,167,utf8_decode('4.PLANIFICACIÓN'),0);
$this->_pdf->Cell(-186);
$this->_pdf->Cell ( 0,171,utf8_decode('FAMILIAR'),0);
$this->_pdf->Cell(-186);
$this->_pdf->Cell ( 0,175,utf8_decode('5.CONTROL'),0);
$this->_pdf->Cell(-186);
$this->_pdf->Cell ( 0,179,utf8_decode('PUERPERIO'),0);
$this->_pdf->Cell(-186);
$this->_pdf->Cell ( 0,183,utf8_decode('6.CURSO'),0);
$this->_pdf->Cell(-186);
$this->_pdf->Cell ( 0,187,utf8_decode('PREPARACIÓN'),0);
$this->_pdf->Cell(-186);
$this->_pdf->Cell ( 0,191,utf8_decode('MATERNIDAD'),0);
$this->_pdf->Cell(-186);
$this->_pdf->Cell ( 0,195,utf8_decode('7.PSICOLOGIA'),0);
$this->_pdf->Cell(-186);
$this->_pdf->Cell ( 0,199,utf8_decode('8.OTRO'),0);


$this->_pdf->Rect(182, 70, 10,15 );
$this->_pdf->Cell(-164);
$this->_pdf->Cell ( 0,129,utf8_decode('N° DE DOSIS '),0);
$this->_pdf->Cell(-163);
$this->_pdf->Cell ( 0,125,utf8_decode('VACUNAS'),0);


$this->_pdf->Cell(-154);
$this->_pdf->Cell ( 0,187,utf8_decode('1.SI'),0);
$this->_pdf->Cell(-154);
$this->_pdf->Cell ( 0,191,utf8_decode('2.NO'),0);



$this->_pdf->Rect(198, 85, 7,35 );
$this->_pdf->Cell(-148);
$this->_pdf->Cell ( 0,187,utf8_decode('1.ALTO'),0);
$this->_pdf->Cell(-148);
$this->_pdf->Cell ( 0,191,utf8_decode('2.BAJO'),0);



$this->_pdf->Cell(-141);
$this->_pdf->Cell ( 0,155,utf8_decode('1.POR SIGNO'),0);
$this->_pdf->Cell(-141);
$this->_pdf->Cell ( 0,159,utf8_decode('DE ALARMA'),0);
$this->_pdf->Cell(-141);
$this->_pdf->Cell ( 0,163,utf8_decode('2.RIESGO'),0);
$this->_pdf->Cell(-141);
$this->_pdf->Cell ( 0,167,utf8_decode('PSICOSOCIAL'),0);
$this->_pdf->Cell(-141);
$this->_pdf->Cell ( 0,171,utf8_decode('3.PATOLOGÍA'),0);
$this->_pdf->Cell(-141);
$this->_pdf->Cell ( 0,175,utf8_decode('DE'),0);
$this->_pdf->Cell(-141);
$this->_pdf->Cell ( 0,179,utf8_decode('PUERPERA'),0);



$this->_pdf->Cell(-120);
$this->_pdf->Cell ( 0,187,utf8_decode('1.SI'),0);
$this->_pdf->Cell(-120);
$this->_pdf->Cell ( 0,191,utf8_decode('2.NO'),0);



$this->_pdf->Cell(-113);
$this->_pdf->Cell ( 0,183,utf8_decode('1.BCG'),0);
$this->_pdf->Cell(-113);
$this->_pdf->Cell ( 0,187,utf8_decode('2.HB'),0);
$this->_pdf->Cell(-113);
$this->_pdf->Cell ( 0,191,utf8_decode('3.NV'),0);



$this->_pdf->Cell(-93);
$this->_pdf->Cell ( 0,187,utf8_decode('1.SI'),0);
$this->_pdf->Cell(-93);
$this->_pdf->Cell ( 0,191,utf8_decode('2.NO'),0);



$this->_pdf->Cell(-77);
$this->_pdf->Cell ( 0,155,utf8_decode('1.ORAL'),0);
$this->_pdf->Cell(-77);
$this->_pdf->Cell ( 0,159,utf8_decode('2.DIU'),0);
$this->_pdf->Cell(-77);
$this->_pdf->Cell ( 0,163,utf8_decode('3.LIGADURA DE'),0);
$this->_pdf->Cell(-77);
$this->_pdf->Cell ( 0,167,utf8_decode('TROMPAS'),0);
$this->_pdf->Cell(-77);
$this->_pdf->Cell ( 0,171,utf8_decode('4.INYECTABLE'),0);
$this->_pdf->Cell(-77);
$this->_pdf->Cell ( 0,175,utf8_decode('5.OTRO,CUAL'),0);
$this->_pdf->Cell(-77);
$this->_pdf->Cell ( 0,179,utf8_decode('6.NINGUNO'),0);




//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
$this->_pdf->Rect(5, 70, 4,50);
$this->_pdf->SetFont('Times','',4);
$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-98,7,utf8_decode('N° DE VISITA'),0);
$this->_pdf->Rotate(0);


$this->_pdf->Rect(22, 70, 4,50 );
$this->_pdf->SetFont('Times','',4);
$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-105,24,utf8_decode('SEMANA GESTACIÓN ACTUAL'),0);
$this->_pdf->Rotate(0);


$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-110,29,utf8_decode('N°'),0);
$this->_pdf->Rotate(0);
$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-110,34,utf8_decode('FECHA'),0);
$this->_pdf->Rotate(0);
$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-110,39,utf8_decode('SEMANA GESTACIONAL'),0);
$this->_pdf->Rotate(0);


$this->_pdf->Rect(40, 70, 5,50 );
$this->_pdf->Rotate(90,0,0);
$this->_pdf->SetFont('Times','',4);
$this->_pdf->Text(-95,42,utf8_decode('CARNET'),0);
$this->_pdf->Text(-96,44,utf8_decode('MATERNO'),0);
$this->_pdf->Rotate(0);



$this->_pdf->Rect(45, 70, 5,50 );
$this->_pdf->Rotate(90,0,0);
$this->_pdf->SetFont('Times','',4);
$this->_pdf->Text(-110,47,utf8_decode('SEMANA GESTACIONAL DEL PRIMER CONTROL'),0);
$this->_pdf->Text(-100,49,utf8_decode('PRENATAL'),0);
$this->_pdf->Rotate(0);



$this->_pdf->Rect(50, 70, 4,50 );
$this->_pdf->Rotate(90,0,0);
$this->_pdf->SetFont('Times','',4);
$this->_pdf->Text(-110,52,utf8_decode('FECHA DE INGRESO A CONTROL PRENATAL'),0);
$this->_pdf->Rotate(0);


$this->_pdf->Rect(70, 70, 11,50 );
$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-105,72,utf8_decode('SIGNOS DE ALARMA DETECTADOS'),0);
$this->_pdf->Text(-103,74,utf8_decode('DURANTE LA GESTACIÓN'),0);
$this->_pdf->Text(-110,76,utf8_decode('ENUMERAR DE ACUERDO A LAS OPCIONES'),0);
$this->_pdf->Text(-115,78,utf8_decode('DEPENDIENDO SI SE ENCUENTRA ANTES O DESPUES DE LA '),0);
$this->_pdf->Text(-105,80,utf8_decode('SEMANA 20 DE GESTACIÓN *'),0);
$this->_pdf->Rotate(0);





$this->_pdf->Rect(97, 70, 5,50 );
$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-113,99,utf8_decode('ASISTENCIA AL CURSO DE PREPARACIÓN PARA LA'),0);
$this->_pdf->Text(-110,101,utf8_decode('MATERNIDAD-PATERNIDAD Y EL PARTO (1.SI 2.NO)'),0);
$this->_pdf->Rotate(0);

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$this->_pdf->Rect(102, 70, 8,15 );
$this->_pdf->Rect(102, 85, 8,35 );
$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-83,104,utf8_decode('SUMINISTROS DE'),0);
$this->_pdf->Text(-84,107,utf8_decode('MICRONUTRIENTES'),0);
$this->_pdf->Rotate(0);


$this->_pdf->Rect(132, 70, 10,15 );
$this->_pdf->Rect(132, 85, 10,35 );
$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-80,135,utf8_decode('APOYO'),0);
$this->_pdf->Text(-82,137,utf8_decode('PSICOSOCIAL'),0);
$this->_pdf->Rotate(0);


$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-105,176,utf8_decode('FECHA'),0);
$this->_pdf->Rotate(0);
$this->_pdf->Rect(160, 85, 13,35 );
$this->_pdf->Rect(173, 85, 9,35 );


$this->_pdf->Rect(182, 85, 5,35 );
$this->_pdf->Rect(187, 85, 5,35 );
$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-105,185,utf8_decode('TD/TT'),0);
$this->_pdf->Text(-108,191,utf8_decode('INFLUENZA'),0);
$this->_pdf->Rotate(0);


$this->_pdf->Rect(192, 70, 6,15 );
$this->_pdf->Rect(192, 85, 6,35 );
$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-84,194,utf8_decode('REQUIRIO APOYO'),0);
$this->_pdf->Text(-84,196,utf8_decode('DE TRANSPORTE'),0);
$this->_pdf->Rotate(0);


$this->_pdf->SetFont('Times','',4);
$this->_pdf->Rect(198, 70, 17,15 );
$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-82,206,utf8_decode('CLASIFICACIÓN'),0);
$this->_pdf->Text(-82,208,utf8_decode('DEL RIESGO'),0);
$this->_pdf->Text(-82,210,utf8_decode('PUERPERA'),0);
$this->_pdf->Rotate(0);
$this->_pdf->Rect(205, 85, 10,35 );



$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-105,218,utf8_decode('SIGNOS DE ALARMA DETECTADOS DURANTE'),0);
$this->_pdf->Text(-98,220,utf8_decode('EL PUERPERIO'),0);
$this->_pdf->Text(-105,222,utf8_decode('ENUMERAR DE ACUERDO A LAS OPCIONES*'),0);
$this->_pdf->Rotate(0);
$this->_pdf->Rect(215, 70, 10,50 );


$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-83,227,utf8_decode('VACUNACIÓN'),0);
$this->_pdf->Text(-83,229,utf8_decode('PUERPERA'),0);
$this->_pdf->Rotate(0);
$this->_pdf->Rect(225, 70, 7,15 );
$this->_pdf->Rect(225, 85, 7,35 );


$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-81,234,utf8_decode('VACUNA'),0);
$this->_pdf->Text(-82,237,utf8_decode('RECIÉN NACIDO'),0);
$this->_pdf->Rotate(0);
$this->_pdf->Rect(232, 70, 7,15 );
$this->_pdf->Rect(232, 85, 7,35 );


$this->_pdf->Rect(239, 70, 5,50 );
$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-100,242,utf8_decode('CONTROL DEL RECIEN NACIDO (FECHA)'),0);
$this->_pdf->Rotate(0);


$this->_pdf->Rect(244, 70, 4,50 );
$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-88,247,utf8_decode('PESO RECIÉN NACIDO'),0);
$this->_pdf->Text(-88,251,utf8_decode('TALLA RECIÉN NACIDO'),0);
$this->_pdf->Rotate(0);
$this->_pdf->Rect(248, 70, 4,50 );



$this->_pdf->Rect(252, 70, 7,15 );
$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-80,255,utf8_decode('LACTANCIA'),0);
$this->_pdf->Text(-80,257,utf8_decode('MATERNA'),0);
$this->_pdf->Rotate(0);
$this->_pdf->Rect(252, 85, 7,35 );



$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-87,261,utf8_decode('CONTROL POSPARTO'),0);
$this->_pdf->Text(-84,263,utf8_decode('(FECHA)'),0);
$this->_pdf->Rotate(0);
$this->_pdf->Rect(259, 70, 5,50 );



$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-97,266,utf8_decode('CONTROL PLANIFICACION FAMILIAR'),0);
$this->_pdf->Text(-87,268,utf8_decode('(FECHA)'),0);
$this->_pdf->Rotate(0);
$this->_pdf->Rect(264, 70, 5,50 );


$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-80,273,utf8_decode('MÉTODO DE'),0);
$this->_pdf->Text(-82,275,utf8_decode('PLANIFICACIÓN'),0);
$this->_pdf->Text(-82,277,utf8_decode('RECOMENDADA'),0);
$this->_pdf->Rotate(0);
$this->_pdf->Rect(269, 70, 12,15 );
$this->_pdf->Rect(269, 85, 12,35 );



$this->_pdf->SetFont('Times','',6);
$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-104,300,utf8_decode('OBSERVACIONES'),0);
$this->_pdf->Rotate(0);
$this->_pdf->Rect(281, 70, 40,50 );



$this->_pdf->SetFont('Times','',6);
$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-104,335,utf8_decode('FIRMA GESTANTE'),0);
$this->_pdf->Rotate(0);
$this->_pdf->Rect(321, 70, 27,50 );

//----------------------------------------------------------------------------------------------------------------------------
$this->_pdf->SetFont('Times','',4);
$VAR=2;
$contY=223;
for ($i=0; $i < $VAR; $i++) { 
    # code...
$Y1="1.1";
$Y2="1.2";
$Y3="1.3";
$Y4="1.4";
$Y5="1.5";
$Y6="1.6";
$Y7="1.7";
$Y8="2.1";
$Y9="2.2";
$Y10="2.3";


//----------------------------------------------------------------------------------------------------------------------------
$this->_pdf->Cell(-286);
$this->_pdf->Cell ( 0,$contY,utf8_decode($Y1),0);
$this->_pdf->Cell(-283);
$this->_pdf->Cell ( 0,$contY,utf8_decode($Y2),0);
$this->_pdf->Cell(-280);
$this->_pdf->Cell ( 0,$contY,utf8_decode($Y3),0);
$contY=$contY+5;
$this->_pdf->Cell(-286);
$this->_pdf->Cell ( 0,$contY,utf8_decode($Y4),0);
$this->_pdf->Cell(-283);
$this->_pdf->Cell ( 0,$contY,utf8_decode($Y5),0);
$this->_pdf->Cell(-280);
$this->_pdf->Cell ( 0,$contY,utf8_decode($Y6),0);
$contY=$contY+5;
$this->_pdf->Cell(-286);
$this->_pdf->Cell ( 0,$contY,utf8_decode($Y7),0);
$this->_pdf->Cell(-283);
$this->_pdf->Cell ( 0,$contY,utf8_decode($Y8),0);
$this->_pdf->Cell(-280);
$this->_pdf->Cell ( 0,$contY,utf8_decode($Y9),0);
$contY=$contY+5;
$this->_pdf->Cell(-286);
$this->_pdf->Cell ( 0,$contY,utf8_decode($Y10),0);

$contY=$contY+5;

}


$NVISITA='';
for ($i=0; $i < count($data) ; $i++) { 
 
 $NVISITA=$data[$i]['NUM_VISITA'];

}


$contNumeroVisita=223;
for ($i=0; $i < count($data); $i++) { 
    # code...
$this->_pdf->Cell(-341);
$this->_pdf->Cell ( 0,$contNumeroVisita,utf8_decode($NVISITA),0);
$contNumeroVisita=$contNumeroVisita+27;

}


$this->_pdf->SetFont('Times','',4);


for ($i=0; $i < count($data) ; $i++) { 

  $FV=explode ( "-" , $data[$i]['FECHA_VISITA']); 
  
  $A=0;
  $A++;
  $FVA=$FV[$A];
   $A++;
  $FVM=$FV[$A];
   $A++;
  $FVD=$FV[$A];
   $A++;
}





$this->_pdf->Cell(-337);
$this->_pdf->Cell ( 0,223,utf8_decode($FVA),0);

$this->_pdf->Cell(-332);
$this->_pdf->Cell ( 0,223,utf8_decode($FVM),0);

$this->_pdf->Cell(-328);
$this->_pdf->Cell ( 0,223,utf8_decode($FVD),0);

$this->_pdf->Cell(-323);
$this->_pdf->Cell ( 0,223,utf8_decode('5'),0);

$this->_pdf->Cell(-319);
$this->_pdf->Cell ( 0,223,utf8_decode('N°'),0);

$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-127,35,utf8_decode('2016-07-27'),0);
$this->_pdf->Rotate(0);

$this->_pdf->Cell(-309);
$this->_pdf->Cell ( 0,223,utf8_decode('3'),0);

$this->_pdf->Cell(-309);
$this->_pdf->Cell ( 0,223,utf8_decode('3'),0);

$this->_pdf->Cell(-305);
$this->_pdf->Cell ( 0,223,utf8_decode('SI'),0);

$this->_pdf->Cell(-300);
$this->_pdf->Cell ( 0,223,utf8_decode('4'),0);

$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-127,53,utf8_decode('2016-07-27'),0);
$this->_pdf->Rotate(0);

$this->_pdf->Cell(-291);
$this->_pdf->Cell ( 0,223,utf8_decode('1'),0);


$this->_pdf->Cell(-265);
$this->_pdf->Cell ( 0,223,utf8_decode('1'),0);
$this->_pdf->Cell(-263);
$this->_pdf->Cell ( 0,223,utf8_decode('2'),0);
$this->_pdf->Cell(-261);
$this->_pdf->Cell ( 0,223,utf8_decode('3'),0);
$this->_pdf->Cell(-259);
$this->_pdf->Cell ( 0,223,utf8_decode('4'),0);
$this->_pdf->Cell(-257);
$this->_pdf->Cell ( 0,223,utf8_decode('5'),0);
$this->_pdf->Cell(-255);
$this->_pdf->Cell ( 0,223,utf8_decode('6'),0);

$this->_pdf->Cell(-248);
$this->_pdf->Cell ( 0,223,utf8_decode('SI'),0);

$this->_pdf->Cell(-243);
$this->_pdf->Cell ( 0,223,utf8_decode('->'),0);

$this->_pdf->Cell(-235);
$this->_pdf->Cell ( 0,223,utf8_decode('SI'),0);

$this->_pdf->Cell(-230);
$this->_pdf->Cell ( 0,223,utf8_decode('->'),0);

$this->_pdf->Cell(-213);
$this->_pdf->Cell ( 0,223,utf8_decode('->'),0);

$this->_pdf->Cell(-213);
$this->_pdf->Cell ( 0,223,utf8_decode('->'),0);

$this->_pdf->Cell(-203);
$this->_pdf->Cell ( 0,223,utf8_decode('1'),0);
$this->_pdf->Cell(-201);
$this->_pdf->Cell ( 0,223,utf8_decode('2'),0);
$this->_pdf->Cell(-199);
$this->_pdf->Cell ( 0,223,utf8_decode('3'),0);
$this->_pdf->Cell(-197);
$this->_pdf->Cell ( 0,223,utf8_decode('4'),0);
$this->_pdf->Cell(-195);
$this->_pdf->Cell ( 0,223,utf8_decode('5'),0);
$this->_pdf->Cell(-193);
$this->_pdf->Cell ( 0,223,utf8_decode('6'),0);
$this->_pdf->Cell(-191);
$this->_pdf->Cell ( 0,223,utf8_decode('7'),0);
$this->_pdf->Cell(-189);
$this->_pdf->Cell ( 0,223,utf8_decode('8'),0);
$this->_pdf->Cell(-203);
$this->_pdf->Cell ( 0,228,utf8_decode('9'),0);

$this->_pdf->Cell(-185);
$this->_pdf->Cell ( 0,223,utf8_decode('1'),0);
$this->_pdf->Cell(-183);
$this->_pdf->Cell ( 0,223,utf8_decode('2'),0);
$this->_pdf->Cell(-181);
$this->_pdf->Cell ( 0,223,utf8_decode('3'),0);
$this->_pdf->Cell(-179);
$this->_pdf->Cell ( 0,223,utf8_decode('4'),0);
$this->_pdf->Cell(-177);
$this->_pdf->Cell ( 0,223,utf8_decode('5'),0);
$this->_pdf->Cell(-175);
$this->_pdf->Cell ( 0,223,utf8_decode('6'),0);
$this->_pdf->Cell(-185);
$this->_pdf->Cell ( 0,229,utf8_decode('7'),0);
$this->_pdf->Cell(-183);
$this->_pdf->Cell ( 0,229,utf8_decode('8'),0);


$TAMCUADRO=10;
$contX=120;

$CONTADOR=223;

$TAM=6;
for ($i=0; $i < $TAM ; $i++) { 
    # code...
$this->_pdf->Cell(-172);
$this->_pdf->Cell ( 0,$CONTADOR,utf8_decode('2016-07-27'),0);

$CONTADOR=$CONTADOR+3;

}

if ($CONTADOR > 241) {
    # code...
    $TAMCUADRO=$TAMCUADRO+3;

}




for($i=1;$i<=$VAR;$i++)
{

$this->_pdf->Rect(5, $contX, 4,$TAMCUADRO );
$this->_pdf->Rect(9, $contX, 5,$TAMCUADRO );
$this->_pdf->Rect(14, $contX, 4,$TAMCUADRO );
$this->_pdf->Rect(18, $contX, 4,$TAMCUADRO );
$this->_pdf->Rect(22, $contX, 4,$TAMCUADRO );
$this->_pdf->Rect(26, $contX, 14,$TAMCUADRO );
$this->_pdf->Rect(40, $contX, 5,$TAMCUADRO );
$this->_pdf->Rect(45, $contX, 5,$TAMCUADRO );
$this->_pdf->Rect(50, $contX, 4,$TAMCUADRO );
$this->_pdf->Rect(54, $contX, 6,$TAMCUADRO );
$this->_pdf->Rect(60, $contX, 10,$TAMCUADRO );
$this->_pdf->Rect(70, $contX, 11,$TAMCUADRO );
$this->_pdf->Rect(81, $contX, 16,$TAMCUADRO );
$this->_pdf->Rect(97, $contX, 5,$TAMCUADRO );
$this->_pdf->Rect(102, $contX, 8,$TAMCUADRO );
$this->_pdf->Rect(110, $contX, 5,$TAMCUADRO );
$this->_pdf->Rect(115, $contX, 17,$TAMCUADRO );
$this->_pdf->Rect(132, $contX, 10,$TAMCUADRO );
$this->_pdf->Rect(142, $contX, 18,$TAMCUADRO );
$this->_pdf->Rect(160, $contX, 13,$TAMCUADRO );
$this->_pdf->Rect(173, $contX, 9,$TAMCUADRO );
$this->_pdf->Rect(182, $contX, 5,$TAMCUADRO );
$this->_pdf->Rect(187, $contX, 5,$TAMCUADRO );
$this->_pdf->Rect(192, $contX, 6,$TAMCUADRO );
$this->_pdf->Rect(198, $contX, 7,$TAMCUADRO );
$this->_pdf->Rect(205, $contX, 10,$TAMCUADRO );
$this->_pdf->Rect(215, $contX, 10,$TAMCUADRO );
$this->_pdf->Rect(225, $contX, 7,$TAMCUADRO );
$this->_pdf->Rect(232, $contX, 7,$TAMCUADRO );
$this->_pdf->Rect(239, $contX, 5,$TAMCUADRO );
$this->_pdf->Rect(244, $contX, 4,$TAMCUADRO );
$this->_pdf->Rect(248, $contX, 4,$TAMCUADRO );
$this->_pdf->Rect(252, $contX, 7,$TAMCUADRO );
$this->_pdf->Rect(259, $contX, 5,$TAMCUADRO );
$this->_pdf->Rect(264, $contX, 5,$TAMCUADRO );
$this->_pdf->Rect(269, $contX, 12,$TAMCUADRO );
$this->_pdf->Rect(281, $contX, 40,$TAMCUADRO );
$this->_pdf->Rect(321, $contX, 27,$TAMCUADRO );
$this->_pdf->Rect(26, $contX, 5,$TAMCUADRO );
$this->_pdf->Rect(31, $contX, 5,$TAMCUADRO );
$this->_pdf->Rect(36, $contX, 4,$TAMCUADRO );

$contX=$contX+$TAMCUADRO;

}


$this->_pdf->Cell(-162);
$this->_pdf->Cell ( 0,223,utf8_decode('8'),0);

$this->_pdf->Cell(-157);
$this->_pdf->Cell ( 0,223,utf8_decode('6'),0);

$this->_pdf->Cell(-153);
$this->_pdf->Cell ( 0,223,utf8_decode('SI'),0);

$this->_pdf->Cell(-146);
$this->_pdf->Cell ( 0,223,utf8_decode('1'),0);

$this->_pdf->Cell(-138);
$this->_pdf->Cell ( 0,223,utf8_decode('1'),0);

$this->_pdf->Cell(-128);
$this->_pdf->Cell ( 0,223,utf8_decode('1'),0);

$this->_pdf->Cell(-119);
$this->_pdf->Cell ( 0,223,utf8_decode('SI'),0);

$this->_pdf->Cell(-112);
$this->_pdf->Cell ( 0,223,utf8_decode('1'),0);

$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-127,242,utf8_decode('2016-07-27'),0);
$this->_pdf->Rotate(0);

$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-126,246,utf8_decode('2700 Gr.'),0);
$this->_pdf->Rotate(0);

$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-126,250,utf8_decode('MM'),0);
$this->_pdf->Rotate(0);

$this->_pdf->Cell(-93);
$this->_pdf->Cell ( 0,223,utf8_decode('SI'),0);

$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-127,262,utf8_decode('2016-07-27'),0);
$this->_pdf->Rotate(0);

$this->_pdf->Rotate(90,0,0);
$this->_pdf->Text(-127,267,utf8_decode('2016-07-27'),0);
$this->_pdf->Rotate(0);

$this->_pdf->Cell(-73);
$this->_pdf->Cell ( 0,223,utf8_decode('1'),0);

$this->_pdf->SetFont('Times','',6);
$this->_pdf->SetXY(49, 43);
$this->_pdf->MultiCell(40,2,utf8_decode($EPS),0);


$this->_pdf->SetFont('Times','',6);
$this->_pdf->SetXY(320, 31);
$this->_pdf->MultiCell(25,2,utf8_decode($GRADO_ESCOLARIDAD),0);

$this->_pdf->SetFont('Times','',6);
$this->_pdf->SetXY(265, 31);
$this->_pdf->MultiCell(18,2,utf8_decode($CONDICION_ESPECIAL));


$this->_pdf->SetFont('Times','',6);
$this->_pdf->SetXY(220, 31);
$this->_pdf->MultiCell(26,2,utf8_decode($ETNIA));


$BARRIO=$data[0]['DES_BARRIO'];

$this->_pdf->SetFont('Times','',6);
$this->_pdf->SetXY(141, 35);
$this->_pdf->MultiCell(57,2,utf8_decode($BARRIO));

$txt='Define la abscisa y ordenada de la posición actual. Si los valores pasados son negativos, ellos son relativos respectivamente a la derecha y la parte inferior de la página respectivamente a la derecha ferior de la.';
$this->_pdf->SetFont('Times','',5);
$this->_pdf->Cell(-340);
$this->_pdf->SetXY(281, 121);
$this->_pdf->MultiCell(40,2,utf8_decode($txt));


$FIRMA="data:image/png;base64,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";


$this->_pdf->Image($FIRMA.'.png',320,118,30);

$this->_pdf->Output();
    }
}

 ?> 