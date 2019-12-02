<?php
  $db->bindMore(array("shows"=>1,"type"=>"thongtin"));
  $item  =  $db->query("select name_$lang,description_$lang,slug,thumb from #_baiviet where shows=:shows and type=:type order by number,id desc");
?>
<div id="chonchungtoi">
  <div class="margin_auto">
    <div class="row_chonchungtoi">
      <div class="left_chon"> 
        <h4>Vì sao <span>chọn chúng tôi</span></h4>
        <ul>
        <?php for($i=0;$i<count($item);$i++){?>
            <li>
                <i class="fa fa-<?=$item[$i]['icon']?>"></i>
                <h3><?=$item[$i]['name_'.$lang]?></h3>
                <p><?=$item[$i]['description_'.$lang]?></p>
            </li>
        <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</div>