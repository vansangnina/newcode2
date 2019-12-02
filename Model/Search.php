<?php
namespace Model;

use \Library\Model;
use \Library\ClassPDO;
use \Library\Functions;

class Search extends Model{   
    public static $per_page=12;
    public function __construct($router)
    { 
        parent::__construct();
        $this->type=$router->type;
        $this->com=$router->com;
        $this->title_com=$router->title;
        $this->data=$this->IndexNews();
    }
    public function getfield(){
        return "name_".$this->lang.",slug,id,thumb,photo,description_".$this->lang;
    }

    public function IndexNews(){

		$id_list=trim($_GET['loainha']);
		$huongnha=trim($_GET['huongnha']);
		$tinhthanh=trim($_GET['tinhthanh']);
		$quanhuyen=trim($_GET['quanhuyen']);
		$dientich=trim($_GET['dientich']);
		$gia=trim($_GET['gia']);
		$key=trim($_GET['keywords']);
		$key_khong_dau=Functions::changeTitle($key);
		$this->title_detail = $this->title_com;

		$startpoint = ($this->page * static::$per_page) - static::$per_page;
		$limit = ' limit '.$startpoint.','.static::$per_page;
		
		$where = " #_product where shows=:shows and type=:type ";
		$ten=trim($_POST['timkiem']);
		if($key!='')
		{
			$where.=" and name_".$this->lang." like :key or slug like :key_khong_dau ";
			$arr_pdo['key'] = "%".$key."%";
			$arr_pdo['key_khong_dau'] = "%".$key_khong_dau."%";
		}
		if($loainha!='')
		{
			$where.=" and loainha=:loainha ";
			$arr_pdo['loainha'] = $loainha;
		}
		if($huongnha!='')
		{
			$where.=" and huongnha=:huongnha ";
			$arr_pdo['huongnha'] = $huongnha;
		}
		if($tinhthanh!='')
		{
			$where.=" and tinhthanh=:tinhthanh ";
			$arr_pdo['tinhthanh'] = $tinhthanh;
		}
		if($quanhuyen!='')
		{
			$where.=" and quanhuyen=:quanhuyen ";
			$arr_pdo['quanhuyen'] = $quanhuyen;
		}

		if($dientich!='')
		{
			$dientich_s = explode('-',$dientich);
			if($dientich_s[0]==0){
				$where.= " and dientich < :dientichtu ";
			} else if($dientich_s[1]==0){
				$where.= " and dientich > :dientichden  ";
			} else {
				$where.= " and dientich > :dientichden and dientich < :dientichtu ";
			}
			$arr_pdo['dientichtu'] = $dientich_s[1];
			$arr_pdo['dientichden'] = $dientich_s[0];

		}

		if($gia!='')
		{
			$gia_s = explode('-',$gia);
			if($gia_s[0]==0){
				$where.= " and price < :giabantu ";
			} else if($gia_s[1]==0){
				$where.= " and price > :giabanden  ";
			} else {
				$where.= " and price > :giabanden and price < :giabantu ";
			}
			$arr_pdo['giabantu'] = $gia_s[1];
			$arr_pdo['giabanden'] = $gia_s[0];
		}

		$where .= " order by number,id desc";

		$arr_pdo['shows']=1;
		$arr_pdo['type']='product';

		$url = Functions::getCurrentPageURL();
		$this->paging = Functions::pagination($where,static::$per_page,$this->page,$url,$arr_pdo);

		ClassPDO::bindMore($arr_pdo);
    	return ClassPDO::query("select ".$this->getfield()." from $where $limit");
    }


}