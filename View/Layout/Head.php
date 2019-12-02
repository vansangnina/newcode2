<meta charset="UTF-8">
<link href='//maxcdn.bootstrapcdn.com' rel='dns-prefetch'/>
<link href='//fonts.googleapis.com' rel='dns-prefetch'/>
<link href='//maps.googleapis.com' rel='dns-prefetch'/>
<link href='//maps.gstatic.com/' rel='dns-prefetch'/>
<link href='//www.facebook.com' rel='dns-prefetch'/>
<link href='//plus.google.com' rel='dns-prefetch'/>
<link href='//csi.gstatic.com' rel='dns-prefetch'/>
<link href='//www.youtube.com' rel='dns-prefetch'/>
<link href='//feedburner.google.com' rel='dns-prefetch'/>
<link href='//scontent.fsgn3-1.fna.fbcdn.net' rel='dns-prefetch'/>
<link href='//googleads.g.doubleclick.net' rel='dns-prefetch'/>
<link href='//static.doubleclick.net' rel='dns-prefetch'/>
<link href='//apis.google.com' rel='dns-prefetch'/>
<link href='//maps.google.com' rel='dns-prefetch'/>
<link href='//connect.facebook.net' rel='dns-prefetch'/>
<link href="//www.google-analytics.com" rel="dns-prefetch" />
<link href="//www.googletagmanager.com/" rel="dns-prefetch" />
<base href="<?=C_BASE?>">
<link id="favicon" rel="shortcut icon" href="<?=$this->favicon?>" type="image/x-icon" />
<title><?=$this->title?></title>
<meta name="description" content="<?=$this->description?>">
<meta name="keywords" content="<?=$this->keywords?>">
<meta name="viewport" content="<?=$this->viewport?>" />
<meta name="robots" content="<?=$this->robots?>" />
<meta http-equiv="audience" content="General" />
<meta name="resource-type" content="Document" />
<meta name="distribution" content="Global" />
<meta name='revisit-after' content='1 days' />
<meta name="ICBM" content="<?=$this->toado?>">
<meta name="geo.position" content="<?=$this->toado?>">
<meta name="geo.placename" content="<?=$this->diachi?>">
<meta name="author" content="<?=$this->ten?>">
<link rel="publisher" href="<?=$this->googleplus?>" />
<link rel="author" href="<?=$this->googleplus?>" />
<link rel="canonical" href="<?=$this->canonical?>" />
<?php if($share_facebook){?>
	<?=$share_facebook?>
<?php } else { ?>
	<meta property="og:site_name" content="<?=$row_setting['website']?>" />
	<meta property="og:type" content="website" />
	<meta property="og:locale" content="vi_VN" />
	<meta property="og:title" content="<?=$this->title?>" />
	<meta property="og:description" content="<?=$this->description?>" />
	<meta property="og:url" content="<?=$this->url?>" />
<?php } ?>
<meta name="twitter:card" value="summary">
<meta name="twitter:url" content="<?=$this->url?>">
<meta name="twitter:title" content="<?=$this->title?>">
<meta name="twitter:description" content="<?=$this->description?>">
<meta name="twitter:image" content="http://<?=$config_url.'/'.$this->logo?>"/>
<meta name="twitter:site" content="@">
<meta name="twitter:creator" content="@">
<meta name="dc.language" CONTENT="vietnamese">
<meta name="dc.source" CONTENT="http://<?=$config_url?>/">
<meta name="dc.title" CONTENT="<?=$this->title?>">
<meta name="dc.keywords" CONTENT="<?=$this->keywords?>">
<meta name="dc.description" CONTENT="<?=$this->description?>">
<meta name="dc.publisher" content="<?=$this->googleplus?>" />
<?=$row_setting['codehead']?> 
<link type="text/css" rel="stylesheet" href="assets/js/bootstrap-3.2.0/css/bootstrap.css" />
<link type="text/css" rel="stylesheet" href="assets/js/bootstrap-3.2.0/css/bootstrap-theme.css" />
<link type="text/css" rel="stylesheet" href="assets/js/owl_carousel/assets/owl.carousel.css" />
<link type="text/css" rel="stylesheet" href="assets/js/colorbox/colorbox.css"  />
<link type="text/css" rel="stylesheet" href="assets/js/menu_bar/css/style.css" />
<link type="text/css" rel="stylesheet" href="assets/fonts/fontawesome/css/all.min.css" />
<link type="text/css" rel="stylesheet" href="assets/css/elements.css" />
<link type="text/css" rel="stylesheet" href="assets/css/style.css" />
<link type="text/css" rel="stylesheet" href="assets/css/jquery.simplyscroll.css">
<?php if($config['setup']['responsive']=='true'){?>
<link type="text/css" rel="stylesheet" href="assets/css/media.css" />
<link type="text/css" rel="stylesheet" href="assets/js/mmmenu/dist/css/jquery.mmenu.all.css" />
<?php } ?>
<link type="text/css" rel="stylesheet" href="assets/js/datetimepicker/jquery.datetimepicker.css"/>
<link type="text/css" rel="stylesheet" href="assets/js/scrollbar/jquery.mCustomScrollbar.css" />
<link rel="stylesheet" href="assets/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="assets/js/nivo_caption/css/default.css" type="text/css" media="all" />
<link rel="stylesheet" href="assets/js/nivo_caption/css/nivo-slider.css" type="text/css" media="all" />
<script src="assets/js/jquery-1.9.1.js"></script>
<style type="text/css"><?=$plugin_css?></style>