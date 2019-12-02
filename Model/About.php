<?php
namespace Model;

use \Library\Model;
use \Library\ClassPDO;

class About extends Model{   

    public function __construct($router)
    { 
    	parent::__construct();
        $this->type=$router->type;
        $this->com=$router->com;
        $this->content();
    }

    public function content(){
        ClassPDO::bindMore(array("type"=>$this->type));
        $result = ClassPDO::row("select content_".$this->lang.",title,keywords,description from #_info where type=:type");
        $this->seo($result['title'],$result['keywords'],$result['description']);
        return $result['content_'.$this->lang];
    }
    
}
?>