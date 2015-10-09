$().ready(function(){

	$('.errorDatos').hide();
	$('.errorMail').hide();


	// datos personales
	$('.actualizardatos').click(function(event){
		event.preventDefault();
		var nombre =  $(".nombre").val();
		var email =  $(".email").val();
		var password =  $(".password").val();


		$.post('/checamicuenta',{nombre:nombre, email:email, password:password}, function(responseData, textStatus, jqXHR){
			if(responseData.status == "success"){
				$('.formadedatos').submit();
			}else{
				$('.errorDatos').show();
				$('.errorDatos').html(responseData.message);
			}
		}, 'json' );
	});

	// registra nuevo email
	var yaMeEnviaron = false;

	$('.agregarEmail').click(function(event){
		event.preventDefault();
		var email = $('.otroEmail').val();
		var token =  $("input[name='_token']").val();


		if(yaMeEnviaron == false){
			yaMeEnviaron = true;
			$.post('/agregaemail',{email:email, _token:token}, function(responseData, textStatus, jqXHR){
				if(responseData.status == "success"){
					location.reload(true);
				}else{
					$('.errorMail').show();
					$('.errorMail').html(responseData.message);
					yaMeEnviaron = false;
				}
			}, 'json' );
		}
	});
	
});
