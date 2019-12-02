<?php
    $doitac = $db->query("select * from #_photo where shows=1 and type='doitac' order by number,id desc");
?>
<div id="doitac">
  <div class="margin_auto">
      <div class="doitac">
        <ul class="owl_carousel_doitac">
          <?php for($j=0,$count_ch=count($doitac);$j<$count_ch;$j++){?>
          <li><a href="<?=$doitac[$j]['link'];?>" target="_blank"><img src="<?=_upload_hinhanh_l.'190x110x2/'.$doitac[$j]['photo_'.$lang]?>" alt="<?=$doitac[$j]['name_'.$lang]?>" /></a></li>
        <?php } ?>
        </ul>
      </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(e) {
    $('.owl_carousel_doitac').owlCarousel({
          loop:true,
          margin:10,
          responsiveClass:true,
          responsive:{
              0:{
                  items:2,
                  nav:true
              },
              600:{
                  items:4,
                  nav:true
              },
              1000:{
                  items:6,
                  nav:true,
              }
          }
    })
  });
</script>