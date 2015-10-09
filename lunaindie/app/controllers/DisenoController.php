<?php

class DisenoController extends BaseController {

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
		$userL = Sentry::getUser();
		$this->layout = View::make('layouts.layoutdiseno');
		$this->layout->content = View::share(array('userL' => $userL));

		if($userL->banderaDisenador == 1){
			$this->layout->content = View::make('diseno/inicio');
		}else{
			$this->layout->content = View::make('diseno/registro');
		}		
	}


	public function registrodisenador(){
		Validator::extend('alpha_spaces', function($attribute, $value)
		{
			return preg_match('/^[;):)\@\#\%\=\!\¡\¿\?\+\-\*\/\,\$\.\pL\s0-9]+$/u', $value);
		});

		$email = Input::get('email');
		$nickname = Input::get('nickname');
		$cuentaId = Input::get('cuenta_id');
		$amigoId = Input::get('amigo_id');

		$rules = array(
	        'nickname' => array('required', 'alpha_spaces', 'min:1', 'max:50'),
	        'cuenta_id' => array('required', 'numeric'),
	        'amigo_id' => array('required', 'numeric'),
	        'email'  => array('required', 'email')
	    );

	    $validation = Validator::make(Input::all(), $rules);
	    $encontrado = false;

		if(!$validation->fails()){
			echo "obvio si valió todo";
		}

		if(isset($_FILES["ejemplo1"]["tmp_name"])){
			$nombreDeImagen = Rand(0,9999) . $_FILES["ejemplo1"]["name"];
	    	$target_dir = "ejemplos/";
			$target_dir = $target_dir . basename( $nombreDeImagen);
			
			try{
				move_uploaded_file($_FILES["ejemplo1"]["tmp_name"], $target_dir);
			}catch(Exceotion $e){
				echo $e->getMessage();
			}
			
	    }

		return "hola";
	}

}
