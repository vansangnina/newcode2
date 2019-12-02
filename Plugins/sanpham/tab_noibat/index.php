<?php
  $product_list  =  $db->query("select * from #_cate_list where shows=1 and type='product' order by number,id desc");
  $item_nb  =  $db->query("select name_$lang,slug,id,thumb,photo,price,oldprice from #_product where shows=1 and type='product' and highlight!=0 order by number,id desc limit 0,8 ");
  $item_new  =  $db->query("select name_$lang,slug,id,thumb,photo,price,oldprice from #_product where shows=1 and type='product' order by id desc limit 0,8 ");

  $title_content = $db->row("select * from #_info where type='ndspcaocap' ");

?>
<div id="tab_sanpham">
  <div class="khung">
      <div class="thanh_title">
          <h2><?=$title_content['name_'.$lang]?></h2>
          <p><?=$title_content['content_'.$lang]?></p>
      </div>

      <div class="tags_nb">
          <ul class="ul">
              <li class="active"><a class="active" href="#sanpham_nb"><i class="far fa-star"></i><?=_sanphamnoibat?></a></li>
              <li><a href="#sanpham_moi"><i class="far fa-star"></i><?=_sanphammoi?></a></li>
          </ul>
      </div>

      <div id="sanpham_nb" class="hidden_tab active">
          <ul class="khung_sp ul">
            <?php if(count($item_nb)!=0){?>
                <?php for($i=0,$count_sp=count($item_nb);$i<$count_sp;$i++){?>
                    <li class="item">
                      <a class="effect-v3 img" href="san-pham/<?=$item_nb[$i]['slug']?>.html"><img src="<?=_upload_product_l.'259x220x1/'.$item_nb[$i]['photo']?>" alt="<?=$item_nb[$i]['ten_'.$lang]?>" /></a>
                      <h3><a href="san-pham/<?=$item_nb[$i]['slug']?>.html"><?=$item_nb[$i]['name_'.$lang]?></a></h3>
                      <p class="giaban"><?=_gia?> : <span><?=$func->giaban($item_nb[$i]['price'])?></span></p>
                    </li>
                <?php } ?>
            <?php } else { ?>
            <li style="text-align:center; color:#e91678; font-size:14px; text-transform:uppercase;"> <?=_chuacosanphamchomucnay?> . </li>
            <?php }?>
        </ul>
        <div class="xemthem"><a href="san-pham.html"><?=_xemthem?></a></div>
      </div>

      <div id="sanpham_moi" class="hidden_tab">
          <ul class="khung_sp ul">
            <?php if(count($item_new)!=0){?>
                <?php for($i=0,$count_sp=count($item_new);$i<$count_sp;$i++){?>
                     <li class="item">
                        <a class="effect-v3 img" href="san-pham/<?=$item_new[$i]['slug']?>.html"><img src="<?=_upload_product_l.'259x220x1/'.$item_new[$i]['photo']?>" alt="<?=$item_new[$i]['ten_'.$lang]?>" /></a>
                        <h3><a href="san-pham/<?=$item_new[$i]['slug']?>.html"><?=$item_new[$i]['name_'.$lang]?></a></h3>
                        <p class="giaban"><?=_gia?> : <span><?=$func->giaban($item_new[$i]['price'])?></span></p>
                </li>
                <?php } ?>
            <?php } else { ?>
            <li style="text-align:center; color:#e91678; font-size:14px; text-transform:uppercase;"> <?=_chuacosanphamchomucnay?> . </li>
            <?php }?>
        </ul>
        <div class="xemthem"><a href="san-pham.html"><?=_xemthem?></a></div>
      </div>
    <div class="clear"></div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('.tags_nb li a').click(function(event) {
      /* Act on the event */
      var id = $(this).attr('href');
      $('.tags_nb li a').removeClass('active');
      $(this).addClass('active');
      $('#tab_sanpham .hidden_tab').slideUp(500);
      $(id).slideDown(500);
      return false;
    });
  });
</script>