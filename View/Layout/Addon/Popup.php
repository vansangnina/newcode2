<?php 
    $popup  =  $db->row("select thumb_$lang,link,shows from #_photo where type='popup'");
?>
<?php if($popup['shows']==1){?>
<script type="text/javascript">
	$(document).ready(function () {
		setTimeout(function(){
			$("#popub").fadeIn();
			$heightP=$(".popub").height();
			$heightW=$(window).height();
			console.log($heightW);
			console.log($heightP);
			if($heightW>$heightP){
				if($heightW-$heightP>120){
					$(".popub").css({"height":$heightP,"top":($heightW-$heightP)/2});
				}else{
					$(".popub").css({"height":$heightW-120,"top":"60px"});
				}
			}else{
				$(".popub").css({"height":$heightW-120,"top":"60px"});
			}
		},500)
		$("#popub .close_popup").click(function(){
			$("#popub").remove();
		})
		
	})
</script>

<a href="#popub" class="fancybox"></a>
<div id="popub">
	<div class="popub">
		<div class="close_popup"></div>
		<a href="<?=$popup['link']?>" >
			<img src="<?=_upload_hinhanh_l.$popup['thumb_'.$lang]?>" alt="<?=$popup['thumb_'.$lang]?>" class="img-responsive" />
		</a>
	</div>
</div>
<?php  } ?>