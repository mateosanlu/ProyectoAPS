<?php

class kardesController extends Controller
{
    private $_formato;
    private $_general;
    
    public function __construct() {
        parent::__construct();
       $this->_formato = $this->loadModel('kardes');
       $this->_general = $this->loadModel('general');
       $this->_view->setJs(array('kardes'));  // cargar js
    }
    
    public function index()
    {
        $this->_view->titulo = 'Ficha Kardes Gestantes';
        //$this->_view->renderizar('nuevo', 'kardes');
        $this->redireccionar('kardes/nuevo');
    }
    
    public function nuevo($idTarea){

        Session::acceso('USUARIO');
        
        if(!$idTarea){
            $this->redireccionar('hoja_trabajo');
        }

        $this->_view->titulo = 'Ficha Kardes Gestantes';

        $datos = $this->_general->getDatosFicha($idTarea);
        $this->_view->datos = $datos;

        if($datos['_CHECK']!='0'){
            $this->redireccionar('hoja_trabajo');
        }

        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;

             $result = $this->_formato->setKardes(
                 $this->generarId('KA'),
                $datos['ID_MIEMBRO'],
                //$this->getPostParam('nomGestante'),
                $this->getPostParam('condicionMadres'),
                $this->getPostParam('fichaKardes'),
                $this->getPostParam('ipsPrimariaAten'),
                $this->getPostParam('condicionEspecial'),
                $this->getPostParam('otroCondicionEspecial'),
                $this->getPostParam('numGestaciones'),
                $this->getPostParam('numPartos'),
                $this->getPostParam('numCesareas'),
                $this->getPostParam('numAbortos'),
                $this->getPostParam('numHijos'),
                $this->getPostParam('numHijosMuertos'),
                $this->getPostParam('fechaUltParto'),
                $this->getPostParam('fechaUltMenstr'),
                $this->getPostParam('fechaProParto'),
                $this->getPostParam('fechaParto'),
                $this->getPostParam('atenParto'),
                $this->getPostParam('atendidoEn'),
                $this->getPostParam('nombreIpsAtendido'),
                $this->getPostParam('recienNacido'),
                $this->getPostParam('descMuerteRecienNacido'),
                $this->getPostParam('cordonUmbilical'),
                $this->getPostParam('numVisita'),
                $this->getPostParam('fechaVisita'),
                $this->getPostParam('numSemanas'),
                $this->getPostParam('numControlesPrenatales'),
                $this->getPostParam('fechaEnQueAsiste'),
                $this->getPostParam('semGestacional'),
                $this->getPostParam('carnetMaterno'),
                $this->getPostParam('semGestInicioCtrlPrenatal'),
                $this->getPostParam('fechaIngrCtrlPrenatal'),
                $this->getPostParam('ubicacionGeografica'),
                $this->getPostParam('otraPatologiasGestAct'),
                $this->getPostParam('asistCursoMaternidad'),
                $this->getPostParam('morbilidad'),
                $this->getPostParam('otraEducBrindada'),
                $this->getPostParam('canalizacionServicios1Fecha'),
                $this->getPostParam('canalizacionServicios2Fecha'),
                $this->getPostParam('canalizacionServicios3Fecha'),
                $this->getPostParam('canalizacionServicios4Fecha'),
                $this->getPostParam('canalizacionServicios5Fecha'),
                $this->getPostParam('canalizacionServicios6Fecha'),
                $this->getPostParam('canalizacionServicios7Fecha'),
                $this->getPostParam('canalizacionServicios8Fecha'),
                $this->getPostParam('otraCanalizacionServicios'),
                $this->getPostParam('apoyoTransporte'),
                $this->getPostParam('fechControlRecNacido'),
                $this->getPostParam('vacunacionPuerpera'),
                $this->getPostParam('pesoRN'),
                $this->getPostParam('tallaRN'),
                $this->getPostParam('lactanciaRecienNacido'),
                $this->getPostParam('ctrlPostParto'),
                $this->getPostParam('ctrlPlanificacionFam'),
                $this->getPostParam('observaciones'),
                Session::get('id_usuario')
                );
               if ($result == false) {
                    $this->_view->_error = 'Ha ocurrido un error al guardar'.$result;
                    $this->_view->renderizar('nuevo', 'kardes');
                    exit;
                }
                $idLastKardes=$this->_formato->getLastIdKardes(); ;
                $idKardesResp=$this->generarId('RK'); 

                $terminacionGestacion=$this->getPostParam('terminacionGestacion');
                $result = $this->_formato->setKardesCheck($terminacionGestacion,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ha Ocurrido Un Error Al Guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $antecedentesObstetricos1=$this->getPostParam('antecedentesObstetricos1');
                $result = $this->_formato->setKardesCheck($antecedentesObstetricos1,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ha Ocurrido Un Error Al Guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $antecedentesObstetricos2=$this->getPostParam('antecedentesObstetricos2');
                $result = $this->_formato->setKardesCheck($antecedentesObstetricos2,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ha Ocurrido Un Error Al Guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $antecedentesObstetricos3=$this->getPostParam('antecedentesObstetricos3');
                $result = $this->_formato->setKardesCheck($antecedentesObstetricos3,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ha Ocurrido Un Error Al Guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $antecedentesObstetricos4=$this->getPostParam('antecedentesObstetricos4');
                $result = $this->_formato->setKardesCheck($antecedentesObstetricos4,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ha Ocurrido Un Error Al Guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $antecedentesObstetricos5=$this->getPostParam('antecedentesObstetricos5');
                $result = $this->_formato->setKardesCheck($antecedentesObstetricos5,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ha Ocurrido Un Error Al Guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $antecedentesObstetricos6=$this->getPostParam('antecedentesObstetricos6');
                $result = $this->_formato->setKardesCheck($antecedentesObstetricos6,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ha Ocurrido Un Error Al Guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $antecedentesObstetricos7=$this->getPostParam('antecedentesObstetricos7');
                $result = $this->_formato->setKardesCheck($antecedentesObstetricos7,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ha Ocurrido Un Error Al Guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $condicionesAsociadas1=$this->getPostParam('condicionesAsociadas1');
                $result = $this->_formato->setKardesCheck($condicionesAsociadas1,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ha Ocurrido Un Error Al Guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $condicionesAsociadas2=$this->getPostParam('condicionesAsociadas2');
                $result = $this->_formato->setKardesCheck($condicionesAsociadas2,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ha Ocurrido Un Error Al Guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $condicionesAsociadas3=$this->getPostParam('condicionesAsociadas3');
                $result = $this->_formato->setKardesCheck($condicionesAsociadas3,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ha Ocurrido Un Error Al Guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $condicionesAsociadas4=$this->getPostParam('condicionesAsociadas4');
                $result = $this->_formato->setKardesCheck($condicionesAsociadas4,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ha Ocurrido Un Error Al Guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $condicionesAsociadas5=$this->getPostParam('condicionesAsociadas5');
                $result = $this->_formato->setKardesCheck($condicionesAsociadas5,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ha Ocurrido Un Error Al Guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $condicionesAsociadas6=$this->getPostParam('condicionesAsociadas6');
                $result = $this->_formato->setKardesCheck($condicionesAsociadas6,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ha Ocurrido Un Error Al Guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $condicionesAsociadas7=$this->getPostParam('condicionesAsociadas7');
                $result = $this->_formato->setKardesCheck($condicionesAsociadas7,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ha Ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $embarazoActual1=$this->getPostParam('embarazoActual1');
                $result = $this->_formato->setKardesCheck($embarazoActual1,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ha Ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $embarazoActual2=$this->getPostParam('embarazoActual2');
                $result = $this->_formato->setKardesCheck($embarazoActual2,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ha Ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $embarazoActual3=$this->getPostParam('embarazoActual3');
                $result = $this->_formato->setKardesCheck($embarazoActual3,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ha Ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $embarazoActual4=$this->getPostParam('embarazoActual4');
                $result = $this->_formato->setKardesCheck($embarazoActual4,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ha Ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $embarazoActual5=$this->getPostParam('embarazoActual5');
                $result = $this->_formato->setKardesCheck($embarazoActual5,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ha Ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $embarazoActual6=$this->getPostParam('embarazoActual6');
                $result = $this->_formato->setKardesCheck($embarazoActual6,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ha Ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $embarazoActual7=$this->getPostParam('embarazoActual7');
                $result = $this->_formato->setKardesCheck($embarazoActual7,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ha Ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $embarazoActual8=$this->getPostParam('embarazoActual8');
                $result = $this->_formato->setKardesCheck($embarazoActual8,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ha Ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $embarazoActual9=$this->getPostParam('embarazoActual9');
                $result = $this->_formato->setKardesCheck($embarazoActual9,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ha Ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $embarazoActual10=$this->getPostParam('embarazoActual10');
                $result = $this->_formato->setKardesCheck($embarazoActual10,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ha Ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $embarazoActual11=$this->getPostParam('embarazoActual11');
                $result = $this->_formato->setKardesCheck($embarazoActual11,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ha Ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $riegoPsicosocial1=$this->getPostParam('riegoPsicosocial1');
                $result = $this->_formato->setKardesCheck($riegoPsicosocial1,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ha Ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $riegoPsicosocial2=$this->getPostParam('riegoPsicosocial2');
                $result = $this->_formato->setKardesCheck($riegoPsicosocial2,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ha Ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $riegoPsicosocial3=$this->getPostParam('riegoPsicosocial3');
                $result = $this->_formato->setKardesCheck($riegoPsicosocial3,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $riegoPsicosocial4=$this->getPostParam('riegoPsicosocial4');
                $result = $this->_formato->setKardesCheck($riegoPsicosocial4,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $antes20Semana1=$this->getPostParam('antes20Semana1');
                $result = $this->_formato->setKardesCheck($antes20Semana1,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $antes20Semana2=$this->getPostParam('antes20Semana2');
                $result = $this->_formato->setKardesCheck($antes20Semana2,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $antes20Semana3=$this->getPostParam('antes20Semana3');
                $result = $this->_formato->setKardesCheck($antes20Semana3,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $antes20Semana4=$this->getPostParam('antes20Semana4');
                $result = $this->_formato->setKardesCheck($antes20Semana4,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $antes20Semana5=$this->getPostParam('antes20Semana5');
                $result = $this->_formato->setKardesCheck($antes20Semana5,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $antes20Semana6=$this->getPostParam('antes20Semana6');
                $result = $this->_formato->setKardesCheck($antes20Semana6,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $antes20Semana7=$this->getPostParam('antes20Semana7');
                $result = $this->_formato->setKardesCheck($antes20Semana7,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $despues20Semana1=$this->getPostParam('despues20Semana1');
                $result = $this->_formato->setKardesCheck($despues20Semana1,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $despues20Semana2=$this->getPostParam('despues20Semana2');
                $result = $this->_formato->setKardesCheck($despues20Semana2,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $despues20Semana3=$this->getPostParam('despues20Semana3');
                $result = $this->_formato->setKardesCheck($despues20Semana3,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $despues20Semana4=$this->getPostParam('despues20Semana4');
                $result = $this->_formato->setKardesCheck($despues20Semana4,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $despues20Semana5=$this->getPostParam('despues20Semana5');
                $result = $this->_formato->setKardesCheck($despues20Semana5,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $despues20Semana6=$this->getPostParam('despues20Semana6');
                $result = $this->_formato->setKardesCheck($despues20Semana6,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $despues20Semana7=$this->getPostParam('despues20Semana7');
                $result = $this->_formato->setKardesCheck($despues20Semana7,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $despues20Semana8=$this->getPostParam('despues20Semana8');
                $result = $this->_formato->setKardesCheck($despues20Semana8,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $despues20Semana9=$this->getPostParam('despues20Semana9');
                $result = $this->_formato->setKardesCheck($despues20Semana9,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $despues20Semana10=$this->getPostParam('despues20Semana10');
                $result = $this->_formato->setKardesCheck($despues20Semana10,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $despues20Semana11=$this->getPostParam('despues20Semana11');
                $result = $this->_formato->setKardesCheck($despues20Semana11,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $patologiasActules1=$this->getPostParam('patologiasActules1');
                $result = $this->_formato->setKardesCheck($patologiasActules1,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $patologiasActules2=$this->getPostParam('patologiasActules2');
                $result =$this->_formato->setKardesCheck($patologiasActules2,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $patologiasActules3=$this->getPostParam('patologiasActules3');
                $result =$this->_formato->setKardesCheck($patologiasActules3,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $patologiasActules4=$this->getPostParam('patologiasActules4');
                $result =$this->_formato->setKardesCheck($patologiasActules4,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $patologiasActules5=$this->getPostParam('patologiasActules5');
                $result =$this->_formato->setKardesCheck($patologiasActules5,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error ='Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $patologiasActules6=$this->getPostParam('patologiasActules6');
                $result =$this->_formato->setKardesCheck($patologiasActules6,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error ='Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $sumNutrientes=$this->getPostParam('sumNutrientes');
                $result =$this->_formato->setKardesCheck($sumNutrientes,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error ='Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $tipoMorbilidadActual=$this->getPostParam('tipoMorbilidadActual');
                $result =$this->_formato->setKardesCheck($tipoMorbilidadActual,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error ='Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $apoyoPsicosocial=$this->getPostParam('apoyoPsicosocial');
                $result =$this->_formato->setKardesCheck($apoyoPsicosocial,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error ='Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $educacionBrindada0=$this->getPostParam('educacionBrindada0');
                $result =$this->_formato->setKardesCheck($educacionBrindada0,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error ='Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $educacionBrindada1=$this->getPostParam('educacionBrindada1');
                $result =$this->_formato->setKardesCheck($educacionBrindada1,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error ='Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $educacionBrindada2=$this->getPostParam('educacionBrindada2');
                $result =$this->_formato->setKardesCheck($educacionBrindada2,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error ='Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $educacionBrindada3=$this->getPostParam('educacionBrindada3');
                $result =$this->_formato->setKardesCheck($educacionBrindada3,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error ='Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $educacionBrindada4=$this->getPostParam('educacionBrindada4');
                $result =$this->_formato->setKardesCheck($educacionBrindada4,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error ='Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $educacionBrindada5=$this->getPostParam('educacionBrindada5');
                $result =$this->_formato->setKardesCheck($educacionBrindada5,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error ='Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $educacionBrindada6=$this->getPostParam('educacionBrindada6');
                $result =$this->_formato->setKardesCheck($educacionBrindada6,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error ='Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $educacionBrindada7=$this->getPostParam('educacionBrindada7');
                $result =$this->_formato->setKardesCheck($educacionBrindada7,$idLastKardes,$idKardesResp);
                    if ($result == false) {
                        $this->_view->_error ='Ah ocurrido un error al guardar '.$result;
                        $this->_view->renderizar('nuevo','kardes');
                    }
                     $idKardesResp=$this->generarId('RK'); 
                $educacionBrindada8=$this->getPostParam('educacionBrindada8');
                $result =$this->_formato->setKardesCheck($educacionBrindada8,$idLastKardes,$idKardesResp);
                if ($result == false) {
                    $this->_view->_error ='Ah ocurrido un error al guardar '.$result;
                    $this->_view->renderizar('nuevo','kardes');
                }

             $idKardesResp=$this->generarId('RK'); 
                $canalizacionServicios1=$this->getPostParam('canalizacionServicios1');
                $result =$this->_formato->setKardesCheck($canalizacionServicios1,$idLastKardes,$idKardesResp);
                if ($result == false) {
                    $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                    $this->_view->renderizar('nuevo','kardes');
                }
                 $idKardesResp=$this->generarId('RK'); 
                $canalizacionServicios2=$this->getPostParam('canalizacionServicios2');
                $result =$this->_formato->setKardesCheck($canalizacionServicios2,$idLastKardes,$idKardesResp);
                if ($result == false) {
                    $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                    $this->_view->renderizar('nuevo','kardes');
                }
                 $idKardesResp=$this->generarId('RK'); 
                $canalizacionServicios3=$this->getPostParam('canalizacionServicios3');
                $result= $this->_formato->setKardesCheck($canalizacionServicios3,$idLastKardes,$idKardesResp);
                if ($result == false) {
                    $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                    $this->_view->renderizar('nuevo','kardes');
                }
                 $idKardesResp=$this->generarId('RK'); 
                $canalizacionServicios4=$this->getPostParam('canalizacionServicios4');
                $result= $this->_formato->setKardesCheck($canalizacionServicios4,$idLastKardes,$idKardesResp);
                if ($result == false) {
                    $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                    $this->_view->renderizar('nuevo','kardes');
                }
                 $idKardesResp=$this->generarId('RK'); 
                $canalizacionServicios5=$this->getPostParam('canalizacionServicios5');
                $result= $this->_formato->setKardesCheck($canalizacionServicios5,$idLastKardes,$idKardesResp);
                if ($result == false) {
                    $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                    $this->_view->renderizar('nuevo','kardes');
                }
                 $idKardesResp=$this->generarId('RK'); 
                $canalizacionServicios6=$this->getPostParam('canalizacionServicios6');
                $result= $this->_formato->setKardesCheck($canalizacionServicios6,$idLastKardes,$idKardesResp);
                if ($result == false) {
                    $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                    $this->_view->renderizar('nuevo','kardes');
                }
                 $idKardesResp=$this->generarId('RK'); 
                $canalizacionServicios7=$this->getPostParam('canalizacionServicios7');
                $result= $this->_formato->setKardesCheck($canalizacionServicios7,$idLastKardes,$idKardesResp);
                if ($result == false) {
                    $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                    $this->_view->renderizar('nuevo','kardes');
                }
                 $idKardesResp=$this->generarId('RK'); 
                $canalizacionServicios8=$this->getPostParam('canalizacionServicios8');
                $result= $this->_formato->setKardesCheck($canalizacionServicios8,$idLastKardes,$idKardesResp);
                if ($result == false) {
                    $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                    $this->_view->renderizar('nuevo','kardes');
                }
                 $idKardesResp=$this->generarId('RK'); 
                $vacunacionTTID=$this->getPostParam('vacunacionTTID');
                $result= $this->_formato->setKardesCheck($vacunacionTTID,$idLastKardes,$idKardesResp);
                if ($result == false) {
                    $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                    $this->_view->renderizar('nuevo','kardes');
                }
                 $idKardesResp=$this->generarId('RK'); 
                $clasfRiesgoPuerpera1=$this->getPostParam('clasfRiesgoPuerpera1');
                $result= $this->_formato->setKardesCheck($clasfRiesgoPuerpera1,$idLastKardes,$idKardesResp);
                if ($result == false) {
                    $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                    $this->_view->renderizar('nuevo','kardes');
                }
                 $idKardesResp=$this->generarId('RK'); 
                $clasfRiesgoPuerpera2=$this->getPostParam('clasfRiesgoPuerpera2');
                $result= $this->_formato->setKardesCheck($clasfRiesgoPuerpera2,$idLastKardes,$idKardesResp);
                if ($result == false) {
                    $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                    $this->_view->renderizar('nuevo','kardes');
                }
                 $idKardesResp=$this->generarId('RK'); 
                $signosAlarmaPuerperio=$this->getPostParam('signosAlarmaPuerperio');
                $result= $this->_formato->setKardesCheck($signosAlarmaPuerperio,$idLastKardes,$idKardesResp);
                if ($result == false) {
                    $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                    $this->_view->renderizar('nuevo','kardes');
                }
                 $idKardesResp=$this->generarId('RK'); 
                $vacRecienNacido=$this->getPostParam('vacRecienNacido');
                $result= $this->_formato->setKardesCheck($vacRecienNacido,$idLastKardes,$idKardesResp);
                if ($result == false) {
                    $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                    $this->_view->renderizar('nuevo','kardes');
                }
                 $idKardesResp=$this->generarId('RK'); 
                $metodoPlanificacionRecomendado=$this->getPostParam('metodoPlanificacionRecomendado');
                $result= $this->_formato->setKardesCheck($metodoPlanificacionRecomendado,$idLastKardes,$idKardesResp);
            if ($result == false) {
                $this->_view->_error = 'Ah ocurrido un error al guardar '.$result;
                $this->_view->renderizar('nuevo/aqui','kardes');
            }

            $update = $this->_general->formatoMiembroCheck($idTarea);

            $this->_view->_mensaje = 'Registro guardado exitosamente';
            $this->redireccionar('hoja_trabajo/editar/'.$datos['ID_FICHA']);
            }

            $this->_view->renderizar('nuevo', 'kardes');
        }

}

?>