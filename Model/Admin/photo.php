<?php
namespace Model\Admin;

use \Library\ModelAdmin;
use \Library\ClassPDO;
use \Library\Functions;
use \Library\Lang;

class Photo extends ModelAdmin{   

    public function __construct($router)
    { 
    	parent::__construct();
        switch($this->act){
			case "man": $this->data=$this->get_photos(); $this->view = "photo/items"; break;
			case "add":	$this->view = "photo/item_add"; break;
			case "edit": $this->data=$this->get_photo(); $this->view = "photo/item_add"; break;
			case "save": $this->save_photo(); break;
			case "delete": $this->save_photo(); break;	
			default: $this->view = "index";
		}
    }

	function get_photos(){
		$per_page = $_SESSION['pagetable']; // Set how many records do you want to display per page.
		$startpoint = ($this->page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		$where = " #_photo ";
		$where .= " where type=:type ";

		if($_REQUEST['keyword']!='')
		{
			$where.=" and name_vi LIKE :keyword ";
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

	function get_photo(){
		$id = $_GET['id'];
		if(!$id) Functions::transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		ClassPDO::bindMore(array("id"=>$id));
	    $item = ClassPDO::row("select * from #_photo where id=:id");
	    if(!$item) Functions::transfer("Dữ liệu không có thực", $_SESSION['links_re']);
	    return $item;
	}

	function save_photo(){
		
		if(empty($_POST)) transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		$id = $_POST['id'];

		foreach (Lang::MultiLang() as $key => $value) {
			$file_name=Functions::images_name($_FILES['file_'.$key]['name']);
			if($photo = Functions::upload_image("file_".$key,_img_type, _upload_hinhanh,$file_name)){
				$data['photo_'.$key] = $photo;
				$data['thumb_'.$key] = Functions::create_thumb($data['photo_'.$key], _width_thumb, _height_thumb , _upload_hinhanh,$file_name,_style_thumb);
				if($id){
					ClassPDO::setTable('photo');
					ClassPDO::setType('row');
					ClassPDO::setWhere('id', $id);
					$row = ClassPDO::select();
					if($row){
						Functions::delete_file(_upload_hinhanh.$row['photo_'.$key]);
						Functions::delete_file(_upload_hinhanh.$row['thumb_'.$key]);
					}
				}	
			}
			$data['name_'.$key] = $_POST['name_'.$key];
			$data['slogan_'.$key] = $_POST['slogan_'.$key];
			$data['description_'.$key] = $_POST['description_'.$key];
		}

		$data['number'] = $_POST['number'];
		$data['link'] = $_POST['link'];	
		$data['type'] = $_GET['type'];	
		$data['shows'] = isset($_POST['shows']) ? 1 : 0;

		if($id){
			$data['dateupdate'] = date("Y-m-d H:i:s");
			ClassPDO::setTable('photo');
			ClassPDO::setWhere('id', $id);
			ClassPDO::update($data);
			Functions::redirect($_SESSION['links_re']);
		} else {
			$data['datecreate'] = date("Y-m-d H:i:s");
			ClassPDO::setTable('photo');
			ClassPDO::insert($data);
			Functions::redirect($_SESSION['links_re']);
		}
	}

	function delete_photo(){
		$listid = explode(",",$_GET['listid']); 
		$type = $_GET['type'];
		for ($i=0 ; $i<count($listid) ; $i++){
			$id=$listid[$i]; 
			ClassPDO::bindMore(array("id"=>$id));
			$row = ClassPDO::row("select * from #_photo where id=:id ");
			if($row){
				foreach (Lang::MultiLang() as $key => $value) {
					Functions::delete_file(_upload_hinhanh.$row['photo_'.$key]);
					Functions::delete_file(_upload_hinhanh.$row['thumb_'.$key]);
				}
				ClassPDO::bindMore(array("id"=>$id));
				ClassPDO::query("delete from #_photo where id=:id ");
			}
		}
		Functions::redirect($_SESSION['links_re']);
	}
}	