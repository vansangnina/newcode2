<?php 
    $db->bindMore(array("type"=>"slider"));
    $slide_home  =  $db->query("select thumb_vi from #_photo where shows=1 and type=:type order by number,id desc");
?>

<div id="slider" class="nivoSlider">
<?php for($i=0;$i<count($slide_home);$i++){?>
    <img src="<?=_upload_hinhanh_l.$slide_home[$i]['thumb_vi']?>" data-thumb="<?=_upload_hinhanh_l.$slide_home[$i]['thumb_vi']?>" alt="<?=$slide_home[$i]['name_vi']?>" />
<?php } ?>
</div>
