<?php
  $db->bindMore(array("shows"=>1,"type"=>"tintuc","highlight"=>0));
  $tintuc_nb  =  $db->query("select name_$lang,id,slug,thumb,datecreate,photo,description_$lang,view,dateupdate from #_post where shows=:shows and type=:type and highlight!=:highlight order by number,id desc limit 0,4");

  $title_content = $db->row("select * from #_info where type='ndtintuc' ");
?>
<div class="thanh_title">
<h4><?=$title_content['name_'.$lang]?></h4>
<p><?=$title_content['content_'.$lang]?></p>
</div>
<div class="news_hot">
  <ul class="hotnew ul">
  <?php for($i=0,$count_tt=count($tintuc_nb);$i<$count_tt;$i++){
    if($i==0){ $thumb = '587x387x1/'; $name = $func->catchuoi($tintuc_nb[$i]['name_'.$lang],60);}
    if($i==1){ $thumb = '280x180x1/'; $name = $func->catchuoi($tintuc_nb[$i]['name_'.$lang],20);}
    if($i==2){ $thumb = '280x180x1/'; $name = $func->catchuoi($tintuc_nb[$i]['name_'.$lang],20);}
    if($i==3){ $thumb = '587x180x1/'; $name = $func->catchuoi($tintuc_nb[$i]['name_'.$lang],60);}
  ?> 
      <li>
        <a href="tin-tuc/<?=$tintuc_nb[$i]['slug']?>.html"><img src="<?=_upload_post_l.$thumb.$tintuc_nb[$i]['photo']?>" alt="<?=$tintuc_nb[$i]['name_'.$lang]?>" /></a>
        <div class="nd_new">
            <h3><a href="tin-tuc/<?=$tintuc_nb[$i]['slug']?>.html"><?=$name?></a></h3>
            <p> <span><i class="fas fa-calendar-alt"></i> <?=date('d-m-Y',strtotime($tintuc_nb[$i]['dateupdate']))?></span> <span><i class="fas fa-eye"></i> (<?=$tintuc_nb[$i]['view']?>)</span> </p>
        </div>
      </li>
  <?php } ?>
  </ul>
</div>