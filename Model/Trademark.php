<?php
		@$id=  addslashes($_GET['id']);
		#các sản phẩm khác======================
		if($id){

			$d->reset();
			$sql_detail = "select * from #_title where shows=1 and type='thuonghieu' and slug='".$id."'";
			$d->query($sql_detail);
			$row_detail = $d->fetch_array();

			$title_detail = $row_detail['name_'.$lang];
			$per_page = 24; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;
			
			$where = " #_product where shows=1 and type='product' and id_thuonghieu='".$row_detail['id']."'  order by number,datecreate desc";

			$sql = "select name_$lang,id,thumb,description_$lang,oldprice,price,slug,photo from $where $limit";
			$d->query($sql);
			$product = $d->result_array();

			$url = getCurrentPageURL();
			$paging = pagination($where,$per_page,$page,$url);

		} else {
			$per_page = 24; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;
			
			$where = " #_title where shows=1 and type='thuonghieu' order by number,datecreate desc";

			$sql = "select * from $where $limit";
			$d->query($sql);
			$product = $d->result_array();

			$url = getCurrentPageURL();
			$paging = pagination($where,$per_page,$page,$url);
		}