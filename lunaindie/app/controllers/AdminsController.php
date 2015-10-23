<?php

class AdminsController extends BaseController {

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
		$this->layout = View::make('layouts.layoutadmin');
		$this->layout->content = View::make('admins/inicio');
	}

	public function mensajes($indice = 0, $user_id=0){
		$userL = Sentry::getUser(); // administrador
		$this->layout = View::make('layouts.layoutadmin');
		$this->layout->content = View::share(array('userL' => $userL));

		$mensajesSinLeer = Mensaje::where('status', '=', 'SINLEER')->where('origen', '=', 'USUARIO')->take(250)->get();
		if($user_id > 0){
			$mensajesSinLeer = Mensaje::where('user_id', '=', $user_id)->orderBy('id', 'DESC')->take(250)->get();
		}
		if($indice > 0){
			$indice -= 1;
		}
		$this->layout->content = View::make('admins/mensajes')->with('mensajes', $mensajesSinLeer)->with('inicio', $indice)->with('user_id', $user_id);
	}

	public function mensajenuevo(){

		$userL = Sentry::getUser();

		Validator::extend('alpha_spaces', function($attribute, $value)
		{
			return preg_match('/^[;):)\_\@\#\%\=\!\¡\¿\?\+\-\*\/\,\$\.\pL\s0-9]+$/u', $value);
		});

		$mensajeContacto = Input::get('mensaje');
		$usuario_id = Input::get('usuario');

		

		$rules = array(
	        'mensaje' => array('required', 'alpha_spaces', 'min:1', 'max:5000'),
	        'usuario' => array('required', 'numeric'),
	    );

	    $validation = Validator::make(Input::all(), $rules);

	    if(!$validation->fails()){

			if(isset($_FILES["imagenPrincipal"]["tmp_name"])){
				$nombreDeImagen = $userL->id . "_" . Rand(0,9999) . $_FILES["imagenPrincipal"]["name"];
		    	$target_dir = "mensajesImg/";
				$target_dir = $target_dir . basename( $nombreDeImagen);
				move_uploaded_file($_FILES["imagenPrincipal"]["tmp_name"], $target_dir);	
				$nombre1 = $nombreDeImagen;
		    }


		    // se manda un mensaje al administrador
		    $usuario = User::find($usuario_id);
		    $mensaje = new Mensaje();
		    $mensaje->user_id = $usuario->id;
		    $mensaje->texto = $mensajeContacto;
		    $mensaje->imagen = "/public/mensajesImg/".$nombre1;
		    $mensaje->origen = "ADMINISTRADOR";
		    $mensaje->save();

		    return Redirect::to('soydisenador/mensajes/');

		}else{
			echo "obvio si valió todo";
		}

	}


	public function inventarios($indice = 0, $edicion_id = 0){
		$userL = Sentry::getUser();
		$this->layout = View::make('layouts.layoutdiseno');
		$this->layout->content = View::share(array('userL' => $userL));

		$prendasSolicitadas = Prenda::where('status', '=', 'SOLICITADA')->take(1000)->get();
		$prendasEnEsperaDeInventario = Prenda::where('status', '=', 'ENESPERA')->take(1000)->get();
		$prendasActivas = Prenda::where('status', '=', 'ACTIVA')->take(1000)->get();

		if($edicion_id != 0){
			Session::put('edicion_id',$edicion_id); // esta sesión se va a comprobar cuando se envíe

			$prendaEditar = Prenda::where('user_id', '=', $userL->id)
									->where('status', '!=', 'RECHAZADA')
									->where('id', '=', $edicion_id)
									->take(1)->get();

									//return $prendaEditar[0]->categoria->descripcion;
			if(isset($prendaEditar[0])){
				if($indice > 0){
					$indice -= 1;
				}
				$this->layout->content = View::make('admins/inventarios')->with('misPrendas', $misPrendas)->with('inicio', $indice)->with('prendaEditar', $prendaEditar[0]);
			}else{
				return Redirect::to('/soyadministrador/inventarios/'.$indice.'/'.$edicion_id);
			}
		}else{
			if($indice > 0){
				$indice -= 1;
			}
			$this->layout->content = View::make('admins/inventarios')
									->with('prendasSolicitadas', $prendasSolicitadas)
									->with('prendasEnEsperaDeInventario', $prendasEnEsperaDeInventario)
									->with('prendasActivas', $prendasActivas)->with('inicio', $indice);
		}

		
	}

}
