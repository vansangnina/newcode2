<link href="assets/js/magiczoomplus/magiczoomplus.css" rel="stylesheet" type="text/css" media="screen"/>
<script src="assets/js/magiczoomplus/magiczoomplus.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function() {
      $('.dathat_detail,.btn_muahang').click(function(e) {
        var pid = $(this).data('id');
        var type = $(this).data('type');

        var soluong = $('#soluong').val();
        if(soluong <= 0){
          alert(<?=_banchuachonsoluong?>);
          return false;
        }

        var size = $('#sizes li.active').data('id');
        if(!size && $('#sizes li').length>0){
          alert('<?=_banchuachonsize?>!' );
          return false;
        }

        var mausac = $('#mausacs li.active').data('id');
        if(!mausac && $('#mausacs li').length>0){
          alert('<?=_banchuachonmausac?> !' );
          return false;
        }

        $.ajax({
          type: "POST",
          url: "Ajax/Cart.php", 
          data: {pid:pid,soluong:soluong,mausac:mausac,size:size,act:'add'},
          success: function(string){
            var getData = $.parseJSON(string);   
            var result = getData.result_giohang;
            var count = getData.count;
            if(result > 0) {    
              alert('<?=_dathemgiohang?>');
              if(type=='muangay'){
                  window.location.href="thanh-toan.html"; 
              } else {
                    $('.info_cart').html(getData.html);
                    $('html,body').animate({scrollTop:0},500);
                    $('.add-to-cart-success').animate({top:'35px',opacity:1},1000);
              }
            }
            else if (result == -1) alert('<?=_sanphamkhongtontai?>');
            else if (result == 0) { 
              alert('<?=_dacongthemgiohang?>'); 
              if(type=='muangay'){
                  window.location.href="thanh-toan.html"; 
              } else {
                  $('.info_cart').html(getData.html);
                  $('html,body').animate({scrollTop:0},500);
                  $('.add-to-cart-success').animate({top:'35px',opacity:1},1000);
              }     
            }
          }          
        });
      });

      $('#tabs li a').click(function(event) {
        /* Act on the event */
        $('#tabs li').removeClass('active');
        $(this).parent().addClass('active');
        var id = $(this).attr('href');
        $('.tab_hidden').slideUp(500);
        $('#'+id).slideDown(500);
        return false;
      });

      $('#mausacs li,#sizes li').click(function(event) {
        /* Act on the event */
        $(this).parent().find('li').removeClass('active');
        $(this).addClass('active');
      });

      $('.giam_sl').click(function(event) {
          /* Act on the event */
          var soluong = parseInt($('#soluong').val());
          if(soluong>1){
              soluong = soluong-1;
          }
          $('#soluong').val(soluong);
      });

      $('.tang_sl').click(function(event) {
          /* Act on the event */
          var soluong = parseInt($('#soluong').val());
          if(soluong<100){
              soluong = soluong+1;
          }
          $('#soluong').val(soluong);
      });

      $('.owl_carousel_detail').owlCarousel({
          loop:false,
          margin:10,
          responsiveClass:true,
          responsive:{
              0:{
                  items:2,
                  nav:true
              },
              600:{
                  items:4,
                  nav:true
              },
              1000:{
                  items:6,
                  nav:true,
              }
          }
    })

  });
</script>
<div id="info">
<div id="sanpham">
<div class="clear"></div>
<div class="thanh_title" style="margin-bottom:40px;"><h2><?=$title_detail?></h2> </div>
<div class="khung_pro">
    <div class="row">
         <div class="frame_images col-md-6 col-sm-6 col-xx-12 col-xs-12" >
                <div class="app-figure" id="zoom-fig">
                <a href="<?=_upload_product_l.$this->model->row_detail['photo']?>" id="Zoom-1" class="MagicZoom" title="<?=$this->model->row_detail['name_'.$lang]?> .">
                <img src="<?=_upload_product_l.$this->model->row_detail['photo']?>" alt="<?=$this->model->row_detail['name_'.$lang]?>" width="250" /></a></div>
                <div class="selectors">
                  <ul class="owl_carousel_detail ul">
                      <li><a  data-zoom-id="Zoom-1" href="<?=_upload_product_l.$this->model->row_detail['photo']?>" data-image="<?=_upload_product_l.$this->model->row_detail['photo']?>"> <img u="image" src="<?=_upload_product_l.$this->model->row_detail['thumb']?>"  /></a> </li>
                      <?php for($i=0,$count_ch=count($this->model->photos);$i<$count_ch;$i++){?>
                          <li><a  data-zoom-id="Zoom-1" href="<?=_upload_cate_l.$this->model->photos[$i]['photo']?>" data-image="<?=_upload_cate_l.$this->model->photos[$i]['photo']?>"> <img u="image" src="<?=_upload_cate_l.$this->model->photos[$i]['thumb']?>"  height="" /></a>  </li>
                      <?php } ?>
                  </ul>
                </div>
         </div>

         <ul class="khung_thongtin col-md-6 col-sm-6 col-xx-12 col-xs-12 ul">
                <li><h1><?=$this->model->row_detail['name_'.$lang]?></h1></li>
                <li>
                <span class="luotxem"><i class="fas fa-eye"></i> <?=$this->model->row_detail['view']?> <?=_luotxemsanpham?></span> |<span class="luotmua"> <i class="fas fa-cart-plus"></i> <?=$luotmua['tong']?> <?=_luotmua?></span>
                
              </li>
                <li class="masp"><b><?=_masp?> :</b> <?=$this->model->row_detail['code']?></li>
                <?php if($this->model->row_detail['oldprice']){?><li class="giacu_detail"><b><?=_giacu?>:</b> <?=$func->giaban($this->model->row_detail['oldprice'])?></li><?php } ?>
                <li class="gia_detail"><b><?=_giaban?> :</b> <?=$func->giaban($this->model->row_detail['price'])?></li>
                <li class="mota_detail"><?=$this->model->row_detail['description_'.$lang]?></li>
                <?php if($config['setup']['cart']=='true'){?>
                <li>
                  <?php if(is_array($attributes['size'])){?>
                  <div class="size_detail">
                    <label><?=_size?> : </label>
                    <ul id="sizes" class="ul">
                    <?=$func->exarray('size',$this->model->row_detail['attributes'])?>
                    </ul>
                  </div>
                  <?php } ?>
                  <?php if(is_array($attributes['mausac'])){?>
                  <div class="mausac_detail">
                    <label><?=_mau?> : </label>
                    <ul id="mausacs" class="ul">
                    <?=$func->exarray('mausac',$this->model->row_detail['attributes'])?>
                    </ul>
                  </div>
                  <?php } ?>

                  <div class="soluong_detail">
                    <label><?=_soluong?> : </label>
                    <div class="input-group bootstrap-touchspin">
                    <span class="input-group-btn giam_sl"><button class="btn btn-default bootstrap-touchspin-down" type="button">-</button></span>
                    <input id="soluong" type="tel" name="soluong" value="1" min="1" max="100" class="form-control" style="display: block;">
                    <span class="input-group-btn tang_sl"><button class="btn btn-default bootstrap-touchspin-up" type="button">+</button></span></div>
                  </div>
                </li>

                <li>
                  <div class="dathat_detail" data-id="<?=$this->model->row_detail['id']?>" data-type=""><p><?=_dathang?></p><span>( <?=_giaohangmienphitaitphcm?> )</span></div>
                </li>
                <li class="huongdan_detail"><a href="#huongdanModal" data-toggle="modal" data-placement="bottom" title="<?=_huongdanmuahang?>" class="huongdan"> <i class="fas fa-question"></i><?=_huongdanmuahang?></a></li>
                <?php } ?>
                <li>
                  <?=\Library\Addthis::share()?>
                </li>
                <?php if($this->model->row_detail["tags"]!=''){?>
                <li>Tags: &nbsp; <?=$func->show_tags($this->model->row_detail["tags"])?></li>
                <?php }?>
        </ul>
    </div>
</div> 

<div id="container_product">
    <div >
          <ul class="ul" id="tabs">
              <li class="active"><a href="tab-1"><?=_chitietsanpham?></a></li>
          </ul>
          <div class="clear"></div>
          <div id="tab-1" class="tab_hidden active">
              <div class="noidung_ta">
                <?=$this->model->row_detail['content_'.$lang]?>
                <div class="clear"></div>
                <?=\Library\Facebook::comment()?>
              </div>
          </div>
    </div>
</div>

<div class="sanpham_khac">
<div class="thanh_title"><h2><?=_sanphamkhac?></h2></div>
<div class="clear"></div>
<ul class="khung_sp ul">
    <?php if(count($this->model->data)!=0){?>
        <?php foreach ($this->model->data as $key => $value) {?>
        <li class="item">
          <a class="effect-v3 img" href="<?=$this->model->com?>/<?=$value['slug']?>.html"><img src="<?=_upload_product_l.'259x230x1/'.$value['photo']?>" alt="<?=$value['ten_'.$lang]?>" /></a>
          <h3><a href="<?=$this->model->com?>/<?=$value['slug']?>.html"><?=$value['name_'.$lang]?></a></h3>
          <p class="giaban"><?=_gia?> : <span><?=$func->giaban($value['price'])?></span></p>
        </li>
        <?php } ?>
    <?php } else { ?>
        <li style="text-align:center; color:#e91678; font-size:14px; text-transform:uppercase;"> <?=_chuacosanphamchomucnay?> . </li>
    <?php }?>
</ul>
</div>
</div></div>

<div id="huongdanModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?=_huongdanmuahang?></h4>
      </div>
      <div class="modal-body">
        <?=$this->model->chinhsach['content_'.$lang]?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?=_dong?></button>
      </div>
    </div>
  </div>
</div>  