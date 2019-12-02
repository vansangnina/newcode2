<?php
namespace Model;

use \Library\Model;
use \Library\ClassPDO;

class Success extends Model{   

    public function __construct($router)
    { 
    	$this->titleDetail = _dathangthanhcong;

    	$this->madonhang=$router->params['madonhang'];



    }

}	