	$(document).ready(function() {
		$('select').material_select();

		$('.datepicker').pickadate({
			monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
			weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
			weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
			today: 'Hoy',
			clear: 'Limpiar',
			close: 'Aceptar',
			format: 'dd/m/yyyy',
			formatSubmit: 'yyyy-mm-dd',
			hiddenName: true,
			selectMonths: true, // Creates a dropdown to control month
			selectYears: 100 // Creates a dropdown of 15 years to control year
		});
		
		$('#divOpDoc').hide();
		$('#divOpNombre').hide();
		$('#divOpApellido').hide();
		$('#divOpRangoFechas').hide();
		$('#divOpNumFicha').hide();
		$('#opDoc').click( function(){ 
			if ($(this).prop('checked')) {
				$('#divOpDoc').show();
				$('#divOpNombre').hide();
				$('#divOpApellido').hide();
				$('#divOpRangoFechas').hide();
				$('#divOpNumFicha').hide();
			}
		});
		$('#opNombre').click( function(){ 
			if ($(this).prop('checked')) {
				$('#divOpNombre').show();
				$('#divOpDoc').hide();
				$('#divOpApellido').hide();
				$('#divOpRangoFechas').hide();
				$('#divOpNumFicha').hide();
			}
		});
		$('#opApellido').click( function(){ 
			if ($(this).prop('checked')) {
				$('#divOpApellido').show();
				$('#divOpNombre').hide();
				$('#divOpDoc').hide();
				$('#divOpRangoFechas').hide();
				$('#divOpNumFicha').hide();
			}
		});
		$('#opRangoFechas').click( function(){ 
			if ($(this).prop('checked')) {
				$('#divOpRangoFechas').show();
				$('#divOpNombre').hide();
				$('#divOpDoc').hide();
				$('#divOpNumFicha').hide();
				$('#divOpApellido').hide();
			}
		});
		$('#opNumFicha').click( function(){ 
			if ($(this).prop('checked')) {
				$('#divOpNumFicha').show();
				$('#divOpNombre').hide();
				$('#divOpDoc').hide();
				$('#divOpRangoFechas').hide();
				$('#divOpApellido').hide();
			}

		});
		$('#fichaHogarSearch0').click(function(){
			$('#opNumFicha').prop('checked',true);
			$('#divOpNumFicha').show();
			$('#numFichaBuscarFormato').val($('#fichaHogarSearch0').val());
			$('#consultForm').submit();
		});

	/*	 function  Eps(dato){
       	$.post('/proyectoaps/consultas/consutar',{
       		opConsulta: 1 ,
       		docBuscarFormato: 10726987
              },function(datos){  
                 datos = $.parseJSON(datos);
                 for (var i = datos.length - 1; i >= 0; i--) {
                  /* $('.eps option:last').after('<option value="'+datos[i]['ID_EPS']+'" >'+datos[i]['DES_EPS']+'</option>');
                   $('select').not('.disabled').material_select();
                      }     
             
               
      }); 

  }*/
  var parametros = {
  	"opConsulta" : '1' ,
  	"docBuscarFormato" : '10726987' ,
  };	
   /* $.ajax({
            type: "POST",
             url: "/ProyectoAPS/consultas/consutar",
            data: parametros,
            success: function(data) {

         alert("Datos Enviados con exito"+data);
            }
        });*/
$('#contador').val();
for (var y = 0; y < $('#contador').val(); y++) {
	

        $('#h'+y).click(function(){
        	$.post('/ProyectoAPS/consultas/consultarFormatos',{
        		docBuscarFormato:$(this).val()
        	},function(datos){
        		datos = $.parseJSON(datos);
                 //alert(datos[0]['IDENTIFICACION_MIEMBRO_HOGAR']);
                 //console.log(datos[0]['DES_FORMATO']);
                 $('#contFormatos').html('<br><h4 style = "color:#2196f3" align="center"> FORMATOS ASOCIADOS </h4><br>');
                 for (var i = 0; i < datos.length; i++) {
                 	$('#contFormatos').append('<center>'+
                 		'<a class="btn-large waves-effect waves-light blue" href="http://localhost/ProyectoAPS/reportesAiepi/pdf1/'+datos[i]['IDENTIFICACION_MIEMBRO_HOGAR']+'">'+datos[i]['DES_FORMATO']+'</a>'+
                 		'</center><br>');
                 }     
             }); 
        });
        }
    });


