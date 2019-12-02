<?php
	$camnhan = $db->query("select photo,slug,description_$lang,name_$lang,content_$lang from #_post where shows=1 and type='dichvu' order by number,id desc");
?>
<div class="camnhan_tk">
	<h4><?=_nhanxetkhachhang?></h4>
	<ul class="owl_camnhan">
		<?php for($j=0,$count_ch=count($camnhan);$j<$count_ch;$j++){ ?>
			<li>
				<p>Cảm nhận của <?=$camnhan[$j]['name_'.$lang]?> sau khi sử dụng dịch vụ của Nine One One</p>
				<div class="noidung"><?=catchuoi($camnhan[$j]['content_'.$lang],450)?></div>
				<div class="thongtin_kh">
					<div class="tt">
						<p><?=$camnhan[$j]['name_'.$lang]?></p>
						<p><?=$camnhan[$j]['description_'.$lang]?></p>
					</div>
					<div class="img">
						<img src="<?=_upload_post_l.'110x110x1/'.$camnhan[$j]['photo']?>" alt="<?=$camnhan[$j]['slug']?>" />
					</div>
				</div>
			</li>
		<?php } ?>
	</ul>
</div>
<script type="text/javascript">
	$('.owl_camnhan').owlCarousel({
		loop:false,
		margin:0,
		responsiveClass:true,
		autoplay:false,
		autoplayTimeout:4000,
		autoplayHoverPause:true,
		nav: false,
		navText: ["<img src='images/left.png'>","<img src='images/right.png'>"],
		dots: false,
		items:1,
	});
</script>