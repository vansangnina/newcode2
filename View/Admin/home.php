<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<base href="<?=C_BASE?>">
<head>
<link id="favicon" rel="shortcut icon" href="images/setting.png" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator - Hệ thống quản trị nội dung</title>
<script type="text/javascript" src="<?=C_BASE?>/assets/admin/js/jquery-1.12.4.js"></script>
<script type="text/javascript" src="<?=C_BASE?>/assets/admin/js/external.js"></script>
<script src="<?=C_BASE?>/assets/admin/js/jquery.price_format.2.0.js" type="text/javascript"></script>
<script src="<?=C_BASE?>/assets/ckeditor/ckeditor.js"></script>
<link href="<?=C_BASE?>/assets/admin/css/main.css" rel="stylesheet" type="text/css" />
<link href="<?=C_BASE?>/assets/admin/js/plugins/multiupload/css/jquery.filer.css" type="text/css" rel="stylesheet" />
<link href="<?=C_BASE?>/assets/admin/js/plugins/multiupload/css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />
<!-- MultiUpload -->
<script type="text/javascript" src="<?=C_BASE?>/assets/admin/js/plugins/multiupload/jquery.filer.min.js"></script>
<script src="<?=C_BASE?>/assets/admin/js/jquery.minicolors.js"></script>
<link rel="stylesheet" href="<?=C_BASE?>/assets/admin/css/jquery.minicolors.css">
<!--tags product-->
<link href="<?=C_BASE?>/assets/admin/js/select-box-searching-jquery/select2.css" rel="stylesheet"/>
<script src="<?=C_BASE?>/assets/admin/js/select-box-searching-jquery/select2.js"></script>
</head>
<?php if(isset($_SESSION[ADM]) && ($_SESSION[ADM] == true)){?>  
<body>
<!-- Left side content -->    
<script type="text/javascript">
$(function(){
	var num = $('#menu').children(this).length;
	for (var index=0; index<=num; index++)
	{
		var id = $('#menu').children().eq(index).attr('id');
		$('#'+id+' strong').html($('#'+id+' .sub').children(this).length);
		$('#'+id+' .sub li:last-child').addClass('last');
	}
	$('#menu .activemenu .sub').css('display', 'block');
	$('#menu .activemenu a').removeClass('inactive');
	$('.conso').priceFormat({
		limit: 13,
		prefix: '',
		centsLimit: 0
	});
	
	$('.color').each( function() {
        $(this).minicolors({
            control: $(this).attr('data-control') || 'hue',
            defaultValue: $(this).attr('data-defaultValue') || '',
            format: $(this).attr('data-format') || 'hex',
            keywords: $(this).attr('data-keywords') || '',
            inline: $(this).attr('data-inline') === 'true',
            letterCase: $(this).attr('data-letterCase') || 'lowercase',
            opacity: $(this).attr('data-opacity'),
            position: $(this).attr('data-position') || 'bottom left',
            change: function(value, opacity) {
                if( !value ) return;
                if( opacity ) value += ', ' + opacity;
                if( typeof console === 'object' ) {
                    console.log(value);
                }
            },
            theme: 'bootstrap'
        });
    });
})
</script>
<div id="leftSide">
<?php include VIEW."Admin/left_tpl.php";?>
</div>
    <div id="rightSide">
    <div class="topNav">
        <?php include VIEW."Admin/header_tpl.php";?>
	</div>
<div class="wrapper">
<?php include VIEW.'Admin/'.$this->model->view."_tpl.php";?>
</div></div>
    <div class="clear"></div>
</body>
<?php }else{ ?>
<body class="nobg loginPage">   
<?php include VIEW."Admin/user/login_tpl.php";?>
<!-- Footer line -->
<div id="footer">
	<div class="wrapper">Powered by <a href="http://www.nina.vn" title="Thiết kế web NINA">Thiết kế web NINA</a></div>
</div></body>
<?php }?>

<script>
$(document).ready(function($) {
	$('.ck_editor').each(function(index, el) {
		var id = $(this).find('textarea').attr('id');
		CKEDITOR.replace( id, {
		height : 500,
		entities: false,
        basicEntities: false,
        entities_greek: false,
        entities_latin: false,
		filebrowserBrowseUrl : '<?=C_BASE?>/assets/ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '<?=C_BASE?>/assets/ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '<?=C_BASE?>/assets/ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '<?=C_BASE?>/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '<?=C_BASE?>/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '<?=C_BASE?>/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
		allowedContent:
			'h1 h2 h3 p blockquote strong em;' +
			'a[!href];' +
			'img(left,right)[!src,alt,width,height];' +
			'table tr th td caption;' +
			'span{!font-family};' +
			'span{!color};' +
			'span(!marker);' +
			'del ins'
		});
	});	
});
</script>

<script type="text/javascript">
	$(document).ready(function() {
		/* ajax hienthi*/
		$("a.diamondToggle").click(function(){
			if($(this).attr("rel")==0){
				$.ajax({
					type: "POST",
					url: "Ajax/AdminUpdate.php",
					data:{
						id: $(this).attr("data-val0"),
						table: $(this).attr("data-val2"),
						type: $(this).attr("data-val3"),
						value:1
					}
				});
				$(this).addClass("diamondToggleOff");
				$(this).attr("rel",1);
				
			}else{
				$.ajax({
					type: "POST",
					url: "Ajax/AdminUpdate.php",
					data:{
						id: $(this).attr("data-val0"),
						table: $(this).attr("data-val2"),
						type: $(this).attr("data-val3"),
						value:0
						}
				});
				$(this).removeClass("diamondToggleOff");
						$(this).attr("rel",0);
			}

		});
		$('#tablepage').change(function(event) {
			/* Act on the event */
			var page = $(this).val();
			$.ajax({
				url: 'Ajax/AdminAjax.php',
				type: 'POST',
				data: {do:'tablepage',page:page},
				success:function(data){
					location.reload();
				}
			});
		});
		/*end  ajax hienthi*/
		/*select danhmuc*/
		$(".select_danhmuc").change(function() {
			var child = $(this).data("child");
			var levell = $(this).data('level');
			var table = $(this).data('table');
			var type = $(this).data('type');
			$.ajax({
				url: 'Ajax/AdminDanhmuc.php',
				type: 'POST',
				data: {level: levell,id:$(this).val(),table:table,type:type},
				success:function(data){
					var op = "<option>Chọn Danh Mục</option>";
					if(levell=='0'){
						$("#id_cat").html(op);
						$("#id_item").html(op);
						$("#id_sub").html(op);
					}else if(levell=='1'){
						$("#id_sub").html(op);
						$("#id_item").html(op);
					}else if(levell=='2'){
						$("#id_sub").html(op);
					}
					$("#"+child).html(data);
				}
			});
		});
		$('.chonngonngu li a').click(function(event) {
			var lang = $(this).attr('href');
			$('.chonngonngu li a').removeClass('active');
			$(this).addClass('active');
			$('.lang_hidden').removeClass('active');
			$('.lang_'+lang).addClass('active');
			return false;
		});
		$(document).on('keyup', function(event) {
        	var key = event.keyCode;
        	switch(key){
        		//case 13:
        		case 121:
        			$('form.form').submit();
        		break;
        	}
        	return false;
       	});

       	$('.update_stt').keyup(function(event) {
			var id = $(this).data('id');
			var table = $(this).data('table');
			var value = $(this).val();
			var type = $(this).data('type');
			$.ajax ({
				type: "POST",
				url: "Ajax/AdminUpdate.php",
				data: {id:id,table:table,value:value,type:type},
				success: function(result) {
				}
			});
		});

		$('.delete_images').click(function(){
	      if (confirm('Bạn có muốn xóa hình này ko ? ')) {
	        var id = $(this).data('id');
			var table = $(this).data('table');
			var links = $(this).data('url');
	        $.ajax ({
	          type: "POST",
	          url: "Ajax/DeleteImages.php",
	          data: {id:id,table:table,links:links},
	          success: function(result) { 
	          }
	        });
	        $(this).parent().slideUp();
	      }
	      return false;
	    });

	    $('.soluong_input').keyup(function(event) {
	      var id = $(this).data('id');
	      var table = $(this).data('table');
	      var value = $(this).val();
	      var type = 'soluong';
	      $.ajax ({
	        type: "POST",
	        url: "Ajax/AdminUpdate.php",
	        data: {id:id,table:table,value:value,type:type},
	        success: function(result) {
	        }
	      });
	    });

	    $("#xoahet").click(function(){
	      var listid="";
	      $("input[name='chon']").each(function(){
	        if (this.checked) listid = listid+","+this.value;
	        })
	      listid=listid.substr(1);   //alert(listid);
	      if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
	      hoi= confirm("Bạn có chắc chắn muốn xóa?");
	      if (hoi==true) document.location = "admin/<?=$_GET['com']?>/delete<?php if($this->model->fact){ echo '_'.$this->model->fact;}?>/<?=$_GET['type']?>?curPage=<?=$_GET['curPage']?>&listid=" + listid;
	    });


	});

	function timkiem(wrap){
	      var id = wrap.attr('id');
	      var url = 'admin/<?=$_GET['com']?>/<?=$_GET['act']?>/<?=$_GET['type']?>';
	      var keywords = $('#keywords').val();
	      if(id=='id_list'){
	        url +="?id_list="+wrap.val(); 
	      } else if(id=='id_cat'){
	        var id_list = $('#id_list').val();
	        url +="?id_list="+id_list+"&id_cat="+wrap.val(); 
	      } else if(id=='id_item'){
	        var id_list = $('#id_list').val();
	        var id_cat = $('#id_cat').val();
	        url +="?id_list="+id_list+"&id_cat="+id_cat+"&id_item="+wrap.val(); 
	      } else if(id=='id_sub'){
	        var id_list = $('#id_list').val();
	        var id_cat = $('#id_cat').val();
	        var id_item = $('#id_item').val();
	        url +="?id_list="+id_list+"&id_cat="+id_cat+"&id_item="+id_item+"&id_sub="+wrap.val(); 
	      } else if(id=='keywords'){
	        var id_list = $('#id_list').val();
	        var id_cat = $('#id_cat').val();
	        var id_item = $('#id_item').val();
	        var id_sub = $('#id_sub').val();
	        if(id_list) { url +="?id_list="+id_list;}
	        if(id_cat) { url +="&id_cat="+id_cat; }
	        if(id_item) { url +="&id_item="+id_item; }
	        if(id_sub) { url +="&id_sub="+id_sub; }
	      } 
	      if(keywords){
	        url +="&keyword="+keywords;
	      }
	      window.location =url; 
	}
</script>
</html>