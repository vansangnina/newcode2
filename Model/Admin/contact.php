<?php
namespace Model\Admin;

use \Library\ModelAdmin;
use \Library\ClassPDO;
use \Library\Functions;
use \Library\Lang;

class Contact extends ModelAdmin{   

    public function __construct($router)
    { 
    	parent::__construct();
        switch($this->act){
			case "man": $this->data=$this->get_items(); $this->view = "contact/items"; break;
			case "add":	$this->view = "contact/item_add"; break;
			case "edit": $this->data=$this->get_item(); $this->view = "contact/item_add"; break;
			case "save": $this->save_item(); break;
			case "delete": $this->delete_item(); break;	
			default: $this->view = "index";
		}
    }

	#====================================

	function get_items(){
		$per_page = $_SESSION['pagetable']; // Set how many records do you want to display per page.
		$startpoint = ($this->page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		$where = " #_contact ";
		$where .= " where type=:type ";

		if($_REQUEST['keyword']!='')
		{
			$where.=" and name LIKE :keyword ";
			$arr_dpo['keyword'] = '%'.$_GET['keyword'].'%';
		}
		$where .=" order by id desc";

		$arr_dpo['type'] = $_GET['type'];
		ClassPDO::bindMore($arr_dpo);
	    $items  =  ClassPDO::query("select * from $where $limit");

		$url = Functions::getCurrentPageURL();
		$this->paging = Functions::pagination($where,$per_page,$this->page,$url,$arr_dpo);			
		return $items;
	}

	function get_item(){
		$id = $_GET['id'];
		if(!$id) Functions::transfer("Không nhận được dữ liệu", $_SESSION['links_re']);	
		ClassPDO::bindMore(array("id"=>$id));
	    $item = ClassPDO::row("select * from #_contact where id=:id");
	    if(!$item) Functions::transfer("Dữ liệu không có thực", $_SESSION['links_re']);	
	    ClassPDO::bindMore(array("id"=>$id));
	    ClassPDO::query("UPDATE table_contact SET view =1 WHERE  id = :id");
	    return $item;
	}

	function save_item(){

		if(empty($_POST)) transfer("Không nhận được dữ liệu",$_SESSION['links_re']);
		$id = $_POST['id'];
		$data['note'] = $_POST['note'];
		$data['number'] = $_POST['number'];
		$data['shows'] = isset($_POST['shows']) ? 1 : 0;
		$data['dateupdate'] = date("Y-m-d H:i:s");

		if($id){
			ClassPDO::setTable('contact');
			ClassPDO::setWhere('id', $id);
			ClassPDO::update($data);
			Functions::redirect($_SESSION['links_re']);
		} else {
			$data['datecreate'] = date("Y-m-d H:i:s");
			ClassPDO::setTable('contact');
			ClassPDO::insert($data);
			Functions::redirect($_SESSION['links_re']);
		}
		
	}
	function delete_item(){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$id=$listid[$i]; 
			ClassPDO::bindMore(array("id"=>$id));
			$row = ClassPDO::row("select * from #_contact where id=:id ");
			if($row){
				ClassPDO::bindMore(array("id"=>$id));
				ClassPDO::query("delete from #_contact where id=:id ");
			}
		}
		Functions::redirect($_SESSION['links_re']);
	}
}