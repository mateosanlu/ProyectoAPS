$(document).ready(menu);


   function menu(){
   	$('#datosUrbano').hide();
	$('#datosRural').hide();
	$('#fila-nueva').hide();
	$('#tablaSocioeconomica tbody tr:eq(0)').hide();
    $('select').not('.disabled').material_select();
   	$("input[name=ubicacion]").click(zonasHogares);
    $("#agregarFamiliar").click(agregarFamiliar);
   	
   }

  function zonasHogares(){
        if ($(this).attr('id')=='urbana') {
	      $('#datosRural').hide();
          $('#datosUrbano').show();
	    }else{
	      $('#datosUrbano').hide();
          $('#datosRural').show();
	    }

  }


   function agregarFamiliar(){
      $("#tabledatosHogar tbody tr:eq(0) ").clone().show().appendTo("#tabledatosHogar tbody");
      $("#tablaSocioeconomica tbody tr:eq(0) ").clone().show().appendTo("#tablaSocioeconomica tbody");
      

     // tablaSocioeconomica
      //$('select').material_select();
      //$("#tabla tbody tr:eq(0)").clone().removeClass('fila-base').appendTo("#tabla tbody");
   }