<?php
	$attributes = json_decode($this->model->data['attributes'],true);
?>
<script type="text/javascript">		
	$(document).ready(function() {

	    $('.themmoi').click(function(e) {
			$.ajax ({
				type: "POST",
				url: "ajax/khuyenmai.php",
				success: function(result) { 
					$('.load_sp').append(result);
				}
			});
        });

		$('.delete').click(function(e) {
			$(this).parent().remove();
		});
		
		$("#states").select2();
        ///
        $("#states").change(function(){
        	$tags = $(this).val();
        	
        	if($tags>0){
        	$("#tags_name").append("<p class='delete_tags'>"+$("#states option:selected").text()+"<input name='tags[]' value='"+$tags+"'  type='hidden' /> <span></span> </p>");
        	}
	       	$(".delete_tags span").click(function(){
	        	$(this).parent().remove();
	        });
        });
        //
        $(".delete_tags span").click(function(){
        	$(this).parent().remove();
        });

	});
	
</script>
<?php
  //------------ tags-------------------------
  	if($this->model->data['tags']!=''){
		$tags = explode(",", $this->model->data['tags']) ;
		$sql = "select id,name_vi from #_tags where id<>'".$tags[0]."'";
		for ($i=1,$count = count($tags); $i < $count ; $i++) { 
			$sql .=" and id<> '".$tags[$i]."'";
		}
	} else {
		$sql = "select id,name_vi from #_tags";
	}
	    $tags_arr  =  $db->query($sql);

    $sizes  =  $db->query("select * from #_title where shows=1 and type='size' order by number asc");
    $mausacs  =  $db->query("select * from #_title where shows=1 and type='mausac' order by number asc");
?>

<div class="wrapper">
<div class="control_frm">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="admin/product/add/<?=$_GET['type'];?>"><span>Thêm <?=$type->title?></span></a></li>
            <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>

<form name="supplier" id="validate" class="form" action="admin/product/save/<?=$_GET['type'];?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title chonngonngu">
		<ul>
		<?php 
		//$func->dump($config);
		foreach ($config['lang'] as $key => $value) {?>
			<li><a href="<?=$key?>" class="<?php if($config['activelang']==$key){ echo "active";}?> tipS" title="Chọn <?=$value?>"><img src="assets/admin/images/<?=$key?>.png" /><?=$value?></a></li>
		<?php } ?>
		</ul>
		</div>	
		<?php if(in_array('list',$type->config_open)){ ?>
		<div class="formRow">
			<label>Chọn danh mục 1</label>
			<div class="formRight">
			<?=$func->get_main_list()?>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
		<?php if(in_array('cat',$type->config_open)){ ?>
		<div class="formRow">
			<label>Chọn danh mục 2</label>
			<div class="formRight">
			<?=$func->get_main_cat()?>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
		<?php if(in_array('item',$type->config_open)){ ?>
        <div class="formRow">
			<label>Chọn danh mục 3</label>
			<div class="formRight">
			<?=$func->get_main_item()?>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>

		<?php if(in_array('sub',$type->config_open)){ ?>
		<div class="formRow">
			<label>Chọn danh mục 4</label>
			<div class="formRight">
			<?=$func->get_main_sub()?>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
		<?php if(in_array('image',$type->config_open)){ ?>
		<div class="formRow">
			<label>Tải hình ảnh:</label>
			<div class="formRight">
            	<input type="file" id="file" name="file" />
				<img src="assets/admin/images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
				<div class="note"> width : <?php echo _width_thumb*$type->ratio;?> px , Height : <?php echo _height_thumb*$type->ratio;?> px </div>
			</div>
			<div class="clear"></div>
		</div>
        <?php if($_GET['act']=='edit'){?>
		<div class="formRow">
			<label>Hình Hiện Tại :</label>
			<div class="formRight">
			
			<div class="mt10"><img src="<?=_upload_product_l.$this->model->data['thumb']?>"  alt="NO PHOTO" width="100" /></div>

			</div>
			<div class="clear"></div>
		</div>
		<?php } } ?>
        <?php if(in_array('images',$type->config_open)){ ?>
         <div class="formRow">
	      <label>Hình ảnh kèm theo: </label>
	      <div class="formRight">
	        <a class="file_input" data-jfiler-name="files" data-jfiler-extensions="jpg, jpeg, png, gif"><img src="assets/admin/images/image_add.png" alt="" width="100"></a>                
	    	<?php if($act=='edit'){?>
	        <?php if(count($this->model->photos)!=0){?>       
	            <?php foreach ($this->model->photos as $key => $value) { ?>
	              <div class="item_trich">
	                  <img class="img_trich" width="140px" height="110px" src="<?=_upload_cate_l.$value['photo']?>" />
	                  <input type="text" data-table="cate_photo" data-type="stt" data-id="<?=$value['id']?>" value="<?=$value['number']?>" class="update_stt tipS" />
	                  <a class="delete_images" data-table="cate_photo" data-url="<?=_upload_cate_l;?>" data-id="<?=$value['id']?>"><img src="assets/admin/images/delete.png"></a>
	              </div>
	            <?php } ?>
	        <?php }?>
    		<?php }?>
      		</div>
          <div class="clear"></div>
        </div> 
        <?php } ?>
		<?php if(in_array('name',$type->config_open)){
		foreach ($config['lang'] as $key => $value) {?>
        <div class="formRow lang_hidden lang_<?=$key?> <?php if($config['activelang']==$key){ echo "active";}?>">
			<label>Tiêu đề (<?=$value?>)</label>
			<div class="formRight">
                <input type="text" name="name_<?=$key?>" title="Nhập tên (<?=$value?>)" id="name_<?=$key?>" class="tipS validate[required]" value="<?=@$this->model->data['name_'.$key]?>" />
			</div>
			<div class="clear"></div>
		</div>
		<?php } } ?>
		<?php if(in_array('price',$type->config_open)){ ?>
		<div class="formRow">
			<label>Giá bán</label>
			<div class="formRight">
                <input type="text" name="price" title="Nhập giá bán" id="price" class="conso tipS validate[required]" value="<?=@$this->model->data['price']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
		<?php if(in_array('oldprice',$type->config_open)){ ?>
		<div class="formRow">
			<label>Giá cũ</label>
			<div class="formRight">
                <input type="text" name="oldprice" title="Nhập giá cũ" id="oldprice" class="conso tipS validate[required]" value="<?=@$this->model->data['oldprice']?>" />
			</div>
			<div class="clear"></div>
		</div> 
		<?php } ?>
		<?php if(in_array('code',$type->config_open)){ ?>
		<div class="formRow">
			<label>Mã SP  </label>
			<div class="formRight">
                <input type="text" name="code" title="Nhập mã sản phẩm" id="code" class="tipS validate[required]" value="<?=@$this->model->data['code']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
		
		<?php if(in_array('tags',$type->config_open)){ ?>
		<div class="formRow">
			<label>Tags </label>
			<div class="formRight">
            	<select style="width:300px" id="states">
            		<option value="0">
            			Thêm Tags 
            		</option>
            		<?php for ($i=0,$countt = count($tags_arr); $i < $countt ; $i++) { ?>
            			<option value="<?=$tags_arr[$i]["id"]?>"><?=$tags_arr[$i]["name_vi"]?></option>
            		<?php }?>
            	</select>
            	<div class="clear"></div>
            	<div id="tags_name">
            	<?php  for ($i=0,$count = count($tags); $i < $count ; $i++) { 
        			$d->query("select id,name_vi from #_tags where id='".$tags[$i]."'");
        			$tags_name = $d->fetch_array();
        			?>
        				<p value="<?=$tags_name["id"]?>" class="delete_tags"><?=$tags_name["name_vi"]?> <span ></span> 
        					<input name="tags[]" value="<?=$tags_name["id"]?>"  type="hidden" />
        				</p>
        				
        		<?php }?>
        		</div>
            </div>
			<div class="clear"></div>
		</div>
		<?php } ?>
		
		<?php if(in_array('size',$type->config_open)){ ?>
		<div class="formRow">
			<label>Size</label>
			<div class="formRight">
			<?php
				$size = $attributes['size'];
				for($i=0;$i<count($sizes);$i++){?>
	            <label><input type="checkbox" name="attributes[size][]" id="size<?=$i?>" value="size_<?=$sizes[$i]['id']?>" <?php if(is_array($size)){if(in_array('size_'.$sizes[$i]['id'],$size)){ echo "checked='checked'";} }?> /> <?=$sizes[$i]['name_vi']?></label>
				<?php } ?>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
		<?php if(in_array('color',$type->config_open)){ ?>
		<div class="formRow">
			<label>Màu sắc</label>
			<div class="formRight">
			<?php
			 	$mausac = $attributes['mausac'];
				for($i=0;$i<count($mausacs);$i++){?>
	                <label><input type="checkbox" name="attributes[mausac][]" id="mausac<?=$i?>" value="mausac_<?=$mausacs[$i]['id']?>" <?php if(is_array($mausac)){if(in_array('mausac_'.$mausacs[$i]['id'], $mausac)){ echo "checked='checked'";}}?> /> <?=$mausacs[$i]['name_vi']?></label>
				<?php } ?>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>

		<?php if(in_array('description',$type->config_open)){ ?>
		<?php foreach ($config['lang'] as $key => $value) {?>
		<div class="formRow lang_hidden lang_<?=$key?> <?php if($config['activelang']==$key){ echo "active";}?>">
			<label>Mô tả (<?=$value?>)</label>
			<div class="formRight">
                <textarea rows="10" cols="" title="Nhập mô tả (<?=$value?>) . " class="tipS" name="description_<?=$key?>"><?=@$this->model->data['description_'.$key]?></textarea>
			</div>
			<div class="clear"></div>
		</div>
		<?php } } ?>

		<?php if(in_array('content',$type->config_open)){ ?>
		<?php foreach ($config['lang'] as $key => $value) {?>
		<div class="formRow lang_hidden lang_<?=$key?> <?php if($config['activelang']==$key){ echo "active";}?>">
			<label>Nội Dung (<?=$value?>)</label>
			<div class="ck_editor">
                <textarea id="content_<?=$key?>" name="content_<?=$key?>"><?=@$this->model->data['content_'.$key]?></textarea>
			</div>
			<div class="clear"></div>
		</div>
		<?php } } ?>

        <div class="formRow">
          <label>Hiển thị : <img src="assets/admin/images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Bỏ chọn để không hiển thị danh mục này ! "> </label>
          <div class="formRight">
         
            <input type="checkbox" name="shows" id="check1" value="1" <?=(!isset($this->model->data['shows']) || $this->model->data['shows']==1)?'checked="checked"':''?> />
             <label>Số thứ tự: </label>
              <input type="text" class="tipS" value="<?=isset($this->model->data['number'])?$this->model->data['number']:1?>" name="number" style="width:40px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự của danh mục, chỉ nhập số">
          </div>
          <div class="clear"></div>
        </div>
		
	</div>  
	<div class="widget">
		<?php if(in_array('seo',$type->config_open)){ ?>
		<div class="title"><img src="assets/admin/images/icons/dark/record.png" alt="" class="titleIcon" />
			<h6>Nội dung seo</h6>
		</div>
		
		<div class="formRow">
			<label>Title</label>
			<div class="formRight">
				<input type="text" value="<?=@$this->model->data['title']?>" name="title" title="Nội dung thẻ meta Title dùng để SEO" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow">
			<label>Từ khóa</label>
			<div class="formRight">
				<input type="text" value="<?=@$this->model->data['keywords']?>" name="keywords" title="Từ khóa chính cho danh mục" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow">
			<label>Description:</label>
			<div class="formRight">
				<textarea rows="4" cols="" title="Nội dung thẻ meta Description dùng để SEO" class="tipS" name="description"><?=@$this->model->data['description']?></textarea>
                <input readonly="readonly" type="text" style="width:50px; margin-top:10px; text-align:center;" name="des_char" value="<?=@$this->model->data['des_char']?>" /> ký tự <b>(Tốt nhất là 68 - 170 ký tự)</b>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
		
		<div class="formRow">
			<div class="formRight">
                <input type="hidden" name="type" id="id_this_type" value="<?=$_REQUEST['type']?>" />
                <input type="hidden" name="id" id="id_this_post" value="<?=@$this->model->data['id']?>" />
            	<input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
            	<a href="admin/product/man/<?=$_GET['type'];?>" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>
			</div>
			<div class="clear"></div>
		</div>

	</div>
</form>        </div>



<script>
  $(document).ready(function() {
    $('.file_input').filer({
            showThumbs: true,
            templates: {
                box: '<ul class="jFiler-item-list"></ul>',
                item: '<li class="jFiler-item">\
                            <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                    <div class="jFiler-item-thumb">\
                                        <div class="jFiler-item-status"></div>\
                                        <div class="jFiler-item-info">\
                                            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                        </div>\
                                        {{fi-image}}\
                                    </div>\
                                    <div class="jFiler-item-assets jFiler-row">\
                                        <ul class="list-inline pull-left">\
                                            <li><span class="jFiler-item-others">{{fi-icon}} {{fi-size2}}</span></li>\
                                        </ul>\
                                        <ul class="list-inline pull-right">\
                                            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                        </ul>\
                                    </div>\<input type="text" name="stthinh[]" class="stthinh" placeholder="Nhập STT" />\
                                </div>\
                            </div>\
                        </li>',
                itemAppend: '<li class="jFiler-item">\
                            <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                    <div class="jFiler-item-thumb">\
                                        <div class="jFiler-item-status"></div>\
                                        <div class="jFiler-item-info">\
                                            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                        </div>\
                                        {{fi-image}}\
                                    </div>\
                                    <div class="jFiler-item-assets jFiler-row">\
                                        <ul class="list-inline pull-left">\
                                            <span class="jFiler-item-others">{{fi-icon}} {{fi-size2}}</span>\
                                        </ul>\
                                        <ul class="list-inline pull-right">\
                                            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                        </ul>\
                                    </div>\<input type="text" name="stthinh[]" class="stthinh" placeholder="Nhập STT" />\
                                </div>\
                            </div>\
                        </li>',
                progressBar: '<div class="bar"></div>',
                itemAppendToEnd: true,
                removeConfirmation: true,
                _selectors: {
                    list: '.jFiler-item-list',
                    item: '.jFiler-item',
                    progressBar: '.bar',
                    remove: '.jFiler-item-trash-action',
                }
            },
            addMore: true
        });
  });
</script>
