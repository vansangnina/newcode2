<div class="face_right">
	<div class="img_face"><a href="#"><img src="images/icon/facebook.png" alt="facebook" /></a></div>
	<div class="rowf_right">
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=629584947171673";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<div class="fb-page" data-href="<?=$row_setting['facebook']?>" data-tabs="timeline" data-width="300" data-height="250" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
		</div>
</div>
<script type="text/javascript">
	$(document).ready(function($) {
		$('.img_face a').click(function(event) {
			/* Act on the event */
			if($('.face_right').hasClass('active')){
				$('.face_right').removeClass('active');
			} else {
				$('.face_right').addClass('active');
			}
			return false;
		});	
	});
</script>
