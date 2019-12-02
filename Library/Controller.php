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
use \Library\Ctrl;
use \Library\ClassPDO;
use \Library\Counter;
use \Library\Lang;
use \Library\Functions;
use \Library\Plugins;
use \Library\Model;
use \Library\View;
use \Library\Cart;

class Controller { 
	public $config;
    //protected static $model = [];
    //protected static $shared = null;
	public function __construct($config)
    {  
        App::register('view', $this );
		$lag = new Lang($config);
		$lang = $this->lang = $lag->lang();
        $db=new ClassPDO();
        $router=Ctrl::router();
        $func=new Functions();
        //self::$shared['model'] = App::get('model');\\
        if($router->type=='Admin') {
            if(isset($_SESSION[ADM]) && ($_SESSION[ADM] == true)){
                
                $type = new \Library\Type();
                $load_model = '\Model\Admin\\'.$_GET['com'];
                $this->model = new $load_model($router);
            }
        } else {
            $load_model = '\Model\\'.$router->model;
            $this->model = new $load_model($router);
        }
        $com=$this->com=$this->model->com;
        //View::view($template,$data);
        if($router->type=='Admin') {
            $act = (isset($_GET['act'])) ? addslashes($_GET['act']) : "";
            $view = $this->model->view;
            require VIEW."Admin/home.php";
        } else {
            $_SESSION['ONWEB'] = true;
            Counter::counter();
            $this->setting($config);
            $view = $router->view;
            $plugin_css = $this->model->plugin_css;
            $plugin_css .= $this->plugin();
            $cart = new Cart();
            require LAYOUT."Home.php";
        }
		
    }

    private function setting($config){
    	$result = ClassPDO::row('select * from #_setting limit 0,1');
    	$favicon  =  ClassPDO::row("select thumb_".$this->lang.",photo_vi from #_photo where type='favicon' limit 0,1 ");
    	if($this->model->title){ $this->title = $this->model->title;} else { $this->title = $result['title']; }
    	if($this->model->keywords){ $this->keywords = $this->model->keywords;} else { $this->keywords = $result['keywords']; }
    	if($this->model->description){ $this->description = $this->model->description;} else { $this->description = $result['description']; }
    	$this->toado = $result['toado'];
    	$this->diachi = $result['diachi_'.$this->lang];
    	$this->ten = $result['ten_'.$this->lang];
    	$this->googleplus = $result['googleplus'];
        $this->hotline = $result['hotline'];

    	if($config['setup']['responsive']=='true'){
    		$this->viewport = 'width=device-width, initial-scale=1';
    	} else {
    		$this->viewport = 'width=1200';
    	}
    	$this->robots = 'noodp,index,follow';

    	$this->favicon = _upload_hinhanh_l.$favicon['thumb_'.$this->lang];

    	$this->canonical = Functions::canonical($template);
    	$this->url = Functions::getCurrentPageURL();
    }
    public function logo(){
    	$result = ClassPDO::row("select thumb_".$this->lang.",photo_".$this->lang." from #_photo where type='logo' limit 0,1");
    	return _upload_hinhanh_l.$result['thumb_'.$this->lang];
    }

    public function banner(){
    	$result = ClassPDO::row("select thumb_".$this->lang.",photo_".$this->lang." from #_photo where type='banner' limit 0,1");
    	return _upload_hinhanh_l.$result['thumb_'.$this->lang];
    }

    public function slide_home(){
        ClassPDO::bindMore(array("type"=>"slider"));
        $slide_home  =  ClassPDO::query("select * from #_photo where shows=1 and type=:type order by number,id desc");
        return $slide_home;
    }

    public function plugin(){

        $this->timkiem = NEW Plugins('timkiem','coban');
        $plugin_css .= $this->timkiem->css();

        $this->video = new \Library\plugins('video','type1');
        $plugin_css .= $this->video->css();

        $this->bando = new \Library\plugins('bando','multi');
        $plugin_css .= $this->bando->css();

        $this->nhantin = new \Library\plugins('nhantin','4field_doc');
        $plugin_css .= $this->nhantin->css();

        $this->chinhsach = new \Library\plugins('chinhsach','type1');
        $plugin_css .= $this->chinhsach->css();

        $this->mangxh = new \Library\plugins('mangxh','mangxh');
        $plugin_css .= $this->mangxh->css();

        $this->thongtin_ft = new \Library\plugins('thongtin','listul');
        $plugin_css .= $this->thongtin_ft->css();

        $this->facebook = new \Library\plugins('facebook','type1');
        $plugin_css .= $this->facebook->css();

        $this->thongke = new \Library\plugins('thongke','2truong');
        $plugin_css .= $this->thongke->css();

        $this->bocongthuong = new \Library\plugins('bocongthuong','type1');
        $plugin_css .= $this->bocongthuong->css();

        return $plugin_css;
    }


}

	

?>