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

		$mensajesSinLeer = Mensaje::where('origen', '=', 'USUARIO')->orderBy('status', 'DESC')->orderBy('id', 'DESC')->take(250)->get();
		if($user_id > 0){
			$mensajesSinLeer = Mensaje::where('user_id', '=', $user_id)->orderBy('status', 'DESC')->orderBy('id', 'DESC')->take(250)->get();
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

		    // quita el sin leer a los mensajes de ese usuario
		    $todosLosMensajes = Mensaje::where('user_id', '=', $usuario->id)
		    								->where('created_at', '<', $mensaje->created_at)
		    								->where('status', '=', 'SINLEER')
		    								->get();
		    foreach($todosLosMensajes as $mensajeLocal){
		    	$mensajeLocal->status = "CONTESTADO";
		    	$mensajeLocal->save();
		    }

		    return Redirect::to('soyadministrador/mensajes/');

		}else{
			echo "obvio si valió todo";
		}

	}


	public function inventarios($modo = "", $indice = 0, $edicion_id = 0){
		$userL = Sentry::getUser();
		$this->layout = View::make('layouts.layoutadmin');
		$this->layout->content = View::share(array('userL' => $userL));

		if($indice > 0){
			$indice -= 1;
		}

		if($edicion_id != 0){

			Session::put('edicion_id',$edicion_id); // esta sesión se va a comprobar cuando se envíe
			$prendaEditar = Prenda::find($edicion_id);
			$prendas = Prenda::where('user_id', '=', $prendaEditar->user_id)->get();

			if(isset($prendaEditar)){
				$this->layout->content = View::make('admins/inventarios')->with('prendas', $prendas)->with('modoTitulo', 'PRENDA')->with('inicio', $indice)->with('prendaEditar', $prendaEditar);
			}else{
				return Redirect::to('/soyadministrador/inventarios/prenda/'.$indice.'/'.$edicion_id);
			}
		}else{
			if($modo == "activos"){
				$prendas = Prenda::where('status', '=', 'ACTIVA')->take(1000)->get();
				$modoTitulo = "ACTIVAS";
			}
			if($modo == "agotados"){
				$prendas = Prenda::where('status', '=', 'AGOTADA')->take(1000)->get();
				$modoTitulo = "AGOTADAS";
			}
			if($modo == "rechazados"){
				$prendas = Prenda::where('status', '=', 'RECHAZADA')->take(1000)->get();
				$modoTitulo = "RECHAZADAS";
			}
			if($modo == "subastas"){
				$prendas = Prenda::where('status', '=', 'SUBASTA')->take(1000)->get();
				$modoTitulo = "SUBASTANDOSE";
			}
			if($modo == "subastasterminadas"){
				$prendas = Prenda::where('status', '=', 'SUBASTATERMINADA')->take(1000)->get();
				$modoTitulo = "SUBASTAS AGOTADAS";
			}
			if($modo == "solicitudes"){
				$prendas = Prenda::where('status', '=', 'SOLICITADA')->take(1000)->get();
				$modoTitulo = "SOLICITADAS";
			}

			$this->layout->content = View::make('admins/inventarios')
									->with('prendas', $prendas)
									->with('modoTitulo', $modoTitulo)
									->with('inicio', $indice);
			
		}

	}

}
