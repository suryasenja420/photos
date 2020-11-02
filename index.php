<?php
	//require "func.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="#3C9CCD">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="#3C9CCD">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#3C9CCD">
	<title>Photo</title>
	<link rel="shortcut icon" href="assets/img/icons.png" type="image/x-icon"/>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.css">
	<link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/pagination.css">
	<link rel="stylesheet" href="assets/css/style.css">
	
    <script src="assets/js/jquery.min.js"></script>
</head>
<body>
	<div class="header-main">
		<div class="container">
			<a href="index.php" class="main-title"><h1>Photo</h1></a>
		</div>
	</div>
	
	<div class="container body-main">
	<?php

		$file = scandir(".");
		unset($file[0], $file[1]);
		if(isset($_GET['page'])){
			$q = $_GET['page'];
			$p = $q.".php";
			if(in_array($p, $file)){
				include $p;
			}else{
				include "404.php";
			}
		}else{
			include "home.php";
		}
	?>
	</div>

	<a href="#" class="scrollToTop" style="display: inline;">
		<i class="fa fa-angle-up"></i>
	</a>

	<div class="footer">
		<div class="container">
			<div class="container">
				<div class="row">
					<div class="col-xs-6 footer-left">
						<h1>Photo</h1>
						<p>Powered by <a href="http://heroku.com/" target="blank">heroku</a></p>
					</div>
					<div class="col-xs-6 social-btn text-right">				
						
					</div>
				</div>
				<div style="clear:both"></div>
			</div>
		</div>
	</div>
	<script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/jquery.easing.min.js"></script>
	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/dataTables.bootstrap.min.js"></script>
	<script src="assets/js/pagination.min.js"></script>
	<script src="assets/js/jquery.inview.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".dataTable").DataTable( {
			  	"ordering": false,
			  	"lengthMenu": [ [100, -1], [100, "ALL"] ]
			});

			$(".scrollToTop").click(function(){
				$('html, body').stop().animate({
			      scrollTop: 0
			    }, 1000, 'easeInOutExpo');
				return false;
			});
			
			/// scroll things
			var scrollDistance = $(document).scrollTop();
			var scrt = $(".scrollToTop").offset().top;
			var bdh = $('body').height();
			var foth = $(".footer").height();
			
			if(scrollDistance >= bdh-foth-600 ){
				$(".scrollToTop").addClass("scrollToTopRel");
			}else{
				$(".scrollToTop").removeClass("scrollToTopRel");
			}
			$(document).on('scroll', function() {
				scrollDistance = $(this).scrollTop();
				bdh = $('body').height();
				foth = $(".footer").height();
				if(scrollDistance >= bdh-foth-600 ){
					$(".scrollToTop").addClass("scrollToTopRel");
				}else{
					$(".scrollToTop").removeClass("scrollToTopRel");
				}
			});
		});
	</script>
</body>
</html>