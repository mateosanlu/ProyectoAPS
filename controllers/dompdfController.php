<?php
use Dompdf\Dompdf;
class dompdfController extends Controller
{
    private $_dom;
    
    public function __construct() {
        parent::__construct();
        $this->_dom = $this->loadModel('dompdf');
        $this->getLibrary('autoload.inc');
          
    }
    public function index(){}

    public function calcularCodigo($codigo){
        $codigo=explode('-', $codigo);
        return ($codigo[1].$codigo[2]);
    }
    
   public function generarFicha($id_Ficha){

   if(!isset($id_Ficha))
   {
     $this->redireccionar('dompdf/generarFicha/FichaHogarNoFound');
   }

 $fichaHogar=$this->_dom->getFichaHogar($id_Ficha);
 $realizoEncuesta=$this->_dom->getUsuario($fichaHogar['USUARIOS_ID_USUARIO']); 

 if ($fichaHogar != false ) {
       
$fecha=explode('-',$fichaHogar['FECHA']);
$Dia=explode(' ',$fecha[2])[0]; 
$Mes=$fecha[1];
$Año=$fecha[0];
$municipio=$this->_dom->getMunicipio($fichaHogar['MUNICIPIOS_ID_MUNICIPIO']);
$codigoMunicipio=$municipio[1];
$nombreMunicipio=$municipio[2];
$codigo=explode('-',$fichaHogar['ID_HOGAR']);
$codigoHogar=$codigo[1]."-".$codigo[2];

if ($fichaHogar['ID_ZONA'] == '1') {$zona='URBANA';}else{$zona='RURAL';}

$barrio=$this->_dom->getBarrio($fichaHogar['BARRIOS_ID_BARRIO']);
$nombreBarrio=$barrio['DES_BARRIO'];
$numBarrio=$barrio['ID_BARRIO'];
$nomenclatura=$fichaHogar['NOMECLATURA'];
$miembros=$this->_dom->getMiembrosHogar($fichaHogar['ID_FIC_HOGAR']);
$html='
<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
</head>
<style type="text/css">

    .table{
        width: 100%;
        background:#1E90FF;font-weight: normal;
        margin:0px;
    }
    table  {
       margin:-1px;
       text-align: center;
       border:1px solid #555;
       font-weight: normal;
    }
    .bnone{
        background:white;
        color:#555;
        text-align: center; font-weight: normal;
       
    }
    .sections{
        background: #808080;font-weight: normal;
        text-align: center; 
       
    }
    table tr{
      font-weight: normal;
    }
    table tr td{font-weight: normal;
      
    }
    table tr th{
        font-weight: normal;
    }

</style>
<body>

<img src="views/layout/default/img//logo.png"  width=15%; height=15%;>
    <table width="100%" >
        <tr class="table">
            <td>Fecha de Ingreso</td>
            <td>Dia</td>
            <td class="bnone">'.$Dia.'</td>
            <td>Mes</td>
            <td class="bnone">'.$Mes.'</td>
            <td>A&#241o</td>
            <td class="bnone">'.$Año.'</td>
        </tr>
    </table>
    <table width="100%" >
        <tr class="bnone">
            <td>IDENTIFICACI&#211N DEL MUNICIPIO</td>
            <td>IDENTIFICACI&#211N DEL HOGAR</td>
        </tr>
    </table>
    <table width="100%" >
        <tr class="table">
            <td>1. NOMBRE</td>
            <td class="bnone">'.$nombreMunicipio.'</td>
            <td>2. CODIGO MUNICIPIO</td>
            <td class="bnone">'.$codigoMunicipio.'</td>
            <td>3. CODIGO HOGAR</td>
            <td class="bnone">'.$codigoHogar.'</td>
        </tr>
    </table>
    <table width="100%" class="sections">
        <tr>
            <td >UBICACI&#211N DEL HOGAR</td>
        </tr>
    </table>';
if ($fichaHogar['ID_ZONA']== '1') {
   $html.='<table width="100%" >
        <tr class="table">
            <td>4.ZONA</td>
            <td class="bnone">'.$zona.'</td>
        </tr>
    </table>
     <table width="100%" >
        <tr class="table">
            <td>5. BARRIO N&#218MERO</td>
            <td class="bnone">'.$numBarrio.'</td>
            <td>6. NOMBRE DEL BARRIO</td>
            <td class="bnone">'.$nombreBarrio.'</td>
        </tr>
    </table>';
    if ($nomenclatura == '') {
        $html.=' <table width="100%" >
        <tr class="table">
            <td>7. NOMENCLATURA</td>
            <td class="bnone">'.$nomenclatura.'</td>
            <td>8. NO APLICA</td>
            <td class="bnone">X</td>
        </tr>
       </table>';
    }else{
        $html.=' <table width="100%" >
        <tr class="table">
            <td>7. NOMENCLATURA</td>
            <td class="bnone">'.$nomenclatura.'</td>
            <td>8. NO APLICA</td>
            <td class="bnone">__</td>
        </tr>
       </table>';
    }

   
}else{
     $html.='<table width="100%" >
        <tr class="table">
            <td>9.ZONA</td>
            <td class="bnone">'.$zona.'</td>
        </tr>
    </table>
     <table width="100%" >
        <tr class="table">
            <td>10. VEREDA O INSPECCI&#211N  N&#218MERO</td>
            <td class="bnone">'.$numBarrio.'</td>
            <td>11. NOMBRE </td>
            <td class="bnone">'.$nombreBarrio.'</td>
        </tr>
    </table>';
    if ($nomenclatura == '') {
        $html.=' <table width="100%" >
        <tr class="table">
            <td>12. NOMENCLATURA</td>
            <td class="bnone">'.$nomenclatura.'</td>
            <td>13. NO APLICA</td>
            <td class="bnone">X</td>
        </tr>
       </table>';
    }else{
        $html.=' <table width="100%" >
        <tr class="table">
            <td>12. NOMENCLATURA</td>
            <td class="bnone">'.$nomenclatura.'</td>
            <td>13. NO APLICA</td>
            <td class="bnone">__</td>
        </tr>
       </table>';
    }
}
$html.='    
  <table width="100%" class="sections">
        <tr>
            <td >IDENTIFICACI&#211N DE LOS MIEMBROS DEL HOGAR</td>
        </tr>
    </table>
    
    <table width="100%" >
        <thead>
          <tr class="table">
            <th>14.C&#211DIGO</th>
            <th>15.NOMBRES Y APELLIDOS</th>
            <th>16.FECHA DE NACIMIENTO</th>
            <th>17.EDAD</th>
            <th>18.SEXO</th>
            <th>19.VINCULACI&#211N  FAMILIAR AL JEFE DEL HOGAR </th>
        </tr>
        </thead>
        <tbody>';

         for ($i=0; $i < count($miembros); $i++) { 
            $html.=' <tr class="table">
            <th class="bnone">'.($this->calcularCodigo($miembros[$i]["ID_MIEMBRO"])).'</th>
            <th class="bnone">'.($miembros[$i]["NOMBRE_MIEMBRO"].$miembros[$i]["APELLIDO_MIEMBRO"]).'</th>
            <th class="bnone">'.$miembros[$i]["FECHA_NACIMIENTO"].'</th>
            <th class="bnone">'.$miembros[$i]["EDAD"].'</th>
            <th class="bnone">'.$miembros[$i]["SEXO"].'</th>
            <th class="bnone">'.$this->_dom->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'105').'</th>
        </tr>';
        }
       $html.=' </tbody>
    </table>

    <table width="100%" class="sections">
        <tr>
            <td >CARACTERÍSTICAS SOCIOÉCONOMICAS DEL HOGAR</td>
        </tr>
    </table>

    <table width="100%" >
        <thead class="table">
         <tr>
         <th></th>
         <th></th>
         <th></th>
            <th colspan="3" background="silver"><center>23.OCUPACIÓN</center></th>
            <th colspan="3" background="silver" ><center>24.VINCULACIÓN AL SGSSS</center></th>
        </tr>
          <tr class="table">
            <th>20.CÓDIGO MIEMBRO</th>
            <th>21. DOCUMENTO  IDENTIDAD</th>
            <th>22. ESCOLARIDAD</th>
            <th>TIPO</th>
            <th>RECIBE PAGO</th>
            <th>APORTA AL HOGAR</th>
            <th>REGIMEN</th>
            <th>TIPO DE VINCULACIÓN</th>
            <th>NOMBRE EPS</th>
           
        </tr>
        </thead>
        <tbody>';


         for ($i=0; $i < count($miembros); $i++) { 
            $html.=' <tr class="table">
        
            <th class="bnone">'.$miembros[$i]["IDENTIFICACION_MIEMBRO_HOGAR"].'</th>
            <th class="bnone">'.$this->_dom->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'106').'</th>
            <th class="bnone">'.$this->_dom->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'107').'</th>
            <th class="bnone">'.$this->_dom->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'108').'</th>
            <th class="bnone">'.$this->_dom->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'109').'</th>
            <th class="bnone">'.$this->_dom->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'110').'</th>
            <th class="bnone">'.$this->_dom->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'111').'</th>
            <th class="bnone">'.$this->_dom->getEps($miembros[$i]["EPS_ID_EPS"]).'</th>
       
        </tr>';
        }

   
       $html.=' </tbody>
    </table>
 
 <table width="100%" class="sections">
        <tr>
            <td >CARACTERÍSTICAS SOCIOÉCONOMICAS DEL HOGAR</td>
        </tr>
    </table>
    <table width="100%" >
        <thead class="table">
          <tr class="table">
            <th>28.CÓDIGO MIEMBRO</th>
            <th>29.ETAPA DE CICLO VITAL</th>
            <th>30.DISCAPACIDAD</th>
            <th>31.GRUPO ÉTNICO</th>
            <th>32.VINCULACIÓN CON EL CONFLICTO ARMADO</th>
            <th>33.POBLACIÓN LGTBI</th>
            <th>34.ADOLECENTES EN EMBARAZO DEPENDIENTES</th>
            <th>35.MENORES TRABAJADORES</th>
            <th>36.MENORES EN DESERCIÓN ESCOLAR</th>    
        </tr>
        </thead>
        <tbody>';
          for ($i=0; $i < count($miembros); $i++) { 
            $html.=' <tr class="table">
            <th class="bnone">'.($this->calcularCodigo($miembros[$i]["ID_MIEMBRO"])).'</th>
            <th class="bnone">'.$this->_dom->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'112').'</th>
            <th class="bnone">'.$this->_dom->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'113').'</th>
            <th class="bnone">'.$this->_dom->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'114').'</th>
            <th class="bnone">'.$this->_dom->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'115').'</th>
            <th class="bnone">'.$this->_dom->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'116').'</th>
            <th class="bnone">'.$this->_dom->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'117').'</th>
            <th class="bnone">'.$this->_dom->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'118').'</th>
            <th class="bnone">'.$this->_dom->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'119').'</th>
       
        </tr>';
        }
      
      $html.='  </tbody>
    </table>

    <table width="100%" >
        <thead>
          <tr class="table">
            <th>37.OTRAS CONDICIONES DE VULNERABILIDAD IDENTIICADAS</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupalesSinOpccion($id_Ficha,'92').'</th>
    </tr>
     </table>
      <table width="100%" class="sections">
        <tr>
            <td >CONSUMO Y HIGIENE INDIVIDUAL</td>
        </tr>
    </table>
     <table width="100%" >
        <thead class="table">
          <tr class="table">
            <th>28.CÓDIGO MIEMBRO</th>
            <th>76.CONSUMO DE ALCOHOL</th>
            <th>77.CONSUMO DE CIGARRILLO</th>
            <th>78.CONSUMO DE PSICOACTIVOS</th>
            <th>80.HIGIENE CORPORAL</th>
            <th>81.HIGIENE BUCAL</th>
            <th>82.ACTIVIDAD FÍSICA</th>
            <th>88.MUJER GESTACIÓN</th>
            <th>DIABETES E HIPERTENCION</th>
        </tr>
        </thead>
        <tbody>';
          for ($i=0; $i < count($miembros); $i++) { 
            $html.=' <tr class="table">
            <th class="bnone">'.($this->calcularCodigo($miembros[$i]["ID_MIEMBRO"])).'</th>
            <th class="bnone">'.$this->_dom->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'121').'</th>
            <th class="bnone">'.$this->_dom->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'122').'</th>
            <th class="bnone">'.$this->_dom->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'123').'</th>
            <th class="bnone">'.$this->_dom->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'124').'</th>
            <th class="bnone">'.$this->_dom->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'125').'</th>
            <th class="bnone">'.$this->_dom->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'126').'</th>
        
            <th class="bnone">'.$this->_dom->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'128').'</th>
            <th class="bnone">'.$this->_dom->getRespuesta($miembros[$i]["ID_MIEMBROS_HOGAR"],'150').'</th>         
        </tr>';
        }
      
      $html.='  </tbody>
    </table>



 

    </table>
       <table width="100%" class="sections">
        <tr>
            <td >CONDICIONES DE VULNERABILIDAD POR VIVIENDA DEL HOGAR</td>
        </tr>
    </table>
<table width="100%" >
   <tr class="table">
            <th >38.TENENCIA DE LA VIVIENDA</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'46').'</th>
            <th >39.TIPO DE VIVIENDA</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'47').'</th>
            <th >40.UBICACIÓN DE LA VIVIENDA</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'48').'</th>       
        </tr>
    
    </table>
<table width="100%" >
        <thead class="table">
          <tr>
             <th colspan="3">MATERIALES DE LA VIVIENDA</th>
             <th colspan="3">ABASTECIMIENTO DE AGUA</th>    
          </tr>
          <tr class="table">
            <th>41 TECHO</th>
            <th>42.PAREDES</th>
            <th>43.PISO</th>
            <th>44.FUENTE</th>
            <th>45.TRATAMIENTO</th>
            <th>46.ALMACENAMIENTO</th>            
        </tr>
        </thead>
        <tbody>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'49').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'50').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'51').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'52').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'53').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'54').'</th>
       
        </tr>
      </tbody>
    </table>


<table width="100%" >
        <thead class="table">
          <tr>
             <th colspan="2">DISPOSICIÓN DE EXCRETAS</th>
             <th colspan="2">TRATAMIENTO DE BASURAS</th>
             <th rowspan="2">51.ENERGIA</th>
             <th rowspan="2">52.COMBUSTIBLE</th>      
          </tr>
          <tr class="table">
            <th>47.MECANISMO</th>
            <th>48.DISPOSICIÓN</th>
            <th>49.RECOLECCIÓN</th>
            <th>50.DISPOSICIÓN</th>
                
        </tr>
        </thead>
        <tbody>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'55').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'56').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'57').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'58').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'59').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'60').'</th> 
        </tr>
      </tbody>
</table>

<table width="100%" >
        <thead class="table">
          <tr>
             <th colspan="3">ESTRUCTURA DE LA VIVIENDA</th>
             <th colspan="4">RIESGOS DE LA VIVIENDA</th>    
          </tr>
          <tr class="table">
            <th>53.COCINA SEPARADA DE DORMITORIO</th>
            <th>54.NÚMERO DE DORMITORIOS</th>
            <th>55.PERSONAS POR DORMITORIO</th>
            <th>56.FÍSICOS</th>
            <th>57.QUIMICOS</th>
            <th>58.BIÓLOGICOS</th>
            <th>59.SOCIALES</th>             
        </tr>
        </thead>
        <tbody>
            <th class="bnone">'.$this->_dom->getRespuestasGrupalesSinOpccion($id_Ficha,'103').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupalesSinOpccion($id_Ficha,'104').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'61').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'62').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'63').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'64').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'65').'</th>
        </tr>
      </tbody>
    </table>
     <table width="100%" >
        <thead>
          <tr class="table">
            <th>60.OTRAS CONDICIONES DE VULNERABILIDAD DE LA VIVIENDA IDENTIICADAS</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupalesSinOpccion($id_Ficha,'93').'</th>
    </tr>

    </table>
</table>
       <table width="100%" class="sections">
        <tr>
            <td >CONDICIONES DE VULNERABILIDAD POR EL ENTORNO DE LA  VIVIENDA Y HOGAR</td>
        </tr>
    </table>

<table width="100%" >
        <thead class="table">
          <tr class="table">
            <th>61.VIAS DE ACCESO</th>
            <th>62.TRANSPORTE PÚBLICO</th>
            <th>63.TÉLEFONO PÚBLICO</th>
            <th>64.HOGARES INFANTILES</th>
            <th>65. ESCUELAS</th>
            <th>66.CENTRO DE SALUD</th>
            <th>67.BOMBEROS</th>
            <th>68.COMISARIA DE FAMILIA</th>               
        </tr>
        </thead>
        <tbody>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'66').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'67').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'68').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'69').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'70').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'71').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'72').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'73').'</th>
        </tr>
      </tbody>
    </table>
    <table width="100%" >
        <thead class="table">
          <tr class="table">
            <th>69.CENTRO RELIGIOSO</th>
            <th>70.CENTRO DEPORTIVO</th>
            <th>71.CENTRO CULTURAL</th>
            <th>72.MERCADO BASICO</th>
            <th>73.PRESENCIA DE VECTORES</th>
            <th>74.CENTROS O ZONAS QUE REPRESENTAN RIESGOS PARA EL HOGAR</th>              
        </tr>
        </thead>
        <tbody>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'74').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'75').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'76').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'77').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'78').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'79').'</th>
        </tr>
      </tbody>
    </table>
 <table width="100%" >
        <thead>
          <tr class="table">
            <th>75.OTRAS CONDICIONES DE VULNERABILIDAD DEL ENTORNO IDENTIICADAS</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupalesSinOpccion($id_Ficha,'94').'</th>
    </tr>

    </table>
</table>
       <table width="100%" class="sections">
        <tr>
            <td >CONDICIONES DE VULNERABILIDAD POR LOS HÁBITOS Y CONSTUMBRES DE LOS MIEMBROS DEL HOGAR</td>
        </tr>
    </table>
    <table width="100%" >
        <thead class="table">
          <tr class="table">
            <th>79.CONSUMO DE ALIMENTOS</th>
            <th>82.HIGIENE DE LA VIVIENDA</th>   
            <th>83.CONVIVENCIA</th>
            <th>85.TENENCIA DE ANIMALES</th>
            <th>86.RIESGOS LABORALES</th>
                          
                        
        </tr>
        </thead>
        <tbody>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'127').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'82').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'81').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupalesSinOpccionAnimales($id_Ficha).'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'83').'</th>
        </tr>
      </tbody>
    </table>
    <table width="100%" >
        <thead>
          <tr class="table">
            <th>87.OTRAS CONDICIONES DE VULNERABILIDAD POR LAS PRACTICAS DE LOS MIEMBROS DEL HOGAR</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupalesSinOpccion($id_Ficha,'120').'</th>
    </tr>

    </table>
</table>
       <table width="100%" class="sections">
        <tr>
            <td >CONDICIONES DE VULNERABILIDAD POR LOS HÁBITOS Y CONSTUMBRES DE LOS MIEMBROS DEL HOGAR</td>
        </tr>
    </table>
  <table width="100%" >
        <thead class="table">
          <tr class="table">
            <th>89.MENORES DE CINCO AÑOS CON ESQUEMA DE VACUNACIÓN INCOMPLETO</th>
            <th>90.ADULTOS CON DIAGNOSTICO DE ENFERMEDAD CRÓNICA</th>
            <th>91.MIEMBROS DEL HOGAR SIN CONTROL DE SALUD SEXUAL Y REPRODUCTIVA</th>              
        </tr>
        </thead>
        <tbody>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'84').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'85').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'86').'</th>
        </tr>
      </tbody>
    </table>
      <table width="100%" >
        <thead class="table">
          <tr class="table">
            <th>92.SIGNOS DE ALTERACIONES NUTRICIONALES EN ALGUNO DE LOS MIEMBRO DEL HOGAR</th>
            <th>93.ALGÚN MIEMBRO DEL HOGAR CONSULTO EN EL ÚLTIMO MES POR ENFERMEDAD TRANSMITIDA POR VECTORES</th>
            <th>94.ALGÚN MIEMBRO DEL HOGAR CON LESIONES DE PIEL</th>               
        </tr>
        </thead>
        <tbody>
            <th class="bnone">'.$this->_dom->getRespuestasGrupales($id_Ficha,'87').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupalesSinOpccion($id_Ficha,'88').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupalesSinOpccion($id_Ficha,'89').'</th>
        </tr>
      </tbody>
    </table>
    <table width="100%" >
        <thead class="table">
          <tr class="table"> 
            <th>95.SIGNOS DE VIOLENCIA EN ALGUNO DE LOS MIEMBROS DEL HOGAR</th> 
            <th>96.MIEMBROS DEL HOGAR SIN CONTROL BUCAL EN LOS ÚLTIMOS SEIS MESES</th> 
            <th>97.ALGÚN MIEMBRO DEL HOGAR SIN ASISTENCIA A CONTROL MEDICO EN LOS ÚLTIMOS TRES MESES</th>               
        </tr>
        </thead>
        <tbody>
            <th class="bnone">'.$this->_dom->getRespuestasGrupalesSinOpccion($id_Ficha,'90').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupalesSinOpccion($id_Ficha,'91').'</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupalesSinOpccion($id_Ficha,'92').'</th>
        </tr>
      </tbody>
    </table>
    <table width="100%" >
        <thead>
          <tr class="table">
            <th>98.OTRAS CONDICIONES DE VULNERABILIDAD IDENTIFICADAS</th>
            <th class="bnone">'.$this->_dom->getRespuestasGrupalesSinOpccion($id_Ficha,'95').'</th>
    </tr>

    </table>
    <br>
     <table width="100%" >
          
            <tr class="table">
                    <td>OBSERVACIONES</td>
            </tr>
            <tr class="table">
                    <td class="bnone" > '.$this->_dom->getRespuestasGrupalesSinOpccion($id_Ficha,'154').'</td>
            </tr>

        </table>

<br> <table width="100%" >
         <tr class="table ">
            <td  colspan="6">FIRMA DEL JEFE/REPRESENTANTE DEL HOGAR</td>
          </tr>
          <tr class="table">
            <td>Nombre</td>
            <td class="bnone" >'.$this->_dom->getUserFirma($fichaHogar['DOC_MIEMBRO_FIRMA'])['NOMBRE_MIEMBRO']." ".$this->_dom->getUserFirma($fichaHogar['DOC_MIEMBRO_FIRMA'])['APELLIDO_MIEMBRO'].'</td>
            <td>Documento</td>
            <td class="bnone" >'.$fichaHogar['DOC_MIEMBRO_FIRMA'].'</td>
          </tr>
          

    </table>
     <table width="100%" >
      
    <tr class="table">
            <th>FIRMA DEL JEFE/REPRESENTANTE DEL HOGAR</th>
            <th class="bnone" ><img width=150px  height=80px  src="'.$fichaHogar['FIRMA_JEFE'].'"></th>
    </tr>

    </table>
    <table width="100%" >
         <tr class="table ">
            <td  colspan="6">DATOS GESTOR CALIDAD DE VIDA</td>
          </tr>
          <tr class="table">
            <td>Nombre</td>
            <td class="bnone" >'.$realizoEncuesta['NOMBRE_USUARIO']." ".$realizoEncuesta['APELLIDO_USUARIO'].'</td>
            <td>Documento</td>
            <td class="bnone" >'.$realizoEncuesta['IDENTIFICACION'].'</td>
          </tr>


    </table>
      <table width="100%" >
          
        <tr class="table">
                <th>FIRMA GESTOR CALIDAD DE VIDA</th>
                <th class="bnone" ><img width=150px  height=80px  src="'.$realizoEncuesta['FIRMA'].'"></th>
        </tr>

        </table>

        
       
</body>
</html>';

    }else{
    $html='<h1>Ficha Hogar no encontrada</h1>';
    }

$hora= getdate();
$dompdf  =  new  Dompdf();
$dompdf->load_html(($html));
$dompdf->setPaper('legal', 'landscape');
$dompdf->render();
$dompdf->stream($hora['year'].$hora['mon'].$hora['wday'].'.pdf', array("Attachment"=>0));
   }
  function generarFindRisk($id_miembro){

$miembro=$this->_dom->getMiembroFindRisk($id_miembro);
$realizoEncuesta=$this->_dom->getUsuario($miembro[21]);
//var_dump($miembro[12]);
//exit();
$fecha=explode('-',$miembro[23]);
$Dia=explode(' ',$fecha[2])[0]; 
$Mes=$fecha[1];
$Año=$fecha[0];

if($miembro[12]==0) {$rep1='Menos de 45 años';}elseif ($miembro[12]==2) {$rep1='Entre 45-54 años';}
elseif ($miembro[12]==3) {$rep1='Entre 55-64 años';}elseif ($miembro[12]==4) {$rep1='Más de 64 años';}

if ($miembro[13]==0) {$rep2='Menos de 25';}elseif ($miembro[13]==1) {$rep2='Entre 25-30';}elseif ($miembro[13]==3) {$rep2='Más de 30';}
if ($miembro[10]=='M') {
    if ($miembro[14]==0) {$rep3='Menos de 80 cm';}elseif ($miembro[14]==3) { $rep3='Entre 80-88 cm';}elseif ($miembro[14]==4) {$rep3='Más de 88 cm 4';}
}else{
    if ($miembro[14]==0) {$rep3='Menos de 94 cm';}elseif ($miembro[14]==3) {$rep3='Entre 94-102 cm';}elseif ($miembro[14]==4) {$rep3='Más de 102 cm';}
}

if ($miembro[15]==0) {
    $rep4='Sí';
}elseif ($miembro[15]==2) {
    $rep4='No';
}

if ($miembro[16]==0) {
    $rep5='Todos los días';
}elseif ($miembro[16]==1) {
    $rep5='No todos los días';
}

if ($miembro[17]==0) {
     $rep6='No';
}elseif ($miembro[17]==2) {
     $rep6='Sí';
}

if ($miembro[18]==0) {
    $rep7='No';
}elseif ($miembro[18]==5) {
    $rep7='Sí';
}

if ($miembro[19]==0) {
    $rep8='No';
}elseif ($miembro[19]==3) {
    $rep8='SÍ: Abuelos, tíos o primos-hermanos (pero no:padres, hermanos o hijos)';
}elseif ($miembro[19]==5) {
    $rep8='SÍ: Padres, hermanos o hijos';
}



$html='
<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
</head>
<style type="text/css">

    .table{
        width: 100%;
        background:#1E90FF;font-weight: normal;
        margin:0px;
    }
    table  {
       margin:-1px;

       text-align: center;
       border:1px solid #555;
       font-weight: normal;
    }
    .bnone{
        background:white;
        color:#555;
        text-align: center; font-weight: normal;
       
    }
    .sections{
        background: #808080;font-weight: normal;
        text-align: center; 
       
    }
    table tr{
      font-weight: normal;
    }
    table tr td{font-weight: normal;
      
    }
    table tr th{
        font-weight: normal;
    }
    .par td{
        background:#FFE4C4;
    }
    .titulo{
        color:#1E90FF;
    }


</style>
<body>
     
<img src="views/layout/default/img//logo.png"  width=15%; height=15%;>
<center><h2 class="titulo">Test Findrisk</h2></center>
       
  
    <table width="100%" >
        <tr class="table">
            <td>Fecha de Ingreso</td>
            <td>Dia</td>
            <td class="bnone">'.$Dia.'</td>
            <td>Mes</td>
            <td class="bnone">'.$Mes.'</td>
            <td>A&#241o</td>
            <td class="bnone">'.$Año.'</td>
        </tr>
    </table>
    <br>
    <table width="100%" >
        <tr class="table">
            <td>Nombre</td>
            <td class="bnone">'.$miembro[3]." ".$miembro[4].'</td>
        </tr>
    </table>
   
    <br>
    <table width="100%" >
     <thead class="table">
        <tr class="table"> 
            <th>PREGUNTA</th>
            <th>RESPUESTA</th>  
            <th>PUNTAJE</th>                
        </tr>
        </thead>
        <tbody>
            <tr>
                <td class="bnone">1. Edad</td>
                <td class="bnone">'.$rep1.'</td>
                <td class="bnone">'.$miembro[12].'</td>
            </tr>
            <tr class="par">
                <td class="bnone">2. Índice de masa corporal (IMC)</td>
                <td class="bnone">'.$rep2.'</td>
                <td class="bnone">'.$miembro[13].'</td>
            </tr>
            <tr>
                <td class="bnone">3. Perímetro de la cintura medido a la altura del
                 ombligo</td>
                <td class="bnone">'.$rep3.'</td>
                <td class="bnone">'.$miembro[14].'</td>
            </tr>
             <tr class="par">
                <td class="bnone">4. ¿Normalmente practica usted 30 minutos cadadía de actividad física en el trabajo y/o en sutiempo libre (incluida la actividad diaria normal)?</td>
                <td class="bnone">'.$rep4.'</td>
                <td class="bnone">'.$miembro[15].'</td>
            </tr>
            <tr>
                <td class="bnone">5. ¿Con cuánta frecuencia come usted vegetales o frutas?</td>
                <td class="bnone">'.$rep5.'</td>
                <td class="bnone">'.$miembro[16].'</td>
            </tr>
             <tr class="par">
                <td class="bnone">6. ¿Ha tomado usted medicación para la hipertensión con regularidad?</td>
                <td class="bnone">'.$rep6.'</td>
                <td class="bnone">'.$miembro[17].'</td>
            </tr>
            <tr>
                <td class="bnone">7. ¿Le han encontrado alguna vez niveles altos de glucosa en sangre, por ejemplo, en un examen médico, durante una enfermedad, durante el embarazo?</td>
                <td class="bnone">'.$rep7.'</td>
                <td class="bnone">'.$miembro[18].'</td>
            </tr>
            <tr class="par">
                <td class="bnone">8. ¿A algún miembro de su familia le han diagnosticado diabetes (tipo 1 o tipo 2)?</td>
                <td class="bnone">'.$rep8.'</td>
                <td class="bnone">'.$miembro[19].'</td>
            </tr>
      </tbody>
    </table>
    <br>
    <table width="100%" >
        <tr class="table">
            <td>Puntaje</td>
            <td class="bnone">'.$miembro[20].'</td>
        </tr>
    </table>
<br>
  
    <table width="100%" >
         <tr class="table ">
            <td colspan="6">DATOS GESTOR CALIDAD DE VIDA</td>
          </tr>
          <tr class="table">
            <td>Nombre</td>
            <td class="bnone" >'.$realizoEncuesta['NOMBRE_USUARIO'].$realizoEncuesta['APELLIDO_USUARIO'].'</td>
            <td>Documento</td>
            <td class="bnone" >'.$realizoEncuesta['IDENTIFICACION'].'</td>
         <!--   <td>Telefono</td>
            <td class="bnone" >'.$realizoEncuesta['IDENTIFICACION'].'</td> -->
          </tr>

    </table>
    <br>
      <table width="100%" >
          
        <tr class="table">
                <th>FIRMA GESTOR CALIDAD DE VIDA</th>
                <th class="bnone" ><img src="'.$realizoEncuesta['FIRMA'].'"></th>
        </tr>

        </table> <br>
          <table width="100%" >
       <thead>
        <tr class="table">
            <th colspan="2">Tabla de riesgos</th>
            </tr>
       <tr class="table">
          <th class="bnone">MENOS DE 7</th>
          <th class="bnone">RIESGO BAJO: UNA DE CADA 100 PERSONAS PUEDEDESARROLLAR DM2</th>
        </tr>
       </thead>
        <tr class="table par">
          <td class="bnone ">ENTRE 7 - 11</td>
          <td class="bnone ">RIESGO LIGERAMENTE ELEVADO: UNA DE CADA 25 PERSONAS PUEDEDESARROLLAR DM2</td>
        </tr>
         <tr class="table">
          <td class="bnone">ENTRE 12 - 14</td>
          <td class="bnone">DESARROLLAR DM2 RIESGO ALTO: UNA DE CADA 3 PERSONAS PUEDE</td>
        </tr>
         <tr class="table par">
          <td class="bnone ">ENTRE 15 - 20</td>
          <td class="bnone ">DESARROLLAR DM2 RIESGO MUY ALTO: UNA DE CADA 2 PERSONAS PUEDE</td>
        </tr>
         <tr class="table">
          <td class="bnone">MAS DE 20</td>
          <td class="bnone">RIESGO MUY ALTO: UNA DE CADA 2 PERSONAS PUEDE DESARROLLAR DM2</td>
        </tr>
       <tbody>


       </tbody>
    </table>

  </body>
</html>';



$hora= getdate();
$dompdf  =  new  Dompdf();
$dompdf->load_html(($html));
$dompdf->setPaper('letter', 'portrait');
$dompdf->render();
$dompdf->stream($hora['year'].$hora['mon'].$hora['wday'].'.pdf', array("Attachment"=>0));
  }
  


    function generarCancerMama($id_miembro){

$miembroCancer=$this->_dom->getGenerarCancerMama($id_miembro);
$realizoEncuesta=$this->_dom->getUsuario($miembroCancer[16]);

//var_dump($realizoEncuesta);
//exit();

$miembroSignosCancer=$this->_dom->getSignosCancer($miembroCancer[11]);


$fecha=explode('-',$miembroCancer[18]);
$Dia=explode(' ',$fecha[2])[0]; 
$Mes=$fecha[1];
$Año=$fecha[0];

if ($miembroCancer[12] == 1) {
    $rep1='Si';
}elseif($miembroCancer[12] == 0) {
    $rep1='No';
}elseif($miembroCancer[12] == 2) {
    $rep1='No sabe';
}


if ($miembroCancer[13] == 1) {
    $rep2='Si';
}elseif($miembroCancer[13] == 0) {
    $rep2='No';
}

if ($miembroCancer[14] == 1) {
    $rep3='Si';
}elseif($miembroCancer[14] == 0) {
    $rep3='No';
}elseif($miembroCancer[14] == 2) {
    $rep3='No sabe';
}

if ($miembroCancer[15] == 1) {
    $rep4='Si';
}elseif($miembroCancer[15] == 0) {
    $rep4='No';
}elseif($miembroCancer[15] == 2) {
    $rep4='Sí, hace mas de dos años';
}

$html='
<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
</head>
<style type="text/css">

    .table{
        width: 100%;
        background:#1E90FF;font-weight: normal;
        margin:0px;
    }
    table  {
       margin:-1px;

       text-align: center;
       border:1px solid #555;
       font-weight: normal;
    }
    .bnone{
        background:white;
        color:#555;
        text-align: center; font-weight: normal;
       
    }
    .sections{
        background: #808080;font-weight: normal;
        text-align: center; 
       
    }
    table tr{
      font-weight: normal;
    }
    table tr td{font-weight: normal;
      
    }
    table tr th{
        font-weight: normal;
    }
    .par td{
        background:#FFE4C4;
    }
    .titulo{
        color:#1E90FF;
    }


</style>
<body>
     
<img src="views/layout/default/img//logo.png"  width=20%; height=20%;>
<center><h2 class="titulo">Cancer de Mama</h2></center>
       
  
    <table width="100%" >
        <tr class="table">
            <td>Fecha de Ingreso</td>
            <td>Dia</td>
            <td class="bnone">'.$Dia.'</td>
            <td>Mes</td>
            <td class="bnone">'.$Mes.'</td>
            <td>A&#241o</td>
            <td class="bnone">'.$Año.'</td>
        </tr>
    </table>
    <br>
    <table width="100%" >
        <tr class="table">
            <td>NOMBRE</td>
            <td class="bnone">'.$miembroCancer[3].' '.$miembroCancer[4].'</td>
            <td>IDENTIFICACION</td>
            <td class="bnone">'.$miembroCancer[6].'</td>
        </tr>
         <tr class="table">
            <td>EMAIL</td>
            <td class="bnone"></td>
            <td>TELEFONO</td>
            <td class="bnone"></td>
        </tr>
        <tr class="table">
            <td>DIRECCION</td>
            <td class="bnone">'.$this->_dom->getBarrioMunicpio($miembroCancer[0])['NOMECLATURA'].'</td>
            <td>BARRIO</td>
            <td class="bnone">'.$this->_dom->getBarrioMunicpio($miembroCancer[0])['DES_BARRIO'].'</td>
        </tr>
         <tr class="table">
            <td>MUNICIPIO</td>
            <td class="bnone">'.$this->_dom->getBarrioMunicpio($miembroCancer[0])['DES_MUNICIPIO'].'</td>
        </tr>
          <tr class="table">
            <td >REGIMEN</td>
            <td class="bnone">'.$this->_dom->getRespuesta($miembroCancer[0],'110').'</td>
            <td >TIPO DE VINCULACIÓN</td>
            <td class="bnone">'.$this->_dom->getRespuesta($miembroCancer[0],'111').'</td>
            
         </tr>
          <tr class="table">
            <td >EPS</td>
            <td class="bnone">'.$this->_dom->getEps($miembroCancer[7]).'</td>
         </tr>
    </table>
    <table width="100%" >
     <thead class="table">
        <tr class="table"> 
            <th>PREGUNTA</th>
            <th>RESPUESTA</th>                
        </tr>
        </thead>
        <tbody>
       <tr>
                <td class="bnone">1.Edad </td>
                <td class="bnone">'.$miembroCancer[9].'</td>
            </tr>
          <tr class="par" >
                <td class="bnone">2.¿Ha tenido cáncer de seno su mamá? </td>
                <td class="bnone">'.$rep1.'</td>
            </tr>
          <tr>
                <td class="bnone">3. ¿Le han practicado biopsia en el seno?</td>
                <td class="bnone">'.$rep2.'</td>
            </tr>
          <tr class="par">
                <td class="bnone">4. ¿ Ha tenido cáncer de mama su hermana(o)? </td>
                <td class="bnone">'.$rep3.'</td>
            </tr>
              <tr>
                <td class="bnone">5. ¿Si tiene más de 50 años le han praticado alguna vez una mamografía?</td>
                <td class="bnone">'.$rep4.'</td>
            </tr >
              <tr class="par">
                <td class="bnone">6. De los signos descritos a continuación se le ha presentado: </td>
                <td class="bnone">'.$miembroSignosCancer.'</td>
            </tr>

    
      </tbody>
    </table>
    <br>
    <table width="100%" >
         <tr class="table ">
            <td  colspan="6">DATOS GESTOR CALIDAD DE VIDA</td>
          </tr>
          <tr class="table">
            <td>Nombre</td>
            <td class="bnone" >'.$realizoEncuesta['NOMBRE_USUARIO'].$realizoEncuesta['APELLIDO_USUARIO'].'</td>
            <td>Documento</td>
            <td class="bnone" >'.$realizoEncuesta['IDENTIFICACION'].'</td>
         <!--   <td>Telefono</td>
            <td class="bnone" >'.$realizoEncuesta['IDENTIFICACION'].'</td> -->
          </tr>

    </table>
      <table width="100%" >
          
        <tr class="table">
                <th>FIRMA GESTOR CALIDAD DE VIDA</th>
                <th class="bnone" ><img src="'.$realizoEncuesta['FIRMA'].'"></th>
        </tr>

        </table>

  </body>
</html>';



$hora= getdate();
$dompdf  =  new  Dompdf();
$dompdf->load_html(($html));
$dompdf->setPaper('letter', 'portrait');
$dompdf->render();
$dompdf->stream($hora['year'].$hora['mon'].$hora['wday'].'.pdf', array("Attachment"=>0));
  }
 

 function generarDemandaInducida($id_miembro){

$DemandaInducida=$this->_dom->getDemanda($id_miembro);


$html='
<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
</head>
<style type="text/css">

    .table{
        width: 100%;
        background:#1E90FF;font-weight: normal;
        margin:0px;
    }
    table  {
       margin:-1px;
       vertical-align:middle;
      
       border:1px solid #555;
       font-weight: normal;
    }
    .bnone{
        background:white;
        color:#555;
        text-align: center; font-weight: normal;
       
    }
    .sections{
        background: #808080;font-weight: normal;
        text-align: center; 
       
    }
    table tr{
      font-weight: normal;
    }
    table tr td{font-weight: normal;
      
    }
    table tr th{
        font-weight: normal;
    }
    .par td{
        background:#FFE4C4;
    }
    .titulo{
        color:#1E90FF;
    }
    .letra-tabla{

        color:#1E90FF;
       border-bottom:1px solid #555;
    }
    .borde{
        border:1px solid #555;
       
    }
    .borde th{
       font-size:10px;
    }


</style>
<body>
     
<img src="views/layout/default/img//logo.png"  width=10%; height=10%;>
<center><h2 class="titulo">Demanda Inducida</h2></center>
       

    <table width="100%" >
        <tr class="table">
            <td>Nombre</td>
            <td class="bnone">'.$DemandaInducida[0][3].' '.$DemandaInducida[0][4].'</td>
            <td>IDENTIFICACION</td>
            <td class="bnone">'.$DemandaInducida[0][6].'</td>
        </tr>
         <tr class="table">
            <td>EDAD</td>
            <td class="bnone">'.$DemandaInducida[0][9].'</td>
            <td>EPS</td>
            <td class="bnone">'.$this->_dom->getEps($DemandaInducida[0][7]).'</td>
        </tr>
         <tr class="table">
            <td>DIRECCION</td>
            <td class="bnone">'.$this->_dom->getBarrioMunicpio($DemandaInducida[0][0])['NOMECLATURA'].'</td>
        </tr>
    </table>
    <br>
    <table width="100%" >
     <thead class="table borde">
  <tr>          <th class="">FECHA</th>
                <th class="">VACUNACIÓN </th>
       
                <th class="">SALUD ORAL (CADA 6 MESES)</th>
             
        
                <th class="">PLANIFICACIÓN FAMILIAR</th>
       
                <th class="">ATENCIÓN DEL PARTO Y RECIEN NACIDO </th>
               
                <th class="">CONTROL DEL EMBARAZO</th>
         
                <th class="">ATENCION AL JOVEN (10 A 29 AÑOS) </th>
             
                <th class="">ATENCION AL ADULTO (45-50-55-60-65-70-75-80 AÑOS)</th>
             
                <th class="">CRECIMIENTO Y DESARROLLO </th>
             
                <th class="">TOMA DE CITOLOGIA </th>
               
                <th class="">EXAMEN  DE SENO</th>
              
                <th class="">ATENCION PRECONCEPCIONAL</th>
               
                <th class="">TAMIZAJE VISUAL (4-11-16-45-55-65-70…5</th>

                <th class="">FIRMA</th>
              
      </tr>
        </thead>
        <tbody >';
  for ($i=0; $i < count($DemandaInducida); $i++) { 
     $html.='<tr >
        <td class="bnone letra-tabla">'.$DemandaInducida[$i][12].'</td>
        <td class="bnone letra-tabla">'.$this->getTransformar($DemandaInducida[$i][13]).'</td>
        <td class="bnone letra-tabla">'.$this->getTransformar($DemandaInducida[$i][14]).'</td>
        <td class="bnone letra-tabla">'.$this->getTransformar($DemandaInducida[$i][15]).'</td>
        <td class="bnone letra-tabla">'.$this->getTransformar($DemandaInducida[$i][16]).'</td>
        <td class="bnone letra-tabla">'.$this->getTransformar($DemandaInducida[$i][17]).'</td>
        <td class="bnone letra-tabla">'.$this->getTransformar($DemandaInducida[$i][18]).'</td>
        <td class="bnone letra-tabla">'.$this->getTransformar($DemandaInducida[$i][19]).'</td>
        <td class="bnone letra-tabla">'.$this->getTransformar($DemandaInducida[$i][20]).'</td>
        <td class="bnone letra-tabla">'.$this->getTransformar($DemandaInducida[$i][21]).'</td>
        <td class="bnone letra-tabla">'.$this->getTransformar($DemandaInducida[$i][22]).'</td>
        <td class="bnone letra-tabla">'.$this->getTransformar($DemandaInducida[$i][23]).'</td>
        <td class="bnone letra-tabla">'.$this->getTransformar($DemandaInducida[$i][24]).'</td>
        <td class="bnone letra-tabla"><img width=150px  height=80px src="'.$this->_dom->getBarrioMunicpio($DemandaInducida[0][0])['FIRMA_JEFE'].'"></td>
      
        </tr>';
  }
       
   $html.='</tbody>
    </table>
    <br>


  </body>
</html>';

$hora= getdate();
$dompdf  =  new  Dompdf();
$dompdf->load_html(($html));
$dompdf->setPaper('legal', 'landscape');
$dompdf->render();
$dompdf->stream($hora['year'].$hora['mon'].$hora['wday'].'.pdf', array("Attachment"=>0));
 }

 function getTransformar($val){
    if ($val == 1) {return 'X';}else{return '-';}
 }

}

?>
