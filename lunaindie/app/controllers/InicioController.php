<?php

class InicioController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function inicio()
	{
		$userA = Sentry::getUser();
		if(isset($userA->id)){
			return Redirect::to("/bienvenido");	
		}
		return View::make("/alternativas/iniciob");	
		return View::make('inicio');
	}

	public function registrofront()
	{
		$userA = Sentry::getUser();
		if(isset($userA->id)){
			return Redirect::to("/bienvenido");	
		}
		return View::make("/alternativas/registrob");	
	}

	public function login($error = "")
	{
		$userA = Sentry::getUser();
		if(isset($userA->id)){
			return Redirect::to("/bienvenido");	
		}
		return View::make('/alternativas/loginb')->with('error', $error);
		return View::make('login')->with('error', $error);
	}

	public function loginback(){

		$respuesta['status'] = "success";
		$respuesta['message'] = "ok";

		$email = Input::get('email');
		$password = Input::get('password');

		$rules = array(
	        'password' => array('required', 'alpha_num', 'min:1', 'max:50'),
	        'email'  => array('required', 'email')
	    );

	    $validation = Validator::make(Input::all(), $rules);

		if(!$validation->fails()){
			try{
				$user = Sentry::findUserByCredentials(array(
		        	'email'      => $email,
		        	'password'	 => $password,
		    	));
				
				Sentry::login($user, false);
			}catch(Exception $e){
				$respuesta['status'] = "error";
				$respuesta['message'] = "Usuario o password incorrectos";
				//echo $e->getMessage();
			}
		}else{
			$respuesta['status'] = "error";
			$respuesta['message'] = "Usuario o password incorrectos";	
		}

		echo json_encode($respuesta, 1);
		
	}

	public function recuperarback(){

		$email = Input::get('email');

		$rules = array(
	        'email'  => array('required', 'email')
	    );

	    $validation = Validator::make(Input::all(), $rules);

		if(!$validation->fails()){
			try{
				$user = Sentry::findUserByLogin($email);
				
				if(isset($user->activated)){
					if($user->activated){
						// Let's get the activation code
					    $resetCode = $user->getResetPasswordCode();

					    // MAIL
		                $data=array();
		                
		                $data['mensaje'] = "Gracias por ser parte del sistema de Amigos Cash. <br> Por favor confirma tu deseo de recuperar contraseña haciendo click en el siguiente enlace: <a href='www.amigos.cash/recuperarpassword/".$user->id."/".$resetCode."'>Amigos.Cash/recuperarpassword/".$resetCode."</a> <br> Si crees que este email es un error por facor has caso omiso del mensaje"; 
		                $vista = 'emails.mensajegral';
		                $data['email'] = $email;
		                $nombre = $name = $user->first_name;
		                
		                Mail::queue($vista, $data, function($message) use ($email, $nombre)
		                {
		                    $message->to($email, $nombre)->subject('Recuperación de password');
		                });
		                // MAIL fin
					}
				}

			}catch(Exception $e){
				////echo $e->getMessage();
			}
		}

		$respuesta['status'] = "success";
		$respuesta['message'] = "Se ha enviado un email a tu dirección principal para que puedas recuperar tu password";	

		echo json_encode($respuesta, 1);
		////return View::make('mailenviado');
		
	}

	public function recuperarpassword($id="", $resetcode="", $error = "")
	{
		$userA = Sentry::getUser();
		if(isset($userA->id)){
			return Redirect::to("/");	
		}

		$this->layout = View::make('layouts.layoutmain');
		if(Sentry::check()){
			$estaLogeado = true;
		}else{
			$estaLogeado = false;
		}
		$this->layout->content = View::share(array('estaLogeado' => $estaLogeado));
		$this->layout->content = View::make('compradores/cambiapassword')->with('id', $id)->with('resetcode', $resetcode);
		////return View::make('compradores.cambiapassword')->with('error', $error)->with('resetcode', $resetcode)->with('id', $id);
	}

	public function finderecuperarpassword(){
		$id = Input::get('id');
		$password = Input::get('password');
		$resetcode = Input::get('resetcode');

		$rules = array(
	        'password' => array('required', 'alpha_num', 'min:1', 'max:50'),
	        'resetcode' => array('required', 'alpha_num', 'min:1', 'max:500'),
	        'id' => array('required', 'numeric'),
	    );

	    $validation = Validator::make(Input::all(), $rules);

	    $respuesta['status'] = "success";
		$respuesta['message'] = "Tu password ha sido modificado";

	    if(!$validation->fails()){
	    	try
			{
			    // Find the user using the user id
			    $user = Sentry::findUserById($id);

			    // Check if the reset password code is valid
			    if ($user->checkResetPasswordCode($resetcode))
			    {
			        // Attempt to reset the user password
			        if ($user->attemptResetPassword($resetcode, $password))
			        {
			            Sentry::login($user, false);
			        }else{
			        	$respuesta['status'] = "error";
						$respuesta['message'] = "Ha ocurrido un error, por favor vuelve a intentarlo";
			        }
			    }else{
			    	$respuesta['status'] = "error";
					$respuesta['message'] = "La liga que utilizas ha caducado";
			    }
			}catch(Exception $e){
				$respuesta['status'] = "error";
				$respuesta['message'] = "Ha ocurrido un error, por favor vuelve a intentarlo";
			}
	    }

	    echo json_encode($respuesta, 1);
	}

	public function registro(){

		$respuesta['status'] = "error";
		$respuesta['message'] = "";	

		Validator::extend('alpha_spaces', function($attribute, $value)
		{
			return preg_match('/^[;):)\@\#\%\=\!\¡\¿\?\+\-\*\/\,\$\.\pL\s0-9]+$/u', $value);
		});
		
		$name = Input::get('nombre');
		$email = Input::get('email');
		$password = Input::get('password');

		$rules = array(
	        'password' => array('required', 'alpha_num', 'min:1', 'max:50'),
	        'nombre' => array('required', 'alpha_spaces', 'min:1', 'max:50'),
	        'email'  => array('required', 'email')
	    );

	    $validation = Validator::make(Input::all(), $rules);

	    if(!$validation->fails()){
	    	// busca el email
			try{
				$user = Sentry::findUserByCredentials(array(
		        	'email'      => $email,
		    	));
				// si lo encuentra y no tiene password lo actualiza
				try{
					$user = Sentry::findUserByCredentials(array(
			        	'email'      => $email,
			    	));
			    	

					if(isset($user->id) && $user->activated == 0){
				    	// Let's register a user.
					    $user->first_name = $name;
					    $user->password = $password;
					   	$user->save();

					    // Let's get the activation code
					    $activationCode = $user->getActivationCode();

					    // MAIL
		                $data=array();
		                
		                $data['mensaje'] = "Gracias por registrarte en el sistema de Amigos Cash. <br> Por favor confirma tu dirección de email haciendo click en el siguiente enlace: <a href='www.amigos.cash/validacion/".$activationCode."'>Amigos.Cash/validacion/".$activationCode."</a>"; 
		                $vista = 'emails.mensajegral';
		                $data['email'] = $email;
		                $nombre = $name;
		                
		                Mail::queue($vista, $data, function($message) use ($email, $nombre)
		                {
		                    $message->to($email, $nombre)->subject('Bienvenido');
		                });
		                // MAIL fin

		                $respuesta['status'] = "success";
						$respuesta['message'] = "Usuario registrado con éxito";
		            }else{
		            	$respuesta['status'] = "error";
						$respuesta['message'] = "Usuario ya registrado";
		            }


				}catch(Exception $e){// si lo encuentra y tiene password manda mensaje de error de email registrado
					//return Redirect::to("/login/usuario o email no disponibles");
					
				}
				
			}catch(Exception $e){
				// si no lo encuentra lo registra
				try
				{
				    // Let's register a user.
				    $user = Sentry::createUser(array(
				    	'first_name'	=> $name,
				        'email'			=> $email,
				        'password'		=> $password,
				        'activated'		=> false,
				    ));

				    // Let's get the activation code
				    $activationCode = $user->getActivationCode();

				    // MAIL
	                $data=array();
	                
	                $data['mensaje'] = "Gracias por registrarte en el sistema de Amigos Cash. <br> Por favor confirma tu dirección de email haciendo click en el siguiente enlace: <a href='www.amigos.cash/validacion/".$activationCode."'>Amigos.Cash/validacion/".$activationCode."</a>"; 
	                $vista = 'emails.mensajegral';
	                $data['email'] = $email;
	                $nombre = $name;
	                
	                Mail::queue($vista, $data, function($message) use ($email, $nombre)
	                {
	                    $message->to($email, $nombre)->subject('Bienvenido');
	                });
	                // MAIL fin
	                

				    // Send activation code to the user so he can activate the account
				    $respuesta['status'] = "success";
					$respuesta['message'] = "Usuario registrado con éxito";
				}
				catch (Exception $e)
				{
					//echo $e->getMessage();
				    $respuesta['status'] = "error";
					$respuesta['message'] = $e->getMessage();
				}
			}
			
			// TODO una vista de gracias checa tu mail
			//return Redirect::to("/");
	    }else{
	    	$respuesta['status'] = "error";
			$respuesta['message'] = "Por favor verifica tus datos";
	    }

		//return Redirect::to("/login/usuario o email no disponibles");
		

		echo json_encode($respuesta, 1);
	}

	// valida el código de registro
	public function validacion($codigo)
	{
		// busca el codigo
		try{
			$user = Sentry::findUserByActivationCode($codigo);
			// si lo encuentra lo activa
			$user->attemptActivation($codigo);

			// lo logea
			Sentry::login($user, false);

			return Redirect::to("/");

		}catch(Exception $e){
			echo $e->getMessage();
		}
		
		////return Redirect::to("/");
	}

	public function bienvenido(){
		$userA = Sentry::getUser();
		// obtiene sus cuentas abiertas
		$cuentasAbiertasFavor = Openaccount::where("balance", ">=", 0)->where('user_idA', '=', $userA->id)->get();
		$cuentasAbiertasContra = Openaccount::where("balance", "<", 0)->where('user_idA', '=', $userA->id)->get();
		$cuentasAbiertasFavorInvertidas = Openaccount::where("balance", "<=", 0)->where('user_idB', '=', $userA->id)->get();
		$cuentasAbiertasContraInvertidas = Openaccount::where("balance", ">", 0)->where('user_idB', '=', $userA->id)->get();
		$conteo = count($cuentasAbiertasFavor) + count($cuentasAbiertasContra) + count($cuentasAbiertasFavorInvertidas) + count($cuentasAbiertasContraInvertidas);

		// obtiene sus cuentas con interés TODO
		$cuentasInteresFavor = Openaccount::where('user_idA', '=', 1000)->where("balance", "<", 0)->get();
		$cuentasInteresContra = Openaccount::where('user_idA', '=', 1000)->where("balance", "<", 0)->get();

		return View::make('alternativas/bienvenido')
			->with("userA", $userA)
			->with("cuentasAbiertasFavor", $cuentasAbiertasFavor)
			->with("cuentasAbiertasContra", $cuentasAbiertasContra)
			->with("cuentasAbiertasFavorInvertidas", $cuentasAbiertasFavorInvertidas)
			->with("cuentasAbiertasContraInvertidas", $cuentasAbiertasContraInvertidas)
			->with("cuentasInteresFavor", $cuentasInteresFavor)
			->with("conteo", $conteo)
			->with("cuentasInteresContra", $cuentasInteresContra);
	}

}