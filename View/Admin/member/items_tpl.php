<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	  <li><a href="admin/member/man"><span>Thành viên</span></a></li>
            <li class="current"><a href="#" onclick="return false;">Tất cả</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<script language="javascript">
	function CheckDelete(l){
		if(confirm('Bạn có chắc muốn xoá thành viên này?'))
		{
			location.href = l;	
		}
	}	
	function ChangeAction(str){
		if(confirm("Bạn có chắc chắn?"))
		{
			document.f.action = str;
			document.f.submit();
		}
	}		
function select_onchange()
	{
		var a=document.getElementById("id_role");
		window.location ="admin/member/man?id_role="+a.value;	
		return true;
	}					
</script>
<form name="f" id="f" method="post">
<div class="control_frm" style="margin-top:0;">
  	<div style="float:left;">
    	<input type="button" class="blueB" value="Thêm" onclick="location.href='admin/member/add'" />
        <input type="button" class="blueB" value="Hiện" onclick="ChangeAction('admin/member/man?multi=show');return false;" />
        <input type="button" class="blueB" value="Ẩn" onclick="ChangeAction('admin/member/man?multi=hide');return false;" />
        <input type="button" class="blueB" value="Xoá" onclick="ChangeAction('admin/member/man?multi=del');return false;" />
    </div>  
    <div style="float:right;">
        <div class="selector">
				<select name="id_role" id="id_role" onchange="select_onchange()">
            <option value="0">Nhóm thành viên</option>
        </select>
        </div>  
    </div>  
    	<img src="assets/admin/images/question-button.png" alt="Chọn loại" class="icon_que tipS" style="float:right; margin:5px 5px 0 0;" original-title="Dùng cây thư mục để di chuyển nhanh đến thành viên">   
</div>



<div class="widget">
  <div class="title"><span class="titleIcon">
    <input type="checkbox" id="titleCheck" name="titleCheck" />
    </span>
    <h6>Danh sách các thành viên hiện có</h6>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
        <td width="50">Mã</td>
        <td width="200"><div>Email<span></span></div></td>
        <td width="100">Họ tên</td>
        <td width="100">Lần đăng nhập cuối</td>
<!--         <td width="100" class="hidden">Đăng nhập bằng</td>
 -->        <td class="tb_data_small">Kích hoạt</td>      
        <td width="100">Thao tác</td>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td colspan="10"><div class="pagination">  <?=$this->model->paging?>     </div></td>
      </tr>
    </tfoot>
    <tbody>
        <?php foreach ($this->model->data as $key => $value) {?>
          <tr>
       <td>
            <input type="checkbox" name="iddel[]" value="<?=$value['id']?>" id="check<?=$i?>" />
        </td>
        <td align="center">
          <?=$value['mathanhvien']?>
        </td>
        <td align="center">
        <a href="admin/member/edit?id=<?=$value['id']?>" class="tipS SC_bold"><?=$value['email']?></a>
        </td>
      
        <td align="center">
          <?=$value['ten']?>
        </td>
        <td align="center">
          <?=date("h:i:s - d/m/Y",$value['lastlogin'])?>
        </td>
       <!--  <td align="center" class="hidden">
          <?php if($value['com']=='facebook'){?>
          <a href="http://facebook.com/<?=$value['facebook_auth_id']?>" class="lg_facebook" target="_blank"><i class="fa fa-facebook-square"></i> Facebook</a>
          <?php }elseif($value['com']=='google'){?>
          <a href="http://plus.google.com/<?=$value['google_auth_id']?>" class="lg_google" target="_blank"><i class="fa fa-google-plus"></i> Google</a>
          <?php }else{?>
          <span class="lg_regular"></span>
          <?php }?>
        </td> -->
       
        <td align="center">
           <?php 
			if(@$value['active']==1)
				{
		?>
            <a href="admin/member/man?active=<?=$value['id']?>" title="" class="smallButton tipS" original-title="Click để ẩn"><img src="assets/admin/images/icons/color/tick.png" alt=""></a>
            <?php } else { ?>
         <a href="admin/member/man?active=<?=$value['id']?>" title="" class="smallButton tipS" original-title="Click để hiện"><img src="assets/admin/images/icons/color/hide.png" alt=""></a>
         <?php } ?>
        </td>
       
        <td class="actBtns">
            <a href="admin/member/edit?id=<?=$value['id']?>" title="" class="smallButton tipS" original-title="Sửa thành viên"><img src="assets/admin/images/icons/dark/pencil.png" alt=""></a>
            <a href="" onclick="CheckDelete('admin/member/delete?id=<?=$value['id']?>'); return false;" title="" class="smallButton tipS" original-title="Xóa thành viên"><img src="assets/admin/images/icons/dark/close.png" alt=""></a>        </td>
      </tr>
         <?php } ?>
                </tbody>
  </table>
</div>
</form>               