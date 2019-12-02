<?php
	$madonhang = trim($_POST['ma_donhang']);
	$email_donhang = trim($_POST['email_donhang']);

	$row_donhang  =  $db->row("select * from #_order where madonhang='".$madonhang."' and email='".$email_donhang."' ");
	$row_detail  =  $db->row("select * from #_order_detail where id_order='".$row_donhang['id']."' ");
	$row_tinhtrang  =  $db->row("select * from #_title where id='".$row_donhang['trangthai']."'");
