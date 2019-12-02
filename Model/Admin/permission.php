<?php
namespace Model\Admin;

use \Library\ModelAdmin;
use \Library\ClassPDO;
use \Library\Functions;
use \Library\Lang;

class Permission extends ModelAdmin{   

    public function __construct($router)
    { 
    	parent::__construct();
        switch($this->act){
			case "man": $this->data=$this->get_items(); $this->view = "permission/items"; break;
			case "add":	$this->view = "permission/item_add"; break;
			case "edit": $this->data=$this->get_item(); $this->view = "permission/item_add"; break;
			case "save": $this->save_item(); break;
			case "delete": $this->delete_item(); break;	
			default: $this->view = "index";
		}
    }

	function get_items(){
		$per_page = $_SESSION['pagetable']; // Set how many records do you want to display per page.
		$startpoint = ($this->page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		$where = " #_permission ";
		$where .=" order by number,id desc";
	    $items  =  ClassPDO::query("select * from $where $limit");

		$url = Functions::getCurrentPageURL();
		$paging = Functions::pagination($where,$per_page,$this->page,$url,$arr_dpo);
		return $items;

	}

	function get_item(){
		$id = $_GET['id'];
		if(!$id) Functions::transfer("Không nhận được dữ liệu", $_SESSION['links_re']);

		ClassPDO::bindMore(array("id"=>$id));
	    $item  =  ClassPDO::row("select * from #_permission where id=:id");
	    if(!$item) Functions::transfer("Dữ liệu không có thực", $_SESSION['links_re']);
	    return $item;
	}

	function save_item(){
		global $db,$func;
		if(empty($_POST)) Functions::transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		$id = $_POST['id'];
		$data['name'] = $_POST['name'];
		$data['amount'] = $_POST['amount'];
		$data['color'] = $_POST['color'];
		
		if($_POST['id_list']!=''){
			$data['id_list'] = json_encode($_POST['id_list']);
		} else {
			$data['id_list'] = '';
		}
		if($_POST['id_cat']!=''){ 
			$data['id_cat'] = json_encode($_POST['id_cat']);
		} else {
			$data['id_cat'] = '';
		}
		if($_POST['id_item']!=''){
			$data['id_item'] = json_encode($_POST['id_item']);
		} else {
			$data['id_item'] = '';
		}
		
		if($_POST['xem']!=''){
			$data['views'] = json_encode($_POST['xem']);
		} else {
			$data['views'] = '';
		}
		if($_POST['xoa']!=''){
			$data['deletes'] = json_encode($_POST['xoa']);
		} else {
			$data['deletes'] = '';
		}
		if($_POST['sua']!=''){
			$data['edits'] = json_encode($_POST['sua']);
		} else {
			$data['edits'] = '';
		}
		if($_POST['them']!=''){
			$data['adds'] = json_encode($_POST['them']);
		} else {
			$data['adds'] = '';
		}
		
		$data['number'] = $_POST['number'];
		$data['shows'] = isset($_POST['shows']) ? 1 : 0;
		$data['dateupdate'] = date("Y-m-d H:i:s");

		if($id){
			ClassPDO::setTable('permission');
			ClassPDO::setWhere('id', $id);
			ClassPDO::update($data);
			Functions::redirect($_SESSION['links_re']);
			
		} else {
			$data['datecreate'] = date("Y-m-d H:i:s");
			ClassPDO::setTable('permission');
			ClassPDO::insert($data);
			Functions::redirect($_SESSION['links_re']);
		}

	}

	function delete_item(){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$id=$listid[$i]; 
			ClassPDO::bindMore(array("id"=>$id));
			$row = ClassPDO::row("select * from #_permission where id=:id ");
			if($row){
				ClassPDO::bindMore(array("id"=>$id));
				ClassPDO::query("delete from #_permission where id=:id ");
			}
		}
		Functions::redirect($_SESSION['links_re']);
	}
}