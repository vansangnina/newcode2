<?php
namespace Model\Admin;

use \Library\ModelAdmin;
use \Library\ClassPDO;
use \Library\Functions;
use \Library\Lang;

class Cate extends ModelAdmin{   

    public function __construct($router)
    { 
    	parent::__construct();
        switch($this->act){
			case "man_list": $this->data = $this->get_lists(); $this->view = "cate/list/items"; break;
			case "add_list": $this->view = "cate/list/item_add"; break;
			case "edit_list": $this->data = $this->get_list(); $this->view = "cate/list/item_add"; break;
			case "save_list": $this->save_list(); break;
			case "delete_list": $this->delete_list(); break;	
			#===================================================
			case "man_cat": $this->data = $this->get_cats(); $this->view = "cate/cat/items"; break;
			case "add_cat": $this->view = "cate/cat/item_add"; break;
			case "edit_cat": $this->data = $this->get_cat(); $this->view = "cate/cat/item_add"; break;
			case "save_cat": $this->save_cat(); break;
			case "delete_cat": $this->delete_cat(); break;	
			#===================================================
			case "man_item": $this->data = $this->get_items(); $this->view = "cate/item/items"; break;
			case "add_item": $this->view = "cate/item/item_add"; break;
			case "edit_item": $this->data = $this->get_item(); $this->view = "cate/item/item_add"; break;
			case "save_item": $this->save_item(); break;
			case "delete_item": $this->delete_item(); break;
			#===================================================
			case "man_sub": $this->data = $this->get_subs(); $this->view = "cate/sub/items"; break;
			case "add_sub":	$this->view = "cate/sub/item_add"; break;
			case "edit_sub": $this->data = $this->get_sub(); $this->view = "cate/sub/item_add"; break;
			case "save_sub": $this->save_sub(); break;
			case "delete_sub": $this->delete_sub(); break;	
			default: $this->view = "index";
		}
    }

	#=================List===================
	public function get_lists(){

		$per_page = $_SESSION['pagetable']; // Set how many records do you want to display per page.
		$startpoint = ($this->page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		$where = " #_cate_list ";
		$where .= " where type=:type ";

		if($_REQUEST['keyword']!='')
		{
			$where.=" and name_".$this->lang." LIKE :keyword ";
			$arr_dpo['keyword'] = '%'.$_GET['keyword'].'%';
		}
		$where .=" order by number,id desc";

		$arr_dpo['type'] = $_GET['type'];		
		$url = Functions::getCurrentPageURL();
		$this->paging = Functions::pagination($where,$per_page,$this->page,$url,$arr_dpo);	

		ClassPDO::bindMore($arr_dpo);
	    return ClassPDO::query("select * from $where $limit");	
	}

	public function get_list(){

		$id = $_GET['id'];
		if(!$id) Functions::transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		ClassPDO::bindMore(array("id"=>$id));
	    $item = ClassPDO::row("select * from #_cate_list where id=:id");
	    if(!$item) Functions::transfer("Dữ liệu không có thực", $_SESSION['links_re']);
	    return $item;
	}

	public function save_list(){
		
		if(empty($_POST)) Functions::transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		$file_name=Functions::images_name($_FILES['file']['name']);
		$id = isset($_POST['id']) ? $_POST['id'] : "";
		
		if($photo = Functions::upload_image("file",_img_type,_upload_cate_l,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = Functions::create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_cate_l,$file_name,_style_thumb);
			if($id){
				ClassPDO::setTable('cate_list');
				ClassPDO::setWhere('id',$id);
				ClassPDO::setType('row');
				$row = ClassPDO::select('photo,thumb');
				if($row){
					Functions::delete_file(_upload_cate_l.$row['photo']);	
					Functions::delete_file(_upload_cate_l.$row['thumb']);				
				}
			}	
		}
		foreach (Lang::Multilang() as $key => $value) {
			$data['name_'.$key] = $_POST['name_'.$key];
			$data['description_'.$key] = $_POST['description_'.$key];
		}

		$data['slug'] = Functions::changeTitle($_POST['name_'.$config['activelang']]);
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		$data['number'] = $_POST['number'];
		$data['type'] = $_GET['type'];
		$data['shows'] = isset($_POST['shows']) ? 1 : 0;
		$data['dateupdate'] = date("Y-m-d H:i:s");
		if($id){
			ClassPDO::setTable('cate_list');
			ClassPDO::setWhere('id', $id);
			ClassPDO::update($data);
			Functions::redirect($_SESSION['links_re']);
			
		} else {
			$data['datecreate'] = date("Y-m-d H:i:s");
			ClassPDO::setTable('cate_list');
			ClassPDO::insert($data);
			Functions::redirect($_SESSION['links_re']);
		}

	}

	public function delete_list(){
  		$listid = explode(",",$_GET['listid']); 
		$type = $_GET['type'];
		for ($i=0 ; $i<count($listid) ; $i++){
			$id=$listid[$i]; 
			ClassPDO::bindMore(array("id"=>$id));
			$row = ClassPDO::row("select id,photo,thumb from #_cate_list where id=:id ");
			
			if($row){
				Functions::delete_file(_upload_cate_l.$row['photo']);
				Functions::delete_file(_upload_cate_l.$row['thumb']);
				ClassPDO::bindMore(array("id"=>$id));
				ClassPDO::query("delete from #_cate_list where id=:id ");
			}
		}
		Functions::redirect($_SESSION['links_re']);
	}

	#=================cat===================
	public function get_cats(){

		$per_page = $_SESSION['pagetable']; // Set how many records do you want to display per page.
		$startpoint = ($this->page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		$where = " #_cate_cat ";
		$where .= " where type=:type ";

		if($_REQUEST['id_list']!='')
		{
			$where.=" and id_list = :id_list ";
			$arr_dpo['id_list'] = $_GET['id_list'];
		}

		if($_REQUEST['keyword']!='')
		{
			$where.=" and name_".$this->lang." LIKE :keyword ";
			$arr_dpo['keyword'] = '%'.$_GET['keyword'].'%';
		}
		$where .=" order by number,id desc";

		$arr_dpo['type'] = $_GET['type'];
		ClassPDO::bindMore($arr_dpo);
	    $items  =  ClassPDO::query("select * from $where $limit");

		$url = Functions::getCurrentPageURL();
		$this->paging = Functions::pagination($where,$per_page,$this->page,$url,$arr_dpo);
		return $items;
		
	}

	public function get_cat(){

		$id = $_GET['id'];
		if(!$id) Functions::transfer("Không nhận được dữ liệu", $_SESSION['links_re']);

		ClassPDO::bindMore(array("id"=>$id));
	    $item  =  ClassPDO::row("select * from #_cate_cat where id=:id");
	    if(!$item) Functions::transfer("Dữ liệu không có thực", $_SESSION['links_re']);
	    return $item;
	}

	public function save_cat(){
		
		if(empty($_POST)) Functions::transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		$file_name=Functions::images_name($_FILES['file']['name']);
		$id = isset($_POST['id']) ? $_POST['id'] : "";
		
		if($photo = Functions::upload_image("file",_img_type,_upload_cate_l,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = Functions::create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_cate_l,$file_name,_style_thumb);
			if($id){
				ClassPDO::setTable('cate_cat');
				ClassPDO::setWhere('id',$id);
				ClassPDO::setType('row');
				$row = ClassPDO::select('photo,thumb');
				if($row){
					Functions::delete_file(_upload_cate_l.$row['photo']);	
					Functions::delete_file(_upload_cate_l.$row['thumb']);				
				}
			}	
		}

		foreach (Lang::MultiLang() as $key => $value) {
			$data['name_'.$key] = $_POST['name_'.$key];
			$data['description_'.$key] = $_POST['description_'.$key];
		}
		$data['id_list'] = $_POST['id_list'];
		$data['slug'] = Functions::changeTitle($_POST['name_'.$config['activelang']]);
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		$data['number'] = $_POST['number'];
		$data['type'] = $_GET['type'];
		$data['shows'] = isset($_POST['shows']) ? 1 : 0;
		$data['dateupdate'] = date("Y-m-d H:i:s");
		if($id){
			ClassPDO::setTable('cate_cat');
			ClassPDO::setWhere('id', $id);
			ClassPDO::update($data);
			Functions::redirect($_SESSION['links_re']);
		} else {
			$data['datecreate'] = date("Y-m-d H:i:s");
			ClassPDO::setTable('cate_cat');
			ClassPDO::insert($data);
			Functions::redirect($_SESSION['links_re']);
		}

	}

	public function delete_cat(){

		$listid = explode(",",$_GET['listid']); 
		$type = $_GET['type'];
		for ($i=0 ; $i<count($listid) ; $i++){
			$id=$listid[$i]; 
			ClassPDO::bindMore(array("id"=>$id));
			$row = ClassPDO::row("select id,photo,thumb from #_cate_cat where id=:id ");
			
			if($row){
				Functions::delete_file(_upload_cate_l.$row['photo']);
				Functions::delete_file(_upload_cate_l.$row['thumb']);
				ClassPDO::bindMore(array("id"=>$id));
				ClassPDO::query("delete from #_cate_cat where id=:id ");
			}
		}
		Functions::redirect($_SESSION['links_re']);
	}

	#=================Item===================
	public function get_items(){

		$per_page = $_SESSION['pagetable']; // Set how many records do you want to display per page.
		$startpoint = ($this->page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		$where = " #_cate_item ";
		$where .= " where type=:type ";

		if($_REQUEST['id_list']!='')
		{
			$where.=" and id_list = :id_list ";
			$arr_dpo['id_list'] = $_GET['id_list'];
		}

		if($_REQUEST['id_cat']!='')
		{
			$where.=" and id_cat = :id_cat ";
			$arr_dpo['id_cat'] = $_GET['id_cat'];
		}

		if($_REQUEST['keyword']!='')
		{
			$where.=" and name_vi LIKE :keyword ";
			$arr_dpo['keyword'] = '%'.$_GET['keyword'].'%';
		}
		$where .=" order by number,id desc";

		$arr_dpo['type'] = $_GET['type'];
		ClassPDO::bindMore($arr_dpo);
	    $items  =  ClassPDO::query("select * from $where $limit");

		$url = Functions::getCurrentPageURL();
		$paging = Functions::pagination($where,$per_page,$this->page,$url,$arr_dpo);	
		return $items;	
		
	}

	public function get_item(){

		$id = $_GET['id'];
		if(!$id) Functions::transfer("Không nhận được dữ liệu", $_SESSION['links_re']);

		ClassPDO::bindMore(array("id"=>$id));
	    $item  =  ClassPDO::row("select * from #_cate_item where id=:id");
	    if(!$item) Functions::transfer("Dữ liệu không có thực", $_SESSION['links_re']);
	    return $item;
	}

	public function save_item(){
		
		if(empty($_POST)) Functions::transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		$file_name=Functions::images_name($_FILES['file']['name']);
		$id = isset($_POST['id']) ? $_POST['id'] : "";
		
		if($photo = Functions::upload_image("file",_img_type,_upload_cate_l,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = Functions::create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_cate_l,$file_name,_style_thumb);
			if($id){
				ClassPDO::setTable('cate_item');
				ClassPDO::setWhere('id',$id);
				ClassPDO::setType('row');
				$row = ClassPDO::select('photo,thumb');
				if($row){
					Functions::delete_file(_upload_cate_l.$row['photo']);	
					Functions::delete_file(_upload_cate_l.$row['thumb']);				
				}
			}	
		}

		foreach (lang::MultiLang() as $key => $value) {
			$data['name_'.$key] = $_POST['name_'.$key];
			$data['description_'.$key] = $_POST['description_'.$key];
		}
		$data['id_cat'] = $_POST['id_cat'];
		$data['id_list'] = $_POST['id_list'];
		$data['slug'] = Functions::changeTitle($_POST['name_'.$config['activelang']]);
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		$data['number'] = $_POST['number'];
		$data['type'] = $_GET['type'];
		$data['shows'] = isset($_POST['shows']) ? 1 : 0;
		$data['dateupdate'] = date("Y-m-d H:i:s");
		if($id){
			ClassPDO::setTable('cate_item');
			ClassPDO::setWhere('id', $id);
			ClassPDO::update($data);
			Functions::redirect($_SESSION['links_re']);
			
		} else {
			$data['datecreate'] = date("Y-m-d H:i:s");
			ClassPDO::setTable('cate_item');
			ClassPDO::insert($data);
			Functions::redirect($_SESSION['links_re']);
		}

	}

	public function delete_item(){

		$listid = explode(",",$_GET['listid']); 
		$type = $_GET['type'];
		for ($i=0 ; $i<count($listid) ; $i++){
			$id=$listid[$i]; 
			ClassPDO::bindMore(array("id"=>$id));
			$row = ClassPDO::row("select id,photo,thumb from #_cate_item where id=:id ");
			if($row){
				Functions::delete_file(_upload_cate_l.$row['photo']);
				Functions::delete_file(_upload_cate_l.$row['thumb']);
				ClassPDO::bindMore(array("id"=>$id));
				ClassPDO::query("delete from #_cate_item where id=:id ");
			}
		}
		Functions::redirect($_SESSION['links_re']);
	}

	#=================Sub===================
	public function get_subs(){

		$per_page = $_SESSION['pagetable']; // Set how many records do you want to display per page.
		$startpoint = ($this->page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		$where = " #_cate_sub ";
		$where .= " where type=:type ";

		if($_REQUEST['id_list']!='')
		{
			$where.=" and id_list = :id_list ";
			$arr_dpo['id_list'] = $_GET['id_list'];
		}

		if($_REQUEST['id_cat']!='')
		{
			$where.=" and id_cat = :id_cat ";
			$arr_dpo['id_cat'] = $_GET['id_cat'];
		}

		if($_REQUEST['id_item']!='')
		{
			$where.=" and id_item = :id_item ";
			$arr_dpo['id_item'] = $_GET['id_item'];
		}

		if($_REQUEST['keyword']!='')
		{
			$where.=" and name_vi LIKE :keyword ";
			$arr_dpo['keyword'] = '%'.$_GET['keyword'].'%';
		}
		$where .=" order by number,id desc";

		$arr_dpo['type'] = $_GET['type'];
		ClassPDO::bindMore($arr_dpo);
	    $items  =  ClassPDO::query("select * from $where $limit");

		$url = Functions::getCurrentPageURL();
		$paging = Functions::pagination($where,$per_page,$this->page,$url,$arr_dpo);
		return $items;		
		
	}

	public function get_sub(){

		$id = $_GET['id'];
		if(!$id) Functions::transfer("Không nhận được dữ liệu", $_SESSION['links_re']);

		ClassPDO::bindMore(array("id"=>$id));
	    $item  =  ClassPDO::row("select * from #_cate_sub where id=:id");
	    if(!$item) Functions::transfer("Dữ liệu không có thực", $_SESSION['links_re']);
	    return $item;
	}

	public function save_sub(){
		
		if(empty($_POST)) Functions::transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		$file_name=Functions::images_name($_FILES['file']['name']);
		$id = isset($_POST['id']) ? $_POST['id'] : "";
		
		if($photo = Functions::upload_image("file",_img_type,_upload_cate_l,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = Functions::create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_cate_l,$file_name,_style_thumb);
			if($id){
				ClassPDO::setTable('cate_sub');
				ClassPDO::setWhere('id',$id);
				ClassPDO::setType('row');
				$row = ClassPDO::select('photo,thumb');
				if($row){
					Functions::delete_file(_upload_cate_l.$row['photo']);	
					Functions::delete_file(_upload_cate_l.$row['thumb']);				
				}
			}	
		}

		foreach (Lang::MultiLang() as $key => $value) {
			$data['name_'.$key] = $_POST['name_'.$key];
			$data['description_'.$key] = $_POST['description_'.$key];
		}
		
		$data['id_cat'] = $_POST['id_cat'];
		$data['id_list'] = $_POST['id_list'];
		$data['id_item'] = $_POST['id_item'];
		$data['slug'] = Functions::changeTitle($_POST['name_'.$config['activelang']]);
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		$data['number'] = $_POST['number'];
		$data['type'] = $_GET['type'];
		$data['shows'] = isset($_POST['shows']) ? 1 : 0;
		$data['dateupdate'] = date("Y-m-d H:i:s");
		if($id){
			ClassPDO::setTable('cate_sub');
			ClassPDO::setWhere('id', $id);
			ClassPDO::update($data);
			Functions::redirect($_SESSION['links_re']);
		} else {
			$data['datecreate'] = date("Y-m-d H:i:s");
			ClassPDO::setTable('cate_sub');
			ClassPDO::insert($data);
			Functions::redirect($_SESSION['links_re']);
		}

	}

	public function delete_sub(){

		$listid = explode(",",$_GET['listid']); 
		$type = $_GET['type'];
		for ($i=0 ; $i<count($listid) ; $i++){
			$id=$listid[$i]; 
			ClassPDO::bindMore(array("id"=>$id));
			$row = ClassPDO::row("select id,photo,thumb from #_cate_sub where id=:id ");
			
			if($row){
				Functions::delete_file(_upload_cate_l.$row['photo']);
				Functions::delete_file(_upload_cate_l.$row['thumb']);
				ClassPDO::bindMore(array("id"=>$id));
				ClassPDO::query("delete from #_cate_sub where id=:id ");
			}
		}
		Functions::redirect($_SESSION['links_re']);
	}
#====================================
    
}

?>