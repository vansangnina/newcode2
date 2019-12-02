<?php if(!defined('_lib')) die("Error");
 $d = new database($config['database']); 
 if(!isset($_SESSION['cookie']) && empty($_SESSION['login'])) {
        CheckCookieLogin();
 }

 $router = new AltoRouter();
 	 	   
    $router->map( 'GET', '/', 'index','trangchu');
    
    $router->map( 'GET', '/lien-he.html', 'contact','lienhe');

    $router->map( 'GET', '/activationemail', 'activation_email','kichhoattaikhoan');

    $router->map( 'GET', '/kien-thuc.html', 'knowledge','kienthuc');
   
    $router->map( 'GET|POST', '/kien-thuc/[a:name].html', 'knowledge','chitietkienthuc');

    $router->map( 'GET|POST', '/register.html', 'register','dangky');

    $router->map( 'GET|POST', '/login.html', 'login','dangnhap');
    
    $router->map( 'GET', '/logout.html', function() {
    	 unset($_SESSION['login']);
         setcookie('cookiehash', "", time() - 3600,'/',$_SERVER["SERVER_NAME"]);          
         header('Location: '.get_url_refer());  
	}, 'thoat');


	$match = $router->match();	

	//print_r($match);
	if( $match ) {
		if(is_callable( $match['target'] ) ) {
				call_user_func_array( $match['target'], $match['params'] ); 
		}else{
			$source = $match['target'];		
			$template = isset($match['params']['name']) ? $match['target']."_detail" : $match['target'];
		}
	} else {
			// no route was matched
			$template = '404';
			header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
		}
	
    if($source!="") include _source.$source.".php";


    //print_r($_COOKIE);