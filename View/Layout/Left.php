<?php
    $tintuc_bt = $db->query("select name_$lang,photo,slug,thumb from #_post where shows=1 and type='tintuc' and highlight!=0 order by number,id desc");
?>
<div id="left">
			<div class="danhmuc">
      <div class="thanh">Bài viết xem nhiều</div>
      <div class="left">
            <div class="menu_left">
            <ul>
                <?php for($j=0,$count_ct=count($tintuc_bt);$j<$count_ct;$j++){ ?>
                 <li><a href="tin-tuc/<?=$tintuc_bt[$j]['slug']?>.html"><?=$tintuc_bt[$j]['name_'.$lang]?></a></li>
                <?php } ?>
             </ul>
            </div
      </div>
      </div>
</div>