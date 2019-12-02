<!DOCTYPE html>
<html lang="<?=$lang?>">
<head>
	<?php require_once LAYOUT."Head.php"; ?>
</head>
<body>
<?=$row_setting['codebody']?>
<div id="container">
	<header id="header">
        <?php include LAYOUT."Header.php"; ?>
    </header>
    
	<section id="slide_show">
		<?php include LAYOUT."NivoCaption.php";?>
    </section>
    <?php  if($view=='Index'){?>
    <div id="listhome">
        <div class="container"><?=$this->model->list_home->html();?></div>
    </div>
    <div id="banchay">
    	<?=$this->model->sanpham_bc->html();?>
    </div>
    <div id="dichvu">
        <div class="container"><?=$this->model->dichvu->html();?></div>
    </div>
    <div id="spkhac">
        <div class="container"><?=$this->model->sanpham_khac->html();?></div>
    </div>

    <div id="sanpham_tb">
    	<div class="container"><?=$this->model->sanpham_nb->html();?></div>
    </div>
	<?php } ?>
    <main id="main">
		<div class="container">
			<section id="content">
				<?php  include VIEW.$view."_tpl.php";?>
			</section>
		</div>
		<div class="clear"></div>
    </main>
    <?php if($view=='index'){?>
    <div id="news">
    	<div class="container"><?=$this->model->tintuc_bt->html()?></div>
    </div>	
    <?php } ?>

   	<footer id="footer">
		<?php include LAYOUT."Footer.php"; ?>
    </footer>
</div>
<?php include ADDON."ZaloChat.php";?>
<script src="assets/js/bootstrap-3.2.0/js/bootstrap.js"></script>
<script src="assets/js/datetimepicker/build/jquery.datetimepicker.full.<?=$lang?>.js" ></script>
<script src="assets/js/owl_carousel/owl.carousel.min.js"></script>
<script src="assets/js/menu_bar/js/enscroll-0.5.2.min.js"></script>
<script src="assets/js/menu_bar/js/script.js"></script>
<script src="assets/js/jquery.validationEngine-<?=$lang?>.js"></script>
<script src="assets/js/jquery.validationEngine.js"></script>
<script src="assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="assets/js/jquery.simplyscroll.js"></script>
<script src="assets/js/star-rating.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("form").validationEngine('attach',{
			promptPosition : "topLeft",
			showOneMessage: true,
			maxErrorsPerField:1
		});
		$('#myModal').on('shown.bs.modal', function () {
		  $('#myInput').trigger('focus')
		})
	});
</script>
<script type="text/javascript">
     var YBCNIVO_WIDTH='100%';
     var YBCNIVO_HEIGHT='100%';
     var YBCNIVO_SPEED=500;
     var YBCNIVO_PAUSE=5000;
     var YBCNIVO_LOOP=1;
     var YBCNIVO_START_SLIDE=1;
     var YBCNIVO_PAUSE_ON_HOVER=1;
     var YBCNIVO_SHOW_CONTROL=1;
     var YBCNIVO_SHOW_PREV_NEXT=1;
     var YBCNIVO_CAPTION_SPEED=200;
     var YBCNIVO_FRAME_WIDTH='100%';
</script>
<script type="text/javascript" src="assets/js/nivo_caption/js/jquery.nivo.slider.js"></script>
<script type="text/javascript" src="assets/js/nivo_caption/js/ybcnivoslider.js"></script>
<script type="application/ld+json">
    {"@context":"https://schema.org","@type":"Organization","name":"<?=$row_setting['name_'.$lang]?>","url":"<?=$func->getCurrentPageURL()?>","logo":"http://<?=$config_url?>/<?=_upload_hinhanh_l.$favicon['photo_vi']?>","contactPoint":[{"@type":"ContactPoint","telephone":"<?=$row_setting['dienthoai']?>","contactType":"customer service","availableLanguage":["Tiếng Việt"],"contactOption":[]}],"sameAs":["<?=$row_setting['facebook']?>","","<?=$row_setting['twitter']?>","","<?=$row_setting['googleplus']?>","",""]}
</script>
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "url": "<?=$func->getCurrentPageURL()?>",
        "potentialAction": {
            "@type": "SearchAction",
            "target": "<?=$func->getCurrentPageURL()?>/?q={search_term_string}",
            "query-input": "required name=search_term_string"
        }
    }
</script>
<ul class="vcard" style="display:none">
   <li class="fn"><?=$row_setting['name_'.$lang]?></li>
   <li class="org"><?=$row_setting['ten_'.$lang]?></li>
   <li class="adr"><?=$row_setting['diachi_'.$lang]?></li>
   <li class="tel"><?=$row_setting['dienthoai']?></li>
   <li><a class="url" href="<?=$row_setting['website']?>"><?=$row_setting['website']?></a></li>
</ul>
<?php if($config['setup']['responsive']=='true'){?>
<script type="text/javascript" src="assets/js/mmmenu/dist/js/jquery.mmenu.all.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('nav#menu_mm').mmenu({
			extensions				: [ 'effect-slide-menu', 'shadow-page', 'shadow-panels' ],
			keyboardNavigation 		: true,
			screenReader 			: false,
			counters				: true,
			navbar 	: {
				title	: 'Mobile menu'
			}
		});
	});
</script>
<?php 
	include ADDON."Toolbar.php"; 
	include LAYOUT."Mmenu.php"; 
   } 
?>
<?=$row_setting['codebottom']?>
<?=\Library\Facebook::sdk()?>
</body>
</html>