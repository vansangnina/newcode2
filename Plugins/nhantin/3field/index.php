<div class="nhantin">
<h2>Trà sữa Ban Mai</h2>
<div class="hotline">Hotline : <span><?=$row_setting['hotline']?></span></div>
<div class="mota">Đăng ký ngay để Order được hường giảm giá đặc biệt</div>
<form action="" method="post" name="dangkymail" class="dangkymail">
    <input name="email" type="text" class="input" placeholder="<?=_nhapemail?> . ">
    <input name="dienthoai" type="text" class="input" placeholder="<?=_nhapdienthoai?> . ">
    <input name="noidung" type="text" class="input" placeholder="<?=_nhapnoidung?> . ">
    <button id="gui" type="button"><?=_dangky?></button>
</form>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#gui').click(function(event) {
      var email = $('.dangkymail input[name=email]').val();
      var dienthoai = $('.dangkymail input[name=dienthoai]').val();
      var noidung = $('.dangkymail input[name=noidung]').val();
      if(email==''){
        alert('Bạn chưa nhập email');
        $('.dangkymail input').focus();
      } else {
        $.ajax ({
          type: "POST",
          url: "ajax/dangky_email.php",
          data: {email:email,dienthoai:dienthoai,noidung:noidung},
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