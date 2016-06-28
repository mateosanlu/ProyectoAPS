$(document).ready(menu);


   function menu(){
   $( ".boton-modificado" ).prop( "disabled", true );
   $( ".boton-modificado" ).hide();
   $('#calcular').click(calcular);
   }



  function calcular(){

  /*	var myRadio = $('input[name=findrisk2]').attr('name');

	$("input:radio:checked").each(function(){
		//cada elemento seleccionado
		alert($(this).val());
	});
*/
  	var valorTest= 0;
  	    $('#respuestaRiesgo').val('');
  	    valorTest=eval($("input:radio[name=findrisk1]:checked").val())+
        eval($("input:radio[name=findrisk2]:checked").val())+
        eval($("input:radio[name=findrisk3]:checked").val())+
        eval($("input:radio[name=findrisk4]:checked").val())+
        eval($("input:radio[name=findrisk5]:checked").val())+
        eval($("input:radio[name=findrisk6]:checked").val())+
        eval($("input:radio[name=findrisk7]:checked").val())+
        eval($("input:radio[name=findrisk8]:checked").val());


        if (
        	 $("input:radio[name=findrisk1]:checked").val() == null ||
             $("input:radio[name=findrisk2]:checked").val() == null ||
             $("input:radio[name=findrisk3]:checked").val() == null ||
             $("input:radio[name=findrisk4]:checked").val() == null ||
             $("input:radio[name=findrisk5]:checked").val() == null ||
             $("input:radio[name=findrisk6]:checked").val() == null ||
             $("input:radio[name=findrisk7]:checked").val() == null ||
             $("input:radio[name=findrisk8]:checked").val() == null 
        	
        	){
        	
        	alert('Debe contestar toda la encuesta ');
        
        }else{

	       if (valorTest <= 7) {
	       	     $('#respuestaRiesgo').html('RIESGO BAJO: UNA DE CADA 100 PERSONAS PUEDE DESARROLLAR DM2');
	       }else if (valorTest > 7  && valorTest <= 11){
	             $('#respuestaRiesgo').html('RIESGO LIGERAMENTE ELEVADO: UNA DE CADA 25 PERSONAS PUEDE DESARROLLAR DM2');
	       }
	       else if (valorTest > 11 && valorTest <= 14){
	       	     $('#respuestaRiesgo').html('RIESGO MODERADO: UNA DE CADA 6 PERSONAS PUEDE DESARROLLAR DM2');
	       }
	       else if (valorTest > 14 && valorTest <= 20){
	       	     $('#respuestaRiesgo').html('RIESGO ALTO: UNA DE CADA 3 PERSONAS PUEDE DESARROLLAR DM2');
	       }
	       else if (valorTest  > 20){
	       	     $('#respuestaRiesgo').html('RIESGO MUY ALTO: UNA DE CADA 2  PERSONAS PUEDE DESARROLLAR DM2');
	       } 
	       $( ".boton-modificado" ).show();
	       $( ".boton-modificado" ).prop( "disabled", false );

        }

  }