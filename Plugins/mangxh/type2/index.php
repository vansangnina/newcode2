<?php
	$lienket  =  $db->query("select * from #_link where shows=1 and type='link' order by number,id desc");
?>
<div class="lienket">
<ul class="ul">
<?php for($i=0;$i<count($lienket);$i++){?>
	<li><a href="<?=$lienket[$i]['link']?>" target="_blank"><img src="<?=_upload_hinhanh_l.$lienket[$i]['thumb']?>" alt="<?=$lienket[$i]['name_'.$lang]?>" /></a></li>
<?php } ?>
</ul>
</div>
