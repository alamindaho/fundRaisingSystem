<?php

	define('DB_SERVER', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'dbfunds');

	$dbc = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME)
		or die('Error connecting to database');
?>