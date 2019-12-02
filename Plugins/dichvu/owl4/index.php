<?php
  $dichvu = $db->query("select name_$lang,description_$lang,slug,photo from #_post where shows=1 and type='dichvu' order by number,id desc");

  $title_content = $db->row("select * from #_info where type='nddichvu' ");
?>
<div class="dichvu_in">
    <div class="thanh_title">
        <h4><?=$title_content['name_'.$lang]?></h4>
        <p><?=$title_content['content_'.$lang]?></p>
    </div>
    <div class="dichvunb none_control">
      <?php for($i=0;$i<count($dichvu);$i++){?>
        <div class="owl_dichvu">
            <a class="effect-v5" href="dich-vu/<?=$dichvu[$i]['slug']?>.html"><img src="<?=_upload_post_l.'370x260x1/'.$dichvu[$i]['photo']?>" alt="<?=$dichvu[$i]['name_'.$lang]?>" /></a>
            <div class="dv_info">
              <h3><a href="dich-vu/<?=$dichvu[$i]['slug']?>.html"><?=$dichvu[$i]['name_'.$lang]?></a></h3>
              <?=$dichvu[$i]['description_'.$lang]?>
              <div class="xemthem"><a href="dich-vu/<?=$dichvu[$i]['slug']?>.html"><?=_xemthem?></a></div>
            </div>
        </div>
      <?php } ?>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(e) {
        $('.dichvunb').owlCarousel({
                loop:true,
                margin:45,
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
                        items:3,
                        nav:true,
                    }
                }
        })
    });
</script>
