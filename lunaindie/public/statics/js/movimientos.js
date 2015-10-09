$().ready(function(){

	$('.error').hide();

	var yaMeEnviaron = false;
	$('.guardarUpdate').click(function(event){
		event.preventDefault();

		var cuenta_id = $('.cuenta_id').val();
		var usuarioB = $('.usuarioB').val();
		var direction = $('.direction').val();
		var cantidad = $('.cantidadUpdate').val();
		var descripcion = $('.descripcionUpdate').val();
		var direccion = $('.sliderHolder').val();
		var token =  $("input[name='_token']").val();


		if(yaMeEnviaron == false){
			yaMeEnviaron = true;
			$.post('/agregaracuentaabierta',{cuenta_id:cuenta_id, usuarioB:usuarioB, direction:direction, cantidad:cantidad, descripcion:descripcion, direccion_deuda:direccion, _token:token}, function(responseData, textStatus, jqXHR){
				if(responseData.status == "success"){
					location.reload(true);
				}else{
					$('.error').show();
					$('.error').html(responseData.message);
					yaMeEnviaron = false;
				}
			}, 'json' );
		}
	});

	    
	
});
