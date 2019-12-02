<div class="logo"> <a href="#" target="_blank" onclick="return false;"> <img src="assets/images/logo.png"  alt="" /> </a></div>
<div class="sidebarSep mt0"></div>
<!-- Left navigation -->
<ul id="menu" class="nav">
  <li class="dash" id="menu1"><a class=" active" title="" href="index.html"><span>Trang chủ</span></a></li>
  
  <li class="categories_li <?php if($type->name=='product' || $type->name=='size' || $type->name=='mausac') echo ' activemenu' ?>" id="menu_sp"><a href="" title="" class="exp"><span>Sản phẩm</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($type->name=='product' && $fact=='list') echo ' class="this"' ?>><a href="admin/cate/man_list/product">Danh mục cấp 1</a></li>
      <li<?php if($type->name=='product' && $fact=='cat') echo ' class="this"' ?>><a href="admin/cate/man_cat/product">Danh mục cấp 2</a></li>
      <li<?php if($type->name=='product' && $fact=='item') echo ' class="this"' ?>><a href="admin/cate/man_item/product">Danh mục cấp 3</a></li>
      <li<?php if($type->name=='product' && $fact=='sub') echo ' class="this"' ?>><a href="admin/cate/man_sub/product">Danh mục cấp 4</a></li>
      <li<?php if($type->name=='product' && $fact=='') echo ' class="this"' ?>><a href="admin/product/man/product">Quản lý sản phẩm</a></li>

      <li<?php if($type->name=='size' && $fact=='') echo ' class="this"' ?>><a href="admin/title/man/size">Quản lý size</a></li>
      <li<?php if($type->name=='mausac' && $fact=='') echo ' class="this"' ?>><a href="admin/title/man/mausac">Quản lý màu sắc</a></li>

    </ul>
  </li>

  <li class="categories_li <?php if($_GET['type']=='tintuc') echo ' activemenu' ?>" id="menu_tt"><a href="" title="" class="exp"><span>Tin tức</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($type->name=='tintuc' && $fact=='list') echo ' class="this"' ?>><a href="admin/cate/man_list/tintuc">Danh mục</a></li>
      <li<?php if($type->name=='tintuc' && $fact=='') echo ' class="this"' ?>><a href="admin/post/man/tintuc">Tin tức</a></li>
    </ul>
  </li>

  <li class="categories_li <?php if($_GET['com']=='post') echo ' activemenu' ?>" id="menu_bv"><a href="" title="" class="exp"><span>Bài viết</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($type->name=='tuvan' && $fact=='') echo ' class="this"' ?>><a href="admin/post/man/tuvan">Tư vấn</a></li>
      <li<?php if($type->name=='chinhsach' && $fact=='') echo ' class="this"' ?>><a href="admin/post/man/chinhsach">Chính sách</a></li>
      <li<?php if($type->name=='camnhan' && $fact=='') echo ' class="this"' ?>><a href="admin/post/man/camnhan">Cảm nhận khách hàng</a></li>
    </ul>
  </li>

  <!--  <li class="template_li<?php if($type->name=='album') echo ' activemenu' ?>" id="menu_abs"><a href="#" title="" class="exp"><span>Hình ảnh</span><strong></strong></a>
      <ul class="sub">
            <li<?php if($type->name=='album' && $fact=='') echo ' class="this"' ?>><a href="admin/album/man/album" title="">Danh sách album</a></li>
      </ul>
  </li> 
   -->

  <!-- <li class="template_li<?php if($_GET['com']=='chinhanh' || $_GET['com']=='tinhthanh') echo ' activemenu' ?>" id="menu_mb"><a href="#" title="" class="exp"><span>Chi Nhánh</span><strong></strong></a>
        <ul class="sub">
          <li<?php if($_GET['act']=='man_cat') echo ' class="this"' ?>><a href="admin/tinhthanh/man_cat" title="">Quản lý tỉnh thành</a></li>
          <li<?php if($_GET['act']=='man') echo ' class="this"' ?>><a href="admin/tinhthanh/man" title="">Quản lý quận huyện</a></li>

          <li<?php if($_GET['act']=='man') echo ' class="this"' ?>><a href="admin/chinhanh/man/chinhanh" title="">Quản lý chi nhánh</a></li>
        </ul>
    </li> 
 -->


   <li class="categories_li <?php if($_GET['com']=='info') echo ' activemenu' ?>" id="menu_tt"><a href="" title="" class="exp"><span>Trang tĩnh</span><strong></strong></a>
    <ul class="sub">
      <li <?php if($type->name=='gioithieu') echo ' class="this"' ?>><a href="admin/info/capnhat/gioithieu">Giới thiệu</a></li>

      <li <?php if($type->name=='ndkhuyenmai') echo ' class="this"' ?>><a href="admin/info/capnhat/ndkhuyenmai">Nội dung Khuyến mãi</a></li>
      <li <?php if($type->name=='nddichvu') echo ' class="this"' ?>><a href="admin/info/capnhat/nddichvu">Nội dung dịch vụ</a></li>
      <li <?php if($type->name=='ndspkhac') echo ' class="this"' ?>><a href="admin/info/capnhat/ndspkhac">Nội dung SP khác</a></li>
      <li <?php if($type->name=='ndthietke') echo ' class="this"' ?>><a href="admin/info/capnhat/ndthietke">Nội dung thiết kế</a></li>
      <li <?php if($type->name=='ndspcaocap') echo ' class="this"' ?>><a href="admin/info/capnhat/ndspcaocap">Nội dung Tab Sản phẩm</a></li>
      <li <?php if($type->name=='ndtintuc') echo ' class="this"' ?>><a href="admin/info/capnhat/ndtintuc">Nội dung tin tức</a></li>

<!--      <li <?php if($type->name=='trangchu') echo ' class="this"' ?>><a href="admin/info/capnhat/trangchu">Trang chủ</a></li>
 -->     <!--  <li <?php if($type->name=='htkhachhang') echo ' class="this"' ?>><a href="admin/info/capnhat/htkhachhang">Hỗ trợ khách hàng</a></li>
      <li <?php if($type->name=='nhanmay') echo ' class="this"' ?>><a href="admin/info/capnhat/nhanmay">Nhận may theo yêu cầu</a></li> -->

<!--       <li <?php if($type->name=='trangchu') echo ' class="this"' ?>><a href="admin/info/capnhat/trangchu">Trang chủ</a></li>
 --><!--       <li <?php if($type->name=='tuyendung') echo ' class="this"' ?>><a href="admin/info/capnhat/tuyendung">Tuyển dụng</a></li>
 -->    </ul>
  </li> 


  <li class="template_li<?php if($_GET['com']=='setting' || $_GET['com']=='newsletter' || $_GET['com']=='banner'  || $type->name=='lienhe' || $type->name=='footer' || $_GET['com']=='background') echo ' activemenu' ?>" id="menu5"><a href="#" title="" class="exp"><span>Thông tin công ty</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($type->name=='logo') echo ' class="this"' ?>><a href="admin/banner/capnhat/logo" title="">logo</a></li>
      <li<?php if($type->name=='banner') echo ' class="this"' ?>><a href="admin/banner/capnhat/banner" title="">banner</a></li>
      <li<?php if($type->name=='banner_footer') echo ' class="this"' ?>><a href="admin/banner/capnhat/banner_footer" title="">Logo Footer</a></li>
      <li<?php if($type->name=='bocongthuong') echo ' class="this"' ?>><a href="admin/banner/capnhat/bocongthuong" title="">Bộ công thương</a></li>
      <li<?php if($type->name=='favicon') echo ' class="this"' ?>><a href="admin/banner/capnhat/favicon" title="">Favicon</a></li>
      <li<?php if($type->name=='bgweb') echo ' class="this"' ?>><a href="admin/background/capnhat/bgweb" title="">Background</a></li>
      <li<?php if($type->name=='lienhe') echo ' class="this"' ?>><a href="admin/info/capnhat/lienhe" title="">Liên hệ</a></li>
      <li<?php if($type->name=='footer') echo ' class="this"' ?>><a href="admin/info/capnhat/footer" title="">Footer</a></li>
      <li<?php if($type->name=='chinhanh') echo ' class="this"' ?>><a href="admin/title/man/chinhanh" title="">Quản lý chi nhánh</a></li>
      <li<?php if($_GET['com']=='setting') echo ' class="this"' ?>><a href="admin/setting/capnhat" title="">Cấu hình chung</a></li>
      <li<?php if($_GET['com']=='newsletter') echo ' class="this"' ?>><a href="admin/newsletter/man" title="">Đăng ký nhận tin</a></li>
    </ul>
  </li>

  <li class="marketing_li<?php if($_GET['com']=='yahoo' || $_GET['com']=='link') echo ' activemenu' ?>" id="menu6"><a href="#" title="" class="exp"><span>Hổ Trợ Online</span><strong></strong></a>
    <ul class="sub">
      <li <?php if($type->name=='mangxh') echo ' class="this"' ?>><a href="admin/link/man/mangxh" title="">Mạng xã hội</a></li>
      <li <?php if($_GET['com']=='link') echo ' class="this"' ?>><a href="admin/link/man/link" title="">Liên kết</a></li> 
  </ul>
  </li>

  <li class="gallery_li<?php if($_GET['com']=='photo') echo ' activemenu' ?>" id="menu7"><a href="#" title="" class="exp"><span>Hình Ảnh - Slider</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($type->name=='slider') echo ' class="this"' ?>><a href="admin/photo/man/slider" title="">Hình ảnh slider</a></li>
      <!-- <li<?php if($type->name=='slider2') echo ' class="this"' ?>><a href="admin/photo/man_photo/slider2" title="">Hình ảnh slider trong</a></li> -->
<!--       <li<?php if($type->name=='quangcao') echo ' class="this"' ?>><a href="admin/photo/man_photo/quangcao" title="">Quảng cáo</a></li>
 --><!-- <li<?php if($type->name=='doitac') echo ' class="this"' ?>><a href="admin/photo/man_photo/doitac" title="">Đối tác</a></li> -->
    <!-- <li<?php if($type->name=='hinhanh_gt') echo ' class="this"' ?>><a href="admin/photo/man_photo/hinhanh_gt" title="">Giới thiệu</a></li> -->
    </ul>
  </li>
<!-- <li class="gallery_li<?php if($_GET['com']=='video') echo ' activemenu' ?>" id="menu_v"><a href="#" title="" class="exp"><span>Video</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($_GET['com']=='video') echo ' class="this"' ?>><a href="admin/video/man/video" title="">Video</a></li>
    </ul>
  </li>  -->

</ul>