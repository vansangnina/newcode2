<div class="header_top">
    <div class="container">
        <div id="banner"><a href=""><img src="<?=$this->logo()?>" alt="logo" /></a></div>
        <?php include LAYOUT."Menu.php";?>
        <div class="ngonngu">   
                <a href="ngon-ngu/vi.html"><img src="assets/images/vi.png" alt="vi" /></a>
                <a href="ngon-ngu/en.html"><img src="assets/images/en.png" alt="en" /></a>
        </div>
        <div class="giohang_top"><a class="icon_cart_top" href="thanh-toan.html"><i class="fas fa-cart-plus"></i><span><?=count($_SESSION['cart'])?></span></a>
            <div class="add-to-cart-success">
                <span class="close"><i class="fas fa-times"></i></span>
                <p class="text"><i class="fas fa-check"></i> <?=_giohangcuaban?> !</p>
                <div class="info_cart">
                    <ul class="item_cart ul">
                    <?php 
                    if(is_array($_SESSION['cart'])){
                        $max=count($_SESSION['cart']);
                        for($i=0;$i<$max;$i++){
                            $pid=$_SESSION['cart'][$i]['productid'];
                            $q=$_SESSION['cart'][$i]['qty'];
                            $pro_info = $cart->get_product_info($pid);
                            if($q==0) continue;
                    ?>
                        <li>
                            <a href="san-pham/<?=$pro_info['slug']?>.html"><img src="<?=_upload_product_l.'80x80x1/'.$pro_info['thumb']?>" alt="<?=$pro_info['name_'.$lang]?>" class='img' /></a>
                            <h3><?=$pro_info['name_'.$lang]?></h3>
                            <p class="price"><?=_gia?> : <?=number_format($pro_info['price'],0, ',', '.')?>&nbsp;đ</p>
                            <p class="amount"><?=_soluong?> :  <?=$q?></p>
                            <a class="view" href="san-pham/<?=$pro_info['slug']?>.html"><?=_xem?></a>
                        </li>
                    <?php } } ?>
                    </ul>
                </div>
                <a class="btn_xemgh" href="thanh-toan.html"><?=_xemgiohangvathanhtoan?></a>
            </div>
        </div>
        <div class="icon_search"><a href="thanh-toan.html"><i class="fas fa-search"></i></a>
        <?=$this->timkiem->html();?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.header_top').on('click','.add-to-cart-success .close',function(event) {
            /* Act on the event */
            $('.add-to-cart-success').animate({top:'-1000px',opacity:0},500);
        });
        $('.icon_cart_top').click(function(event) {
            /* Act on the event */
            $('.add-to-cart-success').animate({top:'35px',opacity:1},500);
            return false;
        });
    });
</script>