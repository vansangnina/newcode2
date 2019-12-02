<?php
  $db->bindMore(array("shows"=>1,"type"=>"thongtin"));
  $item  =  $db->query("select name_$lang,description_$lang,slug,thumb from #_baiviet where shows=:shows and type=:type order by number,id desc");
?>
<div id="dh_hotro">
  <ul class="owl_hotro none_control">
  <?php for($i=0;$i<count($item);$i++){?>
      <li>
          <div><i class="<?=$item[$i]['icon']?>"></i></div>
          <h3><?=$item[$i]['name_'.$lang]?></h3>
          <p><?=$item[$i]['description_'.$lang]?></p>
      </li>
  <?php } ?>
  </ul>
</div>

<script type="text/javascript">
  $(document).ready(function(e) {
    $('.owl_hotro').owlCarousel({
          loop:false,
          margin:40,
          responsiveClass:true,
          responsive:{
              0:{
                  items:1,
                  nav:true
              },
              600:{
                  items:2,
                  nav:true
              },
              1000:{
                  items:4,
                  nav:true,
              }
          }
    })
  });
</script>