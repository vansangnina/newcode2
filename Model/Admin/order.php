<?php
namespace Model\Admin;

use \Library\ModelAdmin;
use \Library\ClassPDO;
use \Library\Functions;
use \Library\Lang;

class Order extends ModelAdmin{   

    public function __construct($router)
    { 
    	parent::__construct();
        switch($this->act){
			case "man": $this->data=$this->get_items(); $this->view = "order/items"; break;
			case "add":	$this->view = "order/item_add"; break;
			case "edit": $this->data=$this->get_item(); $this->view = "order/item_add"; break;
			case "save": $this->save_item(); break;
			case "delete": $this->delete_item(); break;	
			default: $this->view = "index";
		}

		$urldanhmuc ="";
		$urldanhmuc.= (isset($_REQUEST['id_user'])) ? "&id_user=".addslashes($_REQUEST['id_user']) : "";
		$urldanhmuc.= (isset($_REQUEST['datefm'])) ? "&id_user=".addslashes($_REQUEST['datefm']) : "";
		$urldanhmuc.= (isset($_REQUEST['dateto'])) ? "&id_user=".addslashes($_REQUEST['dateto']) : "";
		$urldanhmuc.= (isset($_REQUEST['status'])) ? "&status=".addslashes($_REQUEST['status']) : "";

		$id=$_REQUEST['id'];

    }

	#====================================

	function get_items(){		
			$per_page = $_SESSION['pagetable']; // Set how many records do you want to display per page.
			$startpoint = ($this->page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;
			
			$where = " #_order ";
			$where .= " where id!=:id ";

			if($_REQUEST['id_list']!='')
			{
				$where.=" and id_list = :id_list ";
				$arr_dpo['id_list'] = $_GET['id_list'];
			}

			if($_REQUEST['ngaybd']!='')
			{
				$begin = strtotime(str_replace('/','-',$_REQUEST['ngaybd']));
				$where.=" and datecreate >= '".date('Y-m-d H:i:s',$begin)."' ";
			}

			if($_REQUEST['ngaykt']!='')
			{
				$begin = strtotime(str_replace('/','-',$_REQUEST['ngaykt'])) + 86400;
				$where.=" and datecreate <= '".date('Y-m-d H:i:s',$begin)."' ";
			}

			if($_REQUEST['sotien']!='')
			{
				$khoan_gia = explode('-',$_REQUEST['sotien']);
				if($khoan_gia[0]!=0 && $khoan_gia[1]!=0){
					$where.=" and totalprice>=".$khoan_gia[0]." and totalprice<=".$khoan_gia[1]." ";
				} elseif($khoan_gia[0]!=0){
					$where.=" and totalprice>=".$khoan_gia[0]." ";
				} elseif($khoan_gia[1]!=0){
					$where.=" and totalprice<=".$khoan_gia[1]." ";
				}
				
			}

			if($_REQUEST['httt']!='')
			{
				$where.=" and type_payment=".$_REQUEST['httt']." ";
			}

			if($_REQUEST['tinhtrang']!='')
			{
				$where.=" and status=".$_REQUEST['tinhtrang']." ";
			}

			if($_REQUEST['keyword']!='')
			{
				$where.=" and name LIKE :keyword ";
				$arr_dpo['keyword'] = '%'.$_GET['keyword'].'%';
			}
			$where .=" order by id desc";

			$arr_dpo['id'] = 0;
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
	    $item  =  ClassPDO::row("select * from #_order where id=:id");
	    if(!$item) Functions::transfer("Dữ liệu không có thực", $_SESSION['links_re']);

		ClassPDO::bindMore(array("id_order"=>$item['id']));
	    $this->CartDetail = ClassPDO::query("select * from #_order_detail where id_order = :id_order");

	    ClassPDO::bindMore(array("id"=>$id));
	    ClassPDO::query("UPDATE table_order SET view =1 WHERE  id = :id");
	    return $item;
	}

	function save_item(){
		if(empty($_POST)) Functions::transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		$id = $_POST['id'];
		if($id){
			$data['note'] = $_POST['note'];
			$data['status'] = $_POST['id_tinhtrang'];
			if($data['status'] == 8){
				for($i=0;$i<count($_POST['idproduct']);$i++){
					$d->reset();
					$sql="select amount from #_product where id = '".$_POST['idproduct'][$i]."'";
					$d->query($sql);
					$result_sl = $d->fetch_array();

					$slton = $result_sl['amount'] - $_POST['amount'][$i];
					ClassPDO::bindMore(array("amount"=>$slton,"id"=>$_POST['idproduct'][$i]));
					ClassPDO::query("UPDATE table_product SET amount =:amount WHERE  id = :id");
				}
			}	

			ClassPDO::setTable('order');
			ClassPDO::setWhere('id', $id);
			ClassPDO::update($data);
			Functions::redirect($_SESSION['links_re']);
		}
	}

	function delete_item(){
		global $d;
		if($_GET['id_cat']!='')
		{ $id_catt="&id_cat=".$_GET['id_cat'];
		}
		if($_GET['curPage']!='')
		{ $id_catt.="&curPage=".$_GET['curPage'];
		}
		if(isset($_GET['id'])){
			$id =  themdau($_GET['id']);
			ClassPDO::query("delete from #_order where id='".$id."'");
			ClassPDO::query("delete from #_order_detail where id_order 	='".$id."'");
			Functions::redirect($_SESSION['links_re'].$id_catt."");
		} 
		else Functions::transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	}
}