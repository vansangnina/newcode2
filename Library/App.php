<?php
namespace Library;
/**
* Application Main Page That Will Serve All Requests
*
* @package Simple Nina Framework
* @author  Hiếu Nguyễn <nguyenhieunina@gmail.com>
* @version 1.0.0
* @license http://nina.vn
*/

class App {
	
	/**
	 * Array Holds Application Instances
	 * @var array
	 */
	protected static $instances = [];

	/**
	 * Register An Application Instance
	 * @param  String $key      Instance Name
	 * @param  Object $instance Instance
	 * @return Null
	 */
	public static function register( $key, $instance )
	{
		if( !isset( self::$instances[ $key ] ) )
		{
			// Register
			self::$instances[ $key ] = $instance;
		}
	}

	/**
	 * Get An Registerd Instance
	 * @param  String $key Instance Name
	 * @return Mixed      Object If Found Otherwise Null
	 */
	public static function get( $key )
	{
		return self::has( $key ) ? self::$instances[ $key ] : null;
	}

	
	/**
	 * Check If An Instance Registered
	 * @param  String  $key Instance name
	 * @return boolean
	 */
	public static function has( $key )
	{
		return isset( self::$instances[ $key ] );
	}

	public static function hasError($type){
		switch ($type) { 
			case 'email': $error = 'Email không hợp lệ'; break; 
			case 'username': $error = 'Username không được rỗng'; break; 
			case 'password': $error = 'Password không hợp lệ'; break; 
			default: break;
		}
		return $error;
	}
	
}