<?php
    $footer  =  $db->query("select content_$lang from #_info where type='footer' ");
?>
<div class="thongtin_bt">
	<h4><?=_lienhevoichungtoi?></h4>
    <?=$footer['content_'.$lang]?>
</div>