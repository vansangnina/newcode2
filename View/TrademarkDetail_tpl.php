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
    <div class="khung_sp">
    <div class="thanh_title">
    <p><a href="thuong-hieu/<?=$product[$j]['tenkhongdau']?>.html"><img src="<?=_upload_tieude_l.$row_detail['thumb']?>" alt="<?=$row_detail['ten_'.$lang]?>" /></a></p>
    <h2><?=$title_detail?></h2> </div> 
    <div class="row_sp">
    <?php if(count($product)!=0){?>
        <?php for($j=0,$count_sp=count($product);$j<$count_sp;$j++){?>
            <div class="khungs">
                <div class="item">
                    <div class="img"><a class="effect-v4" href="san-pham/<?=$product[$j]['tenkhongdau']?>.html"><img src="<?=_upload_product_l.'278x278x1/'.$product[$j]['photo']?>" alt="<?=$product[$j]['ten_'.$lang]?>" /></a></div>
                    <h3><a href="san-pham/<?=$product[$j]['tenkhongdau']?>.html"><?=catchuoi($product[$j]['ten_'.$lang],150)?></a></h3>
                    <?php if($product[$j]['giacu']!=0){?>
                    <p class="giacu"><span><?=giaban($product[$j]['giacu'])?></span></p>
                    <?php } ?>
                    <?php if($product[$j]['giaban']!=0){?>
                    <p class="giaban"><span><?=giaban($product[$j]['giaban'])?></span></p>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
    <div style="text-align:center; color:#e91678; font-size:14px; text-transform:uppercase;"> Chưa có sản phẩm cho mục này . </div>
    <?php }?>
</div>
<div class="clear"></div>
<div class="paging"><?=$paging?></div> 

</div>
</div>
</div>
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>


<div style='display:none'>
<div id='inline_content'></div>
</div>