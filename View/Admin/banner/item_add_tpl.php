<?php
    if(_width_thumb < 800){
      $rong = _width_thumb;
      $cao = _height_thumb;
    } else {
      $rong = 800;
      $cao = '';
    }
?>
<div class="wrapper">

<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
          <li><a href="admin/banner/capnhat/<?=$_GET['type']?>"><span>Quản lý <?=$type->title?></span></a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>

<form name="supplier" id="validate" class="form" action="admin/banner/save/<?=$_GET['type']?>" method="post" enctype="multipart/form-data">
  <div class="widget">

    <div class="title chonngonngu">
    <ul>
    <?php foreach ($config['lang'] as $key => $value) {?>
      <li><a href="<?=$key?>" class="<?php if($config['activelang']==$key){ echo "active";}?> tipS" title="Chọn <?=$value?>"><img src="assets/admin/images/<?=$key?>.png" /><?=$value?></a></li>
    <?php } ?>
    </ul>
    </div>  
    <?php foreach ($config['lang'] as $key => $value) {?>
    <div class="formRow lang_hidden lang_<?=$key?> <?php if($config['activelang']==$key){ echo "active";}?>" >
      <label>Tải banner :</label>
      <div class="formRight">
        <input type="file" id="file_<?=$key?>" name="file_<?=$key?>" />
        <img src="assets/admin/images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
        <div class="note"> width : <?php echo _width_thumb*$type->ratio;?> px , Height : <?php echo _height_thumb*$type->ratio;?> px </div>
      </div>
      <div class="clear"></div>
    </div>

    <div class="formRow lang_hidden lang_<?=$key?> <?php if($config['activelang']==$key){ echo "active";}?>">
      <label><?=$title_main?> Hiện Tại :</label>
      <div class="formRight">
      <div class="mt10">
         <object width="<?=$rong?>" height="<?=$cao?>"  codebase="http://active.macromedia.com/flash4/cabs/swflash.cab#version=4,0,0,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
              <param NAME="_cx" VALUE="13414">
              <param NAME="_cy" VALUE="6641">
              <param NAME="FlashVars" VALUE>
              <param NAME="Movie" VALUE="<?=_upload_hinhanh_l.$this->model->data['thumb_'.$key]?>">
              <param NAME="Src" VALUE="<?=_upload_hinhanh_l.$this->model->data['thumb_'.$key]?>">
              <param NAME="Quality" VALUE="High">
              <param NAME="AllowScriptAccess" VALUE>
              <param NAME="DeviceFont" VALUE="0">
              <param NAME="EmbedMovie" VALUE="0">
              <param NAME="SWRemote" VALUE>
              <param NAME="MovieData" VALUE>
              <param NAME="SeamlessTabbing" VALUE="1">
              <param NAME="Profile" VALUE="0">
              <param NAME="ProfileAddress" VALUE>
              <param NAME="ProfilePort" VALUE="0">
              <param NAME="AllowNetworking" VALUE="all">
              <param NAME="AllowFullScreen" VALUE="false">
              <param name="scale" value="ExactFit">
             <embed src="<?=_upload_hinhanh_l.$this->model->data['thumb_'.$key]?>" quality="High" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" width="<?=$rong?>" height="<?=$cao?>" scale="ExactFit"></embed>
            </object>
      </div>
      </div>
      <div class="clear"></div>
    </div>
    <?php } ?>

    <?php if(in_array('link',$type->config_open)){ ?>
        <div class="formRow">
            <label>Link liên kết:</label>
            <div class="formRight">
                <input type="text" id="code_pro" name="link" value="<?=$this->model->data['link']?>"  title="Nhập link liên kết cho hình ảnh" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>
        <?php }  ?>
      <?php if(in_array('hienthi',$type->config_open)){ ?>
        <div class="formRow">
          <label>Hiển thị : <img src="assets/admin/images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Bỏ chọn để không hiển thị danh mục này ! "> </label>
          <div class="formRight">
         
            <input type="checkbox" name="hienthi" id="check1" value="1" <?=(!isset($this->model->data['hienthi']) || $this->model->data['hienthi']==1)?'checked="checked"':''?> />
          </div>
          <div class="clear"></div>
        </div>
        <?php } ?>


      <div class="formRow">
      <div class="formRight">
              <input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
      </div>
      <div class="clear"></div>
    </div>
    
  </div>

</form></div>