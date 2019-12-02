<?php
  $db->bindMore(array("type"=>"mangxh"));
  $lienket  =  $db->query("select * from #_link where shows=1 and type=:type order by number,id desc ");
?>
<div class="mang_xh">
<?php for($i=0;$i<count($lienket);$i++){?>
<a href="<?=$lienket[$i]['link']?>" target="_blank"><img src="<?=_upload_hinhanh_l.$lienket[$i]['thumb']?>" alt="<?=$lienket[$i]['name_'.$lang]?>" /></a>
<?php } ?>
</div>