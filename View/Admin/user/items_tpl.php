<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="admin/user/man<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Quản lý Thành viên</span></a></li>
        	<?php if($_GET['keyword']!=''){ ?>
				<li class="current"><a href="#" onclick="return false;">Kết quả tìm kiếm " <?=$_GET['keyword']?> " </a></li>
			<?php }  else { ?>
            	<li class="current"><a href="#" onclick="return false;">Tất cả</a></li>
            <?php } ?>
        </ul>
        <div class="clear"></div>
    </div>
</div>


<form name="f" id="f" method="post">
<div class="control_frm" style="margin-top:0;">
  	<div style="float:left;">
    	<input type="button" class="blueB" value="Thêm" onclick="location.href='admin/user/add<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>'" />
        <input type="button" class="blueB" value="Xoá Chọn" id="xoahet" />

    </div>  
</div>

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
    <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">Thứ tự</a></td>           
        <td>Tên tài khoản</tdtd>
		<td>Email</td>
        <td class="tb_data_small">Ẩn/Hiện</td>
        <td width="200">Thao tác</td>
      </tr>
    </thead>

    <tbody>
        <?php foreach ($this->model->data as $key => $value) {?>
          <tr>
       <td>
            <input type="checkbox" name="chon" value="<?=$value['id']?>" id="check<?=$i?>" />
        </td>

        <td align="center">
            <input type="text" value="<?=$value['number']?>" name="ordering[]" onkeypress="return OnlyNumber(event)" class="tipS smallText update_stt" original-title="Nhập số thứ tự sản phẩm" rel="<?=$value['id']?>" />

            <div id="ajaxloader"><img class="numloader" id="ajaxloader<?=$value['id']?>" src="assets/admin/images/loader.gif" alt="loader" /></div>
        </td> 

        <td class="title_name_data">
            <a href="admin/user/edit?id_list=<?=$value['id_list']?>&id_cat=<?=$value['id_cat']?>&id=<?=$value['id']?>" class="tipS SC_bold"><?=$value['username']?></a>
        </td>

        <td class="title_name_data"><?=$value['email']?></td>

        <td align="center">
        <?php if(@$value['shows']==1){?>
          <a href="admin/user/man?shows=<?=$value['id']?>" title="" class="smallButton tipS" original-title="Click để ẩn"><img src="assets/admin/images/icons/color/tick.png" alt=""></a>
            <?php } else { ?>
          <a href="admin/user/man?shows=<?=$value['id']?>" title="" class="smallButton tipS" original-title="Click để hiện"><img src="assets/admin/images/icons/color/hide.png" alt=""></a>
         <?php } ?>
        </td>
       
        <td class="actBtns">
            <a href="admin/user/edit?id=<?=$value['id']?>" title="" class="smallButton tipS" original-title="Sửa sản phẩm"><img src="assets/admin/images/icons/dark/pencil.png" alt=""></a>

            <a href="admin/user/delete?id=<?=$value['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;" title="" class="smallButton tipS" original-title="Xóa sản phẩm"><img src="assets/admin/images/icons/dark/close.png" alt=""></a>
        </td>
      </tr>
         <?php } ?>
                </tbody>
  </table>
</div>
</form>  

<div class="paging"><?=$paging?></div>