<?php 
	$title_='Sitemap';
	$result_spl  =  $db->query("select id,slug,name_$lang from #_cate_list where shows=1 and  order by number,id desc");
	$result_dichvu  =  $db->query("select id,slug,name_$lang from #_post where shows=1 and type='dichvu' order by number,id desc");
	$result_tintuc  =  $db->query("select id,slug,name_$lang from #_post where shows=1 and type='tintuc' order by number,id desc");
	$result_tuvan  =  $db->query("select id,slug,name_$lang from #_post where shows=1 and type='tuvan' order by number,id desc");