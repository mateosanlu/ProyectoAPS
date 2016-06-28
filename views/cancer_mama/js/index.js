	$(document).ready(menu);

	function menu(){
		$('.contributivo').hide();
		$('.subsidiado').hide();
		$("input[name=cancerMama0]").click(cualRegimen);
		$('.mensage').mouseenter(mensageIn);
		$('.mensage').mouseleave(mensagOut);
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
	function mensagOut(){
		$('.ventana').html('');
	}
