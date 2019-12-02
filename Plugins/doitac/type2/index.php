<?php
    $doitac = $db->query("select * from #_photo where shows=1 and type='doitac' order by number,id desc");
?>
<div class="doitac_tk">
	<h4><?=_doitac?></h4>
	<ul class="owl_doitac">
	    <?php foreach ($doitac as $key => $dt) { ?>
	    <?php if($key==0||$key%3==0){ ?><li><?php } ?>
			<a href="<?=$dt['link'];?>" target="_blank">
				<img src="<?=_upload_hinhanh_l.'158x94x2/'.$dt['photo_'.$lang]?>" alt="<?=$dt['name_'.$lang]?>" />
	        </a>
		<?php if(($key+1)%3==0||($key+1)>=count($doitac)){ ?></li><?php }} ?>
	</ul>
</div>
<script type="text/javascript">
	$('.owl_doitac').owlCarousel({
	    loop:true,
	    margin:20,
	    responsiveClass:true,
	    autoplay:true,
	    autoplayTimeout:4000,
	    autoplayHoverPause:true,
	    nav: false,
	    navText: ["<img src='images/left.png'>","<img src='images/right.png'>"],
	    dots: false,
	    responsive:{
	        0:{
	            items:2
	        },
	        600:{
	            items:2
	        },
	        1000:{
	            items:3
	        }
	      }
    });
</script>
