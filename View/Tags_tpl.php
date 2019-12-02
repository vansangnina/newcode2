<script language="javascript">
  function addtocart(pid){
    document.form_giohang.productid.value=pid;
    document.form_giohang.command.value='add';
    document.form_giohang.submit();
  }
</script>
<form name="form_giohang" action="index.php" method="post">
  <input type="hidden" name="productid" />
  <input type="hidden" name="command" />
</form>
<div id="info">
    <div id="sanpham">
    <div class="khung_in">
    <div class="thanh_title"><h2>Tags : " <?=$title_detail?> " </h2> </div>
     <ul class="khung_sp">
        <?php if(count($product)!=0){?>
        <?php for($j=0,$count_sp=count($product);$j<$count_sp;$j++){?>
            <li class="item">
          <div class="item_pro">
                <div class="img"><a class="effect-v3" href="<?=$com?>/<?=$product[$i]['tenkhongdau']?>.html"><img src="<?=_upload_product_l.'268x210x1/'.$product[$i]['photo']?>" alt="<?=$product[$i]['ten_'.$lang]?>" /></a></div>
                <div class="hot_info">
                <h3><a href="<?=$com?>/<?=$product[$i]['tenkhongdau']?>.html"><?=$product[$i]['ten_'.$lang]?></a></h3>
                <p><span class="giacu"><?=giaban($product[$i]['giaban'])?></span><span class="giaban"><?=giaban($product[$i]['giaban'])?></span></p>
              </div>
          </div>   
        </li>
        <?php } ?>
        <?php } else { ?>
    <li style="text-align:center; color:#e91678; font-size:14px; text-transform:uppercase;"> Chưa có sản phẩm cho mục này . </li>
    <?php }?>
</ul>
<div class="clear"></div>
<div class="paging"><?=$paging?></div> 

</div>
</div>
</div>
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>


<div style='display:none'>
<div id='inline_content'></div>
</div>