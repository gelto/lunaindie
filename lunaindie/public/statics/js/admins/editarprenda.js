$().ready(function(){

	// para marcar que ya se eligió archivo
	$('.imagen').change(function(event){
		var i = $(this).data('eq');
		$('.cuadrito').eq(i).css('background-color', '#333');
		$('.cuadrito').eq(i).css('color', '#fff');
	});

	
	// validación al enviar
	var yaMeEnviaron = false;
	$('body').on('click', '.enviarAjuste', function(event){
		event.preventDefault();
		var debeEnviar = true;

		$('.validamePrenda').each(function( index ) {
			if(!validameDiseno($(this).val(), $(this).data('tipo'), $(this).data('errorcustom'))){
				debeEnviar = false;
				return false;
			}			
		});	

		
		if(debeEnviar){
			$('.nuevaPrendaForm').submit();
		}
	});

	
	


	function validameDiseno(valor, tipo, errorCustom){
		var res = 0;
		if(tipo == "texto"){
			if(/^[´áéíóúñüÁÉÍÓÚÜa-zA-Z0-9\s]{1,50}$/i.test(valor) && valor != ""){
				res = 1;
			}	
		}else if(tipo == "hash"){
			if(/^[´áéíóúñüÁÉÍÓÚÜa-zA-Z0-9\s#]{1,50}$/i.test(valor) && valor != ""){
				res = 1;
			}	
		}else if(tipo == "area"){
			if(/^[´áéíóúñüÁÉÍÓÚÜa-zA-Z0-9\s\,\.\:\;\-\_\@]{1,500}$/i.test(valor) && valor != ""){
				res = 1;
			}
		}else if(tipo == "select"){ 
			if(/^[´áéíóúñüÁÉÍÓÚÜa-zA-Z0-9]{1,50}$/i.test(valor) && valor != "Selecciona una opción"){ 
				res = 1;
			}	
		}else if(tipo == "archivo"){ 
			console.log(valor);
			if(/^[´áéíóúñüÁÉÍÓÚÜa-zA-Z0-9\. ]{1,200}$/i.test(valor) && valor != ""){ 
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

	$('.enviarMensaje').click(function(){
		var quien = $(this).data('disenador');
		var url = "/soyadministrador/mensajes/0/" + quien;
		var win = window.open(url, '_blank');
  		win.focus();
	});
});
