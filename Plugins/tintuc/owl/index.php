<?php
    $db->bindMore(array("shows"=>1,"type"=>"tintuc","highlight"=>0));
    $tintuc_nb  =  $db->query("select name_$lang,id,slug,thumb,datecreate,photo,description_$lang from #_post where shows=:shows and type=:type and highlight!=:highlight order by number,id desc");

    $title_content = $db->row("select * from #_info where type='ndtintuc' ");
?>

<div class="thanh_title"><h4><?=$title_content['name_'.$lang]?></h4>
<p><?=$title_content['content_'.$lang]?></p>
</div>
<div class="tintuc_hot">
  <ul class="hotnew ul">
  <?php for($i=0,$count_tt=count($tintuc_nb);$i<$count_tt;$i++){  ?> 
      <li>
        <a href="tin-tuc/<?=$tintuc_nb[$i]['slug']?>.html"><img src="<?=_upload_post_l.'308x240x1/'.$tintuc_nb[$i]['photo']?>" alt="<?=$tintuc_nb[$i]['name_'.$lang]?>" /></a>
        <div class="tt_new">
        <div class="ngaytao"><span><?=date('d',$tintuc_nb[$i]['datecreate'])?></span><span><?=date('M',$tintuc_nb[$i]['datecreate'])?></span></div>
        <h3><a href="tin-tuc/<?=$tintuc_nb[$i]['slug']?>.html"><?=$tintuc_nb[$i]['name_'.$lang]?></a></h3>
        <p><?=$func->catchuoi($tintuc_nb[$i]['discription_'.$lang],180)?></p>
        </div>
      </li>
  <?php } ?>
  </ul>
</div>

<script type="text/javascript">
    $(document).ready(function(e) {
        $('.hotnew').owlCarousel({
            loop:true,
            margin:20,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                425:{
                    items:2,
                    nav:true
                },
                768:{
                    items:3,
                    nav:true
                },
                1000:{
                    items:4,
                    nav:true,
                }
            }
        })
    });
</script>