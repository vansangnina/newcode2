<?php
namespace Model\Admin;

use \Library\ModelAdmin;
use \Library\ClassPDO;
use \Library\Functions;
use \Library\Lang;

class Info extends ModelAdmin{   

    public function __construct($router)
    { 
    	parent::__construct();
        switch($this->act){
			case "capnhat": $this->data=$this->get_info(); $this->view = "info/item_add"; break;
			case "save": $this->save_info(); break;
			default: $this->view = "index";
		}
    }

	public function get_info(){
		$type = $_GET['type'];

		ClassPDO::bindMore(array("type"=>$type));
		$item  =  ClassPDO::row("select * from #_info where type=:type limit 0,1");

		$id = $item['id'];

		ClassPDO::bindMore(array("type"=>$_GET['type'],"id_cate"=>$id));
		$this->photos  =  ClassPDO::query("select * from #_cate_photo where id_cate=:id_cate and type=:type order by number,id desc");
		return $item;
	}

	public function save_info(){
		if(empty($_POST)) Functions::transfer("Không nhận được dữ liệu", $_SESSION['links_re']);

		$type = $_GET['type'];
		$file_name=Functions::images_name($_FILES['file']['name']);

		ClassPDO::bindMore(array("type"=>$type));
		$row_item = ClassPDO::row("select * from #_info where type=:type ");

		$id = $row_item['id'];

		if($photo = Functions::upload_image("file",_img_type, _upload_hinhanh_l,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = Functions::create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_hinhanh_l,$file_name,_style_thumb);	
			if($id){
				$id = $row_item['id'];
				ClassPDO::setTable('info');
				ClassPDO::setWhere('id',$id);
				ClassPDO::setType('row');
				$row = ClassPDO::select('photo,thumb');
				if($row){
					Functions::delete_file(_upload_hinhanh_l.$row['photo']);	
					Functions::delete_file(_upload_hinhanh_l.$row['thumb']);				
				}
			}	
		}

		foreach (lang::MultiLang() as $key => $value) {
			$data['name_'.$key] = $_POST['name_'.$key];
			$data['description_'.$key] = $_POST['description_'.$key];
			$data['content_'.$key] = $_POST['content_'.$key];
		}

		$data['slug'] = Functions::changeTitle($_POST['name_'.$config['activelang']]);
		
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		
		$data['number'] = $_POST['number'];
		$data['shows'] = isset($_POST['shows']) ? 1 : 0;
		$data['dateupdate'] = date("Y-m-d H:i:s");
		$data['type'] = $type;
		if($row_item){
			ClassPDO::setTable('info');
			ClassPDO::setWhere('id', $id);
			ClassPDO::update($data);
			$this->multi_upload($id);
			Functions::redirect($_SESSION['links_re']);
			
		} else {
			$data['datecreate'] = date("Y-m-d H:i:s");
			ClassPDO::setTable('info');
			ClassPDO::insert($data);
			$this->multi_upload(ClassPDO::InsertId());
			Functions::redirect($_SESSION['links_re']);
		}

	}

	public function multi_upload($id){
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
					//dongdauanh($data['photo'],_upload_product);
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
}
?>