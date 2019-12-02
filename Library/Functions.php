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
use \Library\ClassPDO;
use \Library\Lang;

class Functions{
	private $db;
	private $lang;
	
	public static function raw_json_encode($input, $flags = 0) {
	    $fails = implode('|', array_filter(array(
	        '\\\\',
	        $flags & JSON_HEX_TAG ? 'u003[CE]' : '',
	        $flags & JSON_HEX_AMP ? 'u0026' : '',
	        $flags & JSON_HEX_APOS ? 'u0027' : '',
	        $flags & JSON_HEX_QUOT ? 'u0022' : '',
	    )));
	    $pattern = "/\\\\(?:(?:$fails)(*SKIP)(*FAIL)|u([0-9a-fA-F]{4}))/";
	    $callback = function ($m) {
	        return html_entity_decode("&#x$m[1];", ENT_QUOTES, 'UTF-8');
	    };
	    return preg_replace_callback($pattern, $callback, json_encode($input, $flags));
	}

	public static function read_number_bds($num){
		if($num=='' || $num==0){
			echo "Not Number!";
			return false;
		}
		else{
			$s = "";
			$num_str = number_format($num);
			$num_arr = explode(",",$num_str);
			$c = count($num_arr);
			if($c>=5){
				$s .= substr($num_str,0,$c-21)." Nghìn Tỷ ";
			}
			if($c>=4 && $num_arr[$c-4]!=0 )
				$s .= $num_arr[$c-4]." Tỷ ";
			if($c>=3 && $num_arr[$c-3]!=0)
				$s .= $num_arr[$c-3]." Triệu ";
			if($c>=2 && $num_arr[$c-2]!=0)
				$s .= $num_arr[$c-2]." Ngàn ";
			if($c>=1 && $num_arr[$c-1]!=0)
				$s .= $num_arr[$c-1]." Đồng ";
			return $s;
		}
	}
	public static function show_tags($tags,$lass = "tags"){
		if($tags=="") return "";
		global $d;
		$arr = explode(",", $tags);
		for ($i=0,$count=count($arr); $i < $count; $i++) { 
			$row  =  ClassPDO::row("select name_vi,slug from #_tags where id=".$arr[$i]);
			echo '<a href="tags/'.$row["slug"].'" class="'.$lass.'"><span></span>'.$row["name_vi"].'</a>';
		}
	}
	public static function exarray($tbl,$arr,$type=',',$the='li'){
		global $d,$lang;
		$sizes = json_decode($arr,true);
	    for($i=0;$i<count($sizes[$tbl]);$i++){
	    	$id = explode('_',$sizes[$tbl][$i]);
	    	$id = $id[1];
			$get  =  ClassPDO::row("select * from table_title where id='".$id."' ");
			$color = json_decode($get['attributes'],true);
			$result .= "<".$the." data-id=".$get['id']." style='background:".$color['color']."'>".$get['name_'.$lang]."</".$the.">";
	    }
	    return $result;
	}
	public static function phantram($dem,$tong){
		$phantram = ($dem/$tong)*100;
		return round($phantram,2);
	}
	
	public static function mdd5($pass){
		$pass = '!@#'.$pass.'123';
		return md5($pass);
	}

	public static function getname($tbl,$id,$type=''){
		$result = ClassPDO::row("select name_".Lang::lang()." from table_$tbl where id='".$id."' ");
		return $result['name_'.Lang::lang()];
	}

	public static function luotxem($tbl,$id){
		$row = ClassPDO::row("select view from table_$tbl where id='".$id."' ");
		$view = $row['view']+1;
		ClassPDO::query("UPDATE table_$tbl SET view = $view  WHERE id = ".$id." ");
	}

	public static function giaban($giaban=0){

		if($giaban==0) $result = _contact; else $result = number_format ($giaban,0,",",".")." đ";

		return $result;
	}

	function count_star($star){
		$dem_sao = explode('.',$star);
		$sao_1 = '<i class="fas fa-star"></i>';
	    $sao_05 = '<i class="fas fa-star-half-alt"></i>';
	    $sao_0 = '<i class="far fa-star"></i>';
	   	for($i=0;$i<$dem_sao[0];$i++){
	   		$xuat_star .= $sao_1;
	   	}
	   	if($dem_sao[1]){
	   		$saocon = 5 - $dem_sao[0]-1;
	   	} else {
	   		$saocon = 5 - $dem_sao[0];
	   	}
	   	if($dem_sao[1]){
	   		$xuat_star .= $sao_05;
	   	}
   		for($i=0;$i<$saocon;$i++){
	   		$xuat_star .= $sao_0;
	   	}
	    return $xuat_star;
	}

	function count_like($type,$id){
	   ClassPDO::bindMore(array("type"=>$type,"id"=>$id));
	   $row = ClassPDO::row("select count(*) as tong from #_like where type=:type and id_product=:id ");
	   return $row['tong'];
	}

	static public function danhmuccap($tbl='cate',$com='',$type='',$cap='',$noibat=0){
		ClassPDO::bindMore(array("shows"=>1,"type"=>$type));
		$row_list  =  ClassPDO::query("select id,slug,name_".Lang::lang()." from #_".$tbl."_list where shows=:shows and type=:type order by number,id desc");
		if($com==''){
			$com = '';
		} else {
			$com = $com.'/';
		}
		if($cap>=1){
		//$data .= '<ul>';
		for($i=0;$i<count($row_list);$i++){

	              $data .= '<li><a href="'.$com.$row_list[$i]['slug'].'">'.$row_list[$i]['name_'.Lang::lang()].'</a>';

	              if($cap>=2){
		              ClassPDO::bindMore(array("shows"=>1,"type"=>$type,"id_list"=>$row_list[$i]['id']));
					  $row_cat  =  ClassPDO::query("select id,slug,name_".Lang::lang()." from #_".$tbl."_cat where shows=:shows and id_list=:id_list and type=:type order by number,id desc");
		              if(count($row_cat)>0){
		              $data .= '<ul>';
		                for($j=0;$j<count($row_cat);$j++){
		                	$data .= '<li><a href="'.$com.$row_list[$i]['slug'].'/'.$row_cat[$j]['slug'].' "> '.$row_cat[$j]['name_'.Lang::lang()].'</a>';
		                	if($cap>=3){
				                ClassPDO::bindMore(array("shows"=>1,"type"=>$type,"id_cat"=>$row_cat[$j]['id']));
					  			$row_item  =  ClassPDO::query("select id,slug,name_".Lang::lang()." from #_".$tbl."_item where shows=:shows and id_cat=:id_cat and type=:type order by number,id desc");

				                if(count($row_item)>0){
				                $data .= '<ul>';
				                for($e=0;$e<count($row_item);$e++){
				                	$data .= '<li><a href="'.$com.$row_list[$i]['slug'].'/'.$row_cat[$j]['slug'].'/'.$row_item[$e]['slug'].'">'.$row_item[$e]['name_'.Lang::lang()].'</a>';

				                	if($cap>=4){
						                ClassPDO::bindMore(array("shows"=>1,"type"=>$type,"id_item"=>$row_item[$e]['id']));
					  					$row_sub  =  ClassPDO::query("select id,slug,name_".Lang::lang()." from #_".$tbl."_sub where shows=:shows and id_item=:id_item and type=:type order by number,id desc");

						                if(count($row_sub)>0){
						                $data .= '<ul>';
						                for($s=0;$s<count($row_sub);$s++){
						                	$data .= '<li><a href="'.$com.$row_list[$i]['slug'].'/'.$row_cat[$j]['slug'].'/'.$row_item[$e]['slug'].'/'.$row_sub[$s]['slug'].'">'.$row_sub[$s]['name_'.Lang::lang()].'</a></li>';
						                }
						              	$data .= '</ul>';
					              	} }
					              	$data .= '</li>';
				                }
				              	$data .= '</ul>';
			              	} }
			              	$data .= '</li>';
		                }
		              $data .= '</ul>';
		          } }
	              $data .= '</li>';
	    }
	    //$data .= '</ul>';
		}
		return $data;
	}

	public static function daxem($pid){
		if($pid<1) return;
		
		if(is_array($_SESSION['daxem'])){
			if(self::daxem_exists($pid)) return;
			$max=count($_SESSION['daxem']);
			$_SESSION['daxem'][$max]['productid']=$pid;
		}
		else{
			$_SESSION['daxem']=array();
			$_SESSION['daxem'][0]['productid']=$pid;
		}
	}
	public static function daxem_exists($pid){
		$pid=intval($pid);
		$max=count($_SESSION['daxem']);
		$flag=0;
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['daxem'][$i]['productid']){
				$flag=1;
				break;
			}
		}
		return $flag;
	}

	static public function listdanhsach($tbl,$com='',$type='',$noibat=0){

		if($noibat){
			$where = ' and highlight!=0 ';
		}
		$row_list  =  ClassPDO::query("select name_".Lang::lang().",slug,id from #_".$tbl." where shows=1 and type='".$type."' $where order by number,id desc limit 0,10");
		if($com==''){
			$com = '';
		} else {
			$com = $com.'/';
		}
		$data .= '<ul class="ul">';
		for($i=0;$i<count($row_list);$i++){
	        $data .= '<li><a href="'.$com.$row_list[$i]['slug'].'.html">'.$row_list[$i]['name_'.Lang::lang()].'</a></li>';
	    }
	    $data .= '</ul>';
		
		return $data;
	}

	public static function madonhang($matv,$table){
	
		$result  =  ClassPDO::row("select id from table_$table order by id desc limit 0,1");
		if(!$result){
			$kq = $matv."_000001";
		} else {
			$id = $result['id']+1;
			$leng = strlen($id);
			if($leng==1){
				$kq = $matv."_00000".$id;
			} else if($leng==2){
				$kq = $matv."_0000".$id;
			} else if($leng==3){
				$kq = $matv."_000".$id;
			} else if($leng==4){
				$kq = $matv."_00".$id;
			} else if($leng==5){
				$kq = $matv."_0".$id;
			} else{
				$kq = $matv."_".$id;
			}
		}
		return $kq;
	}
	public static function dongdauanh($newname,$folder)	
	{
		  $uploadimage=$folder.$newname;
		  $actual = $folder.$newname;
		  
		  $file_type = explode('.',$newname);
		  // Load the mian image
		  switch(strtoupper($file_type[1])) {
			    case 'GIF':
			       # GIF image
			        $source = imageCreateFromGIF($uploadimage);
			        break;
			    case 'JPG':
			       # JPEG image

			        $source = imagecreatefromjpeg($uploadimage);
			        break;
			    case 'PNG':
			       # PNG image
			        $source = imageCreateFromPNG($uploadimage);
			        break;
			    default :
			       # JPEG image
			        $source = imageCreateFromJPEG($uploadimage);
			        break;
		  }

		  // load the image you want to you want to be watermarked
		  $watermark = imagecreatefrompng('../upload/watermark.png');
		  $size = getimagesize($uploadimage);  

		  // get the width and height of the watermark image
		  $water_width = imagesx($watermark);
		  $water_height = imagesy($watermark);

		  // get the width and height of the main image image
		  $main_width = imagesx($source);
		  $main_height = imagesy($source);

		  // Set the dimension of the area you want to place your watermark we use 0
		  // from x-axis and 0 from y-axis 
		  $dime_x = ($size[0] - $water_width)/2;  
		  $dime_y = ($size[1] - $water_height)/2;

		  // copy both the images
		  imagecopy($source, $watermark, $dime_x, $dime_y, 0, 0, $water_width, $water_height);

		  // Final processing Creating The Image
		  //header('Content-type: image/png');
		  switch(strtoupper($file_type[1])) {
			    case 'GIF':
			    # GIF image
			        //header("Content-type: image/gif");
			        imageGIF($source,$actual, 100);
			        break;
			    case 'JPG':
			    # JPEG image
			        //header("Content-type: image/jpeg");
			        imagejpeg($source,$actual, 100); 
			         break;
			    case 'PNG':
			    # PNG image
			        // header("Content-type: image/png");
			        // imagePNG($source);
			        imagePNG($source,$actual, 0, NULL);
			        break;
			}
		   imagesavealpha($source, true);
		   //imagepng($source, $actual, 100);
		  
	}

	public static function phanquyen_tv($com,$quyen,$act,$type){

		$text_act = explode('_',$act);
		$text_act = $text_act[1];
		
		$phanquyen  =  ClassPDO::row("select * from #_phanquyen where id='".$quyen."'");
		$com_manager  =  ClassPDO::row("select * from #_com where name_com='".$com."' and act ='".$text_act."' and type ='".$type."' ");

		$xem_s = json_decode($phanquyen['xem']);
		$them_s = json_decode($phanquyen['them']);
		$xoa_s = json_decode($phanquyen['xoa']);
		$sua_s = json_decode($phanquyen['sua']);

		$xem_arr = explode('|',"capnhat|man|man_list|man_cat|man_item|man_sub");
		$them_arr = explode('|',"add|add_cat|add_list|add_item|add_sub|save|save_list|save_cat|save_item|save_sub");
		$xoa_arr = explode('|',"delete|delete_list|delete_cat|delete_item,delete_sub");
		$sua_arr = explode('|',"edit|edit_list|edit_cat|edit_item|edit_sub|save|save_list|save_cat|save_item|save_sub");

		if(in_array($act,$xem_arr)){
			if(in_array($com_manager['id'].'|1',$xem_s)){
				return 1;
			} else {
				return 0;
			}
		} elseif(in_array($act,$them_arr)) {
			if(in_array($com_manager['id'].'|1',$them_s)){
				return 1;
			} else {
				return 0;
			}
		} elseif(in_array($act,$xoa_arr)){
			if(in_array($com_manager['id'].'|1',$xoa_s)){
				return 1;
			} else {
				return 0;
			}
		} elseif(in_array($act,$sua_arr)){
			if(in_array($com_manager['id'].'|1',$sua_s)){
				return 1;
			} else {
				return 0;
			}
		} else {
			return 0;
		}
	}

	public static function phivanchuyen($tinhthanh){
		$phivanchuyen = 0;
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];

			$product_phi  =  ClassPDO::row("select phi_hcm,phi_khac from #_product where id='".$pid."' ");

			if($tinhthanh=='24'){
				if($product_phi['phi_hcm'] > $phivanchuyen ){
					$phivanchuyen = $product_phi['phi_hcm'];
				}
			} else {
				if($product_phi['phi_khac'] > $phivanchuyen){
					$phivanchuyen = $product_phi['phi_khac'];
				}
			}
		}
		
		return $phivanchuyen;
	}	

	public static function phanquyen_edit($quyen,$role,$vitri){
		
		$phanquyen  =  ClassPDO::row("select * from #_phanquyen where id='".$quyen."'");
		$com_s = json_decode($phanquyen['com']);
		$vitri_s = json_decode($phanquyen['table_vitri']);
		$sua_s = json_decode($phanquyen['sua']);
		
		if($role==3){
			$kiemtra = 1;	
		} else {
			for($i=0;$i<count($vitri_s);$i++){
				if($vitri_s[$i] == $vitri ){
					if(in_array($i.'|1',$sua_s)){
						$kiemtra = 1;
					}
				} 
			}
		}
		return $kiemtra;
				
	}

	public static function get_tong_tien($id=0){
		if($id>0){
			$result = ClassPDO::query("select price,amount from #_order_detail where id_order='".$id."'");
			$tongtien=0;
			for($i=0,$count=count($result);$i<$count;$i++) { 
				$tongtien+=	$result[$i]['price']*$result[$i]['amount'];	
			}
			return $tongtien;
		}else return 0;
	}
	public static function giamgia($gia,$giam)
	{
		$ketqua = ($gia - $giam)/($gia);
		$phantram = round($ketqua*100).'%';
		return $phantram;	
	}

	public function alert($msg) {
	    echo "<script type='text/javascript'>alert('$msg');</script>";
	}

	public static function upload_photos($file, $extension, $folder, $newname=''){
		if(isset($file) && !$file['error']){
			$arr_file = explode('.',$file['name']);
			$ext = end($arr_file);
			$name = basename($file['name'], '.'.$ext);
			if(strpos($extension, $ext)===false){
				self::alert('Chỉ hỗ trợ upload file dạng '.$ext.'-////-'.$extension);
				return false; // không hỗ trợ
			}
			
			if($newname=='' && file_exists($folder.$file['name']))
				for($i=0; $i<100; $i++){
					if(!file_exists($folder.$name.$i.'.'.$ext)){
						$file['name'] = $name.$i.'.'.$ext;
						break;
					}
				}
			else{
				$file['name'] = $newname.'.'.$ext;
			}
			
			if (!copy($file["tmp_name"], $folder.$file['name']))	{
				if ( !move_uploaded_file($file["tmp_name"], $folder.$file['name']))	{
					return false;
				}
			}
			return $file['name'];
		}
		return false;
	}
	public static function escape_str($str, $id_connect=false)	
	{	
		if (is_array($str))
		{
			foreach($str as $key => $val)
			{
				$str[$key] = escape_str($val);
			}
			
			return $str;
		}
		
		if (is_numeric($str)) {
			return $str;
		}
		
		if(get_magic_quotes_gpc()){
			$str = stripslashes($str);
		}

		if (function_exists('mysql_real_escape_string') AND is_resource($id_connect))
		{
			return "'".mysql_real_escape_string($str, $id_connect)."'";
		}
		elseif (function_exists('mysql_escape_string'))
		{
			return "'".mysql_escape_string($str)."'";
		}
		else
		{
			return "'".addslashes($str)."'";
		}
	}

	public static function make_date($time,$dot='.',$lang='vi',$f=false){
		
		$str = ($lang == 'vi') ? date("d{$dot}m{$dot}Y",$time) : date("m{$dot}d{$dot}Y",$time);
		if($f){
			$thu['vi'] = array('Chủ nhật','Thứ hai','Thứ ba','Thứ tư','Thứ năm','Thứ sáu','Thứ bảy');
			$thu['en'] = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
			$str = $thu[$lang][date('w',$time)].', '.$str;
		}
		return $str;
	}

	public static function delete_file($file){
		return @unlink($file);
	}

	public static function upload_image($file, $extension, $folder, $newname=''){
		
		if(isset($_FILES[$file]) && !$_FILES[$file]['error']){
			$arr_file = explode('.',$_FILES[$file]['name']);
			$ext = end($arr_file);
			$name = basename($_FILES[$file]['name'], '.'.$ext);
			if(strpos($extension, $ext)===false){
				self::alert('Chỉ hỗ trợ upload file dạng '.$extension);
				return false; // không hỗ trợ
			}
			if($newname=='' && file_exists($folder.$_FILES[$file]['name']))
				for($i=0; $i<100; $i++){
					if(!file_exists($folder.$name.$i.'.'.$ext)){
						$_FILES[$file]['name'] = $name.$i.'.'.$ext;
						break;
					}
				}
			else{
				$_FILES[$file]['name'] = $newname.'.'.$ext;
			}
			
			if (!copy($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name']))	{
				if ( !move_uploaded_file($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name']))	{
					return false;
				}
			}
			return $_FILES[$file]['name'];

		}
		return false;
	}

	public static function chuanhoa($s){
		$s = str_replace("'", '&#039;', $s);
		$s = str_replace('"', '&quot;', $s);
		$s = str_replace('<', '&lt;', $s);
		$s = str_replace('>', '&gt;', $s);
		return $s;
	}

	public static function transfer($msg,$page="./",$stt=true)
	{
		 $showtext = $msg;
		 $page_transfer = $page;
		 include(VIEW."transfer_tpl.php");
		 exit();
	}

	public static function redirect($url=''){
		echo '<script language="javascript">window.location = "'.$url.'" </script>';
		exit();
	}

	public static function back($n=1){
		echo '<script language="javascript">history.go = "'.-intval($n).'" </script>';
		exit();
	}

	public static function dump($arr, $exit=1){
		echo "<pre>";	
			var_dump($arr);
		echo "<pre>";	
		if($exit)	exit();
	}
	public static function paging_home($r, $url='', $curPg=1, $mxR=5, $mxP=5, $class_paging='')
		{
			if($curPg<1) $curPg=1;
			if($mxR<1) $mxR=5;
			if($mxP<1) $mxP=5;
			$totalRows=count($r);
			if($totalRows==0)	
				return array('source'=>NULL, 'paging'=>NULL);
			$totalPages=ceil($totalRows/$mxR);
			if($curPg > $totalPages) $curPg=$totalPages;
			$_SESSION['maxRow']=$mxR;
			$_SESSION['curPage']=$curPg;

			$r2=array();
			$paging="";
			
			//-------------tao array------------------
			$start=($curPg-1)*$mxR;		
			$end=($start+$mxR)<$totalRows?($start+$mxR):$totalRows;
			#echo $start;
			#echo $end;
			
			$j=0;
			for($i=$start;$i<$end;$i++)
				$r2[$j++]=$r[$i];
				
			//-------------tao chuoi------------------
			$curRow = ($curPg-1)*$mxR+1;	
			if($totalRows>$mxR)
			{
				
				$from = $curPg - $mxP;	
				$to = $curPg + $mxP;
				if ($from <=0) { $from = 1;   $to = $mxP*2; }
				if ($to > $totalPages) { $to = $totalPages; }
				for($j = $from; $j <= $to; $j++) {
				   if ($j == $curPg) $links = $links . "<a class=\"paginate_active\" href=\"#\">{$j}</a>";		
				   else{				
					$qt = $url. "&p={$j}";
					$links= $links . "<a class=\"paginate_button\" href = '{$qt}'>{$j}</a>";
				   } 	   
				} //for
										
				//$paging.= "Go to page :&nbsp;&nbsp;" ;
				if($curPg>$mxP)
				{
					$paging .=" <a href='".$url."' class=\"first paginate_button\" >&laquo;</a> "; //ve dau				
					$paging .=" <a href='".$url."&p=".($curPg-1)."' class=\"previous paginate_button\" >&#8249;</a> "; //ve truoc
				}else{
					$paging .=" <a href='".$url."' class=\"first paginate_button paginate_button_disabled\" >&laquo;</a> "; //ve dau				
					$paging .=" <a href='".$url."&p=".($curPg-1)."' class=\"previous paginate_button paginate_button_disabled\" >&#8249;</a> "; //ve truoc
				}
				$paging.=$links; 
				if(((int)(($curPg-1)/$mxP+1)*$mxP) < $totalPages)  
				{
					$paging .=" <a href='".$url."&p=".($curPg+1)."' class=\"next paginate_button\" >&#8250;</a> "; //ke				
					$paging .=" <a href='".$url."&p=".($totalPages)."' class=\"last paginate_button\" >&raquo;</a> "; //ve cuoi
				}else{
					$paging .=" <a href='".$url."&p=".($curPg+1)."' class=\"next paginate_button paginate_button_disabled\" >&#8250;</a> "; //ke				
					$paging .=" <a href='".$url."&p=".($totalPages)."' class=\"last paginate_button paginate_button_disabled\" >&raquo;</a> "; //ve cuoi
				}
			}		
			$r3['curPage']=$curPg;
			$r3['source']=$r2;
			$r3['paging']=$paging;			
			$r3['totalRows']=$totalRows;		
			#echo '<pre>';var_dump($r3);echo '</pre>';
			return $r3;
		}
	public static function catchuoi($chuoi,$gioihan){
		// nếu độ dài chuỗi nhỏ hơn hay bằng vị trí cắt
		// thì không thay đổi chuỗi ban đầu
		if(strlen($chuoi)<=$gioihan)
		{
		return $chuoi;
		}
		else{
		/*
		so sánh vị trí cắt
		với kí tự khoảng trắng đầu tiên trong chuỗi ban đầu tính từ vị trí cắt
		nếu vị trí khoảng trắng lớn hơn
		thì cắt chuỗi tại vị trí khoảng trắng đó
		*/
		if(strpos($chuoi," ",$gioihan) > $gioihan){
		$new_gioihan=strpos($chuoi," ",$gioihan);
		$new_chuoi = substr($chuoi,0,$new_gioihan)."...";
		return $new_chuoi;
		}
		// trường hợp còn lại không ảnh hưởng tới kết quả
		$new_chuoi = substr($chuoi,0,$gioihan)."...";
		return $new_chuoi;
		}
	}

	public static function stripUnicode($str){
	  if(!$str) return false;
	   $unicode = array(
	     'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
	     'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
	     'd'=>'đ',
	     'D'=>'Đ',
	     'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
	   	  'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
	   	  'i'=>'í|ì|ỉ|ĩ|ị',	  
	   	  'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
	     'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
	   	  'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
	     'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
	   	  'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
	     'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
	     'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
	   );
	   foreach($unicode as $khongdau=>$codau) {
	     	$arr=explode("|",$codau);
	   	  $str = str_replace($arr,$khongdau,$str);
	   }
	return $str;
	}// Doi tu co dau => khong dau

	public static function pagination($query,$per_page=10,$page=1,$url='?',$arr_dpo=array()){   

		ClassPDO::bindMore($arr_dpo);
	    $row = ClassPDO::row("SELECT COUNT(*) as `num` FROM {$query}");
	    $total = $row['num'];
	    if($total==0) return;
	    $adjacents = "1"; 
	    $prevlabel = "&lsaquo; Trang sau";
	    $nextlabel = "Trang tiếp &rsaquo;";
	    $lastlabel = "Trang cuối &rsaquo;&rsaquo;";
	      
	    $page = ($page == 0 ? 1 : $page);  
	    $start = ($page - 1) * $per_page;                               
	      
	    $prev = $page - 1;                          
	    $next = $page + 1;
	    if($total>=$per_page){
	    	$lastpage = ceil($total/$per_page);
	    }
	      
	    $lpm1 = $lastpage - 1; // //last page minus 1
	      
	    $pagination = "";
	    if($lastpage > 1){   
	        $pagination .= "<ul class='pagination'>";
	        $pagination .= "<li class='page_info'>Trang {$page} of {$lastpage}</li>";
	              
	            if ($page > 1) $pagination.= "<li><a href='{$url}?page={$prev}'>{$prevlabel}</a></li>";
	              
	        if ($lastpage < 7 + ($adjacents * 2)){   
	            for ($counter = 1; $counter <= $lastpage; $counter++){
	                if ($counter == $page)
	                    $pagination.= "<li><a class='current'>{$counter}</a></li>";
	                else
	                    $pagination.= "<li><a href='{$url}?page={$counter}'>{$counter}</a></li>";                    
	            }
	          
	        } elseif($lastpage > 5 + ($adjacents * 2)){
	              
	            if($page < 1 + ($adjacents * 2)) {
	                  
	                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++){
	                    if ($counter == $page)
	                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
	                    else
	                        $pagination.= "<li><a href='{$url}?page={$counter}'>{$counter}</a></li>";                    
	                }
	                $pagination.= "<li class='dot'>...</li>";
	                $pagination.= "<li><a href='{$url}?page={$lpm1}'>{$lpm1}</a></li>";
	                $pagination.= "<li><a href='{$url}?page={$lastpage}'>{$lastpage}</a></li>";  
	                      
	            } elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
	                  
	                $pagination.= "<li><a href='{$url}?page=1'>1</a></li>";
	                $pagination.= "<li><a href='{$url}?page=2'>2</a></li>";
	                $pagination.= "<li class='dot'>...</li>";
	                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
	                    if ($counter == $page)
	                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
	                    else
	                        $pagination.= "<li><a href='{$url}?page={$counter}'>{$counter}</a></li>";                    
	                }
	                $pagination.= "<li class='dot'>..</li>";
	                $pagination.= "<li><a href='{$url}?page={$lpm1}'>{$lpm1}</a></li>";
	                $pagination.= "<li><a href='{$url}?page={$lastpage}'>{$lastpage}</a></li>";      
	                  
	            } else {
	                  
	                $pagination.= "<li><a href='{$url}?page=1'>1</a></li>";
	                $pagination.= "<li><a href='{$url}?page=2'>2</a></li>";
	                $pagination.= "<li class='dot'>..</li>";
	                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
	                    if ($counter == $page)
	                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
	                    else
	                        $pagination.= "<li><a href='{$url}?page={$counter}'>{$counter}</a></li>";                    
	                }
	            }
	        }
	          
	            if ($page < $counter - 1) {
	                $pagination.= "<li><a href='{$url}&page={$next}'>{$nextlabel}</a></li>";
	                $pagination.= "<li><a href='{$url}&page=$lastpage'>{$lastlabel}</a></li>";
	            }
	          
	        $pagination.= "</ul>";        
	    }
	      
	    return $pagination;
	}

	public static function changeTitle($str)
	{
		$str = self::stripUnicode($str);
		$str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
		$str = trim($str);
		$str=preg_replace('/[^a-zA-Z0-9\ ]/','',$str); 
		$str = str_replace("  "," ",$str);
		$str = str_replace(" ","-",$str);
		return $str;
	}
	public static function images_name($tenhinh)
		{
			$rand=rand(10,9999);
			$name_anh=explode(".",$tenhinh);
			$result = self::changeTitle($name_anh[0])."-".$rand;
			return $result; 
		}
	public static function getCurrentPageURL() {
	    $pageURL = 'http';
	    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	    $pageURL .= "://";
	    if ($_SERVER["SERVER_PORT"] != "80") {
	        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	    } else {
	        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	    }
		$pageURL = explode("?page=", $pageURL);
	    return $pageURL[0];
	}
	public static function canonical($template) {
	    $pageURL = 'http';
	    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	    $pageURL .= "://";
	    if($template=='index'){
	    	$pageURL .= $_SERVER["SERVER_NAME"].'/';
	    } else {
	    	$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	    }
		$pageURL = explode("?page=", $pageURL);
	    return $pageURL[0];
	}
	public static function getCurrentPage() {
	    $pageURL = 'http';
	    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	    $pageURL .= "://";
	    if ($_SERVER["SERVER_PORT"] != "80") {
	        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	    } else {
	        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	    }
	    return $pageURL;
	}
	public static function create_thumb($file, $width, $height, $folder,$file_name,$zoom_crop='1'){

	// ACQUIRE THE ARGUMENTS - MAY NEED SOME SANITY TESTS?

	$new_width   = $width;
	$new_height   = $height;

	$fix_width   = $width;
	$fix_height   = $height;

	 if ($new_width && !$new_height) {
	        $new_height = floor ($height * ($new_width / $width));
	    } else if ($new_height && !$new_width) {
	        $new_width = floor ($width * ($new_height / $height));
	    }
		
	$image_url = $folder.$file;
	$origin_x = 0;
	$origin_y = 0;
	// GET ORIGINAL IMAGE DIMENSIONS
	$array = getimagesize($image_url);
	if ($array)
	{
	    list($image_w, $image_h) = $array;
	}
	else
	{
	     die("NO IMAGE $image_url");
	}
	$width=$image_w;
	$height=$image_h;

	// ACQUIRE THE ORIGINAL IMAGE
	$arr_url = explode('.', $image_url);
	$image_ext = trim(strtolower(end($arr_url)));
	switch(strtoupper($image_ext))
	{
	     case 'JPG' :
	     case 'JPEG' :
	         $image = imagecreatefromjpeg($image_url);
			 $func='imagejpeg';
	         break;
	     case 'PNG' :
	         $image = imagecreatefrompng($image_url);
			 $func='imagepng';
	         break;
		 case 'GIF' :
		 	 $image = imagecreatefromgif($image_url);
			 $func='imagegif';
			 break;

	     default : die("UNKNOWN IMAGE TYPE: $image_url");
	}

	// scale down and add borders
		if ($zoom_crop == 3) {

			$final_height = $height * ($new_width / $width);

			if ($final_height > $new_height) {
				$new_width = $width * ($new_height / $height);
			} else {
				$new_height = $final_height;
			}

		}

		// create a new true color image
		$canvas = imagecreatetruecolor ($new_width, $new_height);
		imagealphablending ($canvas, false);

		// Create a new transparent color for image
		$color = imagecolorallocatealpha ($canvas, 255, 255, 255, 127);

		// Completely fill the background of the new image with allocated color.
		imagefill ($canvas, 0, 0, $color);

		// scale down and add borders
		if ($zoom_crop == 2) {

			$final_height = $height * ($new_width / $width);
			
			if ($final_height > $new_height) {
				
				$origin_x = $new_width / 2;
				$new_width = $width * ($new_height / $height);
				$origin_x = round ($origin_x - ($new_width / 2));

			} else {

				$origin_y = $new_height / 2;
				$new_height = $final_height;
				$origin_y = round ($origin_y - ($new_height / 2));

			}

		}

		// Restore transparency blending
		imagesavealpha ($canvas, true);

		if ($zoom_crop > 0) {

			$src_x = $src_y = 0;
			$src_w = $width;
			$src_h = $height;

			$cmp_x = $width / $new_width;
			$cmp_y = $height / $new_height;

			// calculate x or y coordinate and width or height of source
			if ($cmp_x > $cmp_y) {

				$src_w = round ($width / $cmp_x * $cmp_y);
				$src_x = round (($width - ($width / $cmp_x * $cmp_y)) / 2);

			} else if ($cmp_y > $cmp_x) {

				$src_h = round ($height / $cmp_y * $cmp_x);
				$src_y = round (($height - ($height / $cmp_y * $cmp_x)) / 2);

			}

			// positional cropping!
			if ($align) {
				if (strpos ($align, 't') !== false) {
					$src_y = 0;
				}
				if (strpos ($align, 'b') !== false) {
					$src_y = $height - $src_h;
				}
				if (strpos ($align, 'l') !== false) {
					$src_x = 0;
				}
				if (strpos ($align, 'r') !== false) {
					$src_x = $width - $src_w;
				}
			}

			imagecopyresampled ($canvas, $image, $origin_x, $origin_y, $src_x, $src_y, $new_width, $new_height, $src_w, $src_h);

	    } else {

	        // copy and resize part of an image with resampling
	        imagecopyresampled ($canvas, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

	    }
		


	$new_file=$file_name.'_'.$fix_width.'x'.$fix_height.'.'.$image_ext;
	// SHOW THE NEW THUMB IMAGE
	if($func=='imagejpeg') $func($canvas, $folder.$new_file,80);
	else $func($canvas, $folder.$new_file,9);

	return $new_file;

	}
	public static function ChuoiNgauNhien($sokytu){
		$chuoi="ABCDEFGHIJKLMNOPQRSTUVWXYZWabcdefghijklmnopqrstuvwxyzw0123456789";
		for ($i=0; $i < $sokytu; $i++){
			$vitri = mt_rand( 0 ,strlen($chuoi) );
			$giatri= $giatri . substr($chuoi,$vitri,1 );
		}
		return $giatri;
	} 

	public static function pagesListLimitadmin($url , $totalRows , $pageSize = 5, $offset = 5){
		if ($totalRows<=0) return "";
		$totalPages = ceil($totalRows/$pageSize);
		if ($totalPages<=1) return "";		
		if( isset($_GET["p"]) == true)  $currentPage = $_GET["p"];
		else $currentPage = 1;
		settype($currentPage,"int");	
		if ($currentPage <=0) $currentPage = 1;	
		$firstLink = "<li><a href=\"{$url}\" class=\"left\">First</a><li>";
		$lastLink="<li><a href=\"{$url}&p={$totalPages}\" class=\"right\">End</a></li>";
		$from = $currentPage - $offset;	
		$to = $currentPage + $offset;
		if ($from <=0) { $from = 1;   $to = $offset*2; }
	if ($to > $totalPages) { $to = $totalPages; }
		for($j = $from; $j <= $to; $j++) {
		   if ($j == $currentPage) $links = $links . "<li><a href='#' class='active'>{$j}</a></li>";		
		   else{				
			$qt = $url. "&p={$j}";
			$links= $links . "<li><a href = '{$qt}'>{$j}</a></li>";
		   } 	   
		} //for
		return '<ul class="pages">'.$firstLink.$links.$lastLink.'</ul>';
	} // function pagesListLimit
	public static function format_size ($rawSize)
	  {
	    if ($rawSize / 1048576 > 1) return round($rawSize / 1048576, 1) . ' MB';
	    else 
	      if ($rawSize / 1024 > 1) return round($rawSize / 1024, 1) . ' KB';
	      else
	        return round($rawSize, 1) . ' Bytes';
	  }
	public static function youtobi($id)
	{
		$ext = explode('=',$id);
		$vaich = $ext[1];
		return $vaich;
	}
	public static function youtobe($rong,$cao) {
	    $row  =  $db->query("select * from #_video where shows=1 and type='video' order by number desc");
	    $list = array();
	    foreach($row as $k=>$v){
	        if($k){
	            $list[] = self::youtobi($v['link']);
	        }
	    }
	    return '<iframe width="'.$rong.'" height="'.$cao.'" src="https://www.youtube.com/embed/'.youtobi($row[0]['link']).'?playlist='.implode(",",$list).'" frameborder="0" allowfullscreen></iframe>';

	    return false;
	}

	public static function convert_number_to_words($number) {
			$hyphen      = ' ';
			$conjunction = '  ';
			$separator   = ' ';
			$negative    = 'âm ';
			$decimal     = ' phẩy ';
			$dictionary  = array(
			0                   => 'Không',
			1                   => 'Một',
			2                   => 'Hai',
			3                   => 'Ba',
			4                   => 'Bốn',
			5                   => 'Năm',
			6                   => 'Sáu',
			7                   => 'Bảy',
			8                   => 'Tám',
			9                   => 'Chín',
			10                  => 'Mười',
			11                  => 'Mười Một',
			12                  => 'Mười Hai',
			13                  => 'Mười Ba',
			14                  => 'Mười Bốn',
			15                  => 'Mười Lăm',
			16                  => 'Mười Sáu',
			17                  => 'Mười Bảy',
			18                  => 'Mười Tám',
			19                  => 'Mười Chín',
			20                  => 'Hai Mươi',
			30                  => 'Ba Mươi',
			40                  => 'Bốn Mươi',
			50                  => 'Năm Mươi',
			60                  => 'Sáu Mươi',
			70                  => 'Bảy Mươi',
			80                  => 'Tám Mươi',
			90                  => 'Chín Mươi',
			100                 => 'Trăm',
			1000                => 'Ngàn',
			1000000             => 'Triệu',
			1000000000          => 'Tỷ',
			1000000000000       => 'Nghìn Tỷ',
			1000000000000000    => 'Ngàn Triệu Triệu',
			1000000000000000000 => 'Tỷ Tỷ'
			);
			 
			if (!is_numeric($number)) {
			return false;
			}
			 
			if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
			// overflow
			trigger_error(
			'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
			E_USER_WARNING
			);
			return false;
			}
			 
			if ($number < 0) {
			return $negative . convert_number_to_words(abs($number));
			}
			 
			$string = $fraction = null;
			 
			if (strpos($number, '.') !== false) {
			list($number, $fraction) = explode('.', $number);
			}
			 
			switch (true) {
			case $number < 21:
			$string = $dictionary[$number];
			break;
			case $number < 100:
			$tens   = ((int) ($number / 10)) * 10;
			$units  = $number % 10;
			$string = $dictionary[$tens];
			if ($units) {
			$string .= $hyphen . $dictionary[$units];
			}
			break;
			case $number < 1000:
			$hundreds  = $number / 100;
			$remainder = $number % 100;
			$string = $dictionary[$hundreds] . ' ' . $dictionary[100];
			if ($remainder) {
			$string .= $conjunction . self::convert_number_to_words($remainder);
			}
			break;
			default:
			$baseUnit = pow(1000, floor(log($number, 1000)));
			$numBaseUnits = (int) ($number / $baseUnit);
			$remainder = $number % $baseUnit;
			$string = self::convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
			if ($remainder) {
			$string .= $remainder < 100 ? $conjunction : $separator;
			$string .=self:: convert_number_to_words($remainder);
			}
			break;
			}
			 
			if (null !== $fraction && is_numeric($fraction)) {
			$string .= $decimal;
			$words = array();
			foreach (str_split((string) $fraction) as $number) {
			$words[] = $dictionary[$number];
			}
			$string .= implode(' ', $words);
			}
			 
			return $string;
	}

	function get_main_list()
	{
	    ClassPDO::bindMore(array("type"=>$_GET['type']));
	    $row  =  ClassPDO::query("select * from table_cate_list where type=:type order by number asc");
	    $str='
	      <select id="id_list" name="id_list" data-level="0" data-type="'.$_GET['type'].'" data-table="table_cate_cat" data-child="id_cat" class="main_select select_danhmuc">
	      <option value="">Chọn danh mục 1</option>';
	    foreach ($row as $key => $value) {
	      if($value["id"]==(int)@$_REQUEST["id_list"])
	        $selected="selected";
	      else 
	        $selected="";
	      $str.='<option value='.$value["id"].' '.$selected.'>'.$value["name_vi"].'</option>';      
	    }
	    $str.='</select>';
	    return $str;
	}

	function get_main_cat()
	{
	    ClassPDO::bindMore(array("type"=>$_GET['type'],"id_list"=>$_GET['id_list']));
	    $row  =  ClassPDO::query("select * from table_cate_cat where id_list=:id_list and type=:type order by number asc");
	    $str='
	      <select id="id_cat" name="id_cat" data-level="1" data-type="'.$_GET['type'].'" data-table="table_cate_item" data-child="id_item" class="main_select select_danhmuc">
	      <option value="">Chọn danh mục 1</option>';
	    foreach ($row as $key => $value) {
	      if($value["id"]==(int)@$_REQUEST["id_cat"])
	        $selected="selected";
	      else 
	        $selected="";
	      $str.='<option value='.$value["id"].' '.$selected.'>'.$value["name_vi"].'</option>';      
	    }
	    $str.='</select>';
	    return $str;
	}

	function get_main_item()
	  {
	    ClassPDO::bindMore(array("type"=>$_GET['type'],"id_cat"=>$_GET['id_cat']));
	    $row  =  ClassPDO::query("select * from table_cate_item where id_cat=:id_cat and type=:type order by number asc");
	    $str='
	      <select id="id_item" name="id_item" data-level="2" data-type="'.$_GET['type'].'" data-table="table_cate_sub" data-child="id_sub" class="main_select select_danhmuc">
	      <option value="">Chọn danh mục 1</option>';
	    foreach ($row as $key => $value) {
	      if($value["id"]==(int)@$_REQUEST["id_item"])
	        $selected="selected";
	      else 
	        $selected="";
	      $str.='<option value='.$value["id"].' '.$selected.'>'.$value["name_vi"].'</option>';      
	    }
	    $str.='</select>';
	    return $str;
	  }
	function get_main_sub()
	  {
	    ClassPDO::bindMore(array("type"=>$_GET['type'],"id_item"=>$_GET['id_item']));
	    $row  =  ClassPDO::query("select * from table_cate_sub where id_item=:id_item and type=:type order by number asc");
	    $str='
	      <select id="id_sub" name="id_sub" class="main_select">
	      <option value="">Chọn danh mục 1</option>';
	    foreach ($row as $key => $value) {
	      if($value["id"]==(int)@$_REQUEST["id_sub"])
	        $selected="selected";
	      else 
	        $selected="";
	      $str.='<option value='.$value["id"].' '.$selected.'>'.$value["name_vi"].'</option>';      
	    }
	    $str.='</select>';
	    return $str;
	  }
}