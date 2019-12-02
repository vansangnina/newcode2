<div class="nhantin">
<h4><?=_dangkynhantin?></h4>
<form action="" method="post" name="dangkymail" class="dangkymail">
    <input name="hoten" type="text" class="input" placeholder="<?=_nhaphoten?> . ">
    <input name="email" type="text" class="input" placeholder="<?=_nhapemail?> . ">
    <textarea name="noidung" placeholder="<?=_nhapnoidung?>"></textarea>
    <button id="gui" type="button"><?=_dangky?></button>
</form>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#gui').click(function(event) {
      var email = $('.dangkymail input[name=email]').val();
      var hoten = $('.dangkymail input[name=hoten]').val();
      var noidung = $('.dangkymail textarea[name=noidung]').val();
      if(hoten==''){
        alert('<?=_banchuanhaphoten?>');
        $('.dangkymail input[name=hoten]').focus();
      } else if(email==''){
        alert('<?=_banchuanhapemail?>');
        $('.dangkymail input[name=email]').focus();
      } else if(noidung==''){
        alert('<?=_banchuanhapnoidung?>');
        $('.dangkymail textarea[name=noidung]').focus();
      } else {
        $.ajax ({
          type: "POST",
          url: "Ajax/dangky_email.php",
          data: {act:'dangkymail',email:email,hoten:hoten,noidung:noidung},
          success: function(result) { 
            if(result==0){
              $('.dangkymail input').attr('value','');
              alert('<?=_dangkythanhcong?> ! ');
              $('.dangkymail input').attr('value','');
            } else if(result==1){
              alert('<?=_emaildaduocdangky?> ! ');
              $('.dangkymail input').attr('value','');
            } else if(result==2){
              alert(' ! <?=_dangkykhongthanhcongvuilongthulai?> ');
            }
          }
        });
      }
      return false;
    });
  });
</script>