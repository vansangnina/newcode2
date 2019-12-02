<?php
  $listnb = $db->query("select * from #_cate_list where shows=1 and type='product' order by number,id desc");
?>
<div class="list_product">
    <div class="list_owl none_control">
      <?php for($i=0;$i<count($listnb);$i++){?>
        <div class="owl_list">
            <a class="effect-v5" href="san-pham/<?=$listnb[$i]['slug']?>"><img src="<?=_upload_cate_l.'60x55x1/'.$listnb[$i]['photo']?>" alt="<?=$listnb[$i]['name_'.$lang]?>" /></a>
            <h3><a href="san-pham/<?=$listnb[$i]['slug']?>"><?=$listnb[$i]['name_'.$lang]?></a></h3>
        </div>
      <?php } ?>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(e) {
        $('.list_owl').owlCarousel({
                loop:true,
                margin:30,
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
                        items:5,
                        nav:true,
                    }
                }
        })
    });
</script>
