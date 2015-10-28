<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


//**** USUARIOS CLIENTES ********//
Route::filter('logeado', function()
{
    if ( ! Sentry::check())
    {
        if(isset($_SERVER['REQUEST_URI'])){
            Session::put('redireccion', $_SERVER['REQUEST_URI']);
        }
        
        return Redirect::to('/');
    }
});

Route::post('/registro', array('before' => 'csrf', 'uses' => 'InicioController@registro'));
Route::get('/validacion/{codigo?}', array('uses' => 'InicioController@validacion'));

Route::post('/loginback', array('before' => 'csrf', 'uses'=>'InicioController@loginback'));
Route::post('/recuperarback', array('before' => 'csrf', 'uses'=>'InicioController@recuperarback'));
Route::get('/recuperarpassword/{id}/{resetcode}/{error?}', array('uses' => 'InicioController@recuperarpassword'));
Route::post('/finderecuperarpassword', array('before' => 'csrf', 'uses'=>'InicioController@finderecuperarpassword'));

Route::get('/logout', function()
{
    if ( Sentry::check())
    {
        Sentry::logout();
    }
    
    return Redirect::to('/');
});

Route::get('/', array('uses'=>'PersonasController@inicio'));


//**** USUARIOS CLIENTES FIN ****//

//**** USUARIOS DISEÑADORES ********//
Route::get('/soydisenador', array('before' => 'logeado', 'uses' => 'DisenoController@ruteador'));
Route::get('/soydisenador/mensajes/{indice?}', array('before' => 'logeado', 'uses' => 'DisenoController@mensajes'));
Route::get('/soydisenador/inventarios/{indice?}/{edicion_id?}', array('before' => 'logeado', 'uses' => 'DisenoController@inventarios'));
Route::get('/soydisenador/registro', array('before' => 'logeado', 'uses' => 'DisenoController@registro'));
Route::post('/registrodisenador', array('before' => 'csrf', 'uses'=>'DisenoController@registrodisenador'));
Route::post('/soydisenador/solicitudPrenda', array('before' => 'csrf', 'uses'=>'DisenoController@solicitudPrenda'));
Route::post('/soydisenador/edicionPrenda', array('before' => 'csrf', 'uses'=>'DisenoController@edicionPrenda'));
Route::post('/soydisenador/mensajenuevo', array('before' => 'csrf', 'uses'=>'DisenoController@mensajenuevo'));

//**** USUARIOS DISEÑADORES FIN ****//

//**** CMS ********//
Route::filter('inventariosYsubastas', function()
{
    $solicitudes = Prenda::where('status', '=', 'SOLICITADA')->get();
    View::share(array('solicitudes' => $solicitudes));

    // inventarios activos
    $activos = Prenda::where('status', '=', 'ACTIVO')->get();
    View::share(array('activos' => $activos));

    // inventarios activo agotados
    $agotados = Prenda::where('status', '=', 'AGOTADO')->get();
    View::share(array('agotados' => $agotados));

    // inventarios rechazados
    $rechazados = Prenda::where('status', '=', 'RECHAZADO')->get();
    View::share(array('rechazados' => $rechazados));

    // subastas
    $subastas = Prenda::where('status', '=', 'SUBASTA')->get();
    View::share(array('subastas' => $subastas));

    // isubastas terminadas
    $subastasterminadas = Prenda::where('status', '=', 'SUBASTATERMINADA')->get();
    View::share(array('subastasterminadas' => $subastasterminadas));

});
Route::get('/soyadministrador', array('before' => 'logeado', 'uses' => 'AdminsController@inicio'));
Route::get('/soyadministrador/mensajes/{indice?}/{user_id?}', array('before' => 'logeado', 'before' => 'inventariosYsubastas', 'uses' => 'AdminsController@mensajes'));
Route::post('/soyadministrador/mensajenuevo', array('before' => 'csrf', 'uses'=>'AdminsController@mensajenuevo'));
Route::get('/soyadministrador/inventarios/{modo}/{indice?}/{edicion_id?}', array('before' => 'logeado', 'before' => 'inventariosYsubastas', 'uses' => 'AdminsController@inventarios'));
//**** CMS FIN ****//

//**** TONTERIAS ********//
Route::get('/tonterias', function()
{
	$final = 1;
	$valor = 500;
	for($i=0;$i<10000;$i++){
		//echo $valor . "<br>";
		$valor += 30;
		$valor *= 1.002;
		if($valor > 1000000){
			$final = $i;
			break;
		}
	}
	return $final;
});

Route::get('/ccc', function()
{
	$ahorro = $valorQueNoConozco = 8000;
	$factor = 1;
	
	for($i=0;$i<10;$i++){
		echo "ahorro año " . $i . " " . $ahorro . "<br>";
		$factor*=1.04;
		$valorQueNoConozcoDelSiguienteAno = $factor * $valorQueNoConozco;
		$ahorro += $valorQueNoConozcoDelSiguienteAno;
		
	}
	for($i=10;$i<32;$i++){
		echo "ahorro año " . $i . " " . $ahorro . "<br>";
		$ahorro *= 1.04;
		
	}
	echo $ahorro . "<br><br><br><br><br>";

	$alFinal = 0;
	for($i=0;$i<10;$i++){
		echo 8000 * pow(1.04, $i) . "<br>";
		$alFinal += 8000 * pow(1.04, $i);
	}

	return $alFinal;




});
//**** TONTERIAS FIN ****//


