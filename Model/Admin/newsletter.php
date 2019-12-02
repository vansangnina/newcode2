<?php
namespace Model\Admin;

use \Library\ModelAdmin;
use \Library\ClassPDO;
use \Library\Functions;
use \Library\Lang;

class Newsletter extends ModelAdmin{   

    public function __construct($router)
    { 
    	parent::__construct();
        switch($this->act){
			case "man": $this->data=$this->get_mails(); $this->view = "newsletter/items"; break;
			case "add": $template = "newsletter/item_add";break;
			case "edit": $this->data=$this->get_mail(); $template = "newsletter/item_add"; break;	
			case "send": $this->send(); break;
			case "save": $this->save_mail(); break;	
			case "delete": $this->delete(); break;	
			default: $this->view = "index";
		}
    }

	function get_mails(){
		$items  =  ClassPDO::query("select * from #_newsletter order by id desc");
		if(!$items) { Functions::transfer("Dữ liệu chưa khởi tạo.", $_SESSION['links_re']); }
		return $items;
	}

	function get_mail(){
		$id = $_GET['id'];
		ClassPDO::bindMore(array("id"=>$id));
		$item  =  ClassPDO::row("select * from #_newsletter where id=:id");
		if(!$item) { Functions::transfer("Dữ liệu không có thực", $_SESSION['links_re']); }
		return $item;
	}

	function save_mail(){
		if(empty($_POST)) transfer("Không nhận được dữ liệu",$_SESSION['links_re']);
		$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
		if($id){

			$data['email'] = $_POST['email'];
			$data['number'] = $_POST['number'];
			$data['shows'] = isset($_POST['shows']) ? 1 : 0;

			ClassPDO::setTable('newsletter');
			ClassPDO::setWhere('id', $id);
			ClassPDO::update($data);
			Functions::redirect($_SESSION['links_re']);
			
		}else{
			
			$data['email'] = $_POST['email'];
			$data['number'] = $_POST['number'];
			$data['shows'] = isset($_POST['shows']) ? 1 : 0;
			$data['dateupdate'] = time();
			
			ClassPDO::setTable('newsletter');
			ClassPDO::insert($data);
			Functions::redirect($_SESSION['links_re']);
		}
	}


	function delete(){
		if(isset($_GET['id'])){
			$id =  $_GET['id'];
			ClassPDO::bindMore(array("id"=>$id));
			ClassPDO::query("delete from #_newsletter where id=:id");
			Functions::redirect($_SESSION['links_re']);
		} else {
			Functions::transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		}
	}

	function send(){

		$file_name= Functions::changeTitle($_FILES['file']['name']);
		if(empty($_POST)) Functions::transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		if($file = Functions::upload_image("file",_download_type, _upload_hinhanh,$file_name)){
			$data['file'] = $file;
		}
		
		ClassPDO::setTable('setting');
		ClassPDO::setType('row');
		$company_mail = ClassPDO::select();

		if(isset($_POST['listid'])){
			include_once LIB."phpMailer/class.phpmailer.php";	
			$mail = new PHPMailer();
			$mail->IsSMTP(); // Gọi đến class xử lý SMTP
			$mail->Host       = C_IP; // tên SMTP server
			$mail->SMTPAuth   = true;                  // Sử dụng đăng nhập vào account
			$mail->Username   = C_EMAIL; // SMTP account username
			$mail->Password   = C_PASS;  
			//Thiet lap thong tin nguoi gui va email nguoi gui
			$mail->SetFrom($config_email,$_POST['ten_vi']);
			$listid = explode(",",$_POST['listid']); 
			for ($i=0 ; $i<count($listid) ; $i++){
				$id=$listid[$i]; 

				ClassPDO::bindMore(array("id"=>$id));
				$row = ClassPDO::row("select email from #_newsletter where id=:id");
				if($row){
					$mail->AddAddress($row['email'], $company_mail['ten_vi']);
				}
			}
			/*=====================================
			 * THIET LAP NOI DUNG EMAIL
	 		*=====================================*/

			//Thiết lập tiêu đề
			$mail->Subject    = '['.$_POST['ten_vi'].']';
			$mail->IsHTML(true);
			//Thiết lập định dạng font chữ
			$mail->CharSet = "utf-8";	
			$body = $_POST['noidung_vi'];
			
			$mail->Body = $body;
			if($data['file']){
			$mail->AddAttachment(_upload_hinhanh_l.$data['file']);
			}
			if($mail->Send())
			Functions::transfer("Thông tin đã được gửi đi.", $_SESSION['links_re']);
			else
			Functions::transfer("Hệ thống bị lỗi, xin thử lại sau.", $_SESSION['links_re']);
		
		}
		
	}
}