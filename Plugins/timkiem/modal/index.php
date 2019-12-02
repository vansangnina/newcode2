<div class="modal fade" id="search_box" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
      <form id="searchForm" action="tim-kiem.html" method="" name="frm_search" class="frm_search">
      <fieldset>
        <input type="text" autocomplete="off" name="timkiem" id="s" class="input" placeholder="Từ khóa tìm kiếm .">
        <button type="submit" value="" id="submitButton"></button>
        </fieldset>
      </form>
    </div>
  </div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
       $('.frm_search').submit(function(){
          var timkiem = $('#s').val();
          if(!timkiem){
            alert('Bạn chưa nhập từ khóa . ');
            $('#s').focus();
          } else {
            window.location.href="tim-kiem.html&keywords="+timkiem;
          }
          return false;
      })
  });
</script>