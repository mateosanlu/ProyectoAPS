$(document).ready(menu);

function menu(){
	$('.contributivo').hide();
	$('.subsidiado').hide();
	$("input[name=cancerMama0]").click(cualRegimen);
	$('.mensage').mouseenter(mensageIn);
	$('.mensage').mouseleave(mensageOut);
}

function cualRegimen(){

	if ($(this).attr('id')=='t1') {
		$('.contributivo').show();
		$('.subsidiado').hide();
	}else if($(this).attr('id')=='t2'){
		$('.contributivo').hide();
		$('.subsidiado').show();
	}else{
		$('.contributivo').hide();
		$('.subsidiado').hide();
	}
}
function mensageIn(){
	if ($(this).attr('id')=='p0') {
		$('.'+$(this).attr('id')).html('Ayuda');
	}
	
	console.log($(this).attr('id'));
}
function mensageOut(){
	$('.ventana').html('');
}

function ValidaForm(){
	if (document.hogar.nombre.value==''){
		alert('Debe ingresar su nombre.');
		document.hogar.nombre.value='';
		document.hogar.nombre.focus();
		return false;
	}else if (document.hogar.apellido.value==''){
		alert('Debe ingresar su apellido.');
		document.hogar.apellido.value='';
		document.hogar.apellido.focus();
		return false;
	}else if (document.hogar.documento.value==''){
		alert('Debe ingresar su documento.');
		document.hogar.documento.value='';
		document.hogar.documento.focus();
		return false;
	}
	}else if (document.hogar.direccion.value==''){
		alert('Debe ingresar su dirección.');
		document.hogar.direccion.value='';
		document.hogar.direccion.focus();
		return false;
	}else if (document.hogar.barrio.value==''){
		alert('Debe ingresar el barrio.');
		document.hogar.barrio.value='';
		document.hogar.barrio.focus();
		return false;
	}else if (document.hogar.municipio.value==''){
		alert('Debe ingresar el municipio.');
		document.hogar.municipio.value='';
		document.hogar.municipio.focus();
		return false;
	}else if(!$("input[name=cancerMama0]:checked").val()) {
		alert('Debe seleccionar el tipo de afiliación');
		return false
	} else if (document.hogar.edad.value==''){
		alert('Debe ingresar su edad.');
		document.hogar.edad.value='';
		document.hogar.edad.focus();
		return false;
	}else if(!$("input[name=cancerMama2]:checked").val()) {
		alert('Pregunta número 2 incompleta');
		return false
	}else if(!$("input[name=cancerMama3]:checked").val()) {
		alert('Pregunta número 3 incompleta');
		return false
	}else if(!$("input[name=cancerMama4]:checked").val()) {
		alert('Pregunta número 4 incompleta');
		return false
	}else if(!$("input[name=cancerMama5]:checked").val()) {
		alert('Pregunta número 5 incompleta');
		return false
	}else if(!$("input[name=cancerMama6]:checked").val()) {
		alert('Pregunta número 6 incompleta');
		return false
	}
}

$('.tooltipped').tooltip({delay: 50});


$(function() {
    //enable_cb();
    $("#t21").click(disable_cb);
});

function disable_cb() {
	$("input.group1").prop("disabled", this.checked);   
}

$(function() {
    enable_cb();
    $("input.group1").click(enable_cb);
});

function enable_cb() {
	$("#t21").prop("disabled", this.checked);   
}