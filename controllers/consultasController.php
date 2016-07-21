<?php 
class consultasController extends Controller{
  public function __construct() {
        parent::__construct();
        $this->_view->setJs(array('consultas'));
        $this->_modelo = $this->loadModel('consultas');

    }
    public function index(){
        $this->_view->titulo = 'Consultas';
        $this->_view->formatos = $this->_modelo->getformatos();
        $this->_view->renderizar('index', 'consultas');
    }

    public function consultar(){
    	$this->_view->titulo = 'Consultas';

    	 switch ($this->getPostParam('opConsulta')) {
            case '1':
            $opCons="IDENTIFICACION_MIEMBRO_HOGAR";
            $datoBuscar=$this->getPostParam('docBuscarFormato');
            $query="SELECT DISTINCTROW IDENTIFICACION_MIEMBRO_HOGAR,concat_ws(' ',NOMBRE_MIEMBRO,APELLIDO_MIEMBRO) AS NOMBRE_MIEMBRO,DES_EPS,ID_HOGAR,FICHA_HOGAR_ID_FIC_HOGAR FROM `hoja_trabajo`
                INNER JOIN miembros_hogar ON miembros_hogar.ID_MIEMBROS_HOGAR=hoja_trabajo.ID_MIEMBRO
                INNER JOIN eps ON eps.ID_EPS=miembros_hogar.EPS_ID_EPS
                INNER JOIN ficha_hogar on ficha_hogar.ID_FIC_HOGAR=miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR
                WHERE _CHECK=1 AND ".$opCons."='".$datoBuscar."'";
                 break;
            case '2':
                 $opCons="NOMBRE_MIEMBRO";
            $datoBuscar=$this->getPostParam('nomBuscarFormato');
            $query="SELECT DISTINCTROW IDENTIFICACION_MIEMBRO_HOGAR,concat_ws(' ',NOMBRE_MIEMBRO,APELLIDO_MIEMBRO) AS NOMBRE_MIEMBRO,DES_EPS,ID_HOGAR,FICHA_HOGAR_ID_FIC_HOGAR FROM `hoja_trabajo`
INNER JOIN miembros_hogar ON miembros_hogar.ID_MIEMBROS_HOGAR=hoja_trabajo.ID_MIEMBRO
INNER JOIN eps ON eps.ID_EPS=miembros_hogar.EPS_ID_EPS
INNER JOIN ficha_hogar on ficha_hogar.ID_FIC_HOGAR=miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR
WHERE _CHECK=1 AND ".$opCons." 'like '%".$datoBuscar."%'";
                 break;
            case '3':
                 $opCons="APELLIDO_MIEMBRO";
            $datoBuscar=$this->getPostParam('apeBuscarFormato');
            $query="SELECT DISTINCTROW IDENTIFICACION_MIEMBRO_HOGAR,concat_ws(' ',NOMBRE_MIEMBRO,APELLIDO_MIEMBRO) AS NOMBRE_MIEMBRO,DES_EPS,ID_HOGAR,FICHA_HOGAR_ID_FIC_HOGAR FROM `hoja_trabajo`
INNER JOIN miembros_hogar ON miembros_hogar.ID_MIEMBROS_HOGAR=hoja_trabajo.ID_MIEMBRO
INNER JOIN eps ON eps.ID_EPS=miembros_hogar.EPS_ID_EPS
INNER JOIN ficha_hogar on ficha_hogar.ID_FIC_HOGAR=miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR
WHERE _CHECK=1 AND ".$opCons." 'like '%".$datoBuscar."%'";

                break;
            case '4':
            $opCons="FECH_REGISTRO";
            $fechaInicial=$this->getPostParam('fechaInicioBuscFormato');
            $fechaFinal=$this->getPostParam('fechaFinBuscarFormato');
                     $query="SELECT DISTINCTROW IDENTIFICACION_MIEMBRO_HOGAR,concat_ws(' ',NOMBRE_MIEMBRO,APELLIDO_MIEMBRO) AS NOMBRE_MIEMBRO,DES_EPS,ID_HOGAR,FICHA_HOGAR_ID_FIC_HOGAR FROM `hoja_trabajo`
INNER JOIN miembros_hogar ON miembros_hogar.ID_MIEMBROS_HOGAR=hoja_trabajo.ID_MIEMBRO
INNER JOIN eps ON eps.ID_EPS=miembros_hogar.EPS_ID_EPS
INNER JOIN ficha_hogar on ficha_hogar.ID_FIC_HOGAR=miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR
WHERE _CHECK=1 AND ".$opCons." BETWEEN '".$fechaInicial."' AND '".$fechaFinal."'";
                break;
            case '5':
            $opCons="FICHA_HOGAR_ID_FIC_HOGAR";
            $datoBuscar=$this->getPostParam('numFichaBuscarFormato');
            $query="SELECT DISTINCTROW IDENTIFICACION_MIEMBRO_HOGAR,concat_ws(' ',NOMBRE_MIEMBRO,APELLIDO_MIEMBRO) AS NOMBRE_MIEMBRO,DES_EPS,ID_HOGAR,FICHA_HOGAR_ID_FIC_HOGAR FROM `hoja_trabajo`
INNER JOIN miembros_hogar ON miembros_hogar.ID_MIEMBROS_HOGAR=hoja_trabajo.ID_MIEMBRO
INNER JOIN eps ON eps.ID_EPS=miembros_hogar.EPS_ID_EPS
INNER JOIN ficha_hogar on ficha_hogar.ID_FIC_HOGAR=miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR
WHERE _CHECK=1 AND ".$opCons."='".$datoBuscar."'";
                break;
             default:
                 # code...
                 break;
         }
          
    	  $this->_view->fichaHogar = $this->_modelo->getDatosFormatos($query);
    	 $this->_view->renderizar('index', 'consultas');
       }

       function consultarFormatos(){
        $this->_view->setJs(array('consultas'));
        $query2="SELECT DES_FORMATO, IDENTIFICACION_MIEMBRO_HOGAR FROM `hoja_trabajo`
        INNER JOIN miembros_hogar ON miembros_hogar.ID_MIEMBROS_HOGAR=hoja_trabajo.ID_MIEMBRO
        INNER JOIN formato ON formato.ID_FORMATO=hoja_trabajo.ID_FORMATO
        WHERE _CHECK=1 AND IDENTIFICACION_MIEMBRO_HOGAR='".$this->getPostParam('docBuscarFormato')."'";
        echo json_encode($this->_modelo->getDatosFormatos($query2));
       }

}

 ?>
