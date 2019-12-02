<script type="text/javascript">
$(document).ready(function() {
  $('.SearchTable select').change(function(event) {
      var wrap = $(this);
      timkiem(wrap);
  });
  $('.timkiem button').click(function(event) {
     var wrap = $('.timkiem input');
     timkiem(wrap);
  });
});
</script>
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="admin/permission/man"><span>Quản lý phân quyền</span></a></li>
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
    	<input type="button" class="blueB" value="Thêm" onclick="location.href='admin/permission/add'" />
        <input type="button" class="blueB" value="Xoá Chọn" id="xoahet" />

    </div>  
</div>

<div class="widget">
  <div class="title"><span class="titleIcon">
    <input type="checkbox" id="titleCheck" name="titleCheck" />
    </span>
    <h6>Chọn tất cả</h6>
    <div class="timkiem">
	    <input type="text" id="keywords" value="<?=$_GET['keyword']?>" placeholder="Nhập từ khóa tìm kiếm ">
	    <button type="button" class="blueB"  value="">Tìm kiếm</button>
    </div>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">Thứ tự</a></td>           
        <td class="tb_data_small">Quyền</td>
        <td class="tb_data_small">Màu sắc</td>
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
            <input type="text" value="<?=$value['number']?>" class="tipS smallText update_stt" original-title="Nhập số thứ tự sản phẩm" data-id="<?=$value['id']?>" data-table="<?=$com?>" data-type="stt" />
        </td>

        <td class="title_name_data"><a href="admin/permission/edit?id=<?=$value['id']?>" style="text-decoration:none;"><?=$value['name']?></a></td>
        <td class="title_name_data"><a href="admin/permission/edit?id=<?=$value['id']?>" style="text-decoration:none;"><input type="color" name="color" value="<?=@$value['color']?>"  /></a></td>

        <td align="center">
          <a data-val2="<?=$_GET['com']?>" rel="<?=$value['shows']?>" data-val3="shows" class="diamondToggle <?=($value['shows']==1)?"diamondToggleOff":""?>" data-val0="<?=$value['id']?>" ></a>   
        </td>
       
        <td class="actBtns">
            <a href="admin/permission/edit?id=<?=$value['id']?>" title="" class="smallButton tipS" original-title="Sửa sản phẩm"><img src="assets/admin/images/icons/dark/pencil.png" alt=""></a>

            <a href="admin/permission/delete?listid=<?=$value['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;" title="" class="smallButton tipS" original-title="Xóa sản phẩm"><img src="assets/admin/images/icons/dark/close.png" alt=""></a>
        </td>
      </tr>
         <?php } ?>
      </tbody>
  </table>
</div>
</form>  
<div class="paging"><?=$this->model->paging?></div>