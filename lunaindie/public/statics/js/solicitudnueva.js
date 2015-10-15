$().ready(function(){

	var colores = new Array(); 
	var medidas = new Array(); 

	creaCampos();

	$('.medidasPrenda').change(function(event){
		event.preventDefault();
		creaCampos();
	});

	$('.coloresPrenda').change(function(event){
		event.preventDefault();
		creaCampos();
	});

	function creaCampos(){
		medidas = $('.medidasPrenda').val().split('#');
		colores = $('.coloresPrenda').val().split('#');

		if(typeof medidas[0] != "undefined" && typeof colores[0] != "undefined" && medidas[0] != "" && colores[0] != ""){
			var agregar = '';
			for(var i=0;i<medidas.length;i++){
				for(var j=0;j<colores.length;j++){
					agregar += '<div class="col-md-4">';
			                        agregar += '<div class="form-group">';
			                            agregar += '<label>Unidades para '+medidas[i]+' - '+colores[j]+'<sup>*</sup></label>';
			                            agregar += '<input type="text" class="form-control dark validamePrenda soloAlphaNum cantidadPrenda" name="cantidadPrenda" placeholder="0" data-tipo="texto" data-medida="'+medidas[i]+'" data-color="'+colores[j]+'" data-tipo="cantidad" data-errorcustom="La cantidad para la talla '+medidas[i]+', color '+colores[j]+' es requerida">';
			                        agregar += '</div>';
			                    agregar += '</div>';
				}
			}
			$('.cantidades').html(agregar);
			$('.cantidades').fadeIn();
		}else{
			$('.cantidades').html("&nbsp;");
			$('.cantidades').fadeOut();
		}
	}

	$('.imagen').change(function(event){
		var i = $(this).data('eq');
		$('.cuadrito').eq(i).css('background-color', '#333');
		$('.cuadrito').eq(i).css('color', '#fff');
	});



	
	// validación al enviar
	var yaMeEnviaron = false;
	$('body').on('click', '.enviarSolicitud', function(event){
		event.preventDefault();
		var debeEnviar = true;

		$('.validamePrenda').each(function( index ) {
			if(!validameDiseno($(this).val(), $(this).data('tipo'), $(this).data('errorcustom'))){
				debeEnviar = false;
				return false;
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
			if(/^[´áéíóúñüÁÉÍÓÚÜa-zA-Z0-9\.]{1,50}$/i.test(valor) && valor != ""){ 
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
