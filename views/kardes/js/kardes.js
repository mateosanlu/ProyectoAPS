
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

	$(document).ready(function(){
				
				$('#contenido').on('submit','#formKardes',function(event){
					var error = 0;
					$('.requerido').each(function(i, elem){
						if($(elem).val() == ''){
							$(elem).css({
								'border':'1px solid #f44336'});
							error++;
							}
						});
					if(error > 0){
						event.preventDefault();
						$('#aviso').html('Debe rellenar los campos requeridos marcados en rojo <br />');
						}
					});
			});

	$('.tooltipped').tooltip({delay: 50});

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
	$('#numGestaciones').blur(function(){
		if (($('#t3').prop("checked")) && ($(this).val()==1)) {
			
			$('#divNumPartos').hide();
			$('#divNumCesarias').hide();
			$('#divNumAbortos').hide();
			$('#divNumHijos').hide();
			$('#divNumMuertos').hide();
			$('#divNumPartosTh').hide();
			$('#divNumCesariasTh').hide();
			$('#divNumAbortosTh').hide();
			$('#divNumHijosTh').hide();
			$('#divNumMuertosTh').hide();
			$('#divFUP').hide();
		}else{
			$('#divNumPartos').show();
			$('#divNumCesarias').show();
			$('#divNumAbortos').show();
			$('#divNumHijos').show();
			$('#divNumMuertos').show();
			$('#divNumPartosTh').show();
			$('#divNumCesariasTh').show();
			$('#divNumAbortosTh').show();
			$('#divNumHijosTh').show();
			$('#divNumMuertosTh').show();
			$('#divFUP').show();
		}
	});
	function calcularNum(){

		var numGest= $('#numGestaciones').val();
		var ele1= $('input[name=numPartos]').val();
		var ele2= $('input[name=numCesareas]').val();
		var ele3= $('input[name=numAbortos]').val();
		var ele4= $('input[name=numHijos]').val();
		var ele5= $('input[name=numHijosMuertos]').val();
		var sum=parseInt(ele1)+parseInt(ele2)+parseInt(ele3)+parseInt(ele4)+parseInt(ele5);
		if (sum>numGest) {
			Materialize.toast('Error la suma de partos,cesarias,abortos,hijos vivos y hijos muertos es mayor que el numero de gestaciones', 7000);
			$('input[name=numPartos]').val("0");
			$('input[name=numCesareas]').val("0");
			$('input[name=numAbortos]').val("0");
			$('input[name=numHijos]').val("0");
			$('input[name=numHijosMuertos]').val("0");
		}
	}
	function bloquearGestante(){
		
		if ($('#t3').prop("checked")) {
			
			$('#divFUM').hide();
			$('#divFP').hide();
			$('#divTerminacionGest').hide();
			$('#ClasfRiesgoPuerperia').hide();
			$('#seccionPuerperia1').hide();
			$('#seccionPuerperia2').hide();
			$('#seccionPuerperia3').hide();
		}else{
			$('#divFUM').show();
			$('#divFP').show();
			$('#divTerminacionGest').show();
			$('#ClasfRiesgoPuerperia').show();
			$('#seccionPuerperia1').show();
			$('#seccionPuerperia2').show();
			$('#seccionPuerperia3').show();
		}
		if ($('#t4').prop("checked")) {
			$('#divFPP').hide();
			$('#divSemaGestActTxt').hide();
			$('#divNumCtrlPreTxt').hide();
			$('#divFechaAsistCtrlPreTxt').hide();
			$('#divSemGestALaFecCtrlTxt').hide();
			$('#divSemaGestAct').hide();
			$('#divNumCtrlPre').hide();
			$('#divFechaAsistCtrlPre').hide();
			$('#divSemGestALaFecCtrl').hide();
			$('#contClasfRiesgoGestanteHeader').hide();
			$('#contClasfRiesgoGestanteBody').hide();
			$('#contSignosAlarmaGestanteHeader').hide();
			$('#contSignosAlarmaGestanteBody').hide();
			$('#divVacunacionTTID').hide();
			
		}else{
			$('#divFPP').show();
			$('#divSemaGestActTxt').show();
			$('#divNumCtrlPreTxt').show();
			$('#divFechaAsistCtrlPreTxt').show();
			$('#divSemGestALaFecCtrlTxt').show();
			$('#divSemaGestAct').show();
			$('#divNumCtrlPre').show();
			$('#divFechaAsistCtrlPre').show();
			$('#divSemGestALaFecCtrl').show();
			$('#contClasfRiesgoGestanteHeader').show();
			$('#contClasfRiesgoGestanteBody').show();
			$('#contSignosAlarmaGestanteHeader').show();
			$('#contSignosAlarmaGestanteBody').show();
			$('#divVacunacionTTID').show();
		}				
	}
	$('input[name=fechaUltParto]').blur(function(){
		
	});
	$('#semGestInicioCtrlPrenatal').focus(function(){
		if ($('#carnet-materno').prop("checked")) {

		}else{
			Materialize.toast('ATENCION: La mujer no tiene carnet materno.', 7000);
		}
	});
	$('#carnet-materno').click(function(){
		if ($(this).prop('checked')) {

		}else{
			Materialize.toast('ATENCION: La mujer no tiene carnet materno.', 7000);
		}
	});
	$('#contAntecedentesRiesgo').hide();
	function mostrarAntecentesRiesgo(){
		if ($('#clasfRiesgoAlto').prop("checked")) {
			$('#contAntecedentesRiesgo').show();
		}
		if ($('#clasfRiesgoBajo').prop("checked")) {
			$('#contAntecedentesRiesgo').hide();
		}
	}
	
	$('#clasfRiesgoBajo').click(mostrarAntecentesRiesgo);
	$('#clasfRiesgoAlto').click(mostrarAntecentesRiesgo);
	$('#clasfRiesgoAlto').click(function(){
		var ele=$("#contAntecedentesRiesgo input[type='checkbox']");
		for (var i = 0; i < ele.length; i++) {
			ele.eq(i).click(function(){
				Materialize.toast('ATENCION: Debe ubicar a la mujer en un programa de seguimiento URGENTEMENTE.', 7000);
			});
		}
	});
	$('#divSemaGestAct').blur(function(){
		if ($(this).val()>0 && $(this).val()<=20) {
			$('#divAntesSem20').show();
			$('#divDespuesSem20').hide();
			var elemen=$("#divAntesSem20 input[type='checkbox']");
			for (var i = 0; i < elemen.length; i++) {
				elemen.eq(i).click(function(){
					Materialize.toast('ATENCION: Debe ubicar a la mujer en un programa de seguimiento URGENTEMENTE.', 7000);
				});
			}
		}else{
			$('#divAntesSem20').hide();
			$('#divDespuesSem20').show();
			var elemen=$("#divDespuesSem20 input[type='checkbox']");
			for (var i = 0; i < elemen.length; i++) {
				elemen.eq(i).click(function(){
					Materialize.toast('ATENCION: Debe ubicar a la mujer en un programa de seguimiento URGENTEMENTE.', 7000);
				});
			}
		}
	});

	$('#patologiasActules1').click(function(){
		Materialize.toast('ATENCION: Debe llenar el formulario de binomio', 7000);
	});
	$('#patologiasActules2').click(function(){
		Materialize.toast('ATENCION: Debe llenar el formulario de binomio', 7000);
	});
	for (var i = 3; i <=6; i++) {
		$('#patologiasActules'+i).click(function(){
			Materialize.toast('ATENCION: Diriga URGENTEMENTE a la gestante a un centro de salud y asegure su consulta', 7000);
		});
	}
	$('#apoyoPsicosocial').change(function(){
		if ($('#apoyoPsicosocial option:selected').val()=="")
		{
			Materialize.toast('ATENCION: La mujer necesita de seguimiento con el psicologo', 7000);
		}
	});
	$('#divClasfRiesgoPuerpera2').hide();
	$('#clasfRiesgoPuerpera1').change(function(){
		if ($('#clasfRiesgoPuerpera1 option:selected').val()==509) {
			$('#divClasfRiesgoPuerpera2').show();
		}else{
			$('#divClasfRiesgoPuerpera2').hide();
		}
	});
	$('#clasfRiesgoPuerpera2').change(function(){
		if ($('#clasfRiesgoPuerpera2 option:selected').val()==512) {
			Materialize.toast('ATENCION: La mujer necesita de seguimiento con el psicologo', 7000);
		}
		if (($('#clasfRiesgoPuerpera2 option:selected').val()==511) || ($('#clasfRiesgoPuerpera2 option:selected').val()==513)) {
			Materialize.toast('ATENCION: La mujer necesita visita del medico o enfermero', 7000);
		}
	});
	$('#t3').click(bloquearGestante);
	$('#t4').click(bloquearGestante);
	$('input[name=numPartos]').blur(calcularNum);
	$('input[name=numCesareas]').blur(calcularNum);
	$('input[name=numAbortos]').blur(calcularNum);
	$('input[name=numHijos]').blur(calcularNum);
	$('input[name=numHijosMuertos]').blur(calcularNum);
});