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
            $query="SELECT DISTINCTROW hoja_trabajo.ID_MIEMBRO,IDENTIFICACION_MIEMBRO_HOGAR,concat_ws(' ',NOMBRE_MIEMBRO,APELLIDO_MIEMBRO) AS NOMBRE_MIEMBRO,DES_EPS,ID_HOGAR,FICHA_HOGAR_ID_FIC_HOGAR FROM `hoja_trabajo`
                INNER JOIN miembros_hogar ON miembros_hogar.ID_MIEMBROS_HOGAR=hoja_trabajo.ID_MIEMBRO
                INNER JOIN eps ON eps.ID_EPS=miembros_hogar.EPS_ID_EPS
                INNER JOIN ficha_hogar on ficha_hogar.ID_FIC_HOGAR=miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR
                WHERE ".$opCons." like '%".$datoBuscar."%' OR _CHECK=1";
                 break;
            case '2':
                 $opCons="NOMBRE_MIEMBRO";
            $datoBuscar=$this->getPostParam('nomBuscarFormato');
            $query="SELECT DISTINCTROW  hoja_trabajo.ID_MIEMBRO,IDENTIFICACION_MIEMBRO_HOGAR,concat_ws(' ',NOMBRE_MIEMBRO,APELLIDO_MIEMBRO) AS NOMBRE_MIEMBRO,DES_EPS,ID_HOGAR,FICHA_HOGAR_ID_FIC_HOGAR FROM `hoja_trabajo`
INNER JOIN miembros_hogar ON miembros_hogar.ID_MIEMBROS_HOGAR=hoja_trabajo.ID_MIEMBRO
INNER JOIN eps ON eps.ID_EPS=miembros_hogar.EPS_ID_EPS
INNER JOIN ficha_hogar on ficha_hogar.ID_FIC_HOGAR=miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR
WHERE ".$opCons." like '%".$datoBuscar."%' OR _CHECK=1";
                 break;
            case '3':
                 $opCons="APELLIDO_MIEMBRO";
            $datoBuscar=$this->getPostParam('apeBuscarFormato');
            $query="SELECT DISTINCTROW  hoja_trabajo.ID_MIEMBRO,IDENTIFICACION_MIEMBRO_HOGAR,concat_ws(' ',NOMBRE_MIEMBRO,APELLIDO_MIEMBRO) AS NOMBRE_MIEMBRO,DES_EPS,ID_HOGAR,FICHA_HOGAR_ID_FIC_HOGAR FROM `hoja_trabajo`
INNER JOIN miembros_hogar ON miembros_hogar.ID_MIEMBROS_HOGAR=hoja_trabajo.ID_MIEMBRO
INNER JOIN eps ON eps.ID_EPS=miembros_hogar.EPS_ID_EPS
INNER JOIN ficha_hogar on ficha_hogar.ID_FIC_HOGAR=miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR
WHERE ".$opCons." like '%".$datoBuscar."%' OR _CHECK=1";

                break;
            case '4':
            $opCons="FECH_REGISTRO";
            $fechaInicial=$this->getPostParam('fechaInicioBuscFormato');
            $fechaFinal=$this->getPostParam('fechaFinBuscarFormato');
                     $query="SELECT DISTINCTROW  hoja_trabajo.ID_MIEMBRO,IDENTIFICACION_MIEMBRO_HOGAR,concat_ws(' ',NOMBRE_MIEMBRO,APELLIDO_MIEMBRO) AS NOMBRE_MIEMBRO,DES_EPS,ID_HOGAR,FICHA_HOGAR_ID_FIC_HOGAR FROM `hoja_trabajo`
INNER JOIN miembros_hogar ON miembros_hogar.ID_MIEMBROS_HOGAR=hoja_trabajo.ID_MIEMBRO
INNER JOIN eps ON eps.ID_EPS=miembros_hogar.EPS_ID_EPS
INNER JOIN ficha_hogar on ficha_hogar.ID_FIC_HOGAR=miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR
WHERE _CHECK=1 OR ".$opCons." BETWEEN '".$fechaInicial."' AND '".$fechaFinal."'";
                break;
            case '5':
            $opCons="FICHA_HOGAR_ID_FIC_HOGAR";
            $datoBuscar=$this->getPostParam('numFichaBuscarFormato');
            $query="SELECT DISTINCTROW  hoja_trabajo.ID_MIEMBRO,IDENTIFICACION_MIEMBRO_HOGAR,concat_ws(' ',NOMBRE_MIEMBRO,APELLIDO_MIEMBRO) AS NOMBRE_MIEMBRO,DES_EPS,ID_HOGAR,FICHA_HOGAR_ID_FIC_HOGAR FROM `hoja_trabajo`
INNER JOIN miembros_hogar ON miembros_hogar.ID_MIEMBROS_HOGAR=hoja_trabajo.ID_MIEMBRO
INNER JOIN eps ON eps.ID_EPS=miembros_hogar.EPS_ID_EPS
INNER JOIN ficha_hogar on ficha_hogar.ID_FIC_HOGAR=miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR
WHERE _CHECK=1 OR ".$opCons." like '%".$datoBuscar."%'";
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
        $query2="SELECT hoja_trabajo.ID_FORMATO,DES_FORMATO, hoja_trabajo.ID_MIEMBRO, FICHA_HOGAR_ID_FIC_HOGAR
         FROM `hoja_trabajo`
        INNER JOIN miembros_hogar ON miembros_hogar.ID_MIEMBROS_HOGAR=hoja_trabajo.ID_MIEMBRO
        INNER JOIN formato ON formato.ID_FORMATO=hoja_trabajo.ID_FORMATO
         INNER JOIN ficha_hogar on ficha_hogar.ID_FIC_HOGAR=miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR
        WHERE _CHECK=1 AND hoja_trabajo.ID_MIEMBRO='".$this->getPostParam('docBuscarFormato')."'";

        echo json_encode($this->_modelo->getDatosFormatos($query2));
       }
       function consultarFicha(){
        $this->_view->setJs(array('consultas'));
        $query3="SELECT ID_FIC_HOGAR,ID_MIEMBROS_HOGAR FROM ficha_hogar
        INNER JOIN miembros_hogar on miembros_hogar.FICHA_HOGAR_ID_FIC_HOGAR=ficha_hogar.ID_FIC_HOGAR
        WHERE ID_MIEMBROS_HOGAR='".$this->getPostParam('docBuscarFicha')."'";
       
        echo json_encode($this->_modelo->getDatosFormatos($query3));
       }

}

 ?>
