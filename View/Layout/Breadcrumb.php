<?php
	$row_detail_list  =  $db->row("select * from #_cate_list where id='".$row_detail['id_list']."'");
	$row_detail_cat  =  $db->row("select * from #_cate_cat where id='".$row_detail['id_cat']."'");
?>
<script type="text/javascript">
$(document).ready(function(){
	$('.cont-filter-attr input').click(function(){
		$('.cont-filter-attr input:checked').each(function(){
			var checkedValue = $(this).val();
			if(checkedValue){
				var id = $(this).val();
				link = link+''+id;
			}
		});
		window.location.href=link;
	});
});
</script>

<div class="dieuhuong">  

    <a href="trang-chu.html" itemprop="url" title="<?=_trangchu?>"><span itemprop="title"><?=_trangchu?></span></a>
    <a href="<?=$com?>.html" itemprop="url" title="<?=$title_detail?>"><span itemprop="title"><?=$title_com?></span></a>
    
	<?php if($row_detail_list['id']!=''){?>
		<a title="<?=$row_detail_list['name_'.$lang]?>" itemprop="url" href="<?=$com?>/<?=$row_detail_list['slug']?>"><span itemprop="title"><?=$row_detail_list['name_'.$lang]?></span></a>
	<?php } ?>

	<?php if($row_detail_cat['id']!=''){?>
		<a title="<?=$row_detail_cat['name_'.$lang]?>" itemprop="url" href="<?=$com?>/<?=$row_detail_list['slug']?>/<?=$row_detail_cat['slug']?>"><span itemprop="title"><?=$row_detail_cat['name_'.$lang]?></span></a>
	<?php } ?>

	<?php if($row_detail_item['id']!=''){?>
	<a title="<?=$row_detail_item['name_'.$lang]?>" itemprop="url" href="<?=$com?>/<?=$row_detail_list['slug']?>/<?=$row_detail_cat['slug']?>/<?=$row_detail_item['slug']?>"><span itemprop="title"><?=$row_detail_item['name_'.$lang]?></span></a>
	<?php } ?>

	<a title="<?=$row_detail['name_'.$lang]?>" itemprop="url" href="<?=$com?>/<?=$row_detail['slug']?>.html"><span itemprop="title"><?=$row_detail['name_'.$lang]?></span></a>
</div>
