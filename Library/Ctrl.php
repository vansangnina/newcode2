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
use \Library\AltoRouter;

class Ctrl {
	public static function router(){
		// map('Phương thức','Link','Model','View','Name','Type','Title Com' );
        $router = new AltoRouter(array(),C_FOLDER);
 	 	   
	    $router->map( 'GET', '/','Index','Index','index','',_trangchu);
	    $router->map( 'GET', '/ngon-ngu/[a:name].html','Index','Index','ngonngu','ngonngu',_ngonngu);

	    $router->map( 'GET', '/gioi-thieu.html','About','About','about','gioithieu',_gioithieu);

	    $router->map( 'GET', '/san-pham.html','Product','Product','Product','product',_sanpham);
	    $router->map( 'GET', '/san-pham/[a:idl]','Product','Product','ProductList','product',_sanpham);
	    $router->map( 'GET', '/san-pham/[a:idl]/[a:idc]','Product','Product','ProductCat','product',_sanpham);
	    $router->map( 'GET', '/san-pham/[a:idl]/[a:idc]/[a:idi]','Product','Product','ProductItem','product',_sanpham);
	    $router->map( 'GET', '/san-pham/[a:id].html','Product','ProductDetail','ProductDetail','product',_sanphamchitiet);
	    $router->map( 'GET', '/tin-tuc.html','News','News','News','tintuc',_tintuc);
	    $router->map( 'GET', '/tin-tuc/[a:id].html','News','NewsDetail','tinchitiet','tintuc',_tintuc);

	    $router->map( 'GET', '/tu-van.html','News','News','tuvan','tuvan',_tuvan);
	    $router->map( 'GET', '/tu-van/[a:id].html','News','NewsDetail','tuvanchitiet','tuvan',_tuvan);

		$router->map( 'GET', '/dich-vu.html','Service','Service','dichvu','dichvu',_dichvu);
	    $router->map( 'GET', '/dich-vu/[a:id].html','Service','ServiceDetail','dichvuchitiet','dichvu',_dichvu);

	    $router->map( 'GET', '/chinh-sach.html','Service','Service','chinhsach','chinhsach',_chinhsach);
	    $router->map( 'GET', '/chinh-sach/[a:id].html','Service','ServiceDetail','chinhsachchitiet','chinhsach',_chinhsach);

	    $router->map( 'GET|POST', '/tim-kiem.html','Search','Search','Search','timkiem',_timkiem);
	    $router->map( 'GET|POST', '/lien-he.html','Contact','Contact','Contact','lienhe',_lienhe);
	    $router->map( 'GET|POST', '/gio-hang.html','Cart','Cart','Cart','Cart',_giohang);
	    $router->map( 'GET|POST', '/thanh-toan.html','Payment','Payment','Payment','Payment',_thanhtoan);
	    $router->map( 'GET|POST', '/xac-nhan.html','ConfirmCart','ConfirmCart','ConfirmCart','ConfirmCart',_xacnhanthanhtoan);

	    $router->map( 'GET|POST', '/admin','Admin','Admin','Admin','Admin','');
	    $router->map( 'GET|POST', '/admin/[a:com]/[a:act]','Admin','Admin','Admin1','Admin','');
	    $router->map( 'GET|POST', '/admin/[a:com]/[a:act]/[a:type]','Admin','Admin','Admin2','Admin','');
	    
		$match = $router->match();
		if( $match ) {
			if(is_callable( $match['target'] ) ) {
				call_user_func_array( $match['target'], $match['params'] ); 
			} else {
				$model = $match['target'];		
				$view = $match['view'];
				$type = $match['type'];
				$title = $match['title'];
				$params = $match['params'];
				$com = $match['com'];
				
				if($match['type']=='Admin'){
					if(count($match['params'])>0){
						foreach ($match['params'] as $key => $value) {
							$_GET[$key]=$value;
						}
					} else {
						$_GET['com']='index';
					}
				} else {
					if(count($match['params'])>0){
						foreach ($match['params'] as $key => $value) {
							$_GET[$key]=$value;
						}
					}
				}
					
			}
		} else {
				// no route was matched
				$view = '404';
				header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
		}

        $object = (object) array();
        $object->view = $view;
        $object->model = $model;
        $object->type = $type;
        $object->title= $title;
        $object->params= $params;
        $object->com= $com;
        return $object;
    }
}