var config = {
	'app_id' : '1010066242371959',
	'max_pick': 5,
	'redirect_uri': 'http://dev.digitalartsnetwork.mx/~jlespinoza/fbpick/',
	'app_scope': '',
	'friends': [],
	'friend_limit': 20,
	'current_friends': [],
	'selected_friends_ids': [],
	'selected_friends_objects': [],
	'share_link': 'https://apps.facebook.com/nissanmarchmx/',
	'userID': ''
}
FB.init({
	appId :	config.app_id,
	status:	true,
	cookie:	true,
	xfbml:	true,
	oauth:	true
});
$(document).ready(function(){

	$('#facebookLogin').on('click', function (event){
		event.preventDefault();
		FB.getLoginStatus( function (res){
			dan_fb.resTest(res);
		});
	})

	$('#friendLookup').on('submit', function (event){
		event.preventDefault();
		var lookFor = $('#friendLooking').val();
		dan_fb.friendSearch(lookFor);
	});

	$('.friendPages').on('click', '.friendPageChange',function (event){
		event.preventDefault();
		var offset = $(this).data('offset');
		dan_fb.friendChangePage(offset);
	});
	$('#friendPicker').on('click', '.friendItem', function (event){
		event.preventDefault();
		var uid = $(this).data('friendid');
		var index = $(this).data('friendindex');
		dan_fb.friendSelect(uid, config.current_friends[index]);
	});
	$('#saveMail').on('click', function (event){
		event.preventDefault();
		dan_fb.perms('mail');
	});
	$('#sharePage').on('click', function (event){
		event.preventDefault();
		dan_fb.share();
	});
});
	
var dan_fb = {
	dan_fb: this,
	perms: function (type){
		switch(type){
			case 'mail':
				FB.login(function(res){
					dan_fb.askMail();
				},{scope: 'email'});
				break;
			default:
				FB.login(function(res){
					dan_fb.resTest(res);
				});
				break;
		}

	},
	friendGet: function(userID){
		FB.api({
				method: 'fql.query',
				query: 'SELECT uid,first_name,last_name,pic_square,name FROM user WHERE uid IN (SELECT uid1 FROM friend WHERE uid2='+ userID +') ORDER BY first_name'
			}, function(friends){
				config.friends = friends;
				dan_fb.friendPicker(0, friends, false);
			}
		);
	},
	friendPicker: function(offset, friends, change){
		config.current_friends = friends;
		console.log(friends);
		/*
		$('#friendPicker').empty();
		var i = 0;
		while (i <= config.friend_limit)
		{
			$('#friendPicker').append('<li class="friendItem" data-friendid="'+ friends[offset].uid +'" data-friendindex="'+ offset +'"><img src="' + friends[offset].pic_square + '" /> ' + friends[offset].name + ' id: ' + friends[offset].uid  + '</li>');
			offset++;
			if( offset == friends.length) break;
			i++;
		};
		if(!change){
			dan_fb.friendPaginate(friends);
		}
		*/
	},
	friendPaginate: function(friends){
		$('.friendPages').empty();
		var pages =  parseInt(friends.length) / parseInt(config.friend_limit);
		if ( pages > 1 ){
			var i = 0;
			while ( i <= pages ){
				var offsetMake = ( i * config.friend_limit);
				i++;
				$('.friendPages').append(' <button type="button" class="btn btn-default friendPageChange" data-offset="'+ offsetMake +'">'+ i +'</button>');
			};
			$('.friendPages').prepend('<button type="button" class="btn btn-default friendPageChange prevPage" data-offset="0">Anterior</button>');
			$('.friendPages').append(' <button type="button" class="btn btn-default friendPageChange nextPage" data-offset="'+ config.friend_limit +'">Siguiente</button>');
			$('.btn-group').button();
		};
	},
	friendSearch: function(string){
		var results = [];
		var searchRegex = new RegExp(string, 'i');
		$.each(config.friends  ,function (index, value){

			if(searchRegex.test(value.name)){
				results.push(config.friends[index]);
			}
		});
		dan_fb.friendPicker(0, results, false);
	},
	friendChangePage: function(offset){
		var prevOffset = offset - config.friend_limit;
		var nextOffset = offset + config.friend_limit;
		if( nextOffset < config.current_friends.length || prevOffset >= 0 ){
			$('.prevPage').data('offset', prevOffset);
			$('.nextPage').data('offset', nextOffset);
		};
		dan_fb.friendPicker(offset, config.current_friends, true);
	},
	friendSelect: function(uid, object){		
		var dupe = $.inArray(uid, config.selected_friends_ids);
		if( dupe < 0 && config.selected_friends_ids.length < config.max_pick ){
			config.selected_friends_ids.push(uid);
			config.selected_friends_objects.push(object);
		}
		$('#pickedFriends').empty();
		$.each( config.selected_friends_objects, function (index, value){
			$('#pickedFriends').append('<li><img src="'+ value.pic_square + '" /> ' + value.name + ' id: ' + value.uid  + '</li>');
		});
	},
	share: function(uid){
		FB.ui({
			app_id: config.app_id,
			method: 'send',
			link: config.share_link
		});
	},
	askMail: function(){
		FB.api({
				method: 'fql.query',
				query: 'SELECT email, name, uid FROM user WHERE uid=' + config.userID
			}, function(response){
				console.log(response);
				if( ! response[0].email ){
					//
				}else{
					console.log('mail obtenido')
				}
			});


	},
	resTest: function(res){
		if( res ){
			var authStatus = res.status;
			switch(authStatus){
				case "unknown":
					dan_fb.perms();
					break;
				case "not_authorized":
					dan_fb.perms();
					break;
				case "connected":
					//do auth
					$('#facebookLogin').hide();
					$('#picker').show();
					config.userID = res.authResponse.userID;
					dan_fb.friendGet(config.userID);
					break;
				default: 
					dan_fb.perms();
					break;
			}
		}
	},
	addApp: function(){
		FB.ui({
		  method: 'pagetab',
		  redirect_uri: config.redirect_uri
		}, function(response){
			console.log(response)
		});
	}
}


	/*

	function iniciar(){
		FB.init({
			appId :	config.app_id,
			status:	true,
			cookie:	true,
			xfbml:	true,
			oauth:	true
		});
		FB.getLoginStatus(function(response) {
			if (response.authResponse) {
				if (response.status === "unknown") { 
					PedirPermisos();
				}else if(response.status === "not_authorized") {
					PedirPermisos();
				}else {
				 	//window.location= "http://localhost/~ecruz/fbnote/";
				UserId = response.authResponse.userID;
				if(!UserId) { UserId = response.session.uid; }
				console.log(UserId);
				PedirNombre(UserId);
				listaAmigos(UserId);
				}
			}else {
				PedirPermisos(); 

			}
		}, true);
	}

	function PedirPermisos() {
		window.location="https://www.facebook.com/dialog/oauth?client_id="+ config.app_id +"&redirect_uri="+ config.redirect_uri +"scope=" + config.app_scope;
	}




	function PedirNombre(UserId){
		//alert("pidiendo nombre");

			FB.api({
				method: 'fql.query',
				query: 'SELECT name FROM user WHERE uid='+UserId
			},nombre
		);
	}


	

	function nombre(response){
		var UserName = response[0].name;
		console.log(UserName);

	}

	function listaAmigos(UserId){
		//alert("pidiendo nombre");

			FB.api({
				method: 'fql.query',
				query: 'SELECT uid,first_name,last_name,pic_square,name FROM user WHERE uid IN (SELECT uid1 FROM friend WHERE uid2='+UserId+') ORDER BY first_name'
			},lista
		);
	}


	amigosApp = function(){
		FB.api({
				method: 'fql.query',
				query: 'SELECT uid, name, pic_square FROM user WHERE is_app_user  AND uid IN (SELECT uid2 FROM friend WHERE uid1 = me()) ORDER BY first_name'
				},listado
			);
	}

	listado = function(response){
		//console.log(response);
	}


	

	function lista(response){
		console.log(response);		
		for (var i=0;i<response.length;i++)

			$("#contenido").append('<div class="amigos"><input class="btn" type="checkbox" name="amigo" value="'+response[i].uid+'"><img class="fotoAmigo" src="'+response[i].pic_square+'"/><a class="nombreAmigo">'+response[i].name+'</a></div>');

	}
/*////////////////// busqieda personalizada  ////////////////////////////// */
/*	function buscarAmigos(value){
		console.log('select * from (SELECT uid,first_name,last_name,pic_square,name FROM user WHERE uid IN (SELECT uid1 FROM friend WHERE uid2= me()) as res where first_name LIKE "%'+value+'%")');
	FB.api({
				method: 'fql.query',
				query: 'SELECT uid,first_name,last_name,pic_square,name FROM user WHERE uid IN (SELECT uid1 FROM friend WHERE uid2='+UserId+') AND strpos(lower(first_name),"'+value+'") >=0 ORDER BY first_name'

			},listaBuscar
		);
	
    	
	}


		function listaBuscar(response){
		console.log(response);
		$('#contenido').empty();	
	
		for (var i=0;i<response.length;i++)

			$("#contenido").append('<div class="amigos"><input class="btn" type="checkbox" name="amigo" value="'+response[i].uid+'"><img class="fotoAmigo" src="'+response[i].pic_square+'"/><a class="nombreAmigo">'+response[i].name+'</a></div>');

	}

/*////////////////// busqieda personalizada  ////////////////////////////// */
/*////////////////// friend picker   ////////////////////////////// */	

/*	function enviarMensaje(matches){
		to = matches;
		console.log(to.length);


		for (var a=0; a < to.length;a++){ 
			para = to[a];
			FB.ui({
		        app_id:'config.app_id',
		        method: 'send',
		        name: "prueba",
		        link: 'https://apps.facebook.com/config.app_id',
		        picture: 'http://cdn.projeqt.com/web/grid/2049/46660a5e78e617c44f4127221111c0c3.jpg',
		        to:para,
		        description:'gdsfgkl'

		    });
		}
	
    	
	}
*/
	/*////////////////// friend picker   ////////////////////////////// */	




 




	function publicar2() {
		FB.ui(
			{
				method: 'stream.publish',
				message: 'NISSAN',
				attachment: {
					name: 'NISSAN NOTE2013',
					caption: ' nissan note2013',
					  media: [{
                				type: 'flash',
                				display:'iframe',
								swfsrc: 'https://tequiladigitalmexico.com/nissannote/360.swf',
								imgsrc: 'http://imagesci.com/img/2013/04/nissan-logo-wallpaper-4718-hd-wallpapers.jpg',
 								expanded_width:  '390',
           						expanded_height: '390'}],
					description: (
					'Conoce el nuevo nissan note 2013'
				),
				href: 'http://nissan.com.mx/note/registro',
 			
				},
				action_links: [
					{ text: 'NISSAN', href: 'http://nissan.com.mx/note/registro' }
				],
				user_message_prompt: 'Escribe un comentario'
			},
			function(response) {
			}
		);
	}


	