<?php
	session_start();
	if($_SESSION['usn']) {
		
		@$page = $_GET['page'];
?>
<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/docs/3.3/favicon.ico">
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
			function DeleteNotice(id2)	{
				if(confirm("You want to delete this record ?"))	{
					window.location.href="delete_user.php?id2="+id2;
				}
			}
    </script>
    
    <script type="text/javascript">
		/*	function DeleteNotice(id3)	{
				if(confirm("You want to delete this record ?"))	{
					window.location.href="delete_schedule.php?id3="+id3;
				}
			} */
    </script>
    <script type="text/javascript">
			function DeleteNotice(id)	{
				if(confirm("You want to delete this record ?"))	{
					window.location.href="delete_donation.php?id="+id;
				}
			}
    </script>
    <title>TSU  Fund Raising System</title>

    <!-- Bootstrap core CSS -->
    <link href="Dashboard%20Template%20for%20Bootstrap_files/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="Dashboard%20Template%20for%20Bootstrap_files/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Dashboard%20Template%20for%20Bootstrap_files/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="Dashboard%20Template%20for%20Bootstrap_files/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body style="background-image:url(img/images.jpg)">

    <nav class="navbar navbar-inverse navbar-fixed-top" style="background:#000;min-height:70px;">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
			<a class="navbar-brand" href="index.php"><h3>TSU JALINGO FUND RAISING SYSTEM</h3></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><br><a href="logout.php"><b>Logout</b></a></li>
          </ul>
        </div>
      </div>
    </nav>
<br><br>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar list-group">
            <li class="active list-group-item"><a href="index.php" style="text-align:center;">MENU <span class="sr-only">(current)</span></a></li>
           
            <li class="dropdown list-group-item">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">DONATION<span class="caret"></span></a>
			 	<ul class="dropdown-menu list-group">
					<li class="list-group-item"><a onclick="location.href='?page=addDonation'"style="cursor:pointer;" style="cursor:pointer;">ADD DONATION</a></li>
					<li class="list-group-item"><a onclick="location.href='?page=manageDonation'" style="cursor:pointer;" style="cursor:pointer;">MANAGE DONATION</a></li>
				</ul> 
			 </li>
            <li class="list-group-item">
				<a href="#" onclick="location.href='?page=donate'" role="button" aria-haspopup="true" aria-expanded="false">DONATE</a>
			</li>
			  <li class="list-group-item">
				<a href="#" onclick="location.href='?page=members'" role="button" aria-haspopup="true" aria-expanded="false">REGISTERED USERS</a>
			</li>
			  <li class="list-group-item">
				<a href="#" onclick="location.href='?page=report'" role="button" aria-haspopup="true" aria-expanded="false">PROGRESS</a>
			</li>
			  <li class="list-group-item">
				<a href="#" onclick="location.href='?page=profile'" role="button" aria-haspopup="true" aria-expanded="false">PROFILE</a>
			  <li class="list-group-item">
				<a href="logout.php" role="button" aria-haspopup="true" aria-expanded="false">Logout</a>
			</li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header" style="color:#fff;">Admin Dashboard</h1>
<?php
		
		include 'content.php';
?>			
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="Dashboard%20Template%20for%20Bootstrap_files/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="Dashboard%20Template%20for%20Bootstrap_files/bootstrap.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="Dashboard%20Template%20for%20Bootstrap_files/holder.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="Dashboard%20Template%20for%20Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
<?php
	} else {
		header('location:login.php');
	}
		?>