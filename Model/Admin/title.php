<?php
namespace Model\Admin;

use \Library\ModelAdmin;
use \Library\ClassPDO;
use \Library\Functions;
use \Library\Lang;

class Title extends ModelAdmin{   

    public function __construct($router)
    { 
    	parent::__construct();
        switch($this->act){
			case "man": $this->data=$this->get_mans(); $this->view = "title/items"; break;
			case "add":	$this->view = "title/item_add"; break;
			case "edit": $this->data=$this->get_man(); $this->view = "title/item_add"; break;
			case "save": $this->save_man(); break;
			case "delete": $this->delete_man(); break;	
			default: $this->view = "index";
		}
    }

	#====================================
	function get_mans(){

		$per_page = $_SESSION['pagetable']; // Set how many records do you want to display per page.
		$startpoint = ($this->page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		$where = " #_title ";
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

	function get_man(){
		global $db,$func,$item,$ds_photo;
		$id = $_GET['id'];
		if(!$id) Functions::transfer("Không nhận được dữ liệu", $_SESSION['links_re']);

		ClassPDO::bindMore(array("id"=>$id));
	    $item  =  ClassPDO::row("select * from #_title where id=:id");
	    if(!$item) Functions::transfer("Dữ liệu không có thực", $_SESSION['links_re']);
	    return $item;

	}

	function save_man(){
		
		if(empty($_POST)) Functions::transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		$file_name=Functions::images_name($_FILES['file']['name']);
		$id = isset($_POST['id']) ? $_POST['id'] : "";
		
		if($photo = Functions::upload_image("file",_img_type,_upload_hinhanh,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = Functions::create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_hinhanh,$file_name,_style_thumb);
			if($id){
				ClassPDO::setTable('title');
				ClassPDO::setWhere('id',$id);
				ClassPDO::setType('row');
				$row = ClassPDO::select('photo,thumb');
				if($row){
					Functions::delete_file(_upload_hinhanh.$row['photo']);	
					Functions::delete_file(_upload_hinhanh.$row['thumb']);				
				}
			}
		}

		foreach (Lang::MultiLang() as $key => $value) {
			$data['name_'.$key] = $_POST['name_'.$key];
			$data['description_'.$key] = $_POST['description_'.$key];
		}
		$data['attributes'] = Functions::raw_json_encode($_POST['thongtin']);
		$data['slug'] = Functions::changeTitle($_POST['name_'.$config['activelang']]);
		$data['number'] = $_POST['number'];
		$data['type'] = $_GET['type'];
		$data['shows'] = isset($_POST['shows']) ? 1 : 0;
		$data['dateupdate'] = date("Y-m-d H:i:s");
		if($id){
			ClassPDO::setTable('title');
			ClassPDO::setWhere('id', $id);
			ClassPDO::update($data);
			Functions::redirect($_SESSION['links_re']);
			
		} else {
			$data['datecreate'] = date("Y-m-d H:i:s");
			ClassPDO::setTable('title');
			ClassPDO::insert($data);
			Functions::redirect($_SESSION['links_re']);
		}

	}

	function delete_man(){
		$listid = explode(",",$_GET['listid']); 
		$type = $_GET['type'];
		for ($i=0 ; $i<count($listid) ; $i++){
			$id=$listid[$i]; 
			
			ClassPDO::bindMore(array("id"=>$id));
			$row = ClassPDO::row("select id,photo,thumb from #_title where id=:id ");
			
			if($row){
				Functions::delete_file(_upload_hinhanh.$row['photo']);
				Functions::delete_file(_upload_hinhanh.$row['thumb']);
				ClassPDO::bindMore(array("id"=>$id));
				ClassPDO::query("delete from #_title where id=:id ");
			}
		}
		Functions::redirect($_SESSION['links_re']);
	}
}
?>