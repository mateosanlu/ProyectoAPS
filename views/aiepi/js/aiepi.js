	$(document).ready(function() {
				var d = new Date();
				var añoAct = d.getFullYear();
				var mesAct =  d.getMonth() + 1;
				var diaAct =  d.getDate();
				$('#fechaEncuestaAiepi').val(añoAct+'-'+mesAct+'-'+diaAct);
			$('select').material_select();
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
			$('#primeraParte').click(function(){ Materialize.toast('RECUERDE: el niño(a) debe estar presente en el momento de la visita para poder evaluarlo', 6000)});
			$('#numDiasConTos').change(function(){
				if ($(this).val()>30) {
					Materialize.toast('ATENCION: El menor debe ser valorado por un medico ', 4000);
				}
			});
			$('#numDiasConDificultadParaRespirar').change(function(){
				if ($(this).val()>30) {
					Materialize.toast('ATENCION: El menor debe ser valorado por un medico ', 4000);
				}
			});
			$('#opTirajeSucostalSi').click(function(){
				Materialize.toast('ATENCION: El menor debe ser valorado por un medico ', 4000);
			});
			$('#opTieneEstridorSi').click(function(){
				Materialize.toast('ATENCION: El menor debe ser valorado por un medico ', 4000);
			});
		
			

				var aler=true;
			for (var i = 0; i <=5; i++) {
				$('#tipSelecSignoRiesgoOp'+i).click(function(){
					
					if ($(this).prop("checked")) {
						
						if (aler) {
							Materialize.toast('ATENCION: El menor se debe remitir URGENTEMENTE al servicio de salud y asegurar la consulta', 7000);
							aler=false;
						}
						$('#tipSelecSignoRiesgoOp6').prop("disabled",true);
						
					}else{
						for (var i = 1; i <= 5; i++) {
							$('#tipSelecSignoRiesgoOp'+i).prop("checked",false);
							aler=true;
						}
						$('#tipSelecSignoRiesgoOp6').prop("disabled",false)
					}
					
				});
			}
			$('#tipSelecSignoRiesgoOp6').click(function(){
				if ($(this).prop("checked")) {
					for (var i = 1; i <=5; i++) {
						$('#tipSelecSignoRiesgoOp'+i).prop("disabled",true);
					}
					
				}else{
					for (var i = 1; i <=5; i++) {
					$('#tipSelecSignoRiesgoOp'+i).prop("disabled", false);
				}
				}
				
			});
			
			$('#opNiñoConTosNo').click(function(){
				$('#tdNumDiasConTos').prop('hidden',true);
				$('#numDiasConTos').val("");
				$('#opTieneTosNo').prop('checked',true);
				$('#opTieneTosNo').prop('disabled',false);
				$('#opTieneTosSi').prop('disabled',true);

			});
			$('#opNiñoConTosSi').click(function(){
				$('#tdNumDiasConTos').prop('hidden',false);
				$('#opTieneTosSi').prop('checked',true);
				$('#opTieneTosSi').prop('disabled',false);
				$('#opTieneTosNo').prop('disabled',true);
			});


			$('#opDificultadParaRespirarSi').click(function(){
				$('#tdNumDiasConDificultadParaRespirar').prop('hidden',false);
			});
			$('#opDificultadParaRespirarNo').click(function(){
				$('#tdNumDiasConDificultadParaRespirar').prop('hidden',true);
				$('#numDiasConDificultadParaRespirar').val("");
			});

			$('#opContactoConPerTbSi').click(function(){
					Materialize.toast('ATENCION: Verifique al menor, redirigir URGENTEMENTE al servicio de salud y asegurar su consulta', 7000);
			});

			function alerDiarrea(){
				var numDiasDiarrea=$('#numDiasConDiarrea').val();
				if ($('#numDiasConDiarrea').val()>3) {
					Materialize.toast('ATENCION:El menor se debe remitir URGENTEMENTE al servicio de salud y asegurar su consulta', 7000);
				}
			}
			$('#opFontanelaOMollejaHundidaSi').click(alerDiarrea);
			$('#opIntranquiloOIrritableSi').click(alerDiarrea);
			$('#opSangreEnHecesSi').click(alerDiarrea);
			$('#opBocaSecaOMuchaSedSi').click(alerDiarrea);
			$('#opOjosUndidosSi').click(alerDiarrea);

			$('#opPliegueCutaneoMuyLentoSi').click( function(){
				$("input[name=opPliegueCutaneoLento]").prop('readonly',true);
				$('#opPliegueCutaneoLentoSi').prop('checked',false);
				$('#opPliegueCutaneoLentoNo').prop('checked',true);
			});
			$('#opPliegueCutaneoMuyLentoNo').click( function(){
				$("input[name=opPliegueCutaneoLento]").prop('readonly',false);
				$('#opPliegueCutaneoMuyLentoSi').prop('checked',false);
				$("input[name=opPliegueCutaneoMuyLento]").prop('readonly',true);
			});

				$('#opPliegueCutaneoLentoSi').click( function(){
				$("input[name=opPliegueCutaneoMuyLento]").prop('readonly',true);
				$('#opPliegueCutaneoMuyLentoSi').prop('checked',false);
				$('#opPliegueCutaneoMuyLentoNo').prop('checked',true);
			});
			$('#opPliegueCutaneoLentoNo').click( function(){
				$("input[name=opPliegueCutaneoMuyLento]").prop('readonly',false);
				$('#opPliegueCutaneoLentoSi').prop('checked',false);
				$("input[name=opPliegueCutaneoLento]").prop('readonly',true);
			});

			$('#opNiñoConFiebreNo').click(function(){
				$('#divNumDiasFiebre').prop('hidden',true);
				$('#divFiebreMas5D').prop('hidden',true);
				$('#numDiasConFiebre').val("");
				$('#opFiebreMasDe5DiasTodosLosDiasSi').prop('checked',false);
				$('#opFiebreMasDe5DiasTodosLosDiasNo').prop('checked',false);
			});

			$('#opNiñoConFiebreSi').click(function(){
				$('#divNumDiasFiebre').prop('hidden',false);
				$('#divFiebreMas5D').prop('hidden',false);
			});
			$('#numDiasConFiebre').change(function(){
				if ($(this).val()>3) {
					Materialize.toast('ATENCION:El menor debe ser valorado por un medico', 4000);
				}
				if ($(this).val()<5) {
					$('#opFiebreMasDe5DiasTodosLosDiasNo').prop('checked',true);
				}else{
					$('#opFiebreMasDe5DiasTodosLosDiasSi').prop('checked',true);
				}
			});
			$('#numDiasConFiebre').keyup(function(){
				if ($(this).val()>3) {
					Materialize.toast('ATENCION:El menor debe ser valorado por un medico', 4000);
				}
				if ($(this).val()<5) {
					$('#opFiebreMasDe5DiasTodosLosDiasNo').prop('checked',true);
				}else{
					$('#opFiebreMasDe5DiasTodosLosDiasSi').prop('checked',true);
				}
			});
			var alerRiesgoCancer=true;
			function alertaRiesgoCancer(){
				if (alerRiesgoCancer) {
					Materialize.toast('ATENCION:El menor debe ser valorado por un medico', 7000);
					alerRiesgoCancer=false;
				}
			}

			$('#opFiebreMasDe14DiasSi').click(alertaRiesgoCancer);
			$('#opDolorDeCabezaRecAumentaSi').click(alertaRiesgoCancer);
			$('#opDolorDeCabezaDespiertaAlNiñoSi').click(alertaRiesgoCancer);
			$('#opDolorDeCabezaAcompañadoConVomitoSi').click(alertaRiesgoCancer);
			$('#opDolorDeHuesosEnElUltimoMesSi').click(alertaRiesgoCancer);
			$('#opDolorHuesosInterrumpeActNiñoSi').click(alertaRiesgoCancer);
			$('#opDolorDeHuesosEnAumentoSi').click(alertaRiesgoCancer);
			$('#opUlt3MesesCambiosFatigaSi').click(alertaRiesgoCancer);
			
			$('#opDolorDeCabezaRecAumentaNo').click(function(){
				$('#divDolorCaezaDespierta').prop('hidden',true);
				$('#divNumDiasColCabeza').prop('hidden',true);
				$('#divDolAcompVom').prop('hidden',true);
				$('input[name=opDolorDeCabezaDespiertaAlNiño]').prop('disabled',true);
				$('input[name=numDiasConDolorDeCabeza]').prop('disabled',true);
				$('input[name=numDiasConDolorDeCabeza]').val("");
				$('input[name=opDolorDeCabezaAcompañadoConVomitos]').prop('disabled',true);
				$('#opDolorDeCabezaDespiertaAlNiñoSi').prop('checked',false);
				$('#opDolorDeCabezaDespiertaAlNiñoNo').prop('checked',false);
				$('#opDolorDeCabezaAcompañadoConVomitoSi').prop('checked',false);
				$('#opDolorDeCabezaAcompañadoConVomitoNo').prop('checked',false);
				
			});
			$('#opDolorDeCabezaRecAumentaSi').click(function(){
				$('#divDolorCaezaDespierta').prop('hidden',false);
				$('#divNumDiasColCabeza').prop('hidden',false);
				$('#divDolAcompVom').prop('hidden',false);
				$('input[name=opDolorDeCabezaDespiertaAlNiño]').prop('disabled',false);
				$('input[name=numDiasConDolorDeCabeza]').prop('disabled',false);
				$('input[name=opDolorDeCabezaAcompañadoConVomitos]').prop('disabled',false);
				
			});
			$('#opDolorDeHuesosEnElUltimoMesNo').click(function(){
				$('#divDolHuesosInterrupe').prop('hidden',true);
				$('#dolHuesosAumento').prop('hidden',true);
				$('#opDolorHuesosInterrumpeActNiñoSi').prop('checked',false);
				$('#opDolorHuesosInterrumpeActNiñoNo').prop('checked',false);
				$('#opDolorDeHuesosEnAumentoSi').prop('checked',false);
				$('#opDolorDeHuesosEnAumentoNo').prop('checked',false);
			});
			$('#opDolorDeHuesosEnElUltimoMesSi').click(function(){
				$('#divDolHuesosInterrupe').prop('hidden',false);
				$('#dolHuesosAumento').prop('hidden',false);
			});
			var alerOido=true;
			function alertOido(){
				if (alerRiesgoCancer) {
					Materialize.toast('ATENCION:El menor debe ser remitido al hospital', 500);
					alerRiesgoCancer=false;
				}
			}
			$('#opProblemasDeOidoSi').click(alertOido);
			$('#opSupuracionDeOidoSi').click(alertOido);
			$('#opProblemasDeOidoNo').click(function(){
				$('#divNumEpiPreviosOido').prop('hidden',true);
				$('#numDeEpisodiosPrevios').val("");
			});
			$('#opProblemasDeOidoSi').click(function(){
				$('#divNumEpiPreviosOido').prop('hidden',false);
			});
			$('#opSupuracionDeOidoSi').click(function(){
				$('#divNumDiasSupuracion').prop('hidden',false);
			});
			$('#opSupuracionDeOidoNo').click(function(){
				$('#divNumDiasSupuracion').prop('hidden',true);
				$('#numDiasConSupuracion').val("");
			});
			$('#opNiñoDesnutricionOAnemiaSi').click(function(){
				Materialize.toast('ATENCION:El menor debe ser remitido al hospital', 5000);
			});
			function calcularEdad(){
				var d = new Date();
				var añoAct = d.getFullYear();
				var mesAct =  d.getMonth() + 1;
				var diaAct =  d.getDate();
				var f1=document.getElementById("fechNacimientoNiño").value,f2=diaAct+'/'+mesAct+'/'+añoAct;
				var aFecha1 = f1.split('/');
				var aFecha2 = f2.split('/');
				var fFecha1 = Date.UTC(aFecha1[2],aFecha1[1]-1,aFecha1[0]);
				var fFecha2 = Date.UTC(aFecha2[2],aFecha2[1]-1,aFecha2[0]);
				var dif = fFecha2 - fFecha1;
				var dias = Math.floor(dif / (1000 * 60 * 60 * 24));
				return dias;
			};
			$('#opLeSonrienNo').click(function(){
				if ($(this).prop('checked') && $('#opArrullanNo').prop('checked')) {
					Materialize.toast('ATENCION:Brinde educacion para el buen trato del menor', 5000);
				}
			});
			$('#opArrullanNo').click(function(){
				if ($(this).prop('checked') && $('#opLeSonrienNo').prop('checked')) {
					Materialize.toast('ATENCION: Brinde educacion para el buen trato del menor', 5000);
				}
			});
			$('#opPreocupanPorLaHigieneNo').click(function(){
				Materialize.toast('ATENCION: Brinde educacion para el buen trato del menor', 5000);
			});
			$('#opSePreocupanPorSaludNo').click(function(){
				Materialize.toast('ATENCION: Brinde educacion para el buen trato del menor', 5000);
			});
			$('#opCastiganSi').click(function(){
				Materialize.toast('ATENCION: Brinde educacion para el buen trato del menor', 5000);
			});
			$('#opAccidentesFrecuentesSi').click(function(){
				Materialize.toast('ATENCION: Brinde educacion para el buen trato y cuidado del menor', 5000);
			});
			function msgRiesgos(){
				Materialize.toast("ATENCION: Brinde educacion para minimizar los riesgos en el hogar", 5000);
			}
			function msgHigiene(){
				Materialize.toast("ATENCION: Debe ejecutar un plan educativo para la familia del menor", 5000);
			};
			$('#opSoloTomandoseTeteroSi').click(msgRiesgos);
			$('#opObjPequeñosAlAlcanceSi').click(msgRiesgos);
			$('#opNiñosEnCocinaSi').click(msgRiesgos);
			$('#opCuchillosAlAlcanceSi').click(msgRiesgos);
			$('#opMedicamentosAlAlcanceSi').click(msgRiesgos);
			$('#opEscalerasSinBarandasSi').click(msgRiesgos);
			$('#opVelasAlAlcanceSi').click(msgRiesgos);
			$('#opAguaAlmacenadaSinTapaSi').click(msgRiesgos);
			$('#opCablesDescubierosSi').click(msgRiesgos);
			$('#opRiesgosEnElHogarSi').click(msgRiesgos);
			for (var i = 1; i<=15 ; i++) {
				$('#problemaAbientalYHigieneNum'+i).click(msgHigiene);
			}
			$('#opRecibioDesparacitacionNo').click(function(){
				Materialize.toast("ATENCION: El menor debe recibir canalizacion de desparacitacion", 5000);
			});
			$('#numRespiracionesPorMin').change(function(){
				
				var d = new Date();
				var añoAct = d.getFullYear();
				var mesAct =  d.getMonth() + 1;
				var diaAct =  d.getDate();
				var f1=$('#fechNacimientoNiño').val(),f2=añoAct+'-'+mesAct+'-'+diaAct;
				
				var aFecha1 = f1.split('-');
				var aFecha2 = f2.split('-');
				var fFecha1 = Date.UTC(aFecha1[0],aFecha1[1]-1,aFecha1[2]);
				var fFecha2 = Date.UTC(aFecha2[0],aFecha2[1]-1,aFecha2[2]);
				var dif = fFecha2 - fFecha1;
				var dias = Math.floor(dif / (1000 * 60 * 60 * 24));
					if ($(this).val()>60 && dias <= 60.8334) {
						$('#opRespiracionRapidaSi').prop('checked',true);
					}else{
						if (dias>60.8334 && dias <= 334.584 && $(this).val() >50) {
						$('#opRespiracionRapidaSi').prop('checked',true);
					}else{
						if (dias > 365 && dias <= 1825 && $(this).val()>40) {
						$('#opRespiracionRapidaSi').prop('checked',true);
					}else{
						$('#opRespiracionRapidaNo').prop('checked',true);
					}
					}
						
					}
			});
			$('#formAiepi').keypress(function(event){
				if (event.which == 13) {
					var envia=confirm('¿Desea Enviar El Formato Aiepi?');
					if (envia==true) {
						$('#formAiepi').submit();
					}else{
						event.preventDefault();
					}
				}
			});
				var checkRespirar= function(){
					var res=document.getElementById("numDiasConDificultadParaRespirar");
					var noResp=document.getElementById("opDificultadParaRespirarNo");
					if (noResp.checked) {
						res.hidden=true;
						res.disabled=true;
					}else{
						res.hidden=false;
						res.disabled=false;
					}
				};
				var checkDiarrea=function(){
					var diarr=document.getElementById("numDiasConDiarreaTd");
					var diarNo=document.getElementById("opTieneDiarreaNo");
					if (diarNo.checked) {
						diarr.hidden=true;
						diarr.disabled=true;
					}else{
						diarr.hidden=false;
						diarr.disabled=false;
					}
				};
				var checkTomaSeno6Meses=function(){
					var tomaSenoNo=document.getElementById("opTomaSenoMen6MesesNo"),
					senoDia=document.getElementById("numVecesTomaSenoDiaMen6Meses"),
					senoNoche=document.getElementById("numVecesTomaSenoNocheMen6Meses"),posicion=document.getElementById("posicionTomaSeno"),
					agarre=document.getElementById("agarreTomaSeno");
					if (tomaSenoNo.checked) {
						senoDia.hidden=true;
						senoNoche.hidden=true;
						posicion.hidden=true;
						agarre.hidden=true;
					}else{
						senoDia.hidden=false;
						senoNoche.hidden=false;
						posicion.hidden=false;
						agarre.hidden=false;
					}
				};
				var checkTomaSenoMas6Meses=function(){
					var tomaSenoNo=document.getElementById("opTomaSenoMas6MesesNo"),
					senoDia=document.getElementById("numVecesTomaSenoDiaMas6Meses"),
					senoNoche=document.getElementById("numVecesTomaSenoNocheMas6Meses");
					if (tomaSenoNo.checked) {
						senoDia.hidden=true;
						senoNoche.hidden=true;
					}else{
						senoDia.hidden=false;
						senoNoche.hidden=false;
					}
				};
				var checkDesparacitacion=function(){
					var desparacitacionNo=document.getElementById("opRecibioDesparacitacionNo"),
					fechaDesp=document.getElementById("fechaDeDesparacitacion");
					if (desparacitacionNo.checked) {
						fechaDesp.hidden=true;
						fechaDesp.disabled=true;
					}else{
						fechaDesp.hidden=false;
						fechaDesp.disabled=false;
					}
				};
				var checkMicroNutrientes=function(){
					var microNo=document.getElementById("opRecibeMicronutrientesNo"),
					descMicro=document.getElementById("descripcionMicronutrientes"),
					fechaMicro=document.getElementById("fechaEntregaMicronutrientes");
					if (microNo.checked) {
						descMicro.hidden=true;
						fechaMicro.hidden=true;
						descMicro.disabled=true;
						fechaMicro.disabled=true;
					}else{
						descMicro.hidden=false;
						fechaMicro.hidden=false;
						descMicro.disabled=false;
						fechaMicro.disabled=false;
					}
				};
		
				
				
				document.getElementById("opDificultadParaRespirarNo").addEventListener("click", checkRespirar, true);
				document.getElementById("opDificultadParaRespirarSi").addEventListener("click", checkRespirar, true);
				document.getElementById("opTieneDiarreaNo").addEventListener("click", checkDiarrea, true);
				document.getElementById("opTieneDiarreaSi").addEventListener("click", checkDiarrea, true);
				document.getElementById("opTomaSenoMen6MesesNo").addEventListener("click", checkTomaSeno6Meses, true);
				document.getElementById("opTomaSenoMen6MesesSi").addEventListener("click", checkTomaSeno6Meses, true);
				document.getElementById("opTomaSenoMas6MesesNo").addEventListener("click", checkTomaSenoMas6Meses, true);
				document.getElementById("opTomaSenoMas6MesesSi").addEventListener("click", checkTomaSenoMas6Meses, true);
				document.getElementById("opRecibioDesparacitacionNo").addEventListener("click", checkDesparacitacion, true);
				document.getElementById("opRecibioDesparacitacionSi").addEventListener("click", checkDesparacitacion, true);
				document.getElementById("opRecibeMicronutrientesNo").addEventListener("click", checkMicroNutrientes, true);
				document.getElementById("opRecibeMicronutrientesSi").addEventListener("click", checkMicroNutrientes, true);
			
});
			$(document).ready(function() {
				var d = new Date();
				var añoAct = d.getFullYear();
				var mesAct =  d.getMonth() + 1;
				var diaAct =  d.getDate();
				var f1=document.getElementById("fechNacimientoNiño").value,f2=añoAct+'-'+mesAct+'-'+diaAct;
				var aFecha1 = f1.split('-');
				var aFecha2 = f2.split('-');
				var fFecha1 = Date.UTC(aFecha1[0],aFecha1[1]-1,aFecha1[2]);
				var fFecha2 = Date.UTC(aFecha2[0],aFecha2[1]-1,aFecha2[2]);
				var dif = fFecha2 - fFecha1;
				var dias = Math.floor(dif / (1000 * 60 * 60 * 24));
				$('#contMedidasProtecMayor6Meses').hide();
				$('#contMedidasProtecMenor6Meses').hide();
					if (dias >= 0 && dias <= 182.5) {
					$('#contMedidasProtecMenor6Meses').show();
					}
					if (dias>=183) {
					$('#contMedidasProtecMayor6Meses').show();
				}
				if (dias<=730.5) {
					$('#divRecibiDesparacitacion').hide();;
					$('#divFechaRecibeDesparitacion').hide();
				}

		});
				