<form name="supplier" id="validate" class="form" action="admin/background/save/<?=$_GET['type']?>" method="post" enctype="multipart/form-data">
<div class="widget">

	<div class="control_frm" style="margin-top:25px;">
	    <div class="bc">
	        <ul id="breadcrumbs" class="breadcrumbs">
	        	<li><a href="admin/background/capnhat/<?=$_GET['type']?>"><span>Cập nhật <?=$type->title?></span></a></li>
	        </ul>
	        <div class="clear"></div>
	    </div>
	</div> 

       	<div class="formRow">
			<label>Tải hình ảnh:</label>
			<div class="formRight">
            	<input type="file" id="file" name="file" />
				<img src="assets/admin/images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
				<span class="note">width : <?php echo _width_thumb*$type->ratio;?>px  - Height : <?php echo _height_thumb*$type->ratio;?>px</span>
			</div>

			<div class="clear"></div>
		</div>

		<div class="formRow">
			<label>Hình Hiện Tại :</label>
			<div class="formRight">
			
			<div class="mt10"><img src="<?=_upload_hinhanh_l.$this->model->data['photo']?>"  alt="NO PHOTO" width="100" /></div>
			<a href="admin/background/capnhat/<?=$_GET['type']?>?xoaanh=xoaanh<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><img src="assets/admin/images/icons/dark/close.png" /></a><br />
			</div>

			<div class="clear"></div>
		</div>

		<div class="formRow">
			<label>Backgrourd-color:</label>
			<div class="formRight">
				<input type="text" class="color" name="bgcolor" title="Nhập màu nền" class="tipS validate[required]" value="<?=@$this->model->data['bgcolor']?>" size="15" />
			</div>

			<div class="clear"></div>
		</div>
   		<div class="formRow">
			<label>Repeat:</label>
			<div class="formRight">
				<label><input type="radio" name="re_peat" title="no-repeat" value="no-repeat" <?php if($this->model->data['re_peat']=="no-repeat"){?> checked="checked"<?php } ?>/> No-repeat</label>
				<label><input type="radio" name="re_peat" title="repeat-x" value="repeat-x" <?php if($this->model->data['re_peat']=="repeat-x"){?> checked="checked"<?php } ?>/> repeat-x</label>
    			<label><input type="radio" name="re_peat" title="repeat-y" value="repeat-y" <?php if($this->model->data['re_peat']=="repeat-y"){?> checked="checked"<?php } ?>/>repeat-y</label>
      			<label><input type="radio" name="re_peat" title="repeat" value="repeat" <?php if($this->model->data['re_peat']=="repeat"){?> checked="checked"<?php } ?>/>repeat</label>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Fixed:</label>
			<div class="formRight">
				<label><input type="checkbox" title="fixed" name="fix_bg" value="fixed" <?php if($this->model->data['fix_bg']=="fixed"){?> checked="checked"<?php } ?> /> fixed</label>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Position:</label>
			<div class="formRight">
				Cách Top : <input type="text" placeholder="Ex : 10px" name="waytop" title="Nhập vị trí" value="<?=@$this->model->data['waytop']?>" size="3" style="width:100px;" /> 
				Cách Left : <input type="text" placeholder="Ex : 10px" name="wayleft" title="Nhập vị trí" value="<?=@$this->model->data['wayleft']?>" size="3" style="width:100px;" />
				Cách Right : <input type="text" placeholder="Ex : 10px" name="wayright" title="Nhập vị trí" value="<?=@$this->model->data['wayright']?>" size="3" style="width:100px;" />
				Cách Bottom : <input type="text" placeholder="Ex : 10px" name="waybottom" title="Nhập vị trí" value="<?=@$this->model->data['waybottom']?>" size="3" style="width:100px;" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
          <label>Hiển thị : <img src="assets/admin/images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Bỏ chọn để không hiển thị danh mục này ! "> </label>
          <div class="formRight">
            <input type="checkbox" name="shows" id="check1" value="1" <?=(!isset($this->model->data['shows']) || $this->model->data['shows']==1)?'checked="checked"':''?> />
          </div>
          <div class="clear"></div>
        </div>
        </div>
		<div class="widget">
		
		<div class="formRow">
			<div class="formRight">
                <input type="hidden" name="id_cat" id="id_this_product" value="<?=@$this->model->data['id_cat']?>" />
            	<input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>   