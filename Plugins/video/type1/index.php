<?php
  $video  =  $db->query("select * from #_video where shows=1 and type='video' order by number,id desc");
  $chuoi=explode("=",$video[0]['link']);
?>
<div class="thanh_bt"><h4>Video Clip</h4></div>
<div id="video">	
		<div style="padding-bottom: 66.67%;position:relative;width:100%;height: 0;" id="box_video" data-id="<?=$chuoi[1]?>" data-width="300" data-height="200" data-auto=""><iframe width="300" height="200" style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;" src="https://www.youtube.com/embed/<?=$chuoi[1]?>?rel=0" frameborder="0" allowfullscreen=""></iframe></div>
		<div class="select_video owl_carousel_video none_control">
		<?php for ($i=0,$count=count($video); $i < $count; $i++) {
				$chuoi=explode("=",$video[$i]['link']);
		?>
		    <div class="video_thumb" data-id="<?=$chuoi[1]?>"><img src="http://img.youtube.com/vi/<?=$chuoi[1]?>/default.jpg" border="0" align="left"></div>
		<?php } ?>
		</div>
</div>
<script>
    $(function() {
        var o = $("#box_video").data("id"),
            d = $("#box_video").data("width"),
            a = $("#box_video").data("height");
        $("#box_video").load("ajax/load_video.php?id=" + o + "&width=" + d + "&height=" + a);
			$(".video_thumb").click(function() {
            var i = $(this).data("id");
            $("#box_video").load("ajax/load_video.php?id=" + i);
        });
    });
    $(document).ready(function(e) {
        $('.owl_carousel_video').owlCarousel({
                loop:true,
                margin:10,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:3,
                        nav:true
                    },
                    600:{
                        items:3,
                        nav:true
                    },
                    1000:{
                        items:3,
                        nav:true,
                    }
                }
        })
    });

</script>