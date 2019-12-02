<?php
namespace Model\Admin;

use \Library\ModelAdmin;
use \Library\ClassPDO;
use \Library\Functions;
use \Library\Lang;

class Member extends ModelAdmin{   

    public function __construct($router)
    { 
    	parent::__construct();
        switch($this->act){
			case "man": $this->data=$this->get_items(); $this->view = "member/items"; break;
			case "add":	$this->view = "member/item_add"; break;
			case "edit": $this->data=$this->get_item(); $this->view = "member/item_add"; break;
			case "save": $this->save_item(); break;
			case "delete": $this->delete_item(); break;	
			case "delete_img": $this->delete_photo();break;
			default: $this->view = "index";
		}
    }


	//////////////////
	function get_items(){
		$per_page = $_SESSION['pagetable']; // Set how many records do you want to display per page.
		$startpoint = ($this->page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		$where = " #_member ";
		if($_REQUEST['keyword']!='')
		{
			$where.=" and name_vi LIKE :keyword ";
			$arr_dpo['keyword'] = '%'.$_GET['keyword'].'%';
		}
		$where .=" order by id desc";
		ClassPDO::bindMore($arr_dpo);
	    $items  =  ClassPDO::query("select * from $where $limit");

		$url = Functions::getCurrentPageURL();
		$this->paging = Functions::pagination($where,$per_page,$this->page,$url);
		return $items;		
		
	}

	function get_item(){
		$id = $_GET['id'];
		if(!$id)
			Functions::transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		$item = ClassPDO::row("select * from #_member where id='".$id."'");
		if(!$item) Functions::transfer("Dữ liệu không có thực", $_SESSION['links_re']);
		return $item;
	}

	function save_item(){
		$file_name=Functions::fns_Rand_digit(0,9,15);

		if(empty($_POST)) Functions::transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		$id = $_POST['id'];
		if($id){ // cap nhat
			$row = ClassPDO::row("select * from #_member where id='$id'");
			if(!$row){
				if($row['id'] == 1) Functions::transfer("Bạn không có quyền trên tài khoản này.<br>Mọi thắc mắc xin liên hệ quản trị website.", $_SESSION['links_re']);
			}	

			if($photo = Functions::upload_image("img", 'Jpg|jpg|png|gif|JPG|jpeg|JPEG', _upload_member,$file_name)){
				$data['photo'] = $photo;
				ClassPDO::setTable('member');
				ClassPDO::setWhere('id', $id);
				$row = ClassPDO::select();
				if($row){
					delete_file(_upload_member.$row['photo']);
				}
			}

			$row = ClassPDO::row("select * from #_member where email!='".$_POST['email']."' and email='".$_POST['email']."'");
			if($row) Functions::transfer("Email này đã có người sử dụng<br/>Xin chọn email khác.", "admin/member/edit?id=".$id);
			
			/*$data['username'] = $_POST['username'];*/
			if($_POST['password']!="")
				$data['password'] = Functions::mdd5($_POST['password']);
			$data['email'] = $_POST['email'];
			$data['ten'] = $_POST['ten'];
			$data['sex'] = $_POST['sex'];

			$data['dienthoai'] = $_POST['dienthoai'];
			$data['diachi'] = $_POST['diachi'];
			
			$data['tichluy'] = $_POST['tichluy'];

			//Lưu ngày sinh
			$ngaysinh = $_POST['ngaysinh'];
			$Ngay_arr = explode("/",$ngaysinh); // array(17,11,2010)
			if (count($Ngay_arr)==3) {
				$ngay = $Ngay_arr[0]; //17
				$thang = $Ngay_arr[1]; //11
				$nam = $Ngay_arr[2]; //2010
				if (Functions::checkdate($thang,$ngay,$nam)==false){ } else $ngaysinh=$nam."-".$thang."-".$ngay;
			}	
			$ngaysinh = strtotime($ngaysinh);
			$data['ngaysinh']=$ngaysinh;
			ClassPDO::setTable('member');
			ClassPDO::setWhere('id', $id);		
			ClassPDO::update($data);
			Functions::redirect($_SESSION['links_re']);
		
		}else{ // them moi
			
			$data['photo'] = Functions::upload_image("img", 'Jpg|jpg|png|gif|JPG|jpeg|JPEG', _upload_member,$file_name);

			$row = ClassPDO::row("select * from #_member where email='".$_POST['email']."'");
			if($row) transfer('Email này đã có người sử dụng<br/>Xin chọn email khác', 'admin/member/add');
			
			
			if($_POST['password']=="") Functions::transfer("Chưa nhập mật khẩu",'admin/member/add');
			
	/*		$data['username'] = $_POST['username'];*/
			$data['password'] = Functions::mdd5($_POST['password']);
			$data['email'] = $_POST['email'];
			$data['ten'] = $_POST['ten'];
			$data['dienthoai'] = $_POST['dienthoai'];
			$data['sex'] = $_POST['sex'];
			$data['diachi'] = $_POST['diachi'];
			
			$data['tichluy'] = $_POST['tichluy'];

			$ngaysinh = $_POST['ngaysinh'];
			$Ngay_arr = explode("/",$ngaysinh); // array(17,11,2010)
			if (count($Ngay_arr)==3) {
				$ngay = $Ngay_arr[0]; //17
				$thang = $Ngay_arr[1]; //11
				$nam = $Ngay_arr[2]; //2010
				if (Functions::checkdate($thang,$ngay,$nam)==false){ } else $ngaysinh=$nam."-".$thang."-".$ngay;
			}	
			$ngaysinh = strtotime($ngaysinh);
			$data['ngaysinh']=$ngaysinh;
			
			$data['randomkey'] = Functions::ChuoiNgauNhien(32);
			ClassPDO::setTable('member');
			ClassPDO::insert($data);
			Functions::redirect($_SESSION['links_re']);
		}
	}

	function delete_item(){		
		if(isset($_GET['id'])){
			$id =  $_GET['id'];		
			$row = ClassPDO::row("select * from #_member where id='$id'");
			if(ClassPDO::num_rows()>0){
				if($row['id'] == 1) Functions::transfer("Bạn không có quyền trên tài khoản này.<br>Mọi thắc mắc xin liên hệ quản trị website.", $_SESSION['links_re']);
			}		
			// xoa item
			$row = ClassPDO::query("delete from #_member where id='".$id."'");
			Functions::redirect($_SESSION['links_re']);
		}else transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	}
	function delete_photo(){
		if(isset($_GET['id'])){
			$id =  $_GET['id'];
			$row = ClassPDO::row("select id, photo from #_member where id='".$id."'");
			if($row){
				Functions::delete_file(_upload_member.$row['photo']);	
			}
			ClassPDO::query("UPDATE #_member SET photo ='' WHERE  id = '".$id."'");
			Functions::redirect($_SESSION['links_re']);
		}else Functions::transfer("Không nhận được dữ liệu", "admin/member/edit?id=".$id);
	}
}