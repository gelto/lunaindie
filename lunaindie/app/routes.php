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
Route::post('/soyadministrador/edicionPrenda', array('before' => 'csrf', 'uses'=>'AdminsController@edicionPrenda'));
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


//**** PAYPAL ****//

Route::get('/curlchafa', function(){
	

    $message = "client_credentials";
     
    // Set POST variables
    $url = 'https://api.sandbox.paypal.com/v1/oauth2/token';
     
    $fields = array(
                    'data'              => array( "grant_type" => $message ),
                    );
     
    $headers = array(
                        "Accept: application/json",
                        "Accept-Language: en_US"
                    );

    $user_agent = array(
                        "EOJ2S-Z6OoN_le_KS1d75wsZ6y0SFdVsY9183IvxFyZp: EClusMEUk8e9ihI7ZdVLF5cZ6y0SFdVsY9183IvxFyZp"
                    );
     
    
    // Open connection
    $ch = curl_init();
     
    // Set the url, number of POST vars, POST data
    curl_setopt( $ch, CURLOPT_URL, $url );
     
    curl_setopt( $ch, CURLOPT_POST, true );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt( $ch, CURLOPT_USERAGENT, $user_agent);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
     
    curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
     
    // Execute post
    $result = curl_exec($ch);
     
    // Close connection
    curl_close($ch);

    return $result;
});

Route::get('/curl', function(){
    $ch = curl_init();
    $clientId = "AdZJlOhgLPBVOLIu5lHWucN3NbGR8KAIQvD7gOkzNIHJxQIIRcSMn53vrbnVUZG5X7B1ht46krtEjq-9";
    $secret = "EIMFQEF70CDiBuVCCuwhkLsQADxVMxSkdQtPBX5u4ZMpCdOAvaHYq7kDp_0LXZsVZLyvoGU2ouJ-WCdP";

    

    curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/oauth2/token");
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_USERPWD, $clientId.":".$secret);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

    $result = curl_exec($ch);

    if(empty($result))die("Error: No response.");
    else
    {
        $json = json_decode($result);
        print_r($json->access_token);
    }

    curl_close($ch);
});

Route::get('/curlcall', function(){
    $ch = curl_init();
    $token = "A101.0LQQfb5im4Gj-H7Y3RWX4-medJvrpslplZVUmM0OEudWr-4PkXnmwqjr9cvA-7dh._KPCc0NwV50kwwem1lP-dwdynpS";
    $clientId = "AdZJlOhgLPBVOLIu5lHWucN3NbGR8KAIQvD7gOkzNIHJxQIIRcSMn53vrbnVUZG5X7B1ht46krtEjq-9";
    $secret = "EIMFQEF70CDiBuVCCuwhkLsQADxVMxSkdQtPBX5u4ZMpCdOAvaHYq7kDp_0LXZsVZLyvoGU2ouJ-WCdP";

    $headers = array(
                        "Content-Type: application/json",
                        "Authorization: Bearer A101.0LQQfb5im4Gj-H7Y3RWX4-medJvrpslplZVUmM0OEudWr-4PkXnmwqjr9cvA-7dh._KPCc0NwV50kwwem1lP-dwdynpS"
                    );

    $fields = array(    "intent" => "sale",
                        "redirect_urls" => array(   "return_url"=>"http://example.com/your_redirect_url.html",
                                                    "cancel_url"=>"http://example.com/your_cancel_url.html" ),
                        "payer" => array("payment_method"=>"paypal"),
                        "transactions" => array("amount"=>array("total"=>"7.47",
                                                                "currency"=>"USD"))

                    );

    $fields2 = json_decode('{  "intent":"sale",  "redirect_urls":{    "return_url":"http://example.com/your_redirect_url.html",    "cancel_url":"http://example.com/your_cancel_url.html"  },  "payer":{    "payment_method":"paypal"  },  "transactions":[    {      "amount":{        "total":"7.47",        "currency":"USD"      }    }  ]}', true);

    

    curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/payments/payment");
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_USERPWD, $clientId.":".$secret);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields2 ) );

    $result = curl_exec($ch);

    if(empty($result))die("Error: No response.");
    else
    {
        /*return $result;
        $json = json_decode($result);
        print_r($json->access_token);*/
    }

    curl_close($ch);
});

Route::get('/curlcall2', function(){
    $ch = curl_init();
    $token = "A101.0LQQfb5im4Gj-H7Y3RWX4-medJvrpslplZVUmM0OEudWr-4PkXnmwqjr9cvA-7dh._KPCc0NwV50kwwem1lP-dwdynpS";
    $clientId = "AdZJlOhgLPBVOLIu5lHWucN3NbGR8KAIQvD7gOkzNIHJxQIIRcSMn53vrbnVUZG5X7B1ht46krtEjq-9";
    $secret = "EIMFQEF70CDiBuVCCuwhkLsQADxVMxSkdQtPBX5u4ZMpCdOAvaHYq7kDp_0LXZsVZLyvoGU2ouJ-WCdP";

    $headers = array(
                        "Content-Type: application/json",
                        "Authorization: Bearer A101.0LQQfb5im4Gj-H7Y3RWX4-medJvrpslplZVUmM0OEudWr-4PkXnmwqjr9cvA-7dh._KPCc0NwV50kwwem1lP-dwdynpS"
                    );

    $fields = array(    "intent" => "sale",
                        "redirect_urls" => array(   "return_url"=>"http://lunaindie.local/paypalback1",
                                                    "cancel_url"=>"http://lunaindie.local/paypalback2" ),
                        "payer" => array("payment_method"=>"paypal"),
                        "transactions" => array("amount"=>array("total"=>"7.47",
                                                                "currency"=>"USD"))

                    );

    $fields2 = json_decode('{  "intent":"sale",  "redirect_urls":{    "return_url":"http://example.com/your_redirect_url.html",    "cancel_url":"http://example.com/your_cancel_url.html"  },  "payer":{    "payment_method":"paypal"  },  "transactions":[    {      "amount":{        "total":"7.47",        "currency":"USD"      }    }  ]}', true);

    

    curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/payments/payment");
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_USERPWD, $clientId.":".$secret);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields2 ) );

    $result = curl_exec($ch);

    if(empty($result))die("Error: No response.");
    else
    {
        return $result;
        $json = json_decode($result);
        print_r($json->access_token);
    }

    curl_close($ch);
});

Route::get('/paypalback1', function(){
    return "hola";
});
Route::get('/paypalback2', function(){
    return "hola";
});
Route::get('paypaltest', array('uses' => 'PaypalController@inicio'));
			

//**** PAYPAL FIN ****//


