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
class Type{
	public function __construct()
    {
		$type = (isset($_GET['type'])) ? addslashes($_GET['type']) : "";
		$act = (isset($_GET['act'])) ? addslashes($_GET['act']) : "";
		$act = explode('_',$act);
		if(count($act)>1){
			$act = $act[1];
		} else {
			$act = $act[0];
		}
		$this->name = $type;
		$this->config_open = array();
		@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
		@define ( _download_type , 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|xlsx|jpg|png|gif|JPG|PNG|GIF|txt' );
		switch($type){
			//-------------product------------------
			case 'product':
				switch($act){
					case 'list':
						$this->title = "Danh mục cấp 1";
						$this->config_open = array('name','seo','description','image','highlight');
						@define ( _width_thumb , 60 );
						@define ( _height_thumb , 55 );
						@define ( _style_thumb , 1 );
						$this->ratio = 1;
						break;
					case 'cat':
						$this->title = "Danh mục cấp 2";
						$this->config_open = array('name','seo','description','image');
						@define ( _width_thumb , 250 );
						@define ( _height_thumb , 250 );
						@define ( _style_thumb , 1 );
						$this->ratio = 1;
						break;
					case 'item':
						$this->title = "Danh mục cấp 3";
						$this->config_open = array('name','seo','description','image');
						@define ( _width_thumb , 250 );
						@define ( _height_thumb , 250 );
						@define ( _style_thumb , 1 );
						$this->ratio = 1;
						break;
					case 'sub':
						$this->title = "Danh mục cấp 4";
						$this->config_open = array('name','seo','description','image');
						@define ( _width_thumb , 250 );
						@define ( _height_thumb , 250 );
						@define ( _style_thumb , 1 );
						$this->ratio = 1;
						break;
					default:
						$this->title = "Sản phẩm";
						$this->config_open = array('name','content','description','image','seo','images','list','cat','price','oldprice','code','view','highlight','selling','promotion');
						@define ( _width_thumb , 480 );
						@define ( _height_thumb , 360 );
						@define ( _style_thumb , 2 );
						$this->ratio = 3;
						break;
					}
				break;
			
			case 'tintuc':
				switch($act){
					case 'list':
						$this->title = "Danh mục tin tức";
						$this->config_open = array('name','seo');
						@define ( _width_thumb , 24 );
						@define ( _height_thumb , 24 );
						@define ( _style_thumb , 1 );
						$this->ratio = 1;
						break;
					default:
						$this->title = "Tin tức";
						$this->config_open = array('name','content','description','image','seo','view','highlight');
						@define ( _width_thumb , 285 );
						@define ( _height_thumb , 285 );
						@define ( _style_thumb , 2 );
						$this->ratio = 3;
						break;
					}
				break;

			case 'download':
				switch($act){
					case 'list':
						$this->title = "Danh mục Nguồn kỹ thuật";
						$this->config_open = array('name');
						@define ( _width_thumb , 24 );
						@define ( _height_thumb , 24 );
						@define ( _style_thumb , 1 );
						$this->ratio = 1;
						break;
					default:
						$this->title = "Nguồn kỹ thuật";
						$this->config_open = array('name','content','list','seo');
						@define ( _width_thumb , 285 );
						@define ( _height_thumb , 285 );
						@define ( _style_thumb , 2 );
						$this->ratio = 3;
						break;
					}
				break;

			case 'tuvan':
				$this->title = "Tư vấn";
				$this->config_open = array('name','description','content','image','seo');
				@define ( _width_thumb , 250 );
				@define ( _height_thumb , 200 );
				@define ( _style_thumb , 1 );
				$this->ratio = 1;
				break;

			case 'duan':
				$this->title = "Dự án";
				$this->config_open = array('name','description','content','image','seo');
				@define ( _width_thumb , 250 );
				@define ( _height_thumb , 200 );
				@define ( _style_thumb , 1 );
				$this->ratio = 1;
				break;
			case 'thietke':
				$this->title = "Thiết kế";
				$this->config_open = array('name','description','content','image','seo');
				@define ( _width_thumb , 250 );
				@define ( _height_thumb , 200 );
				@define ( _style_thumb , 1 );
				$this->ratio = 1;
				break;
			case 'dichvu':
				$this->title = "Dịch vụ";
				$this->config_open = array('name','description','content','image','seo','noibat','view');
				@define ( _width_thumb , 250 );
				@define ( _height_thumb , 200 );
				@define ( _style_thumb , 1 );
				$this->ratio = 1;
				break;
			case 'camnhan':
				$this->title = "cảm nhận";
				$this->config_open = array('name','description','content','image','seo','noibat','view');
				@define ( _width_thumb , 250 );
				@define ( _height_thumb , 200 );
				@define ( _style_thumb , 1 );
				$this->ratio = 1;
				break;
			case 'hotro':
				$this->title = "Hỗ trợ";
				$this->config_open = array('name','description','icon');
				@define ( _width_thumb , 250 );
				@define ( _height_thumb , 200 );
				@define ( _style_thumb , 1 );
				$this->ratio = 1;
				break;
			case 'thongtin':
				$this->title = "Thông tin";
				$this->config_open = array('name','description','image');
				@define ( _width_thumb , 40 );
				@define ( _height_thumb , 40 );
				@define ( _style_thumb , 2 );
				$this->ratio = 1;
				break;

			case 'size':
				$this->title = "size";
				$this->config_open = array('name');
				break;
			case 'mausac':
				$this->title = "màu sắc";
				$this->config_open = array('name');
				break;

			case 'chinhsach':
				$this->title = "Chính sách";
				$this->config_open = array('name','content','description','seo','image');
				@define ( _width_thumb , 250 );
				@define ( _height_thumb , 250 );
				@define ( _style_thumb , 2 );
				$this->ratio = 1;
				break;

			case 'khachhang':
				$this->title = "Ngân hàng";
				$config_image = "true";
				@define ( _width_thumb , 98 );
				@define ( _height_thumb , 98 );
				@define ( _style_thumb , 2 );
				$this->ratio = 1;
				break;

			case 'chinhanh':
				$this->title = "Chi Nhánh";
				$config_image = "false";
				$this->config_open = array('name','description');
				@define ( _width_thumb , 98 );
				@define ( _height_thumb , 98 );
				@define ( _style_thumb , 2 );
				$this->ratio = 1;
				break;
			
			case 'album':
				$this->title = "Album";
				$this->config_open = array('list','content','description','image','seo','images');
				@define ( _width_thumb , 375 );
				@define ( _height_thumb , 260 );
				@define ( _style_thumb , 1 );
				$this->ratio = 2;
				break;

			//-------------info------------------
			case 'gioithieu':
				$this->title = 'giới thiệu';
				$this->config_open = array('content','seo','name','description','image');
				@define ( _width_thumb , 600 );
				@define ( _height_thumb , 415 );
				break;

			case 'tags':
				$this->title = 'tags';
				$config_name = 'true';
				break;
				
			case 'trangchu':
				$this->title = 'Trang chủ';
				$this->config_open = array('name','content');
				@define ( _width_thumb , 390 );
				@define ( _height_thumb , 380 );
				@define ( _style_thumb , 1 );
				$this->ratio = 1;
				break;

			case 'footer':
				$this->title = 'Thông tin footer';
				$this->config_open = array('content');
				break;

			case 'lienhe':
				$this->title = 'Thông tin Liên hệ';
				$this->config_open = array('content');
				break;

			case 'httt':
				$this->title = 'Hình thức thanh toán';
				$this->config_open = array('name','description');
				break;
			case 'tinhtrangdh':
				$this->title = 'Tình trạng đơn hàng';
				$this->config_open = array('name');
				break;
			case 'khoangia':
				$this->title = 'Khoản giá';
				$this->config_open = array('name');
				break;
			case 'ndkhuyenmai':
			case 'nddichvu':
			case 'ndspkhac':
			case 'ndthietke':
			case 'ndspcaocap':
			case 'ndtintuc':
				$this->title = 'Nội dung';
				$this->config_open = array('name','content');
				break;
			case 'shiping':
				$this->title = 'phí ship';
				$this->config_open = array('name');
				break;
			case 'size':
				$this->title = 'Size';
				break;
			case 'mausac':
				$this->title = 'Màu sắc';
				break;

			case 'banner':
				$this->title = 'Banner';
				$this->config_open = array();
				@define ( _width_thumb , 325 );
				@define ( _height_thumb , 97 );
				@define ( _style_thumb , 1 );
				$this->ratio = 1;
				break;
			case 'bgfooter':
				$this->title = 'BG Footer';
				$this->config_open = array();
				@define ( _width_thumb , 1349 );
				@define ( _height_thumb , 320 );
				@define ( _style_thumb , 1 );
				$this->ratio = 1;
				break;
			case 'banner_footer':
				$this->title = 'Banner Bottom';
				$this->config_open = array();
				@define ( _width_thumb , 253 );
				@define ( _height_thumb , 175 );
				@define ( _style_thumb , 1 );
				$this->ratio = 1;
				break;
			case 'googlemap':
				$this->title = 'Google Map';
				$this->config_open = array();
				@define ( _width_thumb , 1920 );
				@define ( _height_thumb , 764 );
				@define ( _style_thumb , 1 );
				$this->ratio = 1;
				break;
			case 'bocongthuong':
				$this->title = 'Bộ công thương';
				$this->config_open = array('link');
				@define ( _width_thumb , 155 );
				@define ( _height_thumb , 58 );
				@define ( _style_thumb , 1 );
				$this->ratio = 1;
				break;

			case 'logo':
				$this->title = 'Logo';
				$this->config_open = array();
				@define ( _width_thumb , 210 );
				@define ( _height_thumb , 124 );
				@define ( _style_thumb , 1 );
				$this->ratio = 1;
				break;

			case 'hinhanh_top':
				$this->title = 'Hình ảnh top';
				$this->config_open = array('link');
				@define ( _width_thumb , 557 );
				@define ( _height_thumb , 64 );
				@define ( _style_thumb , 1 );
				$this->ratio = 1;
				break;
			case 'popup':
				$this->title = 'Popup';
				$this->config_open = array('link','hienthi');
				@define ( _width_thumb , 717 );
				@define ( _height_thumb , 170 );
				@define ( _style_thumb , 1 );
				$this->ratio = 1;
				break;
			case 'bando':
				$this->title = 'Bản đồ';
				$this->config_open = array();
				@define ( _width_thumb , 324 );
				@define ( _height_thumb , 173 );
				@define ( _style_thumb , 1 );
				$this->ratio = 1;
				break;

			case 'favicon':
				$this->title = 'Favicon';
				$this->config_open = array();
				@define ( _width_thumb , 40 );
				@define ( _height_thumb , 40 );
				@define ( _style_thumb , 2 );
				$this->ratio = 1;
				break;

			case 'bgweb':
				$this->title = 'background web';
				@define ( _width_thumb , 500 );
				@define ( _height_thumb , 120 );
				@define ( _style_thumb , 1 );
				$this->ratio = 1;
				break;
			//-------------photo------------------
			case 'slider':
				$this->title = "Hình ảnh slider";
				$this->config_open = array('link','description','slogan');
				@define ( _width_thumb , 1920 );
				@define ( _height_thumb , 675 );
				@define ( _style_thumb , 1 );
				$this->ratio = 1;
				$this->links = "false";
				break;
			case 'slider2':
				$this->title = "Slider trang trong";
				$this->config_open = array('link');
				@define ( _width_thumb , 1349 );
				@define ( _height_thumb , 350 );
				@define ( _style_thumb , 1 );
				$this->ratio = 1;
				$this->links = "false";
				break;
			case 'quangcao':
				$this->title = "Hình ảnh ADS";
				$this->config_open = array('link');
				@define ( _width_thumb , 406 );
				@define ( _height_thumb , 190 );
				@define ( _style_thumb , 1 );
				$this->ratio = 1;
				break;

			case 'doitac':
			    $this->title = "đối tác";
			    $this->config_open = array('link');
				@define ( _width_thumb , 190 );
				@define ( _height_thumb , 110 );
				@define ( _style_thumb , 2 );
				$this->ratio = 1;
				break;
			case 'hinhanh_gt':
			    $this->title = "Hình ảnh giới thiệu";
				@define ( _width_thumb , 583 );
				@define ( _height_thumb , 305 );
				@define ( _style_thumb , 1 );
				$this->ratio = 1;
				break;
			case 'link':
			    $this->title = "Liên kết web";
			    $this->config_open = array('link','name','image');
				@define ( _width_thumb , 38 );
				@define ( _height_thumb , 38 );
				@define ( _style_thumb , 1 );
				$this->ratio = 1;
				break;
			case 'mangxh':
			    $this->title = "Mạng xã hội";
			    $this->config_open = array('link','name','image');
				@define ( _width_thumb , 38 );
				@define ( _height_thumb , 38 );
				@define ( _style_thumb , 1 );
	 			$this->ratio = 1;
				break;
			default: 
				break;
		}

	}
}