<?php
	function get_list_role($id=0){
		
		$sql="select * from table_user_role order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_role" name="id_role" class="main_font">
			<option>Chọn nhóm thành viên</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==$id)
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
		
	}
?>
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="admin/member/man"><span>Danh sách thành viên</span></a></li>
            <li class="current"><a href="#" onclick="return false;">Chỉnh sửa thành viên</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">		
	function TreeFilterChanged2(){		
				$('#validate').submit();		
	}
</script>
<form name="supplier" id="validate" class="form" action="admin/member/save" method="post" enctype="multipart/form-data">	        
    <div class="widget">
		<div class="title"><img src="assets/images/admin/icons/dark/pencil.png" alt="" class="titleIcon" />
			<h6>Thông tin tài khoản</h6>
		</div>	

        <?php /*?><div class="formRow">
            <label>Hình đại diện:</label>
            <div class="formRight">
                <img src="<?=_upload_member.$this->model->data['photo']?>" onerror="src='images/no-avatar.png'" alt="NO PHOTO" height="50" width="50" class="avatar_member" />
                <?php if($this->model->data['photo']!=""){?>
                <a title="Xoá ảnh" href="admin/member/delete_img&id=<?=@$this->model->data['id']?>">Xoá ảnh</a>
                <?php }?> 
            </div>
            <div class="clear"></div>                       
        </div>
               
        <div class="formRow">
            <label>Tải hình ảnh:</label>
            <div class="formRight">
                <input type="file" id="file" name="img" />
                <img src="./images/question-button.png" alt="Upload hình đại diện" class="icon_question tipS" original-title="Tải hình đại diện (ảnh JPEG , JPG , PNG)">
            </div>
            <div class="clear"></div>                       
        </div>	<?php */?>
        
        	
		<div class="formRow">
			<label>Email</label>
			<div class="formRight">
				<input type="text" value="<?=@$this->model->data['email']?>" name="email" title="Nhập email của bạn" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
        <div class="formRow">
			<label>Mật khẩu</label>
			<div class="formRight">
				<input type="password" value="" name="password" title="Nhập mật khẩu" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
               		
		<div class="formRow">
			<label>Họ tên</label>
			<div class="formRight">
				<input type="text" value="<?=@$this->model->data['name']?>" name="name" title="Nhập họ tên của bạn" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
        
        <div class="formRow hidden">
			<label>Điểm tích lũy</label>
			<div class="formRight">
				<input type="text" value="<?=@$this->model->data['tichluy']?>" name="tichluy" title="Điểm tích lũy" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
        
        <div class="formRow">
			<label>Giới tính</label>
			<div class="formRight">
				<input type="radio" name="sex" id="male" value="1" <?=(!isset($this->model->data['sex']) || $this->model->data['sex']==1)?'checked':''?>>
                <label for="male">Nam</label>
                <input type="radio" name="sex" id="female" value="0" <?=($this->model->data['sex']==0)?'checked':''?>>
                <label for="female">Nữ</label>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Ngày sinh</label>
			<div class="formRight">
				<input type="text" value="<?=date("d/m/Y",@$this->model->data['ngaysinh'])?>" name="ngaysinh" id="ngaysinh" title="Vui lòng chọn ngày sinh" class="tipS short_inp pick_date" />
			</div>
			<div class="clear"></div>
		</div>
        
        
        <div class="formRow">
			<label>Điện thoại</label>
			<div class="formRight">
				<input type="text" value="<?=@$this->model->data['phone']?>" name="phone" title="Nhập điện thoại của bạn" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Địa chỉ</label>
			<div class="formRight">
				<input type="text" value="<?=@$this->model->data['address']?>" name="address" title="Nhập địa chỉ của bạn" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>

		<!-- <div class="formRow">
			<label>Doanh Nghiệp</label>
			<div class="formRight">
				<input type="text" value="<?=@$this->model->data['doanhnghiep_ten']?>" name="doanhnghiep_ten" title="Nhập tên doanh nghiệp" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>

		<div class="formRow">
			<label>Địa chỉ</label>
			<div class="formRight">
				<input type="text" value="<?=@$this->model->data['doanhnghiep_diachi']?>" name="doanhnghiep_diachi" title="Nhập địa chỉ doanh nghiệp" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>

		<div class="formRow">
			<label>Mã số thuế</label>
			<div class="formRight">
				<input type="text" value="<?=@$this->model->data['doanhnghiep_MST']?>" name="doanhnghiep_MST" title="Nhập MST doanh nghiệp" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
 -->


		

		
        <div class="formRow">
			<div class="formRight">
               <input type="hidden" name="id" id="id" value="<?=@$this->model->data['id']?>" />
            	<input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div> 			
	</div>
    
      
</form>   
<script>
	$(document).ready(function() {
		 //Chọn ngày sinh
	    $("#ngaysinh" ).datepicker({      
	        dateFormat: 'dd/mm/yy',
        changeYear: true,
        closeText: "Close",
        yearRange: "1900:+nn",
	    });
	});	
</script>