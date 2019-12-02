<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<?php
	@define ( '_lib' , './libraries/');

	if(!isset($_SESSION['lang']))
	{
	$_SESSION['lang']='vi';
	}
	$lang=$_SESSION['lang'];
	
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);

	$header_xml = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
	$footer_xml = "</urlset>";
	$file_topic = fopen("upload/sitemap.xml", "w+");

	fwrite($file_topic, $header_xml);
	fwrite($file_topic, "<url><loc>http://".$config_url."/</loc><lastmod>".date('c')."</lastmod><priority>1</priority></url>");
	fwrite($file_topic, "<url><loc>http://".$config_url."/gioi-thieu.html</loc><lastmod>".date('c')."</lastmod><priority>0.85</priority></url>");
	fwrite($file_topic, "<url><loc>http://".$config_url."/dich-vu.html</loc><lastmod>".date('c')."</lastmod><priority>0.85</priority></url>");
	fwrite($file_topic, "<url><loc>http://".$config_url."/tin-tuc.html</loc><lastmod>".date('c')."</lastmod><priority>0.85</priority></url>");
	fwrite($file_topic, "<url><loc>http://".$config_url."/tri-an.html</loc><lastmod>".date('c')."</lastmod><priority>0.85</priority></url>");
	fwrite($file_topic, "<url><loc>http://".$config_url."/lien-he.html</loc><lastmod>".date('c')."</lastmod><priority>0.85</priority></url>");

	$d->reset();
	$sql = "select ten_$lang,id,tenkhongdau,ngaysua from #_baiviet where hienthi=1 and type='dichvu' order by stt,id desc ";
	$d->query($sql);
	$sanpham = $d->result_array();

	for($i=0;$i<count($sanpham);$i++){
		fwrite($file_topic, "<url><loc>http://".$config_url."/dich-vu/".$sanpham[$i]['tenkhongdau'].".html</loc><lastmod>".date('c',$sanpham[$i]['ngaysua'])."</lastmod><priority>0.85</priority></url>");
	} 

	$d->reset();
	$sql = "select ten_$lang,id,tenkhongdau,ngaysua from #_baiviet where hienthi=1 and type='tintuc' order by stt,id desc ";
	$d->query($sql);
	$sanpham = $d->result_array();

	for($i=0;$i<count($sanpham);$i++){      
		fwrite($file_topic, "<url><loc>http://".$config_url."/tin-tuc/".$sanpham[$i]['tenkhongdau'].".html</loc><lastmod>".date('c',$sanpham[$i]['ngaysua'])."</lastmod><priority>0.69</priority></url>");
	} 

	$d->reset();
	$sql = "select ten_$lang,id,tenkhongdau,ngaysua from #_baiviet where hienthi=1 and type='trian' order by stt,id desc ";
	$d->query($sql);
	$sanpham = $d->result_array();

	for($i=0;$i<count($sanpham);$i++){      
		fwrite($file_topic, "<url><loc>http://".$config_url."/tri-an/".$sanpham[$i]['tenkhongdau'].".html</loc><lastmod>".date('c',$sanpham[$i]['ngaysua'])."</lastmod><priority>0.69</priority></url>");
	} 

	$d->reset();
	$sql = "select ten_$lang,id,tenkhongdau,ngaysua from #_product_list where hienthi=1 and type='product' order by stt,id desc ";
	$d->query($sql);
	$sanpham = $d->result_array();

	for($i=0;$i<count($sanpham);$i++){      
		fwrite($file_topic, "<url><loc>http://".$config_url."/san-pham/".$sanpham[$i]['tenkhongdau']."</loc><lastmod>".date('c',$sanpham[$i]['ngaysua'])."</lastmod><priority>1</priority></url>");
	} 

	$d->reset();
	$sql = "select ten_$lang,id,tenkhongdau,ngaysua from #_product where hienthi=1 and type='product' order by stt,id desc ";
	$d->query($sql);
	$sanpham = $d->result_array();

	for($i=0;$i<count($sanpham);$i++){      
		fwrite($file_topic, "<url><loc>http://".$config_url."/san-pham/".$sanpham[$i]['tenkhongdau'].".html</loc><lastmod>".date('c',$sanpham[$i]['ngaysua'])."</lastmod><priority>1</priority></url>");
	} 
	 
	fwrite($file_topic, $footer_xml);
	fclose($file_topic);

	transfer("Đã tạo xong sitemap ! ", "sitemap.xml");
?>