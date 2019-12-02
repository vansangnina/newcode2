<div id="info">
<div id="sanpham">
<div class="thanh_title"><h2><?=$this->model->title_detail?></h2> </div> 
    <div class="khung">
        <h1 class="tieude"> <?=$this->model->row_detail['name_'.$lang]?></h1>
        <p class="ngaydang"><?=_ngaydang?> : <?=date('l, F d, Y', strtotime($this->model->row_detail['datecreate']));?></p>
        <p><strong><?=$this->model->row_detail['discription_'.$lang]?></strong></p>
        <br /><br />
        <div class="noidung">
        <div style="clear:left;"></div>
        <?=$this->model->row_detail['content_'.$lang]?>
        <div style="clear:left;"></div>
        <br /><br />
        <?=\Library\Addthis::share();?> 
        <?=\Library\Facebook::comment();?>
		</div>
    <div style="clear:left;"></div><br /><br />
    <div class="thanh_title"><h2><?=_cactinkhac?></h2></div>
    <div class="tinkhac">
        <ul class="ul">
        <?php foreach($this->model->data as $tinkhac){?>
        <li><a href="<?=$com?>/<?=$tinkhac['slug']?>.html" style="text-decoration:none;"> <i class="fa fa-caret-right" aria-hidden="true"></i> <span><?=$tinkhac['name_'.$lang]?></span></a></li>
        <?php }?>
        </ul>
    </div>
    </div>      
</div>
</div>   