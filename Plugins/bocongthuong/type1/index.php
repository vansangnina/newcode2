<?php
  \Library\ClassPDO::bindMore(array("type"=>"bocongthuong"));
  $bocongthuong  =  \Library\ClassPDO::row("select thumb_$lang,link from #_photo where type=:type");
?>
<div class="bocongthuong"><a href="<?=$bocongthuong['link']?>" target="_blank"><img src="<?=_upload_hinhanh_l.$bocongthuong['thumb_'.$lang]?>" alt="bộ công thuong" /></a></div>