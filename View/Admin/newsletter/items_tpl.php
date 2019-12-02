<script>
$(document).ready(function() {
$("#chonhet").click(function(){
	var status=this.checked;
	$("input[name='chon']").each(function(){this.checked=status;});
});

$('.timkiem button').click(function(event) {
	var keyword = $(this).parent().find('input').val();
	window.location.href="admin/newsletter/man&keyword="+keyword;
});

$("#send").click(function(){
	var listid="";
	$("input[name='chon']").each(function(){
		if (this.checked) listid = listid+","+this.value;
    	})
	listid=listid.substr(1);	 //alert(listid);
	if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
	hoi= confirm("Xác nhận muốn gửi thư đi?");
	if (hoi==true){ document.frm.listid.value=listid; document.frm.submit();}
});
});
</script>

<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="admin/newsletter/man"><span>Quản lý <?=$title_main?></span></a></li>
        	<?php if($_GET['keyword']!=''){ ?>
				<li class="current"><a href="#" onclick="return false;">Kết quả tìm kiếm " <?=$_GET['keyword']?> " </a></li>
			<?php }  else { ?>
            	<li class="current"><a href="#" onclick="return false;">Quản lý email</a></li>
            <?php } ?>
        </ul>
        <div class="clear"></div>
    </div>
</div>

<form name="frm" method="post"  action="admin/newsletter/send" enctype="multipart/form-data" id="f">	
<input type="hidden" name="listid" id="listid">
<p>Chọn email mà bạn muốn gửi</p>
<div class="widget">

 <div class="title"><span class="titleIcon">
    <input type="checkbox" id="titleCheck" name="titleCheck" />
    </span>
    <h6>Chọn tất cả</h6>
    <div class="timkiem">
	    <input type="text" value="" placeholder="Nhập từ khóa tìm kiếm ">
	    <button type="button" class="blueB"  value="">Tìm kiếm</button>
    </div>
  </div>


<table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">

	<tr style="text-align:center">
        <td></td>
        <td>STT</td>
        <td class="sortCol"><div>Email<span></span></div></td>
        <td width="200">Thao tác</td>
      </tr>
    
	<?php foreach ($this->model->data as $key => $value) {?>
	<tr style="text-align:center">
		<td style="width:3%;" align="center"><input type="checkbox" name="chon" value="<?=$value['id']?>" class="chon" /></td>	
		<td style="width:15%;" align="center">STT</td>		        
        <td style="width:60%;" align="center"><b><?=$value['email']?></b></td>
		
		<td style="width:20%;"><a href="admin/newsletter/delete?id=<?=$value['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="assets/admin/images/icons/dark/close.png" alt=""></a></td>

	</tr>
	<?php	}?>
</table>
</div>

	<div class="widget">

		<div class="formRow">
			<label>File đính kèm:</label>
			<div class="formRight">
            	<input type="file" id="file" name="file" />
				<img src="assets/admin/images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải File (rar|zip|doc|docx|xls|xlsx|ppt|pptx|pdf|png|jpg|jpeg|gif)">
			</div>
			<div class="clear"></div>
		</div>
		
        <div class="formRow form">
			<label>Tiêu đề</label>
			<div class="formRight">
                <input type="text" name="ten_vi" title="Nhập tiêu đề " id="ten_vi" class="tipS validate[required]" value="<?=@$item['ten_vi']?>" />
			</div>
			<div class="clear"></div>
		</div>


		<div class="formRow">
			<label>Nội Dung</label>
			<div class="ck_editor">
                <textarea id="noidung_vi" name="noidung_vi"><?=@$item['noidung_vi']?></textarea>
			</div>
			<div class="clear"></div>
		</div>

		<div class="formRow">
			<label></label>
			<div class="clear"></div>
			<input type="button" class="blueB" id="send" value="Gửi mail" />
		</div>
		
	
	</div>  
	
</form> 




