<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="admin/photo/man/<?=$_GET['type']?>"><span>Hình ảnh slider</span></a></li>
            <li class="current"><a href="#" onclick="return false;">Sửa hình ảnh</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">		
	function TreeFilterChanged2(){		
				$('#validate').submit();		
	}
</script>
<form name="supplier" id="validate" class="form" action="admin/photo/save/<?=$_GET['type']?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title chonngonngu">
        <ul>
        <?php 
        foreach ($config['lang'] as $key => $value) {?>
            <li><a href="<?=$key?>" class="<?php if($config['activelang']==$key){ echo "active";}?> tipS" title="Chọn <?=$value?>"><img src="assets/admin/images/<?=$key?>.png" /><?=$value?></a></li>
        <?php } ?>
        </ul>
        </div>  

		<?php foreach ($config['lang'] as $key => $value) {?>
        <div class="formRow lang_hidden lang_<?=$key?> <?php if($config['activelang']==$key){ echo "active";}?>">
            <label>Tiêu đề (<?=$value?>)</label>
            <div class="formRight">
                <input type="text" name="name_<?=$key?>" title="Nhập tên (<?=$value?>)" id="name_<?=$key?>" class="tipS validate[required]" value="<?=@$this->model->data['name_'.$key]?>" />
            </div>
            <div class="clear"></div>
        </div>
        <?php } ?>

        <?php if(in_array('link',$type->config_open)){ ?>     
        <div class="formRow">
            <label>Link liên kết : </label>
            <div class="formRight">
                <input type="text" id="price" name="link" value="<?=@$this->model->data['link']?>"  title="Nhập link liên kết cho hình ảnh" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>   
        <?php } ?> 
        <?php foreach ($config['lang'] as $key => $value) {?>
		<div class="formRow lang_hidden lang_<?=$key?> <?php if($config['activelang']==$key){ echo "active";}?>">
			<label>Tải hình ảnh:</label>
			<div class="formRight">
            	<input type="file" id="file_<?=$key?>" name="file_<?=$key?>" />
				<img src="assets/admin/images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
                <span class="note">width : <?php echo _width_thumb*$value->ratio;?>px  - Height : <?php echo _height_thumb*$value->ratio;?>px</span>
			</div>
			<div class="clear"></div>
		</div>
        <?php if($_GET['act']=='edit'){?>
        <div class="formRow lang_hidden lang_<?=$key?> <?php if($config['activelang']==$key){ echo "active";}?>">
            <label>Hình ảnh hiện tại :</label>
            <div class="formRight">
                  <div class="mt10"><img src="<?=_upload_hinhanh_l.$this->model->data['photo_'.$key]?>"  alt="NO PHOTO" width="100" /></div>
            </div>
            <div class="clear"></div>
        </div>
        <?php } } ?>

       
        <?php if(in_array('slogan',$type->config_open)){ ?>
        <?php foreach ($config['lang'] as $key => $value) {?>
        <div class="formRow lang_hidden lang_<?=$key?> <?php if($config['activelang']==$key){ echo "active";}?>">
            <label>Slogan (<?=$value?>)</label>
            <div class="formRight">
                <input type="text" name="slogan_<?=$key?>" title="Nhập slogan (<?=$value?>)" id="slogan_<?=$key?>" class="tipS validate[required]" value="<?=@$this->model->data['slogan_'.$key]?>" />
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


        <div class="formRow">
          <label>Tùy chọn: <img src="assets/admin/images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Check vào những tùy chọn "> </label>
          <div class="formRight">           
            <input type="checkbox" name="shows" id="shows" value="1" <?=(!isset($this->model->data['shows']) || $this->model->data['shows']==1)?'checked="checked"':''?> />
            <label for="check1">Hiển thị</label>           
          </div>
          <div class="clear"></div>
        </div>
        <div class="formRow">
            <label>Số thứ tự: </label>
            <div class="formRight">
                <input type="text" class="tipS" value="<?=isset($this->model->data['number'])?$this->model->data['number']:1?>" name="number" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự của hình ảnh, chỉ nhập số">
            </div>
            <div class="clear"></div>
        </div>
			
	<div class="formRow">
			<div class="formRight">
            <input type="hidden" name="type" id="id_this_type" value="<?=$_REQUEST['type']?>" />
                <input type="hidden" name="id" id="id_this_photo" value="<?=@$this->model->data['id']?>" />
            	<input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>     
	</div>
   
</form>   