<div class="toolbar">
	<ul class="ul">
		<li>
			<a href="javascript:callme('tel:<?=$row_setting['hotline']?>')" title="title">
				<img src="Assets/images/icon/icon-t1.png" alt="call"><br>
				<span><?=_goidien?></span>
			</a>
		</li>
		<li>
			<a href="javascript:callme('sms:<?=$row_setting['hotline']?>')" title="title">
				<img src="Assets/images/icon/icon-t2.png" alt="massenge"><br>
				<span><?=_nhantin?></span>
			</a>
		</li>
		<li>
			<a href="javascript:callme('https://zalo.me/<?=$row_setting['zalo']?>')" title="title">
				<img src="Assets/images/icon/icon-t3.png" alt="Zalo"><br>
				<span>Chat zalo</span>
			</a>
		</li>
		<li>
			<a href="javascript:callme('<?=$row_setting['facebook']?>')" title="title">
				<img src="Assets/images/icon/icon-t4.png" alt="facebook chat"><br>
				<span>Chat facebook</span>
			</a>
		</li>
	</ul>
</div>

<script>
$(document).ready(function() {
    var lastScrollTop = 0;
    $(window).scroll(function(event){
       var st = $(this).scrollTop();
       if (st > lastScrollTop){
           $('.toolbar li span').slideDown(500);
       } else {
          $('.toolbar li span').slideUp(500);
       }
       lastScrollTop = st;
    });
}); 
function callme(url){window.location=url;}
</script>