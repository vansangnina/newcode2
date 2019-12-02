<div id="info">
<div id="sanpham">
    <div class="khung">
    <div class="thanh_title"><h2><?=$this->model->title_detail?></h2> </div> 
    <h1 class="tieude"> <?=$this->model->row_detail['name_'.$lang]?></h1>
    <div class="noidung">
    <?=$this->model->row_detail['content_'.$lang]?>
    <?=\Library\Addthis::share();?> 
    <?=\Library\Facebook::comment();?>
	</div>
    <div style="clear:left;"></div><br /><br />
    <div class="thanh_title"><h2><?=_cactinkhac?></h2></div>
    <div class="tinkhac">
    <ul class="ul">
        <?php foreach($this->model->data as $key => $value){?>
            <li><a href="<?=$com?>/<?=$value['slug']?>.html" style="text-decoration:none;"> <i class="fa fa-caret-right" aria-hidden="true"></i> <span><?=$value['name_'.$lang]?></span></a></li>
        <?php }?>
    </ul>
    </div>
    </div>      
</div>
</div>
     