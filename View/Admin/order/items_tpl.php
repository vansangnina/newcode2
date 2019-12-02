<?php
	$arr_color = array(4=>"#174b79",5=>"#04bfaf",6=>"#2aa902",7=>"#ff0000");

  $giasearch = \Library\ClassPDO::query("select id,name_$lang,attributes from #_title where type='khoangia' order by id");
  $httt_sr = \Library\ClassPDO::query("select id,name_$lang from #_title where type='httt'  order by id");
  $tinhtrang_sr = \Library\ClassPDO::query("select id,name_$lang from #_title where type='tinhtrangdh' order by id");
?>
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	  <li><a href="admin/order/man"><span>Đơn hàng</span></a></li>
            <li class="current"><a href="#" onclick="return false;">Tất cả</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>

<script src="assets/admin/js/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $(".datetimepicker").datetimepicker({
      yearOffset:222,
      lang:'ch',
      timepicker:false,
      format:'m/d/Y',
      formatDate:'Y/m/d',
      minDate:'-1970/01/02', // yesterday is minimum date
      maxDate:'+1970/01/02' // and tommorow is maximum date calendar
    });
  });
</script>

<div class="widget">
  <div class="titlee" style="padding-bottom:5px;">

    <div class="timkiem" >
    <form name="search" action="index.html" method="GET" class="form giohang_ser">
      <input name="com" value="order" type="hidden"  />
      <input name="act" value="man" type="hidden" />
      <input name="p" value="<?=($_GET['p']=='')?'1':$_GET['p']?>" type="hidden" />

      <input class="form_or" name="keyword" placeholder="Nhập từ khóa.." value="<?=$_GET['keyword']?>" type="text" />
      <input class="form_or" name="ngaybd" id="datefm" type="text" value="<?=$_GET['ngaybd']?>" placeholder="Từ ngày.."/>
      <input class="form_or" name="ngaykt" id="dateto" type="text" value="<?=$_GET['ngaykt']?>" placeholder="Đến ngày.." />

      <select name="sotien">
      <option value="0">Chọn giá</option>
        <?php 
          for ($i=0,$count=count($giasearch); $i < $count; $i++) { 
          $kgia = json_decode($giasearch[$i]["attributes"],true);
          $kg = str_replace(',','',$kgia['giatu']).'-'.str_replace(',','',$kgia['giaden']);
        ?>
          <option value="<?=$kg?>" <?php if($kg ==$_GET['sotien']) echo "selected='selected'";?> >
            <?=$giasearch[$i]["name_".$lang]?>
          </option>
        <?php }?>
      </select>
      <select name="httt">
      <option value="0">Hình thức thanh toán</option>
        <?php for ($i=0,$count=count($httt_sr); $i < $count; $i++) {  ?>
          <option value="<?=$httt_sr[$i]["id"]?>" <?php if($httt_sr[$i]["id"]==$_GET['httt']) echo "selected='selected'";?>>
            <?=$httt_sr[$i]["name_".$lang]?>
          </option>
        <?php }?>
      </select>
      <select name="tinhtrang">
      <option value="0">Tình trạng</option>
        <?php for ($i=0,$count=count($tinhtrang_sr); $i < $count; $i++) { ?>
          <option value="<?=$tinhtrang_sr[$i]["id"]?>" <?php if($tinhtrang_sr[$i]["id"]==$_GET['tinhtrang']) echo "selected='selected'";?> >
            <?=$tinhtrang_sr[$i]["name_".$lang]?>
          </option>
        <?php }?>
      </select>
      <input type="submit" class="blueB" value="Tìm kiếm" style="width:100px; margin:0px 0px 0px 10px;"  />
    </form>
    </div><!--end tim kiem-->
  </div>
</div>

<script language="javascript">
	function CheckDelete(l){
		if(confirm('Bạn có chắc muốn xoá đơn hàng này?'))
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
					
</script>
<form name="f" id="f" method="post">
<div class="control_frm" style="margin-top:0;">
  	<div style="float:left;">
        <input type="button" class="blueB" value="Xoá" onclick="ChangeAction('admin/order/man?multi=del');return false;" />
    </div>  

</div>
<div class="widget">
  <div class="title"><span class="titleIcon">
    <input type="checkbox" id="titleCheck" name="titleCheck" />
    </span>
    <h6>Danh sách đơn hàng</h6>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
       <td class="sortCol" width="120"><div>Mã đơn hàng<span></span></div></td>     
        <td class="sortCol"><div>Họ tên<span></span></div></td>
        <td class="sortCol" width="150"><div>Ngày đặt<span></span></div></td>
        <td width="150">Số tiền</td>
        <td width="150">Tình trạng</td>
        <td width="150">Thao tác</td>
      </tr>
    </thead>
    
    <tbody>
         <?php foreach ($this->model->data as $key => $value) {?>
          <tr>
       <td>
            <input type="checkbox" name="iddel[]" value="<?=$value['id']?>" id="check<?=$i?>" />
        </td>
        <td align="center" <?php if($value['view']==0){ echo "style='font-weight:bold;'";}?>>
            <?=$value['order_code']?>
        </td> 
        <td <?php if($value['view']==0){ echo "style='font-weight:bold;'";}?>>
               <?=$value['name']?>
        </td>
        <td align="center" <?php if($value['view']==0){ echo "style='font-weight:bold;'";}?>>
            <?=date('d/m/Y - g:i A',strtotime($value['datecreate']));?>
        </td>
      
        <td align="center" <?php if($value['view']==0){ echo "style='font-weight:bold;'";}?>>
           <?=number_format($func->get_tong_tien($value['id']),0, ',', '.')?>&nbsp;VNĐ
        </td>
       
        <td align="center" style="color:<?=$arr_color[$value['status']]?>; font-weight:bold" <?php if($value['view']==0){ echo "style='font-weight:bold;'";}?>>
          <?=$func->getname('title',$value['status'])?>
        </td>
       
        <td class="actBtns">
            <a target="_blank" href="Library/export_word.php?id=<?=$value['id']?>" title="" class="smallButton tipS" original-title="Xuất đơn hàng word">
            <img src="assets/admin/images/icons/dark/word.png" alt="">
            </a>
            <a target="_blank" href="Library/export.php?id=<?=$value['id']?>" title="" class="smallButton tipS" original-title="Xuất đơn hàng excel"><img src="assets/admin/images/icons/dark/excel.png" alt=""></a>
            <a href="admin/order/edit?id=<?=$value['id']?>" title="" class="smallButton tipS" original-title="Xem và sửa đơn hàng"><img src="assets/admin/images/icons/dark/preview.png" alt=""></a>
            <a href="" onclick="CheckDelete('admin/order/delete?id=<?=$value['id']?>'); return false;" title="" class="smallButton tipS" original-title="Xóa đơn hàng"><img src="assets/admin/images/icons/dark/close.png" alt=""></a>        </td>
      </tr>
         <?php } ?>
                </tbody>
  </table>
</div>
</form>               


<script type="text/javascript">
function onSearch(evt) {	
		var datefm = document.getElementById("datefm").value;	
		var dateto = document.getElementById("dateto").value;
		var status = document.getElementById("id_tinhtrang").value;		
		//var encoded = Base64.encode(keyword);
		location.href = "admin/order/man?datefm="+datefm+"&dateto="+dateto+"&status="+status;
		loadPage(document.location);
			
}
$(document).ready(function(){						
	var dates = $( "#datefm, #dateto" ).datepicker({
			defaultDate: "+1w",
			dateFormat: 'dd/mm/yy',
			changeMonth: true,			
			numberOfMonths: 3,
			onSelect: function( selectedDate ) {
				var option = this.id == "datefm" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" ),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date );
			}
		});
        
		});
		
</script>