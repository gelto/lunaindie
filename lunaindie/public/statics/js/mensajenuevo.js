$().ready(function(){

	// para marcar que ya se eligió archivo
	$('.imagen').change(function(event){
		var i = $(this).data('eq');
		$('.cuadrito').eq(i).css('background-color', '#333');
		$('.cuadrito').eq(i).css('color', '#fff');
	});


	// validación al enviar
	var yaMeEnviaron = false;
	$('body').on('click', '.botonEnviarMensaje', function(event){
		event.preventDefault();
		var debeEnviar = true;

		$('.validameMensaje').each(function( index ) {
			if(!validameMensaje($(this).val(), $(this).data('tipo'), $(this).data('errorcustom'))){
				debeEnviar = false;
				return false;
			}			
		});	

		
		if(debeEnviar){

			$('.nuevoMensajeForm').submit();
			
		}
	});

	
	


	function validameMensaje(valor, tipo, errorCustom){
		var res = 0;
		if(tipo == "area"){
			if(/^[´áéíóúñüÁÉÍÓÚÜa-zA-Z0-9\s\,\.\:\;\-\_\@\?\¿\!\¡]{1,500}$/i.test(valor) && valor != ""){
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
