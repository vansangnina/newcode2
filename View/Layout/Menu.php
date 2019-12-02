<div class="menubar">
  <nav class="menu_top">
      <ul>
        
        <li><a href=""><?=_trangchu?></a></li>
        <li><a href="gioi-thieu.html"><?=_gioithieu?></a></li>
        <li><a href="san-pham.html"><?=_sanpham?></a>
    		<ul>
    			<?=\Library\Functions::danhmuccap('cate','san-pham','product',2);?>
    		</ul>
        </li>
        <li><a href="chinh-sach.html"><?=_chinhsachmuahang?></a>
        <?=\Library\Functions::listdanhsach('post','chinh-sach','chinhsach');?>
        </li>
        <li><a href="lien-he.html"><?=_lienhe?></a></li>

      </ul>
  </nav>
  <div class="header_mm"><a href="#menu_mm"><span></span></a></div>  
</div> 