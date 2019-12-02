<script language="javascript">

	$(document).ready(function() {
		$('.capnhat_sl').keyup(function(event) {
			/* Act on the event */
			var wap = $(this).parents('tr');
			var soluong = $(this).val();
			var pid = wap.data('id');
			var size = wap.data('size');
			var mausac = wap.data('mausac');
			var act = 'capnhat';
			$.ajax({
		            type:'POST',
		            url:'ajax/Cart.php',
		            data:{soluong:soluong,pid:pid,size:size,mausac:mausac,act:act},
		            success: function(result) {
		            	var getData = $.parseJSON(result);
		            	wap.find('.capnhat_price').html(getData.price_item);
		            	$('.capnhat_full').html(getData.full_item);
		            }
	        });
		});

		$('.xoa_cart').click(function(event) {
			/* Act on the event */
			if(confirm('<?=_bancomuonxoasanphamnay?> ! ')){
				var wap = $(this).parents('tr');
				var soluong = $(this).val();
				var pid = wap.data('id');
				var size = wap.data('size');
				var mausac = wap.data('mausac');
				var act = 'delete';
				$.ajax({
			            type:'POST',
			            url:'ajax/Cart.php',
			            data:{soluong:soluong,pid:pid,size:size,mausac:mausac,act:act},
			            success: function(result) {
			            	wap.slideUp(500);
			            	$('.capnhat_full').html(result);
			            }
		        });
			}
		});

		$('.delete_all').click(function(event) {
			/* Act on the event */
			if(confirm('<?=_banmuonxoatatcasanpham?> ! ')){
				var act = 'deleteall';
				$.ajax({
			            type:'POST',
			            url:'ajax/Cart.php',
			            data:{act:act},
			            success: function(result) {
			            	window.location.href=""; 
			            }
		        });
			}
		});

	});

</script>
<div id="info">
        <div id="sanpham">
          <div class="thanh_title"><h2><?=_giohang?></h2> </div> 
            <div class="khung">
                
            <form name="form1" method="post">
		    <input type="hidden" name="pid" />
			<input type="hidden" name="command" />
	  		<table border="0" cellpadding="5px" cellspacing="1px" width="100%" class="giohang_tk">
	           <tr class="menu_giohang" >
		           <td class="res_cart"><?=_stt?></td>
		           <td><?=_sanpham?></td>
		           <td><?=_soluong?></td>
		           <td class="res_cart"><?=_tonggia?></td>
		           <td><?=_xoa?></td>
	           </tr>
	    		<?php 
				if(is_array($_SESSION['cart'])){
					$max=count($_SESSION['cart']);
					for($i=0;$i<$max;$i++){
						$pid=$_SESSION['cart'][$i]['productid'];
						$q=$_SESSION['cart'][$i]['qty'];
						$size=$_SESSION['cart'][$i]['size'];
						$mausac=$_SESSION['cart'][$i]['mausac'];
						$pro_info = $cart->get_product_info($pid);
						if($q==0) continue;
				?>
	    		<tr class="form_giohang" data-id="<?=$pid?>" data-size="<?=$size?>" data-mausac="<?=$mausac?>" >
	        		<td width="5%" class="res_cart"><?=$i+1?></td>
	                <td width="30%" class="tt_cart"><a href="san-pham/<?=$pro_info['slug']?>.html">
	                    <img src="<?=_upload_product_l.'80x80x1/'.$pro_info['thumb']?>" alt="<?=$pro_info['name_'.$lang]?>" class='img' />
	                    <h3><?=$pro_info['name_'.$lang]?></h3>
	                    <?php if($size || $mausac) {?>
	                    <p class="tt_cart2"><?php if($size) {?><?=_size?> : <span><?=$cart->getsize($size)?></span><?php } ?> <?php if($mausac) {?>- <?=_mau?> : <?=$cart->getmausac($mausac)?> <?php } ?></p>
	                    <?php } ?>
						<span><?=_gia?> : <?=number_format($cart->get_price($pid),0, ',', '.')?>&nbsp;đ</span>
	                </a></td>
	                <td width="8%"><input name="soluong" value="<?=$q?>" class="capnhat_sl" /></td>                    
	                <td width="10%" class="res_cart capnhat_price"><?=number_format($cart->get_price($pid)*$q,0, ',', '.')?>&nbsp;đ</td>
	                <td width="10%"><img src="Assets/images/icon/disabled.png" class="xoa_cart" border="0" /></td>
	    		</tr>
	            <?php } ?>
					
	            <tr class="tonggia">
	            	<td colspan="5" ><?=_tonggia?> : <b class="capnhat_full"><?=number_format($cart->get_order_total(),0, ',', '.')?>&nbsp;đ</b></td>
	            </tr>
				<?php }	else{ echo "<tr bgColor='#FFFFFF'><td colspan='5'>"._bankhongcosanphamnaotronggiohang."</td>"; } ?>
	        
	        </table>

            <input type="button" value="<?=_muatiep?>" onclick="window.location='trang-chu.html'" class="g_muatiep">
            <input type="button" value="<?=_xoatatca?>" class="g_muatiep delete_all">
            <input type="button" value="<?=_thanhtoan?>" onclick="window.location='thanh-toan.html'" class="g_muatiep">
   
  </form>
               
          </div>
        </div>
      </div>