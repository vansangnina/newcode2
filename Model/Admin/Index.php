<?php
namespace Model\Admin;

use \Library\Model;
use \Library\ClassPDO;

class Index extends Model{   

    public function __construct($router)
    { 
    	parent::__construct();
        $this->type=$router->type;
        $this->view='index';
    }
    
}
?>