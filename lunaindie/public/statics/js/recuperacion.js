$().ready(function(){
    
    // validación al enviar
	var yaMeEnviaron = false;
	$('.botonRecuperar').click(function(event){
		event.preventDefault();

		var debeEnviar = true;

		$('.validameRec').each(function( index ) {
			if(!validame($(this).val(), $(this).data('tipo'), $(this).data('errorcustom'))){
				debeEnviar = false;
				return false;
			}
			
		});	


		if(debeEnviar){

			var email = $('.email').val();

			var token =  $("input[name='_token']").val();

			if(yaMeEnviaron == false){
				yaMeEnviaron = true;
				$.post('recuperarback',{email:email, _token:token}, function(responseData, textStatus, jqXHR){
					if(responseData.status == "error"){
						cambiaMsj(responseData.message);
						yaMeEnviaron = false;
					}else if(responseData.status == "success"){
						$('.error').show();
						$('.error').css('color', 'green');
						$('.error').html(responseData.message);
						location.reload(true);
					}
				}, 'json' );
			}
		}
	});

	
	


	function validame(valor, tipo, errorCustom){

		var res = 0;
		if(tipo == "texto"){
			if(/^[´áéíóúñüÁÉÍÓÚÜa-zA-Z0-9\s]{1,50}$/i.test(valor) && valor != ""){
				res = 1;
			}	
		}else if(tipo == "email"){
			if(/^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/i.test(valor) && valor != ""){
				res = 1;
			}
		}else if(tipo == "password"){ 
			if(/^[´áéíóúñüÁÉÍÓÚÜa-zA-Z0-9]{1,50}$/i.test(valor) && valor != ""){ // TODO
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


	//*****************************//

	// validación al enviar
	
	$('.botonEnviarRec').click(function(event){
		event.preventDefault();
		////yaMeEnviaron = false;
		var debeEnviar = true;

		$('.validameRec').each(function( index ) {
			if(!validameRec($(this).val(), $(this).data('tipo'), $(this).data('errorcustom'))){
				debeEnviar = false;
				return false;
			}
		});	


		if(debeEnviar){

			if($('.passwordRec').eq(0).val() == "" || ($('.passwordRec').eq(0).val() != $('.passwordRec').eq(1).val())){
				debeEnviar = false;
				cambiaMsj("Los passwords no coinciden");
			}

			if(debeEnviar){

				var password = $('.passwordRec').val();
				var id = $('.id').val();
				var resetcode = $('.resetcode').val();

				var token =  $("input[name='_token']").val();

				if(yaMeEnviaron == false){
					////yaMeEnviaron = true;
					$.post('/finderecuperarpassword',{id:id, resetcode:resetcode, password:password, _token:token}, function(responseData, textStatus, jqXHR){
						if(responseData.status == "error"){
							cambiaMsj(responseData.message);
							yaMeEnviaron = false;
						}else if(responseData.status == "success"){
							$('.error').show();
							$('.error').css('color', 'green');
							$('.error').html(responseData.message);
						}
					}, 'json' );
				}
			}
		}
	});

	
	


	function validameRec(valor, tipo, errorCustom){
		var res = 0;
		if(tipo == "texto"){
			if(/^[´áéíóúñüÁÉÍÓÚÜa-zA-Z0-9\s]{1,50}$/i.test(valor) && valor != ""){
				res = 1;
			}	
		}else if(tipo == "email"){
			if(/^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/i.test(valor) && valor != ""){
				res = 1;
			}
		}else if(tipo == "password"){ 
			if(/^[´áéíóúñüÁÉÍÓÚÜa-zA-Z0-9]{1,50}$/i.test(valor) && valor != ""){ // TODO
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
