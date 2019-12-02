<?php

  $product  =  $db->query("select name_$lang,description_$lang,slug,photo,price,id,thumb from #_product where shows=1 and type='product' and highlight!=0 order by number,id desc");
?>
<div class="product_hot">
    <div class="thanh_title"><h4>Sản phẩm Hot</h4></div>
    <div class="product_hot_owl none_control">
      <?php for($i=0;$i<count($product);$i++){?>
        <div class="item" style="width:100%">
            <a class="effect-v5" href="san-pham/<?=$product[$i]['slug']?>.html"><img src="<?=_upload_product_l.'283x283x1/'.$product[$i]['thumb']?>" alt="<?=$product[$i]['name_'.$lang]?>" /></a>
            <div class="hot_info">
              <h3><a href="san-pham/<?=$product[$i]['slug']?>.html"><?=$product[$i]['name_'.$lang]?></a></h3>
              <p class="mota"><?=_substr($product[$i]['description_'.$lang],70)?></p>
              <p class="giaban">Giá : <span><?=giaban($product[$i]['price'])?></span></p>
              <span class="dathang" onClick="addtocart(<?=$product[$i]['id']?>)" data-id="<?=$product[$i]['id']?>">Mua hàng</span>
            </div>
        </div>
      <?php } ?>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(e) {
        $('.product_hot_owl').owlCarousel({
                loop:true,
                margin:20,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:true
                    },
                    425:{
                        items:2,
                        nav:true
                    },
                    600:{
                        items:3,
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
