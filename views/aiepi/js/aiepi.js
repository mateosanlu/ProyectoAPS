$(document).ready(function() {
	$('select').material_select();
});
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
$(document).ready(function(){
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
		document.getElementById("contMedidasProtecMayor6Meses").hidden=true;
		document.getElementById("contMedidasProtecMenor6Meses").hidden=true;
		if (dias >= 0 && dias <= 182.5) {
		document.getElementById("contMedidasProtecMenor6Meses").hidden=false;
		}
		if (dias>=183) {
		document.getElementById("contMedidasProtecMayor6Meses").hidden=false;
		}
});
$(document).ready(function(){
	var checkTos= function(){
		var tos=document.getElementById("numDiasConTos");
		var noTos=document.getElementById("opNiñoConTosNo");
	if (noTos.checked) {
		tos.hidden=true;
		tos.disabled=true;
	}else{
		tos.hidden=false;
		tos.disabled=false;
	}
	};
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
		var diarr=document.getElementById("numDiasConDiarrea");
		var diarNo=document.getElementById("opTieneDiarreaNo");
		var diar2=document.getElementById("numDiasConDiarreaCol2");
		if (diarNo.checked) {
			diarr.hidden=true;
			diarr.disabled=true;
			diar2.hidden=true;
		}else{
			diarr.hidden=false;
			diarr.disabled=false;
			diar2.hidden=false;
		}
	};
	var checkFiebre=function(){
		var fiebre=document.getElementById("numDiasConFiebre");
		var fiebreNo=document.getElementById("opNiñoConFiebreNo");
		var fiebreMas=document.getElementById("contFiebre5D");
		var febreText5D=document.getElementById("textFiebre5Dias");
		if (fiebreNo.checked) {
			febreText5D.hidden=true;
			fiebre.hidden=true;
			fiebre.disabled=true;
			fiebreMas.hidden=true;
		}else{
			febreText5D.hidden=false;
			fiebre.hidden=false;
			fiebreMas.hidden=false;
			fiebre.disabled=false;
		}
	};
	var checkDolorCabeza=function(){
		var dolorDespiera=document.getElementById("textContDespNiñ"),
		numDiasConDolor=document.getElementById("numDiasConDolorDeCabeza"),
		dolorConOtroSintoma=document.getElementById("contOpDolorCabeza"),dolorCabezaNo=document.getElementById("opDolorDeCabezaRecAumentaNo")
		,dolCol2=document.getElementById("ContOtraColCabeza");
		if (dolorCabezaNo.checked) {
			dolorDespiera.hidden=true;
			numDiasConDolor.hidden=true;
			dolorConOtroSintoma.hidden=true;
			dolCol2.hidden=true;
			
		}else{
			dolCol2.hidden=false;
			dolorDespiera.hidden=false;
			numDiasConDolor.hidden=false;
			dolorConOtroSintoma.hidden=false;
		}
	};
	var checkHuesos=function(){
		
		var dolorHuesosNo=document.getElementById("opDolorDeHuesosEnElUltimoMesNo"),
		dolHueInt=document.getElementById("opDolorHuesosInterrumpeActNiño"),
		dolHueAument=document.getElementById("opDolorDeHuesosEnAumento"),
		textDolHuesosIntrr=document.getElementById("textDolHuesosIntrr"),
contOpDolHuesIntrr=document.getElementById("contOpDolHuesIntrr"),
textContDolHuesos=document.getElementById("textContDolHuesos"),
opDolorHuesAumnet=document.getElementById("opDolorHuesAumnet");
		if (dolorHuesosNo.checked) {
			textDolHuesosIntrr.hidden=true;
			contOpDolHuesIntrr.hidden=true;
			textContDolHuesos.hidden=true;
			opDolorHuesAumnet.hidden=true;
			dolHueInt.hidden=true;
			dolHueAument.hidden=true;
		}else{
			textDolHuesosIntrr.hidden=false;
			contOpDolHuesIntrr.hidden=false;
			textContDolHuesos.hidden=false;
			opDolorHuesAumnet.hidden=false;
			dolHueInt.hidden=false;
			dolHueAument.hidden=false;
		}
	};
	var chechkOido=function(){
		var problemOidoNo=document.getElementById("opProblemasDeOidoNo"),numEpiPrev=document.getElementById("numDeEpisodiosPrevios");
		if (problemOidoNo.checked) {
			numEpiPrev.hidden=true;
			numEpiPrev.disabled=true;
		}else{
			numEpiPrev.hidden=false;
			numEpiPrev.disabled=false;
		}
		problemUsurpNo=document.getElementById("opSupuracionDeOidoNo"),diasConProblem=document.getElementById("numDiasConSupuracion");
		if (problemUsurpNo.checked) {
			diasConProblem.hidden=true;
			diasConProblem.disabled=true;
		}else{
			diasConProblem.hidden=false;
			diasConProblem.disabled=false;
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
	var calcularEdad=function (){
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
	document.getElementById("1013Meses").hidden=true;
	document.getElementById("1016Meses").hidden=true;
	document.getElementById("1019Meses").hidden=true;
	document.getElementById("10112Meses").hidden=true;
	document.getElementById("10116Meses").hidden=true;
	document.getElementById("10120Meses").hidden=true;
	document.getElementById("10124Meses").hidden=true;
	document.getElementById("10130Meses").hidden=true;
	document.getElementById("10136Meses").hidden=true;
	document.getElementById("10148Meses").hidden=true;
	document.getElementById("10160Meses").hidden=true;
	if (dias>= 0 && dias <= 91.250) {
		document.getElementById("1013Meses").hidden=false;
	}
	if (dias >= 92 && dias <= 182.5) {
		document.getElementById("1016Meses").hidden=false;
	}
	if (dias>=183 && dias <= 273.75) {
		document.getElementById("1019Meses").hidden=false;
	} if (dias >= 274 && dias <=365) {
		document.getElementById("10112Meses").hidden=false;
	}
	if (dias >= 366 && dias <=486.667) {
		document.getElementById("10116Meses").hidden=false;
	}if (dias >= 487 && dias <=608.334) {
		document.getElementById("10120Meses").hidden=false;
	}if (dias >= 609 && dias <=730.001) {
		document.getElementById("10124Meses").hidden=false;
	}if (dias >= 731 && dias <=912.501) {
		document.getElementById("10130Meses").hidden=false;
	}if (dias >= 913 && dias <=1095) {
		document.getElementById("10136Meses").hidden=false;
	}if (dias >= 1096 && dias <=1460) {
		document.getElementById("10148Meses").hidden=false;
	}if (dias >= 1461 && dias <=1825) {
		document.getElementById("10160Meses").hidden=false;
	}
	};
	var calcularRespiracionRapida=function(){
		var resp=document.getElementById("numRespiracionesPorMin");
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
		if (resp.value>60 && dias <= 60.8334) {
			document.getElementById("opRespiracionRapidaSi").checked=true;
		}else{
			if (dias>60.8334 && dias <= 334.584 && resp.value >50) {
			document.getElementById("opRespiracionRapidaSi").checked=true;
		}else{
			if (dias > 365 && dias <= 1825 && resp.value>40) {
			document.getElementById("opRespiracionRapidaSi").checked=true;
		}else{
			document.getElementById("opRespiracionRapidaNo").checked=true;
		}
		}
			
		}
		
		
	};
	
	document.getElementById("opNiñoConTosNo").addEventListener("click", checkTos, true);
	document.getElementById("opNiñoConTosSi").addEventListener("click", checkTos, true);
	document.getElementById("opDificultadParaRespirarNo").addEventListener("click", checkRespirar, true);
	document.getElementById("opDificultadParaRespirarSi").addEventListener("click", checkRespirar, true);
	document.getElementById("opTieneDiarreaNo").addEventListener("click", checkDiarrea, true);
	document.getElementById("opTieneDiarreaSi").addEventListener("click", checkDiarrea, true);
	document.getElementById("opNiñoConFiebreNo").addEventListener("click", checkFiebre, true);
	document.getElementById("opNiñoConFiebreSi").addEventListener("click", checkFiebre, true);
	document.getElementById("opDolorDeCabezaRecAumentaNo").addEventListener("click", checkDolorCabeza, true);
	document.getElementById("opDolorDeCabezaRecAumentaSi").addEventListener("click", checkDolorCabeza, true);
	document.getElementById("opDolorDeHuesosEnElUltimoMesNo").addEventListener("click", checkHuesos, true);
	document.getElementById("opDolorDeHuesosEnElUltimoMesSi").addEventListener("click", checkHuesos, true);
	document.getElementById("opProblemasDeOidoNo").addEventListener("click", chechkOido, true);
	document.getElementById("opProblemasDeOidoSi").addEventListener("click", chechkOido, true);
	document.getElementById("opSupuracionDeOidoNo").addEventListener("click", chechkOido, true);
	document.getElementById("opSupuracionDeOidoSi").addEventListener("click", chechkOido, true);
	document.getElementById("opTomaSenoMen6MesesNo").addEventListener("click", checkTomaSeno6Meses, true);
	document.getElementById("opTomaSenoMen6MesesSi").addEventListener("click", checkTomaSeno6Meses, true);
	document.getElementById("opTomaSenoMas6MesesNo").addEventListener("click", checkTomaSenoMas6Meses, true);
	document.getElementById("opTomaSenoMas6MesesSi").addEventListener("click", checkTomaSenoMas6Meses, true);
	document.getElementById("opRecibioDesparacitacionNo").addEventListener("click", checkDesparacitacion, true);
	document.getElementById("opRecibioDesparacitacionSi").addEventListener("click", checkDesparacitacion, true);
	document.getElementById("opRecibeMicronutrientesNo").addEventListener("click", checkMicroNutrientes, true);
	document.getElementById("opRecibeMicronutrientesSi").addEventListener("click", checkMicroNutrientes, true);
	document.getElementById("evaluaDesarrollo").addEventListener("click", calcularEdad, true);
	document.getElementById("numRespiracionesPorMin").addEventListener("blur", calcularRespiracionRapida, true);
});