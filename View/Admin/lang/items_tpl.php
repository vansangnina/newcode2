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
        	<li><a href="admin/lang/man"><span>Quản lý ngôn ngữ</span></a></li>
        	<?php if($_GET['keyword']!=''){ ?>
				<li class="current"><a href="#" onclick="return false;">Kết quả tìm kiếm " <?=$_GET['keyword']?> " </a></li>
			<?php }  else { ?>
          <li class="current"><a href="#" onclick="return false;">Tất cả</a></li>
      <?php } ?>
        </ul>
        <div class="clear"></div>
    </div>
</div>



<div class="control_frm" style="margin-top:0;">
  	<div style="float:left; width:100%">

    	<input type="button" class="blueB" value="Thêm" onclick="location.href='admin/lang/add'" />
      <?php if($_SESSION['login']['type']=='developer' || $_SERVER["SERVER_NAME"]=='localhost'){?>
<input type="button" class="blueB" value="Xoá Chọn" id="xoahet" />
<?php } ?>
      <a href="admin/lang/update" class="blueB button"> Cập Nhật Ngôn Ngữ </a>
<?php if($_SESSION['login']['type']=='developer' || $_SERVER["SERVER_NAME"]=='localhost'){?>
      <a href="admin/lang/createlang" class="blueB tips" title="Lưu ý : Chức năng chỉ dành cho developer" style="display: inline-block;background: #3773A1;line-height: 30px;border:none;padding:0px 10px; float:right"> Khởi tạo </a>
<?php } ?>
    </div>  
</div>
<form name="f" id="f" method="post">
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
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">STT</a></td>     

        <td class="sortCol"><div> Tên<span></span></div></td>
        <?php foreach ($config['lang'] as $key => $value){ ?>
        <td class="sortCol"><div><?=$value?><span></span></div></td>
        <?php }?>
        <td >Thao tác</td>
      </tr>
    </thead>

    <tbody>
         <?php foreach ($this->model->data as $key => $value) {?>
          <tr>
       <td>
            <input type="checkbox" name="chon" value="<?=$value['id']?>" id="check<?=$i?>" />
        </td>

        <td align="center">
            <input type="text" value="<?=$value['id']?>" name="ordering[]" onkeypress="return OnlyNumber(event)" class="tipS smallText update_stt" original-title="Nhập số thứ tự bài viết" rel="<?=$value['id']?>" />
        </td> 
       
        <td class="title_name_data">
            <?=$value['name']?>
        </td>
        <?php foreach ($config['lang'] as $key2 => $value2){ ?>
        <td class="title_name_data">
            <a href="admin/lang/edit?id=<?=$value['id']?>" class="tipS SC_bold"><?=$value['type_'.$key2]?></a>
        </td>
        <?php }?>
        <td class="actBtns">
            <a href="admin/lang/edit?id=<?=$value['id']?><?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" title="" class="smallButton tipS" original-title="Sửa bài viết"><img src="assets/images/icons/dark/pencil.png" alt=""></a>
            <?php if($_SESSION['login']['type']=='developer' || $_SERVER["SERVER_NAME"]=='localhost'){?>
            <a href="admin/lang/delete?listid=<?=$value['id']?><?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" onClick="if(!confirm('Xác nhận xóa')) return false;" title="" class="smallButton tipS" original-title="Xóa bài viết"><img src="assets/images/icons/dark/close.png" alt=""></a>
            <?php } ?>
        </td>
      </tr>
         <?php } ?>
    </tbody>
  </table>
</div>
</form>  

<div class="paging"><?=$this->model->paging?></div>