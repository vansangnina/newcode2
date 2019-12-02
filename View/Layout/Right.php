<?php
    $row_nhadat  =  $db->query("select name_$lang,slug from #_post where shows=1 and type='nhadat' order by number,id desc");
    $row_banchay  =  $db->query("select slug,name_$lang,oldprice,price,thumb,description_$lang from #_product where shows=1 and type='product' and sp_banchay!=0 order by number,id desc");
?>
<div id="right">
			<div class="danhmuc">
      <div class="thanh">Sản phẩm bán chạy</div>
      <div class="left">
      <ul class="ul">
            <?php for($j=0,$count_sp=count($row_banchay);$j<$count_sp;$j++){?>
          <li class="item_bc">
              <div class="img"><a href="san-pham/<?=$row_banchay[$j]['slug']?>.html"><img src="<?=_upload_product_l.'120x120x1/'.$row_banchay[$j]['thumb']?>" alt="<?=$row_banchay[$j]['name_'.$lang]?>" /></a></div>
              <h3><a href="san-pham/<?=$row_banchay[$j]['slug']?>.html"><?=catchuoi($row_banchay[$j]['name_'.$lang],150)?></a></h3>
              <p>
              <?php if($row_banchay[$j]['oldprice']!=0){?>
              <span class="giacu"><?=giaban($row_banchay[$j]['oldprice'])?></span>
              <?php } ?>
              <?php if($row_banchay[$j]['price']!=0){?>
              <span class="giaban"><?=_gia?> : <?=giaban($row_banchay[$j]['price'])?></span>
              <?php } ?>
              </p>
              <p><?=catchuoi($row_banchay[$j]['description_'.$lang],150)?></p>
          </li>
          <?php } ?>
      </ul>
      </div>
      </div>
</div>