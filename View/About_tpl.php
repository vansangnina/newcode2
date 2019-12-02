<div id="info">
    <div id="sanpham">    
    <div class="thanh_title"><h2><?=\Library\Ctrl::router()->title?></h2> </div>  
      <div class="khung">
      <div class="clear"></div>
      <div class="noidung"><?=$this->model->content()?></div>
      <div class="clear"></div>
    </div>
    </div>
  </div>
  <h1 class="visit_hidden"><?=$row_setting['name_'.$lang]?></h1>