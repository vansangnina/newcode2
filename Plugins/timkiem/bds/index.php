<script type="text/javascript">
  $(document).ready(function($) {

    $('#tinhthanh').change(function(event) {
        /* Act on the event */
        var id_cat = $(this).val();
        $.ajax({
            type:'POST',
            url:'ajax/quanhuyen.php',
            data:{id_tinh:id_cat},
            success: function(result) {
                $('#quanhuyen').html(result);
            }
        });
    });

    $('#btnSearch').click(function(event) {
      /* Act on the event */
      var keywords = $("input[name='keywords']").val();
      var loainha = $("select[name='loainha']").val();
      var tinhthanh = $("select[name='tinhthanh']").val();
      var quanhuyen = $("select[name='quanhuyen']").val();
      var dientich = $("select[name='dientich']").val();
      var gia = $("select[name='gia']").val();
      var huongnha = $("select[name='huongnha']").val();

      window.location.href='tim-kiem.html&keywords='+keywords+'&loainha='+loainha+'&tinhthanh='+tinhthanh+'&quanhuyen='+quanhuyen+'&dientich='+dientich+'&gia='+gia+'&huongnha='+huongnha
    });

  });
</script>

<form id="frmPrjSearch" name="frmPrjSearch" method="get" action="tim-kiem.html">

         <div id="divCategoryRe" class="comboboxs col-md-2 col-sm-8 col-xx-12 col-xs-12">
            <input type="text" name="keywords" id="keywords" placeholder="Nhập địa điểm" class="input" value="<?=$_GET['keywords']?>" />
        </div>
        
        <div id="divCategoryRe" class="comboboxs col-md-2 col-sm-8 col-xx-12 col-xs-12">
            <select name="loainha" id="loainha">
                <option value="">Loại nhà đất</option>
                <?php for($i=0;$i<count($row_list);$i++){?>
                <option value="<?=$row_list[$i]['id']?>" <?php if($row_list[$i]['id']==$_GET['loainha']){ echo 'selected="selected"';}?>><?=$row_list[$i]['ten_'.$lang]?></option>
                <?php } ?>
            </select>
        </div>

        <div id="divCategoryRe" class="comboboxs col-md-2 col-sm-8 col-xx-12 col-xs-12">
            <select name="tinhthanh" id="tinhthanh">
                <option value="">Tỉnh/Thành phố</option>
                <?php for($i=0;$i<count($tinhthanh);$i++){?>
                <option value="<?=$tinhthanh[$i]['id']?>" <?php if($tinhthanh[$i]['id']==$_GET['tinhthanh']){ echo 'selected="selected"';}?>><?=$tinhthanh[$i]['ten']?></option>
                <?php } ?>
            </select>
        </div>

        <div id="divCategoryRe" class="comboboxs col-md-2 col-sm-8 col-xx-12 col-xs-12">
            <select name="quanhuyen" id="quanhuyen">
                <option value="">Quận/Huyện</option>
                <?php for($i=0;$i<count($quanhuyen);$i++){?>
                <option value="<?=$quanhuyen[$i]['id']?>" <?php if($quanhuyen[$i]['id']==$_GET['quanhuyen']){ echo 'selected="selected"';}?>><?=$quanhuyen[$i]['ten']?></option>
                <?php } ?>
            </select>
        </div>

        <div id="divCity" class="comboboxs col-md-2 col-sm-8 col-xx-12 col-xs-12">
            <select id="dientich" name="dientich">
                <option value="">Chọn diện tích </option>
                <?php for($i=0;$i<count($dientich);$i++){
                    $dientich_value = $dientich[$i]['dientichtu'].'-'.$dientich[$i]['dientichden'];
                ?>
                <option value="<?=$dientich_value?>" <?php if($dientich_value==$_GET['dientich']){ echo 'selected="selected"';}?>><?=$dientich[$i]['ten_'.$lang]?></option>
                <?php } ?>
        </select>
        </div><!-- #divCity-->

        <div id="divCity" class="comboboxs col-md-2 col-sm-8 col-xx-12 col-xs-12">
            <select id="gia" name="gia">
                <option value="">Chọn Giá </option>
                <?php for($i=0;$i<count($gia);$i++){
                  $gia_value = $gia[$i]['giatu'].'-'.$gia[$i]['giaden'];
                ?>
                <option value="<?=$gia_value?>" <?php if($gia_value==$_GET['gia']){ echo 'selected="selected"';}?>><?=$gia[$i]['ten_'.$lang]?></option>
                <?php } ?>
        </select>
        </div><!-- #divCity-->

        <div id="divArea" class="comboboxs col-md-2 col-sm-8 col-xx-12 col-xs-12">
            <select id="huongnha" name="huongnha">
                <option value="">Chọn hướng nhà</option>
                <?php for($i=0;$i<count($huongnha);$i++){?>
                <option value="<?=$huongnha[$i]['id']?>" <?php if($huongnha[$i]['id']==$_GET['huongnha']){ echo 'selected="selected"';}?>><?=$huongnha[$i]['ten_'.$lang]?></option>
                <?php } ?>
                </select>
        </div> <!-- #divArea-->
       
        <div class="search-btn">
            <input type="button" name="btnSearch" id="btnSearch" value="">
        </div> <!-- .search-btn-->
</form>