<?php
  $db->bindMore(array("shows"=>1,"type"=>"tintuc","highlight"=>0));
  $tintuc_nb  =  $db->query("select name_$lang,id,slug,thumb,datecreate,photo,description_$lang from #_post where shows=:shows and type=:type and highlight!=:highlight order by number,id desc");
?>

<div class="thanh_bt"><h4>Tin tức</h4></div>
<div class="tintuc_hot">
  <ul class="hotnew ul" id="scroller">
  <?php for($i=0,$count_tt=count($tintuc_nb);$i<$count_tt;$i++){  ?> 
      <li>
      <a href="tin-tuc/<?=$tintuc_nb[$i]['slug']?>.html"><img src="<?=_upload_post_l.'125x100x1/'.$tintuc_nb[$i]['photo']?>" border="0" align="left"  /></a>
      <h3><a href="tin-tuc/<?=$tintuc_nb[$i]['slug']?>.html"><?=$tintuc_nb[$i]['name_'.$lang]?></a></h3>
      <p><?=catchuoi($tintuc_nb[$i]['description_'.$lang],110)?></p>
      </li>
  <?php } ?>
  </ul>
</div>
<script type="text/javascript">
(function($) {
  $(function() {
    $("#scroller").simplyScroll({orientation:'vertical',customClass:'vert'});
  });
})(jQuery);
</script>