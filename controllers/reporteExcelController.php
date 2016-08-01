<?php

class reporteExcelController extends Controller
{
  private $_excel;
    
    public function __construct() {
        parent::__construct();
        $this->getLibrary('PHPExcel');
        $this->_excel = $this->loadModel('reporteExcel');
    }
    
    public function index(){

        
    }
   public function calcularCodigo($codigo){
        $codigo=explode('-', $codigo);
        return $codigo[1].$codigo[2];
    }

    public function generarReporte(){

 
    $objPHPExcel=PHPExcel_IOFactory::load(ROOT.'public'.DS.'formatos'.DS."Ficha_Hogar.xlsx");
    
    $fichas=$this->_excel->getFichas();
    

    for ($i=0; $i < count($fichas) ; $i++) { 

            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((3),  (9+$i), $this->calcularCodigo($fichas[$i]['ID_HOGAR'])); 
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((4),  (9+$i), $this->getZona($fichas[$i]['ID_ZONA']));
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((5),  (9+$i), $fichas[$i]['NOMECLATURA']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((6),  (9+$i), $this->_excel->getUsuario($fichas[$i]['USUARIOS_ID_USUARIO'])['IDENTIFICACION']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((7),  (9+$i), $fichas[$i]['DES_MUNICIPIO']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((8),  (9+$i), $fichas[$i]['DES_BARRIO']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((9),  (9+$i), $fichas[$i]['FECHA']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((10), (9+$i), $fichas[$i]['DOC_MIEMBRO_FIRMA']);
    }

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Ficha Hogar.xls"');
    header('Cache-Control: max-age=0');
    $objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
    $objWriter->save('php://output');
    exit;    

    }
    function getZona($id){
             if ($id == 1) {
                 return 'Urbana';
             }else{
                return 'Rural';
             }
    }

    public function generarReporteMiembros(){
      
    $objPHPExcel=PHPExcel_IOFactory::load(ROOT.'public'.DS.'formatos'.DS."FichaHogar_Miembros.xlsx");
    

    $fichas=$this->_excel->getFichasMiembros();


    for ($i=0; $i < count($fichas) ; $i++) { 

          
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((4),  (9+$i), $this->calcularCodigo($fichas[$i]['ID_MIEMBRO']));
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((5),  (9+$i), $this->calcularCodigo($this->_excel->getFichaId($fichas[$i]['FICHA_HOGAR_ID_FIC_HOGAR'])['ID_HOGAR']));
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((6),  (9+$i), $fichas[$i]['NOMBRE_MIEMBRO']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((7),  (9+$i), $fichas[$i]['APELLIDO_MIEMBRO']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((8),  (9+$i), $fichas[$i]['FECHA_NACIMIENTO']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((9),  (9+$i), $fichas[$i]['IDENTIFICACION_MIEMBRO_HOGAR']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((10), (9+$i), $fichas[$i]['TIPO_DOCUMENTO']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((11), (9+$i), $this->_excel->getEps($fichas[$i]['EPS_ID_EPS']));
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((12), (9+$i), $fichas[$i]['FECHA_REGISTRO']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((13), (9+$i), $fichas[$i]['EDAD']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((14), (9+$i), $fichas[$i]['SEXO']);

    }

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Miembros Hogar.xls"');
    header('Cache-Control: max-age=0');
    $objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
    $objWriter->save('php://output');
    exit;    

    }

   public function generarReporteGrupal(){
      
    $objPHPExcel=PHPExcel_IOFactory::load(ROOT.'public'.DS.'formatos'.DS."FichaHogarPreguntasGrupales.xlsx");
    

    $fichas=$this->_excel->getFichas();
 //   var_dump($this->_excel->getRespuestasGrupales($fichas[0]['ID_FIC_HOGAR'],'127'));
   // exit();

    for ($i=0; $i < count($fichas) ; $i++) { 
    
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((4), (9+$i), $this->calcularCodigo($this->_excel->getFichaId($fichas[$i]['ID_FIC_HOGAR'])['ID_HOGAR']));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((5),  (9+$i), $this->getZona($fichas[$i]['ID_ZONA']));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((6),  (9+$i), $fichas[$i]['NOMECLATURA']);
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((7),  (9+$i), $this->_excel->getUsuario($fichas[$i]['USUARIOS_ID_USUARIO'])['IDENTIFICACION']);
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((8),  (9+$i), $fichas[$i]['DES_MUNICIPIO']);
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((9),  (9+$i), $fichas[$i]['DES_BARRIO']);
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((10), (9+$i), $fichas[$i]['FECHA']);
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((11), (9+$i), $fichas[$i]['DOC_MIEMBRO_FIRMA']);
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((12),   (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'25'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((13),   (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'26'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((14),   (9+$i), $this->_excel->getRespuestasGrupalesSinOpccion($fichas[$i]['ID_FIC_HOGAR'],'129'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((15),   (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'46'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((16),   (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'47'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((17),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'48'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((18),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'49'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((19),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'50'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((20),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'51'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((21),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'52'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((22),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'53'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((23),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'54'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((24),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'55'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((25),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'56'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((26),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'57'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((27),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'58'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((28),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'59'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((29),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'60'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((30),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'61'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((31),  (9+$i), $this->_excel->getRespuestasGrupalesSinOpccion($fichas[$i]['ID_FIC_HOGAR'],'103'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((32),  (9+$i), $this->_excel->getRespuestasGrupalesSinOpccion($fichas[$i]['ID_FIC_HOGAR'],'104'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((33),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'62'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((34),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'63'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((35),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'64'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((36),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'65'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((37),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'66'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((38),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'67'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((39),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'68'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((40),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'69'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((41),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'70'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((42),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'71'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((43),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'72'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((44),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'73'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((45),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'74'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((46),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'75'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((47),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'76'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((48),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'77'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((49),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'78'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((50),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'79'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((51),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'81'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((52),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'82'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((53),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'83'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((54),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'84'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((55),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'85'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((56),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'86'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((57),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'87'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((58),  (9+$i), $this->_excel->getRespuestasGrupalesSinOpccion($fichas[$i]['ID_FIC_HOGAR'],'88'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((59),  (9+$i), $this->_excel->getRespuestasGrupalesSinOpccion($fichas[$i]['ID_FIC_HOGAR'],'89'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((60),  (9+$i), $this->_excel->getRespuestasGrupalesSinOpccion($fichas[$i]['ID_FIC_HOGAR'],'90'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((61),  (9+$i), $this->_excel->getRespuestasGrupalesSinOpccion($fichas[$i]['ID_FIC_HOGAR'],'91'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((62),  (9+$i), $this->_excel->getRespuestasGrupalesSinOpccion($fichas[$i]['ID_FIC_HOGAR'],'92'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((63),  (9+$i), $this->_excel->getRespuestasGrupalesSinOpccionAnimales($fichas[$i]['ID_FIC_HOGAR']));

    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((64),  (9+$i), $this->_excel->getRespuestasGrupales($fichas[$i]['ID_FIC_HOGAR'],'127'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((65),  (9+$i), $this->_excel->getRespuestasGrupalesSinOpccion($fichas[$i]['ID_FIC_HOGAR'],'93'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((66),  (9+$i), $this->_excel->getRespuestasGrupalesSinOpccion($fichas[$i]['ID_FIC_HOGAR'],'94'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((67),  (9+$i), $this->_excel->getRespuestasGrupalesSinOpccion($fichas[$i]['ID_FIC_HOGAR'],'95'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((68),  (9+$i), $this->_excel->getRespuestasGrupalesSinOpccion($fichas[$i]['ID_FIC_HOGAR'],'120'));
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((69),  (9+$i), $this->_excel->getRespuestasGrupalesSinOpccion($fichas[$i]['ID_FIC_HOGAR'],'154'));


    }

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Respuestas Grupales.xls"');
    header('Cache-Control: max-age=0');
    $objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
    $objWriter->save('php://output');
    exit;    

    }
    public function GenerarReporteIndividual(){
         $objPHPExcel=PHPExcel_IOFactory::load(ROOT.'public'.DS.'formatos'.DS."FichaHogarPreguntasIndividuales.xlsx");
    

        $miembros=$this->_excel->getFichasMiembros();

        for ($i=0; $i < count($miembros) ; $i++) { 
              
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((4),   (9+$i), $this->calcularCodigo($miembros[$i]['ID_MIEMBRO']));
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((5),   (9+$i),$this->calcularCodigo($this->_excel->getFichaId($miembros[$i]['FICHA_HOGAR_ID_FIC_HOGAR'])['ID_HOGAR']));
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((6),   (9+$i), $miembros[$i]['NOMBRE_MIEMBRO']);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((7),   (9+$i), $miembros[$i]['APELLIDO_MIEMBRO']);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((8),   (9+$i), $miembros[$i]['FECHA_NACIMIENTO']);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((9),   (9+$i), $miembros[$i]['IDENTIFICACION_MIEMBRO_HOGAR']);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((10),  (9+$i), $miembros[$i]['TIPO_DOCUMENTO']);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((11),  (9+$i), $this->_excel->getEps($miembros[$i]['EPS_ID_EPS']));
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((12),  (9+$i), $miembros[$i]['FECHA_REGISTRO']);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((13),  (9+$i), $miembros[$i]['EDAD']);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((14),  (9+$i), $miembros[$i]['SEXO']);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((15),  (9+$i), $this->_excel->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'105'));
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((16),  (9+$i), $this->_excel->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'106'));
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((17),  (9+$i), $this->_excel->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'107'));
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((18),  (9+$i), $this->_excel->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'108'));
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((19),  (9+$i), $this->_excel->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'109'));
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((20),  (9+$i), $this->_excel->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'110'));
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((21),  (9+$i), $this->_excel->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'111'));
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((22),  (9+$i), $this->_excel->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'112'));
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((23),  (9+$i), $this->_excel->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'113'));
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((24),  (9+$i), $this->_excel->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'114'));
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((25),  (9+$i), $this->_excel->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'115'));
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((26),  (9+$i), $this->_excel->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'116'));
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((27),  (9+$i), $this->_excel->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'117'));
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((28),  (9+$i), $this->_excel->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'118'));
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((29),  (9+$i), $this->_excel->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'119'));
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((30),  (9+$i), $this->_excel->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'121'));
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((31),  (9+$i), $this->_excel->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'122'));
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((32),  (9+$i), $this->_excel->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'123'));
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((33),  (9+$i), $this->_excel->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'124'));
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((34),  (9+$i), $this->_excel->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'125'));
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((35),  (9+$i), $this->_excel->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'126'));
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((36),  (9+$i), $this->_excel->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'128'));
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((37),  (9+$i), $this->_excel->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'150'));

        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Respuestas Individuales.xls"');
        header('Cache-Control: max-age=0');
        $objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
        $objWriter->save('php://output');
        exit;    
    }


    public function generarReporteFindRisk(){
      
    $objPHPExcel=PHPExcel_IOFactory::load(ROOT.'public'.DS.'formatos'.DS."FindRisk.xlsx");
    
$rep1=0;
$rep2=0;
$rep3=0;
$rep4=0;
$rep5=0;
$rep6=0;
$rep7=0;
$rep8=0;

    $fichas=$this->_excel->getMiembroFindRisk();

    for ($i=0; $i < count($fichas) ; $i++) { 

if($fichas[$i][13]==0) {$rep1='Menos de 45 años';}
elseif ($fichas[$i][13]==2) {$rep1='Entre 45-54 años';}
elseif ($fichas[$i][13]==3) {$rep1='Entre 55-64 años';}
elseif ($fichas[$i][13]==4) {$rep1='Más de 64 años';}

if ($fichas[$i][14]==0) {$rep2='Menos de 25';}
elseif ($fichas[$i][14]==1) {$rep2='Entre 25-30';}
elseif ($fichas[$i][14]==3) {$rep2='Más de 30';}


if ($fichas[$i][10]=='M') {
    if ($fichas[$i][15]==0) {$rep3='Menos de 80 cm';}elseif ($fichas[$i][15]==3) { $rep3='Entre 80-88 cm';}elseif ($fichas[$i][15]==4) {$rep3='Más de 88 cm 4';}
}else{
    if ($fichas[$i][15]==0) {$rep3='Menos de 94 cm';}elseif ($fichas[$i][15]==3) {$rep3='Entre 94-102 cm';}elseif ($fichas[$i][15]==4) {$rep3='Más de 102 cm';}
}

if ($fichas[$i][16]==0) {
    $rep4='Sí';
}elseif ($fichas[$i][16]==2) {
    $rep4='No';
}

if ($fichas[$i][17]==0) {
    $rep5='Todos los días';
}elseif ($fichas[$i][17]==1) {
    $rep5='No todos los días';
}

if ($fichas[$i][18]==0) {
     $rep6='No';
}elseif ($fichas[$i][18]==2) {
     $rep6='Sí';
}

if ($fichas[$i][19]==0) {
    $rep7='No';
}elseif ($fichas[$i][19]==5) {
    $rep7='Sí';
}

if ($fichas[$i][20]==0) {
    $rep8='No';
}elseif ($fichas[$i][20]==3) {
    $rep8='SÍ: Abuelos, tíos o primos-hermanos (pero no:padres, hermanos o hijos)';
}elseif ($fichas[$i][20]==5) {
    $rep8='SÍ: Padres, hermanos o hijos';
}
         

            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((4),  (9+$i), $this->calcularCodigo($fichas[$i]['ID_MIEMBRO']));
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((5),  (9+$i), $this->calcularCodigo($this->_excel->getFichaId($fichas[$i]['FICHA_HOGAR_ID_FIC_HOGAR'])['ID_HOGAR']));
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((6),  (9+$i), $fichas[$i]['NOMBRE_MIEMBRO']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((7),  (9+$i), $fichas[$i]['APELLIDO_MIEMBRO']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((8),  (9+$i), $fichas[$i]['FECHA_NACIMIENTO']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((9),  (9+$i), $fichas[$i]['IDENTIFICACION_MIEMBRO_HOGAR']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((10), (9+$i), $fichas[$i]['TIPO_DOCUMENTO']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((11), (9+$i), $this->_excel->getEps($fichas[$i]['EPS_ID_EPS']));
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((12), (9+$i), $fichas[$i]['FECHA_REGISTRO']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((13), (9+$i), $fichas[$i]['EDAD']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((14), (9+$i), $fichas[$i]['SEXO']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((15), (9+$i), $rep1);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((16), (9+$i), $rep2);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((17), (9+$i), $rep3);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((18), (9+$i), $rep4);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((19), (9+$i), $rep5);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((20), (9+$i), $rep6);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((21), (9+$i), $rep7);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((22), (9+$i), $rep8);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((23), (9+$i), $this->_excel->getUsuario($fichas[$i]['USUARIOS_ID_USUARIO'])['IDENTIFICACION']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((24), (9+$i), $fichas[$i]['FECH_REGISTRO']);

    }

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Find Risk.xls"');
    header('Cache-Control: max-age=0');
    $objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
    $objWriter->save('php://output');
    exit;    

    }


     public function generarReporteDemandaInducida(){
      
    $objPHPExcel=PHPExcel_IOFactory::load(ROOT.'public'.DS.'formatos'.DS."DemandaInducida.xlsx");
    

    $fichas=$this->_excel->getDemanda();


    for ($i=0; $i < count($fichas) ; $i++) { 


            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((4),  (9+$i), $this->calcularCodigo($fichas[$i]['ID_MIEMBRO']));
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((5),  (9+$i), $this->calcularCodigo($this->_excel->getFichaId($fichas[$i]['FICHA_HOGAR_ID_FIC_HOGAR'])['ID_HOGAR']));
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((6),  (9+$i), $fichas[$i]['NOMBRE_MIEMBRO']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((7),  (9+$i), $fichas[$i]['APELLIDO_MIEMBRO']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((8),  (9+$i), $fichas[$i]['FECHA_NACIMIENTO']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((9),  (9+$i), $fichas[$i]['IDENTIFICACION_MIEMBRO_HOGAR']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((10), (9+$i), $fichas[$i]['TIPO_DOCUMENTO']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((11), (9+$i), $this->_excel->getEps($fichas[$i]['EPS_ID_EPS']));
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((12), (9+$i), $fichas[$i]['FECHA_REGISTRO']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((13), (9+$i), $fichas[$i]['EDAD']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((14), (9+$i), $fichas[$i]['SEXO']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((15), (9+$i), $fichas[$i][12]);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((16), (9+$i), $fichas[$i][13]);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((17), (9+$i), $fichas[$i][14]);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((18), (9+$i), $fichas[$i][15]);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((19), (9+$i), $fichas[$i][16]);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((20), (9+$i), $fichas[$i][17]);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((21), (9+$i), $fichas[$i][18]);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((22), (9+$i), $fichas[$i][19]);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((23), (9+$i), $fichas[$i][20]);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((24), (9+$i), $fichas[$i][21]);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((25), (9+$i), $fichas[$i][22]);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((26), (9+$i), $fichas[$i][23]);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((27), (9+$i), $fichas[$i][24]);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((28), (9+$i), $fichas[$i][25]);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((29), (9+$i), $this->_excel->getUsuario($fichas[$i]['USUARIOS_ID_USUARIO'])['IDENTIFICACION']);

    }

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Demanda Inducida.xls"');
    header('Cache-Control: max-age=0');
    $objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
    $objWriter->save('php://output');
    exit;    

    }


    public function generarReporteCancerMama(){
      
    $objPHPExcel=PHPExcel_IOFactory::load(ROOT.'public'.DS.'formatos'.DS."Cancer_Mama.xlsx");
    

    $fichas=$this->_excel->getGenerarCancerMama();

    for ($i=0; $i < count($fichas) ; $i++) { 
   


   $realizoEncuesta=$this->_excel->getUsuario($fichas[$i][17]);
   $miembroSignosCancer=$this->_excel->getSignosCancer($fichas[$i]['ID_CANCER_MAMA']);


        if ($fichas[$i][13] == 1) {
            $rep1='Si';
        }elseif($fichas[$i][13] == 0) {
            $rep1='No';
        }elseif($fichas[$i][13] == 2) {
            $rep1='No sabe';
        }


        if ($fichas[$i][14] == 1) {
            $rep2='Si';
        }elseif($fichas[$i][14] == 0) {
            $rep2='No';
        }

        if ($fichas[$i][15] == 1) {
            $rep3='Si';
        }elseif($fichas[$i][15] == 0) {
            $rep3='No';
        }elseif($fichas[$i][15] == 2) {
            $rep3='No sabe';
        }

        if ($fichas[$i][16] == 1) {
            $rep4='Si';
        }elseif($fichas[$i][16] == 0) {
            $rep4='No';
        }elseif($fichas[$i][16] == 2) {
            $rep4='Sí, hace mas de dos años';
        }

            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((4),  (9+$i), $this->calcularCodigo($fichas[$i]['ID_MIEMBRO']));
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((5),  (9+$i), $this->calcularCodigo($this->_excel->getFichaId($fichas[$i]['FICHA_HOGAR_ID_FIC_HOGAR'])['ID_HOGAR']));
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((6),  (9+$i), $fichas[$i]['NOMBRE_MIEMBRO']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((7),  (9+$i), $fichas[$i]['APELLIDO_MIEMBRO']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((8),  (9+$i), $fichas[$i]['FECHA_NACIMIENTO']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((9),  (9+$i), $fichas[$i]['IDENTIFICACION_MIEMBRO_HOGAR']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((10), (9+$i), $fichas[$i]['TIPO_DOCUMENTO']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((11), (9+$i), $this->_excel->getEps($fichas[$i]['EPS_ID_EPS']));
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((12), (9+$i), $fichas[$i]['FECHA_REGISTRO']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((13), (9+$i), $fichas[$i]['EDAD']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((14), (9+$i), $fichas[$i]['SEXO']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((15), (9+$i), $fichas[$i][12]);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((16), (9+$i), $rep1);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((17), (9+$i), $rep2);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((18), (9+$i), $rep3);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((19), (9+$i), $rep4);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((20), (9+$i), $miembroSignosCancer);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((21), (9+$i), $realizoEncuesta['IDENTIFICACION']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((22), (9+$i), $fichas[$i]['EMAIL']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((23), (9+$i), $fichas[$i]['TELEFONO']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow((24), (9+$i), $this->_excel->getUsuario($fichas[$i]['USUARIOS_ID_USUARIO'])['IDENTIFICACION']);
    }

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Cancer Mama.xls"');
    header('Cache-Control: max-age=0');
    $objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
    $objWriter->save('php://output');
    exit;    

    }

    public function generarReporteKardex(){

    }

     public function generarReporteAiepi(){

    }


}

?>
