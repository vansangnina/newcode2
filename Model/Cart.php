<?php
namespace Model;

class Cart{   

    public function __construct($router)
    { 
    	$this->title_bar .= _giohang;
    	$this->plugin_css = \Library\plugins::addcss(ROOT."/assets/css/giohang.css");
    }   
}	