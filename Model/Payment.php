<?php
namespace Model;

class Payment{   

    public function __construct($router)
    { 
    	$this->title_bar .= _thanhtoan;
    	$this->plugin_css = \Library\plugins::addcss(ROOT."/assets/css/giohang.css");
    }

    
}	