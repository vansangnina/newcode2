<div id="info">
      <div class="thanh_title"><h2><?=$this->model->title_detail?></h2> </div> 
      <div class="khung">       
      <div class="row">
      <?php for($i=0, $count=count($this->model->data);$i<$count;$i++){  ?> 
        <div class="box_new">
            <a href="<?=$com?>/<?=$this->model->data[$i]['slug']?>.html" ><img src="<?=_upload_post_l.'410x250x1/'.$this->model->data[$i]['photo']?>"  alt="<?=$this->model->data[$i]['name_'.$lang]?>"  /></a>
            <h3><a href="<?=$com?>/<?=$this->model->data[$i]['slug']?>.html" ><?=$this->model->data[$i]['name_'.$lang]?></a></h3>
            <span class="ngaydang"><i class="fa fa-clock-o" aria-hidden="true"></i><?=_ngaydang?> : <?=date('l, F d, Y', strtotime($this->model->data[$i]['datecreate']));?></span><br />
            <?=$func->catchuoi($this->model->data[$i]['description_'.$lang],225)?>
        </div>
       <?php }?>
       </div>
       <div class="clear"></div>
       <div align="center" ><div class="paging"><?=$paging?></div></div>
      </div>
</div> 