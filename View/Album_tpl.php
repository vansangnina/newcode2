<h1 class="visit_hidden"><?=$row_setting['name_'.$lang]?></h1></div>
<div id="info">
<div id="sanpham">
 <div class="thanh_title"><h2><?=$title_detail?></h2> </div><div class="clear"></div>
    <div class="khung">
    <?php if(count($item)!=0){?>
         <?php for($i=0;$i<count($item);$i++){
            ?>
                <div class="album">
                        <a href="<?=$com?>/<?=$item[$i]['slug']?>.html" title="<?=$item[$i]['name_'.$lang]?>">
                            <img src="<?=_upload_album_l.$item[$i]['thumb']?>" alt="<?=$item[$i]['slug']?>">
                            <h3><?=$item[$i]['name_'.$lang]?></h3>
                        </a>
                </div>
        <?php }?>
    <?php } else { ?><div style="text-align:center; color:#FF0000; font-weight:900; font-size:22px; text-transform:uppercase;" >Chưa Có Tin Cho Mục này .</div> <?php }?>
    <div class="clear"></div>
    <div class="paging"><?=$paging?></div> 
  </div>
</div>