<div class="wrapper">

<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
            <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>

<form name="supplier" id="validate" class="form" action="admin/contact/save/<?=$_GET['type']?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="formRow">
			<label>Họ Tên : </label>
			<div class="formRight">
               <?=@$this->model->data['name']?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Địa chỉ  : </label>
			<div class="formRight">
               <?=@$this->model->data['address']?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Điện thoại : </label>
			<div class="formRight">
               <?=@$this->model->data['phone']?>
			</div>
			<div class="clear"></div>
		</div>

		<div class="formRow">
			<label>Email : </label>
			<div class="formRight">
               <?=@$this->model->data['email']?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Tiêu đề  : </label>
			<div class="formRight">
               <?=@$this->model->data['title']?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Nội Dung : </label>
			<div class="formRight">
               <?=@$this->model->data['content']?>
			</div>
			<div class="clear"></div>
		</div>

		<div class="formRow">
			<label>Ghi chú</label>
			<div class="formRight">
                <textarea rows="4" cols="" title="Nhập Ghi chú ." class="tipS" name="note"><?=@$this->model->data['note']?></textarea>
			</div>
			<div class="clear"></div>
		</div>
		
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
            	<a href="admin/contact/man/<?=$_GET['type']?>" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>
			</div>
			<div class="clear"></div>
		</div>

	</div>
</form>        </div>
