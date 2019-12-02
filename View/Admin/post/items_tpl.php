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
        	<li><a href="admin/post/man/<?=$_GET['type']?>"><span>Quản lý <?=$type->title?></span></a></li>
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
    	  <input type="button" class="blueB" value="Thêm" onclick="location.href='admin/post/add/<?=$_GET['type']?>'" />
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
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable SearchTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">Thứ tự</a></td>     
        <?php if(in_array('list',$type->config_open)){ ?>
        <td class="tb_data_small"><?=$func->get_main_list()?></td>
        <?php } ?>
        <?php if(in_array('cat',$type->config_open)){ ?>
        <td class="tb_data_small"><?=$func->get_main_cat()?></td>
        <?php } ?>
        <?php if(in_array('item',$type->config_open)){ ?> 
        <td class="tb_data_small"><?=$func->get_main_item()?></td>
        <?php } ?>
        <?php if(in_array('sub',$type->config_open)){ ?> 
        <td class="tb_data_small"><?=$func->get_main_sub()?></td>
        <?php } ?>
        <?php if(in_array('image',$type->config_open)){ ?>
        <td class="tb_data_small">Hình ảnh</td>
        <?php } ?>
        <td class="sortCol"><div>Tên <?=$title_main?><span></span></div></td>

        <?php if(in_array('view',$type->config_open)){ ?> 
        <td class="tb_data_small" style="width:100px">Lượt xem</td>
        <?php } ?>

        <?php if(in_array('highlight',$type->config_open)){ ?>
        <td class="tb_data_small">Nổi Bật</td>
        <?php } ?>
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

        <?php if(in_array('list',$type->config_open)){ ?>
         <td align="center"><?=$func->getname('cate_list',$value['id_list'])?></td>
         <?php } ?> 

         <?php if(in_array('cat',$type->config_open)){ ?>
         <td align="center"><?=$func->getname('cate_cat',$value['id_cat'])?></td>
        <?php } ?> 

        <?php if(in_array('item',$type->config_open)){ ?>
         <td align="center"><?=$func->getname('cate_item',$value['id_item'])?>   </td>
        <?php } ?> 

        <?php if(in_array('sub',$type->config_open)){ ?>
         <td align="center"><?=$func->getname('cate_sub',$value['id_sub'])?>  </td>
        <?php } ?> 

        <?php if(in_array('image',$type->config_open)){ ?>
          <td align="center"><img src="<?=_upload_post.$value['thumb']?>" width="60" /></td>
        <?php } ?>
        
        <td class="title_name_data">
            <a href="admin/post/edit/<?=$_GET['type']?>?id_list=<?=$value['id_list']?>&id_cat=<?=$value['id_cat']?>&id_item=<?=$value['id_item']?>&id_sub=<?=$value['id_sub']?>&id=<?=$value['id']?>" class="tipS SC_bold"><?=$value['name_vi']?></a>
        </td>

        <?php if(in_array('view',$type->config_open)){ ?> 
            <td align="center"> <img src="assets/admin/images/view.png" width="15" style="margin-right:5px;" /><?=$value['view']?></td>
        <?php } ?>

        <?php if(in_array('highlight',$type->config_open)){ ?>
        <td align="center">
        <a data-val2="<?=$_GET['com']?>" rel="<?=$value['highlight']?>" data-val3="highlight" class="diamondToggle <?=($value['highlight']==1)?"diamondToggleOff":""?>" data-val0="<?=$value['id']?>" ></a> 
        </td>
        <?php } ?>
      
        <td align="center">
          <a data-val2="<?=$_GET['com']?>" rel="<?=$value['shows']?>" data-val3="shows" class="diamondToggle <?=($value['shows']==1)?"diamondToggleOff":""?>" data-val0="<?=$value['id']?>" ></a>   
        </td>
       
        <td class="actBtns">
            <a href="admin/post/edit/<?=$_GET['type']?>?id_list=<?=$value['id_list']?>&id_cat=<?=$value['id_cat']?>&id_item=<?=$value['id_item']?>&id_sub=<?=$value['id_sub']?>&id=<?=$value['id']?>" title="" class="smallButton tipS" original-title="Sửa bài viết"><img src="assets/admin/images/icons/dark/pencil.png" alt=""></a>
            <a href="admin/post/delete/<?=$_GET['type']?>?listid=<?=$value['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;" title="" class="smallButton tipS" original-title="Xóa bài viết"><img src="assets/admin/images/icons/dark/close.png" alt=""></a>
        </td>
      </tr>
         <?php } ?>
    </tbody>
  </table>
</div>
</form>  

<div class="paging"><?=$paging?></div>