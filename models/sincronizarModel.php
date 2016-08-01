<?php

class sincronizarModel extends ModelServer
{
    public function __construct() {
        parent::__construct();
        if ($this->_dbserver == false) {
          return false;
        }
    }
    
  function getConsultarTablaLocal($tabla){
	    $consulta = $this->_db->query("select * from ".$tabla);
        return $consulta ->fetchall();

  }
  function getConsultarTablaServer($tabla){
	    $consulta = $this->_dbserver->query("select * from ".$tabla);
        return $consulta ->fetchall();

  }

 

  function sincronizarm(){


  	
/////////////////////FICHA HOGAR
        $ficha_hogar= $this->getConsultarTablaLocal("ficha_hogar");
        $fichaHogarServer = $this->getConsultarTablaServer("ficha_hogar");
//Sincronizar Hacia Arriba Ficha Hogar
        for ($i=0; $i < count($ficha_hogar); $i++) { 

            
                      $tem[$i]=$ficha_hogar[$i]['ID_FIC_HOGAR'];
                      
			       
                  if (count($tem) != 0) {
                  	
               	$subirFicha="INSERT INTO ficha_hogar VALUES  
       		         ( '". $tem[$i]."', '".$ficha_hogar[$i]['ID_ZONA']."', '".$ficha_hogar[$i]['NOMECLATURA']."', '".$ficha_hogar[$i]['USUARIOS_ID_USUARIO']."', '".$ficha_hogar[$i]['MUNICIPIOS_ID_MUNICIPIO']."', '".$ficha_hogar[$i]['BARRIOS_ID_BARRIO']."', '".$ficha_hogar[$i]['ID_HOGAR']."', '".$ficha_hogar[$i]['FIRMA_JEFE']."', '".$ficha_hogar[$i]['FECHA']."', '".$ficha_hogar[$i]['DOC_MIEMBRO_FIRMA']."')";
                $this->_dbserver->query($subirFicha);
                    
                  	}
 }
 

 ///Hacia Arriba miembros Hogar
        $miembros_hogar= $this->getConsultarTablaLocal("miembros_hogar");
        $miembrosHogarServer = $this->getConsultarTablaServer("miembros_hogar");
        $tem=Array();
  for ($i=0; $i <count($miembros_hogar); $i++) { 

         
         
         	if ($miembros_hogar[$i]['EPS_ID_EPS']!=null) {
         	$subirMiembro="INSERT INTO miembros_hogar VALUES  
                ('". $miembros_hogar[$i]['ID_MIEMBROS_HOGAR']."',
                 '".$miembros_hogar[$i]['ID_MIEMBRO']."', 
                 '".$miembros_hogar[$i]['FICHA_HOGAR_ID_FIC_HOGAR']."',
                 '".$miembros_hogar[$i]['NOMBRE_MIEMBRO']."',
                 '".$miembros_hogar[$i]['APELLIDO_MIEMBRO']."',
                 '".$miembros_hogar[$i]['FECHA_NACIMIENTO']."', 
                 '".$miembros_hogar[$i]['IDENTIFICACION_MIEMBRO_HOGAR']."',
                 '".$miembros_hogar[$i]['EPS_ID_EPS']."',
                 '".$miembros_hogar[$i]['FECHA_REGISTRO']."', 
                 '".$miembros_hogar[$i]['EDAD']."', 
                 '".$miembros_hogar[$i]['SEXO']."',
                 '".$miembros_hogar[$i]['TIPO_DOCUMENTO']."')";                 
              $this->_dbserver->query($subirMiembro);
         	}else{
         		$subirMiembro="INSERT INTO miembros_hogar VALUES  
                ('". $miembros_hogar[$i]['ID_MIEMBROS_HOGAR']."',
                 '".$miembros_hogar[$i]['ID_MIEMBRO']."', 
                 '".$miembros_hogar[$i]['FICHA_HOGAR_ID_FIC_HOGAR']."',
                 '".$miembros_hogar[$i]['NOMBRE_MIEMBRO']."',
                 '".$miembros_hogar[$i]['APELLIDO_MIEMBRO']."',
                 '".$miembros_hogar[$i]['FECHA_NACIMIENTO']."', 
                 '".$miembros_hogar[$i]['IDENTIFICACION_MIEMBRO_HOGAR']."',
                 NULL,
                 '".$miembros_hogar[$i]['FECHA_REGISTRO']."', 
                 '".$miembros_hogar[$i]['EDAD']."', 
                 '".$miembros_hogar[$i]['SEXO']."',
                 '".$miembros_hogar[$i]['TIPO_DOCUMENTO']."')";
              $this->_dbserver->query($subirMiembro);
         	}
          
       
  }



   $respuestaIndividual= $this->getConsultarTablaLocal("respuesta_individual");
   $respuestaIndividualServer = $this->getConsultarTablaServer("respuesta_individual");
   $tem=Array();

//Respuestas individuales hacia arriba
for ($i=0; $i <count($respuestaIndividual); $i++) { 

            
         	if ($respuestaIndividual[$i]['PREGUNTA_RESPUESTA_SC_ID_PREGUNTA_RESPUESTA_SC']!=null) {
         	$bajarRespuestaIndividual="INSERT INTO respuesta_individual VALUES  
                ('". $respuestaIndividual[$i]['ID_RESPUESTA_INDIVIDUAL']."',
                 '".$respuestaIndividual[$i]['FICHA_HOGAR_ID_FIC_HOGAR']."', 
                 '".$respuestaIndividual[$i]['PREGUNTAS_ID_PREGUNTA']."',
                 '".$respuestaIndividual[$i]['PREGUNTA_RESPUESTA_SC_DES_RESPUESTA']."',
                 '".$respuestaIndividual[$i]['PREGUNTA_RESPUESTA_SC_ID_PREGUNTA_RESPUESTA_SC']."', 
                 '".$respuestaIndividual[$i]['OTRO']."',
                 '".$respuestaIndividual[$i]['MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR']."',
                 '".$respuestaIndividual[$i]['FECHA_REGISTRO']."')";
              $this->_dbserver->query($bajarRespuestaIndividual);
         	}else{
         		$bajarRespuestaIndividual="INSERT INTO respuesta_individual VALUES  
                ('". $respuestaIndividual[$i]['ID_RESPUESTA_INDIVIDUAL']."',
                 '".$respuestaIndividual[$i]['FICHA_HOGAR_ID_FIC_HOGAR']."', 
                 '".$respuestaIndividual[$i]['PREGUNTAS_ID_PREGUNTA']."',
                 '".$respuestaIndividual[$i]['PREGUNTA_RESPUESTA_SC_DES_RESPUESTA']."',
                 NULL, 
                 '".$respuestaIndividual[$i]['OTRO']."',
                 '".$respuestaIndividual[$i]['MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR']."',
                 '".$respuestaIndividual[$i]['FECHA_REGISTRO']."')";
              $this->_dbserver->query($bajarRespuestaIndividual);
         	}
         
       
  }




///Respuestas Grupales  
   $respuestaGrupal= $this->getConsultarTablaLocal("respuesta_hogar");
   $respuestaGrupalServer = $this->getConsultarTablaServer("respuesta_hogar");
   $tem=Array();

//Sincronizar Hacia Arribs Respuestas Grupales
for ($i=0; $i <count($respuestaGrupal); $i++) { 

              
         	if ($respuestaGrupal[$i]['PREGUNTA_RESPUESTA_SC_ID_PREGUNTA_RESPUESTA_SC']!=null) {
         	$subirRespuestaGrupal="INSERT INTO respuesta_hogar VALUES  
                ('". $respuestaGrupal[$i]['ID_RESPUESTA_HOGAR']."',
                 '".$respuestaGrupal[$i]['ID_FICHA_HOGAR']."', 
                 '".$respuestaGrupal[$i]['FICHA_HOGAR_ID_FIC_HOGAR']."',
                 '".$respuestaGrupal[$i]['PREGUNTAS_ID_PREGUNTA']."',
                 '".$respuestaGrupal[$i]['PREGUNTA_RESPUESTA_SC_DES_RESPUESTA']."', 
                 '".$respuestaGrupal[$i]['PREGUNTA_RESPUESTA_SC_ID_PREGUNTA_RESPUESTA_SC']."',
                 '".$respuestaGrupal[$i]['OTRO']."',
                 '".$respuestaGrupal[$i]['FECHA_REGISTRO']."')";
              $this->_dbserver->query($subirRespuestaGrupal);
         	}else{
         		$subirRespuestaGrupal="INSERT INTO respuesta_hogar VALUES  
                ('". $respuestaGrupal[$i]['ID_RESPUESTA_HOGAR']."',
                 '".$respuestaGrupal[$i]['ID_FICHA_HOGAR']."', 
                 '".$respuestaGrupal[$i]['FICHA_HOGAR_ID_FIC_HOGAR']."',
                 '".$respuestaGrupal[$i]['PREGUNTAS_ID_PREGUNTA']."',
                 '".$respuestaGrupal[$i]['PREGUNTA_RESPUESTA_SC_DES_RESPUESTA']."', 
                 NULL,
                 '".$respuestaGrupal[$i]['OTRO']."',
                 '".$respuestaGrupal[$i]['FECHA_REGISTRO']."')";
              $this->_dbserver->query($subirRespuestaGrupal);
         	}
          
        
  }







//Sincronizar Test de FindRisk
   $testFindrisk= $this->getConsultarTablaLocal("test_findrisk");
   $testFindriskServer = $this->getConsultarTablaServer("test_findrisk");
   $tem=Array();
//Sincronizar Arriba Test de FindRisk


for ($i=0; $i <count($testFindrisk); $i++) { 

            
            $subirTestFindRisk="INSERT INTO test_findrisk VALUES  
                ('". $testFindrisk[$i]['ID_TEST_FINDRISK']."',
                 '".$testFindrisk[$i]['EDAD']."', 
                 '".$testFindrisk[$i]['INDICE_MASA_CORPORAL']."',
                 '".$testFindrisk[$i]['PERIMETRO_CINTURA']."',
                 '".$testFindrisk[$i]['ACTIVIDAD_FISICA']."', 
                 '".$testFindrisk[$i]['FRECUENCIA_CONSUMO_VEGETALES']."',
                 '".$testFindrisk[$i]['HATOMADO_MEDICAMENTOS_HIPERTENSION']."',
                 '".$testFindrisk[$i]['NIVEL_ALTO_GLUCOSA_SANGRE']."',
                 '".$testFindrisk[$i]['DIABETES_FAMILIAR']."',
                 '".$testFindrisk[$i]['RESULTADO_TEST']."',
                 '".$testFindrisk[$i]['USUARIOS_ID_USUARIO']."',
                 '".$testFindrisk[$i]['MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR']."',
                 '".$testFindrisk[$i]['FECH_REGISTRO']."')";
             $this->_dbserver->query($subirTestFindRisk);
       // }
  }




//Sincronizar Test Cancer de Mama

   $cancerMama= $this->getConsultarTablaLocal("cancer_mama_general");
   $cancerMamaServer = $this->getConsultarTablaServer("cancer_mama_general");
   $tem=Array();
 //Sincronizar Arriba Cacer de Mama   
   for ($i=0; $i <count($cancerMama); $i++) { 

            $subirTestCancerMama="INSERT INTO cancer_mama_general VALUES  
                ('".$cancerMama[$i]['ID_CANCER_MAMA']."',
                 '".$cancerMama[$i]['HA_TENIDO_CANCER_SENO_SU_MAMA']."', 
                 '".$cancerMama[$i]['LE_HAN_PRACTICADO_BIOPSIA_SENO']."',
                 '".$cancerMama[$i]['HA_TENIDO_CANCER_MAMA_SU_HERMANA(O)']."',
                 '".$cancerMama[$i]['SI_TIENE_MAS_50_LE_HAN_PTACTICADO_MAMOGRAFIA']."', 
                 '".$cancerMama[$i]['USUARIOS_ID_USUARIO']."',
                 '".$cancerMama[$i]['MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR']."',
                 '".$cancerMama[$i]['FECHA_REGISTRO']."',
                 '".$cancerMama[$i]['EMAIL']."',
                 '".$cancerMama[$i]['TELEFONO']."')";
             $this->_dbserver->query($subirTestCancerMama);
      
  }
//Sincronizar abajo Cancer de Mama
 





//Cancer de Mama Detalle
 $cancerMamaDetalle= $this->getConsultarTablaLocal("cancer_mama_detalle");
 $cancerMamaDetalleServer = $this->getConsultarTablaServer("cancer_mama_detalle");
 $tem=Array();

 for ($i=0; $i <count($cancerMamaDetalle); $i++) { 

            $subirTestCancerMamaDetalle="INSERT INTO cancer_mama_detalle VALUES  
                ('".$cancerMamaDetalle[$i]['ID_CANCER_MAMA_DETALLE']."',
                 '".$cancerMamaDetalle[$i]['CANCER_MAMA_GENERAL_ID_CANCER_MAMA']."', 
                 '".$cancerMamaDetalle[$i]['PREGUNTAS_ID_PREGUNTA']."',
                 '".$cancerMamaDetalle[$i]['PREGUNTA_RESPUESTA_SC_ID_PREGUNTA_RESPUESTA_SC']."',
                 '".$cancerMamaDetalle[$i]['FECHA_REGISTRO']."')";
             $this->_dbserver->query($subirTestCancerMamaDetalle);
      
  }
//Sincronizar abajo Cancer de Mama
 

//Sincronizar Demanda Inducidad

   $demandaInducida= $this->getConsultarTablaLocal("demanda_inducida");
   $demandaInducidaServer = $this->getConsultarTablaServer("demanda_inducida");
   $tem=Array();
//Sincronizar Hacia Arriba Demanda Inducida  
   for ($i=0; $i <count($demandaInducida); $i++) { 

         
            $subirDemandaInducida="INSERT INTO demanda_inducida VALUES  
                ('". $demandaInducida[$i]['ID_DEMANDA_INDUCIDA']."',
                 '".$demandaInducida[$i]['FECHA_REGISTRO']."', 
                 '".$demandaInducida[$i]['VACUNACION']."',
                 '".$demandaInducida[$i]['SALUD_ORAL']."',
                 '".$demandaInducida[$i]['PLANIFICACION_FAMILIAR']."', 
                 '".$demandaInducida[$i]['ATENCION_PARTO_RN']."',
                 '".$demandaInducida[$i]['CONTROL_EMBARAZO']."',
                 '".$demandaInducida[$i]['ATENCION_JOVEN10A29']."',
                 '".$demandaInducida[$i]['ATENCION_ADULTO45A80']."',
                 '".$demandaInducida[$i]['CRECIMIENTO_DESARROLLO']."',
                 '".$demandaInducida[$i]['TOMA_CITOLOGIA']."',
                 '".$demandaInducida[$i]['EXAMEN_SENO']."',
                 '".$demandaInducida[$i]['ATENCION_PRECONCEPCIONAL']."',
                 '".$demandaInducida[$i]['TAMIZAJE_VISUAL']."',
                 '".$demandaInducida[$i]['FIRMA_PACIENTE']."',
                 '".$demandaInducida[$i]['MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR']."',
                 '".$demandaInducida[$i]['USUARIOS_ID_USUARIO']."')";
             $this->_dbserver->query($subirDemandaInducida);
        
  }
//Sincronizar Hacia Abajo Demanda Inducida

//Sincronizar Hoja Trabajo
   $hoja_trabajo= $this->getConsultarTablaLocal("hoja_trabajo");
   $hoja_trabajoServer = $this->getConsultarTablaServer("hoja_trabajo");

for ($i=0; $i <count($hoja_trabajo); $i++) { 

            $subirHojaTrabajo="INSERT INTO hoja_trabajo VALUES  
                ('".$hoja_trabajo[$i]['ID_TAREA']."',
                 '".$hoja_trabajo[$i]['ID_USUARIO']."', 
                 '".$hoja_trabajo[$i]['ID_MIEMBRO']."',
                 '".$hoja_trabajo[$i]['ID_FORMATO']."',
                 '".$hoja_trabajo[$i]['_CHECK']."',
                 '".$hoja_trabajo[$i]['FECH_REGISTRO']."')";
             $this->_dbserver->query($subirHojaTrabajo);
     
  }



   $usuarios= $this->getConsultarTablaLocal("usuarios");
   $usuariosServer = $this->getConsultarTablaServer("usuarios");

for ($i=0; $i <count($usuarios); $i++) { 

            $Subirusuarios="INSERT INTO usuarios VALUES  
                ('".$usuarios[$i]['ID_USUARIO']."',
                 '".$usuarios[$i]['NOMBRE_USUARIO']."', 
                 '".$usuarios[$i]['APELLIDO_USUARIO']."',
                 '".$usuarios[$i]['ROL']."',
                 '".$usuarios[$i]['FIRMA']."',
                 '".$usuarios[$i]['FOTO']."',
                 '".$usuarios[$i]['IDENTIFICACION']."',
                 '".$usuarios[$i]['PASS']."',
                 '".$usuarios[$i]['ESTADO']."')";
             $this->_dbserver->query($Subirusuarios);
     
  }










 $aiepiGeneral=$this->getConsultarTablaLocal("general_aiepi");
   for ($i=0; $i < count($aiepiGeneral); $i++) { 
                        $subirAiepi="INSERT INTO general_aiepi VALUES (
                        '".$aiepiGeneral[$i]['ID_GENERAL_AIEPI']."', 
                        '".$aiepiGeneral[$i]['USUARIOS_ID_USUARIO']."', 
                        '".$aiepiGeneral[$i]['TIPO_USUARIO_AIEPI']."', 
                        '".$aiepiGeneral[$i]['TIPO_POBLACION_AIEPI']."', 
                        '".$aiepiGeneral[$i]['ACOMPAÑANTE_AIEPI']."', 
                        '".$aiepiGeneral[$i]['PARENTESCO_ACOMPAÑANTE_AIEPI']."',
                        '".$aiepiGeneral[$i]['DIRECCION_ACOMPAÑANTE']."',
                        '".$aiepiGeneral[$i]['TELEFONO_ACOMPAÑANTE_AIEPI']."',
                        '".$aiepiGeneral[$i]['EVALUACION_REALIZADA_AIEPI']."',
                        '".$aiepiGeneral[$i]['PROBLEMA_SALUD_BUCAL']."',
                        '".$aiepiGeneral[$i]['DOLOR_MOLESTIA_COMER']."',
                        '".$aiepiGeneral[$i]['ALGUN_GOLPE_BOCA']."',
                        '".$aiepiGeneral[$i]['NOCHE_DUERME_SINCEPILLA_BOCA']."',
                        '".$aiepiGeneral[$i]['SANGRA_ENCIA_CEPILLA']."',
                        '".$aiepiGeneral[$i]['HIGIENIZACION_HORAL']."',
                        '".$aiepiGeneral[$i]['SUPERVISAN_CEPILLADO_DIENTES']."',
                        '".$aiepiGeneral[$i]['NUMERO_VALORACIONES_ODONTO_365']."',
                        '".$aiepiGeneral[$i]['NUMERO_VECESHIGIENE_ORAL']."',
                        '".$aiepiGeneral[$i]['TIENE_TOS']."',
                        '".$aiepiGeneral[$i]['DIFICUALTAD_RESPIRAR']."',
                        '".$aiepiGeneral[$i]['NUMERO_RESPIRACIONES_MINUTO']."',
                        '".$aiepiGeneral[$i]['NUMERO_DIAS_CONTOS']."',
                        '".$aiepiGeneral[$i]['NUMERO_DIAS_DIFICULTAD_RESPIRATORIA']."',
                        '".$aiepiGeneral[$i]['RESPIRACION_RAPIDA']."',
                        '".$aiepiGeneral[$i]['TIRAJE_COSTAL']."',
                        '".$aiepiGeneral[$i]['ESTRIDOR']."',
                        '".$aiepiGeneral[$i]['SIBILANCIAS']."',
                        '".$aiepiGeneral[$i]['CONTACTO_PERSONAS_TB']."',
                        '".$aiepiGeneral[$i]['PERSOSTENTE_TOS_21_DIAS']."',
                        '".$aiepiGeneral[$i]['ENCONTACTO_PERSONAS_SINTOMATICAS']."',
                        '".$aiepiGeneral[$i]['PERDIDA_GNANCIA_PESO_3MESES']."',
                        '".$aiepiGeneral[$i]['DIARREA']."',
                        '".$aiepiGeneral[$i]['NUMERO_DIAS_DIARREA']."',
                        '".$aiepiGeneral[$i]['SANGRE_HECES']."',
                        '".$aiepiGeneral[$i]['FONTANELA_MOLLEJA_HUNDIDA']."',
                        '".$aiepiGeneral[$i]['BOCA_SECA_SED']."',
                        '".$aiepiGeneral[$i]['PLIEGUE_CUTANEO_2S_MAYOR']."',
                        '".$aiepiGeneral[$i]['PLIEGUE_CUTANEO_2S_MENOR']."',
                        '".$aiepiGeneral[$i]['INTRANQUILO_IRRITABLE']."',
                        '".$aiepiGeneral[$i]['OJOS_HUNDIDOS']."',
                        '".$aiepiGeneral[$i]['FIEBRE']."',
                        '".$aiepiGeneral[$i]['NUMERO_DIAS_FIEBRE']."',
                        '".$aiepiGeneral[$i]['VIVE_ZONDA_RIESGO_MALARIA']."',
                        '".$aiepiGeneral[$i]['VIVE_ZONDA_RIESGO_DENGUE']."',
                        '".$aiepiGeneral[$i]['ZONA_RU']."',
                        '".$aiepiGeneral[$i]['RIGIDEZ_NUCA']."',
                        '".$aiepiGeneral[$i]['MANIFESTACION_SANGRADO']."',
                        '".$aiepiGeneral[$i]['PIEL_HUMEDA_FRIA']."',
                        '".$aiepiGeneral[$i]['INQUIETO_IRRITABLE']."',
                        '".$aiepiGeneral[$i]['FIEBRE_MAS_5DIAS']."',
                        '".$aiepiGeneral[$i]['FIEBRE_MAYOR_39']."',
                        '".$aiepiGeneral[$i]['FIEBRE_TOS']."',
                        '".$aiepiGeneral[$i]['CORIZA']."',
                        '".$aiepiGeneral[$i]['OJOS_ROJOS']."',
                        '".$aiepiGeneral[$i]['ASPECTO_TOXICO']."',
                        '".$aiepiGeneral[$i]['DOLOR_ABDOMINAL_CONTINUO']."',
                        '".$aiepiGeneral[$i]['PULSO_RAPIDO_DEBIL']."',
                        '".$aiepiGeneral[$i]['ERUPCION_CUTANIA']."',
                        '".$aiepiGeneral[$i]['DOLOR_CABEZA_RECIENTE_AUMENTA']."',
                        '".$aiepiGeneral[$i]['DOLOR_CABEZA_DESPIERTA']."',
                        '".$aiepiGeneral[$i]['NUMERO_DIAS_DOLOR_CABEZA']."',
                        '".$aiepiGeneral[$i]['FIEBRE_SUDORACION_14DIAS']."',
                        '".$aiepiGeneral[$i]['DOLOR_CABEZA_OTRO_VOMITO']."',
                        '".$aiepiGeneral[$i]['DOLOR_HUESOS']."',
                        '".$aiepiGeneral[$i]['DOLOR_HUESOS_INTERRUMPE_ACTIVIDAD']."',
                        '".$aiepiGeneral[$i]['DOLOR_HUESOS_AUMENTA']."',
                        '".$aiepiGeneral[$i]['CAMBIOS_FATIGA_APETITO_PESO']."',
                        '".$aiepiGeneral[$i]['OIDO_PROBLEMAS']."',
                        '".$aiepiGeneral[$i]['NUMERO_EPISODIOS_PREVIOS']."',
                        '".$aiepiGeneral[$i]['SUPURACION_OIDO']."',
                        '".$aiepiGeneral[$i]['NUMERO_DIAS_SUPURACION_OIDO']."',
                        '".$aiepiGeneral[$i]['TUMEFACCION_OREJA']."',
                        '".$aiepiGeneral[$i]['DESNUTRICION_ANEMIA']."',
                        '".$aiepiGeneral[$i]['RETRA_CRECIMIENTO']."',
                        '".$aiepiGeneral[$i]['VALORACION_CARA']."',
                        '".$aiepiGeneral[$i]['PERDIDA_TEJIDO_MUSCULAR']."',
                        '".$aiepiGeneral[$i]['TEJIDO_ADIPOSO']."',
                        '".$aiepiGeneral[$i]['APETITO']."',
                        '".$aiepiGeneral[$i]['EDEMA']."',
                        '".$aiepiGeneral[$i]['CABELLO']."',
                        '".$aiepiGeneral[$i]['PERIMETRO_BRAQUIAL_MEDIDA']."',
                        '".$aiepiGeneral[$i]['LACTA_TOMA_SENO_MESES']."',
                        '".$aiepiGeneral[$i]['NUMERO_VECES_TOMA_SENO_DIA_MESES']."',
                        '".$aiepiGeneral[$i]['NUMERO_VECES_TOMA_SENO_NOCHE_MESES']."',
                        '".$aiepiGeneral[$i]['TOMA_SENO_ANOS']."',
                        '".$aiepiGeneral[$i]['NUMERO_VECES_TOMA_SENO_DIA_ANOS']."',
                        '".$aiepiGeneral[$i]['NUMERO_VECES_TOMA_SENO_NOCHE_ANOS']."',
                        '".$aiepiGeneral[$i]['ALIMENTO_MAYOR_FRECUENCIA']."',
                        '".$aiepiGeneral[$i]['PROGRAMA_RECUPERACION_NUTRICONAL']."',
                        '".$aiepiGeneral[$i]['CUAL_PROGRAMA_NUTRICIONAL']."',
                        '".$aiepiGeneral[$i]['USA_BIBERON']."',
                        '".$aiepiGeneral[$i]['COME_SOLO']."',
                        '".$aiepiGeneral[$i]['MESES_3_LEVANTA_CABEZA']."',
                        '".$aiepiGeneral[$i]['MESES_6_SIENTA_APOYO']."',
                        '".$aiepiGeneral[$i]['MESES_9_SIETA_SOLO']."',
                        '".$aiepiGeneral[$i]['MESES_12_CAMINA_APOYO']."',
                        '".$aiepiGeneral[$i]['MESES_16_CAMINA_SOLO']."',
                        '".$aiepiGeneral[$i]['MESES_20_CORRE_RAPIDO']."',
                        '".$aiepiGeneral[$i]['MESES_24_PATEA_PELOTA']."',
                        '".$aiepiGeneral[$i]['MESES_30_EMPINA_AMBOSPIES']."',
                        '".$aiepiGeneral[$i]['MESES_36_SUBE_BAJA_ESCALERAS_SOLO']."',
                        '".$aiepiGeneral[$i]['MESES_48_LANZA_ATRAPA_PELOTA']."',
                        '".$aiepiGeneral[$i]['MESES_60_PARA_SALTA']."',
                        '".$aiepiGeneral[$i]['NUMERO_CONSULTAR_CRECIMEINTO']."',
                        '".$aiepiGeneral[$i]['RECIBE_MICRONUTRIENTES']."',
                        '".$aiepiGeneral[$i]['DES_MICRONUTRIENTES']."',
                        '".$aiepiGeneral[$i]['RECIBIO_DESPARACITACION']."',
                        '".$aiepiGeneral[$i]['FECHA_DESPARACITACION']."',
                        '".$aiepiGeneral[$i]['FECHA_ULTIMA_ENTREGA']."',
                        '".$aiepiGeneral[$i]['LE_SONRIE']."',
                        '".$aiepiGeneral[$i]['LO_ACOMPANA']."',
                        '".$aiepiGeneral[$i]['ALZA_ARRULLAN']."',
                        '".$aiepiGeneral[$i]['JUEGA']."',
                        '".$aiepiGeneral[$i]['SE_PREOCUPA_HIGIENE']."',
                        '".$aiepiGeneral[$i]['CASTIGAN_CONRREA_PALMADAS']."',
                        '".$aiepiGeneral[$i]['SE_PREOCUPA_SALUD']."',
                        '".$aiepiGeneral[$i]['TIENE_ACCIDENTES_FRECUENTES']."',
                        '".$aiepiGeneral[$i]['ESTA_SOLO_TOAMDO_TETERO']."',
                        '".$aiepiGeneral[$i]['OBJETOS_PEQUENOS_ALCANCE']."',
                        '".$aiepiGeneral[$i]['EN_COCINA']."',
                        '".$aiepiGeneral[$i]['ALCANCE_CUCHILLOS_SERRUCHOS']."',
                        '".$aiepiGeneral[$i]['ALCANCE_MEDICAMENTOS']."',
                        '".$aiepiGeneral[$i]['ESCALERAS_TERRAZAS_SIN_PROTECCION']."',
                        '".$aiepiGeneral[$i]['EXISTEN_OTROS_RIESGOS_HOGAR']."',
                        '".$aiepiGeneral[$i]['AGUA_ALMACENADA_SINTAPA']."',
                        '".$aiepiGeneral[$i]['ENCHUFES_CABLES_DECUBIERTOS']."',
                        '".$aiepiGeneral[$i]['VELAS_FOSFOROS']."',
                        '".$aiepiGeneral[$i]['MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR']."',
                        '".$aiepiGeneral[$i]['FECHA_REGISTRO_GENERAL_AIEPI']."'
                        );";
                        $this->_dbserver->query($subirAiepi);  
     } 

         $aiepi=$this->getConsultarTablaLocal("aiepi");
   for ($i=0; $i < count($aiepi); $i++) { 
                        $subirAiepiResp="INSERT INTO aiepi VALUES (
                        '".$aiepi[$i]['idAIEPI']."',
                        '".$aiepi[$i]['PREGUNTA_RESPUESTA_SC_ID_PREGUNTA_RESPUESTA_SC']."',
                        '".$aiepi[$i]['GENERAL_AIEPI_idGENERAL_AIEPI']."',
                        '".$aiepi[$i]['PREGUNTAS_ID_PREGUNTA']."',
                        '".$aiepi[$i]['FECHA_REGISTRO_AIEPI']."');";
                        $this->_dbserver->query($subirAiepiResp);  
     } 
   
          $kardes=$this->getConsultarTablaLocal("kardes");
   for ($i=0; $i < count($kardes); $i++) { 
                        $subirKardes="INSERT INTO kardes VALUES (
                        '".$kardes[$i]['ID_KARDES']."',
                        '".$kardes[$i]['CONDICION']."',
                        '".$kardes[$i]['NUM_FICHA']."',
                        '".$kardes[$i]['CONDICION_ESPECIAL']."',
                        '".$kardes[$i]['OTRO_CONDICION_ESPECIAL']."',
                        '".$kardes[$i]['NUM_GESTACIONES']."',
                        '".$kardes[$i]['NUM_PARTOS']."',
                        '".$kardes[$i]['NUM_CESAREAS']."',
                        '".$kardes[$i]['NUM_ABORTOS']."',
                        '".$kardes[$i]['NUM_HIJOS_VIVOS']."',
                        '".$kardes[$i]['NUM_HIJOS_MUERTOS']."',
                        '".$kardes[$i]['FECHA_ULTIMO_PARTO']."',
                        '".$kardes[$i]['FECHA_ULTIMA_MENS']."',
                        '".$kardes[$i]['FECHA_PROB_PARTO']."',
                        '".$kardes[$i]['FECHA_PARTO']."',
                        '".$kardes[$i]['ATENCION_PARTO']."',
                        '".$kardes[$i]['LUGAR_ATENCION']."',
                        '".$kardes[$i]['NOM_IPS_ATENDIDO']."',
                        '".$kardes[$i]['RECIEN_NACIDO']."',
                        '".$kardes[$i]['DESC_MUERTE_RN']."',
                        '".$kardes[$i]['CORDON_UMBILICAL']."',
                        '".$kardes[$i]['NUM_VISITA']."',
                        '".$kardes[$i]['FECHA_VISITA']."',
                        '".$kardes[$i]['SEMANA_GESTACIONAL']."',
                        '".$kardes[$i]['NUM_CONTROLES_PRENATALES']."',
                        '".$kardes[$i]['FECHA_ASISTE_CONTROL']."',
                        '".$kardes[$i]['SEMANA_GEST_FECHA_CONTROL']."',
                        '".$kardes[$i]['CARNET_MATERNO']."',
                        '".$kardes[$i]['SEMANA_GESTACIONAL_INI_CONTROL_PRENATAL']."',
                        '".$kardes[$i]['FECHA_INGRESO_CONTROL_PRENATAL']."',
                        '".$kardes[$i]['OTRA_PATOLOGIA_GESTACT']."',
                        '".$kardes[$i]['ASISTE_CURSO_MATERNIDAD']."',
                        '".$kardes[$i]['HOSPT_CAUSA_MORBILIDAD']."',
                        '".$kardes[$i]['APOYO_EN_TRANSPORTE']."',
                        '".$kardes[$i]['VACUNACION_PUERPERA']."',
                        '".$kardes[$i]['FECHA_CONTROL_RECIEN_NAC']."',
                        '".$kardes[$i]['PESO_RECIEN_NAC']."',
                        '".$kardes[$i]['TALLA_RECIEN_NAC']."',
                        '".$kardes[$i]['LACTANCIA_MATERNA']."',
                        '".$kardes[$i]['CONTROL_POST_PARTO']."',
                        '".$kardes[$i]['CONTROL_PLANIFICACION_FAM']."',
                        '".$kardes[$i]['OBSERVACIONES']."',
                        '".$kardes[$i]['OTRA_EDUCACION_BRINDADA']."',
                        '".$kardes[$i]['CANALIZACION_SERVICIOS_1']."',
                        '".$kardes[$i]['CANALIZACION_SERVICIOS_2']."',
                        '".$kardes[$i]['CANALIZACION_SERVICIOS_3']."',
                        '".$kardes[$i]['CANALIZACION_SERVICIOS_4']."',
                        '".$kardes[$i]['CANALIZACION_SERVICIOS_5']."',
                        '".$kardes[$i]['CANALIZACION_SERVICIOS_6']."',
                        '".$kardes[$i]['CANALIZACION_SERVICIOS_7']."',
                        '".$kardes[$i]['CANALIZACION_SERVICIOS_8']."',
                        '".$kardes[$i]['OTRA_CANALIZACION_SERVICIOS']."',
                        '".$kardes[$i]['miembros_hogar_ID_MIEMBROS_HOGAR']."',
                        '".$kardes[$i]['USUARIOS_ID_USUARIO']."',
                        '".$kardes[$i]['FECHA_REGISTRO']."'
                         );";
                        $this->_dbserver->query($subirKardes);  
     } 
       
      $respKArdes=$this->getConsultarTablaLocal("respuesta_kardes");
   for ($i=0; $i < count($respKArdes); $i++) { 
                        $subirRespKardes="INSERT INTO respuesta_kardes VALUES (
                        '".$respKArdes[$i]['ID_RESPUESTA_KARDES']."',
                        '".$respKArdes[$i]['ID_PREGUNTA_RESPUESTA_SC_RESPUESTA_KARDES']."',
                        '".$respKArdes[$i]['ID_PREGUNTAS_RESPUESTA_KARDES']."',
                        '".$respKArdes[$i]['ID_KARDES_RESPUESTA_KARDES']."',
                        '".$respKArdes[$i]['FECHA_REGISTRO']."');";
                        $this->_dbserver->query($subirRespKardes);  
     } 


  	return "Sincronizando";
  }












function sincronizarBajar(){
     /////////////////////FICHA HOGAR
$ficha_hogar= $this->getConsultarTablaLocal("ficha_hogar");
$fichaHogarServer = $this->getConsultarTablaServer("ficha_hogar");

  $tem=Array();
  for ($i=0; $i < count($fichaHogarServer); $i++) {   
                   $tem[$i]=$fichaHogarServer[$i]['ID_FIC_HOGAR'];
                  if (count($tem) != 0) {
                  	
               	$bajarFicha="INSERT INTO ficha_hogar VALUES  
       		         ( '". $tem[$i]."', '".$fichaHogarServer[$i]['ID_ZONA']."', '".$fichaHogarServer[$i]['NOMECLATURA']."', '".$fichaHogarServer[$i]['USUARIOS_ID_USUARIO']."', '".$fichaHogarServer[$i]['MUNICIPIOS_ID_MUNICIPIO']."', '".$fichaHogarServer[$i]['BARRIOS_ID_BARRIO']."', '".$fichaHogarServer[$i]['ID_HOGAR']."', '".$fichaHogarServer[$i]['FIRMA_JEFE']."', '".$fichaHogarServer[$i]['FECHA']."', '".$fichaHogarServer[$i]['DOC_MIEMBRO_FIRMA']."')";
                $this->_db->query($bajarFicha);
                  
                  	}
 }
///////MIEMBROS HOGAR

 ///Hacia Arriba miembros Hogar
$miembros_hogar= $this->getConsultarTablaLocal("miembros_hogar");
$miembrosHogarServer = $this->getConsultarTablaServer("miembros_hogar");

for ($i=0; $i <count($miembrosHogarServer); $i++) { 

             
         	if ($miembrosHogarServer[$i]['EPS_ID_EPS']!=null) {
         	$bajarMiembro="INSERT INTO miembros_hogar VALUES  
                ('". $miembrosHogarServer[$i]['ID_MIEMBROS_HOGAR']."',
                 '".$miembrosHogarServer[$i]['ID_MIEMBRO']."', 
                 '".$miembrosHogarServer[$i]['FICHA_HOGAR_ID_FIC_HOGAR']."',
                 '".$miembrosHogarServer[$i]['NOMBRE_MIEMBRO']."',
                 '".$miembrosHogarServer[$i]['APELLIDO_MIEMBRO']."',
                 '".$miembrosHogarServer[$i]['FECHA_NACIMIENTO']."', 
                 '".$miembrosHogarServer[$i]['IDENTIFICACION_MIEMBRO_HOGAR']."',
                 '".$miembrosHogarServer[$i]['EPS_ID_EPS']."',
                 '".$miembrosHogarServer[$i]['FECHA_REGISTRO']."', 
                 '".$miembrosHogarServer[$i]['EDAD']."', 
                 '".$miembrosHogarServer[$i]['SEXO']."',
                 '".$miembrosHogarServer[$i]['TIPO_DOCUMENTO']."')";
              $this->_db->query($bajarMiembro);
         	}else{
         		$bajarMiembro="INSERT INTO miembros_hogar VALUES  
                ('". $miembrosHogarServer[$i]['ID_MIEMBROS_HOGAR']."',
                 '".$miembrosHogarServer[$i]['ID_MIEMBRO']."', 
                 '".$miembrosHogarServer[$i]['FICHA_HOGAR_ID_FIC_HOGAR']."',
                 '".$miembrosHogarServer[$i]['NOMBRE_MIEMBRO']."',
                 '".$miembrosHogarServer[$i]['APELLIDO_MIEMBRO']."',
                 '".$miembrosHogarServer[$i]['FECHA_NACIMIENTO']."', 
                 '".$miembrosHogarServer[$i]['IDENTIFICACION_MIEMBRO_HOGAR']."',
                  NULL,
                 '".$miembrosHogarServer[$i]['FECHA_REGISTRO']."', 
                 '".$miembrosHogarServer[$i]['EDAD']."', 
                 '".$miembrosHogarServer[$i]['SEXO']."',
                 '".$miembrosHogarServer[$i]['TIPO_DOCUMENTO']."')";
              $this->_db->query($bajarMiembro);
         	}
          
        
  }

   $respuestaIndividual= $this->getConsultarTablaLocal("respuesta_individual");
   $respuestaIndividualServer = $this->getConsultarTablaServer("respuesta_individual");
   $tem=Array();

//Respuestas individuales hacia arriba


  for ($i=0; $i <count($respuestaIndividualServer); $i++) { 

        
         	if ($respuestaIndividualServer[$i]['PREGUNTA_RESPUESTA_SC_ID_PREGUNTA_RESPUESTA_SC']!=null) {
         	$bajarRespuestaIndividual="INSERT INTO respuesta_individual VALUES  
                ('". $respuestaIndividualServer[$i]['ID_RESPUESTA_INDIVIDUAL']."',
                 '".$respuestaIndividualServer[$i]['FICHA_HOGAR_ID_FIC_HOGAR']."', 
                 '".$respuestaIndividualServer[$i]['PREGUNTAS_ID_PREGUNTA']."',
                 '".$respuestaIndividualServer[$i]['PREGUNTA_RESPUESTA_SC_DES_RESPUESTA']."',
                 '".$respuestaIndividualServer[$i]['PREGUNTA_RESPUESTA_SC_ID_PREGUNTA_RESPUESTA_SC']."', 
                 '".$respuestaIndividualServer[$i]['OTRO']."',
                 '".$respuestaIndividualServer[$i]['MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR']."',
                 '".$respuestaIndividualServer[$i]['FECHA_REGISTRO']."')";
              $this->_db->query($bajarRespuestaIndividual);
         	}else{
         		$bajarRespuestaIndividual="INSERT INTO respuesta_individual VALUES  
                ('". $respuestaIndividualServer[$i]['ID_RESPUESTA_INDIVIDUAL']."',
                 '".$respuestaIndividualServer[$i]['FICHA_HOGAR_ID_FIC_HOGAR']."', 
                 '".$respuestaIndividualServer[$i]['PREGUNTAS_ID_PREGUNTA']."',
                 '".$respuestaIndividualServer[$i]['PREGUNTA_RESPUESTA_SC_DES_RESPUESTA']."',
                 NULL, 
                 '".$respuestaIndividualServer[$i]['OTRO']."',
                 '".$respuestaIndividualServer[$i]['MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR']."',
                 '".$respuestaIndividualServer[$i]['FECHA_REGISTRO']."')";
              $this->_db->query($bajarRespuestaIndividual);
         	}
          
       
  }



///Respuestas Grupales  
   $respuestaGrupal= $this->getConsultarTablaLocal("respuesta_hogar");
   $respuestaGrupalServer = $this->getConsultarTablaServer("respuesta_hogar");

//Sinconizar hacia Abajo Respuestas Grupales

for ($i=0; $i <count($respuestaGrupalServer); $i++) { 

         	if ($respuestaGrupalServer[$i]['PREGUNTA_RESPUESTA_SC_ID_PREGUNTA_RESPUESTA_SC']!=null) {
         	$bajarRespuestaGrupal="INSERT INTO respuesta_hogar VALUES  
                ('". $respuestaGrupalServer[$i]['ID_RESPUESTA_HOGAR']."',
                 '".$respuestaGrupalServer[$i]['ID_FICHA_HOGAR']."', 
                 '".$respuestaGrupalServer[$i]['FICHA_HOGAR_ID_FIC_HOGAR']."',
                 '".$respuestaGrupalServer[$i]['PREGUNTAS_ID_PREGUNTA']."',
                 '".$respuestaGrupalServer[$i]['PREGUNTA_RESPUESTA_SC_DES_RESPUESTA']."', 
                 '".$respuestaGrupalServer[$i]['PREGUNTA_RESPUESTA_SC_ID_PREGUNTA_RESPUESTA_SC']."',
                 '".$respuestaGrupalServer[$i]['OTRO']."',
                 '".$respuestaGrupalServer[$i]['FECHA_REGISTRO']."')";
              $this->_db->query($bajarRespuestaGrupal);
         	}else{
         		$bajarRespuestaGrupal="INSERT INTO respuesta_hogar VALUES  
                ('". $respuestaGrupalServer[$i]['ID_RESPUESTA_HOGAR']."',
                 '".$respuestaGrupalServer[$i]['ID_FICHA_HOGAR']."', 
                 '".$respuestaGrupalServer[$i]['FICHA_HOGAR_ID_FIC_HOGAR']."',
                 '".$respuestaGrupalServer[$i]['PREGUNTAS_ID_PREGUNTA']."',
                 '".$respuestaGrupalServer[$i]['PREGUNTA_RESPUESTA_SC_DES_RESPUESTA']."', 
                 NULL,
                 '".$respuestaGrupalServer[$i]['OTRO']."',
                 '".$respuestaGrupalServer[$i]['FECHA_REGISTRO']."')";
              $this->_db->query($bajarRespuestaGrupal);
         	}
          
        
  }






//Sincronizar Test de FindRisk
   $testFindrisk= $this->getConsultarTablaLocal("test_findrisk");
   $testFindriskServer = $this->getConsultarTablaServer("test_findrisk");
//Sincronizar Abajo Test de FindRisk

for ($i=0; $i <count($testFindriskServer); $i++) { 

            $bajarTestFindRisk="INSERT INTO test_findrisk VALUES  
                ('".$testFindriskServer[$i]['ID_TEST_FINDRISK']."',
                 '".$testFindriskServer[$i]['EDAD']."', 
                 '".$testFindriskServer[$i]['INDICE_MASA_CORPORAL']."',
                 '".$testFindriskServer[$i]['PERIMETRO_CINTURA']."',
                 '".$testFindriskServer[$i]['ACTIVIDAD_FISICA']."', 
                 '".$testFindriskServer[$i]['FRECUENCIA_CONSUMO_VEGETALES']."',
                 '".$testFindriskServer[$i]['HATOMADO_MEDICAMENTOS_HIPERTENSION']."',
                 '".$testFindriskServer[$i]['NIVEL_ALTO_GLUCOSA_SANGRE']."',
                 '".$testFindriskServer[$i]['DIABETES_FAMILIAR']."',
                 '".$testFindriskServer[$i]['RESULTADO_TEST']."',
                 '".$testFindriskServer[$i]['USUARIOS_ID_USUARIO']."',
                 '".$testFindriskServer[$i]['MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR']."',
                 '".$testFindriskServer[$i]['FECH_REGISTRO']."')";
             $this->_db->query($bajarTestFindRisk);
       
  }


//Sincronizar Test Cancer de Mama

   $cancerMama= $this->getConsultarTablaLocal("cancer_mama_general");
   $cancerMamaServer = $this->getConsultarTablaServer("cancer_mama_general");
//Sincronizar abajo Cancer de Mama
  for ($i=0; $i <count($cancerMamaServer); $i++) { 

         
            $subirTestCancerMama="INSERT INTO cancer_mama_general VALUES  
                ('".$cancerMamaServer[$i]['ID_CANCER_MAMA']."',
                 '".$cancerMamaServer[$i]['HA_TENIDO_CANCER_SENO_SU_MAMA']."', 
                 '".$cancerMamaServer[$i]['LE_HAN_PRACTICADO_BIOPSIA_SENO']."',
                 '".$cancerMamaServer[$i]['HA_TENIDO_CANCER_MAMA_SU_HERMANA(O)']."',
                 '".$cancerMamaServer[$i]['SI_TIENE_MAS_50_LE_HAN_PTACTICADO_MAMOGRAFIA']."', 
                 '".$cancerMamaServer[$i]['USUARIOS_ID_USUARIO']."',
                 '".$cancerMamaServer[$i]['MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR']."',
                 '".$cancerMamaServer[$i]['FECHA_REGISTRO']."',
                 '".$cancerMamaServer[$i]['EMAIL']."',
                 '".$cancerMamaServer[$i]['TELEFONO']."')";
             $this->_db->query($subirTestCancerMama);
     
  }






//Cancer de Mama Detalle
 $cancerMamaDetalle= $this->getConsultarTablaLocal("cancer_mama_detalle");
 $cancerMamaDetalleServer = $this->getConsultarTablaServer("cancer_mama_detalle");
//Sincronizar abajo Cancer de Mama
  for ($i=0; $i <count($cancerMamaDetalleServer); $i++) { 

         
            $subirTestCancerMamaDetalleServer="INSERT INTO cancer_mama_detalle VALUES  
                ('".$cancerMamaDetalleServer[$i]['ID_CANCER_MAMA_DETALLE']."',
                 '".$cancerMamaDetalleServer[$i]['CANCER_MAMA_GENERAL_ID_CANCER_MAMA']."',
                 '".$cancerMamaDetalleServer[$i]['PREGUNTAS_ID_PREGUNTA']."',
                 '".$cancerMamaDetalleServer[$i]['PREGUNTA_RESPUESTA_SC_ID_PREGUNTA_RESPUESTA_SC']."', 
                 '".$cancerMamaDetalleServer[$i]['FECHA_REGISTRO']."')";
             $this->_db->query($subirTestCancerMamaDetalleServer);
     
  }




//Sincronizar Demanda Inducidad
   $demandaInducida= $this->getConsultarTablaLocal("demanda_inducida");
   $demandaInducidaServer = $this->getConsultarTablaServer("demanda_inducida");
   $tem=Array();
//Sincronizar Hacia Arriba Demanda Inducida  

//Sincronizar Hacia Abajo Demanda Inducida
  $tem=Array();
for ($i=0; $i <count($demandaInducidaServer); $i++) { 

            $bajarDemandaInducida="INSERT INTO demanda_inducida VALUES  
                ('".$demandaInducidaServer[$i]['ID_DEMANDA_INDUCIDA']."',
                 '".$demandaInducidaServer[$i]['FECHA_REGISTRO']."', 
                 '".$demandaInducidaServer[$i]['VACUNACION']."',
                 '".$demandaInducidaServer[$i]['SALUD_ORAL']."',
                 '".$demandaInducidaServer[$i]['PLANIFICACION_FAMILIAR']."', 
                 '".$demandaInducidaServer[$i]['ATENCION_PARTO_RN']."',
                 '".$demandaInducidaServer[$i]['CONTROL_EMBARAZO']."',
                 '".$demandaInducidaServer[$i]['ATENCION_JOVEN10A29']."',
                 '".$demandaInducidaServer[$i]['ATENCION_ADULTO45A80']."',
                 '".$demandaInducidaServer[$i]['CRECIMIENTO_DESARROLLO']."',
                 '".$demandaInducidaServer[$i]['TOMA_CITOLOGIA']."',
                 '".$demandaInducidaServer[$i]['EXAMEN_SENO']."',
                 '".$demandaInducidaServer[$i]['ATENCION_PRECONCEPCIONAL']."',
                 '".$demandaInducidaServer[$i]['TAMIZAJE_VISUAL']."',
                 '".$demandaInducidaServer[$i]['FIRMA_PACIENTE']."',
                 '".$demandaInducidaServer[$i]['MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR']."',
                 '".$demandaInducidaServer[$i]['USUARIOS_ID_USUARIO']."')";
             $this->_db->query($bajarDemandaInducida);
    
  }



//Sincronizar Hoja Trabajo
   $hoja_trabajo= $this->getConsultarTablaLocal("hoja_trabajo");
   $hoja_trabajoServer = $this->getConsultarTablaServer("hoja_trabajo");



 for ($i=0; $i <count($hoja_trabajoServer); $i++) { 
         
            $bajarHojaTrabajo="INSERT INTO hoja_trabajo VALUES  
                ('".$hoja_trabajoServer[$i]['ID_TAREA']."',
                 '".$hoja_trabajoServer[$i]['ID_USUARIO']."', 
                 '".$hoja_trabajoServer[$i]['ID_MIEMBRO']."',
                 '".$hoja_trabajoServer[$i]['ID_FORMATO']."',
                 '".$hoja_trabajoServer[$i]['_CHECK']."',
                 '".$hoja_trabajoServer[$i]['FECH_REGISTRO']."')";
             $this->_db->query($bajarHojaTrabajo);
     
  }

   $usuarios= $this->getConsultarTablaLocal("usuarios");
   $usuariosServer = $this->getConsultarTablaServer("usuarios");


 for ($i=0; $i <count($usuariosServer); $i++) { 
         
           $Bajarusuarios="INSERT INTO usuarios VALUES  
                ('".$usuariosServer[$i]['ID_USUARIO']."',
                 '".$usuariosServer[$i]['NOMBRE_USUARIO']."', 
                 '".$usuariosServer[$i]['APELLIDO_USUARIO']."',
                 '".$usuariosServer[$i]['ROL']."',
                 '".$usuariosServer[$i]['FIRMA']."',
                 '".$usuariosServer[$i]['FOTO']."',
                 '".$usuariosServer[$i]['IDENTIFICACION']."',
                 '".$usuariosServer[$i]['PASS']."',
                 '".$usuariosServer[$i]['ESTADO']."')";
             $this->_db->query($Bajarusuarios);
     
  }





/////////////////////////////////////////////////////////////////////////

$aiepiGeneralBajada= $this->getConsultarTablaServer("general_aiepi");
   for ($i=0; $i < count($aiepiGeneralBajada); $i++) { 
                        $bajarAiepi="INSERT INTO general_aiepi VALUES (
                        '".$aiepiGeneralBajada[$i]['ID_GENERAL_AIEPI']."', 
                        '".$aiepiGeneralBajada[$i]['USUARIOS_ID_USUARIO']."', 
                        '".$aiepiGeneralBajada[$i]['TIPO_USUARIO_AIEPI']."', 
                        '".$aiepiGeneralBajada[$i]['TIPO_POBLACION_AIEPI']."',
                        '".$aiepiGeneralBajada[$i]['ACOMPAÑANTE_AIEPI']."', 
                        '".$aiepiGeneralBajada[$i]['PARENTESCO_ACOMPAÑANTE_AIEPI']."',
                        '".$aiepiGeneralBajada[$i]['DIRECCION_ACOMPAÑANTE']."',
                        '".$aiepiGeneralBajada[$i]['TELEFONO_ACOMPAÑANTE_AIEPI']."',
                        '".$aiepiGeneralBajada[$i]['EVALUACION_REALIZADA_AIEPI']."',
                        '".$aiepiGeneralBajada[$i]['PROBLEMA_SALUD_BUCAL']."',
                        '".$aiepiGeneralBajada[$i]['DOLOR_MOLESTIA_COMER']."',
                        '".$aiepiGeneralBajada[$i]['ALGUN_GOLPE_BOCA']."',
                        '".$aiepiGeneralBajada[$i]['NOCHE_DUERME_SINCEPILLA_BOCA']."',
                        '".$aiepiGeneralBajada[$i]['SANGRA_ENCIA_CEPILLA']."',
                        '".$aiepiGeneralBajada[$i]['HIGIENIZACION_HORAL']."',
                        '".$aiepiGeneralBajada[$i]['SUPERVISAN_CEPILLADO_DIENTES']."',
                        '".$aiepiGeneralBajada[$i]['NUMERO_VALORACIONES_ODONTO_365']."',
                        '".$aiepiGeneralBajada[$i]['NUMERO_VECESHIGIENE_ORAL']."',
                        '".$aiepiGeneralBajada[$i]['TIENE_TOS']."',
                        '".$aiepiGeneralBajada[$i]['DIFICUALTAD_RESPIRAR']."',
                        '".$aiepiGeneralBajada[$i]['NUMERO_RESPIRACIONES_MINUTO']."',
                        '".$aiepiGeneralBajada[$i]['NUMERO_DIAS_CONTOS']."',
                        '".$aiepiGeneralBajada[$i]['NUMERO_DIAS_DIFICULTAD_RESPIRATORIA']."',
                        '".$aiepiGeneralBajada[$i]['RESPIRACION_RAPIDA']."',
                        '".$aiepiGeneralBajada[$i]['TIRAJE_COSTAL']."',
                        '".$aiepiGeneralBajada[$i]['ESTRIDOR']."',
                        '".$aiepiGeneralBajada[$i]['SIBILANCIAS']."',
                        '".$aiepiGeneralBajada[$i]['CONTACTO_PERSONAS_TB']."',
                        '".$aiepiGeneralBajada[$i]['PERSOSTENTE_TOS_21_DIAS']."',
                        '".$aiepiGeneralBajada[$i]['ENCONTACTO_PERSONAS_SINTOMATICAS']."',
                        '".$aiepiGeneralBajada[$i]['PERDIDA_GNANCIA_PESO_3MESES']."',
                        '".$aiepiGeneralBajada[$i]['DIARREA']."',
                        '".$aiepiGeneralBajada[$i]['NUMERO_DIAS_DIARREA']."',
                        '".$aiepiGeneralBajada[$i]['SANGRE_HECES']."',
                        '".$aiepiGeneralBajada[$i]['FONTANELA_MOLLEJA_HUNDIDA']."',
                        '".$aiepiGeneralBajada[$i]['BOCA_SECA_SED']."',
                        '".$aiepiGeneralBajada[$i]['PLIEGUE_CUTANEO_2S_MAYOR']."',
                        '".$aiepiGeneralBajada[$i]['PLIEGUE_CUTANEO_2S_MENOR']."',
                        '".$aiepiGeneralBajada[$i]['INTRANQUILO_IRRITABLE']."',
                        '".$aiepiGeneralBajada[$i]['OJOS_HUNDIDOS']."',
                        '".$aiepiGeneralBajada[$i]['FIEBRE']."',
                        '".$aiepiGeneralBajada[$i]['NUMERO_DIAS_FIEBRE']."',
                        '".$aiepiGeneralBajada[$i]['VIVE_ZONDA_RIESGO_MALARIA']."',
                        '".$aiepiGeneralBajada[$i]['VIVE_ZONDA_RIESGO_DENGUE']."',
                        '".$aiepiGeneralBajada[$i]['ZONA_RU']."',
                        '".$aiepiGeneralBajada[$i]['RIGIDEZ_NUCA']."',
                        '".$aiepiGeneralBajada[$i]['MANIFESTACION_SANGRADO']."',
                        '".$aiepiGeneralBajada[$i]['PIEL_HUMEDA_FRIA']."',
                        '".$aiepiGeneralBajada[$i]['INQUIETO_IRRITABLE']."',
                        '".$aiepiGeneralBajada[$i]['FIEBRE_MAS_5DIAS']."',
                        '".$aiepiGeneralBajada[$i]['FIEBRE_MAYOR_39']."',
                        '".$aiepiGeneralBajada[$i]['FIEBRE_TOS']."',
                        '".$aiepiGeneralBajada[$i]['CORIZA']."',
                        '".$aiepiGeneralBajada[$i]['OJOS_ROJOS']."',
                        '".$aiepiGeneralBajada[$i]['ASPECTO_TOXICO']."',
                        '".$aiepiGeneralBajada[$i]['DOLOR_ABDOMINAL_CONTINUO']."',
                        '".$aiepiGeneralBajada[$i]['PULSO_RAPIDO_DEBIL']."',
                        '".$aiepiGeneralBajada[$i]['ERUPCION_CUTANIA']."',
                        '".$aiepiGeneralBajada[$i]['DOLOR_CABEZA_RECIENTE_AUMENTA']."',
                        '".$aiepiGeneralBajada[$i]['DOLOR_CABEZA_DESPIERTA']."',
                        '".$aiepiGeneralBajada[$i]['NUMERO_DIAS_DOLOR_CABEZA']."',
                        '".$aiepiGeneralBajada[$i]['FIEBRE_SUDORACION_14DIAS']."',
                        '".$aiepiGeneralBajada[$i]['DOLOR_CABEZA_OTRO_VOMITO']."',
                        '".$aiepiGeneralBajada[$i]['DOLOR_HUESOS']."',
                        '".$aiepiGeneralBajada[$i]['DOLOR_HUESOS_INTERRUMPE_ACTIVIDAD']."',
                        '".$aiepiGeneralBajada[$i]['DOLOR_HUESOS_AUMENTA']."',
                        '".$aiepiGeneralBajada[$i]['CAMBIOS_FATIGA_APETITO_PESO']."',
                        '".$aiepiGeneralBajada[$i]['OIDO_PROBLEMAS']."',
                        '".$aiepiGeneralBajada[$i]['NUMERO_EPISODIOS_PREVIOS']."',
                        '".$aiepiGeneralBajada[$i]['SUPURACION_OIDO']."',
                        '".$aiepiGeneralBajada[$i]['NUMERO_DIAS_SUPURACION_OIDO']."',
                        '".$aiepiGeneralBajada[$i]['TUMEFACCION_OREJA']."',
                        '".$aiepiGeneralBajada[$i]['DESNUTRICION_ANEMIA']."',
                        '".$aiepiGeneralBajada[$i]['RETRA_CRECIMIENTO']."',
                        '".$aiepiGeneralBajada[$i]['VALORACION_CARA']."',
                        '".$aiepiGeneralBajada[$i]['PERDIDA_TEJIDO_MUSCULAR']."',
                        '".$aiepiGeneralBajada[$i]['TEJIDO_ADIPOSO']."',
                        '".$aiepiGeneralBajada[$i]['APETITO']."',
                        '".$aiepiGeneralBajada[$i]['EDEMA']."',
                        '".$aiepiGeneralBajada[$i]['CABELLO']."',
                        '".$aiepiGeneralBajada[$i]['PERIMETRO_BRAQUIAL_MEDIDA']."',
                        '".$aiepiGeneralBajada[$i]['LACTA_TOMA_SENO_MESES']."',
                        '".$aiepiGeneralBajada[$i]['NUMERO_VECES_TOMA_SENO_DIA_MESES']."',
                        '".$aiepiGeneralBajada[$i]['NUMERO_VECES_TOMA_SENO_NOCHE_MESES']."',
                        '".$aiepiGeneralBajada[$i]['TOMA_SENO_ANOS']."',
                        '".$aiepiGeneralBajada[$i]['NUMERO_VECES_TOMA_SENO_DIA_ANOS']."',
                        '".$aiepiGeneralBajada[$i]['NUMERO_VECES_TOMA_SENO_NOCHE_ANOS']."',
                        '".$aiepiGeneralBajada[$i]['ALIMENTO_MAYOR_FRECUENCIA']."',
                        '".$aiepiGeneralBajada[$i]['PROGRAMA_RECUPERACION_NUTRICONAL']."',
                        '".$aiepiGeneralBajada[$i]['CUAL_PROGRAMA_NUTRICIONAL']."',
                        '".$aiepiGeneralBajada[$i]['USA_BIBERON']."',
                        '".$aiepiGeneralBajada[$i]['COME_SOLO']."',
                        '".$aiepiGeneralBajada[$i]['MESES_3_LEVANTA_CABEZA']."',
                        '".$aiepiGeneralBajada[$i]['MESES_6_SIENTA_APOYO']."',
                        '".$aiepiGeneralBajada[$i]['MESES_9_SIETA_SOLO']."',
                        '".$aiepiGeneralBajada[$i]['MESES_12_CAMINA_APOYO']."',
                        '".$aiepiGeneralBajada[$i]['MESES_16_CAMINA_SOLO']."',
                        '".$aiepiGeneralBajada[$i]['MESES_20_CORRE_RAPIDO']."',
                        '".$aiepiGeneralBajada[$i]['MESES_24_PATEA_PELOTA']."',
                        '".$aiepiGeneralBajada[$i]['MESES_30_EMPINA_AMBOSPIES']."',
                        '".$aiepiGeneralBajada[$i]['MESES_36_SUBE_BAJA_ESCALERAS_SOLO']."',
                        '".$aiepiGeneralBajada[$i]['MESES_48_LANZA_ATRAPA_PELOTA']."',
                        '".$aiepiGeneralBajada[$i]['MESES_60_PARA_SALTA']."',
                        '".$aiepiGeneralBajada[$i]['NUMERO_CONSULTAR_CRECIMEINTO']."',
                        '".$aiepiGeneralBajada[$i]['RECIBE_MICRONUTRIENTES']."',
                        '".$aiepiGeneralBajada[$i]['DES_MICRONUTRIENTES']."',
                        '".$aiepiGeneralBajada[$i]['RECIBIO_DESPARACITACION']."',
                        '".$aiepiGeneralBajada[$i]['FECHA_DESPARACITACION']."',
                        '".$aiepiGeneralBajada[$i]['FECHA_ULTIMA_ENTREGA']."',
                        '".$aiepiGeneralBajada[$i]['LE_SONRIE']."',
                        '".$aiepiGeneralBajada[$i]['LO_ACOMPANA']."',
                        '".$aiepiGeneralBajada[$i]['ALZA_ARRULLAN']."',
                        '".$aiepiGeneralBajada[$i]['JUEGA']."',
                        '".$aiepiGeneralBajada[$i]['SE_PREOCUPA_HIGIENE']."',
                        '".$aiepiGeneralBajada[$i]['CASTIGAN_CONRREA_PALMADAS']."',
                        '".$aiepiGeneralBajada[$i]['SE_PREOCUPA_SALUD']."',
                        '".$aiepiGeneralBajada[$i]['TIENE_ACCIDENTES_FRECUENTES']."',
                        '".$aiepiGeneralBajada[$i]['ESTA_SOLO_TOAMDO_TETERO']."',
                        '".$aiepiGeneralBajada[$i]['OBJETOS_PEQUENOS_ALCANCE']."',
                        '".$aiepiGeneralBajada[$i]['EN_COCINA']."',
                        '".$aiepiGeneralBajada[$i]['ALCANCE_CUCHILLOS_SERRUCHOS']."',
                        '".$aiepiGeneralBajada[$i]['ALCANCE_MEDICAMENTOS']."',
                        '".$aiepiGeneralBajada[$i]['ESCALERAS_TERRAZAS_SIN_PROTECCION']."',
                        '".$aiepiGeneralBajada[$i]['EXISTEN_OTROS_RIESGOS_HOGAR']."',
                        '".$aiepiGeneralBajada[$i]['AGUA_ALMACENADA_SINTAPA']."',
                        '".$aiepiGeneralBajada[$i]['ENCHUFES_CABLES_DECUBIERTOS']."',
                        '".$aiepiGeneralBajada[$i]['VELAS_FOSFOROS']."',
                        '".$aiepiGeneralBajada[$i]['MIEMBROS_HOGAR_ID_MIEMBROS_HOGAR']."',
                        '".$aiepiGeneralBajada[$i]['FECHA_REGISTRO_GENERAL_AIEPI']."'
                        );";
                        $this->_db->query($bajarAiepi);  
     } 

       $aiepiBajada=$this->getConsultarTablaServer("aiepi");
   for ($i=0; $i < count($aiepiBajada); $i++) { 
                        $bajarAiepiResp="INSERT INTO aiepi VALUES (
                        '".$aiepiBajada[$i]['idAIEPI']."',
                        '".$aiepiBajada[$i]['PREGUNTA_RESPUESTA_SC_ID_PREGUNTA_RESPUESTA_SC']."',
                        '".$aiepiBajada[$i]['GENERAL_AIEPI_idGENERAL_AIEPI']."',
                        '".$aiepiBajada[$i]['PREGUNTAS_ID_PREGUNTA']."',
                        '".$aiepiBajada[$i]['FECHA_REGISTRO_AIEPI']."');";
                        $this->_db->query($bajarAiepiResp);  
     } 
        $kardesBajada=$this->getConsultarTablaServer("kardes");
   for ($i=0; $i < count($kardesBajada); $i++) { 
                        $bajarKardes="INSERT INTO kardes VALUES (
                        '".$kardesBajada[$i]['ID_KARDES']."',
                        '".$kardesBajada[$i]['CONDICION']."',
                        '".$kardesBajada[$i]['NUM_FICHA']."',
                        '".$kardesBajada[$i]['CONDICION_ESPECIAL']."',
                        '".$kardesBajada[$i]['OTRO_CONDICION_ESPECIAL']."',
                        '".$kardesBajada[$i]['NUM_GESTACIONES']."',
                        '".$kardesBajada[$i]['NUM_PARTOS']."',
                        '".$kardesBajada[$i]['NUM_CESAREAS']."',
                        '".$kardesBajada[$i]['NUM_ABORTOS']."',
                        '".$kardesBajada[$i]['NUM_HIJOS_VIVOS']."',
                        '".$kardesBajada[$i]['NUM_HIJOS_MUERTOS']."',
                        '".$kardesBajada[$i]['FECHA_ULTIMO_PARTO']."',
                        '".$kardesBajada[$i]['FECHA_ULTIMA_MENS']."',
                        '".$kardesBajada[$i]['FECHA_PROB_PARTO']."',
                        '".$kardesBajada[$i]['FECHA_PARTO']."',
                        '".$kardesBajada[$i]['ATENCION_PARTO']."',
                        '".$kardesBajada[$i]['LUGAR_ATENCION']."',
                        '".$kardesBajada[$i]['NOM_IPS_ATENDIDO']."',
                        '".$kardesBajada[$i]['RECIEN_NACIDO']."',
                        '".$kardesBajada[$i]['DESC_MUERTE_RN']."',
                        '".$kardesBajada[$i]['CORDON_UMBILICAL']."',
                        '".$kardesBajada[$i]['NUM_VISITA']."',
                        '".$kardesBajada[$i]['FECHA_VISITA']."',
                        '".$kardesBajada[$i]['SEMANA_GESTACIONAL']."',
                        '".$kardesBajada[$i]['NUM_CONTROLES_PRENATALES']."',
                        '".$kardesBajada[$i]['FECHA_ASISTE_CONTROL']."',
                        '".$kardesBajada[$i]['SEMANA_GEST_FECHA_CONTROL']."',
                        '".$kardesBajada[$i]['CARNET_MATERNO']."',
                        '".$kardesBajada[$i]['SEMANA_GESTACIONAL_INI_CONTROL_PRENATAL']."',
                        '".$kardesBajada[$i]['FECHA_INGRESO_CONTROL_PRENATAL']."',
                        '".$kardesBajada[$i]['OTRA_PATOLOGIA_GESTACT']."',
                        '".$kardesBajada[$i]['ASISTE_CURSO_MATERNIDAD']."',
                        '".$kardesBajada[$i]['HOSPT_CAUSA_MORBILIDAD']."',
                        '".$kardesBajada[$i]['APOYO_EN_TRANSPORTE']."',
                        '".$kardesBajada[$i]['VACUNACION_PUERPERA']."',
                        '".$kardesBajada[$i]['FECHA_CONTROL_RECIEN_NAC']."',
                        '".$kardesBajada[$i]['PESO_RECIEN_NAC']."',
                        '".$kardesBajada[$i]['TALLA_RECIEN_NAC']."',
                        '".$kardesBajada[$i]['LACTANCIA_MATERNA']."',
                        '".$kardesBajada[$i]['CONTROL_POST_PARTO']."',
                        '".$kardesBajada[$i]['CONTROL_PLANIFICACION_FAM']."',
                        '".$kardesBajada[$i]['OBSERVACIONES']."',
                        '".$kardesBajada[$i]['OTRA_EDUCACION_BRINDADA']."',
                        '".$kardesBajada[$i]['CANALIZACION_SERVICIOS_1']."',
                        '".$kardesBajada[$i]['CANALIZACION_SERVICIOS_2']."',
                        '".$kardesBajada[$i]['CANALIZACION_SERVICIOS_3']."',
                        '".$kardesBajada[$i]['CANALIZACION_SERVICIOS_4']."',
                        '".$kardesBajada[$i]['CANALIZACION_SERVICIOS_5']."',
                        '".$kardesBajada[$i]['CANALIZACION_SERVICIOS_6']."',
                        '".$kardesBajada[$i]['CANALIZACION_SERVICIOS_7']."',
                        '".$kardesBajada[$i]['CANALIZACION_SERVICIOS_8']."',
                        '".$kardesBajada[$i]['OTRA_CANALIZACION_SERVICIOS']."',
                        '".$kardesBajada[$i]['miembros_hogar_ID_MIEMBROS_HOGAR']."',
                        '".$kardesBajada[$i]['USUARIOS_ID_USUARIO']."',
                        '".$kardesBajada[$i]['FECHA_REGISTRO']."'
                         );";
                        $this->_db->query($bajarKardes);  
     } 

 $respKArdesBajada=$this->getConsultarTablaServer("respuesta_kardes");
   for ($i=0; $i < count($respKArdesBajada); $i++) { 
                        $bajarRespKardes="INSERT INTO respuesta_kardes VALUES (
                        '".$respKArdesBajada[$i]['ID_RESPUESTA_KARDES']."',
                        '".$respKArdesBajada[$i]['ID_PREGUNTA_RESPUESTA_SC_RESPUESTA_KARDES']."',
                        '".$respKArdesBajada[$i]['ID_PREGUNTAS_RESPUESTA_KARDES']."',
                        '".$respKArdesBajada[$i]['ID_KARDES_RESPUESTA_KARDES']."',
                        '".$respKArdesBajada[$i]['FECHA_REGISTRO']."');";
                        $this->_db->query($bajarRespKardes);  
     } 



	return "Sincronizando";
}

}


