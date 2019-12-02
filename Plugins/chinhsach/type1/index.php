<?php

  $db->bindMore(array("shows"=>1,"type"=>"chinhsach"));
  $item  =  $db->query("select name_$lang,slug from #_post where shows=:shows and type=:type order by number,id desc");
?>
<div class="chinhsach">
    <h4><?=_hotrokhachhang?></h4>
    <ul class="ul">
      <?php for($i=0;$i<count($item);$i++){?>
        <li><a href="chinh-sach/<?=$item[$i]['slug']?>.html"><?=$item[$i]['name_'.$lang]?></a></li>
      <?php } ?>
    </ul>
</div>