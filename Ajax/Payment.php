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
	

	$row_setting  =  $db->row("select * from #_setting limit 0,1");

	$ten_input=$_POST['ten'];
	$diachi_input=$_POST['diachi'];
	$dienthoai_input=$_POST['dienthoai'];
	$email_input=$_POST['email'];
	$noidung_input=$_POST['noidung'];
	$phuongthuc_input=$_POST['phuongthuc'];
	$tinhthanh=$_POST['tinhthanh'];
	$id_shipping=$_POST['shipping'];
	$quanhuyen=$_POST['quanhuyen'];

	$db->bindMore(array("id"=>$phuongthuc_input));
	$pt_thanhtoan  =  $db->row("select * from #_title where id=:id ");
	$title_phuongthuc = $pt_thanhtoan['name_'.$lang];

	if($_POST['shipping']==0){
		$phi_vc = 'Miển phí';
	} else {
		$db->bindMore(array("id"=>$id_shipping));
		$shipping  =  $db->row("select * from #_title where id=:id ");
		$thongtin = json_decode($shipping['attributes'],true);
		$phiship = str_replace(',','',$thongtin['phiship']);
		$phi_vc = number_format($phiship,0,",",",").' VND';
	}
	
	include_once LIB."phpMailer/class.phpmailer.php";	
		$mail = new PHPMailer();
		$mail->IsSMTP(); // Gọi đến class xử lý SMTP
		$mail->Host       = C_IP; // tên SMTP server
		$mail->SMTPAuth   = true;                  // Sử dụng đăng nhập vào account
		$mail->Username   = C_EMAIL; // SMTP account username
		$mail->Password   = C_PASS;  
		//Thiet lap thong tin nguoi gui va email nguoi gui
		$mail->SetFrom(C_EMAIL,$row_setting['name_'.$lang]);
		$mail->AddAddress($row_setting['email'],$row_setting['name_'.$lang]);
		//$mail->AddAddress($email_input, $ten_input);		
		/*=====================================
		 * THIET LAP NOI DUNG EMAIL
 		*=====================================*/

		//Thiết lập tiêu đề
		$mail->Subject    = '['.$_POST['ten'].']';
		$mail->IsHTML(true);
		//Thiết lập định dạng font chữ
		$mail->CharSet = "utf-8";	
		$body = '<table border="0" width="100%">';
		$body .= '
				<tr>
					<th align="left" colspan="2">
					<table width="100%">
					<tr>
					<td><font size="4">Thông tin đặt hàng từ website <a href="'.$config['config_base'].'">www.'.$config_url.'</a></font> 
					</td>
					<td align="right";><img src="'.$config['config_base'].'/'._upload_hinhanh_l.$banner_top[0]['photo'].'" ></td>
					</tr>
					</table>
					
					</th>
				</tr>

				<tr>
					<th width="30%" align="left">'._hoten.' :</th>
					<td>&nbsp; '.$_POST['ten'].'</td>
				</tr>
				
				<tr>
					<th align="left">Email :</th>
					<td>&nbsp; '.$_POST['email'].'</td>
			    </tr>
				<tr>
					<th align="left">'._dienthoai.' :</th>
					<td>&nbsp; '.$_POST['dienthoai'].'</td>
			    </tr>
				<tr>
					<th align="left">'._diachi.' :</th>
					<td>&nbsp; '.$_POST['diachi'].'</td>
			    </tr>
			    <tr>
					<th align="left">'._tinhthanh.' :</th>
					<td>&nbsp; '.$_POST['tinhthanh'].'</td>
			    </tr>

			    <tr>
					<th align="left">'._quanhuyen.' :</th>
					<td>&nbsp; '.$_POST['quanhuyen'].'</td>
			    </tr>
				
				<tr>
					<th align="left">'._phuongthucthanhtoan.' :</th>
					<td>&nbsp; '.$title_phuongthuc.'</td>
			    </tr>

			    <tr>
					<th align="left">'._phivanchuyen.':</th>
					<td>&nbsp; '.$phi_vc.'</td>
			    </tr>

				<tr>
					<th align="left">'._noidung.' :</th>
					<td >&nbsp; '.$_POST['noidung'].'</td>
			    </tr>
				<tr>
					<th align="left" colspan="2">&nbsp;</th>
			    </tr>';
  
        $body.='
		<tr>
		
        <td height="19" colspan="2" align="right" valign="top" class="content" style="background: #D2E6DD;"><span class="cat"></span>
		<table border="1" bordercolor="#0099CC" align="center" cellpadding="5px" cellspacing="5px" width="100%">';
			if(is_array($_SESSION['cart']))
			{
            	$body.='<tr bgcolor="#16AAB8"><td>'._thutu.'</td><td>'._hinhanh.'</td><td>'._ten.'</td><td>'._gia.'</td><td>'._soluong.'</td><td>'._tonggia.'</td></tr>';
				$max=count($_SESSION['cart']);
				for($i=0;$i<$max;$i++){
					$pid=$_SESSION['cart'][$i]['productid'];
					$q=$_SESSION['cart'][$i]['qty'];
					$pro_info = $cart->get_product_info($pid);
					
					if($q==0) continue;
            		$body.='<tr><td>'.($i+1).'</td>';
					$body.='<td> <a href="'.$config['config_base'].'/san-pham/'.$pro_info['slug'].'.html" target="_blank"><img src="'.$config['config_base'].'/upload/product/'.$pro_info['thumb'].'" width="70" /></a></td>';
            		$body.='<td><a href="'.$config['config_base'].'/san-pham/'.$pro_info['slug'].'.html" target="_blank">'.$pro_info['name_'.$lang].'</a></td>';
                    $body.='<td>'.number_format($cart->get_price($pid),0, ',', '.').'&nbsp;VND</td>';
                    $body.='<td>'.$q.'</td>';                 
                    $body.='<td>'.number_format($cart->get_price($pid)*$q,0, ',', '.') .'&nbsp;VND</td>
                    </tr>';
				}
				$body.='<tr><td colspan="6">
				  <table width="100%" cellpadding="0" cellspacing="0" border="0">
					 <tr><td> '; 
					   $body.='<b> '._tonggia.' : '. number_format($cart->get_order_total(),0, ',', '.') .' &nbsp;VND</b></td>
					 </tr>
				 </table>
                </td></tr>';
                $body.='<tr><td colspan="6">
				  <table width="100%" cellpadding="0" cellspacing="0" border="0">
					 <tr><td> '; 
					   $body.='<b> '._phivanchuyen.' : '.$phi_vc.'</b></td>
					 </tr>
				 </table>
                </td></tr>';
                $body.='<tr><td colspan="6">
				  <table width="100%" cellpadding="0" cellspacing="0" border="0">
					 <tr><td> '; 
					   $body.='<b> '._thanhtoan.' : '. number_format($cart->get_order_total()+$phiship,0, ',', '.') .' &nbsp;VND</b></td>
					 </tr>
				 </table>
                </td></tr>';
            }
			else{
				$body.='<tr bgColor="#FFFFFF"><td>There are no items in your shopping cart!</td>';
			}
       $body.=' </table><span class="cat"></span>
		</td>
  </tr>';
  $body.='
  <tr>
			  <th align="left" colspan="2">&nbsp;</th>
			  </tr>
  			  <tr><td colspan="2" align="left">
              <p><h2>'.$row_setting['ten_'.$lang].'</h2></p>
			  <p>'._diachi.' : '.$row_setting['diachi_'.$lang].'</p>
			  <p>'._dienthoai.' : '.$row_setting['dienthoai'].'</p>
			  <p>Email : '.$row_setting['email'].'</p>
			  <p>Website : <a href="'.$config['config_base'].'/">'.$row_setting['ten_'.$lang].'</a></p>
              <td> <tr>'; 
			$body .= '</table>';
			
			$mahoadon=$func->madonhang('DH','order');
			$ngaydangky=date('Y-m-d H:i:s');
			$tonggia=$cart->get_order_total();
			$mathanhvien=$_SESSION['login']['mathanhvien'];
			
    		$db->query("INSERT INTO  table_order(order_code,name,phone,address,email,type_payment,totalprice,content,datecreate,status,city,district,shiping_price,member_code)  VALUES ('$mahoadon','$ten_input','$dienthoai_input','$diachi_input','$email_input','$phuongthuc_input','$tonggia','$noidung_input','$ngaydangky','1','$tinhthanh','$quanhuyen','$phiship','$mathanhvien')");

			$id_order = $db->InsertId();

			$max=count($_SESSION['cart']);

			for($i=0;$i<$max;$i++){
				$pid = $_SESSION['cart'][$i]['productid'];
				$q = $_SESSION['cart'][$i]['qty'];
				$pro_info = $cart->get_product_info($pid);
				$gia = $cart->get_price($pid);
				
				if($q==0) continue;

				$data['id_product'] = $pid;
				$data['id_order'] = $id_order;
				$data['name'] = $pro_info['name_'.$lang];
				$data['price'] = $pro_info['price'];
				$data['amount'] = $q;
				$db->setTable('order_detail');
				$db->insert($data);
        		
			}
			$mail->Body = $body;
			if($mail->Send()){
				if($phuongthuc_input == 'Thanh toán Onepay'){
					$tonggi = $cart->get_order_total()*100;
					$stt = $func->fns_Rand_digit(0,9,12);
					$result = 2;
					$thongbao = _dathangthanhcong;
					$form_tt = '<input type="hidden" name="virtualPaymentClientURL" id="virtualPaymentClientURL" value="https://mtf.onepay.vn/onecomm-pay/vpc.op">  
					             <input type="hidden" name="vpc_Version" value="2" />
					             <input type="hidden" name="vpc_Currency" id="vpc_Currency" value="VND" />
					             <input type="hidden" name="vpc_Command" value="pay" />
					             <input type="hidden" name="vpc_AccessCode" id="vpc_AccessCode" value="D67342C2" />
					             <input type="hidden" name="vpc_Merchant" id="vpc_Merchant" value="ONEPAY" />
				                 <input type="hidden" name="vpc_Locale" value="vn" />
				                 <input type="hidden" name="vpc_ReturnURL" id="vpc_ReturnURL" value="http://'.$config_url.'/noidia_php/dr.php" />
				                 <input type="hidden" name="vpc_MerchTxnRef" value="'.$mahoadon.'" />
				                 <input type="hidden" name="vpc_OrderInfo" value="'.$stt.'" />
				                 <input type="hidden" name="vpc_Amount" value="'.$tonggi.'" />
				                 <input type="hidden" name="vpc_TicketNo" value="'.$_SERVER['REMOTE_ADDR'].'" />
				                 <input type="hidden" name="AgainLink" value="'.$func->getCurrentPageURL().'" />
				                 <input type="hidden" name="Title" value="'._thanhtoan.'" />';
				} else {
					$result = 1;
					$thongbao = _dathangthanhcong;
				}
				//unset($_SESSION['cart']);
			} else {
				$thongbao = _dathangkhongthanhcong;
				$result = 0;
			}
		echo json_encode(array('result'=>$result,'thongbao'=>$thongbao,'html'=>$form_tt,'madonhang'=>$mahoadon));	
?>