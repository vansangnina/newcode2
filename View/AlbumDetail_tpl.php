<link rel="stylesheet" type="text/css" href="js/masory/css/default.css" />
<link rel="stylesheet" type="text/css" href="js/masory/css/component.css" />
<script src="js/masory/js/modernizr.custom.js"></script>
<link rel="stylesheet" href="js/photobox/photobox/photobox.css">
<script src='js/photobox/photobox/jquery.photobox.js'></script>
<script type="text/javascript">
$(document).ready(function($) {
    !(function(){
        $('#grid').photobox('a', { thumbs:true, loop:false });
    })();
});
</script>

<div id="info">
    <div id="sanpham">
        <div class="khung">
        <div class="thanh_title"><h2><?=$row_detail['name_'.$lang]?></h2> </div>
        <div class="noidung">
            <?=$row_detail['content_'.$lang]?>
        </div>
            <div class="khung" style="padding:20px 0px 0px 0px">
  
    		   <div id="gallery-wrap">
                    <ul class="grid effect-1" id="grid">
                        <?php for($i=0,$count_ab=count($item_photos);$i<$count_ab;$i++){?>
                            <li class="loaded">
                                <div class="rel">
                                    <a rel="prettyPhoto[gallery<?=$i+1?>]" title="<?=$album_detail[0]['name_'.$lang]?>" href="<?=_upload_album_l.$item_photos[$i]['photo']?>">
                                        <img src="<?=_upload_album_l.'294x400x3/'.$item_photos[$i]['photo']?>" alt="<?=$album_detail[0]['name_'.$lang]?>">
                                    </a>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/masory/js/masonry.pkgd.min.js"></script>
<script src="js/masory/js/imagesloaded.js"></script>
<script src="js/masory/js/classie.js"></script>
<script src="js/masory/js/AnimOnScroll.js"></script>
<script>
    new AnimOnScroll( document.getElementById( 'grid' ), {
        minDuration : 0.3,
        maxDuration : 0.7,
        viewportFactor : 0.2
    } );
</script>
        

