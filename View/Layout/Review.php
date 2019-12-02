<?php
    $row = $db->query("select * from #_review where com='".$com."' and id_product='".$row_detail['id']."' order by id desc ");
    $row1 = $db->query("select * from #_review where com='".$com."' and id_product='".$row_detail['id']."' and star=1 ");
    $row2 = $db->query("select * from #_review where com='".$com."' and id_product='".$row_detail['id']."' and star=2 ");
    $row3 = $db->query("select * from #_review where com='".$com."' and id_product='".$row_detail['id']."' and star=3 ");
    $row4 = $db->query("select * from #_review where com='".$com."' and id_product='".$row_detail['id']."' and star=4 ");
    $row5 = $db->query("select * from #_review where com='".$com."' and id_product='".$row_detail['id']."' and star=5 ");
    $tongsao = 0;
    for($i=0;$i<count($row);$i++){
        $tongsao = $tongsao + $row[$i]['star'];
    }
    if(count($row)>0){ $num_star = round($tongsao/count($row),1); } else { $num_star = 0;}
    if(count($row1)>0){ $p1_sao = (count($row1)/count($row))*100; } else { $p1_sao = 0;}
    if(count($row2)>0){ $p2_sao = (count($row2)/count($row))*100; } else { $p2_sao = 0;}
    if(count($row3)>0){ $p3_sao = (count($row3)/count($row))*100; } else { $p3_sao = 0;}
    if(count($row4)>0){ $p4_sao = (count($row4)/count($row))*100; } else { $p4_sao = 0;}
    if(count($row5)>0){ $p5_sao = (count($row5)/count($row))*100; } else { $p5_sao = 0;}

?>
<div id="module_product_review" class="pdp-block module">
      <div class="pdp-mod-review" data-spm="ratings_reviews">
          <div>
              <div class="mod-title">
                  <h2 class="pdp-mod-section-title outer-title"><?=_danhgiavanhanset?> " <?=$row_detail['name_'.$lang]?> " </h2>
              </div>
              <div class="mod-rating">
                  <div class="content">
                      <div class="left">
                          <div class="summary">
                              <div class="score"><span><?=$num_star?></span> <?=_tren?> 5 </div>
                              <div class="average">
                                  <div class="container-star " style="width:166.25px;height:33.25px">
                                    <?=$func->count_star($num_star)?>
                                  </div>
                              </div>
                              <div class="count"><?=count($row)?> <?=_danhgia?></div>
                          </div>
                          <div class="detail">
                              <ul class="ul">
                                  <li><span><span class="star-number">5</span><?=_sao?></span><span class="progress-wrap"><div class="pdp-review-progress"><div class="bar bg"></div><div class="bar fg" style="width:<?=$p5_sao?>%"></div></div></span><span class="percent"><?=count($row5)?></span></li>
                                  <li><span><span class="star-number">4</span><?=_sao?></span><span class="progress-wrap"><div class="pdp-review-progress"><div class="bar bg"></div><div class="bar fg" style="width:<?=$p4_sao?>%"></div></div></span><span class="percent"><?=count($row4)?></span></li>
                                  <li><span><span class="star-number">3</span><?=_sao?></span><span class="progress-wrap"><div class="pdp-review-progress"><div class="bar bg"></div><div class="bar fg" style="width:<?=$p3_sao?>%"></div></div></span><span class="percent"><?=count($row3)?></span></li>
                                  <li><span><span class="star-number">2</span><?=_sao?></span><span class="progress-wrap"><div class="pdp-review-progress"><div class="bar bg"></div><div class="bar fg" style="width:<?=$p2_sao?>%"></div></div></span><span class="percent"><?=count($row2)?></span></li>
                                  <li><span><span class="star-number">1</span><?=_sao?></span><span class="progress-wrap"><div class="pdp-review-progress"><div class="bar bg"></div><div class="bar fg" style="width:<?=$p1_sao?>%"></div></div></span><span class="percent"><?=count($row1)?></span></li>
                              </ul>
                          </div>
                      </div>
                      <div class="right"><button type="button" data-toggle="modal" data-target="#myModal" class="next-btn next-btn-primary next-btn-medium btn-rate"><?=_danhgiasanphamnay?></button></div>
                  </div>
                  <div class="dialog"></div>
              </div>
          </div>
      </div>

      <div id="id_reviews">
        <div class="title_reviews"><?=_nhansetvesanphamnay?></div>
        <?php for($i=0;$i<count($row);$i++){?>
        <div class="item_re">
          <div class="top_review">
              <div class="starCtn"><?=$func->count_star($row[$i]['star'])?></div>
              <span class="title"><?=$row[$i]['name']?> </span><span class="right"> ( <?=date('d-m-Y H:i',strtotime($row[$i]['datecreate']))?> )</span>
          </div>
          <div class="content_view"><i class="fas fa-align-center"></i> <?=$row[$i]['content']?></div>
          <div class="bottom_review" data-id="<?=$row[$i]['id']?>" data-table="review">
            <span class=""><i class="fas fa-thumbs-up"></i> <?=_co?> <span class="load_count"><?=$func->count_like('review',$row[$i]['id'])?></span> <?=_nguoithaynhanxetnayhuuich?></span>
          </div>
        </div>
        <?php } ?>

      </div>


  </div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#rating-input-2').rating({
          min: 0,
          max: 5,
          step: 1,
          size: 'lg',
          showClear: false,
          displayOnly: true
      });
      $('#frm-rating').submit(function(event) {
        var star = $('#rating-input').val();
        var content = $('#rating-content').val();
        var fullname = $('#rating-name').val();
        var proid = $('#rating-id').val();
        var com = $('#rating-com').val();
        if(!star || !content || !fullname){
          alert('<?=_noidungdanhgiakhongduocrong?> . ');
        } else {
          $.ajax({
                type:'POST',
                url:'Ajax/ajax.php',
                data:{star:star,content:content,fullname:fullname,act:'rating',id_product:proid,iduser:'',com:com},
                success: function(result) {
                  if(result==0){
                    alert("<?=_camonbandaphanhoichucbanmotnaylamviecvuive?> ! ");
                    $('#myModal').modal('hide');
                  }
                  if(result==2){
                    alert("<?=_luudulieubiloivuilongquaylaisau?> ");
                    $('#myModal').modal('hide');
                  }
                  if(result==3){
                    alert("<?=_banchicothedanhgia1sanpham1landuynhat?>");
                    $('#myModal').modal('hide');
                  }
                }
          });
        }
        return false;
      });

      $('.bottom_review').click(function(event) {
        var swap = $(this);
        var tbl = $(this).data('table');
        var id_product = $(this).data('id');
        $.ajax({
              type:'POST',
              url:'Ajax/ajax.php',
              data:{tbl:tbl,id_product:id_product,act:'like',iduser:''},
              success: function(result) {
                if(result!=0){
                  swap.find('.load_count').html(result);
                }
              }
        });
        return false;
      });

  });
</script>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?=_danhgiasanpham?></h4>
      </div>
      <div class="modal-body">
        <form action="" id="frm-rating" method="get" name="danhgia_tour">
	          <h2><?=_danhgia?> " <?=$row_detail['name_'.$lang]?> " </h2>
	          <div id="thanhvien_review">
	            <img src="_upload_thanhvien_l" alt="" width="50" />
	            <h3></h3>
	          </div>
	          <input value="4" type="number" id="rating-input" class="rating" min=0 max=5 step=1 data-size="lg">

            <div class="form-group form-group-lg ">
               <div class="input-group">
                  <div class="input-group-addon"><i class="far fa-user"></i></div>
                  <input name="hoten" class="validate[required] form-control" id="rating-name" placeholder="<?=_nhaptenban?>" />
               </div>
            </div>

	          <div class="form-group form-group-lg ">
	             <div class="input-group">
	                <div class="input-group-addon"><i class="fas fa-font"></i></div>
	                <textarea name="mota" id="rating-content" class="validate[required] form-control" placeholder="<?=_nhapnoidungdanhgia?>"></textarea>
	             </div>
	          </div>
	          <input type="submit" name="danhgia" value="<?=_danhgia?>" class="review_button" />
            <input type="hidden" name="rating-id" id="rating-id" value="<?=$row_detail['id']?>" />
            <input type="hidden" name="rating-com" id="rating-com" value="<?=$com?>" />
	    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?=_dong?></button>
      </div>
    </div>

  </div>
</div>	