<?php
namespace Model;

use \Library\Model;
use \Library\ClassPDO;
use \Library\Functions;
use PHPMailer;

class Contact extends Model{   

    public function __construct($router)
    { 
    	parent::__construct();
        $this->type=$router->type;
        $this->com=$router->com;
        $this->content();
        if(!empty($_POST)){
        	$this->saveContact();
        }
    }
    
    public function content(){
        ClassPDO::bindMore(array("type"=>$this->type));
        $result = ClassPDO::row("select * from #_info where type=:type");
        $this->seo($result['title'],$result['keywords'],$result['description']);
        return $result['content_'.$this->lang];
    }

    public function saveContact(){
    	$file_name = Functions::images_name($_FILES['file']['name']);
		if($file_att = Functions::upload_image("file", 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|xlsx|jpg|png|gif|JPG|PNG|GIF', _upload_hinhanh_l,$file_name)){
			$data['photo'] = $file_att;
		}
	    if($_SESSION['random_number'] == $_POST['captcha-code']) {
	    include_once LIB."phpMailer/class.phpmailer.php";
		$mail = new PHPMailer(true);
		$mail->IsSMTP(); // Gọi đến class xử lý SMTP
		$mail->Host       = C_IP; // tên SMTP server
		$mail->SMTPAuth   = true;                  // Sử dụng đăng nhập vào account
		$mail->Username   = C_EMAIL; // SMTP account username
		$mail->Password   = C_PASS;  
		//Thiet lap thong tin nguoi gui va email nguoi gui
		$mail->SetFrom(C_EMAIL,$this->setting()->name_vi);
		
		$mail->AddAddress($this->setting()->email,$this->setting()->name_vi);
		
		/*=====================================
		 * THIET LAP NOI DUNG EMAIL
 		*=====================================*/

		//Thiết lập tiêu đề
		$mail->Subject    = '['.$_POST['ten'].']';
		$mail->IsHTML(true);
		//Thiết lập định dạng font chữ
		$mail->CharSet = "utf-8";	
			$body = '<table>';
			$body .= '
				<tr> 
					<th colspan="2">&nbsp;</th>
				</tr>

				<tr>
					<th colspan="2">Thư liên hệ từ website <a href="http://'.$config_url.'">www.'.$config_url.'</a></th>
				</tr>

				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>

				<tr>
					<th>Họ tên :</th><td>'.$_POST['ten'].'</td>
				</tr>

				<tr>
					<th>Điện thoại :</th><td>'.$_POST['dienthoai'].'</td>
				</tr>

				<tr>
					<th>Email :</th><td>'.$_POST['email'].'</td>
				</tr>
				
			
				<tr>
					<th>Nội dung :</th><td>'.$_POST['noidung'].'</td>
				</tr>';
			$body .= '</table>';

			$data['name'] = $_POST['ten'];
			$data['address'] = $_POST['diachi'];
			$data['phone'] = $_POST['dienthoai'];
			$data['email'] = $_POST['email'];
			$data['title'] = $_POST['tieude'];
			$data['content'] = $_POST['noidung'];
			$data['number'] = 1;
			$data['datecreate'] = date('Y-m-d H:i:s');
			ClassPDO::setTable("contact");
			ClassPDO::insert($data);

			$mail->Body = $body;
			if($data['photo']){
				$mail->AddAttachment(_upload_hinhanh_l.$data1['photo']);
			}
		
			if($mail->Send())
			{	
				Functions::transfer("Thông tin liên hệ được gửi . Cảm ơn.", "./");
			} else {
				Functions::transfer("Xin lỗi quý khách.<br>Hệ thống bị lỗi, xin quý khách thử lại.", "lien-he.html",false);
			}
		} else {
			Functions::transfer("Mã xác nhận không đúng .", "lien-he.html",false);
		}
    }
    
}