<?php 

class reportesModel extends Model
{
    public function __construct() {
        parent::__construct();
    }

  function getFichaHogar($id_ficha){
    $consulta=$this->_db->query("SELECT * FROM ficha_hogar WHERE ID_FIC_HOGAR = '$id_ficha'");
    return $consulta ->fetch(); 
    
  }
  function getMunicipio($id){
   $consulta=$this->_db->query("SELECT * FROM municipios WHERE ID_MUNICIPIO = ".$id);
     return $consulta ->fetch();  
  }
  function getBarrio($id){
     $consulta=$this->_db->query("SELECT * FROM barrios WHERE ID_BARRIO = ".$id);
     return $consulta ->fetch(); 
  }
  function getMiembrosHogar($id){ 
      $consulta=$this->_db->query("SELECT * FROM miembros_hogar WHERE FICHA_HOGAR_ID_FIC_HOGAR = '$id'");
      return $consulta ->fetchall(); 
  }
  function getcontarMiembros($id){
      $consulta=$this->_db->query("SELECT * FROM miembros_hogar WHERE FICHA_HOGAR_ID_FIC_HOGAR = '$id'");
      return $consulta ->fetchall(); 
  }
  function getRespuesta($id_miembro,$id_pregunta){
    $consulta=$this->_db->query("SELECT pr.DES_RESPUESTA , ri.OTRO  FROM respuesta_individual as ri , pregunta_respuesta_sc as pr WHERE  ri.PREGUNTA_RESPUESTA_SC_ID_PREGUNTA_RESPUESTA_SC = pr.ID_PREGUNTA_RESPUESTA_SC
            and ri.MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR = '$id_miembro' and ri.PREGUNTAS_ID_PREGUNTA = ".$id_pregunta);
        $result=$consulta ->fetch();
        if ($result['OTRO'] == '') {
          return $result['DES_RESPUESTA'];
        }else{
          return $result['OTRO'];
        } 
  }

  function getEps($id){
           if ($id == NULL) {
             return '';
           }else{
            $consulta=$this->_db->query("SELECT DES_EPS FROM eps WHERE ID_EPS = ".$id);
                 $eps= $consulta ->fetch();
                 return $eps['DES_EPS'];           
               } 
  }

  function getRespuestasGrupales($id_ficha,$id_pregunta){
    $consulta=$this->_db->query("SELECT pr.DES_RESPUESTA , rh.OTRO , rh.PREGUNTA_RESPUESTA_SC_DES_RESPUESTA 
        FROM respuesta_hogar as rh , pregunta_respuesta_sc as pr 
        WHERE rh.PREGUNTA_RESPUESTA_SC_ID_PREGUNTA_RESPUESTA_SC = pr.ID_PREGUNTA_RESPUESTA_SC
        and rh.FICHA_HOGAR_ID_FIC_HOGAR = '$id_ficha' and rh.PREGUNTAS_ID_PREGUNTA =".$id_pregunta);
    $result=$consulta ->fetch();
    if ($result['OTRO'] != '') {
           return $result['OTRO'];
        }
        else if($result['PREGUNTA_RESPUESTA_SC_DES_RESPUESTA'] != ''){
             return $result['PREGUNTA_RESPUESTA_SC_DES_RESPUESTA'];
        }
         else{
          return $result['DES_RESPUESTA'];
        } 
  }

  function getRespuestasGrupalesSinOpccion($id_ficha,$id_pregunta){
    $consulta=$this->_db->query("SELECT  rh.PREGUNTA_RESPUESTA_SC_DES_RESPUESTA 
                  FROM respuesta_hogar as rh  
                  WHERE rh.FICHA_HOGAR_ID_FIC_HOGAR = '$id_ficha' 
                  and rh.PREGUNTAS_ID_PREGUNTA =".$id_pregunta);
    $result=$consulta ->fetch()['PREGUNTA_RESPUESTA_SC_DES_RESPUESTA'];
    if ($result == '1') {
      return "Si";
    }else if($result == "0"){
            return "No";
    }else{
    
            return $result;
        }
  }

   function getRespuestasGrupalesSinOpccion2($id_ficha,$id_pregunta){
    $consulta=$this->_db->query("SELECT  rh.PREGUNTA_RESPUESTA_SC_DES_RESPUESTA 
                  FROM respuesta_hogar as rh  
                  WHERE rh.FICHA_HOGAR_ID_FIC_HOGAR = '$id_ficha' 
                  and rh.PREGUNTAS_ID_PREGUNTA =".$id_pregunta);
    $result=$consulta ->fetch()['PREGUNTA_RESPUESTA_SC_DES_RESPUESTA'];
    return $result;
 
  }
  
  function getRespuestasGrupalesSinOpccionAnimales($id_ficha){
$consulta=$this->_db->query("SELECT p.DES_PREGUNTA , rh.PREGUNTA_RESPUESTA_SC_DES_RESPUESTA ,rh.OTRO FROM respuesta_hogar as rh , preguntas as p WHERE PREGUNTAS_ID_PREGUNTA > 96 && PREGUNTAS_ID_PREGUNTA < 103  and rh.PREGUNTAS_ID_PREGUNTA = p.ID_PREGUNTA and FICHA_HOGAR_ID_FIC_HOGAR = '$id_ficha' ");
$result=$consulta ->fetchall();
        
$consulta2=$this->_db->query("SELECT p.DES_PREGUNTA , rh.PREGUNTA_RESPUESTA_SC_DES_RESPUESTA ,rh.OTRO FROM respuesta_hogar as rh , preguntas as p WHERE PREGUNTAS_ID_PREGUNTA = 155 and rh.PREGUNTAS_ID_PREGUNTA = p.ID_PREGUNTA and FICHA_HOGAR_ID_FIC_HOGAR = '$id_ficha' ");
$result2=$consulta2 ->fetch();


        $animales=$this->getRespuestasGrupalesSinOpccion($id_ficha,'96');

        if ($animales == 'Si') {
          $x='Tenencia de animales:SI ';
                    for ($i=0; $i < count($result); $i++) { 
                       $x.='<br>'.$result[$i]['DES_PREGUNTA'].':'.$result[$i]['OTRO'].'';
                    }
                  
          return $x.='<br>'.$result2['DES_PREGUNTA'].$result2['OTRO'];
        }else{
          return 'No';
        }
        
  }


  function getMiembroFindRisk($id_miembro){
    $consulta=$this->_db->query("SELECT * FROM miembros_hogar as mh,test_findrisk as tf WHERE mh.ID_MIEMBROS_HOGAR = tf.MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR and mh.ID_MIEMBROS_HOGAR = '$id_miembro' ");
    return $consulta ->fetch();
  }

  function getGenerarCancerMama($id_miembro){
    $consulta=$this->_db->query("SELECT * FROM miembros_hogar as mh,cancer_mama_general as cm WHERE mh.ID_MIEMBROS_HOGAR = cm.MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR and mh.ID_MIEMBROS_HOGAR =  '$id_miembro' ");
    return $consulta ->fetch();
  }
  function getSignosCancer($id_cancer_general){
  

    $respuesta =
                $this->getConsultarPreguntas($id_cancer_general,'48')['DES_RESPUESTA'].'<br>'.
                $this->getConsultarPreguntas($id_cancer_general,'49')['DES_RESPUESTA'].'<br>'.
                $this->getConsultarPreguntas($id_cancer_general,'50')['DES_RESPUESTA'].'<br>'.
                $this->getConsultarPreguntas($id_cancer_general,'51')['DES_RESPUESTA'].'<br>'.
                $this->getConsultarPreguntas($id_cancer_general,'52')['DES_RESPUESTA'].'<br>'.
                $this->getConsultarPreguntas($id_cancer_general,'53')['DES_RESPUESTA'];
   
    return  $respuesta;


  }
  
  function getConsultarPreguntas($id_CancerMama,$id_pregunta){
   $consulta=$this->_db->query("SELECT pr.DES_RESPUESTA FROM pregunta_respuesta_sc as pr , cancer_mama_detalle as cm WHERE pr.PREGUNTAS_ID_PREGUNTA = cm.PREGUNTAS_ID_PREGUNTA and cm.PREGUNTA_RESPUESTA_SC_ID_PREGUNTA_RESPUESTA_SC = '$id_pregunta' and cm.PREGUNTAS_ID_PREGUNTA = '12' and pr.ID_PREGUNTA_RESPUESTA_SC = '$id_pregunta' and cm.CANCER_MAMA_GENERAL_ID_CANCER_MAMA = '$id_CancerMama' ");
    return  $consulta ->fetch();
  }
  

  function getUsuario($id_usuario){
     $consulta=$this->_db->query("SELECT * FROM usuarios WHERE ID_USUARIO  = '$id_usuario' ");
     return  $consulta ->fetch();
  }
  function getBarrioMunicpio($id_miembro){
  
     $consulta=$this->_db->query(" SELECT m.DES_MUNICIPIO , b.DES_BARRIO ,fh.NOMECLATURA , fh.FIRMA_JEFE FROM miembros_hogar as mh ,ficha_hogar as fh , municipios as m, barrios as b WHERE mh.FICHA_HOGAR_ID_FIC_HOGAR =fh.ID_FIC_HOGAR and mh.ID_MIEMBROS_HOGAR = '$id_miembro' and fh.MUNICIPIOS_ID_MUNICIPIO = m.ID_MUNICIPIO and b.ID_BARRIO = fh.BARRIOS_ID_BARRIO");
     return  $consulta ->fetch();
  }
  
  function getDemanda($id_miembro){
      $consulta=$this->_db->query("SELECT * FROM miembros_hogar as mh,demanda_inducida as di WHERE di.MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR = mh.ID_MIEMBROS_HOGAR and mh.ID_MIEMBROS_HOGAR  = '$id_miembro' ");
    return  $consulta ->fetchall();

  }

  function getUserFirma($doc_miembro){
      $consulta=$this->_db->query(" SELECT * FROM miembros_hogar WHERE IDENTIFICACION_MIEMBRO_HOGAR = ".$doc_miembro);
     return  $consulta ->fetch();
  }

}
 ?>

