<?php

  $db->bindMore(array("shows"=>1,"type"=>"thongtin"));
  $item  =  $db->query("select name_$lang,description_$lang,slug,thumb from #_baiviet where shows=:shows and type=:type order by number,id desc");

?>
<div class="title"><h4><?=_visaochonbachdon?> ?</h4></div>
<ul class="owl_chonchungtoi none_control">
<?php for($i=0;$i<count($item);$i++){?>
    <li>
        <img src="<?=_upload_post_l.$item[$i]['thumb']?>" alt="<?=$item[$i]['name_'.$lang]?>" />
        <h3><?=$item[$i]['name_'.$lang]?></h3>
        <p><?=$item[$i]['description_'.$lang]?></p>
    </li>
<?php } ?>
</ul>