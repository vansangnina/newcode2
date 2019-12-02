<?php
	/**
	 * Application Main Page That Will Serve All Requests
	 *
	 * @package Simple Nina Framework
	 * @author  Hiếu Nguyễn <nguyenhieunina@gmail.com>
	 * @version 1.0.0
	 * @license http://nina.vn
	 */
	defined( 'ROOT' ) ?:  define( 'ROOT', dirname(__DIR__));
	defined( 'AJAX' ) ?:  define( 'AJAX', "AJAX" );
	require_once ROOT . '/Library/Autoload.php';

	@$pid = $_POST['pid'];
	@$act = $_POST['act'];
	@$size = $_POST['size'];
	@$mausac = $_POST['mausac'];

	if($_POST['soluong']>0){
		@$soluong = $_POST['soluong'];
	}else {
		@$soluong = 1;
	}

    switch($act){
		//-------------capnhat------------------
		case 'add':
		    $result_giohang = \Library\Cart::addtocart($pid,$soluong,$size,$mausac);
		    $count = count($_SESSION['cart']);

			$html ='<ul class="item_cart ul">';
            if(is_array($_SESSION['cart'])){
                $max=count($_SESSION['cart']);
                for($i=0;$i<$max;$i++){
                    $pid=$_SESSION['cart'][$i]['productid'];
                    $q=$_SESSION['cart'][$i]['qty'];
                    $pro_info = \Library\Cart::get_product_info($pid);
                    if($q==0) continue;
                $html .= '<li><a href="san-pham/'.$pro_info['slug'].'.html"><img src="'._upload_product_l.'80x80x1/'.$pro_info['thumb'].'" alt="'.$pro_info['name_'.$lang].'" class="img" /></a><h3>'.$pro_info['name_'.$lang].'</h3><p class="price">'._gia.' : '.number_format($pro_info['price'],0, ',', '.').'&nbsp;đ</p><p class="amount">Số lượng :  '.$q.'</p><a class="view" href="san-pham/'.$pro_info['slug'].'.html">Xem</a></li>';
            } } 
            $html .= '</ul>';
            $result = array('result_giohang' => $result_giohang,'count' => $count,'html'=>$html);
			echo json_encode($result);
			break;

		case 'capnhat':
			$max=count($_SESSION['cart']);
			for($i=0;$i<$max;$i++){
				$pids=$_SESSION['cart'][$i]['productid'];
				$sizes=$_SESSION['cart'][$i]['size'];
				$mausacs=$_SESSION['cart'][$i]['mausac'];
				if($pids==$pid && $size==$sizes && $mausac==$mausacs ){
					if($soluong>0 && $soluong<=999){
						$soluong = str_replace(",", '.', $soluong);
						$_SESSION['cart'][$i]['qty']=$soluong;
					}
				}
			}
			$price_item = number_format($cart->get_price($pid)*$soluong,0, ',', '.')." &nbsp; VND ";
			$full_item = number_format($cart->get_order_total(),0, ',', '.')." &nbsp; VND ";
			$get_order_info = array('price_item' => $price_item ,'full_item' => $full_item);
			echo json_encode($get_order_info);
			break;
			
		case 'delete':
		    $cart->remove_product($pid,$size,$mausac);
		    echo $full_item = number_format($cart->get_order_total(),0, ',', '.')." &nbsp; VND ";
			break;
		case 'deleteall':
		    unset($_SESSION['cart']);
		    echo $full_item = number_format($cart->get_order_total(),0, ',', '.')." &nbsp; VND ";
			break;
		case 'shipping':

			\Library\ClassPDO::bindMore(array("id"=>$_POST['id']));
			$shipping  =  \Library\ClassPDO::row("select * from #_title where id=:id ");
			$thongtin = json_decode($shipping['attributes'],true);

		    echo $full_item = number_format(\Library\Cart::get_order_total()+str_replace(',','',$thongtin['phiship']),0, ',', '.')." &nbsp;VND ";
			break;
		default: 
			
			break;

	}