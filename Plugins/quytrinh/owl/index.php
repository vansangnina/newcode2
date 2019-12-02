<?php
  $quytrinh  =  $db->query("select name_$lang,description_$lang,slug,thumb,id from #_post where shows=1 and type='quytrinh' order by number,id desc");
?>
<div id="quytrinh">
<div class="margin_auto">
<div class="quytrinh">
  <div class="thanh_title"><h2><?=_quytrinhlamviec?></h2></div>
  <ul class="owl_quytrinh none_control">
  <?php for($i=0;$i<count($quytrinh);$i++){?>
      <li <?php if($i==0){ echo 'class="active"';}?> data-id="<?=$quytrinh[$i]['id']?>"><h3><?=$quytrinh[$i]['name_'.$lang]?></h3></li>
  <?php } ?>
  </ul>
  <div class="description_quytrinh">
  <?php for($i=0;$i<count($quytrinh);$i++){?>
  <p id="qt<?=$quytrinh[$i]['id']?>"><?=$quytrinh[$i]['description_'.$lang]?></p>
  <?php } ?>
  </div>
</div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function(e) {
    $('.owl_quytrinh').owlCarousel({
          loop:false,
          margin:65,
          responsiveClass:true,
          responsive:{
              0:{
                  items:2,
                  nav:true
              },
              600:{
                  items:3,
                  nav:true
              },
              1000:{
                  items:5,
                  nav:true,
              }
          }
    })
    $('.owl_quytrinh li').click(function(event) {
      /* Act on the event */
      var id = $(this).data('id');
      $('.owl_quytrinh li').removeClass('active');
      $(this).addClass('active');
      $('.mota_quytrinh p').slideUp(500);
      $('.mota_quytrinh').find('#qt'+id).slideDown(500);
    });
  });
</script>