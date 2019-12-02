<?php
    $db->bindMore(array("shows"=>1,"type"=>"camnhan"));
    $tintuc_nb  =  $db->query("select name_$lang,id,slug,thumb,datecreate,photo,description_$lang from #_post where shows=:shows and type=:type order by number,id desc");
?>
<div class="thanh_title"><h4 style="color:#fff">Cảm nhận khách hàng</h4></div>
<div class="kh_item">
<ul class="kh_owl ul">
<?php for($i=0,$count_tt=count($tintuc_nb);$i<$count_tt;$i++){  ?> 
  <li>
    <div class="img"><img src="<?=_upload_post_l.'140x140x1/'.$tintuc_nb[$i]['photo']?>" alt="<?=$tintuc_nb[$i]['ten_'.$lang]?>" /></div>
    <h3><?=$tintuc_nb[$i]['name_'.$lang]?></h3>
    <p><?=$tintuc_nb[$i]['description_'.$lang]?></p>
  </li>
<?php } ?>
</ul>
</div>

<script type="text/javascript">
    $(document).ready(function(e) {
        $('.kh_owl').owlCarousel({
            loop:true,
            margin:20,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:2,
                    nav:true
                },
                1000:{
                    items:2,
                    nav:true,
                }
            }
        })
    });
</script>