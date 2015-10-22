$().ready(function(){
	
	$('.error').hide();

	// para saber si estoy al principio de un input vacío
	var banderaAlPrincipioDelInput = false;


	// solo caracteres alfabeticos
	$('.soloAlpha').on('input propertychange',function(){
		$(this).val($(this).val().replace(/´a$/gi , "á"));
		$(this).val($(this).val().replace(/´e$/gi , "é"));
		$(this).val($(this).val().replace(/´i$/gi , "í"));
		$(this).val($(this).val().replace(/´o$/gi , "ó"));
		$(this).val($(this).val().replace(/´u$/gi , "ú"));
				
        $(this).val($(this).val().replace(/[^´a-zA-Z\u00D1\u00F1\u00C1\u00E1\u00C9\u00E9\u00CD\u00ED\u00D3\u00F3\u00DA\u00FA\u00DC\u00FC ]/gi , ""));
    });

    // solo mail
    $('.soloAlphaCorreo').on('input propertychange',function(){
        var RegExPattern = /[a-zA-z0-9\u00D1\u00F1\u00C1\u00E1\u00C9\u00E9\u00CD\u00ED\u00D3\u00F3\u00DA\u00FA\u00DC\u00FC@.]$/;
        if (!$(this).val().match(RegExPattern)) {
            $(this).val($(this).val().substring(0,$(this).val().length-1));
        }  
    });
    
    
	// validación al enviar
	var yaMeEnviaron = false;
	$('.botonEnviarReg').click(function(event){
		event.preventDefault();
		var debeEnviar = true;

		$('.validameReg').each(function( index ) {
			if(!validameReg($(this).val(), $(this).data('tipo'), $(this).data('errorcustom'))){
				debeEnviar = false;
				return false;
			}
		});	

		

		if(debeEnviar){

			if($('.passwordReg').eq(0).val() == "" || ($('.passwordReg').eq(0).val() != $('.passwordReg').eq(1).val())){
				debeEnviar = false;
				cambiaMsj("Los passwords no coinciden");
			}

			if(debeEnviar){

				var nombre = $('.nombreReg').val();
				var email = $('.emailReg').val();
				var password = $('.passwordReg').val();

				var token =  $("input[name='_token']").val();

				if(yaMeEnviaron == false){
					yaMeEnviaron = true;
					$.post('registro',{nombre:nombre, email:email, password:password, _token:token}, function(responseData, textStatus, jqXHR){
						if(responseData.status == "error"){
							cambiaMsj(responseData.message);
							yaMeEnviaron = false;
						}else if(responseData.status == "success" || responseData.status == "email"){
							$('.error').show();
							$('.error').css('color', 'green');
							$('.error').html(responseData.message);
						}
					}, 'json' );
				}
			}
		}
	});

	
	


	function validameReg(valor, tipo, errorCustom){
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
