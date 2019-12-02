 $(document).ready(function(){

    function loading_show(){
        $('#loading').html("<img src='images/image-loading-animation.gif'/>").fadeIn('fast');
    }

    function loading_hide(){
        $('#loading').fadeOut('fast');
    }             

    function loadData(page,list){
        loading_show(); 
        $.ajax
        ({
            type: "POST",
            url: "ajax_paging/index.php",
            data: {page:page,list:list},
            success: function(msg)
            {
                loading_hide();
                $('.load_sanpham').html(msg);
            }
        });
    }

    $('.load_sanpham').on('click','.pagination li.active',function(){
        var list = $('.load_sanpham li a.active').data('id');
        var page = $(this).attr('p');;
        loadData(page,list);
    });

    loadData(1,'all');

    $('.tags_nb li a').click(function(event) {
        $('.tags_nb li').removeClass('active');
        $(this).parent().addClass('active');
        var list = $(this).data('id');
        loadData(1,list);
        return false;
    });

});