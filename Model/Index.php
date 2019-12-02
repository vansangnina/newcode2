<?php
namespace Model;
/**
* Application Main Page That Will Serve All Requests
*
* @package Simple Nina Framework
* @author  Hiếu Nguyễn <nguyenhieunina@gmail.com>
* @version 1.0.0
* @license http://nina.vn
*/

use \Library\Model;
use \Library\ClassPDO;
use \Library\Plugins;
class Index extends Model{   

    public function __construct($router)
    { 
        $this->com=$router->com;
        $this->title_com=$router->title;

        $this->list_home = NEW Plugins('sanpham','sanphamhot');
        $plugin_css .= $this->list_home->css();

        $this->dichvu = NEW Plugins('dichvu','owl4');
        $plugin_css .= $this->dichvu->css();

        $this->sanpham_khac = NEW Plugins('sanpham','spkhac');
        $plugin_css .= $this->sanpham_khac->css();

        $this->sanpham_bc = NEW Plugins('sanpham','owl_banchay');
        $plugin_css .= $this->sanpham_bc->css();

        $this->sanpham_nb = NEW Plugins('sanpham','listnoibat');
        $plugin_css .= $this->sanpham_nb->css();

        $this->tintuc_bt = NEW Plugins('tintuc','owl');
        $plugin_css .= $this->tintuc_bt->css();

        return $this->plugin_css = $plugin_css;
    }

    public function ProductList(){
        ClassPDO::bindMore(array("shows"=>1,"type"=>"product","highlight"=>0));
        $result = ClassPDO::query("select * from #_cate_list where shows=:shows and type=:type and highlight!=:highlight order by number,id desc");
        return $result;
    }
    
}
?>