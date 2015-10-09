<?php

class PersonasController extends BaseController {

	public function inicio(){
		$hola = "hola";
		$this->layout = View::make('layouts.layoutmain');
		if(Sentry::check()){
			$estaLogeado = true;
		}else{
			$estaLogeado = false;
		}
		$this->layout->content = View::share(array('estaLogeado' => $estaLogeado , "hola" => $hola));
		$this->layout->content = View::make('compradores/inicio');
	}

	public function micuenta($error="")
	{
		$userL = Sentry::getUser();

		$alternativeemails = Alternativeemail::where('user_id', '=',$userL->id)->get();

		return View::make('alternativas/micuenta')->with('userL', $userL)->with('alternativeemails', $alternativeemails)->with('error', $error);
	}

	public function agregaemail()
	{
		$respuesta['status'] = "success";
		$respuesta['message'] = "ok";

		$userL = Sentry::getUser();

		$email = Input::get('email');

		$rules = array(
	        'email'  => array('required', 'email')
	    );

	    $validation = Validator::make(Input::all(), $rules);

	    if(!$validation->fails() && $userL->email != $email){

	    	$alternativeEmailArr = Alternativeemail::where('email', '=', $email)->get();
	    	if(isset($alternativeEmailArr[0])){
	    		$alternativeEmail = $alternativeEmailArr[0];
	    	}else{
	    		$alternativeEmail = new Alternativeemail;
	    		$alternativeEmail->user_id = $userL->id;
	    		$alternativeEmail->email = $email;
	    		$alternativeEmail->status = "";
	    		$alternativeEmail->save();
	    	}

	    	// crea un token para comprobar el email
	    	$activationCode = $userL->getActivationCode();
	    	// envía mail de pre confirmación
	    	// MAIL
            $data=array();
            
            ////$data['mensaje'] = "Gracias por registrar o vincular este email a tu cuenta principal en el sistema de Amigos Cash. <br> Por favor confirma tu dirección de email haciendo click en el siguiente enlace: <a href='www.amigos.cash/vinculacion/".$activationCode."/".$alternativeEmail->id."/".$alternativeEmail->email."'>Amigos.Cash/validacion/".$activationCode."</a><br>Si consideras que ha habido un error has caso omiso de este mensaje."; 
            $vista = 'emails.mensajegral';
            $data['email'] = $email;
            $nombre = $userL->first_name;
            
            Mail::queue($vista, $data, function($message) use ($email, $nombre)
            {
                $message->to($email, $nombre)->subject('Nuevo email');
            });
            // MAIL fin
	    }else{
	    	$respuesta['status'] = "error";
			$respuesta['message'] = "Por favor provee un email válido";
	    }

	    echo json_encode($respuesta, 1);
	}

	public function vinculacion($token, $id, $email)
	{
		$userL = Sentry::getUser();

		try{
			
			// si el token está chido
			if($userL->activation_code == $token && $userL->id != $id){

				// adjudica el nuevo email al usuairo logeado
				$alternativeEmailArr = Alternativeemail::where('id', '=', $id)->where('email', '=', $email)->get();
				if(isset($alternativeEmailArr[0])){
					$alternativeEmail = $alternativeEmailArr[0];
					$alternativeEmail->user_id = $userL->id;
					$alternativeEmail->save();
					// cambia el token por nulo TODO
					// busca un usuario con el email alternativo
					$otroUsuario = Sentry::findUserByLogin($email);
					
					// si lo encuentra lo borra
					if(isset($otroUsuario->id)){
						$otroUsuario->activated = 0;
						$otroUsuario->save();
						// busca las cuentas donde el usuario borrado fue usado y las cambia por el nuevo user
						$cuentasAbiertas = Openaccount::where('user_idA', '=', $otroUsuario->id)->get();
						foreach($cuentasAbiertas as $ca){
							$ca->user_idA = $userL->id;
							$ca->save();
						}
						$cuentasAbiertasB = Openaccount::where('user_idB', '=', $otroUsuario->id)->get();
						foreach($cuentasAbiertasB as $ca){
							$ca->user_idB = $userL->id;
							$ca->save();
						}
						// lo mismo para nicknames alternativos
						$nicksalternativos = Alternativenickname::where('user_id', '=', $otroUsuario->id)->get();
						foreach($nicksalternativos as $ni){
							$ni->user_id = $userL->id;
							$ni->save();
						}
						$nicksalternativos = Alternativenickname::where('user_id_origen', '=', $otroUsuario->id)->get();
						foreach($nicksalternativos as $ni){
							$ni->user_id_origen = $userL->id;
							$ni->save();
						}
						// lo mismo para emails alternativos
						$mailsalternativos = Alternativeemail::where('user_id', '=', $otroUsuario->id)->get();
						foreach($mailsalternativos as $em){
							$em->user_id = $userL->id;
							$em->save();
						}
						$otroUsuario->delete();
					}
				}

				// busca las cuentas y los nicknames alternativos donde user a y b sean el logueado y las borra
				$cuentasIguales = Openaccount::where('user_idA', '=', $userL->id)->where('user_idB', '=', $userL->id)->get();
				foreach($cuentasIguales as $cig){
					$cig->delete();
				}
				$nicknamesIguales = Alternativenickname::where('user_id', '=', $userL->id)->where('user_id_origen', '=', $userL->id)->get();
				foreach($nicknamesIguales as $nig){
					$nig->delete();
				}
			}
		}catch(Exception $e){
			echo $e->getMessage();
		}

		return Redirect::to('/micuenta');
	}

	public function cambiamicuenta(){

		Validator::extend('alpha_spaces', function($attribute, $value)
		{
			return preg_match('/^[;):)\@\#\%\=\!\¡\¿\?\+\-\*\/\,\$\.\pL\s0-9]+$/u', $value);
		});

		$userL = Sentry::getUser();

		$name = Input::get('name');
		$password = Input::get('password');
		$email = Input::get('email');
		$userId = Input::get('user_id');

		$rules = array(
			'user_id' => array('required', 'numeric'),
	        'email'  => array('email'),
	        'pass' => array('alpha_num', 'min:1', 'max:50'),
	        'name' => array('alpha_spaces', 'min:1', 'max:50')
	    );

	    $validation = Validator::make(Input::all(), $rules);

	    if(!$validation->fails() && $userL->id == $userId){
	    	if($name!="")
	    		$userL->first_name = $name;
	    	if($password!="")
	    		$userL->password = $password;
	    	if($email!=""){
	    		// busca el email entre sus alternativos
	    		$alternativos = Alternativeemail::where('user_id', '=', $userL->id)->get();
	    		$encontrado = false;
	    		foreach($alternativos as $alternativo){
	    			if($alternativo->email == $email){
	    				$encontrado = true;
	    			}
	    		}
	    		if($encontrado){
	    			$userL->email = $email;
	    		}else{
	    			return Redirect::to('/micuenta/Lo sentimos pero no puedes usar un email que no hayas dado de alta (y validado) como email alternativo primero');
	    		}
	    	}
	    		
	    	if(isset($_FILES["photo"]["tmp_name"])){

	    		$nombreDeImagen = $userId . Rand(0,9999) . $_FILES["photo"]["name"];
		    	$target_dir = "uploads/";
				$target_dir = $target_dir . basename( $nombreDeImagen);
				$uploadOk=1;

				if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_dir)) {
				    $userL->image = $target_dir;
				}
				
		    }
	    	$userL->save();
	    }

	    return Redirect::to('/micuenta');
	}

	public function checamicuenta(){

		$respuesta['status'] = "success";
		$respuesta['message'] = "ok";

		Validator::extend('alpha_spaces', function($attribute, $value)
		{
			return preg_match('/^[;):)\@\#\%\=\!\¡\¿\?\+\-\*\/\,\$\.\pL\s0-9]+$/u', $value);
		});

		$userL = Sentry::getUser();

		$name = Input::get('name');
		$password = Input::get('password');
		$email = Input::get('email');

		$rules = array(
	        'email'  => array('email'),
	        'pass' => array('alpha_num', 'min:1', 'max:50'),
	        'name' => array('alpha_spaces', 'min:1', 'max:50')
	    );

	    $validation = Validator::make(Input::all(), $rules);

	    if(!$validation->fails()){
	    	
	    	
	    	if($email!=""){
	    		// busca el email entre sus alternativos
	    		$alternativos = Alternativeemail::where('user_id', '=', $userL->id)->get();
	    		$encontrado = false;
	    		foreach($alternativos as $alternativo){
	    			if($alternativo->email == $email){
	    				$encontrado = true;
	    			}
	    		}
	    		if($encontrado){
	    			$userL->email = $email;
	    		}else{
	    			$respuesta['status'] = "error";
					$respuesta['message'] = "Lo sentimos pero no puedes usar un email que no hayas dado de alta (y validado) como email alternativo primero";
	    		}
	    	}
	    		
	    }else{
	    	$respuesta['status'] = "error";
			$respuesta['message'] = "Por favor revisa que tus datos sean correctos";
	    }

	    echo json_encode($respuesta, 1);
	}

}