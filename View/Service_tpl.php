<div id="info">
      <div class="thanh_title"><h2><?=$this->model->title_detail?></h2> </div> 
      <div class="khung">      
      <div>
      <?php foreach ($this->model->data as $key => $value) {  ?> 
        <div class="box_new">
            <a class="effect-v5" href="<?=$com?>/<?=$value['slug']?>.html" ><img src="<?=_upload_post_l.'410x250x1/'.$value['photo']?>"  alt="<?=$value['name_'.$lang]?>"/></a>
            <h3><a href="<?=$com?>/<?=$value['slug']?>.html" ><?=$value['name_'.$lang]?></a></h3>
            <?=$func->catchuoi($value['description_'.$lang],225)?>
            <div class="xemtiep"><a href="<?=$com?>/<?=$value['slug']?>.html" ><?=_xemtiep?></a></div>
        </div>
       <?php }?>
       </div>
       <div align="center" ><div class="paging"><?=$paging?></div></div>
      </div>
</div> 