<?php
namespace Model;

use \Library\Model;
use \Library\ClassPDO;

class ConfirmCart extends Model{   

    public function __construct($router)
    { 
    	parent::__construct();
    	$this->title_bar .= _xacnhan;
    	$this->plugin_css = \Library\plugins::addcss(ROOT."/assets/css/giohang.css");
		$this->phuongthuc_tt = ClassPDO::query("select * from #_title where shows=1 and type='httt' order by number,id desc ");

		$this->dieukhoan_muahang  =  ClassPDO::row("select content_".$this->lang." from #_info where type='giaohang' ");
		$this->shipping = ClassPDO::query("select * from #_title  where shows=1 and type='shiping' order by number,id desc");
		if(isset($_POST)){
			$this->sendOrder();
		}
    }

    public function sendOrder(){

    }

    
}	