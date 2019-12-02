<?php
  $db->bindMore(array("type"=>"product","selling"=>0));
  $product  =  $db->query("select name_$lang,slug,photo,price,oldprice,id,thumb from #_product where shows=1 and type=:type and selling!=:selling order by number,id desc");

?>

<div class="product_nb">
<div class="container">
    <div class="thanh_title"><h4>Top sản phẩm bán chạy</h4></div>
    <div class="khung_sp">
      <?php for($i=0;$i<count($product);$i++){?>
        <div class="item">
                <?php if($product[$i]['oldprice']){?>
                    <div class="giamgia"><?=$func->giamgia($product[$i]['price'],$product[$i]['oldprice'])?></div>
                <?php } ?>
                <a class="img effect-v5" href="san-pham/<?=$product[$i]['slug']?>.html"><img src="<?=_upload_product_l.'222x240x2/'.$product[$i]['photo']?>" alt="<?=$product[$i]['name_'.$lang]?>" /></a>
                <h3><a href="san-pham/<?=$product[$i]['slug']?>.html"><?=$product[$i]['name_'.$lang]?></a></h3>
                <p class="giaban"><?=_gia?> : <span><?=$func->giaban($product[$i]['price'])?></span></p>
                <?php if($product[$i]['oldprice']){?><p class="giacu"><?=$func->giaban($product[$i]['oldprice'])?></p><?php } ?>
            </div>
      <?php } ?>
    </div>
</div>
</div>