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

    <title>Signin - Fund Raising System</title>

    <!-- Bootstrap core CSS -->
    <link href="Signin%20Template%20for%20Bootstrap_files/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="Signin%20Template%20for%20Bootstrap_files/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Signin%20Template%20for%20Bootstrap_files/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="Signin%20Template%20for%20Bootstrap_files/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
		body {
			/*background-image: url(images/Agric.jpg);*/
		}
	</style>
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="post">
		  <h2 style="text-align:center;"><b>TSU Fund Raising System</b></h2>
        <h3 style="text-align:center;">Please Login</h3>
		 <?php
						
					include 'include/conn.php';
					
						extract($_POST);
						if(isset($submit)) {
							
							$username = filter_var($username, FILTER_SANITIZE_SPECIAL_CHARS);
							$password = filter_var($password, FILTER_SANITIZE_SPECIAL_CHARS);
														
							if($username !="" && $password !="") {
								
								$query = "SELECT * FROM `login` WHERE username='$username' AND password='$password'";
								
								if($result = mysqli_query($dbc, $query)) {
									
									if(mysqli_num_rows($result) > 0) {
										
									 	session_start();
										
										$_SESSION['usn'] = $username;
										header('location: index.php');
										
									} else {
										
										echo '<p style="color:red">Invalid username username and password</p>';
									}
								} else {
									
									echo '<p style="color:red">Error Quering Database</p>';
								}
							} else {
								
								echo '<p style="color:red">Enter username and Password to Login</p>';
							}		
						}
					?>
        <label for="username" class="sr-only">Username</label>
        <input id="inputEmail" class="form-control" name="username" placeholder="Enter username" required="" autofocus="" type="text"><br>
        <label for="password" class="sr-only">Password</label>
        <input id="inputPassword" class="form-control" placeholder="Password" required="" name="password" type="password">
        <div class="checkbox">
          <label>
            <input value="remember-me" type="checkbox"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-success btn-block" name="submit" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="Signin%20Template%20for%20Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
  
</body></html>