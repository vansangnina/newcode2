<div id="ybc-nivo-slider-wrapper" class="theme-default ">
<div id="ybc-nivo-slider">
    <?php foreach ($this->slide_home() as $key => $value) {?>
    <a class="ybc-nivo-link" href="#" title="<?=$value['name_'.$lang]?>">
    <img data-caption-skin="default" data-slide-id="<?=$i?>" data-caption-animate="random" data-caption1="<?=$value['slogan_'.$lang]?>" data-caption2="<?=$value['name_'.$lang]?>" data-text-direction="left" data-caption-top="180px" data-caption-left="80px" data-caption-right="8%" data-caption-width="40%" data-caption-position="left" src="<?=_upload_hinhanh_l.$value['thumb_'.$lang]?>" alt="<?=$value['name_'.$lang]?>" title="<?=$value['name_'.$lang]?>" style="max-width: 100%; max-height: 100%;" /></a>
    <?php } ?>
</div>

  <div id="ybc-nivo-caption-text-hidden">
  	<?php foreach ($this->slide_home() as $key => $value) {?>
    <div class="ybc-nivo-description ybc-nivo-description-<?=$key?>">
        <p><?=$slide_home['description_'.$lang]?>.</p>
        <p class="ybc_button_slider"><a target="_blank" class="button btn ybc-nivo-button fa-arrow-circle-o-right btn-default" href="<?=$slide_home['link']?>"><?=_xemthem?></a></p>
    </div>
    <?php } ?>
    
</div>

<div id="ybc-nivo-slider-loader">
    <div class="ybc-nivo-slider-loader">
        <div id="ybc-nivo-slider-loader-img">
            <img src="Assets/js/nivo_caption/loading.gif" alt="" />
        </div>
    </div>
</div>


</div>