<div class="nhantin">
<form action="" method="post" name="dangkymail" class="dangkymail">
    <input name="email" type="text" class="input" placeholder="<?=_nhapemail?> . ">
    <button id="gui" type="button"><?=_dangky?></button>
</form>
<p><?=_nhanthongtin?></p>
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