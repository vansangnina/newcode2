<?php 
	namespace Library;
	// Define App Directories
		/**
	 * Application Main Page That Will Serve All Requests
	 *
	 * @package Simple Nina Framework
	 * @author  Hiếu Nguyễn <nguyenhieunina@gmail.com>
	 * @version 1.0.0
	 * @license http://nina.vn
	 */
class Lang{
	public static $config;
	public function __construct($config)
    { 
    	self::define();
    	static::$config = $config;
    	//return self::lang();
    }
    static public function getCurrentPageURL() {
	    $pageURL = 'http';
	    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	    $pageURL .= "://";
	    if ($_SERVER["SERVER_PORT"] != "80") {
	        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	    } else {
	        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	    }
		$pageURL = explode("&page=", $pageURL);
	    return $pageURL[0];
	}

	public static function define(){
		$url_tk = ROOT.DS."upload/lang/lang_".self::lang().".json";
        $myfile = fopen($url_tk, "r") or die("Unable to open file!");
        $json_lang = json_decode(fgets($myfile), true);
        foreach ($json_lang as $key => $value) {
            @define($key,$value);
        }
	}

	public static function lang(){
		self::getlang();
		if(!isset($_SESSION['lang']))
		{
			$_SESSION['lang']='vi';
		}
			$lang=$_SESSION['lang'];
		return $lang;
	}

	public static function Multilang(){
		
		return static::$config['lang'];
	}

	public static function langadmin(){
		if(!isset($_SESSION['langadmin']))
		{
			$_SESSION['langadmin']='vi';
		}
			$lang=$_SESSION['langadmin'];
		return $lang;
	}
	
	public static function getlang(){
		if($_GET['lang']!=''){
			$_SESSION['lang']=$_GET['lang'];
			header("location:".$_SESSION['links']);
		} else {
			$_SESSION['links']=Lang::getCurrentPageURL();
		}
	}

}
?>