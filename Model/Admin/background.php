<?php
namespace Model\Admin;

use \Library\ModelAdmin;
use \Library\ClassPDO;
use \Library\Functions;
use \Library\Lang;

class Background extends ModelAdmin{   

    public function __construct($router)
    { 
    	parent::__construct();
        switch($this->act){
			case "capnhat": $this->data=$this->get_banner(); $this->view = "background/item_add"; break;
			case "save": $this->save_banner(); break;
			default: $this->view = "index";
		}
    }

	function get_banner(){

		$type = $_GET['type'];
		ClassPDO::bindMore(array("type"=>$type));
		$item  =  ClassPDO::row("select * from #_bgweb where type=:type limit 0,1");

		if($_REQUEST['xoaanh']!='' && $item)
		{
			$id_up = $_REQUEST['xoaanh'];
			Functions::delete_file(_upload_hinhanh_l.$item['photo']);
			Functions::delete_file(_upload_hinhanh_l.$item['thumb']);
			ClassPDO::bindMore(array("type"=>$type));
			ClassPDO::query("UPDATE table_bgweb SET photo ='',thumb ='' where type=:type ");
			Functions::transfer("Đã xóa ảnh ! ", $_SESSION['links_re']);
		}
	}

	function save_banner(){
		if(empty($_POST)) transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		$type = $_GET['type'];
		$file_name=Functions::images_name($_FILES['file']['name']);

		ClassPDO::bindMore(array("type"=>$type));
		$row_item = ClassPDO::row("select * from #_bgweb where type=:type");

		if($photo = Functions::upload_image("file", _img_type,_upload_hinhanh_l,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = Functions::create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_hinhanh_l,$file_name,_style_thumb);	
			if($row_item){
				$id = $row_item['id'];
				ClassPDO::setTable('bgweb');
				ClassPDO::setWhere('id',$id);
				ClassPDO::setType('row');
				$row = ClassPDO::select('photo,thumb');
				if($row){
					Functions::delete_file(_upload_hinhanh_l.$row['photo']);	
					Functions::delete_file(_upload_hinhanh_l.$row['thumb']);				
				}
			}
		}

		$data['re_peat'] = $_POST['re_peat'];
		$data['waytop'] = $_POST['waytop'];
		$data['wayleft'] = $_POST['wayleft'];
		$data['wayright'] = $_POST['wayright'];
		$data['waybottom'] = $_POST['waybottom'];
		$data['fix_bg'] = $_POST['fix_bg'];
		$data['bgcolor'] = $_POST['bgcolor']; 
		$data['type'] = $_GET['type'];
		$data['dateupdate'] = date("Y-m-d H:i:s");
		$data['shows'] = isset($_POST['shows']) ? 1 : 0;

		if($row_item){

			ClassPDO::setTable('bgweb');
			ClassPDO::setWhere('id', $id);
			ClassPDO::update($data);
			Functions::redirect($_SESSION['links_re']);
			
		} else {
			$data['datecreate'] = date("Y-m-d H:i:s");
			ClassPDO::setTable('bgweb');
			ClassPDO::insert($data);
			Functions::redirect($_SESSION['links_re']);
		}
		
	}
}