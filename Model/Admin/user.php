<?php
namespace Model\Admin;

use \Library\ModelAdmin;
use \Library\ClassPDO;
use \Library\Functions;
use \Library\Lang;

class User extends ModelAdmin{   

    public function __construct($router)
    { 
    	parent::__construct();
        switch($this->act){
			case "login": $this->view = "user/login"; break;
			case "admin_edit": $this->data=$this->edit(); $this->view = "user/admin_add"; break;
			case "logout": $this->logout(); break;	
			case "man": $this->data=$this->get_items(); $this->view = "user/items"; break;
			case "add": $this->view = "user/item_add"; break;
			case "edit": $this->data=$this->get_item(); $this->view = "user/item_add"; break;
			case "save": $this->save_item(); break;
			case "delete": $this->delete_item(); break;
			default: $this->view = "index";
		}
    }

	//////////////////
	public function get_items(){
		
		if($_SESSION['login']['role']!='3'){
			Functions::transfer("Chỉ có admin mới được vào mục này . ", "admin");
		}
		
		$per_page = $_SESSION['pagetable']; // Set how many records do you want to display per page.
		$startpoint = ($this->page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		$arr_dpo['role'] = 1;
		ClassPDO::bindMore($arr_dpo);
		$where = " #_user where role=:role order by username ";

		$items = ClassPDO::query("select * from $where $limit");

		$url = Functions::getCurrentPageURL();
		$this->paging = Functions::pagination($where,$per_page,$this->page,$url,$arr_dpo);
		return $items;
	}

	public function get_item(){
		
		if($_SESSION['login']['role']!='3'){
			Functions::transfer("Chỉ có admin mới được vào mục này . ", "admin");
		}
		$id = $_GET['id'];
		if(!$id) { Functions::transfer("Không nhận được dữ liệu", "admin/user/man"); }

		ClassPDO::bindMore(array("id"=>$id));
	    $item = ClassPDO::row("select * from #_user where id=:id");
	    if(!$item) Functions::transfer("Dữ liệu không có thực", $_SESSION['links_re']);
	    return $item;
	    
	}

	public function save_item(){
		if($_SESSION['login']['role']!='3'){
			Functions::transfer("Chỉ có admin mới được vào mục này . ", "admin");
		}
		if(empty($_POST)) Functions::transfer("Không nhận được dữ liệu", "admin/user/man");
		$id = $_POST['id'];

		$data['username'] = $_POST['username'];
		if($_POST['oldpassword']!=""){
			$data['password'] = Functions::mdd5($_POST['oldpassword']);
		}
		$data['email'] = $_POST['email'];
		$data['name'] = $_POST['name'];
		$data['sex'] = $_POST['sex'];
		$data['phone'] = $_POST['phone'];
		$data['skype'] = $_POST['skype'];
		$data['address'] = $_POST['address'];
		$data['country'] = $_POST['country'];
		$data['city'] = $_POST['city'];
		$data['permission'] = $_POST['permission'];
		$data['role'] = $_POST['role'];
		$data['number'] = $_POST['number'];
		$data['dateupdate'] = date("Y-m-d H:i:s");
		if($id){
			ClassPDO::setTable('user');
			ClassPDO::setWhere('id', $id);
			ClassPDO::update($data);
			Functions::redirect($_SESSION['links_re']);
			
		} else {
			ClassPDO::bindMore(array("username"=>$_POST['username']));
			$row = ClassPDO::row("select * from #_user where username=:username");
			if(!$row){
				$data['datecreate'] = date("Y-m-d H:i:s");
				ClassPDO::setTable('user');
				ClassPDO::insert($data);
				Functions::redirect($_SESSION['links_re']);
			} else {
				Functions::transfer("Error : Username tồn tại . ","admin/user/add");
			}
		}
		
	}

	public function delete_item(){
		if($_SESSION['login']['role']!='3'){
			Functions::transfer("Chỉ có admin mới được vào mục này . ", "admin");
		}
		$listid = explode(",",$_GET['listid']); 
		$type = $_GET['type'];
		for ($i=0 ; $i<count($listid) ; $i++){
			$id=$listid[$i]; 
			ClassPDO::bindMore(array("id"=>$id));
			$row = ClassPDO::row("select * from #_user where id=:id ");
			if($row){
				ClassPDO::bindMore(array("id"=>$id));
				ClassPDO::query("delete from #_user where id=:id ");
			}
		}
		Functions::redirect($_SESSION['links_re']);
	}
	///////////////////////

	public function edit(){
		
		if(!empty($_POST)){
			ClassPDO::bindMore(array("username"=>$_SESSION['login']['username'],"username2"=>$_POST['username']));
			$row = ClassPDO::row("select * from #_user where username!=:username and username=:username2 and role=3");
			if($row){
				Functions::transfer("Tên đăng nhập này đã có","admin/user/admin_edit");
			}
			
			ClassPDO::bindMore(array("username"=>$_SESSION['login']['username']));
			$row = ClassPDO::row("select * from #_user where username=:username");
			if($row){
				if($row['password'] != Functions::mdd5($_POST['oldpassword'])) Functions::transfer("Mật khẩu không chính xác","admin/user/admin_edit");
			} else {
				die('Hệ thống bị lỗi. Xin liên hệ với admin. <br>Cám ơn.');
			}
			
			$data['username'] = $_POST['username'];
			if($_POST['new_pass']!=""){
				$data['password'] = Functions::mdd5($_POST['new_pass']);
			}
			$data['name'] = $_POST['name'];
			$data['email'] = $_POST['email'];
			$data['phone'] = $_POST['phone'];
			$data['number'] = 1;
			ClassPDO::setTable('user');
			ClassPDO::setWhere('id',$row['id']);
			ClassPDO::update($data);
			session_unset();
			Functions::redirect("admin");
		}
		ClassPDO::bindMore(array("username"=>$_SESSION['login']['username']));
		return ClassPDO::row("select * from #_user where username=:username");
	}
		
	public function logout(){
		$_SESSION['login'] = '';
		$_SESSION[ADM] = false;
		Functions::transfer("Đăng xuất thành công", "admin");
	}
}