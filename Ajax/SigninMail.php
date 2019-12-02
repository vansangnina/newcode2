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
	$act=$_POST['act'];
	$email=$_POST['email'];
	$hoten=$_POST['hoten'];
	$dienthoai=$_POST['dienthoai'];
	$diachi=$_POST['diachi'];
	$noidung=$_POST['noidung'];
	$gioitinh=$_POST['gioitinh'];
	
	switch ($act) {
		case 'dangkymail':
			$db->bindMore(array("email"=>$_POST['email']));
			$maill  =  $db->query("select id from #_newsletter where email=:email ");

			if(count($maill)!=0){
				echo 1;
			} else {
				if(isset($_POST['email'])){
					$data['email'] = $_POST['email'];
					$data['name'] = $_POST['hoten'];
					$data['content'] = $_POST['noidung'];
					$data['sex'] = $_POST['gioitinh'];
					$data['address'] = $_POST['diachi'];
					$data['phone'] = $_POST['dienthoai'];
					$data['datecreate'] = date('Y-m-d H:i:s');
					$db->setTable('newsletter');
					if($db->insert($data))
						echo 0;
					else
						echo 2;
				}
				
			}
		break;
		
		default:
			// code...
			break;
	}
?>