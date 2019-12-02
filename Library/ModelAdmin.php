<?php
namespace Library;
/**
 * Application Main Page That Will Serve All Requests
 *
 * @package Simple Nina Framework
 * @author  Hiếu Nguyễn <nguyenhieunina@gmail.com>
 * @version 1.0.0
 * @license http://nina.vn
 */
use \Library\App;
use \Library\ClassPDO;
use \Library\Lang;
use \Library\Functions;

abstract class ModelAdmin{
	public $lang;
	public function __construct()
    {
    	$this->lang=Lang::lang();
        $this->com = (isset($_GET['com'])) ? addslashes($_GET['com']) : "";
        $this->act = (isset($_GET['act'])) ? addslashes($_GET['act']) : "";
        $this->type = (isset($_GET['type'])) ? addslashes($_GET['type']) : "";
        $this->page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
        $arr_act = explode('_', $this->act);
        $this->fact = $arr_act[1];
        if(!$this->com){ $this->com = 'index';}
        if ($this->page <= 0) $this->page = 1;
        if(!isset($_SESSION['pagetable'])){ $_SESSION['pagetable'] = 10; }
        if($_GET['act']=='man' || $_GET['act']=='man_cat' || $_GET['act']=='man_list' || $_GET['act']=='capnhat' || $_GET['act']=='man_photo' || $_GET['act']=='man_sub' || $_GET['act']=='man_item'){
            $_SESSION['links_re'] = Functions::getCurrentPage();
        }
    }
    
    public function getCate($tbl,$slug,$type){
        ClassPDO::bindMore(array("type"=>$type,"slug"=>$slug));
        $result = ClassPDO::row("select * from #_cate_$tbl where type=:type and slug=:slug order by number,id desc");
        $this->seo($result['title'],$result['keywords'],$result['description']);
        return $result;
    }

}