<?php
  $db->bindMore(array("type"=>"product","selling"=>0));
  $product  =  $db->query("select name_$lang,slug,photo,price,oldprice,id,thumb from #_product where shows=1 and type=:type and selling!=:selling order by number,id desc");

  $title_spkhac = $db->row("select * from #_info where type='ndspkhac' ");

  $title_thietke = $db->row("select * from #_info where type='ndthietke' ");
?>

<div class="spkhac">
    <div class="khac_owl none_control">
        <div class="item_khac">
            <h4><?=$title_spkhac['name_'.$lang]?></h4>
            <p><?=$title_spkhac['content_'.$lang]?></p>
            <div class="xemthem"><a href="san-pham.html"><?=_xemngay?></a></div>
        </div>

        <div class="item_khac">
            <h4><?=$title_thietke['name_'.$lang]?></h4>
            <p><?=$title_thietke['content_'.$lang]?></p>
            <div class="xemthem"><a href="thiet-ke.html"><?=_thamkhao?></a></div>
        </div>

        <div class="item_khac">
            <h4><?=_dangkytuvan?></h4>
            <p><input type="text" name="dangky" id="dktuvan" placeholder="<?=_nhapemaildangky?>" /></p>
            <div class="xemthem"><a href="san-pham.html"><?=_dangky?></a></div>
        </div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(e) {
        $('.khac_owl').owlCarousel({
            loop:false,
            margin:30,
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
                    items:3,
                    nav:true,
                }
            }
        })
    });
</script>
