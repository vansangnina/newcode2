<?php
namespace Model;

use \Library\Model;
use \Library\ClassPDO;
use \Library\Functions;

class Service extends Model{   
    public static $per_page=12;
    public function __construct($router)
    { 
        parent::__construct();
        $this->type=$router->type;
        $this->com=$router->com;
        $this->title_com=$router->title;
        if(array_key_exists('id',$router->params)){
            $this->data=$this->DetailNews($router->params['id']);
        } elseif(array_key_exists('ids',$router->params)){
        	$this->data=$this->SubNews($router->params['ids']);
        } elseif(array_key_exists('idi',$router->params)){
            $this->data=$this->ItemNews($router->params['idi']);
        } elseif(array_key_exists('idc',$router->params)){
            $this->data=$this->CatNews($router->params['idc']);
        } elseif(array_key_exists('idl',$router->params)){
            $this->data=$this->ListNews($router->params['idl']);
        } else {
            $this->data=$this->IndexNews();
        }

    }
    public function getfield(){
        return "name_".$this->lang.",slug,id,thumb,photo,description_".$this->lang;
    }

    public function DetailNews($id){
        ClassPDO::bindMore(array("shows"=>1,"type"=>$this->type,"slug"=>$id));
        $this->row_detail  =  ClassPDO::row("select * from #_post where shows=:shows and type=:type and slug=:slug");
        $this->title_detail = $this->title_com;
        
        ClassPDO::bindMore(array("type"=>$this->type,"id_cate"=>$this->row_detail['id']));
        $this->photos = ClassPDO::query("select thumb,id,photo from #_cate_photo where type=:type and id_cate=:id_cate order by number,id desc");
        Functions::luotxem('post',$this->row_detail['id']);

        $this->facebook = '<meta property="og:url" content="'.Functions::getCurrentPageURL().'" />';
        $this->facebook .= '<meta property="og:title" content="'.$this->row_detail['name_'.$this->lang].'" />';
        $this->facebook .= '<meta property="og:description" content="'.$this->row_detail['description_'.$this->lang].'" />';
        $this->facebook .= '<meta property="og:image" content="http://'.$config_url.'/'._upload_post_l.$this->row_detail['photo'].'" />';

        ClassPDO::bindMore(array("shows"=>1,"type"=>$this->type,"id"=>$this->row_detail['id']));
        return ClassPDO::query("select ".$this->getfield()." from #_post where shows=:shows and type=:type and id!=:id order by number,id desc");

    }

    public function IndexNews(){
        $startpoint = ($this->page * static::$per_page) - static::$per_page;
        $limit = ' limit '.$startpoint.','.static::$per_page;
        
        $where = " #_post where shows=:shows and type=:type ";
        $where .= " order by number,datecreate desc ";
        $arr_dpo = array("type"=>$this->type,"shows"=>1);
        $url = Functions::getCurrentPageURL();
        $this->paging = Functions::pagination($where,static::$per_page,$this->page,$url,$arr_dpo);
        $this->title_detail = $this->title_com;
        ClassPDO::bindMore($arr_dpo);
        return ClassPDO::query("select ".$this->getfield()." from $where $limit");
    }

    public function ListNews($idl){
        $this->rowDetail=$this->getCate('list',$idl,$this->type);
        $startpoint = ($this->page * static::$per_page) - static::$per_page;
        $limit = ' limit '.$startpoint.','.static::$per_page;
        
        $where = " #_post where shows=:shows and type=:type and id_list=:id_list  ";
        $where .= " order by number,datecreate desc ";
        $arr_dpo = array("type"=>$this->type,"shows"=>1,"id_list"=>$this->rowDetail['id']);
        $url = Functions::getCurrentPageURL();
        $this->paging = Functions::pagination($where,static::$per_page,$this->page,$url,$arr_dpo);
        $this->title_detail = $this->rowDetail['name_'.$this->lang];
        ClassPDO::bindMore($arr_dpo);
        return ClassPDO::query("select ".$this->getfield()." from $where $limit");
    }

    public function CatNews($idc){
        $this->rowDetail=$this->getCate('cat',$idc,$this->type);
        $startpoint = ($this->page * static::$per_page) - static::$per_page;
        $limit = ' limit '.$startpoint.','.static::$per_page;
        
        $where = " #_post where shows=:shows and type=:type and id_cat=:id_cat  ";
        $where .= " order by number,datecreate desc ";
        $arr_dpo = array("type"=>$this->type,"shows"=>1,"id_cat"=>$this->rowDetail['id']);
        $url = Functions::getCurrentPageURL();
        $this->paging = Functions::pagination($where,static::$per_page,$this->page,$url,$arr_dpo);
        $this->title_detail = $this->rowDetail['name_'.$this->lang];
        ClassPDO::bindMore($arr_dpo);
        return ClassPDO::query("select ".$this->getfield()." from $where $limit");
    }

    public function ItemNews($idi){
        $this->rowDetail=$this->getCate('item',$idi,$this->type);
        $startpoint = ($this->page * static::$per_page) - static::$per_page;
        $limit = ' limit '.$startpoint.','.static::$per_page;
        
        $where = " #_post where shows=:shows and type=:type and id_item=:id_item  ";
        $where .= " order by number,datecreate desc ";
        $arr_dpo = array("type"=>$this->type,"shows"=>1,"id_item"=>$this->rowDetail['id']);
        $url = Functions::getCurrentPageURL();
        $this->paging = Functions::pagination($where,static::$per_page,$this->page,$url,$arr_dpo);
        $this->title_detail = $this->rowDetail['name_'.$this->lang];
        ClassPDO::bindMore($arr_dpo);
        return ClassPDO::query("select ".$this->getfield()." from $where $limit");
    }

    public function SubNews($idi){
        $this->rowDetail=$this->getCate('sub',$ids,$this->type);
        $startpoint = ($this->page * static::$per_page) - static::$per_page;
        $limit = ' limit '.$startpoint.','.static::$per_page;
        
        $where = " #_post where shows=:shows and type=:type and id_sub=:id_sub  ";
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