<div class="title"><h4><?=_lienhebachdon?></h4></div>
<div id="lienhe_bottom">
  <h5><?=_vuilongdiendayduthongtin?></h5>
  <form method="post" name="frm_bottom" action="lien-he.html" enctype="multipart/form-data">
    <fieldset>
      <p><input name="ten" type="text" class="tflienhe validate[required]" id="ten" placeholder="<?=_hovaten?> *" /></p>
      <p><input name="dienthoai" type="text" class="tflienhe validate[required,minSize[10],maxSize[12],custom[integer]]" id="dienthoai" placeholder="<?=_dienthoai?> *" /></p>
      <p><input name="email" type="text" class="tflienhe validate[required,custom[email]]" id="email" placeholder="Email *" /></p>
      <p><textarea name="noidung" cols="20" rows="5" class="ta_noidung validate[required]" id="noidung" placeholder="<?=_noidung?> *" ></textarea></p>
      <p><button type="submit"><?=_guilienhe?></button></p> 
    </fieldset>              
  </form>
</div>