<?php
namespace Model\Admin;

use \Library\ModelAdmin;
use \Library\ClassPDO;
use \Library\Functions;
use \Library\Lang;

class Banner extends ModelAdmin{   

    public function __construct($router)
    { 
    	parent::__construct();
        switch($this->act){
			case "capnhat": $this->data=$this->get_banner(); $this->view = "banner/item_add"; break;
			case "save": $this->save_banner(); break;
			default: $this->view = "index";
		}
    }


	public function get_banner(){
		$type = $_GET['type'];
		ClassPDO::bindMore(array("type"=>$type));
		return ClassPDO::row("select * from #_photo where type=:type");
	}

	public function save_banner(){
		
		$type = $_GET['type'];
		ClassPDO::bindMore(array("type"=>$type));
		$item = ClassPDO::row("select * from #_photo where type=:type");
		$id=$item['id'];
			
		foreach (Lang::MultiLang() as $key => $value) {
			$file_name=Functions::images_name($_FILES['file_'.$key]['name']);
			if($photo = Functions::upload_image("file_".$key,_img_type, _upload_hinhanh_l,$file_name)){
				$data['photo_'.$key] = $photo;
				$data['thumb_'.$key] = Functions::create_thumb($data['photo_'.$key], _width_thumb, _height_thumb, _upload_hinhanh_l,$file_name,_style_thumb);
				if($item){
					ClassPDO::setTable('photo');
					ClassPDO::setType('row');
					ClassPDO::setWhere('id', $id);
					$row = ClassPDO::select();
					Functions::delete_file(_upload_hinhanh_l.$row['photo_'.$key]);
					Functions::delete_file(_upload_hinhanh_l.$row['thumb_'.$key]);
				}
			}
			$data['name_'.$key] = $_POST['name_'.$key];
		}

		$data['slug'] = Functions::changeTitle($_POST['name_'.$config['activelang']]);
		$data['link'] = $_POST['link'];
		$data['shows'] = isset($_POST['shows']) ? 1 : 0;
		$data['dateupdate'] = date("Y-m-d H:i:s");

		if($item){

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
}
?>