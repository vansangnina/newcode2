<?php
	$counter = new Library\Counter($db);
	$row_thongke = $counter->get_counter();
?>
<div class="thongke">
	<h4>Thống kê truy cập</h4>
	<ul>
		<li class="dang_onl"><?=_dangonline?> : <span>1</span></li>
		<li><?=_homnay?> : <span><?=$row_thongke['today']?></span></li>
		<li><?=_homqua?> : <span><?=$row_thongke['yesterday']?></span></li>
		<li><?=_thangnay?> : <span><?=$row_thongke['month']?></span></li>
		<li class="da_onl"><?=_tongtruycap?> : <span><?=$row_thongke['totalaccess']?></span></li>
	</ul>
</div>
