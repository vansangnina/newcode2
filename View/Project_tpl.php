<div id="info">
    <div id="sanpham">
    <div class="khung_sp">
    <div class="thanh_title"><h2><?=$title_detail?></h2> </div> 
    <ul class="khung_sp">
        <?php if(count($tintuc)!=0){?>
        <?php for($i=0,$count_sp=count($tintuc);$i<$count_sp;$i++){?>
        <li class="item">
          <div class="item_pro">
                <div class="img"><a class="effect-v3" href="<?=$com?>/<?=$tintuc[$i]['tenkhongdau']?>.html"><img src="<?=_upload_baiviet_l.'268x210x1/'.$tintuc[$i]['photo']?>" alt="<?=$tintuc[$i]['ten_'.$lang]?>" /></a></div>
                <div class="hot_info">
                <h3><a href="<?=$com?>/<?=$tintuc[$i]['tenkhongdau']?>.html"><?=$tintuc[$i]['ten_'.$lang]?></a></h3>
              </div>
          </div>   
        </li>
        <?php } ?>
        <?php } else { ?>
    <li style="text-align:center; color:#e91678; font-size:14px; text-transform:uppercase;"> Chưa có dự án cho mục này . </li>
    <?php }?>
</ul>
<div class="clear"></div>
<div class="paging"><?=$paging?></div> 
</div>
</div>
</div>
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>