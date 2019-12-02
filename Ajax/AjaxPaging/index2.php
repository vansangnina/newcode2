<?php
	session_start();

	@define ( '_lib' , '../libraries/');
	@define ( '_source' , '../sources/');	
	
	if(!isset($_SESSION['lang']))
	{
	$_SESSION['lang']='vi';
	}
	$lang=$_SESSION['lang'];
	
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";
	include_once _source."lang_$lang.php";
	$d = new database($config['database']);
	
	if(isset($_POST["page"]))
    {
	$paging = new paging_ajax();
	$paging->class_pagination = "pagination";
	$paging->class_active = "active";
	$paging->class_inactive = "inactive";
	$paging->class_go_button = "go_button";
	$paging->class_text_total = "total";
	$paging->class_txt_goto = "txt_go_button";
    $paging->per_page = 8; 	
    $paging->page = $_POST["page"];
    $paging->text_sql = "select ten_$lang,thumb,giaban,tenkhongdau,mota_$lang from table_product where hienthi=1 and type='product' and sp_banchay!=0 order by stt,id desc";
    $result_pag_data = $paging->GetResult();
	$message = "";
	$paging->data = "" . $message . "";
    }
	 
?>


<div class="khung_in">
<ul class="product_home">
<?php while ($row = mysql_fetch_array($result_pag_data)) {?>  
 	<li class="item">
        <div class="img">
            <a href="san-pham/<?=$row['tenkhongdau']?>.html">
                <img src="<?=_upload_product_l.$row['thumb']?>" alt="<?=$row['ten_'.$lang]?>" />
            </a>
        </div>
        <h3><a href="san-pham/<?=$row['tenkhongdau']?>.html"><?=$row['ten_'.$lang]?></a></h3>
        <div class="giaban">Giá : <span><?php if($row['giaban']==0) echo "Liên Hệ"; else echo number_format ($row['giaban'],0,",",".")." VNĐ";?></span></div>
    </li>
  <?php } ?>   
</ul>
<div class="clear"></div>
<?=$paging->Load()?>
</div>


