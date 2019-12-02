<?php

  $db->bindMore(array("shows"=>1,"type"=>"dichvu"));
  $dichvu  =  $db->query("select ten_$lang,mota_$lang,tenkhongdau,photo from #_post where shows=:shows and type=:type order by number,id desc");

?>
<div class="dichvu_in">
    <div class="thanh_title"><h4>Dịch vụ <span>của chúng tôi</span></h4></div>
    <div class="visao_ship">
      <?php for($i=0;$i<count($dichvu);$i++){?>
        <div class="owl_dichvu">
            <a class="effect-v5" href="dich-vu/<?=$dichvu[$i]['tenkhongdau']?>.html"><img src="<?=_upload_post_l.'380x250x1/'.$dichvu[$i]['photo']?>" alt="<?=$dichvu[$i]['ten_'.$lang]?>" /></a>
            <div class="dv_info">
              <h3><a href="dich-vu/<?=$dichvu[$i]['tenkhongdau']?>.html"><?=$dichvu[$i]['ten_'.$lang]?></a></h3>
              <?=_substr($dichvu[$i]['mota_'.$lang],150)?>
              <p><a class="xemthem" href="dich-vu/<?=$dichvu[$i]['tenkhongdau']?>.html">Xem chi tiết</a></p>
            </div>
        </div>
      <?php } ?>
    </div>
</div>