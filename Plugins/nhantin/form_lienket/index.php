<?php 
  $db->bindMore(array("type"=>"link","shows"=>1));
  $lienket  =  $db->query("select * from #_link where shows=:shows and type=:type order by number,id desc");
?>
<div class="nhantin">
<div class="row">
  <div class="col-md-7 col-sm-6 col-xx-12 col-xs-12">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xx-12 col-xs-12">
        <h4>ĐĂNG KÝ NHẬN TIN TỪ CỬA HÀNG</h4>
        <p>Đăng ký ngay để Order được hường giảm giá đặc biệt</p>
      </div>
      <div class="col-md-6 col-sm-6 col-xx-12 col-xs-12">
        <form action="" method="post" name="dangkymail" class="dangkymail">
            <input autocomplete="off" name="email" type="text" class="input" placeholder="<?=_nhapemail?> . ">
            <button id="gui" type="button"></button>
        </form>
      </div>
    </div>
  </div>

  <div class="col-md-5 col-sm-5 col-xx-12 col-xs-12">
      <div class="lienket">
        
        <?php for($i=0;$i<count($lienket);$i++){?>
        <a href="<?=$lienket[$i]['link']?>" target="_blank"><img src="<?=_upload_hinhanh_l.$lienket[$i]['thumb']?>" alt="<?=$lienket[$i]['name_'.$lang]?>" /></a>
        <?php } ?>
        <h4>KẾT NỐI VỚI CHÚNG TÔI</h4>
      </div>
  </div>

</div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#gui').click(function(event) {
      var email = $('.dangkymail input[name=email]').val();
      if(email==''){
        alert('Bạn chưa nhập email');
        $('.dangkymail input').focus();
      } else {
        $.ajax ({
          type: "POST",
          url: "ajax/dangky_email.php",
          data: {email:email},
          success: function(result) { 
            if(result==0){
              $('.dangkymail input').attr('value','');
              alert('Đăng ký thành công ! ');
              $('.dangkymail input').attr('value','');
            } else if(result==1){
              alert('Email đã được đăng ký ! ');
              $('.dangkymail input').attr('value','');
            } else if(result==2){
              alert(' ! Đăng ký không thành công . Vui lòng thử lại ');
            }
          }
        });
      }
      return false;
    });
  });
</script>