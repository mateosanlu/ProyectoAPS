   $(document).ready(menu);


   function menu(){
   $( ".boton-modificado" ).prop( "disabled", true );
   $( ".boton-modificado" ).hide();
   $('#calcular').click(calcular);
   }



  function calcular(){


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

        var cont=0;

            for (var i = 1; i < 9; i++) {
                   if($("input:radio[name=findrisk"+i+"]:checked").val() == null){
                             $('.findrisk'+i).addClass('alerta label.alerta');
                             cont+=1;

                   }else{
                          $('.findrisk'+i).removeClass('alerta label.alerta');
                   }
            }

           console.log(cont);
           if (cont == 0 ){
       
            $('#findriskResultado').val(valorTest);
         if (valorTest <= 7) {
               $('#respuestaRiesgo').html('RIESGO BAJO: UNA DE CADA 100 PERSONAS PUEDE DESARROLLAR DM2. Puntaje: '+valorTest);
         }else if (valorTest > 7  && valorTest <= 11){
               $('#respuestaRiesgo').html('RIESGO LIGERAMENTE ELEVADO: UNA DE CADA 25 PERSONAS PUEDE DESARROLLAR DM2. Puntaje: '+valorTest);
         }
         else if (valorTest > 11 && valorTest <= 14){
               $('#respuestaRiesgo').html('RIESGO MODERADO: UNA DE CADA 6 PERSONAS PUEDE DESARROLLAR DM2. Puntaje: '+valorTest);
         }
         else if (valorTest > 14 && valorTest <= 20){
               $('#respuestaRiesgo').html('RIESGO ALTO: UNA DE CADA 3 PERSONAS PUEDE DESARROLLAR DM2. Puntaje: '+valorTest);
         }
         else if (valorTest  > 20){
               $('#respuestaRiesgo').html('RIESGO MUY ALTO: UNA DE CADA 2  PERSONAS PUEDE DESARROLLAR DM2. Puntaje: '+valorTest);
         } 
         $( ".boton-modificado" ).show();
         $( ".boton-modificado" ).prop( "disabled", false );

        }

   /* var myRadio = $('input[name=findrisk2]').attr('name');

  $("input:radio:checked").each(function(){
    //cada elemento seleccionado
    alert($(this).val());
  });
*/


 }