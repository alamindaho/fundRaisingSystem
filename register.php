<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
    
    <title>YUMSUK Fund Raising System</title>
	<!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- end Google Font -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,500,600,700,800,300' rel='stylesheet' type='text/css'>
    <!-- owl carousel SLIDER -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <!-- end awesome icons -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- lightbox -->
    <link href="css/prettyPhoto.css" rel="stylesheet">
    
    <!-- Animation Effect CSS -->
    <link rel="stylesheet" href="css/animation.css">
    <!-- Main Stylesheet CSS -->
    <link rel="stylesheet" href="style.css">
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="js/html5shiv.js"></script>
	  <script src="js/respond.min.js"></script>
	<![endif]-->

	<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
	<link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />

</head>
<body data-spy="scroll" data-offset="25">
<div class="animationload"><div class="loader">Loading...</div></div> <!-- End Preloader -->
       
    <!--/HEADER SECTION -->
    <header class="header">
        <div class="container">
            <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="min-height:70px;">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a href="index.html" class="navbar-brand">YUMSUK <br> <span class="slogo">Fund Raising System <span></a>
                    </div><!-- end navbar-header -->
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a data-scroll href="index.html" class="int-collapse-menu">Home</a></li>
                        <li><a href="signin.php">Donate</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </div>
        </div><!-- end container -->
    </header><!-- end header -->
			<div style="min-height:700px;">
	<div class="col-sm-8 col-sm-offset-2">
		<center>
		<br><br><br>
		<br><br><br>
			<form method="post">
	<h4 style="color:green;">REGISTER</h4>
				<?php
				
				include 'admin/include/conn.php';
				
		extract($_POST);
		if(isset($submit)) {
			
			
			if($name !="" && $matric !="" && $faculty !="" && $dept !="" && $level !="" && $phone !="" && $email !="" && $sex !="" && $username !="" && $password !="") {
				
				$query = "INSERT INTO `users`(name, matric, faculty, dept, level, phone, email, sex, reg_date, username, password) VALUES('$name','$matric','$faculty','$dept','$level', '$phone', '$email', '$sex', NOW(), '$username', '$password')";
				
				if($result = mysqli_query($dbc, $query)) {
					
					echo '<p style="color:green">Registration successful</p>';
				} else {
					
					echo 'Error: '.mysqli_error($dbc);
				} 
			} else {
				
				echo '<p style="color:brown;">All Fields Required</p>';
			}
		}
	?>
	<div class="col-sm-12">
	<div class="form-group">
		<input type="text" name="name" placeholder="Full Name" class="form-control input-lg" />
	</div>
	<div class="form-group">
		<input type="text" name="matric" placeholder="Matric. Number" class="form-control input-lg" />
	</div>
	</div>
		<div class="col-sm-6">
	<div class="form-group">
		<select name="faculty" class="form-control input-lg">
			<option>-Faculty-</option>
			<option>Agric</option>
			<option>Art</option>
			<option>Social and Management science</option>
			<option>Health Sciences</option>
			<option>Science</option>
			<option>Law</option>
			<option>Engineering</option>
			<option>Education</option>
		</select>
		</div>
		</div>
		<div class="col-sm-6">
		<div class="form-group">
		<input type="text" name="dept" placeholder="Department" class="form-control input-lg" />
	</div>
		</div>
				<div class="col-sm-6">
		<div class="form-group">
		<select name="level" class="form-control input-lg">
			<option>-Level-</option>
			<option>100</option>
			<option>200</option>
			<option>300</option>
			<option>400</option>
			<option>500</option>
		</select>
		</div>
				</div>
				<div class="col-sm-6">
	<div class="form-group">
		<input type="number" name="phone" placeholder="Phone Number" class="form-control input-lg" />
	</div>
				</div>
	<div class="col-sm-6">
	<div class="form-group">
		<input type="email" name="email" placeholder="Email" class="form-control input-lg" />
	</div>
	</div>
	<div class="col-sm-6">
	<div class="form-group">
		<input type="text" name="sex" placeholder="Sex" class="form-control input-lg" />
	</div>
	</div>
	<div class="col-sm-6">
	<div class="form-group">
		<input type="text" name="username" placeholder="Username" class="form-control input-lg" />
	</div>
	</div>
				<div class="col-sm-6">
	<div class="form-group">
		<input type="text" name="password" placeholder="Password" class="form-control input-lg" />
	</div>
	</div>
	<div class="form-group">
		<button type="submit" name="submit" class="btn btn-success btn-lg">Register</button>
		Already registered? <a href="signin.php">sign in</a>
	</div>
	
</form>
		</center>
	</div>    
			</div>
    <!--/ FOOTER SECTION-->  
    <section id="footer" class="footer-wrapper text-center">
        <div class="container">
            <div class="title text-center" data-scroll-reveal="enter from the bottom after 0.5s">
               <div class="aligncenter">     
				  <a href="index.html" class="navbar-brand">TSU <br> <span class="slogo">Fund Raising System <span></a>
                 
                    <div class="socialFooter">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                       
                        <a href="#"><i class="fa fa-flickr"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                       
                        <a href="#"><i class="fa fa-youtube"></i></a>
                    
                    </div>
               		<!-- don't removed this as we are providing it for free -->
    	<p>Designed by © 2015 <a href="http://www.createwebsite.net">Create Website</a></p>
                <a data-scroll-reveal="enter from the bottom after 0.3s" href="#home"><i class="fa fa-angle-up"></i></a>
            </div>    <!-- end title -->
        </div>  <!-- end container -->
    </section><!--/ Footer  End --> 
     
    <!-- SECTION CLOSED -->
     
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>   
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/smooth-scroll.js"></script>
    <script src="js/jquery.parallax-1.1.3.js"></script>
    <script src="js/jquery.easypiechart.min.js"></script>
    <script src="js/owl.carousel.js"></script>
	<script src="js/jquery.jigowatt.js"></script>
    <script src="js/custom.js"></script>
	<script src="js/jquery.unveilEffects.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
	<script>
		(function ($) {
			var $container = $('.masonry_wrapper'),
				colWidth = function () {
					var w = $container.width(), 
						columnNum = 1,
						columnWidth = 0;
					if (w > 1200) {
						columnNum  = 3;
					} else if (w > 900) {
						columnNum  = 3;
					} else if (w > 600) {
						columnNum  = 2;
					} else if (w > 300) {
						columnNum  = 1;
					}
					columnWidth = Math.floor(w/columnNum);
					$container.find('.item').each(function() {
						var $item = $(this),
							multiplier_w = $item.attr('class').match(/item-w(\d)/),
							multiplier_h = $item.attr('class').match(/item-h(\d)/),
							width = multiplier_w ? columnWidth*multiplier_w[1]-4 : columnWidth-4,
							height = multiplier_h ? columnWidth*multiplier_h[1]*0.5-4 : columnWidth*0.5-4;
						$item.css({
							width: width,
							height: height
						});
					});
					return columnWidth;
				}
							
				function refreshWaypoints() {
					setTimeout(function() {
					}, 1000);   
				}
							
				$('nav.portfolio-filter ul li a').on('click', function() {
					var selector = $(this).attr('data-filter');
					$container.isotope({ filter: selector }, refreshWaypoints());
					$('nav.portfolio-filter ul li a').removeClass('active');
					$(this).addClass('active');
					return false;
				});
					
				function setPortfolio() { 
					setColumns();
					$container.isotope('reLayout');
				}
		
				isotope = function () {
					$container.isotope({
						resizable: true,
						itemSelector: '.item',
						masonry: {
							columnWidth: colWidth(),
							gutterWidth: 0
						}
					});
				};
			isotope();
			$(window).smartresize(isotope);
		}(jQuery));
	</script>

    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
        <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
        <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
        
		<script type="text/javascript">
			var revapi;
			jQuery(document).ready(function() {
			revapi = jQuery('.tp-banner').revolution(
			{
				delay:9000,
				startwidth:1170,
				startheight:500,
				hideThumbs:10,
				fullWidth:"off",
				fullScreen:"on",
				fullScreenOffsetContainer: ""
			 });
		   });	//ready
		</script>
		
		
    
    <!-- Animation Scripts-->
    <script src="js/scrollReveal.js"></script>
    <script>
            (function($) {
            "use strict"
                window.scrollReveal = new scrollReveal();
            })(jQuery);
    </script>
    
    <!-- Portofolio Pretty photo JS -->       
    <script src="js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript">
        (function($) {
            "use strict";
            jQuery('a[data-gal]').each(function() {
                jQuery(this).attr('rel', jQuery(this).data('gal'));
            });  	
                jQuery("a[data-gal^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',slideshow:false,overlay_gallery: false,theme:'light_square',social_tools:false,deeplinking:false});
        })(jQuery);
    </script>
          
    <!-- Video Player o-->
    <script src="js/jquery.mb.YTPlayer.js"></script>    
    <script type="text/javascript">
      (function($) {
        "use strict"
          $(".player").mb_YTPlayer();
        })(jQuery);	
    </script>
    
</body>
</html>