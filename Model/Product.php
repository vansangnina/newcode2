<?php
namespace Model;

use \Library\Model;
use \Library\ClassPDO;
use \Library\Functions;

class Product extends Model{   
    public static $per_page=12;
    public function __construct($router)
    { 
        parent::__construct();
        $this->type=$router->type;
        $this->com=$router->com;
        $this->title_com=$router->title;
        if(array_key_exists('id',$router->params)){
            $this->data=$this->DetailProduct($router->params['id']);
        } elseif(array_key_exists('ids',$router->params)){
        	$this->data=$this->SubProduct($router->params['ids']);
        } elseif(array_key_exists('idi',$router->params)){
            $this->data=$this->ItemProduct($router->params['idi']);
        } elseif(array_key_exists('idc',$router->params)){
            $this->data=$this->CatProduct($router->params['idc']);
        } elseif(array_key_exists('idl',$router->params)){
            $this->data=$this->ListProduct($router->params['idl']);
        } else {
            $this->data=$this->IndexProduct();
        }

    }
    public function getfield(){
        return "name_".$this->lang.",slug,id,thumb,price,oldprice,photo,description_".$this->lang."";
    }

    public function DetailProduct($id){
        ClassPDO::bindMore(array("shows"=>1,"type"=>$this->type,"slug"=>$id));
        $this->row_detail  =  ClassPDO::row("select * from #_product where shows=:shows and type=:type and slug=:slug");

        $attributes = json_decode($this->row_detail['attributes'],true);

        $this->row_star = ClassPDO::query("select * from #_review where com='".$this->com."' and id_product='".$this->row_detail['id']."' ");
        $tongsao = 0;
        for($i=0;$i<count($row_star);$i++){
            $tongsao = $tongsao + $row_star[$i]['star'];
        }
        $this->tongsao = $tongsao;
        if(count($this->row_star)>0){
            $this->num_star = round($tongsao/count($this->row_star),1);
        }
        
        $this->luotmua = ClassPDO::row("select COUNT(*) as tong from #_order_detail where id_product='".$this->row_detail['id']."' ");

        ClassPDO::bindMore(array("type"=>$this->type,"id_cate"=>$this->row_detail['id']));
        $this->photos = ClassPDO::query("select thumb,id,photo from #_cate_photo where type=:type and id_cate=:id_cate order by number,id desc");

        ClassPDO::bindMore(array("type"=>"muahang"));
        $this->chinhsach = ClassPDO::row("select content_".$this->lang." from #_info where type=:type");

        Functions::daxem($this->row_detail['id']);
        Functions::luotxem('product',$this->row_detail['id']);

        $this->facebook = '<meta property="og:url" content="'.Functions::getCurrentPageURL().'" />';
        $this->facebook .= '<meta property="og:title" content="'.$this->row_detail['name_'.$this->lang].'" />';
        $this->facebook .= '<meta property="og:description" content="'.$this->row_detail['description_'.$this->lang].'" />';
        $this->facebook .= '<meta property="og:image" content="http://'.$config_url.'/'._upload_product_l.$this->row_detail['photo'].'" />';

        ClassPDO::bindMore(array("shows"=>1,"type"=>$this->type,"id_list"=>$this->row_detail['id_list'],"id"=>$this->row_detail['id']));
        return ClassPDO::query("select ".$this->getfield()." from #_product where shows=:shows and type=:type and id_list=:id_list and id!=:id order by number,id desc");

    }

    public function IndexProduct(){
        $startpoint = ($this->page * static::$per_page) - static::$per_page;
        $limit = ' limit '.$startpoint.','.static::$per_page;
        
        $where = " #_product where shows=:shows and type=:type ";
        $where .= " order by number,datecreate desc ";
        $arr_dpo = array("type"=>$this->type,"shows"=>1);
        $url = Functions::getCurrentPageURL();
        $this->paging = Functions::pagination($where,static::$per_page,$this->page,$url,$arr_dpo);
        $this->title_detail = $this->title_com;
        ClassPDO::bindMore($arr_dpo);
        return ClassPDO::query("select ".$this->getfield()." from $where $limit");
    }

    public function ListProduct($idl){
        $this->rowDetail=$this->getCate('list',$idl,$this->type);
        $startpoint = ($this->page * static::$per_page) - static::$per_page;
        $limit = ' limit '.$startpoint.','.static::$per_page;
        
        $where = " #_product where shows=:shows and type=:type and id_list=:id_list  ";
        $where .= " order by number,datecreate desc ";
        $arr_dpo = array("type"=>$this->type,"shows"=>1,"id_list"=>$this->rowDetail['id']);
        $url = Functions::getCurrentPageURL();
        $this->paging = Functions::pagination($where,static::$per_page,$this->page,$url,$arr_dpo);
        $this->title_detail = $this->rowDetail['name_'.$this->lang];
        ClassPDO::bindMore($arr_dpo);
        return ClassPDO::query("select ".$this->getfield()." from $where $limit");
    }

    public function CatProduct($idc){
        $this->rowDetail=$this->getCate('cat',$idc,$this->type);
        $startpoint = ($this->page * static::$per_page) - static::$per_page;
        $limit = ' limit '.$startpoint.','.static::$per_page;
        
        $where = " #_product where shows=:shows and type=:type and id_cat=:id_cat  ";
        $where .= " order by number,datecreate desc ";
        $arr_dpo = array("type"=>$this->type,"shows"=>1,"id_cat"=>$this->rowDetail['id']);
        $url = Functions::getCurrentPageURL();
        $this->paging = Functions::pagination($where,static::$per_page,$this->page,$url,$arr_dpo);
        $this->title_detail = $this->rowDetail['name_'.$this->lang];
        ClassPDO::bindMore($arr_dpo);
        return ClassPDO::query("select ".$this->getfield()." from $where $limit");
    }

    public function ItemProduct($idi){
        $this->rowDetail=$this->getCate('item',$idi,$this->type);
        $startpoint = ($this->page * static::$per_page) - static::$per_page;
        $limit = ' limit '.$startpoint.','.static::$per_page;
        
        $where = " #_product where shows=:shows and type=:type and id_item=:id_item  ";
        $where .= " order by number,datecreate desc ";
        $arr_dpo = array("type"=>$this->type,"shows"=>1,"id_item"=>$this->rowDetail['id']);
        $url = Functions::getCurrentPageURL();
        $this->paging = Functions::pagination($where,static::$per_page,$this->page,$url,$arr_dpo);
        $this->title_detail = $this->rowDetail['name_'.$this->lang];
        ClassPDO::bindMore($arr_dpo);
        return ClassPDO::query("select ".$this->getfield()." from $where $limit");
    }

    public function SubProduct($idi){
        $this->rowDetail=$this->getCate('sub',$ids,$this->type);
        $startpoint = ($this->page * static::$per_page) - static::$per_page;
        $limit = ' limit '.$startpoint.','.static::$per_page;
        
        $where = " #_product where shows=:shows and type=:type and id_sub=:id_sub  ";
        $where .= " order by number,datecreate desc ";
        $arr_dpo = array("type"=>$this->type,"shows"=>1,"id_sub"=>$this->rowDetail['id']);
        $url = Functions::getCurrentPageURL();
        $this->paging = Functions::pagination($where,static::$per_page,$this->page,$url,$arr_dpo);
        $this->title_detail = $this->rowDetail['name_'.$this->lang];
        ClassPDO::bindMore($arr_dpo);
        return ClassPDO::query("select ".$this->getfield()." from $where $limit");
    }

}
?>