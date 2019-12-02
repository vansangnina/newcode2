<nav id="menu_mm">
   <ul>
          <li class="icon <?php if($_GET['com']=='san-pham'){?>active<?php }?>"><a href="san-pham.html"><?=_danhmucsanpham?></a>
          <ul><?=$func->danhmuccap('cate','san-pham','product',2);?></ul>
          </li>
          <li class="icon <?php if($_GET['com']=='trang-chu' || $_GET['com']==''){?>active<?php }?>"><a  href=""><?=_trangchu?></i></a></li>
          <li class="icon <?php if($_GET['com']=='gioi-thieu'){?>active<?php }?>"><a  href="gioi-thieu.html"><?=_gioithieu?></i></a></li>
          <li class="icon <?php if($_GET['com']=='dich-vu'){?>active<?php }?>"><a  href="dich-vu.html"><?=_dichvu?></i></a></li>
          <li class="icon <?php if($_GET['com']=='nguyen-lieu'){?>active<?php }?>"><a href="nguyen-lieu.html"><?=_nguyenlieu?></a>
          <ul><?=$func->danhmuccap('cate','nguyen-lieu','nguyenlieu',1);?></ul>
          </li>
          <li class="icon <?php if($_GET['com']=='khuyen-mai'){?>active<?php }?>"><a href="khuyen-mai.html"><?=_khuyenmai?></a></li>
          <li class="<?php if($_GET['com']=='lien-he'){?>active<?php }?>"><a href="lien-he.html"><?=_lienhe?></a></li>
      </ul>
</nav>
