<?php
namespace Model\Admin;

use \Library\ModelAdmin;
use \Library\ClassPDO;
use \Library\Functions;
use \Library\Lang;

class Post extends ModelAdmin{   

    public function __construct($router)
    { 
    	parent::__construct();
        switch($this->act){
			case "man": $this->data=$this->get_mans(); $this->view = "post/items"; break;
			case "add":	$this->view = "post/item_add"; break;
			case "edit": $this->data=$this->get_man(); $this->view = "post/item_add"; break;
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
		
		$where = " #_post ";
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
		if($_REQUEST['id_sub']!='')
		{
			$where.=" and id_sub = :id_sub ";
			$arr_dpo['id_sub'] = $_GET['id_sub'];
		}

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
		$id = $_GET['id'];
		if(!$id) Functions::transfer("Không nhận được dữ liệu", $_SESSION['links_re']);

		ClassPDO::bindMore(array("id"=>$id));
	    $item  =  ClassPDO::row("select * from #_post where id=:id");
	    if(!$item) Functions::transfer("Dữ liệu không có thực", $_SESSION['links_re']);

		ClassPDO::bindMore(array("type"=>$_GET['type'],"id_cate"=>$id));
	    $this->photos = ClassPDO::query("select * from #_cate_photo where id_cate=:id_cate and type=:type order by number,id desc");
	    return $item;
	}

	function save_man(){
		
		if(empty($_POST)) Functions::transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		$file_name=Functions::images_name($_FILES['file']['name']);
		$id = isset($_POST['id']) ? $_POST['id'] : "";
		
		if($photo = Functions::upload_image("file",_img_type,_upload_post_l,$file_name)){
			$data['photo'] = $photo;
			//dongdauanh($photo,_upload_post_l);	
			$data['thumb'] = Functions::create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_post_l,$file_name,_style_thumb);	
			if($id){
				ClassPDO::setTable('post');
				ClassPDO::setWhere('id',$id);
				ClassPDO::setType('row');
				$row = ClassPDO::select('photo,thumb');
				if($row){
					Functions::delete_file(_upload_post_l.$row['photo']);	
					Functions::delete_file(_upload_post_l.$row['thumb']);				
				}
			}
		}

	    $data['id_list'] = (int)$_POST['id_list'];	
		$data['id_cat'] = (int)$_POST['id_cat'];
		$data['id_item'] = (int)$_POST['id_item'];
		$data['id_sub'] = (int)$_POST['id_sub'];

		foreach (Lang::MultiLang() as $key => $value) {
			$data['name_'.$key] = $_POST['name_'.$key];
			$data['description_'.$key] = $_POST['description_'.$key];
			$data['content_'.$key] = $_POST['content_'.$key];
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
			ClassPDO::setTable('post');
			ClassPDO::setWhere('id', $id);
			ClassPDO::update($data);
			$this->multi_upload($id);
			Functions::redirect($_SESSION['links_re']);
		} else {
			$data['datecreate'] = date("Y-m-d H:i:s");
			ClassPDO::setTable('post');
			ClassPDO::insert($data);
			$this->multi_upload(ClassPDO::InsertId());
			Functions::redirect($_SESSION['links_re']);
		}
	}

	function multi_upload($id){

		if (isset($_FILES['files'])) {
            for($i=0;$i<count($_FILES['files']['name']);$i++){
            	if($_FILES['files']['name'][$i]!=''){

					$file['name'] = $_FILES['files']['name'][$i];
					$file['type'] = $_FILES['files']['type'][$i];
					$file['tmp_name'] = $_FILES['files']['tmp_name'][$i];
					$file['error'] = $_FILES['files']['error'][$i];
					$file['size'] = $_FILES['files']['size'][$i];
				    $file_name = Functions::images_name($_FILES['files']['name'][$i]);
					$photo = Functions::upload_photos($file, 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_cate_l,$file_name);
					$data['photo'] = $photo;
					//dongdauanh($data['photo'],_upload_post_l);
					$data['thumb'] = Functions::create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_cate_l,$file_name,_style_thumb);
					$data['number'] = (int)$_POST['stthinh'][$i];
					$data['type'] = $_GET['type'];	
					$data['id_cate'] = $id;
					$data['shows'] = 1;
					ClassPDO::setTable('cate_photo');
					ClassPDO::insert($data);
				}
			}
        }
	}

	function delete_man(){
		
		$listid = explode(",",$_GET['listid']); 
		$type = $_GET['type'];
		for ($i=0 ; $i<count($listid) ; $i++){
			$id=$listid[$i]; 

			ClassPDO::bindMore(array("id"=>$id,"type"=>$type));
			$photo_lq = ClassPDO::query("select id,photo,thumb from #_cate_photo where id_cate=:id and type=:type ");

			if(count($photo_lq)>0){
				for($j=0;$j<count($photo_lq);$j++){
					Functions::delete_file(_upload_cate_l.$photo_lq[$j]['photo']);
					Functions::delete_file(_upload_cate_l.$photo_lq[$j]['thumb']);
				}
			}
			ClassPDO::bindMore(array("id"=>$id,"type"=>$type));
			ClassPDO::query("delete from #_cate_photo where id_cate=:id and type=:type ");

			ClassPDO::bindMore(array("id"=>$id));
			$row = ClassPDO::row("select id,photo,thumb from #_post where id=:id ");
			
			if($row){
				Functions::delete_file(_upload_post_l.$row['photo']);
				Functions::delete_file(_upload_post_l.$row['thumb']);
				ClassPDO::bindMore(array("id"=>$id));
				ClassPDO::query("delete from #_post where id=:id ");
			}
		}
		Functions::redirect($_SESSION['links_re']);
	}

}
?>