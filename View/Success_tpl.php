
<style>
#sanpham p{
	padding-left:20px;
	color:rgba(0,102,153,1);
	padding-top:5px;
}
.donhang_ht li{ padding: 10px 0px 10px 0px; }
.donhang_ht b{ font-size: 20px; color:#DC0000; }
</style>
<div id="info">
<div id="sanpham">

<div class="thanh_title"><h2><?=$this->model->titleDetail?></h2></div>
     
<div class="dathang_tc">
    <div style="clear:left;"></div>
    <div class="col-md-3 col-sm-3 col-xx-3 col-xs-12">
    <?php if($error==0){?>
         <img src="Assets/images/icon/tick-512.png" alt="" />
    <?php } else { ?>
    	<img src="Assets/images/icon/2000px-Warning_icon.svg.png" alt="" />
    <?php } ?>
    </div>
   
    
    <ul class="donhang_ht ul col-md-9 col-sm-9 col-xx-9 col-xs-12" style="padding-left:30px;">
        <li><h2><?=$thongbao?></h2></li>
        <li>Mã số đơn hàng của bạn là : <b><?=$this->model->madonhang?></b></li>
        <li>Để theo dõi trạng thái đơn hàng xin vui lòng vào " Kiểm tra email "</li>
        <li><a href="./" class="muatiep">Tiếp tục mua hàng</a></li>
        <li>Điện thoại hổ trợ mua hàng : <span><?=$this->hotline?></span></li>
    </ul>
    
    <p></p>
</div>

</div>
</div>