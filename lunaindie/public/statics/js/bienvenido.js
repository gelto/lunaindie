$().ready(function(){

	$('.editable').hide();
	$('.error').hide();

	$('.editar').click(function(event){
		event.preventDefault();

		var eq = $(this).data('eq');
		$('.escondete').eq(eq*3).hide();
		$('.escondete').eq(eq*3+1).hide();
		$('.escondete').eq(eq*3+2).hide();

		$('.editable').eq(eq).show();
	});

	// actualiza apodo
	$('.actualizaApodo').click(function(event){
		event.preventDefault();
		var ide = $(this).data('ide');
		var apodo = $(this).parent().siblings(".form-control").val();
		var token =  $("input[name='_token']").val();
		var that = $(this);

		$.post('/updateapodo',{ide:ide, apodo:apodo, _token:token}, function(responseData, textStatus, jqXHR){
			if(responseData.status == "success"){
				var eq = that.data('eq');
				$('.escondete').eq(eq*3).show();
				$('.escondete').eq(eq*3+1).show();
				$('.escondete').eq(eq*3+2).show();

				$('.editable').eq(eq).hide();
			}else if(responseData.status == ""){
				$(this).parent().siblings(".form-control").val("");
			}
		}, 'json' );
	});


	var yaMeEnviaron = false;
	$('.guardarNueva').click(function(event){
		event.preventDefault();
		var nombre = $('.nombreNueva').val();
		var email = $('.emailNueva').val();
		var cantidad = $('.cantidadNueva').val();
		var descripcion = $('.descripcionNueva').val();
		var direccion = $('.sliderHolder').val();
		var token =  $("input[name='_token']").val();

		if(yaMeEnviaron == false){
			yaMeEnviaron = true;
			$.post('/nuevacuentaabierta',{nombredeamigo:nombre, emaildeamigo:email, cantidad:cantidad, concepto:descripcion, direccion_deuda:direccion, _token:token}, function(responseData, textStatus, jqXHR){
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

	$('.rounded-x').click(function(event){
		event.preventDefault();
		location.href = "/detallecuentaabierta/" + $(this).data('cuenta');
	});

    
	
});
