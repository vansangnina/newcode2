<div class="container">
	<div class="footer">
	<div class="callwe">
		<h5><?=_goichochungtoibatcukhinaobancan?></h5>
		<h4><?=$row_setting['hotline']?></h4>
	</div>
	<div class="row">
		<div class="col-md-5 col-sm-5 col-xx-12 col-xs-12">
			<?=$this->thongtin_ft->html();?>
		</div>
		<div class="col-md-3 col-sm-3 col-xx-6 col-xs-12">
			<?=$this->chinhsach->html();?>
			<?=$this->bocongthuong->html();?>
		</div>
		<div class="col-md-4 col-sm-4 col-xx-6 col-xs-12">
			<?=$this->nhantin->html();?>
		</div>
	</div>
</div>
</div>

<div id="copy">
	<div class="container">
		<div class="copy">Copyright © 2018 <span> <?=$row_setting['name_'.$lang]?> </span>. All rights reserved . Design by: Nina .LTD</div>
		<?=$this->mangxh->html();?>
	</div>
</div>