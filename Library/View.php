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
class View{

	private $db;
	private $func;

	public function __construct()
    {
    	
    }

    public function view($temp,$data){
        
        return new functions;
    }

    protected function render()
    {
        $this->view_file = str_replace( '.' , DS, str_replace( '.php', '', $this->view_file ) ) . '.php';

        $this->view_path = VIEW . DS . $this->view_file;

        if( !file_exists( $this->view_path ) )
            throw new FileNotFoundException( $this->view_path );


        $this->pre = ob_get_clean();
        
        ob_start();
        echo $this->view_path;
        include( $this->view_path );
        
        $this->content = ob_get_clean();

        $this->parse();

        // ob_start();
    }


}