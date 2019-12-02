<div id="info">
    <div id="sanpham">
        <div class="thanh_title"><h2><?=$this->model->title_detail?></h2> </div> 
        <div class="clear"></div>
        <ul class="khung_sp ul">
        		<?php if(count($this->model->data)!=0){?>
                <?php foreach ($this->model->data as $key => $value) {?>
                     <li class="item">
                        <a class="effect-v3 img" href="<?=$this->model->com?>/<?=$value['slug']?>.html"><img src="<?=_upload_product_l.'259x230x1/'.$value['photo']?>" alt="<?=$value['ten_'.$lang]?>" /></a>
                        <h3><a href="<?=$this->model->com?>/<?=$value['slug']?>.html"><?=$value['name_'.$lang]?></a></h3>
                        <p class="giaban"><?=_gia?> : <span><?=$func->giaban($value['price'])?></span></p>
                </li>
                <?php } ?>
        		<?php } else { ?>
            <li style="text-align:center; color:#e91678; font-size:14px; text-transform:uppercase;"> <?=_chuacosanphamchomucnay?> . </li>
            <?php }?>
        </ul>
    <div class="clear"></div>
    <div class="paging"><?=$this->model->paging?></div> 

</div>
</div>
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>