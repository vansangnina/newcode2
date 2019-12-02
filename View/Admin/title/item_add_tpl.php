<?php
	$thongtin = json_decode($this->model->data['attributes'],true);
?>
<div class="wrapper">

<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="admin/title/add/<?=$_GET['type']?>"><span>Thêm <?=$type->title?></span></a></li>
            <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>

<form name="supplier" id="validate" class="form" action="admin/title/save/<?=$_GET['type']?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title chonngonngu">
		<ul>
		    <?php foreach ($config['lang'] as $key => $value) {?>
		      <li><a href="<?=$key?>" class="<?php if($config['activelang']==$key){ echo "active";}?> tipS" title="Chọn <?=$value?>"><img src="assets/admin/images/<?=$key?>.png" /><?=$value?></a></li>
		    <?php } ?>
		</ul>
		</div>	

		<?php if($config_image=='true'){?>
			<div class="formRow">
				<label>Tải hình ảnh:</label>
				<div class="formRight">
	            	<input type="file" id="file" name="file" />
					<img src="assets/admin/images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
					<div class="note"> width : <?php echo _width_thumb*$ratio_;?> px , Height : <?php echo _height_thumb*$ratio_;?> px </div>
				</div>
				<div class="clear"></div>
			</div>
	        <?php if($_GET['act']=='edit'){?>
			<div class="formRow">
				<label>Hình Hiện Tại :</label>
				<div class="formRight">
				<div class="mt10"><img src="<?=_upload_hinhanh.$this->model->data['thumb']?>"  alt="NO PHOTO" width="<?=_width_thumb?>" /></div>

				</div>
				<div class="clear"></div>
			</div>
			<?php } ?>
		<?php } ?>
		<?php if(in_array('name',$type->config_open)){ ?>
        <?php foreach ($config['lang'] as $key => $value) {?>
	        <div class="formRow lang_hidden lang_<?=$key?> <?php if($config['activelang']==$key){ echo "active";}?>">
		      <label>Tiêu đề (<?=$value?>)</label>
		      <div class="formRight">
		            <input type="text" name="name_<?=$key?>" title="Nhập tên (<?=$value?>)" id="name_<?=$key?>" class="tipS validate[required]" value="<?=@$this->model->data['name_'.$key]?>" />
		      </div>
		      <div class="clear"></div>
		    </div>
	    <?php } } ?>
		
		<?php if(in_array('description',$type->config_open)){ ?>
	    <?php foreach ($config['lang'] as $key => $value) {?>
	    <div class="formRow lang_hidden lang_<?=$key?> <?php if($config['activelang']==$key){ echo "active";}?>">
	      <label>Mô tả (<?=$value?>)</label>
	      <div class="formRight">
	                <textarea rows="10" cols="" title="Nhập mô tả (<?=$value?>) . " class="tipS" name="description_<?=$key?>"><?=@$this->model->data['description_'.$key]?></textarea>
	      </div>
	      <div class="clear"></div>
	    </div>
	    <?php } } ?>

	    <?php if($_GET['type']=='chinhanh'){?>
	    	<?php foreach ($config['lang'] as $key => $value) {?>
	        <div class="formRow lang_hidden lang_<?=$key?> <?php if($config['activelang']==$key){ echo "active";}?>">
		      <label>Địa chỉ (<?=$value?>)</label>
		      <div class="formRight">
		            <input type="text" name="thongtin[diachi][<?=$key?>]" title="Nhập tên (<?=$value?>)" id="thongtin[diachi][<?=$key?>]" class="tipS validate[required]" value="<?=$thongtin['diachi'][$key]?>" />
		      </div>
		      <div class="clear"></div>
		    </div>
			<?php } ?>

		    <div class="formRow">
		      <label>Tòa Độ (Map)</label>
		      <div class="formRight">
		            <input type="text" name="thongtin[toado]" title="Nhập tòa độ" id="thongtin[toado]" class="tipS validate[required]" value="<?=$thongtin['toado']?>" />
		      </div>
		      <div class="clear"></div>
		    </div>

		    <div class="formRow">
		      <label>Email</label>
		      <div class="formRight">
		            <input type="text" name="thongtin[email]" title="Nhập email" id="thongtin[email]" class="tipS validate[required]" value="<?=$thongtin['email']?>" />
		      </div>
		      <div class="clear"></div>
		    </div>

		    <div class="formRow">
		      <label>Điện thoại</label>
		      <div class="formRight">
		            <input type="text" name="thongtin[dienthoai]" title="Nhập điện thoại" id="thongtin[dienthoai]" class="tipS validate[required]" value="<?=$thongtin['dienthoai']?>" />
		      </div>
		      <div class="clear"></div>
		    </div>

	    <?php } ?>

	    <?php if($_GET['type']=='khoangia'){?>
	    
		    <div class="formRow">
		      <label>Giá từ</label>
		      <div class="formRight">
		            <input type="text" name="thongtin[giatu]" title="Nhập giá từ" id="thongtin[giatu]" class="conso tipS validate[required]" value="<?=$thongtin['giatu']?>" />
		      </div>
		      <div class="clear"></div>
		    </div>

		    <div class="formRow">
		      <label>Giá đến</label>
		      <div class="formRight">
		            <input type="text" name="thongtin[giaden]" title="Nhập giá đến" id="thongtin[giaden]" class="conso tipS validate[required]" value="<?=$thongtin['giaden']?>" />
		      </div>
		      <div class="clear"></div>
		    </div>
		   
	    <?php } ?>

	    <?php if($_GET['type']=='mausac'){?>
	    
		    <div class="formRow">
		      <label>Màu sắc</label>
		      <div class="formRight">
		            <input type="text" name="thongtin[color]" title="Chọn màu" id="thongtin[color]" class="color tipS validate[required]" value="<?=$thongtin['color']?>" />
		      </div>
		      <div class="clear"></div>
		    </div>

	    <?php } ?>
		
		<?php if($_GET['type']=='shiping'){?>
		<div class="formRow">
			<label>Phí</label>
			<div class="formRight">
                <input type="text" name="thongtin[phiship]" title="Nhập phí ship" id="phiship" class="conso tipS validate[required]" value="<?=$thongtin['phiship']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>

        <div class="formRow">
          <label>Hiển thị : <img src="assets/admin/images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Bỏ chọn để không hiển thị danh mục này ! "> </label>
          <div class="formRight">
         
            <input type="checkbox" name="shows" id="check1" value="1" <?=(!isset($this->model->data['shows']) || $this->model->data['shows']==1)?'checked="checked"':''?> />
             <label>Số thứ tự: </label>
              <input type="text" class="tipS" value="<?=isset($this->model->data['number'])?$this->model->data['number']:1?>" name="number" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự của danh mục, chỉ nhập số">
          </div>
          <div class="clear"></div>
        </div>
		
	</div>  
	<div class="widget">
		<div class="formRow">
			<div class="formRight">
                <input type="hidden" name="type" id="id_this_type" value="<?=$_REQUEST['type']?>" />
                <input type="hidden" name="id" id="id_this_post" value="<?=@$this->model->data['id']?>" />
            	<input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
            	<a href="admin/title/man/<?=$_GET['type']?>" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>
			</div>
			<div class="clear"></div>
		</div>

	</div>
</form>
</div>