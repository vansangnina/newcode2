<?php
namespace Model\Admin;

use \Library\ModelAdmin;
use \Library\ClassPDO;
use \Library\Functions;

class Lang extends ModelAdmin{   

    public function __construct($router)
    { 
    	parent::__construct();
        switch($this->act){
			case "man": $this->data=$this->get_mans(); $this->view = "lang/items"; break;
			case "add":	$this->view = "lang/item_add"; break;
			case "edit": $this->data=$this->get_man(); $this->view = "lang/item_add"; break;
			case "save": $this->save_man(); break;
			case "update": $this->update_lang(); break;
			case "delete": $this->delete_man(); break;	
			default: $this->view = "index";
		}
    }
	#====================================update lang
	function update_lang(){
		foreach (\Library\Lang::MultiLang() as $key => $value) {
			$langfile = "upload/lang/lang_".$key.".json";
			#================create lang file
			$row = ClassPDO::query("select name,type_".$key." from #_lang");
			for($i=0;$i<count($row);$i++){
				$arr_json[$row[$i]['name']] = $row[$i]['type_'.$key];
			}
			$this->create_json($langfile,$arr_json);
		}
		Functions::transfer("Cập nhật dữ liệu Thành công !", $_SESSION['links_re']);
	}

	function create_json($path,$arr=array()){
		$fp = fopen($path, 'w');
		fwrite($fp, json_encode($arr));
		fclose($fp);
	}

	#====================================
	function get_mans(){

		$per_page = $_SESSION['pagetable']; // Set how many records do you want to display per page.
		$startpoint = ($this->page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		$where = " #_lang ";
		if($_GET['keyword']!='')
		{
			$where.=" where name LIKE :keyword ";
			foreach (\Library\Lang::MultiLang() as $key => $value) {
				$where.=" or type_$key LIKE :type_$key ";
				$arr_dpo['type_'.$key] = '%'.$_GET['keyword'].'%';
			}
			$arr_dpo['keyword'] = '%'.$_GET['keyword'].'%';
			ClassPDO::bindMore($arr_dpo);
		}
		$where .=" order by id desc";
	    $items  =  ClassPDO::query("select * from $where $limit");
		$url = Functions::getCurrentPageURL();
		$this->paging = Functions::pagination($where,$per_page,$this->page,$url,$arr_dpo);
		return $items;
	}

	function get_man(){
		$id = $_GET['id'];
		if(!$id) Functions::transfer("Không nhận được dữ liệu", $_SESSION['links_re']);

		ClassPDO::bindMore(array("id"=>$id));
	    $item  =  ClassPDO::row("select * from #_lang where id=:id");
	    if(!$item) Functions::transfer("Dữ liệu không có thực", $_SESSION['links_re']);
	    return $item;
	}

	function save_man(){
		if(empty($_POST)) Functions::transfer("Không nhận được dữ liệu",$_SESSION['links_re']);
		$id = $_POST['id'];
		/*save*/
		$data['name'] =$_POST['name'];
		foreach (\Library\Lang::MultiLang() as $key => $value) {
			$data['type_'.$key] = $_POST['type_'.$key];
		}
		/*save*/
		if($id){
			ClassPDO::setTable('lang');
			ClassPDO::setWhere('id', $id);
			ClassPDO::update($data);
			Functions::redirect($_SESSION['links_re']);
		}else{
			ClassPDO::setTable('lang');
			ClassPDO::insert($data);
			Functions::redirect($_SESSION['links_re']);
		}
	}

	function delete_man(){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$id=$listid[$i]; 
			ClassPDO::bindMore(array("id"=>$id));
			$row = ClassPDO::row("select * from #_lang where id=:id ");
			if($row){
				ClassPDO::bindMore(array("id"=>$id));
				ClassPDO::query("delete from #_lang where id=:id ");
			}
		}
		Functions::redirect($_SESSION['links_re']);
	}
}