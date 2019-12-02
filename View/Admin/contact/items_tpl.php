<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="admin/contact/man/<?=$_GET['type']?>"><span>Quản lý thông tin liên hệ</span></a></li>
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
        <td class="sortCol"><div>Tiêu đề <span></span></div></td>
        <td class="sortCol"><div>Tên <span></span></div></td>
        <td class="sortCol"><div>Email <span></span></div></td>
        <td class="tb_data_small">Ngày tạo</td>
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

            <div id="ajaxloader"><img class="numloader" id="ajaxloader<?=$value['id']?>" src="images/loader.gif" alt="loader" /></div>
        </td> 

        <td align="center" <?php if($value['view']==0){ echo "style='font-weight:bold;'";}?>><?=$value['title']?></td>
        <td align="center" <?php if($value['view']==0){ echo "style='font-weight:bold;'";}?>><?=$value['name']?></td>
        <td align="center" <?php if($value['view']==0){ echo "style='font-weight:bold;'";}?>><?=$value['email']?></td>


        <td align="center"><?=date('d/m/Y - g:i A',strtotime($value['datecreate']));?></td>
       
        <td class="actBtns">
            <a href="admin/contact/edit/<?=$_GET['type']?>?id_list=<?=$value['id_list']?>&id_cat=<?=$value['id_cat']?>&id=<?=$value['id']?>" title="" class="smallButton tipS" original-title="Xem"><img src="assets/admin/images/icons/dark/pencil.png" alt=""></a>

            <a href="admin/contact/delete/<?=$_GET['type']?>?listid=<?=$value['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;" title="" class="smallButton tipS" original-title="Xóa"><img src="assets/admin/images/icons/dark/close.png" alt=""></a>
        </td>
      </tr>
         <?php } ?>
                </tbody>
  </table>
</div>
</form>  

<div class="paging"><?=$paging?></div>