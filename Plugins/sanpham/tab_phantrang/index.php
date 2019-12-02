<?php
  $product_list  =  $db->query("select * from #_product_list where shows=1 and type='product' order by number,id desc");
  $product  =  $db->query("select name_$lang,slug,id,thumb,photo from #_product where shows=1  and type='product' order by number,id desc limit 0,15 ");
?>
<script src="ajax_paging/paging.js" type="text/javascript"></script>
<link rel="stylesheet" href="ajax_paging/ajax.css" />
<div id="sanpham_nb">
<div class="khung">
    <div class="thanh_title"><h2>Menu</h2></div>
    <div class="tags_nb">
        <ul class="ul">
        <li class="active"><a href="san-pham.html" data-id="all">tất cả</a></li> |
        <?php for($i=0,$count_sp=count($product_list);$i<$count_sp;$i++){?>
          <li><a href="san-pham/<?=$product_list[$i]['slug']?>" data-id="<?=$product_list[$i]['id']?>"><?=$product_list[$i]['name_'.$lang]?></a></li> <?php if(($i+1)!=count($product_list)){ echo "|";}?> 
        <?php } ?>
        </ul>
    </div>
    <div class="load_sanpham"><div class="pagination"></div></div>
  <div class="clear"></div>
</div>
</div>