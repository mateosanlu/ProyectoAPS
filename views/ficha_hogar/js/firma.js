var estoyDibujando = 0;
function comenzar(){
					
	lienzo = document.getElementById('canvas');
 	ctx = lienzo.getContext('2d');

	//Dejamos todo preparado para escuchar los eventos
	document.addEventListener('mousedown',pulsaRaton,false);
	document.addEventListener('mousemove',mueveRaton,false);
	document.addEventListener('mouseup',levantaRaton,false);
}

function limpiar(){
					
	lienzo = document.getElementById('canvas');
 	ctx = lienzo.getContext('2d');

	//Dejamos todo limpio
	ctx.clearRect(0, 0, lienzo.width, lienzo.height);
}


function pulsaRaton(capturo){
	var div = $("#canvas").offset();
	estoyDibujando = true;
	//Indico que vamos a dibujar
	ctx.beginPath();
	//Averiguo las coordenadas X e Y por dónde va pasando el ratón
	ctx.moveTo(capturo.pageX - div.left,capturo.pageY - div.top);
}



function mueveRaton(capturo){
	var div = $("#canvas").offset();
	if(estoyDibujando){
		//indicamos el color de la línea
		ctx.strokeStyle='#000';
		//Por dónde vamos dibujando
		ctx.lineTo(capturo.pageX - div.left,capturo.pageY - div.top);
		ctx.stroke();
	}
}

function levantaRaton(capturo){
	//Indico que termino el dibujo
	ctx.closePath();
	estoyDibujando = false;
}

function 	openNewWindow(){
	var canvas = document.getElementById("canvas");
	var dataUrl = canvas.toDataURL(); // obtenemos la imagen como png
	document.getElementById("imagenFirma").src = dataUrl;
	document.getElementById("firma").value = dataUrl;
	document.getElementById("canvasSwitch").checked=0;
	OnChangeCheckbox();
	//window.open(dataUrl, "Ejemplo", "width=400, height=200");
}

function OnChangeCheckbox () {
    var checkbox = document.getElementById("canvasSwitch");
    if (checkbox.checked) {
        comenzar();
    }
    else {
    	document.removeEventListener('mousedown',pulsaRaton,false);
		document.removeEventListener('mousemove',mueveRaton,false);
		document.removeEventListener('mouseup',levantaRaton,false);
    }
}