$().ready(function(){
	
	// validación al enviar
	var yaMeEnviaron = false;
	$('.botonEnviarDiseno').click(function(event){
		event.preventDefault();
		var debeEnviar = true;

		$('.validameDiseno').each(function( index ) {
			
			if($(this).data('tipo') == "area"){
				if(!validameDiseno($(this).val(), $(this).data('tipo'), $(this).data('errorcustom'))){
					debeEnviar = false;
					return false;
				}
			}else{
				if(!validameDiseno($(this).val(), $(this).data('tipo'), $(this).data('errorcustom'))){
					debeEnviar = false;
					return false;
				}
			}
			
		});	

		
		if(debeEnviar){

			$('.formaRegistroDiseno').submit();
			
		}
	});

	
	


	function validameDiseno(valor, tipo, errorCustom){
		var res = 0;
		if(tipo == "texto"){
			if(/^[´áéíóúñüÁÉÍÓÚÜa-zA-Z0-9\s]{1,50}$/i.test(valor) && valor != ""){
				res = 1;
			}	
		}else if(tipo == "area"){
			if(/^[´áéíóúñüÁÉÍÓÚÜa-zA-Z0-9\s]{1,2048}$/i.test(valor) && valor != ""){
				res = 1;
			}
		}

		if(res != 1){
			cambiaMsj(errorCustom);
		}

		return res;
	}

	function cambiaMsj(msj){
		$('.error').show();
		$('.error').html(msj);
	}
});
