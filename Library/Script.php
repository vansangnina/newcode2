<?php
namespace Library;
/**
 * Application Main Page That Will Serve All Requests
 *
 * @package Simple Nina Framework
 * @author  Hiếu Nguyễn <nguyenhieunina@gmail.com>
 * @version 1.0.0
 * @license http://nina.vn
 */
class script extends functions{
	private $db;
	private $lang;
	
    public function __construct($db,$lang)
    {
        $this->db = $db;
        $this->lang = $lang;
    }

	public function skillcopy()	
	{	
		$result = '
			<script type="text/JavaScript">
			function killCopy(e){
			return false
			}
			function reEnable(){
			return true
			}
			document.onselectstart=new Function ("return false")
			if (window.sidebar){
			document.onmousedown=killCopy
			document.onclick=reEnable
			}
			</script>
		';
		return $result;
	}

	public function rightclick()	
	{	
		$result = '
			<script type="text/JavaScript">
			var message="NoRightClicking";
			function defeatIE() {if (document.all) {(alert("© 2018 Master All Right Reserved"));return false;}}
			function defeatNS(e) {if (document.layers||(document.getElementById&&!document.all))
			{ if (e.which==2||e.which==3||e.keyCode==123) {
				(alert("© 2018 Master All Right Reserved"));return false;}}} if (document.layers)
				{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=defeatNS;}
				else{document.onmouseup=defeatNS;document.oncontextmenu=defeatIE;} document.oncontextmenu=new Function("return false")
			</script>
			<script type="text/javascript">
			function showKeyCode(e) {
				if(e.keyCode==123){
					alert("© 2018 Master All Right Reserved");
						return false;
				}
			}
			</script>';
		return $result;
	}

	public function fixmenu()	
	{	
		$result = '
			<script type="text/JavaScript">
			$(window).scroll(function(event) {
				var cach_top = $("#slide_show").offset().top-64;
				var scroll_top = $(document).scrollTop();
				if(scroll_top >= 150 ){
					$(".hotro_top").slideUp(500);
					$("#header").addClass("active");
				} else {
					$(".hotro_top").slideDown(500);
					$("#header").removeClass("active");
				}
			});
			</script>';
		return $result;
	}

}
?>