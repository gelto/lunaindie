$().ready(function(){

	// para saber si estoy al principio de un input vacío
	var banderaAlPrincipioDelInput = false;
    
    
	// validación al enviar
	$('.botonEnviar').click(function(event){
		event.preventDefault();
		var debeEnviar = true;

		$('.validame').each(function( index ) {
			if(!validame($(this).val(), $(this).data('tipo'), $(this).data('errorcustom'))){
				debeEnviar = false;
				return false;
			}
			
		});	


		if(debeEnviar){

			var email = $('.email').val();
			var password = $('.password').val();

			var token =  $("input[name='_token']").val();


			$.post('loginback',{email:email, password:password, _token:token}, function(responseData, textStatus, jqXHR){
				if(responseData.status == "error"){
					cambiaMsj(responseData.message);
				}else if(responseData.status == "success"){
					$('.error').show();
					$('.error').css('color', 'green');
					$('.error').html(responseData.message);
					location.href = "/";
				}
			}, 'json' );
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
});
