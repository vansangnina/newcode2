<?php
    $chinhanh  =  $db->query("select * from #_title where shows=1 and type='chinhanh' order by number,id desc ");
?>
<div class="tag_map">
    <ul>
    <?php for($i=0;$i<count($chinhanh);$i++){?>
        <li><a <?php if($i==0){ echo "class='active'"; }?> href="#" data-toado="<?=$chinhanh[$i]['id']?>"><?=$chinhanh[$i]['ten_'.$lang]?>
        </a></li>
    <?php } ?>
    </ul>
</div>
<div id="load_map"></div>

<script type="text/javascript">
    $(document).ready(function() {
        var id = '<?=$chinhanh[0]['id']?>';
        $.ajax({
            type:'POST',
            url:'ajax/map.php',
            data:{id:id},
            success: function(result) {
                $('#load_map').html(result);
                initialize_chi();
            }
        });
        $('.tag_map li a,.diachi_map li a').click(function(event) {
            /* Act on the event */
            $('.tag_map li a').removeClass('active');
            $(this).addClass('active');
            var id = $(this).data('toado');
            $.ajax({
                type:'POST',
                url:'ajax/map.php',
                data:{id:id},
                success: function(result) {
                    $('#load_map').html(result);
                    initialize_chi();
                }
            });
            return false;
        });
    });
</script>