<div class="nhantin">
<div class="thanh_bt"><h4>Đăng ký nhận tin</h4></div>
<form action="" method="post" name="dangkymail" class="dangkymail">
    <label>ĐĂNG KÍ NHẬN TIN KHUYẾN MÃI</label>
    <p>Điền thông tin địa chỉ email của bạn để nhận được thông tin khuyến mãi mới nhất từ Shop!</p>
    <input name="email" type="text" class="input" placeholder="<?=_nhapemail?> . ">
    <button id="gui" type="button">Đăng ký</button>
</form>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#gui').click(function(event) {
      var email = $('.dangkymail input').val();
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