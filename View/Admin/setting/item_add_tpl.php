<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="admin/setting/capnhat"><span>Thiết lập hệ thống</span></a></li>
            <li class="current"><a href="#" onclick="return false;">Cấu hình website</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">		
	function TreeFilterChanged2(){		
				$('#validate').submit();		
	}
</script>
<form name="supplier" id="validate" class="form" action="admin/setting/save" method="post" enctype="multipart/form-data">
    <div class="widget">
		<div class="title chonngonngu">
			<ul>
			<?php foreach ($config['lang'] as $key => $value) {?>
				<li><a href="<?=$key?>" class="<?php if($config['activelang']==$key){ echo "active";}?> tipS" title="Chọn <?=$value?>"><img src="assets/admin/images/<?=$key?>.png" /><?=$value?></a></li>
			<?php } ?>
			</ul>
		</div>
		<?php foreach ($config['lang'] as $key => $value) {?>
		<div class="formRow w50 lang_hidden lang_<?=$key?> <?php if($config['activelang']==$key){ echo "active";}?>">
			<label>Tên Công Ty</label>
			<div class="formRight">
                <input type="text" name="shortname_<?=$key?>" title="Nhập tên công ty (<?=$value?>)" id="shortname_<?=$key?>" class="tipS validate[required]" value="<?=@$this->model->data['shortname_'.$key]?>" />
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
		<?php foreach ($config['lang'] as $key => $value) {?>
		<div class="formRow w50 lang_hidden lang_<?=$key?> <?php if($config['activelang']==$key){ echo "active";}?>">
			<label>Tên đầy đủ</label>
			<div class="formRight">
                <input type="text" name="name_<?=$key?>" title="Nhập tên công ty (<?=$value?>)" id="name_<?=$key?>" class="tipS validate[required]" value="<?=@$this->model->data['name_'.$key]?>" />
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
		<?php foreach ($config['lang'] as $key => $value) {?>
		<div class="formRow w50 lang_hidden lang_<?=$key?> <?php if($config['activelang']==$key){ echo "active";}?>">
			<label>Slogan</label>
			<div class="formRight">
                <input type="text" name="slogan_<?=$key?>" title="Nhập slogan (<?=$value?>)" id="slogan_<?=$key?>" class="tipS validate[required]" value="<?=@$this->model->data['slogan_'.$key]?>" />
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
		
		<div class="formRow w50">
			<label>Email</label>
			<div class="formRight">
				<input type="text" value="<?=@$this->model->data['email']?>" name="email" title="Nhập địa chỉ email" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>

		<div class="formRow w50">
			<label>Hotline</label>
			<div class="formRight">
				<input type="text" value="<?=@$this->model->data['hotline']?>" name="hotline" title="Nhập hotline" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
        
        <div class="formRow w50">
			<label>Điện thoại</label>
			<div class="formRight">
				<input type="text" value="<?=@$this->model->data['phone']?>" name="phone" title="Nhập số điện thoại" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>

		<div class="formRow w50">
			<label>Zalo</label>
			<div class="formRight">
				<input type="text" value="<?=@$this->model->data['zalo']?>" name="zalo" title="Nhập số zalo" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>

		<div class="formRow w50">
			<label>Tư vấn</label>
			<div class="formRight">
				<input type="text" value="<?=@$this->model->data['consult_phone']?>" name="consult_phone" title="Nhập số điện thoại" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
 
		<?php foreach ($config['lang'] as $key => $value) {?>
		<div class="formRow w50 lang_hidden lang_<?=$key?> <?php if($config['activelang']==$key){ echo "active";}?>">
			<label>Địa chỉ</label>
			<div class="formRight">
                <input type="text" name="address_<?=$key?>" title="Nhập địa chỉ (<?=$value?>)" id="address_<?=$key?>" class="tipS validate[required]" value="<?=@$this->model->data['address_'.$key]?>" />
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>

		<div class="formRow w50">
			<label>Website</label>
			<div class="formRight">
				<input type="text" value="<?=@$this->model->data['website']?>" name="website" title="Nhập địa chỉ website" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>	

		<div class="formRow w50">
			<label>Tọa độ bản đồ</label>
			<div class="formRight">
				<input type="text" value="<?=@$this->model->data['location_map']?>" name="location_map" title="Nhập tọa độ vị trí công ty" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>	

		<div class="formRow w50">
			<label>FanPage Facebook</label>
			<div class="formRight">
				<input type="text" value="<?=@$this->model->data['facebook']?>" name="facebook" title="Nhập link fanpage facebook" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>

		<div class="formRow w50">
			<label>Google Plus</label>
			<div class="formRight">
				<input type="text" value="<?=@$this->model->data['googleplus']?>" name="googleplus" title="Nhập link google plus" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>

		<div class="formRow w50">
			<label>Twitter</label>
			<div class="formRight">
				<input type="text" value="<?=@$this->model->data['twitter']?>" name="twitter" title="Nhập link twitter" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>

		<div class="formRow w50">
			<label>Giờ mở cửa</label>
			<div class="formRight">
				<input type="text" value="<?=@$this->model->data['opentime']?>" name="opentime" title="Nhập giờ mở cửa" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>

		<div class="formRow w50">
			<label>Thời gian hoạt động</label>
			<div class="formRight">
				<input type="text" value="<?=@$this->model->data['timelive']?>" name="timelive" title="Nhập thời gian làm việc" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>

		<div class="formRow w50">
			<label>Hổ trợ khách hàng</label>
			<div class="formRight">
				<input type="text" value="<?=@$this->model->data['support_phone']?>" name="support_phone" title="Hổ trợ khách hàng" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>

		<div class="formRow w50">
			<label>Key map google</label>
			<div class="formRight">
				<input type="text" value="<?=@$this->model->data['keymap']?>" name="keymap" title="Key map google" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>

		<div class="formRow w50">
			<label>App ID Facebook</label>
			<div class="formRight">
				<input type="text" value="<?=@$this->model->data['idfacebook']?>" name="idfacebook" title="ID facebook" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>

		<?php if($config['setup']['dongdau']=='true'){?>
		<div class="formRow">
				<label>Đóng dấu ảnh</label>
				<div class="formRight">
					 <div class="mt10"><img src="../upload/watermark.png"  alt="NO PHOTO" width="100" /></div><br>
					<input type="file" id="dongdau" name="dongdau" />
					<div class="note">width : 1/4 kích thước sản phẩm</div>
				</div>
				<div class="clear"></div>
		</div>
		<?php } ?>
		
	</div>
    
    <div class="widget">
		<div class="title"><img src="assets/admin/images/icons/dark/record.png" alt="" class="titleIcon" />
			<h6>Nội dung seo</h6>
		</div>			
		
        <div class="formRow">
			<label>Title</label>
			<div class="formRight">
				<input type="text" value="<?=@$this->model->data['title']?>" name="title" title="Nội dung thẻ meta Title dùng để SEO" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow">
			<label>Từ khóa</label>
			<div class="formRight">
				<input type="text" value="<?=@$this->model->data['keywords']?>" name="keywords" title="Từ khóa chính cho website" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow">
			<label>Description:</label>
			<div class="formRight">
				<textarea rows="8" cols="" title="Nội dung thẻ meta Description dùng để SEO" class="tipS" name="description"><?=@$this->model->data['description']?></textarea>
                <input readonly="readonly" type="text" style="width:25px; margin-top:10px; text-align:center;" name="des_char" value="<?=@$this->model->data['des_char']?>" /> ký tự <b>(Tốt nhất là 160 ký tự)</b>
			</div>
			<div class="clear"></div>
		</div>	

		<div class="formRow">
			<label>Code <xmp><head></xmp> : </label>
			<div class="formRight">
				<textarea rows="8" cols="" title="Code trong thẻ head" class="tipS" name="codehead"><?=@$this->model->data['codehead']?></textarea>
				<div class="note">Ex : Analytics , Facebook ,google , meta  ...v... </div>
			</div>
			<div class="clear"></div>
		</div>	

		<div class="formRow">
			<label>Code <xmp><Body></xmp> :</label>
			<div class="formRight">
				<textarea rows="8" cols="" title="Code trong thẻ body" class="tipS" name="codebody"><?=@$this->model->data['codebody']?></textarea>
				<div class="note">Ex : .... </div>
			</div>
			<div class="clear"></div>
		</div>

		<div class="formRow">
			<label>Code <xmp><Bottom></xmp> :</label>
			<div class="formRight">
				<textarea rows="8" cols="" title="Code dưới Bottom" class="tipS" name="codebottom"><?=@$this->model->data['codebottom']?></textarea>
				<div class="note">Ex : chat , ad , visitor.... </div>
			</div>
			<div class="clear"></div>
		</div>	

        <div class="formRow">
			<div class="formRight">
                <input type="hidden" name="id" id="id_this_setting" value="<?=@$this->model->data['id']?>" />
            	<input type="submit" class="blueB"  value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div> 			
	</div>
    
      
</form>   