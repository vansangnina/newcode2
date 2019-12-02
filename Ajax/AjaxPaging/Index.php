<?php
	session_start();

	@define ( '_lib' , '../libraries/');	
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
	$list = $_POST['list'];
	if($list && $list!='all'){
		$where =" and id_list ='".$list."' ";
	}
	$page_num = 8;
	
	if(isset($_POST["page"]))
    {
	$paging = new paging_ajax();
	$paging->class_pagination = "pagination";
	$paging->class_active = "active";
	$paging->class_inactive = "inactive";
	$paging->class_go_button = "go_button";
	$paging->class_text_total = "total";
	$paging->class_txt_goto = "txt_go_button";
    $paging->per_page = $page_num; 	
    $paging->page = $_POST["page"];
    $paging->text_sql = "select ten_$lang,thumb,giaban,tenkhongdau,mota_$lang,photo from table_product where hienthi=1 and type='product' $where order by stt,id desc";
    $result_pag_data = $paging->GetResult();
	$message = "";
	$paging->data = "" . $message . "";
    }
	 
?>
<div class="khung_in">
<ul class="khung_sp ul">
    <?php while ($row = mysql_fetch_array($result_pag_data)) {?>  
    <li class="item">
        <a class="img effect-v5" href="san-pham/<?=$row['tenkhongdau']?>.html"><img src="<?=_upload_product_l.'275x330x1/'.$row['photo']?>" alt="<?=$row['ten_'.$lang]?>" /></a>
        <h3><a href="san-pham/<?=$row['tenkhongdau']?>.html"><?=$row['ten_'.$lang]?></a></h3>
        <p class="giaban">Giá : <span><?=giaban($row['giaban'])?></span></p>
    </li>
    <?php } ?>
</ul>
<div class="clear"></div>
<?=$paging->Load()?>
</div>


