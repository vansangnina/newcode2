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
use \Library\Plugins;

abstract class Model{
	public $lang;
	public function __construct()
    {
    	$this->lang=Lang::lang();
        $this->page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
        if ($this->page <= 0) $this->page = 1;
    }
    
    public function seo($title,$keywords,$description){
        $this->title = $title;
        $this->keywords = $keywords;
        $this->description = $description;
    }

    public function getCate($tbl,$slug,$type){
        ClassPDO::bindMore(array("type"=>$type,"slug"=>$slug));
        $result = ClassPDO::row("select * from #_cate_$tbl where type=:type and slug=:slug order by number,id desc");
        $this->seo($result['title'],$result['keywords'],$result['description']);
        return $result;
    }

    public function setting(){
        $result = ClassPDO::row("select * from #_setting limit 0,1");
        return (object) $result;
    }


}