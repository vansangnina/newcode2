<?php
    $gioithieu = $db->row("select * from #_info where type='trangchu'");
    $ha_gioithieu = $db->query("select photo_vi from #_photo where hienthi=1 and type='hinhanh_gt' order by stt,id desc");
?>
<div class="gioithieu">
	   <div class="noidung_gt">
        <div class="thanh_title"><h4><?=_gioithieu?></h4></div>
        <div class="thanh_gt"><h2><?=$gioithieu['name_'.$lang]?></h2></div>
        <?=$gioithieu['content_'.$lang]?>
     </div>
     <div class="xemthem_gt"><a href="gioi-thieu.html">Xem thêm</a></div>
</div>
<div class="hinhanh_gt hide_control">
    <div class="ha_gioithieu ">
    <?php for($i=0;$i<count($ha_gioithieu);$i++){?>
        <a href="dich-vu/<?=$ha_gioithieu[$i]['slug']?>.html"><img src="<?=_upload_hinhanh_l.'273x220x1/'.$ha_gioithieu[$i]['photo_vi']?>" alt="<?=$ha_gioithieu[$i]['name_'.$lang]?>" /></a>
        <?php if(($i+1)%2==0 && ($i+1)!=count($ha_gioithieu)){ echo '</div><div class="ha_gioithieu">';}?>
    <?php } ?>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(e) {
        $('.hinhanh_gt').owlCarousel({
                loop:true,
                margin:20,
                responsiveClass:true,
                autoplay:true,
                smartSpeed:2000,
                autoplayTimeout:3000,
                autoplayHoverPause:true,
                responsive:{
                    0:{
                        items:2,
                        nav:true
                    },
                    600:{
                        items:2,
                        nav:true
                    },
                    1000:{
                        items:2,
                        nav:true,
                    }
                }
        })
    });
</script>