<?php
  $d->reset();
  $sql = "select ten_$lang,mota_$lang,tenkhongdau,photo from #_baiviet where hienthi=1 and type='dichvu' order by stt,id desc ";
  $d->query($sql);
  $dichvu = $d->result_array();
  
?>
<div class="dichvu_in">
    <div class="thanh_title"><h4>Dịch vụ <span>của chúng tôi</span></h4></div>
    <div class="visao_ship">
      <?php for($i=0;$i<count($dichvu);$i++){?>
        <div class="owl_dichvu">
            <a class="effect-v5" href="dich-vu/<?=$dichvu[$i]['tenkhongdau']?>.html"><img src="<?=_upload_baiviet_l.'380x250x1/'.$dichvu[$i]['photo']?>" alt="<?=$dichvu[$i]['ten_'.$lang]?>" /></a>
            <div class="dv_info">
              <h3><a href="dich-vu/<?=$dichvu[$i]['tenkhongdau']?>.html"><?=$dichvu[$i]['ten_'.$lang]?></a></h3>
              <?=_substr($dichvu[$i]['mota_'.$lang],150)?>
              <p><a class="xemthem" href="dich-vu/<?=$dichvu[$i]['tenkhongdau']?>.html">Xem chi tiết</a></p>
            </div>
        </div>
      <?php } ?>
    </div>
</div>