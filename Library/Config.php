<?php 
	
	/**
	 * Application Main Page That Will Serve All Requests
	 *
	 * @package Simple Nina Framework
	 * @author  Hiếu Nguyễn <nguyenhieunina@gmail.com>
	 * @version 1.0.0
	 * @license http://nina.vn
	 */

	defined( 'C_EMAIL' ) ?:  define( 'C_EMAIL', 'contact@demo48.ninavietnam.org' );
	defined( 'C_PASS' ) ?:  define( 'C_PASS', 'TOYYhYFr' );
	defined( 'C_IP' ) ?:  define( 'C_IP', '210.2.64.70' );
	defined( 'C_FOLDER' ) ?:  define( 'C_FOLDER', '/codemoi');
	defined( 'C_URL' ) ?:  define( 'C_URL', $_SERVER["SERVER_NAME"].C_FOLDER );
	defined( 'C_BASE' ) ?:  define( 'C_BASE', "http://".C_URL.'/' );
	defined( 'ADM' ) ?:  define( 'ADM', "Administrator" );

	$config['debug']=0;
	$config['lang']=array("vi"=>"Tiếng việt","en"=>"Tiếng anh");
	$config['activelang'] = 'vi';
	$config['ip'] = $_SERVER['REMOTE_ADDR'];
	$config['PageAdmin'] = array(10,20,50,100,200,500);

	$config['servername'] = 'localhost';
	$config['username'] = 'demo48_tvp';
	$config['password'] = 'OChIyocIQ';
	$config['database'] = 'demo48_tvp';
	$config['refix'] = 'table_';
	
	$config['setup']['dongdau']['active'] = 'false';
	$config['setup']['dongdau']['loai'] = 'admin';
	$config['setup']['responsive'] = 'true';
	$config['setup']['mobile'] = 'false';
	$config['setup']['amp'] = 'false';
	$config['setup']['cart'] = 'true';

	@define ( _updating , "Đang cập nhật thông tin" );
	@define ( _upload_download_l , 'upload/download/' );
	@define ( _upload_hinhanh_l , 'upload/hinhanh/' );
	@define ( _upload_product_l , 'upload/product/' );
	@define ( _upload_post_l , 'upload/post/' );
	@define ( _upload_album_l , 'upload/album/' );
	@define ( _upload_tieude_l , 'upload/tieude/' );
	@define ( _upload_cate_l , 'upload/cate/' );

?>