<?php
	/**
	 * Application Main Page That Will Serve All Requests
	 *
	 * @package Simple Nina Framework
	 * @author  Hiếu Nguyễn <nguyenhieunina@gmail.com>
	 * @version 1.0.0
	 * @license http://nina.vn
	 */
	session_start();
	$_SESSION['ONWEB'] = true;
	defined( 'DS' ) ?:  define( 'DS', DIRECTORY_SEPARATOR );
	defined( 'LIB' ) ?:  define( 'LIB', ROOT.DS.'Library'.DS );
	defined( 'MODEL' ) ?:  define( 'MODEL', ROOT.DS.'Model'.DS );
	defined( 'VIEW' ) ?:  define( 'VIEW', ROOT.DS.'View'.DS );
	defined( 'LAYOUT' ) ?:  define( 'LAYOUT', VIEW.'Layout'.DS );
	defined( 'ADDON' ) ?:  define( 'ADDON', LAYOUT.'Addon'.DS );
	defined( 'ASSETS' ) ?:  define( 'ASSETS', ROOT.DS.'Assets'.DS );
	require_once LIB."Config.php";
	defined( 'DB_HOSTNAME' ) ?:  define( 'DB_HOSTNAME', $config['servername'] );
	defined( 'DB_NAME' ) ?:  define( 'DB_NAME', $config['database'] );
	defined( 'DB_USERNAME' ) ?:  define( 'DB_USERNAME', $config['username'] );
	defined( 'DB_USERPWD' ) ?:  define( 'DB_USERPWD', $config['password'] );
	defined( 'DB_REFIX' ) ?:  define( 'DB_REFIX', $config['refix'] );
	
    function _autoload($file){
    	$file = ROOT.DS.str_replace("\\","/",trim($file,'\\')).'.php';
    	if(file_exists($file)){
    		require_once $file;
    	}
    }
	spl_autoload_register('_autoload');
	Library\ClassPDO::openConnection();
	if(!defined('AJAX')){
		new \Library\Controller($config);
	} else {
		if(!isset($_SESSION['ONWEB'])){ DIE("You have no permission to here ! ");}
		$db = new \Library\ClassPDO();
		$cart = new \Library\Cart();
		$func = new \Library\Functions();
	}