<?php
  $db->bindMore(array("type"=>"product","selling"=>0));
  $product  =  $db->query("select name_$lang,slug,photo,price,oldprice,id,thumb from #_product where shows=1 and type=:type and selling!=:selling order by number,id desc");

  $title_content = $db->row("select * from #_info where type='ndkhuyenmai' ");

?>

<div class="product_km">
<div class="container">
    <div class="title_km">
    <h4><?=$title_content['name_'.$lang]?></h4>
    <p><?=$title_content['content_'.$lang]?></p>
    </div>
    <div class="khung_sp noibat_owl">
      <?php for($i=0;$i<count($product);$i++){?>
        <div class="item">
                <?php if($product[$i]['oldprice']){?>
                    <div class="giamgia"><?=$func->giamgia($product[$i]['price'],$product[$i]['oldprice'])?></div>
                <?php } ?>
                <a class="img effect-v5" href="san-pham/<?=$product[$i]['slug']?>.html"><img src="<?=_upload_product_l.'279x230x1/'.$product[$i]['photo']?>" alt="<?=$product[$i]['name_'.$lang]?>" /></a>
                <h3><a href="san-pham/<?=$product[$i]['slug']?>.html"><?=$product[$i]['name_'.$lang]?></a></h3>
                <p class="giaban"><?=_gia?> : <span><?=$func->giaban($product[$i]['price'])?></span></p>
            </div>
      <?php } ?>
    </div>
</div>
</div>

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
