<?php
function getImageMap($address,$width='600',$height='300',$zoom='11')
{
$url='http://maps.googleapis.com/maps/api/staticmap?key=AIzaSyBk7x7OmesJeCensKX8yEbjVmOQ5-KWq8w&center='.$address.'&zoom='.$zoom.'&scale=false&size='.$width.'x'.$height.'&maptype=roadmap&format=png&visual_refresh=true&markers=color:red%7Clabel:.%7Cshadow:true%7C'.$address;
return $url;
}
?>
<a href="lien-he.html"><img src="<?=getImageMap($row_setting['toado'],600,300,16)?>" title="<?=$row_setting['diachi_'.$lang]?>" /></a>