<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyD5Mevy_rl8U4ZyBB8i5jmdxfvb9Cg5UoE&sensor=false"></script>
<script>
function initialize_map() {
    var myLatlng = new google.maps.LatLng(<?=$row_setting['toado']?>);
    var mapOptions = {
        zoom: 15,
        center: myLatlng
    };
    var map = new google.maps.Map(document.getElementById('map_canvas_bt'), mapOptions);
    var contentString = "<table style='text-align:left; font-weight:100;'><tr><th style='font-size:16px; color:#039BB2; font-weight:bold; text-transform: uppercase;'><?=$row_setting['ten_'.$lang]?></th></tr><tr><th>Địa chỉ : <?=$row_setting['diachi_'.$lang]?></th></tr><tr><th>Điện thoại : <?=$row_setting['dienthoai']?></th></tr><tr><th>Email : <?=$row_setting['email']?></th></tr></table>";

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });

    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: "<?=$row_setting['ten_'.$lang]?>"
    });
    //infowindow.open(map, marker);
}
google.maps.event.addDomListener(window, 'load', initialize_map);
</script>

<div id="map_bottom">
    <div id="map_canvas_bt"></div>
</div>