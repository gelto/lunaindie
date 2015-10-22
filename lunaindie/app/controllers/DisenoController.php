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

	public function ruteador()
	{
		$userL = Sentry::getUser();
		
		if($userL->banderaVendedor == 1){
			return Redirect::to('/soydisenador/mensajes');
		}else{
			return Redirect::to('/soydisenador/registro');
		}		
	}

	public function registro(){
		$userL = Sentry::getUser();
		$this->layout = View::make('layouts.layoutdiseno');
		$this->layout->content = View::share(array('userL' => $userL));
		$this->layout->content = View::make('diseno/registro');
	}

	public function mensajes($indice = 0){
		$userL = Sentry::getUser();
		$this->layout = View::make('layouts.layoutdiseno');
		$this->layout->content = View::share(array('userL' => $userL));

		$mensajes = Mensaje::where('user_id', '=', $userL->id)->orderBy('id', 'DESC')->take(250)->get();
		if($indice > 0){
			$indice -= 1;
		}
		$this->layout->content = View::make('diseno/inicio')->with('mensajes', $mensajes)->with('inicio', $indice);
	}

	public function inventarios($indice = 0){
		$userL = Sentry::getUser();
		$this->layout = View::make('layouts.layoutdiseno');
		$this->layout->content = View::share(array('userL' => $userL));

		$misPrendas = Prenda::where('user_id', '=', $userL->id)->where('status', '!=', 'RECHAZADA')->take(1000)->get();

		if($indice > 0){
			$indice -= 1;
		}
		$this->layout->content = View::make('diseno/inventarios')->with('misPrendas', $misPrendas)->with('inicio', $indice);
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

	public function solicitudPrenda(){

		$userL = Sentry::getUser();

		Validator::extend('alpha_spaces', function($attribute, $value)
		{
			return preg_match('/^[;):)\@\#\%\=\!\¡\¿\?\+\-\*\/\,\$\.\pL\s0-9]+$/u', $value);
		});

		$tiutloPrenda = Input::get('tiutloPrenda');
		$categoriaPrenda = Input::get('categoriaPrenda');
		$precioPrenda = Input::get('precioPrenda');
		$medidasPrenda = Input::get('medidasPrenda');
		$coloresPrenda = Input::get('coloresPrenda');
		$descripcionPublico = Input::get('descripcionPublico');
		$descripcionDetallada = Input::get('descripcionDetallada');

		$rules = array(
	        'tiutloPrenda' => array('required', 'alpha_spaces', 'min:1', 'max:150'),
	        'precioPrenda' => array('required', 'numeric'),
	        'categoriaPrenda' => array('required', 'numeric'),
	        'medidasPrenda' => array('required', 'alpha_spaces', 'min:1', 'max:500'),
	        'coloresPrenda' => array('required', 'alpha_spaces', 'min:1', 'max:500'),
	        'descripcionPublico' => array('required', 'alpha_spaces', 'min:1', 'max:5000'),
	        'descripcionDetallada' => array('required', 'alpha_spaces', 'min:1', 'max:5000'),
	    );

	    $validation = Validator::make(Input::all(), $rules);

	    if(!$validation->fails() && isset($_FILES["imagenPrincipal"]["tmp_name"]) && isset($_FILES["imagen2"]["tmp_name"]) && isset($_FILES["imagen3"]["tmp_name"]) && isset($_FILES["imagen4"]["tmp_name"]) && isset($_FILES["imagen5"]["tmp_name"])){
			if(isset($_FILES["imagenPrincipal"]["tmp_name"])){
				$nombreDeImagen = $userL->id . "_" . Rand(0,9999) . $_FILES["imagenPrincipal"]["name"];
		    	$target_dir = "solicitudes/";
				$target_dir = $target_dir . basename( $nombreDeImagen);
				move_uploaded_file($_FILES["imagenPrincipal"]["tmp_name"], $target_dir);	
				$nombre1 = $nombreDeImagen;
		    }

		    if(isset($_FILES["imagen2"]["tmp_name"])){
				$nombreDeImagen = $userL->id . "_" . Rand(0,9999) . $_FILES["imagen2"]["name"];
		    	$target_dir = "solicitudes/";
				$target_dir = $target_dir . basename( $nombreDeImagen);
				move_uploaded_file($_FILES["imagen2"]["tmp_name"], $target_dir);	
				$nombre2 = $nombreDeImagen;
		    }

		    if(isset($_FILES["imagen3"]["tmp_name"])){
				$nombreDeImagen = $userL->id . "_" . Rand(0,9999) . $_FILES["imagen3"]["name"];
		    	$target_dir = "solicitudes/";
				$target_dir = $target_dir . basename( $nombreDeImagen);
				move_uploaded_file($_FILES["imagen3"]["tmp_name"], $target_dir);	
				$nombre3 = $nombreDeImagen;
		    }

		    if(isset($_FILES["imagen4"]["tmp_name"])){
				$nombreDeImagen = $userL->id . "_" . Rand(0,9999) . $_FILES["imagen4"]["name"];
		    	$target_dir = "solicitudes/";
				$target_dir = $target_dir . basename( $nombreDeImagen);
				move_uploaded_file($_FILES["imagen4"]["tmp_name"], $target_dir);	
				$nombre4 = $nombreDeImagen;
		    }

		    if(isset($_FILES["imagen5"]["tmp_name"])){
				$nombreDeImagen = $userL->id . "_" . Rand(0,9999) . $_FILES["imagen5"]["name"];
		    	$target_dir = "solicitudes/";
				$target_dir = $target_dir . basename( $nombreDeImagen);
				move_uploaded_file($_FILES["imagen5"]["tmp_name"], $target_dir);	
				$nombre5 = $nombreDeImagen;
		    }

		    // se crea la prenda
		    $prenda = new Prenda();
		    $prenda->user_id = $userL->id;
		    $prenda->titulo = $tiutloPrenda;
		    $prenda->precio = $precioPrenda;
		    $prenda->categoria_id = $categoriaPrenda;
		    $prenda->descripcionPublico = $descripcionPublico;
		    $prenda->descripcionDetallada = $descripcionDetallada;
		    $prenda->save();

		    // se crean las medidas, los colores, las cantidades y las imágenes
		    $medidasObjetos = "";
		    $coloresObjetos = "";

		    $medidasArray = explode('#', $medidasPrenda);
		    foreach($medidasArray as $medidaLocal){
		    	$medida = new Medida();
		    	$medida->prenda_id = $prenda->id;
		    	$medida->medida = $medidaLocal;
		    	$medida->save();
		    	$medidasObjetos[] = $medida;
		    }

		    $coloresArray = explode('#', $coloresPrenda);
		    foreach($coloresArray as $colorLocal){
		    	$color = new Color();
		    	$color->prenda_id = $prenda->id;
		    	$color->color = $colorLocal;
		    	$color->save();
		    	$coloresObjetos[] = $color;
		    }


		    $i=0;
		    foreach($medidasObjetos as $medidaLocal){
		    	foreach($coloresObjetos as $colorLocal){
		    		$aux = Input::get('cantidadPrenda#'.$medidaLocal->medida.'#'.$colorLocal->color.'');
		    		$inventario = new Inventario();
			    	$inventario->prenda_id = $prenda->id;
			    	$inventario->medida_id = $medidaLocal->id;
			    	$inventario->color_id = $colorLocal->id;
			    	$inventario->cantidad = $aux;
			    	$inventario->save();
			    }
		    }


		    $imagenesporprenda1 = new Imagenesporprenda(); 
		    $imagenesporprenda1->prenda_id = $prenda->id;
		    $imagenesporprenda1->nombreImagen = $nombre1;
		    $imagenesporprenda1->save();
		    $imagenesporprenda2 = new Imagenesporprenda(); 
		    $imagenesporprenda2->prenda_id = $prenda->id;
		    $imagenesporprenda2->nombreImagen = $nombre2;
		    $imagenesporprenda2->save();
		    $imagenesporprenda3 = new Imagenesporprenda(); 
		    $imagenesporprenda3->prenda_id = $prenda->id;
		    $imagenesporprenda3->nombreImagen = $nombre3;
		    $imagenesporprenda3->save();
		    $imagenesporprenda4 = new Imagenesporprenda(); 
		    $imagenesporprenda4->prenda_id = $prenda->id;
		    $imagenesporprenda4->nombreImagen = $nombre4;
		    $imagenesporprenda4->save();
		    $imagenesporprenda5 = new Imagenesporprenda(); 
		    $imagenesporprenda5->prenda_id = $prenda->id;
		    $imagenesporprenda5->nombreImagen = $nombre5;
		    $imagenesporprenda5->save();

		    // se manda un mensaje al diseñador
		    $mensaje = new Mensaje();
		    $mensaje->user_id = $userL->id;
		    $mensaje->texto = "Hemos recibido tu solicitud de nueva prenda, el folio de tu solicitud es ". $userL->id . "_" . $prenda->id . ", nuestro equipo lo evualará en unos momentos. Por favor espera el mensaje de respuesta para continuar con el proceso. Si tienes dudas sobre el proceso para que tu prenda sea puesta en venta revisa nuestra sección de PROCESO DE SUBIDA";
		    $mensaje->imagen = "/public/solicitudes/".$nombre1;
		    $mensaje->origen = "SISTEMA";
		    $mensaje->save();

		    //TODO enviar mail

		    return Redirect::to('soydisenador/mensajes/');

		}else{
			echo "obvio si valió todo";
		}

		

	}


	public function mensajenuevo(){

		$userL = Sentry::getUser();

		Validator::extend('alpha_spaces', function($attribute, $value)
		{
			return preg_match('/^[;):)\@\#\%\=\!\¡\¿\?\+\-\*\/\,\$\.\pL\s0-9]+$/u', $value);
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
		    $mensaje->origen = "USUARIO";
		    $mensaje->save();

		    return Redirect::to('soydisenador/mensajes/');

		}else{
			echo "obvio si valió todo";
		}

		

	}

}
