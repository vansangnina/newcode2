<?php

  $db->bindMore(array("type"=>"product","shows"=>1,"highlight"=>0));
  $product_list = $db->query("select * from #_cate_list where shows=:shows and type=:type and highlight!=:highlight order by number,id desc");

  for($j=0;$j<count($product_list);$j++){ 

  $db->bindMore(array("type"=>"product","shows"=>1,"highlight"=>0));
  $product  =  $db->query("select name_$lang,description_$lang,slug,photo,oldprice,price,id,thumb from #_product where shows=:shows and type=:type and highlight!=:highlight order by number,id desc");
?>
<div class="product_nb">
    <div class="container">
        <div class="thanh_title"><h2><?=$product_list[$j]['name_'.$lang]?></h2></div>
        <div class="noibat_owl">
          <?php for($i=0;$i<count($product);$i++){?>
            <div class="itemnb">
                <?php if($product[$i]['oldprice']){?>
                    <div class="giamgia"><?=$func->giamgia($product[$i]['price'],$product[$i]['oldprice'])?></div>
                <?php } ?>
                <a class="img effect-v5" href="san-pham/<?=$product[$i]['slug']?>.html"><img src="<?=_upload_product_l.'279x240x2/'.$product[$i]['photo']?>" alt="<?=$product[$i]['name_'.$lang]?>" /></a>
                <h3><a href="san-pham/<?=$product[$i]['slug']?>.html"><?=$product[$i]['name_'.$lang]?></a></h3>
                <p class="giaban"><?=_gia?> : <span><?=$func->giaban($product[$i]['price'])?></span></p>
                <?php if($product[$i]['oldprice']){?><p class="giacu"><?=$func->giaban($product[$i]['oldprice'])?></p><?php } ?>
            </div>
          <?php } ?>
        </div>
    </div>
</div>
<?php } ?>
<script type="text/javascript">
    $(document).ready(function(e) {
        $('.noibat_owl').owlCarousel({
            loop:true,
            margin:25,
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
                    items:4,
                    nav:true,
                }
            }
        })
    });
</script>