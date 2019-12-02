<?php
namespace Model\Admin;

use \Library\ModelAdmin;
use \Library\ClassPDO;
use \Library\Functions;
use \Library\Lang;

class Setting extends ModelAdmin{   

    public function __construct($router)
    { 
    	parent::__construct();
        switch($this->act){
			case "capnhat": $this->data=$this->get_item(); $this->view = "setting/item_add"; break;
			case "save": $this->save_item(); break;
			default: $this->view = "index";
		}
    }

	function get_item(){
		return ClassPDO::row("select * from #_setting limit 0,1");
	}

	function save_item(){
		if(empty($_POST)) Functions::transfer("Không nhận được dữ liệu", "index.php?com=setting&act=capnhat");
		foreach (Lang::MultiLang() as $key => $value) {
			$data['name_'.$key] = $_POST['name_'.$key];
			$data['shortname_'.$key] = $_POST['shortname_'.$key];
			$data['slogan_'.$key] = $_POST['slogan_'.$key];
			$data['address_'.$key] = $_POST['address_'.$key];
		}
		$data['zalo'] = $_POST['zalo'];
		if($_FILES){
			$img_dongdau = Functions::upload_image("dongdau", 'png', '../upload/','watermark');
			Functions::create_thumb($img_dongdau, 250, 250,'../upload/','watermark',_style_thumb);	
		}

		$data['phone'] = $_POST['phone'];
		$data['email'] = $_POST['email'];
		$data['website'] = $_POST['website'];
		
		$data['facebook'] = $_POST['facebook'];
		$data['location_map'] = $_POST['location_map'];
		$data['hotline'] = $_POST['hotline'];
		$data['opentime'] = $_POST['opentime'];
		$data['timelive'] = $_POST['timelive'];
		$data['support_phone'] = $_POST['support_phone'];
		$data['consult_phone'] = $_POST['consult_phone'];

		$data['twitter'] = $_POST['twitter'];
		$data['keymap'] = $_POST['keymap'];
		$data['idfacebook'] = $_POST['idfacebook'];
		$data['codebody'] = $_POST['codebody'];
		$data['codehead'] = $_POST['codehead'];
		$data['codebottom'] = $_POST['codebottom'];
		$data['googleplus'] = $_POST['googleplus'];

		$data['analytics'] = $_POST['analytics'];
		$data['vchat'] = $_POST['vchat'];

		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];							
		
		$data['dateupdate'] = date("Y-m-d H:i:s");
		ClassPDO::setTable('setting');
		ClassPDO::update($data);
		Functions::redirect($_SESSION['links_re']);

	}
}