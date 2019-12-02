<script language="javascript">
	function clear_cart(){
		if(confirm('<?=_banmuonxoatatcasanpham?> ?')){
			document.form1.command.value='clear';
			document.form1.submit();
		}
	}
	function update_cart(){
		document.form1.command.value='update';
		document.form1.submit();
	}
</script>
<script language="javascript">
	function xoa(pid){
		if(confirm('<?=_xoasanphamnay?> ! ')){
			document.form_giohang.pid.value=pid;
			document.form_giohang.command.value='delete';
			document.form_giohang.submit();
		}
	}
</script>
<form name="form_giohang" action="index.php?com=thanh-toan" method="get">
	<input type="hidden" name="com" value="thanh-toan" />
	<input type="hidden" name="pid" />
    <input type="hidden" name="command" />
</form>

<?php
if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
		remove_pro_thanh($_REQUEST['pid']);
	}
	else if($_REQUEST['command']=='clear'){
		unset($_SESSION['cart']);
	}
?>
<script>
$(document).ready(function(e) {

	$(document).ready(function(){
      $('#submit_thanhtoan').click(function(e){ 

          var ten = '<?=$_POST['ten']?>';
          var dienthoai = '<?=$_POST['dienthoai']?>';
          var diachi = '<?=$_POST['diachi']?>';
          var email = '<?=$_POST['email']?>';
          var noidung = '<?=$_POST['noidung']?>';
          var phuongthuc = $('input[name=phuongthuc]:checked').val();
          var shipping = $('input[name=shipping]:checked').val();

          if(ten==''){
	          	alert('<?=_banchuanhapten?> . ');
	          	$('#ten').focus();
	          	return false;
          } else if(dienthoai==''){
	          	alert('<?=_banchuanhapdienthoai?> . ');
	          	$('#dienthoai').focus();
	          	return false;
          } else if(diachi==''){
	          	alert('<?=_banchuanhapdiachi?> . ');
	          	$('#diachi').focus();
	          	return false;
          } else if(email==''){
	          	alert('<?=_banchuanhapemail?> . ');
	          	$('#email').focus();
	          	return false;
          } else if(!phuongthuc){
	          	alert('<?=_banchuachonphuongthucthanhtoan?> . ');
	          	return false;
          } else {
          		$.ajax({
		            type:'POST',
		            url:'Ajax/Payment.php',
		            data:{phuongthuc:phuongthuc,ten:ten,dienthoai:dienthoai,diachi:diachi,email:email,noidung:noidung,shipping:shipping},
		            success: function(result) {
		            	var getData = $.parseJSON(result);
		            	if(getData.result==1){
		            		alert("<?=_chucmungbandadathangthanhcong?> .");
		            		window.location.href="dat-hang-thanh-cong/"+getData.madonhang+".html";
		            	} else{
		            		alert("<?=_hethongbiloivuilongthuchienlaitrongvaigiay?> .");
		            	} 
		                
		            }
	          	});
          }

        });
    });

    $('input[name="shipping"]').click(function(event) {
		/* Act on the event */
		var id = $('input[name=shipping]:checked').val();
		var act = 'shipping';
		$.ajax({
	            type:'POST',
	            url:'Ajax/Cart.php',
	            data:{act:act,id:id},
	            success: function(result) {
	            	$('.capnhat_full').html(result);
	            }
        });
	});

    $('input[name="phuongthuc"]').change(function(event) {
    	/* Act on the event */
    	var swap = $(this).parents('li');
    	$('.phuongthuc li strong').slideUp();
    	swap.find('strong').slideDown();
    });

});
</script>
<div id="info">
<div id="sanpham">
       
        <div class="thanh_title"><h2><?=_xacnhanthanhtoan?></h2> </div>
     	<form method="post" name="frm_order" action="http://<?=$config_url?>/noidia_php/do.php" enctype="multipart/form-data"  id="frm_order"> </form>
        <div class="row">
        <div class="col-md-6 col-sm-6 col-xx-12 col-xs-12">
        <table border="0" cellpadding="5px" cellspacing="1px" width="100%" class="giohang_tk">

	           <tr class="menu_giohang" >
		           <td class="res_cart"><?=_stt?></td>
		           <td><?=_sanpham?></td>
		           <td><?=_soluong?></td>
		           <td class="res_cart"><?=_tonggia?></td>
	           </tr>

	    		<?php 
				if(is_array($_SESSION['cart'])){
					$max=count($_SESSION['cart']);
					for($i=0;$i<$max;$i++){
						$pid=$_SESSION['cart'][$i]['productid'];
						$q=$_SESSION['cart'][$i]['qty'];
						$size=$_SESSION['cart'][$i]['size'];
						$mausac=$_SESSION['cart'][$i]['mausac'];
						$pname=$cart->get_product_info($pid);
						if($q==0) continue;
				?>
	    		<tr class="form_giohang">
	        		<td width="5%" class="res_cart"><?=$i+1?></td>
	                <td width="30%" class="tt_cart"><a href="san-pham/<?=$pro_info['slug']?>.html">
	                    <img src="<?=_upload_product_l.'80x80x1/'.$pro_info['thumb']?>" alt="<?=$pro_info['name_'.$lang]?>" class='img' />
	                    <h3><?=$pro_info['name_'.$lang]?> </h3>
	                    <?php if($size || $mausac) {?>
	                    <p class="tt_cart2"><?php if($size) {?><?=_size?> : <span><?=getsize($size)?></span><?php } ?> <?php if($mausac) {?>- <?=_mau?> : <?=getmausac($mausac)?> <?php } ?></p>
	                    <?php } ?>
						<span><?=_gia?> : <?=number_format($cart->get_price($pid),0, ',', '.')?>&nbsp;đ</span>
	                </a></td>
	                <td width="8%"><?=$q?></td>                    
	                <td width="10%" class="res_cart capnhat_price_<?=$pid?>"><?=number_format($cart->get_price($pid)*$q,0, ',', '.')?>&nbsp;đ</td>
	    		</tr>
	            <?php } ?>
					
	            <tr class="tonggia">
	            	<td colspan="5" ><?=_tonggia?> : <b class="capnhat_full"><?=number_format($cart->get_order_total(),0, ',', '.')?>&nbsp;đ</b></td>
	            </tr>
				<?php }	else{ echo "<tr bgColor='#FFFFFF'><td colspan='5'>"._bankhongcosanphamnaotronggiohang."</td>"; } ?>
	        
	        </table>
		</div>
		<div class="col-md-6 col-sm-6 col-xx-12 col-xs-12">
        <div class="xacnhan">
        <div class="khungxn">
        		<h4><?=_xacnhanthongtingiaohang?></h4>
        		<p><label><b><?=_hoten?> :</b> <?=$_POST['ten']?></label></p>
        		<p><label><b><?=_diachi?> : </b><?=$_POST['diachi']?></label></p>
        		<p><label><b><?=_dienthoai?> :</b> <?=$_POST['dienthoai']?></label></p>
        		<p><label><b>Email : </b><?=$_POST['email']?></label></p>
        		<p><label><b><?=_noidung?> : </b><?=$_POST['noidung']?></label></p>
        </div>

		<div class="phuongthuc">
		<h4><?=_phuongthucthanhtoan?> </h4>
		<ul class="ul">
		<?php for($i=0;$i<count($this->model->phuongthuc_tt);$i++){ ?>
        <li><label>
        <p><input type="radio" name="phuongthuc" value="<?=$this->model->phuongthuc_tt[$i]['id']?>" /> <b><?=$this->model->phuongthuc_tt[$i]['name_'.$lang]?> . </b> </p>
        <strong><?=$this->model->phuongthuc_tt[$i]['description_'.$lang]?> </strong></label></li>
        <?php } ?>
        </ul>

		</div>

		<div class="shiping">
		<h4>Shipping</h4>
        	<ul class="ul">
        	<?php for($i=0;$i<count($this->model->shipping);$i++){ 
        		$thongtin = json_decode($this->model->shipping[$i]['attributes'],true);
        	?>
			<li><input type="radio" data-gia="<?=$this->model->shipping[$i]['phiship']?>" name="shipping" value="<?=$this->model->shipping[$i]['id']?>" id="id_<?=$this->model->shipping[$i]['id']?>" /><label for='id_<?=$this->model->shipping[$i]['id']?>'><?=$this->model->shipping[$i]['name_'.$lang]?> ( Phí : <?=$thongtin['phiship']?>) </label></li>
        	<?php } ?>
        	</ul>
        </div> 

        </div>
        </div>
    
    <div style=" float:right; padding-bottom:20px; padding-top:20px;" align="right">
        <input  id="submit_thanhtoan" title='<?=_thanhtoan?>' alt='<?=_thanhtoan?>' align="right" type="button" name="next" value="<?=_thanhtoan?>" style="cursor:pointer;" style="padding:2px;" class="g_muatiep"/>
    </div>
    
</form>
                
    </div>
    </div>
</div>