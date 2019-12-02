<?php
    $gioithieu = $db->row("select * from #_info where type='trangchu'");
?>
<div class="gioithieu">
	   <div class="noidung_gt">
        <div class="thanh_gt"><h5>Welcome</h5></div>
        <div class="thanh_gt"><h4><?=$gioithieu['name_'.$lang]?></h4></div>
        <?=$gioithieu['content_'.$lang]?>
     </div>
     <div class="xemthem_gt"><a href="gioi-thieu.html"><?=_xemchitiet?></a></div>
</div>
<div class="hinhanh_gt"><p><img src="<?=_upload_hinhanh_l.$gioithieu['thumb']?>" alt="<?=$gioithieu['name_'.$lang]?>"></p></div>