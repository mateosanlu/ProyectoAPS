
	$(document).ready(menu);
	
	function menu(){

	$('label').addClass('grey-text text-darken-4');
	$('select').not('.disabled').material_select();
	$('.parto').hide();
	$("input[name=recienNacido]").click(parto);
	
$('.patologiasActules').hide();
$('#patologiasActules6').click(function(){ otroCheck(   $(this).is(':checked') ,'.patologiasActules');});
$('.canalizacionServicios1').hide();
$('.canalizacionServicios2').hide();
$('.canalizacionServicios3').hide();
$('.canalizacionServicios4').hide();
$('.canalizacionServicios5').hide();
$('.canalizacionServicios6').hide();
$('.canalizacionServicios7').hide();
$('.canalizacionServicios8').hide();
$('#canalizacionServicios1').click(function(){ otroCheck(   $(this).is(':checked') ,'.canalizacionServicios1');});
$('#canalizacionServicios2').click(function(){ otroCheck(   $(this).is(':checked') ,'.canalizacionServicios2');});
$('#canalizacionServicios3').click(function(){ otroCheck(   $(this).is(':checked') ,'.canalizacionServicios3');});
$('#canalizacionServicios4').click(function(){ otroCheck(   $(this).is(':checked') ,'.canalizacionServicios4');});
$('#canalizacionServicios5').click(function(){ otroCheck(   $(this).is(':checked') ,'.canalizacionServicios5');});
$('#canalizacionServicios6').click(function(){ otroCheck(   $(this).is(':checked') ,'.canalizacionServicios6');});
$('#canalizacionServicios7').click(function(){ otroCheck(   $(this).is(':checked') ,'.canalizacionServicios7');});
$('#canalizacionServicios8').click(function(){ otroCheck(   $(this).is(':checked') ,'.canalizacionServicios8');});
$('.educacionBrindada').hide();
$('#educacionBrindada8').click(function(){ otroCheck(   $(this).is(':checked') ,'.educacionBrindada');});
$('.canalizacionServicios').hide();
$('#canalizacionServicios8').click(function(){ otroCheck(   $(this).is(':checked') ,'.canalizacionServicios');});
	
	$('.cualTipoMorbilidad').hide();
	
	$("select[name=tipoMorbilidadActual]").change(function(){cualOpccion('6','.cualTipoMorbilidad',$(this).val());});
$('.apoyoPsicosocial').hide();
	$("select[name=apoyoPsicosocial]").change(function(){cualOpccion('4','.apoyoPsicosocial',$(this).val());});
$('.metodoPlanificacionRecomendado').hide();
	$("select[name=metodoPlanificacionRecomendado]").change(function(){cualOpccion('6','.metodoPlanificacionRecomendado',$(this).val());});
$('.condicionEspecial').hide();
	$("select[name=condicionEspecial]").change(function(){cualOpccion('5','.condicionEspecial',$(this).val());});
$('.atendidoEn').hide();
	$("select[name=atendidoEn]").change(function(){cualOpccion('2','.atendidoEn',$(this).val());});
$('.morbilidad').hide();
$('#morbilidad').click(tiposMorbilidad);
	}
	function parto(){
		if ($(this).attr('id') == 't2') {
			$('.parto').show();
		}else
		{
			$('.parto').hide();
		}
	}
	function cualOpccion(comparador,clase,valor_select){
	if (valor_select == comparador) {
$(clase).show();
}else{
$(clase).hide();
$(clase+' > input').val("");
}
	}
	function tiposMorbilidad(){
		if( $('#morbilidad').prop('checked') ) {
		$('.morbilidad').show();
		}else{
$('.morbilidad').hide();
		}
		
	}
	function otroCheck(check,clase){
		if (check) {
$(clase).show();
		}else{
			$(clase).hide();
$(clase+' > input').val("");
		}
	}
	
	
	$('#action').on('click',function (){
		var formulario=document.formKardes, elementos=formulario.elements;
	
		for (var i = 0; i <= elementos.length; i++) {
			if (elementos[i].type == "text") {
				if (elementos[i].value.length == 0) {
				alert('El Campo '+elementos[i].id+' debe ser llenado')
			} else {
				
			}
			}
		}
	});
	$(document).ready(function() {

		$('.datepicker').pickadate({
		monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
				monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
				weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
				weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
				today: 'Hoy',
				clear: 'Limpiar',
				close: 'Escoger',
				format: 'dd/m/yyyy',
				formatSubmit: 'yyyy-mm-dd',
				hiddenName: true,
			selectMonths: true, // Creates a dropdown to control month
			selectYears: 100 // Creates a dropdown of 15 years to control year
		});
	});