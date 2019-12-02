<style type="text/css">
.taidat-messages { position: fixed; bottom: 0; right: 0; z-index: 999999; }
.taidat-messages-outer { position: relative; }
#taidat-minimize { background: #3b5998; font-size: 14px; color: #fff; padding: 3px 10px; position: absolute; top: -34px; left: -1px; border: 1px solid #E9EAED; cursor: pointer; }
@media screen and (max-width:768px){ #taidat-facebook { opacity:0; } .taidat-messages { bottom: -300px; right: -135px; } }
</style>
<div id='fb-root'></div>
<script>
(function($) { $(document).ready(function(){ $( '#taidat-minimize' ).click( function() { if( $( '#taidat-facebook' ).css( 'opacity' ) == 0 ) { $( '#taidat-facebook' ).css( 'opacity', 1 ); $( '.taidat-messages' ).animate( { right: '0' } ).animate( { bottom: '0' } ); } else { $( '.taidat-messages' ).animate( { bottom: '-300px' } ).animate( { right: '-135px' }, 400, function(){ $( '#taidat-facebook' ).css( 'opacity', 0 ) } ); } } ) }); })(jQuery);
(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div class="taidat-messages"><div class="taidat-messages-outer"><div id="taidat-minimize">Facebook chat</div><div id="taidat-facebook" class='fb-page' data-adapt-container-width='true' data-height='300' data-hide-cover='false' data-href='<?=$row_setting['facebook']?>' data-show-facepile='true' data-show-posts='false' data-small-header='false' data-tabs='messages' data-width='250'></div></div></div>