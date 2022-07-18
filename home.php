<?php

						include 'admin/include/conn.php';

	session_start();
	if($_SESSION['usn']) {		
?>
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
                        <a href="home.php" class="navbar-brand">YUMSUK <br> <span class="slogo">Fund Raising System <span></a>
                    </div><!-- end navbar-header -->
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                        <li><a data-scroll href="mydonation.php" class="int-collapse-menu">My Donations</a></li>
						<li><a data-scroll href="#" class="int-collapse-menu" style="text-transform:uppercase"><?php
		$a = $_SESSION['usn'];
			if($result = mysqli_query($dbc,"SELECT matric FROM users WHERE username='$a'")) {
				$row = mysqli_fetch_array($result);
				echo $row['matric'];
			} else {
				echo 'error:mysqli_error($dbc)';
			} 
												?></a></li>
                        <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </div>
        </div><!-- end container -->
    </header><!-- end header -->
			<div style="min-height:700px;">
				<br><br><br><br>
	<div class="col-sm-6">
		<h2>All Available Donations</h2>
		<hr style="border:1px solid green;" />
		<table class="table table-condensed table-responsive table-bordered table-striped">
            <thead>
				<tr>
				    <th width='2%'>S/No</th>
				    <th width='35%'>TITLE</th>
				    <th width='8%'>TOTAL REQUIRED AMOUNT</th>
				    <th width='5%'>DEADLINE</th>
				    <th width='50%'>DESCRIPTION</th>
				</tr>
            </thead>
            <tbody>
				  <?php
					if($result = mysqli_query($dbc, "SELECT * FROM `add_donation` WHERE status='available' ORDER BY add_date ASC")) {
                        
                        $i = 1;
		                  while($row = mysqli_fetch_array($result)) {
			     ?>
			         <tr>				
			     <?php
			         echo '<td>'.$i++.'</td>';
			         echo '<td>'.$row['title'].'</td>';
			         echo '<td>'.$row['amount'].'</td>';
			         echo '<td>'.$row['deadline'].'</td>';
			         echo '<td>'.$row['remark'].'</td>';
		          ?>
					</tr>
                <?php
                    }
                    }else {
                        
                        echo "<p style='color:red'>Error:</p> ".mysqli_error($dbc);
                    }
		?>
				</tbody>
			</table>
	</div> 
	<div class="col-sm-6">
		<h2>Donate</h2>
				<hr style="border:1px solid green;" />
		<?php
		extract($_POST);
		if(isset($submit)) {
			
			$name = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);
			$matric = filter_var($matric, FILTER_SANITIZE_SPECIAL_CHARS);
			$dname = filter_var($dname, FILTER_SANITIZE_SPECIAL_CHARS);
			$amount = filter_var($amount, FILTER_SANITIZE_SPECIAL_CHARS);
			
			
			if($name !="" && $matric !="" && $dname !="" && $amount !="" && $card !="" && $number !="" && $cvv !="" && $pin !="") {
								
				if($result = mysqli_query($dbc, "SELECT * FROM `users` WHERE matric='$matric'")) {
					
					$row = mysqli_fetch_array($result);
					
					$faculty = $row['Faculty'];
					$dept = $row['dept'];
					$level = $row['level'];
					$phone = $row['phone'];
					$email = $row['email'];
					$sex = $row['sex'];
				
				
				$query = "INSERT INTO `donation`(name, matric, faculty, dept, level, phone, type, amount, dono_date) VALUES('$name','$matric','$faculty','$dept','$level', '$phone', '$dname', '$amount', NOW())";
				}
				if($result = mysqli_query($dbc, $query)) {
					
					$query = "SELECT `amount` FROM `add_donation` WHERE title='$dname'";
					if($result = mysqli_query($dbc, $query)) {
						$row = mysqli_fetch_array($result);
						$r2 = $row['amount'];
					} else {
						echo 'Error: '.mysqli_error($dbc);
					}
					
					$query = "SELECT dname, required_sum, total_donated FROM `avail` WHERE dname='$dname'";
					
					$result = mysqli_query($dbc, $query);
						
					if($q1 = mysqli_num_rows($result) > 0) {
						
						$row = mysqli_fetch_array($result);
						$avail = $row['total_donated'];
						$new = $avail + $amount;
						$query = "UPDATE `avail` SET total_donated='$new' WHERE dname='$dname'";
					} else {
						
						$query = "INSERT INTO `avail`(dname, required_sum, total_donated) VALUES('$dname', '$r2', '$amount')";
					}
						$result = mysqli_query($dbc, $query);
					echo '<p style="color:green">Donation successful</p>';
				} else {
					
					echo 'Error: '.mysqli_error($dbc);
				} 
			} else {
				
				echo '<p style="color:brown;">All Fields Required</p>';
			}
		}
	?>
<form method="post">
	<div class="col-sm-12">
	<div class="form-group">
		<input type="text" name="name" value="<?php
		$a = $_SESSION['usn'];
			if($result = mysqli_query($dbc,"SELECT name FROM users WHERE username='$a'")) {
				$row = mysqli_fetch_array($result);
				echo $row['name'];
			} else {
				echo 'error:mysqli_error($dbc)';
			} 
												?>" class="form-control input-lg" />
	</div>
	</div>
	<div class="col-sm-12">
	<div class="form-group">
		<input type="text" name="matric" value="<?php
		$a = $_SESSION['usn'];
			if($result = mysqli_query($dbc,"SELECT matric FROM users WHERE username='$a'")) {
				$row = mysqli_fetch_array($result);
				echo $row['matric'];
			} else {
				echo 'error:mysqli_error($dbc)';
			} 
												?>" class="form-control input-lg" />
	</div>
	</div>
		<div class="col-sm-12">
	<div class="form-group">
		<select name="dname" class="form-control input-lg">
			<option>-select donation-</option>
			<?php
				if($result = mysqli_query($dbc, "SELECT title FROM add_donation WHERE status='available'")) {
					while($row = mysqli_fetch_array($result)) {
						?>
				<option><?php echo $row['title']; ?></option>
			<?php
					}
				} 
		?>
		</select>
		</div>
		</div>
		<div class="col-sm-6">
		<div class="form-group">
		<input type="number" name="amount" placeholder="Amount" class="form-control input-lg" />
	</div>
		</div>
	<div class="col-sm-6">
		<div class="form-group">
		<select name="card" class="form-control input-lg">
			<option>-Card Type-</option>
			<option>Master Card</option>
			<option>Visa</option>
			<option>Verve</option>
		</select>
		</div>
	</div>
	<div class="col-sm-12">
	<div class="form-group">
		<input type="number" name="number" placeholder="Card Number" class="form-control input-lg" />
	</div>
	</div>
	<div class="col-sm-6">
	<div class="form-group">
		<input type="number" name="cvv" placeholder="Cvv" class="form-control input-lg" />
	</div>
	</div>
	<div class="col-sm-6">
	<div class="form-group">
		<input type="number" name="pin" placeholder="Pin" class="form-control input-lg" />
	</div>
	</div>
	<div class="col-sm-12">
	<div class="form-group">
		<button type="submit" name="submit" class="btn btn-success btn-lg">Donate</button>
	</div>
	</div>
	</div>
</form>
	</div>
    <!--/ FOOTER SECTION-->  
    <section id="footer" class="footer-wrapper text-center">
        <div class="container">
            <div class="title text-center" data-scroll-reveal="enter from the bottom after 0.5s">
               <div class="aligncenter">     
				  <a href="home.php" class="navbar-brand">YUMSUK <br> <span class="slogo">Fund Raising System <span></a>
                 
                    <div class="socialFooter">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                       
                        <a href="#"><i class="fa fa-flickr"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                       
                        <a href="#"><i class="fa fa-youtube"></i></a>
                    
                    </div>
               		<!-- don't removed this as we are providing it for free -->
    	<p>Copyright © 2015 <a href="#">All Rights Reserved</a></p>
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
		<?php
	} else {
		header('location:signin.php');
	}
		?>