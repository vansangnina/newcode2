<?php
	$row_hotro  =  $db->row("select * from #_title where shows=1 and type='hotro' order by number,id desc ");
?>

<div class="hotro_bt">
<div class="hotline_bt">
	<p> <?=$row_setting['hotline']?></p>
	<?php include _template."layout/addon/lienket.php";?>
</div>
<p><b>Gọi ngay cho chúng tôi để đặt vị trí tốt nhất</b></p>
<?php for($i=0,$count_ya=count($row_hotro);$i<$count_ya;$i++){?>
	<div class="yahoo">
	    <span> <?=$row_hotro[$i]['dienthoai']?> ( <?=$row_hotro[$i]['name']?> ) </span>
	    <a href="Skype:<?=$row_hotro[$i]['skype']?>?chat"> <img src="images/skyper.png" title="skyper" alt=""> </a>
	 </div>
<?php }?>
<p><b>Giờ Mở Cửa</b></p>
<div class="yahoo">
	    <span> <?=$row_setting['giomocua']?> </span>
	 </div>

</div>