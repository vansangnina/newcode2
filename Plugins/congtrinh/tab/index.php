<?php
  $product_list = $db->query("select * from #_product_list where shows=1 and type='product' order by number,id desc");
  $product = $db->query("select name_$lang,slug,id,thumb,description_$lang,photo from #_product where hienthi=1  and type='product' order by number,id desc limit 0,15 ");
  $ndcongtrinh = $db->row("select content_$lang from #_info where type='ndcongtrinh' limit 0,1");
?>
<div id="congtrinh">
<div class="khung">
    <div class="thanh_title"><h2><?=_congtrinhdathuchien?></h2></div>
    <div class="noidungct"><?=$ndcongtrinh['content_'.$lang]?></div>
    <div class="tags_ct">
        <ul>
          <li class="active"><a href="#"><?=_tatca?></a></li>
        <?php for($i=0,$count_sp=count($product_list);$i<$count_sp;$i++){?>
          <li><a href="cong-trinh/<?=$product_list[$i]['slug']?>.html" data-id="<?=$product_list[$i]['id']?>"><?=$product_list[$i]['name_'.$lang]?></a></li>
        <?php } ?>
        </ul>
    </div>
    <div class="load_congtrinh">
    <ul class="khung_ct">
        <?php for($i=0,$count_sp=count($product);$i<$count_sp;$i++){?>
        <li class="item_ct">
                <div class="img"><a class="effect-v5" href="cong-trinh/<?=$product[$i]['slug']?>.html"><img src="<?=_upload_product_l.'234x234x1/'.$product[$i]['photo']?>" alt="<?=$product[$i]['name_'.$lang]?>" /></a></div>
                <div class="description_ct"><a href="cong-trinh/<?=$product[$i]['slug']?>.html">
                <h3><?=$product[$i]['name_'.$lang]?></h3>
                <p><?=$product[$i]['description_'.$lang]?></p>
                </a>
              </div>
        </li>
        <?php } ?>
    </ul>
    <?php if(count($product)>=15){?>
    <div class="xemtatca"><a href="cong-trinh.html"><?=_xemtatcaduan?></a></div>
    <?php } ?>
    </div>
  <div class="clear"></div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    
    $('.item_ct').slideDown(500);
    $('.tags_ct ul li a').click(function(event) {
      var wrap = $(this);
      /* Act on the event */
      $('.tags_ct ul li').removeClass('active');
      wrap.parent().addClass('active');
      
      $('.item_ct').slideUp(500);
      setTimeout(function(){
         var id = wrap.data('id');
          $.ajax({
            type:'POST',
            url:'ajax/congtrinh.php',
            data:{id:id},
            success: function(result) {
              $('.load_congtrinh').html(result);
              $('.item_ct').slideDown(500);
            }
          });
        },500);
      return false;
    });
  });
</script>
