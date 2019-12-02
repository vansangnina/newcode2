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
use \Library\Model;
use \Library\ClassPDO;
use \Library\Functions;
use \Library\Lang;
class Cart { 

	public $lang;
    
	public static function get_product_info($pid){
		ClassPDO::bindMore(array("id"=>$pid));
    	$row  =  ClassPDO::row("select name_".Lang::lang().",slug,price,oldprice,thumb from #_product where id=:id");
		return $row;
	}
	
	public static function get_price($pid){
		ClassPDO::bindMore(array("id"=>$pid));
    	$row  =  ClassPDO::row("select price from table_product where id=:id");
		return $row['price'];
	}

	public function getsize($pid){
		ClassPDO::bindMore(array("id"=>$pid));
    	$row  =  ClassPDO::row("select name_".$this->lang." from table_title where id=:id");
		return $row['name_'.$this->lang];
	}

	public function getmausac($pid){
		ClassPDO::bindMore(array("id"=>$pid));
    	$row  =  ClassPDO::row("select name_".$this->lang.",id,attributes from table_title where id=:id ");
    	$attr = json_decode($row['attributes'],'true');
		return "<button class='mausac' style='background:".$attr['color']."' rel='".$row['id']."'>".$row['name_'.$this->lang]."</button>";
	}
		
	public function get_thumb($pid){
		ClassPDO::bindMore(array("id"=>$pid));
    	$row  =  ClassPDO::row("select thumb from table_product where id=:id");
		return $row['thumb'];
	}
	public function remove_product($pid,$size,$mausac){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid'] && $size==$_SESSION['cart'][$i]['size'] && $mausac==$_SESSION['cart'][$i]['mausac']){
				unset($_SESSION['cart'][$i]);
				break;
			}
		}
		$_SESSION['cart']=array_values($_SESSION['cart']);
	}
	public function remove_pro_thanh($pid){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid']){
				unset($_SESSION['cart'][$i]);
				break;
			}
		}
		$_SESSION['cart']=array_values($_SESSION['cart']);
		Functions::redirect('thanh-toan.html');
	}
	public static function get_order_total(){
		$max=count($_SESSION['cart']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=$_SESSION['cart'][$i]['qty'];
			$price=self::get_price($pid);
			$sum+=$price*$q;
		}
		return $sum;
	}
	public static function addtocart($pid,$q,$size='',$mausac=''){
		if($pid<1 or $q<1) return;
		
		if(is_array($_SESSION['cart'])){
			if(self::product_exists($pid,$q,$size,$mausac)) return 0;
			$max=count($_SESSION['cart']);
			$_SESSION['cart'][$max]['productid']=$pid;
			$_SESSION['cart'][$max]['qty']=$q;
			$_SESSION['cart'][$max]['size']=$size;
			$_SESSION['cart'][$max]['mausac']=$mausac;
			return count($_SESSION['cart']);
		}
		else{
			$_SESSION['cart']=array();
			$_SESSION['cart'][0]['productid']=$pid;
			$_SESSION['cart'][0]['qty']=$q;
			$_SESSION['cart'][0]['size']=$size;
			$_SESSION['cart'][0]['mausac']=$mausac;
			return count($_SESSION['cart']);	
		}
	}
	static public function product_exists($pid,$q,$size,$mausac){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		$flag=0;
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid'] && $size==$_SESSION['cart'][$i]['size'] && $mausac==$_SESSION['cart'][$i]['mausac']){
				$_SESSION['cart'][$i]['qty'] = $_SESSION['cart'][$i]['qty'] + $q;
				$flag=1;
				break;
			}
		}
		return $flag;
	}
}
?>